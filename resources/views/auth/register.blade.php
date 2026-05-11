@extends('layouts.stitch')
@section('title', 'Create Account - AgriMandi')
@section('content')

<!-- Market Ticker -->
<div class="w-full bg-surface-container-lowest border-b border-outline-variant/20 h-10 flex items-center overflow-hidden z-[60] relative">
<div class="flex items-center whitespace-nowrap animate-none px-gutter gap-xl">
<div class="flex items-center gap-sm"><span class="font-label-sm text-label-sm text-on-surface-variant">WHEAT (MP)</span><span class="font-label-sm text-label-sm text-primary font-bold">₹2,450.00</span><span class="material-symbols-outlined text-primary text-[16px]">trending_up</span></div>
<div class="flex items-center gap-sm"><span class="font-label-sm text-label-sm text-on-surface-variant">SOYBEAN</span><span class="font-label-sm text-label-sm text-primary font-bold">₹4,820.00</span><span class="material-symbols-outlined text-primary text-[16px]">trending_up</span></div>
<div class="flex items-center gap-sm"><span class="font-label-sm text-label-sm text-on-surface-variant">MUSTARD</span><span class="font-label-sm text-label-sm text-error font-bold">₹5,100.00</span><span class="material-symbols-outlined text-error text-[16px]">trending_down</span></div>
<div class="flex items-center gap-sm"><span class="font-label-sm text-label-sm text-on-surface-variant">COTTON</span><span class="font-label-sm text-label-sm text-primary font-bold">₹7,200.00</span><span class="material-symbols-outlined text-primary text-[16px]">trending_up</span></div>
</div>
</div>

<main class="min-h-[calc(100vh-40px)] flex flex-col md:flex-row overflow-hidden">
<!-- Left Side: Visual & Brand Content -->
<section class="hidden md:flex md:w-1/2 relative bg-primary items-center justify-center p-xl overflow-hidden">
<div class="absolute inset-0 z-0 opacity-80">
<img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzQ5DhqIQ-0fa9i-8WJGhlVpi4Ay8-2SWJvalEbLCf9lYzB3kpRzapOQc1Z4bqDuMjUEuodhiq4xr2N91VRfqgkVbAWvXvAZtR0qmgcTHrXFSQ24OyYf7BICCA0Oiq8i7kGa_IZIT6UxWnOpEZd435oin73TiD71PGPWCHiHfql6SvSQ1-3g5UCjkXBfH5PqEOWp0vmn3buL4KcooCKrKO_j7z_UNvDpr_IcJUA_DXKjy3VRGy-csNSnhN23-duA4PMBFV-NaAHIz4" alt="AgriMandi Fields"/>
<div class="absolute inset-0 bg-gradient-to-tr from-primary/60 to-transparent"></div>
</div>
<div class="relative z-10 max-w-lg text-white">
<div class="mb-lg">
<h1 class="font-display-lg text-display-lg text-white mb-sm">Join AgriMandi</h1>
<div class="h-1 w-20 bg-primary-fixed rounded-full"></div>
</div>
<p class="font-body-lg text-body-lg text-white/90 mb-xl leading-relaxed">
    Start your digital agricultural journey. Connect with verified buyers, get the best prices for your produce.
</p>
<div class="space-y-md">
<div class="flex items-center gap-md bg-white/10 backdrop-blur-md rounded-xl p-md border border-white/20">
<span class="material-symbols-outlined text-[32px]" style="font-variation-settings:'FILL' 1;">verified</span>
<div><p class="font-label-lg">KYC Verified Platform</p><p class="font-label-sm text-white/70">Only verified farmers & buyers</p></div>
</div>
<div class="flex items-center gap-md bg-white/10 backdrop-blur-md rounded-xl p-md border border-white/20">
<span class="material-symbols-outlined text-[32px]" style="font-variation-settings:'FILL' 1;">payments</span>
<div><p class="font-label-lg">Secure Payments</p><p class="font-label-sm text-white/70">₹0 platform fee for first 6 months</p></div>
</div>
<div class="flex items-center gap-md bg-white/10 backdrop-blur-md rounded-xl p-md border border-white/20">
<span class="material-symbols-outlined text-[32px]" style="font-variation-settings:'FILL' 1;">support_agent</span>
<div><p class="font-label-lg">24/7 Trade Support</p><p class="font-label-sm text-white/70">Dedicated relationship managers</p></div>
</div>
</div>
</div>
</section>

<!-- Right Side: Registration Form -->
<section class="flex-1 bg-surface flex items-center justify-center p-gutter relative overflow-y-auto">
<div class="absolute top-8 left-8 md:hidden">
<h2 class="font-headline-md text-headline-md text-primary font-bold tracking-tight">AgriMandi India</h2>
</div>
<div class="w-full max-w-[500px] py-xl">
<div class="bg-surface-container-lowest rounded-[20px] p-xl border border-outline-variant/10" style="box-shadow: 0 4px 32px rgba(0,108,73,0.10);">
<div class="mb-xl">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Create Your Account</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Join 50,000+ farmers & buyers on AgriMandi</p>
</div>

{{-- Error Messages --}}
@if($errors->any())
<div class="mb-lg p-md bg-error-container rounded-xl border border-error/20">
    @foreach($errors->all() as $error)
        <p class="font-body-md text-body-md text-on-error-container flex items-center gap-sm">
            <span class="material-symbols-outlined text-error text-[18px]">error</span>
            {{ $error }}
        </p>
    @endforeach
</div>
@endif

<form action="{{ route('register') }}" method="POST" class="space-y-md">
    @csrf

    {{-- Role Selection --}}
    <div class="space-y-xs">
        <label class="font-label-lg text-label-lg text-on-surface-variant px-1">I am a *</label>
        <div class="grid grid-cols-2 gap-md">
            <label class="relative cursor-pointer">
                <input type="radio" name="role" value="farmer" class="peer sr-only" {{ old('role') === 'buyer' ? '' : 'checked' }}>
                <div class="flex items-center gap-sm p-md border-2 border-outline-variant/30 rounded-xl transition-all peer-checked:border-primary peer-checked:bg-primary/5 hover:border-primary/50">
                    <span class="material-symbols-outlined text-primary text-[24px]" style="font-variation-settings:'FILL' 1;">agriculture</span>
                    <div>
                        <p class="font-label-lg text-on-surface">Farmer</p>
                        <p class="font-label-sm text-on-surface-variant">Sell produce</p>
                    </div>
                </div>
            </label>
            <label class="relative cursor-pointer">
                <input type="radio" name="role" value="buyer" class="peer sr-only" {{ old('role') === 'buyer' ? 'checked' : '' }}>
                <div class="flex items-center gap-sm p-md border-2 border-outline-variant/30 rounded-xl transition-all peer-checked:border-primary peer-checked:bg-primary/5 hover:border-primary/50">
                    <span class="material-symbols-outlined text-primary text-[24px]" style="font-variation-settings:'FILL' 1;">storefront</span>
                    <div>
                        <p class="font-label-lg text-on-surface">Buyer</p>
                        <p class="font-label-sm text-on-surface-variant">Purchase produce</p>
                    </div>
                </div>
            </label>
        </div>
        @error('role')<p class="font-label-sm text-label-sm text-error px-1">{{ $message }}</p>@enderror
    </div>

    {{-- Full Name --}}
    <div class="space-y-xs">
        <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="name">Full Name *</label>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">person</span>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Rajesh Kumar"
                class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50 @error('name') border-error @enderror"
                autocomplete="name" required/>
        </div>
        @error('name')<p class="font-label-sm text-label-sm text-error px-1">{{ $message }}</p>@enderror
    </div>

    {{-- Email --}}
    <div class="space-y-xs">
        <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="reg_email">Email Address *</label>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">mail</span>
            <input id="reg_email" name="email" type="email" value="{{ old('email') }}" placeholder="farmer@agrimandi.in"
                class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50 @error('email') border-error @enderror"
                autocomplete="email" required/>
        </div>
        @error('email')<p class="font-label-sm text-label-sm text-error px-1">{{ $message }}</p>@enderror
    </div>

    {{-- Phone --}}
    <div class="space-y-xs">
        <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="phone">Mobile Number *</label>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">phone</span>
            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="+91 98765 43210"
                class="w-full h-14 pl-12 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50 @error('phone') border-error @enderror"
                autocomplete="tel" required/>
        </div>
        @error('phone')<p class="font-label-sm text-label-sm text-error px-1">{{ $message }}</p>@enderror
    </div>

    {{-- State & District --}}
    <div class="grid grid-cols-2 gap-md">
        <div class="space-y-xs">
            <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="state">State</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[18px]">location_on</span>
                <select id="state" name="state"
                    class="w-full h-14 pl-10 pr-8 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all appearance-none cursor-pointer @error('state') border-error @enderror"
                    style="background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236c7a71' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e\"); background-repeat: no-repeat; background-position: right 0.5rem center; background-size: 1.5em 1.5em;">
                    <option value="">Select State</option>
                    <optgroup label="── Major Agricultural States ──">
                        <option value="Uttar Pradesh"    {{ old('state') === 'Uttar Pradesh'    ? 'selected' : '' }}>Uttar Pradesh</option>
                        <option value="Madhya Pradesh"    {{ old('state') === 'Madhya Pradesh'    ? 'selected' : '' }}>Madhya Pradesh</option>
                        <option value="Maharashtra"    {{ old('state') === 'Maharashtra'    ? 'selected' : '' }}>Maharashtra</option>
                        <option value="Punjab"    {{ old('state') === 'Punjab'    ? 'selected' : '' }}>Punjab</option>
                        <option value="Haryana"    {{ old('state') === 'Haryana'    ? 'selected' : '' }}>Haryana</option>
                        <option value="Rajasthan"    {{ old('state') === 'Rajasthan'    ? 'selected' : '' }}>Rajasthan</option>
                        <option value="Gujarat"    {{ old('state') === 'Gujarat'    ? 'selected' : '' }}>Gujarat</option>
                        <option value="Andhra Pradesh"    {{ old('state') === 'Andhra Pradesh'    ? 'selected' : '' }}>Andhra Pradesh</option>
                        <option value="Karnataka"    {{ old('state') === 'Karnataka'    ? 'selected' : '' }}>Karnataka</option>
                        <option value="Tamil Nadu"    {{ old('state') === 'Tamil Nadu'    ? 'selected' : '' }}>Tamil Nadu</option>
                        <option value="West Bengal"    {{ old('state') === 'West Bengal'    ? 'selected' : '' }}>West Bengal</option>
                        <option value="Bihar"    {{ old('state') === 'Bihar'    ? 'selected' : '' }}>Bihar</option>
                        <option value="Odisha"    {{ old('state') === 'Odisha'    ? 'selected' : '' }}>Odisha</option>
                    </optgroup>
                    <optgroup label="── Other States ──">
                        <option value="AR"    {{ old('state') === 'AR'    ? 'selected' : '' }}>Arunachal Pradesh</option>
                        <option value="AS"    {{ old('state') === 'AS'    ? 'selected' : '' }}>Assam</option>
                        <option value="CG"    {{ old('state') === 'CG'    ? 'selected' : '' }}>Chhattisgarh</option>
                        <option value="GA"    {{ old('state') === 'GA'    ? 'selected' : '' }}>Goa</option>
                        <option value="HP"    {{ old('state') === 'HP'    ? 'selected' : '' }}>Himachal Pradesh</option>
                        <option value="JH"    {{ old('state') === 'JH'    ? 'selected' : '' }}>Jharkhand</option>
                        <option value="KL"    {{ old('state') === 'KL'    ? 'selected' : '' }}>Kerala</option>
                        <option value="MN"    {{ old('state') === 'MN'    ? 'selected' : '' }}>Manipur</option>
                        <option value="ML"    {{ old('state') === 'ML'    ? 'selected' : '' }}>Meghalaya</option>
                        <option value="MZ"    {{ old('state') === 'MZ'    ? 'selected' : '' }}>Mizoram</option>
                        <option value="NL"    {{ old('state') === 'NL'    ? 'selected' : '' }}>Nagaland</option>
                        <option value="SK"    {{ old('state') === 'SK'    ? 'selected' : '' }}>Sikkim</option>
                        <option value="TL"    {{ old('state') === 'TL'    ? 'selected' : '' }}>Telangana</option>
                        <option value="TR"    {{ old('state') === 'TR'    ? 'selected' : '' }}>Tripura</option>
                        <option value="UK"    {{ old('state') === 'UK'    ? 'selected' : '' }}>Uttarakhand</option>
                    </optgroup>
                    <optgroup label="── Union Territories ──">
                        <option value="AN"    {{ old('state') === 'AN'    ? 'selected' : '' }}>Andaman & Nicobar</option>
                        <option value="CH"    {{ old('state') === 'CH'    ? 'selected' : '' }}>Chandigarh</option>
                        <option value="DD"    {{ old('state') === 'DD'    ? 'selected' : '' }}>Dadra & Nagar Haveli</option>
                        <option value="DL"    {{ old('state') === 'DL'    ? 'selected' : '' }}>Delhi (NCT)</option>
                        <option value="JK"    {{ old('state') === 'JK'    ? 'selected' : '' }}>Jammu & Kashmir</option>
                        <option value="LA"    {{ old('state') === 'LA'    ? 'selected' : '' }}>Ladakh</option>
                        <option value="LD"    {{ old('state') === 'LD'    ? 'selected' : '' }}>Lakshadweep</option>
                        <option value="PY"    {{ old('state') === 'PY'    ? 'selected' : '' }}>Puducherry</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="space-y-xs">
            <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="district">District</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[18px]">map</span>
                <input id="district" name="district" type="text" value="{{ old('district') }}" placeholder="e.g. Dewas"
                    class="w-full h-14 pl-10 pr-4 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50"/>
            </div>
        </div>
    </div>

    {{-- Password --}}
    <div class="space-y-xs">
        <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="reg_password">Password *</label>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
            <input id="reg_password" name="password" type="password" placeholder="Minimum 8 characters"
                class="w-full h-14 pl-12 pr-12 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50 @error('password') border-error @enderror"
                autocomplete="new-password" required/>
            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors" type="button" id="toggleRegPassword" aria-label="Toggle password visibility">
                <span class="material-symbols-outlined" id="toggleRegPasswordIcon">visibility</span>
            </button>
        </div>
        @error('password')<p class="font-label-sm text-label-sm text-error px-1">{{ $message }}</p>@enderror
    </div>

    {{-- Confirm Password --}}
    <div class="space-y-xs">
        <label class="font-label-lg text-label-lg text-on-surface-variant px-1" for="password_confirmation">Confirm Password *</label>
        <div class="relative">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock_reset</span>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Re-enter password"
                class="w-full h-14 pl-12 pr-12 bg-surface-container-low border border-outline-variant/30 rounded-xl font-body-md text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline/50"
                autocomplete="new-password" required/>
            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors" type="button" id="toggleConfirmPassword" aria-label="Toggle confirm password visibility">
                <span class="material-symbols-outlined" id="toggleConfirmPasswordIcon">visibility</span>
            </button>
        </div>
    </div>

    {{-- Terms --}}
    <div class="flex items-start gap-sm px-1">
        <input class="w-5 h-5 mt-0.5 rounded border-outline-variant text-primary focus:ring-primary/30 flex-shrink-0" id="terms" type="checkbox" required/>
        <label class="font-body-md text-body-md text-on-surface-variant" for="terms">
            I agree to the <a href="#" class="text-primary hover:underline font-bold">Terms of Service</a> and <a href="#" class="text-primary hover:underline font-bold">Privacy Policy</a>
        </label>
    </div>

    {{-- Submit --}}
    <button class="w-full h-14 bg-primary text-white font-label-lg text-label-lg rounded-xl shadow-lg shadow-primary/20 hover:bg-tertiary active:scale-[0.98] transition-all flex items-center justify-center gap-sm" type="submit" id="registerBtn">
        Create My Account
        <span class="material-symbols-outlined text-[20px]">person_add</span>
    </button>
</form>

<div class="mt-xl text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
    Already have an account? 
    <a class="text-primary font-bold hover:underline ml-1" href="{{ route('login') }}">Sign In</a>
</p>
</div>
</div>
</div>
</section>
</main>

@push('scripts')
<script>
// Password toggles
function setupPasswordToggle(btnId, iconId, inputId) {
    const btn = document.getElementById(btnId);
    const icon = document.getElementById(iconId);
    const input = document.getElementById(inputId);
    if (btn && icon && input) {
        btn.addEventListener('click', function() {
            const isPass = input.type === 'password';
            input.type = isPass ? 'text' : 'password';
            icon.textContent = isPass ? 'visibility_off' : 'visibility';
        });
    }
}
setupPasswordToggle('toggleRegPassword', 'toggleRegPasswordIcon', 'reg_password');
setupPasswordToggle('toggleConfirmPassword', 'toggleConfirmPasswordIcon', 'password_confirmation');

// Register button loading state
const registerForm = document.querySelector('form[action="{{ route('register') }}"]');
const registerBtn = document.getElementById('registerBtn');
if (registerForm && registerBtn) {
    registerForm.addEventListener('submit', function() {
        registerBtn.disabled = true;
        registerBtn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">progress_activity</span> Creating Account...';
    });
}

// Role card visual selection
document.querySelectorAll('input[name="role"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        document.querySelectorAll('input[name="role"]').forEach(function(r) {
            r.closest('label').querySelector('div').classList.remove('border-primary', 'bg-primary/5');
            r.closest('label').querySelector('div').classList.add('border-outline-variant/30');
        });
        this.closest('label').querySelector('div').classList.add('border-primary', 'bg-primary/5');
        this.closest('label').querySelector('div').classList.remove('border-outline-variant/30');
    });
    // Init state
    if (radio.checked) {
        radio.closest('label').querySelector('div').classList.add('border-primary', 'bg-primary/5');
        radio.closest('label').querySelector('div').classList.remove('border-outline-variant/30');
    }
});
</script>
@endpush
@endsection
