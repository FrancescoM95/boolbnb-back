<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorshipController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//# ROTTE GUEST
Route::get('/', GuestHomeController::class)->name('guest.home');

//# ROTTE ADMIN
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {

    //* Rotta Admin Home
    Route::get('', AdminHomeController::class)->name('home');

    //* Rotte sponsorizzazione
    Route::post('apartments/sponsorship/confirm', [SponsorshipController::class, 'sponsorship'])->name('sponsorship.submit');
    Route::get('apartments/sponsorship', [SponsorshipController::class, 'showForm'])->name('sponsorship.show');

    //* Rotte Admin Soft Delete
    Route::get('/apartments/trash', [ApartmentController::class, 'trash'])->name('apartments.trash');
    //! Route x eliminazione MASSIVA definitiva
    //! Route::delete('/apartments/massivedrop', [ApartmentController::class, 'massivedrop'])->name('apartments.massivedrop');
    // Route x restore MASSIVO
    Route::patch('/apartments/massiverestore', [ApartmentController::class, 'massiverestore'])->name('apartments.massiverestore');
    Route::patch('/apartments/{apartment}/restore', [ApartmentController::class, 'restore'])->name('apartments.restore')->withTrashed();
    Route::delete('/apartments/{apartment}/drop', [ApartmentController::class, 'drop'])->name('apartments.drop')->withTrashed();

    //* Rotta toggle pubblicazione
    Route::patch('/apartments/{apartment}/publish', [ApartmentController::class, 'togglePublication'])->name('apartments.publish');

    //* Rotte admin apartment CRUD
    Route::resource('apartments', ApartmentController::class)->except(['show', 'edit'])->withTrashed(['update']);

    //* Rotta show con slug
    Route::get('/apartments/{slug}', [ApartmentController::class, 'show'])->name('apartments.show');

    //* Rotta edit con slug
    Route::get('/apartments/{slug}/edit', [ApartmentController::class, 'edit'])->name('apartments.edit')->withTrashed();
});



//* Rotte profilo

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
