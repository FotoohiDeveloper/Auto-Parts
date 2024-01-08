<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Home Routes
Route::get('/', [HomeController::class, 'show'])->name('home');

// Authentication Routes
Route::prefix('/authentication')->group(function (){
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
})->middleware('check');

Route::middleware('auth')->group(function (){
    Route::prefix('/panel')->group(function (){
        Route::get('/', [PanelController::class, 'show'])->name('panel');

        // Profile routes
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

        // Change password routes
        Route::get('/change-password', [PasswordController::class, 'show'])->name('changepassword');
        Route::post('/change-password', [PasswordController::class, 'store'])->name('changepassword.store');

        // Products Routes
        Route::get('/products', [ProductController::class, 'show'])->name('products');
        Route::get('/products/{id}/buy', [ProductController::class, 'showBuy'])->name('products.buy');
        Route::post('/products/{id}/buy', [ProductController::class, 'buy']);
        Route::get('/success', function (){return view('panel.success');})->name('success');

        // User Invoices
        Route::get('/invoices', [InvoiceController::class, 'show'])->name('invoices');

        // Admin Zone
        Route::middleware('role')->group(function (){


            // Products Routes for ADMIN
            Route::prefix('/products')->group(function (){
                Route::get('/list', [ProductController::class, 'list'])->name('products.list');
                Route::get('/add', [ProductController::class, 'showCreate'])->name('products.add');
                Route::post('/add', [ProductController::class, 'create']);
                Route::get('/edit/{id}', [ProductController::class, 'showUpdate'])->name('products.update');
                Route::post('/edit/{id}', [ProductController::class, 'update']);
                Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
            });

            // Show All users
            Route::get('/users', [AdminController::class, 'users'])->name('users');

            // Show All invoices
            Route::get('/all-invoices', [AdminController::class, 'invoices'])->name('invoices.list');
            Route::get('/invoice/{id}/change-status', [AdminController::class, 'changeStatus'])->name('invoices.change');
        });
    });

    // Logout route
    Route::get('/authentication/logout', [LogoutController::class, 'store'])->name('logout');
});
