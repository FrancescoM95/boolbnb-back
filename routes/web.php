<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SponsorshipController;
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

    //# Rotta messaggi
    // all'archivio
    Route::get('/messages/{apartment}/trash', [MessageController::class, 'trash'])->name('messages.trash');
    // toggle read
    Route::patch('/messages/{message}/read', [MessageController::class, 'toggleRead'])->name('messages.read');
    // index
    Route::get('/messages/{apartment}', [MessageController::class, 'index'])->name('messages.index');
    // show
    Route::get('/messages/{apartment}/{message}', [MessageController::class, 'show'])->name('messages.show');
    // delete
    Route::delete('/messages/{apartment}/{message}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
    // recupera un messaggio
    Route::patch('/messages/{message}/restore', [MessageController::class, 'restore'])->name('messages.restore')->withTrashed();
    // recupera tutti i messaggi
    Route::patch('/messages/{apartment}/massiverestore', [MessageController::class, 'massiverestore'])->name('messages.massiverestore');


    //# Rotta statistiche

    Route::get('/apartment/{apartment}/statistics/', [ApartmentController::class, 'statistics'])->name('apartments.statistics');
});

//* Rotte profilo

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
