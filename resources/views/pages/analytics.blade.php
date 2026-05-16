@extends('layouts.stitch')

@section('title', 'Live Market Analytics - AgriMandi')

@section('content')
<div class="min-h-screen bg-[#f8fafc]" x-data="liveMarketData()">
    <!-- Premium Glass Header -->
    <header class="flex items-center justify-between px-8 h-20 w-full sticky top-0 z-[60] bg-white/70 backdrop-blur-2xl border-b border-slate-200/50 shadow-sm gap-10">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-primary/20 group-hover:rotate-6 transition-transform">
                    <span class="material-symbols-outlined text-white text-[24px]">analytics</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-md text-slate-900 font-black tracking-tight text-[18px] leading-tight whitespace-nowrap">AgriMandi <span class="text-primary">Live</span></span>
                    <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Market Intelligence</span>
                </div>
            </a>
            <nav class="hidden lg:flex items-center gap-8 font-label-md text-[13px]">
                <a class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1.5" href="{{ route('marketplace') }}">
                    <span class="material-symbols-outlined text-[18px]">storefront</span> Marketplace
                </a>
                <a class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1.5" href="{{ route('gov.index') }}">
                    <span class="material-symbols-outlined text-[18px]">account_balance</span> Gov Portal
                </a>
                <a class="text-primary font-bold flex items-center gap-1.5" href="{{ route('analytics') }}">
                    <span class="material-symbols-outlined text-[18px]">insights</span> Analytics
                </a>
            </nav>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="hidden xl:flex items-center bg-slate-100 rounded-2xl px-4 py-2 border border-slate-200/50 w-full max-w-md group focus-within:ring-2 ring-primary/20 transition-all">
                <span class="material-symbols-outlined text-slate-400 mr-2 text-[20px] group-focus-within:text-primary">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-[13px] w-full placeholder:text-slate-400 font-medium" placeholder="Search live commodities, mandis, or trends..." type="text"/>
            </div>
            @include('components.nav-user-actions')
        </div>
    </header>

    <!-- LIVE PRICE TICKER -->
    <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-50 shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-primary flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[11px] uppercase tracking-tighter">Live Mandi Feed</span>
        </div>
        
        <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[150px]">
            <template x-for="(crop, name) in crops" :key="name">
                <div class="inline-flex items-center gap-4 px-8 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest" x-text="name"></span>
                    <div class="flex items-center gap-2">
                        <span class="font-mono font-bold text-[13px]" x-text="'₹' + formatNumber(crop.price)"></span>
                        <div class="flex items-center gap-0.5" :class="crop.trend === 'up' ? 'text-emerald-400' : 'text-rose-400'">
                            <span class="material-symbols-outlined text-[16px]" x-text="crop.trend === 'up' ? 'trending_up' : 'trending_down'"></span>
                            <span class="font-mono text-[11px] font-black" x-text="(crop.change > 0 ? '+' : '') + crop.change.toFixed(1) + '%'"></span>
                        </div>
                    </div>
                </div>
            </template>
            <!-- Duplicate for infinite scroll effect -->
            <template x-for="(crop, name) in crops" :key="name + '_dup'">
                <div class="inline-flex items-center gap-4 px-8 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest" x-text="name"></span>
                    <div class="flex items-center gap-2">
                        <span class="font-mono font-bold text-[13px]" x-text="'₹' + formatNumber(crop.price)"></span>
                        <div class="flex items-center gap-0.5" :class="crop.trend === 'up' ? 'text-emerald-400' : 'text-rose-400'">
                            <span class="material-symbols-outlined text-[16px]" x-text="crop.trend === 'up' ? 'trending_up' : 'trending_down'"></span>
                            <span class="font-mono text-[11px] font-black" x-text="(crop.change > 0 ? '+' : '') + crop.change.toFixed(1) + '%'"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <main class="px-margin-desktop py-12 max-w-[1600px] mx-auto">
        <!-- Hero Section -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-6">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <div class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-2 border border-emerald-200">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-ping"></span>
                        Real-time Analytics Active
                    </div>
                    <span class="text-slate-400 text-[11px] font-medium" x-text="'Last updated: ' + lastUpdate"></span>
                </div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Market <span class="text-primary italic">Pulse</span> Dashboard</h1>
                <p class="text-slate-500 font-medium max-w-xl">Comprehensive live monitoring of India's agricultural commodity prices, volume trends, and regional insights.</p>
            </div>
            
            <div class="flex bg-white p-1.5 rounded-2xl shadow-sm border border-slate-200">
                <button @click="chartType = 'line'" :class="chartType === 'line' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">show_chart</span> Line
                </button>
                <button @click="chartType = 'bar'" :class="chartType === 'bar' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">bar_chart</span> Bar
                </button>
                <button @click="chartType = 'area'" :class="chartType === 'area' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">area_chart</span> Area
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8 mb-8">
            <!-- MAIN CHART CARD -->
            <div class="xl:col-span-3 bg-white rounded-[40px] p-10 border border-slate-200 shadow-[0_20px_50px_rgba(0,0,0,0.03)] relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 flex gap-3">
                    <template x-for="c in ['Wheat', 'Rice', 'Cotton', 'Onion']" :key="c">
                        <button @click="activeChartCrop = c" 
                                :class="activeChartCrop === c ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'bg-slate-100 text-slate-500 hover:bg-slate-200'"
                                class="px-5 py-2 rounded-full text-[11px] font-black uppercase tracking-wider transition-all" 
                                x-text="c"></button>
                    </template>
                </div>
                
                <div class="mb-10">
                    <h3 class="text-2xl font-black text-slate-900 mb-1" x-text="activeChartCrop + ' Price Index'"></h3>
                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-mono font-black tracking-tighter" x-text="'₹' + formatNumber(crops[activeChartCrop]?.price)"></span>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Current Market Price</span>
                            <div class="flex items-center gap-1.5" :class="crops[activeChartCrop]?.change > 0 ? 'text-emerald-500' : 'text-rose-500'">
                                <span class="material-symbols-outlined text-[20px]" x-text="crops[activeChartCrop]?.change > 0 ? 'north_east' : 'south_east'"></span>
                                <span class="font-bold text-sm" x-text="(crops[activeChartCrop]?.change > 0 ? '+' : '') + crops[activeChartCrop]?.change.toFixed(1) + '% Today'"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ApexCharts Target -->
                <div id="mainPulseChart" class="w-full h-[400px]"></div>
            </div>

            <!-- MARKET MOVERS CARD -->
            <div class="bg-slate-900 rounded-[40px] p-8 text-white shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 blur-[80px] -mr-10 -mt-10 rounded-full"></div>
                
                <h3 class="text-xl font-black mb-8 flex items-center justify-between">
                    Market Movers
                    <span class="text-[10px] bg-white/10 px-2 py-1 rounded-md text-white/50 uppercase tracking-widest">Global</span>
                </h3>
                
                <div class="space-y-6">
                    <template x-for="mover in marketMovers" :key="mover.name">
                        <div class="group cursor-pointer">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center transition-all group-hover:scale-110" 
                                         :class="mover.type === 'gain' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-rose-500/20 text-rose-400'">
                                        <span class="material-symbols-outlined text-[20px]" x-text="mover.type === 'gain' ? 'trending_up' : 'trending_down'"></span>
                                    </div>
                                    <div>
                                        <p class="font-black text-[13px] tracking-tight" x-text="mover.name"></p>
                                        <p class="text-[10px] text-white/40 font-bold uppercase tracking-widest" x-text="mover.location"></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-mono font-bold text-[14px]" x-text="'₹' + formatNumber(mover.price)"></p>
                                    <p class="text-[11px] font-black" :class="mover.type === 'gain' ? 'text-emerald-400' : 'text-rose-400'" 
                                       x-text="(mover.change > 0 ? '+' : '') + mover.change.toFixed(1) + '%'"></p>
                                </div>
                            </div>
                            <div class="h-1 bg-white/5 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r transition-all duration-1000" 
                                     :class="mover.type === 'gain' ? 'from-emerald-500 to-emerald-400' : 'from-rose-500 to-rose-400'"
                                     :style="'width: ' + Math.abs(mover.change * 5) + '%'"></div>
                            </div>
                        </div>
                    </template>
                </div>

                <button class="w-full mt-10 py-4 bg-white/10 hover:bg-white text-white hover:text-slate-900 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] transition-all">
                    Export Full Market Report
                </button>
            </div>
        </div>

        <!-- SECOND ROW: PIE CHARTS & DISTRIBUTION -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-12">
            <!-- PIE CHART 1 -->
            <div class="bg-white rounded-[40px] p-8 border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-full flex justify-between items-center mb-8">
                    <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400">Crop Distribution</h4>
                    <span class="material-symbols-outlined text-slate-300">pie_chart</span>
                </div>
                <div id="cropDistributionChart" class="w-full"></div>
                <div class="mt-6 flex flex-wrap justify-center gap-4">
                    <template x-for="(val, key) in pieData.crops" :key="key">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full" :style="'background-color: ' + getChartColor(key)"></div>
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider" x-text="key + ' ' + val + '%'"></span>
                        </div>
                    </template>
                </div>
            </div>

            <!-- PIE CHART 2 -->
            <div class="bg-white rounded-[40px] p-8 border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-full flex justify-between items-center mb-8">
                    <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400">Regional Supply</h4>
                    <span class="material-symbols-outlined text-slate-300">hub</span>
                </div>
                <div id="regionalSupplyChart" class="w-full"></div>
                <div class="mt-6 flex flex-wrap justify-center gap-4">
                    <template x-for="(val, key) in pieData.states" :key="key">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full" :style="'background-color: ' + getChartColor(key)"></div>
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-wider" x-text="key + ' ' + val + '%'"></span>
                        </div>
                    </template>
                </div>
            </div>

            <!-- REGIONAL ANALYSIS CARD -->
            <div class="bg-white rounded-[40px] p-8 border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="flex justify-between items-center mb-8">
                    <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400">State Demand Hub</h4>
                    <div class="flex gap-1">
                        <div class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></div>
                        <div class="w-1.5 h-1.5 bg-primary/40 rounded-full animate-pulse delay-75"></div>
                        <div class="w-1.5 h-1.5 bg-primary/20 rounded-full animate-pulse delay-150"></div>
                    </div>
                </div>
                
                <div class="space-y-5">
                    <template x-for="state in states" :key="state.name">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-primary/20 transition-all cursor-default">
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center font-black text-slate-400 text-[10px]" x-text="state.code"></div>
                                <div>
                                    <p class="font-bold text-[13px] text-slate-900" x-text="state.name"></p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider" x-text="state.trend"></p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-mono font-black text-[13px] text-primary" x-text="'₹' + formatNumber(state.price)"></p>
                                <div class="h-1 w-16 bg-slate-200 rounded-full mt-1 overflow-hidden">
                                    <div class="h-full bg-primary transition-all duration-1000" :style="'width: ' + state.demand + '%'"></div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- THIRD ROW: SUMMARY STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-[32px] border border-slate-200 shadow-sm hover:shadow-xl transition-all group overflow-hidden relative">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-primary/5 rounded-full group-hover:scale-150 transition-transform"></div>
                <div class="w-12 h-12 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">analytics</span>
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Total Trade Volume</p>
                <div class="flex items-end gap-2">
                    <h4 class="text-3xl font-black text-slate-900" x-text="stats.volume + 'M'"></h4>
                    <span class="text-emerald-500 font-bold text-sm mb-1">+12% ↑</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-[32px] border border-slate-200 shadow-sm hover:shadow-xl transition-all group overflow-hidden relative">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-secondary/5 rounded-full group-hover:scale-150 transition-transform"></div>
                <div class="w-12 h-12 bg-secondary/10 text-secondary rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">speed</span>
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Settlement Speed</p>
                <div class="flex items-end gap-2">
                    <h4 class="text-3xl font-black text-slate-900" x-text="stats.speed + ' Days'"></h4>
                    <span class="text-emerald-500 font-bold text-sm mb-1">-2.4h ↓</span>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[32px] border border-slate-200 shadow-sm hover:shadow-xl transition-all group overflow-hidden relative">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-amber-500/5 rounded-full group-hover:scale-150 transition-transform"></div>
                <div class="w-12 h-12 bg-amber-500/10 text-amber-600 rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">account_balance_wallet</span>
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Direct Farmer Payouts</p>
                <div class="flex items-end gap-2">
                    <h4 class="text-3xl font-black text-slate-900" x-text="'₹' + stats.payouts + ' Cr'"></h4>
                    <span class="text-emerald-500 font-bold text-sm mb-1">+₹2.4 Cr ↑</span>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[32px] border border-slate-200 shadow-sm hover:shadow-xl transition-all group overflow-hidden relative">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-slate-900/5 rounded-full group-hover:scale-150 transition-transform"></div>
                <div class="w-12 h-12 bg-slate-900/10 text-slate-900 rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined">public</span>
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Export Potential</p>
                <div class="flex items-end gap-2">
                    <h4 class="text-3xl font-black text-slate-900" x-text="stats.exports + '%'"></h4>
                    <span class="text-slate-400 font-bold text-xs mb-1">Global High</span>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ApexCharts CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
