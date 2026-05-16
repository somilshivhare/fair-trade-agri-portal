@extends('layouts.stitch')

@section('title', isset($editing) ? 'Edit Listing Intelligence - AgriMandi' : 'New Listing Intelligence - AgriMandi')

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

        .form-section {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-section:focus-within {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .upload-zone {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='24' ry='24' stroke='%2310B98166' stroke-width='3' stroke-dasharray='12%2c 12' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        }

        .ai-orb {
            background: radial-gradient(circle, #10B981 0%, transparent 70%);
            filter: blur(20px);
            animation: pulse-orb 4s infinite;
        }

        @keyframes pulse-orb {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.6;
            }
        }
    </style>
@endpush

@section('content')
    <div class="flex bg-slate-50 dark:bg-slate-950 min-h-screen font-['Manrope']" x-data="productListing()">

        <!-- 🏢 ENTERPRISE SIDEBAR -->
        <aside class="hidden lg:flex flex-col w-80 h-screen sticky top-0 glass-sidebar z-50 p-6">
            <div class="flex flex-col gap-4 mb-12">
                <img src="{{ asset('images/logo.png') }}" alt="AgriMandi Logo"
                     class="h-40 w-auto object-contain self-start mix-blend-multiply">
                <div>
                    <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tighter">AgriMandi <span
                            class="text-primary text-[10px] align-top bg-primary/10 px-1.5 py-0.5 rounded ml-1 font-bold">OS</span>
                    </h2>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Listing Engine</p>
                </div>
            </div>

            <nav class="flex-1 space-y-2">
                <template x-for="item in menuItems" :key="item.label">
                    <a :href="item.route" class="flex items-center justify-between p-4 rounded-2xl transition-all group"
                        :class="item.active ? 'bg-primary text-white shadow-xl shadow-primary/20' : 'text-slate-500 dark:text-slate-400 hover:bg-primary/5 hover:text-primary'">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined transition-transform group-hover:scale-110"
                                :class="item.active ? 'filled' : ''" x-text="item.icon"></span>
                            <span class="text-sm font-bold uppercase tracking-widest" x-text="item.label"></span>
                        </div>
                    </a>
                </template>
            </nav>

            <div class="mt-auto p-6 bg-slate-100 dark:bg-slate-900 rounded-3xl space-y-4">
                <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Listing Progress</h5>
                <div class="h-1.5 w-full bg-white dark:bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-primary transition-all duration-1000" :style="'width: ' + listingProgress + '%'">
                    </div>
                </div>
                <p class="text-[10px] font-bold text-slate-500" x-text="listingProgress + '% profile completeness'"></p>
            </div>
        </aside>

        <!-- 🚀 MAIN LISTING INTERFACE -->
        <main class="flex-1 min-w-0 flex flex-col">
            <!-- TOP NAV -->
            <header
                class="h-24 sticky top-0 z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-3xl border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8">
                <div class="flex items-center gap-8 flex-1">
                    <a href="{{ route('farmer.products') }}"
                        class="flex items-center gap-3 text-slate-500 hover:text-primary transition-all duration-300 group">
                        <div
                            class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-900 flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                        </div>
                        <span class="text-[12px] font-black uppercase tracking-widest hidden sm:block">Back to
                            Products</span>
                    </a>
                    <div class="h-10 w-px bg-slate-200 dark:bg-slate-800 mx-2"></div>

                    <div>
                        <h3 class="text-sm font-black text-slate-900 dark:text-white tracking-tight"
                            x-text="isEditing ? 'Edit Asset' : 'Register New Asset'"></h3>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Global Commodity Standards
                            Compliance</p>
                    </div>
                    <div class="h-8 w-px bg-slate-200 dark:border-slate-800 hidden md:block"></div>
                    <div class="hidden md:flex items-center gap-4">
                        <span class="material-symbols-outlined text-primary text-[18px] filled">auto_awesome</span>
                        <p class="text-[10px] font-black text-primary uppercase tracking-widest">AI Listing Optimization
                            Active</p>
                    </div>
                </div>
                @include('components.nav-user-actions')
            </header>

            <!-- FORM CONTENT -->
            <form @submit.prevent="submitForm()" class="p-8 space-y-8 max-w-6xl mx-auto w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Main Form Body -->
                    <div class="lg:col-span-8 space-y-8">
                        <!-- Section: Commodity Intelligence -->
                        <section
                            class="form-section bg-white dark:bg-slate-900 rounded-[40px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-[28px] filled">grain</span>
                                </div>
                                <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Commodity
                                    Intelligence</h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Commodity
                                        Type</label>
                                    <select
                                        class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm focus:ring-4 focus:ring-primary/10 transition-all">
                                        <option>Wheat (Sharbati)</option>
                                        <option>Soybean (JS-335)</option>
                                        <option>Maize (Hybrid)</option>
                                        <option>Cotton (Long Staple)</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Listing
                                        Title</label>
                                    <input type="text" placeholder="e.g. 2024 Harvest Premium Grade-A Wheat"
                                        class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-bold text-sm focus:ring-4 focus:ring-primary/10 transition-all">
                                </div>
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Quality
                                        Description</label>
                                    <textarea rows="3" placeholder="Describe moisture content, color, grain size..."
                                        class="w-full p-6 bg-slate-50 dark:bg-slate-800 rounded-[32px] border-none font-bold text-sm focus:ring-4 focus:ring-primary/10 transition-all resize-none"></textarea>
                                </div>
                            </div>
                        </section>

                        <!-- Section: Pricing & Inventory -->
                        <section
                            class="form-section bg-white dark:bg-slate-900 rounded-[40px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-[28px] filled">payments</span>
                                </div>
                                <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Pricing &
                                    Inventory</h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Quantity</label>
                                    <div class="relative">
                                        <input type="number" placeholder="500"
                                            class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-black text-sm focus:ring-4 focus:ring-primary/10">
                                        <span
                                            class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-400 uppercase">Quintals</span>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Base
                                        Price</label>
                                    <div class="relative">
                                        <input type="number" placeholder="2450"
                                            class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-black text-sm focus:ring-4 focus:ring-primary/10">
                                        <span
                                            class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-400 uppercase">/Q</span>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Quality
                                        Grade</label>
                                    <select
                                        class="w-full h-14 px-6 bg-slate-50 dark:bg-slate-800 rounded-2xl border-none font-black text-sm focus:ring-4 focus:ring-primary/10 transition-all text-primary">
                                        <option>Grade A+</option>
                                        <option>Grade A</option>
                                        <option>Grade B</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Price Insights -->
                            <div
                                class="p-6 bg-primary/5 rounded-[32px] border border-primary/10 flex items-center justify-between gap-8">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined text-[20px] filled">analytics</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-primary uppercase tracking-widest">Market
                                            Benchmarking</p>
                                        <p class="text-xs font-bold text-slate-600 dark:text-slate-400">MSP is ₹2,275. Your
                                            price is <span class="text-emerald-500">+7.7%</span> above base.</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <div
                                        class="px-4 py-2 bg-white dark:bg-slate-800 rounded-xl text-[9px] font-black uppercase text-slate-400 border border-slate-100 dark:border-slate-700">
                                        Mandi: ₹2,410</div>
                                    <div
                                        class="px-4 py-2 bg-white dark:bg-slate-800 rounded-xl text-[9px] font-black uppercase text-slate-400 border border-slate-100 dark:border-slate-700">
                                        Gov: ₹2,275</div>
                                </div>
                            </div>
                        </section>

                        <!-- Section: Visual Evidence -->
                        <section
                            class="form-section bg-white dark:bg-slate-900 rounded-[40px] p-10 border border-slate-200 dark:border-slate-800 space-y-8">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined text-[28px] filled">photo_camera</span>
                                    </div>
                                    <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Visual
                                        Evidence</h4>
                                </div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Up to 6 high-res
                                    images</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div
                                    class="upload-zone relative aspect-square rounded-[32px] flex flex-col items-center justify-center gap-4 group cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                                    <div
                                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                        <span class="material-symbols-outlined text-[32px]">add_photo_alternate</span>
                                    </div>
                                    <div class="text-center">
                                        <p
                                            class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-widest">
                                            Main Photo</p>
                                        <p class="text-[9px] font-bold text-slate-400">Click to upload</p>
                                    </div>
                                </div>
                                <template x-for="i in 2">
                                    <div
                                        class="upload-zone relative aspect-square rounded-[32px] flex flex-col items-center justify-center gap-4 opacity-50 group cursor-pointer hover:opacity-100 transition-all">
                                        <span
                                            class="material-symbols-outlined text-slate-300 group-hover:text-primary transition-colors">add</span>
                                    </div>
                                </template>
                            </div>
                        </section>
                    </div>

                    <!-- Strategic Sidebar -->
                    <div class="lg:col-span-4 space-y-8">
                        <!-- AI Quality Grading -->
                        <div class="bg-slate-900 rounded-[48px] p-10 text-white space-y-8 overflow-hidden relative">
                            <div class="absolute -right-20 -top-20 w-60 h-60 ai-orb"></div>

                            <div class="space-y-1 relative z-10">
                                <h5 class="text-sm font-black uppercase tracking-[0.2em] text-primary">AI Grading Assistant
                                </h5>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Scanning Live
                                    Feed...</p>
                            </div>

                            <div class="p-6 bg-white/5 rounded-3xl border border-white/10 space-y-4 relative z-10">
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase">Moisture Content</span>
                                    <span class="text-sm font-black text-emerald-400">10.2%</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase">Foreign Matter</span>
                                    <span class="text-sm font-black text-emerald-400">0.5%</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase">Grade Est.</span>
                                    <span class="px-3 py-1 bg-primary/20 text-primary rounded-lg text-xs font-black">PREMIUM
                                        A+</span>
                                </div>
                            </div>

                            <p class="text-[10px] font-medium text-slate-400 leading-relaxed relative z-10">AI suggests your
                                harvest matches <span class="text-white font-black">Export Standard A+</span>. This
                                typically attracts <span class="text-emerald-400 font-black">15-20% higher</span> bids from
                                institutional buyers.</p>
                        </div>

                        <!-- Listing Summary Card -->
                        <div
                            class="bg-white dark:bg-slate-900 rounded-[48px] p-10 border border-slate-200 dark:border-slate-800 space-y-8 sticky top-28">
                            <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Listing Summary
                            </h4>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase">Listing Exposure</span>
                                    <span class="text-xs font-black text-slate-900 dark:text-white">National</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase">Verification Hub</span>
                                    <span class="text-xs font-black text-primary">Ludhiana APMC</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-black text-slate-400 uppercase">Listing Duration</span>
                                    <span class="text-xs font-black text-slate-900 dark:text-white">14 Days</span>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-slate-100 dark:border-slate-800 space-y-4">
                                <button type="submit"
                                    class="w-full py-5 bg-primary text-white rounded-3xl font-black text-[12px] uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                                    <span class="material-symbols-outlined text-[20px]">rocket_launch</span>
                                    Publish to Exchange
                                </button>
                                <a href="{{ route('farmer.products') }}"
                                    class="w-full py-5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-3xl font-black text-[10px] uppercase tracking-widest text-center block transition-all">
                                    Save as Draft
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    @push('scripts')
        <script>
            function productListing() {
                return {
                    isEditing: {{ isset($editing) ? 'true' : 'false' }},
                    listingProgress: 65,
                    menuItems: [
                        { label: 'Dashboard', icon: 'dashboard', route: '{{ route('farmer.dashboard') }}' },
                        { label: 'My Products', icon: 'inventory_2', route: '{{ route('farmer.products') }}', active: true },
                        { label: 'Bids Exchange', icon: 'gavel', route: '{{ route('farmer.bids') }}' },
                        { label: 'Logistics', icon: 'local_shipping', route: '{{ route('farmer.orders') }}' },
                        { label: 'KYC Status', icon: 'verified_user', route: '{{ route('farmer.kyc') }}' },
                    ],
                    submitForm() {
                        // Simulated submission
                        const btn = document.querySelector('button[type="submit"]');
                        btn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">autorenew</span> PUBLISHING...';
                        btn.disabled = true;
                        setTimeout(() => {
                            alert('Commodity published successfully to the global exchange!');
                            window.location.href = '{{ route('farmer.products') }}';
                        }, 1500);
                    }
                }
            }
        </script>
    @endpush
@endsection