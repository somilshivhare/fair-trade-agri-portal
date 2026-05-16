@extends('layouts.stitch')

@section('title', 'Live Commodity Marketplace - AgriMandi')

@section('content')
<div class="min-h-screen bg-[#fcfcfc]" x-data="marketplaceEngine()">
    <!-- Top Price Ticker (Standardized) -->
    <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-50 shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-primary flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[11px] uppercase tracking-tighter">Live Mandi Index</span>
        </div>
        
        <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[150px]">
            <template x-for="item in tickerItems" :key="item.name">
                <div class="inline-flex items-center gap-4 px-8 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest" x-text="item.name"></span>
                    <div class="flex items-center gap-2">
                        <span class="font-mono font-bold text-[13px]" x-text="'₹' + formatNumber(item.price)"></span>
                        <div class="flex items-center gap-0.5" :class="item.change > 0 ? 'text-emerald-400' : 'text-rose-400'">
                            <span class="material-symbols-outlined text-[16px]" x-text="item.change > 0 ? 'trending_up' : 'trending_down'"></span>
                            <span class="font-mono text-[11px] font-black" x-text="(item.change > 0 ? '+' : '') + item.change.toFixed(1) + '%'"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Navigation (Standardized h-20) -->
    <nav class="bg-white/80 backdrop-blur-2xl border-b border-slate-200/50 flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-40 shadow-sm gap-10">
        <div class="flex items-center gap-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all duration-300 group">
                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    </div>
                    <span class="font-label-md text-[13px] font-bold">Home</span>
                </a>
                <div class="h-6 w-px bg-slate-200"></div>
            </div>
            <a href="{{ route('home') }}" class="font-headline-md text-primary font-black tracking-tight text-[20px] whitespace-nowrap">AgriMandi <span class="text-slate-900">Market</span></a>
            <div class="hidden md:flex items-center gap-8">
                <a class="font-label-md text-[13px] text-primary font-bold border-b-2 border-primary pb-0.5" href="{{ route('marketplace') }}">Marketplace</a>
                <a class="font-label-md text-[13px] text-slate-500 hover:text-primary transition-colors" href="{{ route('categories') }}">Categories</a>
                <a class="font-label-md text-[13px] text-slate-500 hover:text-primary transition-colors" href="{{ route('gov.index') }}">Gov Portal</a>
                <a class="font-label-md text-[13px] text-slate-500 hover:text-primary transition-colors" href="{{ route('analytics') }}">Live Analytics</a>
            </div>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="group relative hidden lg:flex items-center bg-slate-100 border border-slate-200 rounded-full px-4 py-2 w-72 focus-within:ring-2 ring-primary/20 transition-all">
                <span class="material-symbols-outlined text-slate-400 mr-2 text-[18px]">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-[13px] w-full" placeholder="Search commodities..." type="text"/>
                <div class="flex items-center gap-1 ml-2 opacity-30 group-focus-within:opacity-0 transition-opacity">
                    <span class="text-[9px] font-bold">⌘</span>
                    <span class="text-[9px] font-bold">K</span>
                </div>
            </div>
            @include('components.nav-user-actions')
        </div>
    </nav>

    <main class="max-w-[1600px] mx-auto px-margin-desktop py-12">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <div class="px-3 py-1 bg-primary/10 text-primary rounded-full text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full animate-ping"></span>
                        Live Trading Active
                    </div>
                    <span class="text-slate-400 text-[11px] font-bold uppercase tracking-widest" x-text="currentTimestamp"></span>
                </div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Active <span class="text-primary italic">Mandi</span> Marketplace</h1>
                <p class="text-slate-500 font-medium max-w-xl">Direct access to the largest network of verified farmers, FPOs, and B2B traders across India.</p>
            </div>
            
            <div class="flex gap-4">
                <div class="bg-white p-4 rounded-[24px] border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">local_fire_department</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">High Demand</p>
                        <p class="font-black text-slate-900 text-[14px]">Wheat (Punjab)</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-[24px] border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">equalizer</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Live Volume</p>
                        <p class="font-black text-slate-900 text-[14px]">1,250+ Listings</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-12">
            <!-- Advanced Sidebar -->
            <aside class="hidden lg:flex flex-col w-80 flex-shrink-0">
                <div class="sticky top-32 space-y-8">
                    <!-- Live Insights Panel -->
                    <div class="bg-slate-900 rounded-[32px] p-6 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 blur-[60px] -mr-10 -mt-10 rounded-full"></div>
                        <h3 class="text-sm font-black uppercase tracking-[0.2em] mb-6 flex items-center justify-between">
                            Live Insights
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse shadow-[0_0_10px_#34d399]"></span>
                        </h3>
                        <div class="space-y-4">
                            <template x-for="stat in marketStats" :key="stat.label">
                                <div class="p-3 bg-white/5 rounded-2xl border border-white/5 flex items-center justify-between">
                                    <span class="text-[11px] font-bold text-white/50" x-text="stat.label"></span>
                                    <span class="text-[12px] font-black text-primary" x-text="stat.value"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Enhanced Filter Card -->
                    <div class="bg-white rounded-[32px] p-8 border border-slate-200 shadow-sm space-y-8">
                        <div class="flex items-center justify-between">
                            <h3 class="font-black text-slate-900 tracking-tight">Market Filters</h3>
                            <button class="text-primary text-[11px] font-black uppercase hover:underline">Clear</button>
                        </div>

                        <div class="space-y-6">
                            <!-- Category Selection -->
                            <div class="space-y-3">
                                <p class="text-[11px] font-black uppercase tracking-widest text-slate-400">Commodity Type</p>
                                <div class="flex flex-wrap gap-2">
                                    <template x-for="cat in ['Grains', 'Vegetables', 'Fruits', 'Spices']" :key="cat">
                                        <button class="px-4 py-2 rounded-xl text-[11px] font-bold border transition-all" 
                                                :class="activeCat === cat ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-slate-50 text-slate-500 border-slate-200 hover:border-primary/30'"
                                                @click="activeCat = cat" x-text="cat"></button>
                                    </template>
                                </div>
                            </div>

                            <!-- Price Slider (Visual) -->
                            <div class="space-y-4">
                                <p class="text-[11px] font-black uppercase tracking-widest text-slate-400">Price Range (per Q)</p>
                                <div class="h-1.5 bg-slate-100 rounded-full relative">
                                    <div class="absolute left-0 right-0 h-full bg-primary rounded-full"></div>
                                    <div class="absolute left-0 w-4 h-4 bg-white border-2 border-primary rounded-full -top-1.5 shadow-md"></div>
                                    <div class="absolute right-0 w-4 h-4 bg-white border-2 border-primary rounded-full -top-1.5 shadow-md"></div>
                                </div>
                                <div class="flex justify-between text-[11px] font-bold text-slate-400 font-mono">
                                    <span>₹500</span>
                                    <span>₹50,000</span>
                                </div>
                            </div>

                            <!-- Toggles -->
                            <div class="space-y-3">
                                <template x-for="toggle in ['Organic Only', 'Govt Verified', 'Live Bidding', 'Bulk Delivery']" :key="toggle">
                                    <label class="flex items-center justify-between cursor-pointer group">
                                        <span class="text-[13px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="toggle"></span>
                                        <div class="w-10 h-5 bg-slate-100 rounded-full relative transition-colors border border-slate-200 overflow-hidden">
                                            <div class="absolute inset-y-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-transform translate-x-0"></div>
                                        </div>
                                    </label>
                                </template>
                            </div>
                        </div>

                        <button class="w-full py-4 bg-slate-900 text-white rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-xl shadow-slate-900/10 hover:-translate-y-0.5 transition-all">
                            Apply Live Filters
                        </button>
                    </div>
                </div>
            </aside>

            <!-- Main Listing Area -->
            <div class="flex-1 space-y-12">
                <!-- Sorting & View Options -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="text-[11px] font-black uppercase tracking-widest text-slate-400">Sort by:</span>
                        <div class="flex bg-slate-100 p-1 rounded-xl">
                            <button @click="sortBy = 'trending'" 
                                    :class="sortBy === 'trending' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-900'"
                                    class="px-4 py-1.5 rounded-lg text-[11px] font-black transition-all">Trending</button>
                            <button @click="sortBy = 'yield'" 
                                    :class="sortBy === 'yield' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-900'"
                                    class="px-4 py-1.5 rounded-lg text-[11px] font-black transition-all">Highest Yield</button>
                            <button @click="sortBy = 'nearest'" 
                                    :class="sortBy === 'nearest' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-900'"
                                    class="px-4 py-1.5 rounded-lg text-[11px] font-black transition-all">Nearest</button>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button @click="viewMode = 'grid'" 
                                :class="viewMode === 'grid' ? 'text-primary border-primary bg-primary/5' : 'text-slate-400 border-slate-200'"
                                class="w-10 h-10 flex items-center justify-center bg-white border rounded-xl transition-all">
                            <span class="material-symbols-outlined">grid_view</span>
                        </button>
                        <button @click="viewMode = 'list'" 
                                :class="viewMode === 'list' ? 'text-primary border-primary bg-primary/5' : 'text-slate-400 border-slate-200'"
                                class="w-10 h-10 flex items-center justify-center bg-white border rounded-xl transition-all">
                            <span class="material-symbols-outlined">view_list</span>
                        </button>
                    </div>
                </div>

                <!-- Live Listing Grid -->
                <div :class="viewMode === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8' : 'flex flex-col gap-6'">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div :class="viewMode === 'grid' ? 'flex flex-col' : 'flex flex-col md:flex-row md:items-center gap-8 p-6'"
                             class="group bg-white rounded-[40px] border border-slate-200 shadow-[0_10px_40px_rgba(0,0,0,0.02)] overflow-hidden transition-all duration-500 hover:shadow-2xl hover:border-primary/20 hover:-translate-y-2">
                            <!-- Image Container -->
                            <div :class="viewMode === 'grid' ? 'h-64 w-full' : 'h-48 w-full md:w-64 shrink-0'"
                                 class="relative overflow-hidden rounded-[32px]">
                                <img :src="product.image" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" :alt="product.name">
                                
                                <!-- Floating Status Badges -->
                                <div class="absolute top-6 left-6 flex flex-col gap-2">
                                    <div class="bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full flex items-center gap-2 shadow-xl">
                                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-900" x-text="product.sellerType"></span>
                                    </div>
                                    <div x-show="product.isOrganic" class="bg-emerald-500 text-white px-4 py-1.5 rounded-full flex items-center gap-2 shadow-xl shadow-emerald-500/20">
                                        <span class="material-symbols-outlined text-[14px]">eco</span>
                                        <span class="text-[10px] font-black uppercase tracking-widest">Organic</span>
                                    </div>
                                </div>

                                <!-- Live Price Badge (Only in Grid) -->
                                <div x-show="viewMode === 'grid'" class="absolute bottom-6 right-6">
                                    <div class="bg-slate-900 text-white px-5 py-3 rounded-[24px] shadow-2xl flex flex-col items-center">
                                        <span class="text-[9px] font-black uppercase tracking-[0.2em] text-white/40 mb-1">Mandi Price</span>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-lg font-black font-mono" x-text="'₹' + formatNumber(product.price)"></span>
                                            <span class="text-[10px] font-bold text-white/60">/Q</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Live Bidding Indicator -->
                                <div x-show="product.hasBidding" class="absolute inset-0 bg-primary/20 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <div class="bg-white px-6 py-3 rounded-full flex items-center gap-3 shadow-2xl transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500">
                                        <span class="material-symbols-outlined text-primary animate-bounce">local_fire_department</span>
                                        <span class="text-[11px] font-black uppercase tracking-widest text-slate-900">Active Bidding Open</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div :class="viewMode === 'grid' ? 'p-8 space-y-6' : 'flex-1 pr-8 py-2 space-y-4'" class="flex flex-col justify-center">
                                <div class="space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-black text-slate-900 group-hover:text-primary transition-colors" x-text="product.name"></h3>
                                        <div class="flex items-center gap-1 text-amber-500">
                                            <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1">star</span>
                                            <span class="text-[12px] font-black" x-text="product.rating"></span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-400 font-bold text-[11px] uppercase tracking-widest">
                                        <span class="material-symbols-outlined text-[16px]">location_on</span>
                                        <span x-text="product.mandi + ', ' + product.state"></span>
                                    </div>
                                </div>

                                <!-- Market Info Grid -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 group-hover:bg-primary/5 group-hover:border-primary/10 transition-colors">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Available Stock</p>
                                        <p class="font-black text-slate-900 text-[14px]" x-text="product.quantity + ' ' + product.unit"></p>
                                    </div>
                                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 group-hover:bg-primary/5 group-hover:border-primary/10 transition-colors">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Market Demand</p>
                                        <div class="flex items-center gap-2">
                                            <div class="flex-1 h-1 bg-slate-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-primary" :style="'width: ' + product.demand + '%'"></div>
                                            </div>
                                            <span class="text-[11px] font-black text-primary" x-text="product.demand + '%'"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <a :href="'/products/' + product.id" class="flex-1 py-4 bg-primary text-white rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-lg shadow-primary/20 text-center hover:bg-emerald-600 hover:shadow-primary/40 transition-all active:scale-95">
                                        View Details
                                    </a>
                                    <button @click="toggleLike(product.id)" 
                                            :class="likedProducts.includes(product.id) ? 'bg-rose-50 text-rose-500' : 'bg-slate-100 text-slate-400'"
                                            class="w-14 h-14 flex items-center justify-center rounded-2xl transition-all active:scale-90 group/like">
                                        <span class="material-symbols-outlined transition-all" 
                                              :style="likedProducts.includes(product.id) ? 'font-variation-settings: \'FILL\' 1' : ''"
                                              x-text="'favorite'"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Bidding Notification Overlay -->
                <div class="fixed bottom-8 right-8 z-[100] space-y-3 w-64 pointer-events-none">
                    <template x-for="bid in liveBids" :key="bid.id">
                        <div x-show="bid.visible" 
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-y-10 scale-90"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-90"
                             class="bg-white/90 backdrop-blur-md rounded-2xl p-3.5 shadow-[0_20px_50px_rgba(0,0,0,0.2)] border border-white/50 flex items-center gap-3.5">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[20px]">gavel</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[9px] font-black text-primary uppercase tracking-[0.2em] mb-0.5">Live Bid</p>
                                <p class="text-[11px] font-black text-slate-900 truncate" x-text="bid.buyer + ' bid ₹' + formatNumber(bid.amount)"></p>
                                <p class="text-[9px] text-slate-500 font-bold truncate" x-text="'For ' + bid.crop"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>

    <!-- Regional Analytics Hub -->
    <section class="bg-slate-900 py-24 text-white overflow-hidden relative">
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-primary rounded-full blur-[150px] -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-secondary rounded-full blur-[150px] translate-x-1/2 translate-y-1/2"></div>
        </div>

        <div class="max-w-[1600px] mx-auto px-margin-desktop relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
                <div class="space-y-4">
                    <h2 class="text-5xl font-black tracking-tight leading-none">Regional <span class="text-primary italic">Mandi</span> Insights</h2>
                    <p class="text-white/40 font-bold uppercase tracking-widest max-w-xl">Deep analytics for high-volume trading hubs across key agricultural states.</p>
                </div>
                <div id="mandiInsightChart" class="w-full max-w-lg h-32"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <template x-for="state in stateData" :key="state.name">
                    <div class="p-8 bg-white/5 rounded-[40px] border border-white/5 hover:border-primary/30 transition-all group relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 text-white/5 text-6xl font-black" x-text="state.name.substring(0, 2).toUpperCase()"></div>
                        <p class="text-sm font-black text-primary uppercase tracking-[0.2em] mb-4" x-text="state.name"></p>
                        <div class="space-y-6 relative z-10">
                            <div>
                                <p class="text-[10px] font-bold text-white/40 uppercase tracking-widest mb-1">Avg Price /Q</p>
                                <p class="text-2xl font-black font-mono" x-text="'₹' + formatNumber(state.price)"></p>
                            </div>
                            <div class="flex items-center gap-8">
                                <div>
                                    <p class="text-[10px] font-bold text-white/40 uppercase tracking-widest mb-1">Listings</p>
                                    <p class="font-black text-xl" x-text="state.listings"></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-white/40 uppercase tracking-widest mb-1">Active Traders</p>
                                    <p class="font-black text-xl" x-text="state.traders"></p>
                                </div>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-white/40 uppercase tracking-widest mb-2 flex items-center justify-between">
                                    Demand Trend <span class="text-primary" x-text="state.demand + '%'"></span>
                                </p>
                                <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary transition-all duration-1000" :style="'width: ' + state.demand + '%'"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</div>

<script>
function marketplaceEngine() {
    return {
        currentTimestamp: '',
        tickerItems: [
            { name: 'Wheat', price: 2450, change: 2.4 },
            { name: 'Rice', price: 3100, change: -1.1 },
            { name: 'Cotton', price: 7200, change: 3.2 },
            { name: 'Onion', price: 1820, change: -2.4 },
            { name: 'Potato', price: 1450, change: 1.5 },
            { name: 'Soybean', price: 4800, change: -0.5 },
            { name: 'Turmeric', price: 8500, change: 4.8 }
        ],
        activeCat: 'Grains',
        marketStats: [
            { label: 'Avg India Mandi Price', value: '₹2,480/Q' },
            { label: 'Top Gaining Crop', value: 'Turmeric (+4.8%)' },
            { label: 'Highest Demand State', value: 'Punjab (92%)' },
            { label: 'Total Active Bids', value: '1,450+' }
        ],
        products: [
            { id: 1, name: 'Premium Sharbati Wheat', mandi: 'Khanna', state: 'Punjab', price: 2580, quantity: 450, unit: 'MT', rating: 4.9, image: '/images/commodities/wheat.png', sellerType: 'Verified Farmer', demand: 92, hasBidding: true, isOrganic: true },
            { id: 2, name: 'Basmati Rice (Export Grade)', mandi: 'Karnal', state: 'Haryana', price: 3250, quantity: 800, unit: 'MT', rating: 4.8, image: '/images/commodities/rice.png', sellerType: 'FPO Verified', demand: 85, hasBidding: true, isOrganic: false },
            { id: 3, name: 'Red Onions (Grade A)', mandi: 'Lasalgaon', state: 'Maharashtra', price: 1820, quantity: 1200, unit: 'MT', rating: 4.7, image: '/images/commodities/onion.png', sellerType: 'Trade Expert', demand: 78, hasBidding: false, isOrganic: false },
            { id: 4, name: 'Organic Turmeric (High Curcumin)', mandi: 'Nizamabad', state: 'Telangana', price: 8650, quantity: 200, unit: 'MT', rating: 4.9, image: '/images/commodities/turmeric.png', sellerType: 'Verified Farmer', demand: 94, hasBidding: true, isOrganic: true },
            { id: 5, name: 'Cotton (Long Staple)', mandi: 'Rajkot', state: 'Gujarat', price: 7180, quantity: 650, unit: 'MT', rating: 4.6, image: '/images/commodities/cotton.png', sellerType: 'Govt Agent', demand: 72, hasBidding: true, isOrganic: false },
            { id: 6, name: 'Soybean (Black)', mandi: 'Indore', state: 'MP', price: 4750, quantity: 950, unit: 'MT', rating: 4.8, image: '/images/commodities/soybean.png', sellerType: 'FPO Verified', demand: 68, hasBidding: false, isOrganic: true }
        ],
        liveBids: [],
        sortBy: 'trending',
        viewMode: 'grid',
        likedProducts: [],
        
        toggleLike(id) {
            if (this.likedProducts.includes(id)) {
                this.likedProducts = this.likedProducts.filter(pId => pId !== id);
            } else {
                this.likedProducts.push(id);
            }
        },

        get filteredProducts() {
            let items = [...this.products];
            
            if (this.sortBy === 'trending') {
                items.sort((a, b) => b.demand - a.demand);
            } else if (this.sortBy === 'yield') {
                items.sort((a, b) => b.quantity - a.quantity);
            } else if (this.sortBy === 'nearest') {
                items.sort((a, b) => a.id - b.id); // Placeholder for distance
            }
            
            return items;
        },

        init() {
            this.updateTimestamp();
            setInterval(() => this.updateTimestamp(), 1000);
            
            // Simulation Engine
            setInterval(() => {
                this.fluctuatePrices();
                this.simulateBids();
            }, 4000);
        },

        updateTimestamp() {
            const now = new Date();
            this.currentTimestamp = now.toLocaleTimeString() + ' | ' + now.toLocaleDateString('en-IN', { day: 'numeric', month: 'short' });
        },

        fluctuatePrices() {
            this.tickerItems.forEach(item => {
                let change = (Math.random() * 40 - 20);
                item.price = Math.round(item.price + change);
                item.change = +(change / item.price * 100).toFixed(1);
            });

            this.products.forEach(p => {
                if (Math.random() > 0.5) {
                    p.price = Math.round(p.price + (Math.random() * 10 - 5));
                    p.demand = Math.min(100, Math.max(10, Math.round(p.demand + (Math.random() * 4 - 2))));
                }
            });
        },

        simulateBids() {
            const buyers = ['Raj Traders', 'Punjab Agro', 'Reliance Fresh', 'ITC Limited', 'Global Exports', 'Shakti Seeds'];
            const buyer = buyers[Math.floor(Math.random() * buyers.length)];
            const product = this.products[Math.floor(Math.random() * this.products.length)];
            
            const newBid = {
                id: Date.now(),
                buyer: buyer,
                amount: Math.round(product.price * (1 + Math.random() * 0.05)),
                crop: product.name,
                visible: true
            };

            this.liveBids.push(newBid);
            if (this.liveBids.length > 3) this.liveBids.shift();

            setTimeout(() => {
                newBid.visible = false;
                setTimeout(() => {
                    this.liveBids = this.liveBids.filter(b => b.id !== newBid.id);
                }, 1000);
            }, 3000);
        },

        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>

<style>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 60s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}

@keyframes pulse-subtle {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}
.animate-pulse-subtle {
    animation: pulse-subtle 2s infinite ease-in-out;
}

::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
@endsection