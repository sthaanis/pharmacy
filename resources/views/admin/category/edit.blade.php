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
              <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                <h3 class="card-title">Category Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="post" action="{{route('pharmacy.admin.category.update',$category->id)}}">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" value="{{$category->category_name}}">
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{$category->slug}}" >
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Enter Description" >{{$category->description}}</textarea>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" >
                            <option value="active" @if($category->status == "active") selected @endif>Active</option>
                            <option value="inactive" @if($category->status == "inactive") selected @endif>Inactive</option>
                        </select>
                    </div>

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