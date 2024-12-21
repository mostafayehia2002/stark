@extends('dashboard.layouts.master',['title'=>'Admin | Show Role'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_roles')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">{{trans('dashboard.show_roles')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{trans('dashboard.permissions')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.setting')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <p class="text-muted">{{ $role->name }}</p>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permissions:</strong>
                                    <div class="d-flex flex-wrap">
                                        @if(!empty($rolePermissions))
                                            @foreach($rolePermissions as $v)
                                                <span class="badge badge-success mr-2 mb-2">{{ $v->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No permissions assigned</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
