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


Route::get('/', 'HomeController@index');


Route::get('/admin' , 'AdminController@index'); // Here Admin Dashboard Is Open

Route::get('/login' , 'AdminController@login'); //  Here Login page Will OPEN 

Route::get('/admin-dashboard', 'AdminController@dashboard');

Route::get('/logout' , 'SuperAdminController@logout');

Route::get('/add-category', 'CategoryController@index');   

Route::get('/all-category', 'CategoryController@all_category');

Route::get('/save-category', 'CategoryController@save_category');

Route::get('/unactive_category/{unactive_id}', 'CategoryController@unactive_category');  

Route::get('/inactive_category/{inactive_id}', 'CategoryController@inactive_category');  