<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profit;

class ProfitController extends Controller
{
    function profitlist()
    {
        $data=DB::table('profitloss')
        ->select('saledate','saleinvoiceno','saleqty',
        'totalsaleprice','totalpurchaseprice','profitamount')
        ->get();
        return view('_profitlist',["data"=>$data]);
        
    }
}
