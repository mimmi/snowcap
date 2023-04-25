<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BookingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Unauthenticated Guest Routes
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Administrative Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdministratorController::class, 'dashboard'])->name('admin.dashboard');
    
    // Users
    Route::get('users', [AdministratorController::class, 'users'])->name('admin.users');
    Route::post('user/promote', [AdministratorController::class, 'promote'])->name('admin.promote');
    Route::post('user/demote', [AdministratorController::class, 'demote'])->name('admin.demote');

    // Packages
    Route::get('packages', [AdministratorController::class, 'packages'])->name('admin.packages');
    Route::match(['get', 'post'], 'package/create', [AdministratorController::class, 'packageCreate'])->name('admin.package.create');
    Route::match(['get', 'post'], 'package/{id}', [AdministratorController::class, 'packageDetails'])->name('admin.package.details');
    Route::delete('package/{id}', [AdministratorController::class, 'packageDelete'])->name('admin.package.delete');
    Route::get('package/photos/{id}', [AdministratorController::class, 'photos'])->name('admin.package.photos');
    Route::post('package/photo/add', [AdministratorController::class, 'addPhoto'])->name('admin.package.photo.add');
    Route::post('package/photo/remove', [AdministratorController::class, 'removePhoto'])->name('admin.package.photo.remove');

    // Itineraries
    Route::get('package/itinerary/{id}', [AdministratorController::class, 'itinerary'])->name('admin.package.itinerary');
    Route::post('package/itinerary/add', [AdministratorController::class, 'addItineraryItem'])->name('admin.package.itinerary.add');
    Route::post('package/itinerary/remove', [AdministratorController::class, 'removeItineraryItem'])->name('admin.package.itinerary.remove');

    // Bookings
    Route::get('bookings', [AdministratorController::class, 'bookings'])->name('admin.bookings');
    Route::get('booking/{id}', [AdministratorController::class, 'bookingDetails'])->name('admin.booking.details');
    Route::post('booking/{id}/confirm', [AdministratorController::class, 'bookingConfirm'])->name('admin.booking.confirm');
});

// Regular User Routes
Route::middleware('auth')->group(function () {
    // Bookings
    Route::get('/packages', [HomeController::class, 'packages'])->name('home.packages');
    Route::get('/booking/{id}', [BookingController::class, 'index'])->name('booking.intention');
    Route::post('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::get('/booking/confirmation/{id}', [BookingController::class, 'confirmation'])->name('booking.confirmation');
});

require __DIR__.'/auth.php';
