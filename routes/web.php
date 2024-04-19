<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'super_admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['cashier'])->group(function () {
        Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
        Route::get('/cashier/create', [CashierController::class, 'create'])->name('cashier.create');
        Route::post('/cashier', [CashierController::class, 'store'])->name('cashier.store');
        // Route::get('/cashier/{id}', [CashierController::class, 'show'])->name('cashier.show');
        Route::get('/cashier/{id}/edit', [CashierController::class, 'edit'])->name('cashier.edit');
        Route::patch('/cashier/{id}', [CashierController::class, 'update'])->name('cashier.update');
        Route::delete('/cashier/{id}', [CashierController::class, 'destroy'])->name('cashier.destroy');
    });
});


require __DIR__ . '/auth.php';
