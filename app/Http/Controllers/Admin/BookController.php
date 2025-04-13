<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
 
    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^\d]+$/',
                'unique:books,title'
            ],
            'author' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s\.\-]+$/'
            ],
            'category_id' => 'required|exists:categories,id',
            'bookQuantity' => 'required|integer|min:1|max:100'
        ], [
            'title.required' => 'The book title is required.',
            'title.regex' => 'The book title cannot contain numbers.',
            'author.required' => 'The author name is required.',
            'author.regex' => 'The author name can only contain letters, spaces, dots and hyphens.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
            'bookQuantity.required' => 'Please specify the quantity.',
            'bookQuantity.integer' => 'Quantity must be a whole number.',
            'bookQuantity.min' => 'Quantity must be at least 1.',
            'bookQuantity.max' => 'Quantity cannot exceed 100.'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^\d]+$/',
                Rule::unique('books')->ignore($book->id)
            ],
            'author' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s\.\-]+$/'
            ],
            'category_id' => 'required|exists:categories,id',
            'bookQuantity' => 'required|integer|min:1|max:100'
        ], [
            'title.required' => 'The book title is required.',
            'title.regex' => 'The book title cannot contain numbers.',
            'author.required' => 'The author name is required.',
            'author.regex' => 'The author name can only contain letters, spaces, dots and hyphens.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
            'bookQuantity.required' => 'Please specify the quantity.',
            'bookQuantity.integer' => 'Quantity must be a whole number.',
            'bookQuantity.min' => 'Quantity must be at least 1.',
            'bookQuantity.max' => 'Quantity cannot exceed 100.'
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
