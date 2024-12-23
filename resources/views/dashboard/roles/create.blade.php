@extends('dashboard.layouts.master', ['title' => trans('dashboard.add_permission')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.create_new_role')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.show-admins') }}">{{trans('dashboard.add_permission')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{trans('dashboard.permissions')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.setting')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-arrow-left"></i> {{trans('label.back')}}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.roles.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{trans('label.role_name')}}:</strong>
                                        <input type="text" name="name" placeholder="{{trans('label.role_name')}}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{trans('label.permissions')}}:</strong>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input permission-checkbox" id="checkAll">
                                                <label class="custom-control-label" for="checkAll">{{trans('label.select_all')}}</label>
                                            </div>
                                        </div>
                                        <div class="permissions-list mt-3">
                                            @foreach($permission as $value)
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input permission-checkbox" id="customSwitch{{$value->id}}" name="permission[{{$value->id}}]" value="{{$value->id}}">
                                                        <label class="custom-control-label" for="customSwitch{{$value->id}}">{{translate_permission($value->name)}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3">
                                        <i class="fa-solid fa-floppy-disk"></i>{{trans('label.save')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the "Select All" checkbox
            const checkAll = document.getElementById('checkAll');

            // Get all the permission checkboxes
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            // Add event listener to "Select All" checkbox
            checkAll.addEventListener('change', function () {
                // When "Select All" is checked, check all permission checkboxes
                permissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = checkAll.checked;
                });
            });
        });
    </script>
@endpush
