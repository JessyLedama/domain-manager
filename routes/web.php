<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('domains')->middleware('auth')->group( function() {
    // all domains
    Route::get('index', [DomainController::class, 'index'])->name('domains.index');
    // create domain 
    Route::get('create', [DomainController::class, 'create'])->name('domains.create');

    // store domain
    Route::post('create', [DomainController::class, 'store'])->name('domains.store');

    // store domain
    Route::get('{id}', [DomainController::class, 'show'])->name('domains.show');
});

require __DIR__.'/auth.php';
