<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\CheckRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::middleware(['role:' . User::ROLE_USER . '|' . User::ROLE_ADMIN])->group(function () {
//         Route::post('service', [ServiceController::class, 'store'])->name('post');
//         Route::put('service/{id}', [ServiceController::class, 'update']);
//         Route::delete('service/{id}', [ServiceController::class, 'destroy']);
//         Route::get('service/my-services/{id}', [ServiceController::class, 'showAllFromUser']);
//     });
    
//     Route::middleware(['role:' . User::ROLE_ADMIN])->group(function () {
        
//     });
// });

# -------------
Route::group(['middleware' => ['auth:sanctum', 'role:' . User::ROLE_USER . '|' . User::ROLE_ADMIN]], function () {
    
    #Service
    Route::prefix('/service')->group(function () {
        Route::post('/', [ServiceController::class, 'store']);
        Route::put('/{id}', [ServiceController::class, 'update']);
        Route::delete('/{id}', [ServiceController::class, 'destroy']);
        Route::get('/my-services/{id}', [ServiceController::class, 'showAllFromUser']);
        
    });

    #Category
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
    });

    #Users
    Route::prefix('/users')->group(function () {
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::get('/{id}', [CategoryController::class, 'show']);
    });

    #Reviews
    Route::prefix('/review')->group(function () {
        Route::post('/', [ReviewsController::class, 'store']);
    });
    
});

Route::group(['middleware' => ['auth:sanctum', 'role:' . User::ROLE_ADMIN]], function () {

    #Category
    Route::prefix('/categories')->group(function () {
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    #Users
    Route::prefix('/users')->group(function () {
        Route::get('/{id}/reviews', [CategoryController::class, 'getAllReviewsFromUser']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    #Reviews
    Route::prefix('/review')->group(function () {
        Route::post('/', [ReviewsController::class, 'store']);
        Route::get('/{id}', [ReviewsController::class, 'show']);
        Route::put('/{id}', [ReviewsController::class, 'update']);
        Route::delete('/{id}', [ReviewsController::class, 'destroy']);
    });
    
});

# Service-guest
Route::get('service/{id}', [ServiceController::class, 'show']);
Route::get('/service', [ServiceController::class, 'index']);
Route::get('categories/{id}/services', [ServiceController::class, 'showInCategory']);

# Categories-guest
Route::get('/categories', [CategoryController::class, 'index']);

# Reviews-guest
Route::get('service/{id}/reviews', [ReviewsController::class, 'getAllReviewsForService']);

# Auth-guest
Route::post('auth/register', [AuthController::class, 'createUser']);
Route::post('auth/login', [AuthController::class, 'loginUser']);


// Route::resource('service', ServiceController::class);
// Route::resource('users', UserController::class);
// Route::resource('review', ReviewsController::class);
