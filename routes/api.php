<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('service', [ServiceController::class, 'store']);
    Route::put('service/{id}', [ServiceController::class, 'update']);
    Route::delete('service/{id}', [ServiceController::class, 'destroy']);
    Route::get('service/my-services/{id}', [ServiceController::class, 'showAllFromUser']);
});
Route::get('service/{id}', [ServiceController::class, 'show']);

Route::get('service', [ServiceController::class, 'index']);
// Route::resource('service', ServiceController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::get('categories/{id}/services', [ServiceController::class, 'showInCategory']);
Route::resource('review', ReviewsController::class);
Route::get('service/{id}/reviews', [ReviewsController::class, 'getAllReviewsForService']);
Route::post('auth/register', [AuthController::class, 'createUser']);
Route::post('auth/login', [AuthController::class, 'loginUser']);
