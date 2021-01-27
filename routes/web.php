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



Auth::routes();
//default registartion it will not allow now
// Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {
    
	Route::get('/', 'HomeController@index')->name('home');


	Route::get('productListing','productController@index')->name('product');

	Route::post('productInsert','productController@insert');
	Route::get('categoryListing','categoryController@index')->name('category');
});
//admin
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//admin
Route::group(['middleware' => ['auth:admin']], function() {

Route::view('/admin', 'admin');
Route::get('categoryList','Admin\AdminCategoryController@index')->name('admincategory');
Route::get('productList','Admin\AdminproductController@index')->name('adminproduct');
});

