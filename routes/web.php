<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Utils\UrlUtil;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@renderProduct');
Route::get('/category/{categoryID}','HomeController@renderProductByCategory');
/**
 * middleware auth for admin routes
 */
Route::group(['middleware' => ['MyAuth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('','AdminPageController@renderAdminPage');
        Route::get('manageStaff','AdminPageController@renderStaff');
        Route::get('manageUser','AdminPageController@renderUser');
        Route::get('category','AdminPageController@renderCategory');
        Route::get('manageProduct','AdminPageController@renderProduct')->name('manageProduct');
    });
 });

/**
 * login page
 */
Route::get('admin/login', "AdminPageController@loginPage");
Route::post('/loginAdmin','AuthController@login');

//test send email
Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

//test send email
Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');
/**
 * shopping cart
 */
Route::post('/cart', 'CartController@add');
Route::get('/increaseCartItem/{id}', 'CartController@increaseCartItem');
Route::get('/decreaseCartItem/{id}', 'CartController@decreaseCartItem');

Route::get('/checkout', 'CartController@checkout');

//search
Route::get('/search','HomeController@getSearch');

//thank you
Route::get('/thankyou',function(){
    return view('thankyou');
});
