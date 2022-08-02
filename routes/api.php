<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReviewsController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('service', ServiceController::class);
Route::get('categories/{id}/services', [ServiceController::class, 'showInCategory']);
Route::resource('review', ReviewsController::class);
Route::get('/service/{id}/reviews', [ReviewsController::class, 'getAllReviewsForService']);
