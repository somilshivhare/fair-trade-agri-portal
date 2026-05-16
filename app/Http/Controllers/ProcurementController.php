<?php

namespace App\Http\Controllers;

use App\Models\MspPrice;
use App\Models\Tender;
use App\Models\Procurement;
use App\Models\Warehouse;
use App\Models\MarketPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProcurementController extends Controller
{
    public function index()
    {
        $activeTenders = Tender::where('status', 'open')->latest()->take(5)->get();
        $mspPrices = MspPrice::active()->latest()->take(6)->get();
        $procurementStats = [
            'total_procured' => Procurement::where('status', 'completed')->sum('quantity'),
            'active_centers' => Warehouse::where('status', 'available')->count(),
            'total_payouts' => Procurement::where('status', 'completed')->sum('total_amount'),
        ];
        
        return view('government.index', compact('activeTenders', 'mspPrices', 'procurementStats'));
    }

    public function mspDashboard()
    {
        $mspPrices = MspPrice::active()->get();
        $marketPrices = MarketPrice::today()->get();
        
        return view('government.msp-dashboard', compact('mspPrices', 'marketPrices'));
    }

    public function tenders()
    {
        $tenders = Tender::latest()->paginate(10);
        return view('government.tenders', compact('tenders'));
    }

    public function centers()
    {
        $centers = Warehouse::latest()->get();
        return view('government.centers', compact('centers'));
    }

    public function sellToGov()
    {
        $tenders = Tender::where('status', 'open')->get();
        $mspPrices = MspPrice::active()->get();
        
        return view('government.sell-to-gov', compact('tenders', 'mspPrices'));
    }

    public function submitProcurement(Request $request)
    {
        $request->validate([
            'commodity' => 'required',
            'quantity' => 'required|numeric|min:1',
            'tender_id' => 'nullable|exists:tenders,id',
            'price_per_unit' => 'required|numeric',
        ]);

        $procurement = Procurement::create([
            'receipt_number' => 'RCP-' . strtoupper(Str::random(10)),
            'farmer_id' => Auth::id(),
            'tender_id' => $request->tender_id,
            'commodity' => $request->commodity,
            'quantity' => $request->quantity,
            'price_per_unit' => $request->price_per_unit,
            'total_amount' => $request->quantity * $request->price_per_unit,
            'status' => 'pending',
        ]);

        return redirect()->route('gov.index')->with('success', 'Your crop submission has been received. Receipt: ' . $procurement->receipt_number);
    }

    public function adminDashboard()
    {
        $pendingRequests = Procurement::where('status', 'pending')->with('farmer')->get();
        $stats = [
            'total_requests' => Procurement::count(),
            'pending_count' => $pendingRequests->count(),
            'total_quantity' => Procurement::where('status', 'completed')->sum('quantity'),
        ];
        
        return view('government.admin-dashboard', compact('pendingRequests', 'stats'));
    }

    public function approveProcurement($id)
    {
        $procurement = Procurement::findOrFail($id);
        $procurement->update([
            'status' => 'completed',
            'procured_at' => now(),
            'payment_reference' => 'PAY-' . strtoupper(Str::random(12)),
        ]);

        // Update tender if applicable
        if ($procurement->tender_id) {
            $tender = $procurement->tender;
            $tender->increment('fulfilled_quantity', $procurement->quantity);
            if ($tender->fulfilled_quantity >= $tender->target_quantity) {
                $tender->update(['status' => 'closed']);
            }
        }

        return back()->with('success', 'Procurement approved and payment initiated.');
    }
}
