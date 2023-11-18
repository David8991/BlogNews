@extends("layouts.userNew")

@section("title")
    {{ $data->title }}
@endsection

@section('content')

    <div class="row g-5">
        <div class="col-md-8 mx-auto my-5">
            <div class="mt-5">
                <h2 class="text-primary mb-3 fs-3">{{ $data->title }}</h2>
                <p class="blog-post-meta mb-3">
                    Published: {{ \Carbon\Carbon::parse($data->published)->locale('ru')->diffForHumans() }}
                </p>
                <div class="d-flex justify-content-between  mb-3">
                    @if(isset($data->creator))
                        <p class="blog-post-meta">Author: <b>{{ $data->creator }}</b></p>
                    @endif
                    <p class="blog-post-meta">Category: <b>{{ $data->category }}</b></p>
                </div>
            </div>
            
            @if(isset($data->file))
                <img  src="/storage/{{ $data->file }}" class="mb-3" alt="" width="100%">
            @endif
            <div>{!! $data->content !!}</div>
            <hr>
            @if(count($comment) >= 1)
                <h2 class="text-center mb-3">Comments ({{ count($comment) }})</h2>
            @else 
                <h2 class="text-center mb-3">Comments (0)</h2>
            @endif
            @include("inc.commentsDiv")
            @if(Auth::user())
                @include("inc.comments")
            @else
                <p>Чтобы оставить комментарий <a href="{{ route('login') }}">войдите</a> в свой профиль или <a href="{{ route('register') }}">зарегистрируйтесь</a>!</p>
            @endif
        </div>
    </div>

@endsection

