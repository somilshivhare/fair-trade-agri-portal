@extends('layouts.stitch')
@section('title', 'Home Page - AgriMandi')
@section('content')
<!-- Market Ticker -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 overflow-hidden h-10 flex items-center">
<div class="flex items-center space-x-8 animate-marquee whitespace-nowrap px-margin-desktop">
<span class="flex items-center gap-2"><span class="text-label-sm font-label-sm text-on-surface-variant uppercase">Wheat (MP)</span> <span class="text-label-sm font-label-sm text-primary">₹2,450/q <span class="text-[10px]">▲ 1.2%</span></span></span>
<span class="flex items-center gap-2"><span class="text-label-sm font-label-sm text-on-surface-variant uppercase">Rice Basmati</span> <span class="text-label-sm font-label-sm text-primary">₹7,200/q <span class="text-[10px]">▼ 0.4%</span></span></span>
<span class="flex items-center gap-2"><span class="text-label-sm font-label-sm text-on-surface-variant uppercase">Soybean</span> <span class="text-label-sm font-label-sm text-primary">₹4,890/q <span class="text-[10px]">▲ 2.1%</span></span></span>
<span class="flex items-center gap-2"><span class="text-label-sm font-label-sm text-on-surface-variant uppercase">Cotton</span> <span class="text-label-sm font-label-sm text-primary">₹6,150/q <span class="text-[10px]">▲ 0.8%</span></span></span>
<span class="flex items-center gap-2"><span class="text-label-sm font-label-sm text-on-surface-variant uppercase">Maize</span> <span class="text-label-sm font-label-sm text-primary">₹2,100/q <span class="text-[10px]">▼ 1.5%</span></span></span>
<span class="flex items-center gap-2"><span class="text-label-sm font-label-sm text-on-surface-variant uppercase">Sugar</span> <span class="text-label-sm font-label-sm text-primary">₹3,850/q <span class="text-[10px]">▲ 0.5%</span></span></span>
</div>
</div>
<!-- TopNavBar -->
<header class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)] flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50">
<div class="flex items-center gap-12">
<h1 class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</h1>
<nav class="hidden md:flex items-center gap-8 font-label-md text-label-md">
<a class="text-primary border-b-2 border-primary pb-1" href="#">Marketplace</a>
<a class="text-on-surface-variant hover:text-on-surface transition-colors" href="#">Analytics</a>
<a class="text-on-surface-variant hover:text-on-surface transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-on-surface-variant">
<button class="hover:bg-primary-container/10 p-2 rounded-full transition-colors active:scale-95"><span class="material-symbols-outlined" data-icon="language">language</span></button>
<button class="hover:bg-primary-container/10 p-2 rounded-full transition-colors active:scale-95"><span class="material-symbols-outlined" data-icon="notifications">notifications</span></button>
</div>
<button class="bg-primary text-on-primary px-lg py-3 rounded-xl font-label-lg hover:opacity-90 active:scale-95 transition-all">Start Selling</button>
</div>
</header>
<main>
<!-- Hero Section -->
<section class="relative bg-surface-container-lowest pt-xl pb-24 overflow-hidden">
<div class="max-w-[1280px] mx-auto px-margin-desktop grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
<div class="z-10">
<span class="inline-block bg-primary-container/10 text-primary px-4 py-1.5 rounded-full text-label-sm font-bold mb-6">DIGITAL AGRICULTURE REVOLUTION</span>
<h2 class="font-display-lg text-display-lg text-on-surface mb-6 leading-[1.1]">The Future of <span class="text-primary">Agri-Trade</span> is Here</h2>
<p class="font-body-lg text-body-lg text-on-secondary-container mb-10 max-w-lg">Empowering farmers and buyers with a transparent, high-precision marketplace for premium agricultural commodities. Real-time data, secure logistics, and global reach.</p>
<div class="flex flex-wrap gap-4">
<button class="bg-primary text-on-primary px-8 py-4 rounded-2xl font-label-lg shadow-lg hover:shadow-primary/20 active:scale-95 transition-all">Start Selling</button>
<button class="bg-secondary-container text-primary px-8 py-4 rounded-2xl font-label-lg hover:bg-primary/10 active:scale-95 transition-all">Start Buying</button>
</div>
</div>
<div class="relative">
<div class="absolute -top-12 -right-12 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
<div class="absolute -bottom-12 -left-12 w-72 h-72 bg-tertiary-container/10 rounded-full blur-3xl"></div>
<div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl">
<img class="w-full h-[500px] object-cover" data-alt="A premium, high-resolution photograph of a professional drone hovering over a lush, vibrant green wheat field during the golden hour. The sunlight is soft and warm, reflecting off the technological surfaces of the drone. The background shows a vast, organized landscape of modern agriculture, embodying a high-tech harvest aesthetic with a bright, clean, light-mode atmosphere." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGjkjewRO0MBv7NkdOlbfleEsyRoPk_-mFqzFeqKoEIxLnSbGJp5Vso3B9nbCshz9BTiiQuPcKIicnf79YP7NnNicuLrSC-5BcnDd4zutNWbLhYjHmlcNqDE9TBB5dmNl-g88-Bfp9wzVV3PSOIL7WkecSfHBBthxFxLLM-SW1oEjknRjbxIDdj-pVeVEKPlfW12XwofmunVway7InOYVxgu0DqPkUXxZ8Gw0lm1NQAZ5-OEmoFHgRkkYJg5idJSexFYxn1xLBNefS"/>
</div>
<!-- Floating Stat Card -->
<div class="absolute -bottom-8 -left-8 bg-surface/90 backdrop-blur-md p-6 rounded-2xl emerald-glow border border-white/50 z-20 flex items-center gap-4">
<div class="bg-primary-container/20 p-3 rounded-xl">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="verified" data-weight="fill">verified</span>
</div>
<div>
<p class="text-label-sm font-bold text-on-surface-variant">CERTIFIED TRADERS</p>
<p class="text-headline-md font-bold text-primary">12,400+</p>
</div>
</div>
</div>
</div>
</section>
<!-- Stats Section -->
<section class="py-xl bg-background">
<div class="max-w-[1280px] mx-auto px-margin-desktop">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow premium-hover">
<div class="w-12 h-12 bg-primary-container/10 rounded-xl flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-primary" data-icon="trending_up">trending_up</span>
</div>
<h4 class="text-display-lg text-[32px] font-bold text-on-surface">₹500Cr+</h4>
<p class="text-body-md text-on-secondary-container">Annual Trade Volume</p>
</div>
<div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow premium-hover">
<div class="w-12 h-12 bg-primary-container/10 rounded-xl flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-primary" data-icon="public">public</span>
</div>
<h4 class="text-display-lg text-[32px] font-bold text-on-surface">22+</h4>
<p class="text-body-md text-on-secondary-container">States Covered</p>
</div>
<div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow premium-hover">
<div class="w-12 h-12 bg-primary-container/10 rounded-xl flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-primary" data-icon="groups">groups</span>
</div>
<h4 class="text-display-lg text-[32px] font-bold text-on-surface">1.2M</h4>
<p class="text-body-md text-on-secondary-container">Registered Farmers</p>
</div>
<div class="bg-surface-container-lowest p-lg rounded-2xl emerald-glow premium-hover">
<div class="w-12 h-12 bg-primary-container/10 rounded-xl flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-primary" data-icon="speed">speed</span>
</div>
<h4 class="text-display-lg text-[32px] font-bold text-on-surface">4hrs</h4>
<p class="text-body-md text-on-secondary-container">Avg. Auction Time</p>
</div>
</div>
</div>
</section>
<!-- Category Grid -->
<section class="py-xl bg-surface-container-low">
<div class="max-w-[1280px] mx-auto px-margin-desktop">
<div class="flex justify-between items-end mb-12">
<div>
<h3 class="font-headline-lg text-headline-lg text-on-surface mb-2">Trade by Category</h3>
<p class="text-body-md text-on-surface-variant">Access the most liquid commodity markets in India.</p>
</div>
<button class="text-primary font-label-lg flex items-center gap-2 hover:underline">
                        View All Categories <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
<!-- Category Card 1 -->
<div class="group relative overflow-hidden rounded-3xl h-64 bg-white">
<img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A close-up, high-detail shot of golden wheat grains overflowing from a clean burlap sack in a bright, sunlit warehouse. The lighting is crisp and natural, emphasizing the texture and premium quality of the grain. The aesthetic is clean and modern, representing a professional agricultural marketplace focused on cereals." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsLDagNHuY6yf9-zC-RNtQw1xpCQ3NiXSu5nZkmgHpv6yEsqZ3eCupP1FNWOxSUMO99Rl53_13HS8jmCT0DJ7fVM-sGXdCfQYZ-HSuiv3u35gYQWLGV2A7j0-SU68e7UoOdp5hMwYtkAr3NH6l0rkGeSVWrxAE59PCCnm3M7ZugBMPPrHtczboT0U-MXxqULWHBqO7wZ8v9I2nmj9KoeZNbNnc6STfduCZtSlB9iHtD7HTdIweo4FHMuFWDAZoenOn6jj5m7EY2Xj1"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<h5 class="text-headline-md font-bold mb-1">Cereals</h5>
<p class="text-label-sm opacity-80">Wheat, Rice, Maize, Millets</p>
</div>
</div>
<!-- Category Card 2 -->
<div class="group relative overflow-hidden rounded-3xl h-64 bg-white">
<img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="An assortment of colorful, high-quality pulses and lentils arranged in minimalist wooden bowls on a white stone surface. The lighting is bright and high-key, creating a fresh, laboratory-clean aesthetic. The vibrant oranges, greens, and browns of the lentils stand out against the neutral background, symbolizing premium agricultural quality." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBWjiFmn5mOGpjeDQhUHq409zXwPu7AIHTIFHEL0YTMAkgjMmHoxLq5rU9Bg5pcPfCUjqZa4XuRueSrOaEsFV-1h2nJaLrCcdnJ7t0RE0yXmYgFVaN8SLpD2jnhgQ8xIeguQrDzX4EUkRypVrgZo4UWtMOnNLsjW5I3_p2b51vjuRFxVDKyqO4kLHAoS3rOM0iaW5KrlTpi3ZEtrKGaSVjme29s4NaKkddSCVrGgU4s0dABgn4e5TR3OmM0iNPZQmz1N6PUwIUHAUl"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<h5 class="text-headline-md font-bold mb-1">Pulses</h5>
<p class="text-label-sm opacity-80">Gram, Tur, Lentils, Peas</p>
</div>
</div>
<!-- Category Card 3 -->
<div class="group relative overflow-hidden rounded-3xl h-64 bg-white">
<img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A macro shot of vibrant green soybean pods still attached to the plant, shimmering with morning dew. The sunlight is bright and clear, highlighting the organic texture and healthy color of the crop. The scene is peaceful and high-tech, representing modern oilseed farming with a premium light-mode feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtUxxDgISnVmSbwvwyNr0Dy_p4XS-U6Xn2kp1jZNV_bP8b9PUygqtK6BhyxsfltMQRO6VWK7Ti7CmGV6O_RUEajoZlsIpG0OOrJNpHLryP1P2zIDA_rbLryvmygpqbh9Bws0mL1dCKiLDLUNVg2qVsY_R_J6rrlFTcMe05gYdKkYeeaXRAXVBjgiJrc8EE01u_cc8DGkhC1tAePAsAChNC5fPoTeRD5u7RbzO4lk1h5iuYOwSEoNwxayVE79FH8nDtJq0blOxFu_5c"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<h5 class="text-headline-md font-bold mb-1">Oilseeds</h5>
<p class="text-label-sm opacity-80">Soybean, Mustard, Sunflower</p>
</div>
</div>
<!-- Category Card 4 -->
<div class="group relative overflow-hidden rounded-3xl h-64 bg-white">
<img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A sophisticated flat-lay of exotic spices like cardamom, cinnamon, and pepper on a clean, light marble surface. The arrangement is artistic and minimalist, with soft natural light creating subtle shadows. The aesthetic is modern and premium, highlighting the high-value commodity trade of spices in a clean, professional environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqmgNkZlAHz1uRAePJKK5g9dxWsLk_YaPHT27m_FbdiZMtYv4vlswkxT7k9EuhUS8XwW4TlcIaZ6_k1kHwfx7hT1s7NdYkdavo5CUWgLQXJ9a9MI79Q-05Qz3I-SJwhO46Xv0TkQVvXlGME-3mFnirtP5de7BkW9LZOYNTq6AhEArqafQefGG_081RAHkkH742wRAjMislAFIrYu6h-lvomRE_Ks3F8ocwPfTenR7ky1AxD4F3GVVfXXCd1AbGFnIdkHQHncjdWSqg"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<h5 class="text-headline-md font-bold mb-1">Spices</h5>
<p class="text-label-sm opacity-80">Cardamom, Cumin, Pepper</p>
</div>
</div>
</div>
</div>
</section>
<!-- How It Works -->
<section class="py-24 bg-surface-container-lowest">
<div class="max-w-[1280px] mx-auto px-margin-desktop text-center mb-16">
<h3 class="font-headline-lg text-headline-lg text-on-surface mb-4">Trading Made Simple</h3>
<p class="text-body-lg text-on-surface-variant max-w-2xl mx-auto">Our 3-step digital process ensures maximum efficiency and security for every transaction.</p>
</div>
<div class="max-w-[1280px] mx-auto px-margin-desktop">
<div class="grid grid-cols-1 md:grid-cols-3 gap-xl relative">
<!-- Connector Line (Desktop) -->
<div class="hidden md:block absolute top-1/2 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-primary/10 via-primary/40 to-primary/10 -translate-y-12"></div>
<!-- Step 1 -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-24 h-24 bg-primary-container text-on-primary flex items-center justify-center rounded-3xl shadow-lg shadow-primary/20 mb-8">
<span class="material-symbols-outlined text-[40px]" data-icon="inventory">inventory</span>
</div>
<h4 class="text-headline-md font-bold mb-4">List Stock</h4>
<p class="text-body-md text-on-secondary-container">Upload commodity details, quality reports, and warehouse location in minutes.</p>
</div>
<!-- Step 2 -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-24 h-24 bg-surface-container-high text-primary flex items-center justify-center rounded-3xl shadow-lg border border-primary/10 mb-8">
<span class="material-symbols-outlined text-[40px]" data-icon="gavel">gavel</span>
</div>
<h4 class="text-headline-md font-bold mb-4">Live Auction</h4>
<p class="text-body-md text-on-secondary-container">Verified buyers across India place real-time bids for your premium stock.</p>
</div>
<!-- Step 3 -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-24 h-24 bg-surface-container-high text-primary flex items-center justify-center rounded-3xl shadow-lg border border-primary/10 mb-8">
<span class="material-symbols-outlined text-[40px]" data-icon="local_shipping">local_shipping</span>
</div>
<h4 class="text-headline-md font-bold mb-4">Secure Fulfillment</h4>
<p class="text-body-md text-on-secondary-container">Automated payment settlements and logistics coordination for safe delivery.</p>
</div>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="py-xl">
<div class="max-w-[1280px] mx-auto px-margin-desktop">
<div class="bg-primary rounded-[32px] p-12 lg:p-20 relative overflow-hidden">
<div class="absolute top-0 right-0 w-1/3 h-full opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
<div class="relative z-10 max-w-2xl">
<h2 class="font-display-lg text-[40px] text-white mb-6 leading-tight">Ready to Digitize Your Mandi Experience?</h2>
<p class="text-body-lg text-white/80 mb-10">Join thousands of progressive farmers and institutional buyers today. Get access to premium pricing and real-time insights.</p>
<div class="flex flex-wrap gap-4">
<button class="bg-white text-primary px-8 py-4 rounded-2xl font-bold hover:bg-surface-bright transition-colors active:scale-95">Open Account</button>
<button class="bg-primary-container text-white border border-white/20 px-8 py-4 rounded-2xl font-bold hover:bg-primary-container/80 transition-colors active:scale-95">Download App</button>
</div>
</div>
<div class="hidden lg:block absolute bottom-0 right-12 w-[300px]">
<img class="h-full object-contain translate-y-12" data-alt="A sleek, modern smartphone displaying a high-tech agricultural dashboard with emerald green graphs and market data. The phone is held by a hand against a clean, out-of-focus wheat field background. The lighting is bright and professional, creating a sense of reliability and modern efficiency in agricultural technology." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUTlKHPqFFVZ9qclvH0cPED7vWkwFT5xipd3hq8OS3qYHTs3ZQJrrE7ohOS-AapsMocjjkxg0w9ZRQy9Dv3gXtFNX6JzskrETeg9gtgEvvAz7KlpW_rh0gFyu69-TIqF0sds39_0XZHWCtOSfAVNHtqRiNz-Htx5ZZq6B16NzTctt6XolNPlSYXrLxmXUldAvf0OnZlhZvkvVg2dG6Fry9lvgDWtedZS4CoSwGVpyQDF2_ipOiDPwnXwgXzeIVfBbFTmDx0KunFFCg"/>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-[1280px] mx-auto">
<div class="col-span-1 md:col-span-1">
<h2 class="font-headline-md text-primary font-bold mb-4">AgriMandi India</h2>
<p class="text-on-surface-variant text-body-md mb-6 leading-relaxed">Cultivating digital growth through transparency, technology, and trust in the agricultural ecosystem.</p>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-container/20 text-primary transition-colors" href="#"><span class="material-symbols-outlined" data-icon="facebook">social_leaderboard</span></a>
<a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-container/20 text-primary transition-colors" href="#"><span class="material-symbols-outlined" data-icon="public">public</span></a>
</div>
</div>
<div>
<h4 class="font-label-lg text-on-surface font-bold mb-6">Marketplace</h4>
<ul class="space-y-4 text-on-surface-variant text-body-md">
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Buy Commodities</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Sell Your Stock</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Daily Mandi Rates</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Warehouse Listing</a></li>
</ul>
</div>
<div>
<h4 class="font-label-lg text-on-surface font-bold mb-6">Resources</h4>
<ul class="space-y-4 text-on-surface-variant text-body-md">
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Market Insights</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Trade Support</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Quality Standards</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Logistics Partners</a></li>
</ul>
</div>
<div>
<h4 class="font-label-lg text-on-surface font-bold mb-6">Support</h4>
<ul class="space-y-4 text-on-surface-variant text-body-md">
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Privacy Policy</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Terms of Service</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">Contact Us</a></li>
<li><a class="hover:text-primary hover:underline underline-offset-4 transition-all" href="#">FAQ</a></li>
</ul>
</div>
</div>
<div class="px-margin-desktop py-6 border-t border-outline-variant/10 max-w-[1280px] mx-auto text-center">
<p class="text-on-surface-variant text-label-sm">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>
@endsection
