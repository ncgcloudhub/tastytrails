<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // MENU CATEGORY
    public function manageMenuCategory()
    {
        $categories = MenuCategory::latest()->get();
        return view('backend.Menu.manage_menu_category', compact('categories'));
    }

    public function storeMenuCategory(Request $request)
    {
        $validatedData = $request->validate([
            'menu_category_name' => 'required|string|max:255',
        ]);

        $menu_category = new MenuCategory();
        $menu_category->fill($validatedData);
        $menu_category->save();

        // Redirect the user or do any other necessary actions
        return redirect()->back()->with('success', 'Menu Category added successfully!');
    }


// MENU ----------------------------------------------------------------------------------------------------
    public function manageMenu()
    {
        $menus = Menu::latest()->get();
        $categories = MenuCategory::latest()->get();
        return view('backend.Menu.manage_menu', compact('menus','categories'));
    }

    public function storeMenu(Request $request)
    {
        // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'menu_category_id' => 'required|string',
            'item_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image',
        ]);

        // Store the item in the database
        $item = new Menu();
        $item->menu_category_id = $validatedData['menu_category_id'];
        $item->item_name = $validatedData['item_name'];
        $item->description = $validatedData['description'];
        $item->price = $validatedData['price'];
        $item->status = 'active';

        // Handle file upload for the image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/upload/menu');
            $item->image = $imagePath;
        }

        $item->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item added successfully!');
    }



}
