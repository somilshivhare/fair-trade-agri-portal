@extends('layouts.app')

@section('title', $user->is_profile_setup ? 'Edit Profile' : 'Complete Profile')

@section('content')
<div class="max-w-xl mx-auto my-16 px-4">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-2xl p-8 sm:p-10 relative overflow-hidden">
        <!-- Background accents -->
        <div class="absolute -top-12 -right-12 w-28 h-28 bg-emerald-500/10 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -left-12 w-28 h-28 bg-teal-500/10 rounded-full blur-2xl"></div>

        <div class="text-center relative z-10">
            @if(!$user->is_profile_setup)
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100">Step 2 of 2</span>
            @endif
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 mt-4">{{ $user->is_profile_setup ? 'Edit Profile' : 'Complete Profile Setup' }}</h2>
            <p class="mt-2 text-sm text-slate-500 font-light">{{ $user->is_profile_setup ? 'Update your business information below.' : 'Tell us more about your business to start bidding.' }}</p>
        </div>

        @if($errors->any())
            <div class="mt-6 p-4 rounded-2xl bg-rose-50 border border-rose-100 text-rose-800 text-sm">
                <ul class="list-disc pl-5 space-y-1 font-semibold">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.setup') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6 relative z-10">
            @csrf

            <!-- Profile Image Upload -->
            <div class="flex flex-col items-center justify-center space-y-3">
                <label class="text-sm font-bold text-slate-700 w-full text-left">Profile Image</label>
                <div class="relative group cursor-pointer">
                    <div id="imagePreviewContainer" class="w-28 h-28 rounded-2xl bg-slate-50 border flex items-center justify-center overflow-hidden transition-all group-hover:border-emerald-500 {{ $user->profile_image ? 'border-solid border-emerald-500' : 'border-2 border-dashed border-slate-200' }}">
                        <svg id="uploadIcon" class="w-8 h-8 text-slate-400 group-hover:text-emerald-500 transition-colors {{ $user->profile_image ? 'hidden' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <img id="imagePreview" src="{{ $user->profile_image ?: '' }}" class="{{ $user->profile_image ? '' : 'hidden' }} w-full h-full object-cover" />
                    </div>
                    <input type="file" id="profileImageInput" name="profile_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewProfileImage(event)">
                </div>
                <p class="text-[11px] text-slate-400 font-light">Upload a JPG, PNG, or GIF up to 2MB</p>
            </div>

            <!-- Dynamic Role-Based Input Field -->
            @if($user->role === 'farmer')
                <div class="space-y-2">
                    <label for="farm_name" class="text-sm font-bold text-slate-700">Farm / Mandi Name</label>
                    <div class="relative">
                        <input type="text" id="farm_name" name="farm_name" value="{{ old('farm_name', $user->farm_name) }}" required class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="Green Valley Farms">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <!-- farm/home icon -->
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        </div>
                    </div>
                </div>
            @else
                <div class="space-y-2">
                    <label for="business_name" class="text-sm font-bold text-slate-700">Business / Trade Name</label>
                    <div class="relative">
                        <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $user->business_name) }}" required class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="AgriFoods Trading Corp">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <!-- brief case icon -->
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Phone -->
            <div class="space-y-2">
                <label for="phone" class="text-sm font-bold text-slate-700">Phone Number</label>
                <div class="relative">
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="+91 98765 43210">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                </div>
            </div>

            <!-- State and City (Grid) -->
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="state" class="text-sm font-bold text-slate-700">State</label>
                    <input type="text" id="state" name="state" value="{{ old('state', $user->state) }}" required class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="Punjab">
                </div>
                <div class="space-y-2">
                    <label for="city" class="text-sm font-bold text-slate-700">City</label>
                    <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}" required class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-sm transition-all" placeholder="Ludhiana">
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-4 px-6 rounded-2xl text-white font-bold bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/20 transition-all duration-300 scale-100 hover:scale-[1.01] active:scale-[0.99] mt-3">
                {{ $user->is_profile_setup ? 'Save Changes' : 'Save & Continue to Dashboard' }}
            </button>
        </form>
    </div>
</div>

<script>
    function previewProfileImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('imagePreview');
            const icon = document.getElementById('uploadIcon');
            const container = document.getElementById('imagePreviewContainer');
            
            preview.src = reader.result;
            preview.classList.remove('hidden');
            icon.classList.add('hidden');
            container.classList.remove('border-dashed');
            container.classList.add('border-solid', 'border-emerald-500');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
