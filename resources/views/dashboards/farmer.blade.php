@extends('layouts.app')

@section('title', 'Farmer Dashboard')

@section('content')
<div class="fixed inset-0 z-[-1] pointer-events-none">
    <img alt="aerial view of large scale industrial farm fields at twilight" class="w-full h-full object-cover opacity-[0.03] mix-blend-luminosity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGND9d4IhjFHm-LZAaHwxFto4eTvgCdcBBVr9yWVjNcI_FtUcS82ig8Kwc7znU3EOOjDomb3j3dyxPz3yWSc7jdmYfoDyfAO0bMp8FyjVVgx5VkdwR1Xf5pbVnHxiMh8PNdC5H_Me2ObUlIuIsvKmcdR9TiqsdOGUsR1n1O6GEDfCDM6Cel8YcOSql-ERXlRnjuc5U0NQlEs3MN7Remrl7oJ524JiAz6SoEjVUF9WYq8PMqDPNFsVffrXQwwzItr0a6HfjGh-d4V1Y" />
    <div class="absolute inset-0 bg-gradient-to-br from-background via-background to-surface-container-low/80"></div>
    <div class="absolute top-[20%] right-[10%] w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[10%] left-[20%] w-[400px] h-[400px] bg-secondary/5 rounded-full blur-[100px]"></div>
</div>

<!-- TopAppBar -->
<nav class="fixed top-0 left-0 w-full z-40 flex items-center justify-between px-8 h-16 bg-zinc-950/40 backdrop-blur-2xl border-b border-white/10 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.1)]">
    <div class="flex items-center gap-6">
        <div class="md:hidden flex items-center">
            <span class="material-symbols-outlined text-zinc-400 text-2xl cursor-pointer">menu</span>
        </div>
        <div class="text-xl font-black tracking-tighter text-emerald-500 md:hidden">AgriTech Precision</div>
        <div class="hidden md:flex items-center bg-white/5 border border-white/10 rounded-full px-4 py-2 w-72 focus-within:bg-white/10 focus-within:border-emerald-500/50 transition-colors">
            <span class="material-symbols-outlined text-zinc-400 text-sm mr-2">search</span>
            <input class="bg-transparent border-none outline-none text-zinc-300 placeholder-zinc-500 font-manrope text-sm font-medium tracking-wide w-full focus:ring-0 p-0" placeholder="Search data..." type="text"/>
        </div>
    </div>
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2">
            <button class="p-2 rounded-full hover:bg-white/5 hover:text-emerald-400 transition-colors text-zinc-400 active:scale-98 duration-200">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <button class="p-2 rounded-full hover:bg-white/5 hover:text-emerald-400 transition-colors text-zinc-400 active:scale-98 duration-200">
                <span class="material-symbols-outlined">settings</span>
            </button>
            <button class="p-2 rounded-full hover:bg-white/5 hover:text-emerald-400 transition-colors text-zinc-400 active:scale-98 duration-200">
                <span class="material-symbols-outlined">help</span>
            </button>
        </div>
        <div class="w-px h-6 bg-white/10 mx-2"></div>
        <img alt="User profile" class="w-9 h-9 rounded-full border border-white/20 object-cover cursor-pointer hover:border-emerald-500 transition-colors" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8iZCQ_wm5GS7IgO0aubK0i8L7mOPUJ7t9mjy7Hp9d8br-jl8S7xa_YOgISe8YNgK1wEOALWny1n9_Sp3vFbkXkEyt4l5Uez5yul_mQXqruaYcc_rCejMmQ16E38_1YW7mnJs5Sd5S2Uz8444tVPXbydgywgARisnBp4tEK7lMbjhQl8oQ0lKgW-cl6WNRW3hWz79nhykFOQVioJ0-kOdyM23nH6PskXuFveW7nlLg6Q0xrRN-LzrIzUWsuOWFmPaMUEZRwegcHJBc" />
    </div>
</nav>

<!-- SideNavBar -->
<aside class="hidden md:flex flex-col fixed left-0 top-0 h-full w-64 border-r py-6 px-4 z-50 bg-zinc-950/60 backdrop-blur-3xl border-white/10 shadow-2xl shadow-emerald-500/5">
    <div class="flex items-center gap-3 px-4 mb-10 mt-2">
        <div class="w-10 h-10 rounded-lg bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center shadow-[inset_0_1px_0_0_rgba(255,255,255,0.2)]">
            <span class="material-symbols-outlined text-emerald-500" style="font-variation-settings: 'FILL' 1;">eco</span>
        </div>
        <div>
            <h1 class="text-lg font-bold text-emerald-500 leading-tight">AgriTech</h1>
            <p class="text-zinc-500 text-xs font-manrope font-semibold uppercase tracking-wider">Enterprise Tier</p>
        </div>
    </div>

    <button class="mb-8 mx-2 bg-emerald-500 text-emerald-950 font-manrope text-sm font-bold py-3 rounded-lg shadow-[0_0_20px_rgba(16,185,129,0.3)] hover:bg-emerald-400 transition-all duration-300 active:scale-98 flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-[18px]">add</span>
        New Listing
    </button>

    <nav class="flex-1 flex flex-col gap-1">
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 bg-emerald-500/10 text-emerald-400 border-r-2 border-emerald-500 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">dashboard</span>
            Overview
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">inventory</span>
            Listings
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">gavel</span>
            Bidding
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">local_shipping</span>
            Tracking
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">insights</span>
            Analytics
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">warehouse</span>
            Inventory
        </a>
    </nav>

    <div class="mt-auto pt-6 border-t border-white/5 flex flex-col gap-1">
        <a class="flex items-center gap-3 px-4 py-2.5 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">contact_support</span>
            Support
        </a>
        <a class="flex items-center gap-3 px-4 py-2.5 rounded-lg font-manrope text-sm font-semibold transition-all duration-300 text-zinc-500 hover:text-emerald-200 hover:bg-white/5 active:translate-x-1" href="#">
            <span class="material-symbols-outlined text-[20px]">manage_accounts</span>
            Account
        </a>
    </div>
</aside>

<!-- Main Canvas -->
<main class="md:ml-64 pt-24 pb-12 px-margin-mobile md:px-margin-desktop min-h-screen">
    <div class="max-w-container-max mx-auto">
        <!-- Page Header -->
        <header class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Overview</h2>
                <p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                    Thursday, October 26, 2024
                </p>
            </div>
            <div class="flex gap-3">
                <button class="bg-surface-container border border-outline/20 text-on-surface font-label-bold text-label-bold py-2 px-4 rounded-lg flex items-center gap-2 hover:bg-surface-bright transition-colors">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    Export Report
                </button>
            </div>
        </header>

        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            <!-- Widget 1: Today's Mandi Price -->
            <div class="col-span-1 md:col-span-3 bg-surface-container/60 backdrop-blur-xl border border-outline/10 rounded-xl p-6 relative overflow-hidden shadow-[inset_0_1px_0_0_rgba(255,255,255,0.05)] flex flex-col justify-between min-h-[160px] group hover:bg-surface-container/80 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Today's Mandi Price</h3>
                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-sm">currency_rupee</span>
                    </div>
                </div>
                <div>
                    <div class="font-display-xl text-[40px] leading-tight text-on-surface font-extrabold mb-1 tracking-tighter">
                        <span class="text-2xl text-on-surface-variant mr-1">₹</span>2,450 <span class="text-sm font-normal text-on-surface-variant tracking-normal">/ qtl</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-primary font-label-sm text-label-sm bg-primary/10 w-fit px-2 py-0.5 rounded-full border border-primary/20">
                        <span class="material-symbols-outlined text-[14px]">trending_up</span>
                        +4.2% vs yesterday
                    </div>
                </div>
            </div>

            <!-- Widget 2: Highest Buyer Bid -->
            <div class="col-span-1 md:col-span-3 bg-surface-container/60 backdrop-blur-xl border border-outline/10 rounded-xl p-6 relative overflow-hidden shadow-[inset_0_1px_0_0_rgba(255,255,255,0.05)] flex flex-col justify-between min-h-[160px] group hover:bg-surface-container/80 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Highest Buyer Bid</h3>
                    <div class="w-8 h-8 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-sm">gavel</span>
                    </div>
                </div>
                <div>
                    <div class="font-display-xl text-[40px] leading-tight text-on-surface font-extrabold mb-1 tracking-tighter">
                        <span class="text-2xl text-on-surface-variant mr-1">₹</span>2,680 <span class="text-sm font-normal text-on-surface-variant tracking-normal">/ qtl</span>
                    </div>
                    <div class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Premium Grade Wheat
                    </div>
                </div>
            </div>

            <!-- Widget 3: Best Market Suggestion -->
            <div class="col-span-1 md:col-span-6 bg-surface-container/60 backdrop-blur-xl border border-outline/10 rounded-xl overflow-hidden relative min-h-[160px] shadow-[inset_0_1px_0_0_rgba(255,255,255,0.05)] flex">
                <div class="absolute inset-0 z-0">
                    <img alt="satellite map of agricultural regions" class="w-full h-full object-cover opacity-40 mix-blend-screen" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVPFkVkMUwf0v5LZBx7efzuHbr2VP7uHjc62WWfb2XoSngOwfnRkKt2bg5gbx_ZTKVBfzqqXBAlKEy0DpuPx1duGORpyyDy5jr8vGwT8qhNBzFPFszVSMXvX1KVwDJ3TZ0QMTqV3mpN8OEFwYZfLHe_CKFJJMo9UjczqvUGcu3qarAhOxFXlodAXgX3q3qbEFxThbKls6xJozsYg1dGu8bKNi-TvtjUJ0bTxuD9_q2dqp--uCmLucWfWhx7obRIPWZuK00Pu38wDyx" />
                    <div class="absolute inset-0 bg-gradient-to-r from-surface-container via-surface-container/80 to-transparent"></div>
                </div>
                <div class="relative z-10 p-6 flex flex-col justify-between w-full md:w-2/3">
                    <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-2 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-primary">route</span>
                        Best Market Suggestion
                    </h3>
                    <div>
                        <h4 class="font-headline-md text-headline-md text-on-surface mb-1">Azadpur Mandi</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Estimated margin increase of 12% considering transport costs.</p>
                        <div class="flex gap-4">
                            <div class="bg-surface-dim/80 backdrop-blur-md px-3 py-1.5 rounded-lg border border-outline/10 flex flex-col">
                                <span class="text-[10px] text-on-surface-variant uppercase tracking-wider">Distance</span>
                                <span class="font-label-bold text-label-bold text-on-surface">45 km</span>
                            </div>
                            <div class="bg-surface-dim/80 backdrop-blur-md px-3 py-1.5 rounded-lg border border-outline/10 flex flex-col">
                                <span class="text-[10px] text-on-surface-variant uppercase tracking-wider">Est. Travel</span>
                                <span class="font-label-bold text-label-bold text-on-surface">1h 15m</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget 4: Crop Performance Chart -->
            <div class="col-span-1 md:col-span-8 bg-surface-container/60 backdrop-blur-xl border border-outline/10 rounded-xl p-6 relative shadow-[inset_0_1px_0_0_rgba(255,255,255,0.05)] min-h-[400px] flex flex-col">
                <div class="flex justify-between items-center mb-6 border-b border-outline/10 pb-4">
                    <div>
                        <h3 class="font-headline-md text-headline-md text-on-surface">Crop Performance</h3>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mt-1">Yield estimation vs historical average (Tonnes/Ha)</p>
                    </div>
                    <select class="bg-surface-dim border border-outline/20 text-on-surface text-sm rounded-lg focus:ring-primary focus:border-primary block p-2 outline-none">
                        <option>Winter Wheat</option>
                        <option>Basmati Rice</option>
                        <option>Sugarcane</option>
                    </select>
                </div>

                <div class="flex-1 relative w-full mt-4">
                    <div class="absolute left-0 top-0 bottom-8 flex flex-col justify-between text-[10px] text-on-surface-variant font-manrope">
                        <span>4.5</span>
                        <span>4.0</span>
                        <span>3.5</span>
                        <span>3.0</span>
                        <span>2.5</span>
                    </div>
                    <div class="absolute left-6 right-0 top-0 bottom-8 flex flex-col justify-between">
                        <div class="w-full border-t border-outline/5"></div>
                        <div class="w-full border-t border-outline/5"></div>
                        <div class="w-full border-t border-outline/5"></div>
                        <div class="w-full border-t border-outline/5"></div>
                        <div class="w-full border-t border-outline/5"></div>
                    </div>
                    <div class="absolute left-6 right-0 top-2 bottom-8">
                        <svg class="w-full h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 100 100">
                            <defs>
                                <linearGradient id="chartGradient" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" stop-color="#3fe56c" stop-opacity="0.2"></stop>
                                    <stop offset="100%" stop-color="#3fe56c" stop-opacity="0"></stop>
                                </linearGradient>
                                <filter height="140%" id="glow" width="140%" x="-20%" y="-20%">
                                    <feGaussianBlur result="blur" stdDeviation="2"></feGaussianBlur>
                                    <feComposite in="SourceGraphic" in2="blur" operator="over"></feComposite>
                                </filter>
                            </defs>
                            <path d="M0,80 C20,70 40,90 60,40 C80,-10 100,30 100,30 L100,100 L0,100 Z" fill="url(#chartGradient)"></path>
                            <path d="M0,80 C20,70 40,90 60,40 C80,-10 100,30 100,30" fill="none" filter="url(#glow)" stroke="#3fe56c" stroke-width="2" vector-effect="non-scaling-stroke"></path>
                            <circle cx="60" cy="40" fill="#11131b" filter="url(#glow)" r="1.5" stroke="#3fe56c" stroke-width="1"></circle>
                            <circle cx="100" cy="30" fill="#11131b" filter="url(#glow)" r="1.5" stroke="#3fe56c" stroke-width="1"></circle>
                        </svg>
                    </div>
                    <div class="absolute left-6 right-0 bottom-0 flex justify-between text-[10px] text-on-surface-variant font-manrope pt-2">
                        <span>Week 1</span>
                        <span>Week 2</span>
                        <span>Week 3</span>
                        <span>Week 4</span>
                        <span>Current</span>
                    </div>
                    <div class="absolute right-[10%] top-[20%] bg-surface-container-highest border border-outline/20 rounded-lg p-3 shadow-xl backdrop-blur-md z-10 pointer-events-none">
                        <div class="text-[10px] text-on-surface-variant uppercase mb-1">Current Forecast</div>
                        <div class="font-label-bold text-primary flex items-center gap-1">
                            4.2 T/Ha
                            <span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget 5: Active Orders & Pending Payments -->
            <div class="col-span-1 md:col-span-4 flex flex-col gap-gutter">
                <!-- Active Orders -->
                <div class="flex-1 bg-surface-container/60 backdrop-blur-xl border border-outline/10 rounded-xl p-6 relative shadow-[inset_0_1px_0_0_rgba(255,255,255,0.05)]">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="font-label-bold text-label-bold text-on-surface flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-primary">shopping_cart</span>
                            Active Orders
                        </h3>
                        <a class="text-[12px] text-primary hover:text-primary-fixed transition-colors" href="#">View All</a>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between p-3 rounded-lg bg-surface-dim/50 border border-outline/5 hover:border-outline/20 transition-colors cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-surface-bright flex items-center justify-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-[18px]">agriculture</span>
                                </div>
                                <div>
                                    <div class="font-label-bold text-label-bold text-on-surface text-[13px]">ORD-9924</div>
                                    <div class="font-label-sm text-label-sm text-on-surface-variant">AgriCorp Inc.</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-label-bold text-label-bold text-on-surface text-[13px]">120 Tons</div>
                                <div class="text-[10px] text-primary bg-primary/10 px-1.5 py-0.5 rounded mt-1 inline-block">Processing</div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-lg bg-surface-dim/50 border border-outline/5 hover:border-outline/20 transition-colors cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-surface-bright flex items-center justify-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-[18px]">agriculture</span>
                                </div>
                                <div>
                                    <div class="font-label-bold text-label-bold text-on-surface text-[13px]">ORD-9918</div>
                                    <div class="font-label-sm text-label-sm text-on-surface-variant">Global Foods</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-label-bold text-label-bold text-on-surface text-[13px]">45 Tons</div>
                                <div class="text-[10px] text-secondary bg-secondary/10 px-1.5 py-0.5 rounded mt-1 inline-block text-on-surface-variant">In Transit</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Payments -->
                <div class="flex-1 bg-surface-container/60 backdrop-blur-xl border border-outline/10 rounded-xl p-6 relative shadow-[inset_0_1px_0_0_rgba(255,255,255,0.05)]">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="font-label-bold text-label-bold text-on-surface flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-error">account_balance_wallet</span>
                            Pending Payments
                        </h3>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="font-label-sm text-label-sm text-on-surface-variant mb-1">Total Outstanding</div>
                            <div class="font-headline-lg text-headline-lg text-on-surface tracking-tight">₹1,42,000</div>
                        </div>
                        <div class="w-12 h-12 rounded-full border-2 border-error/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-error">warning</span>
                        </div>
                    </div>
                    <div class="mt-5 pt-4 border-t border-outline/10">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-on-surface-variant font-label-sm">AgriCorp Inc. (Due Today)</span>
                            <span class="font-label-bold text-on-surface">₹85,000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
