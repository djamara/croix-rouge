<html>
    <head>
        <title>e-Croix Rouge 2.0 - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            @include('header')
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
    <footer>
        @section('footer')
            @include('footer')
        @show
    </footer>
</html>

