<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 @include('layouts.partials._head')
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.partials._navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.partials._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <section class="content">
    
    <div class="card">
              <div class="card-header">
                <h3 class="card-title col-sm-3 col-form-label text">List Of Products</h3>
              </div>
              @if(Session::get('status'))
              <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                <strong>Product Added Sucessfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align:center">
                    <th>PRODUCT ID</th>
                    <th>PRODUCT NAME</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                    <!-- <--<th>Engine version</th>
                    <th>CSS grade</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $item)
                  <tr  style="text-align:center">
                  <td>{{$item->product_id}}</td>
                  <td>{{$item->product_name}}</td>
                  <td>{{$item->product_desc}}</td>
                  <td>{{$item->product_price}}</td>
                  <td> 
                    <a><button class="btn bg-warning btn-xs"><i class="fas fa-edit"></i></button></a>
                    <a href="delete_product/{{$item->product_id}}" class="btn bg-danger btn-xs"><i class="fa fa-trash"></i></a>
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
    <!-- /.content -->
  </div>
</section>
  <!-- /.content-wrapper -->
  @include('layouts.partials._footer')
  
</div>
<!-- ./wrapper -->
@include('layouts.partials._footer-script')

<!-- jQuery -->
<script src="{{('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
</script>
</body>
</html>



