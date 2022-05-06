@extends('layouts.app')
@section('title')
    Article List
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
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-primary">
                            <i class="fa-solid fa-list"></i>
                            Article List</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-outline-primary me-3" href="{{ route('article.create') }}">
                                <i class="fa-solid fa-circle-plus"></i></a>
                            <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
                        </div>
                    </div>
                    <hr>
                   <div class="my-2">
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
                   </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @isset(request()->search)
                                <a class="btn btn-outline-primary me-3" href="{{ route('article.index') }}">
                                    <i class="fa-solid fa-list"></i>
                                   All List</a>
                                <h4 >Search By "{{ request()->search }}"</h4>
                            @endisset
                        </div>
                        <form action="{{route('article.index')}}" method="get" >
                                <div class="mb-3 d-inline-block">
                                    <input type="text" class="form-control " name="search" value="{{ old('search',request()->search) }}"
                                           placeholder="Search Article">
                                </div>
                                <div class="mb-3 d-inline-block">
                                    <button class="btn btn-outline-primary">
                                        <i class="fa-solid fa-search"></i>
                                        Search</button>
                                </div>
                        </form>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Control</th>
                            <th>Created_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                   <b> {{ \Illuminate\Support\Str::words($article->title,5) }}</b>
                                    <br>
                                    {{ \Illuminate\Support\Str::words($article->description,10) }}
                                </td>
                                <td class="text-nowrap">
                                    <img src="{{ asset('small/'.$article->user->photo) }}" alt="" class="img ">
                                    {{ $article->user->name }}</td>
                                <td class="text-nowrap">{{ $article->category->title }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('article.edit',[$article->id,"page"=>request()->page]) }}" class="btn btn-outline-warning">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <a href="{{ route('article.show',[$article->id,"page"=>request()->page]) }}" class="btn btn-outline-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <form action="{{ route('article.destroy',[$article->id,"page"=>request()->page]) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" type="submit"
                                                onclick="return confirm('Are you sure to delete thtis article?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-nowrap">
                                    <i class="fa-solid fa-calendar text-success"></i>
                                    {{ $article->created_at->format('d-m-y') }}
                                    <br>
                                    <i class="fa-solid fa-clock text-danger"></i>
                                    {{ $article->created_at->format('h:i A') }}
                                </td>
                            </tr>
                        @empty
                            <div class="my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                </svg>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                                 aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            No Data </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                            </div>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h4>Total : {{ $articles->total() }}</h4>
                        {{ $articles->appends(\Illuminate\Support\Facades\Request::all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
