@extends('layouts.stitch')

@section('title', 'Logistics Intelligence Hub - AgriMandi')

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
    .shipment-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .shipment-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
    }
    .progress-bar-glow {
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.4);
    }
    @keyframes truck-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-4px); }
    }
    .truck-animate {
        animation: truck-bounce 2s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
<div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" 
     x-data="logisticsHub()">
    
    <!-- 🏢 ENTERPRISE SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
        <div class="flex flex-col gap-4 mb-12">
            <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-40 w-auto object-contain self-start mix-blend-multiply">
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span></h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Logistics Hub</p>
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
                </a>
            </template>
        </nav>

        <!-- Sidebar Activity Context -->
        <div class="mt-auto p-6 bg-slate-100 dark:bg-slate-900 rounded-3xl space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                <span class="text-[10px] font-black text-slate-900 dark:text-white uppercase tracking-widest">Active Movement</span>
            </div>
            <p class="text-[11px] text-slate-500 font-medium leading-tight">3 shipments are currently in transit. All drivers are on schedule.</p>
            <button class="w-full py-3 bg-white dark:bg-slate-800 text-slate-900 dark:text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm">Fleet Map</button>
        </div>
    </aside>

    <!-- 🚀 MAIN LOGISTICS INTERFACE -->
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
                    <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight">Fulfillment Intelligence</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tracking 4 Active Shipments</p>
                </div>
                <div class="h-8 w-px bg-slate-200 dark:border-slate-800 hidden md:block"></div>
                <div class="hidden md:flex items-center gap-6">
                    <div class="flex flex-col text-center">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">On Schedule</p>
                        <p class="text-lg font-black text-emerald-500">100%</p>
                    </div>
                    <div class="flex flex-col text-center">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Pending Payout</p>
                        <p class="text-lg font-black text-slate-900 dark:text-white">₹14.2L</p>
                    </div>
                </div>
            </div>
            @include('components.nav-user-actions')
        </header>

        <!-- LOGISTICS CONTENT -->
        <div class="p-8 space-y-8">
            <!-- Summary Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <template x-for="stat in summaryStats" :key="stat.label">
                    <div class="p-8 bg-white dark:bg-slate-900 rounded-[40px] border border-slate-200 dark:border-slate-800 space-y-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center" :class="stat.color">
                            <span class="material-symbols-outlined filled" x-text="stat.icon"></span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest" x-text="stat.label"></p>
                            <p class="text-3xl font-black text-slate-900 dark:text-white" x-text="stat.value"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- ACTIVE SHIPMENTS -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                <template x-for="shipment in shipments" :key="shipment.id">
                    <div class="shipment-card bg-white dark:bg-slate-900 rounded-[48px] p-8 border border-slate-200 dark:border-slate-800 space-y-8 flex flex-col shadow-sm">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-slate-100 dark:bg-slate-800 rounded-3xl flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-[32px] filled" x-text="shipment.icon"></span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-black text-slate-900 dark:text-white tracking-tight" x-text="shipment.product"></h4>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest" x-text="shipment.id"></p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="px-4 py-2 bg-primary/10 text-primary rounded-full text-[10px] font-black uppercase tracking-widest" x-text="shipment.status"></div>
                                <p class="text-[9px] font-bold text-slate-400 mt-2" x-text="'ETA: ' + shipment.eta"></p>
                            </div>
                        </div>

                        <!-- Logistics Timeline -->
                        <div class="relative py-4">
                            <div class="absolute left-0 right-0 top-1/2 h-1 bg-slate-100 dark:bg-slate-800 rounded-full -translate-y-1/2"></div>
                            <div class="absolute left-0 top-1/2 h-1 bg-primary progress-bar-glow rounded-full -translate-y-1/2 transition-all duration-1000" :style="'width: ' + shipment.progress + '%'"></div>
                            
                            <div class="relative flex justify-between">
                                <template x-for="(step, index) in timelineSteps" :key="index">
                                    <div class="flex flex-col items-center gap-2">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center z-10 transition-colors duration-500"
                                             :class="shipment.progress >= (index * 33.3) ? 'bg-primary text-white shadow-lg' : 'bg-slate-100 dark:bg-slate-800 text-slate-400'">
                                            <span class="material-symbols-outlined text-[18px] filled" x-text="step.icon"></span>
                                        </div>
                                        <p class="text-[9px] font-black uppercase tracking-widest" :class="shipment.progress >= (index * 33.3) ? 'text-slate-900 dark:text-white' : 'text-slate-400'" x-text="step.label"></p>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="p-6 bg-slate-50 dark:bg-slate-800 rounded-3xl space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-white dark:bg-slate-700 rounded-xl flex items-center justify-center text-slate-400">
                                        <span class="material-symbols-outlined filled text-[20px]">person</span>
                                    </div>
                                    <div>
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Driver Info</p>
                                        <p class="text-xs font-black text-slate-900 dark:text-white" x-text="shipment.driver"></p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-white dark:bg-slate-700 rounded-xl flex items-center justify-center text-slate-400">
                                        <span class="material-symbols-outlined filled text-[20px]">local_shipping</span>
                                    </div>
                                    <div>
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Vehicle</p>
                                        <p class="text-xs font-black text-slate-900 dark:text-white" x-text="shipment.vehicle"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-3xl flex flex-col justify-between">
                                <div class="space-y-1">
                                    <p class="text-[8px] font-black text-white/50 dark:text-slate-400 uppercase tracking-widest">Destination Hub</p>
                                    <p class="text-sm font-black tracking-tight" x-text="shipment.destination"></p>
                                </div>
                                <button class="w-full py-3 bg-white/10 dark:bg-slate-100 rounded-xl text-[9px] font-black uppercase tracking-widest flex items-center justify-center gap-2 group">
                                    Live Track <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- DOCUMENTATION CENTER -->
            <div class="bg-white dark:bg-slate-900 rounded-[48px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Documentation Center</h4>
                        <p class="text-xs text-slate-400 font-medium">Verify invoices, quality certs, and transportation permits.</p>
                    </div>
                    <button class="px-6 py-3 bg-slate-50 dark:bg-slate-800 rounded-2xl text-[10px] font-black uppercase tracking-widest">View All Docs</button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <template x-for="doc in documents" :key="doc.id">
                        <div class="p-6 bg-slate-50 dark:bg-slate-800 rounded-3xl border border-transparent hover:border-primary/20 transition-all cursor-pointer group">
                            <div class="w-12 h-12 bg-white dark:bg-slate-700 rounded-2xl flex items-center justify-center text-slate-400 mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                                <span class="material-symbols-outlined text-[24px]" x-text="doc.icon"></span>
                            </div>
                            <h5 class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-widest" x-text="doc.name"></h5>
                            <p class="text-[10px] font-bold text-slate-400 mt-1" x-text="doc.id"></p>
                            <div class="mt-6 flex items-center justify-between">
                                <span class="text-[9px] font-black text-emerald-500 uppercase">Verified</span>
                                <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">download</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
function logisticsHub() {
    return {
        menuItems: [
            { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}' },
            { label: 'My Products', icon: 'inventory_2', route: '{{ route('farmer.products') }}' },
            { label: 'Bids Exchange', icon: 'gavel', route: '{{ route('farmer.bids') }}' },
            { label: 'Logistics', icon: 'local_shipping', route: '#', active: true },
            { label: 'Gov MSP', icon: 'account_balance', route: '{{ route('gov.index') }}' },
        ],
        summaryStats: [
            { label: 'In Transit', value: '03', icon: 'local_shipping', color: 'bg-indigo-500/10 text-indigo-500' },
            { label: 'Pending Pickup', value: '01', icon: 'package_2', color: 'bg-amber-500/10 text-amber-500' },
            { label: 'Delivered (30d)', value: '18', icon: 'check_circle', color: 'bg-emerald-500/10 text-emerald-500' },
            { label: 'Revenue Locked', value: '₹14.2L', icon: 'lock', color: 'bg-slate-900/10 dark:bg-white/10 text-slate-900 dark:text-white' }
        ],
        timelineSteps: [
            { label: 'Farm Gate', icon: 'agriculture' },
            { label: 'Processing', icon: 'factory' },
            { label: 'In Transit', icon: 'local_shipping' },
            { label: 'Delivered', icon: 'verified' }
        ],
        shipments: [
            { id: 'SHP-9420-W', product: 'Premium Sharbati Wheat', icon: 'grain', status: 'In Transit', progress: 65, eta: '4h 20m', driver: 'Rajesh Kumar', vehicle: 'MH-12-AQ-9420', destination: 'Reliance Central Hub, Mumbai' },
            { id: 'SHP-8812-S', product: 'Organic Soybean JS-335', icon: 'compost', status: 'Loading', progress: 15, eta: 'Tomorrow, 10am', driver: 'Suresh Patil', vehicle: 'MP-09-RT-8812', destination: 'ITC Processing Facility, Indore' },
        ],
        documents: [
            { id: 'INV-44201', name: 'Sales Invoice', icon: 'description' },
            { id: 'CERT-9902', name: 'Quality Certificate', icon: 'verified' },
            { id: 'PERM-1120', name: 'Transport Permit', icon: 'article' },
            { id: 'QR-SHIP-1', name: 'Shipment QR', icon: 'qr_code_2' }
        ]
    }
}
</script>
@endpush
@endsection