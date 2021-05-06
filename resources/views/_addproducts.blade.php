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
          <!-- Horizontal Form -->
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">NEW PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="col-sm-10">
              
              <form class="form-horizontal" method="post" action="add_products">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputproduct" class="col-sm col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text"required autocomplete="off" class="form-control" name="pname" placeholder="Product Name">
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                        <label class="col-sm col-form-label">Category</label>
                  <div class="col-sm-10">
                        <select class="form-control">
                          <option>--Select One--</option>
                          <option>KURTI</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                 </div>
                 </div> -->

                  <div class="form-group row">
                  <label for="inputproduct" class="col-sm col-form-label">Product Details</label>
                     <div class="col-sm-10">
                    <textarea class="form-control"required autocomplete="off" name="pdesc" id="address " rows="3" placeholder="Product Description" tabindex="3"></textarea>
                  </div>
                </div>

                  <div class="form-group row">
                    <label for="inputproduct" class="col-sm col-form-label">Product Price</label>
                    <div class="col-sm-10">
                      <input type="text"required autocomplete="off" class="form-control" name="pprice" placeholder="Product Price">
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <label for="inputpi" class="col-sm col-form-label">Image</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    </div>
                  </div>

                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">SUBMIT</button>
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                </div>
                <!-- /.card-footer -->
              </form>
              </div>
            </div>

            <!-- /.card -->

    <!-- /.content -->
  </div>
</section>
  <!-- /.content-wrapper -->
  @include('layouts.partials._footer')

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
     Control sidebar content goes here 
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> -->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->
@include('layouts.partials._footer-script')

</body>
</html>
