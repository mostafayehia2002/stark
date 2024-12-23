@extends('dashboard.layouts.master',['title'=>trans('dashboard.messages')])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.see_all_messages')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-message')}}">{{trans('dashboard.messages')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.support')}}</li>
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
                                    <th>{{trans('label.full_name')}}</th>
                                    <th>{{trans('label.email')}}</th>
                                    <th>{{trans('label.is_user')}}</th>
                                    <th>{{trans('label.message')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->full_name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>
                                            @if($contact->is_user==1)
                                                <label class="badge bg-success">{{trans('label.yes')}}</label>
                                              @else
                                                <label class="badge bg-danger">{{trans('label.no')}}</label>
                                        @endif
                                        </td>
                                        <td>
                                            @can('message-read')
                                            <a href="#exampleModal{{$contact->id}}" data-toggle="modal" class="btn btn-sm {{ $contact->is_read ? 'btn-secondary' : 'btn-primary' }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                                <div class="modal fade" id="exampleModal{{$contact->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{trans('dashboard.show_message')}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                                        onclick="location.href='{{ route('admin.read-message', $contact->id) }}'"
                                                                >
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{$contact->message}}</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                                                        onclick="location.href='{{ route('admin.read-message', $contact->id) }}'"
                                                                >{{trans('label.save')}}</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            @endcan
                                        </td>
                                        <td>{{$contact->created_at}}</td>
                                        <td>
                                            @can('message-delete')
                                            <a href="{{route('admin.delete-message',$contact->id)}}"
                                               title="{{trans('label.delete')}}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to do it?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>

                                @empty
                                    <td  colspan="6" class="text-center">{{trans('label.no_data_found')}}</td>
                                @endforelse
                                </tbody>

                            </table>
                            {{ $contacts->links() }}

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

