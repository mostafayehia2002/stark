@extends('dashboard.layouts.master',['title'=>'Admin Stark | Create Admins'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Update Admin Info</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.edit-admin',['id'=>$user->id])}}">Edit Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admins</a></li>
                            <li class="breadcrumb-item active">Users Management</li>
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
                        <form role="form" action="{{route('admin.update-admin',$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name" value="{{$user->full_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">UserName</label>
                                    <input type="text" class="form-control" id="username" placeholder="UserName" name="username" value="{{$user->username}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{$user->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <strong>Role:</strong>
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
    </div>
@endsection


