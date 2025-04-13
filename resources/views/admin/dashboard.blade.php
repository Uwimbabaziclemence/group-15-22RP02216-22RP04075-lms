@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Books</h5>
                    <p class="card-text display-4">{{ $totalBooks }}</p>
                </div>
            </div>
        </div>
    
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text display-4">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text display-4">{{ $totalStudents }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3
