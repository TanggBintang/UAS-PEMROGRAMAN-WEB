<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Create directory if not exists
            $avatarPath = public_path('assets/images/avatars/');
            if (!file_exists($avatarPath)) {
                mkdir($avatarPath, 0755, true);
            }
            
            // Initialize ImageManager with GD driver
            $manager = new ImageManager(new Driver());
            
            // Read, resize and save image using v3 syntax
            $img = $manager->read($image->getRealPath());
            $img->resize(200, 200);
            $img->save($avatarPath . $filename);
            
            // Delete old avatar if exists
            if ($user->avatar && file_exists($avatarPath . $user->avatar)) {
                unlink($avatarPath . $user->avatar);
            }
            
            $updateData['avatar'] = $filename;
        }

        // Update user data
        User::where('id', $user->id)->update($updateData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}