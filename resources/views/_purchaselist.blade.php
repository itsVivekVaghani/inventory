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
    <div></div>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title col-m-3"><i class="fas fa-clipboard-list fa-2x"></i> Purchase List</h3>
                
                <a href="new_purchase"><span class="btn btn-success row fileinput-button dz-clickable float-right">
                        <i class="fas fa-plus"></i>
                        <span>New Purchase</span>
                </span></a>
              </div>
              
              @if(Session::get('status'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong><h5><i class="icon fas fa-check"></i> {{Session::get('status')}} !!!</h5></strong>
                </div>
             @endif

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align:center">
                    <th>INVOICE NO <i class="fa fa-sort"></i></th>
                    <th>PRODUCT <i class="fa fa-sort"></i></th>
                    <th>SUPPLIER <i class="fa fa-sort"></i></th>
                    <th>PURCHASE DATE <i class="fa fa-sort"></i></th>
                    <th>QTY <i class="fa fa-sort"></i></th>
                    <th>PRICE <i class="fa fa-sort"></i></th>
                    <th>NET AMOUNT <i class="fa fa-sort"></i></th>
                    <th>DISCOUNT <i class="fa fa-sort"></i></th>
                    <th>TOTAL AMOUNT <i class="fa fa-sort"></i></th>
                    <th>ACTION</th>
                  </tr>

                  </thead>
                  <tbody>
                  @foreach($data as $item)
                  <tr style="text-align:center">
                    <td>{{$item->purchaseinvoiceno}}</td>
                    <td>{{$item->productname}}</td>
                    <td>{{$item->suppliername}}</td>
                    <td>{{$item->purchasedate}}</td>
                    <td>{{$item->purchaseqty}}</td>
                    <td>{{$item->purchaseprice}} <i class="fas fa-rupee-sign"></i></td>
                    <td>{{$item->nettotalamount}} <i class="fas fa-rupee-sign"></i></td>
                    <td>{{$item->discount}} %</td>
                    <td>{{$item->totalamount}} <i class="fas fa-rupee-sign"></i></td>
                    <td> 
                        <a href="" class="btn bg-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="delete_purchase/{{$item->purchaseinvoiceno}}" class="btn bg-danger btn-sm"><i class="fa fa-trash"></i></a>
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



