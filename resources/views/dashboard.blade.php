@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Dashboard Header Profile Banner -->
    <div class="relative overflow-hidden bg-slate-900 rounded-3xl p-8 mb-10 text-white shadow-xl">
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-950 via-slate-900 to-slate-900"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-5">
                <!-- Profile Image -->
                @if($user->profile_image)
                    <img src="{{ $user->profile_image }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-2xl object-cover ring-4 ring-emerald-500/30">
                @else
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center text-white text-2xl font-bold ring-4 ring-emerald-500/30">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                @endif
                <div>
                    <div class="flex items-center gap-2.5">
                        <h1 class="text-2xl font-extrabold tracking-tight">{{ $user->name }}</h1>
                        <span class="px-3 py-0.5 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 ring-1 ring-inset ring-emerald-500/30 uppercase tracking-wide">
                            {{ $user->role }}
                        </span>
                    </div>
                    <p class="text-sm text-slate-400 mt-1 font-light">
                        @if($user->role === 'farmer')
                            🚜 Farm Name: <strong class="text-slate-200 font-semibold">{{ $user->farm_name }}</strong>
                        @else
                            💼 Business: <strong class="text-slate-200 font-semibold">{{ $user->business_name }}</strong>
                        @endif
                        <span class="mx-2">•</span> 📍 {{ $user->city }}, {{ $user->state }}
                        <span class="mx-2">•</span> 📞 {{ $user->phone }}
                    </p>
                </div>
            </div>
            
            <!-- Contextual Quick Action button -->
            @if($user->role === 'farmer')
                <a href="#add-product-section" onclick="switchTab('products')" class="rounded-xl bg-emerald-500 hover:bg-emerald-600 px-5 py-3 text-sm font-bold text-white shadow-md shadow-emerald-500/20 transition-all hover:scale-105 active:scale-98">
                    + List New Crop
                </a>
            @else
                <a href="{{ route('home') }}" class="rounded-xl bg-emerald-500 hover:bg-emerald-600 px-5 py-3 text-sm font-bold text-white shadow-md shadow-emerald-500/20 transition-all hover:scale-105 active:scale-98">
                    Browse Marketplace
                </a>
            @endif
        </div>
    </div>

    <!-- Tabbed Navigation -->
    <div class="flex border-b border-slate-200 mb-8 overflow-x-auto whitespace-nowrap" id="dashboardTabsList">
        @if($user->role === 'farmer')
            <button onclick="switchTab('products')" id="tabBtn-products" class="tab-btn px-6 py-4 text-sm font-bold border-b-2 border-emerald-600 text-emerald-600 focus:outline-none transition-all">
                🌾 My Listed Crops
            </button>
            <button onclick="switchTab('bids')" id="tabBtn-bids" class="tab-btn px-6 py-4 text-sm font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 focus:outline-none transition-all flex items-center gap-2">
                📥 Incoming Bid Proposals
                @php $pendingBids = $incomingBids->where('status', 'pending')->count(); @endphp
                @if($pendingBids > 0)
                    <span class="px-2 py-0.5 rounded-full text-xs bg-rose-500 text-white font-extrabold animate-bounce">{{ $pendingBids }}</span>
                @endif
            </button>
        @else
            <button onclick="switchTab('browse')" id="tabBtn-browse" class="tab-btn px-6 py-4 text-sm font-bold border-b-2 border-emerald-600 text-emerald-600 focus:outline-none transition-all">
                🔍 Browse Lots
            </button>
            <button onclick="switchTab('bids')" id="tabBtn-bids" class="tab-btn px-6 py-4 text-sm font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 focus:outline-none transition-all flex items-center gap-2">
                📨 My Placed Bids
                @php $counterBids = $myBids->where('status', 'counter')->count(); @endphp
                @if($counterBids > 0)
                    <span class="px-2 py-0.5 rounded-full text-xs bg-amber-500 text-white font-extrabold animate-pulse">{{ $counterBids }}</span>
                @endif
            </button>
        @endif

        <button onclick="switchTab('deals')" id="tabBtn-deals" class="tab-btn px-6 py-4 text-sm font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 focus:outline-none transition-all flex items-center gap-2">
            🤝 Active Deals (Address Pending)
            @php $pendingDealsCount = $activeDeals->count(); @endphp
            @if($pendingDealsCount > 0)
                <span class="px-2 py-0.5 rounded-full text-xs bg-teal-500 text-white font-extrabold">{{ $pendingDealsCount }}</span>
            @endif
        </button>

        <button onclick="switchTab('successful')" id="tabBtn-successful" class="tab-btn px-6 py-4 text-sm font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 focus:outline-none transition-all flex items-center gap-2">
            ✅ Successful Deals
            @php $successfulDealsCount = $successfulDeals->count(); @endphp
            @if($successfulDealsCount > 0)
                <span class="px-2 py-0.5 rounded-full text-xs bg-emerald-500 text-white font-extrabold">{{ $successfulDealsCount }}</span>
            @endif
        </button>
    </div>

    <!-- Tab Contents -->
    <div class="space-y-12">

        <!-- FARMER SECTION 1: MY PRODUCTS & NEW PRODUCT FORM -->
        @if($user->role === 'farmer')
            <div id="tabContent-products" class="tab-content space-y-8">
                <!-- Two Column Layout: List and Form -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <!-- Listings Portfolio -->
                    <div class="lg:col-span-2 space-y-6">
                        <h2 class="text-xl font-bold text-slate-900">Your Crops Portfolio</h2>
                        
                        @if($myProducts->isEmpty())
                            <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 shadow-md">
                                <p class="text-slate-500 text-sm">You haven't listed any crops yet. Use the form to list your first crop lot.</p>
                            </div>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($myProducts as $product)
                                    @php
                                        $cropLower = strtolower($product->crop_name);
                                        $imagePath = "/images/crops/{$cropLower}.jpg";
                                    @endphp
                                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-lg transition-all duration-300">
                                        <div class="relative h-40 bg-slate-100">
                                            <img src="{{ $imagePath }}" alt="{{ $product->crop_name }}" class="w-full h-full object-cover">
                                            <span class="absolute top-3 left-3 px-2 py-0.5 rounded-full text-xs font-bold text-white bg-slate-900/70 backdrop-blur-sm shadow-sm">
                                                ₹{{ number_format($product->base_price) }} Base
                                            </span>
                                            <span class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg text-xs font-bold shadow-sm uppercase tracking-wide {{ $product->status === 'active' ? 'bg-emerald-500 text-white' : 'bg-slate-600 text-white' }}">
                                                {{ $product->status }}
                                            </span>
                                        </div>
                                        <div class="p-5">
                                            <h3 class="font-bold text-slate-800 text-lg">{{ $product->crop_name }}</h3>
                                            <p class="text-xs text-slate-500 mt-1">Quantity: <strong class="text-slate-700 font-semibold">{{ $product->quantity }} Qntl</strong></p>
                                            <p class="text-xs text-slate-500">Location: <strong class="text-slate-700 font-semibold">{{ $product->location }}</strong></p>
                                            <div class="mt-4 pt-3 border-t border-slate-50">
                                                <a href="{{ route('products.show', $product->id) }}" class="block text-center text-xs font-bold text-emerald-600 hover:text-emerald-700 bg-emerald-50/50 py-2.5 rounded-xl hover:bg-emerald-50 transition-colors">
                                                    View Details Page
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Add Lot Form -->
                    <div id="add-product-section" class="bg-white rounded-3xl border border-slate-100 p-6 sm:p-8 shadow-xl h-fit">
                        <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="p-2 rounded-xl bg-emerald-500 text-white shadow-sm flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            </span>
                            List New Lot
                        </h2>

                        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <!-- Crop Dropdown -->
                            <div class="space-y-1.5">
                                <label for="crop_name" class="text-xs font-bold text-slate-600">Select Crop</label>
                                <select id="crop_name" name="crop_name" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all bg-white">
                                    <option value="" disabled selected>Select a Predefined Crop</option>
                                    @foreach($predefinedCrops as $category => $crops)
                                        <optgroup label="{{ $category }}">
                                            @foreach($crops as $crop)
                                                <option value="{{ $crop }}">{{ $crop }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantity -->
                            <div class="space-y-1.5">
                                <label for="quantity" class="text-xs font-bold text-slate-600">Quantity (Quintals)</label>
                                <input type="number" step="0.01" id="quantity" name="quantity" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="50.00">
                            </div>

                            <!-- Base Price -->
                            <div class="space-y-1.5">
                                <label for="base_price" class="text-xs font-bold text-slate-600">Base Price (Per Quintal)</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 font-bold text-sm">₹</span>
                                    <input type="number" id="base_price" name="base_price" required class="w-full pl-8 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="2100">
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="space-y-1.5">
                                <label for="location" class="text-xs font-bold text-slate-600">Lot Location</label>
                                <input type="text" id="location" name="location" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="Hoshiarpur Mandi, Punjab">
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="w-full py-3.5 px-6 rounded-2xl text-white font-bold bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-500/10 hover:shadow-emerald-500/20 transition-all duration-300 scale-100 hover:scale-[1.01] active:scale-[0.99] mt-4">
                                Publish Listing
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <!-- FARMER SECTION 2: INCOMING BIDS -->
            <div id="tabContent-bids" class="tab-content hidden space-y-6">
                <h2 class="text-xl font-bold text-slate-900">Incoming Bids Portfolio</h2>
                
                @if($incomingBids->isEmpty())
                    <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 shadow-md">
                        <p class="text-slate-500 text-sm">No bids received on your listings yet.</p>
                    </div>
                @else
                    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        <th class="p-5">Crop Lot</th>
                                        <th class="p-5">Buyer</th>
                                        <th class="p-5">Base Price</th>
                                        <th class="p-5">Bid Amount</th>
                                        <th class="p-5">Status</th>
                                        <th class="p-5 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 text-sm text-slate-700">
                                    @foreach($incomingBids as $bid)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <!-- Crop -->
                                            <td class="p-5 font-bold text-slate-800">
                                                <a href="{{ route('products.show', $bid->product_id) }}" class="hover:underline hover:text-emerald-600">
                                                    {{ $bid->product->crop_name ?? 'N/A' }}
                                                </a>
                                            </td>
                                            <!-- Buyer -->
                                            <td class="p-5">{{ $bid->buyer->name ?? 'Buyer' }}</td>
                                            <!-- Base -->
                                            <td class="p-5 font-semibold text-slate-500">₹{{ number_format($bid->product->base_price ?? 0) }}</td>
                                            <!-- Bid Amount -->
                                            <td class="p-5">
                                                <span class="font-extrabold text-slate-800">₹{{ number_format($bid->amount) }}</span>
                                                @if($bid->status === 'counter')
                                                    <span class="block text-[10px] font-semibold text-amber-600 mt-0.5">Counter: ₹{{ number_format($bid->counter_amount) }}</span>
                                                @endif
                                            </td>
                                            <!-- Status -->
                                            <td class="p-5">
                                                @php
                                                    $statusStyles = match($bid->status) {
                                                        'pending' => 'bg-amber-100 text-amber-800 border-amber-200/50',
                                                        'accepted' => 'bg-emerald-100 text-emerald-800 border-emerald-200/50',
                                                        'rejected' => 'bg-rose-100 text-rose-800 border-rose-200/50',
                                                        'counter' => 'bg-blue-100 text-blue-800 border-blue-200/50',
                                                        default => 'bg-slate-100 text-slate-800 border-slate-200/50'
                                                    };
                                                @endphp
                                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $statusStyles }}">
                                                    {{ $bid->status }}
                                                </span>
                                            </td>
                                            <!-- Actions -->
                                            <td class="p-5 text-right">
                                                @if($bid->status === 'pending')
                                                    <div class="flex items-center justify-end gap-2">
                                                        <form action="{{ route('bids.accept', $bid->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-colors shadow-sm">Accept</button>
                                                        </form>
                                                        <form action="{{ route('bids.reject', $bid->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-colors shadow-sm">Reject</button>
                                                        </form>
                                                        <button onclick="toggleCounterBox('{{ $bid->id }}')" class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-colors shadow-sm">Counter</button>
                                                    </div>

                                                    <!-- Counter Offer Input Box (Hidden initially) -->
                                                    <div id="counterBox-{{ $bid->id }}" class="hidden mt-3 max-w-xs ml-auto p-4 bg-slate-50 border border-slate-200/60 rounded-xl shadow-inner text-left">
                                                        <form action="{{ route('bids.counter', $bid->id) }}" method="POST">
                                                            @csrf
                                                            <label class="block text-xs font-bold text-slate-600 mb-1.5">Enter Counter Price (₹)</label>
                                                            <div class="flex gap-2">
                                                                <input type="number" name="counter_amount" required class="w-full px-3 py-1.5 rounded-lg border border-slate-200 text-xs focus:ring-1 focus:ring-emerald-500 focus:outline-none bg-white" placeholder="2300" min="{{ $bid->amount + 1 }}">
                                                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-colors shadow-sm">Send</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @else
                                                    <span class="text-xs text-slate-400 font-semibold">No actions available</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>

        <!-- BUYER SECTION 1: BROWSE PRODUCTS -->
        @else
            <div id="tabContent-browse" class="tab-content space-y-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-slate-900">Active Crop Listings</h2>
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-emerald-600 hover:underline">View in gallery layout →</a>
                </div>
                
                @if($browseProducts->isEmpty())
                    <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 shadow-md">
                        <p class="text-slate-500 text-sm">No crops listed currently. Come back later.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($browseProducts as $product)
                            @php
                                $cropLower = strtolower($product->crop_name);
                                $imagePath = "/images/crops/{$cropLower}.jpg";
                            @endphp
                            <div class="bg-white rounded-3xl border border-slate-100 hover:border-emerald-500/20 shadow-lg overflow-hidden flex flex-col justify-between hover:shadow-xl transition-all duration-300">
                                <div class="relative h-44 bg-slate-100">
                                    <img src="{{ $imagePath }}" alt="{{ $product->crop_name }}" class="w-full h-full object-cover">
                                    <span class="absolute top-3 left-3 px-2 py-0.5 rounded-full text-xs font-bold text-white bg-slate-900/60 backdrop-blur-sm">
                                        ₹{{ number_format($product->base_price) }}
                                    </span>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-slate-800 text-lg">{{ $product->crop_name }}</h3>
                                    <p class="text-xs text-slate-500 mt-1">Quantity: <strong class="text-slate-700 font-semibold">{{ $product->quantity }} Qntl</strong></p>
                                    <p class="text-xs text-slate-500">Location: <strong class="text-slate-700 font-semibold">{{ $product->location }}</strong></p>
                                    <p class="text-xs text-slate-500">Farmer: <strong class="text-slate-700 font-semibold">{{ $product->farmer->name ?? 'Verified Farmer' }}</strong></p>
                                    <div class="mt-4 pt-3 border-t border-slate-50">
                                        <a href="{{ route('products.show', $product->id) }}" class="block text-center text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 py-2.5 rounded-xl shadow-sm transition-colors">
                                            Place Bid
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- BUYER SECTION 2: MY BIDS -->
            <div id="tabContent-bids" class="tab-content hidden space-y-6">
                <h2 class="text-xl font-bold text-slate-900">Your Bidding Activity</h2>

                @if($myBids->isEmpty())
                    <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 shadow-md">
                        <p class="text-slate-500 text-sm">You haven't placed any bids yet.</p>
                        <a href="{{ route('home') }}" class="inline-block mt-4 text-sm font-bold text-emerald-600 hover:underline">Browse crops and place your first bid</a>
                    </div>
                @else
                    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        <th class="p-5">Crop Lot</th>
                                        <th class="p-5">Farmer</th>
                                        <th class="p-5">Base Price</th>
                                        <th class="p-5">Your Bid Amount</th>
                                        <th class="p-5">Status</th>
                                        <th class="p-5 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 text-sm text-slate-700">
                                    @foreach($myBids as $bid)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <!-- Crop -->
                                            <td class="p-5 font-bold text-slate-800">
                                                <a href="{{ route('products.show', $bid->product_id) }}" class="hover:underline hover:text-emerald-600">
                                                    {{ $bid->product->crop_name ?? 'N/A' }}
                                                </a>
                                            </td>
                                            <!-- Farmer -->
                                            <td class="p-5">{{ $bid->farmer->name ?? 'Farmer' }}</td>
                                            <!-- Base -->
                                            <td class="p-5 font-semibold text-slate-500">₹{{ number_format($bid->product->base_price ?? 0) }}</td>
                                            <!-- Bid Amount -->
                                            <td class="p-5">
                                                <span class="font-extrabold text-slate-800">₹{{ number_format($bid->amount) }}</span>
                                                @if($bid->status === 'counter')
                                                    <span class="block text-[10px] font-semibold text-amber-600 mt-0.5">Counter Proposal: ₹{{ number_format($bid->counter_amount) }}</span>
                                                @endif
                                            </td>
                                            <!-- Status -->
                                            <td class="p-5">
                                                @php
                                                    $statusStyles = match($bid->status) {
                                                        'pending' => 'bg-amber-100 text-amber-800 border-amber-200/50',
                                                        'accepted' => 'bg-emerald-100 text-emerald-800 border-emerald-200/50',
                                                        'rejected' => 'bg-rose-100 text-rose-800 border-rose-200/50',
                                                        'counter' => 'bg-blue-100 text-blue-800 border-blue-200/50',
                                                        default => 'bg-slate-100 text-slate-800 border-slate-200/50'
                                                    };
                                                @endphp
                                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $statusStyles }}">
                                                    {{ $bid->status }}
                                                </span>
                                            </td>
                                            <!-- Actions -->
                                            <td class="p-5 text-right">
                                                @if($bid->status === 'counter')
                                                    <div class="flex items-center justify-end gap-2">
                                                        <form action="{{ route('bids.accept-counter', $bid->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-colors shadow-sm">Accept Counter</button>
                                                        </form>
                                                        <form action="{{ route('bids.reject-counter', $bid->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-colors shadow-sm">Reject Counter</button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <span class="text-xs text-slate-400 font-semibold">Waiting for response</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <!-- UNIFIED DEALS SECTION (ADDRESS PENDING) -->
        <div id="tabContent-deals" class="tab-content hidden space-y-6">
            <h2 class="text-xl font-bold text-slate-900">Your Active Deals (Address Pending)</h2>
            
            @if($activeDeals->isEmpty())
                <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 shadow-md">
                    <p class="text-slate-500 text-sm">No active deals with pending address inputs.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($activeDeals as $deal)
                        @php
                            $cropLower = strtolower($deal->product->crop_name ?? 'wheat');
                            $imagePath = "/images/crops/{$cropLower}.jpg";
                            $buyerSide = ($user->role === 'buyer');
                        @endphp
                        <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col justify-between hover:scale-[1.02]">
                            <div class="relative h-40 bg-slate-100">
                                <img src="{{ $imagePath }}" alt="{{ $deal->product->crop_name ?? 'Crop' }}" class="w-full h-full object-cover">
                                <span class="absolute top-3 left-3 bg-slate-950/80 backdrop-blur-sm px-2.5 py-1 rounded-xl text-white font-extrabold text-xs shadow-md">
                                    ₹{{ number_format($deal->final_price) }}
                                </span>
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <h3 class="font-extrabold text-slate-800 text-lg">{{ $deal->product->crop_name ?? 'CropLot' }}</h3>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold border uppercase tracking-wider bg-amber-100 border-amber-200 text-amber-800">
                                            Address Pending
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-2">Lot Quantity: <strong class="text-slate-700 font-semibold">{{ $deal->product->quantity ?? 0 }} Qntl</strong></p>
                                    <p class="text-xs text-slate-500 mt-1">
                                        @if($buyerSide)
                                            Seller Farmer: <strong class="text-slate-700 font-semibold">{{ $deal->farmer->name ?? 'Farmer' }}</strong>
                                        @else
                                            Buyer Client: <strong class="text-slate-700 font-semibold">{{ $deal->buyer->name ?? 'Buyer' }}</strong>
                                        @endif
                                    </p>
                                    
                                    <!-- Flow helper badge -->
                                    <div class="mt-4 p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-600 font-semibold">
                                        @if($buyerSide)
                                            @if(!$deal->delivery_address)
                                                <span class="text-rose-600">⚠️ You need to submit delivery details</span>
                                            @else
                                                <span class="text-slate-500">Waiting for seller pickup details</span>
                                            @endif
                                        @else
                                            @if(!$deal->pickup_location)
                                                <span class="text-rose-600">⚠️ You need to submit pickup details</span>
                                            @else
                                                <span class="text-slate-500">Waiting for buyer delivery details</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-6 pt-4 border-t border-slate-50">
                                    <a href="{{ route('deals.show', $deal->id) }}" class="w-full inline-flex items-center justify-center rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-4 text-xs transition-colors shadow-sm shadow-emerald-500/10">
                                        Open Deal Page
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- SUCCESSFUL DEALS SECTION -->
        <div id="tabContent-successful" class="tab-content hidden space-y-6">
            <h2 class="text-xl font-bold text-slate-900">Your Confirmed / Successful Deals</h2>
            
            @if($successfulDeals->isEmpty())
                <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 shadow-md">
                    <p class="text-slate-500 text-sm">No confirmed deals yet. Once both parties submit shipping addresses, confirmed deals show here.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($successfulDeals as $deal)
                        @php
                            $cropLower = strtolower($deal->product->crop_name ?? 'wheat');
                            $imagePath = "/images/crops/{$cropLower}.jpg";
                            $buyerSide = ($user->role === 'buyer');
                        @endphp
                        <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col justify-between hover:scale-[1.02]">
                            <div class="relative h-40 bg-slate-100">
                                <img src="{{ $imagePath }}" alt="{{ $deal->product->crop_name ?? 'Crop' }}" class="w-full h-full object-cover">
                                <span class="absolute top-3 left-3 bg-emerald-650 px-2.5 py-1 rounded-xl text-white font-extrabold text-xs shadow-md" style="background-color: #059669;">
                                    ₹{{ number_format($deal->final_price) }} Confirmed
                                </span>
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <h3 class="font-extrabold text-slate-800 text-lg">{{ $deal->product->crop_name ?? 'CropLot' }}</h3>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold border uppercase tracking-wider bg-emerald-100 border-emerald-200 text-emerald-800">
                                            Confirmed
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-2">Lot Quantity: <strong class="text-slate-700 font-semibold">{{ $deal->product->quantity ?? 0 }} Qntl</strong></p>
                                    <p class="text-xs text-slate-500 mt-1">
                                        @if($buyerSide)
                                            Seller Farmer: <strong class="text-slate-700 font-semibold">{{ $deal->farmer->name ?? 'Farmer' }}</strong>
                                        @else
                                            Buyer Client: <strong class="text-slate-700 font-semibold">{{ $deal->buyer->name ?? 'Buyer' }}</strong>
                                        @endif
                                    </p>
                                    
                                    <div class="mt-4 p-3 rounded-xl bg-emerald-50/50 border border-emerald-100/50 text-xs text-emerald-800 font-semibold">
                                        <div class="flex items-center text-emerald-600">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            Deal Confirmed & Secured!
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 pt-4 border-t border-slate-50">
                                    <a href="{{ route('deals.show', $deal->id) }}" class="w-full inline-flex items-center justify-center rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-4 text-xs transition-colors shadow-sm">
                                        View Full Receipt
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
</div>

<script>
    // Tab switching engine
    function switchTab(tabName) {
        // Hide all contents
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(c => c.classList.add('hidden'));

        // Reset tab buttons
        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(b => {
            b.classList.remove('border-emerald-600', 'text-emerald-600');
            b.classList.add('border-transparent', 'text-slate-500');
        });

        // Show active content
        const activeContent = document.getElementById('tabContent-' + tabName);
        if (activeContent) activeContent.classList.remove('hidden');

        // Highlight active button
        const activeButton = document.getElementById('tabBtn-' + tabName);
        if (activeButton) {
            activeButton.classList.remove('border-transparent', 'text-slate-500');
            activeButton.classList.add('border-emerald-600', 'text-emerald-600');
        }
    }

    // Toggle Counter Offer Input Box (Farmer Dashboard)
    function toggleCounterBox(bidId) {
        const box = document.getElementById('counterBox-' + bidId);
        if (box) {
            box.classList.toggle('hidden');
        }
    }

    // Set tab from URL params if exists
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');
        if (tabParam) {
            switchTab(tabParam);
        }
    });
</script>
@endsection
