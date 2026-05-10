@extends('layouts.stitch')
@section('title', 'Marketplace v2 - AgriMandi')
@section('content')
<!-- TopNavBar Shell -->
<nav class="flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50 bg-surface-container-lowest/90 backdrop-blur-xl border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-12">
<h1 class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</h1>
<div class="hidden lg:flex items-center gap-8">
<a class="font-label-lg text-primary border-b-2 border-primary pb-1" href="#">Marketplace</a>
<a class="font-label-lg text-on-surface-variant hover:text-primary transition-colors" href="#">Analytics</a>
<a class="font-label-lg text-on-surface-variant hover:text-primary transition-colors" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-6">
<div class="hidden md:flex items-center gap-4">
<button class="font-label-lg text-on-surface-variant flex items-center gap-2 hover:bg-surface-container px-4 py-2 rounded-xl transition-colors">
<span class="material-symbols-outlined text-[20px]">language</span>
                Hindi
            </button>
<button class="bg-primary text-on-primary font-label-lg px-6 py-2.5 rounded-xl active:scale-95 transition-transform duration-200 shadow-md hover:shadow-lg">
                Start Selling
            </button>
</div>
<div class="flex items-center gap-3">
<div class="relative group">
<span class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container rounded-full cursor-pointer transition-colors">notifications</span>
<span class="absolute top-1 right-1 bg-error text-on-error text-[10px] font-bold px-1 min-w-[18px] h-[18px] rounded-full flex items-center justify-center border-2 border-surface-container-lowest">12</span>
</div>
<img alt="Farmer profile avatar" class="w-10 h-10 rounded-full border-2 border-primary/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjwHlsknZYUgTPhSOQV1w-bY5BMfJoRNHBs8LmJL2g-JyEFOqjdpVluWeoRSyEEUGNSIdtE7PnQuc5hSf6vNLCXEi83A5YJkMnurAYY9sfq2_4oIlv6kD9MpKRvEa7sLknMt5i-00Bhkc_C6uvOLhdeNg6C444aPJWHQCN9FXLjXlKit2dUj082OUU3bwytezFpOgz98Hu6MSGGRQ7PDk8DvcWHr0QTKkBFYbSQtcomPOHqevcixLPbwLT4qQ1pfKA17cV6OL_zwxV"/>
</div>
</div>
</nav>
<main class="max-w-container-max mx-auto px-margin-desktop py-8 flex gap-gutter">
<!-- Left Sidebar: Filters -->
<aside class="hidden lg:flex flex-col w-72 shrink-0 gap-8">
<div class="soft-card rounded-xl p-6 flex flex-col gap-6">
<div>
<h3 class="font-label-lg text-primary uppercase tracking-widest mb-4">Categories</h3>
<div class="flex flex-col gap-3">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="w-5 h-5 rounded border-outline bg-surface-container-lowest checked:bg-primary text-primary focus:ring-primary/20" type="checkbox"/>
<span class="text-on-surface-variant group-hover:text-primary transition-colors">Cereals &amp; Grains</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input checked="" class="w-5 h-5 rounded border-outline bg-surface-container-lowest checked:bg-primary text-primary focus:ring-primary/20" type="checkbox"/>
<span class="text-on-surface font-semibold group-hover:text-primary transition-colors">Vegetables</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="w-5 h-5 rounded border-outline bg-surface-container-lowest checked:bg-primary text-primary focus:ring-primary/20" type="checkbox"/>
<span class="text-on-surface-variant group-hover:text-primary transition-colors">Fruits</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="w-5 h-5 rounded border-outline bg-surface-container-lowest checked:bg-primary text-primary focus:ring-primary/20" type="checkbox"/>
<span class="text-on-surface-variant group-hover:text-primary transition-colors">Pulses</span>
</label>
</div>
</div>
<div class="h-px bg-outline-variant"></div>
<div>
<h3 class="font-label-lg text-primary uppercase tracking-widest mb-4">Price Range (Per Quintal)</h3>
<input class="w-full h-1.5 bg-surface-container rounded-lg appearance-none cursor-pointer accent-primary" type="range"/>
<div class="flex justify-between mt-2 text-label-sm text-on-surface-variant font-medium">
<span>₹1,500</span>
<span>₹25,000+</span>
</div>
</div>
<div class="h-px bg-outline-variant"></div>
<div>
<h3 class="font-label-lg text-primary uppercase tracking-widest mb-4">Location</h3>
<div class="relative">
<select class="w-full bg-surface-container-low border border-outline-variant text-on-surface text-body-md rounded-xl py-3 px-4 appearance-none focus:outline-none focus:ring-2 focus:ring-primary/20">
<option>All India</option>
<option>Maharashtra</option>
<option>Punjab</option>
<option>Uttar Pradesh</option>
<option>Karnataka</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 pointer-events-none text-on-surface-variant">expand_more</span>
</div>
</div>
<button class="w-full py-3 bg-surface-container text-primary font-label-lg rounded-xl hover:bg-primary/5 transition-colors border border-primary/20">
                Reset Filters
            </button>
</div>
<!-- Promotion Card -->
<div class="relative overflow-hidden rounded-xl h-64 flex items-end p-6 group">
<img class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJeTBYXRz4d3A9jYkRbz1GbFl-YDfSUi5ekbhPsbDVgpPYKhxCTJ_ao9ucyNS82SafJ1HlmxGeonmk6kd1G0txnPpJG4ixf0ws9qnP6BModopMQzQ6Gp1WgYf6WhYSjX1G0UY1yYh_P0TAUsqbJ4FUyHOfK640YxvWDfJo2S7eZICrvGl92aMVLZ8fKcTjNvxszjHoya0MwCYxBNnMq-Z6MtOuJrb0JPuxCtpmz9QsrKhBe1QPH27FzPYij-OUZG-d5T7YpmEDvQl0"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
<div class="relative z-10">
<h4 class="font-headline-md text-white font-bold">Yield Insights 2024</h4>
<p class="text-label-sm text-white/80 mt-1">Get the latest market analysis for Kharif crops.</p>
</div>
</div>
</aside>
<!-- Main Content Area -->
<section class="flex-1">
<!-- New Matches Banner -->
<div class="mb-8 flex items-center justify-between bg-primary-container/20 border border-primary/20 rounded-xl p-4 emerald-glow">
<div class="flex items-center gap-3">
<span class="text-2xl">🎯</span>
<span class="text-on-primary-container font-label-lg">3 new matches found for your requirements!</span>
</div>
<button class="text-primary font-label-lg hover:underline underline-offset-4 flex items-center gap-2 px-4 py-2 hover:bg-primary/5 rounded-lg transition-colors">
                View Matches
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
<!-- Header & Stats -->
<div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface tracking-tight">Marketplace</h2>
<p class="text-body-lg text-on-surface-variant mt-2">Discover premium quality crops from verified farmers across India.</p>
</div>
<div class="flex items-center gap-3 bg-surface-container-low p-1.5 rounded-xl border border-outline-variant">
<button class="px-5 py-2.5 bg-primary text-on-primary rounded-lg font-label-lg shadow-sm">Live Bids</button>
<button class="px-5 py-2.5 text-on-surface-variant hover:text-primary font-label-lg">Fixed Price</button>
</div>
</div>
<!-- Grid Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
<!-- Card 1 -->
<div class="soft-card rounded-xl overflow-hidden group hover:emerald-glow transition-all duration-300">
<div class="h-48 relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9-vqoxoOnC9S6GEzzK7ewdjWlfVbMkMYvVUyCsO-7Wl5oEUxP16NIkcFxPKM7JE4e7ss-Ts4eXY1XHGWe8-a9Km4sqkn4Y1LmaC7EFqXSIVLlnP18ymjn4Kp-zUnAXY084k-z_aIY3MElC65g2z9SE3KmHXZZhcGWa6ttcjgxOtn1k1xRCEE13s1TXPSTxmNvYtU_MAifqhC_yjPMVwD3BZp2mICAB-NF7300Hm7WpFkGb3wDevCP2GcBDQPmaLtghZ3OEKOVGI70"/>
<div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full border border-primary/30 flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="text-label-sm font-bold text-primary">Live Auction</span>
</div>
<div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1 rounded-lg border border-white/20 flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary-fixed-dim text-[18px]">trending_up</span>
<span class="text-label-sm font-bold text-white">+12.5%</span>
</div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline-md text-on-surface leading-tight">Premium Hybrid Tomatoes</h3>
<span class="text-primary font-extrabold text-lg">₹4,200<span class="text-label-sm text-on-surface-variant font-normal">/Qtl</span></span>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">person</span>
<span class="text-body-md">Rajesh Kumar • <span class="text-primary font-semibold">Verified</span></span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
<span class="text-body-md">Nashik, Maharashtra</span>
</div>
</div>
<div class="mt-6 flex gap-3">
<button class="flex-1 bg-primary text-on-primary font-label-lg py-3 rounded-xl hover:bg-primary/90 shadow-md active:scale-95 transition-all">Place Bid</button>
<button class="w-12 h-12 flex items-center justify-center border border-outline-variant rounded-xl hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">favorite</span>
</button>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="soft-card rounded-xl overflow-hidden group hover:emerald-glow transition-all duration-300">
<div class="h-48 relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaOXWheSdCqh1M8A3PR3IHBGDXmjarKSZOyXZMIbspsRECOEX9MCX1EC2LhUt8r7tBLObOAWi8sjmhQmfMi-gB7JCe3WVlDfKgkagZDU9jGGw1SZm8wS2Fz9YKXP0CEUmC_VZoE08RyZZrlWa9b2tAtPMIkqy20VfP30XTz6Q5yZzJqiEW16XFhCFXRNMCaypt_OhK8Ril3gQ9eN5TuFJk5h0792QDXzXs6kQP9CDXPTzeZ-1o_E0AMs5XjRq8fnrRm112xpNJKVCE"/>
<div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full border border-primary/30 flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="text-label-sm font-bold text-primary">Live Auction</span>
</div>
<div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1 rounded-lg border border-white/20 flex items-center gap-1.5">
<span class="material-symbols-outlined text-error text-[18px]">trending_down</span>
<span class="text-label-sm font-bold text-white">-2.1%</span>
</div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline-md text-on-surface leading-tight">Long Grain Basmati Rice</h3>
<span class="text-primary font-extrabold text-lg">₹8,500<span class="text-label-sm text-on-surface-variant font-normal">/Qtl</span></span>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">person</span>
<span class="text-body-md">Sandeep Singh • <span class="text-primary font-semibold">Pro Seller</span></span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
<span class="text-body-md">Karnal, Haryana</span>
</div>
</div>
<div class="mt-6 flex gap-3">
<button class="flex-1 bg-primary text-on-primary font-label-lg py-3 rounded-xl hover:bg-primary/90 shadow-md active:scale-95 transition-all">Place Bid</button>
<button class="w-12 h-12 flex items-center justify-center border border-outline-variant rounded-xl hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">favorite</span>
</button>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="soft-card rounded-xl overflow-hidden group hover:emerald-glow transition-all duration-300">
<div class="h-48 relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGokQlSLbEnebWwiO0RP_sjC4kSGRlFTuf40L9MZiB1muLeJK_OzjDp7YML5iQH0_0H8GqSUZneTsxpA1hLXms_Q1NVJuxBVRrR6IBl6SN973jc14cfrM9DV9iFXY1gue9eQss6qMZIJ_7A2_lxWIWy40B08rPv61XUjGGRbosOvq-WoDt6eTd_Cuf3g7QCBGpHlYbrhzR8GKpkDLA0GwtVvNdhEyKwE87oAEZ5lEcQfdEwZMj27NLA2DmJssFv1TBOcWbZ0n4RewC"/>
<div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full border border-primary/30 flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="text-label-sm font-bold text-primary">Live Auction</span>
</div>
<div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1 rounded-lg border border-white/20 flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary-fixed-dim text-[18px]">trending_up</span>
<span class="text-label-sm font-bold text-white">+5.8%</span>
</div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline-md text-on-surface leading-tight">Export Quality Onions</h3>
<span class="text-primary font-extrabold text-lg">₹2,800<span class="text-label-sm text-on-surface-variant font-normal">/Qtl</span></span>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">person</span>
<span class="text-body-md">Amol Deshmukh • <span class="text-primary font-semibold">Verified</span></span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
<span class="text-body-md">Pune, Maharashtra</span>
</div>
</div>
<div class="mt-6 flex gap-3">
<button class="flex-1 bg-primary text-on-primary font-label-lg py-3 rounded-xl hover:bg-primary/90 shadow-md active:scale-95 transition-all">Place Bid</button>
<button class="w-12 h-12 flex items-center justify-center border border-outline-variant rounded-xl hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">favorite</span>
</button>
</div>
</div>
</div>
<!-- Card 4 -->
<div class="soft-card rounded-xl overflow-hidden group hover:emerald-glow transition-all duration-300">
<div class="h-48 relative overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB28Q1wqzHhH7LGjykv8PNYFRiOcemnVV2kvzMKE70NIyEV1JU_zHuJm6dZ3_fo0se0fRt6UX76s5xLxJYvGvfGNbR5dISB2hxHWWgx-DV5LhGbNxe04tCIQXsmGRRvo904lDU03WjmxSXh4VaI7utzEe2pdiXutMb4FF0CxDCymtTBzy3GymuHs9-W35MbXpvV9DIMbu6AIO3IBXSRmQiI2w0u7drTKI-dk4z0SHX7qXFQECfLk25-FXT26g3S4Up5VD2MdT79eVTX"/>
<div class="absolute top-4 left-4 bg-surface-container text-on-surface-variant px-3 py-1.5 rounded-full border border-outline-variant flex items-center gap-2">
<span class="text-label-sm font-bold">Scheduled</span>
</div>
<div class="absolute bottom-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1 rounded-lg border border-white/20 flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary-fixed-dim text-[18px]">trending_up</span>
<span class="text-label-sm font-bold text-white">+8.2%</span>
</div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline-md text-on-surface leading-tight">Yellow Maize Grains</h3>
<span class="text-primary font-extrabold text-lg">₹1,950<span class="text-label-sm text-on-surface-variant font-normal">/Qtl</span></span>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">person</span>
<span class="text-body-md">Vijay Patel • <span class="text-primary font-semibold">Verified</span></span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-primary">location_on</span>
<span class="text-body-md">Ahmedabad, Gujarat</span>
</div>
</div>
<div class="mt-6 flex gap-3">
<button class="flex-1 bg-surface-container text-primary font-label-lg py-3 rounded-xl hover:bg-surface-container-high transition-all">Notify Me</button>
<button class="w-12 h-12 flex items-center justify-center border border-outline-variant rounded-xl hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">favorite</span>
</button>
</div>
</div>
</div>
<!-- Bento Grid Highlight Card -->
<div class="md:col-span-2 soft-card rounded-xl overflow-hidden relative group border-0">
<div class="absolute inset-0">
<img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB2Lkugmr3sW1R9LMidjbs_yXV44yJ3PxLqq-X5RN7UYYo8fSRyVuMlbI4JVoB0NbDFx5r87eGA2TIj6NHYKBRfxEyFAMfcfP-bdMCT1zqGqFE8_5fyaR6TrOzCqv9pIZhwwpXAX4e22AxCQFxLilX63vgxa6bymVI9kGeV7bER0WIYa6A1sC7dB_QQpGqFhFPkplMhAY4MYx2bj1WfZoqR_xv3QbRRsNpHM7HXdzsLLQo-9WFZq0pwlsX0oPJMVpvpe4s8BbWPQbxZ"/>
<div class="absolute inset-0 bg-gradient-to-r from-white via-white/90 to-transparent"></div>
</div>
<div class="relative h-full flex flex-col justify-center p-10 max-w-lg">
<span class="text-primary font-label-lg tracking-widest uppercase mb-4">Bulk Orders Available</span>
<h3 class="font-display-lg text-on-surface mb-4 leading-tight">Institutional Procurement Channel</h3>
<p class="text-body-md text-on-surface-variant mb-8 font-medium">Access large-scale inventory for food processing and export units directly from FPOs and bulk producers.</p>
<button class="w-fit bg-primary text-on-primary px-8 py-4 rounded-xl font-label-lg flex items-center gap-3 hover:shadow-lg transition-all active:scale-95">
                        Contact Trade Desk
                        <span class="material-symbols-outlined">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Pagination -->
<div class="mt-12 flex items-center justify-center gap-4">
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-label-lg shadow-sm">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-colors">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-colors">3</button>
<span class="text-on-surface-variant">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</section>
</main>
<!-- Footer Shell -->
<footer class="bg-surface-container-low border-t border-outline-variant mt-20">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-16 max-w-container-max mx-auto">
<div class="col-span-1">
<h2 class="font-headline-md text-primary font-bold mb-6">AgriMandi India</h2>
<p class="text-body-md text-on-surface-variant">Empowering Indian farmers through digital transparency and premium market access.</p>
</div>
<div>
<h4 class="text-on-surface font-label-lg uppercase tracking-wider mb-6">Marketplace</h4>
<ul class="flex flex-col gap-4">
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Cereals</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Fruits &amp; Veg</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Organic Produce</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Bulk Commodities</a></li>
</ul>
</div>
<div>
<h4 class="text-on-surface font-label-lg uppercase tracking-wider mb-6">Resources</h4>
<ul class="flex flex-col gap-4">
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Terms of Service</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Trade Support</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors hover:underline underline-offset-4 decoration-primary" href="#">Contact Us</a></li>
</ul>
</div>
<div>
<h4 class="text-on-surface font-label-lg uppercase tracking-wider mb-6">Join Our Newsletter</h4>
<p class="text-label-sm text-on-surface-variant mb-4 font-medium">Get weekly market reports directly to your inbox.</p>
<div class="flex gap-2">
<input class="flex-1 bg-surface-container-lowest border border-outline-variant rounded-lg px-4 text-body-md focus:ring-2 focus:ring-primary/20 outline-none placeholder:text-on-surface-variant/50" placeholder="Email Address" type="email"/>
<button class="bg-primary text-on-primary p-2 rounded-lg hover:shadow-md transition-shadow">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-desktop py-6 border-t border-outline-variant/10 text-center md:text-left">
<p class="font-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>
<!-- FAB for mobile support -->
<button class="fixed bottom-8 right-8 lg:hidden bg-primary text-on-primary w-14 h-14 rounded-full shadow-2xl flex items-center justify-center active:scale-90 transition-transform z-50">
<span class="material-symbols-outlined">filter_list</span>
</button>
@endsection
