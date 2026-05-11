@extends('layouts.stitch')
@section('title', 'Transporter Dashboard - AgriMandi')
@section('content')

<div class="flex min-h-screen bg-surface">

{{-- Sidebar --}}
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
    <div class="px-6 mb-6">
        <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
        <p class="text-label-sm text-on-surface-variant">Transporter Portal</p>
    </div>
    <nav class="flex-1 flex flex-col gap-1 pr-4">
        <a class="flex items-center gap-3 px-6 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('transporter.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all" href="{{ route('transporter.deliveries') }}">
            <span class="material-symbols-outlined">local_shipping</span> My Deliveries
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface font-label-md transition-all" href="{{ route('profile') }}">
            <span class="material-symbols-outlined">person</span> Profile
        </a>
    </nav>
    <div class="px-6 mt-auto space-y-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-3 text-error font-label-lg rounded-xl flex items-center justify-center gap-2 hover:bg-error-container transition-colors">
                <span class="material-symbols-outlined">logout</span> Logout
            </button>
        </form>
    </div>
</aside>

{{-- Main Content --}}
<div class="flex-1 flex flex-col min-w-0">

    {{-- Header --}}
    <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20">
        <div>
            <h2 class="font-headline-md text-on-surface font-bold">Transporter Dashboard</h2>
            <p class="font-body-sm text-on-surface-variant">{{ now()->format('l, d M Y') }}</p>
        </div>
        <a href="{{ route('profile') }}" class="flex items-center gap-2 bg-surface-variant/50 py-1 pl-1 pr-4 rounded-full hover:bg-surface-variant transition-colors">
            <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-sm">
                {{ strtoupper(substr($transporter->name, 0, 2)) }}
            </div>
            <span class="font-label-md text-on-surface">{{ $transporter->name }}</span>
        </a>
    </header>

    <main class="p-8 space-y-8">

        @if(session('success'))
        <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
        </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <p class="font-label-md text-on-surface-variant mb-1">Total Deliveries</p>
                <p class="font-display-sm text-primary font-bold">{{ $stats['total_deliveries'] }}</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <p class="font-label-md text-on-surface-variant mb-1">Active</p>
                <p class="font-display-sm text-tertiary font-bold">{{ $stats['active'] }}</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <p class="font-label-md text-on-surface-variant mb-1">Pending Pickup</p>
                <p class="font-display-sm text-secondary font-bold">{{ $stats['pending_pickup'] }}</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                <p class="font-label-md text-on-surface-variant mb-1">Completed</p>
                <p class="font-display-sm text-on-surface font-bold">{{ $stats['completed'] }}</p>
            </div>
        </div>

        {{-- Active Deliveries --}}
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-headline-sm text-on-surface font-bold">Active Deliveries</h3>
                <a href="{{ route('transporter.deliveries') }}" class="font-label-md text-primary hover:underline">View all →</a>
            </div>

            @if($activeDeliveries->isEmpty())
            <div class="bg-surface-container-lowest rounded-2xl p-12 border border-outline-variant/10 flex flex-col items-center justify-center text-center">
                <span class="material-symbols-outlined text-5xl text-outline mb-4">local_shipping</span>
                <h4 class="font-headline-sm text-on-surface mb-2">No Active Deliveries</h4>
                <p class="font-body-md text-on-surface-variant">You have no deliveries assigned at the moment.</p>
            </div>
            @else
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                @foreach($activeDeliveries as $order)
                <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 hover:border-primary/30 transition-all">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="font-label-lg text-primary font-bold">#{{ $order->order_number }}</p>
                            <p class="font-body-md text-on-surface font-semibold">{{ $order->product->name ?? 'Product' }}</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-label-sm font-bold
                            @if($order->order_status === 'in_transit') bg-primary/10 text-primary
                            @elseif($order->order_status === 'confirmed') bg-secondary/10 text-secondary
                            @else bg-surface-container text-on-surface-variant @endif">
                            {{ ucwords(str_replace('_', ' ', $order->order_status)) }}
                        </span>
                    </div>
                    <div class="space-y-1 text-body-sm text-on-surface-variant mb-4">
                        <p><span class="material-symbols-outlined text-[14px] align-middle">person</span> Buyer: {{ $order->buyer->name ?? '—' }}</p>
                        <p><span class="material-symbols-outlined text-[14px] align-middle">location_on</span> To: {{ $order->delivery_location ?? '—' }}</p>
                        <p><span class="material-symbols-outlined text-[14px] align-middle">inventory_2</span> {{ $order->product->quantity ?? '—' }} {{ $order->product->unit ?? '' }}</p>
                    </div>
                    <div class="flex gap-2">
                        @if($order->order_status === 'confirmed')
                        <form method="POST" action="{{ route('transporter.delivery.pickup', $order->id) }}">
                            @csrf
                            <button type="submit" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md hover:opacity-90 active:scale-95 transition-all">
                                Mark Picked Up
                            </button>
                        </form>
                        @elseif($order->order_status === 'in_transit')
                        <form method="POST" action="{{ route('transporter.delivery.deliver', $order->id) }}">
                            @csrf
                            <button type="submit" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md hover:opacity-90 active:scale-95 transition-all">
                                Mark Delivered
                            </button>
                        </form>
                        @endif
                        <a href="{{ route('transporter.delivery.detail', $order->id) }}" class="bg-surface-container px-4 py-2 rounded-lg font-label-md text-on-surface hover:bg-surface-variant transition-colors">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </main>
</div>
</div>

@endsection
