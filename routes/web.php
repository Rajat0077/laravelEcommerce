<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group   . Now create something great!
|
*/

// Route::get('/layout', function () {
//     return view('layout');
// });
// Route::get('/', function(){
//     return view('home');
// });

// ABOUT THIS PROEJCT


// Pages Folder Having Website First Page is Shown 
// Admin Folder Having All the Section Related to Create Category , Brands and others features
// that should be there In ADMIN Panel Section ...


Route::get('/', 'HomeController@index'); // Here Front Page For Ecommerce Site Will be Opened ...

Route::get('/admin' , 'AdminController@index'); // Here Admin Dashboard Is Open

Route::get('/login' , 'AdminController@login'); //  Here Login page Will OPEN 

//Route::get('/admin-dashboard', 'AdminController@dashboard'); // Nothing Work Here ...

Route::get('/logout' , 'SuperAdminController@logout');

Route::get('/add-category', 'CategoryController@index');   

Route::get('/all-category', 'CategoryController@all_category');

Route::get('/save-category', 'CategoryController@save_category');

Route::get('/unactive_category/{unactive_id}', 'CategoryController@unactive_category');  

Route::get('/inactive_category/{inactive_id}', 'CategoryController@inactive_category');  

Route::get('/edit_category/{category_id}', 'CategoryController@edit_category');  

//Route::get('edit_category/{course_id}', 'CategoryController@edit_category');   // Here No Categorie Called 
									
// Route::get('/edit_category/{course_id}', [
//     'as' => 'edit_category', 'uses' => 'CategoryController@edit_category'
// ]);   


Route::get('/update_category/{category_id}', 'CategoryController@update_category'); 

Route::get('/delete_category/{category_id}' , 'CategoryController@delete_category');

Route::get('/add-manufacture' , 'ManufactureController@add_manufacture');

Route::get('/save-manufacture', 'ManufactureController@save_manufacture');

Route::get('/all-manufacture' , 'ManufactureController@all_manufacture');

Route::get('/inactive_manufacture/{manufacture_id}', 'ManufactureController@inactive_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}', 'ManufactureController@unactive_manufacture');
Route::get('/edit_manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::get('/update_manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');


// Now Working on Adding Product Description ....
Route::get('/add_product', 'ProductController@add_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/all_product' , 'ProductController@all_product');
Route::get('/inactive_product/{product_id}', 'ProductController@inactive_product');
Route::get('/active_product/{product_id}', 'ProductController@active_product');
Route::get('/edit_product/{product_id}' , 'ProductController@edit_product');

// Now Working For testing Purpose For Uploading Image Into Database ...

Route::get('/test_case', 'TestController@test_case');
Route::post('/test_save', 'TestController@test_save');

// Create Link For Slider Section ...

Route::get('/add_slider' , 'SliderController@add_slider');  
Route::post('/save_sliderrr' , 'SliderController@save_slider');  
Route::get('/all_slider' , 'SliderController@all_slider');
Route::get('/inactive_slider/{slider_id}', 'SliderController@inactive_slider');
Route::get('/active_slider/{slider_id}', 'SliderController@active_slider');
Route::get('/delete_slider/{slider_id}' , 'SliderController@delete_slider');


// Show Product By Category Wise only

Route::get('/product_by_category/{cat_prod_id}', 'HomeController@product_by_category');
Route::get('/product_by_manufacture/{manuf_prod_id}', 'HomeController@manuf_prod_id');

// Show particular product By Id ..


Route::get('/view_productdetail_byid/{manuf_prod_id}', 'HomeController@view_productdetail_byid');


// Now Adding Product into Cart ---------------------------------

Route::post('/add_to_cart' , 'CartController@add_to_cart');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');

Route::post('/update-cart-quantity', 'CartController@update_cart_quantity');

// Customer Login And Logout ============================================
Route::get('/login-check', 'CheckoutController@login_check');
Route::post('/customer_login', 'CheckoutController@customer_login');
Route::post('/customer-registration', 'CheckoutController@customer_registration');
Route::get('/customer_logout', 'CheckoutController@customer_logout');

Route::get('/checkout', 'CheckoutController@checkout'); // this link open from login_check.blade.php page Only.. reason for this page is for Login Check

// Adding Shipping Address to Database ... 
Route::post('/save-shipping', 'CheckoutController@save_shipping');
// For adding Payment Section

Route::get('/payment', 'CheckoutController@payment');