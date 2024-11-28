@extends('dashboard.layouts.master',['title'=>'Admin Stark | Show Admins'])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Show All Admins</h4>
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
                                        <td>
                                            @if(!empty($admin->getRoleNames()))
                                                @foreach($admin->getRoleNames() as $v)
                                                    <label class="badge bg-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($admin->status===\App\Enums\UserStatus::ACTIVE->value)
                                                <label class="badge bg-success"> {{$admin->status}}</label>
                                            @else
                                                <label class="badge bg-danger"> {{$admin->status}}</label>
                            @endif

                        </div>
                        <td>

                            <a href="{{ route('admin.delete-admin', ['id' => $admin->id]) }}"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this admin?');">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </a>
                            <a class="btn btn-primary btn-sm"
                               href="{{route('admin.edit-admin',['id'=>$admin->id])}}"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <a href="{{ route('admin.block-admin', ['id' => $admin->id]) }}"
                               class="btn btn-warning btn-sm"
                               onclick="return confirm('Are you sure you want do it');">
                                @if($admin->status===\App\Enums\UserStatus::ACTIVE->value)
                                    <i class="fas fa-ban"></i>
                                    Block
                                @else
                                    <i class="fas fa-unlock"></i>
                                   Un Block
                                @endif

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
