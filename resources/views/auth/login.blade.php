@extends('layouts.app')

@section('title', 'Log In')

@section('no_header_footer', true)

@section('content')
<div class="flex flex-col lg:flex-row min-h-screen bg-white">
    
    <!-- Left Banner Pane (Hidden on mobile) -->
    <div class="hidden lg:flex lg:w-[55%] relative flex-col justify-between p-12 text-white bg-cover bg-center select-none" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBpi7nxtsYQaybKQk5-DirW0LqpxLUi4U-eizp2C1iueGpQXMwL-aL7R9a1q73HyuXUURXHUvA_Ca75sRDlt6MTcnlCxL-2B_Ycenuj0VBPmuKqUlIfX2uKSwXJhSLl77sBiBYY8ucikqZ-P818UhdIRqcb6meetYT9VoL_MN0FK1ux0gZFAaOBfUiYWkD2n6MeE8LvxkhGLr7UkPwb-dogExwFWTqL04v8bo3bjFrvYsTe7fnS203yqOqHgKpVnFaUMDFFFsGT8g');">
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/45 via-transparent to-black/65 z-0"></div>
        
        <!-- Top branding logo header -->
        <a href="{{ route('home') }}" class="relative z-10 flex items-center space-x-3 group">
            <div class="w-10 h-10 rounded-xl bg-emerald-700 flex items-center justify-center shadow-lg shadow-black/25 group-hover:bg-emerald-600 transition-colors">
                <!-- Outline Tractor SVG -->
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <circle cx="18.5" cy="17.5" r="2.5"></circle>
                    <circle cx="6.5" cy="17.5" r="1.5"></circle>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 17.5h8M14 8.5h3.5a1.5 1.5 0 011.5 1.5v3M4 17.5v-3a2 2 0 012-2h4M10 9.5H7.5a1 1 0 00-1 1v4M12 17.5V11a1 1 0 011-1h2a1 1 0 011 1v6.5M10.5 7.5L12 10"></path>
                </svg>
            </div>
            <span class="text-xl font-extrabold tracking-tight group-hover:text-slate-100 transition-colors">AgriMandi</span>
        </a>

        <!-- Bottom portfolio text -->
        <div class="relative z-10 space-y-6">
            <span class="inline-flex items-center gap-x-2 rounded-full bg-white/20 backdrop-blur-md px-3.5 py-1 text-xs font-semibold text-white ring-1 ring-inset ring-white/10 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                MARKET LIVE
            </span>
            <div class="space-y-4 max-w-xl">
                <h1 class="text-5xl font-extrabold tracking-tight leading-[1.15]">
                    Cultivating Digital <br><span class="text-emerald-400">Market Efficiency.</span>
                </h1>
                <p class="text-lg leading-relaxed text-slate-200 font-light">
                    Connecting local growers directly to global buyers through our transparent, secure bidding ecosystem.
                </p>
            </div>
        </div>
    </div>

    <!-- Right Side Login Form Pane -->
    <div class="w-full lg:w-[45%] flex flex-col justify-between p-6 sm:p-12 md:p-16 lg:p-20 bg-white">
        
        <!-- Empty top element to align content properly (like vertical flex space-between) -->
        <div class="hidden lg:block"></div>

        <!-- Central form container -->
        <div class="max-w-md w-full mx-auto space-y-8 my-auto">
            <!-- Header Welcome text -->
            <div class="space-y-2">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 leading-tight">Welcome Back</h2>
                <p class="text-sm text-slate-500 font-light">Access your AgriMandi trading dashboard</p>
            </div>

            <!-- Error Alerts Box -->
            @if($errors->any())
                <div class="p-4 rounded-2xl bg-rose-50 border border-rose-100 text-rose-800 text-sm shadow-sm transition-all duration-300">
                    <ul class="list-disc pl-5 space-y-1 font-semibold">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Main Input Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email Input field -->
                <div class="space-y-2">
                    <label for="email" class="text-sm font-bold text-slate-700">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <!-- @ SVG Icon -->
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full pl-12 pr-4 py-4 rounded-2xl border border-transparent bg-[#f0f4ff]/50 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-sm shadow-sm transition-all placeholder:text-slate-400 outline-none" placeholder="name@example.com">
                    </div>
                </div>

                <!-- Password Input field -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-sm font-bold text-slate-700">Password</label>
                        <a href="#" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 transition-colors">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <!-- Lock SVG Icon -->
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required class="w-full pl-12 pr-4 py-4 rounded-2xl border border-transparent bg-[#f0f4ff]/50 focus:bg-white focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 text-sm shadow-sm transition-all placeholder:text-slate-400 outline-none" placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me & checkbox options -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-5 w-5 rounded border-slate-300 text-emerald-700 focus:ring-emerald-600 focus:ring-offset-2 transition-all">
                    <label for="remember" class="ml-3 text-sm font-medium text-slate-600 select-none">Remember me</label>
                </div>

                <!-- Login Action CTA Button -->
                <button type="submit" class="w-full bg-[#047857] hover:bg-[#035f43] text-white py-4 px-6 rounded-2xl font-bold flex items-center justify-center gap-2 transition-all duration-300 shadow-md shadow-emerald-700/10 hover:shadow-emerald-700/20 active:scale-[0.99]">
                    Log In
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>

            <!-- Redirect link to signup onboarding -->
            <div class="pt-4 text-center text-sm text-slate-600">
                New to AgriMandi?
                <a href="{{ route('register') }}" class="font-bold text-[#047857] hover:text-[#035f43] hover:underline ml-1">Create an account</a>
            </div>
        </div>

        <!-- Footer terms credits bottom -->
        <div class="mt-12 lg:mt-0 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-xs text-slate-400 select-none">
            <span>&copy; {{ date('Y') }} AgriMandi</span>
            <a href="#" class="hover:text-slate-600 transition-colors">Privacy</a>
            <a href="#" class="hover:text-slate-600 transition-colors">Terms</a>
            <a href="#" class="hover:text-slate-600 transition-colors">Help</a>
        </div>
    </div>
</div>
@endsection
