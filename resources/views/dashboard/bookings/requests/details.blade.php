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
                            <li class="breadcrumb-item"><a href="">{{trans('dashboard.units_management')}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="text-right mb-3">
                <button class="btn btn-secondary btn-sm" onclick="window.print()">
                    <i class="fas fa-print"></i>{{trans('label.print')}}
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
                                <p><strong>{{trans('label.unit_title')}}:</strong>{{ $request->unit->title }}</p>
                                <p><strong>{{trans('label.price')}}:</strong> {{ $request->unit->price }} {{$request->unit->currancy}}</p>
                                <p><strong>{{trans('label.type')}}:</strong> {{ $request->unit->type }}</p>
                                <p><strong>{{trans('label.area')}}:</strong> {{ $request->unit->area }}</p>
                                <p><strong>{{trans('label.number_of_bedrooms')}}:</strong> {{ $request->unit->number_bedroom }}</p>
                                <p><strong>{{trans('label.number_of_bathrooms')}}:</strong> {{ $request->unit->number_bathroom }}</p>
                                <p><strong>{{trans('label.address')}}:</strong> {{ $request->unit->address }}</p>
                                <p><strong>{{trans('label.description')}}:</strong> {{ $request->unit->description }}</p>
                                <p><strong>{{trans('label.is_booked')}}:</strong>
                                    @if($request->unit->is_booked)
                                        <span class="badge badge-success">{{trans('label.yes')}}</span>
                                    @else
                                        <span class="badge badge-primary">{{trans('label.no')}}</span>
                                    @endif
                                </p>
                                <p><strong>{{trans('label.created_at')}}:</strong> {{ $request->unit->created_at }}</p>
                                <p><strong>{{trans('label.last_update_at')}}:</strong> {{ $request->unit->updated_at }}</p>
                                <p>
                                    <strong>{{trans('label.status')}}:</strong>
                                    @php
                                        $status =$request->getStatusAttributes($request->unit->status);
                                    @endphp
                                    <span class="badge badge-{{ $status['color'] }}">
                                        {{ translate_enums($status['label'] )}}
                                    </span>
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
                                <p><strong>{{trans('label.full_name')}}:</strong> {{ $request->owner->full_name }}</p>
                                <p><strong>{{trans('label.username')}}:</strong> {{ $request->owner->username }}</p>
                                <p><strong>{{trans('label.email')}}:</strong> {{ $request->owner->email }}</p>
                                <p><strong>{{trans('label.phone')}}:</strong> {{ $request->owner->phone }}</p>
                                <p><strong>{{trans('label.business_name')}}:</strong> {{ $request->owner->business_name }}</p>
                                <p><strong>{{trans('label.business_license')}}:</strong> {{ $request->owner->business_license }}</p>
                                <p><strong>{{trans('label.address')}}:</strong> {{ $request->owner->address }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5><i class="fas fa-user"></i> {{trans('dashboard.renter_information')}}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>{{trans('label.full_name')}}:</strong> {{ $request->user->full_name }}</p>
                                <p><strong>{{trans('label.username')}}:</strong> {{ $request->user->username }}</p>
                                <p><strong>{{trans('label.email')}}:</strong> {{ $request->user->email }}</p>
                                <p><strong>{{trans('label.phone')}}:</strong> {{ $request->user->phone }}</p>
                                <p><strong>{{trans('label.address')}}:</strong> {{ $request->user->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-5">
                            <!-- Features -->
                            <div class="card">
                                <div class="card-header bg-warning text-white">
                                    <h5><i class="fas fa-list"></i>{{trans('dashboard.features')}}</h5>
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
                        <!-- Images -->
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header bg-info text-white">
                                    <h5><i class="fas fa-images"></i>{{trans('dashboard.images')}}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($request->unit->images as $image)
                                            <div class="col-md-6 mb-3">
                                                <img src="{{ asset('storage/'.$image->url) }}" alt="Unit Image"
                                                     class="img-fluid rounded">
                                            </div>
                                        @endforeach
                                    </div>
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
