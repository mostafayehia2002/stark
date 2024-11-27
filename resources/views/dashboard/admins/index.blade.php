@extends('dashboard.layouts.master',['title'=>'Admin Stark | Show Admins'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-admins')}}">Show Admins</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admins</a></li>
                            <li class="breadcrumb-item active">Management</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Show All Admins</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($admins as $admin)
                                    <tr>
                                        <td>{{$admin->full_name}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>admin</td>
                                        <td>{{$admin->status}}</td>
                                        <td>
                                            <a href="{{route('admin.edit-admin',['id'=>$admin->id])}}">edit</a>
                                            <a href="{{ route('admin.delete-admin', ['id' => $admin->id]) }}"
                                               onclick="return confirm('Are you sure you want to delete this admin?');">
                                                delete
                                            </a>

                                        </td>
                                    </tr>

                                @empty
                                    <th>No Data</th>
                                @endforelse
                                </tbody>

                            </table>

                            {{ $admins->links() }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

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
                "autoWidth": false,
            });
        });
    </script>
@endpush
