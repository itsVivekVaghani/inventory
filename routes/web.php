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

Route::post('/store',"Users@stholore");
Route::post('/logs',"Users@logs");

//product opertaion
Route::post('/add_products','ProductController@addproduct');
Route::view('/add_products','_addproducts');

Route::get('/product_list','ProductController@listproduct');
//Route::view('/product_list','_productlist');



//supplier operation
Route::post('/new_supplier','SuplierController@addsupplier');
Route::view('/new_supplier','_newsupplier');

Route::get('/supplier_list','SuplierController@listsupplier');


