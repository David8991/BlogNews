<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <h4 class="fst-italic d-flex justify-content-between">
            Users posts
            <a href="{{ route('usersNewsAll') }}" class="fs-5 icon-link gap-1 icon-link-hover">
                View all
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
        </h4>
        <ul class="list-unstyled">
            @if ( isset($userData) )
                @for ( $i=0; $i < 5; $i++ )
                    @if (!empty($userData[$i]))
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center 
                            py-3 p-1 link-body-emphasis text-decoration-none border-top new-a" 
                            href="{{ route('usersNewsView', $idNew = $userData[$i]->id) }}">
                                <div class="bd-placeholder-img new-img-cont" width="100%" height="100">
                                    @if (isset($userData[$i]->file))
                                        <img src="/storage/{{ $userData[$i]->file }}" 
                                        alt="" width="100%" class="new-img">
                                    @else 
                                        <img src="/storage/files/noImage.png" 
                                        alt="" width="100%">
                                    @endif
                                </div>
                                <div class="col-lg-8">
                                    <h6 class="mb-2">{{ $userData[$i]->title }}</h6>
                                    <small class="text-body-secondary d-flex justify-content-between">
                                        {{ \Carbon\Carbon::parse($userData[$i]->published)->locale('ru')->diffForHumans() }}
                                        <b>{{ $userData[$i]->category }}</b>
                                    </small>
                                </div>
                            </a>
                        </li>
                    @else
                        @break
                    @endif
                @endfor
            @endif
        </ul>
    </div>
</div>
