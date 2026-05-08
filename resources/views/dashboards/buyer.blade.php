@extends('layouts.app')

@section('title', 'Buyer Dashboard - AgriNova Pro')

@section('content')
<div class="bg-background text-on-background font-body-md text-body-md antialiased h-screen overflow-hidden flex">
    <!-- SideNavBar -->
    <aside class="flex flex-col h-full py-8 bg-black/40 backdrop-blur-2xl h-screen w-64 border-r border-white/10 shadow-2xl z-50 shrink-0 hidden md:flex">
        <div class="px-6 mb-8">
            <div class="text-lg font-black text-emerald-500 mb-8">AgriNova Pro</div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-surface-container border border-white/10 overflow-hidden flex items-center justify-center">
                    <span class="material-symbols-outlined text-emerald-500">account_circle</span>
                </div>
                <div>
                    <div class="font-manrope text-sm font-semibold text-emerald-500">AgriNova Pro</div>
                    <div class="font-manrope text-xs text-slate-400">Enterprise Tier</div>
                </div>
            </div>
        </div>

        <nav class="flex-1 flex flex-col gap-2 mt-4">
            <a class="bg-emerald-500/10 text-emerald-400 border-r-4 border-emerald-500 py-3 px-6 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span> Overview
            </a>
            <a class="text-slate-400 py-3 px-6 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">eco</span> Crop Health
            </a>
            <a class="text-slate-400 py-3 px-6 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">inventory_2</span> Inventory
            </a>
            <a class="text-slate-400 py-3 px-6 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">local_shipping</span> Logistics
            </a>
            <a class="text-slate-400 py-3 px-6 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">analytics</span> Analytics
            </a>
            <a class="text-slate-400 py-3 px-6 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">settings</span> Settings
            </a>
        </nav>

        <div class="px-6 mt-auto flex flex-col gap-4">
            <button class="w-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/50 hover:bg-emerald-500/30 transition-colors py-2 rounded-lg font-manrope text-sm font-semibold">
                Add New Batch
            </button>
            <div class="flex flex-col gap-2 pt-4 border-t border-white/10">
                <a class="text-slate-400 py-2 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                    <span class="material-symbols-outlined text-[18px]">help</span> Help Center
                </a>
                <a class="text-slate-400 py-2 hover:bg-white/5 hover:text-emerald-300 transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                    <span class="material-symbols-outlined text-[18px]">logout</span> Logout
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 h-full overflow-y-auto relative bg-[url('https://images.unsplash.com/photo-1592982537447-6f29e1f57bd2?q=80&w=2940&auto=format&fit=crop')] bg-cover bg-center bg-fixed">
        <div class="absolute inset-0 bg-background/95 backdrop-blur-[20px] pointer-events-none"></div>
        <div class="relative z-10 w-full min-h-full flex flex-col">
            <!-- Header -->
            <header class="px-margin-desktop pt-margin-desktop pb-gutter flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface">Procurement Command</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-1">Real-time market insights and active fulfillment tracking.</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-surface-container-low/80 backdrop-blur-md border border-outline-variant/30 px-4 py-2 rounded-lg flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">trending_up</span>
                        <div>
                            <div class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Market Index</div>
                            <div class="font-label-bold text-label-bold text-on-surface">+2.4% Today</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="px-margin-desktop flex-1 flex flex-col gap-margin-desktop pb-margin-desktop max-w-container-max mx-auto w-full">
                <!-- Metrics -->
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden group hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Total Procurement</span>
                            <span class="material-symbols-outlined text-primary-fixed-dim bg-primary/10 p-2 rounded-lg">account_balance_wallet</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-on-surface drop-shadow-[0_0_12px_rgba(255,255,255,0.1)]">$4.2M</div>
                        <div class="flex items-center gap-1 mt-2 text-primary-fixed">
                            <span class="material-symbols-outlined text-[16px]">trending_up</span>
                            <span class="font-label-sm text-label-sm">+12.5% vs last quarter</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden group hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Active Bids</span>
                            <span class="material-symbols-outlined text-secondary bg-secondary/10 p-2 rounded-lg">gavel</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-on-surface drop-shadow-[0_0_12px_rgba(255,255,255,0.1)]">24</div>
                        <div class="flex items-center gap-1 mt-2 text-secondary">
                            <span class="font-label-sm text-label-sm">Across 6 regions</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden group hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Pending Deliveries</span>
                            <span class="material-symbols-outlined text-primary-fixed-dim bg-primary/10 p-2 rounded-lg">local_shipping</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-on-surface drop-shadow-[0_0_12px_rgba(255,255,255,0.1)]">18<span class="text-headline-md font-headline-md text-on-surface-variant ml-1">/ 450t</span></div>
                        <div class="flex items-center gap-1 mt-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span class="font-label-sm text-label-sm">Next arrival in 48h</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden group hover:bg-surface-container/60 transition-colors shadow-2xl flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Avg Quality Rating</span>
                            <span class="material-symbols-outlined text-primary-fixed-dim bg-primary/10 p-2 rounded-lg">verified</span>
                        </div>
                        <div class="flex items-end justify-between mt-4">
                            <div class="font-display-xl text-display-xl text-primary drop-shadow-[0_0_15px_rgba(63,229,108,0.4)]">98.4<span class="text-headline-md font-headline-md">%</span></div>
                        </div>
                    </div>
                </section>

                <!-- Listings -->
                <section class="flex flex-col gap-6">
                    <h2 class="font-headline-md text-headline-md text-on-surface border-b border-white/10 pb-4">Market Explorer</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                        @for($i = 0; $i < 3; $i++)
                            <div class="group relative rounded-xl overflow-hidden h-80 border border-white/10 shadow-2xl before:absolute before:inset-0 before:rounded-xl before:border-t before:border-l before:border-white/20 before:pointer-events-none before:z-20">
                                <img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Crop image" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvB9wxbdNaLM0NaTYF5Re2EO-rQGX-dVZvqNwCaAZmBJ_aTabXCcYutmmwsSo5ZOEg-uJek1n1DcnHWaYxy3SbKsqqqM7vdBUJLdipeH8EmSB2nrQ5Nr_d0iqgceZRGxpY4_APV0_N2EMePAOoTlSbq_lfAJUNe5W8cnDEuULrFVRi9fKMrjyiZkee48J6bQZUjSY7pjTYcohAMuBGZi2HiilHfHppufgem0tMmwZq28q3fl9fsOxXgvwV0jWEV_oMTB8yM88Fadbf" />
                                <div class="absolute inset-0 bg-gradient-to-t from-surface-dim via-surface-dim/50 to-transparent z-10"></div>
                                <div class="absolute inset-0 z-20 p-6 flex flex-col justify-end">
                                    <div class="bg-primary/90 text-on-primary backdrop-blur-md px-3 py-1 rounded font-label-bold text-label-bold w-fit mb-3 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">star</span> Grade A
                                    </div>
                                    <h3 class="font-headline-md text-headline-md text-on-surface">Winter Wheat</h3>
                                    <p class="font-body-md text-body-md text-on-surface-variant mb-4">Midwest Consortium • Est. Yield: 12k Tons</p>
                                    <div class="flex justify-between items-center bg-surface/50 backdrop-blur-md border border-white/10 rounded-lg p-3">
                                        <div>
                                            <div class="font-label-sm text-label-sm text-on-surface-variant">Current Ask</div>
                                            <div class="font-headline-md text-headline-md text-primary">$320<span class="text-body-md text-on-surface-variant">/t</span></div>
                                        </div>
                                        <button class="bg-surface-bright hover:bg-white text-on-surface hover:text-surface-dim transition-colors p-2 rounded-lg shadow-lg">
                                            <span class="material-symbols-outlined">gavel</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>
@endsection
