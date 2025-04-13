@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Book: {{ $book->title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('books.update', $book->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                                       name="title" value="{{ old('title', $book->title) }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="author" class="col-md-4 col-form-label text-md-end">Author</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" 
                                       name="author" value="{{ old('author', $book->author) }}" required>
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">Category</label>
                            <div class="col-md-6">
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" 
                                        name="category_id">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ (old('category_id', $book->category_id) == $category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bookQuantity" class="col-md-4 col-form-label text-md-end">Quantity</label>
                            <div class="col-md-6">
                                <input id="bookQuantity" type="number" min="1" class="form-control @error('bookQuantity') is-invalid @enderror" 
                                       name="bookQuantity" value="{{ old('bookQuantity', $book->bookQuantity) }}" required>
                                @error('bookQuantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Book
                                </button>
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection