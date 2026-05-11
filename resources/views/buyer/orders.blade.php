@extends('layouts.stitch')
@section('title', 'Orders - AgriMandi')
@section('content')

<!-- Market Ticker Specialty Component -->
<div class="w-full bg-surface-container-lowest py-2 border-b border-outline-variant/10 overflow-hidden sticky top-0 z-[60]">
<div class="flex items-center gap-12 animate-marquee whitespace-nowrap px-margin-desktop">
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Wheat (WHT)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹2,450.00</span>
<span class="text-[10px] text-primary">▲ 1.2%</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Soybeans (SOY)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹4,120.50</span>
<span class="text-[10px] text-primary">▲ 0.8%</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Corn (CRN)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹1,890.00</span>
<span class="text-[10px] text-error">▼ 0.4%</span>
</div>
<div class="flex items-center gap-2">
<span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Mustard (MST)</span>
<span class="text-label-sm font-label-sm text-primary font-bold">₹5,670.00</span>
<span class="text-[10px] text-primary">▲ 2.1%</span>
</div>
</div>
</div>
<!-- Top Navigation Bar -->
<nav class="flex items-center justify-between px-margin-desktop h-20 w-full sticky top-[41px] z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20 shadow-[0_0_15px_rgba(78,222,163,0.1)]">
<div class="flex items-center gap-8">
<span class="font-headline-md text-primary font-bold tracking-tight text-headline-md">AgriMandi India</span>
<div class="hidden md:flex items-center gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Marketplace</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Analytics</a>
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="#">Orders</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center gap-2 mr-4">
<span class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full cursor-pointer transition-colors" data-icon="notifications">notifications</span>
<span class="material-symbols-outlined text-on-surface-variant hover:bg-primary-container/10 p-2 rounded-full cursor-pointer transition-colors" data-icon="language">language</span>
</div>
<button class="bg-primary-container text-on-primary-container px-6 py-3 rounded-xl font-label-md text-label-md active:scale-95 transition-transform duration-200">Start Selling</button>
<div class="w-10 h-10 rounded-full bg-surface-container overflow-hidden">
<img alt="Farmer profile avatar" class="w-full h-full object-cover" data-alt="A professional headshot of a modern Indian farmer in a clean white shirt, looking confident and smiling. The background is a blurred high-tech greenhouse with vibrant green plants and soft, natural morning light. The overall mood is professional, trustworthy, and successful." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvQdIKJ4ih-jgpbG1N-1bIJ24OiTWIqwmA49PSibVH5zrP1CNm9hITTi3rNeO8hxXf4hx3IeyP0OosSqrZ4sB0WPcVoSEUhiy87hfl4j85YeH0kPG18ZYLP6AOPvmcTF6VyE3JZtjHGXBTwGxNYS9OXSo4wkzeJMxOIr7aRLKLyVJn-y72iMEjGXBW0iahiD8OzuuSzNBIvKSLJ_wIIzd8Ln1TNcc5N3wlj7ic5MUKBLYeddm3gpRNaHS9LTmjHoo6s7JNEmB9dpaX"/>
</div>
</div>
</nav>
<div class="flex max-w-[1440px] mx-auto min-h-[calc(100vh-121px)]">
<!-- Side Navigation Bar -->
<aside class="hidden lg:flex flex-col w-72 h-screen sticky top-[121px] py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl rounded-r-xl">
<div class="px-6 mb-4">
<h3 class="font-headline-sm text-primary font-bold text-[20px]">Orders &amp; Logistics</h3>
<p class="text-label-sm text-on-surface-variant font-label-sm">Fulfillment Dashboard</p>
</div>
<nav class="flex flex-col gap-1 px-4">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-l-none rounded-r-lg group" href="#">
<span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
<span class="font-label-md text-label-md">All Orders</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span class="font-label-md text-label-md">Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="gavel">gavel</span>
<span class="font-label-md text-label-md">Pending Bids</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant hover:text-on-surface transition-all duration-300 rounded-lg group" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-md text-label-md">Settings</span>
</a>
</nav>
<div class="mt-auto px-4 pb-8">
<div class="bg-primary/5 p-4 rounded-xl border border-primary/10">
<p class="text-label-sm font-label-sm text-primary mb-2">Pro Insights</p>
<p class="text-[13px] text-on-surface-variant leading-tight mb-3">Market demand for Basmati Rice is expected to rise by 15% next week.</p>
<button class="w-full bg-primary text-white py-2 rounded-lg text-label-sm font-label-sm hover:opacity-90 transition-opacity">View Trends</button>
</div>
</div>
</aside>
<!-- Main Content Area -->
        <main class="flex-1 p-gutter md:p-margin-desktop overflow-x-hidden">
            <!-- Header Section -->
            <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-xl">
                <div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface">Order Tracking</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2">Manage your fulfillment pipeline and active logistics.</p>
                </div>
            </header>

            <!-- Status Overview -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter mb-xl">
                <div class="bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant/10">
                    <p class="text-label-md font-label-md text-on-surface-variant">Active Orders</p>
                    <p class="text-display-sm font-display-sm text-primary font-bold">{{ $orders->whereIn('order_status', ['confirmed', 'shipped'])->count() }}</p>
                </div>
                <div class="bg-surface-container-lowest p-lg rounded-2xl border border-outline-variant/10">
                    <p class="text-label-md font-label-md text-on-surface-variant">Completed</p>
                    <p class="text-display-sm font-display-sm text-on-surface font-bold">{{ $orders->where('order_status', 'delivered')->count() }}</p>
                </div>
            </div>

            <!-- Orders Table -->
            <section class="bg-surface-container-lowest rounded-[32px] border border-outline-variant/10 overflow-hidden shadow-sm">
                <div class="p-lg border-b border-outline-variant/10">
                    <h3 class="font-headline-md text-headline-md">My Orders</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low">
                            <tr>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Order ID</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Commodity</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Farmer</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Status</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container text-right">Value</th>
                                <th class="px-lg py-4 font-label-md text-on-secondary-container">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse($orders as $order)
                            <tr class="hover:bg-surface-container-low/50 transition-colors">
                                <td class="px-lg py-5 font-bold text-on-surface">#{{ $order->order_number }}</td>
                                <td class="px-lg py-5">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary">eco</span>
                                        <span class="text-body-md">{{ $order->product->name ?? '—' }}</span>
                                    </div>
                                </td>
                                <td class="px-lg py-5 text-on-surface-variant">{{ $order->farmer->name ?? '—' }}</td>
                                <td class="px-lg py-5">
                                    <span class="px-3 py-1 rounded-full text-label-sm font-bold
                                        @if($order->order_status === 'delivered') bg-primary/10 text-primary
                                        @elseif($order->order_status === 'shipped') bg-tertiary/10 text-tertiary
                                        @else bg-secondary/10 text-secondary @endif">
                                        {{ ucwords(str_replace('_',' ',$order->order_status)) }}
                                    </span>
                                </td>
                                <td class="px-lg py-5 font-bold text-on-surface text-right">₹{{ number_format($order->total_amount) }}</td>
                                <td class="px-lg py-5">
                                    @if($order->order_status === 'shipped')
                                    <form action="{{ route('buyer.orders.confirm', $order->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-primary font-bold hover:underline">Confirm Delivery</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-lg py-12 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <span class="material-symbols-outlined text-5xl text-outline-variant">shopping_cart_off</span>
                                        <p class="text-on-surface-variant">No orders found. <a href="{{ route('marketplace') }}" class="text-primary font-bold">Browse Marketplace</a></p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
            
            <div class="mt-xl">
                {{ $orders->links() }}
            </div>
        </main>
</div>
<!-- Footer Component -->
<footer class="bg-surface-container-lowest border-t border-outline-variant/30 py-12 mt-xl">
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop max-w-[1440px] mx-auto">
<div class="flex flex-col gap-4">
<span class="font-headline-md text-primary font-bold text-headline-md">AgriMandi India</span>
<p class="font-body-md text-body-md text-on-surface-variant">Cultivating digital growth and connecting India's agricultural ecosystem with high-tech fulfillment solutions.</p>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Quick Links</h4>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Marketplace</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Analytics Dashboard</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Trade Support</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Legal</h4>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Privacy Policy</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Terms of Service</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary hover:underline decoration-primary underline-offset-4 transition-all duration-200" href="#">Cookie Policy</a>
</div>
<div class="flex flex-col gap-4">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider">Contact</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Support Hub: 1800-AGRI-MANDI</p>
<p class="font-body-md text-body-md text-on-surface-variant">Email: help@agrimandi.in</p>
<div class="flex gap-4 mt-2">
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity" data-icon="share">share</span>
<span class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity" data-icon="language">language</span>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-outline-variant/10 px-margin-desktop max-w-[1440px] mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
<p class="font-body-md text-body-md text-on-surface-variant opacity-80">© 2024 AgriMandi India. Cultivating Digital Growth.</p>
<div class="flex items-center gap-4">
<div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-sm" data-icon="verified">verified</span>
</div>
<span class="text-label-sm font-label-sm text-on-surface-variant">Authorized Digital Mandi Hub</span>
</div>
</div>
</footer>

@endsection
