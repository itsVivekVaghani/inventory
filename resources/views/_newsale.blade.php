<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 @include('layouts.partials._head')
 <script>

    
    function qtyload()
    {
        var prid = document.getElementById('p_name').value;  
        var locations = [
        @foreach ($stock as $st)
            [ {{ $st->productid }}, {{ $st->finalstock }} ],     
        @endforeach
        ];

        for (i = 0; i < locations.length; i++) {
            if(prid==locations[i][0])
            {
                document.getElementById('a_qty').value = locations[i][1];
            }
        }
    }
    
    function calc1()
    {
        var q = parseFloat(document.getElementById('purchase_qty').value);
        var r = parseFloat(document.getElementById('purchase_rate').value);
        var ntm = document.getElementById('net_totalamount').value = (q*r);
        var d = parseFloat(document.getElementById('purchase_dis').value);
        var gtm =(ntm*d)/100;
        document.getElementById('gtotalamount').value = (ntm-gtm);

        var pa = parseFloat(document.getElementById('paidAmount').value);
        document.getElementById('dueAmmount').value = ((ntm-gtm)-pa);
        
    }

    function fullpaid()
    {
        var q = parseFloat(document.getElementById('purchase_qty').value);
        var r = parseFloat(document.getElementById('purchase_rate').value);
        var ntm = document.getElementById('net_totalamount').value = (q*r);
        var d = parseFloat(document.getElementById('purchase_dis').value);
        var gtm =(ntm*d)/100;
        document.getElementById('gtotalamount').value = (ntm-gtm);

        document.getElementById('paidAmount').value=(ntm-gtm);
        var pa = parseFloat(document.getElementById('paidAmount').value);
        document.getElementById('dueAmmount').value = ((ntm-gtm)-pa);
    }

    function createrow()
    {
        var table = document.getElementById("purchaseTable");
        var row = table.insertRow(2);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var s = '<button class="btn btn-danger red" type="button" onclick="deleterow()" tabindex="8"><i class="fas fa-times"></i></button>'
       
        cell1.innerHTML = "";
        cell2.innerHTML = "<input type='text' class='form-control text-right stock_ctn_1' placeholder='Stock/Qnt' readonly=''>";
        cell3.innerHTML = "<input type='number' name='pqty' id='purchase_qty' class='form-control text-right prc' placeholder='0.00' >";
        cell4.innerHTML = "<input type='number' name='prate'  id='purchase_rate' onkeyup='calc1();' class='form-control price_item1 text-right prc' placeholder='0.00' value='' min='0'>";
        cell5.innerHTML = "<input class='form-control total_price text-right' name='pnamount' type='text' id='net_totalamount' readonly='readonly' placeholder='0.00'>";
        cell6.innerHTML = s;
        //row.appendChild(cell1);
    }

    function deleterow()
    {
        var table = document.getElementById("purchaseTable");
        table.deleteRow(2);
    }

 </script>
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
    
    <span class="border">
    <div class="card card-danger">
        <div class="card-header">
            <span class="float-left"><h3 class="card-title">Add Sale</h3></span>
            <a href="sale_list"><span class="btn btn-warning row fileinput-button dz-clickable float-right">
                        <i class="fas fa-plus"></i>
                        <span>Manage Sale</span>
                </span></a>
        </div>
        <div class="row">
            <div class="card-body col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-body">
                        <form method="post" action="add_sale">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="supplier_sss" class="col-sm-3 col-form-label">Customer <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                        <select name="supplier" class="form-control" tabindex="1">
                                            <option>--Select One--</option>
                                            @foreach($customer as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Sale Date <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="2" class="form-control datepicker" name="pdate" value="<?php echo date("d-M-Y")?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="supplier_sss" class="col-sm-3 col-form-label">Invoice No. <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" tabindex="3" class="form-control" name="chalan_no" id="invoice_no" readonly>    
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Sale Details<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" tabindex="4" id="adress" name="purchase_details" placeholder=" Details" rows="1"></textarea>    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px">
                                <table class="table table-bordered table-hover" id="purchaseTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Item<i class="text-danger">*</i></th>
                                            <th class="text-center">Stock/Qnt</th>
                                             <th class="text-center">Quantity </th>
                                            <th class="text-center">Rate<i class="text-danger">*</i></th>
                                            <th class="text-center">Net Amount</th>
                                            {{--<th class="text-center">Action</th>--}}
                                        </tr>
                                    </thead>
                                    <tbody id="addPurchaseItem">
                                        <tr>
                                             <td>
                                             <select name="product" id="p_name" class="form-control" tabindex="5" onChange="qtyload();">
                                                <option>--Select One--</option>
                                                @foreach($product as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            </td>
                                            <td>
                                                 <input type="text" id="a_qty" value="" placeholder="Stock/Qnt" class="form-control text-right stock_ctn_1" readonly="readonly" tabindex="6">
                                            </td>
                                            <td class="text-right">
                                                <input type="number" name="pqty" id="purchase_qty" class="form-control text-right prc" placeholder="0.00" tabindex="7">
                                            </td>
                                            <td class="text-right">

                                                <input type="number" name="prate"  id="purchase_rate" onkeyup="calc1();" class="form-control price_item1 text-right prc" placeholder="0.00" value="" min="0" tabindex="8">
                                            </td>
                                            <td class="text-right">
                                                <input class="form-control total_price text-right" name="pnamount" type="text" id="net_totalamount"  tabindex="9" readonly="readonly" placeholder="0.00">

                                            </td>
                                            {{--<td>
                                                <button class="btn btn-danger red" type="button" onclick="deleteRow(this)" tabindex="8"><i class="fas fa-times"></i></button>
                                            </td>--}}
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        {{--<tr>
                                            <td class="text-right" colspan="4"><b>Total:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="Total" class="text-right form-control" name="total" readonly="readonly" placeholder="0.00" tabindex="10">
                                            </td>
                                            <td><button type="button" id="add_item" onclick="createrow();" class="btn btn-info" name="add-invoice-item"><i class="fa fa-plus"></i></button>
                                            
                                        </tr>--}}

                                        <tr>
                                            <td class="text-right" colspan="4"><b>Discount:</b></td>
                                            <td class="text-right">
                                                 <input type="number" name="pdiscount" id="purchase_dis" onkeyup="calc1();" class="form-control text-right prc" placeholder="0.00" tabindex="10"></td>
                                            </td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td class="text-right" colspan="4"><b>Grand Total:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="gtotalamount" class="text-right form-control valid" name="ptotalamount" readonly="readonly" placeholder="0.00" tabindex="12">
                                            </td>
                                            
                                        </tr>

                                        <tr>
                                            <td class="text-right" colspan="4"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control"  name="paid_amount" value="0" tabindex="13" onkeyup="calc1();">
                                            </td>
                                            
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="text-right">
                                            <input type="button" id="full_paid_tab" class="btn btn-warning" value="Full Paid" tabindex="14" onClick="fullpaid();">
                                            </td>
                                            <td class="text-right" colspan="2"><b>Due Amount:</b></td>
                                            <td class="text-right">
                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0" readonly="readonly">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <button type="submit" class="btn btn-success">Add Sale</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </td>                                       
                                        </tr>
                                    </tfoot>     
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- /.content -->
  </div>
  </span>
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

<!-- <script type="text/javascript">
$(function () {
    
    var total_amount = function(){
        var sum = 0;
        $('.amount').each(function() {

            var num = $(this).val().replace(',','');
            if(num ! == 0) {
                sum += parseFloat(num);
            }
        });
        $('#total_price').val(sum);
    }
    $('.amount').keyup(function(){
        total_amount();
    })
    
}); -->

<script>

// $('.text-right').on('input','prc',function(){
//     var totalSum = 0;
//     $('.text-right .prc').each(function(){
//         var inputVal = $(this).val();
//         if($.isNumeric(inputVal)){
//             totalSum += parseFloat(inputVal);

//         }
//     });
//     $('#total_price').text(totalSum);
// });


</script>

</body>
</html>
