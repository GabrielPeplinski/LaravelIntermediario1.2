<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@include('layouts.partials.nav-bar')

<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container pt-4">
        @yield('content')
    </div>
</main>