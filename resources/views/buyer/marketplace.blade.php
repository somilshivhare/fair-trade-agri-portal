@extends('layouts.stitch')
@section('title', 'Marketplace - AgriMandi')
@section('content')

<!-- Market Ticker Specialty Component -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 overflow-hidden py-2">
<div class="flex whitespace-nowrap market-ticker-scroll">
<div class="flex gap-lg px-md items-center">
    @foreach($marketPrices->take(10) as $price)
    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">{{ is_array($price) ? $price['commodity'] : $price->commodity }}</span>
    <span class="font-label-sm text-label-sm text-primary font-bold">₹{{ number_format(is_array($price) ? $price['modal_price'] : $price->modal_price) }}/q 
        <span class="text-xs">{{ (is_array($price) ? ($price['trend'] ?? '') : ($price->trend ?? '')) === 'up' ? '▲' : '▼' }}</span>
    </span>
    @endforeach
</div>
<!-- Duplicate for infinite effect -->
<div class="flex gap-lg px-md items-center">
    @foreach($marketPrices->take(10) as $price)
    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">{{ is_array($price) ? $price['commodity'] : $price->commodity }}</span>
    <span class="font-label-sm text-label-sm text-primary font-bold">₹{{ number_format(is_array($price) ? $price['modal_price'] : $price->modal_price) }}/q 
        <span class="text-xs">{{ (is_array($price) ? ($price['trend'] ?? '') : ($price->trend ?? '')) === 'up' ? '▲' : '▼' }}</span>
    </span>
    @endforeach
