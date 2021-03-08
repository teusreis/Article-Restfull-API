<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::group(['prefix' => '/articles', 'middleware' => 'auth:sanctum'], function () {
    Route::get("/", [ArticleController::class, 'index']);
    Route::get("/{id}", [ArticleController::class, 'show']);
    Route::post("/", [ArticleController::class, 'store']);
    Route::put("/{id}", [ArticleController::class, 'update']);
    Route::delete("/{id}", [ArticleController::class, 'destroy']);
});
