@extends('dashboard.layouts.master',['title'=>trans('dashboard.show_users')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_users')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">{{trans('dashboard.show_users')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.dashboard')}}">{{trans('dashboard.users')}}</a></li>
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
                                    <th>{{trans('label.username')}}</th>
                                    <th>{{trans('label.email')}}</th>
                                    <th>{{trans('label.phone')}}</th>
                                    <th>{{trans('label.type')}}</th>
                                    <th>{{trans('label.status')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                            {{$user->translate_type()}}
                                        </td>
                                        <td>
                                            @if($user->status===\App\Enums\UserStatus::ACTIVE->value)
                                                <label
                                                    class="badge bg-success"> {{ $user->translate_status() }}</label>
                                            @else
                                                <label class="badge bg-danger">{{$user->translate_status()}}</label>
                                        @endif

                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            @can('user-delete')
                                                <a href="{{route('admin.delete-user',$user->id)}}"
                                                   title="{{trans('label.delete')}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('{{translate_message('are_you_sure_delete')}}');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                            @can('user-detail')
                                                <a class="btn btn-primary btn-sm" title="{{trans('label.detail')}}"
                                                   href="{{route('admin.details-user',$user->id)}}"><i
                                                        class="fas fa-info-circle"></i></a>
                                            @endcan
                                            @can('user-block')
                                                @if($user->status===\App\Enums\UserStatus::ACTIVE->value)
                                                    <a href="{{route('admin.block-user',$user->id)}}"
                                                       class="btn btn-warning btn-sm" title="{{trans('label.block')}}"
                                                       onclick="return confirm('{{translate_message('are_you_sure_block')}}');">
                                                        <i class="fas fa-ban"></i>
                                                    </a>
                                                @else
                                                    <a href="{{route('admin.block-user',$user->id)}}"
                                                       class="btn btn-warning btn-sm" title="{{trans('label.unblock')}}"
                                                       onclick="return confirm('{{translate_message('are_you_sure_unblock')}}');">
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
