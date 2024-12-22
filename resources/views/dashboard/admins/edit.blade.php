@extends('dashboard.layouts.master',['title'=>trans('dashboard.edit_admin')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.update_admin_info')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.edit-admin',['id'=>$user->id])}}">{{trans('dashboard.edit_admin')}}</a></li>

                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('dashboard.admins')}}</a></li>

                            <li class="breadcrumb-item active">{{trans('dashboard.users_management')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.update-admin',$user->id)}}" method="POST" id="myForm">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">{{trans('label.full_name')}}:</label>
                                    <input type="text" class="form-control" id="full_name" placeholder="{{trans('label.full_name')}}" name="full_name" value="{{$user->full_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">{{trans('label.username')}}:</label>
                                    <input type="text" class="form-control" id="username" placeholder="{{trans('label.full_name')}}" name="username" value="{{$user->username}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{trans('label.email')}}:</label>
                                    <input type="email" class="form-control" id="email" placeholder="{{trans('label.email')}}" name="email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{trans('label.phone')}}:</label>
                                    <input type="text" class="form-control" id="phone" placeholder="{{trans('label.phone')}}" name="phone" value="{{$user->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{trans('label.password')}}:</label>
                                    <input type="password" class="form-control" id="password" placeholder="{{trans('label.password')}}" name="password">
                                </div>
                                <div class="form-group">
                                    <strong>{{trans('label.role')}}:</strong>
                                    <select name="roles[]" class="form-control" multiple="multiple">
                                        @foreach ($roles as $value => $label)
                                            <option value="{{ $value }}" @selected(isset($userRole[$value]))>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitBtn">{{trans('label.update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            @include('dashboard.layouts.spanner')
        </section>
@endsection


