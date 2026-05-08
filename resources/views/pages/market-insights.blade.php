@extends('layouts.app')

@section('title', 'Market Insights')

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
                <a class="px-4 py-2 text-on-surface-variant hover:text-primary transition-colors font-label-bold text-label-bold" href="#">Marketplace</a>
                <a class="px-4 py-2 text-primary font-label-bold text-label-bold" href="#">Insights</a>
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
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Market Intelligence & Insights</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Make informed decisions with real-time data, price analysis, and AI-powered recommendations.</p>
            </section>

            <!-- Key Metrics -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-margin-desktop">
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Market Index</span>
                        <span class="material-symbols-outlined text-primary bg-primary/10 p-2 rounded-lg">trending_up</span>
                    </div>
                    <div class="font-display-xl text-display-xl text-on-surface">1,247</div>
                    <div class="flex items-center gap-1 mt-2 text-primary">
                        <span class="material-symbols-outlined text-[16px]">arrow_upward</span>
                        <span class="font-label-sm text-label-sm">+4.2% week-on-week</span>
                    </div>
                </div>

                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Avg Price Change</span>
                        <span class="material-symbols-outlined text-secondary bg-secondary/10 p-2 rounded-lg">show_chart</span>
                    </div>
                    <div class="font-display-xl text-display-xl text-secondary">+3.8%</div>
                    <div class="flex items-center gap-1 mt-2 text-secondary">
                        <span class="font-label-sm text-label-sm">Across all crops</span>
                    </div>
                </div>

                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Volume Traded</span>
                        <span class="material-symbols-outlined text-primary-fixed-dim bg-primary/10 p-2 rounded-lg">inventory_2</span>
                    </div>
                    <div class="font-display-xl text-display-xl text-on-surface">445K<span class="text-body-md text-on-surface-variant ml-1">tons</span></div>
                    <div class="flex items-center gap-1 mt-2 text-on-surface-variant">
                        <span class="font-label-sm text-label-sm">Last 7 days</span>
                    </div>
                </div>

                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Market Opportunity</span>
                        <span class="material-symbols-outlined text-tertiary bg-tertiary/10 p-2 rounded-lg">lightbulb</span>
                    </div>
                    <div class="font-display-xl text-display-xl text-tertiary">High</div>
                    <div class="flex items-center gap-1 mt-2 text-tertiary">
                        <span class="font-label-sm text-label-sm">Best conditions in 3 months</span>
                    </div>
                </div>
            </section>

            <!-- ROI Calculator & Smart Recommendations -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter mb-margin-desktop">
                <!-- ROI Calculator -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">calculate</span> ROI Calculator
                    </h2>

                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface-variant mb-2">Crop Type</label>
                            <select class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary">
                                <option>Wheat</option>
                                <option>Rice</option>
                                <option>Soybeans</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface-variant mb-2">Quantity (tons)</label>
                            <input type="number" placeholder="0" value="50" class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary" />
                        </div>

                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface-variant mb-2">Production Cost ($)</label>
                            <input type="number" placeholder="0" value="5000" class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary" />
                        </div>

                        <button class="w-full bg-primary text-on-primary hover:bg-primary/80 transition-colors py-2 rounded-lg font-label-bold text-label-bold">
                            Calculate ROI
                        </button>
                    </div>

                    <!-- Results -->
                    <div class="bg-surface/30 border border-white/5 rounded-lg p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="font-label-bold text-label-bold text-on-surface-variant">Current Market Price</span>
                            <span class="font-headline-md text-headline-md text-primary">$320/ton</span>
                        </div>
                        <div class="flex justify-between border-t border-white/5 pt-3">
                            <span class="font-label-bold text-label-bold text-on-surface-variant">Total Revenue (50 tons)</span>
                            <span class="font-headline-md text-headline-md text-on-surface">$16,000</span>
                        </div>
                        <div class="flex justify-between border-t border-white/5 pt-3">
                            <span class="font-label-bold text-label-bold text-on-surface-variant">Net Profit</span>
                            <span class="font-headline-md text-headline-md text-emerald-400">+$11,000</span>
                        </div>
                        <div class="flex justify-between border-t border-white/5 pt-3">
                            <span class="font-label-bold text-label-bold text-on-surface-variant">ROI</span>
                            <span class="font-headline-md text-headline-md text-emerald-400">220%</span>
                        </div>
                    </div>
                </div>

                <!-- Smart Recommendations -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">auto_awesome</span> AI Recommendations
                    </h2>

                    <div class="space-y-4 max-h-80 overflow-y-auto custom-scrollbar">
                        @for($i = 0; $i < 4; $i++)
                            <div class="bg-surface/30 border border-white/5 rounded-lg p-4 hover:bg-surface/50 transition-colors cursor-pointer">
                                <div class="flex items-start gap-3 mb-2">
                                    <span class="material-symbols-outlined text-primary flex-shrink-0">{{ ['trending_up', 'location_on', 'schedule', 'groups'][rand(0, 3)] }}</span>
                                    <div class="flex-1">
                                        <h3 class="font-label-bold text-label-bold text-on-surface">{{ ['Best Time to Sell', 'Top Market Location', 'Optimal Harvest Window', 'Buyer Network Insight'][rand(0, 3)] }}</h3>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                                            {{ ['Prices expected to rise 12% in next 48 hours', 'Azadpur Mandi offering premium rates this week', 'Next 7 days show 15% better yields', 'Agricultural buyers group forming'][rand(0, 3)] }}
                                        </p>
                                    </div>
                                </div>
                                <button class="text-primary hover:text-primary/80 font-label-bold text-label-bold text-sm flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span> View Details
                                </button>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Price Analytics by Crop -->
            <section class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl mb-margin-desktop">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">bar_chart</span> Price Analytics by Crop
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                    @foreach(['Wheat', 'Rice', 'Soybeans', 'Cotton', 'Maize', 'Barley'] as $crop)
                        <div class="bg-surface/30 border border-white/5 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="font-label-bold text-label-bold text-on-surface">{{ $crop }}</h3>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant">Current price</p>
                                </div>
                                <span class="bg-primary/20 text-primary px-2 py-1 rounded font-label-sm text-label-sm font-semibold">+{{ rand(1, 8) }}%</span>
                            </div>

                            <div class="mb-4">
                                <div class="font-headline-md text-headline-md text-on-surface mb-2">${{ 200 + rand(0, 300) }}<span class="text-body-md text-on-surface-variant">/ton</span></div>
                                <div class="w-full bg-surface-dim rounded-full h-2 overflow-hidden">
                                    <div class="bg-primary h-full" style="width: {{ rand(30, 90) }}%"></div>
                                </div>
                            </div>

                            <div class="flex justify-between text-on-surface-variant font-label-sm text-label-sm">
                                <span>Low: ${{ 180 + rand(0, 200) }}</span>
                                <span>High: ${{ 350 + rand(0, 250) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Route Planning -->
            <section class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">route</span> Optimal Route Planning
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">
                        <div class="bg-surface/20 border border-white/5 rounded-lg h-64 flex items-center justify-center overflow-hidden relative">
                            <img class="absolute inset-0 w-full h-full object-cover opacity-20" src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1000&auto=format&fit=crop" alt="Map" />
                            <div class="relative z-10 text-center">
                                <span class="material-symbols-outlined text-[48px] text-primary mx-auto block mb-2">location_on</span>
                                <p class="font-body-md text-body-md text-on-surface-variant">Interactive route map</p>
                                <p class="font-label-sm text-label-sm text-on-surface-variant mt-1">Select origin and destination mandis</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface-variant mb-2">From Mandi</label>
                            <select class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary">
                                <option>Azadpur, Delhi</option>
                                <option>Navi Mumbai</option>
                                <option>Bangalore</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface-variant mb-2">To Mandi</label>
                            <select class="w-full bg-surface/50 border border-white/10 rounded-lg px-4 py-2 text-on-surface focus:outline-none focus:border-primary">
                                <option>Navi Mumbai</option>
                                <option>Azadpur, Delhi</option>
                                <option>Bangalore</option>
                            </select>
                        </div>

                        <button class="bg-primary text-on-primary hover:bg-primary/80 transition-colors py-2 rounded-lg font-label-bold text-label-bold">
                            Calculate Route
                        </button>

                        <div class="bg-surface/30 border border-white/5 rounded-lg p-3 mt-2">
                            <div class="text-on-surface-variant font-label-sm text-label-sm mb-2">Recommended Route</div>
                            <div class="space-y-1">
                                <div class="flex justify-between text-on-surface font-body-md text-body-md">
                                    <span>Distance</span>
                                    <span class="font-semibold">847 km</span>
                                </div>
                                <div class="flex justify-between text-on-surface font-body-md text-body-md">
                                    <span>Est. Cost</span>
                                    <span class="font-semibold">$2,100</span>
                                </div>
                                <div class="flex justify-between text-primary font-body-md text-body-md">
                                    <span>Time</span>
                                    <span class="font-semibold">18-20 hours</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
@endsection
