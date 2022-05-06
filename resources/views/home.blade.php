@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <div class="">
                            <i class="fa-solid fa-home"></i>
                            <button class="btn btn-outline-success test">Click</button>
                            <div class="my-3">
                                {{ \App\Base::$name }}
                            </div>
                            <div class="my-3">
                                {{ \App\Base::$description }}
                            </div>
                            <div class="my-3">
                                {{ env('APP_Name') }}
                            </div>
                            <div class="my-3">
                                {{date('d-m-y|h:i A')}}
                            </div>
                            <div class="my-3">
                                <select  class="form-select mt-2 ">
                                    <option value="">Select Category</option>
                                    @foreach(\App\Category::all()->pluck('id')  as $category)
                                        <option {{$category==1?'selected':''}}>{{ $category}}</option>
                                    @endforeach
                                </select>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ipsum tempora tempore! Aliquid debitis ea e
                                um fugiat neque nesciunt nulla qui tenetur? Commodi
                                ducimus eaque mollitia numquam. Explicabo, hic, voluptatibus!
                                {{ \App\Category::all()->pluck('id') }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
    <script>
        $('.test').click(function(){
            alert('Hello Welcome from Home');
        });
    </script>
@endsection
