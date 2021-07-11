<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Stock;
use App\Sale;
use App\Purchase;
use App\Supplier;
use App\Newcustomer;
use Carbon\Carbon;

class ReportController extends Controller
{
    //
    function getalldata()
    {
        $data = DB::table('purchases')->join('suppliers','purchases.supplierid',"=",'suppliers.supplierid')
        ->select('purchases.purchaseinvoiceno','purchases.purchasedate','suppliers.suppliername','purchases.totalamount')->where('purchasedate', today()->day)->get();
        $totalpur = DB::table('purchases')->sum('totalamount');

        $data1 = DB::table('sales')->join('newcustomers','sales.customerid',"=",'newcustomers.customerid')
        ->select('sales.saleinvoiceno','sales.saledate','newcustomers.customername','sales.totalamount')->get();
        $totalsal = DB::table('sales')->sum('totalamount');
        
        return view('_todayreport',["data1"=>$data1,"data"=>$data,"totalpur"=>$totalpur,"totalsal"=>$totalsal]);


    }
    
}
