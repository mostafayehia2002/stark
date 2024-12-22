@extends('dashboard.layouts.master',['title'=>trans('dashboard.show_booking')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_booking')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">{{trans('dashboard.show_booking')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.booking')}}</li>
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
                                    <th>{{trans('label.booking_request_id')}}</th>
                                    <th>{{trans('label.booking_date')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$booking->booking_request_id}}</td>
                                        <td>{{$booking->confirmed_date}}</td>
                                        <td>{{$booking->created_at}}</td>
                                        <td>
                                            @can('booking-details')
                                                <a href="{{route('admin.details-booking',$booking->booking_request_id)}}"
                                                   class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            @endcan
                                            @can('booking-delete')
                                                <a href="{{route('admin.delete-booking',$booking->id)}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="5" class="text-center">
                                        {{trans('label.no_data_found')}}
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $bookings->links() }}
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

