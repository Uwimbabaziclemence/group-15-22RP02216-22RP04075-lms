<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\IssuedBook;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalStudents = Student::count();
        $totalIssuedBooks = IssuedBook::where('ReturnStatus', false)->count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalCategories',
            'totalStudents',
            'totalIssuedBooks'
        ));
    }
}