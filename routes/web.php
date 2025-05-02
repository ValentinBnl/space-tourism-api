<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\CrewController as AdminCrewController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  Ajout des routes Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('destinations', AdminDestinationController::class);
    Route::resource('crews', AdminCrewController::class);
    Route::resource('technologies', AdminTechnologyController::class);
});

require __DIR__.'/auth.php';

