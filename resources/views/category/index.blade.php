@extends('layouts.app')
@section('title')
    Category Manager
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-primary">
                            <i class="fa-solid fa-layer-group"></i>
                           Category Manager</h5>
                           <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
                    </div>
                    <hr>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    @if(session('add'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                     aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                {{ session('add') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill"/></svg>
                                {{ session('delete') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                    <form action="{{route('category.store')}}" method="post" class="my-3">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-6 my-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="col-6 my-3">
                                <button class="btn btn-outline-primary">Add Category</button>
                            </div>
                        </div>
                        @error('title')
                        <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </form>
                  @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
