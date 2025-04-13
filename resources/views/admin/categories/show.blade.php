@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category Details</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">ID</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $category->id }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Name</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $category->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection