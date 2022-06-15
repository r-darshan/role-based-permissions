<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionHistoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('products/create', [ProductController::class, "create"])->name('products.create');
// Route::get('products', [ProductController::class, "store"])->name('products.store');
// Route::get('products', [ProductController::class, "index"])->name('products.index');
// Route::get('products/{id}', [ProductController::class, "show"])->name('products.show');
// Route::get('products/{id}/edit', [ProductController::class, "edit"])->name('products.edit');
// Route::patch('products/{id}', [ProductController::class, "update"])->name('products.update');

Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, "authenticate"])->name('authenticate');

Route::middleware("auth")->group(function() {

    Route::get('/logout', [AuthController::class, "logout"])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // Route::resource('products', ProductController::class);//->except(['destroy', 'delete']);
    Route::get('products', [ProductController::class, "index"])->name('products.index')->middleware('can:products.read');
    Route::post('products', [ProductController::class, "store"])->name('products.store')->middleware('can:products.create');
    Route::get('products/create', [ProductController::class, "create"])->name('products.create')->middleware('can:products.create');
    Route::get('products/{id}', [ProductController::class, "show"])->name('products.show')->middleware('can:products.read');
    Route::get('products/{id}/edit', [ProductController::class, "edit"])->name('products.edit')->middleware('can:products.update');
    Route::put('products/{id}', [ProductController::class, "update"])->name('products.update')->middleware('can:products.update');
    Route::delete('products/{id}', [ProductController::class, "delete"])->name('products.delete')->middleware('can:products.delete');
    // Route::resource('products', ProductController::class);//->except(['destroy', 'delete']);
    // Route::resource('products', ProductController::class);//->except(['destroy', 'delete']);

    // Route::resource('users', UserController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update']);
    Route::get('users', [UserController::class, "index"])->name('users.index')->middleware('role:admin');
    Route::get('users/create', [UserController::class, "create"])->name('users.create')->middleware('role:admin');
    Route::post('users', [UserController::class, "store"])->name('users.store')->middleware('role:admin');
    Route::get('users/{id}', [UserController::class, "show"])->name('users.show')->middleware('role:admin');
    Route::get('users/{id}/edit', [UserController::class, "edit"])->name('users.edit')->middleware('role:admin');
    Route::put('users/{id}', [UserController::class, "update"])->name('users.update')->middleware('role:admin');

    Route::put('user/{id}/permissions', UserPermissionsController::class)->name('user.permissions.update');

    Route::get('categories', [CategoryController::class, "index"])->name('categories.index')->middleware('can:categories.read');
    Route::get('transaction-history', [TransactionHistoryController::class, "index"])->name('transactionhistory.index')->middleware('can:transaction_histories.read');
});

