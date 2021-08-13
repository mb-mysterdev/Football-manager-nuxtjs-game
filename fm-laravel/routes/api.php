<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DivisonController;
use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\PlayMatchController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamUserController;
use App\Http\Controllers\UserController;
use App\Models\Country;
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
    Route::get('/me', [AuthenticationController::class,'me']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Countries
$router->get('/countries',  function (){
    return Country::all();
});
$router->get('/countries/{country_name}', [CountryController::class, 'getCountryWithDivisions']);

// division
$router->get('/division/{division_id}',  [DivisonController::class, 'showDefaultTeams']);
$router->get('/division/{id}/{division_id}',  [DivisonController::class, 'showUserDivisionTeams']);

// football matches
$router->get('/fm/{id}/{fm_year}/{fm_division}',  [FootballMatchController::class, 'getMatchOfMyDivision']);
$router->get('/fm/{id}/{team_id}/{fm_year}/next-match',  [FootballMatchController::class, 'nextMatch']);
    # Play Match
    $router->get('/fm/play-match',  [PlayMatchController::class, 'playMatch']);


// user - team
$router->post('/team-user',  [TeamUserController::class, 'create']);

// Users
$router->get('/users/{id}',  [UserController::class, 'show']);
$router->post('/users',  [UserController::class, 'create']);

// teams
$router->get('/teams',  [TeamController::class, 'getAll']);
