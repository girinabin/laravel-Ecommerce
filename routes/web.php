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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){

	// LOGOUT
	Route::get('/logout','DashboardController@logout')->name('logout');
	// DASHBOARD
	Route::get('/','DashboardController@admin')->name('admin-dashboard');

	// BANNER STARTS HERE

	Route::group(['prefix'=>'banner'],function(){

		Route::get('/','BannerController@listBanner')->name('banner-list');
		Route::get('/add','BannerController@addBanner')->name('banner-add');
		Route::get('/edit/{ban}','BannerController@addBanner')->name('edit-banner');
		Route::post('/edit/{ban}','BannerController@postBanner')->name('update-banner');
		Route::post('/post','BannerController@postBanner')->name('post-banner');
		Route::get('/delete/{del}','BannerController@deleteBanner')->name('delete-banner');
		Route::post('/status/{ban}','BannerController@statusBanner')->name('status-banner');


	});
	// BANNER ENDS HERE

	// CATEGORY STARTS HERE

	Route::group(['prefix'=>'category'],function(){

		Route::get('/','CategoryController@listCategory')->name('list-category');
		Route::get('/add','CategoryController@addCategory')->name('add-category');
		Route::get('/edit/{cat}','CategoryController@addCategory')->name('edit-category');
		Route::post('/edit/{cat}','CategoryController@postCategory')->name('update-category');
		Route::post('/post','CategoryController@postCategory')->name('post-category');
		Route::get('/delete/{cat}','CategoryController@deleteCategory')->name('delete-category');
		Route::post('/status/{cat}','CategoryController@statusCategory')->name('status-category');
	});

	});
	
