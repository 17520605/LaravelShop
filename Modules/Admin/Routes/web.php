<?php

Route::prefix('authenticate')->group(function() {
    Route::post('/login', 'AdminAuthController@postLogin');
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
    Route::get('/logout', 'AdminAuthController@logOutAdmin')->name('admin.logout');
    
});

Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home'); 

    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'Admincategorycontroller@index')->name('admin.get.list.category');
        Route::get('/create', 'Admincategorycontroller@create')->name('admin.get.create.category');
        Route::post('/create', 'Admincategorycontroller@store');
        Route::get('/update/{id}', 'Admincategorycontroller@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}', 'Admincategorycontroller@update');
        Route::get('/{action}/{id}', 'Admincategorycontroller@action')->name('admin.get.action.category');
    });

    Route::group(['prefix' => 'product'], function(){
        Route::get('/', 'Adminproductcontroller@index')->name('admin.get.list.product');
        Route::get('/create', 'Adminproductcontroller@create')->name('admin.get.create.product');
        Route::post('/create', 'Adminproductcontroller@store');
        Route::get('/update/{id}', 'Adminproductcontroller@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}', 'Adminproductcontroller@update');
        Route::get('/{action}/{id}', 'Adminproductcontroller@action')->name('admin.get.action.product');
    });

    Route::group(['prefix' => 'article'], function(){
        Route::get('/', 'Adminarticlecontroller@index')->name('admin.get.list.article');
        Route::get('/create', 'Adminarticlecontroller@create')->name('admin.get.create.article');
        Route::post('/create', 'Adminarticlecontroller@store');
        Route::get('/update/{id}', 'Adminarticlecontroller@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}', 'Adminarticlecontroller@update');
        Route::get('/{action}/{id}', 'Adminarticlecontroller@action')->name('admin.get.action.article');
    });


    Route::group(['prefix' => 'transaction'], function(){
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');
        Route::get('/active/{id}','AdminTransactionController@activeTransaction')->name('admin.get.active.transaction');
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.get.action.transaction');
       
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
       
    });

    Route::group(['prefix' => 'rating'], function(){
        Route::get('/', 'AdminRatingController@index')->name('admin.get.list.rating');
       
    });

    Route::group(['prefix' => 'contact'], function(){
        Route::get('/', 'AdminContactController@index')->name('admin.get.list.contact');
        Route::get('/{action}/{id}', 'AdminContactController@action')->name('admin.action.contact');
       
    });

    Route::group(['prefix' => 'page-static'], function(){
        Route::get('/', 'AdminPageStaticController@index')->name('admin.get.list.page_static');
        Route::get('/create', 'AdminPageStaticController@create')->name('admin.get.create.page_static');
        Route::post('/create', 'AdminPageStaticController@store');
        Route::get('/update/{id}', 'AdminPageStaticController@edit')->name('admin.get.edit.page_static');
        Route::post('/update/{id}', 'AdminPageStaticController@update');
        Route::get('/{action}/{id}', 'AdminPageStaticController@action')->name('admin.get.action.page_static');
       
    });

});

