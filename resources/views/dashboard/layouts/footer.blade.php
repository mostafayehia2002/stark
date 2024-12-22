<!-- Main Footer -->
<footer class="main-footer text-center" >
    <strong>{{trans('dashboard.copyright')}} &copy; {{date('Y')}} <a href="{{route('admin.dashboard')}}">{{app('settings')->getValue('general', 'site_name')??env('app_name')}}</a>.</strong>
   {{trans('dashboard.all_rights_reserved')}}
</footer>
