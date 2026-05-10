@extends('layouts.stitch')
@section('title', 'Received Bids - AgriMandi')
@section('content')
<!-- Top Market Ticker Specialty Component -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 py-2 px-margin-desktop overflow-hidden whitespace-nowrap">
<div class="flex items-center gap-12 animate-marquee">
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant">WHEAT (MP)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹2,450 <span class="material-symbols-outlined text-[12px] align-middle">trending_up</span></span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant">BASMATI RICE</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹8,100 <span class="material-symbols-outlined text-[12px] align-middle">trending_up</span></span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant">MUSTARD SEEDS</span>
<span class="text-label-sm font-label-sm text-error font-bold">₹5,600 <span class="material-symbols-outlined text-[12px] align-middle">trending_down</span></span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant">SOYBEAN</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹4,820 <span class="material-symbols-outlined text-[12px] align-middle">trending_up</span></span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant">COTTON (BALE)</span>
<span class="text-label-sm font-label-sm text-on-surface font-bold">₹32,000 <span class="material-symbols-outlined text-[12px] align-middle">horizontal_rule</span></span>
</div>
</div>
</div>
<!-- TopNavBar -->
<header class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)] flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50">
<div class="flex items-center gap-8">
<div class="font-headline-md text-primary font-bold tracking-tight text-headline-md">AgriMandi India</div>
<nav class="hidden md:flex gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Analytics</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center gap-2 mr-4">
<span class="material-symbols-outlined text-on-surface-variant">language</span>
<span class="font-label-md text-label-md text-on-surface">Hindi</span>
</div>
<button class="material-symbols-outlined text-on-surface-variant p-2 hover:bg-primary-container/10 rounded-full transition-colors">notifications</button>
<div class="h-10 w-10 rounded-full bg-primary-fixed overflow-hidden border-2 border-primary/20">
<img alt="Farmer profile avatar" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ_sqYmhY9MOtzED1Y_RnXBIcDnPOnpjiCv4dhB9utIzSDU8sEkLHXJjW-0zc2TiGY9KXXWHyRJVMVUxyLg7jnSTZHZN4NLFQsWk-Jb4LcC0c-eKxIWaUgKR0WMKdhDLDGQLVrI--iBxrKVofRosFRfW1tkSVea3Maf2PDqfPaLuf3WhBkCMntqHi9BTiNLjkXglLzoAArvHcPv2Wnrw-K-11w--SsqcT8wlIWE8ev8uk8nx0xb5bgAJCAm6HrXLkx1jsrU5XV8L10"/>
</div>
<button class="bg-primary-container text-on-primary-container px-6 py-2 rounded-xl font-label-md text-label-md active:scale-95 transition-transform duration-200">Start Selling</button>
</div>
</header>
<div class="flex flex-1 max-w-[1440px] mx-auto w-full">
<!-- SideNavBar -->
<aside class="hidden lg:flex flex-col w-72 h-[calc(100vh-80px)] py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 sticky top-20">
<div class="px-6 mb-4">
<div class="font-headline-sm text-primary font-bold text-headline-md">AgriMandi India</div>
<div class="text-label-sm font-label-sm text-on-surface-variant opacity-70">Premium Marketplace</div>
</div>
<nav class="flex flex-col gap-1 px-4">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 hover:text-on-surface transition-all duration-300 rounded-lg" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 hover:text-on-surface transition-all duration-300 rounded-lg" href="#">
<span class="material-symbols-outlined">inventory_2</span>
<span class="font-label-md text-label-md">My Products</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg" href="#">
<span class="material-symbols-outlined">gavel</span>
<span class="font-label-md text-label-md">Bids</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 hover:text-on-surface transition-all duration-300 rounded-lg" href="#">
<span class="material-symbols-outlined">shopping_bag</span>
<span class="font-label-md text-label-md">Orders</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 hover:text-on-surface transition-all duration-300 rounded-lg" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md text-label-md">Settings</span>
</a>
</nav>
<div class="mt-auto px-6">
<div class="p-4 bg-primary-fixed-dim/20 rounded-2xl border border-primary/10">
<div class="text-primary font-bold font-label-md text-label-md mb-2">Market Insights</div>
<p class="text-label-sm font-label-sm text-on-surface-variant leading-tight">Grain prices expected to rise by 4% next week. Consider holding inventory.</p>
</div>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 p-margin-desktop bg-surface">
<div class="flex justify-between items-end mb-xl">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface">Received Bids</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">Negotiate and manage active offers for your listed commodities.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-4 py-2 border border-outline-variant/30 rounded-xl bg-surface-container-lowest text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-[20px]">filter_list</span> Filter
                    </button>
