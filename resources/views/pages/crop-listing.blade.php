@extends("layouts.app")

@section("content")

<!-- TopAppBar (Web & Mobile) -->
<nav class="fixed top-0 left-0 w-full z-40 flex items-center justify-between px-8 h-16 bg-zinc-950/40 backdrop-blur-2xl shadow-[inset_0_1px_0_0_rgba(255,255,255,0.1)] border-b border-white/10 md:pl-72 transition-all duration-300">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-primary text-2xl md:hidden" data-icon="menu">menu</span>
<div class="text-xl font-black tracking-tighter text-emerald-500 font-headline-md text-primary md:hidden">AgriTech Precision</div>
<div class="hidden md:flex items-center bg-surface-container-high rounded-full px-4 py-2 border border-outline-variant/50 focus-within:border-primary/50 focus-within:shadow-[0_0_15px_rgba(63,229,108,0.2)] transition-all">
<span class="material-symbols-outlined text-on-surface-variant mr-2" data-icon="search">search</span>
<input class="bg-transparent border-none text-on-surface text-label-sm font-label-sm focus:ring-0 placeholder:text-on-surface-variant/70 w-64" placeholder="Search listings..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<button class="text-zinc-400 hover:bg-white/5 hover:text-emerald-400 transition-colors active:scale-98 duration-200 p-2 rounded-full relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-1 right-1 w-2 h-2 bg-primary rounded-full glow-line"></span>
</button>
<button class="text-zinc-400 hover:bg-white/5 hover:text-emerald-400 transition-colors active:scale-98 duration-200 p-2 rounded-full">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<button class="text-zinc-400 hover:bg-white/5 hover:text-emerald-400 transition-colors active:scale-98 duration-200 p-2 rounded-full hidden sm:block">
<span class="material-symbols-outlined" data-icon="help">help</span>
</button>
<div class="h-8 w-8 rounded-full overflow-hidden border border-outline-variant ml-2">
<img alt="User profile" class="w-full h-full object-cover" data-alt="close up portrait of a male farmer with weathered face in professional lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5L5BCRL-SAdgQQOLc4_Z68jV2_SNObnJvzqHtRHohOM_3AR7PCkRGLNfUWX9t9nlVVrCmUS1ZYSSkVmf7gNQ6KopGrT5tU0bGXRXWRJ-0ABqkbehTh2oUo_pZkamq4YSUNynErvNEGHF848vt6wk7w3Vx4Nr9VjvwWP16TOGIrqtGU-68vzwfh1ipl7WoBDfwdLDxX7BcfEnHt0yHv1NKNYT0Zem88J7NvfeCgdiCjoM5Pzu46dQWmLtc36XC72HWugNrMc4nco8U"/>
</div>
</div>
</nav>
<!-- SideNavBar (Web Only) -->
<aside class="hidden md:flex fixed left-0 top-0 h-full flex-col py-6 px-4 z-50 bg-zinc-950/60 backdrop-blur-3xl h-screen w-64 border-r border-white/10 shadow-2xl shadow-emerald-500/5">
<div class="flex items-center gap-3 px-4 mb-8">
<div class="h-10 w-10 rounded-lg bg-surface-container-high border border-outline-variant flex items-center justify-center overflow-hidden">
<span class="material-symbols-outlined text-primary" data-icon="eco">eco</span>
</div>
<div>
<div class="text-lg font-bold text-emerald-500 font-headline-md">AgriTech</div>
<div class="text-label-sm font-label-sm text-on-surface-variant">Enterprise Tier</div>
</div>
</div>
<button class="mb-8 mx-4 bg-primary text-on-primary font-label-bold text-label-bold py-3 px-4 rounded-lg flex items-center justify-center gap-2 hover:bg-primary-fixed transition-all hover:shadow-[0_0_20px_rgba(63,229,108,0.4)] active:scale-95">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span>
            New Listing
        </button>
<nav class="flex-1 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                Overview
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-emerald-500/10 text-emerald-400 border-r-2 border-emerald-500 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="inventory">inventory</span>
                Listings
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="gavel">gavel</span>
                Bidding
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
                Tracking
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="insights">insights</span>
                Analytics
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="warehouse">warehouse</span>
                Inventory
            </a>
</nav>
<div class="mt-auto space-y-2 pt-6 border-t border-white/5">
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="contact_support">contact_support</span>
                Support
            </a>
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 font-manrope text-sm font-semibold" href="#">
<span class="material-symbols-outlined" data-icon="manage_accounts">manage_accounts</span>
                Account
            </a>
</div>
</aside>
<!-- Main Canvas -->
<main class="flex-1 w-full pt-24 px-4 md:px-margin-desktop pb-24 md:pl-72 md:pb-12 min-h-screen relative z-10">
<!-- Background Ambient Effect -->
<div class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden">
<div class="absolute top-[-20%] left-[-10%] w-[60%] h-[60%] rounded-full bg-primary-container/5 blur-[120px]"></div>
<div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-blue-500/5 blur-[100px]"></div>
<!-- Background Image Overlay for Texture -->
<div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1592982537447-6f23c91d8bb7?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=2000&amp;q=80')] bg-cover bg-center mix-blend-overlay" data-alt="aerial view of structured vast agricultural fields in low light dramatic aesthetic"></div>
</div>
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2 tracking-tight">Active Listings</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">Monitor your current market offerings, live bids, and commodity status across all active contracts.</p>
</div>
<!-- Quick Stats Summary -->
<div class="flex gap-4 glass-panel rounded-xl p-2 items-center">
<div class="px-4 py-2 border-r border-white/5">
<div class="font-label-sm text-label-sm text-on-surface-variant mb-1">Total Active Volume</div>
<div class="font-headline-md text-headline-md text-on-surface text-primary">14.2k <span class="text-sm text-on-surface-variant font-normal">MT</span></div>
</div>
<div class="px-4 py-2">
<div class="font-label-sm text-label-sm text-on-surface-variant mb-1">Estimated Value</div>
<div class="font-headline-md text-headline-md text-on-surface">$4.2M</div>
</div>
</div>
</div>
<!-- Filters & Controls -->
<div class="flex flex-wrap items-center gap-4 mb-8">
<div class="flex gap-2 glass-panel rounded-lg p-1">
<button class="px-4 py-2 rounded-md bg-white/10 text-on-surface font-label-sm text-label-sm transition-colors border border-white/10">All Categories</button>
<button class="px-4 py-2 rounded-md text-on-surface-variant hover:text-on-surface hover:bg-white/5 font-label-sm text-label-sm transition-colors">Grains</button>
<button class="px-4 py-2 rounded-md text-on-surface-variant hover:text-on-surface hover:bg-white/5 font-label-sm text-label-sm transition-colors">Legumes</button>
<button class="px-4 py-2 rounded-md text-on-surface-variant hover:text-on-surface hover:bg-white/5 font-label-sm text-label-sm transition-colors">Specialty</button>
</div>
<div class="flex-1"></div>
<button class="glass-panel rounded-lg px-4 py-2 flex items-center gap-2 text-on-surface font-label-sm text-label-sm hover:bg-white/5 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                Filter
            </button>
<button class="glass-panel rounded-lg px-4 py-2 flex items-center gap-2 text-on-surface font-label-sm text-label-sm hover:bg-white/5 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="sort">sort</span>
                Sort: Highest Bid
            </button>
</div>
<!-- Bento Grid Layout for Listings -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<!-- Card 1: Featured/High Activity -->
<div class="glass-panel-elevated rounded-xl overflow-hidden col-span-1 md:col-span-2 lg:col-span-2 xl:col-span-2 row-span-2 flex flex-col group relative">
<div class="absolute inset-0 bg-gradient-to-t from-surface via-surface/80 to-transparent z-10"></div>
<img alt="Wheat field" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" data-alt="close up of golden wheat ready for harvest in soft late afternoon light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqsnG5S6Qeui0zIH58srTThlLehjQDMF3F2N9BpLzyLr1Rk1nsk9Et18yUNhboJ8q8137VKTZEIz1nKHS-GmtqBITtrOk4XSQ2ofJG9_NP2ufGVKjrYdyrZjtLfGeMkAbYTob6QxH2T_9wxVt_zHifYO53lWI6stwjzQuwB0CwlpDAGit2LvrOa6-8qVy5DEwsAOe9DvxTmEaCYCSK9mpgAjqbD0veasq61FT2e0h7p1BCpiwzi6PKoV2055AcHr5cJkxHhSQ9LzpG"/>
<div class="relative z-20 p-6 flex flex-col h-full justify-between">
<div class="flex justify-between items-start">
<div class="glass-panel px-3 py-1 rounded-full border border-primary/30 flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse shadow-[0_0_8px_#00c853]"></span>
<span class="font-label-sm text-label-sm text-primary uppercase tracking-wider">Hot Auction</span>
</div>
<button class="w-8 h-8 rounded-full glass-panel flex items-center justify-center hover:bg-white/10 text-on-surface">
<span class="material-symbols-outlined text-sm" data-icon="more_vert">more_vert</span>
</button>
</div>
<div class="mt-32">
<div class="flex items-center gap-3 mb-2">
<div class="w-10 h-10 rounded-lg bg-surface/80 backdrop-blur-md flex items-center justify-center border border-white/10 text-xl">🌾</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Hard Red Winter Wheat</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">Premium milling grade. Harvested Sector 4, moisture content 11.2%, protein 13%.</p>
<div class="grid grid-cols-2 gap-4">
<div class="glass-panel rounded-lg p-4">
<div class="font-label-sm text-label-sm text-on-surface-variant mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="scale">scale</span> Volume
                                </div>
