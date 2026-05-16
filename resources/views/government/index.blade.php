@extends('layouts.stitch')

@section('title', 'Official Government Procurement & MSP Portal - AgriMandi')

@section('content')
<div x-data="procurementEngine()" class="min-h-screen bg-slate-50 font-sans selection:bg-emerald-500 selection:text-white">
    <!-- 🟢 TOP LIVE MSP TICKER -->
    <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-[70] shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-[#005137] flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[11px] uppercase tracking-tighter">Live MSP Index 2024-25</span>
        </div>
        
        <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[200px]">
            <template x-for="item in mspItems" :key="item.name">
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

    <!-- 🏛️ GOVERNMENT HEADER -->
    <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-[60] h-20 flex items-center transition-all">
        <div class="max-w-[1440px] mx-auto w-full px-4 sm:px-8 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-4 lg:gap-12">
                <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                    <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-10 w-auto object-contain transition-transform group-hover:scale-105">
                    <div class="flex flex-col">
                        <span class="text-lg md:text-xl font-black text-slate-900 tracking-tighter leading-none">AgriMandi <span class="text-[#005137]">Gov</span></span>
                        <span class="text-[8px] md:text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Official Procurement Portal</span>
                    </div>
                </a>
                
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('gov.index') }}" class="text-[12px] font-black uppercase tracking-widest text-emerald-600 border-b-2 border-emerald-600 pb-1">Overview</a>
                    <a href="{{ route('gov.msp') }}" class="text-[12px] font-black uppercase tracking-widest text-slate-500 hover:text-emerald-600 transition-all">MSP Rates</a>
                    <a href="{{ route('gov.tenders') }}" class="text-[12px] font-black uppercase tracking-widest text-slate-500 hover:text-emerald-600 transition-all">Tenders</a>
                    <a href="{{ route('gov.centers') }}" class="text-[12px] font-black uppercase tracking-widest text-slate-500 hover:text-emerald-600 transition-all">Centers</a>
                </nav>
            </div>

            <div class="flex items-center gap-3 md:gap-6">
                <div class="hidden md:flex flex-col text-right mr-4">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Active Session</span>
                    <span class="text-[12px] font-black text-emerald-600" x-text="currentTimestamp"></span>
                </div>
                <!-- Mobile Nav Toggle (Visible only on mobile) -->
                <button class="lg:hidden w-10 h-10 flex items-center justify-center bg-slate-50 rounded-xl text-slate-600">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                @include('components.nav-user-actions')
            </div>
        </div>
    </header>

    <main>
        <!-- 🏔️ HERO ANALYTICS DASHBOARD -->
        <section class="relative pt-20 pb-32 overflow-hidden bg-slate-900">
            <div class="absolute inset-0 z-0">
                <img src="/images/gov-hero-bg.png" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/80 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                <!-- Animated Particle Overlay -->
                <div class="absolute inset-0 opacity-30 mix-blend-screen" style="background-image: radial-gradient(circle at 2px 2px, rgba(16, 185, 129, 0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
            </div>

            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                    <div class="lg:col-span-7 space-y-6 md:space-y-8 text-center lg:text-left">
                        <div class="inline-flex items-center gap-3 px-4 md:px-5 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/10">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] text-emerald-100">Ministry of Agriculture & Farmers Welfare</span>
                        </div>
                        
                        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-[72px] font-black text-white leading-[1.1] lg:leading-[0.95] tracking-tighter">
                            Direct <span class="text-emerald-400">MSP</span> <br class="hidden md:block"/>Procurement Ecosystem.
                        </h1>
                        
                        <p class="text-base md:text-lg text-emerald-50/80 font-medium leading-relaxed max-w-xl mx-auto lg:mx-0">
                            Empowering Indian farmers through transparent Minimum Support Price (MSP) systems, real-time procurement tracking, and guaranteed digital payouts within 48 hours.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row flex-wrap justify-center lg:justify-start gap-4 md:gap-5">
                            <a href="{{ route('gov.sell') }}" class="px-8 md:px-10 py-4 md:py-5 bg-white text-[#005137] rounded-[20px] md:rounded-[24px] text-[11px] md:text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl hover:translate-y-[-4px] transition-all flex items-center justify-center gap-3 group">
                                Sell Crops to Govt
                                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                            <a href="#msp-explorer" class="px-8 md:px-10 py-4 md:py-5 bg-white/10 text-white border border-white/20 rounded-[20px] md:rounded-[24px] text-[11px] md:text-[12px] font-black uppercase tracking-[0.2em] hover:bg-white/20 transition-all backdrop-blur-md text-center">
                                Live MSP Dashboard
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach([
                                ['label' => 'Total Procured', 'value' => '842.5k', 'unit' => 'Tons', 'icon' => 'inventory_2', 'color' => 'emerald'],
                                ['label' => 'Active Centers', 'value' => '1,450', 'unit' => 'Units', 'icon' => 'location_on', 'color' => 'amber'],
                                ['label' => 'Farmer Payouts', 'value' => '₹4,250', 'unit' => 'Cr', 'icon' => 'payments', 'color' => 'indigo'],
                                ['label' => 'Registered', 'value' => '1.2M', 'unit' => 'Farmers', 'icon' => 'groups', 'color' => 'sky']
                            ] as $stat)
                                <div class="bg-white/10 backdrop-blur-xl p-6 md:p-8 rounded-[32px] md:rounded-[40px] border border-white/10 group hover:bg-white hover:translate-y-[-8px] transition-all duration-500">
                                    <div class="w-10 h-10 md:w-12 md:h-12 bg-white/10 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 group-hover:bg-{{$stat['color']}}-500 group-hover:text-white transition-all">
                                        <span class="material-symbols-outlined text-[20px] md:text-[24px] text-{{$stat['color']}}-400 group-hover:text-white">{{ $stat['icon'] }}</span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-[9px] md:text-[10px] font-black text-emerald-100/50 uppercase tracking-widest group-hover:text-slate-400 transition-colors">{{ $stat['label'] }}</p>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-2xl md:text-3xl font-black text-white group-hover:text-slate-900 transition-colors" x-text="stats['{{ Str::snake($stat['label']) }}']"></span>
                                            <span class="text-[9px] md:text-[10px] font-bold text-white/40 group-hover:text-slate-400 transition-colors">{{ $stat['unit'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 🌾 LIVE MSP CARDS SECTION -->
        <section id="msp-explorer" class="py-16 md:py-32 bg-white relative">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
                <div class="flex flex-col md:flex-row justify-between items-center md:items-end gap-8 mb-12 md:mb-20 text-center md:text-left">
                    <div class="space-y-4">
                        <div class="flex items-center justify-center md:justify-start gap-3">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">Current Season: Kharif 2024</span>
                        </div>
                        <h2 class="text-4xl sm:text-5xl md:text-6xl font-black text-slate-900 tracking-tighter leading-none">Live MSP Directory.</h2>
                        <p class="text-base md:text-lg text-slate-500 max-w-xl font-medium">Official guaranteed prices updated in real-time for all major crops.</p>
                    </div>
                    <div class="flex gap-3 md:gap-4 w-full sm:w-auto">
                        <button class="flex-1 sm:flex-none px-6 md:px-8 py-3 md:py-4 bg-slate-50 border border-slate-200 rounded-xl md:rounded-[20px] text-[10px] md:text-[12px] font-black uppercase tracking-widest text-slate-500">Kharif</button>
                        <button class="flex-1 sm:flex-none px-6 md:px-8 py-3 md:py-4 bg-emerald-500 text-white rounded-xl md:rounded-[20px] text-[10px] md:text-[12px] font-black uppercase tracking-widest shadow-xl">Rabi</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <template x-for="crop in crops" :key="crop.name">
                        <div class="group relative bg-slate-900 rounded-[48px] overflow-hidden border border-slate-200/20 shadow-[0_20px_50px_rgba(0,0,0,0.1)] h-full hover:shadow-2xl hover:border-emerald-500/40 hover:-translate-y-2 transition-all duration-700 cursor-default">
                            <!-- Background Image with Gradient -->
                            <div class="absolute inset-0 z-0">
                                <img :src="crop.bg" class="w-full h-full object-cover opacity-60 transition-transform duration-1000 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                            </div>

                            <div class="relative z-10 p-10 flex flex-col h-full">
                                <div class="flex justify-between items-start mb-12">
                                    <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-3xl flex items-center justify-center border border-white/10 group-hover:bg-emerald-500 group-hover:border-emerald-500 transition-all">
                                        <span class="material-symbols-outlined text-[32px] text-white" x-text="crop.icon"></span>
                                    </div>
                                    <div class="bg-emerald-500/20 backdrop-blur-md text-emerald-400 border border-emerald-500/30 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                                        Active
                                    </div>
                                </div>
                                
                                <div class="space-y-6 mt-auto">
                                    <div>
                                        <h3 class="text-3xl font-black text-white tracking-tighter" x-text="crop.name"></h3>
                                        <p class="text-[11px] font-bold text-white/50 uppercase tracking-widest" x-text="crop.season"></p>
                                    </div>
                                    
                                    <div class="p-6 bg-white/5 backdrop-blur-md rounded-[32px] border border-white/10 group-hover:bg-emerald-500/10 transition-all">
                                        <p class="text-[9px] font-black text-white/40 uppercase tracking-widest mb-1">Guaranteed MSP</p>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-3xl font-black text-white tracking-tighter" x-text="'₹' + formatNumber(crop.msp)"></span>
                                            <span class="text-[11px] font-bold text-white/40">/qtl</span>
                                        </div>
                                        <div class="flex items-center gap-1 mt-2 text-emerald-400">
                                            <span class="material-symbols-outlined text-[16px]">trending_up</span>
                                            <span class="text-[11px] font-black" x-text="'+' + crop.increase + '% Increase'"></span>
                                        </div>
                                    </div>
    
                                    <div class="space-y-4">
                                        <div class="flex justify-between items-center text-[11px] font-black text-white/40 uppercase tracking-widest">
                                            <span>Procurement Target</span>
                                            <span class="text-emerald-400" x-text="crop.fulfilled + '%'"></span>
                                        </div>
                                        <div class="h-2 w-full bg-white/5 rounded-full overflow-hidden">
                                            <div class="h-full bg-emerald-500 rounded-full transition-all duration-1000" :style="'width: ' + crop.fulfilled + '%'"></div>
                                        </div>
                                    </div>
    
                                    <a :href="'{{ route('gov.sell') }}?commodity=' + crop.name" class="w-full py-5 bg-white text-slate-900 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] block text-center hover:bg-emerald-500 hover:text-white transition-all shadow-xl">Apply to Sell</a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- 🗺️ STATE-WISE PROCUREMENT & MAP -->
        <section class="py-32 bg-slate-900 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-emerald-500/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/4"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-indigo-500/10 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/4"></div>

            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
                    <div class="space-y-8 md:space-y-10 text-center lg:text-left">
                        <div class="space-y-4">
                            <span class="text-[10px] md:text-[12px] font-black uppercase tracking-[0.3em] text-emerald-400">State Analytics</span>
                            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white tracking-tighter leading-[1.1] lg:leading-[0.95]">Procurement Heatmap.</h2>
                            <p class="text-base md:text-lg text-emerald-50/60 font-medium leading-relaxed max-w-xl mx-auto lg:mx-0">Monitoring direct-to-farmer payouts and crop volume across India's largest agricultural hubs in real-time.</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                            <template x-for="state in stateData" :key="state.name">
                                <div class="p-6 md:p-8 bg-white/5 backdrop-blur-xl border border-white/10 rounded-[32px] md:rounded-[40px] hover:bg-white hover:text-slate-900 transition-all duration-500 group text-left">
                                    <div class="flex justify-between items-start mb-4 md:mb-6">
                                        <h4 class="text-xl md:text-2xl font-black tracking-tighter" x-text="state.name"></h4>
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    </div>
                                    <div class="space-y-4">
                                        <div>
                                            <p class="text-[8px] md:text-[9px] font-black text-white/40 uppercase tracking-widest group-hover:text-slate-400 mb-1">Volume Procured</p>
                                            <p class="text-xl md:text-2xl font-black" x-text="state.volume + 'k MT'"></p>
                                        </div>
                                        <div>
                                            <p class="text-[8px] md:text-[9px] font-black text-white/40 uppercase tracking-widest group-hover:text-slate-400 mb-1">Active Centers</p>
                                            <p class="text-lg md:text-xl font-black" x-text="state.centers"></p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="relative hidden md:block">
                        <div class="bg-white/5 backdrop-blur-3xl border border-white/10 rounded-[48px] lg:rounded-[64px] p-8 lg:p-12 aspect-square flex items-center justify-center">
                            <!-- Fake Interactive Map Visual -->
                            <div class="relative w-full h-full flex items-center justify-center">
                                <div class="absolute inset-0 bg-emerald-500/20 blur-[100px] animate-pulse"></div>
                                <span class="material-symbols-outlined text-[150px] lg:text-[300px] opacity-10">public</span>
                                
                                <!-- Animated Pins -->
                                <template x-for="i in [1,2,3,4,5,6]">
                                    <div class="absolute" :style="'top:' + (Math.random()*80+10) + '%; left:' + (Math.random()*80+10) + '%'">
                                        <div class="relative flex items-center justify-center">
                                            <div class="absolute w-6 h-6 lg:w-8 lg:h-8 bg-emerald-500/40 rounded-full animate-ping"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 bg-emerald-500 rounded-full shadow-[0_0_20px_#10B981]"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 📊 REAL-TIME PROCUREMENT FEED & CHARTS -->
        <section class="py-32 bg-slate-50">
            <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                    <!-- Live Feed -->
                    <div class="lg:col-span-4 space-y-8">
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Activity Feed</h3>
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        </div>
                        <div class="space-y-4">
                            <template x-for="feed in liveFeed" :key="feed.id">
                                <div class="bg-white p-6 rounded-[32px] border border-slate-200 shadow-sm flex items-start gap-4 animate-fadeIn">
                                    <div class="w-10 h-10 shrink-0 bg-slate-50 rounded-xl flex items-center justify-center">
                                        <span class="material-symbols-outlined text-[20px] text-emerald-600" x-text="feed.icon"></span>
                                    </div>
                                    <div>
                                        <p class="text-[13px] font-bold text-slate-900" x-text="feed.message"></p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest" x-text="feed.tag"></span>
                                            <span class="text-[10px] font-bold text-slate-400" x-text="feed.time"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <button class="w-full py-4 bg-white border border-slate-200 rounded-2xl text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-emerald-600 hover:border-emerald-500 transition-all">View Historical Data</button>
                    </div>

                    <!-- Visual Analytics -->
                    <div class="lg:col-span-8 space-y-8">
                        <div class="bg-white p-12 rounded-[64px] border border-slate-200 shadow-sm space-y-12">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                                <div>
                                    <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Procurement Trend</h3>
                                    <p class="text-slate-500 font-medium">Daily volume tracking across all registered centers</p>
                                </div>
                                <div class="flex gap-2 p-1 bg-slate-50 rounded-xl">
                                    <button class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase bg-white shadow-sm text-slate-900">7 Days</button>
                                    <button class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase text-slate-400">30 Days</button>
                                </div>
                            </div>
                            
                            <!-- Fake Chart Visual -->
                            <div class="h-80 w-full flex items-end gap-2 px-4 relative group">
                                <template x-for="i in 24">
                                    <div class="flex-1 bg-emerald-500/10 rounded-t-lg transition-all duration-500 hover:bg-emerald-500 group-hover:opacity-40 hover:!opacity-100 relative group/bar"
                                         :style="'height: ' + (Math.random() * 80 + 20) + '%'">
                                         <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[9px] font-black px-2 py-1 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">
                                            ₹<span x-text="Math.round(Math.random()*1000 + 2000)"></span>
                                         </div>
                                    </div>
                                </template>
                            </div>

                            <div class="grid grid-cols-3 gap-8 pt-8 border-t border-slate-100">
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Peak Volume</p>
                                    <p class="text-2xl font-black text-slate-900">124k <span class="text-sm font-bold text-slate-400">MT</span></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Avg Payout</p>
                                    <p class="text-2xl font-black text-slate-900">₹2.4k <span class="text-sm font-bold text-slate-400">/qtl</span></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Fulfillment</p>
                                    <p class="text-2xl font-black text-emerald-600">92%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 📢 CTA / FOOTER -->
        <section class="py-16 md:py-24">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
                <div class="bg-gradient-to-br from-[#005137] to-[#006b4a] rounded-[40px] md:rounded-[64px] p-10 md:p-24 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-[600px] md:w-[800px] h-[600px] md:h-[800px] bg-white/5 rounded-full blur-[100px] md:blur-[120px] -translate-y-1/2 translate-x-1/4"></div>
                    <div class="relative z-10 flex flex-col items-center text-center space-y-8 md:space-y-10">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-2xl md:rounded-3xl flex items-center justify-center text-[#005137] shadow-2xl">
                            <span class="material-symbols-outlined text-[32px] md:text-[40px]">check_circle</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl md:text-6xl font-black text-white tracking-tighter max-w-3xl leading-tight">
                            Get Your Crops Verified & Sell at Guaranteed Prices.
                        </h2>
                        <p class="text-base md:text-xl text-emerald-50/70 font-medium leading-relaxed max-w-xl">
                            Register today to access the official MSP procurement network and receive direct bank payouts with zero middlemen.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-5 w-full sm:w-auto">
                            <a href="{{ route('register') }}" class="px-8 md:px-10 py-4 md:py-5 bg-white text-[#005137] rounded-[20px] md:rounded-[24px] text-[11px] md:text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl hover:translate-y-[-4px] transition-all text-center">
                                Farmer Registration
                            </a>
                            <a href="{{ route('login') }}" class="px-8 md:px-10 py-4 md:py-5 bg-white/10 text-white border border-white/20 rounded-[20px] md:rounded-[24px] text-[11px] md:text-[12px] font-black uppercase tracking-[0.2em] hover:bg-white/20 transition-all backdrop-blur-md text-center">
                                Official Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white pt-32 pb-12 border-t border-slate-100">
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-24">
                <div class="col-span-2 space-y-8">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#005137] rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-[28px]">account_balance</span>
                        </div>
                        <span class="text-3xl font-black text-slate-900 tracking-tighter">AgriMandi <span class="text-[#005137]">Gov</span></span>
                    </div>
                    <p class="text-slate-500 text-lg leading-relaxed max-w-sm font-medium">
                        Direct-to-farmer government procurement system for a transparent and digital agricultural economy in India.
                    </p>
                </div>
                
                @foreach([
                    'Official' => ['MSP Policies', 'Agency Tenders', 'Procurement Centers', 'Payment Tracking'],
                    'Support' => ['Grievance Portal', 'Toll Free: 1800-XXX', 'Center Locator', 'FAQ']
                ] as $title => $links)
                    <div class="space-y-8">
                        <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-slate-400">{{ $title }}</h4>
                        <ul class="space-y-4">
                            @foreach($links as $link)
                                <li><a href="#" class="text-[14px] font-bold text-slate-600 hover:text-emerald-600 transition-colors">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="pt-12 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-[12px] font-bold text-slate-400">© 2024 Ministry of Agriculture & Farmers Welfare. Digital Empowerment by AgriMandi India.</p>
                <div class="flex items-center gap-8">
                    <span class="flex items-center gap-2 text-[12px] font-bold text-emerald-500">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        Gov-Server: Operational
                    </span>
                </div>
            </div>
        </div>
    </footer>
</div>

@push('scripts')
<script>
function procurementEngine() {
    return {
        currentTimestamp: new Date().toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' | ' + new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short' }),
        stats: {
            total_procured: '842.5k',
            active_centers: '1,450',
            total_farmer_payouts: '₹4,250',
            registered_farmers: '1.2M'
        },
        mspItems: [
            { name: 'Paddy (Common)', price: 2310, change: 2.1 },
            { name: 'Wheat (Grade A)', price: 2475, change: -0.5 },
            { name: 'Maize', price: 2090, change: 1.8 },
            { name: 'Cotton (Long)', price: 7020, change: 3.2 },
            { name: 'Mustard', price: 5650, change: -1.2 },
            { name: 'Soybean', price: 4600, change: 0.8 },
            { name: 'Turmeric', price: 8500, change: 4.5 }
        ],
        crops: [
            { name: 'Paddy (Kharif)', msp: 2310, increase: 5.4, fulfilled: 82, season: 'Kharif', icon: 'grass', bg: '/images/paddy-bg.png' },
            { name: 'Wheat (Rabi)', msp: 2475, increase: 6.2, fulfilled: 94, season: 'Rabi', icon: 'agriculture', bg: '/images/wheat-bg.png' },
            { name: 'Maize (Kharif)', msp: 2090, increase: 4.8, fulfilled: 65, season: 'Kharif', icon: 'grain', bg: '/images/maize-bg.png' },
            { name: 'Mustard (Rabi)', msp: 5650, increase: 3.5, fulfilled: 88, season: 'Rabi', icon: 'potted_plant', bg: '/images/mustard-bg.png' }
        ],
        stateData: [
            { name: 'Punjab', volume: 182, centers: 420 },
            { name: 'Haryana', volume: 145, centers: 380 },
            { name: 'UP', volume: 210, centers: 550 },
            { name: 'Maharashtra', volume: 95, centers: 240 }
        ],
        liveFeed: [
            { id: 1, icon: 'notifications', message: 'New Procurement Center opened in Ludhiana, Punjab', tag: 'NEW CENTER', time: 'Just Now' },
            { id: 2, icon: 'payments', message: '₹240 Cr Payouts processed for 12,500 Farmers in MP', tag: 'PAYMENT', time: '5m ago' },
            { id: 3, icon: 'gavel', message: 'FCI releases new tender for Wheat Storage (20k Tons)', tag: 'TENDER', time: '12m ago' }
        ],
        init() {
            setInterval(() => {
                this.currentTimestamp = new Date().toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' | ' + new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
                
                // Update MSP Ticker
                this.mspItems.forEach(item => {
                    let move = (Math.random() * 10 - 5);
                    item.price = Math.round(item.price + move);
                    item.change = +(move / item.price * 100).toFixed(1);
                });

                // Update Feed
                const messages = [
                    { icon: 'groups', message: '1,250 New Farmers registered from Rajasthan', tag: 'REGISTRATION' },
                    { icon: 'inventory_2', message: 'Wheat procurement target reached 90% in Haryana', tag: 'ALERT' },
                    { icon: 'verified', message: 'Quality grading completed for 500 Tons of Paddy', tag: 'GRADING' }
                ];
                const msg = messages[Math.floor(Math.random() * messages.length)];
                this.liveFeed.unshift({ id: Date.now(), icon: msg.icon, message: msg.message, tag: msg.tag, time: 'Just Now' });
                if(this.liveFeed.length > 5) this.liveFeed.pop();

                // Small Stats Fluctuation
                this.stats.active_centers = (1450 + Math.floor(Math.random()*5)).toString();
            }, 4000);
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
    animation: marquee 40s linear infinite;
    display: flex;
    width: max-content;
}
.hover\:pause:hover {
    animation-play-state: paused;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.5s ease-out forwards;
}
</style>
@endpush
@endsection
