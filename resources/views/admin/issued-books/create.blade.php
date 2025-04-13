@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Issue New Book</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('issued-books.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="book_id" class="col-md-4 col-form-label text-md-end">Book</label>
                            <div class="col-md-6">
                                <select id="book_id" class="form-control @error('book_id') is-invalid @enderror" 
                                        name="book_id" required>
                                    <option value="">-- Select Book --</option>
                                    @foreach($books as $book)
                                        @if($book->availableCopies() > 0)
                                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->title }} (Available: {{ $book->availableCopies() }})
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('book_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="student_id" class="col-md-4 col-form-label text-md-end">Student</label>
                            <div class="col-md-6">
                                <select id="student_id" class="form-control @error('student_id') is-invalid @enderror" 
                                        name="student_id" required>
                                    <option value="">-- Select Student --</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }} ({{ $student->student_id }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Issue Book
                                </button>
                                <a href="{{ route('issued-books.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection