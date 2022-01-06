<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\PercentageController;
use App\Mail\ResetPasswordMail;
use App\Models\Admin\Transection;
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
    return redirect('/trade-center');
});

//Group Routes With Admin Language Middleware for hadnling localisation

Route::group(['prefix' => 'trade-center'], function () {

    //////////////Admin Side Routes////////////////////
    //Route for loading admin login page
    Route::get('reports/alltransactions', function() {
        return view('admin.dashboard.transaction');
    });
    Route::get('reports/deposits-transactions', function() {
        return view('admin.dashboard.deposits-report');
    });
    Route::get('reports/withdraws-transactions', function() {
        return view('admin.dashboard.withdraw-report');
    });
    Route::get('/', 'Admin\AuthController@index')->name('trade-center');
    //Route for loading referfriend page
    Route::get('/referfriends', 'Admin\ReferFriendsController@index');
    Route::get('/network-tree', 'Admin\MyNetwork@index');
    //Route for admin's login process
    Route::post('/login-pro', 'Admin\AuthController@login_process');
    //Route for admin's forgot-password view
    Route::get('/forgot-password', 'Admin\AuthController@forgot_password');
    //Route for admin's forgot-password process
    Route::post('/forgot-password-process', 'Admin\AuthController@forgot_password_process');
    //Route for admin's resert-password view
    Route::get('/reset-password', 'Admin\AuthController@reset_password');
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
    //routes for Bank//
    Route::group(['prefix' => 'bank'], function () {
        Route::get('/',[BankController::class,'index'])->name('bank.list');
        Route::get('create', [BankController::class,'create'])->name('bank.createView');
        Route::post('/create', [BankController::class,'create_process'])->name('bank.create-process');
        Route::get('/edit/{id}', [BankController::class,'edit'])->name('bank.edit');
        Route::post('/update', [BankController::class,'update'])->name('bank.update');
        Route::post('/delete', [BankController::class,'delete'])->name('bank.delete');
        Route::post('/change-status', [BankController::class,'change_status'])->name('bank.change-status');
    });
    //routes for Sliders //
    Route::group(['prefix' => 'sliders'], function () {
        Route::get('/',[SliderController::class,'index'])->name('sliders.list');
        Route::get('create', [SliderController::class,'create'])->name('sliders.createView');
        Route::post('/create', [SliderController::class,'create_process'])->name('sliders.create-process');
        Route::get('/edit/{id}', [SliderController::class,'edit'])->name('sliders.edit');
        Route::post('/update', [SliderController::class,'update'])->name('sliders.update');
        Route::post('/delete', [SliderController::class,'delete'])->name('sliders.delete');
        Route::post('/change-status', [SliderController::class,'change_status'])->name('sliders.change-status');
    });

    Route::group(['prefix' => 'percentage'], function () {
        Route::get('/',[PercentageController::class,'index'])->name('percentage.list');
        Route::get('/daily-bonus',[PercentageController::class,'daily_bounes'])->name('daily.bonus.list');
        Route::get('/percentage-create', [PercentageController::class,'createView'])->name('percentage.create');
        Route::post('/create-process', [PercentageController::class,'create_process'])->name('percentage.create-process');
        Route::get('/edit/{id}', [PercentageController::class,'edit'])->name('percentage.edit');
        Route::post('/update', [PercentageController::class,'update'])->name('percentage.update');
        Route::post('/delete', [PercentageController::class,'delete'])->name('percentage.delete');
        Route::post('/change-status', [PercentageController::class,'change_status'])->name('percentage.change-status');
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

    //OTP VERIFICATION CODE//
    Route::get('/opt-code', 'Admin\AuthController@code_verification')->name('otp.code.verify');
    Route::post('/opt-code-process', 'Admin\AuthController@code_verification_process')->name('otp.code.verify.process');

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
        Route::get('/logout', 'Admin\AuthController@logout')->name('logout');
    });
});



