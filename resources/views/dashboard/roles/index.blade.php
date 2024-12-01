
@extends('dashboard.layouts.master',['title'=>'Admin Stark | Show Roles'])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Role Management</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('role-list')
                            <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Show Roles</a></li>
                            @endcan
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
                            @can('role-create')
                                <a class="btn btn-success btn-sm mb-2" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                            @endcan
                        </div>
                    </div>
                </div>
            <div class="col-12">
                <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="100px">No</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{  $role->created_at->diffForHumans()}}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                @can('role-edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @endcan

                                @can('role-delete')
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $roles->links('pagination::bootstrap-5') !!}
            </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection





