@extends('layouts.stitch')

@section('title', 'Agency Procurement Dashboard - AgriMandi')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] flex">
    <!-- Sidebar -->
    <aside class="w-80 bg-white border-r border-outline-variant/10 flex flex-col p-lg sticky top-0 h-screen">
        <div class="flex items-center gap-md mb-xl">
            <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-on-primary">
                <span class="material-symbols-outlined">account_balance</span>
            </div>
            <span class="font-headline-sm font-bold text-on-surface">Agency Panel</span>
        </div>
        
        <nav class="flex-1 space-y-md">
            <a href="#" class="flex items-center gap-md bg-primary/5 text-primary p-4 rounded-2xl font-bold">
                <span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>
            <a href="#" class="flex items-center gap-md text-on-surface-variant p-4 rounded-2xl font-bold hover:bg-surface-container-low transition-all">
                <span class="material-symbols-outlined">list_alt</span> Pending Requests
            </a>
            <a href="#" class="flex items-center gap-md text-on-surface-variant p-4 rounded-2xl font-bold hover:bg-surface-container-low transition-all">
                <span class="material-symbols-outlined">inventory_2</span> Warehouses
            </a>
            <a href="#" class="flex items-center gap-md text-on-surface-variant p-4 rounded-2xl font-bold hover:bg-surface-container-low transition-all">
                <span class="material-symbols-outlined">contract</span> Active Tenders
            </a>
            <a href="#" class="flex items-center gap-md text-on-surface-variant p-4 rounded-2xl font-bold hover:bg-surface-container-low transition-all">
                <span class="material-symbols-outlined">payments</span> Farmer Payouts
            </a>
        </nav>

        <div class="pt-xl border-t border-outline-variant/10 mt-xl">
            <div class="bg-surface-container-low p-4 rounded-2xl flex items-center gap-md">
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Gov+Admin" alt="Admin">
                </div>
                <div class="flex-1">
                    <div class="text-label-md font-bold text-on-surface">Agri Admin</div>
                    <div class="text-[10px] text-outline font-bold uppercase tracking-widest">Super Admin</div>
                </div>
                <span class="material-symbols-outlined text-outline cursor-pointer">logout</span>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-xl">
        <header class="flex justify-between items-center mb-xl">
            <div>
                <h1 class="font-headline-md font-bold text-on-surface">Procurement Analytics</h1>
                <p class="text-on-surface-variant">Real-time monitoring of nationwide crop procurement</p>
            </div>
            <div class="flex gap-md">
                <button class="bg-white border border-outline-variant/10 px-6 py-3 rounded-2xl font-bold flex items-center gap-2">
                    <span class="material-symbols-outlined">calendar_today</span> Last 30 Days
                </button>
                <button class="bg-primary text-on-primary px-6 py-3 rounded-2xl font-bold flex items-center gap-2">
                    <span class="material-symbols-outlined">add</span> Create Tender
                </button>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-cols-4 gap-lg mb-xl">
            <div class="bg-white p-lg rounded-[32px] border border-outline-variant/10 shadow-sm">
                <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-md">
                    <span class="material-symbols-outlined">shopping_cart</span>
                </div>
                <div class="text-label-sm text-outline font-bold uppercase tracking-widest mb-1">Total Submissions</div>
                <div class="text-headline-md font-bold text-on-surface">{{ $stats['total_requests'] }}</div>
                <div class="text-label-sm text-primary font-bold mt-2 flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">trending_up</span> +12% from last week
                </div>
            </div>
            <div class="bg-white p-lg rounded-[32px] border border-outline-variant/10 shadow-sm">
                <div class="w-12 h-12 bg-error/5 rounded-2xl flex items-center justify-center text-error mb-md">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <div class="text-label-sm text-outline font-bold uppercase tracking-widest mb-1">Awaiting Approval</div>
                <div class="text-headline-md font-bold text-on-surface">{{ $stats['pending_count'] }}</div>
                <div class="text-label-sm text-error font-bold mt-2 flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">priority_high</span> Needs attention
                </div>
            </div>
            <div class="bg-white p-lg rounded-[32px] border border-outline-variant/10 shadow-sm">
                <div class="w-12 h-12 bg-tertiary/5 rounded-2xl flex items-center justify-center text-tertiary mb-md">
                    <span class="material-symbols-outlined">inventory</span>
                </div>
                <div class="text-label-sm text-outline font-bold uppercase tracking-widest mb-1">Total Quantity (Tons)</div>
                <div class="text-headline-md font-bold text-on-surface">{{ number_format($stats['total_quantity'] / 1000, 1) }}k</div>
                <div class="text-label-sm text-tertiary font-bold mt-2">Storage at 64% capacity</div>
            </div>
            <div class="bg-white p-lg rounded-[32px] border border-outline-variant/10 shadow-sm">
                <div class="w-12 h-12 bg-blue-500/5 rounded-2xl flex items-center justify-center text-blue-600 mb-md">
                    <span class="material-symbols-outlined">payments</span>
                </div>
                <div class="text-label-sm text-outline font-bold uppercase tracking-widest mb-1">Budget Utilized</div>
                <div class="text-headline-md font-bold text-on-surface">42.8%</div>
                <div class="text-label-sm text-blue-600 font-bold mt-2 flex items-center gap-1">
                    ₹1,240 Cr remaining
                </div>
            </div>
        </div>

        <!-- Pending Submissions Table -->
        <div class="bg-white rounded-[40px] border border-outline-variant/10 shadow-xl overflow-hidden mb-xl">
            <div class="p-xl border-b border-outline-variant/10 flex justify-between items-center">
                <h2 class="font-headline-sm font-bold text-on-surface">Pending Farmer Submissions</h2>
                <div class="flex gap-md">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                        <input type="text" placeholder="Search farmer or ID" class="pl-10 pr-4 py-2 bg-surface-container-low rounded-xl border-none text-label-md">
                    </div>
                    <button class="bg-surface-container-high px-4 py-2 rounded-xl text-label-sm font-bold">Filter By State</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-surface-container-low text-label-md font-bold text-outline uppercase tracking-wider">
                            <th class="px-xl py-6">Receipt #</th>
                            <th class="px-xl py-6">Farmer</th>
                            <th class="px-xl py-6">Commodity</th>
                            <th class="px-xl py-6">Quantity</th>
                            <th class="px-xl py-6">Value</th>
                            <th class="px-xl py-6">Quality</th>
                            <th class="px-xl py-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        @forelse($pendingRequests as $request)
                            <tr class="hover:bg-primary/5 transition-colors group">
                                <td class="px-xl py-6 font-mono text-label-md font-bold text-primary">{{ $request->receipt_number }}</td>
                                <td class="px-xl py-6">
                                    <div class="flex items-center gap-md">
                                        <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center font-bold text-on-surface-variant text-[12px]">
                                            {{ substr($request->farmer->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-on-surface">{{ $request->farmer->name }}</div>
                                            <div class="text-[10px] text-outline font-bold">{{ $request->farmer->state }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-xl py-6 font-bold text-on-surface">{{ $request->commodity }}</td>
                                <td class="px-xl py-6 font-bold text-on-surface">{{ number_format($request->quantity) }} qtl</td>
                                <td class="px-xl py-6 font-bold text-primary">₹{{ number_format($request->total_amount) }}</td>
                                <td class="px-xl py-6">
                                    <div class="flex items-center gap-1 text-primary font-bold">
                                        <span class="material-symbols-outlined text-sm">verified</span>
                                        Grade A
                                    </div>
                                </td>
                                <td class="px-xl py-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <form action="{{ route('gov.approve', $request->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-primary text-on-primary px-4 py-2 rounded-xl text-label-sm font-bold hover:shadow-lg transition-all">Approve</button>
                                        </form>
                                        <button class="bg-surface-container-high text-on-surface px-4 py-2 rounded-xl text-label-sm font-bold">Reject</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-xl py-24 text-center">
                                    <div class="flex flex-col items-center">
                                        <span class="material-symbols-outlined text-[64px] text-outline mb-md">check_circle</span>
                                        <h3 class="text-headline-sm font-bold text-on-surface">All requests cleared!</h3>
                                        <p class="text-on-surface-variant">There are no pending procurement requests at the moment.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Analytics Charts Placeholder -->
        <div class="grid grid-cols-2 gap-xl">
            <div class="bg-white p-xl rounded-[40px] border border-outline-variant/10 shadow-sm h-96 flex flex-col items-center justify-center text-center">
                <span class="material-symbols-outlined text-[48px] text-outline mb-md">bar_chart</span>
                <h3 class="font-bold text-on-surface">State-wise Procurement Trend</h3>
                <p class="text-label-sm text-outline">Real-time data visualization of top performing states</p>
            </div>
            <div class="bg-white p-xl rounded-[40px] border border-outline-variant/10 shadow-sm h-96 flex flex-col items-center justify-center text-center">
                <span class="material-symbols-outlined text-[48px] text-outline mb-md">pie_chart</span>
                <h3 class="font-bold text-on-surface">Commodity Distribution</h3>
                <p class="text-label-sm text-outline">Breakdown of stock across procurement agencies</p>
            </div>
        </div>
    </main>
</div>
@endsection
