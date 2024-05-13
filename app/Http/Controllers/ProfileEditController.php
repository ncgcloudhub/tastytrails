<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileEditController extends Controller
{
    public function ProfileEdit(){

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return view('backend.profile.password_change', compact('user'));
    
    }
}
