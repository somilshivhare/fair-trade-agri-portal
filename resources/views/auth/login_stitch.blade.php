@extends('layouts.stitch')
@section('title', 'Login & Register - AgriMandi')
@section('content')
<!-- Market Ticker Specialty Component -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 h-10 flex items-center overflow-hidden z-[60] relative">
<div class="flex items-center whitespace-nowrap animate-none px-gutter gap-xl">
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant">WHEAT (MP)</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹2,450.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant">SOYBEAN</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹4,820.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant">MUSTARD</span>
<span class="font-label-sm text-label-sm text-error font-bold">₹5,100.00</span>
<span class="material-symbols-outlined text-error text-[16px]">trending_down</span>
</div>
<div class="flex items-center gap-sm">
<span class="font-label-sm text-label-sm text-on-surface-variant">COTTON</span>
<span class="font-label-sm text-label-sm text-primary font-bold">₹7,200.00</span>
<span class="material-symbols-outlined text-primary text-[16px]">trending_up</span>
</div>
</div>
</div>
<main class="min-h-[calc(100vh-40px)] flex flex-col md:flex-row overflow-hidden">
<!-- Left Side: Visual & Brand Content -->
<section class="hidden md:flex md:w-1/2 relative bg-primary items-center justify-center p-xl overflow-hidden">
<div class="absolute inset-0 z-0 opacity-80">
<img class="w-full h-full object-cover" data-alt="A cinematic, high-resolution aerial view of lush, vibrant emerald green agricultural fields in India during the golden hour. The sunlight casts soft, warm glows across perfectly aligned crop rows, creating a sense of precision and abundance. The aesthetic is clean, professional, and technologically advanced, with a subtle high-tech overlay feel. The color palette is dominated by deep greens and bright highlights, embodying the High-Tech Harvest brand philosophy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzQ5DhqIQ-0fa9i-8WJGhlVpi4Ay8-2SWJvalEbLCf9lYzB3kpRzapOQc1Z4bqDuMjUEuodhiq4xr2N91VRfqgkVbAWvXvAZtR0qmgcTHrXFSQ24OyYf7BICCA0Oiq8i7kGa_IZIT6UxWnOpEZd435oin73TiD71PGPWCHiHfql6SvSQ1-3g5UCjkXBfH5PqEOWp0vmn3buL4KcooCKrKO_j7z_UNvDpr_IcJUA_DXKjy3VRGy-csNSnhN23-duA4PMBFV-NaAHIz4"/>
<div class="absolute inset-0 bg-gradient-to-tr from-primary/60 to-transparent"></div>
</div>
<div class="relative z-10 max-w-lg text-white">
<div class="mb-lg">
<h1 class="font-display-lg text-display-lg text-white mb-sm">AgriMandi India</h1>
<div class="h-1 w-20 bg-primary-fixed rounded-full"></div>
</div>
<p class="font-body-lg text-body-lg text-white/90 mb-xl leading-relaxed">
                    Connecting premium producers with institutional buyers through data-driven agricultural trade solutions.
                </p>
