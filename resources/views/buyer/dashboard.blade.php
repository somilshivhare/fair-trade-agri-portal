@extends('layouts.stitch')
@section('title', 'Buyer Dashboard - AgriMandi')
@section('content')

<div class="flex min-h-screen bg-surface">

{{-- Sidebar --}}
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
    <div class="px-6 mb-8 flex items-center gap-3">
        <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-on-primary">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
        </div>
        <div>
            <h2 class="font-headline-sm text-primary font-bold">AgriMandi</h2>
            <p class="text-label-sm text-on-surface-variant">Buyer Portal</p>
        </div>
    </div>
    <nav class="flex-1 flex flex-col gap-1 pr-4">
        <a class="flex items-center gap-3 px-6 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg font-label-md transition-all" href="{{ route('buyer.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all active:translate-x-1" href="{{ route('marketplace') }}">
            <span class="material-symbols-outlined">store</span> Marketplace
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all active:translate-x-1" href="{{ route('buyer.my-bids') }}">
            <span class="material-symbols-outlined">gavel</span> My Bids
            @php $activeBids = $stats['active_bids']; @endphp
            @if($activeBids > 0)
            <span class="ml-auto bg-primary text-on-primary text-label-sm px-2 py-0.5 rounded-full">{{ $activeBids }}</span>
            @endif
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all active:translate-x-1" href="{{ route('buyer.orders') }}">
            <span class="material-symbols-outlined">shopping_bag</span> My Orders
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all active:translate-x-1" href="{{ route('profile') }}">
            <span class="material-symbols-outlined">settings</span> Settings
        </a>
    </nav>
    <div class="px-6 mt-auto space-y-2">
        <a href="{{ route('marketplace') }}" class="w-full py-4 bg-primary text-on-primary rounded-xl font-label-lg shadow-lg active:scale-95 transition-all flex items-center justify-center gap-2">
            <span class="material-symbols-outlined">store</span> Browse Market
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-3 text-error font-label-lg rounded-xl flex items-center justify-center gap-2 hover:bg-error-container transition-colors">
                <span class="material-symbols-outlined">logout</span> Logout
            </button>
        </form>
    </div>
</aside>

