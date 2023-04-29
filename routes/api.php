<?php

use App\Http\Controllers\API\AgendaAPIController;
use App\Http\Controllers\API\ArticleAPIController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BannerAPIController;
use App\Http\Controllers\API\BenefitAPIController;
use App\Http\Controllers\API\CompanyAPIController;
use App\Http\Controllers\API\DocumentationAPIController;
use App\Http\Controllers\API\FacilityAPIController;
use App\Http\Controllers\API\InformationAPIController;
use App\Http\Controllers\API\MediaAPIController;
use App\Http\Controllers\API\OrganizationAPIController;
use App\Http\Controllers\API\OrmawaAPIController;
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
Route::get('/organizations', [OrganizationAPIController::class, 'index']);
Route::get('/documentations', [DocumentationAPIController::class, 'index']);
Route::get('/facilities', [FacilityAPIController::class, 'index']);
Route::get('/agendas', [AgendaAPIController::class, 'index']);
Route::get('/medias', [MediaAPIController::class, 'index']);
Route::get('/articles', [ArticleAPIController::class, 'index']);
Route::get('/ormawas', [OrmawaAPIController::class, 'index']);