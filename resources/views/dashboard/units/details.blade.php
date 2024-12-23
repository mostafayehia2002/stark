@extends('dashboard.layouts.master',['title'=>trans('dashboard.unit_details')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>{{trans('dashboard.unit_details')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">{{trans('dashboard.unit_details')}}</li>
                            <li class="breadcrumb-item"><a href="{{route('admin.show-unit')}}">{{trans('dashboard.units_management')}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="text-right mb-3">
                <button class="btn btn-secondary btn-sm" onclick="window.print()">
                    <i class="fas fa-print"></i> {{trans('label.print')}}
                </button>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <!-- Unit Information -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5><i class="fas fa-info-circle"></i>{{trans('dashboard.unit_information')}}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>{{trans('label.unit_title')}}:</strong>{{ $unit->title }}</p>
                                <p><strong>{{trans('label.price')}}:</strong> {{ $unit->price }} {{$unit->currancy}}</p>
                                <p><strong>{{trans('label.type')}}:</strong> {{ $unit->type }}</p>
                                <p><strong>{{trans('label.area')}}:</strong> {{ $unit->area }}</p>
                                <p><strong>{{trans('label.number_of_bedrooms')}}:</strong> {{ $unit->number_bedroom }}</p>
                                <p><strong>{{trans('label.number_of_bathrooms')}}:</strong> {{ $unit->number_bathroom }}</p>
                                <p><strong>{{trans('label.address')}}:</strong> {{ $unit->address }}</p>
                                <p><strong>{{trans('label.description')}}:</strong> {{ $unit->description }}</p>
                                <p><strong>{{trans('label.is_booked')}}:</strong>
                                    @if($unit->is_booked)
                                    <span class="badge badge-success">{{trans('label.yes')}}</span>
                                    @else
                                        <span class="badge badge-primary">{{trans('label.no')}}</span>
                                    @endif
                                </p>
                                <p><strong>{{trans('label.created_at')}}:</strong> {{ $unit->created_at }}</p>
                                <p><strong>{{trans('label.last_update_at')}}:</strong> {{ $unit->updated_at }}</p>
                                <p>
                                    <strong>{{trans('label.status')}}:</strong>
                                    @if ($unit->status == 'pending')
                                        <span class="badge badge-warning">{{translate_enums('pending')}}</span>
                                    @elseif ($unit->status == 'accepted')
                                        <span class="badge badge-success">{{translate_enums('accepted')}}</span>
                                    @elseif ($unit->status == 'rejected')
                                        <span class="badge badge-danger">{{translate_enums('rejected')}}</span>
                                    @else
                                        <span class="badge badge-secondary">{{trans('unknown')}}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Owner Information -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5><i class="fas fa-user"></i>{{trans('dashboard.owner_information')}}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>{{trans('label.full_name')}}:</strong> {{ $unit->owner->full_name }}</p>
                                <p><strong>{{trans('label.username')}}:</strong> {{ $unit->owner->username }}</p>
                                <p><strong>{{trans('label.email')}}:</strong> {{ $unit->owner->email }}</p>
                                <p><strong>{{trans('label.phone')}}:</strong> {{ $unit->owner->phone }}</p>
                                <p><strong>{{trans('label.business_name')}}:</strong> {{ $unit->owner->business_name }}</p>
                                <p><strong>{{trans('label.business_license')}}:</strong> {{ $unit->owner->business_license }}</p>
                                <p><strong>{{trans('label.address')}}:</strong> {{ $unit->owner->address }}</p>
                            </div>
                        </div>
                        <!-- Features -->
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                <h5><i class="fas fa-list"></i> {{trans('dashboard.features')}}</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($featuresByCategory as $categoryName => $features)
                                    <h6 class="text-primary"><strong>{{ $categoryName }}</strong></h6>
                                    <ul style="list-style-type: none; padding-left: 0;">
                                        @foreach ($features as $feature)
                                            <li style="font-size: 14px; color: #333;">
                                                <i class="fas fa-check-circle text-success"></i> {{ $feature->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-10">
                    <!-- Images -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5><i class="fas fa-images"></i> {{trans('dashboard.images')}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($unit->images as $image)
                                        <div class="col-md-6 mb-3">
                                            <img src="{{ asset('storage/'.$image->url) }}" alt="Unit Image"
                                                 class="img-fluid rounded" loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('css')
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            .btn, .breadcrumb, .navbar, footer {
                display: none;
            }

            .card {
                border: 1px solid #ccc !important;
            }
        }
    </style>

@endpush
