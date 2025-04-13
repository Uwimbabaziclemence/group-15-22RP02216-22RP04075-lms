<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\IssuedBook;
class DashboardController extends Controller
{
    public function index()
    {
        $issuedBooks = IssuedBook::where('student_id', auth('student')->id())
            ->with('book')
            ->get();

        return view('student.dashboard', compact('issuedBooks'));
    }
}
