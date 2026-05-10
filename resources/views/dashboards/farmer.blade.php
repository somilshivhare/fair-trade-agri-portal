@extends('layouts.app')

@section('content')
<!-- SideNavBar Shell -->
<aside class="w-72 h-screen fixed left-0 top-0 bg-surface-container dark:bg-surface-container backdrop-blur-xl border-r border-white/10 shadow-[0_0_60px_-15px_rgba(0,200,83,0.05)] z-50">
<div class="flex flex-col h-full py-gutter">
<div class="px-6 mb-10">
<h1 class="text-headline-md font-headline-md text-primary tracking-tight">HarvestIQ</h1>
<p class="font-body-md text-label-sm text-on-surface-variant opacity-60">AgriTech Elite</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-4 bg-primary-container text-on-primary-container rounded-lg px-4 py-3 mx-2 active:scale-95 transition-transform" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span class="font-label-bold text-label-bold">Dashboard</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">storefront</span>
<span class="font-label-bold text-label-bold">Marketplace</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">gavel</span>
<span class="font-label-bold text-label-bold">Bids</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">shopping_cart</span>
<span class="font-label-bold text-label-bold">Orders</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">local_shipping</span>
<span class="font-label-bold text-label-bold">Logistics</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">payments</span>
<span class="font-label-bold text-label-bold">Payments</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">notifications</span>
<span class="font-label-bold text-label-bold">Notifications</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant hover:text-on-surface px-4 py-3 mx-2 hover:bg-white/5 transition-all duration-300" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-bold text-label-bold">Settings</span>
</a>
</nav>
<div class="px-4 mt-auto">
<button class="w-full bg-primary text-on-primary py-4 rounded-xl font-label-bold flex items-center justify-center gap-2 shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all active:scale-95">
<span class="material-symbols-outlined">add</span>
                    New Listing
                </button>
