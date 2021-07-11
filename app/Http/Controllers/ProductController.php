<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Stock;


class ProductController extends Controller
{
    //
    function getcategory()
    {
        $category=DB::table('category')->pluck("categoryname","categoryid");
        return view('_addproducts',compact('category'));
    }
    
    function listproduct()
    {
        $data=DB::table('products')
        ->join('category','products.categoryid',"=",'category.categoryid')
        ->select('products.productid','products.productname','category.categoryname',
        'products.productdesc','products.purchaseprice','products.saleprice','products.productimg')
        ->get();
        return view('_productlist',["data"=>$data]);
        // $data=Product::all();
        // return view('_productlist',["data"=>$data]);
    }

    function addproduct(Request $req)
    {
        //return $req->input();
        $pro = new Product;
        $pro->productid;
        $pro->categoryid=$req->input('category');
        $pro->productname=$req->input('pname');
        $pro->productdesc=$req->input('pdesc');
        $pro->purchaseprice=$req->input('pprice');
        $pro->saleprice=$req->input('psprice');
        
        if($files=$req->file('image'))
        {
            $name=$files->getClientOriginalName();
            $files->move('productimg',$name);
            $pro->productimg=$name;
        }
        //stock table data add
       
        
        $pro->save();
        $req->session()->flash('status','Product Added Sucessfully');
        $st = new stock;
        $st->stockid;
        $st->productid= $pro->productid;
        $st->save();
        return redirect('product_list');
    }

    function deleteproduct($productid,Request $req)
    {    
        //with query
        //DB::delete('delete from products where productid = ?',[$productid]);

        //image delete
        //delete
        //stock::find($productid)->delete();
        Stock::find($productid)->delete();

        $data=Product::find($productid);
        $img_path=$data->productimg;
        
        
        unlink("productimg/".$img_path);
        
        

        //direct method
        
        Product::find($productid)->delete();
        $req->session()->flash('status','Product Deleted Sucessfully');
        return redirect('product_list');
    }

    function editproduct($productid)
    {
         $data = Product::find($productid);
         return view('_editproducts',['data'=>$data]);
    }

    function updateproduct(Request $req)
    {
        $pro = Product::find($req->input('pid'));
        $pro->productid;
        $pro->productname=$req->input('pname');
        $pro->productdesc=$req->input('pdesc');
        $pro->purchaseprice=$req->input('pprice');
        $pro->saleprice=$req->input('psprice');
        $pro->save();
        $req->session()->flash('status','Product Updated Sucessfully');
        return redirect('product_list');

    }
}
