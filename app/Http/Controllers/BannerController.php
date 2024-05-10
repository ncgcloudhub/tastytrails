<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function AddBanner()
    {
        return view('backend.banner.add_banner');
    }

    public function manageBanner()
    {
        $banners = Banner::latest()->get();
        return view('backend.banner.manage_banner', compact('banners'));
    }

    public function storeBanner(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Assuming you're uploading images
        ]);

        // Process the uploaded image, if any
        if ($request->hasFile('image')) {
            $imageName = 'banner_' . time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('upload/banner', $imageName, 'public'); // Store the image in the public disk under the images/banner directory with custom filename
            $validatedData['image'] = $imagePath;
        }

        // Create a new instance of the Banner model and fill it with the validated data
        $banner = new Banner();
        $banner->fill($validatedData);

        // Save the banner to the database
        $banner->save();

        // Redirect the user or do any other necessary actions
        return redirect()->back()->with('success', 'Banner added successfully!');
    }

    public function editBanner($id)
    {
        $banners = Banner::latest()->get();
        $banner = Banner::findOrFail($id);

        return view('backend.banner.edit_banner', compact('banners', 'banner'));
    }


    public function updateBanner(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Assuming you're uploading images
        ]);

        // Find the about us record to update
        $banner = Banner::findOrFail($request->id);

        // Delete previous images if new images are uploaded
        if ($request->hasFile('image') && $banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        // Update the text fields
        $banner->title = $validatedData['title'];
        $banner->description = $validatedData['description'];

        // Process and update the uploaded side image, if any
        if ($request->hasFile('image')) {
            $imageName = 'banner_' . time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('upload/banner', $imageName, 'public');
            $banner->image = $imagePath;
        }

        // Save the changes to the about us record
        $banner->save();

        // Redirect the user with a success message
        $notification = array(
            'message' => 'Banner updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteBanner($id)
    {

        // Find the gallery item
        $banner = Banner::findOrFail($id);

        // Delete the image file from storage if it exists
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        // Delete the gallery item from the database
        $banner->delete();

        // Redirect back with notification
        $notification = array(
            'message' => 'Banner Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method
}
