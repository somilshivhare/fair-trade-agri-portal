@extends('layouts.app')

@section('title', $product->crop_name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Left: Crop Showcase & Details (2 columns) -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Crop Card -->
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-xl">
                <div class="h-96 w-full relative bg-slate-100">
                    <img src="{{ $product->image_url }}" alt="{{ $product->crop_name }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h1 class="text-3xl font-extrabold tracking-tight">{{ $product->crop_name }}</h1>
                        <p class="text-sm text-slate-200 mt-1 font-light">🌾 Agricultural Lot Portfolio</p>
                    </div>
                </div>

                <!-- Technical Parameters Grid -->
                <div class="p-8 grid grid-cols-2 sm:grid-cols-4 gap-6 border-b border-slate-100">
                    <div class="space-y-1">
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Lot Quantity</p>
                        <p class="text-lg font-extrabold text-slate-800">{{ $product->quantity }} Quintals</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Base Price</p>
                        <p class="text-lg font-extrabold text-slate-800">₹{{ number_format($product->base_price) }} / Qntl</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total Value</p>
                        <p class="text-lg font-extrabold text-emerald-600">₹{{ number_format($product->base_price * $product->quantity) }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Status</p>
                        <span class="inline-flex items-center rounded-md bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/20 capitalize">{{ $product->status }}</span>
                    </div>
                </div>

                <!-- Extended Info Description -->
                <div class="p-8 space-y-6">
                    <div>
                        <h3 class="text-base font-bold text-slate-900 mb-3">Lot Location details</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $product->location }}</p>
                    </div>
                </div>
            </div>

            <!-- Farmer Seller Info -->
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-xl flex items-center space-x-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-500 flex items-center justify-center text-white text-lg font-bold">
                    {{ strtoupper(substr($product->farmer->name ?? 'F', 0, 2)) }}
                </div>
                <div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wide">Listed By Farmer</h3>
                    <p class="text-base font-bold text-slate-800 mt-0.5">{{ $product->farmer->name ?? 'Verified Farmer' }}</p>
                    <p class="text-xs text-slate-400 font-light mt-0.5">Farm: {{ $product->farmer->farm_name ?? 'N/A' }} • State: {{ $product->farmer->state ?? 'N/A' }}</p>
                </div>
            </div>

        </div>

        <!-- Right Side: Bidding panel (1 column) -->
        <div class="space-y-8">
            <div class="bg-white rounded-3xl border border-slate-100 p-6 sm:p-8 shadow-xl relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-24 h-24 bg-emerald-500/5 rounded-full blur-xl"></div>
                
                <h2 class="text-xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-100 flex items-center gap-2">
                    <span class="p-2 rounded-xl bg-emerald-500 text-white shadow-sm flex items-center justify-center">
                        <!-- gavel/hammer SVG icon -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                    </span>
                    Bidding Center
                </h2>

                <!-- Smart Bid Insights -->
                <div class="mb-6 p-4 rounded-2xl bg-slate-50 border border-slate-150/50 space-y-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center gap-1.5 select-none">
                        📊 Smart Bid Insights
                    </h3>
                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div class="bg-white p-2.5 rounded-xl border border-slate-100 shadow-sm">
                            <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-tight">Highest Bid</span>
                            <span class="text-sm font-extrabold text-slate-800 mt-1 block">₹{{ $highestBid > 0 ? number_format($highestBid) : 'N/A' }}</span>
                        </div>
                        <div class="bg-white p-2.5 rounded-xl border border-slate-100 shadow-sm">
                            <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-tight">Average Bid</span>
                            <span class="text-sm font-extrabold text-slate-800 mt-1 block">₹{{ $averageBid > 0 ? number_format($averageBid) : 'N/A' }}</span>
                        </div>
                        <div class="bg-white p-2.5 rounded-xl border border-slate-100 shadow-sm">
                            <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-tight">Total Bids</span>
                            <span class="text-sm font-extrabold text-slate-800 mt-1 block">{{ $totalBids }}</span>
                        </div>
                    </div>

                    @if(Auth::check() && $userBid)
                        <div class="pt-3 border-t border-slate-200/60 flex flex-col gap-1.5 text-xs font-bold">
                            <div class="flex items-center justify-between text-slate-600">
                                <span>🏆 Your Rank:</span>
                                <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-extrabold">#{{ $userRank }}</span>
                            </div>
                            @if($userDiff > 0)
                                <div class="flex items-center justify-between text-slate-500 font-normal">
                                    <span>Gap to Highest Bid:</span>
                                    <span class="text-rose-600 font-bold">₹{{ number_format($userDiff) }} below highest</span>
                                </div>
                            @else
                                <div class="flex items-center justify-between text-emerald-600 font-bold">
                                    <span>🎉 You hold the highest bid!</span>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Top 3 Bids Leaderboard -->
                @if($totalBids > 0)
                    <div class="mb-6 space-y-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center gap-1.5 select-none">
                            🏆 Top Bids Leaderboard
                        </h3>
                        <div class="bg-white border border-slate-150/70 rounded-2xl overflow-hidden shadow-sm divide-y divide-slate-100">
                            @foreach($topThreeBids as $index => $bid)
                                <div class="flex items-center justify-between p-3 text-xs {{ Auth::id() === $bid->buyer_id ? 'bg-emerald-50/40' : '' }}">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-5 h-5 rounded-full flex items-center justify-center font-extrabold {{ $index === 0 ? 'bg-amber-100 text-amber-800' : ($index === 1 ? 'bg-slate-100 text-slate-700' : 'bg-orange-50 text-orange-700') }}">
                                            {{ $index + 1 }}
                                        </span>
                                        <span class="font-bold text-slate-700">{{ $bid->buyer->name ?? 'Buyer' }}</span>
                                        @if(Auth::id() === $bid->buyer_id)
                                            <span class="px-1.5 py-0.2 rounded bg-emerald-100 text-[9px] font-bold text-emerald-850">You</span>
                                        @endif
                                    </div>
                                    <span class="font-extrabold text-slate-800">₹{{ number_format($bid->amount) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Render panel contextually -->
                @guest
                    <div class="text-center py-6">
                        <p class="text-slate-500 text-sm mb-6">You need to log in to place bids on this agricultural lot.</p>
                        <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-4 text-sm shadow-md transition-all active:scale-[0.98]">
                            Log In to Bid
                        </a>
                    </div>
                @else
                    @if(Auth::id() === $product->user_id)
                        <!-- User owns this product -->
                        <div class="p-5 rounded-2xl bg-emerald-50/60 border border-emerald-100 text-emerald-800 text-center">
                            <p class="text-sm font-bold">This is your crop listing lot</p>
                            <p class="text-xs text-emerald-600 mt-1">Check your dashboard to view incoming bids from prospective buyers.</p>
                            <a href="{{ route('dashboard', ['tab' => 'bids']) }}" class="mt-4 inline-block text-xs font-extrabold text-white bg-emerald-600 hover:bg-emerald-700 py-2 px-4 rounded-xl transition-all">Go to Bids</a>
                        </div>
                    @elseif(Auth::user()->role !== 'buyer')
                        <!-- User is not a buyer -->
                        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/50 text-slate-500 text-center">
                            <p class="text-sm font-bold">Buyer Role Required</p>
                            <p class="text-xs mt-1">Only users registered as Buyers can participate in bidding.</p>
                        </div>
                    @else
                        <!-- Logged-in Buyer -->
                        <div class="space-y-6">
                            
                            <!-- Bid Placement form -->
                            @if(!$userBid || $userBid->status === 'rejected')
                                <div>
                                    <div class="mb-4">
                                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">Base Price per Qntl</span>
                                        <p class="text-3xl font-extrabold text-slate-800">₹{{ number_format($product->base_price) }}</p>
                                    </div>

                                    <form action="{{ route('bids.place', $product->id) }}" method="POST" class="space-y-4">
                                        @csrf
                                        <div class="space-y-1.5">
                                            <label for="bidAmount" class="text-xs font-bold text-slate-600">Your Bid Offer (Per Quintal)</label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 font-bold text-sm">₹</span>
                                                <input type="number" id="bidAmount" name="amount" min="{{ $product->base_price + 1 }}" required class="w-full pl-8 pr-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="{{ $product->base_price + 50 }}">
                                            </div>
                                            <p class="text-[10px] text-slate-400 font-light mt-0.5">Bid must be higher than base price of ₹{{ $product->base_price }}</p>
                                        </div>

                                        <button type="submit" class="w-full py-4 px-6 rounded-2xl text-white font-bold bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/20 transition-all duration-300 scale-100 hover:scale-[1.01] active:scale-[0.99]">
                                            Place Bid
                                        </button>
                                    </form>
                                </div>
                            @else
                                <!-- Existing Active Bid -->
                                <div class="space-y-6">
                                    <div class="p-5 rounded-2xl border border-slate-100 bg-slate-50/50 shadow-inner">
                                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">Your Placed Bid</span>
                                        <p class="text-3xl font-extrabold text-slate-800 mt-1">₹{{ number_format($userBid->amount) }}</p>
                                        
                                        @php
                                            $badgeStyles = match($userBid->status) {
                                                'pending' => 'bg-amber-100 text-amber-800 border-amber-200/50',
                                                'accepted' => 'bg-emerald-100 text-emerald-800 border-emerald-200/50',
                                                'counter' => 'bg-blue-100 text-blue-800 border-blue-200/50',
                                                default => 'bg-slate-100 text-slate-800 border-slate-200/50'
                                            };
                                        @endphp
                                        <div class="mt-4 flex items-center justify-between">
                                            <span class="text-xs font-semibold text-slate-500">Status:</span>
                                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold border uppercase tracking-wider {{ $badgeStyles }}">{{ $userBid->status }}</span>
                                        </div>
                                    </div>

                                    @if($userBid->status === 'counter')
                                        <!-- Counter Offer Actions -->
                                        <div class="p-5 rounded-2xl bg-amber-50 border border-amber-100 space-y-4">
                                            <h3 class="text-sm font-bold text-amber-800">⚠️ Farmer Proposed Counter Offer</h3>
                                            <p class="text-xs text-amber-700 leading-relaxed font-semibold">The farmer has counter-proposed a final price of <strong class="text-slate-800">₹{{ number_format($userBid->counter_amount) }}</strong>.</p>
                                            
                                            <div class="grid grid-cols-2 gap-3 mt-4">
                                                <form action="{{ route('bids.accept-counter', $userBid->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-4 rounded-xl text-xs transition-colors shadow-sm">Accept</button>
                                                </form>
                                                <form action="{{ route('bids.reject-counter', $userBid->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded-xl text-xs transition-colors shadow-sm">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center text-xs text-slate-400 font-light">You already have an active bid on this lot. You can track its progress or respond to counter-proposals in your dashboard.</p>
                                    @endif

                                    <a href="{{ route('dashboard', ['tab' => 'bids']) }}" class="w-full inline-flex items-center justify-center rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-4 text-xs transition-all">
                                        Go to Bids Dashboard
                                    </a>
                                </div>
                            @endif

                        </div>
                    @endif
                @endguest
            </div>
        </div>

    </div>
</div>
@endsection
