<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InformationController;
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

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('banner', BannerController::class)->middleware('auth');
Route::resource('benefit', BenefitController::class)->middleware('auth');
Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('information', InformationController::class)->middleware('auth');


Route::patch('information/change/{id}', [InformationController::class, 'status'])->name('information.change')->middleware('auth');