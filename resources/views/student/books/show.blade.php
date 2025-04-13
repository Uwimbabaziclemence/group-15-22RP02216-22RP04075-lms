@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{ $book->title }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Category:</strong> {{ $book->category->name ?? 'Uncategorized' }}</p>
            <p><strong>Total Copies:</strong> {{ $book->bookQuantity }}</p>
            <p><strong>Available Copies:</strong> {{ $book->availableCopies() }}</p>
            
            <a href="{{ route('student.books.index') }}" class="btn btn-secondary">Back to Books</a>
        </div>
    </div>
</div>
@endsection