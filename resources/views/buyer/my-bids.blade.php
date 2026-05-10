@extends('layouts.stitch')
@section('title', 'My Bids - AgriMandi')
@section('content')

<!-- Top Market Ticker (Specialty Component) -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 h-10 flex items-center overflow-hidden">
<div class="flex whitespace-nowrap animate-marquee items-center gap-lg px-margin-desktop">
<span class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
<span class="text-primary font-bold">WHEAT (MP)</span> ₹2,450/q <span class="text-primary">+1.2%</span>
</span>
<span class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
<span class="text-primary font-bold">SOYBEAN</span> ₹4,820/q <span class="text-error">-0.4%</span>
</span>
<span class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
<span class="text-primary font-bold">BASMATI RICE</span> ₹9,100/q <span class="text-primary">+0.8%</span>
</span>
<span class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
<span class="text-primary font-bold">MUSTARD SEED</span> ₹5,430/q <span class="text-primary">+2.1%</span>
</span>
<span class="flex items-center gap-xs font-label-sm text-label-sm text-on-surface-variant">
<span class="text-primary font-bold">COTTON</span> ₹7,200/q <span class="text-error">-1.1%</span>
</span>
</div>
</div>
<!-- Navigation Shell -->
<header class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)] flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50">
<div class="flex items-center gap-xl">
<span class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</span>
<nav class="hidden md:flex items-center gap-lg">
<a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" href="#">Marketplace</a>
<a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" href="#">Analytics</a>
<a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-md">
<button class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors">notifications</button>
<button class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors">language</button>
<div class="h-10 w-10 rounded-full bg-primary-container/20 border border-primary/20 overflow-hidden">
<img alt="Farmer profile avatar" data-alt="A professional portrait of a senior agricultural trader in his late 50s. He has a warm smile and is wearing a crisp, light blue linen shirt. The background is a brightly lit, clean white office space with soft emerald green plants. The lighting is soft, high-key, and premium, reflecting a modern corporate agricultural aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8qZ9d79J6RSv0VbP7fz5RTuJgZbH4x3kn_NtS9L--LNyb5ajtNW1o3dx5F2EVZOzviBaPgdpfWMfTt8_GbJBszA9RgqdjErpDIkXa-HITVfO_hJ5iVUVFQQjfp7Cb0kPcbnmDnuc5t-nKvHZ8-21wZnQd4CqJxLWEjTw0PhO507yxxkz0q7esnIscN7raBTFExXZjgq4u2ucvtJtzdxeNox7kd8xseID-7KPpZ43GoDiTtju7_5RmrTNMmqKL_PZfOU17Rw1PcApn"/>
</div>
</div>
</header>
<div class="flex min-h-screen">
<!-- Side Navigation (Authority: SideNavBar JSON) -->
<aside class="hidden md:flex flex-col w-72 bg-surface-container-low py-8 gap-4 border-r border-outline-variant/20 shadow-xl rounded-r-xl">
<div class="px-6 mb-4">
<div class="flex items-center gap-md">
<div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">agriculture</span>
</div>
<div>
<h2 class="font-headline-sm text-primary font-bold">AgriMandi India</h2>
<p class="text-xs text-on-surface-variant">Premium Marketplace</p>
</div>
</div>
</div>
<nav class="flex flex-col">
<a class="flex items-center gap-md px-6 py-4 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md text-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-md px-6 py-4 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md text-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined">inventory_2</span>
<span>My Products</span>
</a>
<a class="flex items-center gap-md px-6 py-4 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg font-label-md text-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">gavel</span>
<span>Bids</span>
</a>
<a class="flex items-center gap-md px-6 py-4 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md text-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined">shopping_bag</span>
<span>Orders</span>
</a>
<a class="flex items-center gap-md px-6 py-4 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md text-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="mt-auto px-6">
<button class="w-full bg-primary text-white py-4 px-6 rounded-xl font-label-lg flex items-center justify-center gap-md active:scale-95 transition-transform">
<span class="material-symbols-outlined">analytics</span>
                    Market Insights
                </button>
</div>
</aside>
<!-- Main Dashboard Content -->
<main class="flex-1 px-margin-desktop py-xl overflow-y-auto">
<header class="flex flex-col md:flex-row justify-between items-start md:items-end gap-md mb-xl">
<div>
<h1 class="font-display-lg text-display-lg text-on-surface">Active Bids</h1>
<p class="text-on-surface-variant font-body-lg text-body-lg">Track and manage your agricultural commodity bids in real-time.</p>
</div>
<div class="flex gap-md">
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant">search</span>
<input class="pl-10 pr-4 py-2 border border-outline-variant/30 rounded-lg bg-surface-container-lowest focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Search bids..." type="text"/>
</div>
<button class="flex items-center gap-sm bg-surface-container-highest px-4 py-2 rounded-lg font-label-lg text-on-surface">
<span class="material-symbols-outlined">filter_list</span> Filter
                    </button>
