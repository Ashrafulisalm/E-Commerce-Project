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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','HomeController@index');



//Frontend======================================

Route::get('/productbycatagory/{id}','HomeController@productbycatagory');
Route::get('/productbybrand/{id}','HomeController@productbybrand');
Route::get('/viewproduct/{id}','HomeController@viewproduct');
Route::get('/homeproductsearch','HomeController@productsearch');



//Comment===============
Route::post('/addcomment','CommentController@addcomment');


//Cart=================================

Route::post('/addtocart','CartController@addtocart');
Route::get('/viewcart','CartController@viewcart');
Route::get('/removecart/{id}','CartController@removecart');
Route::post('/increaseqty','CartController@increase');
Route::post('/decreaseqty','CartController@decrease');



//Customer========================

Route::get('/login_check','CustomerController@index');
Route::post('/customer_register','CustomerController@customerregister');
Route::get('/checkout','CustomerController@checkout');
Route::post('/customer_login','CustomerController@customerlogin');
Route::get('/customer_logout','CustomerController@customerlogout');
Route::get('/home_login','CustomerController@index1');
Route::post('/customer_register1','CustomerController@customerregister1');
Route::post('/customer_login1','CustomerController@homelogin');


//payment====================================
Route::post('/shipping','PaymentController@shipping');
Route::get('/payment','PaymentController@index');
Route::post('/success','PaymentController@success');


//Order===================================
Route::get('/manage_order','OrderController@index');
Route::get('/pending/{id}','OrderController@pending');
Route::get('/done/{id}','OrderController@done');
Route::get('/vieworder/{id}','OrderController@vieworder');




// Admin controller-----------------------------------

Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperadminController@index');
Route::post('/admin_dashboard','AdminController@dashboard');




Route::get('/logout','SuperadminController@logout');


//Catagory======================

Route::get('/catagory','CatagoryController@index');
Route::post('/addcatagory','CatagoryController@addcatagory');
Route::get('/allcatagory','CatagoryController@allcatagory');
Route::get('/unactive/{id}','CatagoryController@unactive');
Route::get('/active/{id}','CatagoryController@active');
Route::get('/deletecatagory/{id}','CatagoryController@deletecatagory');
Route::post('/updatecatagory/{id}','CatagoryController@updatecatagory');
Route::get('/editcatagory/{id}','CatagoryController@editcatagory');


//Brands=============================

Route::get('/brands','BrandController@index');
Route::post('/addbrand','BrandController@addbrand');
Route::get('/allbrand','BrandController@allbrand');
Route::get('/bunactive/{id}','BrandController@unactive');
Route::get('/bactive/{id}','BrandController@active');
Route::get('/deletebrand/{id}','BrandController@deletebrand');
Route::post('/updatebrand/{id}','BrandController@updatebrand');
Route::get('/editbrand/{id}','BrandController@editbrand');
Route::get('/search','BrandController@search');


//Sub Catagory===============================

Route::get('/subcatagory','Sub_catagoryController@index');
Route::post('/addsubcatagory','Sub_catagoryController@addsubcatagory');
Route::get('/allsubcatagory','Sub_catagoryController@allsubcatagory');
Route::get('/sunactive/{id}','Sub_catagoryController@unactive');
Route::get('/sactive/{id}','Sub_catagoryController@active');
Route::get('/deletesubcatagory/{id}','Sub_catagoryController@deletesubcatagory');
Route::get('/editsubcatagory/{id}','Sub_catagoryController@editsubcatagory');
Route::post('/updatesubcatagory/{id}','Sub_catagoryController@updatesubcatagory');
Route::get('/subsearch','Sub_catagoryController@search');


//Products======================================

Route::get('/product','ProductController@index');
Route::get('/dropdownlist','ProductController@index');
Route::get('/dropdownlist/getstates/{id}','ProductController@getSubcatagory');
Route::post('/addproduct','ProductController@addproduct');
Route::get('/allproduct','ProductController@allproduct');
Route::get('/punactive/{id}','ProductController@unactive');
Route::get('/pactive/{id}','ProductController@active');
Route::get('/deleteproduct/{id}','ProductController@deleteproduct');
Route::get('/editproduct/{id}','ProductController@editproduct');
Route::post('/updateproduct/{id}','ProductController@updateproduct');
Route::get('/productsearch','ProductController@productsearch');
Route::get('/addimage/{id}','ProductController@addimage');
Route::post('/addproductimage','ProductController@addproductimage');



//Slider=========================================

Route::get('/slider','SliderController@index');
Route::post('/addslider','SliderController@addslider');
Route::get('/allslider','SliderController@allslider');
Route::get('/sunactive/{id}','SliderController@unactive');
Route::get('/sactive/{id}','SliderController@active');
Route::get('/deleteslider/{id}','SliderController@deleteslider');

