<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{

    public function addModerator()
    {
        // $category = MenuCategory::latest()->get();
        return view('backend.moderator.add_moderator');
    }

    public function storeModerator(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            
        ]);

        $validatedData['role'] = 'user';
        $validatedData['status'] = 'active';

        // Create a new user instance
        $user = new User();
        $user->fill($validatedData);
        $user->password = bcrypt($validatedData['password']); // Hash the password
        // You can also handle photo uploads, etc., here if needed

        // Save the user to the database
        $user->save();

        // Optionally, you can redirect the user to a different page after creation
        return redirect()->back()->with('success', 'Moderator created successfully!');
    }

    public function manageModerator()
    {
        $moderators = User::latest()->get();
        return view('backend.moderator.manage_moderator', compact('moderators'));
    }
}
