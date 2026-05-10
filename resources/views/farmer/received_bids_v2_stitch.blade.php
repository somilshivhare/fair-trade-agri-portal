@extends('layouts.stitch')
@section('title', 'Received Bids v2 - AgriMandi')
@section('content')
<!-- Toast Notification -->
<div class="fixed top-24 right-6 z-[60] flex flex-col gap-4 pointer-events-none">
<div class="animate-toast bg-surface-container-lowest p-4 rounded-xl shadow-2xl border-l-4 border-primary pointer-events-auto flex gap-4 w-80 border border-outline-variant/30">
<div class="bg-primary/10 p-2 rounded-lg self-start">
<span class="material-symbols-outlined text-primary text-[24px]" data-icon="gavel">gavel</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start">
<h5 class="font-label-lg text-on-surface text-[14px]">New Bid Received</h5>
<button class="text-on-surface-variant hover:text-on-surface">
<span class="material-symbols-outlined text-[16px]" data-icon="close">close</span>
</button>
</div>
<p class="text-on-surface-variant text-[13px] mt-1">Global Grain Corp bid ₹3,450 for Premium Basmati Rice.</p>
<div class="mt-3 flex gap-2">
<button class="text-[12px] font-label-lg text-primary hover:underline">View Bid</button>
<button class="text-[12px] font-label-lg text-on-surface-variant hover:underline">Dismiss</button>
</div>
</div>
</div>
</div>
<!-- SideNavBar Shell -->
<aside class="fixed left-0 top-0 h-screen w-64 z-40 bg-surface-container-lowest border-r border-outline-variant/30 flex flex-col py-8 space-y-2">
<div class="px-6 mb-10">
<h1 class="text-primary font-headline-md tracking-tighter">AgriMandi India</h1>
</div>
<div class="px-4 mb-8">
<div class="flex items-center gap-3 p-3 bg-surface-container-low rounded-xl border border-outline-variant/30">
<div class="w-10 h-10 rounded-full overflow-hidden border border-primary/20">
<img alt="Farmer profile image" class="w-full h-full object-cover" data-alt="A high-fidelity, cinematic close-up portrait of a dignified Indian farmer with a weathered face and a white turban. The lighting is dramatic and moody, utilizing deep shadows and emerald-green rim lighting to reflect the AgriTech Elite aesthetic. The background is a soft-focus agricultural terminal with glowing digital interfaces, blending traditional character with high-stakes financial technology." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAznQtzkbKylWxZQRN-e-muoRPG84WLhoXpFcxBeyO3D8hV3NUEDqBvyutusP1n5edxFDMARR_tdiWL3nh2sbpJISW2J1K9ziii8bQiTjqvJBFscpdLANwh8-KkTsl5H1LMr8s433yLCLZ0SJc84QnqlDqNEF4j7LZznJZNe8wnPHW5WdnIga3nNiXVc4o2899VOI6uJDWVDTbfA9c2xpupsG17rbuaOUvfdkJgbjIaPhTaL-l5Tb3nkNpJUxCTt4zAIA-KvPndA1PD"/>
</div>
<div>
<p class="font-label-lg text-[14px] leading-tight text-on-surface">Arjun Singh</p>
<p class="font-label-md text-[10px] text-on-surface-variant uppercase tracking-widest">Verified Producer</p>
</div>
</div>
</div>
<nav class="flex-1">
<a class="text-on-surface-variant flex items-center gap-3 px-6 py-3 hover:bg-surface-container hover:text-primary transition-all duration-200 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-label-lg">Dashboard</span>
</a>
<a class="text-on-surface-variant flex items-center gap-3 px-6 py-3 hover:bg-surface-container hover:text-primary transition-all duration-200 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span class="font-label-lg">My Products</span>
</a>
<a class="bg-primary/10 text-primary border-r-4 border-primary flex items-center gap-3 px-6 py-3 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="gavel" style="font-variation-settings: 'FILL' 1;">gavel</span>
<span class="font-label-lg">Bids</span>
</a>
<a class="text-on-surface-variant flex items-center gap-3 px-6 py-3 hover:bg-surface-container hover:text-primary transition-all duration-200 cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
<span class="font-label-lg">Orders</span>
</a>
<a class="text-on-surface-variant flex items-center gap-3 px-6 py-3 hover:bg-surface-container hover:text-primary transition-all duration-200 cursor-pointer mt-auto" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-lg">Settings</span>
</a>
</nav>
<div class="px-6 mt-6">
<button class="w-full py-3 bg-primary text-on-primary font-label-lg rounded-lg neon-pulse active:scale-95 transition-transform">
            New Listing
        </button>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="ml-64 min-h-screen">
<!-- TopAppBar -->
<header class="sticky top-0 z-50 h-20 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/30 px-margin_desktop flex justify-between items-center">
<div class="flex items-center gap-8">
<div class="relative w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]" data-icon="search">search</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant/30 rounded-lg pl-10 pr-4 py-2 font-body-md focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="Search Mandi prices, buyers, or commodities..." type="text"/>
</div>
<div class="flex gap-4">
<button class="text-primary font-label-lg border-b-2 border-primary pb-1">English</button>
<button class="text-on-surface-variant font-label-lg hover:text-primary transition-colors">हिन्दी</button>
</div>
</div>
<div class="flex items-center gap-6">
<button class="relative text-on-surface-variant hover:text-primary transition-colors active:scale-90 duration-200 flex items-center justify-center p-2">
<span class="material-symbols-outlined text-[28px]" data-icon="notifications">notifications</span>
<span class="absolute -top-0.5 -right-0.5 min-w-[20px] h-5 bg-error text-white font-label-md text-[10px] rounded-full flex items-center justify-center px-1 border-2 border-surface">12</span>
</button>
<div class="flex items-center gap-3">
<button class="px-4 py-2 border border-outline-variant rounded-lg font-label-lg text-on-surface hover:bg-surface-container-high transition-all">Start Buying</button>
<button class="px-4 py-2 bg-primary text-on-primary rounded-lg font-label-lg hover:scale-105 active:scale-95 transition-all">Start Selling</button>
</div>
</div>
</header>
<section class="max-w-container_max_width mx-auto p-margin_desktop">
<div class="mb-12 flex justify-between items-end">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Received Bids</h2>
<p class="text-on-surface-variant font-body-lg mt-2">Manage active offers for your institutional agricultural inventory.</p>
</div>
<div class="flex p-1 bg-surface-container-low rounded-xl border border-outline-variant/30">
<button class="px-6 py-2 rounded-lg font-label-lg bg-surface-container-lowest text-primary shadow-sm transition-all">Pending</button>
<button class="px-6 py-2 rounded-lg font-label-lg text-on-surface-variant hover:text-on-surface transition-all">Accepted</button>
<button class="px-6 py-2 rounded-lg font-label-lg text-on-surface-variant hover:text-on-surface transition-all">Rejected</button>
<button class="px-6 py-2 rounded-lg font-label-lg text-on-surface-variant hover:text-on-surface transition-all">All</button>
</div>
</div>
<!-- Bids Table & Dashboard Layout -->
<div class="grid grid-cols-12 gap-gutter">
<!-- Main Table Section -->
<div class="col-span-12 xl:col-span-8">
<div class="glass-card rounded-2xl overflow-hidden">
<div class="p-6 border-b border-outline-variant/30 flex justify-between items-center">
<h3 class="font-headline-md text-on-surface">Live Negotiating Floor</h3>
<div class="flex items-center gap-2 text-primary font-label-lg">
<span class="material-symbols-outlined text-[18px]" data-icon="refresh">refresh</span>
<span>Real-time Sync Active</span>
</div>
</div>
<div class="overflow-x-auto scrollbar-hide">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low">
<tr>
<th class="px-6 py-4 font-label-md text-outline uppercase tracking-widest text-[11px]">Commodity</th>
<th class="px-6 py-4 font-label-md text-outline uppercase tracking-widest text-[11px]">Buyer</th>
<th class="px-6 py-4 font-label-md text-outline uppercase tracking-widest text-[11px]">Mandi Price</th>
<th class="px-6 py-4 font-label-md text-outline uppercase tracking-widest text-[11px]">Total Value</th>
<th class="px-6 py-4 font-label-md text-outline uppercase tracking-widest text-[11px]">Expiry</th>
<th class="px-6 py-4 font-label-md text-outline uppercase tracking-widest text-[11px]">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<!-- Row 1 -->
<tr class="hover:bg-primary/5 transition-colors group">
<td class="px-6 py-5">
<p class="font-headline-md text-[16px] text-on-surface">Premium Basmati Rice</p>
<p class="font-label-lg text-[12px] text-on-surface-variant">Grade A • 500 Quintals</p>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<span class="font-body-md text-on-surface">Global Grain Corp</span>
</div>
<span class="font-label-lg text-[12px] text-on-surface-variant">Karnal, Haryana</span>
</td>
<td class="px-6 py-5">
<p class="font-price-display text-primary">₹3,450</p>
<p class="font-label-lg text-[11px] text-on-surface-variant">/Quintal</p>
</td>
<td class="px-6 py-5">
<p class="font-price-display text-on-surface">₹17,25,000</p>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-1.5 text-error font-label-lg">
<span class="material-symbols-outlined text-[16px]" data-icon="timer">timer</span>
<span>04:20:15</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex gap-2">
<button class="p-2 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-on-primary transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="check">check</span>
</button>
<button class="p-2 rounded-lg bg-secondary-container text-on-secondary-container hover:opacity-80 transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="edit_note">edit_note</span>
</button>
<button class="p-2 rounded-lg bg-error/10 text-error hover:bg-error hover:text-on-error transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="close">close</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-primary/5 transition-colors group">
<td class="px-6 py-5">
<p class="font-headline-md text-[16px] text-on-surface">Golden Turmeric</p>
<p class="font-label-lg text-[12px] text-on-surface-variant">Bulk Organic • 120 Quintals</p>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<span class="font-body-md text-on-surface">Indore Spice Hub</span>
</div>
<span class="font-label-lg text-[12px] text-on-surface-variant">Erode, TN</span>
</td>
<td class="px-6 py-5">
<p class="font-price-display text-primary">₹12,200</p>
<p class="font-label-lg text-[11px] text-on-surface-variant">/Quintal</p>
</td>
<td class="px-6 py-5">
<p class="font-price-display text-on-surface">₹14,64,000</p>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-lg">
<span class="material-symbols-outlined text-[16px]" data-icon="timer">timer</span>
<span>12:45:00</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex gap-2">
<button class="p-2 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-on-primary transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="check">check</span>
</button>
<button class="p-2 rounded-lg bg-secondary-container text-on-secondary-container hover:opacity-80 transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="edit_note">edit_note</span>
</button>
<button class="p-2 rounded-lg bg-error/10 text-error hover:bg-error hover:text-on-error transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="close">close</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-primary/5 transition-colors group">
<td class="px-6 py-5">
<p class="font-headline-md text-[16px] text-on-surface">Sharbati Wheat</p>
<p class="font-label-lg text-[12px] text-on-surface-variant">High Protein • 1000 Quintals</p>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<span class="font-body-md text-on-surface">Reliance Retail Ltd</span>
</div>
<span class="font-label-lg text-[12px] text-on-surface-variant">Sehore, MP</span>
</td>
<td class="px-6 py-5">
<p class="font-price-display text-primary">₹2,800</p>
<p class="font-label-lg text-[11px] text-on-surface-variant">/Quintal</p>
</td>
<td class="px-6 py-5">
<p class="font-price-display text-on-surface">₹28,00,000</p>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-1.5 text-error font-label-lg">
<span class="material-symbols-outlined text-[16px]" data-icon="timer">timer</span>
<span>01:12:05</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex gap-2">
<button class="p-2 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-on-primary transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="check">check</span>
</button>
<button class="p-2 rounded-lg bg-secondary-container text-on-secondary-container hover:opacity-80 transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="edit_note">edit_note</span>
</button>
<button class="p-2 rounded-lg bg-error/10 text-error hover:bg-error hover:text-on-error transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="close">close</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Side Panel: Counter Offer & Insights -->
<div class="col-span-12 xl:col-span-4 space-y-gutter">
<!-- Counter Offer Modal UI Element -->
<div class="glass-card rounded-2xl p-8 border-t-4 border-primary">
<div class="flex justify-between items-start mb-6">
<div>
<h4 class="font-headline-md text-on-surface">Counter Negotiator</h4>
<p class="font-label-lg text-on-surface-variant text-[12px] uppercase mt-1">Ref: #AGRI-992-B</p>
</div>
<span class="px-3 py-1 bg-tertiary-container/10 text-tertiary border border-tertiary/20 rounded-full font-label-md text-[10px]">ACTIVE SESSION</span>
</div>
<div class="space-y-6">
<div class="p-4 bg-surface-container-low rounded-xl border border-outline-variant/30">
<p class="font-label-lg text-on-surface-variant text-[11px] mb-1">Current Bid from Global Grain Corp</p>
<p class="font-price-display text-on-surface">₹3,450 <span class="text-[14px] font-normal text-on-surface-variant">/Quintal</span></p>
</div>
<div class="space-y-2">
<label class="font-label-lg text-on-surface block px-1">Proposed Counter Price</label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 font-label-lg text-primary font-bold">₹</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg pl-10 pr-4 py-3 font-price-display text-primary focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" type="text" value="3,600"/>
</div>
</div>
<div class="space-y-2">
<label class="font-label-lg text-on-surface block px-1">Institutional Message</label>
<textarea class="w-full h-32 bg-surface-container-lowest border border-outline-variant rounded-lg p-4 font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all resize-none" placeholder="Describe the justification for your counter offer (e.g., quality certification, storage premium)..."></textarea>
</div>
<button class="w-full py-4 bg-primary text-on-primary font-label-lg rounded-lg flex items-center justify-center gap-2 neon-pulse active:scale-95 transition-all">
<span class="material-symbols-outlined text-[20px]" data-icon="send">send</span>
                            Send Counter
                        </button>
<p class="text-center font-label-lg text-[11px] text-on-surface-variant">Standard Mandi commission rules apply.</p>
</div>
</div>
<!-- Market Insights Card -->
<div class="glass-card rounded-2xl p-6 bg-gradient-to-br from-surface-container-low to-surface-container">
<h4 class="font-label-md text-outline uppercase tracking-widest text-[11px] mb-4">Market Trend</h4>
<div class="flex items-end gap-2 mb-4">
<span class="font-display-lg text-primary text-[32px]">+4.2%</span>
<span class="font-label-lg text-on-surface-variant mb-2">this week</span>
</div>
<div class="h-16 flex items-end gap-1 px-1">
<div class="flex-1 bg-primary/20 h-[30%] rounded-t-sm"></div>
<div class="flex-1 bg-primary/20 h-[45%] rounded-t-sm"></div>
<div class="flex-1 bg-primary/20 h-[35%] rounded-t-sm"></div>
<div class="flex-1 bg-primary/40 h-[60%] rounded-t-sm"></div>
<div class="flex-1 bg-primary/60 h-[80%] rounded-t-sm"></div>
<div class="flex-1 bg-primary/80 h-[70%] rounded-t-sm"></div>
<div class="flex-1 bg-primary h-[100%] rounded-t-sm neon-pulse"></div>
</div>
<p class="mt-4 font-body-md text-on-surface-variant text-[13px]">Basmati prices are peaking in the Karnal terminal. Holding for 24h might yield ₹50-₹80 more.</p>
</div>
</div>
</div>
</section>
<!-- Footer Shell -->
<footer class="w-full py-16 bg-surface-container-low border-t border-outline-variant/30 mt-20">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin_desktop max-w-container_max_width mx-auto">
<div class="space-y-4">
<h5 class="font-headline-md text-primary">AgriMandi India</h5>
<p class="font-body-md text-on-surface-variant">The institutional terminal for Indian agricultural commodities trading.</p>
</div>
<div class="space-y-4">
<h6 class="font-label-lg text-on-surface uppercase tracking-widest">Market Access</h6>
<ul class="space-y-2">
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Mandi Prices</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Logistics Hub</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Crop Insurance</a></li>
</ul>
</div>
<div class="space-y-4">
<h6 class="font-label-lg text-on-surface uppercase tracking-widest">Compliance</h6>
<ul class="space-y-2">
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Export Quality</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
</ul>
</div>
<div class="flex flex-col justify-between">
<p class="font-body-md text-on-surface-variant text-[14px]">© 2024 AgriMandi India. Institutional Agricultural Terminal.</p>
<div class="flex gap-4 mt-6">
<span class="w-10 h-10 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary/10 hover:border-primary transition-all cursor-pointer">
<span class="material-symbols-outlined text-[18px]" data-icon="language">language</span>
</span>
<span class="w-10 h-10 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary/10 hover:border-primary transition-all cursor-pointer">
<span class="material-symbols-outlined text-[18px]" data-icon="share">share</span>
</span>
</div>
</div>
</div>
</footer>
</main>
@endsection
