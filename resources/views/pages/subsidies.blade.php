@extends('layouts.stitch')
@section('title', 'Government Subsidies Intelligence - AgriMandi')
@section('content')

<div x-data="subsidyIntelligence()" class="min-h-screen bg-slate-50">
    <!-- 🏛️ SUBSIDY PAGE HEADER -->
    <header class="bg-white/90 backdrop-blur-2xl border-b border-slate-200 sticky top-0 z-[60] h-24 flex items-center transition-all">
        <div class="max-w-[1440px] mx-auto w-full px-6 sm:px-8 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-12">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-900/20 transition-transform group-hover:scale-110">
                        <span class="material-symbols-outlined text-white text-[28px]">account_balance</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black text-slate-900 tracking-tighter leading-none">Subsidy <span class="text-emerald-600">Intelligence</span></span>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Government Schemes Monitoring System</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-6">
                <div class="hidden md:flex items-center gap-8 mr-8">
                    <div class="flex flex-col text-right">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Active Schemes</span>
                        <span class="text-[13px] font-black text-slate-900">24 Major Programs</span>
                    </div>
                    <div class="h-8 w-px bg-slate-200"></div>
                    <div class="flex flex-col text-right">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Fund Pool</span>
                        <span class="text-[13px] font-black text-emerald-600">₹45,000Cr+</span>
                    </div>
                </div>
                @include('components.nav-user-actions')
            </div>
        </div>
    </header>

    <main class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12 py-12 md:py-20">
        <!-- 🏔️ HERO / SEARCH SECTION -->
        <div class="relative grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20 items-center p-8 md:p-16 rounded-[64px] overflow-hidden">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&q=80&w=2000" 
                     class="w-full h-full object-cover" alt="Smart Farming">
                <div class="absolute inset-0 bg-white/90 backdrop-blur-sm lg:bg-gradient-to-r lg:from-white/95 lg:via-white/80 lg:to-transparent"></div>
            </div>

            <div class="lg:col-span-7 space-y-8 relative z-10">
                <div class="inline-flex items-center gap-3 px-5 py-2 bg-emerald-50 rounded-full border border-emerald-100">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-600">Live Eligibility Auditing Active</span>
                </div>
                <h1 class="text-6xl md:text-[84px] font-black text-slate-900 leading-[0.9] tracking-tighter">
                    Empowering <span class="text-emerald-600">Bharat's</span> Farmers.
                </h1>
                <p class="text-xl text-slate-500 font-medium leading-relaxed max-w-2xl">
                    AgriMandi Intelligence provides real-time access to government subsidies, grants, and infrastructure support. Check your eligibility and apply digitally in minutes.
                </p>
                <div class="flex items-center gap-4 p-2 bg-white rounded-3xl border border-slate-200 shadow-sm max-w-xl group focus-within:ring-4 focus-within:ring-emerald-500/10 transition-all">
                    <span class="material-symbols-outlined text-slate-400 ml-4">search</span>
                    <input type="text" placeholder="Search by scheme name or crop type..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm font-bold text-slate-900">
                    <button class="px-8 py-4 bg-slate-900 text-white rounded-2xl text-[11px] font-black uppercase tracking-widest shadow-xl hover:bg-emerald-600 transition-all">Search Schemes</button>
                </div>
            </div>
            <div class="lg:col-span-5 relative z-10">
                <div class="absolute -inset-4 bg-emerald-500/10 blur-[100px] rounded-full"></div>
                <div class="relative p-10 bg-white/40 backdrop-blur-3xl border border-white/20 rounded-[64px] shadow-2xl space-y-8">
                    <div class="flex justify-between items-start">
                        <div class="space-y-1">
                            <h4 class="text-xl font-black text-slate-900 tracking-tight">Eligibility Audit</h4>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Digital Profile Scan</p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                            <span class="material-symbols-outlined">verified_user</span>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <div class="flex justify-between text-[11px] font-black uppercase tracking-widest text-slate-400">
                                <span>Approval Chance</span>
                                <span class="text-emerald-600" x-text="eligibility + '%'"></span>
                            </div>
                            <div class="h-3 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-500 rounded-full transition-all duration-1000" :style="'width: ' + eligibility + '%'"></div>
                            </div>
                        </div>
                        <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Linked Assets</p>
                                <p class="text-lg font-black text-slate-900">4 Resources</p>
                            </div>
                            <button class="px-6 py-3 bg-slate-900 text-white rounded-xl text-[10px] font-black uppercase tracking-widest">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📜 ACTIVE SCHEME DIRECTORY -->
        <div class="space-y-12">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8">
                <div class="space-y-4">
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter">Mission-Critical Schemes.</h2>
                    <p class="text-lg text-slate-500 font-medium">Monitoring active government mandates for infrastructure and technology adoption.</p>
                </div>
                <div class="flex bg-white p-1.5 rounded-2xl border border-slate-200">
                    <button class="px-6 py-2.5 bg-slate-900 text-white shadow-xl rounded-xl text-[11px] font-black uppercase tracking-widest">All Schemes</button>
                    <button class="px-6 py-2.5 text-slate-400 hover:text-slate-900 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">Solar Power</button>
                    <button class="px-6 py-2.5 text-slate-400 hover:text-slate-900 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all">Technology</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="scheme in schemes" :key="scheme.name">
                    <div class="bg-white border border-slate-200 rounded-[56px] shadow-sm group hover:shadow-2xl hover:border-emerald-500/20 transition-all duration-500 cursor-default relative overflow-hidden flex flex-col">
                        <div class="h-48 overflow-hidden relative">
                            <img :src="scheme.image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent"></div>
                            <div class="absolute top-0 right-0 p-6">
                                <span class="px-4 py-1.5 bg-emerald-600 text-white rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg shadow-emerald-900/20" x-text="scheme.tag"></span>
                            </div>
                        </div>
                        <div class="p-10 pt-4 space-y-8 relative z-10 flex-1 flex flex-col justify-between">
                            <div class="space-y-6">
                                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-sm">
                                    <span class="material-symbols-outlined text-[32px]" x-text="scheme.icon"></span>
                                </div>
                                <div class="space-y-2">
                                    <h4 class="text-3xl font-black text-slate-900 tracking-tighter leading-tight" x-text="scheme.name"></h4>
                                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest" x-text="scheme.type"></p>
                                </div>
                            </div>
                            <div class="pt-8 border-t border-slate-50 flex justify-between items-end">
                                <div>
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Max Support</p>
                                    <p class="text-3xl font-black text-emerald-600" x-text="scheme.amount"></p>
                                </div>
                                <button class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-emerald-600 transition-all shadow-xl shadow-slate-900/20">
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- 🚀 LIVE APPLICATION WORKFLOW -->
        <div class="mt-32 p-12 md:p-24 bg-slate-900 rounded-[80px] relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/10 rounded-full blur-[150px] -translate-y-1/2 translate-x-1/4"></div>
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-10">
                    <div class="inline-flex items-center gap-3 px-5 py-2 bg-white/5 backdrop-blur-xl rounded-full border border-white/10">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-400">Digital Onboarding Active</span>
                    </div>
                    <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-[0.95]">
                        Apply Digitally. <br>Get Approved Fast.
                    </h2>
                    <p class="text-xl text-white/50 font-medium leading-relaxed max-w-xl">
                        Skip the paperwork. Our AI-powered verification system connects directly with land records and mandi licenses for instant auditing.
                    </p>
                    <div class="flex flex-wrap gap-5">
                        <button class="px-10 py-5 bg-white text-slate-900 rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl hover:bg-emerald-500 hover:text-white transition-all">
                            Start My Application
                        </button>
                        <button class="px-10 py-5 bg-white/5 text-white/40 border border-white/10 rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] hover:text-white transition-all">
                            How it Works
                        </button>
                    </div>
                </div>

                <div class="space-y-6">
                    <template x-for="(step, i) in ['Land Records Verification', 'Scheme Selection', 'Technical Audit', 'Fund Disbursement']" :key="i">
                        <div class="p-8 bg-white/5 backdrop-blur-xl border border-white/10 rounded-[32px] flex items-center justify-between group cursor-default hover:bg-white/10 transition-all">
                            <div class="flex items-center gap-6">
                                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-900 font-black" x-text="'0' + (i+1)"></div>
                                <span class="text-lg font-black text-white" x-text="step"></span>
                            </div>
                            <span class="material-symbols-outlined text-white/20 group-hover:text-emerald-400 transition-colors">check_circle</span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>

    <!-- 🌐 GLOBAL FOOTER (Standardized) -->
    <footer class="bg-slate-950 pt-32 pb-12 text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-16 mb-24">
                <div class="lg:col-span-2 space-y-8">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-[28px]">agriculture</span>
                        </div>
                        <span class="text-3xl font-black tracking-tighter">AgriMandi India</span>
                    </div>
                    <p class="text-white/50 text-lg leading-relaxed max-w-sm">
                        Cultivating digital growth through transparency, technology, and trust in the agricultural ecosystem.
                    </p>
                </div>
                
                @foreach([
                    'Marketplace' => ['Buy Commodities', 'Sell Your Stock', 'Daily Mandi Rates', 'Warehouse Listing'],
                    'Resources' => ['Market Insights', 'Trade Support', 'Quality Standards', 'Logistics Partners'],
                    'Support' => ['Privacy Policy', 'Terms of Service', 'Contact Us', 'FAQ']
                ] as $title => $links)
                    <div class="space-y-8">
                        <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-white/30">{{ $title }}</h4>
                        <ul class="space-y-4">
                            @foreach($links as $link)
                                <li><a href="#" class="text-[14px] font-bold text-white/60 hover:text-primary transition-colors">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            
            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-[12px] font-bold text-white/30">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
                <div class="flex items-center gap-8">
                    <span class="flex items-center gap-2 text-[12px] font-bold text-white/30">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        System Status: Operational
                    </span>
                </div>
            </div>
        </div>
    </footer>
</div>

@push('scripts')
<script>
function subsidyIntelligence() {
    return {
        eligibility: 88,
        schemes: [
            { name: 'PM-KUSUM', type: 'Solar Power Integration', amount: '₹1.8L', icon: 'solar_power', tag: 'High Approval', image: 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&q=80&w=800' },
            { name: 'Mission Horticulture', type: 'Infrastructure Grant', amount: '₹3.4L', icon: 'eco', tag: 'Top Priority', image: 'https://images.unsplash.com/photo-1530507629858-e4977d30e9e0?auto=format&fit=crop&q=80&w=800' },
            { name: 'SMAM Technology', type: 'Agri-Drone Assistance', amount: '₹85k', icon: 'precision_manufacturing', tag: 'Technology', image: 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&q=80&w=800' },
            { name: 'Cold Chain Dev.', type: 'Refrigerated Storage', amount: '₹12.5L', icon: 'ac_unit', tag: 'Infrastructure', image: 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=800' },
            { name: 'Warehouse Subsidy', type: 'Storage & Logistics', amount: '₹8.4L', icon: 'warehouse', tag: 'Supply Chain', image: 'https://images.unsplash.com/photo-1580674285054-bed31e145f59?auto=format&fit=crop&q=80&w=800' },
            { name: 'Organic India', type: 'Certification Support', amount: '₹45k', icon: 'nature', tag: 'Sustainability', image: 'https://images.unsplash.com/photo-1516253593875-bd7ba052fbc5?auto=format&fit=crop&q=80&w=800' }
        ],
        init() {
            // Live audit animation
            setInterval(() => {
                this.eligibility = Math.round(85 + Math.random() * 10);
            }, 3000);
        },
        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>
@endpush
@endsection
