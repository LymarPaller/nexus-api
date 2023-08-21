<?php

use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\FollowerController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('follower', FollowerController::class);
    Route::apiResource('post', PostController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('like', LikeController::class);
});