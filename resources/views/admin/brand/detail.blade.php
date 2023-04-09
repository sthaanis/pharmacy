@extends('layout.backend')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Brand</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Brand Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" placeholder="Enter Brand Name" name="name"readonly value="{{$brand->name}}">
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" placeholder="slug" name="slug" readonly value="{{$brand->slug}}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" disabled>
                            <option value="active" @if($brand->status == "active") selected @endif>Active</option>
                            <option value="inactive" @if($brand->status == "inactive") selected @endif>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    
                </div>
                <!-- /.card-body -->

              
             
            </div>
            <!-- /.card -->

            <!-- general form elements -->
                      </div>
          <!--/.col (left) -->
          <!-- right column -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection