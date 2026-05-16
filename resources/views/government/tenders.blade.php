@extends('layouts.stitch')

@section('title', 'Official Government Tender Marketplace - AgriMandiGov')

@section('content')
    <div x-data="tenderEngine()" class="min-h-screen bg-slate-50 selection:bg-emerald-500 selection:text-white">
        <!-- 🏛️ GOVERNMENT TICKER -->
        <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-[70] shadow-2xl">
            <div
                class="absolute left-0 top-0 bottom-0 px-6 bg-[#005137] flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
                <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
                <span class="font-black text-[11px] uppercase tracking-tighter">Live Tender Marketplace</span>
            </div>

            <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[220px]">
                <template x-for="tender in tenders" :key="tender.id">
                    <div
                        class="inline-flex items-center gap-4 px-8 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default">
                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest"
                            x-text="tender.commodity"></span>
                        <div class="flex items-center gap-2">
                            <span class="font-mono font-bold text-[13px]" x-text="'₹' + formatNumber(tender.price)"></span>
                            <div class="flex items-center gap-1 text-emerald-400">
                                <span class="material-symbols-outlined text-[16px]">groups</span>
                                <span class="font-mono text-[11px] font-black" x-text="tender.farmers + ' Join'"></span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- 📊 TENDERS HEADER -->
        <header
            class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-[60] h-24 flex items-center transition-all">
            <div class="max-w-[1440px] mx-auto w-full px-6 sm:px-8 lg:px-12 flex items-center justify-between">
                <div class="flex items-center gap-12">
                    <a href="{{ route('gov.index') }}" class="flex items-center gap-3 group">
                        <div
                            class="w-12 h-12 bg-[#005137] rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-900/20 transition-transform group-hover:scale-110">
                            <span class="material-symbols-outlined text-white text-[28px]">gavel</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-black text-slate-900 tracking-tighter leading-none">Govt <span
                                    class="text-emerald-600">Tenders</span></span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Agency
                                Procurement Marketplace</span>
                        </div>
                    </a>

                    <div class="h-10 w-px bg-slate-200 hidden lg:block"></div>

                    <nav class="hidden lg:flex items-center gap-8">
                        <a href="{{ route('gov.index') }}"
                            class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-emerald-600 transition-all">Overview</a>
                        <a href="{{ route('gov.msp') }}"
                            class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-emerald-600 transition-all">MSP
                            Rates</a>
                        <a href="{{ route('gov.tenders') }}"
                            class="text-[11px] font-black uppercase tracking-[0.2em] text-emerald-600 border-b-2 border-emerald-600 pb-1">Tenders</a>
                        <a href="{{ route('gov.centers') }}"
                            class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-emerald-600 transition-all">Centers</a>
                    </nav>
                </div>

                <div class="flex items-center gap-6">
                    <div class="hidden md:flex flex-col text-right mr-4">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Active Tenders</span>
                        <span class="text-[13px] font-black text-emerald-600" x-text="tenders.length + ' OPEN'"></span>
                    </div>
                    @include('components.nav-user-actions')
                </div>
            </div>
        </header>

        <main class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12 py-12 space-y-12">
            <!-- 🏔️ HERO ANALYTICS DASHBOARD -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-8 bg-slate-900 rounded-[64px] p-12 text-white relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-[600px] h-[600px] bg-emerald-500/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/4 transition-all group-hover:bg-emerald-500/20">
                    </div>
                    <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-12 h-full items-center">
                        <div class="space-y-2">
                            <p class="text-[11px] font-black text-emerald-500 uppercase tracking-[0.3em]">Total Procurement
                            </p>
                            <h3 class="text-6xl font-black tracking-tighter" x-text="'₹' + formatNumber(4250) + 'Cr'"></h3>
                            <p
                                class="text-[11px] font-bold text-white/40 uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Market Value
                            </p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-[11px] font-black text-white/40 uppercase tracking-[0.3em]">Active Farmers</p>
                            <h3 class="text-6xl font-black tracking-tighter" x-text="'1.4M'"></h3>
                            <p class="text-[11px] font-bold text-emerald-500 uppercase tracking-widest">▲ 12.4% INCREASE</p>
                        </div>
                        <div class="space-y-6">
                            <div class="p-6 bg-white/5 border border-white/10 rounded-[32px] backdrop-blur-xl">
                                <p class="text-[10px] font-black text-white/40 uppercase tracking-widest mb-2">Govt Agencies
                                </p>
                                <div class="flex -space-x-4">
                                    @foreach(['FCI', 'NAFED', 'HAFED', 'MSCP'] as $i => $ag)
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-800 border-2 border-slate-900 flex items-center justify-center text-[10px] font-black text-emerald-400 relative z-{{40 - $i}}">
                                            {{ $ag }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="lg:col-span-4 bg-white p-12 rounded-[64px] border border-slate-200 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[11px] font-black uppercase tracking-widest text-slate-400">Live
                                Activity</span>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Market Pulse.</h3>
                    </div>
                    <div class="space-y-4 py-8">
                        <template x-for="feed in liveFeed" :key="feed.id">
                            <div class="flex items-center gap-4 group animate-slideIn">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_#10B981]"></div>
                                <p class="text-[13px] font-bold text-slate-600 truncate" x-text="feed.message"></p>
                            </div>
                        </template>
                    </div>
                    <button
                        class="w-full py-4 bg-slate-50 border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-emerald-600 hover:border-emerald-500 transition-all">View
                        All Alerts</button>
                </div>
            </div>

            <!-- 🏷️ TENDERS EXPLORER -->
            <div class="space-y-8">
                <div class="flex flex-col md:flex-row justify-between items-end gap-8">
                    <div class="space-y-4">
                        <h2 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">Agency
                            <br />Marketplace.</h2>
                        <p class="text-lg text-slate-500 font-medium">Browse direct procurement tenders from official state
                            and central agencies.</p>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <div class="relative">
                            <input type="text" placeholder="Search tenders..."
                                class="px-8 py-4 bg-white border border-slate-200 rounded-[24px] text-[12px] font-bold text-slate-900 outline-none focus:ring-4 focus:ring-emerald-500/10 min-w-[300px] transition-all">
                            <span
                                class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        </div>
                        <div class="flex bg-slate-100 p-1.5 rounded-[24px] border border-slate-200">
                            <button
                                class="px-6 py-2.5 bg-white shadow-sm rounded-[20px] text-[11px] font-black uppercase tracking-widest text-slate-900">All
                                Tenders</button>
                            <button
                                class="px-6 py-2.5 rounded-[20px] text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-all">Wheat</button>
                            <button
                                class="px-6 py-2.5 rounded-[20px] text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-all">Paddy</button>
                        </div>
                    </div>
                </div>

                <!-- Tenders Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="tender in tenders" :key="tender.id">
                        <div
                            class="bg-white rounded-[48px] border border-slate-100 shadow-[0_10px_40px_rgba(0,0,0,0.02)] overflow-hidden group hover:shadow-2xl hover:border-emerald-500/20 transition-all duration-500">
                            <div class="p-10 space-y-8">
                                <div class="flex justify-between items-start">
                                    <div
                                        class="w-16 h-16 bg-slate-50 rounded-3xl flex items-center justify-center group-hover:bg-emerald-500 transition-all">
                                        <span
                                            class="material-symbols-outlined text-[32px] text-slate-400 group-hover:text-white"
                                            x-text="tender.icon"></span>
                                    </div>
                                    <div :class="tender.status === 'OPEN' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-rose-50 text-rose-600 border-rose-100'"
                                        class="px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest border flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full animate-pulse"
                                            :class="tender.status === 'OPEN' ? 'bg-emerald-500' : 'bg-rose-500'"></span>
                                        <span x-text="tender.status"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <p class="text-[10px] font-black text-emerald-600 uppercase tracking-[0.2em]"
                                        x-text="tender.agency"></p>
                                    <h3 class="text-2xl font-black text-slate-900 tracking-tighter"
                                        x-text="tender.commodity + ' Procurement'"></h3>
                                    <div
                                        class="flex items-center gap-2 text-slate-400 font-bold text-[11px] uppercase tracking-widest">
                                        <span class="material-symbols-outlined text-[16px]">location_on</span>
                                        <span x-text="tender.state + ', ' + tender.district"></span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 py-8 border-y border-slate-50">
                                    <div class="space-y-1">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Required
                                            Qty</p>
                                        <p class="text-xl font-black text-slate-900"
                                            x-text="formatNumber(tender.quantity) + ' MT'"></p>
                                    </div>
                                    <div class="space-y-1 text-right">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Offered
                                            Price</p>
                                        <p class="text-xl font-black text-emerald-600"
                                            x-text="'₹' + formatNumber(tender.price) + '/Q'"></p>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div
                                        class="flex justify-between items-center text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                        <span>Procurement Progress</span>
                                        <span class="text-emerald-600 font-black" x-text="tender.fulfilled + '%'"></span>
                                    </div>
                                    <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-emerald-500 rounded-full transition-all duration-1000"
                                            :style="'width: ' + tender.fulfilled + '%'"></div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4 pt-4">
                                    <button @click="openTender(tender)"
                                        class="flex-1 py-4 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-xl hover:bg-emerald-600 transition-all active:scale-95">View
                                        Intelligence</button>
                                    <a :href="'{{ route('gov.sell') }}?tender=' + tender.id"
                                        class="w-14 h-14 flex items-center justify-center bg-slate-50 border border-slate-200 rounded-2xl text-slate-400 hover:text-emerald-600 hover:border-emerald-500 transition-all">
                                        <span class="material-symbols-outlined">send</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </main>

        <!-- 🔍 TENDER DETAIL MODAL -->
        <div x-show="selectedTender" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm"
            style="display: none;" @click.self="selectedTender = null">

            <div class="bg-white rounded-[64px] w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col shadow-2xl relative"
                x-transition:enter="transition ease-out duration-500" x-transition:enter-start="translate-y-24 scale-95"
                x-transition:enter-end="translate-y-0 scale-100">

                <button @click="selectedTender = null"
                    class="absolute top-8 right-8 w-12 h-12 flex items-center justify-center bg-slate-50 rounded-2xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 transition-all z-10">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <div class="overflow-y-auto flex-1 p-12 lg:p-20 space-y-12">
                    <div class="flex flex-col md:flex-row justify-between items-start gap-12">
                        <div class="space-y-6 flex-1">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-16 h-16 bg-slate-50 rounded-3xl flex items-center justify-center text-emerald-600 border border-slate-100">
                                    <span class="material-symbols-outlined text-[36px]"
                                        x-text="selectedTender?.icon"></span>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-[11px] font-black text-emerald-600 uppercase tracking-widest"
                                        x-text="selectedTender?.agency"></p>
                                    <h2 class="text-4xl font-black text-slate-900 tracking-tighter"
                                        x-text="selectedTender?.commodity + ' Procurement Tender'"></h2>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-4">
                                <div
                                    class="px-5 py-2 bg-slate-50 rounded-xl text-[11px] font-black uppercase tracking-widest text-slate-500 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[16px]">fingerprint</span>
                                    <span x-text="'ID: ' + selectedTender?.tenderId"></span>
                                </div>
                                <div
                                    class="px-5 py-2 bg-emerald-50 rounded-xl text-[11px] font-black uppercase tracking-widest text-emerald-600 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[16px]">schedule</span>
                                    <span x-text="'Deadline: ' + selectedTender?.deadline"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="p-10 bg-slate-50 rounded-[48px] border border-slate-100 space-y-8">
                            <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Procurement Summary
                            </h4>
                            <div class="space-y-6">
                                <div class="flex justify-between items-end border-b border-slate-200 pb-4">
                                    <div>
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">
                                            Target Quantity</p>
                                        <p class="text-2xl font-black text-slate-900"
                                            x-text="formatNumber(selectedTender?.quantity) + ' MT'"></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">
                                            Fulfilled</p>
                                        <p class="text-2xl font-black text-emerald-600"
                                            x-text="selectedTender?.fulfilled + '%'"></p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Base
                                            Price</p>
                                        <p class="text-2xl font-black text-slate-900"
                                            x-text="'₹' + formatNumber(selectedTender?.price) + '/Q'"></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">
                                            Participating Farmers</p>
                                        <p class="text-2xl font-black text-slate-900"
                                            x-text="formatNumber(selectedTender?.farmers)"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-10 bg-slate-900 rounded-[48px] text-white space-y-8 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl"></div>
                            <h4 class="text-[11px] font-black text-white/40 uppercase tracking-widest">Market Recommendation
                            </h4>
                            <div class="space-y-6">
                                <p class="text-xl font-bold leading-relaxed">
                                    Demand for <span class="text-emerald-400" x-text="selectedTender?.commodity"></span> in
                                    <span x-text="selectedTender?.district"></span> is <span
                                        class="text-emerald-400">Stable</span>. Payout estimated within 48 hours.
                                </p>
                                <a :href="'{{ route('gov.sell') }}?tender=' + selectedTender?.id"
                                    class="w-full py-5 bg-emerald-500 text-white rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-2xl shadow-emerald-500/20 block text-center hover:bg-emerald-600 transition-all active:scale-95">Proceed
                                    to Application</a>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Assigned Procurement
                            Centers</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <template x-for="i in 4">
                                <div
                                    class="flex items-center gap-4 p-5 bg-white border border-slate-100 rounded-2xl shadow-sm">
                                    <div
                                        class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400">
                                        <span class="material-symbols-outlined">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-[13px] font-black text-slate-900"
                                            x-text="selectedTender?.district + ' Hub ' + i"></p>
                                        <p class="text-[10px] font-bold text-slate-400">Processing: 48 MT/Day</p>
                                    </div>
                                    <div class="flex-1 text-right">
                                        <span
                                            class="text-[9px] font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded">ACTIVE</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function tenderEngine() {
                return {
                    selectedTender: null,
                    tenders: [
                        { id: 1, tenderId: 'TND-2024-001', commodity: 'Wheat', agency: 'FCI India', state: 'Punjab', district: 'Ludhiana', quantity: 125000, price: 2475, status: 'OPEN', deadline: '12 Days', farmers: 4580, fulfilled: 68, icon: 'agriculture' },
                        { id: 2, tenderId: 'TND-2024-002', commodity: 'Paddy', agency: 'NAFED', state: 'Haryana', district: 'Karnal', quantity: 85000, price: 2310, status: 'OPEN', deadline: '8 Days', farmers: 3120, fulfilled: 42, icon: 'grass' },
                        { id: 3, tenderId: 'TND-2024-003', commodity: 'Cotton', agency: 'CCI', state: 'Gujarat', district: 'Rajkot', quantity: 45000, price: 7020, status: 'CLOSING SOON', deadline: '2 Days', farmers: 1850, fulfilled: 92, icon: 'filter_vintage' },
                        { id: 4, tenderId: 'TND-2024-004', commodity: 'Soybean', agency: 'MSCP', state: 'MP', district: 'Indore', quantity: 65000, price: 4600, status: 'OPEN', deadline: '15 Days', farmers: 2400, fulfilled: 25, icon: 'eco' },
                        { id: 5, tenderId: 'TND-2024-005', commodity: 'Mustard', agency: 'HAFED', state: 'Rajasthan', district: 'Alwar', quantity: 55000, price: 5650, status: 'OPEN', deadline: '10 Days', farmers: 2100, fulfilled: 58, icon: 'spa' }
                    ],
                    liveFeed: [
                        { id: 1, message: 'New Wheat tender opened in Ludhiana, Punjab (125k Tons)' },
                        { id: 2, message: '540 Farmers joined NAFED Paddy tender in Karnal' },
                        { id: 3, message: 'Mustard procurement in Rajasthan reached 58% fulfillment' }
                    ],
                    init() {
                        setInterval(() => {
                            this.tenders.forEach(t => {
                                if (t.status === 'OPEN') {
                                    if (Math.random() > 0.7) {
                                        t.farmers += Math.floor(Math.random() * 10);
                                        t.fulfilled = Math.min(100, t.fulfilled + (Math.random() * 0.1));
                                        t.fulfilled = parseFloat(t.fulfilled.toFixed(1));
                                    }
                                }
                            });

                            // Update Feed
                            const msgs = [
                                'Farmer group in MP submitted 200 Tons of Soybean',
                                'FCI increased procurement target for Punjab Wheat',
                                'New quality standards released for Cotton Grade A',
                                'Payment processed for 1,200 farmers in Haryana'
                            ];
                            this.liveFeed.unshift({ id: Date.now(), message: msgs[Math.floor(Math.random() * msgs.length)] });
                            if (this.liveFeed.length > 5) this.liveFeed.pop();
                        }, 4000);
                    },
                    openTender(tender) {
                        this.selectedTender = tender;
                    },
                    formatNumber(num) {
                        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            }
        </script>
        <style>
            @keyframes marquee {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
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
                from {
                    opacity: 0;
                    transform: translateX(20px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .animate-slideIn {
                animation: slideIn 0.5s ease-out forwards;
            }
        </style>
    @endpush
@endsection