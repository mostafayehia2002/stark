@extends('dashboard.layouts.master',['title'=>trans('dashboard.units')])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_units')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-unit')}}">{{trans('dashboard.units')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.units_management')}}</li>
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
                                    <th>{{trans('label.title')}}</th>
                                    <th>{{trans('label.type')}}</th>
                                    <th>{{trans('label.price')}}</th>
                                    <th>{{trans('label.owner')}}</th>
                                    <th>{{trans('label.status')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($units as $unit)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$unit->title}}</td>
                                        <td>{{trans('enums.'.$unit->type)}}</td>
                                        <td>{{$unit->price}}</td>
                                        <td>{{$unit->owner->email}}</td>
                                        <td>
                                            @if($unit->status==\App\Enums\UnitStatus::PENDING->value)
                                                <label class="badge bg-warning">{{trans('enums.'.$unit->status)}}</label>
                                            @elseif($unit->status==\App\Enums\UnitStatus::REJECTED->value)
                                                <label class="badge bg-danger">{{trans('enums.'.$unit->status)}}</label>
                                            @else
                                                <label class="badge bg-success">{{trans('enums.'.$unit->status)}}</label>
                                            @endif
                                        </td>
                                        <td>{{$unit->created_at}}</td>
                                        <td>

                                            @can('unit-details')
                                                <a href="{{route('admin.show-details',$unit->id)}}" title="{{trans('label.detail')}}"
                                                   class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            @endcan
                                            @can('unit-edit')
                                                <a href="{{route('admin.edit-unit',$unit->id)}}" title="{{trans('label.update')}}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('unit-delete')
                                                <a href="{{route('admin.delete-unit',$unit->id)}}" title="{{trans('label.delete')}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                            @can('unit-change-status')
                                                <a href="{{ route('admin.change-status', ['id' => $unit->id, 'status' => $unit->status]) }}"
                                                   class="btn btn-sm {{ $unit->getButtonClass() }}" title="{{trans('label.change_status')}}"
                                                   onclick="return confirm('Are you sure you want to change the status?');">
                                                    <i class="fas {{ $unit->isAcceptable() ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                    {{ $unit->isAcceptable() ? trans('enums.accept') :trans('enums.reject')  }}
                                                </a>
                                            @endcan

                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="7" class="text-center">
                                        {{trans('label.no_data_found')}}
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
                    "autoWidth": true,
                });
            });
        </script>
    @endpush

