<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\ServiceController;
use App\Models\Apartment;
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

//* Rotta per ricerca con filtro per distanza
Route::get('apartments/search', [ApartmentController::class, 'search'])->name('apartments.search');

Route::get('services', [ServiceController::class, 'index']);

Route::apiResource('apartments', ApartmentController::class)->except('show');
Route::get('apartments/{slug}', [ApartmentController::class, 'show']);
