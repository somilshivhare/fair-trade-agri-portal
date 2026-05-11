@extends('layouts.stitch')
@section('title', 'Notifications - AgriMandi')
@section('content')

<!-- TopNavBar -->
<header class="sticky top-0 w-full z-50 bg-surface dark:bg-on-background shadow-[0_8px_30px_rgba(16,185,129,0.06)] px-lg py-md flex justify-between items-center max-w-full mx-auto">
<div class="flex items-center gap-md">
<span class="font-display-lg text-headline-md font-extrabold text-primary dark:text-primary-fixed">AgriMandi India</span>
</div>
<div class="flex items-center gap-md">
<div class="hidden md:flex items-center bg-surface-container rounded-full px-md py-xs border border-outline-variant">
<span class="material-symbols-outlined text-on-surface-variant">search</span>
<input class="bg-transparent border-none focus:ring-0 text-label-lg w-64" placeholder="Search orders, biddings..." type="text"/>
</div>
<button class="material-symbols-outlined text-primary p-xs hover:bg-primary-container/10 rounded-full transition-colors active:scale-95 duration-200" data-icon="notifications">notifications</button>
<button class="material-symbols-outlined text-on-surface-variant p-xs hover:bg-surface-container-highest rounded-full transition-colors active:scale-95 duration-200" data-icon="account_circle">account_circle</button>
</div>
</header>
<!-- SideNavBar -->
<nav class="h-screen w-64 fixed left-0 top-0 pt-20 bg-surface-container-low dark:bg-on-background flex flex-col gap-sm px-md py-lg hidden md:flex">
<div class="flex items-center gap-md px-md mb-lg">
<div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold">FA</div>
<div>
<p class="font-label-lg text-label-lg text-primary">Farmer Profile</p>
<p class="text-xs text-on-surface-variant">AgriMandi Premium</p>
</div>
</div>
<a class="flex items-center gap-md px-md py-sm text-on-secondary-container hover:bg-surface-container-high transition-all rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-label-lg text-label-lg">Dashboard</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-secondary-container hover:bg-surface-container-high transition-all rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="storefront">storefront</span>
<span class="font-label-lg text-label-lg">Marketplace</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-secondary-container hover:bg-surface-container-high transition-all rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
<span class="font-label-lg text-label-lg">My Orders</span>
</a>
<a aria-current="page" class="flex items-center gap-md px-md py-sm bg-primary-container text-on-primary-container font-bold rounded-lg" href="#">
<span class="material-symbols-outlined" data-icon="notifications" style="font-variation-settings: 'FILL' 1;">notifications</span>
<span class="font-label-lg text-label-lg">Notifications</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-secondary-container hover:bg-surface-container-high transition-all rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span class="font-label-lg text-label-lg">Inventory</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-secondary-container hover:bg-surface-container-high transition-all rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="trending_up">trending_up</span>
<span class="font-label-lg text-label-lg">Market Rates</span>
</a>
<div class="mt-auto">
<a class="flex items-center gap-md px-md py-sm text-on-secondary-container hover:bg-surface-container-high transition-all rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-lg text-label-lg">Settings</span>
</a>
</div>
</nav>
<!-- Main Content -->
    <main class="md:ml-64 p-lg max-w-5xl mx-auto pb-xl">
        <div class="flex justify-between items-end mb-xl">
            <div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface flex items-center gap-sm">
                    🔔 NOTIFICATION CENTER
                </h1>
                <p class="text-on-surface-variant font-body-md mt-xs">Manage your bidding, orders, and market alerts in real-time.</p>
            </div>
            <form action="{{ route('notifications.mark-all-read') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-sm px-md py-sm bg-surface-container-high text-on-surface-variant hover:bg-surface-container-highest transition-colors rounded-xl font-label-lg shadow-sm">
                    <span class="material-symbols-outlined text-body-lg">done_all</span>
                    Mark All Read
                </button>
            </form>
        </div>

        <div class="space-y-xl">
            @forelse($notifs as $n)
            <div class="bg-surface-container-lowest p-lg rounded-xl shadow-sm flex flex-col md:flex-row gap-lg items-start border {{ $n->is_read ? 'border-outline-variant/10' : 'border-primary/20 bg-primary/5' }}">
                <div class="w-10 h-10 min-w-[40px] rounded-full bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined">
                        @if($n->type === 'new_bid') gavel @elseif($n->type === 'order_status') local_shipping @else notifications @endif
                    </span>
                </div>
                <div class="flex-grow">
                    <div class="flex justify-between items-start mb-sm">
                        <h3 class="font-headline-md text-body-lg font-bold uppercase">{{ str_replace('_', ' ', $n->type) }}</h3>
                        <span class="text-label-sm text-on-surface-variant">{{ $n->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-on-surface-variant font-body-md mb-lg">{{ $n->message }}</p>
                    <div class="flex flex-wrap gap-sm">
                        @if(!$n->is_read)
                        <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-md py-sm bg-primary text-on-primary rounded-lg font-label-lg hover:opacity-90 transition-opacity">Mark as Read</button>
                        </form>
                        @endif
                        <a href="{{ $n->data['url'] ?? '#' }}" class="px-md py-sm bg-surface-container-high text-on-surface rounded-lg font-label-lg hover:bg-surface-container-highest">View Details</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="py-20 text-center space-y-6">
                <div class="w-24 h-24 bg-surface-container-high rounded-full flex items-center justify-center mx-auto text-on-surface-variant/30">
                    <span class="material-symbols-outlined text-6xl">notifications_off</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-on-surface">No notifications yet</h3>
                    <p class="text-body-lg text-on-surface-variant">We'll notify you when something important happens.</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-primary text-on-primary rounded-full font-label-lg shadow-emerald">
                    Back to Dashboard
                </a>
            </div>
            @endforelse

            <div class="mt-xl">
                {{ $notifs->links() }}
            </div>
        </div>
    </main>
<div class="mt-xl text-center">
<button class="px-xl py-md bg-white border border-outline-variant text-primary font-bold rounded-full hover:bg-surface-container transition-colors shadow-sm active:scale-95 duration-150">
                Load More Notifications
            </button>
</div>
</main>
<!-- Footer -->
<footer class="md:ml-64 bg-surface-container-highest dark:bg-on-background border-t border-outline-variant px-lg py-xl flex flex-col md:flex-row justify-between items-center gap-lg">
<div class="text-center md:text-left">
<p class="font-headline-md text-headline-md text-on-surface mb-xs">AgriMandi India</p>
<p class="font-body-md text-body-md text-on-surface-variant">© 2024 AgriMandi India. Empowering Indian Agriculture.</p>
</div>
<div class="flex flex-wrap justify-center gap-md">
<a class="text-on-surface-variant hover:text-primary transition-opacity hover:opacity-80 font-body-md" href="#">About Us</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity hover:opacity-80 font-body-md" href="#">Terms of Service</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity hover:opacity-80 font-body-md" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity hover:opacity-80 font-body-md" href="#">Support</a>
<a class="text-on-surface-variant hover:text-primary transition-opacity hover:opacity-80 font-body-md" href="#">Contact</a>
</div>
</footer>
<!-- Notification Settings Modal -->
<div class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm hidden" id="settings-modal">
<div class="bg-white w-full max-w-lg rounded-2xl shadow-[0_16px_40px_rgba(16,185,129,0.12)] mx-container-margin overflow-hidden">
<div class="bg-surface-container-low px-lg py-md border-b border-outline-variant flex justify-between items-center">
<h2 class="font-headline-md text-headline-md text-on-surface">Notification Settings</h2>
<button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container-high p-xs rounded-full" data-icon="close" onclick="document.getElementById('settings-modal').classList.add('hidden')">close</button>
</div>
<div class="p-lg space-y-lg max-h-[716px] overflow-y-auto">
<!-- Channel Settings -->
<div class="space-y-md">
<h3 class="font-label-lg text-primary uppercase tracking-wider">Communication Channels</h3>
<div class="flex items-center justify-between p-md bg-surface rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-primary" data-icon="mail">mail</span>
<div>
<p class="font-bold">Email Notifications</p>
<p class="text-xs text-on-surface-variant">Daily summaries and transaction receipts</p>
</div>
</div>
<input checked="" class="w-10 h-5 bg-outline-variant rounded-full appearance-none cursor-pointer checked:bg-primary transition-colors relative before:content-[''] before:absolute before:w-4 before:h-4 before:bg-white before:rounded-full before:top-0.5 before:left-0.5 checked:before:left-5 before:transition-all" type="checkbox"/>
</div>
<div class="flex items-center justify-between p-md bg-surface rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-primary" data-icon="sms">sms</span>
<div>
<p class="font-bold">SMS Alerts</p>
<p class="text-xs text-on-surface-variant">Critical bidding and shipping updates</p>
</div>
</div>
<input checked="" class="w-10 h-5 bg-outline-variant rounded-full appearance-none cursor-pointer checked:bg-primary transition-colors relative before:content-[''] before:absolute before:w-4 before:h-4 before:bg-white before:rounded-full before:top-0.5 before:left-0.5 checked:before:left-5 before:transition-all" type="checkbox"/>
</div>
<div class="flex items-center justify-between p-md bg-surface rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-primary" data-icon="notifications_active">notifications_active</span>
<div>
<p class="font-bold">In-App Notifications</p>
<p class="text-xs text-on-surface-variant">Real-time activity while using the portal</p>
</div>
</div>
<input checked="" class="w-10 h-5 bg-outline-variant rounded-full appearance-none cursor-pointer checked:bg-primary transition-colors relative before:content-[''] before:absolute before:w-4 before:h-4 before:bg-white before:rounded-full before:top-0.5 before:left-0.5 checked:before:left-5 before:transition-all" type="checkbox"/>
</div>
</div>
<!-- Specific Alerts -->
<div class="space-y-md">
<h3 class="font-label-lg text-primary uppercase tracking-wider">Market Intelligence</h3>
<div class="space-y-sm">
<label class="text-label-lg font-bold block">Matching Alerts Frequency</label>
<select class="w-full bg-surface border border-outline-variant rounded-xl p-md focus:ring-primary focus:border-primary">
<option>Real-time (As found)</option>
<option>Once every 4 hours</option>
<option>Once Daily (Morning Digest)</option>
<option>Weekly Report</option>
</select>
</div>
<div class="flex items-center justify-between p-md bg-surface rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-md">
<span class="material-symbols-outlined text-primary" data-icon="schedule">schedule</span>
<div>
<p class="font-bold">Payment Reminders</p>
<p class="text-xs text-on-surface-variant">Automatic follow-ups for pending payments</p>
</div>
</div>
<input checked="" class="w-10 h-5 bg-outline-variant rounded-full appearance-none cursor-pointer checked:bg-primary transition-colors relative before:content-[''] before:absolute before:w-4 before:h-4 before:bg-white before:rounded-full before:top-0.5 before:left-0.5 checked:before:left-5 before:transition-all" type="checkbox"/>
</div>
</div>
</div>
<div class="p-lg bg-surface-container-low flex justify-end gap-md">
<button class="px-lg py-sm font-label-lg text-on-surface-variant" onclick="document.getElementById('settings-modal').classList.add('hidden')">Cancel</button>
<button class="px-xl py-sm bg-primary text-on-primary rounded-xl font-label-lg shadow-sm hover:opacity-90" onclick="document.getElementById('settings-modal').classList.add('hidden')">Save Preferences</button>
</div>
</div>
</div>

@endsection