</div>
</header>
<!-- Stats Overview (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-xl">
<div class="bg-surface-container-lowest emerald-glow rounded-xl p-lg border border-outline-variant/10">
<div class="flex justify-between items-start mb-md">
<div class="p-2 bg-primary/10 rounded-lg text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
</div>
<span class="text-xs font-bold text-primary bg-primary/5 px-2 py-1 rounded-full">+12% vs last month</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">Total Bid Value</p>
<h3 class="text-headline-lg font-headline-lg text-on-surface mt-xs">₹12,45,000</h3>
</div>
<div class="bg-surface-container-lowest emerald-glow rounded-xl p-lg border border-outline-variant/10">
<div class="flex justify-between items-start mb-md">
<div class="p-2 bg-tertiary-container/10 rounded-lg text-tertiary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">timer</span>
</div>
<span class="text-xs font-bold text-tertiary bg-tertiary/5 px-2 py-1 rounded-full">4 Closing Soon</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">Active Auctions</p>
<h3 class="text-headline-lg font-headline-lg text-on-surface mt-xs">08</h3>
</div>
<div class="bg-surface-container-lowest emerald-glow rounded-xl p-lg border border-outline-variant/10">
<div class="flex justify-between items-start mb-md">
<div class="p-2 bg-secondary-container/30 rounded-lg text-secondary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
<span class="text-xs font-bold text-secondary bg-secondary/5 px-2 py-1 rounded-full">92% Success Rate</span>
</div>
<p class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">Won This Week</p>
<h3 class="text-headline-lg font-headline-lg text-on-surface mt-xs">14</h3>
</div>
</div>
<!-- Active Bids Grid -->
<div class="space-y-gutter">
<!-- Bid Card 1: Leading -->
<div class="premium-card bg-surface-container-lowest emerald-glow rounded-xl p-lg border border-outline-variant/20 flex flex-col md:flex-row gap-lg transition-all">
<div class="w-full md:w-48 h-32 rounded-xl overflow-hidden shrink-0">
<img alt="Wheat Harvest" class="w-full h-full object-cover" data-alt="A wide shot of a golden wheat field during the golden hour, with the sun low on the horizon creating long, soft shadows. The wheat stalks are captured in extreme detail, showing their textured husks. The image is bright, warm, and professional, using a shallow depth of field to emphasize agricultural quality and a modern light-mode brand aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpp_bYISzRXKkk1sgiixaClCUCybA5nG6YqrQ-lvILfIWFvoi5f95LzlrtLhZPQU3SxukwoHCt0W4hED-N0HQ00m3sqZ0Y-rD2YPfBbAPAmbQKdU0aGSKgJgTB4toKcUaq5PTpmBOqSQYg8LGKxsxbb0c4rpg7AaQFJm7bBlmP0eRfbklQAI8zKPatelReJa-NBSMpxz_43qr_BYIZPD1vbOJ0HidgN7qcaAw2NsrifRPJmsihtpJZy8ErzY7UNZc6W2RMszJzKbRL"/>
</div>
<div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-lg">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-xs mb-2">
<span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Leading</span>
<span class="text-on-surface-variant text-label-sm font-label-sm">#BID-8842</span>
</div>
<h4 class="font-headline-md text-on-surface mb-1">Premium Sharbati Wheat</h4>
<p class="text-on-surface-variant text-body-md flex items-center gap-1">
<span class="material-symbols-outlined text-[18px]">location_on</span> Sehore, Madhya Pradesh
                            </p>
</div>
<div class="flex flex-col justify-center">
<p class="text-on-surface-variant text-label-sm font-label-sm uppercase">Your Bid</p>
<h5 class="text-headline-md font-bold text-primary">₹2,480 <span class="text-label-sm font-normal text-on-surface-variant">/quintal</span></h5>
<p class="text-xs text-on-surface-variant">Total: 250 Quintals</p>
</div>
<div class="flex flex-col justify-center items-end">
<div class="flex items-center gap-sm text-error mb-2">
<span class="material-symbols-outlined">schedule</span>
<span class="font-bold">02h : 14m : 05s</span>
</div>
<button class="bg-primary text-white px-6 py-2 rounded-lg font-label-lg hover:bg-primary/90 transition-colors">Increase Bid</button>
</div>
</div>
</div>
<!-- Bid Card 2: Outbid -->
<div class="premium-card bg-surface-container-lowest emerald-glow rounded-xl p-lg border border-outline-variant/20 flex flex-col md:flex-row gap-lg transition-all opacity-90 grayscale-[0.2]">
<div class="w-full md:w-48 h-32 rounded-xl overflow-hidden shrink-0">
<img alt="Mustard Seeds" class="w-full h-full object-cover" data-alt="Close-up macro photography of high-quality yellow mustard seeds in a clean white laboratory dish. The lighting is sterile, bright, and clinical, highlighting the uniform size and color of the seeds. The background is a soft, out-of-focus emerald green, maintaining a premium high-tech agricultural feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpc4MZCvrfYsRg8OmVZHIKym_bgjKWW4wecURjlsaetragrdPtKdgGYbU7L_K74Vj-NP5Uj5qiyPBK7dr0oaF-Vb0xiuR0ZQxvfeu3pbXHSwzF6PhjGbjw0xOYGbFY0tqJ0Z7L5ad1-S5cypCmCaD4TkHib-K3WQZrk-0SX4LeyjMOyS-TXHtsXBX57h-b0ZtmbT8IoG63Aflif6Z1XTVuXjPxS3XImb9CVyrliSzzWbUYs_MKWYD4wU3uEBR293xB7VVi5KqrVuvw"/>
</div>
<div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-lg">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-xs mb-2">
<span class="bg-error/10 text-error text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Outbid</span>
<span class="text-on-surface-variant text-label-sm font-label-sm">#BID-7721</span>
</div>
<h4 class="font-headline-md text-on-surface mb-1">Organic Mustard Seeds</h4>
<p class="text-on-surface-variant text-body-md flex items-center gap-1">
<span class="material-symbols-outlined text-[18px]">location_on</span> Kota, Rajasthan
                            </p>
</div>
<div class="flex flex-col justify-center">
<p class="text-on-surface-variant text-label-sm font-label-sm uppercase">Current Lead</p>
<h5 class="text-headline-md font-bold text-on-surface">₹5,430 <span class="text-label-sm font-normal text-on-surface-variant">/quintal</span></h5>
<p class="text-xs text-error font-medium">Your bid: ₹5,410</p>
</div>
<div class="flex flex-col justify-center items-end">
<div class="flex items-center gap-sm text-on-surface-variant mb-2">
<span class="material-symbols-outlined">schedule</span>
<span class="font-bold">14h : 55m : 12s</span>
</div>
<button class="bg-tertiary-container text-on-tertiary-container px-6 py-2 rounded-lg font-label-lg hover:opacity-90 transition-colors">Re-bid Now</button>
</div>
</div>
</div>
<!-- Bid Card 3: Pending Confirmation -->
<div class="premium-card bg-surface-container-lowest emerald-glow rounded-xl p-lg border border-outline-variant/20 flex flex-col md:flex-row gap-lg transition-all">
<div class="w-full md:w-48 h-32 rounded-xl overflow-hidden shrink-0">
<img alt="Rice Grains" class="w-full h-full object-cover" data-alt="A professional high-contrast photo of long-grain Basmati rice being poured into a pristine white ceramic bowl. The scene is illuminated by bright natural light, creating sharp, clean shadows. The color palette is composed of creamy whites and subtle silver tones, representing a sophisticated and premium agricultural product in a modern light-mode setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDH6slzmCFBdVgizp2kxKC5cNvPZKyvHXanVueRFBXVi4f6TobQuePQtnKdVhKlJHybsu7dNRUUu06ei0fVJiSHFxOJzZI4wAmc1y8yIQaSJPrYq1IF4EF6srzjkYCeJe5crADKxP-pU-qM308Rc83hvFyfC12_lQqIu0DTFGyA42Y3ui-DCbyn3qAYamNiOoOFrPcwmtjefR3Z9poLgqRk6OV8iGQF3gRlHgEJQFDau4kp1kpbKdNKUz_ZvjU5Ba1ScdfGhpQ33ubp"/>
</div>
<div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-lg">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-xs mb-2">
<span class="bg-secondary-container/30 text-secondary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Ends Soon</span>
<span class="text-on-surface-variant text-label-sm font-label-sm">#BID-9102</span>
</div>
<h4 class="font-headline-md text-on-surface mb-1">Long Grain Basmati Rice</h4>
<p class="text-on-surface-variant text-body-md flex items-center gap-1">
<span class="material-symbols-outlined text-[18px]">location_on</span> Karnal, Haryana
                            </p>
</div>
<div class="flex flex-col justify-center">
<p class="text-on-surface-variant text-label-sm font-label-sm uppercase">Highest Bid</p>
<h5 class="text-headline-md font-bold text-primary">₹9,100 <span class="text-label-sm font-normal text-on-surface-variant">/quintal</span></h5>
<p class="text-xs text-on-surface-variant">Total: 100 Quintals</p>
</div>
<div class="flex flex-col justify-center items-end">
<div class="flex items-center gap-sm text-error mb-2">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bolt</span>
<span class="font-bold">Last Call: 12m</span>
</div>
<button class="bg-primary text-white px-6 py-2 rounded-lg font-label-lg hover:bg-primary/90 transition-colors">Place Final Bid</button>
</div>
</div>
</div>
</div>
<!-- Activity Log (Recent Bidding War) -->
<section class="mt-xl">
<h2 class="font-headline-md text-on-surface mb-lg">Bidding History (BID-8842)</h2>
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant/10 overflow-hidden">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low">
<th class="px-lg py-4 font-label-lg text-secondary">Bidder ID</th>
<th class="px-lg py-4 font-label-lg text-secondary">Timestamp</th>
<th class="px-lg py-4 font-label-lg text-secondary">Amount (per q)</th>
<th class="px-lg py-4 font-label-lg text-secondary">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<tr class="hover:bg-surface-container/30 transition-colors">
<td class="px-lg py-4 font-body-md">You (ID-992)</td>
<td class="px-lg py-4 font-body-md text-on-surface-variant">10:42 AM, Today</td>
<td class="px-lg py-4 font-headline-sm text-primary font-bold">₹2,480</td>
<td class="px-lg py-4">
<span class="bg-primary/10 text-primary text-xs font-bold px-3 py-1 rounded-full">Winning</span>
</td>
</tr>
<tr class="hover:bg-surface-container/30 transition-colors">
<td class="px-lg py-4 font-body-md">Bidder #331</td>
<td class="px-lg py-4 font-body-md text-on-surface-variant">10:39 AM, Today</td>
<td class="px-lg py-4 font-body-lg">₹2,475</td>
<td class="px-lg py-4">
<span class="bg-surface-variant text-on-surface-variant text-xs font-bold px-3 py-1 rounded-full">Outbid</span>
</td>
</tr>
<tr class="hover:bg-surface-container/30 transition-colors">
<td class="px-lg py-4 font-body-md">Bidder #402</td>
<td class="px-lg py-4 font-body-md text-on-surface-variant">10:35 AM, Today</td>
<td class="px-lg py-4 font-body-lg">₹2,470</td>
<td class="px-lg py-4">
<span class="bg-surface-variant text-on-surface-variant text-xs font-bold px-3 py-1 rounded-full">Outbid</span>
</td>
</tr>
</tbody>
</table>
</div>
</section>
</main>
</div>
<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto">
<div class="col-span-1 md:col-span-1">
<span class="font-headline-md text-primary font-bold mb-4 block">AgriMandi India</span>
<p class="text-on-surface-variant font-body-md mb-6">Empowering Indian farmers through transparent, technology-driven marketplace solutions.</p>
</div>
<div class="col-span-1">
<h4 class="font-label-lg text-on-surface mb-4 uppercase tracking-wider">Marketplace</h4>
<nav class="flex flex-col gap-sm">
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Grains &amp; Pulses</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Oilseeds</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Cotton &amp; Fibres</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Quality Testing</a>
</nav>
</div>
<div class="col-span-1">
<h4 class="font-label-lg text-on-surface mb-4 uppercase tracking-wider">Resources</h4>
<nav class="flex flex-col gap-sm">
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Price Index</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Mandi Arrivals</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Trade Support</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Logistics</a>
</nav>
</div>
<div class="col-span-1">
<h4 class="font-label-lg text-on-surface mb-4 uppercase tracking-wider">Legal</h4>
<nav class="flex flex-col gap-sm">
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Terms of Service</a>
<a class="text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Contact Us</a>
</nav>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 flex flex-col md:flex-row justify-between items-center gap-md">
<p class="text-on-surface-variant font-body-md">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
<div class="flex gap-lg">
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary">language</span>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary">rss_feed</span>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-primary">groups</span>
</div>
</div>
</footer>
<!-- FAB for quick bid action (Contextual Primary) -->
<button class="fixed bottom-8 right-8 bg-primary text-white w-14 h-14 rounded-full shadow-lg flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
<span class="material-symbols-outlined">add</span>
</button>

@endsection
