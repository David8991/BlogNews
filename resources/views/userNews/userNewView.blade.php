<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row g-5">
                    <div class="col-md-8 mx-auto my-5">
                        <div class="mt-5">
                            <h2 class="text-primary mb-3 fs-3">{{ $data->title }}</h2>
                            <p class="blog-post-meta mb-3">
                                Опубликовано: {{ \Carbon\Carbon::parse($data->published)->locale('ru')->diffForHumans() }}
                            </p>
                            <div class="d-flex justify-content-between  mb-3">
                                @if(isset($data->creator))
                                    <p class="blog-post-meta">Автор: <b>{{ $data->creator }}</b></p>
                                @endif
                                <p class="blog-post-meta">Категория: <b>{{ $data->category }}</b></p>
                            </div>
                        </div>
                        
                        @if(isset($data->file))
                            <img  src="/storage/{{ $data->file }}" class="mb-3" alt="" width="100%">
                        @endif
                        <div>{!! $data->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>