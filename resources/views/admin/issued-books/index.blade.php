@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Issued Books Management</h4>
                    <a href="{{ route('issued-books.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Issue New Book
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
                                    <th>Book</th>
                                    <th>Student</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($issuedBooks as $issuedBook)
                                <tr>
                                    <td>{{ $issuedBook->id }}</td>
                                    <td>{{ $issuedBook->book->title }}</td>
                                    <td>{{ $issuedBook->student->name }} ({{ $issuedBook->student->student_id }})</td>
                                    <td>{{ $issuedBook->issue_date->format('Y-m-d') }}</td>
                                    <td>{{ $issuedBook->return_date ? $issuedBook->return_date->format('Y-m-d') : 'Not returned' }}</td>
                                    <td>
                                        @if($issuedBook->ReturnStatus)
                                            <span class="badge bg-success">Returned</span>
                                        @else
                                            <span class="badge bg-warning">Issued</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$issuedBook->ReturnStatus)
                                        <form action="{{ route('issued-books.return', $issuedBook->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success me-2">
                                                <i class="fas fa-book"></i> Mark Returned
                                            </button>
                                        </form>
                                        @endif
                                        <form action="{{ route('issued-books.destroy', $issuedBook->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this record?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No issued books found</td>
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