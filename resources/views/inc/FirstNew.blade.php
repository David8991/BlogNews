@if (!empty($data2))
    <div class="card text-bg-dark first-blog mt mb-4" style="max-height: 600px;">
        <img src="{{ $data2[0]->image_url }}" class="card-img rounded first-blog-img" alt="..." style="max-Height: 600px;">
        <div class="card-img-overlay first-blog-cont p-4 p-md-5 d-flex justify-content-between flex-column">
            <div class="col-lg-8">
                <h3 class="card-title mb-5">{{ $data2[0]->title }}</h3>
            <p class="card-text mb-3 lead my-3">{{ $data2[0]->description }}</p>
            </div>
            <div class="d-flex justify-content-around">
                <a href="{{ route('newView', $idNew = $data2[0]->title) }}" class="text-light fs-3 icon-link gap-1 text-decoration-none  icon-link-hover stretched-link">
                    Continue reading
                    <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                </a>
                <p class="card-text lead my-3"><small>{{ $data2[0]->pubDate }}</small></p>
            </div>
        </div>
    </div>
@endif
