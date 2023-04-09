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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{route('pharmacy.admin.slider.trash')}}" class="btn btn-primary" style="margin-bottom:10px;">View Trash</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Slider List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                <th> Title </th>
                <th> Description </th>
                <th> Image </th>
                <th> Alt_option </th>
                </tr>
                  </thead>
                  <tbody>
               @foreach($sliders as $slider)  
                  <tr>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->description}}</td>
                    <td>
                      <a href="{{asset('slider/'.$slider->image)}}" target="_blank">View Image</a>
                    </td>
                    <td>{{$slider->alt_option}}</td>
                   
                   <td>
                        <a href="{{route('pharmacy.admin.slider.details',$slider->id)}}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{route('pharmacy.admin.slider.edit',$slider->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('pharmacy.admin.slider.remove',$slider->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure to remove this slider?');">Remove</a>
                    </td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
   
   
    
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
@endsection
