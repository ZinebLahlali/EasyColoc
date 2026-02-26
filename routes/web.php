<?php

use App\Http\Controllers\colocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

// Route::get('/create', function(){
//     return view('colocation.create');
// });
Route::middleware('auth')->group(function () {

Route::get('/colocation/create', [colocationController::class, 'create'])->name('colocation.create');

Route::post('/colocation/create', [ColocationController::class, 'store'])->name('colocation.store');
});