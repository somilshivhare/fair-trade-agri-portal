@extends('layouts.app')

@section('title', 'Deal Details')

@section('content')
<div class="max-w-4xl mx-auto my-12 px-4 sm:px-6">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-2xl overflow-hidden">
        
        <!-- Status Header Banner -->
        @if($deal->status === 'confirmed')
            <div class="bg-gradient-to-r from-emerald-600 to-teal-500 py-6 px-8 text-white flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest bg-white/20 px-3 py-1 rounded-full border border-white/10">Invoice Receipt</span>
                    <h1 class="text-2xl font-extrabold mt-2">Deal Fully Confirmed</h1>
                </div>
                <div class="p-3 bg-white/25 rounded-2xl">
                    <!-- check mark icon -->
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        @else
            <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 py-6 px-8 text-white flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest bg-white/10 px-3 py-1 rounded-full border border-white/5">Action Required</span>
                    <h1 class="text-2xl font-extrabold mt-2">Complete Shipping Details</h1>
                </div>
                <div class="p-3 bg-white/10 rounded-2xl animate-pulse">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
            </div>
        @endif

        <div class="p-8 space-y-8">
            
            <!-- Summary Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Crop Product</span>
                    <p class="text-lg font-extrabold text-slate-800 mt-0.5">{{ $deal->product->crop_name ?? 'Crop Lot' }}</p>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Quantity Lot</span>
                    <p class="text-lg font-extrabold text-slate-800 mt-0.5">{{ $deal->product->quantity ?? 0 }} Quintals</p>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Final Deal Price</span>
                    <p class="text-lg font-extrabold text-emerald-600 mt-0.5">₹{{ number_format($deal->final_price) }} / Qntl</p>
                </div>
            </div>

            <!-- Two-Step Progress Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- STEP 1: BUYER DETAILS -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center font-extrabold text-sm border {{ $deal->delivery_address ? 'bg-emerald-100 border-emerald-300 text-emerald-800' : 'bg-slate-100 border-slate-300 text-slate-800' }}">
                            1
                        </div>
                        <h3 class="font-bold text-slate-800">Buyer Delivery Details</h3>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-md space-y-4">
                        @if($deal->delivery_address)
                            <div class="space-y-2.5 text-sm text-slate-700">
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">Name / Business</span> {{ $deal->buyer->name }} ({{ $deal->buyer->business_name }})</p>
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">Address</span> {{ $deal->delivery_address }}</p>
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">City & State</span> {{ $deal->delivery_city }}, {{ $deal->delivery_state }}</p>
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">Phone Contact</span> {{ $deal->delivery_phone }}</p>
                            </div>
                        @else
                            @if(Auth::id() === $deal->buyer_id)
                                <!-- Form for Buyer -->
                                <form action="{{ route('deals.submit-details', $deal->id) }}" method="POST" class="space-y-3">
                                    @csrf
                                    <div class="space-y-1">
                                        <label for="delivery_address" class="text-xs font-bold text-slate-500">Delivery Address</label>
                                        <input type="text" id="delivery_address" name="delivery_address" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="Warehouse address, lane 4">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="space-y-1">
                                            <label for="delivery_state" class="text-xs font-bold text-slate-500">State</label>
                                            <input type="text" id="delivery_state" name="delivery_state" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="Punjab">
                                        </div>
                                        <div class="space-y-1">
                                            <label for="delivery_city" class="text-xs font-bold text-slate-500">City</label>
                                            <input type="text" id="delivery_city" name="delivery_city" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="Ludhiana">
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="delivery_phone" class="text-xs font-bold text-slate-500">Phone</label>
                                        <input type="text" id="delivery_phone" name="delivery_phone" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="+91 98765 43210">
                                    </div>
                                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl text-white font-bold bg-emerald-600 hover:bg-emerald-700 text-xs transition-colors shadow-sm">Submit Delivery Address</button>
                                </form>
                            @else
                                <div class="py-8 text-center text-slate-400 text-sm">
                                    Waiting for buyer to submit delivery address.
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- STEP 2: FARMER DETAILS -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center font-extrabold text-sm border {{ $deal->pickup_location ? 'bg-emerald-100 border-emerald-300 text-emerald-800' : 'bg-slate-100 border-slate-300 text-slate-800' }}">
                            2
                        </div>
                        <h3 class="font-bold text-slate-800">Farmer Pickup Details</h3>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-md space-y-4">
                        @if($deal->pickup_location)
                            <div class="space-y-2.5 text-sm text-slate-700">
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">Name / Farm</span> {{ $deal->farmer->name }} ({{ $deal->farmer->farm_name }})</p>
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">Pickup Location</span> {{ $deal->pickup_location }}</p>
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">City & State</span> {{ $deal->pickup_city }}, {{ $deal->pickup_state }}</p>
                                <p><span class="font-bold text-slate-400 uppercase text-[10px] block">Phone Contact</span> {{ $deal->pickup_phone }}</p>
                            </div>
                        @else
                            @if(Auth::id() === $deal->farmer_id)
                                <!-- Form for Farmer -->
                                <form action="{{ route('deals.submit-details', $deal->id) }}" method="POST" class="space-y-3">
                                    @csrf
                                    <div class="space-y-1">
                                        <label for="pickup_location" class="text-xs font-bold text-slate-500">Pickup Location Address</label>
                                        <input type="text" id="pickup_location" name="pickup_location" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="Farm gate, Ludhiana road">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="space-y-1">
                                            <label for="pickup_state" class="text-xs font-bold text-slate-500">State</label>
                                            <input type="text" id="pickup_state" name="pickup_state" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="Punjab">
                                        </div>
                                        <div class="space-y-1">
                                            <label for="pickup_city" class="text-xs font-bold text-slate-500">City</label>
                                            <input type="text" id="pickup_city" name="pickup_city" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="Ludhiana">
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="pickup_phone" class="text-xs font-bold text-slate-500">Phone</label>
                                        <input type="text" id="pickup_phone" name="pickup_phone" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-1 focus:ring-emerald-500" placeholder="+91 98765 12345">
                                    </div>
                                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl text-white font-bold bg-emerald-600 hover:bg-emerald-700 text-xs transition-colors shadow-sm">Submit Pickup Location</button>
                                </form>
                            @else
                                <div class="py-8 text-center text-slate-400 text-sm">
                                    Waiting for farmer to submit pickup location.
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

            </div>

            <!-- Confirmation Action -->
            <div class="pt-6 border-t border-slate-100 flex justify-between items-center">
                <a href="{{ route('dashboard') }}" class="text-xs font-bold text-emerald-600 hover:underline">← Go back to Dashboard</a>
                
                @if($deal->status === 'confirmed')
                    <span class="text-xs font-bold text-slate-400">Transaction Secured with MongoDB</span>
                @else
                    <span class="text-xs font-bold text-rose-500 animate-pulse">Waiting for both addresses to confirm deal</span>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
