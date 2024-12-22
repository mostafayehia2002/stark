@extends('dashboard.layouts.master',['title'=>trans('dashboard.show_admins')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_admins')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.show-admins')}}">{{trans('dashboard.show_admins')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.dashboard')}}">{{trans('dashboard.admins')}}</a></li>

                            <li class="breadcrumb-item active">{{trans('dashboard.users_management')}}</li>
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
                                    <th>#</th>
                                    <th>{{trans('label.full_name')}}</th>
                                    <th>{{trans('label.username')}}</th>
                                    <th>{{trans('label.email')}}</th>
                                    <th>{{trans('label.phone')}}</th>
                                    <th>{{trans('label.role')}}</th>
                                    <th>{{trans('label.status')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($admins as $admin)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
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
                                                <label
                                                    class="badge bg-success"> {{trans('enums.'.$admin->status)}}</label>
                                            @else
                                                <label
                                                    class="badge bg-danger"> {{trans('enums.'.$admin->status)}}</label>
                                            @endif
                                        </td>
                                        <td>{{$admin->created_at}}</td>
                                        <td>
                                            @can('admin-delete')
                                                <a href="{{ route('admin.delete-admin', ['id' => $admin->id]) }}"
                                                   title="{{trans('label.delete')}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to delete this admin?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                            @can('admin-edit')
                                                <a class="btn btn-primary btn-sm" title="{{trans('label.update')}}"
                                                   href="{{route('admin.edit-admin',['id'=>$admin->id])}}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('admin-block')
                                                @if($admin->status===\App\Enums\UserStatus::ACTIVE->value)
                                                    <a href="{{ route('admin.block-admin', ['id' => $admin->id]) }}"
                                                       class="btn btn-warning btn-sm"  title="{{trans('label.block')}}"
                                                       onclick="return confirm('Are you sure you block user');">
                                                        <i class="fas fa-ban"></i>
                                                    </a>
                                                @else
                                                        <a href="{{ route('admin.block-admin', ['id' => $admin->id]) }}"
                                                           class="btn btn-warning btn-sm"  title="{{trans('label.unblock')}}"
                                                           onclick="return confirm('Are you sure to unblock user');">
                                                            <i class="fas fa-unlock"></i>
                                                        </a>
                                                @endif

                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="8" class="text-center">{{trans('label.no_data_found')}}</td>
                                @endforelse

                                </tbody>
                            </table>

                            {{ $admins->links() }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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
                "autoWidth": true,
            });
        });
    </script>
@endpush
