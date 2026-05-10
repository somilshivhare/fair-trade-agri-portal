@extends('layouts.stitch')
@section('title', 'Account Profile - AgriMandi')
@section('content')
<div class="w-full bg-surface-container-lowest h-8 border-b border-outline-variant/10 overflow-hidden flex items-center relative">
<div class="market-ticker flex whitespace-nowrap gap-12 items-center">
<span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">Wheat <span class="text-primary">₹2,450 (+1.2%)</span></span>
<span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">Rice (Basmati) <span class="text-primary">₹6,800 (+0.4%)</span></span>
<span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">Soybean <span class="text-error">₹4,120 (-0.8%)</span></span>
<span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">Mustard Seeds <span class="text-primary">₹5,400 (+2.1%)</span></span>
<span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">Cotton <span class="text-on-surface-variant">₹8,100 (0.0%)</span></span>
<span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant">Sugar <span class="text-primary">₹3,900 (+0.5%)</span></span>
</div>
</div>
<header class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)] flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50">
<div class="flex items-center gap-8">
<h1 class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</h1>
<nav class="hidden md:flex gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface" href="#">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface" href="#">Analytics</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-6">
<div class="hidden lg:flex items-center bg-surface-container-low rounded-full px-4 py-2 border border-outline-variant/30 w-64">
<span class="material-symbols-outlined text-outline">search</span>
<input class="bg-transparent border-none focus:ring-0 text-label-lg w-full" placeholder="Search commodities..." type="text"/>
</div>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors">notifications</button>
<button class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors">language</button>
<div class="h-10 w-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold overflow-hidden ring-2 ring-primary/20 ring-offset-2">
<img alt="Farmer profile avatar" data-alt="A professional studio portrait of a middle-aged South Asian man with a friendly, confident smile. He is wearing a crisp, light blue linen shirt against a clean, soft white background. The lighting is bright and airy, reflecting a premium light-mode UI aesthetic with high clarity and sophisticated corporate minimalism." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwKpwn0aooR8Lz5CDWdEq_vEt9EmbxbH2ceMFgIqVpdss7RTLeZEAqqmHzic3tLcoS76DMwMLT_sUvuUBaFxdzjO8O2WZCiGPjeZBjcYrFNr519mMGb2FImrmJYVVNxI-zZhx8V3sz1MuKfZ91AzDae99Df7aAU4SX5AXnH0h80a2foBNQrIcUqq_mirvBaCvqfBB42A8W9R8DVSSYZLB4YRRX4o9hyeLqEgmiWxskPAd0cHl4ghJFDfy8n0WvH56MZH5wIZsqm3Bk"/>
</div>
</div>
</div>
</header>
<div class="max-w-[1280px] mx-auto px-margin-desktop py-xl flex gap-gutter">
<aside class="hidden md:flex flex-col w-72 h-fit py-4 gap-2 bg-surface-container-low rounded-xl border-r border-outline-variant/20 shadow-xl overflow-hidden">
<div class="px-6 py-4 flex items-center gap-3">
<div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary">agriculture</span>
</div>
<div>
<h2 class="font-headline-sm text-primary font-bold">AgriMandi India</h2>
<p class="text-label-sm text-on-surface-variant">Premium Marketplace</p>
</div>
</div>
<div class="flex flex-col mt-4">
<a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300" href="#">
<span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>
<a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300" href="#">
<span class="material-symbols-outlined">inventory_2</span> My Products
                </a>
<a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300" href="#">
<span class="material-symbols-outlined">gavel</span> Bids
                </a>
<a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300" href="#">
<span class="material-symbols-outlined">shopping_bag</span> Orders
                </a>
<a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg active:translate-x-1" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">settings</span> Settings
                </a>
</div>
<div class="px-6 mt-xl">
<button class="w-full bg-primary text-on-primary py-3 rounded-lg font-label-lg hover:bg-primary/90 transition-colors shadow-emerald">
                    Market Insights
                </button>
</div>
</aside>
<main class="flex-1 space-y-lg">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-8">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Account Settings</h2>
<p class="text-body-lg text-on-surface-variant">Manage your commercial profile and trading preferences</p>
</div>
<button class="bg-primary-container text-on-primary-container px-6 py-3 rounded-lg font-label-lg flex items-center gap-2 active:scale-95 transition-transform duration-200">
<span class="material-symbols-outlined">verified</span> Verified Trader
                </button>
