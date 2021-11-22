<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

////////////////////////////////////////////// Auth ///////////////////////////////////////////////


//Route::post('login' , 'AuthController@login')->name('login');
//Route::post('verify-account' , 'AuthController@verify_account');
//Route::post('resend-code' , 'AuthController@resend_code');

Route::group(['prefix' => 'user'] , function () {
Route::post('register-user' , 'AuthController@register')->name('register');
});
Route::group(['prefix' => 'agent'] , function () {
    Route::post('register', 'AuthAdminController@register');
});


Route::group(['prefix' => 'user'] , function (){
    Route::post('login' , 'AuthAdminController@login');
    Route::post('verify-account' , 'AuthAdminController@verify_account');
    Route::post('activate-account' , 'AuthAdminController@activate_my_account');
    Route::post('resend-code' , 'AuthAdminController@resend_code');
    Route::post('forget-password' , 'AuthAdminController@forget_password');
    Route::post('change-password' , 'AuthAdminController@change_password');
    Route::post('reset-password' , 'AuthAdminController@reset_password');
    Route::post('forget-password-confirm' , 'AuthAdminController@forget_password_confirm');

    Route::group(['middleware' => ['auth:user-api']] , function (){
        Route::post('logout' , 'AuthAdminController@logout');
        Route::get('profile' , 'AuthAdminController@profile');
        Route::post('change-phone-number' , 'AuthAdminController@change_phone_number');
        Route::get('check-token' , 'AuthAdminController@check_token');
        Route::post('update-profile' , 'AuthAdminController@update_profile');
        Route::post('delete-account' , 'AuthAdminController@delete_account');
    });
});


////////////////////////////////////////////// Lists ///////////////////////////////////////////////

Route::group(['prefix' => 'lists'] , function () {

    Route::get('type-jobs', 'ListsController@type_jobs');
    Route::get('sections', 'ListsController@sections');
    Route::get('contact-medias', 'ListsController@contact_medias');

});
