<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6|confirmed',
            'student_id' => 'required|string|unique:students,student_id',
        ]);

        $student = new Student([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'student_id' => $request->student_id,
        ]);

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $issuedBooks = $student->issuedBooks()->with('book')->get();
        return view('admin.students.show', compact('student', 'issuedBooks'));
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'student_id' => 'required|string|unique:students,student_id,' . $student->id,
        ]);

                   // For registration/store
$request->validate([
    'name' => [
        'required',
        'string',
        'max:100',
        'regex:/^[a-zA-Z\s]+$/' // Only letters and spaces
    ],
    'email' => [
        'required',
        'email',
        'unique:students,email',
        'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
    ],
    'student_id' => [
        'required',
        'string',
        'size:9', // Example: 22RP01832
        'regex:/^\d{2}RP\d{5}$/',
        'unique:students,student_id'
    ],
    'password' => [
        'required',
        'string',
        'min:8',
        'confirmed',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
    ]
], [
    'name.regex' => 'Name can only contain letters and spaces.',
    'student_id.regex' => 'Student ID must be in format 99RP99999.',
    'password.regex' => 'Password must contain at least one uppercase, one lowercase, one number and one special character.'
]);

// For update (without password)
$request->validate([
    'name' => [
        'required',
        'string',
        'max:100',
        'regex:/^[a-zA-Z\s]+$/'
    ],
    'email' => [
        'required',
        'email',
        'unique:students,email,'.$student->id,
        'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
    ],
    'student_id' => [
        'required',
        'string',
        'size:9',
        'regex:/^\d{2}RP\d{5}$/',
        'unique:students,student_id,'.$student->id
    ]
]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
