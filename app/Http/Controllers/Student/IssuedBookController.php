<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\IssuedBook;
use Illuminate\Support\Facades\Auth;

class IssuedBookController extends Controller
{
    public function index()
    {
        $issuedBooks = IssuedBook::where('student_id', Auth::guard('student')->id())
            ->with('book')
            ->get();

        return view('student.issued-books.index', compact('issuedBooks'));
    }
}