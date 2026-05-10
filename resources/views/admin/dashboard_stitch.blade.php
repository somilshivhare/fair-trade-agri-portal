@extends('layouts.stitch')
@section('title', 'Admin Panel - AgriMandi')
@section('content')
<!-- Market Ticker Specialty Component -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 h-10 flex items-center overflow-hidden z-50 relative">
<div class="flex whitespace-nowrap items-center gap-xl px-xl market-ticker-scroll">
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Wheat (WHT)</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹2,450.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Rice (BAS)</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹6,800.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Maize (MAZ)</span>
<span class="font-label-sm text-label-sm text-error font-bold">₹1,920.00</span>
<span class="material-symbols-outlined text-error text-[16px]">trending_down</span>
</div>
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Soybean (SOY)</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹4,600.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
<!-- Duplicate for infinite scroll -->
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Wheat (WHT)</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹2,450.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
</div>
</div>
<div class="flex min-h-screen">
<!-- SideNavBar Shared Component -->
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 rounded-r-xl">
<div class="px-lg mb-8">
<div class="flex items-center gap-md">
<div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary" style="font-variation-settings: 'FILL' 1;">eco</span>
</div>
<div>
<h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
<p class="text-label-sm text-on-surface-variant">Premium Marketplace</p>
</div>
</div>
</div>
<nav class="flex-1 px-4 flex flex-col gap-1">
<a class="flex items-center gap-md px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg font-label-md text-label-md transition-all duration-300" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span>My Products</span>
</a>
<a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="gavel">gavel</span>
<span>Bids</span>
</a>
<a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
<span>Orders</span>
</a>
<a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="px-6 mt-auto">
<button class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-md hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                    Market Insights
                </button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 min-w-0">
<!-- TopNavBar Shared Component -->
<header class="flex items-center justify-between px-xl h-20 w-full sticky top-0 z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-xl">
<div class="relative w-96">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full bg-surface-container-low border-none rounded-full pl-12 pr-4 h-11 text-body-md focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Search institutional records..." type="text"/>
</div>
<nav class="hidden lg:flex items-center gap-lg">
<a class="text-primary border-b-2 border-primary pb-1 font-label-md text-label-md" href="#">Marketplace</a>
<a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" href="#">Analytics</a>
<a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-lg">
<div class="flex items-center gap-sm">
<button class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary-container/10 transition-colors">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="notifications">notifications</span>
</button>
<button class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary-container/10 transition-colors">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="language">language</span>
</button>
</div>
<div class="h-8 w-[1px] bg-outline-variant/30"></div>
<div class="flex items-center gap-md">
<button class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-lg text-label-lg active:scale-95 transition-transform duration-200">
                            Start Selling
                        </button>
<img alt="Farmer profile avatar" class="w-10 h-10 rounded-full object-cover border-2 border-primary-container" data-alt="A professional headshot of a middle-aged South Asian male agricultural expert, wearing a clean linen shirt. He has a friendly and trustworthy expression. The lighting is bright and airy, typical of a high-end corporate office setting. The background is softly blurred with hints of glass and green plants, maintaining a clean and premium light-mode aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQ_jlMfK2BWMbfPbkkJ9MaL_viI90gSJ0zPX29bkuNRiY3roZx6nGif7XYTX7_TV6MqK95WIwv-oDah_dFZijsZKZa1qzAIesHaccJ9G4gnCXkfLGzCF28b9NnSWFZL8t0l1ZMvarcCd4Wwi0NGfgGIqgjd0YuKI5n7K3PbFurkghUY5LnWFUWa6nCMFw_6-ueqJEGQeUsr06MhZl40i1SiZWdG5P_acf0MdAipXRErs1x0cja0orDCKNCBJ7cD4cuAU1tY2wdy2sM"/>
</div>
</div>
</header>
<!-- Dashboard Content -->
<div class="p-xl max-w-7xl mx-auto space-y-xl">
<!-- Header Stats Bento -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
<div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-primary/10 rounded-lg">
<span class="material-symbols-outlined text-primary" data-icon="verified_user">verified_user</span>
</div>
<span class="text-label-sm text-primary bg-primary/10 px-2 py-1 rounded-full font-bold">+12%</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md">Pending Verification</p>
<h3 class="text-headline-md font-headline-md mt-1">1,284</h3>
</div>
<div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-tertiary/10 rounded-lg">
<span class="material-symbols-outlined text-tertiary" data-icon="account_balance">account_balance</span>
</div>
<span class="text-label-sm text-tertiary bg-tertiary/10 px-2 py-1 rounded-full font-bold">+5.4%</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md">Total Volume (Cr)</p>
<h3 class="text-headline-md font-headline-md mt-1">₹42.8</h3>
</div>
<div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-secondary/10 rounded-lg">
<span class="material-symbols-outlined text-secondary" data-icon="monitoring">monitoring</span>
</div>
<span class="text-label-sm text-secondary bg-secondary/10 px-2 py-1 rounded-full font-bold">Stable</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md">Active Auctions</p>
<h3 class="text-headline-md font-headline-md mt-1">452</h3>
</div>
<div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-error/10 rounded-lg">
<span class="material-symbols-outlined text-error" data-icon="gpp_maybe">gpp_maybe</span>
</div>
<span class="text-label-sm text-error bg-error/10 px-2 py-1 rounded-full font-bold">High</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md">Risk Alerts</p>
<h3 class="text-headline-md font-headline-md mt-1">08</h3>
</div>
</div>
<!-- Verification Table Section -->
<div class="bg-surface-container-lowest rounded-xl emerald-glow border border-outline-variant/10 overflow-hidden">
<div class="px-xl py-lg border-b border-outline-variant/10 flex items-center justify-between">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Verification Oversight</h2>
<p class="text-body-md text-on-surface-variant">Reviewing institutional commodity batches for market readiness.</p>
</div>
<div class="flex gap-md">
<button class="px-4 py-2 border border-outline-variant/50 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
                                Filter
                            </button>
<button class="px-4 py-2 bg-primary text-on-primary rounded-lg font-label-md text-label-md flex items-center gap-2">
<span class="material-symbols-outlined text-[20px]">download</span>
                                Export Report
                            </button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant/20">
<th class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">Batch ID</th>
<th class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">Commodity</th>
<th class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">Institution</th>
<th class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">Quality Score</th>
<th class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">Status</th>
<th class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-xl py-5 font-label-md text-label-md text-primary font-bold">#AM-2024-001</td>
<td class="px-xl py-5">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-surface-variant">grass</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Basmati Rice</div>
<div class="text-label-sm text-on-surface-variant">Grade A+ | 500 MT</div>
</div>
</div>
</td>
<td class="px-xl py-5 font-body-md text-body-md text-on-surface">Punjab Agro-Traders</td>
<td class="px-xl py-5">
<div class="flex items-center gap-sm">
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden">
<div class="w-[94%] h-full bg-primary"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface font-bold">94%</span>
</div>
</td>
<td class="px-xl py-5">
<span class="inline-flex items-center gap-1 bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-bold">
<span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                                            Pending Review
                                        </span>
</td>
<td class="px-xl py-5 text-right">
<button class="text-primary font-label-lg text-label-lg hover:underline underline-offset-4">Review Details</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-xl py-5 font-label-md text-label-md text-primary font-bold">#AM-2024-002</td>
<td class="px-xl py-5">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-surface-variant">bakery_dining</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Durum Wheat</div>
<div class="text-label-sm text-on-surface-variant">Export Quality | 1,200 MT</div>
</div>
</div>
</td>
<td class="px-xl py-5 font-body-md text-body-md text-on-surface">Haryana Grain Corp</td>
<td class="px-xl py-5">
<div class="flex items-center gap-sm">
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden">
<div class="w-[88%] h-full bg-primary"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface font-bold">88%</span>
</div>
</td>
<td class="px-xl py-5">
<span class="inline-flex items-center gap-1 bg-tertiary/10 text-tertiary px-3 py-1 rounded-full text-label-sm font-bold">
<span class="w-1.5 h-1.5 bg-tertiary rounded-full"></span>
                                            Verified
                                        </span>
</td>
<td class="px-xl py-5 text-right">
<button class="text-primary font-label-lg text-label-lg hover:underline underline-offset-4">View Certificate</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-xl py-5 font-label-md text-label-md text-primary font-bold">#AM-2024-003</td>
<td class="px-xl py-5">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-surface-variant">oil_barrel</span>
</div>
<div>
<div class="font-label-lg text-label-lg text-on-surface">Mustard Oil</div>
<div class="text-label-sm text-on-surface-variant">Cold Pressed | 50 KL</div>
</div>
</div>
</td>
<td class="px-xl py-5 font-body-md text-body-md text-on-surface">Rajasthan Oil Mills</td>
<td class="px-xl py-5">
<div class="flex items-center gap-sm">
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden">
<div class="w-[42%] h-full bg-error"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface font-bold">42%</span>
</div>
</td>
<td class="px-xl py-5">
<span class="inline-flex items-center gap-1 bg-error/10 text-error px-3 py-1 rounded-full text-label-sm font-bold">
<span class="w-1.5 h-1.5 bg-error rounded-full"></span>
                                            Rejected
                                        </span>
</td>
<td class="px-xl py-5 text-right">
<button class="text-primary font-label-lg text-label-lg hover:underline underline-offset-4">Appeal Notes</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-xl py-6 bg-surface-container-low/30 border-t border-outline-variant/10 flex items-center justify-between">
<span class="text-label-sm text-on-surface-variant font-medium">Showing 1-10 of 1,284 entries</span>
<div class="flex items-center gap-sm">
<button class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center bg-primary text-on-primary font-label-sm text-label-sm">1</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low font-label-sm text-label-sm">2</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low font-label-sm text-label-sm">3</button>
<button class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
<!-- Review Modal Overlay (Positioned Absolute for visualization) -->
<div class="fixed inset-0 bg-inverse-surface/40 backdrop-blur-md flex items-center justify-center p-xl z-[100]">
<div class="bg-surface-container-lowest w-full max-w-2xl rounded-2xl emerald-glow-strong overflow-hidden flex flex-col max-h-[921px]">
<div class="p-lg border-b border-outline-variant/10 flex justify-between items-center">
<div class="flex items-center gap-md">
<div class="p-2 bg-primary/10 rounded-lg">
<span class="material-symbols-outlined text-primary">fact_check</span>
</div>
<h2 class="font-headline-md text-headline-md">Institutional Quality Review</h2>
</div>
<button class="w-10 h-10 rounded-full hover:bg-surface-container-low flex items-center justify-center">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<div class="flex-1 overflow-y-auto p-lg space-y-lg">
<div class="grid grid-cols-2 gap-lg">
<div class="space-y-sm">
<p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Batch Identity</p>
<p class="font-label-lg text-label-lg font-bold">#AM-2024-001 | Basmati Rice</p>
</div>
<div class="space-y-sm">
<p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Submitting Authority</p>
<p class="font-label-lg text-label-lg font-bold">Punjab Agro-Traders Co.</p>
</div>
</div>
<div class="bg-surface-container-low p-lg rounded-xl space-y-md">
<p class="font-label-lg text-label-lg text-on-surface border-b border-outline-variant/20 pb-2">Moisture Content Analysis</p>
<div class="flex items-center justify-between">
<span class="text-body-md">Measured Value</span>
<span class="font-bold text-primary">11.8%</span>
</div>
<div class="flex items-center justify-between">
<span class="text-body-md">Permissible Limit</span>
<span class="text-on-surface-variant">10.0% - 13.5%</span>
</div>
<div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-[80%]"></div>
</div>
</div>
<div class="space-y-md">
<p class="font-label-lg text-label-lg text-on-surface">Verification Documents</p>
<div class="grid grid-cols-1 gap-sm">
<div class="flex items-center justify-between p-md bg-surface-container-lowest border border-outline-variant/30 rounded-lg hover:border-primary transition-colors cursor-pointer">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-secondary">description</span>
<span class="text-body-md">Quality_Lab_Report_V2.pdf</span>
</div>
<span class="material-symbols-outlined text-primary">download</span>
</div>
<div class="flex items-center justify-between p-md bg-surface-container-lowest border border-outline-variant/30 rounded-lg hover:border-primary transition-colors cursor-pointer">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-secondary">photo_camera</span>
<span class="text-body-md">Batch_Inspection_Image_01.jpg</span>
</div>
<span class="material-symbols-outlined text-primary">visibility</span>
</div>
</div>
</div>
<div class="space-y-sm">
<label class="font-label-lg text-label-lg">Review Notes (Internal)</label>
<textarea class="w-full bg-surface-container-low border border-outline-variant/50 rounded-xl p-md h-24 focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="Enter professional oversight notes..."></textarea>
</div>
</div>
<div class="p-lg bg-surface-container-low/50 border-t border-outline-variant/10 flex gap-md">
<button class="flex-1 bg-surface-container-lowest border border-error text-error py-3 rounded-xl font-label-lg text-label-lg hover:bg-error/5 transition-colors">Reject Batch</button>
<button class="flex-[2] bg-primary text-on-primary py-3 rounded-xl font-label-lg text-label-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified</span>
                            Approve for Marketplace
                        </button>
</div>
</div>
</div>
<!-- Footer Shared Component -->
<footer class="mt-xl border-t border-outline-variant/30 bg-surface-container-lowest">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto">
<div class="col-span-1 md:col-span-1">
<h2 class="font-headline-md text-primary font-bold mb-4">AgriMandi India</h2>
<p class="font-body-md text-on-surface-variant mb-6">Empowering Indian farmers through institutional technology and transparent commodity trading.</p>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface mb-4">Platform</h4>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md" href="#">Marketplace</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md" href="#">Analytics Hub</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md" href="#">Institutional Bidding</a></li>
</ul>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface mb-4">Support</h4>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md" href="#">Trade Support</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md" href="#">Terms of Service</a></li>
</ul>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-on-surface mb-4">Institutional Info</h4>
<p class="text-on-surface-variant font-body-md mb-4">Tower A, Ag-Tech Park, Sector 44, Gurgaon - 122003</p>
<div class="flex gap-md">
<button class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary-container/20 transition-colors">
<span class="material-symbols-outlined text-primary">mail</span>
</button>
<button class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary-container/20 transition-colors">
<span class="material-symbols-outlined text-primary">phone</span>
</button>
</div>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 text-center">
<p class="font-body-md text-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>
</main>
</div>
@endsection
