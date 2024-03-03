<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Resources\AuctionResource;
use App\Models\Auction;
use  App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuctionController;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailVerificationController;



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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);  
    Route::post('/email-verification', [EmailVerificationController::class, 'email_verification']);    

   

});

