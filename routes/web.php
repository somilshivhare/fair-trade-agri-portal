<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\NotificationController;

// Public Home Page
Route::get('/', [ProductController::class, 'index'])->name('home');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile Setup
    Route::get('/profile/setup', [ProfileController::class, 'showSetup'])->name('profile.setup');
    Route::post('/profile/setup', [ProfileController::class, 'saveSetup']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    // Bids
    Route::post('/products/{id}/bid', [BidController::class, 'placeBid'])->name('bids.place');
    Route::post('/bids/{id}/accept', [BidController::class, 'acceptBid'])->name('bids.accept');
    Route::post('/bids/{id}/reject', [BidController::class, 'rejectBid'])->name('bids.reject');
    Route::post('/bids/{id}/counter', [BidController::class, 'counterBid'])->name('bids.counter');
    Route::post('/bids/{id}/accept-counter', [BidController::class, 'acceptCounter'])->name('bids.accept-counter');
    Route::post('/bids/{id}/reject-counter', [BidController::class, 'rejectCounter'])->name('bids.reject-counter');

    // Deals
    Route::get('/deals/{id}', [DealController::class, 'show'])->name('deals.show');
    Route::post('/deals/{id}/details', [DealController::class, 'submitDetails'])->name('deals.submit-details');

    // Notifications
    Route::get('/notifications-data', [NotificationController::class, 'getNotifications'])->name('notifications.data');
    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
});
