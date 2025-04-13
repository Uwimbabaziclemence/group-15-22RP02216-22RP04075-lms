@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Issued Book Details</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">ID</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $issuedBook->id }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Book</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $issuedBook->book->title }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Student</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">
                                {{ $issuedBook->student->name }} ({{ $issuedBook->student->student_id }})
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Issue Date</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $issuedBook->issue_date->format('Y-m-d') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Return Date</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $issuedBook->issue_date->format('Y-m-d') }}</p>
                            <p class="form-control-plaintext">
                                 {{ $issuedBook->return_date ? $issuedBook->return_date->format('Y-m-d') : 'Not returned' }}
                            </p>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Status</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">
                                @if($issuedBook->ReturnStatus)
                                    <span class="badge bg-success">Returned</span>
                                @else
                                    <span class="badge bg-warning">Issued</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            @if(!$issuedBook->ReturnStatus)
                            <form action="{{ route('issued-books.return', $issuedBook->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success me-2">
                                    Mark Returned
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('issued-books.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection