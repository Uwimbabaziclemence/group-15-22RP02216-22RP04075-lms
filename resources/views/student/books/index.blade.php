@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Books</h1>
    
    <div class="row mt-4">
        @foreach($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                    <p class="card-text">
                        <strong>Category:</strong> {{ $book->category->name ?? 'Uncategorized' }}<br>
                        <strong>Available Copies:</strong> {{ $book->availableCopies() }}
                    </p>
                    <a href="{{ route('student.books.show', $book->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection