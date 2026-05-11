@extends('layouts.stitch')
@section('title', isset($editing) ? 'Edit Product - AgriMandi' : 'Add Product - AgriMandi')
@section('content')

<div class="flex min-h-screen bg-surface">

{{-- Sidebar --}}
<aside class="hidden md:flex flex-col w-72 h-screen py-8 gap-4 bg-surface-container-low border-r border-outline-variant/20 shadow-xl sticky top-0 z-50">
    <div class="px-6 mb-8">
        <h1 class="font-headline-sm text-primary font-bold">AgriMandi India</h1>
        <p class="text-label-sm text-on-surface-variant">Farmer Portal</p>
    </div>
    <nav class="flex-1 px-4 space-y-1">
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('farmer.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span><span class="font-label-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 bg-primary-container/20 text-primary border-r-4 border-primary rounded-r-lg font-label-md" href="{{ route('farmer.products') }}">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">inventory_2</span><span>My Products</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('farmer.bids') }}">
            <span class="material-symbols-outlined">gavel</span><span class="font-label-md">Received Bids</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('farmer.orders') }}">
            <span class="material-symbols-outlined">shopping_bag</span><span class="font-label-md">Orders</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-primary-container/10 transition-all rounded-lg" href="{{ route('profile') }}">
            <span class="material-symbols-outlined">person</span><span class="font-label-md">Profile</span>
        </a>
    </nav>
    <div class="px-4 mt-auto space-y-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-3 text-error font-label-lg rounded-xl flex items-center justify-center gap-2 hover:bg-error-container transition-colors">
                <span class="material-symbols-outlined">logout</span> Logout
            </button>
        </form>
    </div>
</aside>

