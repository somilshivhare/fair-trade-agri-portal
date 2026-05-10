<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ── Public ────────────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/marketplace', [BuyerController::class, 'marketplace'])->name('marketplace');
Route::get('/products/{id}', [BuyerController::class, 'productDetails'])->name('product.details');

// ── Auth ──────────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ── Authenticated ─────────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile',        [HomeController::class, 'profile'])->name('profile');
    Route::post('/profile',       [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::get('/notifications',  [HomeController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{id}/read', [HomeController::class, 'markNotificationRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [HomeController::class, 'markAllRead'])->name('notifications.mark-all-read');
    // Transport estimate (AJAX)
    Route::post('/estimate-transport', [BuyerController::class, 'estimateTransport'])->name('transport.estimate');
});

// ── Farmer ────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:farmer'])->prefix('farmer')->name('farmer.')->group(function () {
    Route::get('/dashboard',          [FarmerController::class, 'dashboard'])->name('dashboard');
    Route::get('/products',           [FarmerController::class, 'myProducts'])->name('products');
    Route::get('/products/add',       [FarmerController::class, 'addProductForm'])->name('products.add');
    Route::post('/products',          [FarmerController::class, 'storeProduct'])->name('products.store');
    Route::delete('/products/{id}',   [FarmerController::class, 'deleteProduct'])->name('products.delete');
    Route::get('/bids',               [FarmerController::class, 'receivedBids'])->name('bids');
    Route::post('/bids/{id}/accept',  [FarmerController::class, 'acceptBid'])->name('bids.accept');
    Route::post('/bids/{id}/counter', [FarmerController::class, 'counterBid'])->name('bids.counter');
    Route::post('/bids/{id}/reject',  [FarmerController::class, 'rejectBid'])->name('bids.reject');
    Route::get('/orders',             [FarmerController::class, 'orders'])->name('orders');
    Route::post('/orders/{id}/ship',  [FarmerController::class, 'markShipped'])->name('orders.ship');
    Route::post('/kyc',               [FarmerController::class, 'submitKyc'])->name('kyc.submit');
});

// ── Buyer ─────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:buyer'])->prefix('buyer')->name('buyer.')->group(function () {
    Route::post('/products/{id}/bid', [BuyerController::class, 'placeBid'])->name('bid.place');
    Route::get('/my-bids',            [BuyerController::class, 'myBids'])->name('my-bids');
    Route::post('/bids/{id}/accept-counter', [BuyerController::class, 'acceptCounter'])->name('bids.accept-counter');
    Route::get('/orders',             [BuyerController::class, 'orders'])->name('orders');
    Route::post('/orders/{id}/confirm-delivery', [BuyerController::class, 'confirmDelivery'])->name('orders.confirm');
});

// ── Admin ─────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',         [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/kyc',               [AdminController::class, 'kycList'])->name('kyc');
    Route::post('/kyc/{id}/approve', [AdminController::class, 'approveKyc'])->name('kyc.approve');
    Route::post('/kyc/{id}/reject',  [AdminController::class, 'rejectKyc'])->name('kyc.reject');
    Route::get('/users',             [AdminController::class, 'users'])->name('users');
    Route::post('/users/{id}/toggle',[AdminController::class, 'toggleUser'])->name('users.toggle');
});

// ── Stitch Design Preview Routes (static, no auth required) ──────────────────
Route::prefix('design')->name('design.')->group(function () {
    Route::get('/home',              fn() => view('pages.home_stitch'))->name('home');
    Route::get('/login',             fn() => view('auth.login_stitch'))->name('login');
    Route::get('/marketplace',       fn() => view('buyer.marketplace_stitch'))->name('marketplace');
    Route::get('/marketplace-dark',  fn() => view('buyer.marketplace_dark_stitch'))->name('marketplace-dark');
    Route::get('/marketplace-v2',    fn() => view('buyer.marketplace_v2_stitch'))->name('marketplace-v2');
    Route::get('/farmer-dashboard',  fn() => view('farmer.dashboard_stitch'))->name('farmer-dashboard');
    Route::get('/farmer-dashboard-v2', fn() => view('farmer.dashboard_v2_stitch'))->name('farmer-dashboard-v2');
    Route::get('/add-product',       fn() => view('farmer.add_product_stitch'))->name('add-product');
    Route::get('/my-products',       fn() => view('farmer.my_products_stitch'))->name('my-products');
    Route::get('/received-bids',     fn() => view('farmer.received_bids_stitch'))->name('received-bids');
    Route::get('/received-bids-v2',  fn() => view('farmer.received_bids_v2_stitch'))->name('received-bids-v2');
    Route::get('/my-bids',           fn() => view('buyer.my_bids_stitch'))->name('my-bids');
    Route::get('/orders',            fn() => view('shared.orders_stitch'))->name('orders');
    Route::get('/product-details',   fn() => view('buyer.product_details_stitch'))->name('product-details');
    Route::get('/profile',           fn() => view('pages.profile_stitch'))->name('profile');
    Route::get('/admin',             fn() => view('admin.dashboard_stitch'))->name('admin');
    Route::get('/notifications',     fn() => view('pages.notifications_stitch'))->name('notifications');
});
