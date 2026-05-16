@extends('layouts.stitch')
@section('title', 'Orders - AgriMandi')
@section('content')

<!-- Top Navigation Bar -->
<nav class="flex items-center justify-between px-margin-desktop h-20 w-full sticky top-[41px] z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-8">
<span class="font-headline-md text-primary font-bold tracking-tight text-headline-md">AgriMandi India</span>
        <div class="hidden md:flex items-center gap-6">
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('marketplace') }}">Marketplace</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('analytics') }}">Analytics</a>
            <a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="{{ route('buyer.orders') }}">Orders</a>
            <a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="{{ route('resources') }}">Resources</a>
        </div>
</div>
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2 mr-4">
            <a href="{{ route('notifications') }}" class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full cursor-pointer transition-colors" data-icon="notifications">notifications</a>
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full cursor-pointer transition-colors" data-icon="language">language</button>
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-surface-container-lowest border border-outline-variant/20 rounded-xl shadow-2xl z-[100] overflow-hidden p-2 space-y-1">
                    @foreach(['en' => 'English', 'hi' => 'हिंदी', 'mr' => 'मराठी'] as $code => $name)
                        <a href="{{ route('set-locale', $code) }}" class="block px-4 py-2 rounded-lg hover:bg-primary/10 text-on-surface font-label-md">{{ $name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="{{ route('marketplace') }}" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-label-md text-label-md active:scale-95 transition-transform duration-200">Start Selling</a>
        <a href="{{ route('profile') }}" class="w-10 h-10 rounded-full bg-surface-container overflow-hidden border border-outline-variant/20">
            <img alt="User profile" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E8F5E9&color=2E7D32"/>
        </a>
    </div>
</nav>
<div class="flex max-w-[1440px] mx-auto min-h-[calc(100vh-121px)]">
<!-- Side Navigation Bar -->
<aside class="hidden lg:flex flex-col w-72 h-screen sticky top-[121px] py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl rounded-r-xl">
<div class="px-6 mb-4">
<h3 class="font-headline-sm text-primary font-bold text-[20px]">Orders &amp; Logistics</h3>
<p class="text-label-sm text-on-surface-variant font-label-sm">Fulfillment Dashboard</p>
</div>
    <nav class="flex flex-col gap-1 px-4">
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="{{ route('buyer.dashboard') }}">
            <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
            <span class="font-label-md text-label-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg group" href="{{ route('buyer.orders') }}">
            <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
            <span class="font-label-md text-label-md">All Orders</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="{{ route('marketplace') }}">
            <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
            <span class="font-label-md text-label-md">Inventory</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="{{ route('buyer.my-bids') }}">
            <span class="material-symbols-outlined" data-icon="gavel">gavel</span>
            <span class="font-label-md text-label-md">Pending Bids</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="{{ route('profile') }}">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="font-label-md text-label-md">Settings</span>
        </a>
    </nav>
<div class="mt-auto px-4 pb-8">
<div class="bg-primary/5 p-4 rounded-xl border border-primary/10">
<p class="text-label-sm font-label-sm text-primary mb-2">Pro Insights</p>
<p class="text-[13px] text-on-surface-variant leading-tight mb-3">Market demand for Basmati Rice is expected to rise by 15% next week.</p>
<button class="w-full bg-primary text-white py-2 rounded-lg text-label-sm font-label-sm hover:opacity-90 transition-opacity">View Trends</button>
</div>
</div>
</aside>
<!-- Main Content Area -->
        <main class="flex-1 p-gutter md:p-margin-desktop overflow-x-hidden">
            <!-- Header Section -->
            <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-xl">
                <div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface">Order Tracking</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2">Manage your fulfillment pipeline and active logistics.</p>
                </div>
            </header>

            <!-- Status Overview -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter mb-xl">
                <div class="bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant/10">
                    <p class="text-label-md font-label-md text-on-surface-variant">Active Orders</p>
                    <p class="text-display-sm font-display-sm text-primary font-bold">{{ $orders->whereIn('order_status', ['confirmed', 'shipped'])->count() }}</p>
                </div>
                <div class="bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant/10">
                    <p class="text-label-md font-label-md text-on-surface-variant">Completed</p>
                    <p class="text-display-sm font-display-sm text-on-surface font-bold">{{ $orders->where('order_status', 'delivered')->count() }}</p>
                </div>
            </div>

            <!-- Orders Table -->
            <section class="bg-surface-container-lowest rounded-[32px] border border-outline-variant/10 overflow-hidden shadow-sm">
                <div class="p-lg border-b border-outline-variant/10">
                    <h3 class="font-headline-md text-headline-md">My Orders</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low">
                            <tr>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Order ID</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Commodity</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Farmer</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Status</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container text-right">Value</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse($orders as $order)
                            <tr class="hover:bg-surface-container-low/50 transition-colors">
                                <td class="px-lg py-5 font-bold text-on-surface">#{{ $order->order_number }}</td>
                                <td class="px-lg py-5">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary">eco</span>
                                        <span class="text-body-md">{{ $order->product->name ?? '—' }}</span>
                                    </div>
                                </td>
                                <td class="px-lg py-5 text-on-surface-variant">{{ $order->farmer->name ?? '—' }}</td>
                                <td class="px-lg py-5">
                                    <span class="px-3 py-1 rounded-full text-label-sm font-bold
                                        @if($order->order_status === 'delivered') bg-primary/10 text-primary
                                        @elseif($order->order_status === 'shipped') bg-tertiary/10 text-tertiary
                                        @else bg-secondary/10 text-secondary @endif">
                                        {{ ucwords(str_replace('_',' ',$order->order_status)) }}
                                    </span>
                                </td>
                                <td class="px-lg py-5 font-bold text-on-surface text-right">₹{{ number_format($order->total_amount) }}</td>
                                <td class="px-lg py-5">
                                    @if($order->order_status === 'shipped')
                                    <form action="{{ route('buyer.orders.confirm', $order->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-primary font-bold hover:underline">Confirm Delivery</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-lg py-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <span class="material-symbols-outlined text-5xl text-outline-variant">shopping_cart_off</span>
                                        <p class="text-on-surface-variant">No orders found. <a href="{{ route('marketplace') }}" class="text-primary font-bold">Browse Marketplace</a></p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
            
            <div class="mt-xl">
                {{ $orders->links() }}
            </div>
        </main>
</div>
<!-- Footer Component -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 py-12 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop max-w-[1440px] mx-auto">
<div class="flex flex-col gap-4">
<span class="font-headline-md text-primary font-bold text-headline-md">AgriMandi India</span>
<p class="font-body-md text-body-md text-on-surface-variant">Cultivating digital growth and connecting India's agricultural ecosystem with high-tech fulfillment solutions.</p>
</div>
    <div class="flex flex-col gap-4">
        <h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Quick Links</h4>
        <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="{{ route('marketplace') }}">Marketplace</a>
        <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="{{ route('analytics') }}">Analytics Dashboard</a>
        <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="{{ route('notifications') }}">Trade Support</a>
    </div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Legal</h4>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Privacy Policy</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Terms of Service</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Cookie Policy</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Contact</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Support Hub: 1800-AGRI-MANDI</p>
<p class="font-body-md text-body-md text-on-surface-variant">Email: help@agrimandi.in</p>
<div class="flex gap-4 mt-2">
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity" data-icon="share">share</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity" data-icon="language">language</span>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-outline-variant/10 px-margin-desktop max-w-[1440px] mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
<p class="font-body-md text-body-md text-on-surface-variant opacity-80">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
<div class="flex items-center gap-4">
<div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-sm" data-icon="verified">verified</span>
</div>
<span class="text-label-sm font-label-sm text-on-surface-variant">Authorized Digital Mandi Hub</span>
</div>
</div>
</footer>

@endsection
