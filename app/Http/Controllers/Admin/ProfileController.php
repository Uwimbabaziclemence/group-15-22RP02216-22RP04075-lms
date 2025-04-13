<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.show', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
        ]);

        $admin->update($request->only(['name', 'email']));

        return redirect()->route('admin.profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $admin->update(['password' => Hash::make($request->password)]);

        return redirect()->route('admin.profile')
            ->with('success', 'Password updated successfully.');
    }
}