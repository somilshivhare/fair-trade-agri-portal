@extends('layouts.stitch')
@section('title', 'User Management - Admin')
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
            <a class="flex items-center gap-md px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('admin.users') }}">
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
            <h2 class="font-headline-md text-on-surface font-bold">User Management</h2>
            <div class="flex items-center gap-6">
                <form action="{{ route('admin.users') }}" class="hidden lg:flex items-center bg-surface-container-low rounded-full px-4 py-2 border border-outline-variant w-80">
                    <span class="material-symbols-outlined text-outline mr-2">search</span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, phone..." class="bg-transparent border-none focus:ring-0 text-label-md w-full">
                </form>
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
                    <h3 class="font-headline-sm text-on-surface font-bold">Platform Users</h3>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.users') }}" class="px-4 py-2 {{ !request('role') ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">All</a>
                        <a href="{{ route('admin.users', ['role' => 'farmer']) }}" class="px-4 py-2 {{ request('role') == 'farmer' ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">Farmers</a>
                        <a href="{{ route('admin.users', ['role' => 'buyer']) }}" class="px-4 py-2 {{ request('role') == 'buyer' ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">Buyers</a>
                        <a href="{{ route('admin.users', ['role' => 'transporter']) }}" class="px-4 py-2 {{ request('role') == 'transporter' ? 'bg-primary text-on-primary' : 'bg-surface-variant text-on-surface-variant' }} rounded-lg text-label-md">Transporters</a>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-surface-container-low/50 border-b border-outline-variant/20">
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">User Details</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Role</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">KYC</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase">Status</th>
                                <th class="px-6 py-4 font-label-lg text-on-surface-variant uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse($users as $user)
                            <tr class="hover:bg-surface-container-low/20 transition-colors">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-primary-container/20 flex items-center justify-center text-primary font-bold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-label-lg text-on-surface">{{ $user->name }}</p>
                                            <p class="text-label-sm text-on-surface-variant">{{ $user->email }} · {{ $user->phone }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 rounded-full text-label-sm font-bold uppercase tracking-wider
                                        @if($user->role == 'admin') bg-error/10 text-error
                                        @elseif($user->role == 'farmer') bg-primary/10 text-primary
                                        @elseif($user->role == 'buyer') bg-tertiary/10 text-tertiary
                                        @else bg-secondary/10 text-secondary @endif">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    @if($user->is_kyc_verified)
                                        <span class="flex items-center gap-1 text-primary font-bold text-label-sm">
                                            <span class="material-symbols-outlined text-[18px]">verified</span> Verified
                                        </span>
                                    @else
                                        <span class="text-on-surface-variant text-label-sm italic">Not Verified</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center gap-1 {{ $user->is_active ? 'text-primary' : 'text-error' }} font-bold text-label-sm">
                                        <span class="w-2 h-2 rounded-full {{ $user->is_active ? 'bg-primary' : 'bg-error' }}"></span>
                                        {{ $user->is_active ? 'Active' : 'Suspended' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    @if($user->role !== 'admin')
                                    <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="p-2 {{ $user->is_active ? 'text-error hover:bg-error/10' : 'text-primary hover:bg-primary/10' }} rounded-lg transition-colors" title="{{ $user->is_active ? 'Suspend User' : 'Activate User' }}">
                                            <span class="material-symbols-outlined">{{ $user->is_active ? 'block' : 'check_circle' }}</span>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">
                                    No users matching criteria.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 border-t border-outline-variant/10">
                    {{ $users->links() }}
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
