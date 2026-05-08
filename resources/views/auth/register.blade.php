@extends('layouts.app')

@section('title', 'Register')

@section('content')
<body class="bg-background text-on-background font-body-md text-body-md antialiased min-h-screen flex items-center justify-center">
    <!-- Background -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1574943320219-553eb213f72d?q=80&w=2940&auto=format&fit=crop')] bg-cover bg-center bg-fixed"></div>
    <div class="absolute inset-0 bg-background/95 backdrop-blur-[20px] pointer-events-none"></div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-md px-margin-desktop">
        <div class="bg-surface/10 backdrop-blur-2xl border border-white/10 rounded-2xl p-8 shadow-2xl before:absolute before:inset-0 before:rounded-2xl before:border-t before:border-l before:border-white/20 before:pointer-events-none">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-primary/10 border border-primary/30 mb-4">
                    <span class="material-symbols-outlined text-[32px] text-primary">agriculture</span>
                </div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Join AgriNova</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Create your account and start trading</p>
            </div>

            <!-- Form -->
            <form class="space-y-4">
                <!-- Name -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">Full Name *</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">person</span>
                        <input type="text" placeholder="Your full name" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">Email Address *</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">mail</span>
                        <input type="email" placeholder="your.email@example.com" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                    </div>
                </div>

                <!-- Phone -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">Phone Number *</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">phone</span>
                        <input type="tel" placeholder="+91 XXXXX XXXXX" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                    </div>
                </div>

                <!-- Account Type -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-3">I am a: *</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="role" value="farmer" class="w-4 h-4 cursor-pointer accent-primary" checked />
                            <span class="font-body-md text-body-md text-on-surface">Farmer / Producer</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="role" value="buyer" class="w-4 h-4 cursor-pointer accent-primary" />
                            <span class="font-body-md text-body-md text-on-surface">Buyer / Wholesaler</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="role" value="processor" class="w-4 h-4 cursor-pointer accent-primary" />
                            <span class="font-body-md text-body-md text-on-surface">Processor / Distributor</span>
                        </label>
                    </div>
                </div>

                <!-- Business Name (Conditional) -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">Business / Farm Name *</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">domain</span>
                        <input type="text" placeholder="Your business or farm name" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                    </div>
                </div>

                <!-- Location -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">State / Region *</label>
                    <select class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg px-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all">
                        <option selected disabled>Select your region</option>
                        <option>North India</option>
                        <option>Central India</option>
                        <option>South India</option>
                        <option>East India</option>
                        <option>West India</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">Password *</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">lock</span>
                        <input type="password" placeholder="Create a strong password" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Min. 8 characters with uppercase, number & symbol</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block font-label-bold text-label-bold text-on-surface mb-2">Confirm Password *</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant">lock</span>
                        <input type="password" placeholder="Confirm your password" class="w-full bg-surface/50 border border-white/10 focus:border-primary focus:ring-1 focus:ring-primary/50 rounded-lg pl-10 pr-4 py-2 text-on-surface placeholder-on-surface-variant focus:outline-none transition-all" />
                    </div>
                </div>

                <!-- Agreements -->
                <div class="space-y-3 pt-2">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 cursor-pointer accent-primary mt-0.5" checked />
                        <span class="font-body-sm text-body-sm text-on-surface-variant">
                            I agree to the
                            <a href="#" class="text-primary hover:text-primary/80 transition-colors">Terms of Service</a>
                            and
                            <a href="#" class="text-primary hover:text-primary/80 transition-colors">Privacy Policy</a>
                        </span>
                    </label>

                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 cursor-pointer accent-primary mt-0.5" />
                        <span class="font-body-sm text-body-sm text-on-surface-variant">
                            I want to receive news, product updates, and special offers
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-primary text-on-primary hover:bg-primary/80 transition-colors py-3 rounded-lg font-label-bold text-label-bold mt-6 shadow-lg shadow-primary/50 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">check_circle</span> Create Account
                </button>

                <!-- Login Link -->
                <div class="text-center pt-4 border-t border-white/10">
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Already have an account?
                        <a href="/login" class="text-primary hover:text-primary/80 transition-colors font-label-bold text-label-bold">Sign In</a>
                    </p>
                </div>
            </form>

            <!-- Social Registration (Optional) -->
            <div class="mt-6 pt-6 border-t border-white/10">
                <p class="text-center font-body-sm text-body-sm text-on-surface-variant mb-4">Or register with</p>
                <div class="flex gap-3">
                    <button class="flex-1 bg-surface/50 hover:bg-surface/70 transition-colors border border-white/10 rounded-lg py-2 flex items-center justify-center gap-2 font-label-bold text-label-bold text-on-surface">
                        <span class="material-symbols-outlined text-[20px]">account_circle</span> Google
                    </button>
                    <button class="flex-1 bg-surface/50 hover:bg-surface/70 transition-colors border border-white/10 rounded-lg py-2 flex items-center justify-center gap-2 font-label-bold text-label-bold text-on-surface">
                        <span class="material-symbols-outlined text-[20px]">badge</span> GitHub
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="text-center mt-6">
            <p class="font-body-sm text-body-sm text-on-surface-variant">
                By registering, you're joining {{ config('app.name', 'AgriNova') }} and committed to fair trade practices
            </p>
        </div>
    </div>
</body>
@endsection
