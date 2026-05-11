@extends('layouts.stitch')
@section('title', 'Login - AgriMandi')
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
<span class="material-symbols-outlined text-primary text-[16px]">trendfx-row overflow-hidden">
<!-- Left Side: Visual & Brand Content -->
<section class="hidden md:flex md:w-1/2 relative bg-primary items-center justify-center p-xl overflow-hidden">
<div class="absolute inset-0 z-0 opacity-80">
<img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzQ5DhqIQ-0fa9i-8WJGhlVpi4Ay8-2SWJvalEbLCf9lYzB3kpRzapOQc1Z4bqDuMjUEuodhiq4xr2N91VRfqgkVbAWvXvAZtR0qmgcTHrXFSQ24OyYf7BICCA0Oiq8i7kGa_IZIT6UxWnOpEZd435oin73TiD71PGPWCHiHfql6SvSQ1-3g5UCjkXBfH5PqEOWp0vmn3buL4KcooCKrKO_j7z_UNvDpr_IcJUA_DXKjy3VRGy-csNSnhN23-duA4PMBFV-NaAHIz4" alt="AgriMandi - Agriculture Fields"/>
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
<div class="bg-surface-container-lowest rounded-[20px] p-xl border border-outline-variant/10" style="box-shadow: 0 4px 32px rgba(0,108,73,0.10);">
<div class="mb-xl">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Welcome Back</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Sign in to your trading dashboard</p>
</div>

{{-- Error Messages --}}
@if($errors->any())
<div class="mb-lg p-md bg-error-container rounded-xl border border-error/20">
    @foreach($errors->all() as $error)
        <p class="font-body-md text-body-md text-on-error-container flex items-center gap-sm">
            <span class="material-symbols-outlined text-error text-[18px]">error</span>
            {{ $error }}
        </p>
    @endforeach
</div>
@endif

@if(session('status'))
<div class="mb-lg p-md bg-primary/10 rounded-xl border border-primary/20">
    <p class="font-body-md text-body-md text-primary">{{ session('status') }}</p>
</div>
@endif

<form action="{{ route('login', ['redirect' => request('redirect')]) }}" class="space-y-lg" method="POST">
    @csrf
<div class="space-y-xs">
<label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="email">Email Address</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">mail</span>
<input class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50 @error('email') border-error @enderror" id="email" name="email" placeholder="farmer@agrimandi.in" type="email" value="{{ old('email') }}" autocomplete="email"/>
</div>
</div>
<div class="space-y-xs">
<div class="flex justify-between items-center px-1">
<label class="font-label-lg text-label-lg text-on-surface-variant" for="password">Password</label>
<a class="font-label-sm text-label-sm text-primary hover:underline" href="#">Forgot password?</a>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
<input class="w-full h-14 pl-12 pr-12 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50 @error('password') border-error @enderror" id="password" name="password" placeholder="••••••••" type="password" autocomplete="current-password"/>
<button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors" type="button" id="togglePassword" aria-label="Toggle password visibility">
<span class="material-symbols-outlined" id="togglePasswordIcon">visibility</span>
</button>
</div>
</div>
<div class="flex items-center gap-sm px-1">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/30" id="remember" name="remember" type="checkbox"/>
<label class="font-body-md text-body-md text-on-surface-variant" for="remember">Remember this device</label>
</div>
<button class="w-full h-14 bg-primary text-white font-label-lg text-label-lg rounded-xl shadow-lg shadow-primary/20 hover:bg-tertiary active:scale-[0.98] transition-all flex items-center justify-center gap-sm" type="submit" id="loginBtn">
                            Sign In to Marketplace
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</form>
<div class="relative my-xl">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-outline-variant/30"></div>
</div>
<div class="relative flex justify-center text-label-sm uppercase">
<span class="bg-surface-container-lowest px-4 text-on-surface-variant/60 tracking-widest">or</span>
</div>
</div>
<div class="grid grid-cols-2 gap-md">
<a href="{{ route('register') }}" class="h-12 border border-outline-variant/30 rounded-xl flex items-center justify-center gap-sm font-label-lg text-label-lg text-on-surface hover:bg-primary hover:text-white hover:border-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">person_add</span>
                            Register
                        </a>
