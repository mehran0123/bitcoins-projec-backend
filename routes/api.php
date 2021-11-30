<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AudiosController;
use App\Http\Controllers\Api\ContactSupportController;
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
/**Auth Apis */
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('forgot-password', [AuthController::class, 'forgot_password']);
Route::post('contact-support', [ContactSupportController::class, 'contact_support']);
Route::get('privacy-policy', [ContactSupportController::class, 'privacy_policy']);
/**Misc. Apis */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/', 'middleware' => 'auth:api'], function(){
//TODO: Logout Route
Route::get('logout', [AuthController::class, 'logout']);
Route::post('update-profile', [AuthController::class, 'update_profile']);
Route::get('get-audios', [AudiosController::class, 'get_audios']);
Route::post('change-password', [AuthController::class, 'change_password']);

});

//TODO: Route works if a api does not exist
Route::fallback(function()
{
    return response()->json(['status' => 404, 'message' => 'The request route is not exits.']);
});