<div class="flex-1 flex flex-col min-w-0">

    {{-- Header --}}
    <header class="flex items-center justify-between px-8 h-20 sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/20">
        <div class="flex items-center gap-3">
            <a href="{{ route('farmer.products') }}" class="flex items-center gap-1 text-primary hover:underline font-label-md">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span> Back to Products
            </a>
        </div>
        <a href="{{ route('notifications') }}" class="p-2 text-on-surface-variant hover:bg-primary-container/10 rounded-full">
            <span class="material-symbols-outlined">notifications</span>
        </a>
    </header>

    <main class="p-8 max-w-5xl mx-auto w-full">
        <div class="mb-8">
            <h1 class="font-headline-lg text-on-surface font-bold">
                {{ isset($editing) ? 'Edit Product' : 'List New Commodity' }}
            </h1>
            <p class="font-body-md text-on-surface-variant mt-1">
                {{ isset($editing) ? 'Update your product details below.' : 'Fill in the details to list your produce on AgriMandi marketplace.' }}
            </p>
        </div>

        {{-- Validation Errors --}}
        @if($errors->any())
        <div class="bg-error-container/30 border border-error/30 text-error rounded-xl px-4 py-3 mb-6 space-y-1">
            <p class="font-label-lg font-bold flex items-center gap-2"><span class="material-symbols-outlined">error</span> Please fix the errors below:</p>
            <ul class="list-disc list-inside font-body-sm space-y-0.5">
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="bg-primary-container/30 border border-primary/30 text-primary rounded-xl px-4 py-3 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined">check_circle</span> {{ session('success') }}
        </div>
        @endif

        {{-- Form --}}
        @if(isset($editing))
        <form method="POST" action="{{ route('farmer.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
        @else
        <form method="POST" action="{{ route('farmer.products.store') }}" enctype="multipart/form-data">
            @csrf
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div class="lg:col-span-8 space-y-6">

                {{-- Product Identity --}}
                <section class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                    <h2 class="font-headline-sm text-on-surface font-bold mb-4">Product Identity</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="category">Category *</label>
                            <select id="category" name="category" required
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('category') border-error @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                @php $val = is_array($cat) ? ($cat['commodity'] ?? $cat) : $cat; @endphp
                                <option value="{{ $val }}" {{ old('category', $product->category ?? '') === $val ? 'selected' : '' }}>
                                    {{ ucwords(strtolower($val)) }}
                                </option>
                                @endforeach
                            </select>
                            @error('category')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="variety">Variety / Grade</label>
                            <input id="variety" name="variety" type="text"
                                value="{{ old('variety', $product->variety ?? '') }}"
                                placeholder="e.g. Sharbati, Pusa 1121"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none placeholder:text-outline/50"/>
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="name">Product Title *</label>
                            <input id="name" name="name" type="text" required
                                value="{{ old('name', $product->name ?? '') }}"
                                placeholder="e.g. Premium Grade-A Basmati Rice - 2024 Harvest"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('name') border-error @enderror placeholder:text-outline/50"/>
                            @error('name')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="description">Description</label>
                            <textarea id="description" name="description" rows="3"
                                placeholder="Quality details, storage condition, certifications..."
                                class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none resize-none placeholder:text-outline/50">{{ old('description', $product->description ?? '') }}</textarea>
                        </div>
                    </div>
                </section>

                {{-- Quantity & Pricing --}}
                <section class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                    <h2 class="font-headline-sm text-on-surface font-bold mb-4">Quantity & Pricing</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="quantity">Quantity *</label>
                            <input id="quantity" name="quantity" type="number" min="1" step="0.01" required
                                value="{{ old('quantity', $product->quantity ?? '') }}"
                                placeholder="e.g. 500"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('quantity') border-error @enderror"/>
                            @error('quantity')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="unit">Unit *</label>
                            <select id="unit" name="unit" required
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('unit') border-error @enderror">
                                @foreach($units as $u)
                                <option value="{{ $u }}" {{ old('unit', $product->unit ?? '') === $u ? 'selected' : '' }}>{{ ucfirst($u) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="price">Base Price (₹) *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 font-bold text-on-surface-variant">₹</span>
                                <input id="price" name="price" type="number" min="1" step="0.01" required
                                    value="{{ old('price', $product->price ?? '') }}"
                                    placeholder="per unit"
                                    class="w-full h-12 pl-8 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('price') border-error @enderror"/>
                            </div>
                            @error('price')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="quality">Quality Grade *</label>
                            <select id="quality" name="quality" required
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                                <option value="A" {{ old('quality', $product->quality ?? '') === 'A' ? 'selected' : '' }}>A — Premium</option>
                                <option value="B" {{ old('quality', $product->quality ?? '') === 'B' ? 'selected' : '' }}>B — Standard</option>
                                <option value="C" {{ old('quality', $product->quality ?? '') === 'C' ? 'selected' : '' }}>C — Commercial</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="harvest_date">Harvest Date *</label>
                            <input id="harvest_date" name="harvest_date" type="date" required
                                value="{{ old('harvest_date', isset($product) ? \Carbon\Carbon::parse($product->harvest_date)->format('Y-m-d') : '') }}"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('harvest_date') border-error @enderror"/>
                            @error('harvest_date')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </section>

                {{-- Location --}}
                <section class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                    <h2 class="font-headline-sm text-on-surface font-bold mb-4">Location & Mandi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="state">State *</label>
                            <select id="state" name="state" required
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('state') border-error @enderror">
                                <option value="">Select State</option>
                                @php $curState = old('state', $product->location['state'] ?? ''); @endphp
                                @foreach($states as $st)
                                @php $sName = is_array($st) ? ($st['state'] ?? $st) : $st; @endphp
                                <option value="{{ $sName }}" {{ $curState === $sName ? 'selected' : '' }}>{{ $sName }}</option>
                                @endforeach
                            </select>
                            @error('state')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="district">District *</label>
                            <input id="district" name="district" type="text" required
                                value="{{ old('district', $product->location['district'] ?? '') }}"
                                placeholder="e.g. Ludhiana"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('district') border-error @enderror placeholder:text-outline/50"/>
                            @error('district')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="mandi">Mandi Name *</label>
                            <input id="mandi" name="mandi" type="text" required
                                value="{{ old('mandi', $product->location['mandi'] ?? '') }}"
                                placeholder="e.g. Ludhiana APMC"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('mandi') border-error @enderror placeholder:text-outline/50"/>
                            @error('mandi')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-md text-on-surface-variant" for="pincode">Pincode *</label>
                            <input id="pincode" name="pincode" type="text" maxlength="6" required
                                value="{{ old('pincode', $product->location['pincode'] ?? '') }}"
                                placeholder="6-digit pincode"
                                class="w-full h-12 px-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none @error('pincode') border-error @enderror placeholder:text-outline/50"/>
                            @error('pincode')<p class="text-error text-label-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </section>

                {{-- Images --}}
                <section class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10">
                    <h2 class="font-headline-sm text-on-surface font-bold mb-2">Product Images</h2>
                    <p class="font-body-sm text-on-surface-variant mb-4">Upload clear photos (JPG/PNG, max 5MB each)</p>
                    <label for="images" class="flex flex-col items-center justify-center border-2 border-dashed border-primary/40 rounded-xl p-8 cursor-pointer hover:bg-primary-container/5 transition-colors">
                        <span class="material-symbols-outlined text-primary text-4xl mb-2">add_a_photo</span>
                        <span class="font-label-md text-primary">Click to upload images</span>
                        <span class="font-body-sm text-on-surface-variant mt-1">Multiple files allowed</span>
                    </label>
                    <input id="images" name="images[]" type="file" accept="image/*" multiple class="hidden"/>

                    {{-- Show existing images in edit mode --}}
                    @if(isset($editing) && !empty($product->images))
                    <div class="flex flex-wrap gap-3 mt-4">
                        @foreach($product->images as $img)
                        <div class="relative w-20 h-20 rounded-lg overflow-hidden border border-outline-variant/20">
                            <img src="{{ Storage::url($img) }}" class="w-full h-full object-cover" alt="Product image">
                        </div>
                        @endforeach
                        <p class="w-full font-body-sm text-on-surface-variant">New uploads will be added to existing images.</p>
                    </div>
                    @endif
                </section>

            </div>

            {{-- Submit Sidebar --}}
            <aside class="lg:col-span-4">
                <div class="bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/10 sticky top-24 space-y-4">
                    <h3 class="font-headline-sm text-on-surface font-bold">Listing Summary</h3>
                    <div class="space-y-3 text-body-sm">
                        <div class="flex justify-between"><span class="text-on-surface-variant">Platform</span><span class="text-primary font-bold">AgriMandi India</span></div>
                        <div class="flex justify-between"><span class="text-on-surface-variant">Service Fee</span><span class="text-on-surface">₹0 (Free)</span></div>
                        <div class="flex justify-between"><span class="text-on-surface-variant">Buyer Reach</span><span class="text-primary font-bold">Pan-India</span></div>
                    </div>
                    <hr class="border-outline-variant/20"/>
                    <div class="bg-primary-container/10 rounded-xl p-4">
                        <div class="flex gap-2 items-start text-primary">
                            <span class="material-symbols-outlined text-[18px] mt-0.5">lightbulb</span>
                            <p class="font-label-sm leading-relaxed">Adding quality certification photos can increase bid acceptance by up to 40%.</p>
                        </div>
                    </div>
                    <button type="submit" id="submitBtn"
                        class="w-full py-4 bg-primary text-on-primary rounded-xl font-label-lg shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined" id="submitIcon">{{ isset($editing) ? 'save' : 'add_circle' }}</span>
                        <span id="submitText">{{ isset($editing) ? 'Update Product' : 'Publish Listing' }}</span>
                    </button>
                    <a href="{{ route('farmer.products') }}" class="block text-center w-full py-3 bg-surface-container-low text-on-surface rounded-xl font-label-md hover:bg-surface-container transition-colors">
                        Cancel
                    </a>
                    <div class="flex items-center justify-center gap-2 text-on-surface-variant opacity-60">
                        <span class="material-symbols-outlined text-[16px]">lock</span>
                        <span class="text-label-sm">Secure Listing</span>
                    </div>
                </div>
            </aside>
        </div>
        </form>
    </main>
</div>
</div>

<script>
document.querySelector('form').addEventListener('submit', function() {
    const btn = document.getElementById('submitBtn');
    const icon = document.getElementById('submitIcon');
    const text = document.getElementById('submitText');
    btn.disabled = true;
    btn.classList.add('opacity-70');
    icon.textContent = 'hourglass_top';
    text.textContent = 'Saving...';
});
</script>

@endsection
