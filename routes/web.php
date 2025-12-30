<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return 'INI DASHBOARD ADMIN';
})->name('admin.dashboard');

Route::middleware(['auth', 'role:staff'])->get('/staff/dashboard', function () {
    return 'INI DASHBOARD STAFF';
})->name('staff.dashboard');

Route::middleware(['auth', 'role:guest'])->get('/user/dashboard', function () {
    return 'INI DASHBOARD USER';
})->name('user.dashboard');

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/lapangan', function () {
    return view('lapangan');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/cara-booking', function () {
    return view('cara-booking');
});

require __DIR__.'/auth.php';
