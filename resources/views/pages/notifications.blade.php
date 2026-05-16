@extends('layouts.stitch')

@section('title', 'Notifications - AgriMandi Intelligence')

@section('content')
<div x-data="notificationEnterpriseEngine()" class="min-h-screen bg-slate-50 selection:bg-emerald-500 selection:text-white font-sans overflow-x-hidden text-slate-900 flex flex-col">
    
    <!-- 🏛️ NATIONAL ALERTS TICKER -->
    <div class="bg-slate-950 text-white h-11 flex items-center relative z-[70] shadow-2xl border-b border-white/5 shrink-0">
        <div class="absolute left-0 top-0 bottom-0 px-6 bg-[#005137] flex items-center gap-3 z-20 shadow-[10px_0_30px_rgba(0,0,0,0.3)]">
            <div class="w-2.5 h-2.5 bg-emerald-400 rounded-full animate-pulse shadow-[0_0_15px_#10B981]"></div>
            <span class="font-black text-[10px] uppercase tracking-tighter hidden sm:inline">Market Intelligence</span>
            <span class="font-black text-[10px] uppercase tracking-tighter sm:hidden">Live</span>
        </div>
        
        <div class="flex-1 overflow-hidden relative h-full flex items-center">
            <!-- Left Fade Overlay -->
            <div class="absolute left-[160px] top-0 bottom-0 w-20 bg-gradient-to-r from-slate-950 to-transparent z-10 pointer-events-none"></div>
            <!-- Right Fade Overlay -->
            <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-slate-950 to-transparent z-10 pointer-events-none"></div>

            <div class="flex whitespace-nowrap animate-marquee hover:pause group h-full items-center pl-[180px]">
                <template x-for="alert in tickerAlerts" :key="alert.id">
                    <div class="inline-flex items-center gap-4 px-10 border-r border-white/5 h-full transition-colors hover:bg-white/5 cursor-default group/item">
                        <span class="text-[10px] font-black text-emerald-500 uppercase tracking-widest group-hover/item:text-emerald-400" x-text="alert.tag"></span>
                        <p class="text-[13px] font-bold text-slate-100 tracking-tight" x-text="alert.message"></p>
                    </div>
                </template>
                <!-- Duplicate for seamless loop -->
                <template x-for="alert in tickerAlerts" :key="'dup-'+alert.id">
                    <div class="inline-flex items-center gap-4 px-10 border-r border-white/5 h-full">
                        <span class="text-[10px] font-black text-emerald-500 uppercase tracking-widest" x-text="alert.tag"></span>
                        <p class="text-[13px] font-bold text-slate-100 tracking-tight" x-text="alert.message"></p>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- 🚀 MAIN CONTENT CONTAINER -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 pb-24">
        
        <!-- 💎 PREMIUM STICKY HEADER -->
        <header class="sticky top-0 z-50 py-6 mb-8 bg-slate-50/95 backdrop-blur-md border-b border-slate-200/40">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <a href="{{ route('home') }}" class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-emerald-600/20 transition-transform hover:scale-110 active:scale-95 shrink-0">
                        <span class="material-symbols-outlined text-[28px]">notifications_active</span>
                    </a>
                    <div class="space-y-1">
                        <h1 class="text-3xl font-black text-slate-900 tracking-tighter leading-none">Notifications</h1>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest" x-text="lastUpdateText"></span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <div class="hidden xl:flex items-center gap-6 mr-6">
                        <template x-for="feed in activeFeeds">
                            <div class="flex items-center gap-2 px-3 py-1 bg-white border border-slate-200 rounded-full">
                                <div class="w-1.5 h-1.5 rounded-full" :class="feed.online ? 'bg-emerald-500' : 'bg-slate-300'"></div>
                                <span class="text-[9px] font-black text-slate-500 uppercase tracking-widest whitespace-nowrap" x-text="feed.name"></span>
                            </div>
                        </template>
                    </div>
                    <div class="flex items-center gap-3 ml-auto">
                        @include('components.nav-user-actions')
                    </div>
                </div>
            </div>
        </header>

        <!-- 📊 INTELLIGENCE DASHBOARD GRID -->
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4 sm:gap-6 mb-12">
            <template x-for="stat in summaryStats" :key="stat.label">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 sm:p-6 group hover:shadow-xl hover:border-emerald-500/20 transition-all duration-500 relative overflow-hidden flex flex-col justify-between aspect-square sm:aspect-auto">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-slate-50 rounded-full blur-2xl group-hover:bg-emerald-50 transition-all"></div>
                    <div class="relative z-10">
                        <div class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center mb-6 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                            <span class="material-symbols-outlined text-[20px]" x-text="stat.icon"></span>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-tight" x-text="stat.label"></p>
                            <div class="flex items-baseline gap-1.5">
                                <h4 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tighter" x-text="stat.value"></h4>
                                <span x-show="stat.trend" class="text-[8px] font-black text-emerald-500" x-text="stat.trend"></span>
                            </div>
                        </div>
                    </div>
                    <div x-show="stat.pulse" class="absolute bottom-4 right-6">
                        <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full shadow-[0_0_8px_#10B981]"></div>
                    </div>
                </div>
            </template>
        </div>

        <!-- 📑 OPERATION CENTER: FEED & FILTERS -->
        <div class="space-y-8">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-8 border-b border-slate-200/60 pb-8">
                <div class="space-y-1">
                    <h2 class="text-3xl font-black text-slate-900 tracking-tighter">Operational Feed</h2>
                    <p class="text-sm font-medium text-slate-500 tracking-wide italic">Monitoring national mandi protocols & marketplace activity.</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto">
                    <!-- Filters Container -->
                    <div class="bg-slate-100 p-1 rounded-2xl border border-slate-200 flex overflow-x-auto no-scrollbar w-full sm:w-auto">
                        <template x-for="cat in categories" :key="cat.id">
                            <button @click="currentCategory = cat.id" 
                                    class="px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all whitespace-nowrap flex items-center gap-2 shrink-0"
                                    :class="currentCategory === cat.id ? 'bg-white text-emerald-600 shadow-sm' : 'text-slate-400 hover:text-slate-600'">
                                <span class="material-symbols-outlined text-[18px]" x-text="cat.icon"></span>
                                <span x-text="cat.label"></span>
                                <span x-show="cat.count" class="px-1.5 py-0.5 rounded-lg bg-emerald-100 text-emerald-600 text-[8px] font-black" x-text="cat.count"></span>
                            </button>
                        </template>
                    </div>
                    <button @click="markAllAsRead()" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-emerald-600 hover:border-emerald-500 transition-all shadow-sm flex items-center justify-center gap-2 group">
                        <span class="material-symbols-outlined text-[20px] transition-transform group-hover:rotate-12">done_all</span>
                        <span class="hidden sm:inline">Mark All Read</span>
                    </button>
                </div>
            </div>

            <!-- Notifications Feed Grid -->
            <div class="space-y-4 relative min-h-[400px]">
                <template x-for="(notif, index) in filteredNotifications" :key="notif.id">
                    <div class="group relative bg-white border border-slate-200 rounded-[24px] p-5 flex flex-col md:flex-row gap-6 items-center hover:shadow-xl hover:border-emerald-500/20 transition-all duration-500 animate-slideIn overflow-hidden"
                         :style="'animation-delay: ' + (index * 40) + 'ms'"
                         :class="!notif.read && 'border-emerald-500/20 bg-emerald-50/10 shadow-[0_10px_30px_rgba(16,185,129,0.03)]'">
                        
                        <!-- Read Marker -->
                        <div x-show="!notif.read" class="absolute top-0 left-0 bottom-0 w-1 bg-emerald-500"></div>

                        <!-- Content Left -->
                        <div class="flex items-center gap-5 shrink-0 w-full md:w-auto">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-white shadow-lg relative shrink-0 transition-transform group-hover:scale-110"
                                 :class="getIconBg(notif.priority)">
                                <span class="material-symbols-outlined text-[24px]" x-text="notif.icon"></span>
                                <div x-show="notif.priority === 'Critical'" class="absolute inset-0 rounded-2xl bg-white/20 animate-ping"></div>
                            </div>
                            <div class="space-y-0.5 min-w-0">
                                <div class="flex items-center gap-2 overflow-hidden">
                                    <span class="text-[9px] font-black uppercase tracking-[0.1em] whitespace-nowrap" :class="getPriorityColor(notif.priority)" x-text="notif.category"></span>
                                    <span class="w-0.5 h-0.5 rounded-full bg-slate-300 shrink-0"></span>
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest whitespace-nowrap" x-text="notif.time"></span>
                                </div>
                                <h3 class="text-[17px] font-black text-slate-900 tracking-tight leading-tight truncate group-hover:text-emerald-600 transition-colors" x-text="notif.title"></h3>
                            </div>
                        </div>

                        <!-- Content Middle -->
                        <div class="flex-1 min-w-0 space-y-3 w-full">
                            <p class="text-[13px] font-medium text-slate-500 leading-snug line-clamp-1" x-text="notif.message"></p>
                            
                            <div x-show="notif.crop" class="flex items-center gap-3">
                                <div class="px-3 py-1 bg-slate-50 border border-slate-100 rounded-lg flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                                    <span class="text-[9px] font-black text-slate-900 uppercase tracking-widest" x-text="notif.crop"></span>
                                </div>
                                <div x-show="notif.trend" class="flex items-center gap-1.5 text-[9px] font-black" :class="notif.trend.includes('+') ? 'text-emerald-600' : 'text-rose-500'">
                                    <span class="material-symbols-outlined text-[16px]" x-text="notif.trend.includes('+') ? 'trending_up' : 'trending_down'"></span>
                                    <span x-text="notif.trend"></span>
                                </div>
                                <div x-show="notif.auction" class="hidden sm:flex items-center gap-2 px-3 py-1 bg-amber-50 border border-amber-100 rounded-xl">
                                    <span class="material-symbols-outlined text-[14px] text-amber-600 animate-pulse">timer</span>
                                    <span class="text-[9px] font-black text-amber-700 uppercase" x-text="notif.auction"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Actions Right -->
                        <div class="flex items-center gap-3 shrink-0 w-full md:w-auto justify-between md:justify-end border-t md:border-t-0 pt-4 md:pt-0">
                            <div class="flex items-center gap-2">
                                <button @click="toggleRead(notif)" class="w-10 h-10 bg-slate-50 border border-slate-200 rounded-xl text-slate-400 hover:text-emerald-600 hover:border-emerald-500 hover:bg-white transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]" x-text="notif.read ? 'mark_chat_unread' : 'done_all'"></span>
                                </button>
                                <button @click="archiveNotif(notif)" class="w-10 h-10 bg-slate-50 border border-slate-200 rounded-xl text-slate-400 hover:text-rose-500 hover:border-rose-500 hover:bg-white transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">archive</span>
                                </button>
                            </div>
                            <button class="px-6 py-3 bg-slate-900 text-white rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-emerald-600 shadow-lg shadow-slate-900/10 hover:shadow-emerald-600/20 transition-all">Intel Suite</button>
                        </div>
                    </div>
                </template>

                <!-- Empty State -->
                <div x-show="filteredNotifications.length === 0" class="flex flex-col items-center justify-center py-32 space-y-8 animate-fadeIn">
                    <div class="w-32 h-32 bg-slate-100 rounded-[40px] flex items-center justify-center relative shadow-inner">
                        <span class="material-symbols-outlined text-[60px] text-slate-200">notifications_paused</span>
                        <div class="absolute inset-0 bg-emerald-500/5 rounded-full blur-[60px] animate-pulse"></div>
                    </div>
                    <div class="text-center space-y-2">
                        <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Ops Center Synchronizing.</h3>
                        <p class="text-slate-500 font-medium max-w-sm mx-auto leading-relaxed text-sm">Monitoring national mandi data and tender portals. New intelligence blocks will appear here momentarily.</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('marketplace') }}" class="px-10 py-5 bg-emerald-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-emerald-600/20 hover:bg-emerald-700 transition-all">Explore Exchange</a>
                        <button @click="generateDemoNotif()" class="px-10 py-5 bg-white border border-slate-200 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all">Simulate Feed</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- 🍞 TOAST STACKING SYSTEM -->
    <div class="fixed bottom-8 right-8 z-[200] flex flex-col gap-4 pointer-events-none w-full max-w-xs sm:max-w-md">
        <template x-for="toast in toasts" :key="toast.id">
            <div class="bg-slate-900 text-white p-6 rounded-3xl shadow-[0_30px_70px_rgba(0,0,0,0.4)] flex items-center gap-6 border border-white/10 animate-slideIn backdrop-blur-xl pointer-events-auto">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-lg shrink-0" :class="getIconBg(toast.priority)">
                    <span class="material-symbols-outlined text-[20px]" x-text="toast.icon"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-[9px] font-black text-emerald-500 uppercase tracking-widest mb-1" x-text="toast.category"></p>
                    <p class="text-[14px] font-black tracking-tight truncate" x-text="toast.title"></p>
                </div>
                <button @click="removeToast(toast.id)" class="w-8 h-8 flex items-center justify-center text-slate-500 hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
        </template>
    </div>
</div>

@push('scripts')
<script>
function notificationEnterpriseEngine() {
    return {
        currentCategory: 'all',
        lastUpdate: new Date(),
        lastUpdateText: 'Last Sync: Just Now',
        categories: [
            { id: 'all', label: 'All Intel', icon: 'all_inclusive', count: 0 },
            { id: 'marketplace', label: 'Market', icon: 'storefront', count: 0 },
            { id: 'bidding', label: 'Auctions', icon: 'gavel', count: 0 },
            { id: 'government', label: 'Gov Alerts', icon: 'account_balance', count: 0 },
            { id: 'orders', label: 'Orders', icon: 'shopping_bag', count: 0 },
            { id: 'logistics', label: 'Logistics', icon: 'local_shipping', count: 0 }
        ],
        activeFeeds: [
            { name: 'Mandi-Sync', online: true },
            { name: 'Gov-AI Audit', online: true },
            { name: 'Logistics Radar', online: true }
        ],
        summaryStats: [
            { label: 'Unread Intel', value: '12', trend: '▲ High', icon: 'mark_unread_chat_alt', pulse: true },
            { label: 'Active Bids', value: '08', trend: 'Live', icon: 'gavel', pulse: true },
            { label: 'Market Events', value: '245', trend: 'Today', icon: 'trending_up' },
            { label: 'Gov Tenders', value: '14', trend: 'Open', icon: 'contract' },
            { label: 'Procurement Gap', value: '₹4.2Cr', trend: 'Pending', icon: 'payments' },
            { label: 'System Uptime', value: '100%', trend: 'Verified', icon: 'verified' }
        ],
        tickerAlerts: [
            { id: 1, tag: 'MARKET ALERT', message: 'Wheat demand increased by 12% in North India clusters. Payout velocity stable.' },
            { id: 2, tag: 'GOVT ORDER', message: 'Ministry released new procurement mandate for Paddy (Grade A) in Punjab.' },
            { id: 3, tag: 'PRICE PULSE', message: 'Cotton auction closing in 15 minutes at Rajkot Hub. Current premium +₹140.' },
            { id: 4, tag: 'LOGISTICS', message: 'New optimized route discovered for Karnal-Ludhiana corridor.' }
        ],
        notifications: [
            { id: 1, priority: 'Critical', category: 'Government', title: 'MSP Payout Released', message: 'Ministry of Agriculture has released the MSP payout for your last Wheat lot. Verification SHA-256: 9E2...A4B1.', time: '2m ago', icon: 'payments', crop: 'Wheat', trend: '₹2,475/Q', read: false },
            { id: 2, priority: 'High', category: 'Bidding', title: 'Outbid Alert: Punjab Rice', message: 'Raj Traders has placed a ₹4,850 bid, exceeding your current offer. Immediate response required.', time: '5m ago', icon: 'gavel', crop: 'Basmati Rice', auction: '03:42 REMAINING', read: false },
            { id: 3, priority: 'Medium', category: 'Marketplace', title: 'Demand Volatility High', message: 'Sudden demand spike in Maharashtra for Onions. Market intelligence suggests +8.4% increase.', time: '12m ago', icon: 'trending_up', crop: 'Onions', trend: '+8.4%', read: true },
            { id: 4, priority: 'High', category: 'Logistics', title: 'Truck Verification Success', message: 'Logistics partner "AgriMove" has verified the vehicle at Karnal Hub. Loading active.', time: '45m ago', icon: 'local_shipping', crop: 'Maize', read: false },
            { id: 5, priority: 'Low', category: 'System', title: 'Quality Passport Generated', message: 'Digital Quality Passport (DQP) generated for your last transaction. Stored on-chain.', time: '2h ago', icon: 'verified', read: true }
        ],
        toasts: [],

        init() {
            this.updateCounts();
            setInterval(() => {
                this.generateLiveNotif();
                this.lastUpdateText = 'Sync: Just Now';
            }, 10000);
        },

        updateCounts() {
            this.categories.forEach(cat => {
                if(cat.id === 'all') {
                    cat.count = this.notifications.filter(n => !n.read).length;
                } else {
                    cat.count = this.notifications.filter(n => n.category.toLowerCase() === cat.id && !n.read).length;
                }
            });
            this.summaryStats[0].value = this.notifications.filter(n => !n.read).length.toString().padStart(2, '0');
        },

        get filteredNotifications() {
            let filtered = this.notifications;
            if (this.currentCategory !== 'all') {
                filtered = filtered.filter(n => n.category.toLowerCase() === this.currentCategory);
            }
            return filtered;
        },

        toggleRead(notif) {
            notif.read = !notif.read;
            this.updateCounts();
        },

        markAllAsRead() {
            this.notifications.forEach(n => n.read = true);
            this.updateCounts();
            this.addToast('SYSTEM', 'All intelligence blocks marked as read.', 'Low', 'done_all');
        },

        archiveNotif(notif) {
            this.notifications = this.notifications.filter(n => n.id !== notif.id);
            this.updateCounts();
            this.addToast('STORAGE', 'Notification moved to secure archive.', 'Low', 'archive');
        },

        getIconBg(priority) {
            switch(priority) {
                case 'Critical': return 'bg-rose-600';
                case 'High': return 'bg-amber-500';
                case 'Medium': return 'bg-emerald-600';
                case 'Low': return 'bg-slate-500';
                default: return 'bg-slate-400';
            }
        },

        getPriorityColor(priority) {
            switch(priority) {
                case 'Critical': return 'text-rose-600';
                case 'High': return 'text-amber-600';
                case 'Medium': return 'text-emerald-600';
                case 'Low': return 'text-slate-500';
                default: return 'text-slate-400';
            }
        },

        generateLiveNotif() {
            const events = [
                { priority: 'High', category: 'Marketplace', title: 'Direct Bid: Soybean', message: 'Industrial buyer from Indore placed a ₹4,250 bid on your harvest lot.', icon: 'storefront', crop: 'Soybean', trend: '+₹120' },
                { priority: 'Medium', category: 'Government', title: 'Procurement Verified', message: 'Govt Hub #112 Ludhiana is now verified and processing arrivals.', icon: 'account_balance', crop: 'Cotton' },
                { priority: 'Critical', category: 'Bidding', title: 'Auction Alert: Wheat', message: 'A new high bid has been placed. Final round countdown active.', icon: 'gavel', crop: 'Wheat', auction: '04:00 REMAINING' },
                { priority: 'Low', category: 'Logistics', title: 'Route Sync Success', message: 'New logistics path available for your harvest delivery.', icon: 'local_shipping' }
            ];
            const event = events[Math.floor(Math.random() * events.length)];
            const newNotif = { id: Date.now(), ...event, time: 'Just Now', read: false };
            this.notifications.unshift(newNotif);
            this.updateCounts();
            this.addToast(event.category.toUpperCase(), event.title, event.priority, event.icon);
        },

        generateDemoNotif() {
            this.generateLiveNotif();
        },

        addToast(category, title, priority, icon) {
            const id = Date.now();
            this.toasts.push({ id, category, title, priority, icon });
            setTimeout(() => this.removeToast(id), 6000);
        },

        removeToast(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }
}
</script>
<style>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 70s linear infinite;
    display: flex;
    width: max-content;
}
.hover\:pause:hover {
    animation-play-state: paused;
}
@keyframes slideIn {
    from { opacity: 0; transform: translateY(25px); scale: 0.98; }
    to { opacity: 1; transform: translateY(0); scale: 1; }
}
.animate-slideIn {
    animation: slideIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
.animate-fadeIn {
    animation: fadeIn 0.8s ease-out forwards;
}
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
@endpush
@endsection