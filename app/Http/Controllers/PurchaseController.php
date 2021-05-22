<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Purchase;
use App\Supplier;
use App\Product;
use App\Stock;


class PurchaseController extends Controller
{
    //
    function getsupplierproduct()
    {
        // $pur = new Purchase;
        // $cs $pur->productid = $req->input('product');
        $supplier=DB::table('suppliers')->pluck("suppliername","supplierid");
        $product=DB::table('products')->pluck("productname","productid");
        // $stock=DB::table('stocks')
        // ->select("inquantity'")
        // ->;
        return view('_newpurchase',compact('supplier','product'));
        
        //return view('_newpurchase',compact('product'));
    }

    function purchaselist()
    {
        $data=DB::table('purchases')
        ->join('products','purchases.productid',"=",'products.productid')
        ->join('suppliers','purchases.supplierid',"=",'suppliers.supplierid')
        ->select('purchases.purchaseinvoiceno',
        'products.productname',
        'suppliers.suppliername',
        'purchases.purchasedate',
        'purchases.purchaseqty',
        'purchases.purchaseprice',
        'purchases.nettotalamount',
        'purchases.discount',
        'purchases.totalamount')->get();
        return view('_purchaselist',["data"=>$data]);
    }

    function addpurchase(Request $req)
    {
        $pur = new Purchase;
        $pur->purchaseinvoiceno;
        $pur->productid = $req->input('product');
        //$pur->stockid = $req->input('stock');
        $pur->supplierid = $req->input('supplier');
        $pur->purchasedate = $req->input('pdate');
        $pur->purchaseqty = $req->input('pqty');
        $pur->purchaseprice = $req->input('prate');
        $pur->nettotalamount = $req->input('pnamount');
        $pur->discount = $req->input('pdiscount');
        $pur->totalamount = $req->input('ptotalamount');
        $pur->save();
        
        //$st = new Stock;

        $st = DB::table('stocks')
        ->select('inquantity')
        ->where('productid',$req->input('product'))
        ->value('inquantity');
        // //$cal = (int)$st;
        $ft = $st + $req->input('pqty');
        
        $users = DB::table('stocks')
        ->where('productid',$req->input('product'))
        ->update([
             'inquantity'=>  $ft
        ]); 

        $pt = DB::table('stocks')
        ->select('outquantity')
        ->where('productid',$req->input('product'))
        ->value('outquantity');
        

        $users = DB::table('stocks')
        ->where('productid',$req->input('product'))
        ->update([
             'finalstock'=>  $ft - $pt
        ]);

        
        //$users->save();
        // $st = stock::find($req->input('product'));
        // //$st->productid;
        // $st->inquantity = $req->input('pqty');
        // $st->save();

        
        
        $req->session()->flash('status','Product Purchase Sucessfully');
        return redirect('purchase_list');
    }
    //$p_qty = $req->input('pqty');
    function deletepurchase($purchaseinvoiceno,Request $req)
    {    
        //direct method
        Purchase::find($purchaseinvoiceno)->delete();
        $req->session()->flash('status','Purchase Deleted Sucessfully');
        return redirect('purchase_list');
    }

}
