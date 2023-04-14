<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\BannerAPIController;
use App\Http\Controllers\API\BenefitAPIController;
use App\Http\Controllers\API\CompanyAPIController;
use App\Http\Controllers\API\InformationAPIController;
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

Route::get('/banners', [BannerAPIController::class, 'index']);
Route::get('/benefits', [BenefitAPIController::class, 'index']);
Route::get('/companies', [CompanyAPIController::class, 'index']);
Route::get('/informations', [InformationAPIController::class, 'index']);