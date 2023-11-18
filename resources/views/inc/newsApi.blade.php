<div class="col-md-8">
    @foreach($data as $el)
        <div class="card mb-2 news-api-card">
            <a href="{{ route('newView', $idNew = $el->title) }}" class="text-decoration-none link-body-emphasis">
                <div class="card-header news-api-card-header">
                    Published: {{ \Carbon\Carbon::parse($el->pubDate)->diffForHumans() }}
                </div>
                <div class="card-body news-api-card-body">
                    <h5 class="card-title text-center mb-3">{{ $el->title }}</h5>
                    <p class="card-text">{{ $el->description }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>