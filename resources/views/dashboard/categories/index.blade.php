@extends('dashboard.layouts.master',['title'=>trans('dashboard.categories')])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_categories')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-category')}}">{{trans('dashboard.categories')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.units_management')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @can('category-create')
                    <div class="col-sm-6">
                        <a href="#AddCategoryModal" data-toggle="modal" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            {{trans('dashboard.add_category')}}
                        </a>
                    </div>
                @endcan
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
                                    <th>{{trans('label.category_name')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            @can('category-delete')
                                                <a href="{{route('admin.delete-category',$category->id)}}" title="{{trans('label.delete')}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to do it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                            @can('category-update')
                                                <a href="#UpdateCategoryModal" data-toggle="modal" title="{{trans('label.update')}}"
                                                   class="btn btn-sm btn-primary" data-id="{{$category->id}}"
                                                   data-name="{{$category->name}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3" class="text-center">
                                        {{trans('label.no_data_found')}}
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

        {{-- Add Category Model       --}}
        <div class="modal fade" id="AddCategoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{trans('dashboard.add_category')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.store-category')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">{{trans('label.category_name')}}:</label>
                                    <input type="text" class="form-control" id="category_name"
                                           placeholder="{{trans('label.category_name')}}" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary"
                            >{{trans('label.create')}}
                            </button>
                            <button type="reset" class="btn btn-default" data-dismiss="modal"
                            >{{trans('label.reset')}}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.Add Category Model-->

        {{-- Add Category Model       --}}
        <div class="modal fade" id="UpdateCategoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{trans('dashboard.update_category')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.update-category')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <input type="hidden" id="category_id" name="id" value="">
                                <div class="form-group">
                                    <label for="category_name">{{trans('label.category_name')}}:</label>
                                    <input type="text" class="form-control" id="category_name"
                                           placeholder="{{trans('label.category_name')}}" name="name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary"
                            >{{trans('label.update')}}
                            </button>
                            <button type="reset" class="btn btn-default" data-dismiss="modal"
                            >{{trans('label.reset')}}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.Add Category Model-->

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
            $('#UpdateCategoryModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                let id = button.data('id')
                let name = button.data('name')
                let modal = $(this)
                modal.find('.modal-body #category_id').val(id);
                modal.find('.modal-body #category_name').val(name);
            })
        </script>
    @endpush

