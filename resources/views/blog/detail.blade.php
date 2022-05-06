@extends('blog.master')
@section('title')
    Index
@endsection
@section('content')
    <div class="">
        <div class="py-3">
            <div class="small post-category mb-3">
                <a href="#" rel="category tag">{{ $article->category->title }}</a>
            </div>
            <h2 class="fw-bolder">{{ $article->title }}</h2>
            <div class="my-3 feature-image-box">
{{--                <img width="1024" height="682" src="{{ asset('images/0fceaefa-42cc-384a-82b3-11fce9a2fccc-1024x683.jpg') }}">--}}
                <div class="d-block d-md-flex justify-content-between align-items-center my-3">
                    <div class="">
                        <img alt="" src="{{ asset('small/'.$article->user->photo) }}"
                             class="avatar avatar-30 photo rounded-circle" >
                        <a href="{{ route('baseOnUser',$article->user->id) }}" title="Visit admin’s website" class="text-decoration-none"
                            rel="author external">{{ $article->user->name }}</a></div>

                    <a href="{{ route('baseOnDate',$article->created_at) }}" class="text-primary text-decoration-none">
                        <i class="feather-calendar"></i>
                        {{ $article->created_at->format('Y m d') }}
                    </a>
                </div>
                <div class="">
                    {{ $article->description }}
                </div>
                <hr>

{{--                {{ $next }}--}}
{{--                {{ $previous }}--}}
                <div class="nav d-flex justify-content-between p-3">

                       @isset($next)
                        <a href="{{ route('detail',$next->slug) }}"
                           class="btn btn-outline-primary page-mover rounded-circle">
                            <i class="feather-chevron-left"></i>
                        </a>
                    @endisset
                    <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route('index') }}">
                        Read All
                    </a>
                           @isset($previous)
                               <a href="{{ route('detail',$previous->slug) }}"
                                  class="btn btn-outline-primary page-mover rounded-circle">
                                   <i class="feather-chevron-right"></i>
                               </a>

                           @endisset

                </div>
            </div>


        </div>

        <div class="d-block d-lg-none d-flex justify-content-center">
        </div>

    </div>
@endsection
