<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sale\SaleController;
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


Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [SaleController::class, 'index'])->name('dashboard');

    Route::get('/import', [SaleController::class, 'index'])->name('dashboard');
    Route::post('/import', [SaleController::class, 'store'])->name('import.store');
    Route::delete('/delete', [SaleController::class, 'destroy'])->name('sale.destroy');
    // Route::get('export', [SubscriberCtrl::class, 'export'])->name('export');
});

// Route::get('/dashboard', function () {
//     return view('sales.index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
