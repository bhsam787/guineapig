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
                    <h1 class="m-0 text-dark">View Category</h1>
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

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Category Information </h3>
              <a href="{{ route('category.create') }}"  class="btn btn-sm btn-success float-right"><i class="fa fa-plus mr-1"></i> Add Category </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SL NO.</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $key=> $category)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $category->name }}</td>
                      <td><a href="{{ route('category.edit',$category->id) }}" title='edit' class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                          <a href="{{ route('category.show', $category->id) }}" id="delete" title='delete' class="btn btn-danger btn-sm ml-1"><i class="fa fa-trash"></i>
                      </td>
                    </tr>
                  @endforeach


                </tbody>
                <tfoot>
                  <tr>
                    <th>SL NO.</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->
<!-- Main content -->
@endsection
