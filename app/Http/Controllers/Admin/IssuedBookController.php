<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\IssuedBook;
use App\Models\Student;
use Illuminate\Http\Request;

class IssuedBookController extends Controller
{
    public function index()
    {
        $issuedBooks = IssuedBook::with(['book', 'student'])->get();
        return view('admin.issued-books.index', compact('issuedBooks'));
    }

    public function create()
    {
        $books = Book::where('bookQuantity', '>', 0)->get();
        $students = Student::all();
        return view('admin.issued-books.create', compact('books', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'student_id' => 'required|exists:students,id',
        ]);
    
        // Check book availability
        $book = Book::findOrFail($request->book_id);
        if ($book->availableCopies() <= 0) {
            return back()->with('error', 'No available copies of this book');
        }
    
        IssuedBook::create([
            'book_id' => $request->book_id,
            'student_id' => $request->student_id,
            'issue_date' => now(), // Use Carbon instance
            'ReturnStatus' => false
        ]);
    
        return redirect()->route('issued-books.index')
            ->with('success', 'Book issued successfully');
    }

    public function show(IssuedBook $issuedBook)
    {
        return view('admin.issued-books.show', compact('issuedBook'));
    }

    public function returnBook($id)
    {
        $issuedBook = IssuedBook::findOrFail($id);
    $issuedBook->update([
        'return_date' => now(),
        'ReturnStatus' => true
        ]);

        return redirect()->route('issued-books.index')
            ->with('success', 'Book returned successfully.');
    }

    public function destroy(IssuedBook $issuedBook)
    {
        $issuedBook->delete();

        return redirect()->route('issued-books.index')
        ->with('success', 'Book marked as returned successfully');
    }
}