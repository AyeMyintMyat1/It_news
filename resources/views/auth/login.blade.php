@extends('layouts.app')
@section("title") Sign In @endsection
@section("content")
    <section class="main container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="my-5">
                    <div class="text-center mb-4">
                        {{--                    <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center me-2">--}}
                        {{--                        <i class="feather-shopping-bag text-white h4 mb-0"></i>--}}
                        {{--                    </span>--}}
                        {{--                        <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>--}}
                        <img src="{{ asset(\App\Base::$logo) }}" alt="" class="w-50" style="filter: drop-shadow(5px 5px 5px #00000020)">
                    </div>
                    <div class="border bg-white rounded-lg shadow-sm">
                        <div class="p-4">
                            <h2 class="text-center font-weight-normal">Sign In</h2>
                            <p class="text-center text-black-50 mb-4">
                                Don't have an account yet?
                                <a href="{{ route('register') }}">Sign up here</a>
                            </p>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <lable class="mb-3">Your Email</lable>
                                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <lable class="mb-3">Password</lable>
                                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label text-muted" for="remember"> Remember me</label>
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn  btn-block btn-primary ">Sign in</button>
                                </div>
                            </form>
                            <a href="{{ route('google.redirect') }}" class="btn  btn-success w-100 d-block mb-2">
                                <i class="fa-solid fa-g"></i>
                                Sign in with Google
                            </a>
                            <a href="{{ route('fb.redirect') }}" class="btn  btn-primary w-100 d-block mb-3">
                                <i class="feather-facebook"></i>
                                Sign in with Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
