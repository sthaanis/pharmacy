@extends('layout.backend')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Purchase</a></li>
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
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="post" action="{{route('pharmacy.admin.purchase.update',$purchase->id)}}">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" class="form-control" placeholder="Enter purchase Name" name="item_name" value="{{$purchase->item_name}}">
                    </div>


                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Quantity" name="qunatity" value="{{$purchase->quantity}}">

                        <div class="form-group">
                        <label>Rate</label>
                        <input type="text" class="form-control" placeholder="Enter Rate" name="rate" value="{{$purchase->rate}}">

                        <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount" value="{{$purchase->amount}}">

                       
                    <div class="form-group">
                        <label>Company_id</label>
                        <input type="text" class="form-control" placeholder="Enter Company id" name="company_id" value="{{$purchase->company_id}}">
                        
                    <div class="form-group">
                        <label>Brand_id</label>
                        <input type="text" class="form-control" placeholder="Enter Brand id" name="brand_id" value="{{$purchase->brand_id}}">
                       
                    <div class="form-group">
                        <label>Medicine_type_id</label>
                        <input type="text" class="form-control" placeholder="Enter Medicine type" name="medicine_type_id" value="{{$purchase->medicine_type_id}}">
                       
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
                </form>
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