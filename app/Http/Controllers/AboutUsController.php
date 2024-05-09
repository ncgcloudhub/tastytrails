<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;


class AboutUsController extends Controller
{

    // About Us BACKEND
    public function ManageAboutUs()
    {
        $about_us = AboutUs::orderBy('id', 'asc')->get();
        return view('backend.about.manage_about_us', compact('about_us'));
    }

    public function StoreAboutUs(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'header_title' => 'required|string|max:255',
            'details' => 'nullable|string',
            'side_image' => 'nullable|image|max:2048', // Assuming you're uploading images
            'background_image' => 'nullable|image|max:2048', // Assuming you're uploading images
        ]);

        // Process the uploaded image, if any
        if ($request->hasFile('side_image')) {
            $imageName = 'sideimage_' . time() . '.' . $request->side_image->getClientOriginalExtension();
            $imagePath = $request->file('side_image')->storeAs('upload/about', $imageName, 'public'); // Store the image in the public disk under the images/banner directory with custom filename
            $validatedData['side_image'] = $imagePath;
        }
        // Process the uploaded image, if any
        if ($request->hasFile('background_image')) {
            $imageName = 'background_image_' . time() . '.' . $request->background_image->getClientOriginalExtension();
            $imagePath = $request->file('background_image')->storeAs('upload/about', $imageName, 'public'); // Store the image in the public disk under the images/banner directory with custom filename
            $validatedData['background_image'] = $imagePath;
        }

        // Create a new instance of the Banner model and fill it with the validated data
        $about_us = new AboutUs();
        $about_us->fill($validatedData);

        // Save the banner to the database
        $about_us->save();

        // Redirect the user or do any other necessary actions
        return redirect()->back()->with('success', 'About Us added successfully!');
    }

    public function EditAboutUs($id)
    {
        $about_us = AboutUs::orderBy('id', 'asc')->get();
        $about_uss = AboutUs::findOrFail($id);

        return view('backend.about.edit_about_us', compact('about_us', 'about_uss'));
    }


    public function UpdateAboutUs(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'id' => 'required|exists:about_us,id',
            'header_title' => 'required|string|max:255',
            'details' => 'nullable|string',
            'side_image' => 'nullable|image|max:2048', // Assuming you're uploading images
            'background_image' => 'nullable|image|max:2048', // Assuming you're uploading images
        ]);

        // Find the about us record to update
        $about_us = AboutUs::findOrFail($request->id);

        // Delete previous images if new images are uploaded
        if ($request->hasFile('side_image') && $about_us->side_image) {
            Storage::disk('public')->delete($about_us->side_image);
        }

        if ($request->hasFile('background_image') && $about_us->background_image) {
            Storage::disk('public')->delete($about_us->background_image);
        }

        // Update the text fields
        $about_us->header_title = $validatedData['header_title'];
        $about_us->details = $validatedData['details'];

        // Process and update the uploaded side image, if any
        if ($request->hasFile('side_image')) {
            $imageName = 'sideimage_' . time() . '.' . $request->side_image->getClientOriginalExtension();
            $imagePath = $request->file('side_image')->storeAs('upload/about', $imageName, 'public');
            $about_us->side_image = $imagePath;
        }

        // Process and update the uploaded background image, if any
        if ($request->hasFile('background_image')) {
            $imageName = 'background_image_' . time() . '.' . $request->background_image->getClientOriginalExtension();
            $imagePath = $request->file('background_image')->storeAs('upload/about', $imageName, 'public');
            $about_us->background_image = $imagePath;
        }

        // Save the changes to the about us record
        $about_us->save();

        // Redirect the user with a success message
        $notification = array(
            'message' => 'About Us updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
