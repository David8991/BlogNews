<div class="container">
    <header class="border-bottom lh-1 py-3" itemscope itemtype="https://schema.org/WPHeader">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                @auth
                    <a class="btn btn-sm btn-outline-secondary ms-2 px-5" href="{{ route('addNew', $idUser = Auth::id()) }}">Add New</a>
                @endauth
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{ route('home') }}">Blog News</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-outline-secondary ms-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary ms-2">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-secondary ms-2">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-between" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <a class="nav-item nav-link link-body-emphasis" aria-current="page" href="{{ route('newsWorld') }}">World</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsRussia') }}">Russia</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsEconomy') }}">Economy</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsTechnology') }}">Technology</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsPolitics') }}">Politics</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsSport') }}">Sport</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsHealth') }}">Health</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('newsStyle') }}">Style</a>
        </nav>
    </div>
</div>