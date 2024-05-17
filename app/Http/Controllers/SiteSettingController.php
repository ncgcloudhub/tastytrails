<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function SitesettingsAdd()
    {
        $setting = SiteSetting::find(1);

        return view('backend.site_settings.site_settings_add', compact('setting'));
    }

    public function SitesettingsStore(Request $request)
    {

        // Find the SiteSetting with id=1
        $setting = SiteSetting::findOrFail(1);

        // Update the fields from the request
        $setting->title = $request->input('title');
        $setting->footer_text = $request->input('footer_text');
        $setting->phone = $request->input('phone');
        $setting->email = $request->input('email');
        $setting->address = $request->input('address');
        $setting->footer_aboutus = $request->input('footer_aboutus');
        $setting->opening_hours = $request->input('opening_hours');
        $setting->facebook = $request->input('facebook');
        $setting->instagram = $request->input('instagram');
        $setting->youtube = $request->input('youtube');
        $setting->linkedin = $request->input('linkedin');
        $setting->twitter = $request->input('twitter');

        // Handle file uploads (favicon and logo)
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon')->store('public/upload/site');
            $setting->favicon = basename($favicon);
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('public/upload/site');
            $setting->logo = basename($logo);
        }

        // Save the changes
        $setting->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }
}
