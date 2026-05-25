<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function showSetup()
    {
        $user = Auth::user();
        return view('profile.setup', compact('user'));
    }

    public function saveSetup(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'phone' => 'required|string|max:15',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($user->role === 'farmer') {
            $rules['farm_name'] = 'required|string|max:255';
        } else {
            $rules['business_name'] = 'required|string|max:255';
        }

        $request->validate($rules);

        $data = [
            'phone' => $request->phone,
            'state' => $request->state,
            'city' => $request->city,
            'is_profile_setup' => true,
        ];

        if ($user->role === 'farmer') {
            $data['farm_name'] = $request->farm_name;
        } else {
            $data['business_name'] = $request->business_name;
        }

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $dir = public_path('images/profiles');
            
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }

            // Clean old image if exists
            if ($user->profile_image) {
                $oldPath = public_path($user->profile_image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $filename = $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($dir, $filename);
            $data['profile_image'] = '/images/profiles/' . $filename;
        }

        // Use standard MongoDB Eloquent update
        $user->update($data);

        return redirect()->route('dashboard')->with('success', 'Profile set up successfully!');
    }
}
