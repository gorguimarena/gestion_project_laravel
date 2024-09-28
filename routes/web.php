<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
})->name('registe');

Route::get('/dashboard', function () {
     return redirect()->route('projects.index'); // Redirection pour les utilisateurs
})->middleware(['auth', 'verified'])->name('dashboard');

//route pour les projet
Route::resource('projects', ProjetController::class);

Route::post('/users/contact', [UserController::class, 'contacter'])->name('users.contacter');

Route::get('/lu/{id}', [UserController::class, 'lire'])->name('contact.lu');

Route::get('/contacts', [UserController::class, 'contacts'])->name('users.contacts');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/contact', [UserController::class, 'contact'])->name('users.contact');
Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
