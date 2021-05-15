<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 @include('layouts.partials._head')
 <script>
    function calc()
    {
        var n1= parseInt(document.getElementById('total_qntt_1').value);
        var n2= parseInt(document.getElementById('price_item_1').value);

        document.getElementById('total_price').value = n1 + n2;
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
            <h3 class="card-title">Add Purchase</h3>
        </div>
        <div class="row">
            <div class="card-body col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="supplier_sss" class="col-sm-3 col-form-label">Supplier <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <select name="supplier_id" id="supplier_sss" class="form-control " required="" tabindex="1">
                                                <option value=" ">Select One</option>
                                                <option value="EKMP5AD7HN3LSLQR8XRN">brayen</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Purchase Date <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="date" tabindex="2" class="form-control datepicker hasDatepicker" name="purchase_date" value="2021-05-12" id="date" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="supplier_sss" class="col-sm-3 col-form-label">Purchase No. <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <input type="text" tabindex="3" class="form-control" name="chalan_no" placeholder="Purchase No" id="invoice_no" required="">    
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Purchase Date <i class="text-danger">*</i></label>
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
                                            <th class="text-center">Item Information<i class="text-danger">*</i></th>
                                            <th class="text-center">Stock/Qnt</th>
                                             <th class="text-center">Quantity </th>
                                            <th class="text-center">Rate<i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addPurchaseItem">
                                        <tr>
                                             <td class="span3 supplier_load">
                                                Please Select Supplier 
                                            </td>
                                            <td>
                                                 <input type="text" id="" class="form-control text-right stock_ctn_1" placeholder="Stock/Qnt" readonly="">
                                            </td>
                                            <td class="text-right">
                                                <input type="number" name="product_quantity" id="total_qntt_1" class="form-control text-right prc" placeholder="0.00">
                                            </td>
                                            <td class="text-right">
                                                <input type="number" name="product_rate"  id="price_item_1" onkeyup="calc();" class="form-control price_item1 text-right prc" placeholder="0.00" value="" min="0" tabindex="7">
                                            </td>
                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text"  name="total_price[]" id="total_price"  tabindex="-1" readonly="readonly">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger red" type="button" onclick="deleteRow(this)" tabindex="8"><i class="fas fa-times"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td class="text-right" colspan="4"><b>Total:</b></td>
                                        <td class="text-right">
                                        <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly">
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onclick="if (!window.__cfRLUnblockHandlers) return false; addPurchaseOrderField1('addPurchaseItem')" tabindex="17"><i class="fa fa-plus"></i></button>
                                        <input type="hidden" name="baseUrl" class="baseUrl" value="https://saleserpnew.bdtask.com/saleserp_v9.8_demo/"></td>
                                        </tr>
                                        <tr>
                                        <td class="text-right" colspan="4"><b>Discount:</b></td>
                                        <td class="text-right">
                                        <input type="text" id="discount" class="text-right form-control discount" onkeyup="if (!window.__cfRLUnblockHandlers) return false; calculate_store(1)" name="discount" placeholder="0.00" value="">
                                        </td>
                                        <td>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td class="text-right" colspan="4"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                        <input type="text" id="grandTotal" class="text-right form-control valid" name="grand_total_price" value="0.00" readonly="readonly" aria-invalid="false">
                                        </td>
                                        <td> </td>
                                        </tr>
                                        <tr>
                                        <td class="text-right" colspan="4"><b>Paid Amount:</b></td>
                                        <td class="text-right">
                                        <input type="text" id="paidAmount" class="text-right form-control" onkeyup="if (!window.__cfRLUnblockHandlers) return false; invoice_paidamount()" name="paid_amount" value="">
                                        </td>
                                        <td> </td>
                                        </tr>
                                        <tr>
                                        <td colspan="2" class="text-right">
                                        <input type="button" id="full_paid_tab" class="btn btn-warning" value="Full Paid" tabindex="16" onclick="if (!window.__cfRLUnblockHandlers) return false; full_paid()">
                                        </td>
                                        <td class="text-right" colspan="2"><b>Due Amount:</b></td>
                                        <td class="text-right">
                                        <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly">
                                        </td>
                                        <td></td>
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
