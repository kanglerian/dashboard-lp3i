<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookChapterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LuaranPenelitianUPPMController;
use App\Http\Controllers\LuaranPkmUPPMController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\ProgramAlumniController;
use App\Http\Controllers\ProgramBenefitController;
use App\Http\Controllers\ProgramCareerController;
use App\Http\Controllers\ProgramCompetenceController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramMisionController;
use App\Http\Controllers\ProgramVisionController;
use App\Http\Controllers\FlyerController;
// UPPM
use App\Http\Controllers\PanduanUPPMController; 
use App\Http\Controllers\DataPenelitianUPPMController;
use App\Http\Controllers\DataPkmUPPMController;
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
Route::resource('programvision', ProgramVisionController::class)->middleware('auth');
Route::resource('programmision', ProgramMisionController::class)->middleware('auth');
Route::resource('programbenefit', ProgramBenefitController::class)->middleware('auth');
Route::resource('programcareer', ProgramCareerController::class)->middleware('auth');
Route::resource('programcompetence', ProgramCompetenceController::class)->middleware('auth');
Route::resource('programalumni', ProgramAlumniController::class)->middleware('auth');
Route::resource('flyer', FlyerController::class)->middleware('auth');

// UPPM
Route::resource('panduanuppm', PanduanUPPMController::class)->middleware('auth');
Route::resource('datapenelitianuppm', DataPenelitianUPPMController::class)->middleware('auth');
Route::resource('datapkmuppm', DataPkmUPPMController::class)->middleware('auth');
Route::resource('luaranpenelitianuppm', LuaranPenelitianUPPMController::class)->middleware('auth');
Route::resource('luaranpkmuppm', LuaranPkmUPPMController::class)->middleware('auth');
Route::resource('bookchapter', BookChapterController::class)->middleware('auth');

Route::patch('information/change/{id}', [InformationController::class, 'status'])->name('information.change')->middleware('auth');

Route::patch('flyer/change/{id}', [FlyerController::class, 'status'])->name('flyer.change')->middleware('auth');

Route::patch('organization/change/{id}', [OrganizationController::class, 'status'])->name('organization.change')->middleware('auth');