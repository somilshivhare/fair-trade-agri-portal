@extends('layouts.stitch')
@section('title', 'My Products - AgriMandi')
@section('content')

<div class="flex min-h-screen">
<!-- Side Navigation Bar -->
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
<div class="px-6 mb-8">
<h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
<p class="text-label-sm text-on-surface-variant">Premium Marketplace</p>
</div>
<nav class="flex-1 px-4 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all duration-300 rounded-lg active:translate-x-1" href="{{ route('farmer.dashboard') }}">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg font-label-md active:translate-x-1" href="{{ route('farmer.products') }}">
<span class="material-symbols-outlined" data-icon="inventory_2" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
<span class="font-label-md">My Products</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all duration-300 rounded-lg active:translate-x-1" href="{{ route('farmer.bids') }}">
<span class="material-symbols-outlined" data-icon="gavel">gavel</span>
<span class="font-label-md">Bids</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all duration-300 rounded-lg active:translate-x-1" href="{{ route('farmer.orders') }}">
<span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
<span class="font-label-md">Orders</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all duration-300 rounded-lg active:translate-x-1" href="{{ route('profile') }}">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-md">Settings</span>
</a>
</nav>
<div class="px-4 mt-auto space-y-2">
<a href="{{ route('farmer.products.add') }}" class="w-full py-4 bg-primary text-on-primary rounded-xl font-label-lg shadow-lg active:scale-95 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined">add_circle</span> Add Product
                </a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="w-full py-3 text-error font-label-lg rounded-xl flex items-center justify-center gap-2 hover:bg-error-container transition-colors">
        <span class="material-symbols-outlined">logout</span> Logout
    </button>
</form>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="flex-1 min-w-0">
<!-- Top App Bar -->
<header class="flex items-center justify-between px-gutter h-20 w-full sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-6 flex-1">
<div class="relative w-full max-w-md group">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">search</span>
<input class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-full border-none focus:ring-2 focus:ring-primary/20 text-body-md placeholder:text-on-surface-variant/60" placeholder="Search inventory..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="hidden lg:flex items-center gap-2 px-4 py-2 text-on-surface-variant font-label-md hover:text-on-surface transition-colors">
<span class="material-symbols-outlined" data-icon="language">language</span>
                        Hindi
                    </button>
<button class="p-2 text-on-surface-variant hover:bg-primary-container/10 rounded-full transition-colors relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<div class="h-10 w-10 rounded-full overflow-hidden border-2 border-primary/20">
<img alt="Farmer profile avatar" class="w-full h-full object-cover" data-alt="A professional headshot of a modern farmer in a crisp white shirt, standing against a blurred background of a sun-drenched organic wheat field. The lighting is soft and golden, emphasizing a clean and trustworthy corporate agricultural aesthetic. The image reflects a high-tech farming executive with a warm and reliable gaze." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxe4MenqMiGoLp8RuecH_2aosAqadIO_vZe8MZ9FRwWhVLorInrjZ2xjyeC7Se6c7xWrkdFIyZu1DQ1vvQIhIXEt8g6W0e4I8il2SB4qG5Eo_VQQfmZT_UdzGt8aNnjSc5hnkk_l8bJTG11rEQDgCF5ie71a1DPMp_lWvN5G6jOFFiBC-i3_IG2IYQsFlUoSZK7wCz9rgtkT5sOGOfpmXG7HnTFdvIstWibvIFJtsu6s3elzTTogQSgTPHOR1lqKua8aVkD3_Ty6_i"/>
</div>
<a href="{{ route('farmer.products.add') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md shadow-md active:scale-95 transition-all">
                        Add Product
                    </a>
</div>
</header>
<!-- Market Ticker -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/10 py-2 overflow-hidden whitespace-nowrap">
<div class="inline-flex gap-8 animate-marquee">
<span class="flex items-center gap-2 text-label-sm uppercase tracking-wider text-on-surface-variant">
<span class="font-bold text-primary">Wheat</span> ₹2,450/qtl <span class="text-primary">+1.2%</span>
</span>
<span class="flex items-center gap-2 text-label-sm uppercase tracking-wider text-on-surface-variant">
<span class="font-bold text-primary">Paddy</span> ₹1,870/qtl <span class="text-error">-0.4%</span>
</span>
<span class="flex items-center gap-2 text-label-sm uppercase tracking-wider text-on-surface-variant">
<span class="font-bold text-primary">Cotton</span> ₹6,200/qtl <span class="text-primary">+2.1%</span>
</span>
<span class="flex items-center gap-2 text-label-sm uppercase tracking-wider text-on-surface-variant">
<span class="font-bold text-primary">Soybean</span> ₹4,890/qtl <span class="text-primary">+0.8%</span>
</span>
<span class="flex items-center gap-2 text-label-sm uppercase tracking-wider text-on-surface-variant">
<span class="font-bold text-primary">Maize</span> ₹2,100/qtl <span class="text-on-surface-variant">0.0%</span>
</span>
</div>
</div>
<!-- Dashboard Content -->
<div class="max-w-container-max mx-auto px-gutter py-xl">
<div class="flex items-end justify-between mb-xl">
<div>
<h2 class="font-headline-lg text-on-surface mb-2">Inventory Management</h2>
<p class="text-body-lg text-on-surface-variant">Real-time status of your agricultural commodities.</p>
</div>
<div class="flex gap-4">
<button class="flex items-center gap-2 px-4 py-2.5 bg-surface-container-high rounded-lg text-on-surface-variant font-label-md hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">filter_list</span>
                            Filters
                        </button>
<button class="flex items-center gap-2 px-4 py-2.5 bg-surface-container-high rounded-lg text-on-surface-variant font-label-md hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">download</span>
                            Export
                        </button>
</div>
</div>
<!-- Bento Grid Layout for Inventory -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">

    @forelse($products as $product)
    <div class="bg-surface-container-lowest rounded-[20px] p-6 border border-outline-variant/10 hover:border-primary/30 transition-all group">
        <div class="aspect-square rounded-xl overflow-hidden mb-4 relative bg-surface-container-low flex items-center justify-center">
            @if(!empty($product->images) && count($product->images) > 0)
            <img src="{{ Storage::url($product->images[0]) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $product->name }}"/>
            @else
            <span class="material-symbols-outlined text-outline text-5xl">eco</span>
            @endif
            <div class="absolute top-3 left-3">
                <span class="px-3 py-1 rounded-full text-label-sm font-bold backdrop-blur-md
                    @if($product->status === 'available') bg-primary/10 text-primary
                    @elseif($product->status === 'sold') bg-on-surface/10 text-on-surface
                    @else bg-error/10 text-error @endif">
                    {{ ucfirst($product->status) }}
                </span>
            </div>
            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity flex gap-1">
                <a href="{{ route('farmer.products.edit', $product->id) }}"
                    class="p-1.5 bg-surface/90 backdrop-blur-sm rounded-lg text-primary hover:bg-primary hover:text-on-primary transition-all"
                    title="Edit">
                    <span class="material-symbols-outlined text-[16px]">edit</span>
                </a>
            </div>
        </div>
        <div class="space-y-1 mb-3">
            <h3 class="font-headline-sm text-on-surface line-clamp-1">{{ $product->name }}</h3>
            <p class="text-label-sm text-on-surface-variant flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">location_on</span>
                {{ $product->location['district'] ?? '—' }}, {{ $product->location['state'] ?? '' }}
            </p>
            @if($product->quality)
            <p class="text-label-sm text-on-surface-variant">Grade {{ $product->quality }} · {{ ucfirst($product->category) }}</p>
            @endif
        </div>
        <div class="flex justify-between items-center py-3 border-y border-outline-variant/10 mb-3">
            <div>
                <p class="text-label-sm text-on-surface-variant">Quantity</p>
                <p class="font-headline-sm text-primary">{{ $product->quantity }} <span class="text-label-sm font-normal text-on-surface-variant">{{ $product->unit }}</span></p>
            </div>
            <div class="text-right">
                <p class="text-label-sm text-on-surface-variant">Price</p>
                <p class="font-headline-sm text-on-surface">₹{{ number_format($product->price) }}</p>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('farmer.bids') }}" class="flex-1 py-2.5 text-center bg-primary-container/20 text-primary rounded-xl font-label-md hover:bg-primary hover:text-on-primary transition-all active:scale-95 text-sm">
                View Bids
            </a>
            <form method="POST" action="{{ route('farmer.products.delete', $product->id) }}"
                onsubmit="return confirm('Remove \'{{ addslashes($product->name) }}\' from marketplace?')">
                @csrf @method('DELETE')
                <button type="submit" class="py-2.5 px-3 border border-error/30 text-error rounded-xl font-label-md hover:bg-error-container transition-all active:scale-95" title="Remove">
                    <span class="material-symbols-outlined text-[18px]">delete_outline</span>
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-surface-container-lowest rounded-2xl border-2 border-dashed border-outline-variant/30 p-16 flex flex-col items-center justify-center text-center">
        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-4">
            <span class="material-symbols-outlined text-primary text-[32px]">inventory_2</span>
        </div>
        <h3 class="font-headline-md text-on-surface mb-2">No Products Listed Yet</h3>
        <p class="font-body-md text-on-surface-variant max-w-sm mb-6">Start listing your agricultural produce to connect with buyers across India.</p>
        <a href="{{ route('farmer.products.add') }}" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-label-lg hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined">add_circle</span> List Your First Product
        </a>
    </div>
    @endforelse

    @if($products->count() > 0)
    <!-- Add New Product Tile -->
    <a href="{{ route('farmer.products.add') }}" class="bg-surface-container-low rounded-[20px] border-2 border-dashed border-outline-variant/30 flex flex-col items-center justify-center p-6 hover:bg-surface-container-high transition-all group min-h-[280px]">
        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
            <span class="material-symbols-outlined text-primary text-[32px]">add_circle</span>
        </div>
        <h3 class="font-headline-md text-on-surface mb-2">Add New Product</h3>
        <p class="text-body-md text-on-surface-variant text-center px-4">List a new commodity to the marketplace.</p>
    </a>
    @endif