</div>
</div>
</div>
<!-- TopNavBar -->
<nav class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-xl">
<span class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</span>
<div class="hidden md:flex items-center gap-lg">
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="{{ route('marketplace') }}">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Analytics</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-md">
<div class="relative hidden lg:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="bg-surface-container-low border-none rounded-xl pl-10 pr-4 py-2 w-64 focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Search commodities..." type="text"/>
</div>
<button class="flex items-center gap-xs px-4 py-2 rounded-lg text-on-surface-variant hover:bg-primary-container/10 transition-colors">
<span class="material-symbols-outlined">language</span>
<span class="font-label-md text-label-md">Hindi</span>
</button>
<a href="{{ route('notifications') }}" class="material-symbols-outlined text-on-surface-variant p-2 hover:bg-primary-container/10 rounded-full cursor-pointer">notifications</a>
@auth
<a href="{{ auth()->user()->role === 'farmer' ? route('farmer.dashboard') : route('marketplace') }}" class="bg-primary text-on-primary font-label-md text-label-md px-6 py-2.5 rounded-xl hover:opacity-90 active:scale-95 transition-all">Dashboard</a>
@else
<a href="{{ route('register') }}" class="bg-primary text-on-primary font-label-md text-label-md px-6 py-2.5 rounded-xl hover:opacity-90 active:scale-95 transition-all">Start Selling</a>
@endauth
<a href="{{ route('profile') }}" class="w-10 h-10 rounded-full overflow-hidden border-2 border-primary/20">
<img alt="Farmer profile avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOBY44IRNaNilvrhFXsdgT-3pjg2tZc_wu9ykxnNI3m1nTTYNeKzSYB0eGgKFT7CnIQH0-lZVNWeQ627SAqeFiZBfx9rXE6Yt-xPNyGjy7_iOneg5SHOpcQLMR9O85DqVA4xa-flvOtlK_QLpPZN9MrSDl8NQ-TuFIzI7xttD8Bdhx1oYUwUrHnECgbkEnffivz-2TvOGkKIiuBNCKhbWZcrdsdkAYj6ZyoeoZVAbf0o_e3t_SHxwUtrx1DDcuXlPDEjOi8hRdV75N"/>
</a>
</div>
</div>
</nav>
<main class="max-w-[1440px] mx-auto flex gap-gutter px-margin-desktop py-xl">
<!-- Filter Sidebar -->
<aside class="hidden lg:flex flex-col w-72 gap-xl">
<div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
<div class="flex items-center justify-between mb-md">
<h3 class="font-headline-md text-[18px] text-on-surface font-bold">Filters</h3>
<span class="text-primary font-label-sm text-label-sm cursor-pointer hover:underline">Clear all</span>
</div>
<div class="space-y-lg">
<!-- Category -->
<div class="space-y-md">
<p class="font-label-lg text-label-lg text-on-surface">Commodity Category</p>
<div class="space-y-sm">
<label class="flex items-center gap-sm cursor-pointer group">
<input checked="" class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface">Grains &amp; Cereals</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface">Pulses &amp; Oilseeds</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface">Fruits &amp; Vegetables</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface">Cotton &amp; Fibers</span>
</label>
</div>
</div>
<!-- Price Range -->
<div class="space-y-md">
<p class="font-label-lg text-label-lg text-on-surface">Price per Quintal</p>
<div class="px-2">
<div class="h-1.5 w-full bg-surface-container-high rounded-full relative">
<div class="absolute left-1/4 right-1/4 h-full bg-primary rounded-full"></div>
<div class="absolute left-1/4 top-1/2 -translate-y-1/2 w-4 h-4 bg-white border-2 border-primary rounded-full cursor-pointer shadow-md"></div>
<div class="absolute right-1/4 top-1/2 -translate-y-1/2 w-4 h-4 bg-white border-2 border-primary rounded-full cursor-pointer shadow-md"></div>
</div>
<div class="flex justify-between mt-md">
<span class="font-label-sm text-label-sm text-on-surface-variant">₹1,500</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">₹10,000+</span>
</div>
</div>
</div>
<!-- Quality Grade -->
<div class="space-y-md">
<p class="font-label-lg text-label-lg text-on-surface">Quality Grade</p>
<div class="flex flex-wrap gap-sm">
<span class="px-3 py-1.5 rounded-full bg-primary text-on-primary font-label-sm text-label-sm cursor-pointer">Grade A+</span>
<span class="px-3 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm cursor-pointer hover:bg-primary/10 transition-colors">Grade A</span>
<span class="px-3 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm cursor-pointer hover:bg-primary/10 transition-colors">Grade B</span>
</div>
</div>
<!-- Location -->
<div class="space-y-md">
<p class="font-label-lg text-label-lg text-on-surface">Stock Location</p>
<select class="w-full bg-surface-container-low border-none rounded-xl px-4 py-2 font-body-md text-body-md focus:ring-2 focus:ring-primary/20">
<option>All India</option>
<option>Punjab</option>
<option>Haryana</option>
<option>Maharashtra</option>
</select>
</div>
</div>
</div>
<!-- Promotion Card -->
<div class="relative h-64 rounded-xl overflow-hidden emerald-glow group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A wide-angle landscape of a high-tech modern wheat farm at sunrise. Pristine rows of golden wheat are visible under a clear, bright sky. A sleek, semi-transparent digital interface overlay displays hovering data points about soil health and moisture. The scene is bathed in warm, soft golden light, creating a clean, premium, and optimistic feeling of agricultural growth." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDkcIhcGlXJG0JCzZ8hghzIHerziaZ8Ry9MHICOs7uSHhfEHK_LS3p_JP7nQUnU8IqAvs7qKJwAQuxusKC_FsCsgHccCj_eMwA3IoQJE7hztqiYoRsiIOAtnAfnxPZzP0ad2SVZ7AVfLr0X0io1gW5Cl33dDrr33z-JlRvrPFkNBjspWy9EgdXMMAumttgnnO3l2BZqwDwJcxg7fB4zv9brP-fintqHmBmkP48v9QKAFhL1Ta1jmTF5W30swudlVQxqNvkmk6GO_fgx"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-lg">
<h4 class="font-headline-md text-white mb-xs">Market Insights</h4>
<p class="font-body-md text-white/90 text-[14px] leading-snug">Get real-time price predictions powered by AI.</p>
<button class="mt-md bg-white text-primary font-label-md text-label-md px-4 py-2 rounded-lg w-fit hover:bg-secondary-fixed transition-colors">Learn More</button>
</div>
</div>
</aside>
<!-- Product Grid Section -->
<section class="flex-1 flex flex-col gap-lg">

    <!-- Search and Sort Top Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-lg">
        <div>
            <h1 class="font-headline-lg text-headline-lg text-on-surface">Active Marketplace</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Showing {{ $products->total() }} available commodity listings</p>
        </div>
        <form action="{{ route('marketplace') }}" method="GET" class="flex items-center gap-sm">
            @foreach(request()->except(['search', 'sort', 'page']) as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                <input name="search" value="{{ request('search') }}" class="bg-surface-container-low border border-outline-variant/20 rounded-xl pl-10 pr-4 py-2 w-64 focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Search commodities..." type="text"/>
            </div>
            <select name="sort" onchange="this.form.submit()" class="bg-surface-container-lowest px-4 py-2 rounded-xl emerald-glow border border-outline-variant/10 font-label-md text-label-md appearance-none cursor-pointer">
                <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Recent</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
            </select>
        </form>
    </div>

    <!-- Marketplace Main Content -->
    <div class="flex gap-gutter">
        <!-- Filter Sidebar (Real Data) -->
        <aside class="hidden lg:flex flex-col w-72 gap-xl flex-shrink-0">
            <form action="{{ route('marketplace') }}" method="GET" id="filterForm" class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif
                
                <div class="flex items-center justify-between mb-md">
                    <h3 class="font-headline-md text-[18px] text-on-surface font-bold">Filters</h3>
                    <a href="{{ route('marketplace') }}" class="text-primary font-label-sm text-label-sm hover:underline">Clear all</a>
                </div>
                <div class="space-y-lg">
                    <!-- Category Filter -->
                    <div class="space-y-md">
                        <p class="font-label-lg text-label-lg text-on-surface">Category</p>
                        <div class="space-y-sm max-h-48 overflow-y-auto pr-2 custom-scrollbar">
                            @foreach($categories as $category)
                            @php $slug = is_array($category) ? ($category['commodity'] ?? $category) : $category; @endphp
                            <label class="flex items-center gap-sm cursor-pointer group">
                                <input type="radio" name="category" value="{{ $slug }}" class="w-5 h-5 rounded-full border-outline-variant text-primary focus:ring-primary/20" 
                                    {{ request('category') == $slug ? 'checked' : '' }} onchange="this.form.submit()">
                                <span class="font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface">{{ $slug }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="space-y-md">
                        <p class="font-label-lg text-label-lg text-on-surface">Min Price (₹)</p>
                        <input type="number" name="min_price" value="{{ request('min_price') }}" class="w-full bg-surface-container-low border border-outline-variant/20 rounded-xl px-4 py-2" placeholder="0" onchange="this.form.submit()">
                        <p class="font-label-lg text-label-lg text-on-surface mt-2">Max Price (₹)</p>
                        <input type="number" name="max_price" value="{{ request('max_price') }}" class="w-full bg-surface-container-low border border-outline-variant/20 rounded-xl px-4 py-2" placeholder="50000" onchange="this.form.submit()">
                    </div>

                    <!-- Location Filter (State) -->
                    <div class="space-y-md">
                        <p class="font-label-lg text-label-lg text-on-surface">State</p>
                        <select name="state" onchange="this.form.submit()" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-2 font-body-md text-body-md focus:ring-2 focus:ring-primary/20 cursor-pointer">
                            <option value="">All India</option>
                            @foreach($states as $state)
                                @php $val = is_array($state) ? ($state['state'] ?? $state) : $state; @endphp
                                <option value="{{ $val }}" {{ request('state') == $val ? 'selected' : '' }}>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            
            <!-- Insight Tile (Dynamic) -->
            @php $topPrice = $marketPrices->sortByDesc('modal_price')->first(); @endphp
            @if($topPrice)
            <div class="relative h-64 rounded-xl overflow-hidden emerald-glow group">
                <div class="absolute inset-0 bg-primary/90 flex flex-col justify-end p-lg text-white">
                    <span class="material-symbols-outlined text-4xl mb-4">trending_up</span>
                    <h4 class="font-headline-md mb-xs">Top Performer</h4>
                    <p class="font-body-md text-[14px] leading-snug">
                        {{ is_array($topPrice) ? $topPrice['commodity'] : $topPrice->commodity }} is trading high today at 
                        ₹{{ number_format(is_array($topPrice) ? $topPrice['modal_price'] : $topPrice->modal_price) }}/q.
                    </p>
                    <button class="mt-md bg-white text-primary font-label-md text-label-md px-4 py-2 rounded-lg w-fit hover:brightness-110 transition-all">Analyze Trends</button>
                </div>
            </div>
            @endif
        </aside>

        <!-- Product Grid (Real Data) -->
        <div class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-gutter">
                @forelse($products as $product)
                <div class="bg-surface-container-lowest rounded-xl overflow-hidden emerald-glow border border-outline-variant/10 flex flex-col group hover:border-primary/30 transition-all duration-300">
                    <div class="relative h-48 bg-surface-container-low flex items-center justify-center">
                        @if(!empty($product->images) && count($product->images) > 0)
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}"/>
                        @else
                            <span class="material-symbols-outlined text-outline/30 text-6xl">agriculture</span>
                        @endif
                        <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm text-primary font-bold shadow-sm">
                            {{ $product->quality ?? 'Fair' }}
                        </span>
                        <div class="absolute top-3 right-3 flex flex-col gap-2">
                            <span class="bg-primary/10 text-primary px-2 py-1 rounded text-[10px] font-bold backdrop-blur-md">
                                {{ strtoupper($product->category) }}
                            </span>
                        </div>
                    </div>
                    <div class="p-lg flex-1 flex flex-col gap-md">
                        <div>
                            <h3 class="font-headline-md text-[18px] text-on-surface group-hover:text-primary transition-colors line-clamp-1">{{ $product->name }}</h3>
                            <p class="font-body-md text-[14px] text-on-surface-variant flex items-center gap-xs">
                                <span class="material-symbols-outlined text-[16px]">location_on</span> 
                                {{ $product->location['district'] ?? 'Unknown' }}, {{ $product->location['state'] ?? 'India' }}
                            </p>
                        </div>
                        
                        <div class="bg-surface-container-low p-md rounded-xl">
                            <div class="flex justify-between items-center mb-xs">
                                <span class="font-label-sm text-label-sm text-on-surface-variant">Listing Price</span>
                                <span class="font-label-sm text-label-sm text-secondary font-bold">{{ $product->quantity }} {{ $product->unit }} available</span>
                            </div>
                            <div class="flex items-baseline gap-xs">
                                <span class="font-headline-md text-primary font-bold">₹{{ number_format($product->price) }}</span>
                                <span class="font-body-md text-[12px] text-on-surface-variant">/ {{ $product->unit }}</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
                            <span>Listed {{ $product->created_at->diffForHumans() }}</span>
                        </div>

                        <a href="{{ route('product.details', $product->id) }}" class="w-full bg-primary text-on-primary font-label-md text-label-md py-3 rounded-xl hover:opacity-95 active:scale-[0.98] transition-all flex items-center justify-center gap-sm">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                            View Details
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-outline/30 text-7xl mb-4">search_off</span>
                    <h3 class="font-headline-md text-on-surface mb-2">No Products Found</h3>
                    <p class="font-body-md text-on-surface-variant max-w-sm">We couldn't find any listings matching your current filters. Try broadening your search.</p>
                    <a href="{{ route('marketplace') }}" class="mt-6 text-primary font-bold hover:underline">Clear all filters</a>
                </div>
                @endforelse
            </div>

            <!-- Pagination (Dynamic) -->
            @if($products->hasPages())
            <div class="flex justify-center mt-xl">
                {{ $products->links() }}
            </div>
            @endif
        </div>
    </div>
</section>
</main>

</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-[1440px] mx-auto">
<div class="flex flex-col gap-md">
<span class="font-headline-md text-primary font-bold">AgriMandi India</span>
<p class="font-body-md text-on-surface-variant">The leading digital platform for high-precision agricultural commodity trading in India. Empowering farmers and traders with transparent data and seamless marketplace access.</p>
</div>
<div class="flex flex-col gap-md">
<h5 class="font-label-lg text-label-lg text-on-surface">Marketplace</h5>
<ul class="flex flex-col gap-sm">
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Browse Commodities</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Daily Mandi Rates</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Export Quality Grains</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Bulk Logistics</a></li>
</ul>
</div>
<div class="flex flex-col gap-md">
<h5 class="font-label-lg text-label-lg text-on-surface">Information</h5>
<ul class="flex flex-col gap-sm">
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Terms of Service</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Trade Support</a></li>
<li><a class="font-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Contact Us</a></li>
</ul>
</div>
<div class="flex flex-col gap-md">
<h5 class="font-label-lg text-label-lg text-on-surface">Newsletter</h5>
<p class="font-body-md text-on-surface-variant">Stay updated with weekly market insights and price trends.</p>
<div class="flex gap-xs mt-xs">
<input class="bg-surface-container-low border-none rounded-xl px-4 py-2 flex-1 focus:ring-2 focus:ring-primary/20" placeholder="Email address" type="email"/>
<button class="bg-primary text-on-primary p-2 rounded-xl">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="px-margin-desktop py-md border-t border-outline-variant/10 text-center font-body-md text-[14px] text-on-surface-variant">
            © 2024 AgriMandi India. Cultivating Digital Growth.
        </div>
</footer>

@endsection
