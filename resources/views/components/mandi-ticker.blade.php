<div class="w-full bg-surface-container-lowest py-2 border-b border-outline-variant/10 overflow-hidden relative z-[60]" x-data="mandiTicker()">
    <div class="flex items-center gap-12 whitespace-nowrap px-margin-desktop animate-marquee-fast" 
         @mouseenter="pause = true" @mouseleave="pause = false">
        
        {{-- Original Items --}}
        <template x-for="(item, index) in commodities" :key="'orig-' + index">
            <div class="flex items-center gap-2 group cursor-default premium-hover-sm transition-transform hover:scale-105">
                <span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider font-bold" x-text="item.name"></span>
                <div class="flex items-center gap-1 overflow-hidden h-6">
                    <span class="text-label-sm font-label-sm font-bold transition-all duration-500" 
                          :class="item.trend === 'up' ? 'text-primary' : 'text-error'"
                          x-text="'₹' + item.price.toLocaleString()"></span>
                    <span class="material-symbols-outlined text-[14px] transition-all duration-500" 
                          :class="item.trend === 'up' ? 'text-primary' : 'text-error'"
                          x-text="item.trend === 'up' ? 'arrow_drop_up' : 'arrow_drop_down'"></span>
                </div>
                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded" 
                      :class="item.trend === 'up' ? 'bg-primary/10 text-primary' : 'bg-error/10 text-error'"
                      x-text="(item.trend === 'up' ? '+' : '-') + item.diff"></span>
            </div>
        </template>

        {{-- Duplicated Items for Seamless Loop --}}
        <template x-for="(item, index) in commodities" :key="'dup-' + index">
            <div class="flex items-center gap-2 group cursor-default premium-hover-sm transition-transform hover:scale-105">
                <span class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider font-bold" x-text="item.name"></span>
                <div class="flex items-center gap-1 overflow-hidden h-6">
                    <span class="text-label-sm font-label-sm font-bold transition-all duration-500" 
                          :class="item.trend === 'up' ? 'text-primary' : 'text-error'"
                          x-text="'₹' + item.price.toLocaleString()"></span>
                    <span class="material-symbols-outlined text-[14px] transition-all duration-500" 
                          :class="item.trend === 'up' ? 'text-primary' : 'text-error'"
                          x-text="item.trend === 'up' ? 'arrow_drop_up' : 'arrow_drop_down'"></span>
                </div>
                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded" 
                      :class="item.trend === 'up' ? 'bg-primary/10 text-primary' : 'bg-error/10 text-error'"
                      x-text="(item.trend === 'up' ? '+' : '-') + item.diff"></span>
            </div>
        </template>
    </div>

    <style>
        @keyframes marquee-fast {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee-fast {
            display: flex;
            width: max-content;
            animation: marquee-fast 40s linear infinite;
        }
        .animate-marquee-fast:hover {
            animation-play-state: paused;
        }
        .premium-hover-sm:hover {
            text-shadow: 0 0 12px rgba(16, 185, 129, 0.2);
        }
        [x-cloak] { display: none !important; }
    </style>

    <script>
        function mandiTicker() {
            return {
                pause: false,
                commodities: [
                    { name: 'Wheat', price: 2450, diff: 12, trend: 'up' },
                    { name: 'Rice', price: 6800, diff: 45, trend: 'up' },
                    { name: 'Tomato', price: 1240, diff: 8, trend: 'down' },
                    { name: 'Onion', price: 1850, diff: 5, trend: 'up' },
                    { name: 'Potato', price: 980, diff: 12, trend: 'down' },
                    { name: 'Turmeric', price: 8500, diff: 110, trend: 'up' },
                    { name: 'Cotton', price: 7200, diff: 30, trend: 'up' },
                    { name: 'Maize', price: 1950, diff: 15, trend: 'down' },
                    { name: 'Soybean', price: 4800, diff: 22, trend: 'up' },
                    { name: 'Mustard', price: 5400, diff: 40, trend: 'down' }
                ],
                init() {
                    this.startUpdates();
                },
                startUpdates() {
                    this.commodities.forEach((item, index) => {
                        this.scheduleUpdate(index);
                    });
                },
                scheduleUpdate(index) {
                    // Random interval between 2 and 5 seconds for each commodity
                    const nextUpdate = 2000 + Math.random() * 3000;
                    setTimeout(() => {
                        this.updatePrice(index);
                        this.scheduleUpdate(index);
                    }, nextUpdate);
                },
                updatePrice(index) {
                    const item = this.commodities[index];
                    const change = Math.floor(Math.random() * 11); // 0-10
                    const isUp = Math.random() > 0.45; // Slightly biased towards 'up'
                    
                    if (isUp) {
                        item.price += change;
                        item.diff = change;
                        item.trend = 'up';
                    } else {
                        item.price = Math.max(1, item.price - change);
                        item.diff = change;
                        item.trend = 'down';
                    }
                    
                    // Trigger a tiny pulse animation or glow if needed
                    // Alpine's reactivity handles the rest
                }
            }
        }
    </script>
</div>
