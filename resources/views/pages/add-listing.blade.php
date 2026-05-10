@extends("layouts.app")

@section("content")

<!-- SideNavBar -->
<nav class="hidden md:flex fixed left-0 top-0 h-full flex-col py-6 px-4 z-50 bg-zinc-950/60 backdrop-blur-3xl h-screen w-64 border-r border-white/10 shadow-2xl shadow-emerald-500/5">
<div class="mb-8 px-4 flex items-center gap-3 cursor-pointer group active:scale-98 duration-200">
<div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center border border-emerald-500/30">
<span class="material-symbols-outlined text-emerald-500" style="font-variation-settings: 'FILL' 1;">grass</span>
</div>
<div>
<h1 class="text-lg font-bold text-emerald-500 font-label-bold">AgriTech</h1>
<p class="text-xs text-zinc-400 font-label-sm">Enterprise Tier</p>
</div>
</div>
<button class="mb-8 w-full bg-primary text-on-primary py-3 px-4 rounded-lg flex items-center justify-center gap-2 font-label-bold shadow-[0_0_20px_rgba(63,229,108,0.2)] hover:bg-primary-fixed transition-colors active:scale-98">
<span class="material-symbols-outlined text-on-primary">add</span>
            New Listing
        </button>
<ul class="flex flex-col gap-1 flex-1">
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Overview</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-emerald-500/10 text-emerald-400 border-r-2 border-emerald-500 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="inventory">inventory</span>
<span>Listings</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="gavel">gavel</span>
<span>Bidding</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
<span>Tracking</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="insights">insights</span>
<span>Analytics</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="warehouse">warehouse</span>
<span>Inventory</span>
</a>
</li>
</ul>
<div class="mt-auto border-t border-white/10 pt-4">
<ul class="flex flex-col gap-1">
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="contact_support">contact_support</span>
<span>Support</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 font-manrope text-sm font-semibold hover:bg-white/5 transition-all duration-300 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="manage_accounts">manage_accounts</span>
<span>Account</span>
</a>
</li>
</ul>
</div>
</nav>
<!-- TopAppBar (Mobile & Top layer) -->
<header class="fixed top-0 left-0 w-full z-40 flex items-center justify-between px-8 h-16 bg-zinc-950/40 backdrop-blur-2xl font-manrope text-sm font-medium tracking-wide docked full-width top-0 border-b border-white/10 shadow-[inset_0_1px_0_0_rgba(255,255,255,0.1)] md:pl-72 md:pr-8">
<div class="flex items-center gap-4">
<button class="md:hidden text-zinc-400 hover:text-emerald-400 transition-colors active:scale-98 duration-200">
<span class="material-symbols-outlined">menu</span>
</button>
<div class="text-xl font-black tracking-tighter text-emerald-500 md:hidden">AgriTech Precision</div>
<!-- Contextual Header Text for Desktop -->
<div class="hidden md:flex items-center gap-2 text-zinc-400">
<span>Listings</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-emerald-400 font-bold">New Listing</span>
</div>
</div>
<div class="flex items-center gap-4">
<button class="w-10 h-10 rounded-full flex items-center justify-center text-zinc-400 hover:bg-white/5 hover:text-emerald-400 transition-colors active:scale-98 duration-200">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="w-10 h-10 rounded-full flex items-center justify-center text-zinc-400 hover:bg-white/5 hover:text-emerald-400 transition-colors active:scale-98 duration-200">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<button class="w-10 h-10 rounded-full flex items-center justify-center text-zinc-400 hover:bg-white/5 hover:text-emerald-400 transition-colors active:scale-98 duration-200">
<span class="material-symbols-outlined" data-icon="help">help</span>
</button>
<div class="w-8 h-8 rounded-full overflow-hidden border border-white/10 ml-2">
<img alt="User profile" class="w-full h-full object-cover" data-alt="close-up portrait of a professional male farmer in his 40s wearing a rugged jacket against a blurred field background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLWAOjWnxHh8v-3Oc68uaCWA36Hq5qp1BgVbUBrEqq8YcaKR9sJw519-y-C7OtMlFr2jS19kdXmyfwTPALyuJP-I4SSc2jcDNagQ8sDOQ6kcwLOK4Q5VSEiZA939j-tys-FzEurGtxVuiaCt16nz8mf-KdZLCYZ4tuXZAKsZ9IdT4K6_Ql1JJrwdpe9ZOUjC0M9Blw8sR-Ei69GRfQMEsH9a_lKirb1mfL_1AZ_RkzNUUv2UZpXyL45ERXwkIIdbdeAMPVlNQV4A6M"/>
</div>
</div>
</header>
<!-- Main Content Area -->
<main class="flex-1 pt-24 px-4 md:px-margin-desktop pb-24 md:pl-[calc(256px+48px)] overflow-y-auto">
<div class="max-w-container-max mx-auto">
<header class="mb-12">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Create New Listing</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Provide precise details about your crop yield for the global marketplace.</p>
</header>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
<!-- Main Form Section -->
<div class="lg:col-span-8 space-y-6">
<!-- Basic Info Card -->
<div class="glass-panel rounded-xl p-8">
<h3 class="font-headline-md text-headline-md text-emerald-400 border-b border-white/10 pb-4 mb-6">Crop Identification</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Commodity Type</label>
<select class="w-full rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md appearance-none">
<option disabled="" selected="" value="">Select primary crop</option>
<option value="wheat">Hard Red Winter Wheat</option>
<option value="corn">Yellow Dent Corn</option>
<option value="soybeans">Soybeans (Clearfield)</option>
<option value="cotton">Upland Cotton</option>
</select>
</div>
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Variety / Strain</label>
<input class="w-full rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md" placeholder="e.g., Pioneer P1197" type="text"/>
</div>
<div class="space-y-2 md:col-span-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Harvest Date (Expected/Actual)</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500">calendar_today</span>
<input class="w-full rounded-lg form-input-dark py-3 pl-12 pr-4 font-body-md text-body-md" type="date"/>
</div>
</div>
</div>
</div>
<!-- Volume & Pricing Card -->
<div class="glass-panel rounded-xl p-8">
<h3 class="font-headline-md text-headline-md text-emerald-400 border-b border-white/10 pb-4 mb-6">Volume &amp; Target Economics</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Available Quantity</label>
<div class="flex gap-2">
<input class="flex-1 rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md" placeholder="0.00" type="number"/>
<select class="w-32 rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md">
<option value="bu">Bushels</option>
<option value="ton">Metric Tons</option>
<option value="lbs">Pounds</option>
</select>
</div>
</div>
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Target Price (per unit)</label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500 font-label-bold">$</span>
<input class="w-full rounded-lg form-input-dark py-3 pl-8 pr-4 font-body-md text-body-md" placeholder="0.00" step="0.01" type="number"/>
</div>
</div>
</div>
</div>
<!-- Quality Metrics Card -->
<div class="glass-panel rounded-xl p-8">
<div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
<h3 class="font-headline-md text-headline-md text-emerald-400">Quality Assays</h3>
<button class="text-emerald-500 hover:text-emerald-400 text-sm font-label-bold flex items-center gap-1 transition-colors">
<span class="material-symbols-outlined text-[18px]">upload_file</span>
                                Upload Lab Report
                            </button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Moisture Content</label>
