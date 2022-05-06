@extends('layouts.app')
@section("title") Create Account @endsection
@section('content')
    <section class="main container ">
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
                    <div class="border bg-white rounded-3 shadow-sm">
                        <div class="p-4">
                          <div class="mb-3">
                              <h2 class="text-center font-weight-normal">Create Account</h2>
                              <p class="text-center text-black-50 mb-4">
                                  Already have an account?
                                  <a href="{{ route('login') }}">Sign in here</a>
                              </p>
                          </div>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Full Name</label>
                                    <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="accept-terms" name="accept-terms" required>
                                        <label class="custom-control-label text-muted" for="accept-terms">
                                            I accept the <a href="#">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                                </div>
                            </form>

                                <a href="#" class="btn  btn-success w-100 d-block mb-2">
                                    <i class="fa-solid fa-g"></i>
                                    Sign in with Google
                                </a>
                            <a href="#" class="btn  btn-primary w-100 d-block ">
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
