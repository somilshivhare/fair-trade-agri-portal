@extends('layouts.stitch')
@section('title', 'Delivery Detail - AgriMandi')
@section('content')

<div class="flex min-h-screen bg-surface">
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
    <div class="px-6 mb-6">
        <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
        <p class="text-label-sm text-on-surface-variant">Transporter Portal</p>
    </div>
    <nav class="flex-1 flex flex-col gap-1 pr-4">
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant font-label-md transition-all" href="{{ route('transporter.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a class="flex items-center gap-3 px-6 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('transporter.deliveries') }}">
            <span class="material-symbols-outlined">local_shipping</span> My Deliveries
        </a>
        <a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-variant font-label-md transition-all" href="{{ route('profile') }}">
            <span class="material-symbols-outlined">person</span> Profile
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

<div class="flex-1 flex flex-col min-w-0">
    <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20">
        <div class="flex items-center gap-3">
            <a href="{{ route('transporter.deliveries') }}" class="flex items-center gap-1 text-primary hover:underline font-label-md">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span> Back
            </a>
            <span class="text-on-surface-variant">|</span>
            <h2 class="font-headline-sm text-on-surface font-bold">#{{ $order->order_number }}</h2>
        </div>
        <span class="px-3 py-1 rounded-full text-label-sm font-bold
            @if($order->order_status === 'in_transit') bg-primary/10 text-primary
            @elseif($order->order_status === 'confirmed') bg-secondary/10 text-secondary
            @elseif($order->order_status === 'delivered') bg-on-surface/10 text-on-surface
            @else bg-surface-container text-on-surface-variant @endif">
            {{ ucwords(str_replace('_', ' ', $order->order_status)) }}
        </span>
    </header>

    <main class="p-8 space-y-6 max-w-4xl mx-auto w-full">

        @if(session('success'))
        <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Product Info --}}
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 space-y-3">
                <h3 class="font-headline-sm text-on-surface font-bold">Product</h3>
                <div class="space-y-2 text-body-md">
                    <div class="flex justify-between"><span class="text-on-surface-variant">Name</span><span class="text-on-surface font-medium">{{ $order->product->name ?? '—' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Quantity</span><span class="text-on-surface font-medium">{{ $order->product->quantity ?? '—' }} {{ $order->product->unit ?? '' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Quality</span><span class="text-on-surface font-medium">Grade {{ $order->product->quality ?? '—' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Category</span><span class="text-on-surface font-medium">{{ ucfirst($order->product->category ?? '—') }}</span></div>
                </div>
            </div>

            {{-- Parties --}}
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 space-y-3">
                <h3 class="font-headline-sm text-on-surface font-bold">Parties</h3>
                <div class="space-y-2 text-body-md">
                    <div class="flex justify-between"><span class="text-on-surface-variant">Farmer</span><span class="text-on-surface font-medium">{{ $order->farmer->name ?? '—' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Farmer Phone</span><span class="text-on-surface font-medium">{{ $order->farmer->phone ?? '—' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Buyer</span><span class="text-on-surface font-medium">{{ $order->buyer->name ?? '—' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Buyer Phone</span><span class="text-on-surface font-medium">{{ $order->buyer->phone ?? '—' }}</span></div>
                </div>
            </div>

            {{-- Logistics --}}
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 space-y-3">
                <h3 class="font-headline-sm text-on-surface font-bold">Logistics</h3>
                <div class="space-y-2 text-body-md">
                    <div class="flex justify-between"><span class="text-on-surface-variant">From</span><span class="text-on-surface font-medium">{{ $order->product->location['mandi'] ?? '—' }}, {{ $order->product->location['state'] ?? '' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">To Pincode</span><span class="text-on-surface font-medium">{{ $order->delivery_location ?? '—' }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Transport Fee</span><span class="text-primary font-bold">₹{{ number_format($order->transport_cost ?? 0) }}</span></div>
                    @if($order->courier_name)
                    <div class="flex justify-between"><span class="text-on-surface-variant">Courier</span><span class="text-on-surface font-medium">{{ $order->courier_name }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Tracking</span><span class="text-on-surface font-medium">{{ $order->tracking_id }}</span></div>
                    @endif
                </div>
            </div>

            {{-- Payment --}}
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 space-y-3">
                <h3 class="font-headline-sm text-on-surface font-bold">Payment</h3>
                <div class="space-y-2 text-body-md">
                    <div class="flex justify-between"><span class="text-on-surface-variant">Total Amount</span><span class="text-on-surface font-bold text-lg">₹{{ number_format($order->total_amount ?? 0) }}</span></div>
                    <div class="flex justify-between"><span class="text-on-surface-variant">Payment Status</span>
                        <span class="{{ $order->payment_status === 'completed' ? 'text-primary' : 'text-secondary' }} font-medium">{{ ucfirst($order->payment_status ?? 'pending') }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Timeline --}}
        @if(!empty($order->timeline))
        <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
            <h3 class="font-headline-sm text-on-surface font-bold mb-4">Delivery Timeline</h3>
            <div class="space-y-4">
                @foreach($order->timeline as $event)
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-3 h-3 rounded-full bg-primary mt-1 shrink-0"></div>
                        @if(!$loop->last)<div class="w-0.5 h-full bg-primary/20 my-1"></div>@endif
                    </div>
                    <div class="pb-4">
                        <p class="font-label-md text-on-surface font-bold">{{ $event['status'] ?? '—' }}</p>
                        <p class="font-body-sm text-on-surface-variant">{{ $event['note'] ?? '' }}</p>
                        <p class="font-body-sm text-on-surface-variant/60 mt-0.5">{{ isset($event['at']) ? \Carbon\Carbon::parse($event['at'])->format('d M Y, h:i A') : '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Actions --}}
        @if($order->order_status === 'confirmed')
        <div class="flex gap-4">
            <form method="POST" action="{{ route('transporter.delivery.pickup', $order->id) }}">
                @csrf
                <button type="submit" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-label-lg hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined">inventory_2</span> Mark as Picked Up
                </button>
            </form>
        </div>
        @elseif($order->order_status === 'in_transit')
        <div class="flex gap-4">
            <form method="POST" action="{{ route('transporter.delivery.deliver', $order->id) }}">
                @csrf
                <button type="submit" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-label-lg hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined">check_circle</span> Mark as Delivered
                </button>
            </form>
        </div>
        @elseif($order->order_status === 'delivered')
        <div class="bg-primary-container/20 rounded-2xl p-4 flex items-center gap-3">
            <span class="material-symbols-outlined text-primary text-2xl" style="font-variation-settings:'FILL' 1">check_circle</span>
            <p class="font-label-md text-primary font-bold">This delivery has been completed successfully.</p>
        </div>
        @endif

    </main>
</div>
</div>

@endsection
