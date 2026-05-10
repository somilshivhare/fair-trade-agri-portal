@extends("layouts.app")

@section("content")

<!-- TopAppBar JSON Render -->
<nav class="fixed top-0 w-full z-50 bg-emerald-950/20 backdrop-blur-xl border-b border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.3)]">
<div class="flex justify-between items-center w-full px-12 py-4 max-w-[1440px] mx-auto">
<div class="flex items-center gap-12">
<a class="text-2xl font-black text-emerald-500 tracking-tighter uppercase font-headline-md" href="#">AgriNova Tech</a>
<div class="hidden md:flex items-center gap-8">
<a class="text-emerald-400 border-b-2 border-emerald-500 pb-1 font-label-bold" href="#">Platform</a>
<a class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-3 py-2 duration-300 active:scale-95 cursor-pointer" href="#">Solutions</a>
<a class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-3 py-2 duration-300 active:scale-95 cursor-pointer" href="#">Analytics</a>
<a class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-3 py-2 duration-300 active:scale-95 cursor-pointer" href="#">Pricing</a>
</div>
</div>
<div class="hidden md:flex items-center gap-6">
<button class="text-white/70 hover:text-emerald-300 transition-colors font-label-bold hover:bg-white/5 rounded-lg px-4 py-2 duration-300 active:scale-95 cursor-pointer">Login</button>
<button class="bg-primary text-on-primary font-label-bold px-6 py-2.5 rounded-lg hover:bg-primary-fixed transition-colors shadow-[0_0_20px_rgba(63,229,108,0.2)] active:scale-95 cursor-pointer">Get Started</button>
</div>
</div>
</nav>
<!-- Hero Section -->
<section class="relative min-h-[921px] flex items-center pt-24 overflow-hidden">
<div class="absolute inset-0 z-0">
<img alt="Lush golden wheat field at sunrise" class="w-full h-full object-cover object-center opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBPvmWL5JhsdCovGFeaR9H-oKc5fvcUp-6DauJJaBUPQU99h7NbItb6d0gCTzMLDyF_B8SpvL32SNdPPM39MM2LG-KJEJjBOEp_0WPCFeVfmfHnmebA-P8z7eX21Q05vLEU3rltcTzoO78nEZ_ilh0QUDyET6d46QJ9Y8_5K-S72i_tb2Gi2VwlLXy1IksTH8TjuZKRaFsyEvZHO9MWyId_fsLb1Ah5q9xGnm3nr5PXS2H3l_HmoRLWzKThLJuQUOTMoD5J4UBP40X"/>
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
<button class="bg-primary text-on-primary font-label-bold px-8 py-4 rounded-lg hover:bg-primary-fixed transition-all duration-300 shadow-[0_0_30px_rgba(63,229,108,0.3)] hover:shadow-[0_0_40px_rgba(63,229,108,0.5)] flex items-center gap-2">
                        Start Selling
                        <span class="material-symbols-outlined" data-icon="arrow_forward" data-weight="fill" style="font-variation-settings: 'FILL' 1;">arrow_forward</span>
</button>
<button class="glass-panel text-on-surface font-label-bold px-8 py-4 rounded-lg hover:bg-white/10 transition-all duration-300 flex items-center gap-2">
                        Explore Market Prices
                        <span class="material-symbols-outlined" data-icon="monitoring" data-weight="fill" style="font-variation-settings: 'FILL' 1;">monitoring</span>
</button>
</div>
</div>
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
<span class="material-symbols-outlined" data-icon="grass" data-weight="fill" style="font-variation-settings: 'FILL' 1;">grass</span>
</div>
<div>
<p class="font-label-bold text-label-bold text-on-surface">Premium Wheat</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">Indore Mandi</p>
</div>
</div>
<div class="text-right">
<p class="font-headline-md text-headline-md text-primary">₹2,450</p>
<p class="font-label-sm text-label-sm text-primary flex items-center justify-end gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span> +2.4%
                                </p>
</div>
</div>
<div class="flex justify-between items-center p-4 bg-surface-container/50 rounded-lg border border-white/5 hover:bg-white/5 transition-colors">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg bg-surface-variant flex items-center justify-center text-secondary">
<span class="material-symbols-outlined" data-icon="eco" data-weight="fill" style="font-variation-settings: 'FILL' 1;">eco</span>
</div>
<div>
<p class="font-label-bold text-label-bold text-on-surface">Soybean (Yellow)</p>
<p class="font-label-sm text-label-sm text-on-surface-variant">Ujjain Mandi</p>
</div>
</div>
<div class="text-right">
<p class="font-headline-md text-headline-md text-on-surface">₹4,820</p>
<p class="font-label-sm text-label-sm text-secondary flex items-center justify-end gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="trending_flat">trending_flat</span> 0.0%
                                </p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Redesigned Capabilities Grid -->
<section class="py-24 relative overflow-hidden bg-surface-container-lowest">
<div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
<div class="text-center mb-16 max-w-3xl mx-auto">
<span class="text-primary font-label-bold tracking-widest uppercase mb-4 block">Engineered Excellence</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Platform Capabilities</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Harness the power of enterprise-grade tools built for the modern agricultural ecosystem.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Interactive Feature 1 -->
<div class="glass-panel-elevated rounded-xl p-8 card-hover-effect transition-all duration-500 group cursor-pointer overflow-hidden relative">
<div class="absolute -bottom-10 -right-10 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
<div class="w-14 h-14 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-on-primary transition-all duration-300">
<span class="material-symbols-outlined text-[32px]">candlestick_chart</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-3">Live Mandi Tracking</h3>
<p class="font-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">Real-time price aggregation across 500+ regional markets.</p>
</div>
<!-- Interactive Feature 2 -->
<div class="glass-panel-elevated rounded-xl p-8 card-hover-effect transition-all duration-500 group cursor-pointer overflow-hidden relative">
<div class="absolute -bottom-10 -right-10 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
<div class="w-14 h-14 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-on-primary transition-all duration-300">
<span class="material-symbols-outlined text-[32px]">handshake</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-3">Direct Bidding</h3>
<p class="font-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">Bypass intermediaries with competitive, verifiable direct bids.</p>
</div>
<!-- Interactive Feature 3 -->
<div class="glass-panel-elevated rounded-xl p-8 card-hover-effect transition-all duration-500 group cursor-pointer overflow-hidden relative">
<div class="absolute -bottom-10 -right-10 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
<div class="w-14 h-14 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-on-primary transition-all duration-300">
<span class="material-symbols-outlined text-[32px]">psychiatry</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-3">AI Insights</h3>
<p class="font-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">Predictive analytics for optimal harvest and selling times.</p>
</div>
<!-- Interactive Feature 4 -->
<div class="glass-panel-elevated rounded-xl p-8 card-hover-effect transition-all duration-500 group cursor-pointer overflow-hidden relative">
<div class="absolute -bottom-10 -right-10 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
<div class="w-14 h-14 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-on-primary transition-all duration-300">
<span class="material-symbols-outlined text-[32px]">shield_lock</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-3">Fraud Protection</h3>
<p class="font-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">Bank-grade escrow and KYC-verified procurement agents.</p>
</div>
</div>
</div>
</section>
<!-- How It Works Section -->
<section class="py-24 bg-background relative border-y border-white/5">
<div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">
<div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
<div class="max-w-xl">
<span class="text-primary font-label-bold tracking-widest uppercase mb-4 block">Process Workflow</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Seamless Market Entry</h2>
</div>
<button class="text-primary border border-primary/30 px-6 py-3 rounded-lg font-label-bold hover:bg-primary/5 transition-all">View Full Guide</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
<!-- Connective Line (Desktop) -->
<div class="hidden md:block absolute top-1/2 left-0 w-full h-[2px] bg-gradient-to-r from-emerald-500/0 via-emerald-500/20 to-emerald-500/0 -translate-y-12"></div>
<!-- Step 1 -->
<div class="relative flex flex-col items-center text-center group">
<div class="w-20 h-20 rounded-full bg-surface-container-highest border-4 border-background flex items-center justify-center text-primary mb-6 z-10 group-hover:scale-110 group-hover:border-emerald-500/50 transition-all duration-500 step-gradient">
<span class="material-symbols-outlined text-4xl">inventory_2</span>
</div>
<div class="absolute -top-4 font-black text-6xl text-white/5 select-none">01</div>
<h3 class="text-xl font-bold text-on-surface mb-2">List Crops</h3>
<p class="text-on-surface-variant text-sm px-4">Upload crop photos and quality specifications for valuation.</p>
</div>
<!-- Step 2 -->
<div class="relative flex flex-col items-center text-center group">
<div class="w-20 h-20 rounded-full bg-surface-container-highest border-4 border-background flex items-center justify-center text-primary mb-6 z-10 group-hover:scale-110 group-hover:border-emerald-500/50 transition-all duration-500 step-gradient">
<span class="material-symbols-outlined text-4xl">request_quote</span>
</div>
<div class="absolute -top-4 font-black text-6xl text-white/5 select-none">02</div>
<h3 class="text-xl font-bold text-on-surface mb-2">Get Bids</h3>
<p class="text-on-surface-variant text-sm px-4">Receive real-time offers from verified buyers nationwide.</p>
</div>
<!-- Step 3 -->
<div class="relative flex flex-col items-center text-center group">
<div class="w-20 h-20 rounded-full bg-surface-container-highest border-4 border-background flex items-center justify-center text-primary mb-6 z-10 group-hover:scale-110 group-hover:border-emerald-500/50 transition-all duration-500 step-gradient">
<span class="material-symbols-outlined text-4xl">local_shipping</span>
</div>
<div class="absolute -top-4 font-black text-6xl text-white/5 select-none">03</div>
<h3 class="text-xl font-bold text-on-surface mb-2">Secure Logistics</h3>
<p class="text-on-surface-variant text-sm px-4">Coordinate transport through our insured logistics network.</p>
</div>
<!-- Step 4 -->
<div class="relative flex flex-col items-center text-center group">
<div class="w-20 h-20 rounded-full bg-primary border-4 border-background flex items-center justify-center text-on-primary mb-6 z-10 group-hover:scale-110 group-hover:shadow-[0_0_30px_rgba(63,229,108,0.4)] transition-all duration-500">
<span class="material-symbols-outlined text-4xl">payments</span>
</div>
<div class="absolute -top-4 font-black text-6xl text-white/5 select-none">04</div>
<h3 class="text-xl font-bold text-on-surface mb-2">Instant Payment</h3>
<p class="text-on-surface-variant text-sm px-4">Funds released immediately upon quality verification.</p>
</div>
</div>
</div>
</section>
<!-- Platform Statistics -->
<section class="py-20 bg-surface-container-lowest overflow-hidden">
<div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">
<div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
<div class="flex flex-col gap-2 p-8 glass-panel rounded-2xl border border-emerald-500/10">
<span class="text-primary text-5xl font-black tracking-tighter">₹450Cr+</span>
<span class="text-on-surface-variant font-label-bold uppercase tracking-widest text-xs">Total Trade Volume</span>
</div>
<div class="flex flex-col gap-2 p-8 glass-panel rounded-2xl border border-emerald-500/10">
<span class="text-primary text-5xl font-black tracking-tighter">125K+</span>
<span class="text-on-surface-variant font-label-bold uppercase tracking-widest text-xs">Verified Producers</span>
</div>
<div class="flex flex-col gap-2 p-8 glass-panel rounded-2xl border border-emerald-500/10">
<span class="text-primary text-5xl font-black tracking-tighter">24/7</span>
<span class="text-on-surface-variant font-label-bold uppercase tracking-widest text-xs">Global Market Access</span>
</div>
</div>
</div>
</section>
<!-- Live Network Activity -->
<section class="py-24 bg-background relative overflow-hidden">
<!-- Stylized Map Background (Decorative) -->
<div class="absolute inset-0 opacity-[0.03] pointer-events-none">
<svg class="w-full h-full text-emerald-500 fill-current" viewbox="0 0 1000 500">
<path d="M150,100 Q400,50 600,150 T900,100 M200,300 Q450,450 700,300 T850,400" fill="none" stroke="currentColor" stroke-width="2"></path>
<circle class="animate-pulse" cx="200" cy="150" r="5"></circle>
<circle class="animate-pulse" cx="500" cy="250" r="5"></circle>
<circle class="animate-pulse" cx="800" cy="120" r="5"></circle>
</svg>
</div>
<div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
<div class="text-center mb-12">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Live Market Pulse</h2>
<p class="text-on-surface-variant">Real-time transaction activity across our ecosystem.</p>
</div>
<div class="relative overflow-hidden w-full h-32 bg-surface-container/30 border-y border-white/5 rounded-xl">
<div class="absolute flex gap-8 whitespace-nowrap py-8 animate-scroll items-center">
<!-- Transaction Cards -->
<div class="glass-panel px-6 py-3 rounded-lg border border-primary/20 flex items-center gap-3">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span class="text-sm font-label-bold text-on-surface">Indore: 50MT Wheat Sold</span>
<span class="text-primary text-sm font-bold">₹1.2M</span>
</div>
<div class="glass-panel px-6 py-3 rounded-lg border border-primary/20 flex items-center gap-3">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span class="text-sm font-label-bold text-on-surface">Ujjain: New Bid for Soy</span>
<span class="text-primary text-sm font-bold">₹4,850/q</span>
</div>
<div class="glass-panel px-6 py-3 rounded-lg border border-primary/20 flex items-center gap-3">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span class="text-sm font-label-bold text-on-surface">Bhopal: Logistic Dispatched</span>
<span class="text-secondary text-sm font-bold">Active</span>
</div>
<div class="glass-panel px-6 py-3 rounded-lg border border-primary/20 flex items-center gap-3">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span class="text-sm font-label-bold text-on-surface">Pune: Transaction Settled</span>
<span class="text-primary text-sm font-bold">₹850K</span>
</div>
<!-- Repeated for loop -->
<div class="glass-panel px-6 py-3 rounded-lg border border-primary/20 flex items-center gap-3">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span class="text-sm font-label-bold text-on-surface">Indore: 50MT Wheat Sold</span>
<span class="text-primary text-sm font-bold">₹1.2M</span>
</div>
<div class="glass-panel px-6 py-3 rounded-lg border border-primary/20 flex items-center gap-3">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span class="text-sm font-label-bold text-on-surface">Ujjain: New Bid for Soy</span>
<span class="text-primary text-sm font-bold">₹4,850/q</span>
</div>
</div>
</div>
</div>
</section>
<!-- Redesigned Footer -->
<footer class="bg-[#0c0e15] border-t border-white/5 pt-24 pb-12">
<div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-24">
<!-- Brand Info -->
<div class="lg:col-span-4 flex flex-col gap-6">
<a class="text-2xl font-black text-emerald-500 tracking-tighter uppercase" href="#">AgriNova Tech</a>
<p class="text-on-surface-variant text-body-md leading-relaxed">
                        Leading the digital transformation of agricultural supply chains with precision data, verified networking, and secure financial infrastructure.
                    </p>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-lg glass-panel flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all" href="#">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
