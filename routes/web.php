<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HistoryController;

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

/*
|-------------------------------------------------------------------------- 
| CUSTOMER ROUTES
|-------------------------------------------------------------------------- 
*/
Route::get('/', function () {
    return view('customer.index');
})->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/about', function () { return view('customer.about'); })->name('about');
Route::get('/contact', function () { return view('customer.contact'); })->name('contact');
Route::get('/location', function () { return view('customer.location'); })->name('location');

/* Checkout Order */
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/invoice/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');

/*
|-------------------------------------------------------------------------- 
| BACKEND AUTH (ADMIN LOGIN)
|-------------------------------------------------------------------------- 
*/
Route::get('/backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('/backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.authenticate');
Route::post('/backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');

/*
|-------------------------------------------------------------------------- 
| ADMIN AREA (PROTECTED)
|-------------------------------------------------------------------------- 
*/
Route::middleware(['auth'])->prefix('backend')->group(function () {

    Route::get('/dashboard', [AdminMenuController::class, 'index'])->name('admin.dashboard');

    // MENU MANAGEMENT
    Route::get('/menu', [AdminMenuController::class, 'index'])->name('admin.menu.index');
    Route::get('/menu/create', [AdminMenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/menu', [AdminMenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/menu/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/menu/{id}', [AdminMenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/menu/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menu.destroy');

    // ORDERS
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::post('/orders/{id}/process', [OrderController::class, 'adminProcess'])->name('admin.orders.process');
    Route::post('/orders/{id}/finish', [OrderController::class, 'adminFinish'])->name('admin.orders.finish');
    Route::delete('/orders/{id}', [OrderController::class, 'adminDelete'])->name('admin.orders.delete');

    // EXPORT HISTORY
    Route::get('/orders/history/export', [HistoryController::class, 'exportHistory'])->name('admin.orders.history.export');

    // CUSTOMER ORDER
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');

});

