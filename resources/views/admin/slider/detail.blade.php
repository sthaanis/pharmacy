@extends('layout.backend')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider</h1>
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
             
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                    <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" readonly value="{{$slider->title}}">
</div>

                   <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" placeholder="Enter short description" name="short_desc"readonly value="{{$slider->description}}">
                    </div>

                    <div class="form-group">
                      <input type="file">
                    </div>

                  <div class="form-group">
                      <label>Alt_option</label>
                      <input type="text" class="form-control" placeholder="Enter option" name="alt_option"readonly value="{{$slider->alt_option}}">
                    </div>


               </div>
               @endsection
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
