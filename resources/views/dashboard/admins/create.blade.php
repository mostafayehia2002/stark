@extends('dashboard.layouts.master',['title'=>trans('dashboard.add_admin')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{trans('dashboard.add_new_admin')}}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.create-admin')}}">{{trans('dashboard.add_admin')}}</a></li>
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
                        <form role="form" action="{{route('admin.store-admin')}}" method="POST" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">{{trans('label.full_name')}}:</label>
                                    <input type="text" class="form-control" id="full_name" placeholder="{{trans('label.full_name')}}" name="full_name" value="{{old('full_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">{{trans('label.username')}}:</label>
                                    <input type="text" class="form-control" id="username" placeholder="{{trans('label.username')}}" name="username"  value="{{old('username')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{trans('label.email')}}:</label>
                                    <input type="email" class="form-control" id="email" placeholder="{{trans('label.email')}}" name="email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{trans('label.phone')}}:</label>
                                    <input type="text" class="form-control" id="phone" placeholder="{{trans('label.phone')}}" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{trans('label.password')}}:</label>
                                    <input type="password" class="form-control" id="password" placeholder="{{trans('label.password')}}" name="password" value="{{old('password')}}">
                                </div>
                                <div class="form-group">
                                    <strong>{{trans('label.role')}}:</strong>
                                    <select name="roles[]" class="form-control" multiple="multiple">
                                        @foreach ($roles as $value => $label)
                                            <option value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitBtn">{{trans('label.create')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            @include('dashboard.layouts.spanner')
        </section>
@endsection


