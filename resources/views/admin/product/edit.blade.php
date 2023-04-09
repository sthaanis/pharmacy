@extends('layout.backend')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                {{csrf_field()}}
                <div class="card-body">
                    
                    <div class="form-group">
                      <label>Product name</label>
                      <input type="text" class="form-control" placeholder="Enter Product name" name="product_name" value="">
                    </div>

                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="category_id">
                        <option value="">Select Category</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id">
                        <option value="">Select Brand</option>
                       </select>
                      </div>

                    <div class="form-group">
                        <label>Company</label>
                        <select class="form-control" name="company_id">
                        <option value="">Select Company</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label>Medicine_type</label>
                        <select class="form-control" name="medicine_type_id">
                        <option value="">Select medicine type</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label>Mrp</label>
                        <input type="text" class="form-control" placeholder="Enter Rate" name="mrp">
                    </div>
                    <div class="form-group">
                        <label>Short_desc</label>
                        <input type="text" class="form-control" placeholder="Enter short description" name="short_desc">
                    </div>
                    <div class="form-group">
                        <label>Long_desc</label>
                        <input type="text" class="form-control" placeholder="Enter long description" name="long_desc">
                    </div>

                    <div class="form-group">
                        <label>Availability</label>
                        <select class="form-control" name="availability" >
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" disabled>
                            <option value="publish">publish</option>
                            <option value="draft">draft</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Featured</label>
                        <select class="form-control" name="is_featured" disabled>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Discounted</label>
                        <select class="form-control" name="is_topselling" disabled>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Special_price</label>
                        <input type="text" class="form-control" placeholder="Enter special price" name="special_price"readonly value="">
                    </div>

                    <div class="form-group">
                      <input type="file">
                    </div>
                    </div>
                <!-- /.card-body -->

                
              
            </div>
            <!-- /.card -->

            <!--   general form elements -->
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