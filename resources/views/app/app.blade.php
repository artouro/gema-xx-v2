<!DOCTYPE html>
<html>
    <head>
        @include('templates.header')
        @stack('css')
    </head>
    <body>    
        @include('templates.navbar')
        @include('templates.sidebar')
            @yield('content')
        @stack('js')
        @include('templates.footer')
    </body>
</html>