</div>

{{-- Pagination --}}
@if($products->hasPages())
<div class="flex justify-center mt-gutter">{{ $products->links() }}</div>
@endif



<!-- Insights Section (Premium Detail) -->
<div class="mt-xl grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="col-span-1 md:col-span-2 bg-surface-container-lowest p-lg rounded-[20px] border border-outline-variant/10 emerald-glow">
<div class="flex items-center justify-between mb-lg">
<h4 class="font-headline-md text-on-surface">Price Trends</h4>
<span class="text-label-sm text-primary font-bold">LATEST 30 DAYS</span>
</div>
<!-- Mockup Chart Area -->
<div class="h-48 w-full bg-gradient-to-t from-primary/5 to-transparent rounded-xl relative flex items-end px-4 gap-2">
<div class="flex-1 bg-primary/20 rounded-t h-[40%]"></div>
<div class="flex-1 bg-primary/30 rounded-t h-[60%]"></div>
<div class="flex-1 bg-primary/25 rounded-t h-[45%]"></div>
<div class="flex-1 bg-primary/40 rounded-t h-[75%]"></div>
<div class="flex-1 bg-primary/35 rounded-t h-[65%]"></div>
<div class="flex-1 bg-primary/50 rounded-t h-[85%]"></div>
<div class="flex-1 bg-primary/60 rounded-t h-[95%]"></div>
<div class="flex-1 bg-primary/55 rounded-t h-[80%]"></div>
<div class="flex-1 bg-primary/45 rounded-t h-[70%]"></div>
<div class="flex-1 bg-primary/50 rounded-t h-[75%]"></div>
</div>
</div>
<div class="bg-primary p-lg rounded-[20px] text-on-primary flex flex-col justify-between shadow-lg">
<div>
<span class="material-symbols-outlined text-[32px] mb-4">analytics</span>
<h4 class="font-headline-md mb-2">Market Efficiency</h4>
<p class="text-body-md opacity-80">Your inventory turnover is 22% faster than the regional average.</p>
</div>
<a class="flex items-center gap-2 font-label-lg hover:gap-4 transition-all" href="#">
                            View Report <span class="material-symbols-outlined">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto">
<div class="space-y-4">
<h3 class="font-headline-md text-primary font-bold">AgriMandi India</h3>
<p class="text-body-md text-on-surface-variant">Cultivating Digital Growth across the agricultural supply chain.</p>
</div>
<div class="space-y-4">
<h4 class="font-label-lg text-on-surface">Marketplace</h4>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Sell Commodities</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Buyer Directory</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Trade Financing</a></li>
</ul>
</div>
<div class="space-y-4">
<h4 class="font-label-lg text-on-surface">Support</h4>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Trade Support</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Quality Standards</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Us</a></li>
</ul>
</div>
<div class="space-y-4">
<h4 class="font-label-lg text-on-surface">Legal</h4>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a></li>
</ul>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 text-center text-label-sm text-on-surface-variant/60">
                    © 2024 AgriMandi India. Cultivating Digital Growth.
                </div>
</footer>
</main>
</div>
<!-- Mobile Bottom Navigation (only on small screens) -->
<div class="md:hidden fixed bottom-0 left-0 right-0 bg-surface/90 backdrop-blur-xl border-t border-outline-variant/20 flex justify-around items-center py-3 z-50">
<a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('farmer.dashboard') }}">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-[10px] font-bold">Home</span>
</a>
<a class="flex flex-col items-center gap-1 text-primary" href="{{ route('farmer.products') }}">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
<span class="text-[10px] font-bold">Products</span>
</a>
<a href="{{ route('farmer.products.add') }}" class="w-12 h-12 bg-primary text-on-primary rounded-full flex items-center justify-center -mt-8 shadow-lg">
<span class="material-symbols-outlined">add</span>
</a>
<a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('farmer.bids') }}">
<span class="material-symbols-outlined">gavel</span>
<span class="text-[10px] font-bold">Bids</span>
</a>
<a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('profile') }}">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-bold">Profile</span>
</a>
</div>

@endsection
