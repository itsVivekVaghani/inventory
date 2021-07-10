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

Route::view('/dashboard','layouts.master');

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
Route::get('/delete_supplier/{supplierid}','SuplierController@deletesupplier');
Route::get('/edit_supplier/{supplierid}','SuplierController@editsupplier');
Route::post('/edit_supplier','SuplierController@updatesupplier');

//Customers  operation
Route::view('/new_customer','_newcustomer');
Route::post('/new_customer','Newcustomers@addcustomer');
Route::get('/customer_list','Newcustomers@listcustomer');
Route::get('/delete_customer/{customerid}','Newcustomers@deletecustomer');
Route::get('/edit_customer/{customerid}','Newcustomers@editcustomer');
Route::post('/edit_customer','Newcustomers@updatecustomer');


//Category Operation
Route::view('/add_category','_addcategory');
Route::post('/add_category','CategoryController@addcategory');
Route::get('/category_list','CategoryController@listcategory');
Route::get('/delete_category/{categoryid}','CategoryController@deletecategory');
Route::get('/edit_category/{categoryid}','CategoryController@editcategory');
Route::post('/edit_category','CategoryController@updatecategory');


//purchase
Route::get('/new_purchase','PurchaseController@getsupplierproduct');
Route::post('/add_purchase','PurchaseController@addpurchase');
Route::get('/purchase_list','PurchaseController@purchaselist');
Route::get('/delete_purchase/{purchaseinvoiceno}','PurchaseController@deletepurchase');


//Sale
Route::get('/new_sale','SaleController@getcustomerproduct');
Route::post('/add_sale','SaleController@addsale');
Route::get('/sale_list','SaleController@salelist');
Route::get('/delete_sale/{saleinvoiceno}','SaleController@deletesale');

//stock
Route::get('/stock_report','StockController@stocklist');

//profit
Route::get('/profit_report','ProfitController@profitlist');

//INCOME
Route::get('/income_report','IncomeController@incomelist');

//EXPENSE
Route::get('/expense_report','IncomeController@expenselist');


//sale
//Route::view('/new_sale','_newsale');
