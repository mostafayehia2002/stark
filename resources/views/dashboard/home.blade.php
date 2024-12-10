@extends('dashboard.layouts.master',['title'=>'Admin Stark | Home Page'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                                <span class="info-box-text">Owner Users</span>
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
                                <span class="info-box-text">Renter Users</span>
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
                                <span class="info-box-text">Admins</span>
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
                                <span class="info-box-text">Total Users</span>
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
                                        <h3 class="card-title">Latest Members</h3>
                                        <div class="card-tools">
                                            <span class="badge badge-danger">10 New Members</span>
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
                                                    <img src="{{asset('storage/uploads/settings/profile.jpg')}}"
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
                                <h3 class="card-title">Latest Booking Requests</h3>
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
                                            <th>Booking ID</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Created At</th>
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
                                                        {{ $status['label'] }}
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
                                <span class="info-box-text">Number Of Units</span>
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
                                <span class="info-box-text">Booking Request</span>
                                <span class="info-box-number">{{$bookingRequestCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="far fa-comment"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Messages</span>
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
                                <span class="info-box-text">Booking</span>
                                <span class="info-box-number">{{$bookingCount}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <!-- /.info-box -->
                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Messages</h3>
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
                                            <img src="{{asset('dashboard/dist/img/default-150x150.png')}}"
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