<button class="flex items-center gap-2 px-4 py-2 border border-outline-variant/30 rounded-xl bg-surface-container-lowest text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-[20px]">sort</span> Sort
                    </button>
</div>
</div>
<!-- Bento Layout for Bids Content -->
<div class="grid grid-cols-12 gap-gutter">
<!-- Active Bids Table Container -->
<div class="col-span-12 xl:col-span-9 bg-surface-container-lowest rounded-xl emerald-glow p-lg border border-outline-variant/10">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low/50">
<th class="py-4 px-6 font-label-lg text-label-lg text-on-surface-variant rounded-tl-xl">Commodity</th>
<th class="py-4 px-6 font-label-lg text-label-lg text-on-surface-variant">Bidder</th>
<th class="py-4 px-6 font-label-lg text-label-lg text-on-surface-variant">Price Offered</th>
<th class="py-4 px-6 font-label-lg text-label-lg text-on-surface-variant">Quantity</th>
<th class="py-4 px-6 font-label-lg text-label-lg text-on-surface-variant">Status</th>
<th class="py-4 px-6 font-label-lg text-label-lg text-on-surface-variant rounded-tr-xl">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-5 px-6">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-lg bg-primary-fixed-dim/20 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">eco</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Pusa Basmati 1121</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Warehouse: Karnal</div>
</div>
</div>
</td>
<td class="py-5 px-6">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed text-xs font-bold">MK</div>
<div class="font-body-md text-body-md text-on-surface">Mahaveer Kothari</div>
</div>
</td>
<td class="py-5 px-6">
<div class="font-label-lg text-label-lg text-primary">₹8,450 / Quintal</div>
<div class="text-label-sm font-label-sm text-error">-2% Market Avg</div>
</td>
<td class="py-5 px-6 font-body-md text-body-md text-on-surface">250 MT</td>
<td class="py-5 px-6">
<span class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant rounded-full text-label-sm font-label-sm">Active</span>
</td>
<td class="py-5 px-6">
<div class="flex gap-2">
<button class="bg-primary text-on-primary px-4 py-2 rounded-lg text-label-sm font-label-sm hover:opacity-90 active:scale-95 transition-all">Counter</button>
<button class="border border-outline-variant/40 text-on-surface-variant px-4 py-2 rounded-lg text-label-sm font-label-sm hover:bg-surface-container-low transition-all">Reject</button>
</div>
</td>
</tr>
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-5 px-6">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-lg bg-primary-fixed-dim/20 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">grain</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Durum Wheat - Grade A</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Warehouse: Indore</div>
</div>
</div>
</td>
<td class="py-5 px-6">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed text-xs font-bold">RE</div>
<div class="font-body-md text-body-md text-on-surface">Reliance Retail Ltd.</div>
</div>
</td>
<td class="py-5 px-6">
<div class="font-label-lg text-label-lg text-primary">₹2,850 / Quintal</div>
<div class="text-label-sm font-label-sm text-primary">+5% Market Avg</div>
</td>
<td class="py-5 px-6 font-body-md text-body-md text-on-surface">500 MT</td>
<td class="py-5 px-6">
<span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-label-sm font-label-sm">Negotiating</span>
</td>
<td class="py-5 px-6">
<div class="flex gap-2">
<button class="bg-primary text-on-primary px-4 py-2 rounded-lg text-label-sm font-label-sm hover:opacity-90 active:scale-95 transition-all">Accept</button>
<button class="border border-outline-variant/40 text-on-surface-variant px-4 py-2 rounded-lg text-label-sm font-label-sm hover:bg-surface-container-low transition-all">View</button>
</div>
</td>
</tr>
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="py-5 px-6">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-lg bg-primary-fixed-dim/20 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">agriculture</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Organic Soybeans</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Warehouse: Latur</div>
</div>
</div>
</td>
<td class="py-5 px-6">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-secondary-fixed-dim flex items-center justify-center text-on-secondary-fixed-variant text-xs font-bold">AF</div>
<div class="font-body-md text-body-md text-on-surface">AgriFeed Co.</div>
</div>
</td>
<td class="py-5 px-6">
<div class="font-label-lg text-label-lg text-primary">₹5,100 / Quintal</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Market Rate</div>
</td>
<td class="py-5 px-6 font-body-md text-body-md text-on-surface">100 MT</td>
<td class="py-5 px-6">
<span class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant rounded-full text-label-sm font-label-sm">Active</span>
</td>
<td class="py-5 px-6">
<div class="flex gap-2">
<button class="bg-primary text-on-primary px-4 py-2 rounded-lg text-label-sm font-label-sm hover:opacity-90 active:scale-95 transition-all">Counter</button>
<button class="border border-outline-variant/40 text-on-surface-variant px-4 py-2 rounded-lg text-label-sm font-label-sm hover:bg-surface-container-low transition-all">Reject</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Bid Summary Column -->
<div class="col-span-12 xl:col-span-3 flex flex-col gap-gutter">
<!-- Status Summary Card -->
<div class="bg-surface-container-lowest rounded-xl emerald-glow p-lg border border-outline-variant/10">
<h3 class="font-headline-md text-headline-md text-on-surface mb-md">Summary</h3>
<div class="space-y-4">
<div class="flex justify-between items-center p-3 bg-surface-container-low rounded-xl">
<span class="text-label-md font-label-md text-on-surface-variant">Total Value</span>
<span class="text-label-md font-label-md text-primary font-bold">₹1.42 Cr</span>
</div>
<div class="flex justify-between items-center p-3 bg-surface-container-low rounded-xl">
<span class="text-label-md font-label-md text-on-surface-variant">Active Bids</span>
<span class="text-label-md font-label-md text-on-surface font-bold">12</span>
</div>
<div class="flex justify-between items-center p-3 bg-surface-container-low rounded-xl">
<span class="text-label-md font-label-md text-on-surface-variant">Avg Performance</span>
<span class="text-label-md font-label-md text-primary font-bold">+2.4%</span>
</div>
</div>
</div>
<!-- Market Ad Card -->
<div class="relative overflow-hidden rounded-xl h-64 border border-outline-variant/10 emerald-glow group">
<img alt="Professional grain testing laboratory" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A clean, high-tech agricultural testing laboratory with soft emerald accent lighting and professional stainless steel equipment. A focused technician in a white coat is analyzing grain samples on a modern digital scale. The atmosphere is professional, airy, and clinical, reflecting the premium light-mode aesthetic of high-end agricultural commerce." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB2PhAwNIdnSMB7KG3tRddP00OYIkAtTA6V84JPD6Ssv9GXP6LJiPx5710eJkAm8X1HmUdmT7gZmumPYVNxmxVL6PPC72Ey-7FTYBOLqTwQF6znCAauiCfsfcD4fgbGrJxqr-DoEIB8ai8jrNt2_uXy8yHslyo7EuyrXXapuAMLji4032mJFHRI3DD_SCrONCXSDS0Hsp5VpX6EWDG1pa1hHz_-3zdx093CyKimSFQ-EMQ-mVnsDR4FS46Q0xEHN6j0T-IRx3djdRv0"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-lg flex flex-col justify-end">
<h4 class="text-white font-bold text-headline-md">Quality Verified</h4>
<p class="text-white/80 text-label-sm font-label-sm mt-1">Boost your bid acceptance rate by 40% with our lab-certified quality badges.</p>
<button class="mt-4 bg-white text-primary px-4 py-2 rounded-lg text-label-sm font-label-sm font-bold self-start transition-all hover:bg-primary-container hover:text-white">Get Certified</button>
</div>
</div>
</div>
</div>
</main>
</div>
<!-- Counter-Offer Modal (Mockup State) -->
<div class="fixed inset-0 z-[100] flex items-center justify-center p-gutter">
<div class="absolute inset-0 modal-overlay"></div>
<div class="relative w-full max-w-lg bg-surface-container-lowest rounded-[24px] shadow-2xl p-lg animate-fade-in border border-outline-variant/20">
<div class="flex justify-between items-center mb-lg">
<h2 class="font-headline-md text-headline-md text-on-surface">Create Counter Offer</h2>
<button class="material-symbols-outlined text-on-surface-variant hover:text-error transition-colors">close</button>
</div>
<div class="space-y-6">
<!-- Listing Context -->
<div class="flex items-center gap-4 p-4 bg-surface-container-low rounded-2xl">
<div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white">
<span class="material-symbols-outlined">eco</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Pusa Basmati 1121</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Bidder Offer: ₹8,450 / Qtl</div>
</div>
</div>
<!-- Input Fields -->
<div class="space-y-4">
<div>
<label class="block text-label-sm font-label-sm text-on-surface-variant mb-2">New Price per Quintal (₹)</label>
<input class="w-full bg-surface-container-low border-outline-variant/30 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-on-surface font-bold" type="number" value="8600"/>
</div>
<div>
<label class="block text-label-sm font-label-sm text-on-surface-variant mb-2">Valid Until</label>
<div class="relative">
<input class="w-full bg-surface-container-low border-outline-variant/30 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-on-surface" type="date" value="2024-06-25"/>
</div>
</div>
<div>
<label class="block text-label-sm font-label-sm text-on-surface-variant mb-2">Message to Bidder (Optional)</label>
<textarea class="w-full bg-surface-container-low border-outline-variant/30 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-on-surface resize-none" placeholder="Explain your pricing rationale..." rows="3"></textarea>
</div>
</div>
<!-- Modal Actions -->
<div class="grid grid-cols-2 gap-4 pt-4">
<button class="py-4 rounded-xl border border-outline-variant/40 text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-low transition-all">Cancel</button>
<button class="py-4 rounded-xl bg-primary text-on-primary font-label-lg text-label-lg emerald-glow hover:opacity-90 active:scale-95 transition-all">Send Counter Offer</button>
</div>
</div>
</div>
</div>
<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-auto">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-[1440px] mx-auto">
<div class="col-span-1">
<div class="font-headline-md text-primary font-bold mb-4">AgriMandi India</div>
<p class="text-body-md font-body-md text-on-surface-variant">The digital backbone for India's agricultural commodity trade.</p>
</div>
<div class="flex flex-col gap-2">
<h5 class="font-label-lg text-label-lg text-on-surface mb-2">Platform</h5>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Marketplace</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Analytics</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Resources</a>
</div>
<div class="flex flex-col gap-2">
<h5 class="font-label-lg text-label-lg text-on-surface mb-2">Support</h5>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Terms of Service</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Trade Support</a>
</div>
<div class="flex flex-col gap-2">
<h5 class="font-label-lg text-label-lg text-on-surface mb-2">Connect</h5>
<a class="text-on-surface-variant hover:text-primary transition-opacity duration-200" href="#">Contact Us</a>
<div class="flex gap-4 mt-2">
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary">social_leaderboard</span>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary">alternate_email</span>
</div>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 text-center">
<p class="font-body-md text-body-md text-on-surface-variant opacity-60">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>
<style>
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            display: inline-flex;
            animation: marquee 30s linear infinite;
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
@endsection
