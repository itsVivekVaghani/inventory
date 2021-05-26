<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\stock;

class StockController extends Controller
{
    //
    function stocklist()
    {
        $data=DB::table('stocks')
        ->join('products','stocks.productid',"=",'products.productid')
        ->select('stocks.stockid','products.productname','stocks.inquantity',
        'stocks.outquantity','stocks.finalstock')
        ->get();
        return view('_stocklist',["data"=>$data]);
        
    }
}
