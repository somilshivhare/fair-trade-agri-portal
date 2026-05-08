@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<body class="bg-background text-on-background font-body-md text-body-md antialiased h-screen overflow-hidden flex">
    <!-- SideNavBar -->
    <aside class="flex flex-col h-full py-8 bg-black/40 backdrop-blur-2xl h-screen w-64 border-r border-white/10 shadow-2xl z-50 shrink-0 hidden md:flex">
        <div class="px-6 mb-8">
            <div class="text-lg font-black text-primary">AgriNova Admin</div>
            <div class="flex items-center gap-3 mt-6">
                <div class="w-10 h-10 rounded-full bg-surface-container border border-white/10 overflow-hidden flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">admin_panel_settings</span>
                </div>
                <div>
                    <div class="font-manrope text-sm font-semibold text-on-surface">System Admin</div>
                    <div class="font-manrope text-xs text-on-surface-variant">Master Account</div>
                </div>
            </div>
        </div>

        <nav class="flex-1 flex flex-col gap-2 mt-4">
            <a class="bg-primary/10 text-primary border-r-4 border-primary py-3 px-6 font-manrope text-sm font-semibold flex items-center gap-3 rounded-r-lg" href="#">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span> Overview
            </a>
            <a class="text-on-surface-variant py-3 px-6 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">verified_user</span> Verification
            </a>
            <a class="text-on-surface-variant py-3 px-6 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">gavel</span> Live Bids
            </a>
            <a class="text-on-surface-variant py-3 px-6 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">warning</span> Fraud Detection
            </a>
            <a class="text-on-surface-variant py-3 px-6 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">sync</span> Market Sync
            </a>
            <a class="text-on-surface-variant py-3 px-6 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">analytics</span> Analytics
            </a>
            <a class="text-on-surface-variant py-3 px-6 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                <span class="material-symbols-outlined">settings_suggest</span> System Settings
            </a>
        </nav>

        <div class="px-6 mt-auto flex flex-col gap-4">
            <button class="w-full bg-red-500/20 text-red-400 border border-red-500/50 hover:bg-red-500/30 transition-colors py-2 rounded-lg font-manrope text-sm font-semibold flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-[18px]">emergency</span> System Alert
            </button>
            <div class="flex flex-col gap-2 pt-4 border-t border-white/10">
                <a class="text-on-surface-variant py-2 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                    <span class="material-symbols-outlined text-[18px]">help</span> Help Center
                </a>
                <a class="text-on-surface-variant py-2 hover:bg-white/5 hover:text-primary transition-all hover:translate-x-1 duration-200 font-manrope text-sm font-semibold flex items-center gap-3" href="#">
                    <span class="material-symbols-outlined text-[18px]">logout</span> Logout
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 h-full overflow-y-auto relative bg-[url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2940&auto=format&fit=crop')] bg-cover bg-center bg-fixed">
        <div class="absolute inset-0 bg-background/95 backdrop-blur-[20px] pointer-events-none"></div>
        <div class="relative z-10 w-full min-h-full flex flex-col">
            <!-- Header -->
            <header class="px-margin-desktop pt-margin-desktop pb-gutter flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface">System Command Center</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-1">Platform health, verification queue, and live market monitoring.</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="bg-surface-container-low/80 backdrop-blur-md border border-outline-variant/30 px-3 py-2 rounded-lg flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px] animate-spin text-primary">sync</span>
                        <div>
                            <div class="font-label-sm text-label-sm text-on-surface-variant">System Status</div>
                            <div class="font-label-bold text-label-bold text-emerald-400">All Systems Nominal</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="px-margin-desktop flex-1 flex flex-col gap-margin-desktop pb-margin-desktop max-w-container-max mx-auto w-full">
                <!-- System Metrics -->
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-gutter">
                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Active Users</span>
                            <span class="material-symbols-outlined text-primary bg-primary/10 p-2 rounded-lg">group</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-on-surface">12,847</div>
                        <div class="flex items-center gap-1 mt-2 text-primary">
                            <span class="material-symbols-outlined text-[16px]">trending_up</span>
                            <span class="font-label-sm text-label-sm">+3.2% today</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Volume Traded</span>
                            <span class="material-symbols-outlined text-primary bg-primary/10 p-2 rounded-lg">trending_up</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-on-surface">890K<span class="text-body-md text-on-surface-variant ml-1">tons</span></div>
                        <div class="flex items-center gap-1 mt-2 text-on-surface-variant">
                            <span class="font-label-sm text-label-sm">+$14.2M value</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Pending Verif.</span>
                            <span class="material-symbols-outlined text-secondary bg-secondary/10 p-2 rounded-lg">assignment_turned_in</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-secondary">48</div>
                        <div class="flex items-center gap-1 mt-2 text-secondary">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span class="font-label-sm text-label-sm">Avg 2.4h review</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">Fraud Alerts</span>
                            <span class="material-symbols-outlined text-red-400 bg-red-400/10 p-2 rounded-lg">warning</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-on-surface">3</div>
                        <div class="flex items-center gap-1 mt-2 text-red-400">
                            <span class="material-symbols-outlined text-[16px]">priority_high</span>
                            <span class="font-label-sm text-label-sm">Active investigation</span>
                        </div>
                    </div>

                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 relative overflow-hidden hover:bg-surface-container/60 transition-colors shadow-2xl">
                        <div class="flex justify-between items-start mb-4">
                            <span class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider">System Health</span>
                            <span class="material-symbols-outlined text-emerald-400 bg-emerald-400/10 p-2 rounded-lg">favorite</span>
                        </div>
                        <div class="font-display-xl text-display-xl text-emerald-400">99.8<span class="text-body-md">%</span></div>
                        <div class="flex items-center gap-1 mt-2 text-emerald-400">
                            <span class="material-symbols-outlined text-[16px]">check_circle</span>
                            <span class="font-label-sm text-label-sm">All services up</span>
                        </div>
                    </div>
                </section>

                <!-- Main Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
                    <!-- Verification Queue -->
                    <div class="lg:col-span-2 bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
                                <span class="material-symbols-outlined">assignment_turned_in</span> Verification Queue
                            </h2>
                            <span class="bg-secondary text-on-secondary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">48 Pending</span>
                        </div>
                        <div class="space-y-3 max-h-96 overflow-y-auto custom-scrollbar">
                            @for($i = 0; $i < 5; $i++)
                                <div class="bg-surface/30 border border-white/5 rounded-lg p-4 flex items-center justify-between hover:bg-surface/50 transition-colors cursor-pointer group">
                                    <div class="flex items-center gap-3">
                                        <img class="w-10 h-10 rounded-full border border-white/10" src="https://api.dicebear.com/7.x/avataaars/svg?seed=user{{ $i }}" alt="" />
                                        <div>
                                            <p class="font-label-bold text-label-bold text-on-surface group-hover:text-primary transition-colors">Farmer ID: FRM-{{ 1001 + $i }}</p>
                                            <p class="font-label-sm text-label-sm text-on-surface-variant">Document verification pending</p>
                                        </div>
                                    </div>
                                    <button class="bg-primary text-on-primary hover:bg-primary/80 transition-colors px-4 py-2 rounded-lg font-label-bold text-label-bold flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="material-symbols-outlined text-[18px]">check_circle</span> Review
                                    </button>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Live Bid Monitor -->
                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                        <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">show_chart</span> Live Bids
                        </h2>
                        <div class="space-y-4 max-h-96 overflow-y-auto custom-scrollbar">
                            @for($i = 0; $i < 4; $i++)
                                <div class="bg-surface/30 border border-white/5 rounded-lg p-3">
                                    <div class="flex justify-between items-start mb-2">
                                        <p class="font-label-bold text-label-bold text-on-surface">Premium Wheat</p>
                                        <span class="bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded font-label-sm text-label-sm font-semibold">Active</span>
                                    </div>
                                    <div class="flex justify-between text-on-surface-variant font-body-md text-body-md mb-2">
                                        <span>Current: ${{ 300 + $i * 10 }}/ton</span>
                                        <span class="text-primary">+{{ 2.5 + $i }}%</span>
                                    </div>
                                    <div class="w-full bg-surface-dim rounded-full h-1.5 overflow-hidden">
                                        <div class="bg-primary h-full" style="width: {{ 40 + $i * 15 }}%"></div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Fraud Detection Alert -->
                <section class="bg-red-500/10 border border-red-500/30 rounded-xl p-6 backdrop-blur-xl shadow-2xl">
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-red-400 text-[40px] flex-shrink-0" style="font-variation-settings: 'FILL' 1;">warning</span>
                        <div class="flex-1">
                            <h3 class="font-headline-md text-headline-md text-red-400 mb-2">Fraud Detection Alert</h3>
                            <p class="font-body-md text-body-md text-red-200 mb-4">Suspicious bidding pattern detected in wheat market. User account FRM-9847 placed 47 bids in 8 minutes with abnormal price fluctuations.</p>
                            <div class="flex gap-3">
                                <button class="bg-red-500 text-white hover:bg-red-600 transition-colors px-4 py-2 rounded-lg font-label-bold text-label-bold">
                                    Investigate
                                </button>
                                <button class="bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors px-4 py-2 rounded-lg font-label-bold text-label-bold border border-red-500/50">
                                    Dismiss
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
@endsection
