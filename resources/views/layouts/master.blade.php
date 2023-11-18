<!doctype html>
<html lang="en" data-bs-theme="auto">

@include("inc.head")

    <body>
        
        @include("inc.darkMode")
        @include("inc.header")

        <main class="container">
            @include("inc.firstNew")

            
            <div class="row g-5">
                @yield("news")
                @include("inc.newsApi")
                @include("inc.usersNews")
            </div>

        </main>

        @include("inc.footer")
        @include("inc.script")

    </body>
</html>