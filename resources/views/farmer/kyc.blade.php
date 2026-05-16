@extends('layouts.stitch')

@section('title', 'Identity & Trust Intelligence - AgriMandi')

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
    .trust-tier {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .trust-tier:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
    }
    .scanner-line {
        height: 2px;
        background: linear-gradient(90deg, transparent, #10B981, transparent);
        box-shadow: 0 0 15px #10B981;
        animation: scan 3s linear infinite;
    }
    @keyframes scan {
        0% { top: 0%; }
        100% { top: 100%; }
    }
    .shimmer {
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        background-size: 200% 100%;
        animation: shimmer 2s infinite;
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
</style>
@endpush

@section('content')
<div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" 
     x-data="kycCenter()">
    
    <!-- 🏢 ENTERPRISE SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
        <div class="flex flex-col gap-4 mb-12">
            <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-40 w-auto object-contain self-start mix-blend-multiply">
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span></h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Trust & Compliance</p>
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

        <div class="mt-auto p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">Compliance Level: High</span>
            </div>
            <p class="text-[11px] text-slate-500 font-medium">Your profile meets 95% of buyer trust requirements. Complete Emerald verification for priority listing.</p>
        </div>
    </aside>

    <!-- 🚀 MAIN KYC INTERFACE -->
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
                    <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight">Identity Intelligence</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Digital India Stack Integrated</p>
                </div>
                <div class="h-8 w-px bg-slate-200 dark:border-slate-800 hidden md:block"></div>
                <div class="hidden md:flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-[18px] filled">verified</span>
                        <p class="text-[10px] font-black text-slate-900 dark:text-white uppercase tracking-widest">Aadhaar Linked</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-[18px] filled">verified</span>
                        <p class="text-[10px] font-black text-slate-900 dark:text-white uppercase tracking-widest">PAN Verified</p>
                    </div>
                </div>
            </div>
            @include('components.nav-user-actions')
        </header>

        <!-- KYC CONTENT -->
        <div class="p-8 space-y-8 max-w-6xl mx-auto w-full">
            <!-- Trust Tiers Header -->
            <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <template x-for="tier in trustTiers" :key="tier.name">
                    <div class="trust-tier p-6 rounded-[32px] border transition-all relative overflow-hidden group"
                         :class="tier.active ? 'bg-primary text-white border-primary shadow-xl shadow-primary/20' : 'bg-white dark:bg-slate-900 border-slate-200 dark:border-slate-800 text-slate-400'">
                        <div x-show="tier.active" class="absolute inset-0 shimmer opacity-20"></div>
                        <div class="flex justify-between items-start mb-6 relative z-10">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center" :class="tier.active ? 'bg-white/20' : 'bg-slate-100 dark:bg-slate-800'">
                                <span class="material-symbols-outlined text-[20px] filled" x-text="tier.icon"></span>
                            </div>
                            <span x-show="tier.active" class="material-symbols-outlined text-[20px] filled">check_circle</span>
                        </div>
                        <h4 class="text-xs font-black uppercase tracking-widest relative z-10" x-text="tier.name"></h4>
                        <p class="text-[9px] font-bold mt-1 opacity-80 relative z-10" x-text="tier.description"></p>
                    </div>
                </template>
            </section>

            <!-- Main Verification Container -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Document Upload & Status -->
                <div class="lg:col-span-7 space-y-8">
                    <div class="bg-white dark:bg-slate-900 rounded-[48px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Identity Documents</h4>
                                <p class="text-xs text-slate-400 font-medium">Submit government-issued IDs for biometric validation.</p>
                            </div>
                            <div class="px-4 py-2 bg-emerald-500/10 text-emerald-600 rounded-xl text-[9px] font-black uppercase tracking-widest">95% Complete</div>
                        </div>

                        <div class="space-y-6">
                            <template x-for="doc in documents" :key="doc.name">
                                <div class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-3xl border border-transparent hover:border-primary/20 transition-all flex items-center justify-between group">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white dark:bg-slate-700 rounded-2xl flex items-center justify-center text-slate-400 group-hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[28px] filled" x-text="doc.icon"></span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider" x-text="doc.name"></p>
                                            <p class="text-[10px] font-bold text-slate-400" x-text="doc.status"></p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span x-show="doc.verified" class="material-symbols-outlined text-emerald-500 filled">verified</span>
                                        <button x-show="!doc.verified" class="px-6 py-3 bg-primary text-white rounded-xl text-[9px] font-black uppercase tracking-widest shadow-lg shadow-primary/20">Upload</button>
                                        <button x-show="doc.verified" class="p-3 bg-white dark:bg-slate-700 text-slate-400 rounded-xl hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Security Badge -->
                    <div class="bg-indigo-600 rounded-[40px] p-8 text-white flex items-center justify-between gap-8">
                        <div class="space-y-2">
                            <h5 class="text-lg font-black tracking-tight">Enterprise Grade Data Security</h5>
                            <p class="text-xs text-white/70 leading-relaxed font-medium">Your data is encrypted using 256-bit AES and stored in India-based sovereign cloud. Fully compliant with DPDP Act & RBI guidelines.</p>
                        </div>
                        <div class="w-20 h-20 bg-white/10 rounded-[32px] flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-[40px] filled">security</span>
                        </div>
                    </div>
                </div>

                <!-- Live Biometric Simulation -->
                <div class="lg:col-span-5 space-y-8">
                    <div class="bg-slate-900 rounded-[48px] p-10 text-white space-y-8 overflow-hidden relative">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, #10B981 1px, transparent 0); background-size: 20px 20px;"></div>
                        
                        <div class="text-center space-y-2 relative z-10">
                            <h4 class="text-sm font-black uppercase tracking-[0.3em] text-primary">Biometric Engine</h4>
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Face ID & Liveness Check</p>
                        </div>

                        <div class="relative aspect-square max-w-[280px] mx-auto group">
                            <div class="absolute inset-0 border-2 border-primary/20 rounded-[64px]"></div>
                            <div class="absolute inset-4 border-2 border-primary/40 rounded-[48px]"></div>
                            <div class="absolute inset-8 rounded-[32px] overflow-hidden bg-slate-800">
                                <img src="https://i.pravatar.cc/400?u=farmer" class="w-full h-full object-cover opacity-60 grayscale" />
                                <div class="absolute inset-0 scanner-line"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-primary/20 to-transparent"></div>
                            </div>
                            <!-- Corner Accents -->
                            <div class="absolute -top-2 -left-2 w-8 h-8 border-t-4 border-l-4 border-primary rounded-tl-2xl"></div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 border-t-4 border-r-4 border-primary rounded-tr-2xl"></div>
                            <div class="absolute -bottom-2 -left-2 w-8 h-8 border-b-4 border-l-4 border-primary rounded-bl-2xl"></div>
                            <div class="absolute -bottom-2 -right-2 w-8 h-8 border-b-4 border-r-4 border-primary rounded-br-2xl"></div>
                        </div>

                        <div class="space-y-4 relative z-10">
                            <div class="flex justify-between items-center px-4 py-3 bg-white/5 rounded-2xl border border-white/10">
                                <span class="text-[10px] font-black text-slate-400 uppercase">Match Confidence</span>
                                <span class="text-xs font-black text-emerald-400">99.8%</span>
                            </div>
                            <div class="flex justify-between items-center px-4 py-3 bg-white/5 rounded-2xl border border-white/10">
                                <span class="text-[10px] font-black text-slate-400 uppercase">Liveness Test</span>
                                <span class="text-xs font-black text-emerald-400 uppercase">Passed</span>
                            </div>
                            <button class="w-full py-4 bg-primary text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-105 transition-all">Re-verify Biometrics</button>
                        </div>
                    </div>

                    <!-- KYC Timeline -->
                    <div class="bg-white dark:bg-slate-900 rounded-[40px] p-8 border border-slate-200 dark:border-slate-800 space-y-6">
                        <h4 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-widest">Verification Journey</h4>
                        <div class="space-y-8 relative">
                            <div class="absolute left-4 top-2 bottom-2 w-0.5 bg-slate-100 dark:bg-slate-800"></div>
                            <template x-for="(step, index) in kycSteps" :key="index">
                                <div class="flex gap-6 relative">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center z-10 transition-colors duration-500"
                                         :class="step.completed ? 'bg-primary text-white shadow-lg' : 'bg-slate-100 dark:bg-slate-800 text-slate-400'">
                                        <span class="material-symbols-outlined text-[16px] filled" x-text="step.completed ? 'check_circle' : 'pending'"></span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-[10px] font-black uppercase tracking-widest" :class="step.completed ? 'text-slate-900 dark:text-white' : 'text-slate-400'" x-text="step.label"></p>
                                        <p class="text-[9px] font-bold text-slate-400 mt-1" x-text="step.time"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
function kycCenter() {
    return {
        menuItems: [
            { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}' },
            { label: 'My Products', icon: 'inventory_2', route: '{{ route('farmer.products') }}' },
            { label: 'Bids Exchange', icon: 'gavel', route: '{{ route('farmer.bids') }}' },
            { label: 'Logistics', icon: 'local_shipping', route: '{{ route('farmer.orders') }}' },
            { label: 'KYC Status', icon: 'verified_user', route: '#', active: true },
        ],
        trustTiers: [
            { name: 'Bronze', icon: 'verified', description: 'Basic Access', active: true },
            { name: 'Silver', icon: 'military_tech', description: 'Marketplace Ready', active: true },
            { name: 'Gold', icon: 'workspace_premium', description: 'Verified Seller', active: true },
            { name: 'Emerald', icon: 'diamond', description: 'Enterprise Elite', active: false },
        ],
        documents: [
            { name: 'Aadhaar Card', icon: 'fingerprint', status: 'Verified on Oct 12, 2023', verified: true },
            { name: 'PAN Card', icon: 'credit_card', status: 'Verified on Oct 12, 2023', verified: true },
            { name: 'Land Record (7/12)', icon: 'map', status: 'Awaiting manual audit', verified: false },
            { name: 'Bank Passbook', icon: 'account_balance', status: 'Verified on Oct 15, 2023', verified: true },
        ],
        kycSteps: [
            { label: 'Phone Authentication', time: 'Oct 10, 2023 • 02:45 PM', completed: true },
            { label: 'Document Submission', time: 'Oct 12, 2023 • 11:30 AM', completed: true },
            { label: 'AI Biometric Check', time: 'Oct 12, 2023 • 11:35 AM', completed: true },
            { label: 'Manual Land Audit', time: 'Pending internal review', completed: false },
        ]
    }
}
</script>
@endpush
@endsection
