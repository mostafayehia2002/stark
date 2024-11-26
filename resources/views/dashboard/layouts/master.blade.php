<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--include  css style   --}}
    @include('dashboard.layouts.styles')
    <title>{{$title??'404 not found'}}</title>
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