<!-- Trust Badges / Stats -->
<div class="grid grid-cols-2 gap-lg">
<div class="bg-white/10 backdrop-blur-md rounded-xl p-md border border-white/20">
<span class="font-headline-md text-headline-md block">50K+</span>
<span class="font-label-sm text-label-sm text-white/70">Verified Farmers</span>
</div>
<div class="bg-white/10 backdrop-blur-md rounded-xl p-md border border-white/20">
<span class="font-headline-md text-headline-md block">₹120Cr</span>
<span class="font-label-sm text-label-sm text-white/70">Monthly Trade</span>
</div>
</div>
</div>
</section>
<!-- Right Side: Interaction Shell -->
<section class="flex-1 bg-surface flex items-center justify-center p-gutter relative">
<!-- Mobile Top Bar Branding -->
<div class="absolute top-8 left-8 md:hidden">
<h2 class="font-headline-md text-headline-md text-primary font-bold tracking-tight">AgriMandi India</h2>
</div>
<div class="w-full max-w-[440px]">
<div class="bg-surface-container-lowest rounded-[20px] p-xl custom-shadow border border-outline-variant/10">
<div class="mb-xl">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Welcome Back</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Sign in to your trading dashboard</p>
</div>
<form action="#" class="space-y-lg" method="POST">
<div class="space-y-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="email">Email Address</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">mail</span>
<input class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50" id="email" name="email" placeholder="farmer@agrimandi.in" type="email"/>
</div>
</div>
<div class="space-y-xs">
<div class="flex justify-between items-center px-1">
<label class="font-label-lg text-label-lg text-on-surface-variant" for="password">Password</label>
<a class="font-label-sm text-label-sm text-primary hover:underline" href="#">Forgot password?</a>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
<input class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50" id="password" name="password" placeholder="••••••••" type="password"/>
<button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors" type="button">
<span class="material-symbols-outlined">visibility</span>
</button>
</div>
</div>
<div class="flex items-center gap-sm px-1">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/30" id="remember" type="checkbox"/>
<label class="font-body-md text-body-md text-on-surface-variant" for="remember">Remember this device</label>
</div>
<button class="w-full h-14 bg-primary text-white font-label-lg text-label-lg rounded-xl shadow-lg shadow-primary/20 hover:bg-tertiary active:scale-[0.98] transition-all flex items-center justify-center gap-sm" type="submit">
                            Sign In to Marketplace
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</form>
<div class="relative my-xl">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-outline-variant/30"></div>
</div>
<div class="relative flex justify-center text-label-sm uppercase">
<span class="bg-surface-container-lowest px-4 text-on-surface-variant/60 tracking-widest">or continue with</span>
</div>
</div>
<div class="grid grid-cols-2 gap-md">
<button class="h-12 border border-outline-variant/30 rounded-xl flex items-center justify-center gap-sm font-label-lg text-label-lg text-on-surface hover:bg-surface-container-low transition-colors">
<img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApemC2gQVBW2ETHAHskGvmPs4yVKQBSX5jzZR8_YCP89qMDtfyTQrTgnEOW2EtEoeXK6yGCPgd5LTOumiePK_WaquzFVrW1VFySN90fS6-8IUzi8tidnAx48fZXQgQDVUdR9oPCQ_y1ryFRomWwPywCiyWbjrNqWiy5hCI2RFTacoNBO3dvYODs71y-yFddoyV3ycu1Pl1Ws5eaq8g7O7FP7isGrHEki4qGbwiW2xGO1iQdLwQFoaSuqbc3JipAfECdU-hNzx4ueCR"/>
                            Google
                        </button>
<button class="h-12 border border-outline-variant/30 rounded-xl flex items-center justify-center gap-sm font-label-lg text-label-lg text-on-surface hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-[20px]">language</span>
                            Hindi
                        </button>
</div>
<div class="mt-xl text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
                            New to the marketplace? 
                            <a class="text-primary font-bold hover:underline ml-1" href="#">Create Account</a>
</p>
</div>
</div>
<!-- Footer Links Simplified for Login -->
<div class="mt-xl flex justify-center gap-lg">
<a class="font-label-sm text-label-sm text-on-surface-variant/70 hover:text-primary transition-colors" href="#">Privacy Policy</a>
<a class="font-label-sm text-label-sm text-on-surface-variant/70 hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="font-label-sm text-label-sm text-on-surface-variant/70 hover:text-primary transition-colors" href="#">Help Center</a>
</div>
<div class="mt-md text-center">
<p class="font-label-sm text-label-sm text-on-surface-variant/50">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</div>
</section>
</main>
<!-- FAB Support - Contextual Suppression Check: Login screen should not have primary FAB -->
@endsection
