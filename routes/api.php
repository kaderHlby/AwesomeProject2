<?php

use App\Http\Controllers\Api\Auth\LoginController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin/test', function () {
            return response()->json(['test' => 'admin test']);
        });
    });
    Route::get('test', function () {
        return response()->json(['test' => 'test']);
    });
});
