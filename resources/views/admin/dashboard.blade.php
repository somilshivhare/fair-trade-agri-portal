@extends('layouts.stitch')
@section('title', 'Admin - AgriMandi')
@section('content')

    <div class="flex min-h-screen">
        <!-- SideNavBar Shared Component -->
        <aside
            class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 rounded-r-xl">
            <div class="px-lg mb-8 flex flex-col gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo" class="h-20 w-auto object-contain self-start mix-blend-multiply">
                <div>
                    <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
                    <p class="text-label-sm text-on-surface-variant">Premium Marketplace</p>
                </div>
            </div>
            <nav class="flex-1 px-4 flex flex-col gap-1">
                <a class="flex items-center gap-md px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-primary-container/20 text-primary border-r-4 border-primary' : 'text-on-surface-variant' }} rounded-l-none rounded-r-lg font-label-md text-label-md transition-all duration-300"
                    href="{{ route('admin.dashboard') }}">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    <span>{{ __('messages.dashboard') }}</span>
                </a>
                <a class="flex items-center gap-md px-4 py-3 {{ request()->routeIs('admin.kyc') ? 'bg-primary-container/20 text-primary border-r-4 border-primary' : 'text-on-surface-variant' }} hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1"
                    href="{{ route('admin.kyc') }}">
                    <span class="material-symbols-outlined" data-icon="verified_user">verified_user</span>
                    <span>{{ __('messages.kyc') }}</span>
                </a>
                <a class="flex items-center gap-md px-4 py-3 {{ request()->routeIs('admin.users') ? 'bg-primary-container/20 text-primary border-r-4 border-primary' : 'text-on-surface-variant' }} hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1"
                    href="{{ route('admin.users') }}">
                    <span class="material-symbols-outlined" data-icon="group">group</span>
                    <span>{{ __('messages.users') }}</span>
                </a>
                <a class="flex items-center gap-md px-4 py-3 {{ request()->routeIs('admin.market-prices') ? 'bg-primary-container/20 text-primary border-r-4 border-primary' : 'text-on-surface-variant' }} hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1"
                    href="{{ route('admin.market-prices') }}">
                    <span class="material-symbols-outlined" data-icon="monitoring">monitoring</span>
                    <span>{{ __('messages.market_prices') }}</span>
                </a>
                <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface rounded-lg font-label-md text-label-md transition-all duration-300 active:translate-x-1"
                    href="{{ route('profile') }}">
                    <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    <span>{{ __('messages.settings') }}</span>
                </a>
            </nav>

            <div class="px-6 mt-auto space-y-md mb-8">
                <a href="{{ route('analytics') }}"
                    class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-md hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                    Market Insights
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full bg-surface-container-high text-on-surface-variant py-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-md hover:bg-error/10 hover:text-error transition-all">
                        <span class="material-symbols-outlined" data-icon="logout">logout</span>
                        Logout
                    </button>
                </form>
            </div>
        </aside>
        <!-- Main Content Area -->
        <main class="flex-1 min-w-0">
            <!-- TopNavBar Shared Component -->
            <header
                class="flex items-center justify-between px-8 h-20 w-full sticky top-0 z-50 bg-surface/90 backdrop-blur-2xl border-b border-outline-variant/10 shadow-none">
                <div class="flex items-center gap-xl">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all duration-300 group">
                            <div
                                class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                            </div>
                            <span class="font-label-md text-[13px] font-bold">Home</span>
                        </a>
                        <div class="h-6 w-px bg-outline-variant/20"></div>
                    </div>
                    <div class="group relative flex items-center bg-surface-container-low/50 rounded-full px-4 py-1.5 border border-outline-variant/10 w-full max-w-lg focus-within:border-primary/40 focus-within:bg-white focus-within:ring-4 focus-within:ring-primary/5 transition-all duration-500 ease-out shadow-none"
                        x-data="{ isFocused: false }">
                        <span
                            class="material-symbols-outlined text-on-surface-variant/40 mr-3 text-[20px] group-focus-within:text-primary transition-colors duration-300">search</span>
                        <input @focus="isFocused = true" @blur="isFocused = false"
                            class="bg-transparent border-none focus:ring-0 text-[13px] w-full placeholder:text-on-surface-variant/30 text-on-surface py-0.5"
                            placeholder="Search institutional records..." type="text" />

                        <div class="hidden sm:flex items-center gap-1 ml-2 px-1.5 py-0.5 rounded-md bg-surface-container-high/50 border border-outline-variant/10 transition-all duration-300"
                            :class="isFocused ? 'opacity-0 scale-95' : 'opacity-100'">
                            <span class="text-[9px] font-bold text-on-surface-variant/60">⌘</span>
                            <span class="text-[9px] font-bold text-on-surface-variant/60">K</span>
                        </div>
                    </div>
                    <nav class="hidden lg:flex items-center gap-lg">
                        <a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors"
                            href="{{ route('marketplace') }}">Marketplace</a>
                        <a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors"
                            href="{{ route('analytics') }}">Analytics</a>
                        <a class="text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors"
                            href="{{ route('resources') }}">Resources</a>
                    </nav>
                </div>
                <div class="flex items-center gap-lg">
                    <div class="flex items-center gap-sm">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary-container/10 transition-colors">
                                <span class="material-symbols-outlined text-on-surface-variant"
                                    data-icon="language">language</span>
                            </button>
                            <!-- Language Dropdown -->
                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 bg-surface-container-lowest border border-outline-variant/20 rounded-xl shadow-2xl z-[100] overflow-hidden">
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
                                            class="flex items-center gap-3 px-4 py-3 rounded-lg font-label-md text-on-surface hover:bg-primary/10 hover:text-primary transition-all group {{ app()->getLocale() == $code ? 'bg-primary/5 text-primary font-bold' : '' }}">
                                            <span class="text-lg opacity-80">{{ $data['flag'] }}</span>
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
                    <div class="h-8 w-[1px] bg-outline-variant/30"></div>
                    <div class="flex items-center gap-md">
                        <a href="{{ route('marketplace') }}"
                            class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-lg text-label-lg active:scale-95 transition-transform duration-200">
                            Start Selling
                        </a>
                        <a href="{{ route('profile') }}">
                            <img alt="User profile avatar"
                                class="w-10 h-10 rounded-full object-cover border-2 border-primary-container"
                                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E8F5E9&color=2E7D32" />
                        </a>
                    </div>
                </div>
            </header>
            <!-- Dashboard Content -->
            <div class="p-xl max-w-7xl mx-auto space-y-xl" x-data="{ 
        showReviewModal: false,
        currentReview: null,
        reviewNotes: '',
        openReview(review) {
            this.currentReview = review;
            this.reviewNotes = '';
            this.showReviewModal = true;
        }
    }">
                <!-- Header Stats Bento -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
                    <div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="verified_user">verified_user</span>
                            </div>
                            <span
                                class="text-label-sm text-primary bg-primary/10 px-2 py-1 rounded-full font-bold">+12%</span>
                        </div>
                        <p class="text-on-surface-variant font-label-md text-label-md">Pending Verification</p>
                        <h3 class="text-headline-md font-headline-md mt-1">1,284</h3>
                    </div>
                    <div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-tertiary/10 rounded-lg">
                                <span class="material-symbols-outlined text-tertiary"
                                    data-icon="account_balance">account_balance</span>
                            </div>
                            <span
                                class="text-label-sm text-tertiary bg-tertiary/10 px-2 py-1 rounded-full font-bold">+5.4%</span>
                        </div>
                        <p class="text-on-surface-variant font-label-md text-label-md">Total Volume (Cr)</p>
                        <h3 class="text-headline-md font-headline-md mt-1">₹42.8</h3>
                    </div>
                    <div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-secondary/10 rounded-lg">
                                <span class="material-symbols-outlined text-secondary"
                                    data-icon="monitoring">monitoring</span>
                            </div>
                            <span
                                class="text-label-sm text-secondary bg-secondary/10 px-2 py-1 rounded-full font-bold">Stable</span>
                        </div>
                        <p class="text-on-surface-variant font-label-md text-label-md">Active Auctions</p>
                        <h3 class="text-headline-md font-headline-md mt-1">452</h3>
                    </div>
                    <div class="bg-surface-container-lowest p-lg rounded-xl emerald-glow border border-outline-variant/10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-2 bg-error/10 rounded-lg">
                                <span class="material-symbols-outlined text-error" data-icon="gpp_maybe">gpp_maybe</span>
                            </div>
                            <span class="text-label-sm text-error bg-error/10 px-2 py-1 rounded-full font-bold">High</span>
                        </div>
                        <p class="text-on-surface-variant font-label-md text-label-md">Risk Alerts</p>
                        <h3 class="text-headline-md font-headline-md mt-1">08</h3>
                    </div>
                </div>
                <!-- Verification Table Section -->
                <div
                    class="bg-surface-container-lowest rounded-xl emerald-glow border border-outline-variant/10 overflow-hidden">
                    <div class="px-xl py-lg border-b border-outline-variant/10 flex items-center justify-between">
                        <div>
                            <h2 class="font-headline-md text-headline-md text-on-surface">
                                {{ __('messages.institutional_oversight') }}</h2>
                            <p class="text-body-md text-on-surface-variant">{{ __('messages.commodity_review') }}</p>
                        </div>
                        <div class="flex gap-md">
                            <button
                                class="px-4 py-2 border border-outline-variant/50 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-surface-container-low transition-colors">
                                <span class="material-symbols-outlined text-[20px]">filter_list</span>
                                Filter
                            </button>
                            <button
                                class="px-4 py-2 bg-primary text-on-primary rounded-lg font-label-md text-label-md flex items-center gap-2">
                                <span class="material-symbols-outlined text-[20px]">download</span>
                                Export Report
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low border-b border-outline-variant/20">
                                    <th
                                        class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">
                                        Batch ID</th>
                                    <th
                                        class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">
                                        Commodity</th>
                                    <th
                                        class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">
                                        Institution</th>
                                    <th
                                        class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">
                                        Quality Score</th>
                                    <th
                                        class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-xl py-4 font-label-lg text-label-lg text-secondary uppercase tracking-wider text-right">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/10">
                                @forelse($pendingReviews as $review)
                                    <tr class="hover:bg-surface-container-low transition-colors group">
                                        <td class="px-xl py-5 font-label-md text-label-md text-primary font-bold">
                                            #{{ $review->batch_number }}</td>
                                        <td class="px-xl py-5">
                                            <div class="flex items-center gap-md">
                                                <div
                                                    class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-on-surface-variant">
                                                        @if(strtolower($review->product->category) == 'grains') grass
                                                        @elseif(strtolower($review->product->category) == 'spices')
                                                            local_fire_department
                                                        @else inventory_2 @endif
                                                    </span>
                                                </div>
                                                <div>
                                                    <div class="font-label-lg text-label-lg text-on-surface">
                                                        {{ $review->product->name }}</div>
                                                    <div class="text-label-sm text-on-surface-variant">
                                                        {{ $review->product->variety }} | {{ $review->product->quantity }}
                                                        {{ $review->product->unit }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-xl py-5 font-body-md text-body-md text-on-surface">
                                            {{ $review->authority_name }}</td>
                                        <td class="px-xl py-5">
                                            <div class="flex items-center gap-sm">
                                                <div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden">
                                                    <div class="h-full bg-primary" style="width: {{ $review->quality_score }}%">
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-sm text-label-sm text-on-surface font-bold">{{ $review->quality_score }}%</span>
                                            </div>
                                        </td>
                                        <td class="px-xl py-5">
                                            <span
                                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-label-sm font-bold {{ $review->status == 'pending' ? 'bg-primary/10 text-primary' : ($review->status == 'approved' ? 'bg-tertiary/10 text-tertiary' : 'bg-error/10 text-error') }}">
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full {{ $review->status == 'pending' ? 'bg-primary' : ($review->status == 'approved' ? 'bg-tertiary' : 'bg-error') }}"></span>
                                                {{ ucfirst($review->status) }}
                                            </span>
                                        </td>
                                        <td class="px-xl py-5 text-right">
                                            <button @click="openReview(@js($review))"
                                                class="text-primary font-label-lg text-label-lg hover:underline underline-offset-4">
                                                {{ $review->status == 'pending' ? 'Review Details' : 'View Summary' }}
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-xl py-12 text-center text-on-surface-variant italic">No
                                            pending reviews found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="px-xl py-6 bg-surface-container-low/30 border-t border-outline-variant/10 flex items-center justify-between">
                        <span class="text-label-sm text-on-surface-variant font-medium">Showing 1-10 of 1,284 entries</span>
                        <div class="flex items-center gap-sm">
                            <button
                                class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low">
                                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                            </button>
                            <button
                                class="w-8 h-8 rounded-lg flex items-center justify-center bg-primary text-on-primary font-label-sm text-label-sm">1</button>
                            <button
                                class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low font-label-sm text-label-sm">2</button>
                            <button
                                class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low font-label-sm text-label-sm">3</button>
                            <button
                                class="w-8 h-8 rounded-lg flex items-center justify-center border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low">
                                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review Modal Overlay -->
            <div class="fixed inset-0 bg-inverse-surface/40 backdrop-blur-md flex items-center justify-center p-xl z-[100]"
                x-show="showReviewModal" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">

                <div class="bg-surface-container-lowest w-full max-w-2xl rounded-2xl emerald-glow-strong overflow-hidden flex flex-col max-h-[90vh]"
                    @click.away="showReviewModal = false">
                    <div class="p-lg border-b border-outline-variant/10 flex justify-between items-center">
                        <div class="flex items-center gap-md">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <span class="material-symbols-outlined text-primary">fact_check</span>
                            </div>
                            <h2 class="font-headline-md text-headline-md">Institutional Quality Review</h2>
                        </div>
                        <button @click="showReviewModal = false"
                            class="w-10 h-10 rounded-full hover:bg-surface-container-low flex items-center justify-center">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto p-lg space-y-lg" x-if="currentReview">
                        <div class="grid grid-cols-2 gap-lg">
                            <div class="space-y-sm">
                                <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Batch Identity</p>
                                <p class="font-label-lg text-label-lg font-bold"
                                    x-text="`#${currentReview.batch_number} | ${currentReview.product.name}`"></p>
                            </div>
                            <div class="space-y-sm">
                                <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Submitting
                                    Authority</p>
                                <p class="font-label-lg text-label-lg font-bold" x-text="currentReview.authority_name"></p>
                            </div>
                        </div>

                        <div class="bg-surface-container-low p-lg rounded-xl space-y-md">
                            <p class="font-label-lg text-label-lg text-on-surface border-b border-outline-variant/20 pb-2"
                                x-text="currentReview.parameter_name"></p>
                            <div class="flex items-center justify-between">
                                <span class="text-body-md">Measured Value</span>
                                <span class="font-bold text-primary" x-text="`${currentReview.measured_value}%` "></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-body-md">Permissible Limit</span>
                                <span class="text-on-surface-variant" x-text="currentReview.permissible_range"></span>
                            </div>
                            <div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
                                <div class="h-full bg-primary" :style="`width: ${currentReview.quality_score}%` "></div>
                            </div>
                        </div>

                        <div class="space-y-md">
                            <p class="font-label-lg text-label-lg text-on-surface">Verification Documents</p>
                            <div class="grid grid-cols-1 gap-sm">
                                <template x-for="doc in currentReview.documents" :key="doc.name">
                                    <div
                                        class="flex items-center justify-between p-md bg-surface-container-lowest border border-outline-variant/30 rounded-lg hover:border-primary transition-colors cursor-pointer">
                                        <div class="flex items-center gap-md">
                                            <span class="material-symbols-outlined text-secondary"
                                                x-text="doc.name.endsWith('.pdf') ? 'description' : 'photo_camera'"></span>
                                            <span class="text-body-md" x-text="doc.name"></span>
                                        </div>
                                        <span class="material-symbols-outlined text-primary"
                                            x-text="doc.name.endsWith('.pdf') ? 'download' : 'visibility'"></span>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="space-y-sm">
                            <label class="font-label-lg text-label-lg">Review Notes (Internal)</label>
                            <textarea x-model="reviewNotes"
                                class="w-full bg-surface-container-low border border-outline-variant/50 rounded-xl p-md h-24 focus:ring-2 focus:ring-primary/20 outline-none transition-all"
                                placeholder="Enter professional oversight notes..."></textarea>
                        </div>
                    </div>

                    <div class="p-lg bg-surface-container-low/50 border-t border-outline-variant/10 flex gap-md"
                        x-show="currentReview && currentReview.status === 'pending'">
                        <form :action="`/admin/review/reject/${currentReview ? currentReview.id : ''}`" method="POST"
                            class="flex-1">
                            @csrf
                            <input type="hidden" name="reason" :value="reviewNotes">
                            <button type="submit"
                                class="w-full bg-surface-container-lowest border border-error text-error py-3 rounded-xl font-label-lg text-label-lg hover:bg-error/5 transition-colors">Reject
                                Batch</button>
                        </form>

                        <form :action="`/admin/review/approve/${currentReview ? currentReview.id : ''}`" method="POST"
                            class="flex-[2]">
                            @csrf
                            <button type="submit"
                                class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-lg text-label-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'FILL' 1;">verified</span>
                                Approve for Marketplace
                            </button>
                        </form>
                    </div>

                    <div class="p-lg bg-surface-container-low/50 border-t border-outline-variant/10 flex justify-center"
                        x-show="currentReview && currentReview.status !== 'pending'">
                        <span class="font-label-lg text-label-lg px-6 py-2 rounded-full"
                            :class="currentReview && currentReview.status === 'approved' ? 'bg-tertiary/10 text-tertiary' : 'bg-error/10 text-error'"
                            x-text="currentReview ? `Batch ${currentReview.status.charAt(0).toUpperCase() + currentReview.status.slice(1)}` : ''">
                        </span>
                    </div>
                </div>
            </div>
            <!-- Footer Shared Component -->
            <footer class="mt-xl border-t border-outline-variant/30 bg-surface-container-lowest">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop py-12 max-w-container-max mx-auto">
                    <div class="col-span-1 md:col-span-1">
                        <h2 class="font-headline-md text-primary font-bold mb-4">AgriMandi India</h2>
                        <p class="font-body-md text-on-surface-variant mb-6">Empowering Indian farmers through institutional
                            technology and transparent commodity trading.</p>
                    </div>
                    <div>
                        <h4 class="font-label-lg text-label-lg text-on-surface mb-4">Platform</h4>
                        <ul class="space-y-2">
                            <li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md"
                                    href="#">Marketplace</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md"
                                    href="#">Analytics Hub</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md"
                                    href="#">Institutional Bidding</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-label-lg text-label-lg text-on-surface mb-4">Support</h4>
                        <ul class="space-y-2">
                            <li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md"
                                    href="#">Trade Support</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md"
                                    href="#">Privacy Policy</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary transition-colors font-body-md"
                                    href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-label-lg text-label-lg text-on-surface mb-4">Institutional Info</h4>
                        <p class="text-on-surface-variant font-body-md mb-4">Tower A, Ag-Tech Park, Sector 44, Gurgaon -
                            122003</p>
                        <div class="flex gap-md">
                            <button
                                class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary-container/20 transition-colors">
                                <span class="material-symbols-outlined text-primary">mail</span>
                            </button>
                            <button
                                class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center hover:bg-primary-container/20 transition-colors">
                                <span class="material-symbols-outlined text-primary">phone</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="px-margin-desktop py-6 border-t border-outline-variant/10 text-center">
                    <p class="font-body-md text-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital
                        Growth.</p>
                </div>
            </footer>
        </main>
    </div>

@endsection