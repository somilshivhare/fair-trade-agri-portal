@extends('layouts.stitch')
@section('title', 'Create Account - AgriMandi')
@section('content')



    <main class="min-h-screen bg-surface flex flex-col lg:grid lg:grid-cols-[42%_58%] overflow-x-hidden">
        <!-- Left Side: Visual & Brand Content -->
        <section class="relative hidden lg:flex flex-col justify-between p-12 xl:p-16 overflow-hidden bg-primary-container">
            <!-- Background Image with Premium Overlay -->
            <div class="absolute inset-0 z-0">
                <img class="w-full h-full object-cover scale-105" src="{{ asset('images/auth-hero.png') }}"
                    alt="AgriMandi Fields" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/40 to-black/30"></div>
                <div class="absolute inset-0 bg-black/10"></div>
            </div>

            <!-- Logo/Top Content -->
            <div class="relative z-10">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-14 w-auto object-contain mix-blend-multiply">
                    <h2 class="font-headline-sm text-white font-bold tracking-tight">AgriMandi India</h2>
                </div>
            </div>

            <!-- Center Content -->
            <div class="relative z-10 max-w-md mt-auto mb-12">
                <div class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-full border border-white/30 mb-6">
                    <span class="text-white font-label-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-primary-fixed rounded-full animate-pulse"></span>
                        Digital Agriculture Revolution
                    </span>
                </div>
                <h1 class="font-display-md text-display-md text-white mb-4 leading-tight">Empowering India's <span
                        class="text-primary-fixed">Agri-Economy</span></h1>
                <p class="font-body-lg text-body-lg text-white/90 mb-8 leading-relaxed">
                    Connect directly with verified stakeholders, leverage real-time market insights, and experience secure,
                    transparent trading.
                </p>

                <!-- Compact Feature Grid -->
                <div class="grid grid-cols-1 gap-4">
                    <div
                        class="group flex items-center gap-4 bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-white text-[24px]"
                                style="font-variation-settings:'FILL' 1;">verified</span>
                        </div>
                        <div>
                            <p class="font-label-lg text-white">KYC Verified Network</p>
                            <p class="font-label-sm text-white/60">Trust-based ecosystem for all members</p>
                        </div>
                    </div>
                    <div
                        class="group flex items-center gap-4 bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all cursor-default">
                        <div
                            class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-white text-[24px]"
                                style="font-variation-settings:'FILL' 1;">payments</span>
                        </div>
                        <div>
                            <p class="font-label-lg text-white">Smart Settlement</p>
                            <p class="font-label-sm text-white/60">Instant & secure digital payment routing</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Info -->
            <div
                class="relative z-10 flex justify-between items-center text-white/50 font-label-sm border-t border-white/10 pt-6">
                <p>© 2026 AgriMandi India</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors">Support</a>
                </div>
            </div>
        </section>

        <!-- Mobile Hero (Visible only on small screens) -->
        <section class="lg:hidden relative h-48 bg-primary overflow-hidden">
            <img class="w-full h-full object-cover opacity-60" src="{{ asset('images/auth-hero.png') }}" alt="AgriMandi" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-6">
                <h1 class="font-headline-lg text-white">Join AgriMandi</h1>
            </div>
        </section>

        <!-- Right Side: Registration Form -->
        <section class="flex flex-col items-center justify-center p-6 sm:p-12 lg:p-16 bg-surface overflow-y-auto">
            <div class="w-full max-w-[540px]">
                <div class="mb-10 lg:mb-12">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2 font-bold">Create Account</h2>
                    <p class="font-body-md text-on-surface-variant">Join India's most trusted agricultural marketplace.</p>
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

                <form action="{{ route('register') }}" method="POST" class="space-y-6" x-data="{ loading: false }"
                    @submit="loading = true">
                    @csrf

                    {{-- Role Selection --}}
                    <div class="space-y-3">
                        <label class="font-label-md text-on-surface-variant flex items-center gap-2 px-1">
                            Select Your Profile <span class="text-error">*</span>
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="role" value="farmer" class="peer sr-only" {{ old('role') === 'buyer' ? '' : 'checked' }}>
                                <div
                                    class="flex flex-col gap-2 p-4 border-2 border-outline-variant/20 rounded-2xl transition-all duration-300 peer-checked:border-primary peer-checked:bg-primary/5 hover:border-primary/40 hover:shadow-md group-active:scale-95">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center peer-checked:bg-primary/20">
                                        <span class="material-symbols-outlined text-primary text-[24px]">agriculture</span>
                                    </div>
                                    <div>
                                        <p class="font-label-lg text-on-surface">Farmer</p>
                                        <p class="text-[11px] text-on-surface-variant">Sell Produce</p>
                                    </div>
                                    <div
                                        class="absolute top-3 right-3 w-5 h-5 rounded-full border-2 border-outline-variant/30 flex items-center justify-center peer-checked:border-primary peer-checked:bg-primary">
                                        <span
                                            class="material-symbols-outlined text-white text-[14px] hidden peer-checked:block">check</span>
                                    </div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="role" value="buyer" class="peer sr-only" {{ old('role') === 'buyer' ? 'checked' : '' }}>
                                <div
                                    class="flex flex-col gap-2 p-4 border-2 border-outline-variant/20 rounded-2xl transition-all duration-300 peer-checked:border-primary peer-checked:bg-primary/5 hover:border-primary/40 hover:shadow-md group-active:scale-95">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center peer-checked:bg-primary/20">
                                        <span class="material-symbols-outlined text-primary text-[24px]">storefront</span>
                                    </div>
                                    <div>
                                        <p class="font-label-lg text-on-surface">Buyer</p>
                                        <p class="text-[11px] text-on-surface-variant">Purchase Direct</p>
                                    </div>
                                    <div
                                        class="absolute top-3 right-3 w-5 h-5 rounded-full border-2 border-outline-variant/30 flex items-center justify-center peer-checked:border-primary peer-checked:bg-primary">
                                        <span
                                            class="material-symbols-outlined text-white text-[14px] hidden peer-checked:block">check</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @error('role')<p class="font-label-sm text-error px-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Full Name --}}
                        <div class="space-y-2">
                            <label class="font-label-md text-on-surface-variant px-1" for="name">Full Name *</label>
                            <div class="group relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">person</span>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Viraj Kumar"
                                    class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40 @error('name') border-error @enderror"
                                    required />
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="space-y-2">
                            <label class="font-label-md text-on-surface-variant px-1" for="phone">Mobile Number *</label>
                            <div class="group relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">phone</span>
                                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                                    placeholder="+91 98765 43210"
                                    class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40 @error('phone') border-error @enderror"
                                    required />
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="space-y-2">
                        <label class="font-label-md text-on-surface-variant px-1" for="reg_email">Email Address *</label>
                        <div class="group relative">
                            <span
                                class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">mail</span>
                            <input id="reg_email" name="email" type="email" value="{{ old('email') }}"
                                placeholder="farmer@agrimandi.in"
                                class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40 @error('email') border-error @enderror"
                                required />
                        </div>
                    </div>

                    {{-- State & District --}}
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="font-label-md text-on-surface-variant px-1" for="state">State</label>
                            <div class="group relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors text-[20px]">location_on</span>
                                <select id="state" name="state"
                                    class="w-full h-14 pl-12 pr-8 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all appearance-none cursor-pointer @error('state') border-error @enderror"
                                    style="background-image: url(\" data:image/svg+xml,%3csvg
                                    xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20' %3e%3cpath
                                    stroke='%236c7a71' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'
                                    d='M6 8l4 4 4-4' /%3e%3c/svg%3e\"); background-repeat: no-repeat; background-position:
                                    right 0.75rem center; background-size: 1.2em 1.2em;">
                                    <option value="">Select</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-label-md text-on-surface-variant px-1" for="district">District</label>
                            <div class="group relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors text-[20px]">map</span>
                                <input id="district" name="district" type="text" value="{{ old('district') }}"
                                    placeholder="e.g. Dewas"
                                    class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Password --}}
                        <div class="space-y-2">
                            <label class="font-label-md text-on-surface-variant px-1" for="reg_password">Password *</label>
                            <div class="group relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">lock</span>
                                <input id="reg_password" name="password" type="password" placeholder="8+ chars"
                                    class="w-full h-14 pl-12 pr-12 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40 @error('password') border-error @enderror"
                                    required />
                                <button
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                                    type="button" id="toggleRegPassword">
                                    <span class="material-symbols-outlined text-[20px]"
                                        id="toggleRegPasswordIcon">visibility</span>
                                </button>
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="space-y-2">
                            <label class="font-label-md text-on-surface-variant px-1" for="password_confirmation">Confirm
                                *</label>
                            <div class="group relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">lock_reset</span>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    placeholder="Re-enter"
                                    class="w-full h-14 pl-12 pr-12 bg-surface-container-low border border-outline-variant/30 rounded-2xl font-body-md focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all placeholder:text-outline/40"
                                    required />
                                <button
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                                    type="button" id="toggleConfirmPassword">
                                    <span class="material-symbols-outlined text-[20px]"
                                        id="toggleConfirmPasswordIcon">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start gap-3 px-1 py-2">
                        <div class="relative flex items-center">
                            <input
                                class="w-5 h-5 rounded-lg border-outline-variant/50 text-primary focus:ring-primary/30 transition-all cursor-pointer"
                                id="terms" type="checkbox" required />
                        </div>
                        <label class="text-sm text-on-surface-variant leading-snug" for="terms">
                            I agree to the <a href="#" class="text-primary hover:underline font-bold">Terms</a> and <a
                                href="#" class="text-primary hover:underline font-bold">Privacy Policy</a>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button
                        class="w-full h-14 bg-primary text-white font-bold text-lg rounded-2xl shadow-xl shadow-primary/25 hover:bg-primary-container hover:text-on-primary-container active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-3 group"
                        type="submit" id="registerBtn" :disabled="loading">
                        <template x-if="!loading">
                            <span class="flex items-center gap-3">
                                Create Account
                                <span
                                    class="material-symbols-outlined text-[24px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </span>
                        </template>
                        <template x-if="loading">
                            <span class="flex items-center gap-3">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Creating Account...
                            </span>
                        </template>
                    </button>
                </form>

                <div
                    class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-6 pt-8 border-t border-outline-variant/10">
                    <p class="font-body-md text-on-surface-variant">
                        Already a member?
                        <a class="text-primary font-bold hover:underline ml-1" href="{{ route('login') }}">Sign In Now</a>
                    </p>

                    <div class="relative w-full sm:w-48" id="langContainer">
                        <button id="langBtn"
                            class="w-full h-12 bg-surface-container-low border border-outline-variant/20 rounded-xl flex items-center justify-center gap-3 font-label-lg text-on-surface hover:bg-primary/5 hover:border-primary/30 transition-all group"
                            type="button">
                            <span
                                class="material-symbols-outlined text-[20px] text-primary group-hover:rotate-12 transition-transform">language</span>
                            <span id="currentLang" class="font-bold">English</span>
                            <span class="material-symbols-outlined text-[18px] text-outline-variant">expand_less</span>
                        </button>
                        <!-- Language Dropdown -->
                        <div id="langDropdown"
                            class="hidden absolute bottom-[calc(100%+12px)] left-0 right-0 bg-surface-container-lowest border border-outline-variant/20 rounded-2xl shadow-2xl z-50 overflow-hidden animate-in fade-in slide-in-from-bottom-2 duration-200">
                            <div class="p-2 space-y-1">
                                @php
                                    $locales = [
                                        'en' => ['name' => 'English', 'flag' => '🇺🇸'],
                                        'hi' => ['name' => 'हिंदी', 'flag' => '🇮🇳'],
                                        'mr' => ['name' => 'मराठी', 'flag' => '🇮🇳'],
                                        'gu' => ['name' => 'ગુજરાતી', 'flag' => '🇮🇳'],
                                        'pa' => ['name' => 'ਪੰਜਾਬੀ', 'flag' => '🇮🇳']
                                    ];
                                @endphp
                                @foreach($locales as $code => $data)
                                    <a href="{{ route('set-locale', $code) }}"
                                        class="flex items-center gap-3 px-4 py-3 rounded-xl font-body-md text-on-surface hover:bg-primary/10 hover:text-primary transition-all group/item {{ app()->getLocale() == $code ? 'bg-primary/5 text-primary font-bold' : '' }}">
                                        <span
                                            class="text-lg opacity-80 group-hover/item:opacity-100 transition-opacity">{{ $data['flag'] }}</span>
                                        <span>{{ $data['name'] }}</span>
                                        @if(app()->getLocale() == $code)
                                            <span class="material-symbols-outlined ml-auto text-[18px]">check_circle</span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @push('scripts')
        <script>
            // Password toggles
            AgriUI.setupPasswordToggle('toggleRegPassword', 'reg_password', 'toggleRegPasswordIcon');
            AgriUI.setupPasswordToggle('toggleConfirmPassword', 'password_confirmation', 'toggleConfirmPasswordIcon');

            // Register button loading state
            const registerForm = document.querySelector('form[action="{{ route('register') }}"]');
            const registerBtn = document.getElementById('registerBtn');
            if (registerForm && registerBtn) {
                registerForm.addEventListener('submit', function () {
                    registerBtn.disabled = true;
                    registerBtn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">progress_activity</span> Creating Account...';
                });
            }

            // ── Language Dropdown ────────────────────────────────────────────
            const langBtn = document.getElementById('langBtn');
            const langDropdown = document.getElementById('langDropdown');

            if (langBtn && langDropdown) {
                langBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    langDropdown.classList.toggle('hidden');
                    const icon = langBtn.querySelector('.material-symbols-outlined:last-child');
                    if (icon) {
                        icon.textContent = langDropdown.classList.contains('hidden') ? 'expand_less' : 'expand_more';
                    }
                });

                document.addEventListener('click', function (e) {
                    if (!langDropdown.contains(e.target) && e.target !== langBtn) {
                        langDropdown.classList.add('hidden');
                        const icon = langBtn.querySelector('.material-symbols-outlined:last-child');
                        if (icon) icon.textContent = 'expand_less';
                    }
                });
            }

            // Role card visual selection
            document.querySelectorAll('input[name="role"]').forEach(function (radio) {
                radio.addEventListener('change', function () {
                    document.querySelectorAll('input[name="role"]').forEach(function (r) {
                        r.closest('label').querySelector('div').classList.remove('border-primary', 'bg-primary/5');
                        r.closest('label').querySelector('div').classList.add('border-outline-variant/20');
                    });
                    this.closest('label').querySelector('div').classList.add('border-primary', 'bg-primary/5');
                    this.closest('label').querySelector('div').classList.remove('border-outline-variant/20');
                });
                // Init state
                if (radio.checked) {
                    radio.closest('label').querySelector('div').classList.add('border-primary', 'bg-primary/5');
                    radio.closest('label').querySelector('div').classList.remove('border-outline-variant/20');
                }
            });
        </script>
    @endpush
@endsection