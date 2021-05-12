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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Add Category</h3>
        </div>
          <form class="form-horizontal" method="post" action="add_category" enctype="multipart/form-data">
            @csrf
              <div class="card-body">

                <div class="form-group row">
                  <label for="category_name" class="col-sm-2 text-right col-form-label">Category Name :</label>
                  <div class="col-sm-4">
                      <input type="text" name="cname" class="form-control" id="category_name" placeholder="Category Name" required>
                  </div>
                </div>

                <!-- <div class="form-group row">
                  <label for="status" class="col-sm-2 text-right col-form-label">Status :</label>
                  <div class="col-sm-4">
                    <select name="status" id="status" class="form-control select2-hidden-accessible" required="" tabindex="-1" aria-hidden="true">
                    <option value="1">Active</option>
                    <option value="0" selected="">Inactive</option>
                    </select>
                  </div>   
                </div> -->

                <div class="col-sm-6 text-center">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-default" name="add-another">BACK</button>
                </div>
              </div>
          </form>
              <!-- /.card-body -->
      </div>

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
