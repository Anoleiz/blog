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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'middleware' => [ 'web', 'auth' ]], function () {
    Route::get('/admin', 'PostsController@index')->name('admin-posts');
    Route::match(['get', 'post'], '/admin/add', 'PostsController@add')->name('admin-posts-add');
    Route::match(['get', 'post'], '/admin/edit/{post}', 'PostsController@edit')->name('admin-posts-edit');
    Route::get('/admin/del/{id}', 'PostsController@del')->name('admin-posts-del');
});
