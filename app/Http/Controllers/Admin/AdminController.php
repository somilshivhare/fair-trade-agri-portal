<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{KycVerification, Product, User};
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(private NotificationService $notifService) {}

    public function dashboard()
    {
        $stats = [
            'total_users'      => User::count(),
            'pending_kyc'      => KycVerification::pending()->count(),
            'total_products'   => Product::count(),
            'active_products'  => Product::available()->count(),
        ];
        $pendingKyc = KycVerification::pending()->with('user')->latest()->take(10)->get();
        $recentUsers = User::latest()->take(10)->get();
        return view('admin.dashboard', compact('stats', 'pendingKyc', 'recentUsers'));
    }

    public function kycList(Request $request)
    {
        $query = KycVerification::with('user');
        if ($request->status) $query->where('status', $request->status);
        $kycs = $query->latest()->paginate(20);
        return view('admin.kyc', compact('kycs'));
    }

    public function approveKyc(string $id)
    {
        $kyc = KycVerification::findOrFail($id);
        $kyc->update(['status' => 'verified', 'verified_by' => Auth::id(), 'verified_at' => now()]);
        $kyc->user->update(['is_kyc_verified' => true]);
        $this->notifService->send($kyc->user_id, 'bid_accepted', [
            'title'   => 'KYC Verified ✅',
            'message' => 'Your KYC has been approved. You can now list products.',
            'data'    => [],
        ]);
        return back()->with('success', 'KYC approved.');
    }

    public function rejectKyc(Request $request, string $id)
    {
        $request->validate(['reason' => 'required|string|max:500']);
        $kyc = KycVerification::findOrFail($id);
        $kyc->update(['status' => 'rejected', 'rejection_reason' => $request->reason]);
        $this->notifService->send($kyc->user_id, 'bid_rejected', [
            'title'   => 'KYC Rejected ❌',
            'message' => "KYC rejected: {$request->reason}",
            'data'    => [],
        ]);
        return back()->with('info', 'KYC rejected.');
    }

    public function users(Request $request)
    {
        $query = User::query();
        if ($request->role)   $query->where('role', $request->role);
        if ($request->search) $query->where(function($q) use ($request) {
            $q->where('name', 'like', "%{$request->search}%")
              ->orWhere('email', 'like', "%{$request->search}%");
        });
        $users = $query->latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function toggleUser(string $id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => !$user->is_active]);
        return back()->with('success', 'User status updated.');
    }
}
