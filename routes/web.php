<?php

use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Route;
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
//Clear route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});
//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
// Clear Personal Access Token:
Route::get('/personal-access', function() {
    $exitCode = Artisan::call('passport:install');
    return 'Personal Access Token Created';
});
// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

//Rough Routes for testing and for cpanel config
Route::get('/email', function () {
    return new ResetPasswordMail();
});

Route::get('/', function () {
    return 'website';
});

//Group Routes With Admin Language Middleware for hadnling localisation

Route::group(['prefix' => 'admin'], function () {

    //////////////Admin Side Routes////////////////////

    //Route for loading admin login page
    Route::get('/', 'Admin\AuthController@index')->name('admin');
    //Route for admin's login process
    Route::post('/login-pro', 'Admin\AuthController@login_process');
    //Route for admin's forgot-password view
    Route::get('/forgot-password', 'Admin\AuthController@forgot_password');
    //Route for admin's forgot-password process
    Route::post('/forgot-password-process', 'Admin\AuthController@forgot_password_process');
    //Route for admin's resert-password view
    Route::get('/reset-password/{token}', 'Admin\AuthController@reset_password');
    //Route for admin's reset-password process
    Route::post('/reset-password-process', 'Admin\AuthController@reset_password_process');
    //setting up the demanded language here
    Route::get('/admin_lang/{lang}',  function ($lang) {
        Session::put('admin_lang', $lang);
        return redirect()->back();

    });
    //routes for USERS//
    Route::group(['prefix' => 'users'], function () {
        Route::get('/',[UserController::class,'index'])->name('users.list');
        Route::get('create', [UserController::class,'create'])->name('users.createView');
        Route::post('/create', [UserController::class,'create_process'])->name('users.create-process');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('users.edit');
        Route::post('/update', [UserController::class,'update'])->name('users.update');
        Route::post('/delete', [UserController::class,'delete'])->name('users.delete');
        Route::post('/change-status', [UserController::class,'change_status'])->name('users.change-status');
    });

     //ROUTES FOR DEPOSITS//
    Route::group(['prefix' => 'deposits'], function () {
        Route::get('/',[DepositController::class,'index'])->name('deposits.list');
        Route::get('create', [DepositController::class,'create'])->name('deposits.createView');
        Route::post('/create', [DepositController::class,'create_process'])->name('deposits.create-process');
        Route::get('/edit/{id}', [DepositController::class,'edit'])->name('deposits.edit');
        Route::post('/update', [DepositController::class,'update'])->name('deposits.update');
        Route::post('/delete', [DepositController::class,'delete'])->name('deposits.delete');
        Route::post('/change-status', [DepositController::class,'change_status'])->name('deposits.change-status');
    });

     //routes for contact-support//
     Route::group(['prefix' => 'contact-supports'], function () {
        Route::get('/', 'ContactSupportController@index')->name('contact-support.list');
        Route::get('/edit/{id}', 'ContactSupportController@editView');
    });
    //Group route for all admin routes
    Route::group(['middleware' => 'auth:web'], function () {
        //Route for loading dashboard page
        Route::get('/dashboard', 'Admin\DashboardController@index');


        //Profile Module Routes
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'Admin\ProfileController@index');

            //Settings Module Routes
            Route::group(['prefix' => 'settings'], function () {
                Route::get('/', 'Admin\SettingController@index');
                //change password routes
                Route::get('/change-password', 'Admin\SettingController@change_password');
                Route::post('/change-password-process', 'Admin\SettingController@change_password_process');
                Route::post('/check-old-password', 'Admin\SettingController@check_old_password');

                //update profile
                Route::post('/update-profile', 'Admin\SettingController@update_profile');
            });
        });

        //Route for admin's logout
        Route::get('/logout', 'Admin\AuthController@logout');
    });
});



