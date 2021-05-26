<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 @include('layouts.partials._head')
 <script>

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
    <div class="card card-success">
        <div class="card-header">
            <span class="float-left"><h3 class="card-title">New Sale</h3></span>
            <a href="add_products"><span class="btn btn-warning row fileinput-button dz-clickable float-right">
                        <i class="fas fa-plus"></i>
                        <span>Manage Sale</span>
                </span></a>
        </div>
        <div class="row">
            <div class="card-body col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-body">
                        <form method="post" action="add_purchase">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="Customerlabel" class="col-sm-3 col-form-label">Customer <i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                            <select name="customer" class="form-control" tabindex="1">
                                                <option>--Select One--</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Date <i class="text-danger">*</i></label>
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
                                        <label for="date" class="col-sm-4 col-form-label">Payment Type<i class="text-danger">*</i></label>
                                        <div class="col-sm-6">
                                        <select name="customer" class="form-control" tabindex="1">
                                            <option>--Select One--</option>      
                                        </select>
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
                                            <th class="text-center">Sale Qty</th>
                                            <th class="text-center">Rate<i class="text-danger">*</i></th>
                                            <th class="text-center">Discount %<i class="text-danger">*</i></th>
                                            <th class="text-center">Total</th>
                                            {{--<th class="text-center">Action</th>--}}
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td>
                                                <select name="product" id="p_name" class="form-control" tabindex="5" onChange="qtyload();">
                                                    <option>--Select One--</option>
                                                </select>
                                            </td>

                                            <td>
                                                <input type="text" name="available_quantity[]" class="form-control text-right available_quantity_1" value="" readonly="">   
                                            </td>

                                            <td>
                                                <input type="text" name="product_quantity[]" required="" onkeyup="if (!window.__cfRLUnblockHandlers) return false; bdtask_invoice_quantity_calculate(1);" onchange="if (!window.__cfRLUnblockHandlers) return false; bdtask_invoice_quantity_calculate(1);" class="total_qntt_1 form-control text-right" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8" value="1">
                                            </td>

                                            <td>
                                                <input type="text" name="product_rate[]" value="" id="price_item_1" class="price_item1 price_item form-control text-right" tabindex="6" required="" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);">
                                            </td>

                                            <td>
                                                <input type="text" name="discount[]" onkeyup="if (!window.__cfRLUnblockHandlers) return false; bdtask_invoice_quantity_calculate(1);" onchange="if (!window.__cfRLUnblockHandlers) return false; bdtask_invoice_quantity_calculate(1);" id="discount_1" class="form-control text-right" min="0" tabindex="10" placeholder="0.00">
                                            </td>

                                            <td>
                                                <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_1" value="" tabindex="-1" readonly="readonly">
                                            </td>

                                            {{--<td>
                                                <button class="btn btn-danger red" type="button" onclick="deleteRow(this)" tabindex="8"><i class="fas fa-times"></i></button>
                                            </td>--}}
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align:right;" colspan="5"><b>Total Discount:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" tabindex="" value="0.00" readonly="readonly">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5" style="text-align:right;"><b>Grand Total:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="grandTotal" tabindex="" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:right;" colspan="5"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="paidAmount" onkeyup="invoice_paidamount();" class="form-control text-right" name="paid_amount" value="" placeholder="0.00" tabindex="">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center">
                                                <input type="button" id="full_paid_tab" class="btn btn-warning" name="" value="Full Paid" tabindex="" onclick="full_paid();">
                                            </td>
                                            <td style="text-align:right;" colspan="4"><b>Due:</b></td>
                                            <td class="text-right">
                                                <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly">
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
