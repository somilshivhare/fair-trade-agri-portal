@extends('layouts.stitch')
@section('title', 'My Deliveries - AgriMandi Transporter')
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
        <div>
            <h2 class="font-headline-md text-on-surface font-bold">My Deliveries</h2>
            <p class="font-body-sm text-on-surface-variant">{{ $orders->total() }} total deliveries</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Status Filter --}}
            <form method="GET" class="flex gap-2">
                <select name="status" onchange="this.form.submit()" class="bg-surface-container-low border border-outline-variant/30 rounded-xl px-3 py-2 font-label-md focus:ring-2 focus:ring-primary/20 outline-none">
                    <option value="all" {{ request('status', 'all') === 'all' ? 'selected' : '' }}>All Status</option>
                    <option value="confirmed"  {{ request('status') === 'confirmed'  ? 'selected' : '' }}>Pending Pickup</option>
                    <option value="in_transit" {{ request('status') === 'in_transit' ? 'selected' : '' }}>In Transit</option>
                    <option value="delivered"  {{ request('status') === 'delivered'  ? 'selected' : '' }}>Delivered</option>
                </select>
            </form>
        </div>
    </header>

    <main class="p-8">
        @if(session('success'))
        <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 flex items-center gap-3 mb-6">
            <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
        </div>
        @endif

        @if($orders->isEmpty())
        <div class="bg-surface-container-lowest rounded-2xl p-16 border border-outline-variant/10 flex flex-col items-center justify-center text-center">
            <span class="material-symbols-outlined text-6xl text-outline mb-4">local_shipping</span>
            <h4 class="font-headline-sm text-on-surface mb-2">No Deliveries Found</h4>
            <p class="font-body-md text-on-surface-variant max-w-sm">
                @if(request('status') && request('status') !== 'all')
                    No deliveries with status "{{ request('status') }}" found.
                @else
                    You have no deliveries assigned yet.
                @endif
            </p>
        </div>
        @else
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 hover:border-primary/30 transition-all flex flex-col md:flex-row md:items-center gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="font-label-lg text-primary font-bold">#{{ $order->order_number }}</span>
                        <span class="px-3 py-0.5 rounded-full text-label-sm font-bold
                            @if($order->order_status === 'delivered')  bg-primary/10 text-primary
                            @elseif($order->order_status === 'in_transit') bg-tertiary/10 text-tertiary
                            @elseif($order->order_status === 'confirmed')  bg-secondary/10 text-secondary
                            @else bg-surface-container text-on-surface-variant @endif">
                            {{ ucwords(str_replace('_', ' ', $order->order_status)) }}
                        </span>
                    </div>
                    <p class="font-body-md text-on-surface font-semibold mb-1">{{ $order->product->name ?? '—' }}</p>
                    <div class="flex flex-wrap gap-x-4 gap-y-1 text-body-sm text-on-surface-variant">
                        <span><span class="material-symbols-outlined text-[14px] align-middle">person</span> {{ $order->buyer->name ?? '—' }}</span>
                        <span><span class="material-symbols-outlined text-[14px] align-middle">agriculture</span> {{ $order->farmer->name ?? '—' }}</span>
                        <span><span class="material-symbols-outlined text-[14px] align-middle">location_on</span> {{ $order->delivery_location ?? '—' }}</span>
                        <span><span class="material-symbols-outlined text-[14px] align-middle">payments</span> ₹{{ number_format($order->transport_cost) }}</span>
                    </div>
                </div>
                <div class="flex gap-2 shrink-0">
                    @if($order->order_status === 'confirmed')
                    <form method="POST" action="{{ route('transporter.delivery.pickup', $order->id) }}">
                        @csrf
                        <button class="bg-primary text-on-primary px-4 py-2 rounded-xl font-label-md hover:opacity-90 active:scale-95 transition-all">Picked Up</button>
                    </form>
                    @elseif($order->order_status === 'in_transit')
                    <form method="POST" action="{{ route('transporter.delivery.deliver', $order->id) }}">
                        @csrf
                        <button class="bg-primary text-on-primary px-4 py-2 rounded-xl font-label-md hover:opacity-90 active:scale-95 transition-all">Mark Delivered</button>
                    </form>
                    @endif
                    <a href="{{ route('transporter.delivery.detail', $order->id) }}" class="bg-surface-container px-4 py-2 rounded-xl font-label-md text-on-surface hover:bg-surface-variant transition-colors">Details</a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($orders->hasPages())
        <div class="flex justify-center mt-8">
            {{ $orders->links() }}
        </div>
        @endif
        @endif
    </main>
</div>
</div>

@endsection
