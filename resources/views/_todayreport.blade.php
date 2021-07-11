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
                <h3 class="card-title col-m-3"><i class="fas fa-clipboard-list fa-2x"></i> Today's Report (Sales and Purchase Report)</h3>
              </div>
              

              <!-- /.card-header -->
              <div class="card-body">
                <section class="content">

                    <div class="row">
                    <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                    <div class="panel-title">
                    <h4>Todays Sales Report </h4>
                    </div>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                    <th>Sales Date</th>
                    <th></th>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <td colspan="4" align="right" style="text-align:right;">&nbsp;<b>Total Sales:</b></td>
                    <td><b>{{$totalsal}} Rs.</b></td>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($data1 as $item1)
                    <tr>
                    <td>{{$item1->saledate}}</td>
                    <td></td>
                    <td>{{$item1->saleinvoiceno}}</td>
                    <td>{{$item1->customername}}</td>
                    <td>{{$item1->totalamount}}</td> 
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                    <div class="panel-title">
                    <h4>Todays Purchase Report</h4>
                    </div>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table id="dataTableExample3" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                    <th>Purchase Date</th>
                    <th>Invoice No</th>
                    <th>Supplier Name</th>
                    <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <td colspan="3" align="right" style="text-align:right;">&nbsp; <b>Total Purchase: </b></td>
                    <td ><b>{{$totalpur}} Rs.</b></td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $item)
                    <tr>
                    <td>{{$item->purchasedate}}</td>
                    <td>{{$item->purchaseinvoiceno}}</td>
                    <td>{{$item->suppliername}}</td>
                    <td>{{$item->totalamount}}</td> 
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </section>
                
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