function liveMarketData() {
    return {
        crops: {
            'Wheat': { price: 2450, change: 2.4, trend: 'up', range: [2100, 2800] },
            'Rice': { price: 3100, change: -1.1, trend: 'down', range: [2800, 3500] },
            'Maize': { price: 1950, change: 0.8, trend: 'up', range: [1800, 2200] },
            'Cotton': { price: 7200, change: 3.2, trend: 'up', range: [6500, 8000] },
            'Soybean': { price: 4800, change: -0.5, trend: 'down', range: [4200, 5500] },
            'Onion': { price: 1820, change: -2.4, trend: 'down', range: [1200, 3500] },
            'Potato': { price: 1450, change: 1.5, trend: 'up', range: [1000, 2000] },
            'Mustard': { price: 5600, change: 0.2, trend: 'up', range: [5000, 6500] },
            'Turmeric': { price: 8500, change: 4.8, trend: 'up', range: [7000, 12000] },
            'Bajra': { price: 2100, change: -0.3, trend: 'down', range: [1900, 2400] },
            'Sugarcane': { price: 310, change: 0.0, trend: 'flat', range: [280, 350] },
            'Pulses': { price: 6800, change: 1.2, trend: 'up', range: [6000, 8500] }
        },
        lastUpdate: '',
        activeChartCrop: 'Wheat',
        chartType: 'line',
        mainChart: null,
        cropDistChart: null,
        regionalChart: null,
        pieData: {
            crops: { Wheat: 45, Rice: 35, Cotton: 12, Others: 8 },
            states: { Punjab: 32, Haryana: 28, UP: 25, Others: 15 }
        },
        marketMovers: [
            { name: 'Turmeric', location: 'Nizamabad', price: 8500, change: 4.8, type: 'gain' },
            { name: 'Cotton', location: 'Rajkot', price: 7200, change: 3.2, type: 'gain' },
            { name: 'Onion', location: 'Lasalgaon', price: 1820, change: -2.4, type: 'loss' },
            { name: 'Soybean', location: 'Indore', price: 4800, change: -0.5, type: 'loss' }
        ],
        states: [
            { name: 'Punjab', code: 'PB', price: 2480, trend: 'Market Leader', demand: 92 },
            { name: 'Haryana', code: 'HR', price: 2465, trend: 'High Supply', demand: 85 },
            { name: 'Maharashtra', code: 'MH', price: 1850, trend: 'Onion Hub', demand: 78 },
            { name: 'Madhya Pradesh', code: 'MP', price: 2420, trend: 'Soybean Rising', demand: 65 },
            { name: 'Uttar Pradesh', code: 'UP', price: 2380, trend: 'Wheat Surplus', demand: 72 }
        ],
        stats: {
            volume: 1.2,
            speed: 4.2,
            payouts: 450,
            exports: 85
        },

        init() {
            this.updateTimestamp();
            this.initCharts();
            
            // Live Price Engine
            setInterval(() => {
                this.fluctuatePrices();
                this.updateTimestamp();
                this.updateCharts();
            }, 3000);

            // Regional Data Simulation
            setInterval(() => {
                this.stats.volume = +(this.stats.volume + 0.01).toFixed(2);
                this.stats.payouts = +(this.stats.payouts + 0.5).toFixed(1);
            }, 5000);

            // Watch chart type and crop
            this.$watch('chartType', () => this.updateChartOptions());
            this.$watch('activeChartCrop', () => this.updateCharts());
        },

        fluctuatePrices() {
            for (let crop in this.crops) {
                let change = (Math.random() * 200 - 100);
                let newPrice = this.crops[crop].price + change;
                
                // Keep within range
                if (newPrice < this.crops[crop].range[0]) newPrice = this.crops[crop].range[0] + 50;
                if (newPrice > this.crops[crop].range[1]) newPrice = this.crops[crop].range[1] - 50;
                
                this.crops[crop].price = Math.round(newPrice);
                this.crops[crop].change = +(change / this.crops[crop].price * 100).toFixed(1);
                this.crops[crop].trend = change > 0 ? 'up' : 'down';
            }

            // Update market movers
            this.marketMovers.forEach(mover => {
                if (this.crops[mover.name]) {
                    mover.price = this.crops[mover.name].price;
                    mover.change = this.crops[mover.name].change;
                    mover.type = mover.change > 0 ? 'gain' : 'loss';
                }
            });
        },

        updateTimestamp() {
            const now = new Date();
            this.lastUpdate = now.toLocaleTimeString();
        },

        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        getChartColor(key) {
            const colors = {
                'Wheat': '#10b981', 'Rice': '#3b82f6', 'Cotton': '#6366f1', 'Others': '#94a3b8',
                'Punjab': '#10b981', 'Haryana': '#f59e0b', 'UP': '#3b82f6'
            };
            return colors[key] || '#10b981';
        },

        initCharts() {
            // Main Line Chart
            const mainOptions = {
                series: [{
                    name: 'Avg Price',
                    data: this.generateRandomChartData()
                }],
                chart: {
                    type: 'line',
                    height: 400,
                    toolbar: { show: false },
                    animations: { enabled: true, easing: 'easeinout', speed: 800 },
                    sparkline: { enabled: false },
                    fontFamily: 'Inter, sans-serif'
                },
                stroke: { curve: 'smooth', width: 4, colors: ['#10b981'] },
                fill: {
                    type: 'gradient',
                    gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.1, stops: [0, 90, 100] }
                },
                grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
                xaxis: {
                    categories: ['08:00', '10:00', '12:00', '14:00', '16:00', '18:00', 'Live'],
                    labels: { style: { colors: '#94a3b8', fontWeight: 600 } }
                },
                yaxis: { labels: { style: { colors: '#94a3b8', fontWeight: 600 } } },
                tooltip: { theme: 'dark', x: { show: true }, marker: { show: false } }
            };
            this.mainChart = new ApexCharts(document.querySelector("#mainPulseChart"), mainOptions);
            this.mainChart.render();

            // Crop Pie
            const pieOptions = {
                series: [45, 35, 12, 8],
                chart: { type: 'donut', height: 280, animations: { speed: 1000 } },
                labels: ['Wheat', 'Rice', 'Cotton', 'Others'],
                colors: ['#10b981', '#3b82f6', '#6366f1', '#f1f5f9'],
                legend: { show: false },
                plotOptions: { pie: { donut: { size: '75%', labels: { show: false } } } },
                stroke: { width: 0 },
                dataLabels: { enabled: false }
            };
            this.cropDistChart = new ApexCharts(document.querySelector("#cropDistributionChart"), pieOptions);
            this.cropDistChart.render();

            // Regional Pie
            const regionalOptions = {
                series: [32, 28, 25, 15],
                chart: { type: 'donut', height: 280, animations: { speed: 1000 } },
                labels: ['Punjab', 'Haryana', 'UP', 'Others'],
                colors: ['#10b981', '#f59e0b', '#3b82f6', '#f1f5f9'],
                legend: { show: false },
                plotOptions: { pie: { donut: { size: '75%', labels: { show: false } } } },
                stroke: { width: 0 },
                dataLabels: { enabled: false }
            };
            this.regionalChart = new ApexCharts(document.querySelector("#regionalSupplyChart"), regionalOptions);
            this.regionalChart.render();
        },

        generateRandomChartData() {
            const data = [];
            for(let i=0; i<7; i++) data.push(Math.floor(Math.random() * 500) + 2000);
            return data;
        },

        updateCharts() {
            if (this.mainChart) {
                const newData = this.generateRandomChartData();
                newData[6] = this.crops[this.activeChartCrop].price;
                this.mainChart.updateSeries([{ data: newData }]);
            }
        },

        updateChartOptions() {
            if (this.mainChart) {
                this.mainChart.updateOptions({
                    chart: { type: this.chartType },
                    stroke: { curve: this.chartType === 'line' ? 'smooth' : 'straight' }
                });
            }
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
[x-cloak] { display: none !important; }

/* Custom Scrollbar for sidebars/main */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
@endsection
