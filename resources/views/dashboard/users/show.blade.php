@extends('dashboard.layouts.master',['title'=>'Admin  | Show Users'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>{{trans('dashboard.show_user_profile_details')}}</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">{{trans('dashboard.profile')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('dashboard.users')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.users_management')}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('dashboard/dist/img/profile.jpg')}}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->full_name}}</h3>

                                <p class="text-muted text-center">{{$user->type}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>UserName</b> <a class="float-right">{{$user->username}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{$user->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right">{{$user->phone}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i>Business Name</strong>
                                <p class="text-muted">
                                    {{$user->business_name??'Not Added'}}
                                </p>
                                <hr>
                                <strong><i class="fas fa-book mr-1"></i>Business Licences</strong>
                                <p class="text-muted">
                                    {{$user->business_licences??'Not Added'}}
                                </p>
                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{$user->address??'Not Added'}}</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($user->units as $unit)
                                                    <tr>
                                                        <td>{{$unit->id}}</td>
                                                        <td>{{$unit->title}}</td>
                                                        <td>{{$unit->type}}</td>
                                                        <td>
                                                            @if($unit->status==\App\Enums\UnitStatus::PENDING->value)
                                                                <label class="badge bg-warning">{{$unit->status}}</label>
                                                            @elseif($unit->status==\App\Enums\UnitStatus::REJECTED->value)
                                                                <label class="badge bg-danger">{{$unit->status}}</label>
                                                            @else
                                                                <label class="badge bg-success">{{$unit->status}}</label>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            @can('unit-details')
                                                                <a href="{{route('admin.show-details',$unit->id)}}"
                                                                   class="btn btn-secondary btn-sm">
                                                                    <i class="fas fa-info-circle"></i>
                                                                    Details
                                                                </a>
                                                            @endcan
                                                            @can('unit-edit')
                                                                <a href="{{route('admin.edit-unit',$unit->id)}}"
                                                                   class="btn btn-primary btn-sm">
                                                                    <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                            @endcan
                                                            @can('unit-delete')
                                                                <a href="{{route('admin.delete-unit',$unit->id)}}"
                                                                   class="btn btn-danger btn-sm"
                                                                   onclick="return confirm('Are you sure you want to it?');">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                    Delete
                                                                </a>
                                                            @endcan
                                                            @can('unit-change-status')
                                                                <a href="{{ route('admin.change-status', ['id' => $unit->id, 'status' => $unit->status]) }}"
                                                                   class="btn btn-sm {{ $unit->getButtonClass() }}"
                                                                   onclick="return confirm('Are you sure you want to change the status?');">
                                                                    <i class="fas {{ $unit->isAcceptable() ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                                    {{ $unit->isAcceptable() ? 'Accept' : 'Reject' }}
                                                                </a>
                                                            @endcan

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td colspan="5" class="text-center">
                                                        No Features
                                                    </td>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.tab-pane -->

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- DataTables -->
    <script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {

            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
        });
    </script>
@endsection
