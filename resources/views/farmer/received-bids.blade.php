@extends('layouts.stitch')
@section('title', 'Received Bids - AgriMandi')
@section('content')

<div class="flex min-h-screen bg-surface">

{{-- Sidebar --}}
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
    <div class="px-6 mb-8">
        <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
        <p class="text-label-sm text-on-surface-variant">Farmer Portal</p>
    </div>
    <nav class="flex-1 px-4 space-y-1">
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('farmer.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span><span class="font-label-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('farmer.products') }}">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">inventory_2</span><span class="font-label-md">My Products</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('farmer.bids') }}">
            <span class="material-symbols-outlined">gavel</span><span>Received Bids</span>
            @php $pendingCount = $bids->where('status','pending')->count(); @endphp
            @if($pendingCount > 0)
            <span class="ml-auto bg-error text-on-error text-label-sm px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
            @endif
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('farmer.orders') }}">
            <span class="material-symbols-outlined">shopping_bag</span><span class="font-label-md">Orders</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('profile') }}">
            <span class="material-symbols-outlined">person</span><span class="font-label-md">Profile</span>
        </a>
    </nav>
    <div class="px-4 mt-auto space-y-2">
        <a href="{{ route('farmer.products.add') }}" class="w-full py-4 bg-primary text-on-primary rounded-xl font-label-lg shadow-lg active:scale-95 transition-all flex items-center justify-center gap-2">
            <span class="material-symbols-outlined">add_circle</span> Add Product
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
    <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20">
        <div>
            <h2 class="font-headline-md text-on-surface font-bold">Received Bids</h2>
            <p class="font-body-sm text-on-surface-variant">{{ $bids->total() }} total · {{ $bids->where('status','pending')->count() }} pending review</p>
        </div>
        <a href="{{ route('profile') }}" class="flex items-center gap-2 bg-surface-variant/50 py-1 pl-1 pr-4 rounded-full hover:bg-surface-variant transition-colors">
            <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-sm">
                {{ strtoupper(substr($farmer->name, 0, 2)) }}
            </div>
            <span class="font-label-md text-on-surface hidden sm:block">{{ $farmer->name }}</span>
        </a>
    </header>

    <main class="p-8 space-y-6">

        @if(session('success'))
        <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
        </div>
        @endif
        @if(session('info'))
        <div class="bg-surface-container border border-outline-variant/30 text-on-surface rounded-xl px-4 py-3 flex items-center gap-3">
            <span class="material-symbols-outlined">info</span> {{ session('info') }}
        </div>
        @endif

        {{-- Summary Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $pending   = $bids->where('status','pending')->count();
                $countered = $bids->where('status','countered')->count();
                $accepted  = $bids->where('status','accepted')->count();
                $totalVal  = $bids->sum('total_amount');
            @endphp
            <div class="bg-surface-container-lowest rounded-2xl p-4 border border-outline-variant/10 text-center">
                <p class="font-display-sm text-primary font-bold">{{ $pending }}</p>
                <p class="font-label-sm text-on-surface-variant">Pending</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-4 border border-outline-variant/10 text-center">
                <p class="font-display-sm text-secondary font-bold">{{ $countered }}</p>
                <p class="font-label-sm text-on-surface-variant">Countered</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-4 border border-outline-variant/10 text-center">
                <p class="font-display-sm text-on-surface font-bold">{{ $accepted }}</p>
                <p class="font-label-sm text-on-surface-variant">Accepted</p>
            </div>
            <div class="bg-surface-container-lowest rounded-2xl p-4 border border-outline-variant/10 text-center">
                <p class="font-display-sm text-tertiary font-bold">₹{{ $totalVal > 0 ? number_format($totalVal/100000,1).'L' : '0' }}</p>
                <p class="font-label-sm text-on-surface-variant">Total Value</p>
            </div>
        </div>

        {{-- Bids Table --}}
        @if($bids->isEmpty())
        <div class="bg-surface-container-lowest rounded-2xl p-16 border border-outline-variant/10 flex flex-col items-center justify-center text-center">
            <span class="material-symbols-outlined text-6xl text-outline mb-4">gavel</span>
            <h3 class="font-headline-sm text-on-surface mb-2">No Bids Yet</h3>
            <p class="font-body-md text-on-surface-variant max-w-sm mb-6">
                Buyers haven't placed any bids on your products yet. List more products to attract buyers.
            </p>
            <a href="{{ route('farmer.products.add') }}" class="bg-primary text-on-primary px-6 py-3 rounded-xl font-label-lg hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined">add_circle</span> Add New Product
            </a>
        </div>
        @else
        <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-surface-container-low/50 border-b border-outline-variant/10">
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Commodity</th>
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Buyer</th>
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Bid Price</th>
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Qty</th>
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Expires</th>
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Status</th>
                            <th class="py-4 px-6 font-label-lg text-on-surface-variant">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10">
                        @foreach($bids as $bid)
                        <tr class="hover:bg-surface-container-low/30 transition-colors" id="bid-{{ $bid->id }}">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-primary-container/20 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-primary text-[18px]">eco</span>
                                    </div>
                                    <div>
                                        <p class="font-label-md text-on-surface">{{ $bid->product->name ?? '—' }}</p>
                                        <p class="font-body-sm text-on-surface-variant">{{ $bid->product->location['mandi'] ?? '—' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container text-xs font-bold">
                                        {{ strtoupper(substr($bid->buyer->name ?? 'B', 0, 2)) }}
                                    </div>
                                    <span class="font-body-md text-on-surface">{{ $bid->buyer->name ?? '—' }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="font-label-lg text-primary font-bold">₹{{ number_format($bid->bid_price) }}</p>
                                @if($bid->status === 'countered' && $bid->counter_price)
                                <p class="font-body-sm text-secondary">Counter: ₹{{ number_format($bid->counter_price) }}</p>
                                @endif
                                <p class="font-body-sm text-on-surface-variant">/ {{ $bid->product->unit ?? 'unit' }}</p>
                            </td>
                            <td class="py-4 px-6 font-body-md text-on-surface">{{ $bid->quantity }} {{ $bid->product->unit ?? '' }}</td>
                            <td class="py-4 px-6">
                                @if($bid->expires_at)
                                @php $expires = \Carbon\Carbon::parse($bid->expires_at); @endphp
                                <p class="font-body-sm {{ $expires->isPast() ? 'text-error' : ($expires->diffInHours() < 24 ? 'text-warning' : 'text-on-surface-variant') }}">
                                    {{ $expires->isPast() ? 'Expired' : $expires->diffForHumans() }}
                                </p>
                                @else
                                <p class="font-body-sm text-on-surface-variant">—</p>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-label-sm font-bold
                                    @if($bid->status === 'pending')   bg-primary/10 text-primary
                                    @elseif($bid->status === 'accepted') bg-on-surface/10 text-on-surface
                                    @elseif($bid->status === 'countered') bg-secondary/10 text-secondary
                                    @elseif($bid->status === 'rejected') bg-error/10 text-error
                                    @else bg-surface-container text-on-surface-variant @endif">
                                    {{ ucfirst($bid->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                @if($bid->status === 'pending')
                                <div class="flex gap-2 flex-wrap">
                                    <form method="POST" action="{{ route('farmer.bids.accept', $bid->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-primary text-on-primary px-3 py-1.5 rounded-lg text-label-sm font-bold hover:opacity-90 active:scale-95 transition-all">Accept</button>
                                    </form>
                                    <button onclick="openCounter('{{ $bid->id }}','{{ $bid->product->name ?? 'Product' }}','{{ $bid->bid_price }}')"
                                        class="bg-secondary-container text-on-secondary-container px-3 py-1.5 rounded-lg text-label-sm font-bold hover:opacity-90 active:scale-95 transition-all">Counter</button>
                                    <form method="POST" action="{{ route('farmer.bids.reject', $bid->id) }}">
                                        @csrf
                                        <button type="submit" class="border border-error/40 text-error px-3 py-1.5 rounded-lg text-label-sm font-bold hover:bg-error-container transition-all">Reject</button>
                                    </form>
                                </div>
                                @elseif($bid->status === 'accepted')
                                <span class="flex items-center gap-1 text-on-surface font-label-sm"><span class="material-symbols-outlined text-[16px]" style="font-variation-settings:'FILL' 1">check_circle</span> Done</span>
                                @elseif($bid->status === 'rejected')
                                <span class="text-on-surface-variant font-label-sm">Rejected</span>
                                @elseif($bid->status === 'countered')
                                <span class="text-secondary font-label-sm">Awaiting buyer</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($bids->hasPages())
        <div class="flex justify-center mt-4">{{ $bids->links() }}</div>
        @endif
        @endif
    </main>
</div>
</div>

{{-- Counter Offer Modal --}}
<div id="counterModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeCounter()"></div>
    <div class="relative w-full max-w-md bg-surface-container-lowest rounded-2xl shadow-2xl p-6 border border-outline-variant/20">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-headline-sm text-on-surface font-bold">Counter Offer</h2>
            <button onclick="closeCounter()" class="material-symbols-outlined text-on-surface-variant hover:text-error transition-colors">close</button>
        </div>
        <div id="counterContext" class="flex items-center gap-3 p-3 bg-surface-container-low rounded-xl mb-4">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                <span class="material-symbols-outlined text-on-primary text-[18px]">eco</span>
            </div>
            <div>
                <p id="counterProductName" class="font-label-md text-on-surface"></p>
                <p id="counterBidPrice" class="font-body-sm text-on-surface-variant"></p>
            </div>
        </div>
        <form id="counterForm" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="font-label-md text-on-surface-variant block mb-1" for="counter_price">Your Counter Price (₹) *</label>
                <input id="counter_price" name="counter_price" type="number" min="1" required
                    class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
            </div>
            <div>
                <label class="font-label-md text-on-surface-variant block mb-1" for="counter_message">Message (Optional)</label>
                <textarea id="counter_message" name="counter_message" rows="2"
                    placeholder="Explain your pricing..."
                    class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none resize-none placeholder:text-outline/50"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-3 pt-2">
                <button type="button" onclick="closeCounter()" class="py-3 border border-outline-variant/40 rounded-xl font-label-md text-on-surface-variant hover:bg-surface-container transition-colors">Cancel</button>
                <button type="submit" class="py-3 bg-primary text-on-primary rounded-xl font-label-md hover:brightness-110 active:scale-95 transition-all">Send Counter</button>
            </div>
        </form>
    </div>
</div>

<script>
function openCounter(bidId, productName, bidPrice) {
    document.getElementById('counterProductName').textContent = productName;
    document.getElementById('counterBidPrice').textContent = 'Buyer offered: ₹' + Number(bidPrice).toLocaleString('en-IN');
    document.getElementById('counterForm').action = `/farmer/bids/${bidId}/counter`;
    document.getElementById('counter_price').value = '';
    document.getElementById('counterModal').classList.remove('hidden');
}
function closeCounter() {
    document.getElementById('counterModal').classList.add('hidden');
}
</script>

@endsection
