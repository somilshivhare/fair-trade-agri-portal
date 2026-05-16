@extends('layouts.stitch')

@section('title', 'Bids Exchange Dashboard - AgriMandi')

@push('styles')
<style>
    .glass-sidebar {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border-right: 1px solid rgba(0, 108, 73, 0.1);
    }
    .dark .glass-sidebar {
        background: rgba(15, 23, 42, 0.8);
        border-right: 1px solid rgba(16, 185, 129, 0.1);
    }
    .bid-row {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .bid-row:hover {
        background: rgba(16, 185, 129, 0.03) !important;
        transform: scale(1.002);
    }
    .status-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
</style>
@endpush

@section('content')
<div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" 
     x-data="bidsExchange()" 
     x-init="initCharts()">
    
    <!-- 🏢 ENTERPRISE SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
        <div class="flex flex-col gap-4 mb-12">
            <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-40 w-auto object-contain self-start mix-blend-multiply">
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span></h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Bids Exchange</p>
            </div>
        </div>

        <nav class="flex-1 space-y-2">
            <template x-for="item in menuItems" :key="item.label">
                <a :href="item.active ? '#' : item.route" 
                   class="flex items-center justify-between p-4 rounded-2xl transition-all group"
                   :class="item.active ? 'bg-primary text-white shadow-xl shadow-primary/20' : 'text-slate-500 dark:text-slate-400 hover:bg-primary/5 hover:text-primary'">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined transition-transform group-hover:scale-110" :class="item.active ? 'filled' : ''" x-text="item.icon"></span>
                        <span class="text-sm font-bold uppercase tracking-widest" x-text="item.label"></span>
                    </div>
                    <span x-show="item.badge" class="px-2 py-0.5 rounded-full text-[9px] font-black bg-white/20 text-white" x-text="item.badge"></span>
                </a>
            </template>
        </nav>

        <div class="mt-auto p-6 bg-primary/5 rounded-3xl border border-primary/10 space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-primary status-pulse"></div>
                <span class="text-[10px] font-black text-primary uppercase tracking-widest">Exchange: Active</span>
            </div>
            <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">Global buyers are currently placing bids. Next price update in 2m.</p>
        </div>
    </aside>

    <!-- 🚀 MAIN EXCHANGE INTERFACE -->
    <main class="flex-1 min-w-0 flex flex-col">
        <!-- TOP NAV -->
        <header class="h-24 sticky top-0 z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-3xl border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8">
            <div class="flex items-center gap-8 flex-1">
                <a href="{{ route('farmer.dashboard') }}" class="flex items-center gap-3 text-slate-500 hover:text-primary transition-all duration-300 group">
                    <div class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-900 flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                    </div>
                    <span class="text-[12px] font-black uppercase tracking-widest hidden sm:block">Back to Dashboard</span>
                </a>
                <div class="h-10 w-px bg-slate-200 dark:bg-slate-800 mx-2"></div>

                <div>
                    <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight">Auction Command</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Real-time Bidding Engine v2.4</p>
                </div>
                <div class="h-8 w-px bg-slate-200 dark:border-slate-800 hidden md:block"></div>
                <div class="hidden md:flex items-center gap-6">
                    <div class="flex flex-col">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Total Active Bids</p>
                        <p class="text-lg font-black text-slate-900 dark:text-white">24</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Highest Premium</p>
                        <p class="text-lg font-black text-emerald-500">+12.5%</p>
                    </div>
                </div>
            </div>
            @include('components.nav-user-actions')
        </header>

        <!-- EXCHANGE CONTENT -->
        <div class="p-8 space-y-8">
            <!-- Market Intelligence Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Bid Volume Chart -->
                <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-[40px] p-8 border border-slate-200 dark:border-slate-800 space-y-6">
                    <div class="flex items-center justify-between">
                        <h4 class="text-lg font-black text-slate-900 dark:text-white tracking-tight">Bid Intensity Index</h4>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-primary"></span>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Live Offers</span>
                        </div>
                    </div>
                    <div id="bidIntensityChart" class="w-full h-48"></div>
                </div>

                <!-- AI Benchmarking -->
                <div class="bg-primary rounded-[40px] p-8 text-white space-y-6 relative overflow-hidden group">
                    <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined filled text-[20px]">analytics</span>
                        </div>
                        <h5 class="text-sm font-black uppercase tracking-widest">Price Benchmark</h5>
                    </div>
                    <div class="space-y-4 relative z-10">
                        <div class="flex justify-between items-end">
                            <p class="text-[10px] font-black text-white/60 uppercase">Your Top Bid</p>
                            <p class="text-2xl font-black">₹2,480/q</p>
                        </div>
                        <div class="flex justify-between items-end border-t border-white/10 pt-4">
                            <p class="text-[10px] font-black text-white/60 uppercase">Regional Mandi Avg</p>
                            <p class="text-lg font-black text-white/80">₹2,210/q</p>
                        </div>
                        <div class="p-4 bg-white/10 rounded-2xl border border-white/20">
                            <p class="text-xs font-bold leading-tight">Your current top bid is <span class="text-emerald-400 font-black">12.2% above</span> local market rates. AI suggests accepting within 24h.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BIDS EXCHANGE TABLE -->
            <div class="bg-white dark:bg-slate-900 rounded-[40px] border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
                <div class="p-8 border-b border-slate-100 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
                    <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Active Bids Exchange</h4>
                    <div class="flex items-center gap-3 bg-slate-50 dark:bg-slate-800 p-1.5 rounded-2xl">
                        <button class="px-4 py-2 bg-white dark:bg-slate-700 shadow-sm rounded-xl text-[10px] font-black uppercase tracking-widest text-primary">All Bids</button>
                        <button class="px-4 py-2 hover:bg-white dark:hover:bg-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-400 transition-all">Pending</button>
                        <button class="px-4 py-2 hover:bg-white dark:hover:bg-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-400 transition-all">Countered</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="px-8 py-6">Commodity & Lot</th>
                                <th class="px-8 py-6">Buyer Intelligence</th>
                                <th class="px-8 py-6">Bid Value</th>
                                <th class="px-8 py-6">Status</th>
                                <th class="px-8 py-6 text-right">Strategic Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            <template x-for="bid in bids" :key="bid.id">
                                <tr class="bid-row group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 bg-slate-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                                <span class="material-symbols-outlined filled" x-text="bid.icon"></span>
                                            </div>
                                            <div>
                                                <p class="text-sm font-black text-slate-900 dark:text-white" x-text="bid.product"></p>
                                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest" x-text="bid.lotId"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-3">
                                            <img :src="bid.buyerLogo" class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 p-1" />
                                            <div>
                                                <p class="text-xs font-black text-slate-900 dark:text-white" x-text="bid.buyer"></p>
                                                <div class="flex items-center gap-1">
                                                    <template x-for="i in 5">
                                                        <span class="material-symbols-outlined text-[10px] filled" :class="i <= bid.rating ? 'text-amber-400' : 'text-slate-200'">star</span>
                                                    </template>
                                                    <span class="text-[9px] font-bold text-slate-400 ml-1" x-text="bid.reviews + ' reviews'"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="space-y-1">
                                            <p class="text-lg font-black text-primary" x-text="'₹' + bid.amount + '/q'"></p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest" x-text="'Total: ₹' + bid.totalVal"></p>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-500/10 text-emerald-600 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 status-pulse"></span>
                                            <span class="text-[10px] font-black uppercase tracking-widest" x-text="bid.status"></span>
                                        </div>
                                        <p class="text-[9px] font-bold text-slate-400 mt-2" x-text="'Expires ' + bid.expiry"></p>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button class="p-3 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-xl hover:bg-slate-200 transition-all">
                                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                            </button>
                                            <button class="px-5 py-3 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-xl text-[10px] font-black uppercase tracking-widest hover:scale-105 transition-all">Counter</button>
                                            <button class="px-5 py-3 bg-primary text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-primary/20 hover:scale-105 transition-all">Accept</button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
function bidsExchange() {
    return {
        menuItems: [
            { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}' },
            { label: 'My Products', icon: 'inventory_2', route: '{{ route('farmer.products') }}' },
            { label: 'Bids Exchange', icon: 'gavel', route: '#', active: true, badge: '24' },
            { label: 'Logistics', icon: 'local_shipping', route: '{{ route('farmer.orders') }}' },
            { label: 'Gov MSP', icon: 'account_balance', route: '{{ route('gov.index') }}' },
        ],
        bids: [
            { id: 1, product: 'Premium Sharbati', lotId: 'LOT-W-9420', icon: 'grain', buyer: 'Reliance Retail', buyerLogo: 'https://logo.clearbit.com/reliance.com', rating: 5, reviews: 1240, amount: '2,480', totalVal: '6.2L', status: 'Highest Bid', expiry: 'in 4h 20m' },
            { id: 2, product: 'Organic Soybean', lotId: 'LOT-S-8812', icon: 'compost', buyer: 'ITC Limited', buyerLogo: 'https://logo.clearbit.com/itcportal.com', rating: 5, reviews: 850, amount: '4,950', totalVal: '5.9L', status: 'Active', expiry: 'in 12h 15m' },
            { id: 3, product: 'Long Staple Cotton', lotId: 'LOT-C-7241', icon: 'eco', buyer: 'Adani Wilmar', buyerLogo: 'https://logo.clearbit.com/adaniwilmar.com', rating: 4, reviews: 320, amount: '7,200', totalVal: '6.1L', status: 'Pending', expiry: 'in 1d 4h' },
            { id: 4, product: 'Hybrid Maize', lotId: 'LOT-M-3301', icon: 'grain', buyer: 'Godrej Agrovet', buyerLogo: 'https://logo.clearbit.com/godrejagrovet.com', rating: 5, reviews: 540, amount: '2,150', totalVal: '9.6L', status: 'Countered', expiry: 'in 2d 10h' }
        ],
        initCharts() {
            setTimeout(() => {
                const options = {
                    series: [{
                        name: 'Bid Count',
                        data: [12, 18, 15, 24, 21, 32, 28, 45, 38, 42, 55, 48]
                    }],
                    chart: {
                        height: 240,
                        type: 'line',
                        toolbar: { show: false },
                        sparkline: { enabled: false }
                    },
                    colors: ['#10B981'],
                    stroke: { curve: 'smooth', width: 4 },
                    xaxis: {
                        categories: ['12pm', '1pm', '2pm', '3pm', '4pm', '5pm', '6pm', '7pm', '8pm', '9pm', '10pm', '11pm'],
                        labels: { show: false },
                        axisBorder: { show: false },
                        axisTicks: { show: false }
                    },
                    yaxis: { show: false },
                    grid: { show: false },
                    tooltip: { theme: 'dark', x: { show: false } }
                };

                const chart = new ApexCharts(document.querySelector("#bidIntensityChart"), options);
                chart.render();
            }, 100);
        }
    }
}
</script>
@endpush
@endsection