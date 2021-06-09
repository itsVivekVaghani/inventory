<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Purchase;
use App\Supplier;
use App\Product;
use App\Stock;
use App\Expense;
use App\Income;
use App\Sale;
use App\Newcustomer;

class SaleController extends Controller
{
    function getcustomerproduct()
    {
        // $pur = new Purchase;
        // $cs $pur->productid = $req->input('product');
        $customer=DB::table('newcustomers')->pluck("customername","customerid");
        $product=DB::table('products')->pluck("productname","productid");
        //$stock=DB::table('stocks')::all();
        $stock = Stock::all();
        // $stock=DB::table('stocks')
        // ->select("inquantity'")
        // ->;
        return view('_newsale',compact('customer','product','stock'));
        
        //return view('_newpurchase',compact('product'));
    }

    function salelist()
    {
        $data=DB::table('sales')
        ->join('products','sales.productid',"=",'products.productid')
        ->join('newcustomers','sales.customerid',"=",'newcustomers.customerid')
        ->select('sales.saleinvoiceno',
        'products.productname',
        'newcustomers.customername',
        'sales.saledate',
        'sales.saleqty',
        'sales.saleprice',
        'sales.nettotalamount',
        'sales.discount',
        'sales.totalamount')->get();
        return view('_salelist',["data"=>$data]);
    }

    function addsale(Request $req)
    {
        $sal = new Sale;
        $sal->saleinvoiceno ;
        $sal->productid = $req->input('product');
        //$pur->stockid = $req->input('stock');
        $sal->customerid  = $req->input('supplier');
        $sal->saledate = $req->input('pdate');
        $sal->saleqty = $req->input('pqty');
        $sal->saleprice = $req->input('prate');
        $sal->nettotalamount = $req->input('pnamount');
        $sal->discount = $req->input('pdiscount');
        $sal->totalamount = $req->input('ptotalamount');
        $sal->save();
        
        // Stock Add in Stock

        $pt = DB::table('stocks')
        ->select('outquantity')
        ->where('productid',$req->input('product'))
        ->value('outquantity');
        $ft = $pt + $req->input('pqty');

        
        
        $users = DB::table('stocks')
        ->where('productid',$req->input('product'))
        ->update([
             'outquantity'=>  $ft
        ]); 

        $st = DB::table('stocks')
        ->select('inquantity')
        ->where('productid',$req->input('product'))
        ->value('inquantity');
        // //$cal = (int)$st;
        //$ft = $st + $req->input('pqty');
        

        $users = DB::table('stocks')
        ->where('productid',$req->input('product'))
        ->update([
             'finalstock'=>  $st - $ft
        ]);

        // Amount Add in Expense Table
        $in = new Income;
        $in->incomeid;
        $in->customerid= $req->input('supplier');
        $in->ireceiveamount= $req->input('paid_amount');
        $in->idueamount= $req->input('due_amount');
        $in->itotalamount= $req->input('ptotalamount');
        $in->incomedate= $req->input('pdate');
        $in->save();
        // $st = DB::table('transactionexpense')
        // ->select('inquantity')
        // ->where('productid',$req->input('product'))
        // ->value('inquantity');
        // // //$cal = (int)$st;
        // $ft = $st + $req->input('pqty');
        
        // $users = DB::table('stocks')
        // ->where('productid',$req->input('product'))
        // ->update([
        //      'inquantity'=>  $ft
        // ]);
        
        
        $req->session()->flash('status','Product Sale Sucessfully');
        return redirect('sale_list');
    }
    //$p_qty = $req->input('pqty');
    function deletesale($saleinvoiceno,Request $req)
    {    
        //direct method
        Sale::find($saleinvoiceno)->delete();
        $req->session()->flash('status','Sale Deleted Sucessfully');
        return redirect('sale_list');
    }
}
