<?php
 
Auth::routes();
Route::group(['namespace' => 'Auth'], function(){
    Route::get  ('dang-nhap','LoginController@getLogin')    ->name('get.login');
    Route::post ('dang-nhap','LoginController@postLogin')   ->name('post.login');

    Route::get ('dang-xuat','LoginController@getLogout')   ->name('get.logout.user');

    Route::get  ('dang-ky'  ,'RegisterController@getRegister')  ->name('get.register');
    Route::post ('dang-ky'  ,'RegisterController@postRegister') ->name('post.register');

    Route::get  ('lay-lai-mat-khau'  ,'ForgotPasswordController@getFormResetPassword')  ->name('get.form.reset.password');
    Route::post  ('lay-lai-mat-khau' ,'ForgotPasswordController@sendCodeResetPassword');

    Route::get  ('reset-mat-khau'  ,'ForgotPasswordController@getresetPassword')  ->name('get.send.reset.password');
});
//Mua hàng
Route::prefix('shopping')->group(function(){
    Route::get('/them/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('/xoa/{id}','ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
    Route::get('/danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
});
//Thanh toán 
Route::group(['prefix' => 'gio-hang','middleware' =>'CheckLoginUser'],function(){
    Route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
});
//Đánh giá
Route::group(['prefix' => 'ajax','middleware' =>'CheckLoginUser'],function(){
    Route::post('/danh-gia/{id}','RatingController@saveRating')->name('post.rating.product');
});
//Sản phẩm vừa xem qua
Route::group(['prefix' => 'ajax'],function(){
    Route::post('/view-product','HomeController@rederProductView')->name('post.product.view');
});
//Trang chủ
Route::get('/', 'HomeController@index')->name('home');

//Sản phẩm
Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')      ->name('get.list.product');
Route::get('san-pham/{slug}-{id}','ProdutDetailController@productDetail')   ->name('get.detail.product');

//Bài viết
Route::get('bai-viet','ArticleController@getListArticle')                       ->name('get.list.article');
Route::get('bai-viet/{slug}-{id}','ArticleController@getDetailArticle')         ->name('get.detail.article');
//Trang tĩnh
Route::get('ve-chung-toi' ,'PageStaticController@aboutUs')  ->name('get.about_us');
Route::get('thong-tin-van-chuyen' ,'PageStaticController@delivery')  ->name('get.delivery');
Route::get('chinh-sach-bao-mat' ,'PageStaticController@security')  ->name('get.security');
Route::get('dieu-khoan-dich-vu' ,'PageStaticController@policy')  ->name('get.policy');

//Liên hệ
Route::get  ('lien-he','ContactController@getContact')   ->name('get.contact');
Route::post ('lien-he','ContactController@saveContact');

//Hiển thị tổng quan user
Route::group(['prefix' => 'user','middleware' =>'CheckLoginUser'],function(){
    Route::get('/','UserController@index')->name('user.dashboard');
    Route::get('/info','UserController@updateInfo')->name('user.update.info');
    Route::post('/info','UserController@saveUpdateInfo');
    //Thay đổi mật khẩu
    Route::get('/password','UserController@updatePassword')->name('user.update.password');
    Route::post('/password','UserController@saveUpdatePassword');
    //Hiển thị sản phẩm bán chạy
    Route::get('/san-pham-ban-chay','UserController@getProductPay')->name('user.get.product.pay');
    //Hiển thị sản phẩm quan tâm
    Route::get('/san-pham-quan-tam','UserController@getProductCare')->name('user.get.product.care');


});