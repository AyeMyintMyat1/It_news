@extends('layouts.app')
@section('title')
    Upload Photo
@endsection
@section('head')
{{--    <style>--}}
{{--        .bg-img{--}}
{{--            background-image: url("{{ asset('storage/profile/'.Auth::user()->photo) }}");--}}
{{--            height: 300px;--}}
{{--            background-size: 70%;--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-position-x: center;--}}
{{--            filter: drop-shadow(2px 3px 5px #1a1e2130);--}}
{{--        }--}}
{{--    </style>--}}
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profile.profilePhoto') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Upload Photo</li>
    </x-bread-crumb>
<div class="row my-3">
    <div class="col-12 col-lg-4">
        <div class="card shadow-sm">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-primary">
                    <i class="fa-solid fa-photo-film"></i>
                    Update Photo</h5>
               <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
            </div>
                <hr>
                <div class="text-center">
{{--                    <div class="bg-img my-3 "></div>--}}
                    @if(Auth::user()->photo == 'user-photo.png')
                        <img src="{{ asset('square/'.Auth::user()->photo) }}" alt="" class="w-75 rounded-3 my-2 ">
                    @else
                        <img src="{{ asset('square/'.Auth::user()->photo) }}" alt="" class="w-75 rounded-3 my-2 shadow-sm">
                    @endif
                </div>
                <form action="{{ route('profile.photo.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="photo" class="mb-2">Profile Photo</label>
                        <input type="file" class="form-control  @error('photo') is-invalid @enderror " name="photo">
                        @error('photo')
                        <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button class="btn btn-outline-primary">Update Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
