<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Define the predefined crop list exactly as requested
    public static $predefinedCrops = [
        'Grains' => ['Wheat', 'Rice', 'Maize', 'Barley', 'Jowar', 'Bajra', 'Ragi'],
        'Vegetables' => ['Tomato', 'Potato', 'Onion', 'Cabbage', 'Cauliflower', 'Brinjal', 'Okra', 'Carrot', 'Spinach', 'Peas'],
        'Fruits' => ['Mango', 'Banana', 'Apple', 'Orange', 'Grapes', 'Papaya', 'Guava', 'Pomegranate'],
        'Pulses' => ['Arhar', 'Moong', 'Urad', 'Chana', 'Masoor']
    ];

    public function index(Request $request)
    {
        $query = Product::where('status', 'active');

        if ($request->filled('category')) {
            $categoryCrops = self::$predefinedCrops[$request->category] ?? [];
            // Map items to lowercase or exact string
            $query->whereIn('crop_name', $categoryCrops);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('crop_name', 'like', '%' . $search . '%');
        }

        $products = $query->with('farmer')->orderBy('_id', 'desc')->get();
        $categories = self::$predefinedCrops;

        return view('home', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with(['farmer', 'bids.buyer'])->findOrFail($id);
        
        // Find if user already has an active bid on this product
        $userBid = null;
        if (Auth::check()) {
            $userBid = $product->bids()->where('buyer_id', Auth::id())->orderBy('_id', 'desc')->first();
        }

        return view('products.show', compact('product', 'userBid'));
    }

    public function store(Request $request)
    {
        // Only farmers can add products
        if (Auth::user()->role !== 'farmer') {
            return redirect()->back()->with('error', 'Only farmers can list products.');
        }

        // Get flat list of all predefined crops (case insensitive check, but we keep casing clean)
        $allCrops = [];
        foreach (self::$predefinedCrops as $category => $crops) {
            $allCrops = array_merge($allCrops, $crops);
        }

        $request->validate([
            'crop_name' => 'required|string|in:' . implode(',', $allCrops),
            'quantity' => 'required|numeric|min:0.01',
            'base_price' => 'required|numeric|min:1',
            'location' => 'required|string|max:255',
        ]);

        Product::create([
            'crop_name' => $request->crop_name,
            'quantity' => floatval($request->quantity),
            'base_price' => floatval($request->base_price),
            'location' => $request->location,
            'user_id' => Auth::id(),
            'status' => 'active',
        ]);

        return redirect()->route('dashboard')->with('success', 'Product listed successfully!');
    }
}
