<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

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
}
