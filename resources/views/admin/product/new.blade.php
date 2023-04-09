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
                <form method="post" action="{{route('pharmacy.admin.product.save')}}" enctype="multipart/form-data">
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
                        @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                        <label>Company</label>
                        <select class="form-control" name="company_id">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                              <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label>Medicine_type</label>
                        <select class="form-control" name="medicine_type_id">
                        <option value="">Select medicine type</option>
                        @foreach($medicineTypes as $type)
                              <option value="{{$type->id}}">{{$type->medicine_type}}</option>
                        @endforeach
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
                        <label>Short Description</label>
                        <textarea class="form-control" name="short_desc" rows="5" placeholder="Enter Short Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea class="form-control" name="long_desc" rows="5" placeholder="Enter Long Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Availability</label>
                        <select class="form-control" name="availability">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="publish">publish</option>
                            <option value="draft">draft</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Featured</label>
                        <select class="form-control" name="is_featured">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Discounted</label>
                        <select class="form-control" name="is_topselling">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Special_price</label>
                        <input type="text" class="form-control" placeholder="Enter special price" name="special_price">
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

                
              
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