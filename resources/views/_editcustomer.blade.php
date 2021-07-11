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
                <h3 class="card-title">EDIT CUSTOMER</h3>
              </div>
              <br>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" action="/edit_customer">
              @csrf
              <div class="panel-body">

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" required autocomplete="off" class="form-control" name="cid" value="{{$data->customerid}}">
                    </div>
                </div>


                <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label text-right">Customer Name</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="cname"  type="text" placeholder="Customer Name" required="" tabindex="1" value="{{$data->customername}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="customer_email" class="col-sm-3 col-form-label text-right">Customer E-Mail</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="cemail"  type="email" placeholder="Customer Name" required="" tabindex="1" value="{{$data->customeremail}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="mobile" class="col-sm-3 col-form-label text-right">Customer Mobile</label>
                  <div class="col-sm-6">
                   
                   <input class="form-control" name="cmobile" id="mobile" type="text" placeholder="Customer Mobile" required="" min="0" tabindex="2" value="{{$data->customermob}}">
                   @error('cmobile')
                 <div>{{$message}}</div>
                   @enderror
                  </div>
                  
                 </div>

                <div class="form-group row">
                  <label for="address " class="col-sm-3 col-form-label text-right">Customer Address</label>
                  <div class="col-sm-6">
                    <textarea class="form-control"required autocomplete="off" name="caddress" id="address " rows="3" placeholder="Customer Address" tabindex="3">
                    <?php $str=$data['customeradd']; echo trim($str); ?>
                    </textarea>
                  </div>
                </div>

                <div class="form-group row">
                   <label for="previous_balance" class="col-sm-3 col-form-label text-right">Balance</label>
                    <div class="col-sm-6">
                      <input class="form-control"required autocomplete="off" name="cbalance" id="previous_balance" placeholder="Balance" tabindex="5" type="number" value="{{$data->customerbal}}">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                   <div class="col-sm-6">
                      <button type="submit" class="btn btn-info">SUBMIT</button>
                      <button type="reset" class="btn btn-default ">Reset</button>
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
