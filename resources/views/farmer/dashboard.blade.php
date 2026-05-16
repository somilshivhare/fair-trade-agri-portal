@extends('layouts.stitch')

@section('title', 'Farmer Intelligence Command Center - AgriMandi')

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
    .stats-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .stats-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    @keyframes pulse-soft {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.05); opacity: 0.8; }
    }
    .live-indicator {
        animation: pulse-soft 2s infinite;
    }
    .mandi-ticker-wrap {
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }
</style>
@endpush

@section('content')
<div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" 
     x-data="farmerDashboard()" 
     x-init="initCharts()">
    
    <!-- 🏢 ENTERPRISE SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
        <div class="flex flex-col gap-6 mb-12">
            <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-40 w-auto object-contain self-start mix-blend-multiply">
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span></h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Farmer Intelligence</p>
            </div>
        </div>

        <nav class="flex-1 space-y-2">
            <template x-for="item in menuItems" :key="item.label">
                <a :href="item.route" 
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
                <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                <span class="text-[10px] font-black text-primary uppercase tracking-widest">Market Status: Open</span>
            </div>
            <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">Bidding is active in your region. 4 buyers are currently looking for Wheat.</p>
            <button class="w-full py-3 bg-white dark:bg-slate-900 text-slate-900 dark:text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm hover:shadow-md transition-all">Quick Report</button>
        </div>
    </aside>

    <!-- 🚀 MAIN COMMAND INTERFACE -->
    <main class="flex-1 min-w-0 flex flex-col">
        <!-- TOP INTELLIGENCE BAR -->
        <header class="h-24 sticky top-0 z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-3xl border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 shadow-none">
            <div class="flex items-center gap-8 flex-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-slate-500 hover:text-primary transition-all duration-300 group">
                    <div class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-900 flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                    </div>
                    <span class="text-[12px] font-black uppercase tracking-widest hidden sm:block">Back to Home</span>
                </a>
                <div class="h-10 w-px bg-slate-200 dark:bg-slate-800 mx-2"></div>

                <div class="hidden md:flex flex-col">
                    <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight">Farmer Control Center</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Global GAP Certified: #AG-9420</p>
                </div>
                
            </div>

            <div class="flex items-center gap-4">
                <!-- Weather Widget -->
                <div class="hidden md:flex items-center gap-3 px-4 py-2 bg-indigo-500/5 rounded-2xl border border-indigo-500/10 shadow-none">
                    <span class="material-symbols-outlined text-indigo-500">wb_sunny</span>
                    <div class="text-left">
                        <p class="text-[10px] font-black text-indigo-500/60 uppercase">Indore, MP</p>
                        <p class="text-xs font-bold text-slate-900 dark:text-white">32°C • Mostly Sunny</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2">
                    <div class="h-12 w-px bg-slate-200 dark:border-slate-800 mx-2"></div>
                    @include('components.nav-user-actions')
                </div>
            </div>
        </header>

        <!-- DASHBOARD CONTENT -->
        <div class="p-8 space-y-8">
            <!-- 👋 WELCOME HERO -->
            <section class="relative rounded-[48px] bg-slate-900 dark:bg-white p-12 overflow-hidden shadow-2xl">
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, #10B981 1px, transparent 0); background-size: 40px 40px;"></div>
                <div class="absolute top-0 right-0 w-[600px] h-full bg-gradient-to-l from-primary/30 to-transparent"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 items-center gap-12">
                    <div class="space-y-8">
                        <div class="inline-flex items-center gap-3 px-5 py-2 bg-primary/20 backdrop-blur-xl rounded-full border border-primary/30">
                            <span class="flex h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-primary">Live Auction Intelligence Active</span>
                        </div>
                        <h1 class="text-5xl md:text-6xl font-black text-white dark:text-slate-900 tracking-tighter leading-tight">
                            Harvest Season <span class="text-primary">Peak Performance.</span>
                        </h1>
                        <p class="text-lg text-slate-400 dark:text-slate-500 font-medium max-w-xl">
                            Your farm is currently outperforming regional averages by <span class="text-white dark:text-slate-900 font-bold">14.2%</span>. Buyers from 4 states are actively bidding on your Soybeans.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('farmer.products.add') }}" class="px-8 py-4 bg-primary text-white rounded-2xl font-black text-[12px] uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-105 active:scale-95 transition-all">List New Harvest</a>
                            <a href="{{ route('gov.sell') }}" class="px-8 py-4 bg-white/10 dark:bg-slate-100 text-white dark:text-slate-900 rounded-2xl font-black text-[12px] uppercase tracking-widest border border-white/10 hover:bg-white/20 transition-all">MSP Procurement</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-8 bg-white/5 dark:bg-slate-50 rounded-[40px] border border-white/10 space-y-4">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Projected Payout</p>
                            <p class="text-4xl font-black text-white dark:text-slate-900">₹8.4L</p>
                            <div class="flex items-center gap-2 text-emerald-400 text-xs font-bold">
                                <span class="material-symbols-outlined text-[18px]">trending_up</span>
                                +₹1.2L vs last season
                            </div>
                        </div>
                        <div class="p-8 bg-white/5 dark:bg-slate-50 rounded-[40px] border border-white/10 space-y-4">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Active Bidders</p>
                            <p class="text-4xl font-black text-white dark:text-slate-900">12</p>
                            <div class="flex -space-x-3 overflow-hidden">
                                <template x-for="i in 4">
                                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-slate-900 dark:ring-white" :src="'https://i.pravatar.cc/100?u=' + i" alt="">
                                </template>
                                <div class="flex items-center justify-center h-8 w-8 rounded-full bg-primary text-[10px] font-black text-white ring-2 ring-slate-900 dark:ring-white">+8</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 📊 ANALYTICS & INSIGHTS -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Main Revenue Chart -->
                <div class="lg:col-span-8 bg-white dark:bg-slate-900 rounded-[40px] p-8 border border-slate-200 dark:border-slate-800 space-y-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-black text-slate-900 dark:text-white">Revenue Analytics</h4>
                            <p class="text-xs text-slate-400 font-medium">Seasonal performance tracking & market forecasting</p>
                        </div>
                        <select class="bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-xs font-black uppercase tracking-widest px-4 py-2 outline-none">
                            <option>Last 12 Months</option>
                            <option>Current Season</option>
                        </select>
                    </div>
                    <div id="revenueChart" class="w-full h-80"></div>
                </div>

                <!-- Live Market Ticker Sidebar -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- AI RECOMMENDATION -->
                    <div class="bg-indigo-600 rounded-[40px] p-8 text-white space-y-6 relative overflow-hidden group">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="flex items-center gap-4 relative z-10">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <span class="material-symbols-outlined filled">psychology</span>
                            </div>
                            <h5 class="text-sm font-black uppercase tracking-widest">AI Farming Insight</h5>
                        </div>
                        <p class="text-lg font-bold leading-tight relative z-10">Hold your Wheat stock for 12 more days. Prices in Indore Mandi are predicted to jump by <span class="text-emerald-400 font-black">₹180/q</span> due to export demand.</p>
                        <button class="w-full py-4 bg-white text-indigo-600 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-xl hover:scale-105 transition-all">View Full Analysis</button>
                    </div>

                    <!-- RECENT BID ACTIVITY -->
                    <div class="bg-white dark:bg-slate-900 rounded-[40px] p-8 border border-slate-200 dark:border-slate-800 space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-widest">Live Bid Activity</h4>
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-ping"></span>
                        </div>
                        <div class="space-y-4">
                            <template x-for="bid in recentBids" :key="bid.id">
                                <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-transparent hover:border-primary/20 transition-all cursor-pointer">
                                    <div class="flex items-center gap-3">
                                        <img :src="bid.buyerLogo" class="w-10 h-10 rounded-xl bg-white p-1 border border-slate-100" />
                                        <div>
                                            <p class="text-xs font-black text-slate-900 dark:text-white" x-text="bid.buyer"></p>
                                            <p class="text-[9px] font-bold text-slate-400 uppercase" x-text="bid.product"></p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs font-black text-primary" x-text="'₹' + bid.amount + '/q'"></p>
                                        <p class="text-[9px] font-bold text-slate-400" x-text="bid.time"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <button class="w-full py-3 text-primary text-[10px] font-black uppercase tracking-widest hover:bg-primary/5 rounded-xl transition-all">View All Bids</button>
                    </div>
                </div>
            </div>

            <!-- 📦 INVENTORY & LOGISTICS -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- My Active Harvests -->
                <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-[40px] p-8 border border-slate-200 dark:border-slate-800 space-y-8">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Active Harvest Inventory</h4>
                        <a href="{{ route('farmer.products') }}" class="text-primary text-[11px] font-black uppercase tracking-widest hover:underline">Manage All</a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <template x-for="crop in inventory" :key="crop.id">
                            <div class="group p-6 bg-slate-50 dark:bg-slate-800/30 rounded-3xl border border-transparent hover:border-primary/20 hover:bg-white dark:hover:bg-slate-800 transition-all duration-500">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 bg-white dark:bg-slate-700 rounded-2xl flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
                                            <span class="material-symbols-outlined text-[32px] filled" x-text="crop.icon"></span>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider" x-text="crop.name"></h5>
                                            <p class="text-xs text-slate-400 font-bold" x-text="crop.variety"></p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Quality Grade</p>
                                        <p class="text-lg font-black text-emerald-500" x-text="crop.grade"></p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4 mb-6">
                                    <div class="p-3 bg-white dark:bg-slate-900 rounded-2xl space-y-1">
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest text-center">Stock</p>
                                        <p class="text-xs font-black text-slate-900 dark:text-white text-center" x-text="crop.stock + 'q'"></p>
                                    </div>
                                    <div class="p-3 bg-white dark:bg-slate-900 rounded-2xl space-y-1">
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest text-center">Moisture</p>
                                        <p class="text-xs font-black text-slate-900 dark:text-white text-center" x-text="crop.moisture + '%'"></p>
                                    </div>
                                    <div class="p-3 bg-white dark:bg-slate-900 rounded-2xl space-y-1">
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest text-center">MSP</p>
                                        <p class="text-xs font-black text-slate-900 dark:text-white text-center" x-text="'₹' + crop.msp"></p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="flex-1 py-3 bg-primary text-white rounded-xl text-[9px] font-black uppercase tracking-widest shadow-lg shadow-primary/20">Active Bids (4)</button>
                                    <button class="p-3 bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-xl hover:bg-slate-300 transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Ongoing Deliveries -->
                <div class="bg-white dark:bg-slate-900 rounded-[40px] p-8 border border-slate-200 dark:border-slate-800 space-y-8">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Active Logistics</h4>
                        <span class="material-symbols-outlined text-slate-400">local_shipping</span>
                    </div>
                    <div class="space-y-6">
                        <template x-for="shipment in shipments" :key="shipment.id">
                            <div class="p-6 bg-slate-50 dark:bg-slate-800/30 rounded-3xl space-y-4 border border-transparent hover:border-primary/20 transition-all">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-[10px] font-black text-primary uppercase tracking-widest" x-text="shipment.status"></p>
                                        <p class="text-sm font-black text-slate-900 dark:text-white" x-text="shipment.id"></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">ETA</p>
                                        <p class="text-xs font-black text-slate-900 dark:text-white" x-text="shipment.eta"></p>
                                    </div>
                                </div>
                                <!-- Progress Bar -->
                                <div class="h-1.5 w-full bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-primary rounded-full transition-all duration-1000" :style="'width: ' + shipment.progress + '%'"></div>
                                </div>
                                <div class="flex items-center justify-between text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    <span x-text="shipment.origin"></span>
                                    <span x-text="shipment.destination"></span>
                                </div>
                                <button class="w-full py-3 bg-white dark:bg-slate-800 text-slate-900 dark:text-white rounded-xl text-[9px] font-black uppercase tracking-widest shadow-sm">Track Movement</button>
                            </div>
                        </template>
                    </div>
                    <div class="p-6 bg-primary/5 rounded-3xl border border-dashed border-primary/20 flex flex-col items-center justify-center gap-2 text-center">
                        <p class="text-[10px] font-black text-primary uppercase tracking-widest">New Order Coming In</p>
                        <p class="text-xs text-slate-500 font-medium leading-tight">Request for 500q Wheat from Jaipur. Logistics ready.</p>
                        <button class="mt-2 px-6 py-2 bg-primary text-white rounded-full text-[9px] font-black uppercase tracking-widest">Review Order</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Mobile FAB -->
    <a href="{{ route('farmer.products.add') }}" 
       class="fixed bottom-8 right-8 lg:hidden w-16 h-16 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center z-[100] active:scale-95 transition-transform">
        <span class="material-symbols-outlined text-3xl">add</span>
    </a>
