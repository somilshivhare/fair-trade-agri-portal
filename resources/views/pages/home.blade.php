@extends('layouts.app')

@section('title', 'Home - Fair Trade Agri-Portal')

@section('content')
<!-- TopAppBar -->
<nav class="fixed top-0 w-full z-50 bg-emerald-950/20 backdrop-blur-xl border-b border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.3)]">
    <div class="flex justify-between items-center w-full px-12 py-4 max-w-[1440px] mx-auto">
        <div class="flex items-center gap-12">
            <a class="text-2xl font-black text-emerald-500 tracking-tighter uppercase font-headline-md" href="{{ route('home') }}">AgriNova Tech</a>
            <div class="hidden md:flex items-center gap-8">
                <a class="text-emerald-400 border-b-2 border-emerald-500 pb-1 font-label-bold" href="{{ route('home') }}">Platform</a>
                <a class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-3 py-2 duration-300 active:scale-95 cursor-pointer" href="#">Solutions</a>
                <a class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-3 py-2 duration-300 active:scale-95 cursor-pointer" href="#">Analytics</a>
                <a class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-3 py-2 duration-300 active:scale-95 cursor-pointer" href="#">Pricing</a>
            </div>
        </div>
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('login') }}" class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-4 py-2 duration-300 active:scale-95 cursor-pointer">Login</a>
            <a href="{{ route('register') }}" class="bg-primary text-on-primary font-label-bold px-6 py-2.5 rounded-lg hover:bg-primary-fixed transition-colors shadow-[0_0_20px_rgba(63,229,108,0.2)] active:scale-95 cursor-pointer">Get Started</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative min-h-[921px] flex items-center pt-24 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Lush golden wheat field at sunrise" class="w-full h-full object-cover object-center opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBPvmWL5JhsdCovGFeaR9H-oKc5fvcUp-6DauJJaBUPQU99h7NbItb6d0gCTzMLDyF_B8SpvL32SNdPPM39MM2LG-KJEJjBOEp_0WPCFeVfmfHnmebA-P8z7eX21Q05vLEU3rltcTzoO78nEZ_ilh0QUDyET6d46QJ9Y8_5K-S72i_tb2Gi2VwlLXy1IksTH8TjuZKRaFsyEvZHO9MWyId_fsLb1Ah5q9xGnm3nr5PXS2H3l_HmoRLWzKThLJuQUOTMoD5J4UBP40X" />
        <div class="absolute inset-0 bg-gradient-to-b from-background/80 via-background/60 to-background"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <div class="relative z-10 w-full max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
        <div class="lg:col-span-7 flex flex-col gap-8">
            <h1 class="font-display-xl text-display-xl text-on-surface text-glow leading-tight">
                Sell Smarter.<br/>
                <span class="text-primary">Earn Better.</span>
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
                Compare live mandi prices, receive direct buyer bids, and maximize your farm profits with data-driven recommendations. The precision-engineered gateway for enterprise agriculture.
            </p>
            <div class="flex flex-wrap gap-4 mt-4">
                <a href="{{ route('register') }}" class="bg-primary text-on-primary font-label-bold px-8 py-4 rounded-lg hover:bg-primary-fixed transition-all duration-300 shadow-[0_0_30px_rgba(63,229,108,0.3)] hover:shadow-[0_0_40px_rgba(63,229,108,0.5)] flex items-center gap-2">
                    Start Selling
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">arrow_forward</span>
                </a>
                <button class="glass-panel text-on-surface font-label-bold px-8 py-4 rounded-lg hover:bg-white/10 transition-all duration-300 flex items-center gap-2">
                    Explore Market Prices
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">monitoring</span>
                </button>
            </div>
        </div>

        <!-- Live Mandi Index Card -->
        <div class="lg:col-span-5 mt-12 lg:mt-0">
            <div class="glass-panel-elevated rounded-xl p-8 relative overflow-hidden">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-primary/20 rounded-full blur-[80px]"></div>
                <div class="flex justify-between items-center mb-6 relative z-10">
                    <h3 class="font-headline-md text-headline-md text-on-surface">Live Mandi Index</h3>
                    <span class="bg-primary/20 text-primary px-3 py-1 rounded-full font-label-sm text-label-sm border border-primary/30 flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Live
                    </span>
                </div>
                <div class="space-y-4 relative z-10">
                    <div class="flex justify-between items-center p-4 bg-surface-container/50 rounded-lg border border-white/5 hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-variant flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">grass</span>
                            </div>
                            <div>
                                <p class="font-label-bold text-label-bold text-on-surface">Premium Wheat</p>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">Indore Mandi</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-headline-md text-headline-md text-primary">₹2,450</p>
                            <p class="font-label-sm text-label-sm text-primary flex items-center justify-end gap-1">
                                <span class="material-symbols-outlined text-[14px]">trending_up</span> +2.4%
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center p-4 bg-surface-container/50 rounded-lg border border-white/5 hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-variant flex items-center justify-center text-secondary">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">eco</span>
                            </div>
                            <div>
                                <p class="font-label-bold text-label-bold text-on-surface">Soybean (Yellow)</p>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">Ujjain Mandi</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-headline-md text-headline-md text-on-surface">₹4,820</p>
                            <p class="font-label-sm text-label-sm text-secondary flex items-center justify-end gap-1">
                                <span class="material-symbols-outlined text-[14px]">trending_flat</span> 0.0%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-24 relative overflow-hidden bg-surface">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Platform Capabilities</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Engineered for scale. Our comprehensive suite of tools provides total visibility and control over your agricultural supply chain.</p>
        </div>

        <!-- Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $features = [
                    ['icon' => 'candlestick_chart', 'title' => 'Live Mandi Tracking', 'desc' => 'Real-time price aggregation across 500+ regional markets. Spot trends before they impact your margins.'],
                    ['icon' => 'handshake', 'title' => 'Direct Bidding', 'desc' => 'Bypass intermediaries. Receive competitive, verifiable bids directly from verified enterprise buyers.'],
                    ['icon' => 'psychiatry', 'title' => 'Smart Recommendations', 'desc' => 'AI-driven insights analyzing historical data, weather patterns, and market demand.'],
                    ['icon' => 'calculate', 'title' => 'Net Profit Calculator', 'desc' => 'Instantly compute actual margins by factoring in logistics, taxes, and local fees.'],
                    ['icon' => 'local_shipping', 'title' => 'Order Tracking & Logistics', 'desc' => 'End-to-end visibility. Monitor freight movement and delivery status in real-time.', 'span' => 2],
                    ['icon' => 'shield_lock', 'title' => 'Fraud Prevention', 'desc' => 'Bank-grade escrow systems and KYC-verified buyers ensure your payments are secure.'],
                ];
            @endphp

            @foreach($features as $feature)
                <div class="glass-panel rounded-xl p-8 hover:bg-white/5 transition-all duration-300 group cursor-pointer border border-white/5 hover:border-primary/30 {{ isset($feature['span']) && $feature['span'] == 2 ? 'lg:col-span-2' : '' }}">
                    <div class="w-14 h-14 rounded-lg bg-surface-variant flex items-center justify-center text-primary mb-6 group-hover:scale-110 transition-transform duration-300 shadow-[0_0_15px_rgba(63,229,108,0.1)] group-hover:shadow-[0_0_25px_rgba(63,229,108,0.3)]">
                        <span class="material-symbols-outlined text-[32px]">{{ $feature['icon'] }}</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-3">{{ $feature['title'] }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="w-full py-16 px-12 border-t border-t-white/5 bg-zinc-950 text-emerald-500 font-manrope text-sm font-light">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 max-w-7xl mx-auto">
        <div class="flex flex-col gap-4">
            <span class="text-lg font-bold text-emerald-500">AgriNova Tech</span>
            <span class="text-zinc-500">© 2024 AgriNova Systems. Precision Engineering for Sustainable Growth.</span>
        </div>
        <div class="flex flex-col gap-3">
            <a class="text-zinc-500 hover:text-emerald-400 transition-colors hover:opacity-80" href="#">Privacy Policy</a>
            <a class="text-zinc-500 hover:text-emerald-400 transition-colors hover:opacity-80" href="#">Terms of Service</a>
        </div>
        <div class="flex flex-col gap-3">
            <a class="text-zinc-500 hover:text-emerald-400 transition-colors hover:opacity-80" href="#">API Documentation</a>
            <a class="text-zinc-500 hover:text-emerald-400 transition-colors hover:opacity-80" href="#">Compliance</a>
        </div>
        <div class="flex flex-col gap-3">
            <a class="text-zinc-500 hover:text-emerald-400 transition-colors hover:opacity-80" href="#">Global Support</a>
        </div>
    </div>
</footer>
@endsection
