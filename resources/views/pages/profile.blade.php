@extends('layouts.stitch')
@section('title', 'Profile - AgriMandi')
@section('content')

<div class="w-full bg-surface-container-lowest h-8 border-b border-outline-variant/10 overflow-hidden flex items-center relative">
    <div class="animate-marquee gap-12 items-center">
        @php $tickerPrices = \App\Models\MarketPrice::today()->take(10)->get(); @endphp
        @foreach($tickerPrices as $p)
        <span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">{{ $p->commodity }} <span class="text-primary font-bold">₹{{ number_format($p->modal_price) }} ({{ $p->trend === 'up' ? '▲' : '▼' }})</span></span>
        @endforeach
        {{-- Duplicate for infinite effect --}}
        @foreach($tickerPrices as $p)
        <span class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">{{ $p->commodity }} <span class="text-primary font-bold">₹{{ number_format($p->modal_price) }} ({{ $p->trend === 'up' ? '▲' : '▼' }})</span></span>
        @endforeach
    </div>
</div>
<header class="bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)] flex items-center justify-between px-margin-desktop h-20 w-full sticky top-0 z-50">
<div class="flex items-center gap-8">
<h1 class="font-headline-md text-primary font-bold tracking-tight">AgriMandi India</h1>
<nav class="hidden md:flex gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface" href="#">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface" href="#">Analytics</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-6">
<div class="hidden lg:flex items-center bg-surface-container-low rounded-full px-4 py-2 border border-outline-variant/30 w-64">
<span class="material-symbols-outlined text-outline">search</span>
<input class="bg-transparent border-none focus:ring-0 text-label-lg w-full" placeholder="Search commodities..." type="text"/>
</div>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors">notifications</button>
<button class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors">language</button>
            <div class="h-10 w-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold overflow-hidden ring-2 ring-primary/20 ring-offset-2">
                <img id="headerAvatar" alt="User profile" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=10B981&color=fff' }}"/>
            </div>
</div>
</div>
</header>
<div class="flex min-h-[calc(100vh-80px)] bg-surface">
    <aside class="hidden md:flex flex-col w-72 h-[calc(100vh-80px)] py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-20 z-40">
        <div class="px-6 mb-8 flex items-center gap-3">
            <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-on-primary">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">{{ $user->role === 'farmer' ? 'agriculture' : 'shopping_cart' }}</span>
            </div>
            <div>
                <h2 class="font-headline-sm text-primary font-bold">AgriMandi</h2>
                <p class="text-label-sm text-on-surface-variant capitalize">{{ $user->role }} Portal</p>
            </div>
        </div>
        <nav class="flex-1 flex flex-col gap-1 pr-4">
            <a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all" href="{{ route($user->role . '.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>
            @if($user->role === 'farmer')
            <a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all" href="{{ route('farmer.products') }}">
                <span class="material-symbols-outlined">inventory_2</span> My Products
            </a>
            <a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all" href="{{ route('farmer.bids') }}">
                <span class="material-symbols-outlined">gavel</span> Bids
            </a>
            @else
            <a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all" href="{{ route('marketplace') }}">
                <span class="material-symbols-outlined">store</span> Marketplace
            </a>
            <a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all" href="{{ route('buyer.my-bids') }}">
                <span class="material-symbols-outlined">gavel</span> My Bids
            </a>
            @endif
            <a class="flex items-center gap-4 px-6 py-3 font-label-md text-label-md bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg" href="{{ route('profile') }}">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">settings</span> Settings
            </a>
        </nav>
        <div class="px-6 mt-auto">
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-3 text-error font-label-lg rounded-xl flex items-center justify-center gap-2 hover:bg-error-container transition-colors">
                    <span class="material-symbols-outlined">logout</span> Logout
                </button>
            </form>
        </div>
    </aside>
    <main class="flex-1 p-8 md:p-12 space-y-lg overflow-y-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-8">
            <div>
                <h2 class="font-display-lg text-display-lg text-on-surface">Account Settings</h2>
                <p class="text-body-lg text-on-surface-variant">Manage your commercial profile and trading preferences</p>
            </div>
            <div class="flex items-center gap-3">
                @if($user->is_kyc_verified)
                <button class="bg-primary-container text-on-primary-container px-6 py-3 rounded-lg font-label-lg flex items-center gap-2 active:scale-95 transition-transform duration-200">
                    <span class="material-symbols-outlined">verified</span> Verified Trader
                </button>
                @else
                <button class="bg-error-container text-on-error-container px-6 py-3 rounded-lg font-label-lg flex items-center gap-2 active:scale-95 transition-transform duration-200">
                    <span class="material-symbols-outlined">warning</span> Verification Pending
                </button>
                @endif
            </div>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-emerald border border-outline-variant/10">
            @csrf
            @method('PUT')
            
            <div class="flex border-b border-outline-variant/10 overflow-x-auto no-scrollbar bg-surface-container-low/30" id="profileTabs">
                <button type="button" data-tab="personal" class="tab-btn px-6 py-4 font-label-md text-primary border-b-2 border-primary whitespace-nowrap">Personal Info</button>
                <button type="button" data-tab="kyc" class="tab-btn px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Identity & KYC</button>
                <button type="button" data-tab="security" class="tab-btn px-6 py-4 font-label-md text-on-surface-variant hover:text-primary whitespace-nowrap">Security</button>
            </div>

            <div class="p-lg md:p-xl space-y-xl">
                @if(session('success'))
                <div class="p-4 bg-primary/10 text-primary rounded-xl border border-primary/20 flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    <p class="font-label-md">{{ session('success') }}</p>
                </div>
                @endif

                <section class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
                    <div class="col-span-1">
                        <h3 class="font-headline-md text-on-surface">Profile Identity</h3>
                        <p class="text-body-md text-on-surface-variant mt-2">Update your public trading identity and contact information visible to other market participants.</p>
                    </div>
                    <div class="lg:col-span-2 space-y-lg">
                        <div class="flex items-center gap-6 pb-6 border-b border-outline-variant/10">
                            <div class="relative group">
                                <img id="profilePreview" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-emerald object-cover" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=10B981&color=fff' }}"/>
                                <label for="avatar_input" class="absolute bottom-0 right-0 bg-primary text-on-primary p-2 rounded-full shadow-emerald-lg cursor-pointer hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-sm">photo_camera</span>
                                </label>
                            </div>
                            <div class="space-y-2">
                                <p class="font-label-lg text-on-surface">Change Profile Photo</p>
                                <p class="text-label-sm text-on-surface-variant">JPG, GIF or PNG. Max size of 2MB</p>
                                <form id="avatarForm" action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="hidden">
                                    @csrf
                                    <input type="file" id="avatar_input" name="avatar" onchange="document.getElementById('avatarForm').submit()">
                                </form>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                            <div class="space-y-2">
                                <label class="font-label-lg text-on-surface ml-1">Full Name</label>
                                <input name="name" class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="text" value="{{ old('name', $user->name) }}"/>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-lg text-on-surface ml-1">Business Name</label>
                                <input name="business_name" class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="text" value="{{ old('business_name', $user->business_name) }}"/>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-lg text-on-surface ml-1">Email Address</label>
                                <input class="w-full h-12 bg-surface-container-low/50 border-outline-variant/30 rounded-xl px-4 text-on-surface-variant cursor-not-allowed" type="email" value="{{ $user->email }}" disabled/>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-lg text-on-surface ml-1">Phone Number</label>
                                <div class="flex gap-2">
                                    <span class="flex items-center justify-center px-3 bg-surface-container-high rounded-xl text-on-surface-variant">+91</span>
                                    <input name="phone" class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="tel" value="{{ old('phone', $user->phone) }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="h-px bg-outline-variant/20 w-full"></div>

                <section class="grid grid-cols-1 lg:grid-cols-3 gap-xl tab-content" id="personalTab">
                    <div class="col-span-1">
                        <h3 class="font-headline-md text-on-surface">Location Information</h3>
                        <p class="text-body-md text-on-surface-variant mt-2">Essential details for logistics and trade verification.</p>
                    </div>
                    <div class="lg:col-span-2 space-y-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                            <div class="space-y-2">
                                <label class="font-label-lg text-on-surface ml-1">State</label>
                                <input name="state" class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="text" value="{{ old('state', $user->state) }}"/>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-lg text-on-surface ml-1">Pincode</label>
                                <input name="pincode" class="w-full h-12 bg-surface-container-low border-outline-variant/30 rounded-xl px-4 focus:border-primary focus:ring-0 transition-all" type="text" value="{{ old('pincode', $user->pincode) }}"/>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="hidden grid grid-cols-1 lg:grid-cols-3 gap-xl tab-content" id="kycTab">
                    <div class="col-span-1">
                        <h3 class="font-headline-md text-on-surface">Identity & KYC</h3>
                        <p class="text-body-md text-on-surface-variant mt-2">Your verification status and documents.</p>
                    </div>
                    <div class="lg:col-span-2">
                        @if($user->is_kyc_verified)
                        <div class="p-6 bg-primary-container/10 border border-primary/20 rounded-2xl flex items-center gap-4">
                            <span class="material-symbols-outlined text-primary text-4xl">verified_user</span>
                            <div>
                                <h4 class="font-headline-sm text-primary">Identity Verified</h4>
                                <p class="text-body-md text-on-surface-variant">Your account has full trading privileges.</p>
                            </div>
                        </div>
                        @else
                        <div class="p-6 bg-surface-container-low border border-outline-variant/20 rounded-2xl flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined text-outline text-4xl">contact_page</span>
                                <div>
                                    <h4 class="font-headline-sm text-on-surface">KYC Documents</h4>
                                    <p class="text-body-md text-on-surface-variant">Aadhar/PAN verification required.</p>
                                </div>
                            </div>
                            <a href="{{ route($user->role === 'farmer' ? 'farmer.kyc.submit' : 'home') }}" class="px-6 py-2 bg-primary text-on-primary rounded-lg font-label-md">Submit Now</a>
                        </div>
                        @endif
                    </div>
                </section>

                <section class="hidden grid grid-cols-1 lg:grid-cols-3 gap-xl tab-content" id="securityTab">
                    <div class="col-span-1">
                        <h3 class="font-headline-md text-on-surface">Security Settings</h3>
                        <p class="text-body-md text-on-surface-variant mt-2">Manage your password and session security.</p>
                    </div>
                    <div class="lg:col-span-2 space-y-lg">
                        <div class="p-6 bg-surface-container-low border border-outline-variant/20 rounded-2xl">
                             <h4 class="font-label-lg text-on-surface mb-4">Change Password</h4>
                             <p class="text-body-md text-on-surface-variant mb-6">It's a good idea to use a strong password that you don't use elsewhere.</p>
                             <button type="button" class="px-6 py-2 border border-primary text-primary rounded-lg font-label-md hover:bg-primary/5">Update Password</button>
                        </div>
                    </div>
                </section>

                <div class="flex justify-end gap-4 pt-8 border-t border-outline-variant/10">
                    <button type="reset" class="px-6 py-3 rounded-lg border border-outline-variant text-on-surface-variant font-label-lg hover:bg-surface-variant transition-colors">Discard Changes</button>
                    <button type="submit" class="px-10 py-3 rounded-lg bg-primary text-on-primary font-label-lg shadow-emerald hover:bg-primary/90 active:scale-95 transition-all">Save Changes</button>
                </div>
            </div>
        </form>
    </main>
</div>
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 mt-xl">
<div class="max-w-[1280px] mx-auto px-margin-desktop py-12 grid grid-cols-1 md:grid-cols-4 gap-gutter">
<div class="space-y-4">
<h4 class="font-headline-md text-primary font-bold">AgriMandi India</h4>
<p class="text-body-md text-on-surface-variant">The future of agricultural commodity trading. Efficient, transparent, and digital-first.</p>
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70">social_leaderboard</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70">language</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70">alternate_email</span>
</div>
</div>
<div class="space-y-4">
<h5 class="font-label-lg text-on-surface">Resources</h5>
<ul class="space-y-2">
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Market Intelligence</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Price Trends</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Regulatory Updates</a></li>
</ul>
</div>
<div class="space-y-4">
<h5 class="font-label-lg text-on-surface">Legal</h5>
<ul class="space-y-2">
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Privacy Policy</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Terms of Service</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Trading Guidelines</a></li>
</ul>
</div>
<div class="space-y-4">
<h5 class="font-label-lg text-on-surface">Support</h5>
<ul class="space-y-2">
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Contact Us</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Trade Support</a></li>
<li><a class="text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all" href="#">Help Center</a></li>
</ul>
</div>
</div>
<div class="max-w-[1280px] mx-auto px-margin-desktop py-6 border-t border-outline-variant/10 text-center md:text-left">
<p class="text-body-md text-on-surface-variant">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
</div>
</footer>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-tab');

            // Update tab styles
            tabs.forEach(t => {
                t.classList.remove('text-primary', 'border-b-2', 'border-primary');
                t.classList.add('text-on-surface-variant');
            });
            tab.classList.remove('text-on-surface-variant');
            tab.classList.add('text-primary', 'border-b-2', 'border-primary');

            // Update content visibility
            contents.forEach(c => c.classList.add('hidden'));
            document.getElementById(target + 'Tab').classList.remove('hidden');
        });
    });
});
</script>
@endpush
@endsection
