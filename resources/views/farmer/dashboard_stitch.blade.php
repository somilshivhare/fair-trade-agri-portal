@extends('layouts.stitch')
@section('title', 'Farmer Dashboard - AgriMandi')
@section('content')
<!-- SideNavBar Component -->
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
<div class="px-6 mb-8 flex items-center gap-3">
<div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-on-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">agriculture</span>
</div>
<div>
<h2 class="font-headline-sm text-primary font-bold">AgriMandi India</h2>
<p class="text-label-sm text-on-surface-variant">Premium Marketplace</p>
</div>
</div>
<nav class="flex-1 flex flex-col gap-1 pr-4">
<a class="flex items-center gap-3 px-6 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg font-label-md transition-all duration-300" href="#">
<span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined">inventory_2</span> My Products
            </a>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined">gavel</span> Bids
            </a>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined">shopping_bag</span> Orders
            </a>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined">settings</span> Settings
            </a>
</nav>
<div class="px-6 mt-auto">
<button class="w-full py-4 bg-tertiary-container text-on-tertiary-container font-label-lg rounded-xl flex items-center justify-center gap-2 hover:bg-primary transition-colors">
<span class="material-symbols-outlined">analytics</span> Market Insights
            </button>
</div>
</aside>
<div class="flex-1 flex flex-col min-w-0">
<!-- TopAppBar Component -->
<header class="flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-8">
<div class="md:hidden">
<span class="material-symbols-outlined text-primary">menu</span>
</div>
<div class="hidden lg:flex items-center bg-surface-container rounded-full px-4 py-2 border border-outline-variant/20 w-80">
<span class="material-symbols-outlined text-on-surface-variant mr-2">search</span>
<input class="bg-transparent border-none focus:ring-0 text-label-md w-full" placeholder="Search marketplace..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="hidden sm:flex gap-4 items-center">
<span class="font-label-md text-primary border-b-2 border-primary pb-1">Marketplace</span>
<span class="font-label-md text-on-surface-variant hover:text-on-surface cursor-pointer">Analytics</span>
<span class="font-label-md text-on-surface-variant hover:text-on-surface cursor-pointer">Resources</span>
</div>
<div class="h-6 w-px bg-outline-variant/30 hidden sm:block"></div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors cursor-pointer">notifications</span>
<span class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors cursor-pointer">language</span>
<div class="flex items-center gap-2 bg-surface-variant/50 py-1 pl-1 pr-3 rounded-full cursor-pointer hover:bg-surface-variant transition-colors">
<img alt="Farmer profile avatar" class="w-8 h-8 rounded-full border-2 border-primary-container" data-alt="A close-up professional portrait of a confident middle-aged Indian farmer smiling warmly. He is wearing a clean linen shirt and a traditional turban. The lighting is soft, natural, and flattering, set against a blurred background of a lush green agricultural field at sunset. The overall mood is dignified and represents a successful modern agri-entrepreneur in a clean, high-end visual style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZ3TsWggsTFLVt06ByWKHUzF6y764G98beMl7ydrnhAdgkp2VnSLbiwJIv3jFL4w-mXZm6MkY_R54GVKcHvEFOfAniGqlpwd_rh_eyhG6tc97SghZfLavFLv-T_3xaAHqvXAsS96LQzWQWfm0VRZCAgbEUxGWB5m_1KROBQmtEN1Cm2u5ed3QPW8tKoos2g8J-1JH-D0OwhaAkRTmUUWTP4dves5AGfkvVrxw5PhEBKDMulGD8zYNnJcs2fy_ZC8XbaXgZYa0BOLuS"/>
<span class="font-label-lg text-on-surface">Rajesh K.</span>
</div>
</div>
</div>
</header>
<!-- Market Ticker -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/10 overflow-hidden py-2">
<div class="market-ticker flex items-center whitespace-nowrap gap-12 text-label-sm">
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">WHEAT (MP)</span>
<span class="text-primary font-bold">₹2,450/q</span>
<span class="text-primary material-symbols-outlined text-xs">trending_up</span>
</div>
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">SOYBEAN</span>
<span class="text-primary font-bold">₹4,820/q</span>
<span class="text-error material-symbols-outlined text-xs">trending_down</span>
</div>
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">MUSTARD</span>
<span class="text-primary font-bold">₹5,100/q</span>
<span class="text-primary material-symbols-outlined text-xs">trending_up</span>
</div>
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">COTTON</span>
<span class="text-primary font-bold">₹7,200/q</span>
<span class="text-primary font-bold">+0.5%</span>
</div>
<!-- Duplicate for seamless loop -->
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">WHEAT (MP)</span>
<span class="text-primary font-bold">₹2,450/q</span>
<span class="text-primary material-symbols-outlined text-xs">trending_up</span>
</div>
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">SOYBEAN</span>
<span class="text-primary font-bold">₹4,820/q</span>
<span class="text-error material-symbols-outlined text-xs">trending_down</span>
</div>
</div>
</div>
<main class="p-margin-desktop space-y-xl max-w-container-max mx-auto w-full">
<!-- Welcome Banner Section -->
<section class="relative bg-surface-container-lowest rounded-[32px] p-8 emerald-shadow overflow-hidden group">
<div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary-container/10 to-transparent"></div>
<div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
<div class="space-y-4">
<div class="inline-flex items-center gap-2 bg-primary/10 text-primary px-4 py-1.5 rounded-full border border-primary/20">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-label-lg">Emerald Verified KYC</span>
</div>
<h1 class="font-display-lg text-on-surface">Welcome back, <span class="text-primary">Rajesh</span></h1>
<p class="font-body-lg text-on-surface-variant max-w-xl">Your farm's digital gateway is thriving. You have 4 active bids and 2 shipments arriving at the Mandi today.</p>
<div class="flex gap-4 pt-2">
<button class="bg-primary text-on-primary px-lg py-md rounded-xl font-label-lg hover:shadow-lg transition-all active:scale-95">List New Harvest</button>
<button class="bg-secondary-container text-on-secondary-container px-lg py-md rounded-xl font-label-lg hover:bg-secondary-fixed transition-all">View Reports</button>
</div>
</div>
<div class="hidden lg:block relative">
<div class="w-48 h-48 bg-primary-container/20 rounded-full absolute -top-8 -right-8 blur-3xl"></div>
<img alt="Modern farming technology" class="w-64 h-48 object-cover rounded-2xl emerald-shadow transform group-hover:scale-105 transition-transform duration-500" data-alt="A clean, high-tech agricultural scene featuring a tablet computer being used in a lush, organic field during a bright sunrise. The screen shows vibrant data visualizations and farm metrics. The lighting is crisp and airy, with soft emerald and blue tones reflected in the device and the dew-kissed crops. The overall aesthetic is professional, modern, and clinical, emphasizing digital growth and technological precision in farming." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIIssEnuDFyUePXG7ARHwNdAcRKS2WdeLxMbnbIwTpf0oO9CnG1IUmB4Bbx-Ykta_klBLaG6ysv_XUYJzGglF6zeadvcNXN_6v674D7_vW6Q4tmZnkVd5KFFkUjERZT41nNOArj6748VtLyYUXxVSt_Zpv510zPc1rTQkgKW9IF84G5ASpS0D03fr4ejtvGcfNAHac4NZicrKqiLvxaFUtLZIv07B_D2EInFQZB91ZfE-x0DrrY-hKgCQnoyhgJ2C4nJmtbssOZ_2G"/>
</div>
</div>
</section>
<!-- 4 Summary Cards Bento-ish Grid -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
<div class="bg-surface-container-low p-lg rounded-[24px] border border-outline-variant/10 hover:border-primary/30 transition-all group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-white rounded-2xl emerald-shadow text-primary">
<span class="material-symbols-outlined">payments</span>
</div>
<span class="text-primary text-label-sm font-bold bg-primary/10 px-2 py-1 rounded-full">+12%</span>
</div>
<h3 class="text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Total Revenue</h3>
<p class="font-headline-md text-on-surface">₹4,28,500</p>
</div>
<div class="bg-surface-container-low p-lg rounded-[24px] border border-outline-variant/10 hover:border-primary/30 transition-all group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-white rounded-2xl emerald-shadow text-primary">
<span class="material-symbols-outlined">inventory</span>
</div>
<span class="text-on-surface-variant text-label-sm font-medium">85% Sold</span>
</div>
<h3 class="text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Active Listings</h3>
<p class="font-headline-md text-on-surface">12 Lots</p>
</div>
<div class="bg-surface-container-low p-lg rounded-[24px] border border-outline-variant/10 hover:border-primary/30 transition-all group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-white rounded-2xl emerald-shadow text-primary">
<span class="material-symbols-outlined">gavel</span>
</div>
<span class="text-primary text-label-sm font-bold bg-primary/10 px-2 py-1 rounded-full">Active</span>
</div>
<h3 class="text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Ongoing Bids</h3>
<p class="font-headline-md text-on-surface">4 Bids</p>
</div>
<div class="bg-surface-container-low p-lg rounded-[24px] border border-outline-variant/10 hover:border-primary/30 transition-all group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-white rounded-2xl emerald-shadow text-primary">
<span class="material-symbols-outlined">grade</span>
</div>
<span class="text-primary text-label-sm font-bold bg-primary/10 px-2 py-1 rounded-full">A+ Grade</span>
</div>
<h3 class="text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Avg Quality Score</h3>
<p class="font-headline-md text-on-surface">9.2/10</p>
</div>
</section>
<!-- Main Content Area: Table and Widget -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
<!-- Recent Bids Table -->
<div class="lg:col-span-2 space-y-md">
<div class="flex items-center justify-between">
<h2 class="font-headline-md text-on-surface">Recent Activity</h2>
<button class="text-primary font-label-lg hover:underline underline-offset-4">View All</button>
</div>
<div class="bg-surface-container-lowest rounded-[24px] emerald-shadow overflow-hidden border border-outline-variant/10">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant/20">
<th class="px-6 py-4 font-label-lg text-on-surface-variant">Commodity</th>
<th class="px-6 py-4 font-label-lg text-on-surface-variant">Bidder</th>
<th class="px-6 py-4 font-label-lg text-on-surface-variant">Highest Bid</th>
<th class="px-6 py-4 font-label-lg text-on-surface-variant">Status</th>
<th class="px-6 py-4 font-label-lg text-on-surface-variant">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<tr class="hover:bg-surface-container transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">grain</span>
</div>
<div>
<div class="font-label-lg text-on-surface">Wheat (Lot #A24)</div>
<div class="text-label-sm text-on-surface-variant">250 Quintals</div>
</div>
</div>
</td>
<td class="px-6 py-5">
<div class="text-label-md text-on-surface">Reliance Retail</div>
<div class="text-label-sm text-on-surface-variant">Mumbai Hub</div>
</td>
<td class="px-6 py-5 font-bold text-primary">₹2,480/q</td>
<td class="px-6 py-5">
<span class="px-3 py-1 bg-primary/10 text-primary text-label-sm rounded-full font-bold">Active</span>
</td>
<td class="px-6 py-5">
<button class="p-2 hover:bg-primary-container/20 rounded-lg text-on-surface-variant transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">compost</span>
</div>
<div>
<div class="font-label-lg text-on-surface">Soybean (Lot #S12)</div>
<div class="text-label-sm text-on-surface-variant">120 Quintals</div>
</div>
</div>
</td>
<td class="px-6 py-5">
<div class="text-label-md text-on-surface">ITC Ltd.</div>
<div class="text-label-sm text-on-surface-variant">Indore Facility</div>
</td>
<td class="px-6 py-5 font-bold text-primary">₹4,950/q</td>
<td class="px-6 py-5">
<span class="px-3 py-1 bg-primary/10 text-primary text-label-sm rounded-full font-bold">Active</span>
</td>
<td class="px-6 py-5">
<button class="p-2 hover:bg-primary-container/20 rounded-lg text-on-surface-variant transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container/20 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">eco</span>
</div>
<div>
<div class="font-label-lg text-on-surface">Mustard (Lot #M05)</div>
<div class="text-label-sm text-on-surface-variant">80 Quintals</div>
</div>
</div>
</td>
<td class="px-6 py-5">
<div class="text-label-md text-on-surface">Adani Wilmar</div>
<div class="text-label-sm text-on-surface-variant">Jaipur Depot</div>
</td>
<td class="px-6 py-5 font-bold text-primary">₹5,200/q</td>
<td class="px-6 py-5">
<span class="px-3 py-1 bg-on-secondary-container/10 text-on-secondary-container text-label-sm rounded-full font-bold">Closed</span>
</td>
<td class="px-6 py-5">
<button class="p-2 hover:bg-primary-container/20 rounded-lg text-on-surface-variant transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Sidebar Market Rate Widget -->
<div class="space-y-md">
<h2 class="font-headline-md text-on-surface">Market Trends</h2>
<div class="bg-surface-container-lowest rounded-[24px] emerald-shadow p-lg space-y-6 border border-outline-variant/10">
<div class="flex items-center justify-between">
<span class="font-label-lg text-on-surface">Regional Rates</span>
<span class="material-symbols-outlined text-primary">refresh</span>
</div>
<div class="space-y-4">
<div class="p-4 bg-surface-container-low rounded-2xl flex items-center justify-between group hover:bg-primary-container/10 transition-colors">
<div class="flex items-center gap-3">
<div class="w-2 h-8 bg-primary rounded-full"></div>
<div>
<div class="text-label-sm text-on-surface-variant uppercase">Dewas Mandi</div>
<div class="font-label-lg text-on-surface">Wheat Grade A</div>
</div>
</div>
<div class="text-right">
<div class="font-bold text-on-surface">₹2,420</div>
<div class="text-label-sm text-primary">+1.2%</div>
</div>
</div>
<div class="p-4 bg-surface-container-low rounded-2xl flex items-center justify-between group hover:bg-primary-container/10 transition-colors">
<div class="flex items-center gap-3">
<div class="w-2 h-8 bg-tertiary-container rounded-full"></div>
<div>
<div class="text-label-sm text-on-surface-variant uppercase">Kota Mandi</div>
<div class="font-label-lg text-on-surface">Mustard Seed</div>
</div>
</div>
<div class="text-right">
<div class="font-bold text-on-surface">₹5,150</div>
<div class="text-label-sm text-error">-0.4%</div>
</div>
</div>
<div class="p-4 bg-surface-container-low rounded-2xl flex items-center justify-between group hover:bg-primary-container/10 transition-colors">
<div class="flex items-center gap-3">
<div class="w-2 h-8 bg-primary rounded-full"></div>
<div>
<div class="text-label-sm text-on-surface-variant uppercase">Sehore Mandi</div>
<div class="font-label-lg text-on-surface">Sarbati Wheat</div>
</div>
</div>
<div class="text-right">
<div class="font-bold text-on-surface">₹3,100</div>
<div class="text-label-sm text-primary">+2.1%</div>
</div>
</div>
</div>
<div class="pt-4 border-t border-outline-variant/10">
<div class="bg-gradient-to-br from-primary to-tertiary p-6 rounded-2xl text-on-primary space-y-4">
<h4 class="font-headline-sm font-bold">Price Prediction</h4>
<p class="text-label-md opacity-90">Wheat prices expected to rise by 5-8% in the next 15 days due to festival demand.</p>
<button class="w-full py-2 bg-white/20 hover:bg-white/30 backdrop-blur-md rounded-xl font-label-lg transition-colors">Unlock Full Analysis</button>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Footer Component -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto">
<div class="col-span-1 md:col-span-1 space-y-4">
<h2 class="font-headline-md text-primary font-bold">AgriMandi India</h2>
<p class="font-body-md text-on-surface-variant">Empowering farmers with digital transparency and global market access.</p>
</div>
<div class="flex flex-col gap-3">
<h3 class="font-label-lg text-on-surface">Legal</h3>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-opacity duration-200" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-opacity duration-200" href="#">Terms of Service</a>
</div>
<div class="flex flex-col gap-3">
<h3 class="font-label-lg text-on-surface">Support</h3>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-opacity duration-200" href="#">Trade Support</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-opacity duration-200" href="#">Contact Us</a>
</div>
<div class="flex flex-col gap-3">
<h3 class="font-label-lg text-on-surface">Download App</h3>
<div class="flex gap-2">
<div class="w-32 h-10 bg-on-surface rounded-lg flex items-center justify-center text-white cursor-pointer hover:opacity-80 transition-opacity">
<span class="material-symbols-outlined text-sm mr-2">phone_android</span>
<span class="text-xs font-bold">Play Store</span>
</div>
<div class="w-32 h-10 bg-on-surface rounded-lg flex items-center justify-center text-white cursor-pointer hover:opacity-80 transition-opacity">
<span class="material-symbols-outlined text-sm mr-2">ios</span>
<span class="text-xs font-bold">App Store</span>
</div>
</div>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 text-center">
<p class="font-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>
</div>
<!-- Mobile FAB -->
<button class="fixed bottom-6 right-6 md:hidden w-16 h-16 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center z-50 hover:scale-105 active:scale-95 transition-transform">
<span class="material-symbols-outlined text-3xl">add</span>
</button>
@endsection
