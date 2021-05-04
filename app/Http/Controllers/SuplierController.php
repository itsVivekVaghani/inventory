<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Supplier;

class SuplierController extends Controller
{
    //
    function listsupplier()
    {
        $data=Supplier::all();
        return view('_supplierlist',["data"=>$data]);
    }

    function addsupplier(Request $req)
    {
        //return $req->input();
        $sup = new Supplier;
        $sup->supplier_name=$req->input('sname');
        $sup->supplier_mob=$req->input('smobile');
        $sup->supplier_add=$req->input('saddress');
        $sup->supplier_bal=$req->input('sbalance');
        $sup->save();
        $req->session()->flash('status','Supplier Added Sucessfully');
        return redirect('supplier_list');
    }
}
