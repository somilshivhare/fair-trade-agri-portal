@extends('layouts.stitch')
@section('title', 'Digital Agriculture Hub - AgriMandi')
@section('content')

<div x-data="homepageEngine()" class="min-h-screen bg-white">
    <div class="bg-slate-950 text-white h-10 overflow-hidden flex items-center relative z-[70] shadow-2xl">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-primary flex items-center gap-2 z-10 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-1.5 h-1.5 bg-white rounded-full animate-pulse shadow-[0_0_10px_#fff]"></div>
            <span class="font-black text-[9px] uppercase tracking-widest">Live Mandi Index</span>
        </div>
        
        <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[150px]">
            <template x-for="item in tickerItems" :key="item.name">
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

    <header class="bg-white/80 backdrop-blur-2xl border-b border-slate-200/40 sticky top-0 z-[60] h-16 md:h-20 flex items-center transition-all duration-500"
            :class="scrolled ? 'h-14 md:h-16 bg-white/95 shadow-xl' : ''">
    <div class="max-w-[1440px] mx-auto w-full px-6 sm:px-8 lg:px-12 flex items-center justify-between">
        <div class="flex items-center gap-12">
            <a href="{{ route('home') }}" class="flex items-center gap-4 group h-full">
                <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" 
                     class="h-16 md:h-32 w-auto object-contain transition-all duration-500 group-hover:scale-105 mix-blend-multiply"
                     :class="scrolled ? 'h-14 md:h-20' : ''">
            </a>
        </div>

        <div class="flex items-center gap-6">
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-slate-50 hover:bg-slate-100 transition-all border border-slate-200/50 group">
                    <span class="material-symbols-outlined text-[20px] text-slate-400 group-hover:text-primary transition-colors">language</span>
                    <span class="text-[11px] font-black uppercase tracking-widest text-slate-900">{{ app()->getLocale() }}</span>
                    <span class="material-symbols-outlined text-[18px] text-slate-300 transition-transform" :class="open ? 'rotate-180' : ''">expand_more</span>
                </button>
                <div x-show="open" @click.away="open = false" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     class="absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-xl border border-slate-200/60 rounded-[24px] shadow-2xl z-[100] p-2 overflow-hidden" x-cloak>
                    @foreach(['en' => ['name' => 'English', 'flag' => '🇺🇸'], 'hi' => ['name' => 'हिंदी', 'flag' => '🇮🇳'], 'mr' => ['name' => 'मराठी', 'flag' => '🇮🇳'], 'gu' => ['name' => 'ગુજરાતી', 'flag' => '🇮🇳'], 'pa' => ['name' => 'ਪੰਜਾਬੀ', 'flag' => '🇮🇳']] as $code => $data)
                        <a href="{{ route('set-locale', $code) }}" class="flex items-center justify-between px-5 py-3 rounded-xl hover:bg-primary/5 group transition-all {{ app()->getLocale() == $code ? 'bg-primary/5' : '' }}">
                            <span class="text-[13px] font-bold text-slate-700 group-hover:text-primary transition-colors">{{ $data['name'] }}</span>
                            <span class="text-lg">{{ $data['flag'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            @auth
            <div class="flex items-center gap-4">

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-3 p-1.5 pr-4 rounded-2xl bg-slate-50 border border-slate-200/50 hover:border-primary/20 hover:shadow-xl transition-all group">
                        <img class="w-9 h-9 rounded-xl object-cover shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=10B981&color=fff' }}">
                        <span class="text-[12px] font-black text-slate-900 hidden lg:block">{{ auth()->user()->name }}</span>
                        <span class="material-symbols-outlined text-[18px] text-slate-300 transition-transform group-hover:text-primary" :class="open ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition x-cloak
                         class="absolute right-0 mt-3 w-64 bg-white/95 backdrop-blur-xl border border-slate-200/60 rounded-[32px] shadow-2xl z-[100] p-3 overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-100 mb-2">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Account Role</p>
                            <p class="text-[13px] font-black text-slate-900">{{ ucfirst(auth()->user()->role) }}</p>
                        </div>
                        <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-primary/5 group transition-all">
                            <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">dashboard</span>
                            <span class="text-[13px] font-bold text-slate-700">Dashboard</span>
                        </a>
                        @if(auth()->user()->role === 'farmer')
                        <a href="{{ route('farmer.kyc') }}" class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-emerald-50 group transition-all">
                            <span class="material-symbols-outlined text-slate-400 group-hover:text-emerald-600 transition-colors">verified_user</span>
                            <span class="text-[13px] font-bold text-slate-700">KYC Verification</span>
                        </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="mt-1">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-rose-50 group transition-all text-left">
                                <span class="material-symbols-outlined text-slate-400 group-hover:text-rose-500 transition-colors">logout</span>
                                <span class="text-[13px] font-bold text-slate-700 group-hover:text-rose-500">Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="text-[11px] font-black uppercase tracking-widest text-slate-500 hover:text-primary transition-colors">Login</a>
                <a href="{{ route('register') }}" class="bg-primary text-white px-8 py-3.5 rounded-[20px] text-[11px] font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:translate-y-[-2px] hover:shadow-primary/30 transition-all active:scale-95">Get Started</a>
            </div>
            @endauth
        </div>
    </div>
</header>

<main>
    <section class="relative pt-8 pb-32 md:pt-12 md:pb-48 lg:pt-16 lg:pb-56 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2500&auto=format&fit=crop" 
                 class="w-full h-full object-cover opacity-[0.12] dark:opacity-[0.05] grayscale transition-opacity duration-1000">
            <div class="absolute inset-0 bg-gradient-to-b from-white via-white/80 to-white dark:from-slate-950 dark:via-slate-950/80 dark:to-slate-950"></div>
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/4 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-emerald-500/10 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/4"></div>
        </div>
        
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="space-y-8 md:space-y-12">
                    <div class="space-y-6 md:space-y-8">
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-slate-50 rounded-full border border-slate-200/50">
                            <span class="flex h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-500">India's #1 Digital Mandi Platform</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-6xl lg:text-[72px] xl:text-[84px] font-black text-slate-900 leading-[1.05] md:leading-[0.95] tracking-tighter">
                            Empowering <span class="text-primary">Bharat's</span> Agriculture.
                        </h1>
                        
                        <p class="text-base md:text-lg text-slate-500 font-medium leading-relaxed max-w-lg">
                            A next-generation digital ecosystem connecting farmers, institutional buyers, and logistics partners for transparent, real-time commodity trading across India.
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap gap-5">
                        <a href="{{ route('marketplace') }}" class="px-10 py-5 bg-primary text-white rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl shadow-primary/30 hover:translate-y-[-4px] hover:shadow-primary/40 transition-all flex items-center gap-3 group">
                            Explore Marketplace
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                        <a href="#how-it-works" class="px-10 py-5 bg-white text-slate-900 border border-slate-200 rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] hover:bg-slate-50 transition-all">
                            How It Works
                        </a>
                    </div>

                    <div class="flex items-center gap-8 pt-4">
                        <div class="flex -space-x-3">
                            @foreach([1,2,3,4] as $i)
                                <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://i.pravatar.cc/100?img={{$i+20}}">
                            @endforeach
                            <div class="w-10 h-10 rounded-full bg-slate-900 border-2 border-white shadow-sm flex items-center justify-center text-[10px] font-bold text-white">
                                +12k
                            </div>
                        </div>
                        <div class="h-10 w-px bg-slate-200"></div>
                        <div>
                            <p class="text-[13px] font-black text-slate-900">4.9/5 Rating</p>
                            <p class="text-[11px] font-bold text-slate-400">Trusted by Farmers Nationwide</p>
                        </div>
                    </div>
                </div>

                <div class="relative group max-w-2xl mx-auto lg:ml-auto">
                    <div class="absolute inset-0 bg-primary/20 blur-[120px] rounded-full scale-75 opacity-30 group-hover:opacity-50 transition-opacity"></div>
                    <div class="relative rounded-[48px] overflow-hidden shadow-[0_50px_100px_-20px_rgba(0,0,0,0.2)] aspect-[4/3] md:aspect-video lg:aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1615811361523-6bd03d7748e7?q=80&w=2500&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Floating Card -->
                    <div class="absolute -bottom-10 -left-10 bg-white/90 backdrop-blur-xl p-8 rounded-[40px] shadow-2xl border border-white flex items-center gap-6 group/card hover:-translate-y-2 transition-transform">
                        <div class="w-16 h-16 bg-primary/10 rounded-[24px] flex items-center justify-center text-primary group-hover/card:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">verified_user</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Live Mandi Activity</p>
                            <p class="text-3xl font-black text-slate-900 leading-none tracking-tighter">1,450+</p>
                            <p class="text-[11px] font-bold text-emerald-500 mt-1 flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">trending_up</span>
                                Active Auctions Today
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS GRID -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $stats = [
                        ['label' => 'Annual Trade Volume', 'value' => '₹500Cr+', 'icon' => 'trending_up', 'color' => 'bg-emerald-500', 'bg' => 'https://images.unsplash.com/photo-1611095773164-1234907a216c?q=80&w=600&auto=format&fit=crop'],
                        ['label' => 'States Covered', 'value' => '22+', 'icon' => 'public', 'color' => 'bg-primary', 'bg' => 'https://images.unsplash.com/photo-1524491989677-1adbd66fc35d?q=80&w=600&auto=format&fit=crop'],
                        ['label' => 'Registered Farmers', 'value' => '1.2M', 'icon' => 'groups', 'color' => 'bg-indigo-500', 'bg' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=600&auto=format&fit=crop'],
                        ['label' => 'Avg. Auction Time', 'value' => '4hrs', 'icon' => 'speed', 'color' => 'bg-amber-500', 'bg' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=600&auto=format&fit=crop']
                    ];
                @endphp
                @foreach($stats as $stat)
                    <div class="p-10 bg-slate-50 rounded-[48px] border border-slate-100 group hover:bg-white hover:shadow-2xl hover:border-primary/10 transition-all duration-500 relative overflow-hidden">
                        <!-- Stat Image Background -->
                        <div class="absolute -right-10 -bottom-10 w-48 h-48 opacity-[0.05] group-hover:opacity-[0.12] group-hover:scale-125 transition-all duration-700 grayscale group-hover:grayscale-0">
                            <img src="{{ $stat['bg'] }}" class="w-full h-full object-cover rounded-full">
                        </div>
                        
                        <div class="relative z-10">
                            <div class="w-16 h-16 {{ $stat['color'] }}/10 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-[32px] text-slate-900 group-hover:text-{{ explode('-', $stat['color'])[1] }}-500 transition-colors">{{ $stat['icon'] }}</span>
                            </div>
                            <h4 class="text-4xl lg:text-5xl font-black text-slate-900 mb-2 tracking-tighter">{{ $stat['value'] }}</h4>
                            <p class="text-slate-500 font-bold text-sm tracking-wide">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="py-32 bg-slate-50">
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-20">
                <div class="space-y-4">
                    <h2 class="text-5xl md:text-6xl font-black text-slate-900 tracking-tighter">Liquid Commodity Markets.</h2>
                    <p class="text-lg text-slate-500 max-w-xl font-medium">Direct access to institutional-grade agricultural products across India's largest digital network.</p>
                </div>
                <a href="{{ route('categories') }}" class="group flex items-center gap-4 text-[12px] font-black uppercase tracking-[0.2em] text-primary">
                    View Intelligence Hub
                    <span class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all group-hover:translate-x-2">
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $cats = [
                        ['title' => 'Cereals', 'desc' => 'Wheat, Rice, Maize, Millets', 'img' => 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&w=1992&auto=format&fit=crop'],
                        ['title' => 'Pulses', 'desc' => 'Gram, Tur, Lentils, Peas', 'img' => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?q=80&w=2070&auto=format&fit=crop'],
                        ['title' => 'Oilseeds', 'desc' => 'Soybean, Mustard, Sunflower', 'img' => 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?q=80&w=1968&auto=format&fit=crop'],
                        ['title' => 'Spices', 'desc' => 'Cardamom, Cumin, Pepper', 'img' => 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?q=80&w=2070&auto=format&fit=crop']
                    ];
                @endphp
                @foreach($cats as $cat)
                    <div class="group relative aspect-[3/4] rounded-[48px] overflow-hidden cursor-pointer" onclick="window.location='{{ route('marketplace', ['category' => $cat['title']]) }}'">
                        <img src="{{ $cat['img'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                        <div class="absolute bottom-10 left-10 right-10 space-y-2 translate-y-4 group-hover:translate-y-0 transition-transform">
                            <h5 class="text-3xl font-black text-white tracking-tighter">{{ $cat['title'] }}</h5>
                            <p class="text-white/60 text-xs font-bold uppercase tracking-widest">{{ $cat['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 🚜 BUILD YOUR OWN SMART FARM (SIMULATOR) -->
    <section class="py-32 bg-slate-950 relative overflow-hidden">
        <!-- Futuristic Background Grid -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, #10B981 1px, transparent 0); background-size: 60px 60px;"></div>
        <div class="absolute top-0 right-0 w-[1000px] h-[1000px] bg-primary/20 rounded-full blur-[150px] -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-[800px] h-[800px] bg-indigo-500/10 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/4"></div>

        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10" x-data="farmSimulator()">
            <div class="text-center max-w-4xl mx-auto space-y-6 mb-24">
                <div class="inline-flex items-center gap-3 px-5 py-2 bg-primary/10 backdrop-blur-xl rounded-full border border-primary/20">
                    <span class="flex h-2 w-2 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-primary-container">Futuristic Smart Farming Planner</span>
                </div>
                <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-tight">
                    Build Your Own <span class="text-primary">Smart Farm.</span>
                </h2>
                <p class="text-xl text-white/50 font-medium max-w-2xl mx-auto">
                    Design, simulate, and optimize your ideal agricultural ecosystem using intelligent crop planning and live farming insights.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <!-- 🛠️ BUILDER CONTROLS -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Mode Selection -->
                    <div class="p-8 bg-white/5 backdrop-blur-2xl rounded-[40px] border border-white/10 space-y-6">
                        <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-white/40">Farming Mode</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <template x-for="mode in modes" :key="mode.id">
                                <button @click="farmingMode = mode.id" 
                                        :class="farmingMode === mode.id ? 'bg-primary text-white border-primary shadow-xl shadow-primary/20' : 'bg-white/5 text-white/60 border-white/5 hover:bg-white/10'"
                                        class="px-4 py-4 rounded-2xl border text-[10px] font-black uppercase tracking-widest transition-all text-center">
                                    <span x-text="mode.label"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Resource Toggles -->
                    <div class="p-8 bg-white/5 backdrop-blur-2xl rounded-[40px] border border-white/10 space-y-8">
                        <div class="space-y-4">
                            <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-white/40">Infrastructure</h4>
                            <div class="flex flex-wrap gap-3">
                                <template x-for="res in resources" :key="res.id">
                                    <button @click="toggleResource(res.id)" 
                                            :class="selectedResources.includes(res.id) ? 'bg-emerald-500 text-white border-emerald-500' : 'bg-white/5 text-white/40 border-white/5'"
                                            class="flex items-center gap-2 px-4 py-3 rounded-xl border text-[10px] font-black uppercase tracking-widest transition-all">
                                        <span class="material-symbols-outlined text-[18px]" x-text="res.icon"></span>
                                        <span x-text="res.label"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div class="space-y-4 pt-8 border-t border-white/10">
                            <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-white/40">Primary Crops</h4>
                            <div class="grid grid-cols-2 gap-3">
                                <template x-for="crop in crops" :key="crop.id">
                                    <button @click="toggleCrop(crop.id)" 
                                            :class="selectedCrops.includes(crop.id) ? 'bg-indigo-500 text-white border-indigo-500' : 'bg-white/5 text-white/40 border-white/5'"
                                            class="flex items-center justify-between px-4 py-3 rounded-xl border transition-all group">
                                        <span class="text-[10px] font-black uppercase tracking-widest" x-text="crop.label"></span>
                                        <span class="material-symbols-outlined text-[16px]" x-text="selectedCrops.includes(crop.id) ? 'check_circle' : 'add_circle'"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Group -->
                    <div class="flex flex-col gap-4">
                        <button @click="showProfitability = true" 
                                class="w-full py-6 bg-white text-slate-900 rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl hover:bg-primary hover:text-white transition-all active:scale-95">
                            Calculate Full Profitability
                        </button>
                        <a href="{{ route('subsidies') }}" 
                                class="w-full py-4 bg-white/5 text-white/40 rounded-[20px] text-[10px] font-black uppercase tracking-widest hover:text-white transition-all text-center">
                            View Govt. Subsidies Intelligence
                        </a>
                    </div>
                </div>

                <!-- 🖥️ VISUALIZATION & ANALYTICS -->
                <div class="lg:col-span-8 space-y-12">
                    <!-- Live Digital Twin Farm -->
                    <div class="relative bg-white/5 backdrop-blur-3xl rounded-[64px] border border-white/10 p-1 lg:p-2 overflow-hidden aspect-[16/10] group">
                        <!-- Simulation Canvas -->
                        <div class="absolute inset-0 overflow-hidden">
                            <!-- Animated Background Grid -->
                            <div class="absolute inset-0 opacity-20" 
                                 :class="farmingMode === 'organic' ? 'bg-emerald-900/40' : (farmingMode === 'ai' ? 'bg-indigo-900/40' : 'bg-slate-900/40')"></div>
                            
                            <!-- Isometric Grid Simulation -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="grid grid-cols-8 gap-1 rotate-x-[60deg] rotate-z-[45deg] scale-[1.5] transition-all duration-1000">
                                    <template x-for="i in 64">
                                        <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-sm transition-all duration-700"
                                             :class="Math.random() > 0.6 ? (farmingMode === 'organic' ? 'bg-emerald-500/30' : 'bg-primary/30') : ''">
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Floating Assets -->
                            <template x-for="res in selectedResourcesData" :key="res.id">
                                <div class="absolute animate-float transition-all duration-1000" 
                                     :style="'top: ' + res.top + '%; left: ' + res.left + '%'">
                                    <div class="w-16 h-16 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl flex items-center justify-center text-white shadow-2xl">
                                        <span class="material-symbols-outlined text-[32px] animate-pulse" x-text="res.icon"></span>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Real-time HUD -->
                        <div class="absolute top-10 left-10 right-10 flex justify-between items-start pointer-events-none">
                            <div class="space-y-4">
                                <div class="p-6 bg-slate-900/80 backdrop-blur-xl border border-white/10 rounded-3xl space-y-1 min-w-[200px]">
                                    <p class="text-[10px] font-black text-white/40 uppercase tracking-widest">Est. Annual Revenue</p>
                                    <div class="flex items-baseline gap-2">
                                        <span class="text-3xl font-black text-white" x-text="'₹' + formatNumber(simData.revenue)"></span>
                                        <span class="text-[10px] font-bold text-emerald-400">+18.4%</span>
                                    </div>
                                </div>
                                <div class="p-6 bg-slate-900/80 backdrop-blur-xl border border-white/10 rounded-3xl space-y-1">
                                    <p class="text-[10px] font-black text-white/40 uppercase tracking-widest">Sustainability Score</p>
                                    <div class="flex items-center gap-4">
                                        <span class="text-3xl font-black text-white" x-text="simData.sustainability + '%'"></span>
                                        <div class="h-2 flex-1 bg-white/10 rounded-full overflow-hidden min-w-[100px]">
                                            <div class="h-full bg-emerald-500 rounded-full transition-all duration-1000" :style="'width: ' + simData.sustainability + '%'"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 text-right">
                                <div class="p-4 bg-emerald-500/20 backdrop-blur-xl border border-emerald-500/30 rounded-2xl inline-flex items-center gap-3">
                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse shadow-[0_0_10px_#10B981]"></div>
                                    <span class="text-[10px] font-black text-white uppercase tracking-widest">Live Optimization Engine Active</span>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Floating Stats -->
                        <div class="absolute bottom-6 md:bottom-10 left-6 md:left-10 right-6 md:left-10 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                            <div class="p-4 md:p-6 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl md:rounded-[32px] space-y-1 md:space-y-2">
                                <p class="text-[8px] md:text-[9px] font-black text-white/40 uppercase tracking-widest">Setup Cost</p>
                                <p class="text-sm md:text-xl font-black text-white" x-text="'₹' + formatNumber(simData.setupCost)"></p>
                            </div>
                            <div class="p-4 md:p-6 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl md:rounded-[32px] space-y-1 md:space-y-2">
                                <p class="text-[8px] md:text-[9px] font-black text-white/40 uppercase tracking-widest">Water Efficiency</p>
                                <p class="text-sm md:text-xl font-black text-white" x-text="simData.waterEfficiency + '%'"></p>
                            </div>
                            <div class="p-4 md:p-6 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl md:rounded-[32px] space-y-1 md:space-y-2">
                                <p class="text-[8px] md:text-[9px] font-black text-white/40 uppercase tracking-widest">Market Demand</p>
                                <p class="text-sm md:text-xl font-black text-emerald-400" x-text="simData.marketDemand + '%'"></p>
                            </div>
                        </div>
                    </div>

                    <!-- AI INSIGHTS FEED -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                        <div class="p-8 bg-white/5 backdrop-blur-2xl rounded-[48px] border border-white/10 space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary/20 rounded-2xl flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined">psychology</span>
                                </div>
                                <div>
                                    <h5 class="text-lg font-black text-white tracking-tight">AI Farm Insights</h5>
                                    <p class="text-[10px] font-bold text-white/30 uppercase tracking-widest">Predictive Recommendations</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <template x-for="insight in insights" :key="insight.id">
                                    <div class="flex gap-4 p-5 bg-white/5 rounded-3xl border border-white/5 hover:bg-white/10 transition-colors group">
                                        <span class="material-symbols-outlined text-primary group-hover:rotate-12 transition-transform" x-text="insight.icon"></span>
                                        <p class="text-[13px] font-bold text-white/70" x-text="insight.text"></p>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="p-8 bg-gradient-to-br from-indigo-600/20 to-primary/20 backdrop-blur-2xl rounded-[48px] border border-white/10 flex flex-col justify-between">
                            <div class="space-y-4">
                                <h5 class="text-xl font-black text-white tracking-tighter">Export Potential Index</h5>
                                <p class="text-white/60 text-sm leading-relaxed">Based on your current crop selection and infrastructure, your farm is eligible for Global GAP certification.</p>
                            </div>
                            <div class="mt-8 p-6 bg-white rounded-3xl flex items-center justify-between group cursor-pointer hover:bg-primary transition-all">
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-white/60 transition-colors">Eligible Subsidies</p>
                                    <p class="text-2xl font-black text-slate-900 group-hover:text-white transition-colors">Up to 45%</p>
                                </div>
                                <span class="material-symbols-outlined text-3xl text-primary group-hover:text-white transition-colors">arrow_circle_right</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <!-- 💰 FULL PROFITABILITY MODAL (FULL SCREEN) -->
            <div x-show="showProfitability" 
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-105"
                 class="fixed inset-0 z-[100] bg-slate-950 overflow-y-auto" x-cloak>
                
                <div class="min-h-screen flex flex-col">
                    <!-- Modal Header -->
                    <div class="sticky top-0 z-[110] bg-slate-950/80 backdrop-blur-2xl border-b border-white/5 p-6 md:px-12 flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center text-white">
                                <span class="material-symbols-outlined text-[28px]">payments</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-white tracking-tighter">Enterprise Profitability Simulator</h3>
                                <p class="text-[10px] font-bold text-white/30 uppercase tracking-[0.2em]">AgriMandi AI Intelligence Dashboard</p>
                            </div>
                        </div>
                        <button @click="showProfitability = false" class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-white/40 hover:text-white hover:bg-white/10 transition-all">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <div class="flex-1 p-6 md:p-12">
                        <div class="max-w-[1440px] mx-auto space-y-12">
                            <!-- High Level Summary -->
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                <template x-for="summary in [
                                    { label: 'Initial Investment', value: '₹' + formatNumber(simData.setupCost), icon: 'account_balance' },
                                    { label: 'Expected Annual Revenue', value: '₹' + formatNumber(simData.revenue), icon: 'trending_up' },
                                    { label: 'Net Annual Profit', value: '₹' + formatNumber(simData.revenue - (simData.setupCost * 0.15)), icon: 'payments' },
                                    { label: 'Break-even Period', value: Math.round(simData.setupCost / (simData.revenue * 0.4)) + ' Seasons', icon: 'timelapse' }
                                ]" :key="summary.label">
                                    <div class="p-8 bg-white/5 border border-white/10 rounded-[40px] space-y-4">
                                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-primary">
                                            <span class="material-symbols-outlined" x-text="summary.icon"></span>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black text-white/40 uppercase tracking-widest mb-1" x-text="summary.label"></p>
                                            <p class="text-3xl font-black text-white tracking-tighter" x-text="summary.value"></p>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                                <!-- Detailed Breakdown -->
                                <div class="lg:col-span-4 space-y-8">
                                    <div class="p-10 bg-white/5 border border-white/10 rounded-[56px] space-y-10">
                                        <h4 class="text-xl font-black text-white tracking-tighter">Operating Expenses</h4>
                                        <div class="space-y-6">
                                            <template x-for="exp in [
                                                { label: 'Maintenance', cost: simData.setupCost * 0.05, icon: 'build' },
                                                { label: 'Labor (Annual)', cost: 120000, icon: 'groups' },
                                                { label: 'Fertilizer & Seeds', cost: 85000, icon: 'grass' },
                                                { label: 'Logistics/Mandi Fees', cost: simData.revenue * 0.08, icon: 'local_shipping' },
                                                { label: 'Insurance (PMFBY)', cost: 12000, icon: 'verified' }
                                            ]" :key="exp.label">
                                                <div class="flex justify-between items-center group">
                                                    <div class="flex items-center gap-4">
                                                        <span class="material-symbols-outlined text-white/20 group-hover:text-primary transition-colors" x-text="exp.icon"></span>
                                                        <span class="text-[13px] font-bold text-white/60" x-text="exp.label"></span>
                                                    </div>
                                                    <span class="text-[14px] font-black text-white" x-text="'₹' + formatNumber(Math.round(exp.cost))"></span>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="pt-8 border-t border-white/10 flex justify-between items-center">
                                            <span class="text-[11px] font-black text-white/30 uppercase tracking-[0.2em]">Total OPEX</span>
                                            <span class="text-xl font-black text-rose-400" x-text="'₹' + formatNumber(Math.round(simData.setupCost * 0.15 + 217000))"></span>
                                        </div>
                                    </div>

                                    <div class="p-10 bg-primary/10 border border-primary/20 rounded-[56px] space-y-4">
                                        <h4 class="text-lg font-black text-white tracking-tight">AI Optimization Advice</h4>
                                        <p class="text-sm text-emerald-100/60 leading-relaxed">Transitioning to <span class="text-emerald-400 font-bold">Drip Irrigation</span> and <span class="text-emerald-400 font-bold">Solar Power</span> will reduce your operating costs by ₹84,200 annually, increasing your ROI by 12.4%.</p>
                                    </div>
                                </div>

                                <!-- Visual Analytics -->
                                <div class="lg:col-span-8 space-y-8">
                                    <div class="bg-white/5 border border-white/10 rounded-[64px] p-12">
                                        <div class="flex justify-between items-center mb-12">
                                            <div>
                                                <h4 class="text-2xl font-black text-white tracking-tighter">Growth Projection</h4>
                                                <p class="text-sm text-white/40">Expected yield vs market demand cycles over 5 years.</p>
                                            </div>
                                            <div class="flex gap-2 p-1 bg-white/5 rounded-xl">
                                                <button class="px-4 py-2 rounded-lg text-[10px] font-black uppercase bg-primary text-white">Yield</button>
                                                <button class="px-4 py-2 rounded-lg text-[10px] font-black uppercase text-white/30">Profit</button>
                                            </div>
                                        </div>
                                        <!-- High Fidelity Chart Placeholder -->
                                        <div class="h-80 w-full flex items-end gap-4 relative group">
                                            <template x-for="i in 12">
                                                <div class="flex-1 space-y-2 group/bar h-full flex flex-col justify-end">
                                                    <div class="w-full bg-emerald-500/10 rounded-t-2xl transition-all duration-700 hover:bg-emerald-500 relative"
                                                         :style="'height: ' + (Math.random() * 50 + 40) + '%'">
                                                         <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-white text-slate-900 text-[9px] font-black px-2 py-1 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">₹<span x-text="Math.round(Math.random()*10+20)"></span>L</div>
                                                    </div>
                                                    <p class="text-[9px] font-black text-white/20 text-center uppercase tracking-tighter" x-text="'M' + i"></p>
                                                </div>
                                            </template>
                                            <div class="absolute inset-0 flex items-center pointer-events-none">
                                                <div class="w-full h-px bg-white/5"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        <div class="p-10 bg-white/5 border border-white/10 rounded-[56px] space-y-6">
                                            <h4 class="text-lg font-black text-white">Sustainability Matrix</h4>
                                            <div class="space-y-4">
                                                <template x-for="metric in [
                                                    { label: 'Carbon Efficiency', val: 92, color: 'emerald' },
                                                    { label: 'Water Conservation', val: 84, color: 'indigo' },
                                                    { label: 'Soil Health Index', val: 76, color: 'amber' }
                                                ]" :key="metric.label">
                                                    <div class="space-y-2">
                                                        <div class="flex justify-between text-[11px] font-black uppercase tracking-widest text-white/40">
                                                            <span x-text="metric.label"></span>
                                                            <span class="text-white" x-text="metric.val + '%'"></span>
                                                        </div>
                                                        <div class="h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
                                                            <div class="h-full rounded-full transition-all duration-1000" 
                                                                 :class="'bg-' + metric.color + '-500'"
                                                                 :style="'width: ' + metric.val + '%'"></div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                        <div class="p-10 bg-indigo-600/10 border border-indigo-500/20 rounded-[56px] flex flex-col justify-between">
                                            <div class="space-y-4">
                                                <h4 class="text-lg font-black text-white">Export Intelligence</h4>
                                                <p class="text-sm text-indigo-100/60 leading-relaxed">Your crop selection matches quality standards for <span class="text-indigo-400 font-bold">EU and Middle-East markets</span>. Exporting could increase revenue by <span class="text-indigo-400 font-bold">240%</span>.</p>
                                            </div>
                                            <button class="w-full py-4 bg-indigo-500 text-white rounded-2xl text-[11px] font-black uppercase tracking-widest shadow-xl shadow-indigo-500/20">Apply for Export License</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- TRADING MADE SIMPLE (Moved down) -->
    <section id="how-it-works" class="py-32 bg-white relative">
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center max-w-3xl mx-auto space-y-6 mb-24">
                <h2 class="text-5xl md:text-6xl font-black text-slate-900 tracking-tighter">Trading Made Simple.</h2>
                <p class="text-lg text-slate-500 font-medium">A robust 3-step digital process ensuring maximum efficiency, security, and speed for every transaction.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 relative">
                <!-- Timeline Connector -->
                <div class="hidden lg:block absolute top-20 left-[15%] right-[15%] h-px bg-slate-100 z-0">
                    <div class="h-full bg-primary/30 w-0 group-hover:w-full transition-all duration-[2000ms]"></div>
                </div>

                @php
                    $steps = [
                        ['title' => 'List Stock', 'desc' => 'Upload commodity details, quality reports, and warehouse location in minutes.', 'icon' => 'inventory_2'],
                        ['title' => 'Live Auction', 'desc' => 'Verified buyers across India place real-time bids for your premium stock.', 'icon' => 'gavel'],
                        ['title' => 'Secure Fulfillment', 'desc' => 'Automated payment settlements and logistics coordination for safe delivery.', 'icon' => 'local_shipping']
                    ];
                @endphp
                @foreach($steps as $index => $step)
                    <div class="relative z-10 flex flex-col items-center text-center group">
                        <div class="w-32 h-32 bg-slate-50 rounded-[48px] border border-slate-100 flex items-center justify-center mb-10 group-hover:bg-primary group-hover:border-primary transition-all duration-500 group-hover:scale-110 shadow-sm group-hover:shadow-2xl group-hover:shadow-primary/30">
                            <span class="material-symbols-outlined text-5xl text-slate-400 group-hover:text-white transition-colors">{{ $step['icon'] }}</span>
                            <div class="absolute -top-4 -right-4 w-10 h-10 bg-white shadow-xl rounded-2xl flex items-center justify-center text-[13px] font-black text-primary border border-slate-100 group-hover:bg-slate-900 group-hover:text-white group-hover:border-slate-900 transition-all">
                                0{{ $index + 1 }}
                            </div>
                        </div>
                        <h4 class="text-3xl font-black text-slate-900 mb-4 tracking-tighter">{{ $step['title'] }}</h4>
                        <p class="text-slate-500 font-medium leading-relaxed px-4">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-24">
        <div class="max-w-[1440px] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="bg-primary rounded-[64px] p-12 md:p-24 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-white/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/4"></div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-10">
                        <h2 class="text-5xl md:text-6xl lg:text-7xl font-black text-white tracking-tighter leading-[0.95]">
                            Ready to Digitize Your Experience?
                        </h2>
                        <p class="text-xl text-white/70 font-medium leading-relaxed max-w-xl">
                            Join thousands of progressive farmers and institutional buyers today. Get access to premium pricing and real-time insights.
                        </p>
                        <div class="flex flex-wrap gap-5">
                            <a href="{{ route('register') }}" class="px-10 py-5 bg-white text-primary rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl hover:translate-y-[-4px] transition-all">
                                Open Free Account
                            </a>
                            <a href="{{ route('login') }}" class="px-10 py-5 bg-primary-container/20 text-white border border-white/20 rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] hover:bg-primary-container/30 transition-all">
                                Partner Sign In
                            </a>
                        </div>
                    </div>
                    <div class="relative lg:translate-y-24 translate-x-12 hidden lg:block">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop" class="rounded-[48px] shadow-2xl border-8 border-white/10 group-hover:-translate-y-4 transition-transform duration-700">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

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
                <div class="flex gap-4">
                    @foreach(['facebook', 'twitter', 'linkedin'] as $social)
                        <a href="#" class="w-14 h-14 rounded-2xl bg-white/5 flex items-center justify-center hover:bg-primary transition-all group">
                            <span class="material-symbols-outlined text-white/40 group-hover:text-white transition-colors">public</span>
                        </a>
                    @endforeach
                </div>
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
function homepageEngine() {
    return {
        scrolled: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.pageYOffset > 20;
            });
        },
        tickerItems: [
            { name: 'Wheat', price: 2150, change: 1.2 },
            { name: 'Basmati Rice', price: 3400, change: -0.5 },
            { name: 'Cotton', price: 7200, change: 2.8 },
            { name: 'Onion', price: 1850, change: -4.2 },
            { name: 'Potato', price: 1420, change: 1.1 },
            { name: 'Soybean', price: 4650, change: 0.4 },
            { name: 'Turmeric', price: 8200, change: 3.5 }
        ],
        init() {
            setInterval(() => {
                this.tickerItems.forEach(item => {
                    let change = (Math.random() * 20 - 10);
                    item.price = Math.round(item.price + change);
                    item.change = +(change / item.price * 100).toFixed(1);
                });
            }, 5000);
        },
        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}

function farmSimulator() {
    return {
        farmingMode: 'smart',
        selectedResources: ['solar', 'sensors'],
        selectedCrops: ['wheat', 'soybean'],
        showProfitability: false,
        simData: {
            revenue: 1245000,
            setupCost: 850000,
            sustainability: 78,
            waterEfficiency: 82,
            marketDemand: 94
        },
        modes: [
            { id: 'traditional', label: 'Traditional' },
            { id: 'smart', label: 'Smart Farm' },
            { id: 'organic', label: 'Organic' },
            { id: 'ai', label: 'AI Precision' },
            { id: 'export', label: 'Export' }
        ],
        resources: [
            { id: 'solar', label: 'Solar Power', icon: 'solar_power', cost: 150000, rev: 0.05 },
            { id: 'sensors', label: 'AI Sensors', icon: 'sensors', cost: 45000, rev: 0.12 },
            { id: 'drones', label: 'Drones', icon: 'precision_manufacturing', cost: 120000, rev: 0.15 },
            { id: 'storage', label: 'Cold Storage', icon: 'ac_unit', cost: 350000, rev: 0.25 },
            { id: 'irrigation', label: 'Smart Water', icon: 'water_drop', cost: 95000, rev: 0.08 },
            { id: 'warehouse', label: 'Warehouse', icon: 'warehouse', cost: 500000, rev: 0.2 }
        ],
        crops: [
            { id: 'wheat', label: 'Wheat', rev: 250000 },
            { id: 'cotton', label: 'Cotton', rev: 450000 },
            { id: 'soybean', label: 'Soybean', rev: 320000 },
            { id: 'maize', label: 'Maize', rev: 210000 },
            { id: 'sugarcane', label: 'Sugarcane', rev: 650000 },
            { id: 'potatoes', label: 'Potatoes', rev: 280000 }
        ],
        insights: [
            { id: 1, icon: 'trending_up', text: 'Soybean demand expected to rise by 18% in Maharashtra.' },
            { id: 2, icon: 'water_drop', text: 'Solar irrigation can reduce operational cost by 32%.' },
            { id: 3, icon: 'wb_sunny', text: 'Weather patterns favor Rabi crops for the next 4 months.' }
        ],
        init() {
            this.calculateSim();
            setInterval(() => {
                this.simData.marketDemand = Math.round(90 + Math.random() * 10);
                this.calculateSim();
            }, 3000);
        },
        toggleResource(id) {
            if (this.selectedResources.includes(id)) {
                this.selectedResources = this.selectedResources.filter(r => r !== id);
            } else {
                this.selectedResources.push(id);
            }
            this.calculateSim();
        },
        toggleCrop(id) {
            if (this.selectedCrops.includes(id)) {
                this.selectedCrops = this.selectedCrops.filter(c => c !== id);
            } else {
                this.selectedCrops.push(id);
            }
            this.calculateSim();
        },
        calculateSim() {
            let cost = 200000;
            let rev = 0;
            let sustain = 60;
            let water = 50;
            let eligibility = 40;

            this.selectedResources.forEach(rid => {
                const res = this.resources.find(r => r.id === rid);
                cost += res.cost;
                rev += (cost * res.rev);
                sustain += 5;
                water += 8;
                eligibility += 10;
            });

            this.selectedCrops.forEach(cid => {
                const crop = this.crops.find(c => c.id === cid);
                rev += crop.rev;
                sustain += 2;
                eligibility += 2;
            });

            if (this.farmingMode === 'organic') { sustain += 20; eligibility += 15; }
            if (this.farmingMode === 'ai') { rev *= 1.2; sustain += 10; water += 20; eligibility += 10; }
            if (this.farmingMode === 'export') { rev *= 1.4; cost *= 1.3; eligibility += 5; }

            this.simData.setupCost = Math.round(cost);
            this.simData.revenue = Math.round(rev);
            this.simData.sustainability = Math.min(98, sustain);
            this.simData.waterEfficiency = Math.min(95, water);
            this.simData.eligibility = Math.min(96, eligibility);
        },
        get selectedResourcesData() {
            return this.selectedResources.map((id, index) => {
                const res = this.resources.find(r => r.id === id);
                return {
                    ...res,
                    top: 20 + (index * 15) % 60,
                    left: 20 + (index * 25) % 60
                };
            });
        },
        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>
@endpush

@endsection
