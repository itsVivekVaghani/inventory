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

  <!-- Content jjjWrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">EDIT SUPPLIER</h3>
              </div>
              <br>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" action="/edit_supplier">
              @csrf
              <div class="panel-body">

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" required autocomplete="off" class="form-control" name="sid" value="{{$data->supplierid}}">
                    </div>
                </div>


                <div class="form-group row">
                  <label for="supplier_name" class="col-sm-3 col-form-label text-right">Supplier Name</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="sname"  type="text" placeholder="Supplier Name" required="" tabindex="1" value="{{$data->suppliername}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="suppplier_email" class="col-sm-3 col-form-label text-right">Supplier E-Mail</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="semail"  type="email" placeholder="Supplier Name" required="" tabindex="1" value="{{$data->supplieremail}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="mobile" class="col-sm-3 col-form-label text-right">Supplier Mobile</label>
                  <div class="col-sm-6">
                   
                   <input class="form-control" name="smobile" id="mobile" type="text" placeholder="Supplier Mobile" required="" min="0" tabindex="2" value="{{$data->suppliermob}}">
                   @error('cmobile')
                 <div>{{$message}}</div>
                   @enderror
                  </div>
                  
                 </div>

                <div class="form-group row">
                  <label for="address " class="col-sm-3 col-form-label text-right">Supplier Address</label>
                  <div class="col-sm-6">
                    <textarea class="form-control"required autocomplete="off" name="saddress" id="address " rows="3" placeholder="Supplier Address" tabindex="3">
                    <?php $str=$data['supplieradd']; echo trim($str); ?>
                    </textarea>
                  </div>
                </div>

                <div class="form-group row">
                   <label for="previous_balance" class="col-sm-3 col-form-label text-right">Balance</label>
                    <div class="col-sm-6">
                      <input class="form-control"required autocomplete="off" name="sbalance" id="previous_balance" placeholder="Balance" tabindex="5" type="number" value="{{$data->supplierbal}}">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                   <div class="col-sm-6">
                      <button type="submit" class="btn btn-info">SUBMIT</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                   </div>
                </div>
              </div>
                                  

                <!-- /.card-body -->
              </form>
            </div>
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
