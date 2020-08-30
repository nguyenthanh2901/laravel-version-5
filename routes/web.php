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


Route::get('/', 'HomeController@index')->name('home');

Route::get('category/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('product/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');
Route::get('category','CategoryController@getListProduct')->name('get.product.list');

Route::get('blog','ArticleController@getListArticle')->name('get.list.article');
Route::get('blog/{slug}-{id}','ArticleController@getDetailArticle')->name('get.detail.article');
