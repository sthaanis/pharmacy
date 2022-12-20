@extends('layout.admin')
@section('content')
<div class="content-wrapper" style="min-height: 1345.45px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('pharmacy.admin.company.index')}}">Company</a></li>
              <li class="breadcrumb-item active">Edit Company</li>
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
                <h3 class="card-title">Edit Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('pharmacy.admin.company.update',$company->id)}}">
                {{csrf_field()}}
                <div class="card-body">

                  <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Enter Company name" name="company_name" value="{{$company->company_name}}">
                  </div>

                  <div class="form-group">
                    <label>Company Address</label>
                    <input type="text" class="form-control" placeholder="Enter Company Address" name="address" value="{{$company->address}}">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$company->email}}">
                  </div>

                  <div class="form-group">
                    <label>Contact No</label>
                    <input type="number" class="form-control" placeholder="Enter Contact Number" name="contact_no" value="{{$company->contact_no}}">
                  </div>

                  <div class="form-group">
                    <label>Registration No</label>
                    <input type="number" class="form-control" placeholder="Enter Registration Number" name="registration_no" value="{{$company->registration_no}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Company</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         


          </div>
          <!--/.col (left) -->
          <!-- right column -->
       
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection