@extends('layouts.stitch')

@section('title', 'Official MSP Pricing Intelligence Dashboard - AgriMandi')

@section('content')
<div x-data="mspDashboardEngine()" class="min-h-screen bg-slate-50 selection:bg-emerald-500 selection:text-white">
    <!-- 🏛️ GOVERNMENT HEADER & TICKER -->
    <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-[70] shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-[#005137] flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[11px] uppercase tracking-tighter">Live MSP vs Market Index</span>
        </div>
        
        <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[220px]">
            <template x-for="item in commodities" :key="item.name">
                <div class="inline-flex items-center gap-4 px-8 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest" x-text="item.name"></span>
                    <div class="flex items-center gap-2">
                        <span class="font-mono font-bold text-[13px]" x-text="'₹' + formatNumber(item.marketPrice)"></span>
                        <div class="flex items-center gap-0.5" :class="item.marketPrice > item.msp ? 'text-emerald-400' : 'text-rose-400'">
                            <span class="material-symbols-outlined text-[16px]" x-text="item.marketPrice > item.msp ? 'trending_up' : 'trending_down'"></span>
                            <span class="font-mono text-[11px] font-black" x-text="(item.marketPrice > item.msp ? '+' : '-') + Math.abs(((item.marketPrice - item.msp)/item.msp)*100).toFixed(1) + '%'"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- 📊 DASHBOARD HEADER -->
    <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-[60] h-20 md:h-24 flex items-center transition-all">
        <div class="max-w-[1440px] mx-auto w-full px-4 sm:px-8 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-4 lg:gap-12">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-[#005137] rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-900/20 transition-transform group-hover:scale-110">
                        <span class="material-symbols-outlined text-white text-[20px] md:text-[28px]">query_stats</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg md:text-2xl font-black text-slate-900 tracking-tighter leading-none">MSP <span class="text-emerald-600">Intelligence</span></span>
                        <span class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Direct Market Monitoring</span>
                    </div>
                </a>
                
                <div class="h-10 w-px bg-slate-200 hidden lg:block"></div>
                
                <div class="hidden lg:flex items-center gap-12">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Live Mandatory Sync</span>
                        <div class="flex items-center gap-2">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[13px] font-black text-slate-900" x-text="lastSynced"></span>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Active Mandis</span>
                        <span class="text-[13px] font-black text-slate-900">1,240+ Tracking</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 md:gap-6">
                <button @click="refreshData()" class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center bg-slate-50 border border-slate-200 rounded-xl md:rounded-2xl text-slate-400 hover:text-emerald-600 transition-all">
                    <span class="material-symbols-outlined text-[20px] md:text-[24px]">sync</span>
                </button>
                @include('components.nav-user-actions')
            </div>
        </div>
    </header>

    <main class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12 py-12 space-y-12">
        <!-- 🏔️ TOP ANALYTICS TILES -->
        <!-- 🏔️ TOP ANALYTICS TILES -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <template x-for="stat in topStats" :key="stat.label">
                <div class="bg-white p-6 md:p-8 rounded-[32px] md:rounded-[48px] border border-slate-100 shadow-sm group hover:shadow-2xl hover:border-emerald-500/20 transition-all duration-500 overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 w-20 h-20 md:w-24 md:h-24 bg-slate-50 rounded-full blur-2xl group-hover:bg-emerald-50 transition-all"></div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-slate-50 rounded-xl md:rounded-2xl flex items-center justify-center text-slate-400 mb-6 md:mb-8 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            <span class="material-symbols-outlined text-[24px] md:text-[28px]" x-text="stat.icon"></span>
                        </div>
                        <div>
                            <p class="text-[10px] md:text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2" x-text="stat.label"></p>
                            <div class="flex items-baseline gap-2">
                                <h4 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tighter" x-text="stat.value"></h4>
                                <span class="text-[9px] md:text-[10px] font-bold text-emerald-500" x-text="stat.trend"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- 🌾 LIVE COMMODITY GRID -->
        <div class="space-y-8">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-end gap-6 md:gap-8 text-center md:text-left">
                <div class="space-y-4">
                    <div class="flex items-center justify-center md:justify-start gap-3">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] md:text-[11px] font-black uppercase tracking-[0.2em] text-emerald-600">Real-Time Market Monitoring</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter">Pricing Hub.</h2>
                </div>
                <div class="flex bg-slate-100 p-1.5 rounded-2xl border border-slate-200 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none px-6 py-2.5 bg-white shadow-sm rounded-xl text-[10px] md:text-[11px] font-black uppercase tracking-widest text-slate-900">All Crops</button>
                    <button class="flex-1 sm:flex-none px-6 py-2.5 rounded-xl text-[10px] md:text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600">High Variance</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <template x-for="item in commodities" :key="item.name">
                    <div class="group relative bg-slate-900 rounded-[48px] overflow-hidden border border-slate-200/20 shadow-[0_20px_50px_rgba(0,0,0,0.1)] h-full hover:shadow-2xl hover:border-emerald-500/40 hover:-translate-y-2 transition-all duration-700 cursor-default">
                        <!-- Background Image with Gradient -->
                        <div class="absolute inset-0 z-0">
                            <img :src="item.bg" class="w-full h-full object-cover opacity-60 transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                        </div>

                        <div class="relative z-10 p-10 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-10">
                                <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-3xl flex items-center justify-center border border-white/10 group-hover:bg-emerald-500 group-hover:border-emerald-500 transition-all">
                                    <span class="material-symbols-outlined text-[32px] text-white" x-text="item.icon"></span>
                                </div>
                                <div :class="item.marketPrice > item.msp ? 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30' : 'bg-indigo-500/20 text-indigo-400 border-indigo-500/30'"
                                     class="px-4 py-2 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest border flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" :class="item.marketPrice > item.msp ? 'bg-emerald-400' : 'bg-indigo-400'"></span>
                                    <span x-text="item.marketPrice > item.msp ? 'Sell to Market' : 'Sell to Govt'"></span>
                                </div>
                            </div>
    
                            <div class="space-y-8 mt-auto">
                                <div>
                                    <h3 class="text-3xl font-black text-white tracking-tighter" x-text="item.name"></h3>
                                    <p class="text-[11px] font-bold text-white/50 uppercase tracking-widest" x-text="item.season + ' Season'"></p>
                                </div>
    
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <p class="text-[9px] font-black text-white/40 uppercase tracking-widest">Govt. MSP</p>
                                        <p class="text-xl font-black text-white" x-text="'₹' + formatNumber(item.msp)"></p>
                                    </div>
                                    <div class="space-y-1 text-right">
                                        <p class="text-[9px] font-black text-white/40 uppercase tracking-widest">Avg. Market</p>
                                        <div class="flex items-center justify-end gap-2">
                                            <p class="text-xl font-black" :class="item.marketPrice > item.msp ? 'text-emerald-400' : 'text-white'" x-text="'₹' + formatNumber(item.marketPrice)"></p>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="p-6 bg-white/5 backdrop-blur-md rounded-[32px] border border-white/10 group-hover:bg-emerald-500/10 transition-all space-y-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-[11px] font-black text-white/40 uppercase tracking-widest">Price Delta</span>
                                        <div class="flex items-center gap-1" :class="item.marketPrice > item.msp ? 'text-emerald-400' : 'text-rose-400'">
                                            <span class="material-symbols-outlined text-[16px]" x-text="item.marketPrice > item.msp ? 'trending_up' : 'trending_down'"></span>
                                            <span class="text-[13px] font-black" x-text="(item.marketPrice > item.msp ? '+' : '-') + '₹' + formatNumber(Math.abs(item.marketPrice - item.msp))"></span>
                                        </div>
                                    </div>
                                    <p class="text-[11px] font-bold text-white/60 leading-relaxed" x-text="item.marketPrice > item.msp ? 'Private market demand is stronger right now.' : 'Government procurement is highly recommended.'"></p>
                                </div>
    
                                <div class="flex gap-4">
                                    <a :href="item.marketPrice > item.msp ? '{{ route('marketplace') }}' : '{{ route('gov.sell') }}'" 
                                       class="flex-1 py-5 bg-white text-slate-900 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] block text-center shadow-xl hover:bg-emerald-500 hover:text-white transition-all active:scale-95">
                                       Proceed to Sell
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- 📊 REAL-TIME ANALYTICS & ACTIVITY -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Market Trends Chart -->
            <div class="lg:col-span-8 bg-white p-6 md:p-12 rounded-[40px] md:rounded-[64px] border border-slate-200 shadow-sm space-y-8 md:space-y-12">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 md:gap-8">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tighter">Pricing Volatility Index</h3>
                        <p class="text-[13px] md:text-base text-slate-500 font-medium">Real-time gap analysis between MSP and Market mandates.</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                            <span class="text-[9px] md:text-[11px] font-black text-slate-400 uppercase tracking-widest">Market</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-slate-200"></span>
                            <span class="text-[9px] md:text-[11px] font-black text-slate-400 uppercase tracking-widest">MSP</span>
                        </div>
                    </div>
                </div>

                <!-- Fake Chart Animation -->
                <div class="h-64 md:h-96 w-full flex items-end gap-1.5 md:gap-3 px-2 md:px-4 relative group overflow-hidden">
                    <template x-for="i in (window.innerWidth < 768 ? 15 : 30)">
                        <div class="flex-1 space-y-1 group/bar h-full flex flex-col justify-end">
                            <div class="w-full bg-emerald-500/20 rounded-t-lg transition-all duration-700 hover:bg-emerald-500 relative"
                                 :style="'height: ' + (Math.random() * 60 + 30) + '%'">
                            </div>
                            <div class="w-full bg-slate-100 rounded-t-lg h-[40%] transition-all duration-700"></div>
                        </div>
                    </template>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8 pt-8 md:pt-12 border-t border-slate-100">
                    <div>
                        <p class="text-[9px] md:text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Avg. Market Premium</p>
                        <p class="text-xl md:text-2xl font-black text-emerald-600">+₹420 <span class="text-xs md:text-sm font-bold">/qtl</span></p>
                    </div>
                    <div>
                        <p class="text-[9px] md:text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Market Volatility</p>
                        <p class="text-xl md:text-2xl font-black text-slate-900">High <span class="text-xs md:text-sm font-bold text-emerald-500">(Stable)</span></p>
                    </div>
                    <div>
                        <p class="text-[9px] md:text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Procurement Pace</p>
                        <p class="text-xl md:text-2xl font-black text-indigo-600">84k <span class="text-xs md:text-sm font-bold">MT/Day</span></p>
                    </div>
                </div>
            </div>

            <!-- Live Activity Sidebar -->
            <div class="lg:col-span-4 space-y-8">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Live Market Feed</h3>
                    <div class="flex items-center gap-2">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">Live Updates</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <template x-for="feed in activityFeed" :key="feed.id">
                        <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm flex items-start gap-5 animate-slideIn">
                            <div class="w-10 h-10 shrink-0 bg-slate-50 rounded-xl flex items-center justify-center">
                                <span class="material-symbols-outlined text-emerald-600 text-[20px]" x-text="feed.icon"></span>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[13px] font-bold text-slate-900 leading-tight" x-text="feed.message"></p>
                                <div class="flex items-center gap-3">
                                    <span class="text-[9px] font-black text-emerald-600 uppercase tracking-widest" x-text="feed.category"></span>
                                    <span class="text-[9px] font-bold text-slate-400" x-text="feed.time"></span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <button class="w-full py-5 bg-white border border-slate-200 rounded-[24px] text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-emerald-600 hover:border-emerald-500 transition-all flex items-center justify-center gap-3">
                    View Complete Activity Log
                    <span class="material-symbols-outlined text-[18px]">history</span>
                </button>
            </div>
        </div>

        <!-- 🏙️ REGIONAL MARKET INTELLIGENCE -->
        <div class="bg-white rounded-[40px] md:rounded-[64px] border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8 md:p-12 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6 md:gap-8 text-center md:text-left">
                <div>
                    <h3 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tighter">State-Wise Live Market Index</h3>
                    <p class="text-[13px] md:text-base text-slate-500 font-medium">Regional pricing variance across top agricultural belts.</p>
                </div>
                <div class="flex gap-3 md:gap-4 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none px-6 md:px-8 py-3 bg-slate-900 text-white rounded-xl md:rounded-2xl text-[10px] md:text-[11px] font-black uppercase tracking-widest">All States</button>
                    <button class="flex-1 sm:flex-none px-6 md:px-8 py-3 bg-slate-50 text-slate-400 border border-slate-200 rounded-xl md:rounded-2xl text-[10px] md:text-[11px] font-black uppercase tracking-widest">Top Perf.</button>
                </div>
            </div>
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full text-left min-w-[800px]">
                    <thead>
                        <tr class="bg-slate-50 text-[11px] font-black text-slate-400 uppercase tracking-widest">
                            <th class="px-12 py-8">Agricultural Belt</th>
                            <th class="px-12 py-8">Avg. Mandi Price</th>
                            <th class="px-12 py-8">MSP Utilization</th>
                            <th class="px-12 py-8">Market Demand</th>
                            <th class="px-12 py-8">Active Centers</th>
                            <th class="px-12 py-8 text-right">Market Pulse</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <template x-for="state in stateData" :key="state.name">
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-12 py-8 font-black text-slate-900 text-lg tracking-tighter" x-text="state.name"></td>
                                <td class="px-12 py-8">
                                    <div class="flex flex-col">
                                        <span class="font-black text-slate-900" x-text="'₹' + formatNumber(state.price)"></span>
                                        <span class="text-[10px] font-bold text-emerald-500" x-text="'+' + state.change + '%'"></span>
                                    </div>
                                </td>
                                <td class="px-12 py-8">
                                    <div class="w-32 h-2 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-emerald-500 transition-all duration-1000" :style="'width: ' + state.usage + '%'"></div>
                                    </div>
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-2 block" x-text="state.usage + '% Utilized'"></span>
                                </td>
                                <td class="px-12 py-8">
                                    <span :class="state.demand === 'High' ? 'text-emerald-600 bg-emerald-50' : 'text-amber-600 bg-amber-50'"
                                          class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest" x-text="state.demand"></span>
                                </td>
                                <td class="px-12 py-8 font-black text-slate-900" x-text="state.centers"></td>
                                <td class="px-12 py-8 text-right">
                                    <div class="flex items-center justify-end gap-2 text-emerald-500">
                                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                                        <span class="text-[10px] font-black uppercase tracking-widest">Active Trade</span>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- 📢 FOOTER CTA -->
    <section class="py-24">
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="bg-gradient-to-br from-[#005137] to-[#01402c] rounded-[64px] p-16 md:p-24 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-white/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/4"></div>
                <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-16">
                    <div class="max-w-2xl space-y-8">
                        <h2 class="text-5xl md:text-6xl font-black text-white tracking-tighter leading-tight">
                            Start Selling at Official <br/><span class="text-emerald-400 italic">Government Rates</span> Today.
                        </h2>
                        <p class="text-xl text-emerald-50/70 font-medium leading-relaxed">
                            Access guaranteed Minimum Support Prices, secure payouts, and official government logistics through our unified procurement ecosystem.
                        </p>
                        <div class="flex flex-wrap gap-5 pt-4">
                            <a href="{{ route('gov.sell') }}" class="px-10 py-5 bg-white text-[#005137] rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl hover:translate-y-[-4px] transition-all flex items-center gap-3">
                                Sell harvest Now
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </a>
                            <a href="{{ route('gov.centers') }}" class="px-10 py-5 bg-white/10 text-white border border-white/20 rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] hover:bg-white/20 transition-all backdrop-blur-md">
                                Locate Centers
                            </a>
                        </div>
                    </div>
                    <div class="hidden xl:block relative group-hover:translate-y-[-10px] transition-transform duration-700">
                        <div class="bg-white/10 backdrop-blur-3xl border border-white/20 p-12 rounded-[64px] shadow-2xl">
                            <span class="material-symbols-outlined text-[160px] text-white/20">gpp_good</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
function mspDashboardEngine() {
    return {
        lastSynced: 'Just Now',
        topStats: [
            { label: 'Market Variance', value: '+14.2%', trend: '▲ Increasing', icon: 'trending_up' },
            { label: 'Active Auctions', value: '4,850', trend: 'Live Now', icon: 'gavel' },
            { label: 'Total Payouts', value: '₹12.4k Cr', trend: 'DBT Active', icon: 'payments' },
            { label: 'Fulfillment', value: '92.4%', trend: 'On Target', icon: 'task_alt' }
        ],
        commodities: [
            { name: 'Wheat', msp: 2475, marketPrice: 2820, season: 'Rabi', icon: 'agriculture', bg: '/images/wheat-bg.png' },
            { name: 'Paddy (Grade A)', msp: 2310, marketPrice: 2150, season: 'Kharif', icon: 'grass', bg: '/images/paddy-bg.png' },
            { name: 'Maize', msp: 2090, marketPrice: 2350, season: 'Kharif', icon: 'grain', bg: '/images/maize-bg.png' },
            { name: 'Cotton (Long)', msp: 7020, marketPrice: 7450, season: 'Kharif', icon: 'filter_vintage', bg: '/images/cotton-bg.png' },
            { name: 'Soybean', msp: 4600, marketPrice: 4850, season: 'Kharif', icon: 'eco', bg: '/images/maize-bg.png' },
            { name: 'Bajra', msp: 2500, marketPrice: 2380, season: 'Kharif', icon: 'energy_savings_leaf', bg: '/images/wheat-bg.png' },
            { name: 'Mustard', msp: 5650, marketPrice: 6120, season: 'Rabi', icon: 'spa', bg: '/images/mustard-bg.png' },
            { name: 'Turmeric', msp: 8500, marketPrice: 9450, season: 'Whole Year', icon: 'category', bg: '/images/mustard-bg.png' }
        ],
        stateData: [
            { name: 'Punjab', price: 2840, change: 1.2, usage: 92, demand: 'High', centers: 420 },
            { name: 'Haryana', price: 2790, change: 0.8, usage: 88, demand: 'High', centers: 380 },
            { name: 'Madhya Pradesh', price: 2650, change: 2.1, usage: 74, demand: 'Stable', centers: 550 },
            { name: 'Uttar Pradesh', price: 2720, change: 1.5, usage: 82, demand: 'High', centers: 620 },
            { name: 'Maharashtra', price: 2580, change: -0.4, usage: 65, demand: 'Stable', centers: 240 }
        ],
        activityFeed: [
            { id: 1, icon: 'notifications', message: 'Ludhiana Mandi (Punjab) reported Wheat price jump by ₹45/qtl', category: 'PRICE ALERT', time: 'Just Now' },
            { id: 2, icon: 'verified', message: 'Government starts Maize procurement in 140 new centers', category: 'PROCUREMENT', time: '5m ago' },
            { id: 3, icon: 'payments', message: '₹420 Cr processed for Soybean farmers in Maharashtra', tag: 'PAYMENT', time: '12m ago', category: 'PAYMENT' }
        ],
        init() {
            setInterval(() => {
                this.commodities.forEach(item => {
                    let move = (Math.random() * 20 - 10);
                    item.marketPrice = Math.round(item.marketPrice + move);
                });
                
                // Update Feed
                const msgs = [
                    { icon: 'trending_up', message: 'Cotton demand rising in Gujarat market centers', category: 'MARKET TREND' },
                    { icon: 'gavel', message: 'New export tender released for Basmati Rice (Grade A)', category: 'TENDER' },
                    { icon: 'groups', message: '1,500 Farmers registered for Rabi procurement in Haryana', category: 'FARMER' }
                ];
                const newMsg = msgs[Math.floor(Math.random() * msgs.length)];
                this.activityFeed.unshift({ id: Date.now(), icon: newMsg.icon, message: newMsg.message, category: newMsg.category, time: 'Just Now' });
                if(this.activityFeed.length > 5) this.activityFeed.pop();
                
                this.lastSynced = new Date().toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });
            }, 4000);
        },
        refreshData() {
            this.lastSynced = 'Syncing...';
            setTimeout(() => {
                this.lastSynced = 'Just Now';
            }, 1000);
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
    animation: marquee 50s linear infinite;
    display: flex;
    width: max-content;
}
.hover\:pause:hover {
    animation-play-state: paused;
}
@keyframes slideIn {
    from { opacity: 0; transform: translateX(20px); }
    to { opacity: 1; transform: translateX(0); }
}
.animate-slideIn {
    animation: slideIn 0.5s ease-out forwards;
}
</style>
@endpush
@endsection
