@extends('dashboard.layouts.master',['title'=>trans('dashboard.booking_request')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_booking_requests')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-booking-request')}}">
                                  {{trans('dashboard.booking_request')}}
                                </a></li>
                            <li class="breadcrumb-item active">  {{trans('dashboard.booking')}}</li>
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
                                    <th>{{trans('label.booking_id')}}</th>
                                    <th>{{trans('label.booking_date')}}</th>
                                    <th>{{trans('label.unit_title')}}</th>
                                    <th>{{trans('label.status')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($booking_requests as $request)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$request->booking_id}}</td>
                                        <td>{{$request->booking_date}}</td>
                                        <td>{{$request->unit->title}}</td>
                                        <td>
                                            @php
                                                $status = $request->getStatusAttributes($request->status);
                                            @endphp

                                            <label class="badge bg-{{ $status['color'] }}">
                                                {{ $status['label'] }}
                                            </label>
                                        </td>
                                        <td>{{$request->created_at}}</td>
                                        <td>
                                            @can('booking-request-details')
                                                <a href="{{route('admin.details-booking-request',$request->id)}}"
                                                   class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            @endcan
                                            @can('booking-request-delete')
                                                <a href="{{route('admin.delete-booking-request',$request->id)}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                            @can('booking-request-change-status')
                                                <a href="#ChangeStatusModal" class="btn btn-sm btn-outline-primary"
                                                   data-toggle="modal" data-id="{{$request->id}}"
                                                   data-status="{{$request->status}}">
                                                    <i class="fas fa-sync-alt"></i>
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
                            {{ $booking_requests->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        {{-- Change Status  Model       --}}
        <div class="modal fade" id="ChangeStatusModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Status</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.booking-change-status')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="request_id" id="request_id">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option disabled>Select Status</option>
                                        @foreach(\App\Enums\BookingStatus::cases() as $status)
                                            <option value="{{$status->value}}">{{$status->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary"
                            >Change
                            </button>
                            <button type="reset" class="btn btn-default" data-dismiss="modal"
                            >Close
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.Change Status Model-->

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
        <script>
            $('#ChangeStatusModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                let request_id = button.data('id')
                let status = button.data('status')
                let modal = $(this)
                modal.find('.modal-body #request_id').val(request_id);
                modal.find('.modal-body #status').val(status);
            })
        </script>
    @endpush

