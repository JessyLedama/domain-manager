<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\SiteAvailableController;

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

// Manage Domains
Route::prefix('domains')->middleware('auth')->group( function() {
    // list all
    Route::get('index', [DomainController::class, 'index'])->name('domains.index');
    // create new 
    Route::get('create', [DomainController::class, 'create'])->name('domains.create');

    // store new
    Route::post('create', [DomainController::class, 'store'])->name('domains.store');

    // show selected
    Route::get('{id}', [DomainController::class, 'show'])->name('domains.show');
});

// Manage Sites Available
Route::prefix('sites')->middleware('auth')->group(function(){
    // list all
    Route::get('index', [SiteAvailableController::class, 'index'])->name('sites.index');
    // create new 
    Route::get('create', [SiteAvailableController::class, 'create'])->name('sites.create');

    // store new
    Route::post('create', [SiteAvailableController::class, 'store'])->name('sites.store');

    // show selected
    Route::get('{id}', [SiteAvailableController::class, 'show'])->name('sites.show');
});

require __DIR__.'/auth.php';
