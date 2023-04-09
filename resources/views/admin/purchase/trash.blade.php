@extends('layout.backend')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
          <a href="{{route('pharmacy.admin.purchase.trash')}}" class="btn btn-primary" style="margin-bottom:10px;">View Trash</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Company List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Company_id</th>
                    <th>Brand_id</th>
                    <th>Medicine_type_id</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($purchases as $purchase)  
                  <tr>
                    <td>{{$purchase->item_name}}</td>
                    <td>{{$purchase->quantity}}</td>
                    <td>{{$purchase->rate}}</td>
                    <td>{{$purchase->amount}}</td>
                    <td>{{$purchase->company->name}}</td>
                    <td>{{$purchase->brand->name}}</td>
                    <td>{{$purchase->medicine_type->medicine_type}}</td>

                    <td>
                        <a href="{{route('pharmacy.admin.purchase.details',$purchase->id)}}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{route('pharmacy.admin.purchase.edit',$purchase->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('pharmacy.admin.purchase.remove',$purchase->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure to remove this company?');">Remove</a>
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
