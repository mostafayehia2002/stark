@extends('dashboard.layouts.master',['title'=>'Admin Stark | Edit Role'])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Edit Role</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-admins')}}">Edit Role</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Permissions</a></li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.roles.index') }}"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" placeholder="Name" class="form-control"
                                               value="{{ $role->name }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permission:</strong>
                                        <br/>
                                        @foreach($permission as $value)
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input permission-checkbox" id="customSwitch{{$value->id}}" name="permission[{{$value->id}}]" value="{{$value->id}}"
                                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}
                                                    >
                                                    <label class="custom-control-label" for="customSwitch{{$value->id}}" >{{ $value->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                            class="fa-solid fa-floppy-disk"></i> Submit
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

