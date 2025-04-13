<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $student = Auth::guard('student')->user();
        return view('student.profile.show', compact('student'));
    }

    public function update(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,'.$student->id,
        ]);

        $student->update($request->only(['name', 'email']));

        return redirect()->route('student.profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $student->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $student->update(['password' => Hash::make($request->password)]);

        return redirect()->route('student.profile')
            ->with('success', 'Password updated successfully.');
    }
}