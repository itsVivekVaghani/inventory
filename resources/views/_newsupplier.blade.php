<!DOCTYPE html>
<!--
This is a lavistarter template page. Use this page to start your new project from
scratch. This aapage gets rid of all links and provides the needed markup only.
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
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Supplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" action="new_supplier">
              @csrf
              <div class="panel-body">
                <div class="form-group row">
                  <label for="supplier_name" class="col-sm-3 col-form-label text-right">Supplier Name</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="sname"  type="text" placeholder="Supplier Name" required="" tabindex="1" onkeyup="special_character_remove(this.value, 'supplier_name')">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="mobile" class="col-sm-3 col-form-label text-right">Supplier Mobile</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="smobile" id="mobile" type="text" placeholder="Supplier Mobile" required="" min="0" tabindex="2" onkeyup="onlynumber_allow(this.value,'mobile')">
                  </div>
                 </div>

                <div class="form-group row">
                  <label for="address " class="col-sm-3 col-form-label text-right">Supplier Address</label>
                  <div class="col-sm-6">
                    <textarea class="form-control"required autocomplete="off" name="saddress" id="address " rows="3" placeholder="Supplier Address" tabindex="3"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                   <label for="previous_balance" class="col-sm-3 col-form-label text-right">Balance</label>
                    <div class="col-sm-6">
                      <input class="form-control"required autocomplete="off" name="sbalance" id="previous_balance" placeholder="Balance" tabindex="5" type="number">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                   <div class="col-sm-6">
                      <input type="submit" value="ADD SUPPLIER" name="add-supplier-another" class="btn btn-large btn-success" id="add-supplier-another" tabindex="7">
                   </div>
                </div>
              </div>
                                  

                <!-- /.card-body -->
              </form>
            </div>
        <!-- /.row -->
    <!-- /.content -->
  </div>
</section>
  <!-- /.content-wrapper -->
  @include('layouts.partials._footer')

  


@include('layouts.partials._footer-script')

</body>
</html>
