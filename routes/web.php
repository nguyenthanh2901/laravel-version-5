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

Route::group(['namespace'=>'Auth'],function ()
{
    Route::get('Register','RegisterController@getRegister')->name('get.register');
    Route::post('Register','RegisterController@postRegister')->name('post.register');

    Route::get('Log-in','LoginController@getLogin')->name('get.login');
    Route::post('Log-in','LoginController@postLogin')->name('post.login');

    Route::get('Log-out','LoginController@getLogout')->name('get.logout.user');

    // Route::get('/quen-mat-khau','ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
    // Route::post('/quen-mat-khau','ForgotPasswordController@sendCodeResetPassword');
    
    // Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
    // Route::post('/password/reset','ForgotPasswordController@saveResetPassword');
});


Route::get('/', 'HomeController@index')->name('home');

Route::get('category/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('product/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');
Route::get('category','CategoryController@getListProduct')->name('get.product.list');

Route::get('blog','ArticleController@getListArticle')->name('get.list.article');
Route::get('blog/{slug}-{id}','ArticleController@getDetailArticle')->name('get.detail.article');
