<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Models\Artikel;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home / Dashboard route (met artikelen)
Route::get('/', function () {
    $artikels = Artikel::orderBy('publicatiedatum', 'desc')->get();
    return view('dashboard', compact('artikels'));
})->name('dashboard');

Route::get('/artikels/{artikel}', [ArtikelController::class, 'show'])->name('artikels.show');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');

/*
|---------------------------------------------------------------------------
| Auth Routes
|---------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|---------------------------------------------------------------------------
| Profile Routes (authenticated users)
|---------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/{user}', function (User $user) {
        return view('profile.show', compact('user'));
    })->name('profile.show');
});

/*
|---------------------------------------------------------------------------
| Admin Routes (middleware is_admin + auth)
|---------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');

    // Artikels
    Route::get('/artikels/index', [ArtikelController::class, 'index'])->name('artikels.index');
    Route::get('/artikels/create', [ArtikelController::class, 'create'])->name('artikels.create');
    Route::post('/artikels', [ArtikelController::class, 'store'])->name('artikels.store');
    Route::get('/artikels/{artikel}/edit', [ArtikelController::class, 'edit'])->name('artikels.edit');
    Route::put('/artikels/{artikel}', [ArtikelController::class, 'update'])->name('artikels.update');
    Route::delete('/artikels/{artikel}', [ArtikelController::class, 'destroy'])->name('artikels.destroy');

    // Je kan hier eventueel nog show/edit/update/delete routes voor artikels toevoegen als je wil
});

require __DIR__.'/auth.php';
