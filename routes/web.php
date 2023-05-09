<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\ProgramBenefitController;
use App\Http\Controllers\ProgramCareerController;
use App\Http\Controllers\ProgramCompetenceController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramMisionController;
use App\Http\Controllers\ProgramVisionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'index'])->name('/');
Route::get('/davtaru', [LoginController::class, 'davtaru'])->name('/davtaru');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/daptar', [LoginController::class, 'daptar'])->name('daptar');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('banner', BannerController::class)->middleware('auth');
Route::resource('benefit', BenefitController::class)->middleware('auth');
Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('information', InformationController::class)->middleware('auth');
Route::resource('organization', OrganizationController::class)->middleware('auth');
Route::resource('documentation', DocumentationController::class)->middleware('auth');
Route::resource('facility', FacilityController::class)->middleware('auth');
Route::resource('agenda', AgendaController::class)->middleware('auth');
Route::resource('media', MediaController::class)->middleware('auth');
Route::resource('article', ArticleController::class)->middleware('auth');
Route::resource('ormawa', OrmawaController::class)->middleware('auth');
Route::resource('program', ProgramController::class)->middleware('auth');
Route::resource('vision', ProgramVisionController::class)->middleware('auth');
Route::resource('mision', ProgramMisionController::class)->middleware('auth');
Route::resource('benefit', ProgramBenefitController::class)->middleware('auth');
Route::resource('career', ProgramCareerController::class)->middleware('auth');
Route::resource('competence', ProgramCompetenceController::class)->middleware('auth');


Route::patch('information/change/{id}', [InformationController::class, 'status'])->name('information.change')->middleware('auth');

Route::patch('organization/change/{id}', [OrganizationController::class, 'status'])->name('organization.change')->middleware('auth');