@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Issued Books</h1>
    
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($issuedBooks as $issuedBook)
                <tr>
                    <td>{{ $issuedBook->book->title }}</td>
                    <td>{{ $issuedBook->book->author }}</td>
                    <td>{{ $issuedBook->issue_date->format('Y-m-d') }}</td>
                    <td>{{ $issuedBook->return_date ? $issuedBook->return_date->format('Y-m-d') : 'Not returned' }}</td>
                    <td>
                        @if($issuedBook->ReturnStatus)
                            <span class="badge bg-success">Returned</span>
                        @else
                            <span class="badge bg-warning">Issued</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No books issued yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection