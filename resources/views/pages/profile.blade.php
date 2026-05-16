@extends('layouts.stitch')

@section('title', 'Commercial Profile Intelligence - AgriMandi')

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
    .profile-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .profile-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
    }
    .tab-active {
        background: white;
        color: #10B981;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
    }
    .dark .tab-active {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981;
        box-shadow: none;
    }
</style>
@endpush

@section('content')
<div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" 
     x-data="profileManager()">
    
    <!-- 🏢 ENTERPRISE SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
        <div class="flex items-center gap-4 mb-12">
            <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center text-white shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-[28px] filled">agriculture</span>
            </div>
            <div>
                <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span></h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Profile Engine</p>
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
                </a>
            </template>
        </nav>

        <div class="mt-auto p-6 bg-slate-100 dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-[20px] filled">verified</span>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Account Status</p>
                <p class="text-xs font-black text-slate-900 dark:text-white">Enterprise Verified</p>
            </div>
        </div>
    </aside>

    <!-- 🚀 MAIN PROFILE INTERFACE -->
    <main class="flex-1 min-w-0 flex flex-col">
        <!-- TOP NAV -->
        <header class="h-24 sticky top-0 z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-3xl border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8">
            <div class="flex items-center gap-8 flex-1">
                <div>
                    <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight">Commercial Profile</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Manage Global Trading Identity</p>
                </div>
                <div class="h-8 w-px bg-slate-200 dark:border-slate-800 hidden md:block"></div>
                <div class="hidden md:flex items-center gap-6">
                    <button @click="activeTab = 'personal'" :class="activeTab === 'personal' ? 'text-primary' : 'text-slate-400'" class="text-[10px] font-black uppercase tracking-widest transition-colors">Personal</button>
                    <button @click="activeTab = 'business'" :class="activeTab === 'business' ? 'text-primary' : 'text-slate-400'" class="text-[10px] font-black uppercase tracking-widest transition-colors">Business</button>
                    <button @click="activeTab = 'security'" :class="activeTab === 'security' ? 'text-primary' : 'text-slate-400'" class="text-[10px] font-black uppercase tracking-widest transition-colors">Security</button>
                </div>
            </div>
            @include('components.nav-user-actions')
        </header>

        <!-- PROFILE CONTENT -->
        <div class="p-8 space-y-8 max-w-5xl mx-auto w-full">
            <!-- Profile Overview Card -->
            <section class="profile-card bg-white dark:bg-slate-900 rounded-[48px] p-10 border border-slate-200 dark:border-slate-800 flex flex-col md:flex-row items-center gap-10">
                <div class="relative group">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=10B981&color=fff' }}" 
                         class="w-40 h-40 rounded-[48px] object-cover border-8 border-slate-50 dark:border-slate-800 shadow-xl" />
                    <button class="absolute -bottom-2 -right-2 w-12 h-12 bg-primary text-white rounded-2xl shadow-lg shadow-primary/20 flex items-center justify-center hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-[20px]">photo_camera</span>
                    </button>
                </div>
                <div class="flex-1 space-y-4 text-center md:text-left">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight" x-text="'{{ $user->name }}'"></h2>
                        <p class="text-sm font-bold text-primary uppercase tracking-widest mt-1" x-text="'{{ $user->role }} Portal'"></p>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <div class="px-4 py-2 bg-slate-50 dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[16px] text-primary filled">verified</span>
                            <span class="text-[10px] font-black text-slate-600 dark:text-slate-400 uppercase tracking-widest">Verified Trader</span>
                        </div>
                        <div class="px-4 py-2 bg-slate-50 dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[16px] text-slate-400">location_on</span>
                            <span class="text-[10px] font-black text-slate-600 dark:text-slate-400 uppercase tracking-widest" x-text="'{{ $user->state ?? 'Not Set' }}'"></span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed max-w-xl">Actively trading since 2023. Maintaining a 98% fulfillment rate across all seasonal commodities including Wheat, Soybean, and Maize.</p>
                </div>
            </section>

            <!-- Settings Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Main Form Area -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Tab: Personal -->
                    <div x-show="activeTab === 'personal'" x-transition class="space-y-8">
                        <div class="bg-white dark:bg-slate-900 rounded-[40px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                            <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Personal Details</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Full Legal Name</label>
                                    <input type="text" value="{{ $user->name }}" class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm focus:ring-4 focus:ring-primary/10">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Primary Email</label>
                                    <input type="email" value="{{ $user->email }}" class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm opacity-50 cursor-not-allowed" disabled>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Mobile Number</label>
                                    <input type="tel" value="{{ $user->phone }}" class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm focus:ring-4 focus:ring-primary/10">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Postal Code</label>
                                    <input type="text" value="{{ $user->pincode }}" class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm focus:ring-4 focus:ring-primary/10">
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-900 rounded-[40px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                            <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Location Intelligence</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Primary State</label>
                                    <input type="text" value="{{ $user->state }}" class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">District</label>
                                    <input type="text" placeholder="e.g. Ludhiana" class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Security -->
                    <div x-show="activeTab === 'security'" x-transition class="space-y-8">
                        <div class="bg-white dark:bg-slate-900 rounded-[40px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                            <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Authentication Security</h4>
                            <div class="space-y-6">
                                <div class="p-6 bg-slate-50 dark:bg-slate-800 rounded-3xl flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white dark:bg-slate-700 rounded-2xl flex items-center justify-center text-slate-400">
                                            <span class="material-symbols-outlined text-[24px]">key</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider">Account Password</p>
                                            <p class="text-[10px] font-bold text-slate-400">Last updated 3 months ago</p>
                                        </div>
                                    </div>
                                    <button class="px-6 py-3 bg-white dark:bg-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-100 dark:border-slate-600 transition-all">Update</button>
                                </div>
                                <div class="p-6 bg-slate-50 dark:bg-slate-800 rounded-3xl flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white dark:bg-slate-700 rounded-2xl flex items-center justify-center text-primary">
                                            <span class="material-symbols-outlined text-[24px] filled">shield</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider">2FA Authentication</p>
                                            <p class="text-[10px] font-bold text-emerald-500">Active and Secured</p>
                                        </div>
                                    </div>
                                    <button class="px-6 py-3 bg-white dark:bg-slate-700 rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-100 dark:border-slate-600 transition-all text-error">Disable</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Strategic Sidebar -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Trust Score Card -->
                    <div class="bg-primary rounded-[48px] p-10 text-white space-y-8 relative overflow-hidden group">
                        <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full blur-3xl"></div>
                        
                        <div class="text-center relative z-10">
                            <p class="text-[10px] font-black text-white/60 uppercase tracking-[0.3em] mb-2">Trader Trust Score</p>
                            <h2 class="text-6xl font-black">985</h2>
                            <p class="text-xs font-bold text-emerald-300 mt-2">EXCELLENT</p>
                        </div>

                        <div class="space-y-4 relative z-10">
                            <div class="h-2 w-full bg-white/10 rounded-full overflow-hidden">
                                <div class="h-full bg-white rounded-full" style="width: 98%;"></div>
                            </div>
                            <p class="text-[10px] font-medium leading-relaxed opacity-80">Your high trust score gives you <span class="font-black">priority visibility</span> in the marketplace and lower transaction commissions.</p>
                        </div>
                    </div>

                    <!-- Action Sidebar -->
                    <div class="bg-white dark:bg-slate-900 rounded-[48px] p-10 border border-slate-200 dark:border-slate-800 space-y-6">
                        <button class="w-full py-5 bg-primary text-white rounded-3xl font-black text-[12px] uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                            Save Profile Changes
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full py-5 bg-slate-50 dark:bg-slate-800 text-error rounded-3xl font-black text-[10px] uppercase tracking-widest text-center transition-all">
                                Terminate Session
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
function profileManager() {
    return {
        activeTab: 'personal',
        menuItems: [
            { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}' },
            { label: 'My Products', icon: 'inventory_2', route: '{{ route('farmer.products') }}' },
            { label: 'Bids Exchange', icon: 'gavel', route: '{{ route('farmer.bids') }}' },
            { label: 'Logistics', icon: 'local_shipping', route: '{{ route('farmer.orders') }}' },
            { label: 'Account Settings', icon: 'settings', route: '#', active: true },
        ]
    }
}
</script>
@endpush
@endsection
