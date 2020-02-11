<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Controller@login');
Route::post('/login_check','Controller@login_check');
Route::get('/logout','Controller@logout');
Route::get('/dashboard','Controller@count_dashboard');

//Supplier routes
Route::get('/suppliers','Controller@suppliers_list');
Route::post('/save-supplyer', 'Controller@save_supplyer');
Route::post('/update-supplyer', 'Controller@update_supplyer');
Route::post('/deactive-supplyer', 'Controller@decativate_supplyer');
Route::post('/active-supplyer', 'Controller@ativate_supplyer');
//end of supplier routes


//Material routes
Route::get('/rm_category','Controller@rm_category_list');
Route::get('/ingradients','Controller@rm_list');
Route::post('/save-ingradient', 'Controller@save_ingradient');
Route::post('/update-ingradient', 'Controller@update_ingradient');
Route::post('/deactive-ingradient', 'Controller@decativate_ingradient');
Route::post('/active-ingradient', 'Controller@ativate_ingradient');
Route::get('/ingradient_supplier', 'Controller@ingradient_supplier');
Route::post('/ingradient_suplier_deactive', 'Controller@ingradient_suplier_deactive');
Route::post('/ingradient_suplier_insert', 'Controller@ingradient_suplier_insert');
//end of material routes


//Product routes
Route::get('/product_category','Controller@product_category_list');
Route::get('/end_products','Controller@product_list');
Route::post('/update-product', 'Controller@update_product');
Route::post('/deactive-product', 'Controller@decativate_product');
Route::post('/active-product', 'Controller@ativate_product');
Route::post('/save-product', 'Controller@save_product');
Route::get('/product_ingradient', 'Controller@product_ingradient');
Route::post('/product_ingradient_deactive', 'Controller@product_ingradient_deactive');
Route::post('/product_ingradient_insert', 'Controller@product_ingradient_insert');
//end of product routes

//inventory routes
Route::get('/inventory','Controller@inventory');
Route::get('/stock-outward','Controller@stock_outward');
Route::get('/update-stock-outward','Controller@update_stock_outward');
Route::get('/stock-inward','Controller@stock_inward');
Route::get('/stock','Controller@stock');
Route::post('/update-inward','Controller@update_inward');
Route::post('/delete-inward','Controller@delete_inward');
//end of inventory routes

//payment routes
Route::get('/payments','Controller@payments');
Route::get('/add_pay','Controller@add_pay');
//end of payment routes

//operation routes
Route::get('/operations','Controller@operations');
Route::get('/operations_open','Controller@operations_open');
Route::get('/operations_close','Controller@operations_close');
Route::get('/operations_net_sale','Controller@operations_net_sale');
Route::get('/operations_net_billing','Controller@operations_net_billing');
Route::get('/operations_net_actual','Controller@operations_net_actual');
Route::get('/freez_open','Controller@freez_open');
Route::get('/freez_close','Controller@freez_close');
Route::get('/freez_transactions','Controller@freez_transactions');

Route::get('/expences-in','Controller@expences_in');
Route::get('/expences','Controller@expences');
Route::post('/update-expences','Controller@update_expences');
Route::post('/delete-expences','Controller@delete_expences');
//end of operation routes

//reports routes
Route::get('/reports','Controller@reports');
Route::get('/reports_suppliers','Controller@reports_suppliers');
Route::get('/reports_payments','Controller@reports_payments');
//end of reports routes

//billing routes
Route::get('/billing','Controller@billing');
Route::get('/billing_item','Controller@billing_item');
Route::get('/billing_delete','Controller@billing_delete');
Route::get('/billing_delete_item','Controller@billing_delete_item');
Route::get('/billing_final','Controller@billing_final');
//end of billing routes