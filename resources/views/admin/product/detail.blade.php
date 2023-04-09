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
                    <label>Product_code</label>
                        <input type="text" class="form-control" placeholder="Enter Product code" name="product_code" readonly value="{{$product->product_code}}">
                    </div>

                    <label>Product name</label>
                        <input type="text" class="form-control" placeholder="Enter Product name" name="product_name" readonly value="{{$product->product_name}}">
                    </div>

                    <div class="form-group">
                        <label>Category_id</label>
                        <input type="text" class="form-control" placeholder="Enter Category id" name="category_id"readonly value="{{$product->category_id}}">
                    </div>
                    <div class="form-group">
                        <label>Brand_id</label>
                        <input type="text" class="form-control" placeholder="Enter Brand id" name="brand_id"readonly value="{{$product->brand_id}}">
                    </div>
                    <div class="form-group">
                        <label>Company_id</label>
                        <input type="text" class="form-control" placeholder="Enter Company id" name="brand_id"readonly value="{{$product->company_id}}">
                    </div>
                    <div class="form-group">
                        <label>Medicine_type_id</label>
                        <input type="text" class="form-control" placeholder="Enter Medicine type id" name="medicine_type_id"readonly value="{{$product->medicine_type_id}}">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity"readonly value="{{$product->quantity}}">
                    </div>
                    <div class="form-group">
                        <label>Mrp</label>
                        <input type="text" class="form-control" placeholder="Enter Rate" name="mrp"readonly value="{{$product->mrp}}">
                    </div>
                    <div class="form-group">
                        <label>Short_desc</label>
                        <input type="text" class="form-control" placeholder="Enter short description" name="short_desc"readonly value="{{$product->short_desc}}">
                    </div>
                    <div class="form-group">
                        <label>Long_desc</label>
                        <input type="text" class="form-control" placeholder="Enter long description" name="long_desc"readonly value="{{$product->long_desc}}">
                    </div>

                    <div class="form-group">
                        <label>Availability</label>
                        <select class="form-control" name="availability" disabled>
                            <option value="yes" @if($product->availability == "yes") selected @endif>Yes</option>
                            <option value="no" @if($product->availability == "no") selected @endif>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" disabled>
                            <option value="publish" @if($product->status == "publish") selected @endif>publish</option>
                            <option value="draft" @if($product->status == "draft") selected @endif>draft</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Is_featured</label>
                        <select class="form-control" name="is_featured" disabled>
                            <option value="yes" @if($product->is_featured == "yes") selected @endif>Yes</option>
                            <option value="no" @if($product->is_featured == "no") selected @endif>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Is_topselling</label>
                        <select class="form-control" name="is_topselling" disabled>
                            <option value="yes" @if($product->is_topselling == "yes") selected @endif>Yes</option>
                            <option value="no" @if($product->is_topselling == "no") selected @endif>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Special_price</label>
                        <input type="text" class="form-control" placeholder="Enter special price" name="special_price"readonly value="{{$product->long_desc}}">
                    </div>

                    <div class="form-group">
                      <input type="file">
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