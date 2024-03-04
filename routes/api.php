<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PeopleController;

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



Route::get('/get_all_Country', [CountryController::class, 'get_all_Country']);
Route::get('/get_all_CityByCountry', [CityController::class, 'get_all_CityByCountry']);
Route::get('/get_all_PeopleByCity', [PeopleController::class, 'get_all_PeopleByCity']);






