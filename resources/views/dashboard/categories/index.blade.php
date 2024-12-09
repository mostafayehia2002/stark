@extends('dashboard.layouts.master',['title'=>'Admin Stark | Category'])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Show All Categories</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-category')}}">Categories</a></li>
                            <li class="breadcrumb-item active">Units Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @can('category-create')
                    <div class="col-sm-6">
                        <a href="#AddCategoryModal" data-toggle="modal" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            Add Category
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
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            @can('category-delete')
                                                <a href="{{route('admin.delete-category',$category->id)}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to do it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Delete
                                                </a>
                                            @endcan
                                            @can('category-update')
                                                <a href="#UpdateCategoryModal" data-toggle="modal"
                                                   class="btn btn-sm btn-primary" data-id="{{$category->id}}"
                                                   data-name="{{$category->name}}">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3" class="text-center">
                                        No Categories
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
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.store-category')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" id="category_name"
                                           placeholder="Category Name" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary"
                            >Add
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
        <!-- /.Add Category Model-->

        {{-- Add Category Model       --}}
        <div class="modal fade" id="UpdateCategoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Category</h4>
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
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" id="category_name"
                                           placeholder="Category Name" name="name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary"
                            >Update
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
                    "autoWidth": false,
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

