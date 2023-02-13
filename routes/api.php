<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::get('/categories', [CategoryController::class, 'getAllCategories'])->name('api.getAllCategories');

Route::middleware([
    'middleware' => 'api',
    'prefix' => 'auth'
])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');
});
