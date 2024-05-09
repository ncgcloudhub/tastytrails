<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    // Gallery BACKEND
    public function AddGallery()
    {
        $gallery = Gallery::orderBy('id', 'asc')->get();
        return view('backend.gallery.add_gallery', compact('gallery'));
    }

    public function StoreGallery(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048', // Assuming you're uploading images
        ]);

        // Process the uploaded image, if any
        if ($request->hasFile('image')) {
            $imageName = 'gallery_image_' . time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('upload/gallery', $imageName, 'public'); // Store the image in the public disk under the images/banner directory with custom filename
            $validatedData['image'] = $imagePath;
        }

        // Create a new instance of the Banner model and fill it with the validated data
        $gallery = new Gallery();
        $gallery->fill($validatedData);

        // Save the banner to the database
        $gallery->save();

        // Redirect the user or do any other necessary actions
        return redirect()->back()->with('success', 'Gallery added successfully!');
    }

    public function EditGallery($id)
    {
        $gallery = Gallery::orderBy('id', 'asc')->get();
        $gallerys = Gallery::findOrFail($id);

        return view('backend.gallery.edit_gallery', compact('gallery', 'gallerys'));
    }


    public function UpdateGallery(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'image' => 'nullable|image|max:2048', // Assuming you're uploading images
        ]);

        // Find the about us record to update
        $gallery = Gallery::findOrFail($request->id);

        // Delete previous images if new images are uploaded
        if ($request->hasFile('image') && $gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }



        // Process and update the uploaded side image, if any
        if ($request->hasFile('image')) {
            $imageName = 'gallery_image_' . time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('upload/gallery', $imageName, 'public');
            $gallery->image = $imagePath;
        }



        // Save the changes to the about us record
        $gallery->save();

        // Redirect the user with a success message
        $notification = array(
            'message' => 'Gallery updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteGallery($id)
    {

        // Find the gallery item
        $gallery = Gallery::findOrFail($id);

        // Delete the image file from storage if it exists
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Delete the gallery item from the database
        $gallery->delete();

        // Redirect back with notification
        $notification = array(
            'message' => 'Gallery Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method
}
