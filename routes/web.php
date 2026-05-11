<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Transporter\TransporterController;
use Illuminate\Support\Facades\Route;

// ── Public ────────────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'home'])->name('home');

// ── Auth ──────────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ── Authenticated (shared) ────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/marketplace',    [BuyerController::class, 'marketplace'])->name('marketplace');
    Route::get('/products/{id}',  [BuyerController::class, 'productDetails'])->name('product.details');
    Route::get('/profile',        [HomeController::class, 'profile'])->name('profile');
    Route::put('/profile',        [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/avatar',[HomeController::class, 'updateAvatar'])->name('profile.avatar');
    Route::get('/notifications',  [HomeController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{id}/read', [HomeController::class, 'markNotificationRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [HomeController::class, 'markAllRead'])->name('notifications.mark-all-read');
    Route::post('/estimate-transport', [BuyerController::class, 'estimateTransport'])->name('transport.estimate');
});

// ── Farmer ────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:farmer'])->prefix('farmer')->name('farmer.')->group(function () {
    Route::get('/dashboard',              [FarmerController::class, 'dashboard'])->name('dashboard');
    Route::get('/products',               [FarmerController::class, 'myProducts'])->name('products');
    Route::get('/products/add',           [FarmerController::class, 'addProductForm'])->name('products.add');
    Route::post('/products',              [FarmerController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{id}/edit',     [FarmerController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}',          [FarmerController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}',       [FarmerController::class, 'deleteProduct'])->name('products.delete');
    Route::get('/bids',                   [FarmerController::class, 'receivedBids'])->name('bids');
    Route::post('/bids/{id}/accept',      [FarmerController::class, 'acceptBid'])->name('bids.accept');
    Route::post('/bids/{id}/counter',     [FarmerController::class, 'counterBid'])->name('bids.counter');
    Route::post('/bids/{id}/reject',      [FarmerController::class, 'rejectBid'])->name('bids.reject');
    Route::get('/orders',                 [FarmerController::class, 'orders'])->name('orders');
    Route::post('/orders/{id}/ship',      [FarmerController::class, 'markShipped'])->name('orders.ship');
    Route::post('/kyc',                   [FarmerController::class, 'submitKyc'])->name('kyc.submit');
});

// ── Buyer ─────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:buyer'])->prefix('buyer')->name('buyer.')->group(function () {
    Route::get('/dashboard',              [BuyerController::class, 'dashboard'])->name('dashboard');
    Route::post('/products/{id}/bid',     [BuyerController::class, 'placeBid'])->name('bid.place');
    Route::get('/my-bids',                [BuyerController::class, 'myBids'])->name('my-bids');
    Route::post('/bids/{id}/accept-counter', [BuyerController::class, 'acceptCounter'])->name('bids.accept-counter');
    Route::get('/orders',                 [BuyerController::class, 'orders'])->name('orders');
    Route::post('/orders/{id}/confirm-delivery', [BuyerController::class, 'confirmDelivery'])->name('orders.confirm');
});

// ── Transporter ───────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:transporter'])->prefix('transporter')->name('transporter.')->group(function () {
    Route::get('/dashboard',              [TransporterController::class, 'dashboard'])->name('dashboard');
    Route::get('/deliveries',             [TransporterController::class, 'deliveries'])->name('deliveries');
    Route::get('/deliveries/{id}',        [TransporterController::class, 'deliveryDetail'])->name('delivery.detail');
    Route::post('/deliveries/{id}/pickup',[TransporterController::class, 'markPickedUp'])->name('delivery.pickup');
    Route::post('/deliveries/{id}/deliver',[TransporterController::class, 'markDelivered'])->name('delivery.deliver');
});

// ── Admin ─────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',              [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/kyc',                    [AdminController::class, 'kycList'])->name('kyc');
    Route::post('/kyc/{id}/approve',      [AdminController::class, 'approveKyc'])->name('kyc.approve');
    Route::post('/kyc/{id}/reject',       [AdminController::class, 'rejectKyc'])->name('kyc.reject');
    Route::get('/users',                  [AdminController::class, 'users'])->name('users');
    Route::post('/users/{id}/toggle',     [AdminController::class, 'toggleUser'])->name('users.toggle');
    Route::get('/market-prices',          [AdminController::class, 'marketPrices'])->name('market-prices');
    Route::post('/market-prices/sync',    [AdminController::class, 'syncMarketPrices'])->name('market-prices.sync');
});
