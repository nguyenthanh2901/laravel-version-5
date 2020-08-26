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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route:: group(['prefix'=>'category'], function ()
    {
        Route:: get('/', 'AdminCategoryController@index')-> name('admin.get.list.category');
        Route:: get('/create', 'AdminCategoryController@create')-> name('admin.get.create.category');
        Route:: post('/create', 'AdminCategoryController@store');
        Route:: get('/update/{id}', 'AdminCategoryController@edit')-> name('admin.get.edit.category');
        Route:: post('/update/{id}', 'AdminCategoryController@update');
        Route:: get('/{action}/{id}', 'AdminCategoryController@action')-> name('admin.get.action.category');
        Route:: get('/delete/{id}', 'AdminCategoryController@delete')-> name('admin.get.delete.category');
    });

    Route:: group(['prefix'=>'product'], function ()
    {
        Route:: get('/', 'AdminProductController@index')-> name('admin.get.list.product');
        Route:: get('/create', 'AdminProductController@create')-> name('admin.get.create.product');
        Route:: post('/create', 'AdminProductController@store');
        Route:: get('/update/{id}', 'AdminProductController@edit')-> name('admin.get.edit.product');
        Route:: post('/update/{id}', 'AdminProductController@update');
        Route:: get('/delete/{id}', 'AdminProductController@delete')-> name('admin.get.delete.product');
        Route:: get('/{action}/{id}', 'AdminProductController@action')-> name('admin.get.action.product');
    });

    Route:: group(['prefix'=>'article'], function ()
    {
        Route:: get('/', 'AdminArticleController@index')-> name('admin.get.list.article');
        Route:: get('/create', 'AdminArticleController@create')-> name('admin.get.create.article');
        Route:: post('/create', 'AdminArticleController@store');
        Route:: get('/update/{id}', 'AdminArticleController@edit')-> name('admin.get.edit.article');
        Route:: post('/update/{id}', 'AdminArticleController@update');
        Route:: get('/delete/{id}', 'AdminArticleController@delete')-> name('admin.get.delete.article');
        Route:: get('/{action}/{id}', 'AdminArticleController@action')-> name('admin.get.action.article');
    });

    Route::group(['prefix' => 'slide'], function(){
        Route:: get('/', 'AdminSlidesController@index')-> name('admin.get.list.slide');
        Route:: get('/create', 'AdminSlidesController@create')-> name('admin.get.create.slide');
        Route:: post('/create', 'AdminSlidesController@store');
        Route:: get('/delete/{id}', 'AdminSlidesController@delete')-> name('admin.get.delete.slide');
    });

    Route:: group(['prefix'=>'coupon'], function ()
    {
        Route:: get('/', 'AdminCouponController@index')-> name('admin.get.list.coupon');
        Route:: get('/create', 'AdminCouponController@create')-> name('admin.get.create.coupon');
        Route:: post('/create', 'AdminCouponController@store');
        Route:: get('/update/{id}', 'AdminCouponController@edit')-> name('admin.get.edit.coupon');
        Route:: post('/update/{id}', 'AdminCouponController@update');
        Route:: get('/{action}/{id}', 'AdminCouponController@action')-> name('admin.get.action.coupon');
        Route:: get('/delete/{id}', 'AdminCouponController@delete')-> name('admin.get.delete.coupon');
    });
});
