<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('common/head')
    </head>
    @yield('sass')
    <body>
        <div id="app">
            @yield('content')
        </div>
    </body>
    @yield('script')
</html>