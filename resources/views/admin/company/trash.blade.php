@extends('layout.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Trash</h1>
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
                <h3 class="card-title">Trash List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session::has('message'))
                  <div class="alert alert-primary mg-b-10" role="alert" id="alert">{{ Session::get('message') }}</div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Company Name</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Registration No</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  <tbody>
                  @php $count = 1; @endphp
                  @foreach($companies as $company)
                  <tr>
                    <td>{{$count++}}</td>
                    <td>{{$company->company_name}}</td>
                    <td>{{$company->contact_no}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->registration_no}}</td>
                    <td>{{$company->address}}</td>
                    <td>
                      <a href="{{route('pharmacy.admin.company.restore',$company->id)}}" onClick="return confirm('Are you sure to restore the company?');" class="btn btn-primary">Restore</a>
                      <a href="{{route('pharmacy.admin.company.delete',$company->id)}}" onClick="return confirm('Are you sure to premanently remove this company?');" class="btn btn-danger">Delete</a>
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

    @section('script')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });

        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#alert").slideUp(1000);
        });
    </script>


            
        
    @endsection
 
@endsection