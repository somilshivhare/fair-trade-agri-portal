@extends('layouts.stitch')
@section('title', 'Market Prices - Admin')
@section('content')

<div class="flex min-h-screen bg-surface">
    {{-- Sidebar --}}
    <aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0">
        <div class="px-6 mb-8">
            <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
            <p class="text-label-sm text-on-surface-variant">Admin Control</p>
        </div>
        <nav class="flex-1 px-4 flex flex-col gap-1">
            <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant rounded-lg font-label-md" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined">dashboard</span><span>Dashboard</span>
            </a>
            <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant rounded-lg font-label-md" href="{{ route('admin.kyc') }}">
                <span class="material-symbols-outlined">verified_user</span><span>KYC Verifications</span>
            </a>
            <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant rounded-lg font-label-md" href="{{ route('admin.users') }}">
                <span class="material-symbols-outlined">group</span><span>User Management</span>
            </a>
            <a class="flex items-center gap-md px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('admin.market-prices') }}">
                <span class="material-symbols-outlined">monitoring</span><span>Market Prices</span>
            </a>
            <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant rounded-lg font-label-md" href="{{ route('profile') }}">
                <span class="material-symbols-outlined">settings</span><span>Profile</span>
            </a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col min-w-0">
        <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20">
            <h2 class="font-headline-md text-on-surface font-bold">Market Intelligence</h2>
            <div class="flex items-center gap-4">
                <form method="POST" action="{{ route('admin.market-prices.sync') }}">
                    @csrf
                    <button type="submit" class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-label-lg flex items-center gap-2 hover:shadow-lg active:scale-95 transition-all">
                        <span class="material-symbols-outlined">sync</span> Sync from AGMARKNET
                    </button>
                </form>
            </div>
        </header>

        <main class="p-8 space-y-6">
            @if(session('success'))
                <div class="p-4 bg-primary-container text-on-primary-container rounded-xl flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10">
                    <p class="font-label-md text-on-surface-variant mb-1 uppercase tracking-tighter">Last Update</p>
                    <p class="font-headline-sm text-primary font-bold">{{ $prices->first() ? $prices->first()->created_at->diffForHumans() : 'Never' }}</p>
                </div>
                <div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10">
                    <p class="font-label-md text-on-surface-variant mb-1 uppercase tracking-tighter">Total Mandi Records</p>
                    <p class="font-headline-sm text-tertiary font-bold">{{ $prices->total() }}</p>
                </div>
                <div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10">
                    <p class="font-label-md text-on-surface-variant mb-1 uppercase tracking-tighter">Active States</p>
                    <p class="font-headline-sm text-on-surface font-bold">{{ \App\Models\MarketPrice::distinct('state')->count() }}</p>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10 overflow-hidden shadow-sm">
                <div class="p-6 border-b border-outline-variant/10 flex justify-between items-center">
                    <h3 class="font-headline-sm text-on-surface font-bold">Price Records</h3>
                    <p class="text-body-sm text-on-surface-variant">Real-time data synced from Data.gov.in API</p>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-surface-container-low border-b border-outline-variant/20">
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Commodity</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Mandi / State</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Modal Price</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Range (Min/Max)</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse($prices as $price)
                            <tr class="hover:bg-surface-container-low/20 transition-colors">
                                <td class="px-6 py-5">
                                    <p class="font-label-lg text-on-surface font-bold">{{ $price->commodity }}</p>
                                    <p class="text-label-sm text-on-surface-variant">{{ $price->variety ?? 'Common' }}</p>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-body-md text-on-surface">{{ $price->market }}</p>
                                    <p class="text-label-sm text-primary">{{ $price->state }}</p>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-label-lg text-primary font-bold">₹{{ number_format($price->modal_price) }}</p>
                                    <p class="text-label-sm text-on-surface-variant">per Quintal</p>
                                </td>
                                <td class="px-6 py-5 font-body-md text-on-surface-variant">
                                    ₹{{ number_format($price->min_price) }} - ₹{{ number_format($price->max_price) }}
                                </td>
                                <td class="px-6 py-5 font-body-md text-on-surface">{{ \Carbon\Carbon::parse($price->price_date)->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">
                                    No price data found. Try syncing.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-outline-variant/10">
                    {{ $prices->links() }}
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
