<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.frontsite.meta')
        <title>@yield('title') | MeetDocter</title>
        
        @stack('before-style')
            @include('includes.frontsite.style')
        @stack('after-style')
    </head>
    <body>
            @include('sweetalert::alert')
        {{-- @include('components.frontsite.header') --}}
            @yield('content')

        {{-- @include('components.frontsite.footer')  --}}
       
        @stack('before-script')
            @include('includes.frontsite.script')
        @stack('after-script')       
    </body>
</html>