<div class="mt-8 flex items-center gap-3 p-2 bg-white/5 rounded-xl border border-white/5">
<img alt="User Profile Avatar" class="w-10 h-10 rounded-lg object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIOD4xd3EUu3pXanKdgeUfMnwhF8TeNRYQAp0nl01piNT2f_DP3UzadBQciraQljHcFBypNY2cxX0RUBMTRpsuSZLNUicUXCwda6NJp96sgX61z_ZfM63nH4Wz_vqjdsIwVvvcGnosQOspx460OjStel8IgDrxn5A2CNcLWEFHYIoYBRss_io2EJZbKblvCdUiQ0KOZDc8tGHahWNoc1u1qxZcdYPNFDMuNlMwGjGQpO-r49iwgnfdxIw0eQGgeBMKyqmPjy7xTsNr"/>
<div class="overflow-hidden">
<p class="font-label-bold text-on-surface truncate text-sm">Vikram Singh</p>
<p class="text-label-sm text-on-surface-variant opacity-60 truncate text-xs">Premium Farmer</p>
</div>
</div>
</div>
</div>
</aside>
<!-- TopNavBar Shell -->
<header class="h-20 fixed top-0 right-0 w-[calc(100%-18rem)] z-40 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-white/10 flex justify-between items-center px-margin-desktop">
<div class="flex items-center flex-1 max-w-xl relative group">
<span class="material-symbols-outlined absolute left-4 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container-low border border-white/10 rounded-full py-2.5 pl-12 pr-4 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-on-surface placeholder:text-on-surface-variant/50 transition-all" placeholder="Search harvests, bids, or logistics..." type="text"/>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">notifications</button>
<button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">help</button>
<button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors">account_circle</button>
</div>
</div>
</header>
<!-- Main Content Area -->
<main class="ml-72 pt-20 pb-12 min-h-screen">
<div class="px-margin-desktop mt-gutter">
<!-- Welcome Header -->
<div class="mb-10">
<h2 class="font-headline-lg text-headline-lg text-on-surface">Operations Overview</h2>
<p class="font-body-md text-on-surface-variant">Real-time agricultural analytics for your Punjab Estate.</p>
</div>
<!-- Bento Grid: Top Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-gutter">
<!-- Total Listings -->
<div class="glass p-6 rounded-xl relative overflow-hidden group hover:bg-white/10 transition-all duration-500">
<div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-9xl">grass</span>
</div>
<p class="font-label-bold text-label-bold text-on-surface-variant mb-2">Total Listings</p>
<div class="flex items-end gap-2">
<h3 class="font-display-xl text-4xl text-on-surface">124</h3>
<span class="text-primary text-sm font-label-bold mb-1">+8%</span>
</div>
</div>
<!-- Active Bids -->
<div class="glass p-6 rounded-xl relative overflow-hidden group hover:bg-white/10 transition-all duration-500">
<div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-9xl">gavel</span>
</div>
<p class="font-label-bold text-label-bold text-on-surface-variant mb-2">Active Bids</p>
<div class="flex items-end gap-2">
<h3 class="font-display-xl text-4xl text-on-surface">42</h3>
<span class="text-primary text-sm font-label-bold mb-1">Live</span>
</div>
</div>
<!-- Total Earnings -->
<div class="glass p-6 rounded-xl relative overflow-hidden group hover:bg-white/10 transition-all duration-500 bg-gradient-to-br from-primary/5 to-transparent">
<div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-9xl">payments</span>
</div>
<p class="font-label-bold text-label-bold text-on-surface-variant mb-2">Total Earnings</p>
<div class="flex items-end gap-2">
<h3 class="font-display-xl text-4xl text-on-surface">₹8.4M</h3>
<span class="text-primary text-sm font-label-bold mb-1">↑ 12%</span>
</div>
</div>
<!-- Pending Orders -->
<div class="glass p-6 rounded-xl relative overflow-hidden group hover:bg-white/10 transition-all duration-500">
<div class="absolute -right-4 -bottom-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-9xl">local_mall</span>
</div>
<p class="font-label-bold text-label-bold text-on-surface-variant mb-2">Pending Orders</p>
<div class="flex items-end gap-2">
<h3 class="font-display-xl text-4xl text-on-surface">18</h3>
<span class="text-error text-sm font-label-bold mb-1">Priority</span>
</div>
</div>
</div>
<!-- Bento Grid: Charts & Tracker -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- Mandi Price Index Chart (Lg: Col 2) -->
<div class="lg:col-span-2 glass-elevated rounded-2xl p-8 relative overflow-hidden">
<div class="flex justify-between items-center mb-8">
<div>
<h4 class="font-headline-md text-headline-md text-on-surface">Live Mandi Price Index</h4>
<p class="text-label-sm text-on-surface-variant">Comparative analysis of Wheat &amp; Basmati across northern hubs</p>
</div>
<select class="bg-surface-container border border-white/10 rounded-lg text-sm px-4 py-2 outline-none focus:ring-1 focus:ring-primary">
<option>Last 30 Days</option>
<option>Last 6 Months</option>
</select>
</div>
<!-- Chart Placeholder -->
<div class="h-64 flex items-end justify-between gap-4 relative">
<!-- Background Grid Lines -->
<div class="absolute inset-0 flex flex-col justify-between opacity-5">
<div class="border-b border-white w-full"></div>
<div class="border-b border-white w-full"></div>
<div class="border-b border-white w-full"></div>
<div class="border-b border-white w-full"></div>
</div>
<!-- SVG Glow Line Visualization -->
<svg class="absolute inset-0 w-full h-full overflow-visible" viewbox="0 0 800 256">
<path class="glow-line" d="M0,200 Q100,180 200,220 T400,100 T600,150 T800,50" fill="none" stroke="url(#gradient-primary)" stroke-width="4"></path>
<defs>
<lineargradient id="gradient-primary" x1="0%" x2="100%" y1="0%" y2="0%">
<stop offset="0%" style="stop-color:#3fe56c;stop-opacity:1"></stop>
<stop offset="100%" style="stop-color:#00c853;stop-opacity:1"></stop>
</lineargradient>
</defs>
</svg>
<!-- LED Data Points -->
<div class="absolute top-[50px] right-[10px] w-3 h-3 bg-primary rounded-full shadow-[0_0_12px_#3fe56c]"></div>
<div class="absolute top-[100px] left-[400px] w-3 h-3 bg-primary rounded-full shadow-[0_0_12px_#3fe56c]"></div>
</div>
<div class="mt-4 flex justify-between text-xs text-on-surface-variant font-label-sm">
<span>OCT 01</span>
<span>OCT 08</span>
<span>OCT 15</span>
<span>OCT 22</span>
<span>OCT 30</span>
</div>
</div>
<!-- Highest Bids List -->
<div class="glass rounded-2xl p-8 flex flex-col h-full">
<h4 class="font-headline-md text-headline-md text-on-surface mb-6">Top Active Bids</h4>
<div class="space-y-4 flex-1">
<div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:border-primary/30 transition-colors">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
<span class="material-symbols-outlined text-primary">eco</span>
</div>
<div>
<p class="font-label-bold text-on-surface">Basmati Premium</p>
<p class="text-[10px] text-on-surface-variant uppercase tracking-widest">20 Metric Tons</p>
</div>
</div>
<div class="text-right">
<p class="font-label-bold text-primary">₹2.4M</p>
<p class="text-[10px] text-on-surface-variant">5 Bids</p>
</div>
</div>
<div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:border-primary/30 transition-colors">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
<span class="material-symbols-outlined text-primary">grain</span>
</div>
<div>
<p class="font-label-bold text-on-surface">Hard Red Wheat</p>
<p class="text-[10px] text-on-surface-variant uppercase tracking-widest">50 Metric Tons</p>
</div>
</div>
<div class="text-right">
<p class="font-label-bold text-primary">₹1.8M</p>
<p class="text-[10px] text-on-surface-variant">12 Bids</p>
</div>
</div>
<div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:border-primary/30 transition-colors">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center">
<span class="material-symbols-outlined text-primary">settings_input_component</span>
</div>
<div>
<p class="font-label-bold text-on-surface">Organic Soybean</p>
<p class="text-[10px] text-on-surface-variant uppercase tracking-widest">15 Metric Tons</p>
</div>
</div>
<div class="text-right">
<p class="font-label-bold text-primary">₹950K</p>
<p class="text-[10px] text-on-surface-variant">8 Bids</p>
</div>
</div>
</div>
<button class="mt-6 text-primary font-label-bold text-sm hover:underline flex items-center justify-center gap-2">
                        View All Listings <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
<!-- Profit Analytics Graph (Sm: Bottom) -->
<div class="glass-elevated rounded-2xl p-8 relative overflow-hidden min-h-[300px]">
<img class="absolute inset-0 w-full h-full object-cover opacity-20" data-alt="A cinematic, high-fidelity landscape of a lush green farm at sunrise, with soft morning light misting over the horizon. The image is seen through a dark, high-tech translucent filter that matches a glassmorphic user interface. Deep shadows and vibrant emerald green highlights dominate the aesthetic, creating a sophisticated and professional atmosphere for a modern agricultural technology platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuADgkzn97tLzO6Py-7K-rk5xXCSF5zUKbIGup9yGLuAAZlnV8JkApIvbEAjrKGGhlJkKWDhW-DLaUMQWtDnUYoK7l9MR-DEhQ3TJcdkxyLnxSn4JaBYvOvW2k-KCN1t23F07WFb0Lrtwk2eUTvql9lu13kN-t3e3gcTHMhQ-ByB2Ifqqn0iEc_InAbq3ONaxV_gwyG06wY6wcseSGCjiGLWewiTOs1-owFRASXvsyfosm44qE_5UVzeLUu2q9lJ42q0dLuH7al8nVKD"/>
<div class="relative z-10 h-full flex flex-col">
<h4 class="font-headline-md text-headline-md text-on-surface">Profit Analytics</h4>
<p class="text-label-sm text-on-surface-variant mb-auto">Net yield increase of 15.4% YoY</p>
<div class="flex items-center justify-between mt-8">
<div class="text-center">
<div class="w-20 h-20 border-4 border-primary/20 border-t-primary rounded-full flex items-center justify-center mb-2">
<span class="font-label-bold text-on-surface">82%</span>
</div>
<p class="text-[10px] text-on-surface-variant uppercase">Efficiency</p>
</div>
<div class="text-center">
<div class="w-20 h-20 border-4 border-secondary/20 border-t-secondary rounded-full flex items-center justify-center mb-2">
<span class="font-label-bold text-on-surface">64%</span>
</div>
<p class="text-[10px] text-on-surface-variant uppercase">Soil Health</p>
</div>
<div class="text-center">
<div class="w-20 h-20 border-4 border-error/20 border-t-error rounded-full flex items-center justify-center mb-2">
<span class="font-label-bold text-on-surface">12%</span>
</div>
<p class="text-[10px] text-on-surface-variant uppercase">Risk Fac.</p>
</div>
</div>
</div>
</div>
<!-- Live Logistics Tracker -->
<div class="lg:col-span-2 glass-elevated rounded-2xl p-0 relative overflow-hidden group">
<div class="absolute top-0 left-0 w-full p-8 z-20 pointer-events-none">
<div class="flex justify-between items-start">
<div>
<h4 class="font-headline-md text-headline-md text-on-surface">Live Logistics Tracker</h4>
<div class="flex items-center gap-2 mt-1">
<span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
<span class="text-label-sm text-on-surface-variant font-label-sm">Active Transit: 4 Trucks</span>
</div>
</div>
<button class="bg-primary px-4 py-2 rounded-lg text-on-primary font-label-bold text-sm pointer-events-auto shadow-lg hover:shadow-primary/40 transition-all">
                                Open Map
                            </button>
