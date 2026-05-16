@extends('layouts.stitch')

@section('title', 'Direct MSP Procurement Submission - AgriMandi')

@section('content')
<div x-data="sellToGovEngine()" class="min-h-screen bg-slate-50 py-16 selection:bg-emerald-500 selection:text-white">
    <div class="max-w-[1200px] mx-auto px-6">
        <!-- 🏛️ HEADER SECTION -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <div class="space-y-4">
                <a href="{{ route('gov.index') }}" class="inline-flex items-center gap-2 text-[11px] font-black uppercase tracking-[0.2em] text-emerald-600 group">
                    <span class="material-symbols-outlined text-[18px] group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    Back to Portal
                </a>
                <h1 class="text-5xl md:text-6xl font-black text-slate-900 tracking-tighter">Sell harvest to <span class="text-emerald-600 italic">Government</span>.</h1>
                <p class="text-lg text-slate-500 max-w-xl font-medium">Direct procurement by Ministry of Agriculture with guaranteed MSP and 48-hour bank payouts.</p>
            </div>
            <div class="flex items-center gap-3 px-6 py-3 bg-white rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-[11px] font-black uppercase tracking-widest text-slate-400">System Time: <span class="text-slate-900" x-text="currentTimestamp"></span></span>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-12">
            <!-- 📝 MULTI-STEP FORM -->
            <div class="col-span-12 lg:col-span-8">
                <div class="bg-white rounded-[48px] border border-slate-200 shadow-2xl shadow-emerald-900/5 overflow-hidden">
                    <!-- Stepper -->
                    <div class="grid grid-cols-4 bg-slate-50 border-b border-slate-100 p-2 gap-2">
                        <template x-for="(stepName, index) in steps" :key="index">
                            <div class="flex flex-col items-center gap-2 p-4 rounded-[32px] transition-all"
                                 :class="currentStep === index + 1 ? 'bg-white shadow-sm' : 'opacity-40'">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-[11px] font-black"
                                     :class="currentStep >= index + 1 ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-500'"
                                     x-text="index + 1"></div>
                                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-900" x-text="stepName"></span>
                            </div>
                        </template>
                    </div>

                    <form @submit.prevent="submitForm()" x-show="!submitted" x-transition.opacity.duration.400ms class="p-12">
                        @csrf
                        
                        <!-- STEP 1: CROP & ORIGIN -->
                        <div x-show="currentStep === 1" x-transition.opacity.duration.400ms class="space-y-10">
                            <div class="space-y-4">
                                <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Harvest Selection</h3>
                                <p class="text-slate-500 font-medium">Select the commodity and origin for procurement verification.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-4">Select Commodity</label>
                                    <div class="relative">
                                        <select x-model="selectedCrop" name="commodity" class="w-full bg-slate-50 px-8 py-5 rounded-[24px] border border-slate-200 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all appearance-none font-bold text-slate-900" required>
                                            <option value="">Choose Crop</option>
                                            @foreach($mspPrices as $msp)
                                                <option value="{{ $msp->commodity }}" data-price="{{ $msp->price_per_quintal }}">{{ $msp->commodity }}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-symbols-outlined absolute right-8 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-4">Agency / Tender</label>
                                    <div class="relative">
                                        <select name="tender_id" class="w-full bg-slate-50 px-8 py-5 rounded-[24px] border border-slate-200 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all appearance-none font-bold text-slate-900">
                                            <option value="">Open Market Procurement</option>
                                            @foreach($tenders as $tender)
                                                <option value="{{ $tender->id }}">{{ $tender->agency_name }} ({{ $tender->tender_number }})</option>
                                            @endforeach
                                        </select>
                                        <span class="material-symbols-outlined absolute right-8 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-8 bg-emerald-50 rounded-[32px] border border-emerald-100 flex items-center gap-6">
                                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-emerald-600 shadow-sm">
                                    <span class="material-symbols-outlined text-[32px]">info</span>
                                </div>
                                <div>
                                    <h4 class="text-[11px] font-black text-emerald-600 uppercase tracking-widest mb-1">Live MSP Rate</h4>
                                    <p class="text-2xl font-black text-slate-900">₹<span x-text="formatNumber(currentMsp)">0</span><span class="text-sm font-bold text-slate-400 ml-1">/quintal</span></p>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 2: QUANTITY & QUALITY -->
                        <div x-show="currentStep === 2" x-transition.opacity.duration.400ms class="space-y-10">
                            <div class="space-y-4">
                                <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Quantity & Payout</h3>
                                <p class="text-slate-500 font-medium">Specify the amount you wish to sell. We'll calculate your guaranteed payout.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-4">Total Weight (Quintals)</label>
                                    <input type="number" x-model="quantity" name="quantity" class="w-full bg-slate-50 px-8 py-5 rounded-[24px] border border-slate-200 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all font-bold text-slate-900" placeholder="e.g. 150" required>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-4">Moisture Content (%)</label>
                                    <input type="number" name="moisture" class="w-full bg-slate-50 px-8 py-5 rounded-[24px] border border-slate-200 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all font-bold text-slate-900" placeholder="e.g. 11.5" required>
                                </div>
                            </div>

                            <div class="bg-slate-900 rounded-[40px] p-10 text-white relative overflow-hidden group">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                                <div class="relative z-10 flex justify-between items-center">
                                    <div>
                                        <p class="text-[10px] font-black text-white/40 uppercase tracking-[0.2em] mb-2">Estimated Government Payout</p>
                                        <h4 class="text-5xl font-black tracking-tighter text-emerald-400">₹<span x-text="formatNumber(quantity * currentMsp)">0</span></h4>
                                        <p class="text-[11px] font-bold text-white/60 mt-3 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-[16px] text-emerald-500">verified</span>
                                            Direct Bank Transfer (DBT) within 48 hours
                                        </p>
                                    </div>
                                    <div class="w-20 h-20 bg-white/5 rounded-3xl flex items-center justify-center border border-white/10">
                                        <span class="material-symbols-outlined text-4xl text-emerald-500">payments</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 3: LOGISTICS & CENTER -->
                        <div x-show="currentStep === 3" x-transition.opacity.duration.400ms class="space-y-10">
                            <div class="space-y-4">
                                <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Scheduling & Delivery</h3>
                                <p class="text-slate-500 font-medium">Choose your preferred procurement center and delivery date.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-4">Procurement Center</label>
                                    <select name="center_id" class="w-full bg-slate-50 px-8 py-5 rounded-[24px] border border-slate-200 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all font-bold text-slate-900" required>
                                        <option value="">Nearby Centers</option>
                                        <option value="1">Ludhiana Warehouse Hub</option>
                                        <option value="2">Indore Main APMC</option>
                                        <option value="3">Rajkot Government Silo</option>
                                    </select>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-4">Preferred Date</label>
                                    <input type="date" name="preferred_date" class="w-full bg-slate-50 px-8 py-5 rounded-[24px] border border-slate-200 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all font-bold text-slate-900" required>
                                </div>
                            </div>

                            <div class="p-8 border-2 border-dashed border-slate-200 rounded-[32px] flex flex-col items-center justify-center text-center space-y-4 hover:border-emerald-500/40 hover:bg-emerald-50/20 transition-all cursor-pointer">
                                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400">
                                    <span class="material-symbols-outlined text-4xl">local_shipping</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-black text-slate-900">Need Transport Support?</h4>
                                    <p class="text-sm text-slate-500 font-medium">Request government-verified logistics to your doorstep.</p>
                                </div>
                                <button type="button" class="px-6 py-2 bg-white border border-slate-200 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-900 hover:bg-slate-50 transition-all">Request Estimate</button>
                            </div>
                        </div>

                        <!-- STEP 4: VERIFICATION -->
                        <div x-show="currentStep === 4" x-transition.opacity.duration.400ms class="space-y-10">
                            <div class="space-y-4 text-center">
                                <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Final Verification</h3>
                                <p class="text-slate-500 font-medium">Verify your details and accept the procurement terms.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="p-10 bg-slate-50 rounded-[40px] border border-slate-100 space-y-6">
                                    <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Submission Summary</h4>
                                    <div class="space-y-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[13px] font-bold text-slate-500">Commodity</span>
                                            <span class="text-[13px] font-black text-slate-900" x-text="selectedCrop || 'Not selected'"></span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[13px] font-bold text-slate-500">Total Weight</span>
                                            <span class="text-[13px] font-black text-slate-900" x-text="quantity + ' Quintals'"></span>
                                        </div>
                                        <div class="flex justify-between items-center pt-4 border-t border-slate-200">
                                            <span class="text-[13px] font-bold text-slate-500">Final Payout</span>
                                            <span class="text-lg font-black text-emerald-600" x-text="'₹' + formatNumber(quantity * currentMsp)"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div class="flex gap-4 items-start p-6 bg-white border border-slate-200 rounded-[24px]">
                                        <div class="w-10 h-10 shrink-0 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                                            <span class="material-symbols-outlined">assignment_ind</span>
                                        </div>
                                        <p class="text-[11px] font-bold text-slate-500 leading-relaxed">
                                            I verify that the crop is from my own registered farmland and complies with the government's quality and moisture standards.
                                        </p>
                                    </div>
                                    <div class="flex gap-4 items-center px-6">
                                        <input type="checkbox" class="w-5 h-5 rounded-md border-slate-300 text-emerald-600 focus:ring-emerald-500/20" required>
                                        <span class="text-[11px] font-black text-slate-900 uppercase tracking-widest">Accept Official Terms</span>
                                    </div>
                                    
                                    <button type="submit" :disabled="submitting" class="w-full py-5 bg-emerald-600 text-white rounded-[24px] text-[12px] font-black uppercase tracking-[0.2em] shadow-2xl shadow-emerald-900/20 hover:bg-emerald-700 transition-all flex items-center justify-center gap-3 active:scale-95 disabled:opacity-50">
                                        <span x-text="submitting ? 'Processing...' : 'Confirm & Submit'"></span>
                                        <span class="material-symbols-outlined" x-text="submitting ? 'sync' : 'send'" :class="submitting && 'animate-spin'"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Form Navigation Buttons -->
                        <div x-show="currentStep < 4 || !submitting" class="mt-12 pt-8 border-t border-slate-100 flex justify-between items-center">
                            <button type="button" x-show="currentStep > 1" @click="currentStep--" class="px-8 py-4 bg-white text-slate-500 border border-slate-200 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all">Previous</button>
                            <div class="flex-1"></div>
                            <button type="button" x-show="currentStep < 4" @click="currentStep++" class="px-10 py-4 bg-slate-900 text-white rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-xl shadow-slate-900/10">Next Step</button>
                        </div>
                    </form>

                    <!-- 🎊 SUCCESS SCREEN -->
                    <div x-show="submitted" x-transition.opacity.duration.500ms class="p-24 flex flex-col items-center text-center space-y-10">
                        <div class="w-32 h-32 bg-emerald-500 rounded-[40px] flex items-center justify-center text-white shadow-2xl shadow-emerald-500/40 animate-bounce">
                            <span class="material-symbols-outlined text-6xl">check_circle</span>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-5xl font-black text-slate-900 tracking-tighter">Submission Successful!</h3>
                            <p class="text-xl text-slate-500 font-medium max-w-lg mx-auto">Your harvest has been registered for official procurement. Our agents will contact you for quality verification within 24 hours.</p>
                        </div>
                        <div class="p-8 bg-slate-50 rounded-[40px] border border-slate-100 w-full max-w-md space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Tracking ID</span>
                                <span class="text-[13px] font-black text-slate-900">#MSP-2024-99X21</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Est. Payout</span>
                                <span class="text-lg font-black text-emerald-600" x-text="'₹' + formatNumber(quantity * currentMsp)"></span>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ route('gov.index') }}" class="px-10 py-5 bg-slate-900 text-white rounded-[24px] text-[11px] font-black uppercase tracking-[0.2em] shadow-xl hover:bg-emerald-600 transition-all">Back to Portal</a>
                            <button @click="window.print()" class="px-10 py-5 bg-white text-slate-900 border border-slate-200 rounded-[24px] text-[11px] font-black uppercase tracking-[0.2em] hover:bg-slate-50 transition-all">Print Receipt</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🏛️ GUIDELINES SIDEBAR -->
            <div class="col-span-12 lg:col-span-4 space-y-8">
                <div class="bg-white p-10 rounded-[48px] border border-slate-200 shadow-sm space-y-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Official Guidelines</h3>
                    <div class="space-y-6">
                        @foreach([
                            ['icon' => 'water_drop', 'title' => 'Moisture Standard', 'desc' => 'Ensure grains have moisture below 12% for full MSP credit.'],
                            ['icon' => 'badge', 'title' => 'KYC Check', 'desc' => 'Keep your Aadhaar-linked mobile ready for OTP verification.'],
                            ['icon' => 'receipt_long', 'title' => 'DBT Payout', 'desc' => 'Funds are transferred to the bank linked in your profile within 48h.']
                        ] as $tip)
                            <div class="flex gap-4 items-start group">
                                <div class="w-10 h-10 shrink-0 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-emerald-50 group-hover:text-emerald-600 transition-all">
                                    <span class="material-symbols-outlined text-[20px]">{{ $tip['icon'] }}</span>
                                </div>
                                <div>
                                    <h4 class="text-[13px] font-black text-slate-900">{{ $tip['title'] }}</h4>
                                    <p class="text-[11px] font-medium text-slate-500 mt-0.5 leading-relaxed">{{ $tip['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pt-4">
                        <a href="#" class="block text-center text-[10px] font-black uppercase tracking-[0.2em] text-emerald-600 py-4 bg-emerald-50 rounded-2xl hover:bg-emerald-100 transition-all">Download Full Manual</a>
                    </div>
                </div>

                <div class="bg-[#005137] rounded-[48px] p-10 text-white relative overflow-hidden group shadow-2xl shadow-emerald-900/20">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-white/5 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2"></div>
                    <div class="relative z-10 space-y-6">
                        <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-4xl">support_agent</span>
                        </div>
                        <h4 class="text-2xl font-black tracking-tighter">Need Submission Assistance?</h4>
                        <p class="text-emerald-50/60 font-medium">Contact our 24/7 dedicated helpline for guidance in your local language.</p>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-emerald-300/50 uppercase tracking-widest">Toll Free Helpline</p>
                            <p class="text-3xl font-black text-white">1800-420-2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function sellToGovEngine() {
    return {
        currentStep: 1,
        steps: ['Crop & Origin', 'Quantity & Payout', 'Logistics', 'Final Submit'],
        selectedCrop: '',
        currentMsp: 0,
        quantity: 0,
        submitting: false,
        submitted: false,
        currentTimestamp: new Date().toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit' }),
        
        init() {
            this.$watch('selectedCrop', (val) => {
                if (!val) {
                    this.currentMsp = 0;
                    return;
                }
                const select = document.querySelector('select[name="commodity"]');
                const selectedOption = select.options[select.selectedIndex];
                this.currentMsp = parseInt(selectedOption.dataset.price) || 2150;
            });
            
            setInterval(() => {
                this.currentTimestamp = new Date().toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit' });
            }, 60000);
        },
        submitForm() {
            this.submitting = true;
            // Simulate API call
            setTimeout(() => {
                this.submitting = false;
                this.submitted = true;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }, 2000);
        },
        formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>
@endpush
@endsection
