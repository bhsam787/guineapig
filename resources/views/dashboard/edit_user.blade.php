@extends('dashboard.layouts.master')

@section('content')

@include('dashboard.layouts.navbar')
@include('dashboard.layouts.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User Details</h3>
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-list mr-1"></i> View User </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('user.update',$users->id) }}">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <strong>{{ $error }} </br></strong>
                                @endforeach
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value='{{ $users->name }}'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='{{ $users->email}}'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value='{{ $users->password }}'>
                                </div>
                                <!-- select -->
                                <div class="form-group">
                                    <label>Select</label>
                                    <select class="form-control" name="user_type">
                                        <option value="admin" {{ $users->user_type=='admin'? "selected"  :" " }}>Admin</option>
                                        <option value="manager" {{ $users->user_type=='manager'? "selected":" " }}>Manager</option>
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content-wrapper -->
<!-- Main content -->
@endsection
