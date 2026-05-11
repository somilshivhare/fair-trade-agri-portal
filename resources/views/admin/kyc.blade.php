@extends('layouts.stitch')
@section('title', 'KYC Verifications - Admin')
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
            <a class="flex items-center gap-md px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('admin.kyc') }}">
                <span class="material-symbols-outlined">verified_user</span><span>KYC Verifications</span>
            </a>
            <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant rounded-lg font-label-md" href="{{ route('admin.users') }}">
                <span class="material-symbols-outlined">group</span><span>User Management</span>
            </a>
            <a class="flex items-center gap-md px-4 py-3 text-on-surface-variant hover:bg-surface-variant rounded-lg font-label-md" href="{{ route('admin.market-prices') }}">
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
            <h2 class="font-headline-md text-on-surface font-bold">KYC Verifications</h2>
            <div class="flex items-center gap-4">
                <a href="{{ route('notifications') }}" class="material-symbols-outlined text-on-surface-variant p-2 rounded-full hover:bg-surface-variant">notifications</a>
                <div class="h-8 w-px bg-outline-variant"></div>
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold">AD</div>
                </div>
            </div>
        </header>

        <main class="p-8 space-y-6">
            @if(session('success'))
                <div class="p-4 bg-primary-container text-on-primary-container rounded-xl flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
                </div>
            @endif

            <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10 overflow-hidden shadow-sm">
                <div class="p-6 border-b border-outline-variant/10 flex justify-between items-center bg-surface-container-low/30">
                    <h3 class="font-headline-sm text-on-surface font-bold">Verification Requests</h3>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.kyc') }}" class="px-4 py-2 {{ !request('status') ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">All</a>
                        <a href="{{ route('admin.kyc', ['status' => 'pending']) }}" class="px-4 py-2 {{ request('status') == 'pending' ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">Pending</a>
                        <a href="{{ route('admin.kyc', ['status' => 'verified']) }}" class="px-4 py-2 {{ request('status') == 'verified' ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">Verified</a>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-surface-container-low/50 border-b border-outline-variant/20">
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">User</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Role</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Submitted At</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Status</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse($kycs as $kyc)
                            <tr class="hover:bg-surface-container-low/20 transition-colors">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-primary-container/20 flex items-center justify-center text-primary font-bold">
                                            {{ strtoupper(substr($kyc->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-label-lg text-on-surface">{{ $kyc->user->name }}</p>
                                            <p class="text-label-sm text-on-surface-variant">{{ $kyc->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 font-body-md text-on-surface capitalize">{{ $kyc->user->role }}</td>
                                <td class="px-6 py-5 font-body-md text-on-surface">{{ $kyc->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 rounded-full text-label-sm font-bold 
                                        @if($kyc->status == 'pending') bg-secondary/10 text-secondary
                                        @elseif($kyc->status == 'verified') bg-primary/10 text-primary
                                        @else bg-error/10 text-error @endif">
                                        {{ ucfirst($kyc->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right flex justify-end gap-2">
                                    @if($kyc->status == 'pending')
                                    <form method="POST" action="{{ route('admin.kyc.approve', $kyc->id) }}">
                                        @csrf
                                        <button type="submit" class="p-2 text-primary hover:bg-primary/10 rounded-lg" title="Approve">
                                            <span class="material-symbols-outlined">check_circle</span>
                                        </button>
                                    </form>
                                    <button onclick="document.getElementById('reject-modal-{{ $kyc->id }}').showModal()" class="p-2 text-error hover:bg-error/10 rounded-lg" title="Reject">
                                        <span class="material-symbols-outlined">cancel</span>
                                    </button>

                                    {{-- Reject Modal --}}
                                    <dialog id="reject-modal-{{ $kyc->id }}" class="rounded-2xl p-0 bg-transparent">
                                        <div class="bg-surface-container-lowest p-8 rounded-2xl border border-outline-variant shadow-2xl w-[400px]">
                                            <h3 class="font-headline-sm text-on-surface mb-4">Reject KYC</h3>
                                            <form method="POST" action="{{ route('admin.kyc.reject', $kyc->id) }}">
                                                @csrf
                                                <textarea name="reason" required placeholder="Reason for rejection..." class="w-full p-4 rounded-xl border border-outline-variant bg-surface-container-low mb-4 h-32 focus:ring-2 focus:ring-primary/20 outline-none"></textarea>
                                                <div class="flex gap-3">
                                                    <button type="button" onclick="this.closest('dialog').close()" class="flex-1 py-3 bg-surface-variant text-on-surface-variant rounded-xl font-label-lg">Cancel</button>
                                                    <button type="submit" class="flex-1 py-3 bg-error text-on-error rounded-xl font-label-lg">Confirm Reject</button>
                                                </div>
                                            </form>
                                        </div>
                                    </dialog>
                                    @else
                                        <span class="text-on-surface-variant font-label-sm italic">No actions</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <span class="material-symbols-outlined text-4xl text-outline mb-2">fact_check</span>
                                    <p class="text-on-surface-variant">No verification requests found.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-outline-variant/10">
                    {{ $kycs->links() }}
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
