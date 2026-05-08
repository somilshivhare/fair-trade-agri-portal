<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', function () {
        // Authentication logic will be implemented here
        return redirect('/dashboard');
    })->name('login.store');
    
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    
    Route::post('/register', function () {
        // Registration logic will be implemented here
        return redirect('/dashboard');
    })->name('register.store');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboards
    Route::get('/dashboard', function () {
        return view('dashboards.farmer');
    })->name('dashboard');
    
    Route::get('/buyer/dashboard', function () {
        return view('dashboards.buyer');
    })->name('buyer.dashboard');
    
    Route::get('/admin/dashboard', function () {
        return view('dashboards.admin');
    })->name('admin.dashboard');
    
    // Marketplace & Listings
    Route::get('/marketplace', function () {
        return view('pages.marketplace');
    })->name('marketplace');
    
    Route::get('/create-listing', function () {
        return view('pages.create-listing');
    })->name('listings.create');
    
    Route::post('/create-listing', function () {
        // Listing creation logic will be implemented here
        return redirect('/listings')->with('success', 'Listing created successfully!');
    })->name('listings.store');
    
    Route::get('/listings', function () {
        return view('pages.crop-listings');
    })->name('listings.index');
    
    // Market Insights & Analytics
    Route::get('/market-insights', function () {
        return view('pages.market-insights');
    })->name('insights');
    
    // Order & Logistics
    Route::get('/orders', function () {
        return view('pages.order-tracking');
    })->name('orders');
});
