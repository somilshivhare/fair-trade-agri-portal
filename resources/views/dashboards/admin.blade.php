@extends('layouts.app')

@section('content')
<!-- SideNavBar Shell -->
<aside class="w-72 h-screen fixed left-0 top-0 bg-surface-container flex flex-col h-full py-gutter backdrop-blur-xl border-r border-white/10 shadow-[0_0_60px_-15px_rgba(0,200,83,0.05)] z-50">
<div class="px-6 mb-10">
<h1 class="text-headline-md font-headline-md text-primary tracking-tight">HarvestIQ</h1>
<p class="font-label-sm text-on-surface-variant opacity-60">AgriTech Elite</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-4 bg-primary-container text-on-primary-container rounded-lg px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span class="font-label-bold text-label-bold">Dashboard</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">storefront</span>
<span class="font-label-bold text-label-bold">Marketplace</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">gavel</span>
<span class="font-label-bold text-label-bold">Bids</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">shopping_cart</span>
<span class="font-label-bold text-label-bold">Orders</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">local_shipping</span>
<span class="font-label-bold text-label-bold">Logistics</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">payments</span>
<span class="font-label-bold text-label-bold">Payments</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">notifications</span>
<span class="font-label-bold text-label-bold">Notifications</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface hover:bg-white/5 px-4 py-3 mx-2 transition-all duration-300" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-bold text-label-bold">Settings</span>
</a>
</nav>
<div class="px-4 mt-auto">
<button class="w-full py-4 bg-primary text-on-primary rounded-xl font-label-bold flex items-center justify-center gap-2 active:scale-95 transition-transform">
<span class="material-symbols-outlined">add</span>
                New Listing
            </button>
<div class="mt-6 flex items-center gap-3 p-2">
<img alt="User Profile Avatar" class="w-10 h-10 rounded-full object-cover border border-white/10" data-alt="A professional portrait of a senior agricultural tech executive with a confident expression, set against a blurred background of a modern glass-walled office overlooking a sunset horizon. The lighting is warm and cinematic, highlighting sophisticated details and reflecting a high-end, corporate enterprise aesthetic consistent with an elite tech platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWOW1tgez1ep-bAko65Jud6vD3LyLR37jLdjoj4QTHrabMC_LbWhKT3cSxvarnSAl-vj5k154xiRsXukDgVtwEKgvI5AdOmv-ubfonButhMA_hLhz7x9ViquuMxWuKmn6bcNgIKkc5QQaOng4Kf8BOQPzkpR1ZtdtxUQFw4nfRymZIYEDYDFY6wthhOHZ_Mno_c6rYBaE4zqLssMhG0ep7MpymvgkBqS0tu0_75Vd8IiDY8im-OaJVYyl3L-w1WADnQSwJLHtVWT2O"/>
<div>
<p class="font-label-bold text-on-surface leading-none">Alex Rivera</p>
<p class="font-label-sm text-on-surface-variant">System Admin</p>
</div>
</div>
</div>
</aside>
<!-- TopNavBar Shell -->
<header class="h-20 fixed top-0 right-0 w-[calc(100%-18rem)] z-40 bg-surface/80 backdrop-blur-md border-b border-white/10 flex justify-between items-center px-margin-desktop">
<div class="flex items-center gap-6 w-1/3">
<div class="relative w-full group">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container-low border-none rounded-full py-2.5 pl-12 pr-4 text-body-md focus:ring-1 focus:ring-primary transition-all" placeholder="Search systems, users, or transactions..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined">help</span>
</button>
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined">account_circle</span>
</button>
</div>
</header>
<!-- Main Canvas -->
<main class="ml-72 mt-20 p-margin-desktop min-h-screen">
<!-- Page Header -->
<div class="flex justify-between items-end mb-10">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Intelligence Command</h2>
<p class="text-on-surface-variant font-body-md">Real-time agricultural ecosystem health and security monitoring.</p>
</div>
<div class="flex gap-4">
<button class="glass-panel px-6 py-2.5 rounded-lg font-label-bold text-primary flex items-center gap-2 hover:bg-white/10 transition-all">
<span class="material-symbols-outlined text-sm">download</span>
                    Export Audit
                </button>
<div class="flex items-center gap-2 bg-surface-container-high rounded-lg px-4 py-2 text-on-surface-variant font-label-bold border border-white/5">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Live Data
                </div>
</div>
</div>
<!-- High-Level Vitals (Bento Grid) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
<div class="glass-panel p-6 rounded-2xl flex flex-col justify-between group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary bg-primary/10 p-2 rounded-lg">agriculture</span>
<span class="text-primary font-label-bold">+12%</span>
</div>
<div class="mt-8">
<p class="text-on-surface-variant font-label-bold uppercase tracking-wider text-[10px]">Total Farmers</p>
<p class="text-headline-lg font-headline-lg mt-1">12,842</p>
</div>
</div>
<div class="glass-panel p-6 rounded-2xl flex flex-col justify-between group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-secondary bg-secondary/10 p-2 rounded-lg">group</span>
<span class="text-primary font-label-bold">+5.2%</span>
</div>
<div class="mt-8">
<p class="text-on-surface-variant font-label-bold uppercase tracking-wider text-[10px]">Total Buyers</p>
<p class="text-headline-lg font-headline-lg mt-1">45,109</p>
</div>
</div>
<div class="glass-panel p-6 rounded-2xl flex flex-col justify-between group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary-fixed-dim bg-primary-fixed-dim/10 p-2 rounded-lg">inventory_2</span>
<span class="text-error font-label-bold">-2.4%</span>
</div>
<div class="mt-8">
<p class="text-on-surface-variant font-label-bold uppercase tracking-wider text-[10px]">Active Listings</p>
<p class="text-headline-lg font-headline-lg mt-1">8,321</p>
</div>
</div>
<div class="glass-panel p-6 rounded-2xl flex flex-col justify-between group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-tertiary bg-tertiary/10 p-2 rounded-lg">receipt_long</span>
<span class="text-primary font-label-bold">+18%</span>
</div>
<div class="mt-8">
<p class="text-on-surface-variant font-label-bold uppercase tracking-wider text-[10px]">Daily Transactions</p>
<p class="text-headline-lg font-headline-lg mt-1">1,402</p>
</div>
</div>
</div>
<!-- Secondary Row: Analytics and Fraud -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
<!-- Marketplace Analytics -->
<div class="lg:col-span-2 glass-panel rounded-3xl p-8 overflow-hidden relative">
<div class="flex justify-between items-start mb-10">
<div>
<h3 class="font-headline-md text-on-surface">Marketplace Analytics</h3>
<p class="text-on-surface-variant font-body-md">Revenue (Glow-Line) vs. Volume Trends</p>
</div>
<select class="bg-surface-container-high border-white/10 rounded-lg text-on-surface font-label-bold px-4 py-2">
<option>Last 30 Days</option>
<option>Last Quarter</option>
</select>
</div>
<!-- Mock Chart Canvas -->
<div class="h-64 relative flex items-end justify-between gap-2">
<!-- Revenue Line (SVG Glow) -->
<svg class="absolute inset-0 w-full h-full" preserveaspectratio="none" viewbox="0 0 100 100">
<path class="glow-line opacity-80" d="M0 80 Q 25 20, 50 60 T 100 10" fill="none" stroke="#3fe56c" stroke-width="2"></path>
</svg>
<!-- Volume Bars -->
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[40%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[60%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[50%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[80%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[70%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[90%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[65%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[85%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[45%]"></div>
<div class="w-8 bg-surface-variant/30 rounded-t-lg h-[75%]"></div>
</div>
<div class="flex gap-8 mt-8 border-t border-white/5 pt-6">
<div>
<p class="text-on-surface-variant font-label-sm">Gross Revenue</p>
<p class="text-headline-md text-primary">$4.2M</p>
</div>
<div>
<p class="text-on-surface-variant font-label-sm">Total Volume</p>
<p class="text-headline-md">18,402 Tons</p>
</div>
</div>
</div>
<!-- Fraud Monitoring Radar -->
<div class="glass-panel rounded-3xl p-8 border-error/20 bg-error-container/5">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-error">radar</span>
<h3 class="font-headline-md text-on-surface">Fraud Radar</h3>
</div>
<div class="space-y-6">
<div class="p-4 bg-surface-container rounded-xl border-l-4 border-error flex justify-between items-center group cursor-pointer hover:bg-surface-container-high transition-colors">
<div>
<p class="font-label-bold text-on-surface">Suspicious Activity #892</p>
<p class="text-label-sm text-on-surface-variant">Duplicate Account Pattern</p>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-error transition-colors">chevron_right</span>
</div>
<div class="p-4 bg-surface-container rounded-xl border-l-4 border-error/50 flex justify-between items-center group cursor-pointer hover:bg-surface-container-high transition-colors">
<div>
<p class="font-label-bold text-on-surface">Payment Flag #104</p>
<p class="text-label-sm text-on-surface-variant">High-volume escrow bypass</p>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-error transition-colors">chevron_right</span>
</div>
<div class="p-4 bg-surface-container rounded-xl border-l-4 border-primary/50 flex justify-between items-center group cursor-pointer hover:bg-surface-container-high transition-colors">
<div>
<p class="font-label-bold text-on-surface">Geofence Alert</p>
<p class="text-label-sm text-on-surface-variant">Unusual harvest location data</p>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">chevron_right</span>
</div>
</div>
<button class="w-full mt-8 py-3 border border-error/30 rounded-xl text-error font-label-bold hover:bg-error/10 transition-all">
                    View Full Security Queue
                </button>
</div>
</div>
<!-- User Management Table -->
<div class="glass-panel rounded-3xl overflow-hidden mb-12">
<div class="px-8 py-6 border-b border-white/5 flex justify-between items-center bg-surface-container-high/30">
<h3 class="font-headline-md text-on-surface">User Management</h3>
<div class="flex gap-4">
<div class="flex bg-surface-container rounded-lg p-1 border border-white/10">
<button class="px-4 py-1.5 rounded-md bg-white/5 text-on-surface font-label-bold">All Users</button>
<button class="px-4 py-1.5 rounded-md text-on-surface-variant font-label-bold hover:text-on-surface">Pending</button>
</div>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container-low text-on-surface-variant font-label-bold border-b border-white/5">
<tr>
<th class="px-8 py-4">USER IDENTITY</th>
<th class="px-8 py-4">TYPE</th>
<th class="px-8 py-4">REGION</th>
<th class="px-8 py-4">STATUS</th>
<th class="px-8 py-4 text-right">ACTIONS</th>
</tr>
</thead>
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/[0.02] transition-colors">
<td class="px-8 py-6 flex items-center gap-4">
<img alt="Profile image of Mara Silva" class="w-10 h-10 rounded-lg object-cover" data-alt="A portrait of a determined female agronomist in the field during golden hour, wearing professional field gear. The lighting is rich and atmospheric, capturing the fine details of the environment with a high-fidelity, enterprise-level aesthetic. The color palette features deep earth tones and vibrant green accents from the surrounding crops." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmv9J1Cz5QewQJHr2x30K-l21SQorVoC1Yn0wAAfh97nKl_PW15P_OSVw68HVgnLL1pSJpO25l91i3hHi9GBY3EH1nqCuK61oPbLSmEdnj0eZiLVQnme04GcdnJzTeEFIkz2V8IWAoAVn3bK9gCMWCFygKaxarHY-08ET2y4d4YGeQvdiOjgwVPNiRH_mpE-PwozXwG2x4TQFRONNSAjE3QjV4BGWfSFeRjhr394CneRwux9xGWlkTOPc86ZHkJjihASdMS0fxhD3h"/>
<div>
<p class="font-label-bold text-on-surface">Mara Silva</p>
<p class="text-label-sm text-on-surface-variant">mara.silva@agrigrow.br</p>
</div>
</td>
<td class="px-8 py-6">
<span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-[11px] font-label-bold tracking-widest uppercase">Producer</span>
</td>
<td class="px-8 py-6 font-label-bold">Mato Grosso, BR</td>
<td class="px-8 py-6">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-label-bold">Verified</span>
</div>
</td>
<td class="px-8 py-6 text-right">
<button class="text-on-surface-variant hover:text-on-surface transition-colors p-2"><span class="material-symbols-outlined">more_vert</span></button>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors">
<td class="px-8 py-6 flex items-center gap-4">
<img alt="Profile image of Jonathan Burke" class="w-10 h-10 rounded-lg object-cover" data-alt="A studio portrait of a sophisticated male buyer in a navy blue suit, representing a large-scale agricultural commodities firm. The lighting is soft and professional, emphasizing a modern enterprise feel. The background is a dark, minimalist charcoal gradient, reflecting the luxury and precision of the HarvestIQ brand ecosystem." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4MRcYrE7xJea7wkbkC6QsDBeDxDWHhZ_ZcOT6zRssxoOlEI19chdO4NDn_ac_-Kd8k5td2Pk6e8oHLLAuYvrazipIP3mrAWElIi21SQVNPPW2ySzYun8FbcjLz6COKFb4EqKy8b_IMeRmYVDOXBWpVUfIleK89Yb5Y36KsFVJc-JJ6WKn4_FLoJXoyyD5vAtWB8tLKwkWpeNKcn11ajVhiaEcMe4r7ob5KOHg_xpOkFoJZQyBSbW4bPzhUZdxt7aZ087ix1UAHRj9"/>
<div>
<p class="font-label-bold text-on-surface">Jonathan Burke</p>
<p class="text-label-sm text-on-surface-variant">j.burke@globalgrain.com</p>
</div>
</td>
<td class="px-8 py-6">
<span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-[11px] font-label-bold tracking-widest uppercase">Enterprise Buyer</span>
</td>
<td class="px-8 py-6 font-label-bold">Chicago, US</td>
<td class="px-8 py-6">
<div class="flex items-center gap-2 text-tertiary">
<span class="material-symbols-outlined text-sm">schedule</span>
<span class="font-label-bold">Pending KYC</span>
</div>
</td>
<td class="px-8 py-6 text-right">
<button class="text-on-surface-variant hover:text-on-surface transition-colors p-2"><span class="material-symbols-outlined">more_vert</span></button>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors">
<td class="px-8 py-6 flex items-center gap-4">
<img alt="Profile image of David Kim" class="w-10 h-10 rounded-lg object-cover" data-alt="A professional headshot of an Asian male agriculture technician in a clean, high-tech indoor vertical farm setting. The lighting is cool-toned and crisp, highlighting advanced hydroponic systems in the background. The visual style is futuristic and clinical, aligning with a high-precision agritech platform interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUI5JNDWw7niXVZQc8kTbQI-xjRISoQrlTkudNnU8s8V9qQbA58nXBGm_P0f4JLM_WmdGk1GvVaJKjxxZbbDQkusJUYHHp8P5OjI5SkAvUpikCtBNlrAKhlvLfF6qd_0jkm7DPCpTZ0Im4dB6SDJRCdxF9PTQH5BmuGfGZvsu0IggLKa60O9sCVgeda6Iaa2of_rn1SCdTYnnBo_pbEvG9cjaOHTDhQgQeaxz5dr-sdkUxNEbxggXgdOnNKbo0Ji1SBlkwWRUl_ZUx"/>
<div>
<p class="font-label-bold text-on-surface">David Kim</p>
<p class="text-label-sm text-on-surface-variant">david.k@kimatech.kr</p>
</div>
</td>
<td class="px-8 py-6">
<span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-[11px] font-label-bold tracking-widest uppercase">Producer</span>
</td>
<td class="px-8 py-6 font-label-bold">Seoul, KR</td>
<td class="px-8 py-6">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-label-bold">Verified</span>
</div>
</td>
<td class="px-8 py-6 text-right">
<button class="text-on-surface-variant hover:text-on-surface transition-colors p-2"><span class="material-symbols-outlined">more_vert</span></button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-4 border-t border-white/5 bg-surface-container-low/50 flex justify-between items-center">
<p class="text-label-sm text-on-surface-variant">Showing 10 of 12,842 users</p>
<div class="flex gap-2">
<button class="p-2 border border-white/10 rounded-lg hover:bg-white/5"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
<button class="p-2 border border-white/10 rounded-lg hover:bg-white/5"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
</div>
</div>
</div>
</main>
<!-- Footer Shell -->
<footer class="w-full py-12 ml-72 bg-surface-container-lowest flex flex-col items-center justify-center gap-6 px-margin-desktop border-t border-white/5">
<h2 class="text-headline-lg font-headline-lg text-primary">HarvestIQ</h2>
<div class="flex gap-8">
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Privacy Policy</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Terms of Service</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Compliance</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Support</a>
<a class="font-label-sm text-on-surface-variant hover:text-primary transition-all" href="#">Contact</a>
</div>
<p class="font-label-sm text-on-surface-variant opacity-60">© 2024 HarvestIQ. Precision Agriculture Systems.</p>
</footer>
@endsection
