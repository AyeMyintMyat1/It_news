@extends('layouts.app')
@section('title')
  Change Name
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
        <li class="breadcrumb-item active" aria-current="page">Change Name</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-primary">
                            <i class="fa-solid fa-message"></i>
                            Change Name</h5>
                        <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
                    </div>
                    <hr>
                    <form action="{{ route('profile.changeNameAccount') }}" method="post" >
                        @csrf
                        <div class="my-3">
                            <label for="current-name " class="mb-2 ">
                                <i class="fa-solid fa-message"></i>
                                Current Name</label>
                            <input type="text" class="form-control  @error('current-name') is-invalid @enderror "
                                   name="current-name" value="{{ old('current-name') }}">
                            @error('current-name')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="new_name" class="mb-2">
                                <i class="fa-solid fa-message"></i>
                                New Name</label>
                            <input type="text" class="form-control  @error('new_name') is-invalid @enderror "
                                   name="new_name" value="{{ old('new_name') }}">
                            @error('new_name')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="password" class="mb-2">
                                <i class="fa-solid fa-key"></i>
                                 Password</label>
                            <input type="text" class="form-control  @error('password') is-invalid @enderror "
                                   name="password" value="{{ old('password') }}">
                            @error('password')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-check form-switch my-3">
                            <input class="form-check-input @error('check') is-invalid @enderror"
                                   type="checkbox" role="switch" id="flexSwitchCheckDefault" name="check">
                            <label class="form-check-label" for="flexSwitchCheckDefault">I am sure.</label>
                        </div>
                        <div>
                            @error('check')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="text-end mb-3 mt-4">
                            <button class="btn btn-outline-primary">Change Name</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
