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
        $sup->suppliername=$req->input('sname');
        $sup->supplieremail=$req->input('semail');
        $sup->suppliermob=$req->input('smobile');
        $sup->supplieradd=$req->input('saddress');
        $sup->supplierbal=$req->input('sbalance');
        $sup->save();
        $req->session()->flash('status','Supplier Added Sucessfully');
        return redirect('supplier_list');
    }

    function deletesupplier($supplierid,Request $req)
    {    
        //with query
        //DB::delete('delete from products where productid = ?',[$productid]);

        //direct method
        Supplier::find($supplierid)->delete();
        $req->session()->flash('status','Supplier Deleted Sucessfully');
        return redirect('supplier_list');
    }

    function editsupplier($id)
    {
         $data=Supplier::find($id);
         return view('_editsupplier',["data"=>$data]);
    }

    function updatesupplier(Request $req)
    {
        $sup = Supplier::find($req->input('sid'));
        $sup->supplierid;
        $sup->suppliername=$req->input('sname');
        $sup->supplieremail=$req->input('semail');
        $sup->suppliermob=$req->input('smobile');
        $sup->supplieradd=$req->input('saddress');
        $sup->supplierbal=$req->input('sbalance');
        $sup->save();
        $req->session()->flash('status','Supplier Updated Sucessfully');
        return redirect('supplier_list');

    }
}
