@extends('dashboard.layouts.master',['title'=>trans('dashboard.features')])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.show_all_features')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.show-feature')}}">{{trans('dashboard.features')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.units_management')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @can('feature-create')
                    <div class="col-sm-6">
                        <a href="#AddFeatureModal" data-toggle="modal" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            {{trans('dashboard.add_feature')}}
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
                                    <th>{{trans('label.feature_name')}}</th>
                                    <th>{{trans('label.category_name')}}</th>
                                    <th>{{trans('label.created_at')}}</th>
                                    <th>{{trans('label.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($features as $feature)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$feature->name}}</td>
                                        <td>{{$feature->category->name}}</td>
                                        <td>{{$feature->created_at}}</td>
                                        <td>
                                            @can('feature-delete')
                                                <a href="{{route('admin.delete-feature',$feature->id)}}"
                                                   title="{{trans('label.delete')}}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to do it?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endcan
                                            @can('feature-update')
                                                <a href="#UpdateFeatureModal" data-toggle="modal"
                                                   title="{{trans('label.update')}}"
                                                   class="btn btn-sm btn-primary"
                                                   data-feature_id="{{ $feature->id }}"
                                                   data-feature_name="{{ $feature->name }}"
                                                   data-category_id="{{ $feature->category->id}}"
                                                >
                                                    <i class="fas fa-edit"></i>
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
                        <h4 class="modal-title">{{trans('dashboard.add_feature')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.store-feature')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">{{trans('label.category_name')}}:</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="feature_name">{{trans('label.feature_name')}}:</label>
                                    <input type="text" class="form-control" id="feature_name"
                                           placeholder="{{trans('label.feature_name')}}" name="feature_name"
                                           value="{{old('feature_name')}}">
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
        <!-- /.Add Feature Model-->

        {{-- Update Feature Model       --}}
        <div class="modal fade" id="UpdateFeatureModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> {{trans('dashboard.update_feature')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.update-feature')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">{{trans('label.category_name')}}:</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="feature_id" id="feature_id" value="">
                                <div class="form-group">
                                    <label for="feature_name">{{trans('label.feature_name')}}:</label>
                                    <input type="text" class="form-control" id="feature_name"
                                           placeholder="{{trans('label.feature_name')}}" name="feature_name" value="">
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
                    "autoWidth": true,
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

