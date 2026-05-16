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
        $marketPrices = MarketPrice::today()->get();
        if ($marketPrices->isEmpty()) {
            $marketPrices = collect(MarketPrice::fallbackPrices())->map(fn($p) => (object) $p);
        }
        $stats = [
            'farmers' => User::farmer()->count(),
            'buyers' => User::buyer()->count(),
            'products' => Product::available()->count(),
        ];
        return view('pages.home', compact('featuredProducts', 'marketPrices', 'stats'));
    }

    public function notifications(Request $request)
    {
        $query = Notification::forUser(Auth::id())->latest();

        if ($request->has('filter')) {
            $filter = $request->filter;
            if ($filter === 'orders') {
                $query->whereIn('type', ['order_confirmed', 'order_shipped', 'out_for_delivery', 'order_delivered']);
            } elseif ($filter === 'bidding') {
                $query->whereIn('type', ['new_bid', 'bid_accepted', 'bid_rejected', 'counter_offer']);
            } elseif ($filter === 'marketplace') {
                $query->whereIn('type', ['match_found', 'offer_expiring']);
            } elseif ($filter === 'government') {
                $query->where('type', 'government_alert');
            }
        }

        $notifs = $query->paginate(30);
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
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'state' => 'nullable|string',
            'district' => 'nullable|string',
            'pincode' => 'nullable|string',
            'address' => 'nullable|string|max:500',
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



    public function categories()
    {
        $categories = [
            [
                'title' => 'Cereals',
                'id' => 'cereals',
                'icon' => 'bakery_dining',
                'images' => [
                    'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?auto=format&fit=crop&q=80&w=800', // Wheat Grains
                    'https://images.unsplash.com/photo-1586201327693-866199f141ae?auto=format&fit=crop&q=80&w=800', // Rice Grains
                    'https://images.unsplash.com/photo-1551754655-cd27e38d2076?auto=format&fit=crop&q=80&w=800', // Corn/Maize Kernels
                    'https://images.unsplash.com/photo-1534067783941-51c9c23ecefd?auto=format&fit=crop&q=80&w=800'  // Barley/Grains in bowl
                ],
                'crops' => ['Wheat', 'Rice (Paddy)', 'Maize (Corn)', 'Barley', 'Jowar (Sorghum)', 'Bajra (Pearl Millet)', 'Ragi (Finger Millet)', 'Oats', 'Buckwheat']
            ],
            [
                'title' => 'Pulses',
                'id' => 'pulses',
                'icon' => 'eco',
                'images' => [
                    'https://images.unsplash.com/photo-1515942400420-2b98fed1f515?auto=format&fit=crop&q=80&w=800', // Chickpeas (Chana)
                    'https://images.unsplash.com/photo-1546833998-877b37c2e5c6?auto=format&fit=crop&q=80&w=800', // Tur/Arhar Dal
                    'https://images.unsplash.com/photo-1585996838222-2a6644f6c547?auto=format&fit=crop&q=80&w=800', // Moong/Green Gram
                    'https://images.unsplash.com/photo-1551462147-ff29053bfc14?auto=format&fit=crop&q=80&w=800'  // Rajma/Kidney Beans
                ],
                'crops' => ['Gram (Chana)', 'Tur (Arhar)', 'Urad Dal', 'Moong Dal', 'Masoor Dal', 'Peas', 'Soybean', 'Rajma (Kidney Beans)', 'Cowpea (Lobia)']
            ],
            [
                'title' => 'Oilseeds',
                'id' => 'oilseeds',
                'icon' => 'opacity',
                'images' => [
                    'https://images.unsplash.com/photo-1628102491629-7785c1d89163?auto=format&fit=crop&q=80&w=800', // Groundnuts
                    'https://images.unsplash.com/photo-1473773508845-188df298d2d1?auto=format&fit=crop&q=80&w=800', // Mustard/Rapeseed fields
                    'https://images.unsplash.com/photo-1597423498219-04418210827d?auto=format&fit=crop&q=80&w=800', // Sunflower
                    'https://images.unsplash.com/photo-1536620239035-6177fc4064f9?auto=format&fit=crop&q=80&w=800'  // Sesame Seeds
                ],
                'crops' => ['Groundnut', 'Mustard', 'Soyabean', 'Sunflower', 'Sesame (Til)', 'Linseed', 'Castor', 'Safflower', 'Niger Seed']
            ],
            [
                'title' => 'Cash Crops',
                'id' => 'cash-crops',
                'icon' => 'payments',
                'images' => [
                    'https://images.unsplash.com/photo-1594488339316-24e54823812d?auto=format&fit=crop&q=80&w=800', // Cotton fields
                    'https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?auto=format&fit=crop&q=80&w=800', // Sugarcane
                    'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&q=80&w=800', // Coffee Beans
                    'https://images.unsplash.com/photo-1544739313-6fad02872377?auto=format&fit=crop&q=80&w=800'  // Tea Plantation
                ],
                'crops' => ['Cotton', 'Sugarcane', 'Jute', 'Tobacco', 'Tea', 'Coffee', 'Rubber', 'Cocoa', 'Arecanut']
            ],
            [
                'title' => 'Spices',
                'id' => 'spices',
                'icon' => 'soup_kitchen',
                'images' => [
                    'https://images.unsplash.com/photo-1615485242220-7f02d447d692?auto=format&fit=crop&q=80&w=800', // Turmeric
                    'https://images.unsplash.com/photo-1599481238640-4c1288750d7a?auto=format&fit=crop&q=80&w=800', // Chillies
                    'https://images.unsplash.com/photo-1599020792689-9fde458e7717?auto=format&fit=crop&q=80&w=800', // Ginger
                    'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?auto=format&fit=crop&q=80&w=800'  // Garlic & Spices
                ],
                'crops' => ['Turmeric', 'Chilli (Red/Green)', 'Ginger', 'Garlic', 'Cardamom', 'Black Pepper', 'Cumin (Jeera)', 'Coriander (Dhania)', 'Fennel (Saunf)', 'Fenugreek (Methi)', 'Cloves', 'Cinnamon']
            ],
            [
                'title' => 'Fruits',
                'id' => 'fruits',
                'icon' => 'nutrition',
                'images' => [
                    'https://images.unsplash.com/photo-1610832958506-aa56368176cf?auto=format&fit=crop&q=80&w=800', // Tropical Fruits
                    'https://images.unsplash.com/photo-1557800636-894a64c1696f?auto=format&fit=crop&q=80&w=800', // Orange/Citrus
                    'https://images.unsplash.com/photo-1591073113125-e46713c829ed?auto=format&fit=crop&q=80&w=800'  // Mango/Seasonal
                ],
                'crops' => ['Mango', 'Banana', 'Apple', 'Grapes', 'Orange', 'Papaya', 'Guava', 'Pineapple', 'Pomegranate', 'Watermelon', 'Lemon/Lime', 'Strawberry', 'Litchi']
            ],
            [
                'title' => 'Vegetables',
                'id' => 'vegetables',
                'icon' => 'restaurant',
                'images' => [
                    'https://images.unsplash.com/photo-1566385101042-1a000c1268c4?auto=format&fit=crop&q=80&w=800', // Fresh Veg
                    'https://images.unsplash.com/photo-1597362868123-a55d3951f926?auto=format&fit=crop&q=80&w=800', // Onion/Tomato
                    'https://images.unsplash.com/photo-1464226184884-fa280b67c35e?auto=format&fit=crop&q=80&w=800'  // Root Veg
                ],
                'crops' => ['Potato', 'Onion', 'Tomato', 'Brinjal', 'Cauliflower', 'Cabbage', 'Okra (Ladyfinger)', 'Spinach', 'Carrot', 'Radish', 'Pumpkin', 'Bottle Gourd', 'Bitter Gourd', 'Capsicum']
            ],
            [
                'title' => 'Plantation & Others',
                'id' => 'plantation',
                'icon' => 'forest',
                'images' => [
                    'https://images.unsplash.com/photo-1559181567-c3190ca9959b?auto=format&fit=crop&q=80&w=800', // Coconut/Palm
                    'https://images.unsplash.com/photo-1596492784531-6e6eb5ea9993?auto=format&fit=crop&q=80&w=800'  // Honey/Cashew
                ],
                'crops' => ['Coconut', 'Cashew', 'Palm Oil', 'Medicinal Plants', 'Flowers (Floriculture)', 'Mushrooms', 'Honey', 'Silkworm (Sericulture)']
            ]
        ];
        return view('pages.categories', compact('categories'));
    }

    public function analytics()
    {
        return view('pages.analytics');
    }

    public function resources()
    {
        return view('pages.resources');
    }

    public function subsidies()
    {
        return view('pages.subsidies');
    }
}
