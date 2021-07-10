<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Expense;
use App\Income;

class IncomeController extends Controller
{
    function incomelist()
    {
        $data=DB::table('transactionincomes')
        ->join('newcustomers','transactionincomes.customerid',"=",'newcustomers.customerid')
        ->join('sales','sales.customerid',"=",'transactionincomes.customerid')
        ->select('transactionincomes.incomedate','newcustomers.customername','sales.saleinvoiceno','transactionincomes.ireceiveamount',
        'transactionincomes.idueamount',
        'transactionincomes.itotalamount')
        ->get();
        return view('_incomelist',["data"=>$data]);
        
    }
    function expenselist()
    {
        $data=DB::table('transactionexpense')
        ->join('suppliers','transactionexpense.supplierid',"=",'suppliers.supplierid')
        ->join('purchases','purchases.supplierid',"=",'transactionexpense.supplierid')
        ->select('transactionexpense.expensedate','suppliers.suppliername','purchases.purchaseinvoiceno','transactionexpense.receiveamount',
        'transactionexpense.dueamount',
        'transactionexpense.totalamount')
        ->get();
        return view('_expenselist',["data"=>$data]);
        
    }
    
}
