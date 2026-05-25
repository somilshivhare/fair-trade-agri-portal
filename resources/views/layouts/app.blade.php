<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AgriMandi') - Farmer to Buyer Bidding</title>
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .glass {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .dark-glass {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-emerald-50/20 to-teal-50/20 min-h-full flex flex-col text-slate-800 antialiased selection:bg-emerald-500 selection:text-white">

    @hasSection('no_header_footer')
    @else
    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 w-full border-b border-slate-200/50 glass transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform duration-300">
                            <!-- Wheat leaf icon SVG -->
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707.707M12 7a5 5 0 100 10 5 5 0 000-10z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-slate-900 to-emerald-800 bg-clip-text text-transparent">AgriMandi</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-600 transition-colors py-2 px-3 rounded-lg hover:bg-emerald-50/50">Dashboard</a>
                        
                        <!-- Notification Bell Button -->
                        <div class="relative" id="notificationDropdownContainer">
                            <button id="notificationBellBtn" class="relative p-2 text-slate-600 hover:text-emerald-600 hover:bg-emerald-50/50 rounded-xl transition-all duration-300 focus:outline-none">
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                                <span id="notificationBadge" class="hidden absolute top-1 right-1 flex h-2.5 w-2.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-500"></span>
                                </span>
                            </button>

                            <!-- Floating Notifications Panel -->
                            <div id="notificationDropdownMenu" class="hidden absolute right-0 mt-2 w-80 sm:w-96 rounded-2xl border border-slate-100 bg-white shadow-2xl ring-1 ring-black/5 focus:outline-none transition-all duration-300 origin-top-right scale-95 opacity-0">
                                <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                                    <h3 class="font-bold text-slate-800">Notifications</h3>
                                    <form action="{{ route('notifications.mark-all-read') }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 transition-colors">Mark all read</button>
                                    </form>
                                </div>
                                <div class="max-h-72 overflow-y-auto divide-y divide-slate-50" id="notificationItemsList">
                                    <!-- Dynamic Notification Items -->
                                    <div class="p-4 text-center text-sm text-slate-500 py-8">Loading notifications...</div>
                                </div>
                            </div>
                        </div>

                        <!-- User Profile Menu -->
                        <div class="flex items-center space-x-3 pl-3 border-l border-slate-200/60">
                            @if(Auth::user()->profile_image)
                                <img src="{{ Auth::user()->profile_image }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-xl object-cover ring-2 ring-emerald-500/20">
                            @else
                                <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-500 flex items-center justify-center text-white text-xs font-bold ring-2 ring-emerald-500/20">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                            @endif
                            <div class="hidden md:block">
                                <p class="text-xs font-bold text-slate-800 leading-tight">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] font-semibold text-emerald-600 uppercase tracking-wider">{{ Auth::user()->role }}</p>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-slate-400 hover:text-rose-600 p-1.5 rounded-lg hover:bg-rose-50/50 transition-all duration-200" title="Logout">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-600 transition-colors py-2 px-3">Log in</a>
                        <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-500/10 hover:shadow-emerald-500/20 py-2.5 px-4 rounded-xl transition-all duration-300 scale-100 hover:scale-102 active:scale-98">Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    @hasSection('no_header_footer')
    @else
    <!-- Premium Agricultural Footer -->
    <footer class="bg-[#1b2533] text-slate-400 border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                
                <!-- Branding/Summary -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 text-white">
                        <div class="w-9 h-9 rounded-xl bg-emerald-600 flex items-center justify-center shadow-md">
                            <!-- Outline Tractor SVG -->
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <circle cx="18.5" cy="17.5" r="2.5"></circle>
                                <circle cx="6.5" cy="17.5" r="1.5"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 17.5h8M14 8.5h3.5a1.5 1.5 0 011.5 1.5v3M4 17.5v-3a2 2 0 012-2h4M10 9.5H7.5a1 1 0 00-1 1v4M12 17.5V11a1 1 0 011-1h2a1 1 0 011 1v6.5M10.5 7.5L12 10"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold tracking-tight">AgriMandi</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed font-light">
                        Pioneering direct-to-buyer bidding platforms in India, ensuring digital fertile ground for every transaction.
                    </p>
                    <div class="flex items-center space-x-3 pt-2 text-slate-400">
                        <a href="#" class="p-2 rounded-xl bg-slate-800/40 hover:bg-slate-800 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9h18"/></svg>
                        </a>
                        <a href="#" class="p-2 rounded-xl bg-slate-800/40 hover:bg-slate-800 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 10.742l5.12-2.56a2 2 0 012.316.375l2.56 2.56a2 2 0 010 2.828l-2.56 2.56a2 2 0 01-2.316.375l-5.12-2.56a2 2 0 01-1.12-1.789v-1.789a2 2 0 011.12-1.789z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12V4M12 20v-8"/></svg>
                        </a>
                        <a href="#" class="p-2 rounded-xl bg-slate-800/40 hover:bg-slate-800 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Platform -->
                <div class="space-y-4">
                    <h4 class="text-xs font-extrabold uppercase text-slate-200 tracking-wider">Platform</h4>
                    <ul class="space-y-2 text-sm font-semibold">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Trade Rules</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Market Insights</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Fee Structure</a></li>
                    </ul>
                </div>

                <!-- Column 3: Legal -->
                <div class="space-y-4">
                    <h4 class="text-xs font-extrabold uppercase text-slate-200 tracking-wider">Legal</h4>
                    <ul class="space-y-2 text-sm font-semibold">
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Dispute Resolution</a></li>
                    </ul>
                </div>

                <!-- Column 4: Support -->
                <div class="space-y-4">
                    <h4 class="text-xs font-extrabold uppercase text-slate-200 tracking-wider">Support</h4>
                    <ul class="space-y-2 text-sm font-semibold">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Support</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">System Status</a></li>
                    </ul>
                </div>

            </div>

            <!-- Footer Divider and Credits row -->
            <div class="border-t border-slate-800/40 mt-16 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-bold text-slate-500 select-none">
                <span>&copy; {{ date('Y') }} AgriMandi. All rights reserved.</span>
                <span class="flex items-center gap-1.5 tracking-wider uppercase">
                    🛡️ SECURED BY MANDI PROTOCOL V2.4
                </span>
            </div>
        </div>
    </footer>
    @endif

    <!-- Toast Notifications (System Alerts) -->
    <div id="toastContainer" class="fixed bottom-5 right-5 z-50 flex flex-col space-y-3 max-w-sm w-full pointer-events-none">
        @if(session('success'))
            <div class="toast-item pointer-events-auto flex items-center p-4 bg-emerald-50 border border-emerald-100 text-slate-800 rounded-2xl shadow-xl transition-all duration-300 hover:scale-[1.02]">
                <div class="p-2 rounded-xl bg-emerald-500 text-white mr-3 flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div class="flex-grow text-sm font-semibold">{{ session('success') }}</div>
                <button onclick="this.parentElement.remove()" class="ml-4 text-slate-400 hover:text-slate-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
        @endif
        @if(session('error'))
            <div class="toast-item pointer-events-auto flex items-center p-4 bg-rose-50 border border-rose-100 text-slate-800 rounded-2xl shadow-xl transition-all duration-300 hover:scale-[1.02]">
                <div class="p-2 rounded-xl bg-rose-500 text-white mr-3 flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div class="flex-grow text-sm font-semibold">{{ session('error') }}</div>
                <button onclick="this.parentElement.remove()" class="ml-4 text-slate-400 hover:text-slate-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
        @endif
    </div>

    <!-- Notification & Echo Integration Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toast Auto-dismiss
            const toasts = document.querySelectorAll('.toast-item');
            toasts.forEach(toast => {
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => toast.remove(), 300);
                }, 5000);
            });

            @auth
                // Dropdown Navigation Toggles
                const bellBtn = document.getElementById('notificationBellBtn');
                const bellMenu = document.getElementById('notificationDropdownMenu');
                const bellBadge = document.getElementById('notificationBadge');
                const notificationList = document.getElementById('notificationItemsList');

                // Bell dropdown opening animation
                bellBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (bellMenu.classList.contains('hidden')) {
                        bellMenu.classList.remove('hidden');
                        setTimeout(() => {
                            bellMenu.classList.remove('scale-95', 'opacity-0');
                            bellMenu.classList.add('scale-100', 'opacity-100');
                        }, 50);
                        fetchNotifications();
                    } else {
                        closeNotificationsMenu();
                    }
                });

                document.addEventListener('click', function (e) {
                    if (!document.getElementById('notificationDropdownContainer').contains(e.target)) {
                        closeNotificationsMenu();
                    }
                });

                function closeNotificationsMenu() {
                    bellMenu.classList.remove('scale-100', 'opacity-100');
                    bellMenu.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        bellMenu.classList.add('hidden');
                    }, 200);
                }

                // Helper to create and show Toast Alert dynamically
                window.showToast = function(title, message, type = 'success') {
                    const toastContainer = document.getElementById('toastContainer');
                    const isSuccess = type === 'success';
                    const bgClass = isSuccess ? 'bg-emerald-50 border-emerald-100' : 'bg-rose-50 border-rose-100';
                    const iconColor = isSuccess ? 'bg-emerald-500' : 'bg-rose-500';
                    const iconSvg = isSuccess 
                        ? '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>'
                        : '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>';

                    const toast = document.createElement('div');
                    toast.className = `pointer-events-auto flex items-center p-4 ${bgClass} border text-slate-800 rounded-2xl shadow-xl transition-all duration-300 hover:scale-[1.02]`;
                    toast.innerHTML = `
                        <div class="p-2 rounded-xl ${iconColor} text-white mr-3 flex-shrink-0">${iconSvg}</div>
                        <div class="flex-grow text-sm font-semibold">
                            <p class="font-bold">${title}</p>
                            <p class="text-xs text-slate-500 mt-0.5">${message}</p>
                        </div>
                        <button onclick="this.parentElement.remove()" class="ml-4 text-slate-400 hover:text-slate-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    `;
                    toastContainer.appendChild(toast);
                    
                    // Auto-dismiss
                    setTimeout(() => {
                        toast.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => toast.remove(), 300);
                    }, 7000);
                };

                // Notification fetcher
                let unreadCount = 0;
                function fetchNotifications() {
                    fetch('{{ route("notifications.data") }}', {
                        headers: { 'Accept': 'application/json' }
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.length === 0) {
                                notificationList.innerHTML = '<div class="p-4 text-center text-sm text-slate-500 py-8">No notifications yet.</div>';
                                bellBadge.classList.add('hidden');
                                return;
                            }

                            unreadCount = data.filter(n => !n.read_at).length;
                            if (unreadCount > 0) {
                                bellBadge.classList.remove('hidden');
                            } else {
                                bellBadge.classList.add('hidden');
                            }

                            notificationList.innerHTML = data.map(n => {
                                const isRead = !!n.read_at;
                                const readBg = isRead ? 'bg-white' : 'bg-emerald-50/45 hover:bg-emerald-50/70 border-l-4 border-emerald-500';
                                return `
                                    <a href="/notifications/${n.id}/read" class="block p-4 ${readBg} transition-all duration-200">
                                        <div class="flex justify-between items-start">
                                            <p class="text-sm font-bold text-slate-800">${n.title}</p>
                                            <span class="text-[10px] text-slate-400">${new Date(n.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
                                        </div>
                                        <p class="text-xs text-slate-600 mt-1">${n.message}</p>
                                    </a>
                                `;
                            }).join('');
                        });
                }

                // Check notifications initially & poll every 10 seconds
                fetchNotifications();
                setInterval(fetchNotifications, 10000);

                // Local dynamic polling/event notification for rich presentation
                let lastConfirmedNotificationCount = -1;
                function checkNewAlertsForToast() {
                    fetch('{{ route("notifications.data") }}', {
                        headers: { 'Accept': 'application/json' }
                    })
                        .then(res => res.json())
                        .then(data => {
                            const currentUnread = data.filter(n => !n.read_at);
                            if (lastConfirmedNotificationCount === -1) {
                                lastConfirmedNotificationCount = currentUnread.length;
                                return;
                            }
                            if (currentUnread.length > lastConfirmedNotificationCount) {
                                // Trigger Toast for the newest unread notifications
                                const diff = currentUnread.length - lastConfirmedNotificationCount;
                                for (let i = 0; i < diff; i++) {
                                    const newAlert = currentUnread[i];
                                    if (newAlert) {
                                        showToast(newAlert.title, newAlert.message, 'success');
                                        // Play visual ding/highlight
                                        bellBtn.classList.add('animate-bounce');
                                        setTimeout(() => bellBtn.classList.remove('animate-bounce'), 1000);
                                    }
                                }
                                fetchNotifications();
                            }
                            lastConfirmedNotificationCount = currentUnread.length;
                        });
                }
                setInterval(checkNewAlertsForToast, 4000);
            @endauth
        });
    </script>
</body>
</html>
