@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Details: {{ $book->title }}</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">ID</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $book->id }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Title</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $book->title }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Author</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $book->author }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Category</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $book->category->name ?? 'Uncategorized' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Total Copies</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $book->bookQuantity }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Available Copies</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $book->availableCopies() }}</p>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection