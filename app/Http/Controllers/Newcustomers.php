<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newcustomer;
use Illuminate\Support\Facades\DB;

class Newcustomers extends Controller
{
    function listcustomer()
    {
        $data=Newcustomer::all();
        return view('_customerlist',["data"=>$data]);
    }

    function addcustomer(Request $req){

        $req->validate([
            "cmobile"=>"min:10 | max:10",
        ]);

        $sup = new Newcustomer;
        $sup->customer_name=$req->input('cname');
        $sup->customer_email=$req->input('cemail');
        $sup->customer_mob=$req->input('cmobile');
        $sup->customer_add=$req->input('caddress');
        $sup->customer_bal=$req->input('cbalance');
        $sup->save();
        $req->session()->flash('status','Supplier Added Sucessfully');
        return redirect('customer_list');
    }
}
