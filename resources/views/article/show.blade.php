@extends('layouts.app')
@section('title')
    {{ $article->title}}
@endsection
@section('head')
    <style>
        .img{
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page"> {{ $article->title}}</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" d-flex mb-3 ">
                            <img src="{{ asset('small/'.$article->user->photo) }}" alt="" class="img me-2">
                            <div class="d-flex flex-column">
                                <b class="">{{ $article->user->name }}</b>
                                <div class="d-flex">
                                    <small class="">{{ $article->created_at->diffForHumans() }}</small>
                                    <i class="fa-solid fa-layer-group mx-2 text-success"></i>
                                    <small class="">{{ $article->category->title }}</small>
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px" role="button"
                               id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('article.edit',[$article->id,"page"=>request()->page]) }}">
                                            <i class="fa-solid fa-edit me-2 text-warning"></i>Article Edit</a></li>
                                    <li>
                                        <form action="{{ route('article.destroy',[$article->id,"page"=>request()->page]) }}" method="post" id="deleteForm{{ $article->id }}">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item" type="submit">
                                                <i class="fa-solid fa-trash me-2 text-danger" ></i>Article Delete</button>
                                        </form>
                                    </li>
                                </ul>
                        </div>
                        </div>
                    <h4 class="my-2">{{ $article->title }}</h4>
                    <p class="mb-0" style="white-space: pre-line">{{ $article->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
