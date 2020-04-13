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





Route::auth();
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/list_shop/{id}', 'HomeController@list_shop')->name('list_shop');
  Route::get('/shop_detail/{id}', 'HomeController@shop_detail')->name('shop_detail');
  Route::get('/gallery_detail/{id}', 'HomeController@gallery_detail')->name('gallery_detail');
  Route::get('/search_shop', 'HomeController@search_shop')->name('search_shop');
    Route::get('api/get_file_doc/{id}', 'ApiController@get_file_doc')->name('get_file_doc');

});


Route::group(['middleware' => ['UserRole:manager|employee']], function() {


  Route::get('admin/user_edit/{id}', 'studentController@user_edit')->name('user_edit');
  Route::get('admin/user', 'studentController@user')->name('user');
  Route::post('/api/edit_my_user', 'studentController@edit_my_user')->name('edit_my_user');


  Route::post('/api/post_folder_image', 'ApiController@post_folder_image')->name('post_folder_image');
  Route::post('/api/post_file_download', 'ApiController@post_file_download')->name('post_file_download');

  Route::get('admin/search_shop', 'AdminController@search_shop')->name('search_shop');

  Route::get('admin/folder/{id}', 'AdminController@folder')->name('folder');

  Route::get('api/del_image_folder/{id}/{folder}', 'ApiController@del_image_folder')->name('del_image_folder');
  Route::get('api/del_my_folder/{folder}/{shop}', 'ApiController@del_my_folder')->name('del_my_folder');
  Route::get('api/del_my_shop/{id}/{prov}', 'ApiController@del_my_shop')->name('del_my_shop');


  Route::post('/api/add_all_image', 'ApiController@add_all_image')->name('add_all_image');
  Route::post('/api/edit_folder_image', 'ApiController@edit_folder_image')->name('edit_folder_image');

  Route::get('api/del_file_doc/{id}/{shop}', 'ApiController@del_file_doc')->name('del_file_doc');

  Route::get('admin/index', 'AdminController@index')->name('home');
  Route::get('admin/list_shop/{id}', 'AdminController@list_shop')->name('list_shop');
  Route::get('admin/shop_detail/{id}', 'AdminController@shop_detail')->name('shop_detail');
  Route::get('admin/gallery_detail/{id}', 'AdminController@gallery_detail')->name('gallery_detail');

  Route::get('admin/create_shop/{id}', 'AdminController@create_shop')->name('create_shop');
  Route::post('/api/add_my_shop', 'ApiController@add_my_shop')->name('add_my_shop');
  Route::post('/api/edit_my_shop', 'ApiController@edit_my_shop')->name('edit_my_shop');

  Route::get('admin/edit_shop/{id}', 'AdminController@edit_shop')->name('edit_shop');

});
