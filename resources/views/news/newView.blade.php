<!doctype html>
<html lang="en" data-bs-theme="auto">
@section("title")
    {{ $data[0]->title }}
@endsection

@include("inc.head")

    <body>
        
        @include("inc.darkMode")

        @include("inc.header")

        <main class="container">
            <div class="row g-5">
                <div class="col-md-8">
                    <h3 class="text-primary">{{ $data[0]->title }}</h3>
                    <p class="blog-post-meta">{{ $data[0]->pubDate }}</p>
                    @if(isset($data[0]->creator))
                        <p class="blog-post-meta">Автор: {{ $data[0]->creator[0] }}</p>
                    @endif
                    @if(isset($data[0]->image_url))
                        <img  src="{{ $data[0]->image_url }}" class="mb-3" alt="" width="100%">
                    @endif
                    <p>{{ $data[0]->content }}</p>
                    @if(isset($data[0]->video_url))
                        <video src="{{ $data[0]->video_url }}" class="mb-3"></video>
                    @endif
                </div>

                @include("inc.usersNews")

            </div>
        </main>

        @include("inc.footer")
        @include("inc.script")

    </body>
</html>