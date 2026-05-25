@extends('layouts.app')

@section('title', 'Direct Farmer to Buyer Bidding')

@section('content')
<!-- Hero Section with Custom Generated Rolling Fields Background -->
<div class="relative overflow-hidden bg-cover bg-center py-32 sm:py-40 select-none" style="background-image: url('/images/hero_bg.png');">
    <!-- Video background -->
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="https://res.cloudinary.com/degeiufh0/video/upload/v1779690219/bg-2_q2nzu4.mp4" type="video/mp4">
    </video>

    <!-- Dark overlay for readability -->
    <div class="absolute inset-0 bg-black/45 z-10"></div>
    
    <!-- Smooth Bottom Fog Mask (Fades to Slate 50) -->
    <div class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-slate-50 via-slate-50/50 to-transparent z-20"></div>
    
    <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-flex items-center gap-x-2 rounded-full bg-white/20 backdrop-blur-md px-4 py-1.5 text-xs font-semibold text-white ring-1 ring-inset ring-white/10 shadow-sm">
            🌾 Empowering Indian Agriculture
        </span>
        
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl max-w-3xl mx-auto leading-[1.1] drop-shadow-sm">
            The Modern Standard for <span class="text-[#3bf7b7]">Agricultural Trade</span>
        </h1>
        
        <p class="mt-4 text-base sm:text-lg leading-relaxed text-slate-100 max-w-2xl mx-auto font-light drop-shadow-sm">
            Trade grains, fruits, and vegetables with 100% security and transparent direct communication. 'Digital Fertile Ground' for the next generation of farmers.
        </p>
        
        <div class="mt-8 flex items-center justify-center gap-x-4">
            <a href="{{ route('register') }}" class="rounded-2xl bg-[#3bf7b7] hover:bg-[#2ed69b] px-8 py-4 text-base font-extrabold text-slate-900 shadow-md shadow-emerald-500/15 transition-all duration-300 hover:scale-105 active:scale-98">
                Start Trading Now
            </a>
            <a href="#marketplace" class="rounded-2xl border border-white/25 bg-black/10 text-white font-extrabold px-8 py-4 text-base backdrop-blur-sm hover:bg-white/10 transition-all duration-300 hover:scale-105 active:scale-98">
                Explore Market
            </a>
        </div>
    </div>
</div>

