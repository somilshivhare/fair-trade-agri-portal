<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AgriMandi India') - Fair Trade Agricultural Marketplace</title>
    <meta name="description" content="@yield('meta_description', 'AgriMandi India - Connect farmers directly with buyers. Fair prices, verified quality.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Noto+Sans+Devanagari:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --green-50: #f0fdf4; --green-100: #dcfce7; --green-500: #22c55e;
            --green-600: #16a34a; --green-700: #15803d; --green-800: #166534;
            --amber-400: #fbbf24; --amber-500: #f59e0b;
            --orange-500: #f97316; --red-500: #ef4444;
            --slate-50: #f8fafc; --slate-100: #f1f5f9; --slate-200: #e2e8f0;
            --slate-600: #475569; --slate-700: #334155; --slate-800: #1e293b;
            --white: #ffffff; --radius: 12px; --shadow: 0 1px 3px rgba(0,0,0,.1);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,.1);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--slate-50); color: var(--slate-800); line-height: 1.6; }
        a { text-decoration: none; color: inherit; }
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer; border: none; transition: all .2s; }
        .btn-primary { background: var(--green-600); color: #fff; }
        .btn-primary:hover { background: var(--green-700); transform: translateY(-1px); }
        .btn-outline { background: transparent; border: 2px solid var(--green-600); color: var(--green-600); }
        .btn-outline:hover { background: var(--green-50); }
        .btn-danger { background: var(--red-500); color: #fff; }
        .card { background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow); padding: 20px; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
        .badge-green  { background: var(--green-100); color: var(--green-700); }
        .badge-amber  { background: #fffbeb; color: #92400e; }
        .badge-red    { background: #fef2f2; color: #991b1b; }
        .badge-slate  { background: var(--slate-100); color: var(--slate-600); }
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
        .alert-success { background: var(--green-100); color: var(--green-700); border-left: 4px solid var(--green-500); }
        .alert-error   { background: #fef2f2; color: #991b1b; border-left: 4px solid var(--red-500); }
        .alert-info    { background: #eff6ff; color: #1e40af; border-left: 4px solid #3b82f6; }

        /* ── Navbar ── */
        .navbar { background: var(--white); border-bottom: 1px solid var(--slate-200); padding: 0 24px; height: 64px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 100; box-shadow: var(--shadow); }
        .navbar-brand { display: flex; align-items: center; gap: 10px; font-weight: 800; font-size: 20px; color: var(--green-700); }
        .navbar-brand span { font-size: 28px; }
        .navbar-nav { display: flex; align-items: center; gap: 8px; }
        .nav-link { padding: 8px 14px; border-radius: 8px; font-size: 14px; font-weight: 500; color: var(--slate-600); transition: all .2s; }
        .nav-link:hover, .nav-link.active { background: var(--green-50); color: var(--green-700); }
        .notif-bell { position: relative; padding: 8px; }
        .notif-badge { position: absolute; top: 4px; right: 4px; background: var(--red-500); color: #fff; font-size: 10px; font-weight: 700; border-radius: 999px; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; }

        /* ── Sidebar layout ── */
        .layout { display: flex; min-height: calc(100vh - 64px); }
        .sidebar { width: 240px; background: var(--white); border-right: 1px solid var(--slate-200); padding: 20px 12px; flex-shrink: 0; }
        .sidebar-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 8px; font-size: 14px; font-weight: 500; color: var(--slate-600); margin-bottom: 2px; transition: all .2s; }
        .sidebar-item:hover, .sidebar-item.active { background: var(--green-50); color: var(--green-700); }
        .sidebar-item .icon { font-size: 18px; width: 24px; text-align: center; }
        .main-content { flex: 1; padding: 28px; overflow-y: auto; }

        /* ── Market ticker ── */
        .ticker-wrap { background: var(--green-700); color: #fff; padding: 8px 0; overflow: hidden; }
        .ticker-content { display: flex; gap: 40px; animation: ticker 30s linear infinite; white-space: nowrap; }
        .ticker-item { display: flex; align-items: center; gap: 6px; font-size: 13px; font-weight: 500; }
        .ticker-item .up { color: #86efac; }
        .ticker-item .down { color: #fca5a5; }
        @keyframes ticker { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

        /* ── Tables ── */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { background: var(--slate-50); padding: 12px 16px; text-align: left; font-weight: 600; color: var(--slate-600); border-bottom: 1px solid var(--slate-200); }
        td { padding: 14px 16px; border-bottom: 1px solid var(--slate-100); vertical-align: middle; }
        tr:hover td { background: var(--slate-50); }

        /* ── Forms ── */
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 14px; font-weight: 600; color: var(--slate-700); margin-bottom: 6px; }
        input, select, textarea { width: 100%; padding: 10px 14px; border: 1.5px solid var(--slate-200); border-radius: 8px; font-size: 14px; font-family: inherit; transition: border-color .2s; background: var(--white); }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--green-500); box-shadow: 0 0 0 3px rgba(34,197,94,.15); }
        .form-error { color: var(--red-500); font-size: 12px; margin-top: 4px; }

        /* ── Stat cards ── */
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 28px; }
        .stat-card { background: var(--white); border-radius: var(--radius); padding: 20px; box-shadow: var(--shadow); border-left: 4px solid var(--green-500); }
        .stat-card .label { font-size: 13px; color: var(--slate-600); font-weight: 500; }
        .stat-card .value { font-size: 28px; font-weight: 800; color: var(--slate-800); margin-top: 4px; }

        /* ── Page header ── */
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
        .page-header h1 { font-size: 24px; font-weight: 800; color: var(--slate-800); }
        .page-header p { font-size: 14px; color: var(--slate-600); margin-top: 2px; }

        /* ── Pagination ── */
        .pagination { display: flex; gap: 6px; justify-content: center; margin-top: 24px; }
        .page-link { padding: 8px 14px; border-radius: 8px; border: 1.5px solid var(--slate-200); color: var(--slate-600); font-size: 14px; font-weight: 500; transition: all .2s; cursor: pointer; }
        .page-link:hover, .page-link.active { background: var(--green-600); color: #fff; border-color: var(--green-600); }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .stat-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- ── Market Price Ticker ── --}}
@if(isset($marketPrices) && count($marketPrices) > 0)
<div class="ticker-wrap">
    <div class="ticker-content">
        @foreach($marketPrices as $price)
            <div class="ticker-item">
                🌾 {{ is_array($price) ? $price['commodity'] : $price->commodity }}
                <strong>₹{{ number_format(is_array($price) ? $price['modal_price'] : $price->modal_price) }}</strong>
                @if((is_array($price) ? ($price['trend'] ?? 'up') : 'up') === 'up')
                    <span class="up">↑</span>
                @else
                    <span class="down">↓</span>
                @endif
            </div>
        @endforeach
        {{-- duplicate for seamless loop --}}
        @foreach($marketPrices as $price)
            <div class="ticker-item">
                🌾 {{ is_array($price) ? $price['commodity'] : $price->commodity }}
                <strong>₹{{ number_format(is_array($price) ? $price['modal_price'] : $price->modal_price) }}</strong>
            </div>
        @endforeach
    </div>
</div>
@endif

{{-- ── Navbar ── --}}
<nav class="navbar">
    <a href="{{ route('home') }}" class="navbar-brand">
        <span>🌿</span> AgriMandi
    </a>
    <div class="navbar-nav">
        <a href="{{ route('marketplace') }}" class="nav-link {{ request()->routeIs('marketplace') ? 'active' : '' }}">Marketplace</a>
        @guest
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
        @endguest
        @auth
            @if(auth()->user()->isFarmer())
                <a href="{{ route('farmer.dashboard') }}" class="nav-link {{ request()->routeIs('farmer.*') ? 'active' : '' }}">Dashboard</a>
            @endif
            <a href="{{ route('notifications') }}" class="nav-link notif-bell">
                🔔
                @if(($unreadNotifCount ?? 0) > 0)
                    <span class="notif-badge">{{ $unreadNotifCount }}</span>
                @endif
            </a>
            <a href="{{ route('profile') }}" class="nav-link">{{ auth()->user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf <button type="submit" class="btn btn-outline" style="padding:8px 16px;">Logout</button>
            </form>
        @endauth
    </div>
</nav>

{{-- ── Flash Messages ── --}}
<div style="padding: 0 24px; margin-top: 8px;">
    @if(session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">❌ {{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">ℹ️ {{ session('info') }}</div>
    @endif
</div>

@yield('content')

@stack('scripts')
<script>
// CSRF setup for AJAX
document.addEventListener('DOMContentLoaded', () => {
    const token = document.querySelector('meta[name="csrf-token"]')?.content;
    window.csrfToken = token;
});
</script>
</body>
</html>
