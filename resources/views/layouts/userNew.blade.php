<!doctype html>
<html lang="en" data-bs-theme="auto">
@include("inc.head")
  <body>
    
    @include("inc.darkMode")

    @include("inc.header")

<main class="container">
    
    @yield("content")    

</main>

@include("inc.footer")
@include("inc.script")

    </body>
</html>