<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('student.books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('student.books.show', compact('book'));
    }
}