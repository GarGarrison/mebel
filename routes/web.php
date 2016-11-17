<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Auth::routes();

Route::get('/google51095b7803df147b.html', function(){
    return File::get(public_path() . '/google51095b7803df147b.html');
});
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'IndexController@index');
Route::get('/about', 'IndexController@about');
Route::get('/contacts', 'IndexController@contacts');
Route::get('/catalog', 'IndexController@catalog');
Route::get('/section/{section}', 'IndexController@section');
Route::get('/product/{product}', 'IndexController@product');
Route::get('/util/mail', 'IndexController@getmail');
Route::post('/util/mail', 'IndexController@mail');
Route::get('/order', 'IndexController@order');
Route::post('/order', 'IndexController@order');

Route::get('/article/{url}', 'IndexController@article');

Route::get('/admin', 'AdminController@index');
 
Route::get('/admin/show_add_section/{id?}', 'AdminController@show_add_section');
Route::get('/admin/show_edit_section', 'AdminController@show_edit_section');
Route::post('/admin/add_section', 'AdminController@add_section');
Route::post('/admin/edit_section', 'AdminController@edit_section');

Route::get('/admin/show_add_product/{id?}', 'AdminController@show_add_product');
Route::get('/admin/show_edit_product', 'AdminController@show_edit_product');
Route::post('/admin/add_product', 'AdminController@add_product');
Route::post('/admin/edit_product', 'AdminController@edit_product');

Route::get('/admin/show_add_property/{id?}', 'AdminController@show_add_property');
Route::get('/admin/show_edit_property', 'AdminController@show_edit_property');
Route::post('/admin/add_property', 'AdminController@add_property');
Route::post('/admin/edit_property', 'AdminController@edit_property');

Route::get('/admin/show_add_article/{id?}', 'AdminController@show_add_article');
Route::get('/admin/show_edit_article', 'AdminController@show_edit_article');
Route::post('/admin/add_article', 'AdminController@add_article');
Route::post('/admin/edit_article', 'AdminController@edit_article');

Route::get('/admin/show_add_similar/{id?}', 'AdminController@show_add_similar');
Route::get('/admin/show_edit_similar', 'AdminController@show_edit_similar');
Route::post('/admin/add_similar', 'AdminController@add_similar');
Route::post('/admin/edit_similar', 'AdminController@edit_similar');
Route::post('/admin/del_similar/{id}', 'AdminController@del_similar');

Route::get('/test', 'IndexController@test');