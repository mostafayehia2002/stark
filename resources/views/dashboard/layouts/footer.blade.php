<!-- Main Footer -->
<footer class="main-footer text-center" >
    <strong>Copyright &copy; {{date('Y')}} <a href="{{route('admin.dashboard')}}">{{app('settings')->getValue('general', 'site_name')??env('app_name')}}</a>.</strong>
    All rights reserved.
</footer>
