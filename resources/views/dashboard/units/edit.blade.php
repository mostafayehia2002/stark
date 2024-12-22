@extends('dashboard.layouts.master', ['title' =>trans('dashboard.update_unit')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>{{trans('dashboard.update_unit')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{trans('dashboard.update_unit')}}</li>
                            <li class="breadcrumb-item"><a href="{{route('admin.show-unit')}}">{{trans('dashboard.units_management')}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.update-unit',$unit->id)}}" method="POST" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row">
                    <!-- Unit Information Section -->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('dashboard.unit_information')}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">{{trans('label.unit_title')}}:</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="{{ old('title' ,$unit->title)}}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">{{trans('label.price')}}:</label>
                                    <input type="number" id="price" name="price" class="form-control"
                                           value="{{ old('price',$unit->price) }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">{{trans('label.type')}}:</label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="" disabled selected>Select Unit Type</option>
                                        @foreach(\App\Enums\UnitType::cases() as $unitType)
                                            <option value="{{ $unitType->value }}" @selected(old('type', $unit->type) == $unitType->value) >
                                                {{trans('enums.'.ucfirst($unitType->name))  }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="area">{{trans('label.area')}}:</label>
                                    <input type="number" id="area" name="area" class="form-control"
                                           value="{{ old('area',$unit->area) }}">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="number_bedroom">{{trans('label.number_of_bedrooms')}}{{trans('label.optional')}}:</label>
                                    <input type="number" id="number_bedroom" name="number_bedroom" class="form-control"
                                           value="{{ old('number_bedroom' ,$unit->number_bedroom )}}">
                                    @error('number_bedroom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="number_bathroom">{{trans('label.number_of_bathrooms')}}{{trans('label.optional')}}:</label>
                                    <input type="number" id="number_bathroom" name="number_bathroom"
                                           class="form-control"
                                           value="{{ old('number_bathroom' ,$unit->number_bathroom) }}">
                                    @error('number_bathroom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">{{trans('label.address')}}:</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                           value="{{ old('address',$unit->address )}}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">{{trans('label.description')}}:</label>
                                    <textarea id="description" name="description" class="form-control"
                                              rows="4">{{ old('description',$unit->description)}}</textarea>
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
                                <h3 class="card-title">{{trans('dashboard.features')}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>{{trans('dashboard.features')}}</strong></label>
                                    <div class="row">
                                        @foreach ($featuresByCategory as $categoryName => $features)
                                            <div class="col-md-6">
                                                <h6><strong>{{ $categoryName }}</strong></h6>
                                                @foreach ($features as $feature)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="features[]" value="{{ $feature->id }}"
                                                               id="feature_{{ $feature->id }}" @checked($unit->features->contains($feature->id))>
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
                                <h3 class="card-title">{{trans('dashboard.images')}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>{{trans('dashboard.images')}}</strong></label>
                                    <div class="row">
                                        <input class="form-control" type="File" name="image[]" multiple
                                               accept="image/*">
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
                        <input type="reset" class="btn btn-danger" value="{{trans('label.reset')}}">
                        <input type="submit" value="{{trans('label.update')}}" class="btn btn-success float-right" id="submitBtn">
                    </div>
                </div>
            </form>
            @include('dashboard.layouts.spanner')
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
