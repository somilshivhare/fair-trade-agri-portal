<aside class="sidebar">
    <div style="padding:8px 0 16px;margin-bottom:8px;border-bottom:1px solid #e2e8f0;">
        <div style="font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.8px;padding:0 14px;">Buyer Menu</div>
    </div>
    @php $route = request()->route()->getName(); @endphp
    <a href="{{ route('marketplace') }}" class="sidebar-item {{ $route==='marketplace' ? 'active' : '' }}"><span class="icon">🏪</span> Marketplace</a>
    <a href="{{ route('buyer.my-bids') }}" class="sidebar-item {{ str_starts_with($route,'buyer.my') ? 'active' : '' }}"><span class="icon">💬</span> My Bids</a>
    <a href="{{ route('buyer.orders') }}" class="sidebar-item {{ str_starts_with($route,'buyer.orders') ? 'active' : '' }}"><span class="icon">📦</span> My Orders</a>
    <div style="border-top:1px solid #e2e8f0;margin:12px 0;padding-top:12px;">
        <a href="{{ route('notifications') }}" class="sidebar-item"><span class="icon">🔔</span> Notifications</a>
        <a href="{{ route('profile') }}" class="sidebar-item"><span class="icon">👤</span> Profile</a>
    </div>
</aside>
