@extends('dashboard.layouts.master', ['title' => 'Admin Stark | Add Unit'])
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Add New Unit</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Add Unit</li>
                            <li class="breadcrumb-item"><a href="{{route('admin.show-unit')}}">Units Management</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.store-unit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Unit Information Section -->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Unit Information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Unit Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="{{ old('title') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" name="price" class="form-control"
                                           value="{{ old('price') }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Unit Type</label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="" disabled selected>Select Unit Type</option>
                                        @foreach(\App\Enums\UnitType::cases() as $unitType)
                                            <option value="{{ $unitType->value }}" @selected(old('type'))>
                                                {{ ucfirst($unitType->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="area">Area (in sqm)</label>
                                    <input type="number" id="area" name="area" class="form-control"
                                           value="{{ old('area') }}">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="number_bedroom">Number of Bedrooms</label>
                                    <input type="number" id="number_bedroom" name="number_bedroom" class="form-control"
                                           value="{{ old('number_bedroom') }}">
                                    @error('number_bedroom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="number_bathroom">Number of Bathrooms</label>
                                    <input type="number" id="number_bathroom" name="number_bathroom"
                                           class="form-control" value="{{ old('number_bathroom') }}">
                                    @error('number_bathroom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                           value="{{ old('address') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control"
                                              rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- Budget Section -->
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Features</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Features</strong></label>
                                    <div class="row">
                                        @foreach ($featuresByCategory as $categoryName => $features)
                                            <div class="col-md-6">
                                                <h6><strong>{{ $categoryName }}</strong></h6>
                                                @foreach ($features as $feature)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="features[]" value="{{ $feature->id }}"
                                                               id="feature_{{ $feature->id }}">
                                                        <label class="form-check-label"
                                                               for="feature_{{ $feature->id }}">
                                                           {{ $feature->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                            @error('features')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Images</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><strong>Image</strong></label>
                                        <div class="row">
                                            <input class="form-control" type="File" name="image[]" multiple accept="image/*">
                                            @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>


                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Add Unit" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('css')
    <style>
        .form-check {
            margin-bottom: 10px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
@endpush