<div class="relative">
<button id="langBtn" class="w-full h-12 border border-outline-variant/30 rounded-xl flex items-center justify-center gap-sm font-label-lg text-label-lg text-on-surface hover:bg-surface-container-low transition-colors" type="button">
<span class="material-symbols-outlined text-[20px]">language</span>
                            <span id="currentLang">English</span>
</button>
<!-- Language Dropdown -->
<div id="langDropdown" class="hidden absolute bottom-14 right-0 bg-surface-container-lowest border border-outline-variant/30 rounded-xl shadow-xl z-50 min-w-[160px] overflow-hidden">
    <button onclick="setLanguage('en', 'English')" class="w-full text-left px-md py-sm font-body-md text-body-md text-on-surface hover:bg-primary/10 hover:text-primary transition-colors flex items-center gap-sm">
        <span class="text-lg">🇮🇳</span> English
    </button>
    <button onclick="setLanguage('hi', 'हिंदी')" class="w-full text-left px-md py-sm font-body-md text-body-md text-on-surface hover:bg-primary/10 hover:text-primary transition-colors flex items-center gap-sm">
        <span class="text-lg">🇮🇳</span> हिंदी (Hindi)
    </button>
    <button onclick="setLanguage('mr', 'मराठी')" class="w-full text-left px-md py-sm font-body-md text-body-md text-on-surface hover:bg-primary/10 hover:text-primary transition-colors flex items-center gap-sm">
        <span class="text-lg">🇮🇳</span> मराठी (Marathi)
    </button>
    <button onclick="setLanguage('gu', 'ગુજરાતી')" class="w-full text-left px-md py-sm font-body-md text-body-md text-on-surface hover:bg-primary/10 hover:text-primary transition-colors flex items-center gap-sm">
        <span class="text-lg">🇮🇳</span> ગુજરાતી (Gujarati)
    </button>
    <button onclick="setLanguage('pa', 'ਪੰਜਾਬੀ')" class="w-full text-left px-md py-sm font-body-md text-body-md text-on-surface hover:bg-primary/10 hover:text-primary transition-colors flex items-center gap-sm">
        <span class="text-lg">🇮🇳</span> ਪੰਜਾਬੀ (Punjabi)
    </button>
</div>
</div>
</div>
<div class="mt-xl text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
                            New to the marketplace? 
                            <a class="text-primary font-bold hover:underline ml-1" href="{{ route('register') }}">Create Account</a>
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

@push('scripts')
<script>
// ── Password Toggle ──────────────────────────────────────────────
AgriUI.setupPasswordToggle('togglePassword', 'password', 'togglePasswordIcon');

// ── Language Dropdown ────────────────────────────────────────────
const langBtn = document.getElementById('langBtn');
const langDropdown = document.getElementById('langDropdown');

if (langBtn && langDropdown) {
    langBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        langDropdown.classList.toggle('hidden');
        langDropdown.classList.toggle('flex');
    });

    document.addEventListener('click', function (e) {
        if (!langDropdown.contains(e.target) && e.target !== langBtn) {
            langDropdown.classList.add('hidden');
            langDropdown.classList.remove('flex');
        }
    });
}

function setLanguage(code, name) {
    const label = document.getElementById('currentLang');
    if (label) label.textContent = name;
    if (langDropdown) {
        langDropdown.classList.add('hidden');
        langDropdown.classList.remove('flex');
    }
    localStorage.setItem('agrimandi_lang', code);
}

// ── Login Button Loading State ───────────────────────────────────
const loginForm = document.querySelector('form[action="{{ route('login') }}"]') 
    || document.querySelector('form');
const loginBtn = document.getElementById('loginBtn');

if (loginForm && loginBtn) {
    loginForm.addEventListener('submit', function () {
        loginBtn.disabled = true;
        loginBtn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">progress_activity</span> Signing In...';
    });
}
</script>
@endpush
@endsection
