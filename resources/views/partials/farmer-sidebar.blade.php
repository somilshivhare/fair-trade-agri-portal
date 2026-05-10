<aside class="sidebar">
    <div style="padding:8px 0 16px;margin-bottom:8px;border-bottom:1px solid #e2e8f0;">
        <div style="font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.8px;padding:0 14px;">Farmer Menu</div>
    </div>
    @php $route = request()->route()->getName(); @endphp
    <a href="{{ route('farmer.dashboard') }}" class="sidebar-item {{ str_starts_with($route,'farmer.dashboard') ? 'active' : '' }}">
        <span class="icon">🏠</span> Dashboard
    </a>
    <a href="{{ route('farmer.products') }}" class="sidebar-item {{ str_starts_with($route,'farmer.products') ? 'active' : '' }}">
        <span class="icon">📦</span> My Products
    </a>
    <a href="{{ route('farmer.products.add') }}" class="sidebar-item {{ $route==='farmer.products.add' ? 'active' : '' }}">
        <span class="icon">➕</span> Add Product
    </a>
    <a href="{{ route('farmer.bids') }}" class="sidebar-item {{ str_starts_with($route,'farmer.bids') ? 'active' : '' }}">
        <span class="icon">📨</span> Received Bids
        @php $pendingCount = \App\Models\Bid::where('farmer_id', auth()->id())->pending()->count(); @endphp
        @if($pendingCount > 0)<span style="background:#ef4444;color:#fff;border-radius:999px;font-size:11px;font-weight:700;padding:2px 7px;margin-left:auto;">{{ $pendingCount }}</span>@endif
    </a>
    <a href="{{ route('farmer.orders') }}" class="sidebar-item {{ str_starts_with($route,'farmer.orders') ? 'active' : '' }}">
        <span class="icon">🚚</span> Orders
    </a>
    <div style="border-top:1px solid #e2e8f0;margin:12px 0;padding-top:12px;">
        <a href="{{ route('notifications') }}" class="sidebar-item"><span class="icon">🔔</span> Notifications</a>
        <a href="{{ route('profile') }}" class="sidebar-item"><span class="icon">👤</span> Profile</a>
    </div>
</aside>
