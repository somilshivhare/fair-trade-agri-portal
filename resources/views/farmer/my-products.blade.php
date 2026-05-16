@extends('layouts.stitch')

@section('title', 'Inventory Intelligence - AgriMandi')

@push('styles')
    <style>
        .glass-sidebar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(0, 108, 73, 0.1);
        }

        .dark .glass-sidebar {
            background: rgba(15, 23, 42, 0.8);
            border-right: 1px solid rgba(16, 185, 129, 0.1);
        }

        .product-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
        }

        .quality-badge {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        }
    </style>
@endpush

@section('content')
    <div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" x-data="inventoryManager()">

        <!-- 🏢 ENTERPRISE SIDEBAR -->
        <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
            <div class="flex flex-col gap-4 mb-12">
                <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo"
                    class="h-40 w-auto object-contain self-start mix-blend-multiply">
                <div>
                    <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span
                            class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span>
                    </h2>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Inventory Hub</p>
                </div>
            </div>

            <nav class="flex-1 space-y-2">
                <template x-for="item in menuItems" :key="item.label">
                    <a :href="item.active ? '#' : item.route"
                        class="flex items-center justify-between p-4 rounded-2xl transition-all group"
                        :class="item.active ? 'bg-primary text-white shadow-xl shadow-primary/20' : 'text-slate-500 dark:text-slate-400 hover:bg-primary/5 hover:text-primary'">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined transition-transform group-hover:scale-110"
                                :class="item.active ? 'filled' : ''" x-text="item.icon"></span>
                            <span class="text-sm font-bold uppercase tracking-widest" x-text="item.label"></span>
                        </div>
                    </a>
                </template>
            </nav>

            <!-- Sidebar Filter Context -->
            <div class="mt-auto space-y-6">
                <div class="p-6 bg-slate-100 dark:bg-slate-900 rounded-3xl space-y-4">
                    <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inventory Filters</h5>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-primary focus:ring-primary" checked>
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">In Stock</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-primary focus:ring-primary">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">In Auction</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-primary focus:ring-primary">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-400">Low Stock</span>
                        </label>
                    </div>
                </div>
                <button
                    class="w-full py-4 bg-primary text-white rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-lg shadow-primary/20 hover:scale-105 transition-all">List
                    New Product</button>
            </div>
        </aside>

        <!-- 🚀 MAIN INVENTORY INTERFACE -->
        <main class="flex-1 min-w-0 flex flex-col">
            <!-- TOP NAV -->
            <header
                class="h-24 sticky top-0 z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-3xl border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8">
                <div class="flex items-center gap-8 flex-1">
                    <a href="{{ route('farmer.dashboard') }}"
                        class="flex items-center gap-3 text-slate-500 hover:text-primary transition-all duration-300 group">
                        <div
                            class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-900 flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                        </div>
                        <span class="text-[12px] font-black uppercase tracking-widest hidden sm:block">Back to
                            Dashboard</span>
                    </a>
                    <div class="h-10 w-px bg-slate-200 dark:bg-slate-800 mx-2"></div>

                    <div>
                        <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight">Stock Management</h3>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tracking 8 Core
                            Commodities</p>
                    </div>
                    <div class="h-8 w-px bg-slate-200 dark:border-slate-800 hidden md:block"></div>
                    <div class="hidden md:flex items-center gap-2">
                        <template x-for="stat in inventoryStats" :key="stat.label">
                            <div
                                class="px-4 py-2 bg-slate-50 dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800">
                                <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest"
                                    x-text="stat.label"></p>
                                <p class="text-xs font-black text-slate-900 dark:text-white" x-text="stat.value"></p>
                            </div>
                        </template>
                    </div>
                </div>
                @include('components.nav-user-actions')
            </header>

            <!-- INVENTORY CONTENT -->
            <div class="p-8 space-y-8">
                <!-- Search & Actions Bar -->
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="relative flex-1 max-w-xl group">
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
                        <input type="text" placeholder="Search by crop name, lot ID, or grade..."
                            class="w-full pl-12 pr-6 py-4 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 focus:border-primary focus:ring-4 focus:ring-primary/5 outline-none transition-all text-sm font-medium">
                    </div>
                    <div class="flex items-center gap-4">
                        <button
                            class="px-6 py-4 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 text-xs font-black uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">filter_list</span> Filters
                        </button>
                        <button
                            class="px-6 py-4 bg-primary text-white rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-105 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">add</span> New Listing
                        </button>
                    </div>
                </div>

                <!-- INVENTORY GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
                    <template x-for="product in products" :key="product.id">
                        <div
                            class="product-card group bg-white dark:bg-slate-900 rounded-[40px] border border-slate-200 dark:border-slate-800 overflow-hidden flex flex-col shadow-sm">
                            <!-- Product Visual -->
                            <div class="h-56 relative overflow-hidden bg-slate-100">
                                <img :src="product.image"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" />
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                                <div class="absolute top-6 left-6">
                                    <span
                                        class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest backdrop-blur-md bg-white/20 text-white border border-white/20"
                                        x-text="product.category"></span>
                                </div>
                                <div class="absolute top-6 right-6">
                                    <div
                                        class="w-10 h-10 rounded-full bg-white/90 backdrop-blur-md flex items-center justify-center text-primary shadow-lg cursor-pointer hover:scale-110 transition-transform">
                                        <span class="material-symbols-outlined filled">grade</span>
                                    </div>
                                </div>
                                <div class="absolute bottom-6 left-6 right-6 flex items-end justify-between text-white">
                                    <div>
                                        <h4 class="text-lg font-black tracking-tight" x-text="product.name"></h4>
                                        <p class="text-[10px] font-bold text-white/70 uppercase tracking-widest"
                                            x-text="product.lotId"></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest">Grade
                                        </p>
                                        <p class="text-2xl font-black text-white" x-text="product.grade"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Content -->
                            <div class="p-8 space-y-6 flex-1 flex flex-col">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="p-4 bg-slate-50 dark:bg-slate-800 rounded-3xl space-y-1">
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Current
                                            Stock</p>
                                        <p class="text-sm font-black text-slate-900 dark:text-white"
                                            x-text="product.stock + ' ' + product.unit"></p>
                                    </div>
                                    <div class="p-4 bg-slate-50 dark:bg-slate-800 rounded-3xl space-y-1">
                                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Market
                                            Price</p>
                                        <p class="text-sm font-black text-primary" x-text="'₹' + product.price + '/q'"></p>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div
                                        class="flex justify-between items-center text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                        <span>Moisture Content</span>
                                        <span class="text-slate-900 dark:text-white" x-text="product.moisture + '%'"></span>
                                    </div>
                                    <div class="h-1.5 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                        <div class="h-full bg-primary rounded-full"
                                            :style="'width: ' + (100 - (product.moisture * 5)) + '%'"></div>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center gap-3 p-4 bg-emerald-500/5 rounded-2xl border border-emerald-500/10">
                                    <span class="material-symbols-outlined text-emerald-500 text-[18px]">info</span>
                                    <p class="text-[10px] font-bold text-emerald-600 leading-tight"
                                        x-text="product.aiRecommendation"></p>
                                </div>

                                <div
                                    class="mt-auto pt-6 border-t border-slate-100 dark:border-slate-800 grid grid-cols-2 gap-3">
                                    <button
                                        class="py-4 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:scale-105 transition-all">Edit
                                        Stock</button>
                                    <button
                                        class="py-4 bg-primary text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-primary/20 hover:scale-105 transition-all">Go
                                        Live</button>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Add New Product Card -->
                    <button
                        class="product-card group bg-slate-100 dark:bg-slate-900/50 rounded-[40px] border-2 border-dashed border-slate-300 dark:border-slate-800 flex flex-col items-center justify-center p-12 hover:bg-white dark:hover:bg-slate-900 transition-all min-h-[400px]">
                        <div
                            class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform duration-500 mb-6">
                            <span class="material-symbols-outlined text-[40px]">add_circle</span>
                        </div>
                        <h5 class="text-xl font-black text-slate-900 dark:text-white mb-2">Add New Product</h5>
                        <p class="text-sm text-slate-500 font-medium text-center">Ready to list a new harvest? Our AI will
                            help you grade and price it.</p>
                    </button>
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script>
            function inventoryManager() {
                return {
                    menuItems: [
                        { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}' },
                        { label: 'My Products', icon: 'inventory_2', route: '#', active: true },
                        { label: 'Bids Exchange', icon: 'gavel', route: '{{ route('farmer.bids') }}' },
                        { label: 'Logistics', icon: 'local_shipping', route: '{{ route('farmer.orders') }}' },
                        { label: 'Gov MSP', icon: 'account_balance', route: '{{ route('gov.index') }}' },
                    ],
                    inventoryStats: [
                        { label: 'Total Value', value: '₹24.8L' },
                        { label: 'Active Lots', value: '8' },
                        { label: 'Sold (30d)', value: '1,250q' },
                        { label: 'Avg Grade', value: 'A+' }
                    ],
                    products: [
                        { id: 1, name: 'Premium Sharbati', lotId: 'LOT-W-9420', category: 'Wheat', grade: 'A+', stock: '250', unit: 'q', price: '2,480', moisture: '10.2', image: 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?auto=format&fit=crop&q=80&w=800', aiRecommendation: 'High demand in Mumbai. Hold for 10% premium.' },
                        { id: 2, name: 'Organic JS-335', lotId: 'LOT-S-8812', category: 'Soybean', grade: 'A', stock: '120', unit: 'q', price: '4,950', moisture: '9.8', image: 'https://images.unsplash.com/photo-1599549474797-4f600f643794?auto=format&fit=crop&q=80&w=800', aiRecommendation: 'Current price is peak. Sell within 48 hours.' },
                        { id: 3, name: 'Long Staple H-4', lotId: 'LOT-C-7241', category: 'Cotton', grade: 'B+', stock: '85', unit: 'q', price: '7,200', moisture: '8.5', image: 'https://images.unsplash.com/photo-1594903582424-656513470783?auto=format&fit=crop&q=80&w=800', aiRecommendation: 'Eligible for export certification. Grade up suggested.' },
                        { id: 4, name: 'Hybrid Maize', lotId: 'LOT-M-3301', category: 'Maize', grade: 'A', stock: '450', unit: 'q', price: '2,150', moisture: '11.0', image: 'https://images.unsplash.com/photo-1551754655-cd27e38d2076?auto=format&fit=crop&q=80&w=800', aiRecommendation: 'Government procurement active in your area. Sell at MSP.' },
                        { id: 5, name: 'Red Onion', lotId: 'LOT-O-5520', category: 'Onion', grade: 'A', stock: '200', unit: 'q', price: '3,200', moisture: '12.5', image: 'https://images.unsplash.com/photo-1508747703725-719777637510?auto=format&fit=crop&q=80&w=800', aiRecommendation: 'Regional supply low. Export potential high.' },
                        { id: 6, name: 'Yellow Potato', lotId: 'LOT-P-1120', category: 'Potato', grade: 'B+', stock: '350', unit: 'q', price: '1,850', moisture: '14.2', image: 'https://images.unsplash.com/photo-1518977676601-b53f82aba655?auto=format&fit=crop&q=80&w=800', aiRecommendation: 'Storage costs rising. Suggest early liquidation.' }
                    ]
                }
            }
        </script>
    @endpush
@endsection