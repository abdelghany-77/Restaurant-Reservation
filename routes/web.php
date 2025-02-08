<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

Route::get('/', function () {return view('homepage');})->name('homepage');

// Cart (Only for logged-in users)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
});
//  Admin Routes
// Admin Routes
Route::prefix('admin')->group(function () {
    // Redirect /admin to /admin/login
    Route::get('/', function () {
        return redirect()->route('admin.login');
    })->name('admin');

    // Admin Authentication
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('/users', UserController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/orders', OrderController::class);
    });
});
// User authentication
Route::get('/register', [AuthController::class, 'RegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