<!-- Platform Features Section (Vibrant, Color-differentiated blocks) -->
<div class="bg-white py-16 sm:py-24 relative z-20 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-flex items-center gap-x-2 rounded-full bg-emerald-50 px-3.5 py-1 text-xs font-extrabold text-[#047857] ring-1 ring-inset ring-emerald-600/10">
                ⚡ PLATFORM CAPABILITIES
            </span>
            <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl tracking-tight">Designed for Secure & Transparent Trade</h2>
            <p class="text-slate-500 font-light text-base sm:text-lg">Our portal is custom-built to connect farmers and buyers directly, eliminating middlemen and securing every transaction.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1: Real-Time Bidding (Emerald Theme) -->
            <div class="group relative bg-emerald-50/45 border border-emerald-100/70 rounded-[32px] p-8 hover:bg-white hover:shadow-2xl hover:border-emerald-500/30 transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition-all"></div>
                <div class="space-y-6">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#047857] flex items-center justify-center shadow-sm">
                        <!-- Hammer/Gavel Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-[#047857] transition-colors">Real-Time Bidding</h3>
                        <p class="text-sm leading-relaxed text-slate-550 font-medium font-sans">Buyers can place instant bids on active crop lots. Built-in threshold validations keep bidding competitive and fair.</p>
                    </div>
                </div>
                <div class="pt-6 flex items-center gap-1.5 text-xs font-bold text-[#047857] select-none">
                    <span>Active bidding center</span>
                    <span class="inline-flex h-2 w-2 rounded-full bg-emerald-500 animate-ping"></span>
                </div>
            </div>

            <!-- Feature 2: Counter-Offers (Blue Theme) -->
            <div class="group relative bg-blue-50/45 border border-blue-100/70 rounded-[32px] p-8 hover:bg-white hover:shadow-2xl hover:border-blue-500/30 transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl group-hover:bg-blue-500/10 transition-all"></div>
                <div class="space-y-6">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center shadow-sm">
                        <!-- Swap/Arrows Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors">Flexible Counter-Offers</h3>
                        <p class="text-sm leading-relaxed text-slate-550 font-medium font-sans">Farmers can propose counter-prices on incoming bids. Buyers can accept or reject counters directly from their dashboard.</p>
                    </div>
                </div>
                <div class="pt-6 flex items-center gap-1.5 text-xs font-bold text-blue-600 select-none">
                    <span>Negotiation system</span>
                    <span class="inline-flex h-2 w-2 rounded-full bg-blue-500"></span>
                </div>
            </div>

            <!-- Feature 3: Secure Deals (Amber Theme) -->
            <div class="group relative bg-amber-50/45 border border-amber-100/70 rounded-[32px] p-8 hover:bg-white hover:shadow-2xl hover:border-amber-500/30 transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-2xl group-hover:bg-amber-500/10 transition-all"></div>
                <div class="space-y-6">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center shadow-sm">
                        <!-- Shield Check Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-amber-600 transition-colors">Verified Cargo Deals</h3>
                        <p class="text-sm leading-relaxed text-slate-555 font-medium font-sans">Accepted bids automatically create active deals. Transactions secure only when delivery and pickup points are confirmed.</p>
                    </div>
                </div>
                <div class="pt-6 flex items-center gap-1.5 text-xs font-bold text-amber-600 select-none">
                    <span>MongoDB protected</span>
                    <span class="inline-flex h-2 w-2 rounded-full bg-amber-500"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Marketplace Area wrapped in a solid slate-100 backdrop for boundary differentiation -->
<div class="bg-slate-100 border-t border-slate-200 relative z-20">
    <div id="marketplace" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 space-y-12">
        
        <!-- Title & Search Row -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 border-b border-slate-200 pb-8">
            <div class="space-y-3">
                <div class="flex flex-wrap gap-2 items-center">
                    <span class="inline-flex items-center gap-x-1.5 rounded-full bg-rose-50 px-3 py-1 text-xs font-bold text-rose-600 ring-1 ring-inset ring-rose-500/10 shadow-sm">
                        <span class="h-1.5 w-1.5 rounded-full bg-rose-600 animate-pulse"></span>
                        LIVE MARKETPLACE
                    </span>
                    <span class="inline-flex items-center gap-x-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-[#047857] ring-1 ring-inset ring-emerald-600/10 shadow-sm">
                        🛡️ Verified Trade
                    </span>
                    <span class="inline-flex items-center gap-x-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700 ring-1 ring-inset ring-blue-500/10 shadow-sm">
                        ⚡ {{ $products->count() }} Lots Listed
                    </span>
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Available Crop Lots</h2>
                <p class="text-slate-500 max-w-xl font-light text-sm sm:text-base">Browse premium quality agricultural products listed directly by our network of verified farmers across all states.</p>
            </div>

            <!-- Search / Filter Form -->
            <form action="{{ route('home') }}" method="GET" class="flex items-center gap-3 w-full lg:w-auto">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative flex-grow lg:w-80">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search crops..." class="w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 focus:border-emerald-600 focus:bg-white rounded-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 text-sm shadow-sm transition-all placeholder:text-slate-400">
                </div>
                <button type="submit" class="bg-[#0b192e] hover:bg-[#12243d] text-white font-bold py-3.5 px-6 rounded-2xl text-sm transition-all active:scale-95 shadow-md flex items-center gap-1.5">
                    Filter
                </button>
                @if(request('search') || request('category'))
                    <a href="{{ route('home') }}" class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-bold py-3.5 px-5 rounded-2xl text-sm transition-all active:scale-95 shadow-sm flex items-center justify-center" title="Reset Filters">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Category Filter Tabs Grid -->
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('home', ['search' => request('search')]) }}" class="px-5 py-2.5 rounded-2xl text-sm font-bold border transition-all duration-300 {{ !request('category') ? 'bg-[#047857] border-[#047857] text-white shadow-md shadow-emerald-700/10' : 'bg-white text-slate-605 border-slate-200 hover:bg-slate-50 hover:text-slate-900' }}">
                🌾 All Crops
            </a>
            @foreach($categories as $cat => $cropsList)
                @php
                    $emoji = match($cat) {
                        'Grains' => '🌾',
                        'Vegetables' => '🥦',
                        'Fruits' => '🍎',
                        'Pulses' => '🧆',
                        default => '🌱'
                    };
                @endphp
                <a href="{{ route('home', ['category' => $cat, 'search' => request('search')]) }}" class="px-5 py-2.5 rounded-2xl text-sm font-bold border transition-all duration-300 flex items-center gap-2 {{ request('category') === $cat ? 'bg-[#047857] border-[#047857] text-white shadow-md shadow-emerald-700/10' : 'bg-white text-slate-655 border-slate-200 hover:bg-slate-50 hover:text-slate-900' }}">
                    <span>{{ $emoji }}</span>
                    <span>{{ $cat }}</span>
                </a>
            @endforeach
        </div>

        <!-- Listings Cards Grid -->
        @if($products->isEmpty())
            <div class="text-center py-20 bg-white rounded-[32px] border border-slate-200/60 shadow-xl max-w-xl mx-auto px-6">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4a2 2 0 012-2m16 0h-2M4 13H6m0 0v2m0-2h2m4-3h4m-4 4h4m-11 5H3m14 0h-2m-3-11v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707.707"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800">No Listings Found</h3>
                <p class="text-slate-500 mt-2 text-sm max-w-xs mx-auto">We couldn't find any active listings matching your filters. Stay tuned or check back later!</p>
                @if(request('category') || request('search'))
                    <a href="{{ route('home') }}" class="inline-block mt-6 text-sm font-bold text-[#047857] hover:underline">Clear all filters</a>
                @endif
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    @php
                        $categoryName = '';
                        foreach($categories as $cat => $list) {
                            if (in_array($product->crop_name, $list)) {
                                $categoryName = $cat;
                                break;
                            }
                        }
                    @endphp
                    <!-- White Cards with stronger shadow-md for premium contrast on slate-100 background -->
                    <div class="group bg-white rounded-[32px] overflow-hidden border border-slate-200/50 shadow-md shadow-slate-250/50 hover:shadow-xl hover:shadow-slate-300/70 hover:border-emerald-500/20 transition-all duration-300 flex flex-col justify-between hover:scale-[1.02]">
                        
                        <!-- Crop Image & Badge Overlay -->
                        <div class="relative h-52 overflow-hidden bg-slate-50">
                            <img src="{{ $product->image_url }}" alt="{{ $product->crop_name }}" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500">
                            
                            <span class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-xl text-[10px] font-extrabold text-slate-700 border border-slate-150 uppercase tracking-widest shadow-sm">
                                {{ $categoryName ?: 'Crop' }}
                            </span>
                            
                            <div class="absolute bottom-4 right-4 bg-[#047857] px-4 py-1.5 rounded-2xl text-white font-extrabold text-xs shadow-md">
                                ₹{{ number_format($product->base_price) }} <span class="text-[9px] font-normal text-emerald-250">/ Qntl</span>
                            </div>
                        </div>

                        <!-- Card Body Portfolio -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-bold text-slate-800 tracking-tight group-hover:text-[#047857] transition-colors leading-tight">{{ $product->crop_name }}</h3>
                                    <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0" title="Verified Listing">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                </div>
                                
                                <!-- Location -->
                                <div class="flex items-center text-slate-500 text-xs font-semibold">
                                    <svg class="w-4 h-4 text-slate-400 mr-1.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $product->location }}</span>
                                </div>

                                <!-- Farmer & Qntl Badges row -->
                                <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-100">
                                    <!-- Farmer Badge -->
                                    <div class="flex items-center gap-2 bg-slate-50/80 border border-slate-150/70 px-3 py-1.5 rounded-xl text-[11px] font-bold text-slate-700 max-w-[150px]">
                                        <div class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[9px] font-extrabold uppercase flex-shrink-0">
                                            {{ strtoupper(substr($product->farmer->name ?? 'F', 0, 2)) }}
                                        </div>
                                        <span class="truncate">{{ $product->farmer->name ?? 'Farmer' }}</span>
                                    </div>
                                    <!-- Quantity Badge -->
                                    <div class="flex items-center bg-slate-50/80 border border-slate-150/70 px-3 py-1.5 rounded-xl text-[11px] font-bold text-slate-700">
                                        <span>{{ $product->quantity }} Qntl</span>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Details Redirect -->
                            <a href="{{ route('products.show', $product->_id) }}" class="w-full mt-6 inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-[#047857] py-3.5 px-4 text-sm font-bold shadow-sm transition-all duration-300 active:scale-[0.98]">
                                View Details
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
