@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Books Management</h4>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Book
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Available</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->category->name ?? 'Uncategorized' }}</td>
                                    <td>{{ $book->bookQuantity }}</td>
                                    <td>{{ $book->availableCopies() }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info me-2">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No books found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection