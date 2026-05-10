@extends("layouts.app")

@section("content")
<body class="bg-background text-on-background font-body-md h-screen w-screen overflow-hidden flex selection:bg-primary-container selection:text-on-primary-container">
<!-- Split Screen Layout -->
<div class="flex w-full h-full">
<!-- Left Side: Image & Tech Overlays (Hidden on Mobile) -->
<div class="hidden lg:flex w-[55%] relative h-full flex-col justify-between p-12 bg-surface-container overflow-hidden">
<!-- Background Image -->
<img class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-luminosity" data-alt="Drone shot over vast, perfectly aligned green crop fields at twilight, dramatic tech aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQCcOVKCofbDlp7ooTn_RTwTcJaTdBWBVqPMb6Zor8Bk4INjTVGHuGK2zB7Vf0rNxQNM2Lkrh9j0ebI6VQ4DWkC3xdChzlzHuf6p3GOBev0pPT6gN4COE1466P0z4IwdqNAlM-dEqLGIFvaOJvVQqXZxPkzBI3hGep1QWpCTMjNXTnuLiPj68caYYhLGoNba0zqXfZ9cxbK7mHqOH7R4hA9OzgQChg9je0abiOSDVPA1S5kvt0ftQ4zNkyWdP-BvR-EE29D2l1C8DI"/>
<!-- Dark Gradient Overlay -->
<div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
<!-- Header/Logo Area -->
<div class="relative z-10">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[32px] text-primary" data-icon="eco">eco</span>
<span class="font-headline-lg text-headline-lg text-primary tracking-tight">AgriNova Tech</span>
</div>
</div>
<!-- Overlay Content -->
<div class="relative z-10 max-w-xl">
<div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-xl p-8 shadow-[0_8px_32px_0_rgba(0,0,0,0.36)]">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Precision Agriculture Systems</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-8">Access enterprise-grade analytics, crop health monitoring, and intelligent logistics networks.</p>
<!-- Stats Grid -->
<div class="grid grid-cols-2 gap-6">
<div class="flex flex-col border-l-2 border-primary pl-4">
<span class="font-headline-md text-headline-md text-primary">99.8%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Uptime Reliability</span>
</div>
<div class="flex flex-col border-l-2 border-primary pl-4">
<span class="font-headline-md text-headline-md text-primary">2.4M+</span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Acres Monitored</span>
</div>
</div>
</div>
</div>
</div>
<!-- Right Side: Form Container -->
<div class="w-full lg:w-[45%] h-full bg-surface flex flex-col justify-center px-8 sm:px-16 lg:px-24 overflow-y-auto relative">
<!-- Mobile Logo (visible only on small screens) -->
<div class="lg:hidden absolute top-8 left-8 flex items-center gap-2">
<span class="material-symbols-outlined text-[24px] text-primary" data-icon="eco">eco</span>
<span class="font-headline-md text-headline-md text-primary tracking-tight">AgriNova Tech</span>
</div>
<div class="w-full max-w-md mx-auto space-y-8 mt-16 lg:mt-0">
<!-- Toggle Header -->
<div class="space-y-2">
<h1 class="font-headline-lg text-headline-lg text-on-surface">Welcome back</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Enter your credentials to access the platform.</p>
</div>
<!-- Form -->
<form class="space-y-6" action="{{ route("login.store") }}" method="POST">@csrf
<!-- Email Input -->
<div class="space-y-2">
<label class="block font-label-bold text-label-bold text-on-surface" for="email">Email Address</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="mail">mail</span>
</div>
<input name="email" class="w-full bg-surface-container-lowest border border-outline-variant text-on-surface rounded-lg pl-10 pr-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary transition-all font-body-md text-body-md placeholder:text-on-surface-variant/50" id="email" placeholder="operator@farm.com" required="" type="email"/>
</div>
</div>
<!-- Password Input -->
<div class="space-y-2">
<div class="flex items-center justify-between">
<label class="block font-label-bold text-label-bold text-on-surface" for="password">Password</label>
<a class="font-label-sm text-label-sm text-primary hover:text-primary-fixed transition-colors" href="{{ route("password.request") }}">Forgot password?</a>
</div>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="lock">lock</span>
</div>
<input name="password" class="w-full bg-surface-container-lowest border border-outline-variant text-on-surface rounded-lg pl-10 pr-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary transition-all font-body-md text-body-md placeholder:text-on-surface-variant/50" id="password" placeholder="••••••••" required="" type="password"/>
</div>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary-container text-on-primary-container font-label-bold text-label-bold rounded-lg py-3 hover:bg-primary-fixed transition-colors flex justify-center items-center gap-2" type="submit">
<span>Sign In</span>
<span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
</button>
</form>
<!-- Divider -->
<div class="relative">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-outline-variant"></div>
</div>
<div class="relative flex justify-center text-sm">
<span class="px-2 bg-surface text-on-surface-variant font-label-sm text-label-sm">Or continue with</span>
</div>
</div>
<!-- SSO Options -->
<div class="grid grid-cols-2 gap-4">
<button class="flex items-center justify-center gap-2 py-2 px-4 border border-outline-variant rounded-lg bg-surface-container hover:bg-surface-container-high transition-colors text-on-surface font-label-bold text-label-bold">
<span class="material-symbols-outlined" data-icon="business">business</span>
                        Enterprise SSO
                    </button>
<button class="flex items-center justify-center gap-2 py-2 px-4 border border-outline-variant rounded-lg bg-surface-container hover:bg-surface-container-high transition-colors text-on-surface font-label-bold text-label-bold">
<span class="material-symbols-outlined" data-icon="fingerprint">fingerprint</span>
                        Biometric
                    </button>
</div>
<!-- Switch to Register -->
<p class="text-center font-body-md text-body-md text-on-surface-variant">
                    Don't have an account? <a class="text-primary hover:text-primary-fixed font-label-bold transition-colors" href="{{ route("register") }}">Request Access</a>
</p>
</div>
</div>
</div>
</body>
@endsection
