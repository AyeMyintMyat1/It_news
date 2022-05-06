@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('head')
{{--    <style>--}}
{{--        .bg-img{--}}
{{--           background-image: url("{{ asset('storage/profile/'.Auth::user()->photo) }}");--}}
{{--            height: 300px;--}}
{{--            background-size: 70%;--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-position-x: center;--}}
{{--            filter: drop-shadow(2px 3px 5px #1a1e2130);--}}
{{--        }--}}
{{--    </style>--}}
<style>
    .img{
        border-radius: 50%!important;
    }
</style>
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Your Profile</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary">
                            <i class="fa-solid fa-circle-user"></i>
                            Your Profile
                        </h4>
                        <i class="fa-solid fa-ellipsis-vertical" style="font-size: 23px"></i>
                    </div>
                    <hr>
                    <div class="text-center">
                        @if(Auth::user()->photo == 'user-photo.png')
                            <img src="{{ asset('square/'.Auth::user()->photo) }}" alt="" class="w-75 rounded-3 my-2 ">
                        @else
                            <img src="{{ asset('square/'.Auth::user()->photo) }}" alt="" class="img rounded-3 my-2 shadow-sm">
                        @endif
                        <h3 class="text-center font-weight-bolder ">{{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

