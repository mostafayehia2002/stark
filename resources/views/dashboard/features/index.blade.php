@extends('dashboard.layouts.master',['title'=>'Admin Stark | Features'])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Show All Features</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.show-feature')}}">Features</a></li>
                            <li class="breadcrumb-item active">Units Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @can('feature-create')
                    <div class="col-sm-6">
                        <a href="#AddFeatureModal" data-toggle="modal" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            Add Feature
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
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($features as $feature)
                                    <tr>
                                        <td>{{$feature->id}}</td>
                                        <td>{{$feature->name}}</td>
                                        <td>{{$feature->category->name}}</td>
                                        <td>{{$feature->created_at}}</td>
                                        <td>
                                            @can('feature-delete')
                                                <a href="{{route('admin.delete-feature',$feature->id)}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to do it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Delete
                                                </a>
                                            @endcan
                                            @can('feature-update')
                                                <a href="#UpdateFeatureModal" data-toggle="modal"
                                                   class="btn btn-sm btn-primary"
                                                   data-feature_id="{{ $feature->id }}"
                                                   data-feature_name="{{ $feature->name }}"
                                                   data-category_id="{{ $feature->category->id}}"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                    Edit
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
                            {{ $features->links() }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

        {{-- Add Feature Model       --}}
        <div class="modal fade" id="AddFeatureModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Feature</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.store-feature')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Category Name</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="feature_name">Feature Name</label>
                                    <input type="text" class="form-control" id="feature_name"
                                           placeholder="Feature Name" name="feature_name"
                                           value="{{old('feature_name')}}">
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
        <!-- /.Add Feature Model-->

        {{-- Update Feature Model       --}}
        <div class="modal fade" id="UpdateFeatureModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Feature</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.update-feature')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Category Name</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="feature_id" id="feature_id" value="">
                                <div class="form-group">
                                    <label for="feature_name">Feature Name</label>
                                    <input type="text" class="form-control" id="feature_name"
                                           placeholder="Feature Name" name="feature_name" value="">
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
        <!-- /.Update Feature Model -->

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
            $('#UpdateFeatureModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                let category_id = button.data('category_id')
                let category_name = button.data('category_name')
                let feature_id = button.data('feature_id')
                let feature_name = button.data('feature_name')
                let modal = $(this)
                modal.find('.modal-body #category_id').val(category_id);
                modal.find('.modal-body #category_name').val(category_name);
                modal.find('.modal-body #feature_id').val(feature_id);
                modal.find('.modal-body #feature_name').val(feature_name);
            })
        </script>
    @endpush

