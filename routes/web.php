<?php

use App\Http\Controllers\colocationController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function(){
  return view('dashboard');
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

Route::post('/colocation/create', [colocationController::class, 'store'])->name('colocation.store');
});

Route::get('/colocations', [colocationController::class, 'show'])->name('colocations');
// Route::get('/colocation/details', [colocationController::class, 'showDetails'])->name('colocation.details');


Route::get('test-mail', function(){
    Mail::raw('Test email from Laravel + Mailtrap', function ($message){
        $message->to('hello@example.com')->subject('Test Email');
    });

    return 'Mail Sent!';
});

Route::get('/mail', [InvitationController::class, 'showInvitation'])->name('mail');

Route::post('/send/{colocation}/invitation', [InvitationController::class, 'store'])->name('send.invitation');

Route::get('/colocations', [colocationController::class, 'index'])->name('colocations.index');
Route::get('/colocations/{id}', [colocationController::class, 'show'])->name('colocations.show');
Route::get('/invitations/accept/{token}', [InvitationController::class, 'accept'])->name('invitation.accept');