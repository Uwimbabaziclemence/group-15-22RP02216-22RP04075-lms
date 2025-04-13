@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Dashboard</h1>
    
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">My Issued Books</div>
                <div class="card-body">
                    @if($issuedBooks->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Book Title</th>
                                    <th>Issue Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($issuedBooks as $issuedBook)
                                <tr>
                                    <td>{{ $issuedBook->book->title }}</td>
                                    <td>{{ $issuedBook->issue_date->format('Y-m-d') }}</td>
                                    <td>
                                        @if($issuedBook->ReturnStatus)
                                            <span class="badge bg-success">Returned</span>
                                        @else
                                            <span class="badge bg-warning">Issued</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No books issued yet.</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Quick Actions</div>
                <div class="card-body">
                    <a href="{{ route('student.books.index') }}" class="btn btn-primary mb-2">Browse Books</a>
                    <a href="{{ route('student.profile') }}" class="btn btn-secondary mb-2">My Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection