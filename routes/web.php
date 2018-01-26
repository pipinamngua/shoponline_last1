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

Auth::routes();

//Doan start
// Tim Kiem
Route::get('search',[ 'as'=>'search',
	'uses'=>'HomeController@GetSearch'
]);

// Route Phan Loai
Route::get('Category/{cat}',['as'=>'category',
	'uses'=>'HomeController@GetCategory'
]);

Route::get('Supplier/{sup}',['as'=>'supplier',
	'uses'=>'HomeController@GetSupplier'
]);

Route::get('Sort/{sort}',['as'=>'sort',
	'uses'=>'HomeController@GetSort'
]);
Route::get('/', 'HomeController@index');
//end Doan

//Hoang lam
//product detail
Route::get('product/{id}','ProductController@index');
Route::post('product/review/{id}/{user_id}','ReviewController@store');

Route::post('compare/{id}','CompareController@index');

//end Hoang

Route::group(['middleware' => 'auth'],function(){
	//Long start
	Route::get('profile','Account\ProfileController@index');
	Route::post('profile/{id}','Account\ProfileController@update');
	Route::get('profile/change-password', 'Account\ProfileController@edit');
	Route::post('profile/change-password/{id}', 'Account\ProfileController@changePassword');
});
Route::group(['middleware' => 'App\Http\Middleware\check'],function(){
	Route::get('admin','Admin\DashboardController@index');
	//Quan ly san pham
	Route::get('admin/product','Admin\ProductController@index');
	Route::get('admin/product/create','Admin\ProductController@create');
	Route::post('admin/product/create','Admin\ProductController@store');
	Route::get('admin/product/{id}/edit','Admin\ProductController@edit');
	Route::patch('admin/product/{id}','Admin\ProductController@update');
	Route::delete('admin/product/{id}','Admin\ProductController@destroy');
//end Quang
	//Quan ly danh muc san pham
	Route::get('admin/category','Admin\CategoryController@index');
	Route::get('admin/category/create','Admin\CategoryController@create');
	Route::post('admin/category/create','Admin\CategoryController@store');
	Route::get('admin/category/{id}/edit','Admin\CategoryController@edit');
	Route::patch('admin/category/{id}','Admin\CategoryController@update');
	Route::delete('admin/category/{id}','Admin\CategoryController@destroy');
	//Quan ly review
	Route::get('admin/review/show','Admin\ReviewController@index');
	Route::post('admin/review/daXuLy/{id}','Admin\ReviewController@daXuLy');
	Route::post('admin/review/chuaXuLy/{id}','Admin\ReviewController@chuaXuLy');
	Route::delete('admin/review/{id}','Admin\ReviewController@destroy');
	//Quan ly user 
	Route::get('admin/user/show', 'Admin\UserController@index');
	Route::post('admin/user/upgrade/{id}', 'Admin\UserController@upgrade');
	Route::post('admin/user/downgrade/{id}', 'Admin\UserController@downgrade');
	Route::delete('admin/user/delete/{id}', 'Admin\UserController@destroy');
	Route::get('admin/user/create', 'Admin\UserController@create');
	Route::post('admin/user/create', 'Admin\UserController@store');
	Route::get('admin/user/{id}/edit', 'Admin\UserController@edit');
	Route::PATCH('admin/user/show/{id}', 'Admin\UserController@update');

});
//Quang start
Route::get('themgiohang/{id}', 'HomeController@getAddToCart');
Route::get('xoagiohang/{id}', 'HomeController@getDelItemCart');
Route::get('dathang', 'HomeController@getCheckout');
Route::post('dathang', 'HomeController@postCheckout');
Route::get('admin/order/', 'Admin\OrderController@getAll');
Route::get('admin/cart/', 'Admin\OrderController@search');



