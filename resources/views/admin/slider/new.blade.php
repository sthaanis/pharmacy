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
              <li class="breadcrumb-item"><a href="#">Slider</a></li>
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
                <h3 class="card-title">Slider Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="post" action="{{route('pharmacy.admin.slider.save')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                    
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Enter slider title" name="title" value="">
                    </div>

                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Enter Description"></textarea>
                    </div>
                   
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Alt_option</label>
                      <input type="text" class="form-control" placeholder="Enter alt option" name="alt_option" value="">
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