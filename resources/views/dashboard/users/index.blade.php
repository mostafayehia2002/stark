@extends('dashboard.layouts.master',['title'=>'Admin Stark | Show Users'])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Show All Users</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Show Users</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Users</a></li>
                            <li class="breadcrumb-item active">Users Management</li>
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
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                            {{$user->type}}
                                        </td>
                                        <td>
                                            @if($user->status===\App\Enums\UserStatus::ACTIVE->value)
                                                <label class="badge bg-success"> {{$user->status}}</label>
                                            @else
                                                <label class="badge bg-danger"> {{$user->status}}</label>
                                                 @endif

                        <td>{{$user->created_at}}</td>
                        <td>
                            @can('user-delete')
                                <a href="{{route('admin.delete-user',$user->id)}}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this user?');">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </a>
                            @endcan
                            @can('user-detail')
                                <a class="btn btn-primary btn-sm"
                                   href="{{route('admin.details-user',$user->id)}}"> <i class="fas fa-eye"></i> details</a>
                            @endcan
                            @can('user-block')
                                <a href="{{route('admin.block-user',$user->id)}}"
                                   class="btn btn-warning btn-sm"
                                   onclick="return confirm('Are you sure you want do it');">
                                    @if($user->status===\App\Enums\UserStatus::ACTIVE->value)
                                        <i class="fas fa-ban"></i>
                                        Block
                                    @else
                                        <i class="fas fa-unlock"></i>
                                        Un Block
                                    @endif

                                </a>
                            @endcan
                        </td>
                        </tr>

                        @empty
                            <td colspan="8" class="text-center">No Data</td>
                            @endforelse
                            </tbody>

                            </table>
                            {{ $users->links() }}

                            </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        @endsection
    </div>
    @push('js')
        <!-- DataTables -->
        <script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <!-- page script -->
        <script>
            $(function () {

                $('#example1').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                });
            });
        </script>
    @endpush