</div>
</div>
<!-- Map Visualization Placeholder -->
<div class="h-full min-h-[300px] bg-surface-container-high relative">
<div class="absolute inset-0 opacity-40 mix-blend-overlay" data-location="Ludhiana, Punjab" style="">
<!-- Simulated Map Elements -->
<div class="absolute top-1/4 left-1/3 w-1.5 h-1.5 bg-primary rounded-full glow-line shadow-[0_0_8px_#3fe56c]"></div>
<div class="absolute top-1/2 left-2/3 w-1.5 h-1.5 bg-primary rounded-full glow-line shadow-[0_0_8px_#3fe56c]"></div>
<div class="absolute top-3/4 left-1/4 w-1.5 h-1.5 bg-primary rounded-full glow-line shadow-[0_0_8px_#3fe56c]"></div>
<!-- Dashed Transit Lines -->
<svg class="absolute inset-0 w-full h-full" viewbox="0 0 1000 300">
<path d="M333,75 Q500,150 666,150" fill="none" opacity="0.3" stroke="#3fe56c" stroke-dasharray="4 4" stroke-width="1"></path>
<path d="M666,150 Q458,225 250,225" fill="none" opacity="0.3" stroke="#3fe56c" stroke-dasharray="4 4" stroke-width="1"></path>
</svg>
</div>
<!-- Shipment Cards floating on map -->
<div class="absolute bottom-6 left-6 right-6 flex gap-4 overflow-x-auto pb-2 z-20">
<div class="flex-shrink-0 w-64 glass-elevated p-4 rounded-xl border-l-4 border-l-primary">
<div class="flex justify-between mb-2">
<span class="text-[10px] font-label-bold text-on-surface-variant uppercase">Shipment #TRK-892</span>
<span class="text-[10px] font-label-bold text-primary">In Transit</span>
</div>
<p class="font-label-bold text-on-surface text-sm">Amritsar → New Delhi Hub</p>
<div class="mt-3 w-full bg-white/5 h-1 rounded-full overflow-hidden">
<div class="bg-primary h-full w-[65%]"></div>
</div>
</div>
<div class="flex-shrink-0 w-64 glass-elevated p-4 rounded-xl border-l-4 border-l-secondary">
<div class="flex justify-between mb-2">
<span class="text-[10px] font-label-bold text-on-surface-variant uppercase">Shipment #TRK-104</span>
<span class="text-[10px] font-label-bold text-on-surface-variant">Scheduled</span>
</div>
<p class="font-label-bold text-on-surface text-sm">Ludhiana → Mumbai Port</p>
<div class="mt-3 w-full bg-white/5 h-1 rounded-full overflow-hidden">
<div class="bg-white/10 h-full w-[10%]"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Footer Shell -->
<footer class="w-full py-12 bg-surface-container-lowest dark:bg-surface-container-lowest border-t border-white/5 flex flex-col items-center justify-center gap-6 px-margin-desktop ml-72">
<h2 class="text-headline-lg font-headline-lg text-primary">HarvestIQ</h2>
<div class="flex gap-8">
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Terms of Service</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Compliance</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Support</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Contact</a>
</div>
<p class="text-label-sm font-label-sm text-on-surface-variant">© 2024 HarvestIQ. Precision Agriculture Systems.</p>
</footer>
@endsection