<div class="flex-1 flex flex-col min-w-0">

    {{-- Header --}}
    <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-sm">
        <div>
            <h2 class="font-headline-md text-on-surface font-bold">Welcome, {{ auth()->user()->name }}! 👋</h2>
            <p class="font-body-sm text-on-surface-variant">{{ now()->format('l, d M Y') }}</p>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('notifications') }}" class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full transition-colors cursor-pointer">notifications</a>
            <a href="{{ route('profile') }}" class="flex items-center gap-2 bg-surface-variant/50 py-1 pl-1 pr-4 rounded-full hover:bg-surface-variant transition-colors">
                <img alt="Profile" class="w-8 h-8 rounded-full border-2 border-primary-container" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=10B981&color=fff' }}"/>
                <span class="font-label-md text-on-surface hidden sm:block">{{ auth()->user()->name }}</span>
            </a>
        </div>
    </header>
    {{-- Market Ticker --}}
    <div class="w-full bg-surface-container-lowest border-b border-outline-variant/10 overflow-hidden h-10 flex items-center relative">
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

    <main class="p-8 space-y-8">

        @if(session('success'))
        <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
        </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <div class="flex items-center justify-between mb-2">
                    <p class="font-label-md text-on-surface-variant">Active Bids</p>
                    <span class="material-symbols-outlined text-primary">gavel</span>
                </div>
                <p class="font-display-sm text-primary font-bold">{{ $stats['active_bids'] }}</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <div class="flex items-center justify-between mb-2">
                    <p class="font-label-md text-on-surface-variant">Total Orders</p>
                    <span class="material-symbols-outlined text-tertiary">shopping_bag</span>
                </div>
                <p class="font-display-sm text-tertiary font-bold">{{ $stats['total_orders'] }}</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <div class="flex items-center justify-between mb-2">
                    <p class="font-label-md text-on-surface-variant">Pending Orders</p>
                    <span class="material-symbols-outlined text-secondary">local_shipping</span>
                </div>
                <p class="font-display-sm text-secondary font-bold">{{ $stats['pending_orders'] }}</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <div class="flex items-center justify-between mb-2">
                    <p class="font-label-md text-on-surface-variant">Total Spent</p>
                    <span class="material-symbols-outlined text-on-surface">payments</span>
                </div>
                <p class="font-display-sm text-on-surface font-bold">₹{{ number_format($stats['total_spent']) }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Recent Bids --}}
            <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10">
                <div class="flex items-center justify-between p-6 border-b border-outline-variant/10">
                    <h3 class="font-headline-sm text-on-surface font-bold">Recent Bids</h3>
                    <a href="{{ route('buyer.my-bids') }}" class="font-label-md text-primary hover:underline">View all →</a>
                </div>
                @if($recentBids->isEmpty())
                <div class="p-12 flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-5xl text-outline mb-3">gavel</span>
                    <p class="font-label-md text-on-surface-variant mb-3">No bids placed yet</p>
                    <a href="{{ route('marketplace') }}" class="bg-primary text-on-primary px-4 py-2 rounded-xl font-label-md hover:brightness-110 transition-all">Browse Products</a>
                </div>
                @else
                <div class="divide-y divide-outline-variant/10">
                    @foreach($recentBids as $bid)
                    <div class="flex items-center justify-between px-6 py-4 hover:bg-surface-container-low/20 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary-container/20 flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary text-[18px]">eco</span>
                            </div>
                            <div>
                                <p class="font-label-md text-on-surface">{{ $bid->product->name ?? '—' }}</p>
                                <p class="font-body-sm text-on-surface-variant">₹{{ number_format($bid->bid_price) }} · {{ $bid->quantity }} {{ $bid->product->unit ?? '' }}</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-label-sm font-bold shrink-0
                            @if($bid->status === 'pending')   bg-primary/10 text-primary
                            @elseif($bid->status === 'accepted') bg-on-surface/10 text-on-surface
                            @elseif($bid->status === 'countered') bg-secondary/10 text-secondary
                            @elseif($bid->status === 'rejected') bg-error/10 text-error
                            @else bg-surface-container text-on-surface-variant @endif">
                            {{ ucfirst($bid->status) }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Recent Orders --}}
            <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10">
                <div class="flex items-center justify-between p-6 border-b border-outline-variant/10">
                    <h3 class="font-headline-sm text-on-surface font-bold">Recent Orders</h3>
                    <a href="{{ route('buyer.orders') }}" class="font-label-md text-primary hover:underline">View all →</a>
                </div>
                @if($recentOrders->isEmpty())
                <div class="p-12 flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-5xl text-outline mb-3">shopping_bag</span>
                    <p class="font-label-md text-on-surface-variant mb-3">No orders yet</p>
                    <a href="{{ route('marketplace') }}" class="bg-primary text-on-primary px-4 py-2 rounded-xl font-label-md hover:brightness-110 transition-all">Start Shopping</a>
                </div>
                @else
                <div class="divide-y divide-outline-variant/10">
                    @foreach($recentOrders as $order)
                    <div class="flex items-center justify-between px-6 py-4 hover:bg-surface-container-low/20 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-tertiary-container/20 flex items-center justify-center">
                                <span class="material-symbols-outlined text-tertiary text-[18px]">shopping_bag</span>
                            </div>
                            <div>
                                <p class="font-label-md text-on-surface">{{ $order->product->name ?? '—' }}</p>
                                <p class="font-body-sm text-on-surface-variant">#{{ $order->order_number }} · ₹{{ number_format($order->total_amount) }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="px-2.5 py-1 rounded-full text-label-sm font-bold block shrink-0
                                @if($order->order_status === 'delivered') bg-primary/10 text-primary
                                @elseif($order->order_status === 'shipped') bg-tertiary/10 text-tertiary
                                @else bg-secondary/10 text-secondary @endif">
                                {{ ucwords(str_replace('_',' ',$order->order_status)) }}
                            </span>
                            @if($order->order_status === 'shipped')
                            <form method="POST" action="{{ route('buyer.orders.confirm', $order->id) }}" class="mt-1">
                                @csrf
                                <button type="submit" class="text-primary text-label-sm hover:underline font-bold">Confirm Delivery</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        {{-- Quick Action --}}
        <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl p-6 border border-primary/20 flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <h3 class="font-headline-sm text-on-surface font-bold mb-1">Explore the Marketplace</h3>
                <p class="font-body-md text-on-surface-variant">Discover fresh produce from verified farmers across India</p>
            </div>
            <a href="{{ route('marketplace') }}" class="bg-primary text-on-primary px-8 py-3 rounded-xl font-label-lg hover:brightness-110 active:scale-95 transition-all shrink-0 flex items-center gap-2">
                <span class="material-symbols-outlined">store</span> Browse Now
            </a>
        </div>

    </main>
</div>
</div>

@endsection
