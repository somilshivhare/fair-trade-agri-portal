@extends('layouts.stitch')
@section('title', 'Add Product - AgriMandi')
@section('content')

<!-- TopNavBar -->
<header class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)] flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50">
<div class="flex items-center gap-8">
<div class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</div>
<nav class="hidden md:flex items-center gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface hover:bg-primary-container/10 transition-colors" href="#">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface hover:bg-primary-container/10 transition-colors" href="#">Analytics</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface hover:bg-primary-container/10 transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-4">
<button class="hidden md:flex items-center gap-2 px-6 py-3 bg-primary text-on-primary rounded-xl font-label-lg active:scale-95 transition-transform duration-200">
                Start Selling
            </button>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined cursor-pointer hover:bg-primary-container/10 p-2 rounded-full transition-colors">notifications</span>
<span class="material-symbols-outlined cursor-pointer hover:bg-primary-container/10 p-2 rounded-full transition-colors">language</span>
<span class="font-label-md text-label-md ml-1">Hindi</span>
</div>
<div class="h-10 w-10 rounded-full overflow-hidden border-2 border-primary-container/20">
<img alt="Farmer profile avatar" class="w-full h-full object-cover" data-alt="Close up portrait of a professional modern farmer wearing a clean collared shirt, smiling confidently. The lighting is soft and natural, emphasizing a high-trust, premium agricultural brand aesthetic with a blurred organic green farm background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9sF3ocXwkg0W7pltb5ZR5stMM4c20-kE-wDtyckLFz8f22YPDJxfRKhczd-8rHas2QkQSzxy-2zo0SehirYC3XZ0V8ZqUVebPOJ_uNFAE-l4ur4kpIflQwW5ZjsPAxAXqUncIyq3ZDur6441v_x_SiUqe8tqCMJB_DPWF4gKpyu6Qy03eBxIi4zeBvzyEYbcAfgXD-Foo55tRZS9RzssmkmFNsKD2qZ9Hx3Uc_h5KV76ECUIysxialzbO6LQTs1qIJxAgO3ZaB3Jr"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="flex-grow max-w-[1280px] mx-auto w-full px-6 py-xl">
<!-- Page Header -->
<div class="mb-xl">
<div class="flex items-center gap-2 text-primary mb-2">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
<span class="font-label-lg text-label-lg uppercase tracking-wider">Back to My Products</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface">List New Commodity</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">Fill in the details below to list your agricultural produce on the premium AgriMandi India marketplace. Ensure all data is accurate for better buyer matching.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Form Section -->
<div class="lg:col-span-8 space-y-gutter">
<!-- Product Identity Card -->
<section class="bg-surface-container-lowest rounded-[20px] p-lg custom-shadow border border-outline-variant/10">
<h2 class="font-headline-md text-headline-md text-on-surface mb-md">Product Identity</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-md">
<div class="flex flex-col gap-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1">Crop Type</label>
<div class="relative">
<select class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none appearance-none">
<option>Select Crop</option>
<option>Wheat (Kanak)</option>
<option>Basmati Rice</option>
<option>Soybean</option>
<option>Cotton</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1">Variety/Grade</label>
<input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all placeholder:text-outline" placeholder="e.g. Sharbati, Pusa 1121" type="text"/>
</div>
<div class="flex flex-col gap-xs md:col-span-2">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1">Product Title</label>
<input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all placeholder:text-outline" placeholder="e.g. Premium Grade-A Basmati Rice - 2024 Harvest" type="text"/>
</div>
</div>
</section>
<!-- Logistics & Quantity Card -->
<section class="bg-surface-container-lowest rounded-[20px] p-lg custom-shadow border border-outline-variant/10">
<h2 class="font-headline-md text-headline-md text-on-surface mb-md">Quantity &amp; Pricing</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-md">
<div class="flex flex-col gap-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1">Total Quantity</label>
<div class="relative">
<input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="0.00" type="number"/>
<span class="absolute right-4 top-1/2 -translate-y-1/2 text-label-sm font-bold text-primary">MT</span>
</div>
</div>
<div class="flex flex-col gap-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1">Base Price</label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 text-label-lg font-bold text-on-surface-variant">₹</span>
<input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl pl-10 pr-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="Amount" type="number"/>
</div>
</div>
<div class="flex flex-col gap-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1">Unit</label>
<select class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none appearance-none">
<option>Per Quintal</option>
<option>Per Metric Ton</option>
<option>Per Bag (50kg)</option>
</select>
</div>
</div>
</section>
<!-- Visual Documentation Card -->
<section class="bg-surface-container-lowest rounded-[20px] p-lg custom-shadow border border-outline-variant/10">
<div class="flex justify-between items-center mb-md">
<h2 class="font-headline-md text-headline-md text-on-surface">Product Images</h2>
<span class="text-label-sm text-primary bg-primary-container/10 px-3 py-1 rounded-full">Required: 3-5 Photos</span>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-md">
<div class="aspect-square rounded-xl border-2 border-dashed border-primary/40 bg-primary-container/5 flex flex-col items-center justify-center cursor-pointer hover:bg-primary-container/10 transition-colors group">
<span class="material-symbols-outlined text-primary text-[32px] mb-2 group-hover:scale-110 transition-transform">add_a_photo</span>
<span class="font-label-sm text-label-sm text-primary">Upload</span>
</div>
<!-- Placeholder for uploaded image -->
<div class="aspect-square rounded-xl bg-surface-container-low overflow-hidden relative border border-outline-variant/20">
<img alt="Grains preview" class="w-full h-full object-cover" data-alt="Extreme macro shot of high-quality golden wheat grains, showing intricate texture and purity. The lighting is clean and bright, reflecting a premium agricultural product standard with soft emerald-tinted shadows in the depth of the pile." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIHdOvmTKqbuzNxRWAfCSxKQ3UXjW2nvdHeNckl-_b9OSGsHrXh2BNBTHH0B5rug9V7hNbfzMUX9037gp0d1udFH556wNZyEvN6NX1A-TCY-Jn2HeVXR7XLiBnL6gew0JQq8q6EHgm09cTrsWRjXxF5FCoire2oqFU2cSudXeBuYaPRqKH2rwCdYYCwZmwnMM54CAmg1oJLs9oQrRRTxTmjWRpIdf866h3R4DHEwSgAH1_WyNHhPdxTjAH6x0QzX1RvPK3G9ibVPLL"/>
<button class="absolute top-2 right-2 bg-on-surface/80 text-white rounded-full p-1 hover:bg-error transition-colors">
<span class="material-symbols-outlined text-[16px]">close</span>
</button>
</div>
<div class="aspect-square rounded-xl bg-surface-container-low border border-outline-variant/20 border-dashed"></div>
<div class="aspect-square rounded-xl bg-surface-container-low border border-outline-variant/20 border-dashed"></div>
</div>
<p class="mt-4 text-label-sm text-on-surface-variant italic">Upload clear photos of the grain, packaging, and any quality certifications.</p>
</section>
</div>
<!-- Sidebar / Summary Section -->
<aside class="lg:col-span-4 space-y-gutter">
<!-- Listing Summary -->
<div class="bg-surface-container-lowest rounded-[20px] p-lg custom-shadow border border-outline-variant/10 sticky top-24">
<h3 class="font-headline-sm text-headline-md text-on-surface mb-md">Listing Preview</h3>
<div class="space-y-4 mb-lg">
<div class="flex justify-between items-center text-body-md">
<span class="text-on-surface-variant">Market Visibility</span>
<span class="text-primary font-bold">Premium Tier</span>
</div>
<div class="flex justify-between items-center text-body-md">
<span class="text-on-surface-variant">Est. Service Fee</span>
<span class="text-on-surface">₹450.00</span>
</div>
<div class="flex justify-between items-center text-body-md">
<span class="text-on-surface-variant">Quality Verified</span>
<span class="material-symbols-outlined text-tertiary" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
</div>
<hr class="border-outline-variant/20 mb-lg"/>
<div class="bg-primary-container/10 p-md rounded-xl mb-lg">
<div class="flex gap-2 items-start text-primary">
<span class="material-symbols-outlined text-[20px] mt-0.5">lightbulb</span>
<p class="font-label-sm text-label-sm leading-relaxed">Top performing listings usually include at least one photo of the Moisture Meter reading.</p>
</div>
</div>
<div class="flex flex-col gap-3">
<button class="w-full py-4 bg-primary text-on-primary rounded-xl font-label-lg shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all">
                            Publish Listing
                        </button>
<button class="w-full py-4 bg-surface-container-low text-on-surface rounded-xl font-label-lg hover:bg-surface-container transition-colors">
                            Save as Draft
                        </button>
</div>
<div class="mt-6 flex items-center justify-center gap-2 text-on-surface-variant opacity-60">
<span class="material-symbols-outlined text-[16px]">lock</span>
<span class="text-label-sm">Secure Transaction Guaranteed</span>
</div>
</div>
<!-- Market Insight Mini Card -->
<div class="bg-surface-container-high/50 rounded-[20px] p-lg border border-outline-variant/20">
<h4 class="font-label-lg text-label-lg text-on-surface mb-3">Live Market Pulse</h4>
<div class="flex items-center gap-4">
<div class="flex-grow">
<div class="h-1 bg-outline-variant/30 rounded-full w-full overflow-hidden">
<div class="h-full bg-primary w-[75%] rounded-full"></div>
</div>
<div class="flex justify-between mt-2">
<span class="text-[10px] text-on-surface-variant uppercase font-bold">Low Demand</span>
<span class="text-[10px] text-primary uppercase font-bold">Peak Demand</span>
</div>
</div>
</div>
<p class="text-label-sm text-on-surface-variant mt-3 leading-tight">Basmati varieties are currently seeing 15% higher inquiry rates in your region.</p>
</div>
</aside>
</div>
</main>
<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-[1280px] mx-auto">
<div class="col-span-1 md:col-span-1">
<div class="font-headline-md text-primary font-bold mb-4">AgriMandi India</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">Empowering Indian farmers through transparent, high-tech commodity trading solutions.</p>
</div>
<div>
<h5 class="font-label-lg text-label-lg text-on-surface mb-4">Marketplace</h5>
<ul class="space-y-3">
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Commodities</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Market Insights</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Trading Rules</a></li>
</ul>
</div>
<div>
<h5 class="font-label-lg text-label-lg text-on-surface mb-4">Support</h5>
<ul class="space-y-3">
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Trade Support</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Contact Us</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">FAQs</a></li>
</ul>
</div>
<div>
<h5 class="font-label-lg text-label-lg text-on-surface mb-4">Legal</h5>
<ul class="space-y-3">
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Privacy Policy</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Terms of Service</a></li>
</ul>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 text-center">
<p class="font-body-md text-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>

@endsection
