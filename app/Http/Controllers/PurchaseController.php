<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Purchase;
use App\Supplier;
use App\Product;


class PurchaseController extends Controller
{
    //
    function getsupplierproduct()
    {
        $supplier=DB::table('suppliers')->pluck("suppliername","supplierid");
        $product=DB::table('products')->pluck("productname","productid");
        return view('_newpurchase',compact('supplier','product'));
        
        //return view('_newpurchase',compact('product'));
    }

    function purchaselist()
    {
        $data=DB::table('purchase')
        ->join('products','purchase.productid',"=",'products.productid')
        ->join('suppliers','purchase.supplierid',"=",'suppliers.supplierid')
        ->select('purchase.purchaseinvoiceno',
        'products.productname',
        'suppliers.suppliername',
        'purchase.purchasedate',
        'purchase.purchaseqty',
        'purchase.purchaseprice',
        'purchase.nettotalamount',
        'purchase.discount',
        'purchase.totalamount')->get();
        return view('_purchaselist',["data"=>$data]);
    }

    function addpurchase(Request $req)
    {
        $pur = new Purchase;
        $pur->purchaseinvoiceno;
        $pur->productid = $req->input('product');
        $pur->supplierid = $req->input('supplier');
        $pur->purchasedate = $req->input('pdate');
        $pur->purchaseqty = $req->input('pqty');
        $pur->purchaseprice = $req->input('prate');
        $pur->nettotalamount = $req->input('pnamount');
        $pur->discount = $req->input('pdiscount');
        $pur->totalamount = $req->input('ptotalamount');
        $pur->save();
        $req->session()->flash('status','Product Purchase Sucessfully');
        return redirect('purchase_list');
    }

    function deletepurchase($purchaseinvoiceno,Request $req)
    {    
        //direct method
        Purchase::find($purchaseinvoiceno)->delete();
        $req->session()->flash('status','Purchase Deleted Sucessfully');
        return redirect('purchase_list');
    }

}
