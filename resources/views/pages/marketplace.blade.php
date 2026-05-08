@extends('layouts.app')

@section('title', 'Marketplace')

@section('content')
<body class="bg-background text-on-background font-body-md text-body-md antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 h-16 bg-surface/90 backdrop-blur-2xl border-b border-white/10 z-40 flex items-center px-margin-desktop justify-between shadow-xl">
        <div class="flex items-center gap-8">
            <a class="text-lg font-black text-primary flex items-center gap-2" href="/">
                <span class="material-symbols-outlined text-[28px]">agriculture</span> AgriNova
            </a>
            <div class="hidden md:flex items-center gap-1">
                <a class="px-4 py-2 text-on-surface-variant hover:text-primary transition-colors font-label-bold text-label-bold" href="/">Home</a>
                <a class="px-4 py-2 text-primary font-label-bold text-label-bold" href="#">Marketplace</a>
                <a class="px-4 py-2 text-on-surface-variant hover:text-primary transition-colors font-label-bold text-label-bold" href="#">Insights</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="bg-surface-container p-2 hover:bg-surface-container-high transition-colors rounded-lg border border-white/10">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <button class="w-10 h-10 rounded-full border border-white/10 bg-surface-container flex items-center justify-center hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined">account_circle</span>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 pb-16 px-margin-desktop bg-[url('https://images.unsplash.com/photo-1574943320219-553eb213f72d?q=80&w=2940&auto=format&fit=crop')] bg-cover bg-center bg-fixed">
        <div class="absolute inset-0 bg-background/95 backdrop-blur-[20px] pointer-events-none mt-16"></div>
        <div class="relative z-10 max-w-container-max mx-auto">
            <!-- Header -->
            <section class="mb-margin-desktop">
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Global Marketplace</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Browse and bid on quality crops from verified farmers worldwide.</p>
            </section>

            <!-- Filter & Search -->
            <section class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 mb-margin-desktop shadow-2xl">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">search</span>
                        <input type="text" placeholder="Search crops..." class="w-full bg-surface/50 border border-white/10 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/50" />
                    </div>
                    <div>
                        <select class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary">
                            <option selected>All Crops</option>
                            <option>Wheat</option>
                            <option>Rice</option>
                            <option>Soybeans</option>
                            <option>Cotton</option>
                        </select>
                    </div>
                    <div>
                        <select class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary">
                            <option selected>All Regions</option>
                            <option>North India</option>
                            <option>Central India</option>
                            <option>South India</option>
                            <option>East India</option>
                        </select>
                    </div>
                    <div>
                        <select class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary">
                            <option selected>Sort by: Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Most Bids</option>
                            <option>Ending Soon</option>
                        </select>
                    </div>
                </div>

                <!-- Quick Filters -->
                <div class="flex flex-wrap gap-3">
                    <span class="text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">Quick Filters:</span>
                    <button class="bg-primary text-on-primary hover:bg-primary/80 transition-colors px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">verified</span> Verified Only
                    </button>
                    <button class="bg-surface-container border border-white/10 text-on-surface hover:bg-surface-container-high transition-colors px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span> Trending
                    </button>
                    <button class="bg-surface-container border border-white/10 text-on-surface hover:bg-surface-container-high transition-colors px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                        <span class="material-symbols-outlined text-[16px]">schedule</span> Ending Soon
                    </button>
                </div>
            </section>

            <!-- Listings Grid -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter mb-margin-desktop">
                @for($i = 0; $i < 9; $i++)
                    <div class="group relative rounded-xl overflow-hidden h-96 border border-white/10 shadow-2xl hover:shadow-2xl hover:border-white/20 transition-all duration-300 before:absolute before:inset-0 before:rounded-xl before:border-t before:border-l before:border-white/20 before:pointer-events-none before:z-20 before:opacity-0 group-hover:before:opacity-100 before:transition-opacity">
                        <img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Crop image" src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?q=80&w=800&auto=format&fit=crop" />
                        <div class="absolute inset-0 bg-gradient-to-t from-surface-dim via-surface-dim/30 to-transparent z-10 group-hover:via-surface-dim/50 transition-colors"></div>

                        <!-- Status Badge -->
                        <div class="absolute top-4 left-4 z-30">
                            <span class="bg-primary text-on-primary px-3 py-1 rounded-full font-label-bold text-label-bold text-xs flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">verified</span> Grade A
                            </span>
                        </div>

                        <!-- Bids Counter -->
                        <div class="absolute top-4 right-4 z-30">
                            <span class="bg-surface-bright text-on-surface px-3 py-1 rounded-full font-label-bold text-label-bold text-xs flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">gavel</span> {{ 5 + $i }} Bids
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="absolute inset-0 z-20 p-6 flex flex-col justify-end">
                            <h3 class="font-headline-md text-headline-md text-on-surface mb-1">{{ ['Wheat', 'Rice', 'Soybeans', 'Cotton', 'Maize', 'Barley', 'Pulses', 'Millet', 'Jute'][$i] }}</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mb-4">{{ ['Punjab Consortium', 'MP Collective', 'Bihar Farmers', 'Gujarat Agri', 'Rajasthan Union', 'UP Farmers', 'Haryana Group', 'West Bengal Co-op', 'Maharashtra Alliance'][$i] }}</p>

                            <!-- Details -->
                            <div class="bg-surface/40 backdrop-blur-md border border-white/10 rounded-lg p-3 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <div>
                                        <span class="text-on-surface-variant font-label-sm text-label-sm">Quality</span>
                                        <p class="text-on-surface font-label-bold text-label-bold">{{ 85 + rand(0, 14) }}%</p>
                                    </div>
                                    <div>
                                        <span class="text-on-surface-variant font-label-sm text-label-sm">Quantity</span>
                                        <p class="text-on-surface font-label-bold text-label-bold">{{ 100 + $i * 50 }}T</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing -->
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="font-label-sm text-label-sm text-on-surface-variant">Current Bid</div>
                                    <div class="font-headline-md text-headline-md text-primary">${{ 300 + $i * 20 }}<span class="text-body-md text-on-surface-variant">/t</span></div>
                                </div>
                                <button class="bg-surface-bright hover:bg-white text-on-surface hover:text-primary transition-all shadow-lg p-2 rounded-lg font-label-bold text-label-bold flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="material-symbols-outlined">gavel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endfor
            </section>

            <!-- Pagination -->
            <div class="flex items-center justify-center gap-2 py-8">
                <button class="w-10 h-10 rounded-lg border border-white/10 hover:bg-surface-container transition-colors flex items-center justify-center">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                @for($p = 1; $p <= 5; $p++)
                    <button class="w-10 h-10 rounded-lg {{ $p === 1 ? 'bg-primary text-on-primary' : 'border border-white/10 hover:bg-surface-container' }} transition-colors flex items-center justify-center font-label-bold text-label-bold">
                        {{ $p }}
                    </button>
                @endfor
                <button class="w-10 h-10 rounded-lg border border-white/10 hover:bg-surface-container transition-colors flex items-center justify-center">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </main>
</body>
@endsection
