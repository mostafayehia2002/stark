@extends('dashboard.layouts.master',['title'=>'Admin Stark | Booking'])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Show All Booking </h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Show Booking</a></li>
                            <li class="breadcrumb-item active">Booking</li>
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
                                    <th>Booking Request Id</th>
                                    <th>Booking Date</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{$booking->id}}</td>
                                        <td>{{$booking->booking_request_id}}</td>
                                        <td>{{$booking->confirmed_date}}</td>
                                        <td>{{$booking->created_at}}</td>
                                        <td>
                                            @can('booking-details')
                                                <a href="{{route('admin.details-booking',$booking->booking_request_id)}}"
                                                   class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                    Details
                                                </a>
                                            @endcan
                                            @can('booking-delete')
                                                <a href="{{route('admin.delete-booking',$booking->id)}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Delete
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="5" class="text-center">
                                        No Booking
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
                    "autoWidth": false,
                });
            });
        </script>
    @endpush

