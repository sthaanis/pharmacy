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
              <li class="breadcrumb-item"><a href="#">Purchase</a></li>
              <li class="breadcrumb-item active">Add Purchase</li>
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
                <h3 class="card-title">Purchase</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('pharmacy.admin.purchase.save')}}">
              {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" class="form-control" placeholder="Enter Item Name" name="item_name">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity">
                    </div>

                    <div class="form-group">
                        <label>Rate</label>
                        <input type="text" class="form-control" placeholder="Enter Rate" name="rate">
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount">
                    </div>

                    <div class="form-group">
                        <label>Company</label>
                        <select class="form-control" name="company_id">
                          <option value="">Select Company</option>

                         @foreach($companies as $company)
                              <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach

                   </select>
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id">
                          <option value="">Select Brand</option>

                         @foreach($brands as $brand)
                              <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                   </select>
                    </div>

                    <div class="form-group">
                        <label>Medicine</label>
                        <select class="form-control" name="medicine_type_id">
                          <option value="">Select Medicine</option>

                         @foreach($medicine_types as $medicine_type)
                              <option value="{{$medicine_type->id}}">{{$medicine_type->medicine_type}}</option>
                        @endforeach
                   </select>
                    </div>

                </div>

                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Purchase</button>
                </div>
              </form>
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