@extends('layouts.stitch')

@section('title', 'Crop Intelligence Directory - AgriMandi')

@section('content')
<div class="min-h-screen bg-[#fcfcfc]" x-data="cropIntelligenceEngine()">
    <!-- Top Price Ticker (Standardized) -->
    <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-50 shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-primary flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[11px] uppercase tracking-tighter">Mandi Live Hub</span>
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
            <a href="{{ route('home') }}" class="font-headline-md text-primary font-black tracking-tight text-[20px] whitespace-nowrap">AgriMandi <span class="text-slate-900">Intelligence</span></a>
            <div class="hidden md:flex items-center gap-8">
                <a class="font-label-md text-[13px] text-slate-500 hover:text-primary transition-colors" href="{{ route('marketplace') }}">Marketplace</a>
                <a class="font-label-md text-[13px] text-primary font-bold border-b-2 border-primary pb-0.5" href="{{ route('categories') }}">Crop Directory</a>
                <a class="font-label-md text-[13px] text-slate-500 hover:text-primary transition-colors" href="{{ route('gov.index') }}">Gov Portal</a>
                <a class="font-label-md text-[13px] text-slate-500 hover:text-primary transition-colors" href="{{ route('analytics') }}">Live Analytics</a>
            </div>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="group relative hidden lg:flex items-center bg-slate-100 border border-slate-200 rounded-full px-4 py-2 w-72 focus-within:ring-2 ring-primary/20 transition-all">
                <span class="material-symbols-outlined text-slate-400 mr-2 text-[18px]">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-[13px] w-full" placeholder="Search crops or categories..." type="text" x-model="searchQuery"/>
            </div>
            @include('components.nav-user-actions')
        </div>
    </nav>

    <main class="max-w-[1600px] mx-auto px-margin-desktop py-12">
        <!-- Dashboard Hero Header -->
        <div class="relative overflow-hidden rounded-[48px] bg-slate-900 mb-16 p-12 md:p-20">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?q=80&w=2500&auto=format&fit=crop" 
                     class="w-full h-full object-cover opacity-30 grayscale transition-opacity">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
            </div>

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-end gap-10">
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="px-3 py-1 bg-primary/20 text-primary border border-primary/30 rounded-full text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full animate-ping"></span>
                            Crop Database Live
                        </div>
                        <span class="text-white/40 text-[11px] font-bold uppercase tracking-widest" x-text="currentTimestamp"></span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight">Indian Crop <br/> <span class="text-primary italic">Intelligence</span> Hub</h1>
                    <p class="text-white/60 font-medium max-w-xl text-lg">A smart directory covering India's vast agro-diversity with real-time seasonal trends and regional insights.</p>
                </div>
                
                <div class="flex bg-white/5 backdrop-blur-xl p-2 rounded-[28px] border border-white/10 shadow-2xl">
                    <button @click="activeSeason = 'All'" :class="activeSeason === 'All' ? 'bg-primary text-white' : 'text-white/60 hover:bg-white/10'" class="px-8 py-3 rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all">All Seasons</button>
                    <button @click="activeSeason = 'Kharif'" :class="activeSeason === 'Kharif' ? 'bg-amber-500 text-white' : 'text-white/60 hover:bg-white/10'" class="px-8 py-3 rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all">Kharif</button>
                    <button @click="activeSeason = 'Rabi'" :class="activeSeason === 'Rabi' ? 'bg-indigo-500 text-white' : 'text-white/60 hover:bg-white/10'" class="px-8 py-3 rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all">Rabi</button>
                    <button @click="activeSeason = 'Zaid'" :class="activeSeason === 'Zaid' ? 'bg-emerald-500 text-white' : 'text-white/60 hover:bg-white/10'" class="px-8 py-3 rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all">Zaid</button>
                </div>
            </div>
        </div>

        <!-- Intelligence Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <template x-for="stat in intelStats" :key="stat.label">
                <div class="bg-white p-6 rounded-[32px] border border-slate-200 shadow-sm hover:shadow-xl transition-all group overflow-hidden relative">
                    <!-- High-Fidelity Commodity Background -->
                    <div class="absolute -right-4 -bottom-4 w-32 h-32 opacity-[0.08] group-hover:opacity-[0.15] group-hover:scale-125 transition-all duration-700 grayscale group-hover:grayscale-0">
                        <img :src="stat.bgImage" class="w-full h-full object-cover rounded-full">
                    </div>
                    
                    <div class="flex items-start justify-between mb-4 relative z-10">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center" :class="stat.color">
                            <span class="material-symbols-outlined" x-text="stat.icon"></span>
                        </div>
                        <div class="flex items-center gap-1.5 text-emerald-500 font-black text-[10px]">
                            <span class="material-symbols-outlined text-[16px]">trending_up</span>
                            <span>LIVE</span>
                        </div>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2" x-text="stat.label"></p>
                        <div class="flex items-end gap-2">
                            <h4 class="text-3xl font-black text-slate-900" x-text="stat.value"></h4>
                            <span class="text-slate-400 font-bold text-xs mb-1" x-text="stat.sub"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- CATEGORY DISCOVERY GRID -->
        <h2 class="text-[11px] font-black uppercase tracking-[0.3em] text-slate-400 mb-8 ml-4">Explore Market Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-6 mb-24">
            <template x-for="cat in filteredCategories" :key="cat.id">
                <button @click="activeCategory = cat.title" 
                        class="flex flex-col items-center gap-4 p-6 bg-white rounded-[32px] border border-slate-200 shadow-sm hover:shadow-2xl hover:border-primary/30 hover:-translate-y-2 transition-all group relative overflow-hidden"
                        :class="activeCategory === cat.title ? 'ring-2 ring-primary bg-primary/5' : ''">
                    <!-- Category Image Background -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-[0.03] transition-opacity">
                        <img :src="cat.bgImage" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="w-16 h-16 rounded-[24px] flex items-center justify-center transition-all group-hover:rotate-12 relative z-10"
                         :class="activeCategory === cat.title ? 'bg-primary text-white' : 'bg-slate-50 text-slate-400 group-hover:bg-primary/10 group-hover:text-primary'">
                        <span class="material-symbols-outlined text-3xl" x-text="cat.icon"></span>
                    </div>
                    <div class="text-center relative z-10">
                        <p class="font-black text-slate-900 text-[13px] leading-tight mb-1" x-text="cat.title"></p>
                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest" x-text="cat.crops.length + ' Varieties'"></p>
                    </div>
                    <div x-show="cat.isHighDemand" class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full animate-ping z-20"></div>
                </button>
            </template>
        </div>

        <!-- DYNAMIC CROP DIRECTORY -->
        <div class="flex items-center justify-between mb-8 px-4">
            <div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight" x-text="activeCategory + ' Intelligence' font-black"></h2>
                <p class="text-slate-400 font-medium text-sm" x-text="'Showing real-time data for ' + filteredCrops.length + ' specialized Indian crops'"></p>
            </div>
            <div class="flex gap-2">
                <div class="bg-slate-100 p-1.5 rounded-2xl flex border border-slate-200">
                    <button class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest bg-white text-slate-900 shadow-sm">Grid View</button>
                    <button class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-900">Market List</button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            <template x-for="crop in filteredCrops" :key="crop.name">
                <div @click="selectedCrop = crop" 
                     class="group bg-white rounded-[40px] border border-slate-200 shadow-sm overflow-hidden hover:shadow-2xl hover:border-primary/30 transition-all duration-500 cursor-pointer relative">
                    <!-- Glassmorphism Overlay -->
                    <div class="relative h-64 overflow-hidden">
                        <img :src="crop.image" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <div class="absolute top-6 left-6 flex flex-col gap-2">
                            <div class="bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full shadow-xl">
                                <span class="text-[9px] font-black uppercase tracking-widest text-slate-900" x-text="crop.season"></span>
                            </div>
                        </div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <p class="text-[9px] font-black uppercase tracking-[0.2em] text-white/60 mb-1" x-text="crop.category"></p>
                            <h3 class="text-2xl font-black tracking-tight" x-text="crop.name"></h3>
                        </div>
                        <div class="absolute bottom-6 right-6">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-900 shadow-2xl transition-transform group-hover:rotate-[360deg] duration-700">
                                <span class="material-symbols-outlined text-[20px]">insights</span>
                            </div>
                        </div>
                    </div>

                    <!-- Market Insights Section -->
                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Avg Price /Q</p>
                                <p class="font-black text-slate-900 text-lg font-mono" x-text="'₹' + formatNumber(crop.price)"></p>
                            </div>
                            <div class="space-y-1 text-right">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Live Trend</p>
                                <div class="flex items-center justify-end gap-1.5" :class="crop.change > 0 ? 'text-emerald-500' : 'text-rose-500'">
                                    <span class="material-symbols-outlined text-[18px]" x-text="crop.change > 0 ? 'trending_up' : 'trending_down'"></span>
                                    <span class="font-black text-sm" x-text="(crop.change > 0 ? '+' : '') + crop.change.toFixed(1) + '%'"></span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                    <span class="material-symbols-outlined text-[16px]">location_on</span>
                                </div>
                                <div>
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Top State</p>
                                    <p class="font-bold text-[13px] text-slate-900" x-text="crop.topState"></p>
                                </div>
                            </div>
                            <div class="h-1 w-16 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-primary transition-all duration-1000" :style="'width: ' + crop.demand + '%'"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </main>

    <!-- CROP INTELLIGENCE MODAL -->
    <div x-show="selectedCrop" 
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8"
         x-cloak>
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-xl" @click="selectedCrop = null" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"></div>
        
        <!-- Modal Container -->
        <div class="bg-white w-full max-w-6xl h-full max-h-[850px] rounded-[40px] shadow-[0_50px_120px_-20px_rgba(0,0,0,0.5)] overflow-hidden relative z-10 flex flex-col md:flex-row border border-white/20"
             x-show="selectedCrop"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-20 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100">
            
            <!-- Close Button (Global) -->
            <button @click="selectedCrop = null" class="absolute top-8 right-8 w-12 h-12 bg-slate-900/10 hover:bg-slate-900/20 text-slate-900 rounded-2xl flex items-center justify-center transition-all z-[110] group">
                <span class="material-symbols-outlined transition-transform group-hover:rotate-90">close</span>
            </button>

            <!-- LEFT PANEL: HERO & BRANDING -->
            <div class="md:w-[42%] relative h-[300px] md:h-full overflow-hidden group">
                <img :src="selectedCrop?.image" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950/40 via-transparent to-transparent"></div>
                
                <div class="absolute bottom-12 left-12 right-12 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="px-4 py-1.5 bg-primary/20 backdrop-blur-md border border-primary/30 rounded-full">
                            <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em]" x-text="selectedCrop?.category"></span>
                        </div>
                        <template x-if="selectedCrop?.demand > 85">
                            <div class="px-4 py-1.5 bg-emerald-500/20 backdrop-blur-md border border-emerald-500/30 rounded-full flex items-center gap-2">
                                <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></div>
                                <span class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em]">High Demand</span>
                            </div>
                        </template>
                    </div>
                    <div>
                        <h2 class="text-7xl font-black text-white tracking-tighter leading-tight" x-text="selectedCrop?.name"></h2>
                        <div class="flex items-center gap-6 mt-4 text-white/60">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                                <span class="text-xs font-bold uppercase tracking-widest" x-text="selectedCrop?.season + ' Cycle'"></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">location_on</span>
                                <span class="text-xs font-bold uppercase tracking-widest" x-text="selectedCrop?.topState"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: ANALYTICS & INSIGHTS -->
            <div class="flex-1 p-8 md:p-14 overflow-y-auto custom-scrollbar bg-slate-50/50">
                <div class="max-w-3xl mx-auto space-y-12">
                    <!-- Top Metrics Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="p-8 bg-white rounded-[32px] shadow-sm border border-slate-100 flex flex-col h-[200px]">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Historical Performance</p>
                                <span class="text-xs font-black text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-lg">+14.2%</span>
                            </div>
                            <h4 class="text-2xl font-black text-slate-900 leading-none">Stable Growth</h4>
                            <div class="flex-1 min-h-0 mt-4 relative">
                                <div id="modalMiniChart" class="absolute inset-0"></div>
                            </div>
                        </div>
                        <div class="p-8 bg-white rounded-[32px] shadow-sm border border-slate-100 h-[200px] flex flex-col">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Regional Dominance</p>
                                <span class="material-symbols-outlined text-primary">hub</span>
                            </div>
                            <h4 class="text-2xl font-black text-slate-900 leading-none" x-text="selectedCrop?.topState"></h4>
                            <p class="text-slate-500 font-medium text-sm mt-4 leading-relaxed">Top producing region responsible for <span class="text-slate-900 font-bold" x-text="selectedCrop?.demand + '%'"></span> of total domestic output this quarter.</p>
                        </div>
                    </div>

                    <!-- Intelligence Briefing -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-black text-slate-900 flex items-center gap-3">
                                <span class="w-8 h-1 bg-primary rounded-full"></span>
                                Intelligence Briefing
                            </h3>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest" x-text="'Updated: ' + currentTimestamp"></span>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="p-6 bg-white rounded-3xl border border-slate-100 space-y-2 group hover:border-primary/20 transition-colors">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Optimal Season</p>
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-primary text-[20px]">sunny</span>
                                    <p class="font-black text-slate-900" x-text="selectedCrop?.season"></p>
                                </div>
                            </div>
                            <div class="p-6 bg-white rounded-3xl border border-slate-100 space-y-2 group hover:border-primary/20 transition-colors">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Market Demand</p>
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-emerald-500 text-[20px]">bolt</span>
                                    <p class="font-black text-emerald-500" x-text="selectedCrop?.demand + '% High'"></p>
                                </div>
                            </div>
                            <div class="p-6 bg-white rounded-3xl border border-slate-100 space-y-2 group hover:border-primary/20 transition-colors col-span-2 md:col-span-1">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Export Trend</p>
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-amber-500 text-[20px]">trending_up</span>
                                    <p class="font-black text-slate-900">Rising (+12%)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Live Trade Activity Panel -->
                    <div class="p-8 bg-slate-900 rounded-[40px] shadow-2xl shadow-slate-900/20 text-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 blur-[100px] rounded-full -translate-y-1/2 translate-x-1/2"></div>
                        
                        <div class="flex items-center justify-between mb-8 relative z-10">
                            <div class="space-y-1">
                                <h4 class="text-sm font-black uppercase tracking-[0.2em] text-white/50">Live Trade Activity</h4>
                                <p class="text-xs text-white/30 font-bold">Real-time Mandi Synchronization</p>
                            </div>
                            <div class="flex items-center gap-3 px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl">
                                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse shadow-[0_0_10px_#34d399]"></div>
                                <span class="text-[10px] font-black text-emerald-400 tracking-widest">NETWORK ACTIVE</span>
                            </div>
                        </div>

                        <div class="space-y-3 relative z-10">
                            <div class="flex items-center justify-between p-5 bg-white/5 rounded-3xl border border-white/5 hover:bg-white/10 transition-all cursor-default group/row">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white/40">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-white/90">Khanna Mandi, PB</p>
                                        <p class="text-[10px] font-bold text-white/30">Last Trade: 2m ago</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-mono font-black text-primary text-lg" x-text="'₹' + formatNumber(selectedCrop?.price + 130) + '/Q'"></p>
                                    <p class="text-[10px] font-black text-emerald-400">+1.2%</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-5 bg-white/5 rounded-3xl border border-white/5 hover:bg-white/10 transition-all cursor-default group/row">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white/40">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-white/90">Indore Mandi, MP</p>
                                        <p class="text-[10px] font-bold text-white/30">Last Trade: 5m ago</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-mono font-black text-primary text-lg" x-text="'₹' + formatNumber(selectedCrop?.price + 95) + '/Q'"></p>
                                    <p class="text-[10px] font-black text-rose-400">-0.4%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4 pb-8">
                        <a :href="'/marketplace?search=' + selectedCrop?.name" 
                           class="flex-1 py-6 bg-primary text-white rounded-3xl text-[12px] font-black uppercase tracking-[0.2em] shadow-[0_20px_50px_rgba(16,185,129,0.3)] text-center hover:translate-y-[-4px] hover:shadow-[0_25px_60px_rgba(16,185,129,0.4)] transition-all flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined">shopping_cart</span>
                            Go to Marketplace
                        </a>
                        <button class="flex-1 py-6 bg-white text-slate-900 border border-slate-200 rounded-3xl text-[12px] font-black uppercase tracking-[0.2em] hover:bg-slate-50 transition-all flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
                            Analytics PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
function cropIntelligenceEngine() {
    return {
        currentTimestamp: '',
        activeSeason: 'All',
        activeCategory: 'Cereals',
        searchQuery: '',
        selectedCrop: null,
        tickerItems: [
            { name: 'Wheat', price: 2450, change: 2.4 },
            { name: 'Rice', price: 3120, change: -1.1 },
            { name: 'Cotton', price: 7250, change: 3.2 },
            { name: 'Onion', price: 1820, change: -2.4 },
            { name: 'Mustard', price: 5640, change: 0.8 },
            { name: 'Soybean', price: 4780, change: -0.2 }
        ],
        intelStats: [
            { label: 'Most Traded', value: 'Wheat', sub: 'Punjab Hub', icon: 'trending_up', color: 'bg-primary/10 text-primary', bgImage: 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&w=400&auto=format&fit=crop' },
            { label: 'Highest Growth', value: 'Turmeric', sub: '+18.4% MoM', icon: 'equalizer', color: 'bg-emerald-100 text-emerald-600', bgImage: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=400&auto=format&fit=crop' },
            { label: 'Export Leader', value: 'Cotton', sub: 'Gujarat Port', icon: 'public', color: 'bg-indigo-100 text-indigo-600', bgImage: 'https://images.unsplash.com/photo-1594904351111-a072f80b1a71?q=80&w=400&auto=format&fit=crop' },
            { label: 'Market Demand', value: '92%', sub: 'Active Traders', icon: 'hub', color: 'bg-amber-100 text-amber-600', bgImage: 'https://images.unsplash.com/photo-1611095773164-1234907a216c?q=80&w=400&auto=format&fit=crop' }
        ],
        categories: [
            { id: 'cereals', title: 'Cereals', icon: 'agriculture', crops: ['Wheat', 'Rice', 'Maize', 'Bajra', 'Barley'], isHighDemand: true, bgImage: 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&w=400&auto=format&fit=crop' },
            { id: 'pulses', title: 'Pulses', icon: 'eco', crops: ['Gram', 'Arhar', 'Moong', 'Urad', 'Lentil'], isHighDemand: false, bgImage: 'https://images.unsplash.com/photo-1585435421671-0c167676390e?q=80&w=400&auto=format&fit=crop' },
            { id: 'oilseeds', title: 'Oilseeds', icon: 'opacity', crops: ['Soybean', 'Mustard', 'Groundnut', 'Sunflower', 'Sesame'], isHighDemand: true, bgImage: 'https://images.unsplash.com/photo-1596733430284-f7437764b1a9?q=80&w=400&auto=format&fit=crop' },
            { id: 'cash-crops', title: 'Cash Crops', icon: 'payments', crops: ['Sugarcane', 'Cotton', 'Jute', 'Tobacco', 'Tea'], isHighDemand: true, bgImage: 'https://images.unsplash.com/photo-1594904351111-a072f80b1a71?q=80&w=400&auto=format&fit=crop' },
            { id: 'spices', title: 'Spices', icon: 'potted_plant', crops: ['Chilli', 'Turmeric', 'Cumin', 'Coriander', 'Black Pepper'], isHighDemand: true, bgImage: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=400&auto=format&fit=crop' },
            { id: 'fruits', title: 'Fruits', icon: 'nutrition', crops: ['Mango', 'Banana', 'Apple', 'Grapes', 'Orange'], isHighDemand: false, bgImage: 'https://images.unsplash.com/photo-1610832958506-aa56368176cf?q=80&w=400&auto=format&fit=crop' },
            { id: 'vegetables', title: 'Vegetables', icon: 'compost', crops: ['Onion', 'Potato', 'Tomato', 'Brinjal', 'Cabbage'], isHighDemand: true, bgImage: 'https://images.unsplash.com/photo-1566385101042-1a000c1267c4?q=80&w=400&auto=format&fit=crop' },
            { id: 'plantation', title: 'Plantation', icon: 'forest', crops: ['Coffee', 'Rubber', 'Coconut', 'Arecanut', 'Cashew'], isHighDemand: false, bgImage: 'https://images.unsplash.com/photo-1528183429752-a97d0bf99b5a?q=80&w=400&auto=format&fit=crop' }
        ],
        allCrops: [
            // Cereals
            { name: 'Wheat', category: 'Cereals', season: 'Rabi', price: 2450, change: 2.4, topState: 'Punjab', demand: 92, image: 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&w=800&auto=format&fit=crop' },
            { name: 'Rice (Basmati)', category: 'Cereals', season: 'Kharif', price: 3120, change: -1.1, topState: 'Haryana', demand: 88, image: 'https://images.unsplash.com/photo-1586201375761-83865001e31c?q=80&w=800&auto=format&fit=crop' },
            { name: 'Maize', category: 'Cereals', season: 'Kharif', price: 1980, change: 1.2, topState: 'Karnataka', demand: 75, image: 'https://images.unsplash.com/photo-1551735041-3d7796328328?q=80&w=800&auto=format&fit=crop' },
            { name: 'Bajra (Pearl Millet)', category: 'Cereals', season: 'Kharif', price: 2150, change: 0.5, topState: 'Rajasthan', demand: 64, image: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=800&auto=format&fit=crop' },
            { name: 'Barley', category: 'Cereals', season: 'Rabi', price: 2050, change: -0.4, topState: 'UP', demand: 58, image: 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&w=800&auto=format&fit=crop' },
            { name: 'Jowar (Sorghum)', category: 'Cereals', season: 'Kharif', price: 2850, change: 1.8, topState: 'Maharashtra', demand: 70, image: 'https://images.unsplash.com/photo-1586201375761-83865001e31c?q=80&w=800&auto=format&fit=crop' },
            
            // Pulses
            { name: 'Gram (Chana)', category: 'Pulses', season: 'Rabi', price: 5400, change: 2.1, topState: 'MP', demand: 82, image: 'https://images.unsplash.com/photo-1515543904379-3d757afe72e2?q=80&w=800&auto=format&fit=crop' },
            { name: 'Arhar (Tur)', category: 'Pulses', season: 'Kharif', price: 7200, change: -0.8, topState: 'Maharashtra', demand: 89, image: 'https://images.unsplash.com/photo-1515543904379-3d757afe72e2?q=80&w=800&auto=format&fit=crop' },
            { name: 'Moong Dal', category: 'Pulses', season: 'Zaid', price: 7500, change: 1.4, topState: 'Rajasthan', demand: 76, image: 'https://images.unsplash.com/photo-1515543904379-3d757afe72e2?q=80&w=800&auto=format&fit=crop' },
            { name: 'Urad Dal', category: 'Pulses', season: 'Kharif', price: 6800, change: -0.3, topState: 'MP', demand: 72, image: 'https://images.unsplash.com/photo-1515543904379-3d757afe72e2?q=80&w=800&auto=format&fit=crop' },
            
            // Oilseeds
            { name: 'Soybean', category: 'Oilseeds', season: 'Kharif', price: 4780, change: -0.2, topState: 'MP', demand: 68, image: 'https://images.unsplash.com/photo-1596733430284-f7437764b1a9?q=80&w=800&auto=format&fit=crop' },
            { name: 'Mustard', category: 'Oilseeds', season: 'Rabi', price: 5640, change: 0.8, topState: 'Rajasthan', demand: 81, image: 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?q=80&w=800&auto=format&fit=crop' },
            { name: 'Groundnut', category: 'Oilseeds', season: 'Kharif', price: 6200, change: 1.5, topState: 'Gujarat', demand: 79, image: 'https://images.unsplash.com/photo-1596733430284-f7437764b1a9?q=80&w=800&auto=format&fit=crop' },
            { name: 'Sunflower', category: 'Oilseeds', season: 'All', price: 5900, change: -0.5, topState: 'Karnataka', demand: 60, image: 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?q=80&w=800&auto=format&fit=crop' },
            
            // Cash Crops
            { name: 'Cotton (Long Staple)', category: 'Cash Crops', season: 'Kharif', price: 7250, change: 3.2, topState: 'Gujarat', demand: 84, image: 'https://images.unsplash.com/photo-1594904351111-a072f80b1a71?q=80&w=800&auto=format&fit=crop' },
            { name: 'Sugarcane', category: 'Cash Crops', season: 'Zaid', price: 310, change: 0.1, topState: 'UP', demand: 90, image: 'https://images.unsplash.com/photo-1594904351111-a072f80b1a71?q=80&w=800&auto=format&fit=crop' },
            { name: 'Jute', category: 'Cash Crops', season: 'Kharif', price: 4500, change: 2.2, topState: 'West Bengal', demand: 74, image: 'https://images.unsplash.com/photo-1594904351111-a072f80b1a71?q=80&w=800&auto=format&fit=crop' },
            
            // Spices
            { name: 'Turmeric', category: 'Spices', season: 'Kharif', price: 8650, change: 4.8, topState: 'Telangana', demand: 94, image: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=800&auto=format&fit=crop' },
            { name: 'Dry Chilli', category: 'Spices', season: 'Kharif', price: 18500, change: 5.4, topState: 'Andhra Pradesh', demand: 96, image: 'https://images.unsplash.com/photo-1588253518679-1293e3f42b39?q=80&w=800&auto=format&fit=crop' },
            { name: 'Cumin (Jeera)', category: 'Spices', season: 'Rabi', price: 28000, change: -1.2, topState: 'Gujarat', demand: 88, image: 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=800&auto=format&fit=crop' },
            { name: 'Black Pepper', category: 'Spices', season: 'Plantation', price: 48000, change: 0.8, topState: 'Kerala', demand: 91, image: 'https://images.unsplash.com/photo-1588253518679-1293e3f42b39?q=80&w=800&auto=format&fit=crop' },
            
            // Vegetables
            { name: 'Onion (Red)', category: 'Vegetables', season: 'All', price: 1820, change: -2.4, topState: 'Maharashtra', demand: 76, image: 'https://images.unsplash.com/photo-1580196782187-64ec469600e1?q=80&w=800&auto=format&fit=crop' },
            { name: 'Potato', category: 'Vegetables', season: 'Rabi', price: 1450, change: 1.5, topState: 'UP', demand: 82, image: 'https://images.unsplash.com/photo-1518977676601-b53f02ac6d31?q=80&w=800&auto=format&fit=crop' },
            { name: 'Tomato', category: 'Vegetables', season: 'All', price: 2200, change: 8.4, topState: 'Andhra Pradesh', demand: 98, image: 'https://images.unsplash.com/photo-1566385101042-1a000c1267c4?q=80&w=800&auto=format&fit=crop' },
            { name: 'Green Pea', category: 'Vegetables', season: 'Rabi', price: 4500, change: 2.1, topState: 'Punjab', demand: 70, image: 'https://images.unsplash.com/photo-1518977676601-b53f02ac6d31?q=80&w=800&auto=format&fit=crop' },
            
            // Fruits
            { name: 'Mango (Alphonso)', category: 'Fruits', season: 'Zaid', price: 12000, change: 3.5, topState: 'Maharashtra', demand: 95, image: 'https://images.unsplash.com/photo-1610832958506-aa56368176cf?q=80&w=800&auto=format&fit=crop' },
            { name: 'Banana', category: 'Fruits', season: 'All', price: 1500, change: -0.5, topState: 'Tamil Nadu', demand: 84, image: 'https://images.unsplash.com/photo-1566385101042-1a000c1267c4?q=80&w=800&auto=format&fit=crop' },
            { name: 'Apple (Kashmiri)', category: 'Fruits', season: 'Rabi', price: 8500, change: 1.2, topState: 'J&K', demand: 90, image: 'https://images.unsplash.com/photo-1560806887-1e4cd0b6bcd6?q=80&w=800&auto=format&fit=crop' },
            { name: 'Grapes', category: 'Fruits', season: 'Rabi', price: 6500, change: 2.4, topState: 'Maharashtra', demand: 78, image: 'https://images.unsplash.com/photo-1610832958506-aa56368176cf?q=80&w=800&auto=format&fit=crop' },
            
            // Plantation
            { name: 'Tea', category: 'Plantation', season: 'All', price: 250, change: 0.5, topState: 'Assam', demand: 94, image: 'https://images.unsplash.com/photo-1528183429752-a97d0bf99b5a?q=80&w=800&auto=format&fit=crop' },
            { name: 'Coffee (Arabica)', category: 'Plantation', season: 'All', price: 450, change: 1.1, topState: 'Karnataka', demand: 88, image: 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=800&auto=format&fit=crop' },
            { name: 'Rubber', category: 'Plantation', season: 'All', price: 180, change: -0.4, topState: 'Kerala', demand: 72, image: 'https://images.unsplash.com/photo-1596733430284-f7437764b1a9?q=80&w=800&auto=format&fit=crop' },
            { name: 'Coconut', category: 'Plantation', season: 'All', price: 45, change: 0.2, topState: 'Kerala', demand: 86, image: 'https://images.unsplash.com/photo-1528183429752-a97d0bf99b5a?q=80&w=800&auto=format&fit=crop' }
        ],

        get filteredCategories() {
            if (this.activeSeason === 'All') return this.categories;
            return this.categories.filter(cat => {
                return this.allCrops.some(crop => crop.category === cat.title && (crop.season === this.activeSeason || crop.season === 'All'));
            });
        },

        get filteredCrops() {
            return this.allCrops.filter(crop => {
                const matchesCat = crop.category === this.activeCategory;
                const matchesSeason = this.activeSeason === 'All' || crop.season === this.activeSeason || crop.season === 'All';
                const matchesSearch = crop.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                return matchesCat && matchesSeason && matchesSearch;
            });
        },

        init() {
            this.updateTimestamp();
            setInterval(() => this.updateTimestamp(), 1000);
            
            // Intelligence Simulation
            setInterval(() => {
                this.fluctuatePrices();
            }, 3000);

            this.$watch('activeSeason', (val) => {
                // If activeCategory is not in filteredCategories, switch to the first one available
                const stillValid = this.filteredCategories.some(c => c.title === this.activeCategory);
                if (!stillValid && this.filteredCategories.length > 0) {
                    this.activeCategory = this.filteredCategories[0].title;
                }
            });

            this.$watch('selectedCrop', (val) => {
                if(val) setTimeout(() => this.initModalChart(), 100);
            });
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

            this.allCrops.forEach(crop => {
                if(Math.random() > 0.5) {
                    crop.price = Math.round(crop.price + (Math.random() * 10 - 5));
                    crop.change = +(Math.random() * 5 - 2.5).toFixed(1);
                }
            });
        },

        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        initModalChart() {
            const options = {
                series: [{ name: 'Price', data: [2100, 2250, 2400, 2350, 2500, 2450, 2600] }],
                chart: { type: 'area', height: '100%', sparkline: { enabled: true }, animations: { enabled: true } },
                stroke: { curve: 'smooth', width: 3, colors: ['#10b981'] },
                fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.3, opacityTo: 0 } },
                tooltip: { enabled: false }
            };
            if(document.querySelector("#modalMiniChart")) {
                const chartElement = document.querySelector("#modalMiniChart");
                chartElement.innerHTML = ''; // Clear previous chart
                new ApexCharts(chartElement, options).render();
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

::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

[x-cloak] { display: none !important; }

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
@endsection