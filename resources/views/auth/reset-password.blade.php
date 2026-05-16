@extends('layouts.stitch')
@section('title', 'Reset Password - AgriMandi')
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
            <h1 class="font-display-md text-display-md text-white mb-4 leading-tight">Secure Your <span class="text-primary-fixed">Account</span></h1>
            <p class="font-body-lg text-body-lg text-white/90 leading-relaxed">
                Choose a strong new password to protect your agricultural trading profile and personal data.
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
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2 font-bold">Reset Password</h2>
                <p class="font-body-md text-on-surface-variant">Please enter your new security credentials.</p>
            </div>

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

            <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                {{-- Email (ReadOnly/Prefilled) --}}
                <div class="space-y-2">
                    <label class="font-label-md text-on-surface-variant px-1" for="email">Email Address</label>
                    <div class="group relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">mail</span>
                        <input id="email" name="email" type="email" value="{{ $email ?? old('email') }}"
                            class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md outline-none transition-all placeholder:text-outline/40 opacity-70 cursor-not-allowed"
                            required readonly/>
                    </div>
                </div>

                {{-- New Password --}}
                <div class="space-y-2">
                    <label class="font-label-md text-on-surface-variant px-1" for="password">New Password</label>
                    <div class="group relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">lock</span>
                        <input id="password" name="password" type="password" placeholder="Min 8 characters"
                            class="w-full h-14 pl-12 pr-12 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40 @error('password') border-error @enderror"
                            required autofocus/>
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" type="button" id="togglePassword">
                            <span class="material-symbols-outlined text-[20px]" id="togglePasswordIcon">visibility</span>
                        </button>
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="space-y-2">
                    <label class="font-label-md text-on-surface-variant px-1" for="password_confirmation">Confirm New Password</label>
                    <div class="group relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">lock_reset</span>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat password"
                            class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40"
                            required/>
                    </div>
                </div>

                <button class="w-full h-14 bg-primary text-white font-bold text-lg rounded-2xl shadow-xl shadow-primary/25 hover:bg-primary-container hover:text-on-primary-container active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-3 group" type="submit">
                    Reset Password
                    <span class="material-symbols-outlined text-[24px] group-hover:translate-x-1 transition-transform">lock_open</span>
                </button>
            </form>
        </div>
    </section>
</main>

@push('scripts')
<script>
    // Password toggle
    const toggleBtn = document.getElementById('togglePassword');
    const passInput = document.getElementById('password');
    const passIcon = document.getElementById('togglePasswordIcon');
    if (toggleBtn && passInput && passIcon) {
        toggleBtn.addEventListener('click', function() {
            const isPass = passInput.type === 'password';
            passInput.type = isPass ? 'text' : 'password';
            passIcon.textContent = isPass ? 'visibility_off' : 'visibility';
        });
    }
</script>
@endpush
@endsection
