@extends('layouts.stitch')
@section('title', 'Forgot Password - AgriMandi')
@section('content')

<main class="min-h-screen bg-surface flex flex-col lg:grid lg:grid-cols-[42%_58%] overflow-x-hidden">
    <!-- Left Side: Visual & Brand Content -->
    <section class="relative hidden lg:flex flex-col justify-between p-12 xl:p-16 overflow-hidden bg-primary-container">
        <!-- Background Image with Premium Overlay -->
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover scale-105" src="{{ asset('images/auth-hero.png') }}" alt="AgriMandi Fields"/>
            <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/40 to-black/30"></div>
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        <!-- Logo/Top Content -->
        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center shadow-lg shadow-primary/30">
                    <span class="material-symbols-outlined text-white text-[24px]">agriculture</span>
                </div>
                <h2 class="font-headline-sm text-white font-bold tracking-tight">AgriMandi India</h2>
            </div>
        </div>

        <!-- Center Content -->
        <div class="relative z-10 max-w-md mt-auto mb-12">
            <h1 class="font-display-md text-display-md text-white mb-4 leading-tight">Recover Your <span class="text-primary-fixed">Account</span></h1>
            <p class="font-body-lg text-body-lg text-white/90 leading-relaxed">
                Enter your email address and we'll send you a link to reset your password and get back to trading.
            </p>
        </div>

        <!-- Footer Info -->
        <div class="relative z-10 flex justify-between items-center text-white/50 font-label-sm border-t border-white/10 pt-6">
            <p>© 2026 AgriMandi India</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition-colors">Privacy</a>
                <a href="#" class="hover:text-white transition-colors">Support</a>
            </div>
        </div>
    </section>

    <!-- Right Side: Interaction Shell -->
    <section class="flex flex-col items-center justify-center p-6 sm:p-12 lg:p-16 bg-surface overflow-y-auto">
        <div class="w-full max-w-[440px]">
            <div class="mb-10 lg:mb-12">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2 font-bold">Forgot Password?</h2>
                <p class="font-body-md text-on-surface-variant">No problem. Just let us know your email address.</p>
            </div>

            {{-- Session Status --}}
            @if(session('status'))
            <div class="mb-8 p-4 bg-primary/10 rounded-2xl border border-primary/20 animate-in fade-in slide-in-from-top-4 duration-300">
                <p class="font-label-md text-primary flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">check_circle</span>
                    {{ session('status') }}
                </p>
            </div>
            @endif

            {{-- Error Messages --}}
            @if($errors->any())
            <div class="mb-8 p-4 bg-error-container rounded-2xl border border-error/20 animate-shake">
                @foreach($errors->all() as $error)
                    <p class="font-label-md text-on-error-container flex items-center gap-3 mb-1 last:mb-0">
                        <span class="material-symbols-outlined text-error text-[20px]">error</span>
                        {{ $error }}
                    </p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="font-label-md text-on-surface-variant px-1" for="email">Email Address</label>
                    <div class="group relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">mail</span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="farmer@agrimandi.in"
                            class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40 @error('email') border-error @enderror"
                            required autofocus/>
                    </div>
                </div>

                <button class="w-full h-14 bg-primary text-white font-bold text-lg rounded-2xl shadow-xl shadow-primary/25 hover:bg-primary-container hover:text-on-primary-container active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-3 group" type="submit" id="resetBtn">
                    Send Reset Link
                    <span class="material-symbols-outlined text-[24px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
            </form>

            <div class="mt-10 text-center">
                <a class="text-primary font-bold hover:underline inline-flex items-center gap-2" href="{{ route('login') }}">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Back to Login
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