<div class="relative">
<input class="w-full rounded-lg form-input-dark py-3 pr-8 pl-4 font-body-md text-body-md" placeholder="e.g. 13.5" step="0.1" type="number"/>
<span class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 font-label-bold">%</span>
</div>
</div>
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Test Weight</label>
<div class="relative">
<input class="w-full rounded-lg form-input-dark py-3 pr-12 pl-4 font-body-md text-body-md" placeholder="e.g. 60.0" step="0.1" type="number"/>
<span class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 font-label-bold text-xs">lb/bu</span>
</div>
</div>
<div class="space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Protein Grade</label>
<select class="w-full rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md appearance-none">
<option disabled="" selected="" value="">Select grade</option>
<option value="1">Grade 1 (&gt;14%)</option>
<option value="2">Grade 2 (12-14%)</option>
<option value="3">Grade 3 (&lt;12%)</option>
</select>
</div>
</div>
<div class="mt-6 space-y-2">
<label class="font-label-sm text-label-sm text-on-surface-variant block">Additional Notes / Certifications (Organic, Non-GMO, etc.)</label>
<textarea class="w-full rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md resize-none" placeholder="Enter any specific storage conditions, certifications, or field notes..." rows="3"></textarea>
</div>
</div>
</div>
<!-- Contextual Sidebar / Map Area -->
<div class="lg:col-span-4 space-y-6">
<!-- Location Context Card -->
<div class="glass-panel rounded-xl overflow-hidden flex flex-col">
<div class="p-6 border-b border-white/10">
<h3 class="font-headline-md text-headline-md text-on-surface">Origin Location</h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">Select the storage bin or field origin.</p>
</div>
<!-- Map Visual Placeholder -->
<div class="h-48 w-full bg-surface-container relative">
<div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80')] bg-cover bg-center opacity-40 mix-blend-luminosity" data-alt="aerial satellite view of circular crop fields and agricultural grids in a rural farming landscape with green and brown hues" data-location="Midwest Farmland" style=""></div>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent"></div>
<!-- Map Marker -->
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
<div class="w-4 h-4 bg-primary rounded-full shadow-[0_0_15px_rgba(63,229,108,0.8)] border-2 border-white relative z-10 animate-pulse"></div>
<div class="w-1 h-8 bg-gradient-to-b from-primary to-transparent -mt-1 opacity-50"></div>
</div>
</div>
<div class="p-6">
<select class="w-full rounded-lg form-input-dark py-3 px-4 font-body-md text-body-md appearance-none mb-4">
<option>Silo Alpha - North Farm</option>
<option>Silo Beta - East Annex</option>
<option>Field 7B (Direct Loading)</option>
</select>
<div class="flex items-center gap-2 text-zinc-400 font-label-sm">
<span class="material-symbols-outlined text-[16px]">location_on</span>
<span>Coordinates: 41.8781° N, 93.0977° W</span>
</div>
</div>
</div>
<!-- Action Summary Card -->
<div class="glass-panel rounded-xl p-6 border-t-2 border-primary">
<h4 class="font-label-bold text-label-bold text-on-surface mb-4 uppercase tracking-wider">Listing Summary</h4>
<ul class="space-y-3 mb-6">
<li class="flex justify-between items-center text-sm">
<span class="text-zinc-400">Est. Market Value</span>
<span class="text-on-surface font-mono">--</span>
</li>
<li class="flex justify-between items-center text-sm">
<span class="text-zinc-400">Platform Fee (1.5%)</span>
<span class="text-on-surface font-mono">--</span>
</li>
</ul>
<div class="pt-4 border-t border-white/10 flex flex-col gap-3">
<button class="w-full bg-primary text-on-primary py-3 px-4 rounded-lg font-label-bold shadow-[0_0_20px_rgba(63,229,108,0.2)] hover:bg-primary-fixed transition-colors active:scale-98">
                                Publish to Market
                            </button>
<button class="w-full bg-transparent border border-white/10 text-on-surface hover:bg-white/5 py-3 px-4 rounded-lg font-label-bold transition-colors active:scale-98">
                                Save as Draft
                            </button>
</div>
</div>
</div>
</div>
</div>
</main>

@endsection
