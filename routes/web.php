<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::get('/', function () {
     return view('login.login');
});

Route::view('/temp','layouts.master');

Route::view('/register','login.register');
Route::view('/login','login.login');

Route::post('/store',"Users@store");
Route::post('/logs',"Users@logs");

//product opertaion
Route::post('/add_products','ProductController@addproduct');
Route::get('/add_products','ProductController@getcategory');

Route::get('/product_list','ProductController@listproduct');
Route::get('/delete_product/{productid}','ProductController@deleteproduct');
Route::get('/edit_product/{productid}','ProductController@editproduct');
Route::post('/edit_product','ProductController@updateproduct');



//supplier operation
Route::post('/new_supplier','SuplierController@addsupplier');
Route::view('/new_supplier','_newsupplier');

Route::get('/supplier_list','SuplierController@listsupplier');

//Customers  operation
Route::view('/new_customer','_newcustomer');
Route::post('/new_customer','Newcustomers@addcustomer');

Route::get('/customer_list','Newcustomers@listcustomer');
Route::get('/delete_customer/{customerid}','Newcustomers@deletecustomer');
Route::get('/edit_customer/{customerid}','Newcustomers@editcustomer');
Route::post('/edit_customer','Newcustomers@updatecustomer');


//Category Operation
Route::view('/new_category','_newcategory');
Route::post('/new_category','NewcustomersCategoryController@addcategory');
Route::get('/category_list','CategoryController@listcategory');

