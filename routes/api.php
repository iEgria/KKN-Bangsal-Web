<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralInformationsController;
use App\Http\Controllers\RelatedLinksController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('slider', [SlidersController::class, 'index']);
Route::get('information', [GeneralInformationsController::class, 'index']);
Route::get('related_link', [RelatedLinksController::class, 'index']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('checkSession', [AuthController::class, 'checkSession']);
        Route::post('changePassword', [AuthController::class, 'changePassword']);
        Route::post('updateProfile', [AuthController::class, 'updateProfile']);
    });
    Route::prefix('master')->group(function () {
        Route::get('role', [RoleController::class, 'index']);
        Route::post('user/resetPassword', [UserController::class, 'resetPassword']);
        Route::get('user/datatable', [UserController::class, 'datatable']);
        Route::resource('user', UserController::class);
    });
    Route::resource('slider', SlidersController::class)->only(['store', 'destroy']);
    Route::resource('information', GeneralInformationsController::class)->only(['store']);
    Route::resource('related_link', RelatedLinksController::class)->except(['index']);
});
