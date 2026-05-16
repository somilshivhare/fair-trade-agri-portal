@extends('layouts.stitch')

@section('title', 'Official Government Procurement Centers - AgriMandiGov')

@section('content')
<div x-data="centerEngine()" class="min-h-screen bg-slate-50 selection:bg-emerald-500 selection:text-white pb-32">
    <!-- 🏛️ GOVERNMENT STATUS TICKER -->
    <div class="bg-slate-900 text-white h-12 overflow-hidden flex items-center relative z-[70] shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-[#005137] flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[11px] uppercase tracking-tighter">Live Center Operations</span>
        </div>
        
        <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[220px]">
            <template x-for="center in centers" :key="center.id">
                <div class="inline-flex items-center gap-4 px-8 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest" x-text="center.name"></span>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-black" :class="getQueueColor(center.queueLoad)" x-text="'QUEUE: ' + center.queueLoad + '%'"></span>
                        <div class="w-1.5 h-1.5 rounded-full" :class="center.status === 'ACTIVE' ? 'bg-emerald-500' : 'bg-rose-500'"></div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- 📊 CENTERS HEADER -->
    <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200/60 sticky top-0 z-[60] h-24 flex items-center transition-all">
        <div class="max-w-[1440px] mx-auto w-full px-6 sm:px-8 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-12">
                <a href="{{ route('gov.index') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-[#005137] rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-900/20 transition-transform group-hover:scale-110">
                        <span class="material-symbols-outlined text-white text-[28px]">hub</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black text-slate-900 tracking-tighter leading-none">Procurement <span class="text-emerald-600">Centers</span></span>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Real-Time Logistics Monitoring</span>
                    </div>
                </a>
                
                <div class="h-10 w-px bg-slate-200 hidden lg:block"></div>
                
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('gov.index') }}" class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-emerald-600 transition-all">Overview</a>
                    <a href="{{ route('gov.msp') }}" class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-emerald-600 transition-all">MSP Rates</a>
                    <a href="{{ route('gov.tenders') }}" class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-emerald-600 transition-all">Tenders</a>
                    <a href="{{ route('gov.centers') }}" class="text-[11px] font-black uppercase tracking-[0.2em] text-emerald-600 border-b-2 border-emerald-600 pb-1">Centers</a>
                </nav>
            </div>

            <div class="flex items-center gap-6">
                <div class="hidden md:flex flex-col text-right mr-4">
                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Active Network</span>
                    <span class="text-[13px] font-black text-emerald-600">1,450+ OPERATIONAL</span>
                </div>
                @include('components.nav-user-actions')
            </div>
        </div>
    </header>

    <main class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12 py-12 space-y-12">
        <!-- 🏔️ CENTERS HERO ANALYTICS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white p-10 rounded-[48px] border border-slate-200 shadow-sm space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-widest">System Health</h3>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Daily Capacity</p>
                            <p class="text-4xl font-black text-slate-900 tracking-tighter">84,000 <span class="text-lg font-bold text-slate-300">MT</span></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Avg. Processing Time</p>
                            <p class="text-4xl font-black text-emerald-600 tracking-tighter">42 <span class="text-lg font-bold text-emerald-200">Mins</span></p>
                        </div>
                        <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Active Staff</p>
                                <p class="text-xl font-black text-slate-900">12.5k</p>
                            </div>
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Verified Centers</p>
                                <p class="text-xl font-black text-slate-900">100%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🗺️ REAL-TIME GOOGLE MAP INTEGRATION -->
            <div class="lg:col-span-8 bg-slate-900 rounded-[64px] overflow-hidden group shadow-2xl relative">
                <div class="absolute inset-0 z-10 pointer-events-none border-[24px] border-slate-900 rounded-[64px]"></div>
                <div class="absolute top-12 left-12 z-20 space-y-4">
                    <div class="bg-slate-900/80 backdrop-blur-md px-6 py-3 rounded-2xl border border-white/10 inline-flex items-center gap-3">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-white uppercase tracking-widest">Live Satellite Sync</span>
                    </div>
                </div>
                
                <div class="w-full h-full min-h-[560px] grayscale brightness-75 contrast-125 opacity-80 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-1000">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 560px;" 
                        loading="lazy" 
                        allowfullscreen 
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=REPLACE_WITH_ACTUAL_API_KEY&q=India&center=20.5937,78.9629&zoom=5&maptype=satellite">
                    </iframe>
                    <!-- Fallback if no key is provided - using a high-fidelity stylized iframe -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14016.5684443916!2d77.2090212!3d28.6139391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sin!4v1715560000000!5m2!1sen!2sin" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 560px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        class="absolute inset-0">
                    </iframe>
                </div>

                <div class="absolute bottom-12 left-12 right-12 z-20">
                    <div class="bg-slate-900/80 backdrop-blur-2xl p-8 rounded-[40px] border border-white/10 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="w-14 h-14 bg-emerald-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-emerald-500/20">
                                <span class="material-symbols-outlined text-[28px]">explore</span>
                            </div>
                            <div class="text-left">
                                <h3 class="text-xl font-black text-white tracking-tighter">National Hub Connectivity.</h3>
                                <p class="text-white/40 text-xs font-medium tracking-wide">Monitoring center activity across all 28 states in real-time.</p>
                            </div>
                        </div>
                        <div class="hidden md:flex gap-4">
                            <div class="flex flex-col items-end">
                                <span class="text-[9px] font-black text-emerald-500 uppercase tracking-widest mb-1">Active Hubs</span>
                                <span class="text-xl font-black text-white">1,420</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🏢 CENTERS EXPLORER -->
        <div class="space-y-12">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8">
                <div class="space-y-4">
                    <h2 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">Center <br/>Directory.</h2>
                    <p class="text-lg text-slate-500 font-medium">Locate and monitor procurement centers with live queue analytics.</p>
                </div>
                <div class="flex flex-wrap gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Search by district..." class="px-8 py-4 bg-white border border-slate-200 rounded-[24px] text-[12px] font-bold text-slate-900 outline-none focus:ring-4 focus:ring-emerald-500/10 min-w-[300px] transition-all shadow-none">
                        <span class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    </div>
                    <div class="flex bg-slate-100 p-1.5 rounded-[24px] border border-slate-200">
                        <button class="px-6 py-2.5 bg-white shadow-sm rounded-[20px] text-[11px] font-black uppercase tracking-widest text-slate-900">All Status</button>
                        <button class="px-6 py-2.5 rounded-[20px] text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600">Low Queue</button>
                        <button class="px-6 py-2.5 rounded-[20px] text-[11px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600">Nearest</button>
                    </div>
                </div>
            </div>

            <!-- Centers Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <template x-for="center in centers" :key="center.id">
                    <div class="bg-white rounded-[48px] border border-slate-100 shadow-[0_10px_40px_rgba(0,0,0,0.02)] p-10 group hover:shadow-2xl hover:border-emerald-500/20 hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between h-full">
                        <div class="space-y-8">
                            <div class="flex justify-between items-start">
                                <div class="w-16 h-16 bg-slate-50 rounded-3xl flex items-center justify-center group-hover:bg-emerald-500 transition-all">
                                    <span class="material-symbols-outlined text-[32px] text-slate-400 group-hover:text-white">location_on</span>
                                </div>
                                <div :class="center.status === 'ACTIVE' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-rose-50 text-rose-600 border-rose-100'"
                                     class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" :class="center.status === 'ACTIVE' ? 'bg-emerald-500' : 'bg-rose-500'"></span>
                                    <span x-text="center.status"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h3 class="text-2xl font-black text-slate-900 tracking-tighter" x-text="center.name"></h3>
                                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest" x-text="center.district + ', ' + center.state"></p>
                            </div>

                            <div class="p-6 bg-slate-50 rounded-[32px] border border-slate-100 group-hover:bg-white transition-all space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Queue Load</span>
                                    <span class="text-[11px] font-black" :class="getQueueColor(center.queueLoad)" x-text="center.queueLoad + '%'"></span>
                                </div>
                                <div class="h-2 w-full bg-slate-200/50 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full transition-all duration-1000" 
                                         :class="getQueueBg(center.queueLoad)" 
                                         :style="'width: ' + center.queueLoad + '%'"></div>
                                </div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center" x-text="getQueueText(center.queueLoad)"></p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-1">
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Capacity</p>
                                    <p class="text-lg font-black text-slate-900" x-text="center.capacity + ' MT'"></p>
                                </div>
                                <div class="space-y-1 text-right">
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Wait Time</p>
                                    <p class="text-lg font-black text-emerald-600" x-text="center.waitTime + 'm'"></p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-10 flex gap-4">
                            <button @click="openCenter(center)" class="flex-1 py-4 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-xl hover:bg-emerald-600 transition-all active:scale-95">Center Intel</button>
                            <a href="#" class="w-14 h-14 flex items-center justify-center bg-slate-50 border border-slate-200 rounded-2xl text-slate-400 hover:text-emerald-600 hover:border-emerald-500 transition-all">
                                <span class="material-symbols-outlined">directions</span>
                            </a>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </main>

    <!-- 🔍 CENTER INTELLIGENCE MODAL -->
    <div x-show="selectedCenter" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm"
         style="display: none;"
         @click.self="selectedCenter = null">
        
        <div class="bg-white rounded-[64px] w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col shadow-2xl relative"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="translate-y-24 scale-95"
             x-transition:enter-end="translate-y-0 scale-100">
            
            <button @click="selectedCenter = null" class="absolute top-8 right-8 w-12 h-12 flex items-center justify-center bg-slate-50 rounded-2xl text-slate-400 hover:text-rose-500 hover:bg-rose-50 transition-all z-10">
                <span class="material-symbols-outlined">close</span>
            </button>

            <div class="overflow-y-auto flex-1 p-12 lg:p-20 space-y-12">
                <div class="flex flex-col md:flex-row justify-between items-start gap-12">
                    <div class="space-y-6 flex-1">
                        <div class="flex items-center gap-3">
                            <div class="w-16 h-16 bg-slate-50 rounded-3xl flex items-center justify-center text-emerald-600 border border-slate-100">
                                <span class="material-symbols-outlined text-[36px]">location_away</span>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[11px] font-black text-emerald-600 uppercase tracking-widest" x-text="'Verified Hub ' + selectedCenter?.id"></p>
                                <h2 class="text-4xl font-black text-slate-900 tracking-tighter" x-text="selectedCenter?.name"></h2>
                                <p class="text-slate-400 font-bold text-sm tracking-widest uppercase" x-text="selectedCenter?.district + ', ' + selectedCenter?.state"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-10 bg-slate-50 rounded-[48px] border border-slate-100 space-y-8">
                        <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Queue Analytics</h4>
                        <div class="space-y-8">
                            <div class="flex justify-between items-end border-b border-slate-200 pb-4">
                                <div>
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Waiting Farmers</p>
                                    <p class="text-3xl font-black text-slate-900" x-text="Math.round(selectedCenter?.queueLoad * 0.8)"></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Queue Load</p>
                                    <p class="text-3xl font-black" :class="getQueueColor(selectedCenter?.queueLoad)" x-text="selectedCenter?.queueLoad + '%'"></p>
                                </div>
                            </div>
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Daily Capacity</p>
                                    <p class="text-3xl font-black text-slate-900" x-text="selectedCenter?.capacity + ' MT'"></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Processing Speed</p>
                                    <p class="text-3xl font-black text-emerald-600">4.2 <span class="text-sm font-bold">MT/hr</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-10 bg-slate-900 rounded-[48px] text-white space-y-8 relative overflow-hidden flex flex-col justify-between">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl"></div>
                        <h4 class="text-[11px] font-black text-white/40 uppercase tracking-widest">Live Status Recommendation</h4>
                        <div class="space-y-6">
                            <p class="text-2xl font-bold leading-tight" x-text="selectedCenter?.queueLoad > 60 ? 'High load detected. Recommended to schedule for tomorrow.' : 'Low queue detected. Direct walk-in available.'"></p>
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></div>
                                <span class="text-[11px] font-black uppercase tracking-widest text-emerald-400">Official Slot Booking Active</span>
                            </div>
                        </div>
                        <a href="{{ route('gov.sell') }}" class="w-full py-5 bg-white text-slate-900 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-2xl block text-center hover:bg-emerald-500 hover:text-white transition-all active:scale-95">Pre-Register Harvest</a>
                    </div>
                </div>

                <div class="space-y-6">
                    <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Operational Information</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach([
                            ['icon' => 'schedule', 'label' => 'Working Hours', 'val' => '08:00 AM - 08:00 PM'],
                            ['icon' => 'verified_user', 'label' => 'Officer In-Charge', 'val' => 'Dr. Sameer Kumar'],
                            ['icon' => 'call', 'label' => 'Center Support', 'val' => '1800-420-2024']
                        ] as $item)
                            <div class="p-6 bg-white border border-slate-100 rounded-[32px] shadow-sm space-y-2">
                                <span class="material-symbols-outlined text-emerald-600">{{ $item['icon'] }}</span>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ $item['label'] }}</p>
                                <p class="text-[13px] font-black text-slate-900">{{ $item['val'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function centerEngine() {
    return {
        selectedCenter: null,
        centers: [
            { id: 1, name: 'Ludhiana Warehouse Hub', state: 'Punjab', district: 'Ludhiana', queueLoad: 42, capacity: 2500, waitTime: 35, status: 'ACTIVE' },
            { id: 2, name: 'Indore Main APMC Hub', state: 'MP', district: 'Indore', queueLoad: 85, capacity: 3200, waitTime: 110, status: 'ACTIVE' },
            { id: 3, name: 'Karnal Procurement Silo', state: 'Haryana', district: 'Karnal', queueLoad: 15, capacity: 1800, waitTime: 12, status: 'ACTIVE' },
            { id: 4, name: 'Rajkot Logistics Center', state: 'Gujarat', district: 'Rajkot', queueLoad: 58, capacity: 2200, waitTime: 55, status: 'ACTIVE' },
            { id: 5, name: 'Alwar Storage Block A', state: 'Rajasthan', district: 'Alwar', queueLoad: 30, capacity: 1500, waitTime: 22, status: 'ACTIVE' },
            { id: 6, name: 'Patna Grain Silo', state: 'Bihar', district: 'Patna', queueLoad: 0, capacity: 1200, waitTime: 0, status: 'OFFLINE' },
            { id: 7, name: 'Amritsar Regional Hub', state: 'Punjab', district: 'Amritsar', queueLoad: 72, capacity: 2800, waitTime: 95, status: 'ACTIVE' },
            { id: 8, name: 'Nasik Agri Hub', state: 'Maharashtra', district: 'Nasik', queueLoad: 25, capacity: 1900, waitTime: 18, status: 'ACTIVE' }
        ],
        init() {
            setInterval(() => {
                this.centers.forEach(c => {
                    if (c.status === 'ACTIVE') {
                        // Fluctuating queue
                        let change = Math.floor(Math.random() * 5 - 2);
                        c.queueLoad = Math.max(0, Math.min(100, c.queueLoad + change));
                        c.waitTime = Math.round(c.queueLoad * 1.2 + (Math.random() * 5));
                    }
                });
            }, 5000);
        },
        openCenter(center) {
            this.selectedCenter = center;
        },
        getQueueColor(load) {
            if (load < 30) return 'text-emerald-500';
            if (load < 70) return 'text-amber-500';
            return 'text-rose-500';
        },
        getQueueBg(load) {
            if (load < 30) return 'bg-emerald-500';
            if (load < 70) return 'bg-amber-500';
            return 'bg-rose-500';
        },
        getQueueText(load) {
            if (load < 30) return 'Low Wait Time';
            if (load < 70) return 'Moderate Queue';
            return 'High Queue - Use Scheduler';
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
</style>
@endpush
@endsection
