@extends('layouts.app')

@section('title', 'Login - Fair Trade Agri-Portal')

@section('content')
<div class="min-h-screen relative flex items-center justify-center font-body-md overflow-hidden">
    <!-- Background Layer -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-surface-container-lowest/90 backdrop-blur-2xl z-10"></div>
        <img alt="Agricultural field" class="w-full h-full object-cover object-center opacity-40 mix-blend-luminosity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpAiTmq7NGJOkL0nq4fpGO_lxZrGn8nBasdHQJy8JHrqRdSASqYZfO4B0Er4SsINmYkbRalQCwCX7mB9VT5YF5JVUENnFL3XmNl2GyNANjrPyr5SSWnBpiHTCe_l5HmuGKXY6Q3v9xJFPFSj2mr2sMm1ps13hpFmo0WW3qOB9wW4QHVWdIRhpFdZU7Qg0meZd4GUl74NVAIgx8tIGUUxW5arCHMHopdCyPgbCtamIOH5_rO87YYaNRuUKzvxPIMInmRwxRkx6rup7n" />
    </div>

    <!-- Main Container -->
    <main class="relative z-10 w-full max-w-[1200px] px-gutter md:px-margin-desktop flex items-center justify-center">
        <div class="w-full bg-surface-container-low/40 backdrop-blur-3xl rounded-xl border-t border-l border-white/10 border-r border-b border-white/5 shadow-[0_40px_80px_-20px_rgba(0,200,83,0.08)] flex flex-col md:flex-row overflow-hidden min-h-[600px]">
            
            <!-- Left Pane: Brand & Visual -->
            <div class="hidden md:flex flex-col justify-between w-5/12 bg-surface-container-lowest/60 p-12 relative overflow-hidden border-r border-white/5">
                <div class="absolute -top-32 -left-32 w-96 h-96 bg-primary/10 rounded-full blur-[80px] pointer-events-none"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="material-symbols-outlined text-primary text-[32px]" style="font-variation-settings: 'FILL' 1;">eco</span>
                        <h1 class="font-headline-md text-headline-md text-primary tracking-tight">AgriTech Elite</h1>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mt-8 leading-tight">
                        Precision engineering for modern agriculture.
                    </h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mt-4 max-w-sm">
                        Securely access your enterprise farm analytics, supply chain tracking, and real-time sensor data.
                    </p>
                </div>

                <!-- Decorative Data Viz -->
                <div class="relative z-10 mt-auto pt-12">
                    <div class="w-full h-32 bg-surface/50 rounded-lg border border-white/5 p-4 flex flex-col gap-3 backdrop-blur-md">
                        <div class="flex justify-between items-center">
                            <span class="font-label-sm text-label-sm text-on-surface-variant">System Status</span>
                            <div class="flex items-center gap-1.5">
                                <div class="w-2 h-2 rounded-full bg-primary animate-pulse shadow-[0_0_8px_rgba(63,229,108,0.8)]"></div>
                                <span class="font-label-sm text-label-sm text-primary">Secure Connection</span>
                            </div>
                        </div>
                        <div class="flex-1 flex items-end gap-1.5 opacity-70">
                            @for($i = 0; $i < 6; $i++)
                                <div class="w-full bg-primary/20 rounded-t-sm h-[{{ 30 + $i * 10 }}%] relative">
                                    <div class="absolute top-0 w-full h-[2px] bg-primary shadow-[0_0_5px_rgba(63,229,108,0.5)]"></div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Pane: Login Form -->
            <div class="w-full md:w-7/12 p-8 md:p-16 flex flex-col justify-center bg-surface/20">
                <!-- Mobile Logo -->
                <div class="flex items-center gap-2 mb-8 md:hidden">
                    <span class="material-symbols-outlined text-primary text-[28px]" style="font-variation-settings: 'FILL' 1;">eco</span>
                    <h1 class="font-headline-md text-headline-md text-primary tracking-tight">AgriTech Elite</h1>
                </div>

                <div class="max-w-md w-full mx-auto">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Welcome back</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8">Enter your credentials to access the terminal.</p>

                    <!-- Role Selection -->
                    <div class="flex bg-surface-container-high rounded-lg p-1 border border-outline-variant/30 mb-8 shadow-inner">
                        <button class="flex-1 py-2 px-4 rounded bg-surface-container-lowest text-primary font-label-bold text-label-bold shadow-sm border border-outline-variant/50 transition-all">Farmer</button>
                        <button class="flex-1 py-2 px-4 rounded text-on-surface-variant hover:text-on-surface font-label-bold text-label-bold transition-all">Buyer</button>
                        <button class="flex-1 py-2 px-4 rounded text-on-surface-variant hover:text-on-surface font-label-bold text-label-bold transition-all">Admin</button>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label class="block font-label-sm text-label-sm text-on-surface-variant ml-1" for="email">Work Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[20px]">mail</span>
                                </div>
                                <input class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-highest/50 border border-outline-variant/50 rounded-lg font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50 focus:bg-surface-container-lowest focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200" 
                                    id="email" 
                                    name="email"
                                    type="email" 
                                    placeholder="operator@agrifarm.com" 
                                    value="{{ old('email') }}"
                                    required />
                            </div>
                            @error('email')
                                <p class="text-error text-label-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="space-y-1.5">
                            <div class="flex justify-between items-center">
                                <label class="block font-label-sm text-label-sm text-on-surface-variant ml-1" for="password">Access Key</label>
                                <a href="{{ route('password.request') }}" class="font-label-sm text-label-sm text-primary hover:text-primary-fixed transition-colors">Recover Access?</a>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-on-surface-variant text-[20px]">lock</span>
                                </div>
                                <input class="block w-full pl-11 pr-11 py-3.5 bg-surface-container-highest/50 border border-outline-variant/50 rounded-lg font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50 focus:bg-surface-container-lowest focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200" 
                                    id="password" 
                                    name="password"
                                    type="password" 
                                    placeholder="••••••••" 
                                    required />
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <button type="button" class="text-on-surface-variant hover:text-on-surface focus:outline-none transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-error text-label-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center pt-2">
                            <input class="h-4 w-4 rounded border-outline-variant bg-surface-container-highest text-primary focus:ring-primary focus:ring-offset-surface" 
                                id="remember-me" 
                                name="remember"
                                type="checkbox" />
                            <label class="ml-2 block font-label-sm text-label-sm text-on-surface-variant cursor-pointer hover:text-on-surface transition-colors" for="remember-me">
                                Keep me connected
                            </label>
                        </div>

                        <!-- Submit -->
                        <div class="pt-4">
                            <button class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-lg shadow-sm font-label-bold text-label-bold text-on-primary bg-primary hover:bg-primary-fixed focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary focus:ring-offset-surface transition-all duration-200 active:scale-[0.98]" type="submit">
                                Initialize Session
                                <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                            </button>
                        </div>
                    </form>

                    <!-- Registration Link -->
                    <div class="mt-8 pt-6 border-t border-white/5 text-center">
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            New to the platform? 
                            <a class="font-label-bold text-label-bold text-primary hover:text-primary-fixed ml-1 transition-colors" href="{{ route('register') }}">Request Access</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
