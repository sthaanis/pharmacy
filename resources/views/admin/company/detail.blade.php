@extends('layout.backend')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Company</a></li>
              <li class="breadcrumb-item active">Add Company</li>
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
                <h3 class="card-title">Company Entry Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="name" readonly value="{{$company->name}}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email" readonly value="{{$company->email}}">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_no" readonly value="{{$company->contact_no}}">
                    </div>

                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" class="form-control" placeholder="Enter Registration Number" name="registration_no" readonly value="{{$company->registration_no}}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" disabled>
                            <option value="active" @if($company->status == "active") selected @endif>Active</option>
                            <option value="inactive"@if($company->status == "inactive") selected @endif>Inactive</option>
                        </select>
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