@extends('layouts.stitch')
@section('title', 'Product Details - AgriMandi')
@section('content')

    <!-- TopNavBar from JSON -->
    <nav
        class="flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50 bg-surface/90 backdrop-blur-2xl border-b border-outline-variant/10 shadow-none">
        <div class="flex items-center gap-xl">
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all duration-300 group">
                    <div
                        class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    </div>
                    <span class="font-label-md text-[13px] font-bold">Home</span>
                </a>
                <div class="h-6 w-px bg-outline-variant/20"></div>
            </div>
            <span class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</span>
            <div class="hidden md:flex gap-lg">
                <a class="font-label-md text-label-md {{ request()->routeIs('marketplace') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('marketplace') }}">{{ __('messages.marketplace') }}</a>
                <a class="font-label-md text-label-md {{ request()->routeIs('categories') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('categories') }}">{{ __('messages.categories') }}</a>
                <a class="font-label-md text-label-md {{ request()->is('government*') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-on-surface' }} transition-colors"
                    href="{{ route('gov.index') }}">{{ __('messages.gov_portal') }}</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors"
                    href="{{ route('analytics') }}">{{ __('messages.analytics') }}</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors"
                    href="{{ route('resources') }}">{{ __('messages.resources') }}</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <!-- Language Selector -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl text-on-surface-variant hover:bg-primary/5 transition-all active:scale-95 border border-outline-variant/10 bg-surface-container-lowest">
                    <span class="material-symbols-outlined text-[20px]">language</span>
                    <span class="font-label-md text-label-md uppercase">{{ app()->getLocale() }}</span>
                    <span class="material-symbols-outlined text-[18px] transition-transform"
                        :class="open ? 'rotate-180' : ''">expand_more</span>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    class="absolute right-0 mt-2 w-52 bg-white border border-outline-variant/20 rounded-2xl shadow-2xl z-[100] overflow-hidden p-2">
                    @php
                        $langs = [
                            'en' => ['name' => 'English', 'flag' => '🇺🇸'],
                            'hi' => ['name' => 'हिंदी', 'flag' => '🇮🇳'],
                            'mr' => ['name' => 'मराठी', 'flag' => '🇮🇳'],
                            'gu' => ['name' => 'ગુજરાતી', 'flag' => '🇮🇳'],
                            'pa' => ['name' => 'ਪੰਜਾਬੀ', 'flag' => '🇮🇳']
                        ];
                    @endphp
                    @foreach($langs as $code => $data)
                        <a href="{{ route('set-locale', $code) }}"
                            class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-on-surface hover:bg-primary/5 hover:text-primary transition-all {{ app()->getLocale() == $code ? 'bg-primary/5 text-primary font-bold' : '' }}">
                            <span class="text-lg">{{ $data['flag'] }}</span>
                            <span>{{ $data['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            @auth
                <!-- Notification & Profile -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('notifications') }}"
                        class="relative w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container-low text-on-surface-variant hover:bg-primary/10 hover:text-primary transition-all">
                        <span class="material-symbols-outlined">notifications</span>
                        @if(Auth::user()->unreadNotifications->count() > 0)
                            <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full animate-pulse"></span>
                        @endif
                    </a>

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center gap-2 bg-white border border-outline-variant/10 py-1 pl-1 pr-3 rounded-full hover:shadow-lg transition-all active:scale-95">
                            <img alt="Profile" class="w-8 h-8 rounded-full object-cover"
                                src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=10B981&color=fff' }}" />
                            <span class="font-label-md text-on-surface hidden lg:block">{{ auth()->user()->name }}</span>
                            <span class="material-symbols-outlined text-[18px] text-outline transition-transform"
                                :class="open ? 'rotate-180' : ''">expand_more</span>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            class="absolute right-0 mt-2 w-64 bg-white border border-outline-variant/20 rounded-2xl shadow-2xl z-[100] overflow-hidden p-2">

                            <div class="px-4 py-3 border-b border-outline-variant/10 mb-1">
                                <p class="text-label-sm text-outline uppercase tracking-wider">Account</p>
                                <p class="font-bold text-on-surface truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <a href="{{ route(auth()->user()->role . '.dashboard') }}"
                                class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-on-surface hover:bg-primary/5 hover:text-primary transition-all">
                                <span class="material-symbols-outlined text-[20px]">dashboard</span>
                                {{ __('messages.dashboard') }}
                            </a>
                            <a href="{{ route('profile') }}"
                                class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-on-surface hover:bg-primary/5 hover:text-primary transition-all">
                                <span class="material-symbols-outlined text-[20px]">person</span> {{ __('messages.profile') }}
                            </a>
                            <div class="h-px bg-outline-variant/10 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-error hover:bg-error/5 transition-all text-left">
                                    <span class="material-symbols-outlined text-[20px]">logout</span>
                                    {{ __('messages.logout') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}"
                        class="text-on-surface px-6 py-2.5 rounded-xl font-label-md hover:bg-surface-container-high transition-all">{{ __('messages.login') }}</a>
                    <a href="{{ route('register') }}"
                        class="bg-primary text-on-primary px-8 py-3 rounded-xl font-label-md hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary/20">{{ __('messages.register') }}</a>
                </div>
            @endauth
        </div>
    </nav>
    <main class="max-w-[1280px] mx-auto px-margin-desktop py-xl">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 mb-lg">
            <a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary"
                href="{{ route('marketplace') }}">Marketplace</a>
            <span class="material-symbols-outlined text-sm text-outline-variant">chevron_right</span>
            <a class="text-label-sm font-label-sm text-on-surface-variant hover:text-primary"
                href="{{ route('marketplace', ['category' => 'grains']) }}">Grains</a>
            <span class="material-symbols-outlined text-sm text-outline-variant">chevron_right</span>
            <span class="text-label-sm font-label-sm text-on-surface">{{ $product->name }}</span>
        </div>
        <!-- Product Layout Grid -->
        <div class="grid grid-cols-12 gap-gutter">
            <!-- Left Column: Media & Details -->
            <div class="col-span-12 lg:col-span-8 space-y-lg">
                <!-- Gallery Section -->
                <div class="bg-surface-container-lowest rounded-2xl p-4 emerald-glow">
                    @php
                        $commodityMap = [
                            'wheat' => 'wheat.png',
                            'rice' => 'rice.png',
                            'cotton' => 'cotton.png',
                            'groundnut' => 'groundnut.png',
                            'soybean' => 'soybean.png',
                            'chilli' => 'chilli.png',
                            'tomato' => 'tomato.png',
                            'turmeric' => 'turmeric.png',
                            'onion' => 'onion.png',
                            'potato' => 'potato.png',
                        ];
                        $matchedImage = null;
                        foreach ($commodityMap as $key => $img) {
                            if (str_contains(strtolower($product->name), $key) || str_contains(strtolower($product->category), $key)) {
                                $matchedImage = asset('images/commodities/' . $img);
                                break;
                            }
                        }
                    @endphp
                    <div
                        class="aspect-[16/9] w-full rounded-xl overflow-hidden mb-md bg-surface-container-low flex items-center justify-center">
                        @if(!empty($product->images) && count($product->images) > 0)
                            <img class="w-full h-full object-cover" src="{{ Storage::url($product->images[0]) }}"
                                alt="{{ $product->name }}" />
                        @elseif($matchedImage)
                            <img class="w-full h-full object-cover" src="{{ $matchedImage }}" alt="{{ $product->name }}" />
                        @else
                            <span class="material-symbols-outlined text-outline/30 text-8xl">agriculture</span>
                        @endif
                    </div>
                    <div class="grid grid-cols-4 gap-sm">
                        <div class="aspect-square rounded-lg overflow-hidden border-2 border-primary">
                            <img class="w-full h-full object-cover"
                                data-alt="Detail shot of organic wheat grains against a minimalist white background with soft laboratory lighting. The grains are perfectly formed, reflecting a high-tech quality control standard within a modern agricultural marketplace environment."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBMUr5wNcGIIbGLBKDg9uWD-R1_9H1Fv2yX_nnx7FNGgk9pbe2IRaiEn6aNWUeTHo_nD_X3E2B9a5RvS2Js9nHTqVRPBQaTDkG6TTMllaNQS4Z3va5JTtb4y7SJ5zfRc2TlhaYDykJ7mD3voVNc_QViNc-P1ZieZzPMq7l231Qwvz34X_zakwfGUJng0Rq5Ok-sOZ9ZeClzmKY1crtpU_1HVulHNIJAAnU05QXS3uVqOd3FsRxqNt9ZNi6X3rnWIbxAo4VbgM2x6ufz" />
                        </div>
                        <div
                            class="aspect-square rounded-lg overflow-hidden hover:border-2 hover:border-outline-variant transition-all cursor-pointer">
                            <img class="w-full h-full object-cover"
                                data-alt="A wide-angle shot of a lush, emerald green wheat field under a bright morning sky, representing the origin of the premium organic grain. The scene is clean, expansive, and peaceful, aligning with the high-end corporate agricultural brand identity."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaKXdW9uUBvjaENq5V_KAvOPg8BOxSbKLBiku4c1J1yZG59ydKclX6wm6Rjs03i_9iHzml_AN12Y7X6bjAGaTcpXpOoXqUj_ffiAblF6LuTFxkxAfbf_kTcE36XTJwPgis9eWOV0STZ11vhDow0RG3DPdG4KhgxEQmqH_427whaqgi8SMLjzA5XqzhRnNIM8jceZSgpDGOQkqGYY8_21Eo0Dfl0pYSG-oQnaSF0TTGlQEeFHyPiOIUX8rmvWAmoaAOcyQ3wlK51FlS" />
                        </div>
                        <div
                            class="aspect-square rounded-lg overflow-hidden hover:border-2 hover:border-outline-variant transition-all cursor-pointer">
                            <img class="w-full h-full object-cover"
                                data-alt="A close-up of a farmer's hands holding a handful of clean wheat seeds, lit by professional high-key lighting to emphasize trust and transparency in the agricultural supply chain."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCE01x9mt3MAxAsEOmgXx3ne_GAEPj9m5ZVYA7oWOkUmSaz1zc3NAuzwflz9yyF-l4CS600i5ZtDRC0KvrMM9HPFeCQvcmV2ra6GXUP7a20fWzb-rPNJRJ-EABM4LyQYOQB856PpRAHEOLhgVf6j86hUsXTIvwPAtIjckEJTLldkgvR31_qHLSAFhY7feX3dQTG-0djA0fj867VlCgymcS5E03V0skbTiLiSBQU2TkQoA48jWsQClOsNIRTjzb3Mla5Lok4JsgzmObv" />
                        </div>
                        <div
                            class="aspect-square rounded-lg bg-surface-container-low flex items-center justify-center cursor-pointer hover:bg-surface-container transition-colors">
                            <span class="text-label-lg font-label-lg text-on-surface-variant">+12 More</span>
                        </div>
                    </div>
                </div>
                <!-- Description Bento -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                    <div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="bg-tertiary/10 text-tertiary px-3 py-1 rounded-full text-label-sm font-label-sm">Organic
                                    Certified</span>
                                <span
                                    class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-sm font-label-sm">In
                                    Stock</span>
                            </div>
                            <h1 class="page-title mb-2">{{ $product->name }}</h1>
                            <p class="font-body-md text-body-md text-on-surface-variant">High-protein durum variety
                                harvested from the black soil regions of Madhya Pradesh. Moisture content maintained at
                                strictly 11.5% for optimal milling quality.</p>
                        </div>
                        <div class="pt-md border-t border-outline-variant/10 mt-md flex items-center justify-between">
                            <div>
                                <span class="block text-label-sm font-label-sm text-outline">MOQ</span>
                                <span class="block text-label-lg font-label-lg text-on-surface">50 Quintals</span>
                            </div>
                            <div>
                                <span class="block text-label-sm font-label-sm text-outline">Lot ID</span>
                                <span class="block text-label-lg font-label-lg text-on-surface">AG-MP-2024-008</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow">
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-lg">Specifications</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between border-b border-outline-variant/10 pb-2">
                                <span class="text-body-md font-body-md text-on-surface-variant">Gluten Content</span>
                                <span class="text-body-md font-body-md font-semibold text-primary">12.5%</span>
                            </li>
                            <li class="flex items-center justify-between border-b border-outline-variant/10 pb-2">
                                <span class="text-body-md font-body-md text-on-surface-variant">Moisture</span>
                                <span class="text-body-md font-body-md font-semibold text-primary">11.2%</span>
                            </li>
                            <li class="flex items-center justify-between border-b border-outline-variant/10 pb-2">
                                <span class="text-body-md font-body-md text-on-surface-variant">Admixture</span>
                                <span class="text-body-md font-body-md font-semibold text-primary">0.5% Max</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="text-body-md font-body-md text-on-surface-variant">Grain Size</span>
                                <span class="text-body-md font-body-md font-semibold text-primary">Large / Uniform</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Price Comparison Table -->
                <div class="bg-surface-container-lowest rounded-2xl emerald-glow overflow-hidden">
                    <div class="bg-surface-container-low px-lg py-md flex items-center justify-between">
                        <h3 class="font-headline-md text-headline-md text-on-surface">Historical Price Index</h3>
                        <button class="text-primary font-label-md text-label-md flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">show_chart</span> Market Analysis
                        </button>
                    </div>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-lg py-3 text-label-sm font-label-sm text-outline uppercase tracking-wider">
                                    Region</th>
                                <th class="px-lg py-3 text-label-sm font-label-sm text-outline uppercase tracking-wider">
                                    Avg. Price</th>
                                <th class="px-lg py-3 text-label-sm font-label-sm text-outline uppercase tracking-wider">
                                    Trend</th>
                                <th class="px-lg py-3 text-label-sm font-label-sm text-outline uppercase tracking-wider">
                                    Arrivals</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-lg py-4 text-body-md text-on-surface font-semibold">Indore, MP</td>
                                <td class="px-lg py-4 text-body-md text-on-surface">₹2,450/qtl</td>
                                <td class="px-lg py-4"><span class="text-primary flex items-center gap-1">+1.2% <span
                                            class="material-symbols-outlined text-sm">trending_up</span></span></td>
                                <td class="px-lg py-4 text-body-md text-on-surface-variant">2,400 Tons</td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-lg py-4 text-body-md text-on-surface font-semibold">Bhopal, MP</td>
                                <td class="px-lg py-4 text-body-md text-on-surface">₹2,425/qtl</td>
                                <td class="px-lg py-4"><span class="text-primary flex items-center gap-1">+0.8% <span
                                            class="material-symbols-outlined text-sm">trending_up</span></span></td>
                                <td class="px-lg py-4 text-body-md text-on-surface-variant">1,850 Tons</td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-lg py-4 text-body-md text-on-surface font-semibold">Ujjain, MP</td>
                                <td class="px-lg py-4 text-body-md text-on-surface">₹2,460/qtl</td>
                                <td class="px-lg py-4"><span class="text-error flex items-center gap-1">-0.4% <span
                                            class="material-symbols-outlined text-sm">trending_down</span></span></td>
                                <td class="px-lg py-4 text-body-md text-on-surface-variant">950 Tons</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Right Column: Actions & Seller Info -->
            <div class="col-span-12 lg:col-span-4 space-y-lg">
                <!-- Bid Form Card -->
                <div
                    class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow-strong sticky top-24 border border-primary/5">
                    <div class="mb-lg">
                        <span class="text-label-sm font-label-sm text-on-surface-variant">Current Asking Price</span>
                        <div class="flex items-baseline gap-2">
                            <span class="text-display-lg font-display-lg text-primary">₹2,380</span>
                            <span class="text-label-lg font-label-lg text-on-surface-variant">/ Quintal</span>
                        </div>
                        <p class="text-label-sm font-label-sm text-outline mt-1 italic">Excl. Logistics &amp; GST</p>
                    </div>
                    <form action="{{ route('buyer.bid.place', $product->id) }}" method="POST" class="space-y-md"
                        x-data="{ bid_price: {{ $product->price - 50 }}, quantity: {{ min(100, $product->quantity) }} }">
                        @csrf
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface mb-2">Your Bid Price (per
                                Quintal)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">₹</span>
                                <input name="bid_price" x-model="bid_price"
                                    class="w-full pl-8 pr-4 py-3 rounded-2xl border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                                    type="number" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface mb-2">Quantity
                                (Quintals)</label>
                            <input name="quantity" x-model="quantity"
                                class="w-full px-4 py-3 rounded-2xl border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                                type="number" />
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface mb-2">Delivery Pincode</label>
                            <input name="delivery_pincode"
                                class="w-full px-4 py-3 rounded-2xl border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                                type="text" placeholder="Enter pincode" required />
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface mb-2">Message to Farmer
                                (Optional)</label>
                            <textarea name="message"
                                class="w-full px-4 py-3 rounded-2xl border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none resize-none"
                                rows="2" placeholder="e.g. Quality requirements, delivery preferences..."></textarea>
                        </div>
                        <div class="bg-surface-container-low p-4 rounded-xl space-y-2">
                            <div class="flex justify-between text-label-md font-label-md text-on-surface-variant">
                                <span>Total Value</span>
                                <span x-text="'₹' + (bid_price * quantity).toLocaleString()">₹0</span>
                            </div>
                            <div class="flex justify-between text-label-md font-label-md text-on-surface-variant">
                                <span>Commission (1%)</span>
                                <span x-text="'₹' + Math.round(bid_price * quantity * 0.01).toLocaleString()">₹0</span>
                            </div>
                            <div
                                class="flex justify-between text-body-md font-bold text-primary pt-2 border-t border-outline-variant/10">
                                <span>Payable Amount</span>
                                <span x-text="'₹' + Math.round(bid_price * quantity * 1.01).toLocaleString()">₹0</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-primary text-on-primary py-4 rounded-2xl font-label-lg text-label-lg hover:bg-primary/90 transition-all active:scale-[0.98] shadow-lg shadow-primary/20"
                            type="submit">
                            Submit Purchase Bid
                        </button>
                        <p class="text-center text-label-sm font-label-sm text-outline">Bids are valid for 24 hours only.
                        </p>
                    </form>
                </div>
                <!-- Seller Info Card -->
                <div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow">
                    <h4 class="font-label-lg text-label-lg text-on-surface mb-lg">Verified Seller</h4>
                    <div class="flex items-center gap-md mb-md">
                        <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-primary-container/20">
                            <img class="w-full h-full object-cover"
                                data-alt="A professional portrait of a senior Indian commercial farmer in a clean white shirt, smiling confidently. The lighting is soft and corporate-style, with a subtle blurred agricultural background in emerald tones, conveying reliability, expertise, and trust for a high-end marketplace."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVfv_w3pKQ0fM9E_S52q6ki6glfrxAQ8CyvGypjgLMUZDuwMlpG24xyMmTywbLGjZYOAyBpithME4qMaW9DKKavt03kMwcGxZrb5OnofEDdXpoQp2RPXHnnyjmXpwEcxise8MBFmoo9mgKJHIjb4C3csW3LjkuppFRYzZdvmVA-zS9VcxVI6g_DXza7Oymn7FDpaTbcQ6c1EEnky1JcCn0XZpFTij4k1bASYmaLIJhzzhtV4g9m_7yDCER5mjc0a0YPoPdmZOyZXkn" />
                        </div>
                        <div>
                            <h5 class="font-headline-sm text-headline-sm text-on-surface leading-tight">Suresh Patel</h5>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-primary text-[16px]"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="text-label-md font-label-md text-on-surface">4.9</span>
                                <span class="text-label-sm font-label-sm text-outline">(128 reviews)</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-primary">verified</span>
                            <span class="text-body-md font-body-md">Verified mandated seller</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                            <span class="text-body-md font-body-md">Indore, Madhya Pradesh</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-primary">calendar_today</span>
                            <span class="text-body-md font-body-md">Member since 2019</span>
                        </div>
                    </div>
                    <button
                        class="w-full mt-lg py-3 rounded-xl border border-primary text-primary font-label-md text-label-md hover:bg-primary/5 transition-all active:scale-[0.98]">
                        Contact Seller
                    </button>
                </div>
                <!-- Trade Support -->
                <div class="bg-primary/5 p-lg rounded-2xl border border-primary/10">
                    <div class="flex items-start gap-md">
                        <div class="bg-primary-container rounded-full p-2">
                            <span class="material-symbols-outlined text-on-primary-container">support_agent</span>
                        </div>
                        <div>
                            <h4 class="font-label-lg text-label-lg text-primary">Trade Concierge</h4>
                            <p class="text-label-sm font-label-sm text-on-primary-container mt-1">Need help with logistics
                                or quality inspection? Our agents are online.</p>
                            <button class="mt-3 text-primary font-bold text-label-sm flex items-center gap-1">Chat Now <span
                                    class="material-symbols-outlined text-sm">arrow_forward</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer from JSON -->
    <footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-[1280px] mx-auto">
            <div class="space-y-4">
                <span class="font-headline-md text-primary font-bold">AgriMandi India</span>
                <p class="font-body-md text-body-md text-on-surface-variant">Empowering the agricultural ecosystem through
                    high-tech logistics and transparent marketplaces.</p>
            </div>
            <div>
                <h6 class="font-label-lg text-label-lg text-on-surface mb-4">Platform</h6>
                <ul class="space-y-2">
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all"
                            href="{{ route('marketplace') }}">Marketplace</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all"
                            href="{{ route('analytics') }}">Price Analytics</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all"
                            href="{{ route('notifications') }}">Trade Support</a></li>
                </ul>
            </div>
            <div>
                <h6 class="font-label-lg text-label-lg text-on-surface mb-4">Legal</h6>
                <ul class="space-y-2">
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all"
                            href="#">Privacy Policy</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all"
                            href="#">Terms of Service</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all"
                            href="{{ route('home') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="space-y-4">
                <h6 class="font-label-lg text-label-lg text-on-surface mb-4">Subscribe to Insights</h6>
                <div class="flex gap-2">
                    <input
                        class="bg-surface-container-low border-none rounded-xl px-4 py-2 w-full focus:ring-2 focus:ring-primary"
                        placeholder="Email address" type="email" />
                    <button class="bg-primary text-on-primary p-2 rounded-xl">
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="px-margin-desktop py-8 border-t border-outline-variant/10 max-w-[1280px] mx-auto text-center">
            <p class="font-body-md text-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.
            </p>
        </div>
    </footer>

@endsection