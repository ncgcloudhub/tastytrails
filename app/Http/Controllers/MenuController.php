<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // MENU CATEGORY
    public function manageMenuCategory()
    {
        $category = MenuCategory::latest()->get();
        return view('backend.Menu.manage_menu_category', compact('category'));
    }

    public function storeMenuCategory(Request $request)
    {
        $validatedData = $request->validate([
            'menu_category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $menu_category = new MenuCategory();
        $menu_category->fill($validatedData);
        $menu_category->save();

        // Redirect the user or do any other necessary actions
        return redirect()->back()->with('success', 'Menu Category added successfully!');
    }

    public function editMenuCategory($id)
    {
        $category = MenuCategory::orderBy('id', 'asc')->get();
        $categories = MenuCategory::findOrFail($id);

        return view('backend.Menu.edit_menu_category', compact('category', 'categories'));
    }


    public function updateMenuCategory(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'menu_category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Find the about us record to update
        $menu_category = MenuCategory::findOrFail($request->id);

        // Update the text fields
        $menu_category->menu_category_name = $validatedData['menu_category_name'];
        $menu_category->description = $validatedData['description'];

        // Save the changes to the about us record
        $menu_category->save();

        // Redirect the user with a success message
        $notification = array(
            'message' => 'Menu Category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function deleteMenuCategory($id)
    {

        // Find the gallery item
        $menu_category = MenuCategory::findOrFail($id);

        // Delete the gallery item from the database
        $menu_category->delete();

        // Redirect back with notification
        $notification = array(
            'message' => 'Gallery Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method




    // MENU ----------------------------------------------------------------------------------------------------
    public function manageMenu()
    {
        $menus = Menu::latest()->get();
        $categories = MenuCategory::latest()->get();
        return view('backend.Menu.manage_menu', compact('menus', 'categories'));
    }

    public function storeMenu(Request $request)
    {
        // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'menu_category_id' => 'required|string',
            'item_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'nullable|string',
            'image' => 'image',
        ]);

        // Store the item in the database
        $item = new Menu();
        $item->menu_category_id = $validatedData['menu_category_id'];
        $item->item_name = $validatedData['item_name'];
        $item->description = $validatedData['description'];
        $item->price = $validatedData['price'];
        $item->status = 'active';

        // Process and update the uploaded side image, if any
        if ($request->hasFile('image')) {
            $imageName = 'menu_image_' . time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('upload/menu', $imageName, 'public');
            $item->image = $imagePath;
        }


        $item->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item added successfully!');
    }

    public function editMenu($id)
    {
        $menus = Menu::latest()->get();
        $menu = Menu::findOrFail($id);
        $categories = MenuCategory::latest()->get();

        return view('backend.Menu.edit_menu', compact('menus', 'menu', 'categories'));
    }


    public function updateMenu(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'menu_category_id' => 'required|string',
            'item_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'nullable|string',
            'image' => 'image',
        ]);

        // Find the about us record to update
        $menu = Menu::findOrFail($request->id);

        // Delete previous images if new images are uploaded
        if ($request->hasFile('image') && $menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        // Update the text fields
        $menu->menu_category_id = $validatedData['menu_category_id'];
        $menu->item_name = $validatedData['item_name'];
        $menu->description = $validatedData['description'];
        $menu->price = $validatedData['price'];

        // Process and update the uploaded side image, if any
        if ($request->hasFile('image')) {
            $imageName = 'menu_image_' . time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('upload/menu', $imageName, 'public');
            $menu->image = $imagePath;
        }

        // Save the changes to the about us record
        $menu->save();

        // Redirect the user with a success message
        $notification = array(
            'message' => 'About Us updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteMenu($id)
    {

        // Find the gallery item
        $menu = Menu::findOrFail($id);

        // Delete the image file from storage if it exists
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        // Delete the gallery item from the database
        $menu->delete();

        // Redirect back with notification
        $notification = array(
            'message' => 'Menu Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method
}