</div>
<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-emerald border border-outline-variant/10">
<div class="flex border-b border-outline-variant/10 overflow-x-auto no-scrollbar bg-surface-container-low/30">
<button class="px-6 py-4 font-label-md text-primary border-b-2 border-primary whitespace-nowrap">Personal Info</button>
<button class="px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Identity &amp; KYC</button>
<button class="px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Bank Accounts</button>
<button class="px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Security</button>
<button class="px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Notifications</button>
<button class="px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Tax Details</button>
<button class="px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Billing</button>
</div>
<div class="p-lg md:p-xl space-y-xl">
<section class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
<div class="col-span-1">
<h3 class="font-headline-md text-on-surface">Profile Identity</h3>
<p class="text-body-md text-on-surface-variant mt-2">Update your public trading identity and contact information visible to other market participants.</p>
</div>
<div class="lg:col-span-2 space-y-lg">
<div class="flex items-center gap-6 pb-6 border-b border-outline-variant/10">
<div class="relative group">
<img alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-emerald" data-alt="Close up of a professional farmer's profile picture. A man with graying hair and a kind expression, wearing a neutral colored shirt. The background is a blurred, high-end farm landscape during golden hour, emphasizing a professional yet agricultural focus. The overall tone is bright, modern, and trustworthy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcUzP4UDNRyrKphpf1j1ANbksCWzIyfdYsQ1WAaVypoKruPREutcHH7gZyDYpQDHji1APRcSNuWhNhLDom2Xd7H52gOZI1RTY7jGzFGN7y0ohd5RGi6PvnyhwhQMOgd8CFICkpPSargTlXN6VG8xaw8ycmYUvJjm2E_EsLz_fIzVZ-cbPaGg3oKDPyLW07WaEP05japkffbmbK7TrBLvvPhq2N7UzODPn582MuThajRKuk28WMmzoJjwFLikV4PoUyZNGWlV9zmx2-"/>
<button class="absolute bottom-0 right-0 bg-primary text-on-primary p-2 rounded-full shadow-emerald-lg">
<span class="material-symbols-outlined text-sm">photo_camera</span>
</button>
</div>
<div class="space-y-2">
<p class="font-label-lg text-on-surface">Change Profile Photo</p>
<p class="text-label-sm text-on-surface-variant">JPG, GIF or PNG. Max size of 800K</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
<div class="space-y-2">
<label class="font-label-lg text-on-surface ml-1">Full Name</label>
<input class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="text" value="Rajesh Kumar"/>
</div>
<div class="space-y-2">
<label class="font-label-lg text-on-surface ml-1">Business Name</label>
<input class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="text" value="Kumar Agritech Solutions"/>
</div>
<div class="space-y-2">
<label class="font-label-lg text-on-surface ml-1">Email Address</label>
<input class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="email" value="rajesh.kumar@agrimandi.in"/>
</div>
<div class="space-y-2">
<label class="font-label-lg text-on-surface ml-1">Phone Number</label>
<div class="flex gap-2">
<span class="flex items-center justify-center px-3 bg-surface-container-high rounded-xl text-on-surface-variant">+91</span>
<input class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="tel" value="9876543210"/>
</div>
</div>
</div>
</div>
</section>
<div class="h-px bg-outline-variant/20 w-full"></div>
<section class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
<div class="col-span-1">
<h3 class="font-headline-md text-on-surface">KYC Status</h3>
<p class="text-body-md text-on-surface-variant mt-2">Government identity and business registrations for trusted trading.</p>
</div>
<div class="lg:col-span-2">
<div class="bg-surface rounded-xl p-lg border border-outline-variant/20 flex flex-col md:flex-row items-center gap-lg">
<div class="w-16 h-16 bg-primary-container/20 rounded-full flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-4xl">verified_user</span>
</div>
<div class="flex-1 text-center md:text-left">
<h4 class="font-label-lg text-on-surface text-lg">Full Tier Verification Complete</h4>
<p class="text-body-md text-on-surface-variant">Your account has been verified for trades up to ₹50,00,000 per transaction.</p>
</div>
<button class="bg-secondary-container text-on-secondary-container px-6 py-2 rounded-lg font-label-lg hover:bg-secondary-container/80 transition-colors">View Documents</button>
</div>
</div>
</section>
<div class="h-px bg-outline-variant/20 w-full"></div>
<section class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
<div class="col-span-1">
<h3 class="font-headline-md text-on-surface">Preferences</h3>
<p class="text-body-md text-on-surface-variant mt-2">Configure how you receive market alerts and trade notifications.</p>
</div>
<div class="lg:col-span-2 space-y-md">
<div class="flex items-center justify-between p-4 bg-surface-container-low rounded-xl">
<div>
<p class="font-label-lg text-on-surface">WhatsApp Notifications</p>
<p class="text-label-sm text-on-surface-variant">Get instant bid updates on WhatsApp</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-11 h-6 bg-outline-variant/30 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
<div class="flex items-center justify-between p-4 bg-surface-container-low rounded-xl">
<div>
<p class="font-label-lg text-on-surface">Marketing Emails</p>
<p class="text-label-sm text-on-surface-variant">Weekly market insights and reports</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox"/>
<div class="w-11 h-6 bg-outline-variant/30 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
</div>
</section>
<div class="flex justify-end gap-4 pt-8">
<button class="px-6 py-3 rounded-lg border border-outline-variant text-on-surface-variant font-label-lg hover:bg-surface-variant transition-colors">Discard Changes</button>
<button class="px-10 py-3 rounded-lg bg-primary text-on-primary font-label-lg shadow-emerald hover:bg-primary/90 active:scale-95 transition-all">Save Changes</button>
</div>
</div>
</div>
</main>
</div>
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="max-w-[1280px] mx-auto px-margin-desktop py-12 grid grid-cols-1 md:grid-cols-4 gap-gutter">
<div class="space-y-4">
<h4 class="font-headline-md text-primary font-bold">AgriMandi India</h4>
<p class="text-body-md text-on-surface-variant">The future of agricultural commodity trading. Efficient, transparent, and digital-first.</p>
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70">social_leaderboard</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70">language</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70">alternate_email</span>
</div>
</div>
<div class="space-y-4">
<h5 class="font-label-lg text-on-surface">Resources</h5>
<ul class="space-y-2">
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Market Intelligence</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Price Trends</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Regulatory Updates</a></li>
</ul>
</div>
<div class="space-y-4">
<h5 class="font-label-lg text-on-surface">Legal</h5>
<ul class="space-y-2">
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Privacy Policy</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Terms of Service</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Trading Guidelines</a></li>
</ul>
</div>
<div class="space-y-4">
<h5 class="font-label-lg text-on-surface">Support</h5>
<ul class="space-y-2">
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Contact Us</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Trade Support</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Help Center</a></li>
</ul>
</div>
</div>
<div class="max-w-[1280px] mx-auto px-margin-desktop py-6 border-t border-outline-variant/10 text-center md:text-left">
<p class="text-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>
@endsection
