@extends('blog.master')
@section('content')
    @forelse($articles as $article)
        <div class="">
            <div class=" article-preview">
                <div class="p-0 p-md-3 ">
                    <a class="fw-bold h4 d-block text-decoration-none"
                       href="{{ route('detail',$article->id) }}">
                        {{ $article->title }} </a>

                    <div class="small post-category mb-3">
                        <a href="{{ route('baseOnCategory',$article->category->id) }}" rel="category tag">{{ $article->category->title }}</a> </div>

{{--                    <div class="my-3 feature-image-box">--}}
{{--                        <img width="1024" height="682"--}}
{{--                             src="assets/images/de0d23dd-86f6-3ee1-a871-6325fb45bd06-1024x682.jpg"--}}
{{--                             class="attachment-large size-large wp-post-image" alt=""></div>--}}

                    <div class="text-black-50 the-excerpt">
                        <p> {{ \Illuminate\Support\Str::words($article->description,50) }}</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center see-more-group">
                        <div class="d-flex align-items-center">
                            <img alt="" src="{{ asset('small/'.$article->user->photo) }}"
                                 class="avatar avatar-50 photo rounded-circle">
                            <div class="ms-2">
                                    <span class="small">
                                       {{ $article->user->name }}
                                    </span>
                                <br>
                                <span class="small">{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <a href="{{ route('detail',$article->id) }}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                    </div>
                </div>
            </div>
            <p class=" mb-0" style="height: 1px;border-bottom: 1px solid #00000050;">
        </div>

    @empty
        <div class="mb-4 pb-4">
            <div class="py-5 my-5 text-center text-lg-start">
                <p class="fw-bold text-primary">Dear Viewer</p>
                <h1 class="fw-bold">
                    There is no article 😔 ...
                </h1>
                <p>Please go back to Home Page</p>
                <a class="btn btn-outline-primary rounded-pill px-3" href="{{ route('index') }}">
                    <i class="feather-home"></i>
                    Blog Home
                </a>

            </div>
        </div>
    @endforelse
@endsection
@section('pagination-place')
    <div class="pagination">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </div>
@endsection
