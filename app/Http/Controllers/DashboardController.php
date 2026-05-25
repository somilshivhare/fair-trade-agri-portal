<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Bid;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Redirect to profile setup if not completed yet
        if (!$user->is_profile_setup) {
            return redirect()->route('profile.setup');
        }

        $myProducts = collect();
        $incomingBids = collect();
        $myBids = collect();
        $activeDeals = collect();
        $successfulDeals = collect();
        $browseProducts = collect();

        if ($user->role === 'farmer') {
            $myProducts = Product::where('user_id', $user->id)->orderBy('_id', 'desc')->get();
            $incomingBids = Bid::where('farmer_id', $user->id)
                ->with(['product', 'buyer'])
                ->orderBy('_id', 'desc')
                ->get();
            
            $allDeals = Deal::where('farmer_id', $user->id)
                ->with(['product', 'buyer'])
                ->orderBy('_id', 'desc')
                ->get();
            $activeDeals = $allDeals->where('status', 'pending_details');
            $successfulDeals = $allDeals->where('status', 'confirmed');
        } else {
            $browseProducts = Product::where('status', 'active')
                ->with('farmer')
                ->orderBy('_id', 'desc')
                ->get();
            $myBids = Bid::where('buyer_id', $user->id)
                ->with(['product', 'farmer'])
                ->orderBy('_id', 'desc')
                ->get();
            
            $allDeals = Deal::where('buyer_id', $user->id)
                ->with(['product', 'farmer'])
                ->orderBy('_id', 'desc')
                ->get();
            $activeDeals = $allDeals->where('status', 'pending_details');
            $successfulDeals = $allDeals->where('status', 'confirmed');
        }

        // Get predefined crops list for the "Add Product" dropdown on Farmer's dashboard
        $predefinedCrops = ProductController::$predefinedCrops;

        return view('dashboard', compact(
            'user',
            'myProducts',
            'incomingBids',
            'myBids',
            'activeDeals',
            'successfulDeals',
            'browseProducts',
            'predefinedCrops'
        ));
    }
}
