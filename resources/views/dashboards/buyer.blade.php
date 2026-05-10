@extends('layouts.app')

@section('content')
<!-- SideNavBar -->
<nav class="bg-surface-container dark:bg-surface-container w-72 h-screen fixed left-0 top-0 backdrop-blur-xl border-r border-white/10 shadow-[0_0_60px_-15px_rgba(0,200,83,0.05)] flex flex-col h-full py-gutter z-50">
<div class="px-6 mb-10">
<h1 class="text-headline-md font-headline-md text-primary tracking-tight">HarvestIQ</h1>
<p class="text-label-sm font-label-sm text-on-surface-variant opacity-70">AgriTech Elite</p>
</div>
<div class="flex-1 space-y-1">
<a class="flex items-center gap-4 bg-primary-container text-on-primary-container rounded-lg px-4 py-3 mx-2 active:scale-95 transition-transform" href="#">
<span class="material-symbols-outlined">dashboard</span>
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
</div>
<div class="px-4 mt-auto">
<button class="w-full py-4 bg-primary text-on-primary font-label-bold text-label-bold rounded-xl shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all">
                New Listing
            </button>
</div>
</nav>
<!-- TopNavBar -->
<header class="h-20 fixed top-0 right-0 w-[calc(100%-18rem)] z-40 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-white/10 flex justify-between items-center px-margin-desktop">
<div class="flex items-center gap-6 flex-1">
<div class="relative w-full max-w-md focus-within:ring-1 focus-within:ring-primary rounded-lg">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 text-label-bold focus:ring-0 placeholder:text-on-surface-variant/50" placeholder="Search harvests, bids, or farmers..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">notifications</span>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">help</span>
<div class="flex items-center gap-3 pl-4 border-l border-white/10">
<div class="text-right">
<p class="text-label-bold font-label-bold text-on-surface">Alex Chen</p>
<p class="text-label-sm font-label-sm text-primary">Enterprise Buyer</p>
</div>
<img alt="User Profile Avatar" class="w-10 h-10 rounded-full border border-primary/30" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDs-7ctJiv2GVfdPqt7oeBfYBy6vi_yOGlpREXEZOxp1A39REfk4RD2NbInDEus1SgiOWarP9CSfQ6nlpyeiKXI1qGGqUTZ9ofbI-Q3C1DUx9WHnRwFXbsSUngzLizVcxiRWkBO3wtnqD7YIOxFB0-fkSXAPT95HZLdUMWbf1hBK4RXSiPtsa2beHdFySOb-l37_ZFWFnt2_UuMhan18ijxIdEAvNRboFUJeFIDbuKKWVLLVJ0uIEK4qnOuZt9k5NcQxa9FSH4FI5ie"/>
</div>
</div>
</header>
<!-- Main Content -->
<main class="ml-72 pt-28 px-margin-desktop pb-20 min-h-screen relative overflow-hidden">
<!-- Background Ambient Glows -->
<div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-[120px] -z-10"></div>
<div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/3 rounded-full blur-[150px] -z-10"></div>
<!-- Key Metrics Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-gutter">
<div class="glass p-6 rounded-xl flex flex-col gap-2 hover:bg-white/10 transition-all cursor-default group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">gavel</span>
<span class="text-primary text-label-sm font-label-sm">+12% vs LY</span>
</div>
<h3 class="text-on-surface-variant text-label-bold font-label-bold uppercase tracking-widest">Active Bids</h3>
<p class="text-headline-lg font-headline-lg text-on-surface">24</p>
</div>
<div class="glass p-6 rounded-xl flex flex-col gap-2 hover:bg-white/10 transition-all cursor-default group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">task_alt</span>
<span class="text-primary text-label-sm font-label-sm">8 Pending</span>
</div>
<h3 class="text-on-surface-variant text-label-bold font-label-bold uppercase tracking-widest">Accepted Orders</h3>
<p class="text-headline-lg font-headline-lg text-on-surface">156</p>
</div>
<div class="glass p-6 rounded-xl flex flex-col gap-2 hover:bg-white/10 transition-all cursor-default group">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">bookmark</span>
<span class="text-on-surface-variant text-label-sm font-label-sm">4 Categories</span>
</div>
<h3 class="text-on-surface-variant text-label-bold font-label-bold uppercase tracking-widest">Saved Crops</h3>
<p class="text-headline-lg font-headline-lg text-on-surface">12</p>
</div>
<div class="glass p-6 rounded-xl flex flex-col gap-2 hover:bg-white/10 transition-all cursor-default group border-primary/20">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform" style="font-variation-settings: 'FILL' 1;">local_shipping</span>
<span class="text-primary text-label-sm font-label-sm glow-emerald">In Transit</span>
</div>
<h3 class="text-on-surface-variant text-label-bold font-label-bold uppercase tracking-widest">Pending Deliveries</h3>
<p class="text-headline-lg font-headline-lg text-on-surface">32</p>
</div>
</div>
<!-- Market Insights & Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter mb-gutter">
<!-- Market Insights Graph Area -->
<div class="lg:col-span-2 glass p-gutter rounded-2xl relative overflow-hidden">
<div class="flex justify-between items-end mb-8">
<div>
<h2 class="text-headline-md font-headline-md text-on-surface">Market Price Trends</h2>
<p class="text-body-md text-on-surface-variant">Real-time aggregate data for Premium Grains (Q3)</p>
</div>
<div class="flex gap-2 bg-surface-container-low p-1 rounded-lg">
<button class="px-4 py-1 text-label-sm font-label-sm rounded-md bg-primary text-on-primary">1W</button>
<button class="px-4 py-1 text-label-sm font-label-sm rounded-md text-on-surface-variant hover:text-on-surface">1M</button>
<button class="px-4 py-1 text-label-sm font-label-sm rounded-md text-on-surface-variant hover:text-on-surface">3M</button>
</div>
</div>
<!-- Mock Chart Visualization -->
<div class="h-64 flex items-end justify-between gap-1 relative group">
<!-- SVG Path for the "Glow Line" chart -->
<svg class="absolute inset-0 w-full h-full" preserveaspectratio="none">
<defs>
<lineargradient id="chart-gradient" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#3fe56c" stop-opacity="0.2"></stop>
<stop offset="100%" stop-color="#3fe56c" stop-opacity="0"></stop>
</lineargradient>
</defs>
<path class="glow-emerald" d="M0,150 Q50,120 100,160 T200,100 T300,130 T400,70 T500,90 T600,40 T700,60 T800,20" fill="none" stroke="#3fe56c" stroke-width="3"></path>
<path d="M0,150 Q50,120 100,160 T200,100 T300,130 T400,70 T500,90 T600,40 T700,60 T800,20 V256 H0 Z" fill="url(#chart-gradient)"></path>
</svg>
<!-- Grid Lines -->
<div class="absolute inset-0 flex flex-col justify-between pointer-events-none border-b border-white/5">
<div class="w-full border-t border-white/5"></div>
<div class="w-full border-t border-white/5"></div>
<div class="w-full border-t border-white/5"></div>
</div>
<!-- Data Points -->
<div class="flex justify-between w-full h-full items-end z-10 px-2 opacity-0 group-hover:opacity-100 transition-opacity">
<div class="w-1 h-1 bg-primary rounded-full glow-emerald"></div>
<div class="w-1 h-1 bg-primary rounded-full glow-emerald"></div>
<div class="w-1 h-1 bg-primary rounded-full glow-emerald"></div>
<div class="w-1 h-1 bg-primary rounded-full glow-emerald"></div>
<div class="w-1 h-1 bg-primary rounded-full glow-emerald"></div>
</div>
</div>
<div class="flex justify-between mt-4 text-label-sm font-label-sm text-on-surface-variant">
<span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
</div>
</div>
<!-- Bidding Activity Feed -->
<div class="glass p-gutter rounded-2xl flex flex-col">
<div class="flex items-center justify-between mb-6">
<h2 class="text-label-bold font-label-bold text-on-surface uppercase tracking-widest">Recent Activity</h2>
<span class="material-symbols-outlined text-on-surface-variant">more_horiz</span>
</div>
<div class="space-y-6 overflow-y-auto max-h-[350px] pr-2 custom-scrollbar">
<div class="flex gap-4">
<div class="w-10 h-10 rounded-full bg-primary-container/20 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-[20px]">history</span>
</div>
<div>
<p class="text-label-bold font-label-bold text-on-surface">Bid Raised: Winter Wheat</p>
<p class="text-label-sm font-label-sm text-on-surface-variant">+$2.40/unit by AgroGlobal</p>
<p class="text-[10px] text-on-surface-variant/60 mt-1 uppercase">2 mins ago</p>
</div>
</div>
<div class="flex gap-4">
<div class="w-10 h-10 rounded-full bg-error-container/20 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-error text-[20px]">close</span>
</div>
<div>
<p class="text-label-bold font-label-bold text-on-surface">Bid Outmatched</p>
<p class="text-label-sm font-label-sm text-on-surface-variant">Listing: Organic Soybeans #442</p>
<p class="text-[10px] text-on-surface-variant/60 mt-1 uppercase">45 mins ago</p>
</div>
</div>
<div class="flex gap-4">
<div class="w-10 h-10 rounded-full bg-primary-container/20 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
</div>
<div>
<p class="text-label-bold font-label-bold text-on-surface">Order Confirmed</p>
<p class="text-label-sm font-label-sm text-on-surface-variant">Farmer: GreenValley Estates</p>
<p class="text-[10px] text-on-surface-variant/60 mt-1 uppercase">2 hours ago</p>
</div>
</div>
</div>
<button class="mt-auto w-full py-3 text-label-bold font-label-bold text-primary border border-primary/20 rounded-xl hover:bg-primary/5 transition-colors">View All Logs</button>
</div>
</div>
<!-- Saved Listings Grid -->
<h2 class="text-headline-md font-headline-md text-on-surface mb-gutter">Watchlist &amp; Saved Crops</h2>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-gutter">
<!-- Listing Card 1 -->
<div class="glass-elevated rounded-2xl overflow-hidden group cursor-pointer border-white/5 hover:border-primary/30 transition-all">
<div class="h-48 relative">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A lush, expansive golden wheat field at sunset with the warm orange light catching the individual ears of grain. High-fidelity cinematic photography showcasing agricultural precision and beauty, with deep dark shadows in the foreground and a vibrant emerald green glow subtly overlaid for a modern tech feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBg6e55pho7IGExjwnBmzf1ffyd0nftjsCGccTNY1sTBq2fB9Ruw72QIoxDwIZvG1sEKcweXM_G2-JnXjeiFTVV_XFiLyLqPkz9wff8W5W8SjZf4XCeGkWh8qKYVRZwo6mNmiv0YdydhqNc2Tg5dnmoeXbhCiGAWIFG5DJo0yDJdRnF_WvnmUqUkS8vcjwZ2ZwotHSqYS67bcj5zz3VUDayaolmLw_gPf_PmV9C1P2TKERmxdcUCbTasNAwFs7dx4mSqDNCduWE36wT"/>
<div class="absolute top-4 right-4 px-3 py-1 bg-surface-container-highest/80 backdrop-blur-md rounded-full text-label-sm font-label-bold text-primary border border-primary/20">Active Auction</div>
<button class="absolute bottom-4 left-4 w-10 h-10 bg-surface/60 backdrop-blur-md rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bookmark</span>
</button>
</div>
<div class="p-6">
<div class="flex justify-between items-start mb-2">
<h3 class="text-body-lg font-label-bold text-on-surface">Premium Hard Red Wheat</h3>
<span class="text-primary font-label-bold">$340/ton</span>
</div>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">location_on</span>
<p class="text-label-sm font-label-sm text-on-surface-variant">Kansas, Central Plains</p>
</div>
<div class="grid grid-cols-2 gap-4 py-4 border-y border-white/5 mb-4">
<div>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Moisture</p>
<p class="text-label-bold font-label-bold text-on-surface">12.4%</p>
</div>
<div>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Quantity</p>
<p class="text-label-bold font-label-bold text-on-surface">500 Tons</p>
</div>
</div>
<button class="w-full py-3 bg-white/5 hover:bg-primary hover:text-on-primary font-label-bold text-label-bold rounded-xl transition-all">Quick Bid</button>
</div>
</div>
<!-- Listing Card 2 -->
<div class="glass-elevated rounded-2xl overflow-hidden group cursor-pointer border-white/5 hover:border-primary/30 transition-all">
<div class="h-48 relative">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Close-up macro photography of organic soy beans spilling out of a rustic burlap sack in a dimly lit, high-end agricultural warehouse. The lighting is dramatic and low-key, highlighting the texture of the beans and fabric. Subtle emerald green digital data points are floating around the subject to symbolize tracking and technology integration." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnv-m1vWM2jyMjQkQfwl6fNlIc4o2HTSgql5NQVIp7MYUXYD3brdZdcQ0XgF1107fhVU2qDR7fHqRFooOjsYaSFgZlLKp0fXG1-_SliBMC_Ulj_A_SKbQrQcVk2R400qbPBSqeEeUgZ4UNaMv-BTVXEpkjfceHS8J4Q77-KI-pIe7h9qud0hOlT1_6aIf7sR_TZz4x1Bgo4jrD0J6AaNsjlxc-kkcWi3iDo37dW1jj4lgty3L13vdSP3oxyQYNZl9LIeGkALYTNS-v"/>
<div class="absolute top-4 right-4 px-3 py-1 bg-surface-container-highest/80 backdrop-blur-md rounded-full text-label-sm font-label-bold text-primary border border-primary/20">Verified Farm</div>
<button class="absolute bottom-4 left-4 w-10 h-10 bg-surface/60 backdrop-blur-md rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bookmark</span>
</button>
</div>
<div class="p-6">
<div class="flex justify-between items-start mb-2">
<h3 class="text-body-lg font-label-bold text-on-surface">Organic Non-GMO Soy</h3>
<span class="text-primary font-label-bold">$510/ton</span>
</div>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">location_on</span>
<p class="text-label-sm font-label-sm text-on-surface-variant">Iowa, United States</p>
</div>
<div class="grid grid-cols-2 gap-4 py-4 border-y border-white/5 mb-4">
<div>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Protein</p>
<p class="text-label-bold font-label-bold text-on-surface">36.2%</p>
</div>
<div>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Quantity</p>
<p class="text-label-bold font-label-bold text-on-surface">240 Tons</p>
</div>
</div>
<button class="w-full py-3 bg-white/5 hover:bg-primary hover:text-on-primary font-label-bold text-label-bold rounded-xl transition-all">Quick Bid</button>
</div>
</div>
<!-- Listing Card 3 -->
<div class="glass-elevated rounded-2xl overflow-hidden group cursor-pointer border-white/5 hover:border-primary/30 transition-all">
<div class="h-48 relative">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Aerial view of a massive modern corn silo facility with geometric storage units and high-tech transport pipelines. The scene is shot at twilight with cool blue tones and sharp white artificial lights. The aesthetic is industrial and sophisticated, conveying a sense of large-scale logistics and precision engineered food storage systems." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDMqaGPCrKseHG8_K_hypS4PsrRA1ZFYhgCtPAwnv-brcKzdT8LhvesysNbHJM_YEE6050Lq120PYjctyCMhFUESaDD8AcR53IF4cvRJ4eIIRlDxuVBeYVZpFi0vieXnlt3Uu4seDMPBKgRpNWxB-9Yx5tg8WjxxAO92XL6jXCB51FJmzWOTY1l7NKunse5HVLuYw1k_L4kTvJjEPXkaQ_7NypLocj8hV9-D_6gwA7_3dK_CouPdkbmNpGSbKLu5ibsIDU0UUZqKVj7"/>
<div class="absolute top-4 right-4 px-3 py-1 bg-surface-container-highest/80 backdrop-blur-md rounded-full text-label-sm font-label-bold text-on-surface-variant border border-white/10">Coming Soon</div>
<button class="absolute bottom-4 left-4 w-10 h-10 bg-surface/60 backdrop-blur-md rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bookmark</span>
</button>
</div>
<div class="p-6">
<div class="flex justify-between items-start mb-2">
<h3 class="text-body-lg font-label-bold text-on-surface">Industrial Feed Corn</h3>
<span class="text-primary font-label-bold">$185/ton</span>
</div>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">location_on</span>
<p class="text-label-sm font-label-sm text-on-surface-variant">Nebraska Facility B</p>
</div>
<div class="grid grid-cols-2 gap-4 py-4 border-y border-white/5 mb-4">
<div>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Grade</p>
<p class="text-label-bold font-label-bold text-on-surface">No. 2 Yellow</p>
</div>
<div>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Volume</p>
<p class="text-label-bold font-label-bold text-on-surface">1,200 Tons</p>
</div>
</div>
<button class="w-full py-3 bg-white/5 hover:bg-primary hover:text-on-primary font-label-bold text-label-bold rounded-xl transition-all">Quick Bid</button>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-surface-container-lowest dark:bg-surface-container-lowest w-full py-12 border-t border-white/5 flex flex-col items-center justify-center gap-6 px-margin-desktop w-full ml-72">
<h2 class="text-headline-lg font-headline-lg text-primary">HarvestIQ</h2>
<div class="flex gap-8">
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Terms of Service</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Compliance</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Support</a>
<a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary transition-all opacity-80 hover:opacity-100" href="#">Contact</a>
</div>
<p class="text-label-sm font-label-sm text-on-surface-variant/60">© 2024 HarvestIQ. Precision Agriculture Systems.</p>
</footer>
@endsection
