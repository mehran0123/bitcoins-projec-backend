<?php

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
    //routes for Audio Categories//
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Categories@index')->name('categories.list');
        Route::get('create', 'Categories@createView')->name('category.createView');
        Route::post('/create', 'Categories@create')->name('category.create');
        Route::get('/edit/{id}', 'Categories@editView');
        Route::get('/view-category-courses/{id}', 'Categories@ViewCategoryCourese');
        Route::post('/update', 'Categories@update')->name('category.update');
        Route::post('/delete', 'Categories@delete_category')->name('category.delete');
        Route::post('/change-status', 'Categories@change_category_status')->name('category.change-status');
    });
    //routes for Courses Categories//
    Route::group(['prefix' => 'courses-types'], function () {
        Route::get('/', 'CoursesTypesController@index')->name('courses-type.list');
        Route::get('create', 'CoursesTypesController@createView')->name('courses-type.createView');
        Route::post('/create', 'CoursesTypesController@create')->name('courses-type.create');
        Route::get('/edit/{id}', 'CoursesTypesController@editView');
        Route::get('/view-course-audios/{id}', 'CoursesTypesController@ViewCourseAudios');
        Route::post('/update', 'CoursesTypesController@update')->name('courses-type.update');
        Route::post('/delete', 'CoursesTypesController@delete_courses')->name('courses-type.delete');
        Route::post('/change-status', 'CoursesTypesController@change_courses_status')->name('courses-type.change-status');
    });
    //routes for audios//
    Route::group(['prefix' => 'audios'], function () {
        Route::get('/', 'AudioController@index')->name('audios.list');
        Route::get('create', 'AudioController@createView')->name('audios.createView');
        Route::post('/create', 'AudioController@create')->name('audios.create');
        Route::get('/edit/{id}', 'AudioController@editView');
        Route::post('/update', 'AudioController@update')->name('audios.update');
        Route::post('/delete', 'AudioController@delete_audio')->name('audios.delete');
        Route::post('/change-status', 'AudioController@change_audio_status')->name('audios.change-status');
    });
     //routes for audios//
     Route::group(['prefix' => 'courses-audios'], function () {
        Route::get('/', 'CoursesAudiosController@index')->name('courses-audios.list');
        Route::get('create', 'CoursesAudiosController@createView')->name('courses-audios.createView');
        Route::post('/create', 'CoursesAudiosController@create')->name('courses-audios.create');
        Route::get('/edit/{id}', 'CoursesAudiosController@editView');
        Route::post('/update', 'CoursesAudiosController@update')->name('courses-audios.update');
        Route::post('/delete', 'CoursesAudiosController@delete_audio')->name('courses-audios.delete');
        Route::post('/change-status', 'CoursesAudiosController@change_audio_status')->name('courses-audios.change-status');
    });
    //routes for privacy-policy//
    Route::group(['prefix' => 'privacy-policy'], function () {
        Route::get('/', 'PrivacyController@index')->name('privacy-policy.list');
        Route::get('create', 'PrivacyController@createView')->name('privacy-policy.createView');
        Route::post('/create', 'PrivacyController@create')->name('privacy-policy.create');
        Route::get('/edit/{id}', 'PrivacyController@editView');
        Route::post('/update', 'PrivacyController@update')->name('privacy-policy.update');
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



