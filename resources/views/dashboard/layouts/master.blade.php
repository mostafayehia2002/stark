<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/jpg" href="{{asset('storage/uploads/settings/'.app('settings')->getValue('general','site_logo'))??asset('build/assets/logo-nav-9xhMEncz.jpg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--include  css style   --}}
    @include('dashboard.layouts.styles')
    <title>{{$title??'Admin Stark | 404 not found'}}</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    {{--1 include navbar--}}
    @include('dashboard.layouts.navbar')
    {{--2 include sidebar--}}

    @include('dashboard.layouts.sidebar')

    {{--page content--}}
    @yield('content')


    {{-- include footer--}}
    @include('dashboard.layouts.footer')
</div>
{{-- include scripts--}}
@include('dashboard.layouts.scripts')
</body>
</html>
