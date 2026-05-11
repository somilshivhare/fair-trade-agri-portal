<?php

namespace App\Http\Controllers;

use App\Models\{MarketPrice, Notification, Product, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::available()->with('farmer')->latest()->take(6)->get();
        $marketPrices = MarketPrice::today()->get()->isEmpty()
                        ? collect(MarketPrice::fallbackPrices())
                        : MarketPrice::today()->get();
        $stats = [
            'farmers'  => User::farmer()->count(),
            'buyers'   => User::buyer()->count(),
            'products' => Product::available()->count(),
        ];
        return view('pages.home', compact('featuredProducts', 'marketPrices', 'stats'));
    }

    public function notifications()
    {
        $notifs = Notification::forUser(Auth::id())->latest()->paginate(30);
        return view('pages.notifications', compact('notifs'));
    }

    public function markNotificationRead(string $id)
    {
        $n = Notification::findOrFail($id);
        abort_unless($n->user_id === Auth::id(), 403);
        $n->markAsRead();
        return back();
    }

    public function markAllRead()
    {
        Notification::forUser(Auth::id())->unread()->update(['is_read' => true]);
        return back()->with('success', 'All notifications marked as read.');
    }

    public function profile()
    {
        return view('pages.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'phone'    => 'required|string|max:15',
            'state'    => 'nullable|string',
            'district' => 'nullable|string',
            'pincode'  => 'nullable|string',
            'address'  => 'nullable|string|max:500',
        ]);
        Auth::user()->update($data);
        return back()->with('success', 'Profile updated successfully.');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate(['avatar' => 'required|image|max:2048']);
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        Auth::user()->update(['avatar' => $path]);
        return back()->with('success', 'Profile photo updated.');
    }
}
