<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\AuthController;
use App\Http\Controllers\Admin\Api\PasswordResetRequestController;
use App\Http\Controllers\Admin\Api\ChangePasswordController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware'=>'api','prefix'=>'auth'],function($router){
   Route::post('/register',[AuthController::class,'register'])->name('register');
   Route::post('/login',[AuthController::class,'login'])->name('login');
   Route::get('/profile',[AuthController::class,'profile'])->name('profile');
   Route::post('/logout',[AuthController::class,'logout'])->name('logout');
   Route::post('/sendPasswordResetLink',[PasswordResetRequestController::class,'sendEmail']);
   Route::post('/resetPassword', [ChangePasswordController::class,'passwordResetProcess']);
});
