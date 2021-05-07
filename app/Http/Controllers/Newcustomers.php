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
        $sup->customername=$req->input('cname');
        $sup->customeremail=$req->input('cemail');
        $sup->customermob=$req->input('cmobile');
        $sup->customeradd=$req->input('caddress');
        $sup->customerbal=$req->input('cbalance');
        $sup->save();
        $req->session()->flash('status','Supplier Added Sucessfully');
        return redirect('customer_list');
    }

    function deletecustomer($customerid,Request $req)
    {    
        //with query
        //DB::delete('delete from products where productid = ?',[$productid]);

        //direct method
        Newcustomer::find($customerid)->delete();
        $req->session()->flash('status','Product Deleted Sucessfully');
        return redirect('customer_list');
    }

    function editcustomer($id)
    {
         $data=Newcustomer::find($id);
         return view('_editcustomer',["data"=>$data]);
    }

    function updatecustomer(Request $req)
    {
        $cus = Newcustomer::find($req->input('cid'));
        $cus->customerid;
        $cus->customername=$req->input('cname');
        $cus->customeremail=$req->input('cemail');
        $cus->customermob=$req->input('cmobile');
        $cus->customeradd=$req->input('caddress');
        $cus->customerbal=$req->input('cbalance');
        $cus->save();
        $req->session()->flash('status','Customer Updated Sucessfully');
        return redirect('customer_list');

    }
}
