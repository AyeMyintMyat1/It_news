@extends('layouts.app')
@section('title')
    Change Password
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
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-primary">
                            <i class="fa-solid fa-key"></i>
                            Change Password</h5>
                        <i class="fa-solid fa-ellipsis-vertical fa-1x" style="font-size: 23px"></i>
                    </div>
                    <hr>
                    <form action="{{ route('profile.changePasswordAccount') }}" method="post" >
                        @csrf
                        <div class="my-3">
                            <label for="current-password " class="mb-2 ">
                                <i class="fa-solid fa-lock"></i>
                                Current Password</label>
                            <input type="text" class="form-control  @error('current-password') is-invalid @enderror "
                                   name="current-password" value="{{ old('current-password') }}">
                            @error('current-password')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="new_password" class="mb-2">
                                <i class="fa-solid fa-key"></i>
                                New Password</label>
                            <input type="text" class="form-control  @error('new_password') is-invalid @enderror "
                                   name="new_password" value="{{ old('new_password') }}">
                            @error('new_password')
                            <b class="text-danger">{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="confirm-password" class="mb-2">
                                <i class="fa-solid fa-check"></i>
                                Confirm Password</label>
                            <input type="text" class="form-control  @error('confirm-password') is-invalid @enderror "
                                   name="confirm-password" value="{{ old('confirm-password') }}">
                            @error('confirm-password')
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
                            <button class="btn btn-outline-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
