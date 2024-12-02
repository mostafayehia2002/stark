@extends('dashboard.layouts.master',['title'=>'Admin Stark | Units'])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Show All Units</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Units</a></li>
                            <li class="breadcrumb-item active">Units Management</li>
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
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Owner</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($units as $unit)
                                    <tr>
                                        <td>{{$unit->title}}</td>
                                        <td>{{$unit->type}}</td>
                                        <td>{{$unit->price}}</td>
                                        <td>{{$unit->owner->email}}</td>
                                        <td>
                                            @if($unit->status==\App\Enums\UnitStatus::PENDING->value)
                                                <label class="badge bg-warning">{{$unit->status}}</label>
                                            @elseif($unit->status==\App\Enums\UnitStatus::REJECTED->value)
                                                <label class="badge bg-danger">{{$unit->status}}</label>
                                            @else
                                                <label class="badge bg-success">{{$unit->status}}</label>
                                            @endif
                                        </td>
                                        <td>{{$unit->created_at}}</td>
                                        <td>

                                            <a href="" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                                Details
                                            </a>
                                            <a href="" class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>Edit</a>

                                            <a href="" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to it?');">
                                                <i class="fa-solid fa-trash"></i>
                                                Delete
                                            </a>

                                            <a href="{{ route('admin.change-status', ['id' => $unit->id, 'status' => $unit->status]) }}"
                                               class="btn btn-sm {{ $unit->getButtonClass() }}"
                                               onclick="return confirm('Are you sure you want to change the status?');">
                                                <i class="fas {{ $unit->isAcceptable() ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                {{ $unit->isAcceptable() ? 'Accept' : 'Reject' }}
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="7" class="text-center">
                                        No Features
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $units->links() }}
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
                    "autoWidth": false,
                });
            });
        </script>
    @endpush

