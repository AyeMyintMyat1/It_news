@extends('layouts.app')
@section('title')
    Category
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-primary">
                            <i class="fa-solid fa-database"></i>
                            Category</h5>
                        <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
                    </div>
                    <hr>
                    <div class=" d-flex mb-3">
                        <img src="{{ asset('small/'.$category->user->photo) }}" alt="" class="img me-2">
                        <div class="d-flex flex-column">
                            <b class="">{{ $category->user->name }}</b>
                            <small class="">{{ $category->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <h4 >{{ $category->title }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