</a>
<a class="w-10 h-10 rounded-lg glass-panel flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all" href="#">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
</a>
</div>
</div>
<!-- Footer Links -->
<div class="lg:col-span-5 grid grid-cols-2 md:grid-cols-3 gap-8">
<div class="flex flex-col gap-4">
<h4 class="font-label-bold text-on-surface">Product</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Market Place</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Agri-Analytics</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Smart Bidding</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Pricing</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-bold text-on-surface">Company</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">About Us</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Sustainability</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Careers</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Newsroom</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-bold text-on-surface">Resources</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Mandi Reports</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">API Docs</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Compliance</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Support</a>
</div>
</div>
<!-- Newsletter -->
<div class="lg:col-span-3 flex flex-col gap-6">
<h4 class="font-label-bold text-on-surface">Stay Updated</h4>
<p class="text-on-surface-variant text-sm">Get the weekly mandi insights and platform updates directly.</p>
<div class="flex flex-col gap-2">
<div class="relative">
<input class="w-full bg-surface-container-high border border-white/10 rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all" placeholder="Email address" type="email"/>
<button class="absolute right-2 top-2 bg-primary text-on-primary p-1.5 rounded-md hover:bg-primary-fixed transition-colors">
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
<!-- Bottom Copyright -->
<div class="border-t border-white/5 pt-12 flex flex-col md:flex-row justify-between items-center gap-6">
<span class="text-on-surface-variant text-sm">© 2024 AgriNova Systems. Precision Engineering for Sustainable Growth.</span>
<div class="flex gap-8">
<a class="text-on-surface-variant hover:text-on-surface text-sm" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-on-surface text-sm" href="#">Terms of Service</a>
<a class="text-on-surface-variant hover:text-on-surface text-sm" href="#">Sitemap</a>
</div>
</div>
</div>
</footer>

@endsection
