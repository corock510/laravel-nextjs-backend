<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/users', [UserController::class, 'users']);
});



// POSTMANデバッグ用
Route::group(['middleware' => []], function () {
    Route::get('/users', [UserController::class, 'users']);
});
