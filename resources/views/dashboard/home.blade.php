@extends('dashboard.layouts.master',['title'=>trans('dashboard.home')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.dashboard')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.dashboard')}}">{{trans('dashboard.home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.dashboard')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1">
                                 <i class="fas fa-users"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.owner_users')}}</span>
                                <span class="info-box-number">
                                 {{$ownerCount}}
                                 </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1">
                                 <i class="fas fa-user-tag"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.renter_users')}}</span>
                                <span class="info-box-number">{{$renterCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <i class="fas fa-user-shield"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.admins')}}</span>
                                <span class="info-box-number">{{$adminCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.total_users')}}</span>
                                <span class="info-box-number">{{$totalUsers}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <!-- USERS LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{trans('dashboard.last_members')}}</h3>
                                        <div class="card-tools">
                                            <span class="badge badge-danger">{{trans('dashboard.new_members')}}</span>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            @foreach($recentUsers as $user)
                                                <li>
                                                    <img src="{{asset('dashboard/dist/img/profile.jpg')}}"
                                                         alt="User Image">
                                                    <a class="users-list-name"
                                                       href="{{route('admin.details-user',$user->id)}}">{{$user->full_name}}</a>
                                                    <span class="users-list-date">{{$user->created_at}}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!--/.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">
                                    {{trans('dashboard.last_booking_request')}}
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>{{trans('label.booking_id')}}</th>
                                            <th>{{trans('label.booking_date')}}</th>
                                            <th>{{trans('label.status')}}</th>
                                            <th>{{trans('label.created_at')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($requests as $request)
                                            <tr>
                                                <td>
                                                    <a href="{{route('admin.details-booking-request',$request->id)}}">{{$request->booking_id}}</a>
                                                </td>
                                                <td>{{$request->booking_date}}</td>
                                                <td>
                                                    @php
                                                        $status = $request->getStatusAttributes($request->status);
                                                    @endphp
                                                    <label class="badge bg-{{ $status['color'] }}">
                                                        {{ translate_enums($status['label']) }}
                                                    </label>
                                                </td>
                                                <td>
                                                    {{$request->created_at}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <!-- Info Boxes Style 2 -->
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon">
                               <i class="fas fa-building"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.number_of_units')}}</span>
                                <span class="info-box-number">{{$unitCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon">
                               <i class="fas fa-calendar-check"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.number_of_booking_request')}}</span>
                                <span class="info-box-number">{{$bookingRequestCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="far fa-comment"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.number_of_messages')}}</span>
                                <span class="info-box-number">{{$messagesCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon">
                              <i class="fas fa-check-circle"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('dashboard.number_of_bookings')}}</span>
                                <span class="info-box-number">{{$bookingCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <!-- /.info-box -->
                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('dashboard.recently_messages')}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @foreach($messages as $message)
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="{{asset('dashboard/dist/img/profile.jpg')}}"
                                                     alt="Product Image" class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                            <span class="product-title">
                                                {{$message->full_name}}
                                            </span>
                                                <span class="product-description">
                                            {{$message->message}}
                                             </span>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
