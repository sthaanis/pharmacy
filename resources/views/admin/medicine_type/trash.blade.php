@extends('layout.backend')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Medicine</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Medicine</li>
              <li class="breadcrumb-item active">Trash</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Medicine List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Medicine Type</th>
                    <th>Status</th>
                    <th>Deleted At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              
                  @foreach($medicine_types as $medicine_type)  
                  <tr>
                    <td>{{$medicine_type->medicine_type}}</td>
                    <td>{{ucfirst($medicine_type->status)}}</td>
                    <td>{{$medicine_type->deleted_at->format('Y/m/d')}}</td>
                    <td>
                        <a href="{{route('pharmacy.admin.medicine_type.restore',$medicine_type->id)}}" onClick="return confirm('Are you sure to restore the medicine type?')" class="btn btn-primary btn-sm">Restore</a>
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