</div>

@push('scripts')
<script>
function farmerDashboard() {
    return {
        menuItems: [
            { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}', active: true },
            { label: 'My Products', icon: 'inventory_2', route: '{{ route('farmer.products') }}', active: false, badge: '12' },
            { label: 'Bids Exchange', icon: 'gavel', route: '{{ route('farmer.bids') }}', active: false, badge: '4' },
            { label: 'Logistics', icon: 'local_shipping', route: '{{ route('farmer.orders') }}', active: false },
            { label: 'Gov MSP', icon: 'account_balance', route: '{{ route('gov.index') }}', active: false },
            { label: 'KYC Status', icon: 'verified_user', route: '{{ route('farmer.kyc') }}', active: false },
            { label: 'Profile Settings', icon: 'settings', route: '{{ route('profile') }}', active: false },
        ],
        mandiTicker: [
            { name: 'Wheat (Indore)', price: '2,480', change: '+1.2', trend: 'up' },
            { name: 'Soybean (Dewas)', price: '4,950', change: '-0.4', trend: 'down' },
            { name: 'Onion (Nashik)', price: '3,200', change: '+5.8', trend: 'up' },
            { name: 'Mustard (Kota)', price: '5,150', change: '+0.2', trend: 'up' },
            { name: 'Cotton (Rajkot)', price: '7,400', change: '-1.1', trend: 'down' }
        ],
        recentBids: [
            { id: 1, buyer: 'Reliance Retail', buyerLogo: 'https://logo.clearbit.com/reliance.com', product: 'Wheat Lot #A24', amount: '2,480', time: '2m ago' },
            { id: 2, buyer: 'ITC Limited', buyerLogo: 'https://logo.clearbit.com/itcportal.com', product: 'Soybean Lot #S12', amount: '4,950', time: '15m ago' },
            { id: 3, buyer: 'Adani Wilmar', buyerLogo: 'https://logo.clearbit.com/adaniwilmar.com', product: 'Mustard Lot #M05', amount: '5,200', time: '1h ago' }
        ],
        inventory: [
            { id: 1, name: 'Premium Wheat', variety: 'Sarbati Grade A', icon: 'grain', grade: 'A+', stock: '250', moisture: '10.2', msp: '2,275' },
            { id: 2, name: 'Organic Soybean', variety: 'JS-335', icon: 'compost', grade: 'A', stock: '120', moisture: '9.8', msp: '4,600' }
        ],
        shipments: [
            { id: 'SHP-9420-W', status: 'In Transit', progress: 65, eta: '4h 20m', origin: 'Farm Gate', destination: 'Reliance Hub' },
            { id: 'SHP-8812-S', status: 'Loading', progress: 15, eta: 'Tomorrow', origin: 'Indore Wh.', destination: 'ITC Facility' }
        ],
        initCharts() {
            setTimeout(() => {
                const options = {
                    series: [{
                        name: 'Revenue',
                        data: [31000, 40000, 28000, 51000, 42000, 109000, 100000, 120000, 85000, 95000, 110000, 150000]
                    }],
                    chart: {
                        height: 320,
                        type: 'area',
                        toolbar: { show: false },
                        sparkline: { enabled: false },
                        fontFamily: 'Manrope, sans-serif'
                    },
                    colors: ['#10B981'],
                    dataLabels: { enabled: false },
                    stroke: { curve: 'smooth', width: 4 },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.45,
                            opacityTo: 0.05,
                            stops: [20, 100]
                        }
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        axisBorder: { show: false },
                        axisTicks: { show: false },
                        labels: { style: { colors: '#94a3b8', fontWeight: 700, fontSize: '10px' } }
                    },
                    yaxis: {
                        labels: { 
                            style: { colors: '#94a3b8', fontWeight: 700, fontSize: '10px' },
                            formatter: (val) => '₹' + (val/1000) + 'K'
                        }
                    },
                    grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
                    tooltip: { theme: 'dark', x: { show: false } }
                };

                const chart = new ApexCharts(document.querySelector(\"#revenueChart\"), options);
                chart.render();
            }, 100);
        }
    }
}
</script>
@endpush
@endsection