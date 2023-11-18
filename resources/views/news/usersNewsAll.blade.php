@extends("layouts.userNew")

@section("title")
    Users News
@endsection

@section('content')

    <h3 class="text-center mt-4 border-bottom pb-4 mb-5">Users Posts</h3>

    @foreach ($data as $el)

        <div class="card mb-3" style="max-height: 300px;">
            <a href="{{ route('usersNewsView', $idNew = $el->id) }}" class="text-decoration-none hover-animation">
                <div class="row g-0">
                    <div class="col-md-4 border-end d-flex justify-content-center container-hover-animation">
                        @if ($el->file)
                            <img src="/storage/{{ $el->file }}" class="img-fluid hover-animation-img rounded-start" style="height: 100%; max-height: 300px;" alt="...">
                        @else
                            <img src="/storage/files/noImage.png" class="img-fluid rounded-start" style="height: 100%; max-height: 300px;" alt="...">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $el->title }}</h5>
                            <p class="card-text text-body">{{ $el->description }}</p>
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    {{ \Carbon\Carbon::parse($el->published)->locale('ru')->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text text-body">Category: <b>{{ $el->category }}</b></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    @endforeach

@endsection