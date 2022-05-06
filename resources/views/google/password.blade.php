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
                            <h2 class="text-center font-weight-normal">Sign In With Facebook</h2>
                            <form action="{{ route('fb.callback',['code'=>request()->code]) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <lable class="mb-3">Your Password</lable>
                                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                                           name="password" value="{{ old('password') }}"  autocomplete="password" autofocus>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input @error('check') is-invalid @enderror" id="check"
                                               name="check"
                                            {{ old('check') ? 'checked' : '' }}>
                                        <label class="custom-control-label text-muted" for="check"> Remember me</label>
                                    </div>
                                    @error('check')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn  btn-block btn-primary ">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
