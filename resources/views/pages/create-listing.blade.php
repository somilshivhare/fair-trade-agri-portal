@extends('layouts.app')

@section('title', 'Create New Listing - AgriTech Precision')

@section('content')
<div class="bg-background text-on-background font-body-md min-h-screen flex">
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
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-zinc-500 hover:text-emerald-200 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="{{ route('dashboard') }}">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
Overview
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-emerald-500/10 text-emerald-400 border-r-2 border-emerald-500 hover:bg-white/5 transition-all duration-300 active:translate-x-1 font-manrope text-sm font-semibold" href="{{ route('listings.create') }}">
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
<span class="material-symbols-outlined">chevron_right</span>
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
<img alt="User profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLWAOjWnxHh8v-3Oc68uaCWA36Hq5qp1BgVbUBrEqq8YcaKR9sJw519-y-C7OtMlFr2jS19kdXmyfwTPALyuJP-I4SSc2jcDNagQ8sDOQ6kcwLOK4Q5VSEiZA939j-tys-FzEurGtxVuiaCt16nz8mf-KdZLCYZ4tuXZAKsZ9IdT4K6_Ql1JJrwdpe9ZOUjC0M9Blw8sR-Ei69GRfQMEsH9a_lKirb1mfL_1AZ_RkzNUUv2UZpXyL45ERXwkIIdbdeAMPVlNQV4A6M" />
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
                <p class="font-body-md text-body-md text-on-surface-variant">List your crops on AgriNova marketplace and start receiving bids from verified buyers.</p>
            </section>

            <!-- Form Container -->
            <form class="space-y-6">
                <!-- Basic Information -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">info</span> Basic Information
                    </h2>

                    <div class="space-y-4">
                        <!-- Crop Type -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Crop Type <span class="text-red-400">*</span></label>
                            <select class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all">
                                <option selected disabled>Select crop...</option>
                                <option>Wheat</option>
                                <option>Rice</option>
                                <option>Soybeans</option>
                                <option>Cotton</option>
                                <option>Maize</option>
                                <option>Barley</option>
                                <option>Pulses</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <!-- Grade & Quality -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block font-label-bold text-label-bold text-on-surface mb-2">Grade <span class="text-red-400">*</span></label>
                                <select class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all">
                                    <option selected disabled>Select grade...</option>
                                    <option>Grade A (Premium)</option>
                                    <option>Grade B (Standard)</option>
                                    <option>Grade C (Good)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-label-bold text-label-bold text-on-surface mb-2">Quality Score <span class="text-red-400">*</span></label>
                                <input type="number" placeholder="0-100" min="0" max="100" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                            </div>
                        </div>

                        <!-- Harvest Date -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Harvest Date <span class="text-red-400">*</span></label>
                            <input type="date" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                        </div>
                    </div>
                </div>

                <!-- Quantity & Pricing -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">attach_money</span> Quantity & Pricing
                    </h2>

                    <div class="space-y-4">
                        <!-- Total Quantity -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Total Quantity <span class="text-red-400">*</span></label>
                            <div class="flex gap-2">
                                <input type="number" placeholder="0" class="flex-1 bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                                <select class="bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface focus:outline-none transition-all w-32">
                                    <option selected>Tons</option>
                                    <option>Kg</option>
                                    <option>Quintals</option>
                                </select>
                            </div>
                        </div>

                        <!-- Base Price -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Expected Base Price <span class="text-red-400">*</span></label>
                            <div class="flex gap-2">
                                <input type="number" placeholder="0" class="flex-1 bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                                <select class="bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface focus:outline-none transition-all w-32">
                                    <option selected>per ton</option>
                                    <option>per kg</option>
                                    <option>per quintal</option>
                                </select>
                            </div>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Leave empty to let buyers propose prices</p>
                        </div>

                        <!-- Minimum Bid -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Minimum Acceptable Bid</label>
                            <input type="number" placeholder="0" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Bids below this amount will be automatically rejected</p>
                        </div>
                    </div>
                </div>

                <!-- Quality Metrics -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">verified</span> Quality Metrics
                    </h2>

                    <div class="space-y-4">
                        <!-- Moisture -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Moisture Content (%)</label>
                            <input type="number" placeholder="0" min="0" max="100" step="0.1" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                        </div>

                        <!-- Protein -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Protein Content (%)</label>
                            <input type="number" placeholder="0" min="0" max="100" step="0.1" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                        </div>

                        <!-- Variety -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Variety / Strain</label>
                            <input type="text" placeholder="e.g., HD2733, IR64" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                        </div>
                    </div>
                </div>

                <!-- Location & Logistics -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">location_on</span> Location & Logistics
                    </h2>

                    <div class="space-y-4">
                        <!-- Farm Location -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Farm Location <span class="text-red-400">*</span></label>
                            <input type="text" placeholder="Enter farm address" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                        </div>

                        <!-- Storage -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">Storage Location</label>
                            <input type="text" placeholder="e.g., Mandi facility, Cold storage" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                        </div>

                        <!-- Delivery Terms -->
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-3">Delivery Terms <span class="text-red-400">*</span></label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="delivery" value="farmer-pickup" class="w-4 h-4 cursor-pointer" />
                                    <span class="font-body-md text-body-md text-on-surface">Buyer arranges pickup from farm</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="delivery" value="mandi-delivery" class="w-4 h-4 cursor-pointer" />
                                    <span class="font-body-md text-body-md text-on-surface">Delivery to specified Mandi</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="delivery" value="flexible" class="w-4 h-4 cursor-pointer" checked />
                                    <span class="font-body-md text-body-md text-on-surface">Flexible / Negotiable</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Listing Duration -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">schedule</span> Listing Duration
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block font-label-bold text-label-bold text-on-surface mb-2">How long to keep listing active? <span class="text-red-400">*</span></label>
                            <select class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all">
                                <option selected>7 days (standard)</option>
                                <option>3 days (express)</option>
                                <option>14 days</option>
                                <option>30 days</option>
                                <option>Continuous until sold</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">description</span> Additional Details
                    </h2>

                    <div>
                        <label class="block font-label-bold text-label-bold text-on-surface mb-2">Crop Description</label>
                        <textarea placeholder="Share details about your crop, farming practices, certifications, or any other relevant information..." class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-3 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all h-32 resize-none"></textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button type="button" class="flex-1 bg-surface-container border border-white/10 text-on-surface hover:bg-surface-container-high transition-colors py-3 rounded-lg font-label-bold text-label-bold flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">close</span> Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-primary text-on-primary hover:bg-primary/80 transition-colors py-3 rounded-lg font-label-bold text-label-bold flex items-center justify-center gap-2 shadow-lg shadow-primary/50">
                        <span class="material-symbols-outlined">check_circle</span> Create Listing
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
@endsection
