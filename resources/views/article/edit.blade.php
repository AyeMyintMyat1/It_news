@extends('layouts.app')
@section('title')
    Article Edit
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Edit</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 ">
            <div class="card shadow-sm p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-primary">
                        <i class="fa-solid fa-circle-plus"></i>
                        Article Edit</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-primary me-3" href="{{ route('article.index') }}">
                            <i class="fa-solid fa-list"></i> </a>
                        <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
                    </div>
                </div>
                <form action="{{route('article.update',[$article->id,"page"=>request()->page])}}" method="post"  id="article_update_form">
                    @csrf
                    @method('put')
                </form>
            </div>
            <div class="my-2">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
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
            </div>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <div class="">
                                <label for="category">Category List</label>
                                <select id="category" class="form-select mt-2 @error('category') is-invalid @enderror"
                                        form="article_update_form" name="category">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category',$article->category->id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                       name="title" id="title" form="article_update_form"  value="{{ old('title',$article->title) }}">
                                @error('title')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                          name="description" id="description" form="article_update_form" rows="13">
                                    {{ old('description',$article->description) }}</textarea>
                                @error('description')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <button class="btn btn-primary w-100" type="submit" form="article_update_form">Update Article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
