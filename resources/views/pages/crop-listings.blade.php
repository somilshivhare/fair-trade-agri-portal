@extends('layouts.app')

@section('title', 'Crop Listings')

@section('content')
<body class="bg-background text-on-background font-body-md text-body-md antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 h-16 bg-surface/90 backdrop-blur-2xl border-b border-white/10 z-40 flex items-center px-margin-desktop justify-between shadow-xl">
        <div class="flex items-center gap-8">
            <a class="text-lg font-black text-primary flex items-center gap-2" href="/">
                <span class="material-symbols-outlined text-[28px]">agriculture</span> AgriNova
            </a>
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
            <section class="mb-margin-desktop flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">My Crop Listings</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant">Track your active listings, manage bids, and monitor sales.</p>
                </div>
                <a href="#" class="bg-primary text-on-primary hover:bg-primary/80 transition-colors px-6 py-3 rounded-lg font-label-bold text-label-bold flex items-center justify-center gap-2 w-fit shadow-lg shadow-primary/50">
                    <span class="material-symbols-outlined">add</span> Create New Listing
                </a>
            </section>

            <!-- Stats -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-margin-desktop">
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Active Listings</span>
                    <div class="font-display-xl text-display-xl text-primary mt-3">6</div>
                </div>

                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Total Bids</span>
                    <div class="font-display-xl text-display-xl text-secondary mt-3">34</div>
                </div>

                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Pending Sales</span>
                    <div class="font-display-xl text-display-xl text-tertiary mt-3">12</div>
                </div>

                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                    <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Total Revenue</span>
                    <div class="font-display-xl text-display-xl text-emerald-400 mt-3">$84,200</div>
                </div>
            </section>

            <!-- Listings Table -->
            <section class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl overflow-x-auto custom-scrollbar">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6">Active Listings</h2>

                <div class="min-w-full">
                    <table class="w-full">
                        <thead class="border-b border-white/10">
                            <tr>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Crop</th>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Quantity</th>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Current Bid</th>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Bids</th>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Status</th>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Ends In</th>
                                <th class="text-left py-4 px-4 font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @for($i = 0; $i < 6; $i++)
                                <tr class="hover:bg-surface/20 transition-colors group">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-12 h-12 rounded-lg border border-white/10 object-cover" src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?q=80&w=400&auto=format&fit=crop" alt="" />
                                            <div>
                                                <div class="font-label-bold text-label-bold text-on-surface">{{ ['Premium Wheat', 'Basmati Rice', 'Soybeans', 'Cotton Grade A', 'Hybrid Maize', 'Yellow Lentils'][$i] }}</div>
                                                <div class="font-body-sm text-body-sm text-on-surface-variant">Grade {{ ['A', 'A+', 'B', 'A', 'A', 'B'][$i] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 font-body-md text-body-md text-on-surface">{{ 50 + $i * 10 }} tons</td>
                                    <td class="py-4 px-4 font-headline-md text-headline-md text-primary">${{ 300 + rand(0, 100) }}/t</td>
                                    <td class="py-4 px-4 font-body-md text-body-md text-on-surface">{{ 4 + $i }} bids</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-emerald-500/20 text-emerald-400 px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold flex items-center gap-1 w-fit">
                                            <span class="material-symbols-outlined text-[14px]">circle</span> Active
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 font-body-md text-body-md text-on-surface">{{ 2 + $i }} days</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button class="p-2 bg-surface/50 hover:bg-surface hover:text-primary transition-colors rounded-lg border border-white/10" title="View Bids">
                                                <span class="material-symbols-outlined text-[18px]">gavel</span>
                                            </button>
                                            <button class="p-2 bg-surface/50 hover:bg-surface hover:text-primary transition-colors rounded-lg border border-white/10" title="Edit">
                                                <span class="material-symbols-outlined text-[18px]">edit</span>
                                            </button>
                                            <button class="p-2 bg-surface/50 hover:bg-surface hover:text-red-400 transition-colors rounded-lg border border-white/10" title="Delete">
                                                <span class="material-symbols-outlined text-[18px]">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Pending Approvals -->
            <section class="mt-margin-desktop bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">pending_actions</span> Pending Approvals
                </h2>

                <div class="space-y-4">
                    @for($i = 0; $i < 2; $i++)
                        <div class="bg-surface/30 border border-white/5 rounded-lg p-4 flex items-center justify-between hover:bg-surface/50 transition-colors group">
                            <div class="flex items-center gap-4 flex-1">
                                <img class="w-16 h-16 rounded-lg border border-white/10 object-cover" src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?q=80&w=400&auto=format&fit=crop" alt="" />
                                <div>
                                    <div class="font-label-bold text-label-bold text-on-surface">{{ ['Dragon Fruit Grade A', 'Organic Turmeric'][rand(0, 1)] }}</div>
                                    <div class="font-body-sm text-body-sm text-on-surface-variant">Awaiting quality verification from admin</div>
                                    <div class="text-yellow-400 font-label-sm text-label-sm mt-1 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">schedule</span> Pending for 2 days
                                    </div>
                                </div>
                            </div>
                            <button class="bg-surface-bright text-on-surface hover:bg-white transition-colors px-4 py-2 rounded-lg font-label-bold text-label-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                View Details
                            </button>
                        </div>
                    @endfor
                </div>
            </section>

            <!-- Closed/Sold Listings -->
            <section class="mt-margin-desktop bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">check_circle</span> Sold Listings
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @for($i = 0; $i < 2; $i++)
                        <div class="bg-surface/30 border border-white/5 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-label-bold text-label-bold text-on-surface">{{ ['Millet', 'Chickpeas'][rand(0, 1)] }}</h3>
                                <span class="bg-emerald-500/20 text-emerald-400 px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">Sold</span>
                            </div>
                            <div class="space-y-2 text-body-sm text-body-sm text-on-surface-variant">
                                <div class="flex justify-between">
                                    <span>Final Price</span>
                                    <span class="text-on-surface font-semibold">${{ 280 + rand(0, 50) }}/ton</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Quantity</span>
                                    <span class="text-on-surface font-semibold">{{ 40 + rand(0, 60) }} tons</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Total Revenue</span>
                                    <span class="text-emerald-400 font-semibold">${{ 12000 + rand(0, 25000) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Buyer</span>
                                    <span class="text-on-surface font-semibold">{{ ['AgriCorp Ltd', 'Fresh Foods Inc'][rand(0, 1)] }}</span>
                                </div>
                            </div>
                            <button class="w-full mt-4 bg-surface-container border border-white/10 text-on-surface hover:bg-surface-container-high transition-colors py-2 rounded-lg font-label-bold text-label-bold text-sm">
                                View Receipt
                            </button>
                        </div>
                    @endfor
                </div>
            </section>
        </div>
    </main>
</body>
@endsection
