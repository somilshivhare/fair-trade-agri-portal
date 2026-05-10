@extends('layouts.stitch')
@section('title', 'Orders - AgriMandi')
@section('content')

<!-- Market Ticker Specialty Component -->
<div class="w-full bg-surface-container-lowest py-2 border-b border-outline-variant/10 overflow-hidden sticky top-0 z-[60]">
<div class="flex items-center gap-12 animate-marquee whitespace-nowrap px-margin-desktop">
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Wheat (WHT)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹2,450.00</span>
<span class="text-[10px] text-primary">▲ 1.2%</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Soybeans (SOY)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹4,120.50</span>
<span class="text-[10px] text-primary">▲ 0.8%</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Corn (CRN)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹1,890.00</span>
<span class="text-[10px] text-error">▼ 0.4%</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Mustard (MST)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹5,670.00</span>
<span class="text-[10px] text-primary">▲ 2.1%</span>
</div>
</div>
</div>
<!-- Top Navigation Bar -->
<nav class="flex items-center justify-between px-margin-desktop h-20 w-full sticky top-[41px] z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-8">
<span class="font-headline-md text-primary font-bold tracking-tight text-headline-md">AgriMandi India</span>
<div class="hidden md:flex items-center gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Analytics</a>
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="#">Orders</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center gap-2 mr-4">
<span class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full cursor-pointer transition-colors" data-icon="notifications">notifications</span>
<span class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full cursor-pointer transition-colors" data-icon="language">language</span>
</div>
<button class="bg-primary-container text-on-primary-container px-6 py-3 rounded-xl font-label-md text-label-md active:scale-95 transition-transform duration-200">Start Selling</button>
<div class="w-10 h-10 rounded-full bg-surface-container overflow-hidden">
<img alt="Farmer profile avatar" class="w-full h-full object-cover" data-alt="A professional headshot of a modern Indian farmer in a clean white shirt, looking confident and smiling. The background is a blurred high-tech greenhouse with vibrant green plants and soft, natural morning light. The overall mood is professional, trustworthy, and successful." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvQdIKJ4ih-jgpbG1N-1bIJ24OiTWIqwmA49PSibVH5zrP1CNm9hITTi3rNeO8hxXf4hx3IeyP0OosSqrZ4sB0WPcVoSEUhiy87hfl4j85YeH0kPG18ZYLP6AOPvmcTF6VyE3JZtjHGXBTwGxNYS9OXSo4wkzeJMxOIr7aRLKLyVJn-y72iMEjGXBW0iahiD8OzuuSzNBIvKSLJ_wIIzd8Ln1TNcc5N3wlj7ic5MUKBLYeddm3gpRNaHS9LTmjHoo6s7JNEmB9dpaX"/>
</div>
</div>
</nav>
<div class="flex max-w-[1440px] mx-auto min-h-[calc(100vh-121px)]">
<!-- Side Navigation Bar -->
<aside class="hidden lg:flex flex-col w-72 h-screen sticky top-[121px] py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl rounded-r-xl">
<div class="px-6 mb-4">
<h3 class="font-headline-sm text-primary font-bold text-[20px]">Orders &amp; Logistics</h3>
<p class="text-label-sm text-on-surface-variant font-label-sm">Fulfillment Dashboard</p>
</div>
<nav class="flex flex-col gap-1 px-4">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg group" href="#">
<span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
<span class="font-label-md text-label-md">All Orders</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span class="font-label-md text-label-md">Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="gavel">gavel</span>
<span class="font-label-md text-label-md">Pending Bids</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-md text-label-md">Settings</span>
</a>
</nav>
<div class="mt-auto px-4 pb-8">
<div class="bg-primary/5 p-4 rounded-xl border border-primary/10">
<p class="text-label-sm font-label-sm text-primary mb-2">Pro Insights</p>
<p class="text-[13px] text-on-surface-variant leading-tight mb-3">Market demand for Basmati Rice is expected to rise by 15% next week.</p>
<button class="w-full bg-primary text-white py-2 rounded-lg text-label-sm font-label-sm hover:opacity-90 transition-opacity">View Trends</button>
</div>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 p-gutter md:p-margin-desktop overflow-x-hidden">
<!-- Header Section -->
<header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-xl">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface">Order Tracking</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">Manage your fulfillment pipeline and active logistics.</p>
</div>
<div class="flex items-center gap-3">
<div class="flex -space-x-3">
<img alt="Buyer 1" class="w-10 h-10 rounded-full border-2 border-white object-cover" data-alt="A portrait of a professional male procurement officer in a modern office, soft lighting, professional and focused expression." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_3LIaTBRWMWZCFyoL98jFbdozEktpdzVGqziwtA1weDGGum78OWtdsc7c2LcMFPCK4VRkKBUglad78tSS3s5Xe5RhKv51zd4r_74bzYmQc-YIQjKUPnXm6Fp2sKU_hXZdVxpMvyFiMeVxaZiU4H-S4Lcl8kRpRoe9VhQImFMWpFQNeccyw4B5ZFPOasUyAju_xOFk3nXjuqnLv4Y_OhIx1SkLN5v1WUSYMvsquwcs83NOkBR1MGBScL7Smm8_qG7cS6HjpUC7rkPh"/>
<img alt="Buyer 2" class="w-10 h-10 rounded-full border-2 border-white object-cover" data-alt="A portrait of a confident female agri-business trader, bright natural lighting, professional attire, modern corporate background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAy6GDQZn10eBNOBo1ZqmdMkdA-EVmWf04jDDMZgKCcXSlOWvkEk6aT6Aw-WRG5JZkiNZdynYQzgW2smR77EF9mlbn35lZ7PQM8TEuca5AsKby-JU8cysuC9-fVObFhQ1FhZQBnQ98kmGubk1mvdsrkyvt6V7hZN_MWxAqoDqc0uBs5r-DKOP1QKFetoreHbVMHIeTOnhTvc3fYqwqcVMwZxxNwhEjGpVCvDYEdPkxxSXIo5odoBEG_vr0oT816O0ePu4GPCHJx-Nr7"/>
<div class="w-10 h-10 rounded-full border-2 border-white bg-surface-container-high flex items-center justify-center text-label-sm font-bold text-on-surface-variant">+12</div>
</div>
<span class="text-label-md font-label-md text-on-surface-variant">Recent active buyers</span>
</div>
</header>
<!-- Status Overview Bento -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-xl">
<div class="bg-surface-container-lowest p-lg rounded-[32px] emerald-glow border border-outline-variant/10 flex flex-col gap-2">
<span class="material-symbols-outlined text-primary text-[32px]" data-icon="local_shipping">local_shipping</span>
<div class="mt-4">
<p class="text-display-lg font-display-lg text-primary">24</p>
<p class="text-label-md font-label-md text-on-surface-variant">In Transit</p>
</div>
</div>
<div class="bg-surface-container-lowest p-lg rounded-[32px] emerald-glow border border-outline-variant/10 flex flex-col gap-2">
<span class="material-symbols-outlined text-tertiary-container text-[32px]" data-icon="package_2">package_2</span>
<div class="mt-4">
<p class="text-display-lg font-display-lg text-on-surface">08</p>
<p class="text-label-md font-label-md text-on-surface-variant">Pending Prep</p>
</div>
</div>
<div class="bg-surface-container-lowest p-lg rounded-[32px] emerald-glow border border-outline-variant/10 flex flex-col gap-2">
<span class="material-symbols-outlined text-primary text-[32px]" data-icon="check_circle">check_circle</span>
<div class="mt-4">
<p class="text-display-lg font-display-lg text-on-surface">142</p>
<p class="text-label-md font-label-md text-on-surface-variant">Completed (Monthly)</p>
</div>
</div>
<div class="bg-surface-container-lowest p-lg rounded-[32px] emerald-glow border border-outline-variant/10 flex flex-col gap-2 bg-gradient-to-br from-primary/5 to-transparent">
<span class="material-symbols-outlined text-primary text-[32px]" data-icon="trending_up">trending_up</span>
<div class="mt-4">
<p class="text-display-lg font-display-lg text-primary">₹12.4L</p>
<p class="text-label-md font-label-md text-on-surface-variant">Monthly Fulfillment</p>
</div>
</div>
</div>
<!-- Active Order Detail Card -->
<section class="bg-surface-container-lowest rounded-[40px] emerald-glow-heavy border border-outline-variant/20 p-xl mb-xl">
<div class="flex flex-col lg:flex-row gap-xl">
<!-- Left: Timeline & Order Info -->
<div class="flex-1">
<div class="flex items-center justify-between mb-8">
<div>
<span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-label-sm tracking-wide">ORDER #AM-92410</span>
<h2 class="font-headline-md text-headline-md mt-2">Organic Sona Masoori Rice - 50MT</h2>
</div>
<div class="text-right">
<p class="text-label-sm text-on-surface-variant font-label-sm uppercase">ETA Arrival</p>
<p class="text-body-lg font-bold text-primary">Dec 18, 2024</p>
</div>
</div>
<!-- Progress Bar Visual -->
<div class="relative pt-10 pb-8">
<div class="absolute top-[52px] left-0 w-full h-1 bg-surface-container-high rounded-full overflow-hidden">
<div class="w-[65%] h-full bg-primary"></div>
</div>
<div class="relative flex justify-between">
<div class="flex flex-col items-center gap-3">
<div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center z-10">
<span class="material-symbols-outlined text-white text-[14px]" data-icon="check" data-weight="fill">check</span>
</div>
<span class="text-label-sm font-label-sm text-on-surface">Processing</span>
</div>
<div class="flex flex-col items-center gap-3">
<div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center z-10">
<span class="material-symbols-outlined text-white text-[14px]" data-icon="check" data-weight="fill">check</span>
</div>
<span class="text-label-sm font-label-sm text-on-surface">Dispatched</span>
</div>
<div class="flex flex-col items-center gap-3">
<div class="w-8 h-8 -mt-1 rounded-full border-4 border-white bg-primary flex items-center justify-center z-10 emerald-glow">
<span class="material-symbols-outlined text-white text-[16px]" data-icon="local_shipping">local_shipping</span>
</div>
<span class="text-label-sm font-label-sm text-primary font-bold">In Transit</span>
</div>
<div class="flex flex-col items-center gap-3 opacity-40">
<div class="w-6 h-6 rounded-full bg-surface-container flex items-center justify-center z-10"></div>
<span class="text-label-sm font-label-sm text-on-surface">Delivered</span>
</div>
</div>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-lg mt-8 pt-8 border-t border-outline-variant/10">
<div>
<p class="text-label-sm text-on-surface-variant font-label-sm mb-1">Carrier</p>
<p class="text-label-md font-bold">AgriLogistics Hub</p>
</div>
<div>
<p class="text-label-sm text-on-surface-variant font-label-sm mb-1">Vehicle</p>
<p class="text-label-md font-bold">MH-12-AX-4492</p>
</div>
<div>
<p class="text-label-sm text-on-surface-variant font-label-sm mb-1">Current Location</p>
<p class="text-label-md font-bold">Aurangabad Hub</p>
</div>
<div>
<p class="text-label-sm text-on-surface-variant font-label-sm mb-1">Temperature</p>
<p class="text-label-md font-bold text-primary">22°C (Optimal)</p>
</div>
</div>
</div>
<!-- Right: Live Map Visual -->
<div class="w-full lg:w-80 h-64 lg:h-auto bg-surface-container rounded-[24px] overflow-hidden relative group">
<img alt="Tracking Map" class="w-full h-full object-cover grayscale opacity-80 group-hover:grayscale-0 transition-all duration-500" data-alt="A clean, high-contrast digital map interface showing a logistics route through rural and urban India. The map features elegant emerald green route lines and a glowing navigation pin. The aesthetic is modern, tech-focused, and high-precision." data-location="Aurangabad, India" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqngmZ6M5LKoQKL1zIYuxED5vK_ZXdPICx1CKfAip2oexJIS93wP69BVqfCfdk9voNwzaX0zzRw2R1y_5EB6q2EJVHYUMlfXSSsiHTeHLX_6OMe7C8UA6Bc_o1XYqeKP7Ojd5RVgM1nVTDSZzKtffi25aFvvTjDlTLKGcs7PJJ9qgUhQHMnw8G8jduIVHIDQiS0oMNtoUumJy2RWN-NUb2F6M8FwEbhTE4WYI2yv4RV5naJkczr8GNG7h-3mzXpuWQqQTS0FyDZYSw"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-md p-3 rounded-xl border border-white/40">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="text-label-sm font-bold text-on-surface">Live Tracking Active</span>
</div>
</div>
</div>
</div>
</section>
<!-- Orders Table List -->
<section class="bg-surface-container-lowest rounded-[32px] emerald-glow border border-outline-variant/10 overflow-hidden">
<div class="p-lg border-b border-outline-variant/10 flex items-center justify-between">
<h3 class="font-headline-md text-headline-md">Recent Transactions</h3>
<div class="flex items-center gap-2">
<button class="px-4 py-2 rounded-lg border border-outline-variant/30 text-label-md font-label-md hover:bg-surface-container transition-colors">Filter</button>
<button class="px-4 py-2 rounded-lg border border-outline-variant/30 text-label-md font-label-md hover:bg-surface-container transition-colors">Export</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low">
<tr>
<th class="px-lg py-4 font-label-md text-on-secondary-container">Order ID</th>
<th class="px-lg py-4 font-label-md text-on-secondary-container">Commodity</th>
<th class="px-lg py-4 font-label-md text-on-secondary-container">Client</th>
<th class="px-lg py-4 font-label-md text-on-secondary-container">Status</th>
<th class="px-lg py-4 font-label-md text-on-secondary-container text-right">Value</th>
<th class="px-lg py-4 font-label-md text-on-secondary-container"></th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer group">
<td class="px-lg py-5 font-bold text-on-surface">#AM-92410</td>
<td class="px-lg py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined" data-icon="grass">grass</span>
</div>
<span class="text-body-md">Sona Masoori Rice</span>
</div>
</td>
<td class="px-lg py-5 text-on-surface-variant">Global Agro Export Ltd.</td>
<td class="px-lg py-5">
<span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-bold">In Transit</span>
</td>
<td class="px-lg py-5 font-bold text-on-surface text-right">₹4,20,000</td>
<td class="px-lg py-5 text-right">
<span class="material-symbols-outlined text-outline-variant group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer group">
<td class="px-lg py-5 font-bold text-on-surface">#AM-92388</td>
<td class="px-lg py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-tertiary-container/10 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined" data-icon="eco">eco</span>
</div>
<span class="text-body-md">Yellow Mustard Seeds</span>
</div>
</td>
<td class="px-lg py-5 text-on-surface-variant">Patel Food Processing</td>
<td class="px-lg py-5">
<span class="bg-surface-container-highest text-on-surface-variant px-3 py-1 rounded-full text-label-sm font-bold">Pending Prep</span>
</td>
<td class="px-lg py-5 font-bold text-on-surface text-right">₹1,85,000</td>
<td class="px-lg py-5 text-right">
<span class="material-symbols-outlined text-outline-variant group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer group">
<td class="px-lg py-5 font-bold text-on-surface">#AM-92312</td>
<td class="px-lg py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined" data-icon="agriculture">agriculture</span>
</div>
<span class="text-body-md">Organic Wheat Bulks</span>
</div>
</td>
<td class="px-lg py-5 text-on-surface-variant">Indore Millers Co.</td>
<td class="px-lg py-5">
<span class="bg-primary text-white px-3 py-1 rounded-full text-label-sm font-bold">Delivered</span>
</td>
<td class="px-lg py-5 font-bold text-on-surface text-right">₹8,45,000</td>
<td class="px-lg py-5 text-right">
<span class="material-symbols-outlined text-outline-variant group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
</td>
</tr>
</tbody>
</table>
</div>
</section>
</main>
</div>
<!-- Footer Component -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 py-12 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop max-w-[1440px] mx-auto">
<div class="flex flex-col gap-4">
<span class="font-headline-md text-primary font-bold text-headline-md">AgriMandi India</span>
<p class="font-body-md text-body-md text-on-surface-variant">Cultivating digital growth and connecting India's agricultural ecosystem with high-tech fulfillment solutions.</p>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Quick Links</h4>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Marketplace</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Analytics Dashboard</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Trade Support</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Legal</h4>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Privacy Policy</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Terms of Service</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Cookie Policy</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Contact</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Support Hub: 1800-AGRI-MANDI</p>
<p class="font-body-md text-body-md text-on-surface-variant">Email: help@agrimandi.in</p>
<div class="flex gap-4 mt-2">
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity" data-icon="share">share</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity" data-icon="language">language</span>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-outline-variant/10 px-margin-desktop max-w-[1440px] mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
<p class="font-body-md text-body-md text-on-surface-variant opacity-80">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
<div class="flex items-center gap-4">
<div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-sm" data-icon="verified">verified</span>
</div>
<span class="text-label-sm font-label-sm text-on-surface-variant">Authorized Digital Mandi Hub</span>
</div>
</div>
</footer>

@endsection
