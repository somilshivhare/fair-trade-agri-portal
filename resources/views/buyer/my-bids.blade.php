@extends('layouts.stitch')
@section('title', 'My Bids - AgriMandi')
@section('content')

<div class="flex min-h-screen bg-surface">
    {{-- Sidebar --}}
    <aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
        <div class="px-6 mb-8">
            <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
            <p class="text-label-sm text-on-surface-variant">Buyer Portal</p>
        </div>
        <nav class="flex-1 px-4 space-y-1">
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('buyer.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span><span>Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('marketplace') }}">
                <span class="material-symbols-outlined">store</span><span class="font-label-md">Marketplace</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('buyer.my-bids') }}">
                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">gavel</span><span class="font-label-md">My Bids</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('buyer.orders') }}">
                <span class="material-symbols-outlined">shopping_bag</span><span class="font-label-md">My Orders</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('notifications') }}">
                <span class="material-symbols-outlined">notifications</span><span class="font-label-md">Notifications</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('profile') }}">
                <span class="material-symbols-outlined">person</span><span class="font-label-md">Profile</span>
            </a>
        </nav>
        <div class="px-4 mt-auto">
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
        <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20">
            <div>
                <h2 class="font-headline-md text-on-surface font-bold">My Bids</h2>
                <p class="font-body-sm text-on-surface-variant">Track your active offers and auction participation.</p>
            </div>
            <div class="flex items-center gap-4">
                <nav class="flex bg-surface-container-low p-1 rounded-xl border border-outline-variant/20">
                    <a href="?tab=all" class="px-4 py-1.5 rounded-lg text-label-md {{ !request('tab') || request('tab') == 'all' ? 'bg-primary text-on-primary shadow-md' : 'text-on-surface-variant hover:bg-surface-variant' }}">All</a>
                    <a href="?tab=pending" class="px-4 py-1.5 rounded-lg text-label-md {{ request('tab') == 'pending' ? 'bg-primary text-on-primary shadow-md' : 'text-on-surface-variant hover:bg-surface-variant' }}">Active</a>
                    <a href="?tab=accepted" class="px-4 py-1.5 rounded-lg text-label-md {{ request('tab') == 'accepted' ? 'bg-primary text-on-primary shadow-md' : 'text-on-surface-variant hover:bg-surface-variant' }}">Won</a>
                </nav>
            </div>
        </header>

        <main class="p-8">
            @if(session('success'))
            <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
            </div>
            @endif

            @if($bids->isEmpty())
            <div class="bg-surface-container-lowest rounded-[32px] p-16 border border-outline-variant/10 flex flex-col items-center justify-center text-center">
                <div class="w-24 h-24 rounded-full bg-primary/5 flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-5xl text-primary/40">gavel</span>
                </div>
                <h4 class="font-headline-md text-on-surface mb-2">No Bids Yet</h4>
                <p class="font-body-md text-on-surface-variant max-w-sm mb-8">Start participating in the marketplace by placing bids on fresh produce from verified farmers.</p>
                <a href="{{ route('marketplace') }}" class="bg-primary text-on-primary px-8 py-3 rounded-xl font-label-lg hover:brightness-110 shadow-lg active:scale-95 transition-all">Browse Marketplace</a>
            </div>
            @else
            <div class="grid grid-cols-1 gap-6">
                @foreach($bids as $bid)
                <div class="bg-surface-container-lowest rounded-[24px] border border-outline-variant/10 overflow-hidden hover:shadow-xl transition-all group">
                    <div class="flex flex-col md:flex-row">
                        {{-- Image placeholder based on product --}}
                        <div class="w-full md:w-64 h-48 bg-surface-container-high relative overflow-hidden shrink-0">
                            <img src="https://images.unsplash.com/photo-1595231712325-9fdec20d1829?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $bid->product->name ?? 'Product' }}">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full text-label-sm font-bold shadow-lg
                                    @if($bid->status === 'pending') bg-primary text-on-primary
                                    @elseif($bid->status === 'accepted') bg-tertiary text-on-tertiary
                                    @elseif($bid->status === 'countered') bg-secondary text-on-secondary
                                    @else bg-error text-on-error @endif">
                                    {{ ucfirst($bid->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                                <div>
                                    <h3 class="font-headline-sm text-on-surface font-bold mb-1">{{ $bid->product->name ?? 'Product' }}</h3>
                                    <p class="text-body-md text-on-surface-variant flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[18px]">agriculture</span>
                                        Farmer: {{ $bid->farmer->name ?? '—' }}
                                    </p>
                                    <p class="text-body-sm text-on-surface-variant mt-2">
                                        Location: {{ $bid->product->location['state'] ?? 'India' }}
                                    </p>
                                </div>
                                <div class="text-left md:text-right">
                                    <p class="text-label-sm text-on-surface-variant font-label-sm uppercase">Your Bid</p>
                                    <p class="text-headline-md font-bold text-primary">₹{{ number_format($bid->bid_price) }} <span class="text-label-md font-normal text-on-surface-variant">/{{ $bid->product->unit ?? 'unit' }}</span></p>
                                    <p class="text-body-sm text-on-surface-variant mt-1">Quantity: {{ $bid->quantity }} {{ $bid->product->unit ?? '' }}</p>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-outline-variant/10 flex flex-col md:flex-row items-center justify-between gap-4">
                                <div class="flex items-center gap-6">
                                    <div>
                                        <p class="text-label-xs text-on-surface-variant uppercase">Total Value</p>
                                        <p class="font-label-lg text-on-surface">₹{{ number_format($bid->total_amount) }}</p>
                                    </div>
                                    @if($bid->status === 'countered')
                                    <div class="bg-secondary/10 px-4 py-2 rounded-xl border border-secondary/20">
                                        <p class="text-label-xs text-secondary uppercase font-bold">Farmer Counter</p>
                                        <p class="font-label-lg text-secondary">₹{{ number_format($bid->counter_price) }}</p>
                                    </div>
                                    @endif
                                </div>

                                <div class="flex items-center gap-3">
                                    @if($bid->status === 'countered')
                                    <form method="POST" action="{{ route('buyer.bids.accept-counter', $bid->id) }}">
                                        @csrf
                                        <button class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-label-lg hover:brightness-110 active:scale-95 transition-all">Accept Counter</button>
                                    </form>
                                    @endif
                                                                        <a href="{{ route('product.details', $bid->product_id) }}" class="bg-surface-container px-6 py-2.5 rounded-xl font-label-lg text-on-surface hover:bg-surface-variant transition-colors">View Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $bids->links() }}
            </div>
            @endif
        </main>
    </div>
</div>

@endsection

@endsection
