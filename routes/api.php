<?php

use App\Http\Controllers\Api\ApartmentController;
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

Route::apiResource('apartments', ApartmentController::class);
