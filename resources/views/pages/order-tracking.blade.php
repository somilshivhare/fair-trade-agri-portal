@extends('layouts.app')

@section('title', 'Order Tracking')

@section('content')
<body class="bg-background text-on-background font-body-md text-body-md antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 h-16 bg-surface/90 backdrop-blur-2xl border-b border-white/10 z-40 flex items-center px-margin-desktop justify-between shadow-xl">
        <div class="flex items-center gap-8">
            <a class="text-lg font-black text-primary flex items-center gap-2" href="/">
                <span class="material-symbols-outlined text-[28px]">agriculture</span> AgriNova
            </a>
        </div>
        <div class="flex items-center gap-4">
            <button class="bg-surface-container p-2 hover:bg-surface-container-high transition-colors rounded-lg border border-white/10">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <button class="w-10 h-10 rounded-full border border-white/10 bg-surface-container flex items-center justify-center hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined">account_circle</span>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 pb-16 px-margin-desktop bg-[url('https://images.unsplash.com/photo-1574943320219-553eb213f72d?q=80&w=2940&auto=format&fit=crop')] bg-cover bg-center bg-fixed">
        <div class="absolute inset-0 bg-background/95 backdrop-blur-[20px] pointer-events-none mt-16"></div>
        <div class="relative z-10 max-w-container-max mx-auto">
            <!-- Header -->
            <section class="mb-margin-desktop">
                <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Order Tracking</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Monitor your shipments and logistics in real-time.</p>
            </section>

            <!-- Tabs -->
            <div class="flex gap-4 mb-margin-desktop border-b border-white/10 overflow-x-auto">
                <button class="text-primary font-label-bold text-label-bold pb-4 px-4 border-b-2 border-primary whitespace-nowrap">
                    All Orders (12)
                </button>
                <button class="text-on-surface-variant font-label-bold text-label-bold pb-4 px-4 hover:text-primary transition-colors whitespace-nowrap">
                    In Transit (4)
                </button>
                <button class="text-on-surface-variant font-label-bold text-label-bold pb-4 px-4 hover:text-primary transition-colors whitespace-nowrap">
                    Delivered (6)
                </button>
                <button class="text-on-surface-variant font-label-bold text-label-bold pb-4 px-4 hover:text-primary transition-colors whitespace-nowrap">
                    Pending (2)
                </button>
            </div>

            <!-- Orders List -->
            <div class="space-y-gutter">
                @for($i = 0; $i < 4; $i++)
                    <div class="bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl hover:bg-surface-container/60 transition-colors">
                        <!-- Order Header -->
                        <div class="flex items-start justify-between mb-6 pb-4 border-b border-white/5">
                            <div>
                                <h3 class="font-headline-md text-headline-md text-on-surface mb-1">Order #{{ 10001 + $i }}</h3>
                                <div class="flex items-center gap-4 text-on-surface-variant font-body-sm text-body-sm">
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">schedule</span> Placed {{ 3 + $i }} days ago
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">location_on</span> {{ ['Mumbai', 'Delhi', 'Bangalore', 'Chennai'][$i] }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                @if($i === 0)
                                    <span class="bg-emerald-500/20 text-emerald-400 px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold flex items-center gap-1 mb-2">
                                        <span class="material-symbols-outlined text-[14px]">check_circle</span> Delivered
                                    </span>
                                @elseif($i === 1)
                                    <span class="bg-primary/20 text-primary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold flex items-center gap-1 mb-2">
                                        <span class="material-symbols-outlined text-[14px] animate-pulse">local_shipping</span> In Transit
                                    </span>
                                @else
                                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold flex items-center gap-1 mb-2">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span> Processing
                                    </span>
                                @endif
                                <div class="font-headline-md text-headline-md text-on-surface">${{ 8000 + $i * 2000 }}</div>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 pb-6 border-b border-white/5">
                            <div>
                                <div class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider mb-2">Crop Details</div>
                                <div class="font-body-md text-body-md text-on-surface">{{ ['Premium Wheat', 'Basmati Rice', 'Soybeans', 'Cotton'][rand(0, 3)] }}</div>
                                <div class="font-label-sm text-label-sm text-on-surface-variant">{{ 50 + $i * 10 }} tons</div>
                            </div>

                            <div>
                                <div class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider mb-2">From</div>
                                <div class="font-body-md text-body-md text-on-surface">{{ ['Azadpur Mandi', 'Yeshwantpur Market', 'Panjab Facility', 'East Coast Terminal'][$i] }}</div>
                                <div class="font-label-sm text-label-sm text-on-surface-variant">{{ ['Delhi', 'Bangalore', 'Punjab', 'Chennai'][$i] }}</div>
                            </div>

                            <div>
                                <div class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider mb-2">To</div>
                                <div class="font-body-md text-body-md text-on-surface">{{ ['Processing Plant', 'Distribution Hub', 'Export Facility', 'Retail Center'][$i] }}</div>
                                <div class="font-label-sm text-label-sm text-on-surface-variant">Est. {{ 4 + $i }} days</div>
                            </div>
                        </div>

                        <!-- Timeline/Status -->
                        <div>
                            <div class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-wider mb-4">Logistics Timeline</div>
                            <div class="space-y-3">
                                @foreach(['Order Confirmed', 'Quality Checked', 'Loading Started', 'In Transit', 'Out for Delivery'] as $step)
                                    @php
                                        $stepIndex = array_search($step, ['Order Confirmed', 'Quality Checked', 'Loading Started', 'In Transit', 'Out for Delivery']);
                                        $isCompleted = $stepIndex < (2 + $i);
                                        $isCurrent = $stepIndex === (2 + $i);
                                    @endphp
                                    <div class="flex items-start gap-4 relative">
                                        <div class="flex flex-col items-center">
                                            <div class="w-8 h-8 rounded-full border-2 {{ $isCompleted || $isCurrent ? 'border-primary bg-primary/20' : 'border-white/10 bg-surface/30' }} flex items-center justify-center">
                                                <span class="material-symbols-outlined text-[16px] {{ $isCompleted || $isCurrent ? 'text-primary' : 'text-on-surface-variant' }}">{{ $isCompleted ? 'check_circle' : 'radio_button_unchecked' }}</span>
                                            </div>
                                            @if($loop->notLast)
                                                <div class="w-0.5 h-12 {{ $isCompleted && !$isCurrent ? 'bg-primary' : 'bg-white/10' }}"></div>
                                            @endif
                                        </div>
                                        <div class="py-1">
                                            <div class="font-label-bold text-label-bold {{ $isCompleted || $isCurrent ? 'text-on-surface' : 'text-on-surface-variant' }}">{{ $step }}</div>
                                            <div class="font-body-sm text-body-sm text-on-surface-variant">
                                                @if($isCompleted)
                                                    Completed {{ rand(1, 3) }} days ago
                                                @elseif($isCurrent)
                                                    Currently {{ strtolower($step) }}
                                                @else
                                                    Pending
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-3 mt-6 pt-4 border-t border-white/5">
                            <button class="flex-1 bg-surface-container border border-white/10 text-on-surface hover:bg-surface-container-high transition-colors py-2 rounded-lg font-label-bold text-label-bold flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">visibility</span> View Details
                            </button>
                            <button class="flex-1 bg-primary text-on-primary hover:bg-primary/80 transition-colors py-2 rounded-lg font-label-bold text-label-bold flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">map</span> Track on Map
                            </button>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Quality Report Section -->
            <section class="mt-margin-desktop bg-surface-container/40 backdrop-blur-xl border border-white/5 rounded-xl p-6 shadow-2xl">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">verified</span> Quality Reports
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @for($i = 0; $i < 2; $i++)
                        <div class="bg-surface/30 border border-white/5 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="font-label-bold text-label-bold text-on-surface">Order #{{ 10001 + $i }}</h3>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant">Quality inspection completed</p>
                                </div>
                                <span class="bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded font-label-sm text-label-sm font-semibold">{{ 95 + rand(0, 5) }}%</span>
                            </div>

                            <div class="space-y-2 text-body-sm text-body-sm">
                                <div class="flex justify-between text-on-surface-variant">
                                    <span>Moisture Content</span>
                                    <span class="text-on-surface">{{ 12 + rand(0, 3) }}%</span>
                                </div>
                                <div class="flex justify-between text-on-surface-variant">
                                    <span>Protein Level</span>
                                    <span class="text-on-surface">{{ 13 + rand(0, 2) }}%</span>
                                </div>
                                <div class="flex justify-between text-on-surface-variant">
                                    <span>Grade</span>
                                    <span class="text-on-surface font-semibold">{{ ['A', 'A+', 'B'][$i] }}</span>
                                </div>
                            </div>

                            <button class="w-full mt-4 bg-surface-container border border-white/10 text-on-surface hover:bg-surface-container-high transition-colors py-2 rounded-lg font-label-bold text-label-bold text-sm flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">download</span> Download Report
                            </button>
                        </div>
                    @endfor
                </div>
            </section>
        </div>
    </main>
</body>
@endsection
