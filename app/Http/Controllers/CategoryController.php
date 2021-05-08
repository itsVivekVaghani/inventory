<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    //
    function getcategory()
    {
        $category=DB::table('category')->pluck("categoryname","categoryid");
        return view('_addproducts',compact('category'));
    }

    function listcategory()
    {
        $data=Category::all();
        return view('_categorylist',["data"=>$data]);
    }

    function addcategory(Request $req)
    {
        //return $req->input();
        $cat = new Category;
        $cat->categoryid;
        $cat->categoryname=$req->input('cname');
        $cat->save();
        $req->session()->flash('status','New Category Added Sucessfully');
        return redirect('category_list');
    }
}
