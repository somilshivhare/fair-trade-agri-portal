@extends('layouts.stitch')

@section('title', 'Agricultural Resources - AgriMandi')

@section('content')
<div class="min-h-screen bg-surface-container-lowest">
    <!-- Header -->
    <header class="flex items-center justify-between px-8 h-16 w-full sticky top-0 z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-none">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="font-headline-md text-primary font-bold tracking-tight text-[20px]">{{ __('messages.app_name') }}</a>
            <nav class="hidden lg:flex items-center gap-6 font-label-md text-[13px]">
                <a class="{{ request()->routeIs('marketplace') ? 'text-primary' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}" href="{{ route('marketplace') }}">{{ __('messages.marketplace') }}</a>
                <a class="{{ request()->routeIs('categories') ? 'text-primary' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}" href="{{ route('categories') }}">{{ __('messages.categories') }}</a>
                <a class="{{ request()->is('government*') ? 'text-primary' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}" href="{{ route('gov.index') }}">{{ __('messages.gov_portal') }}</a>
                <a class="{{ request()->routeIs('analytics') ? 'text-primary' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}" href="{{ route('analytics') }}">{{ __('messages.analytics') }}</a>
                <a class="{{ request()->routeIs('resources') ? 'text-primary' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}" href="{{ route('resources') }}">{{ __('messages.resources') }}</a>
            </nav>
        </div>
        <div class="flex items-center gap-6">
            <div class="hidden xl:flex items-center bg-surface-container-low rounded-xl px-4 py-1.5 border border-outline-variant/10 w-64">
                <span class="material-symbols-outlined text-on-surface-variant/50 mr-2 text-[18px]">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-[12px] w-full" placeholder="Search resources..." type="text"/>
            </div>
            @include('components.nav-user-actions')
        </div>
    </header>

    <main class="px-margin-desktop py-12">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12 text-center">
                <h1 class="page-title mb-4">Farmer Resource Center</h1>
                <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Everything you need to improve your yield, understand government schemes, and stay updated with the latest farming technologies.</p>
            </div>

            <!-- Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Government Schemes Card -->
                <div class="bg-white rounded-3xl p-8 border border-outline-variant/10 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">account_balance</span>
                    </div>
                    <h3 class="font-headline-md text-on-surface mb-2">Government Schemes</h3>
                    <p class="font-body-md text-on-surface-variant mb-6">Detailed guides on PM-Kisan, Fasal Bima Yojana, and regional subsidies.</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-on-surface">
                            <span class="material-symbols-outlined text-primary text-[20px]">verified</span>
                            <span>PM-Kisan Samman Nidhi</span>
                        </li>
                        <li class="flex items-center gap-3 text-on-surface">
                            <span class="material-symbols-outlined text-primary text-[20px]">verified</span>
                            <span>Crop Insurance (PMFBY)</span>
                        </li>
                        <li class="flex items-center gap-3 text-on-surface">
                            <span class="material-symbols-outlined text-primary text-[20px]">verified</span>
                            <span>Soil Health Card Scheme</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center gap-2 text-primary font-label-lg hover:gap-3 transition-all">
                        Explore Schemes <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>

                <!-- Farming Guides Card -->
                <div class="bg-white rounded-3xl p-8 border border-outline-variant/10 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-16 h-16 bg-tertiary/10 rounded-2xl flex items-center justify-center text-tertiary mb-6 group-hover:bg-tertiary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">menu_book</span>
                    </div>
                    <h3 class="font-headline-md text-on-surface mb-2">Best Practices</h3>
                    <p class="font-body-md text-on-surface-variant mb-6">Learn modern techniques for irrigation, soil management, and pest control.</p>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="p-4 bg-surface-container-low rounded-xl">
                            <p class="font-label-md text-on-surface">Organic Farming</p>
                            <p class="text-[12px] text-on-surface-variant">Step-by-step guide</p>
                        </div>
                        <div class="p-4 bg-surface-container-low rounded-xl">
                            <p class="font-label-md text-on-surface">Smart Irrigation</p>
                            <p class="text-[12px] text-on-surface-variant">Save 40% water</p>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-tertiary font-label-lg hover:gap-3 transition-all">
                        Read Guides <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>

                <!-- Weather & Alerts Card -->
                <div class="bg-white rounded-3xl p-8 border border-outline-variant/10 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-16 h-16 bg-info/10 rounded-2xl flex items-center justify-center text-info mb-6 group-hover:bg-info group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">wb_sunny</span>
                    </div>
                    <h3 class="font-headline-md text-on-surface mb-2">Weather Forecast</h3>
                    <p class="font-body-md text-on-surface-variant mb-6">Localized weather updates and seasonal planting advice for your region.</p>
                    <div class="flex items-center justify-between p-4 bg-surface-container-lowest border border-outline-variant/10 rounded-xl mb-8">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-4xl text-info">partly_cloudy_day</span>
                            <div>
                                <p class="font-headline-sm text-on-surface">32°C</p>
                                <p class="text-label-sm text-on-surface-variant">Sunny, New Delhi</p>
                            </div>
                        </div>
                        <button class="px-4 py-2 bg-info/10 text-info rounded-lg font-label-sm">Change</button>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-info font-label-lg hover:gap-3 transition-all">
                        Full Forecast <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>

                <!-- Digital Literacy Card -->
                <div class="bg-white rounded-3xl p-8 border border-outline-variant/10 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-16 h-16 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">devices</span>
                    </div>
                    <h3 class="font-headline-md text-on-surface mb-2">Agri-Tech Training</h3>
                    <p class="font-body-md text-on-surface-variant mb-6">Learn how to use digital marketplaces, mobile banking, and drone technology.</p>
                    <div class="flex flex-col gap-3 mb-8">
                        <div class="flex items-center justify-between text-on-surface">
                            <span class="font-label-md">How to use AgriMandi</span>
                            <span class="text-label-sm px-2 py-0.5 bg-surface-container-high rounded text-on-surface-variant">5 min</span>
                        </div>
                        <div class="flex items-center justify-between text-on-surface">
                            <span class="font-label-md">Digital Payment Safety</span>
                            <span class="text-label-sm px-2 py-0.5 bg-surface-container-high rounded text-on-surface-variant">8 min</span>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-secondary font-label-lg hover:gap-3 transition-all">
                        Start Learning <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mt-20">
                <h2 class="font-headline-lg text-on-surface text-center mb-12">Frequently Asked Questions</h2>
                <div class="space-y-4 max-w-2xl mx-auto">
                    <div class="bg-white p-6 rounded-2xl border border-outline-variant/10">
                        <p class="font-label-lg text-on-surface mb-2">How do I register for MSP selling?</p>
                        <p class="text-body-md text-on-surface-variant">You need a verified Aadhar and land records. Once you register on AgriMandi, go to the Gov Portal to start.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-outline-variant/10">
                        <p class="font-label-lg text-on-surface mb-2">What is the settlement time for payments?</p>
                        <p class="text-body-md text-on-surface-variant">Marketplace payments are immediate. Government procurement usually takes 3-5 working days.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
