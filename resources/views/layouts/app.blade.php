<!doctype html>
<html>
<head>
    @include('layouts.includes.head')
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-image="{{asset('dashboard/assets/img/sidebar-5.jpg')}}">
        @include('layouts.includes.menu')

    </div>
@yield('content')
</body>

@include('layouts.includes.footer')
</html>
