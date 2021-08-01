<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/** @var \Laravel\Lumen\Routing\Router $router */

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

    Route::post('/login',  [AuthenticationController::class, 'login']);
    Route::post('/register',  [AuthenticationController::class, 'register']);
    Route::post('/logout', [AuthenticationController::class,'logout']);
    Route::post('/refresh', [AuthenticationController::class, 'refresh']);
    Route::post('/me', [AuthenticationController::class,'me']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Users
$router->get('/users/{id}',  [UserController::class, 'show']);
$router->post('/users',  [UserController::class, 'create']);
