<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

@include('layouts.partials.nav-bar')

<!--Main layout-->
<main class="container-fluid mt-70px" >
    <div class="container pt-5">
        @yield('content')
    </div>
</main>