<div class="font-headline-md text-headline-md text-on-surface">5,000 <span class="text-sm font-normal text-on-surface-variant">MT</span></div>
</div>
<div class="glass-panel rounded-lg p-4 relative overflow-hidden">
<div class="absolute top-0 right-0 w-16 h-16 bg-primary/10 rounded-bl-full blur-xl"></div>
<div class="font-label-sm text-label-sm text-primary mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span> Current Top Bid
                                </div>
<div class="font-headline-md text-headline-md text-on-surface">$342.50 <span class="text-sm font-normal text-on-surface-variant">/MT</span></div>
</div>
</div>
<div class="mt-6 flex items-center justify-between border-t border-white/10 pt-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-on-surface-variant text-sm" data-icon="timer">timer</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Ends in 4h 23m</span>
</div>
<div class="flex -space-x-2">
<div class="w-8 h-8 rounded-full bg-surface-container border-2 border-surface flex items-center justify-center text-xs font-bold text-on-surface-variant z-10">B1</div>
<div class="w-8 h-8 rounded-full bg-surface-container border-2 border-surface flex items-center justify-center text-xs font-bold text-on-surface-variant z-20">B2</div>
<div class="w-8 h-8 rounded-full bg-surface-container border-2 border-surface flex items-center justify-center text-xs font-bold text-on-surface-variant z-30">+4</div>
</div>
</div>
</div>
</div>
</div>
<!-- Card 2: Standard Listing -->
<div class="glass-panel rounded-xl p-6 flex flex-col hover:bg-white/[0.07] transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-lg bg-surface-container-high border border-white/5 flex items-center justify-center text-2xl relative overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-br from-yellow-500/20 to-transparent"></div>
                        🌽
                    </div>
<div class="px-2 py-1 rounded bg-surface border border-white/5 font-label-sm text-[10px] text-on-surface-variant uppercase tracking-wider">Accepting Bids</div>
</div>
<h3 class="font-headline-md text-xl font-semibold text-on-surface mb-1">Yellow Dent Corn</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mb-6 line-clamp-2">Grade 2, Non-GMO certified. Silo C storage.</p>
<div class="space-y-4 mt-auto">
<div class="flex justify-between items-baseline border-b border-white/5 pb-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Volume</span>
<span class="font-body-md text-body-md text-on-surface font-medium">12,500 MT</span>
</div>
<div class="flex justify-between items-baseline border-b border-white/5 pb-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Base Price</span>
<span class="font-body-md text-body-md text-on-surface font-medium">$215.00 /MT</span>
</div>
<div class="flex justify-between items-baseline">
<span class="font-label-sm text-label-sm text-primary">Highest Bid</span>
<span class="font-body-md text-body-md text-on-surface font-bold text-primary">$218.40 /MT</span>
</div>
</div>
</div>
<!-- Card 3: Standard Listing -->
<div class="glass-panel rounded-xl p-6 flex flex-col hover:bg-white/[0.07] transition-all duration-300">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-lg bg-surface-container-high border border-white/5 flex items-center justify-center text-2xl relative overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-transparent"></div>
                        🌱
                    </div>
<div class="px-2 py-1 rounded bg-surface border border-white/5 font-label-sm text-[10px] text-on-surface-variant uppercase tracking-wider">Accepting Bids</div>
</div>
<h3 class="font-headline-md text-xl font-semibold text-on-surface mb-1">Organic Soybeans</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mb-6 line-clamp-2">High protein content, clean sort. Ready for immediate transport.</p>
<div class="space-y-4 mt-auto">
<div class="flex justify-between items-baseline border-b border-white/5 pb-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Volume</span>
<span class="font-body-md text-body-md text-on-surface font-medium">3,200 MT</span>
</div>
<div class="flex justify-between items-baseline border-b border-white/5 pb-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Base Price</span>
<span class="font-body-md text-body-md text-on-surface font-medium">$540.00 /MT</span>
</div>
<div class="flex justify-between items-baseline">
<span class="font-label-sm text-label-sm text-on-surface-variant">Highest Bid</span>
<span class="font-body-md text-body-md text-on-surface font-bold">-- No Bids --</span>
</div>
</div>
</div>
<!-- Card 4: Status/Closed Listing -->
<div class="glass-panel rounded-xl p-6 flex flex-col opacity-80">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-lg bg-surface-container-high border border-white/5 flex items-center justify-center text-2xl grayscale">
                        🌻
                    </div>
<div class="px-2 py-1 rounded bg-surface-container-high border border-white/5 font-label-sm text-[10px] text-on-surface-variant uppercase tracking-wider flex items-center gap-1">
<span class="material-symbols-outlined text-[12px]" data-icon="check_circle">check_circle</span> Closed
                    </div>
</div>
<h3 class="font-headline-md text-xl font-semibold text-on-surface mb-1">Sunflower Seeds</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mb-6 line-clamp-2">High oil content variant. Contract fulfilled.</p>
<div class="space-y-4 mt-auto">
<div class="flex justify-between items-baseline border-b border-white/5 pb-2">
<span class="font-label-sm text-label-sm text-on-surface-variant">Volume</span>
<span class="font-body-md text-body-md text-on-surface-variant font-medium">800 MT</span>
</div>
<div class="flex justify-between items-baseline">
<span class="font-label-sm text-label-sm text-on-surface-variant">Final Price</span>
<span class="font-body-md text-body-md text-on-surface font-bold">$490.00 /MT</span>
</div>
</div>
<div class="mt-4 pt-4 border-t border-white/5">
<button class="w-full py-2 rounded border border-white/10 text-on-surface-variant font-label-sm hover:bg-white/5 transition-colors">View Contract</button>
</div>
</div>
<!-- Card 5: Upcoming Listing -->
<div class="glass-panel rounded-xl p-6 flex flex-col border-dashed border-white/20">
<div class="flex justify-between items-start mb-4">
<div class="w-12 h-12 rounded-lg bg-surface-container border border-dashed border-white/20 flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="schedule">schedule</span>
</div>
<div class="px-2 py-1 rounded bg-surface border border-white/5 font-label-sm text-[10px] text-on-surface-variant uppercase tracking-wider">Scheduled</div>
</div>
<h3 class="font-headline-md text-xl font-semibold text-on-surface mb-1">Barley (Malt Grade)</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mb-6 line-clamp-2">Pre-listing data gathering. Pending final quality inspection.</p>
<div class="mt-auto bg-surface-container rounded-lg p-3 text-center border border-white/5">
<div class="font-label-sm text-label-sm text-on-surface-variant mb-1">Opens for bidding in</div>
<div class="font-headline-md text-headline-md text-on-surface">2 Days</div>
</div>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full z-40 bg-zinc-950/80 backdrop-blur-2xl border-t border-white/5 pb-safe">
<div class="flex justify-around items-center h-16 px-2">
<a class="flex flex-col items-center justify-center w-full h-full text-zinc-500 hover:text-emerald-400 transition-colors" href="#">
<span class="material-symbols-outlined mb-1" data-icon="dashboard">dashboard</span>
<span class="font-manrope text-[10px] font-medium">Overview</span>
</a>
<a class="flex flex-col items-center justify-center w-full h-full text-emerald-400" href="#">
<span class="material-symbols-outlined mb-1" data-icon="inventory">inventory</span>
<span class="font-manrope text-[10px] font-medium">Listings</span>
</a>
<a class="flex flex-col items-center justify-center w-full h-full text-zinc-500 hover:text-emerald-400 transition-colors" href="#">
<span class="material-symbols-outlined mb-1" data-icon="gavel">gavel</span>
<span class="font-manrope text-[10px] font-medium">Bidding</span>
</a>
<a class="flex flex-col items-center justify-center w-full h-full text-zinc-500 hover:text-emerald-400 transition-colors" href="#">
<span class="material-symbols-outlined mb-1" data-icon="insights">insights</span>
<span class="font-manrope text-[10px] font-medium">Analytics</span>
</a>
</div>
</nav>

@endsection
