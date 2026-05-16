<div class="flex items-center gap-3">
    <!-- Language Selector -->
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center gap-2 px-3 py-1.5 rounded-full text-on-surface-variant hover:bg-primary/5 transition-all active:scale-95 border border-outline-variant/10 bg-surface-container-low/30 backdrop-blur-md">
            <span class="material-symbols-outlined text-[18px]">language</span>
            <span class="font-label-md text-[12px] font-bold uppercase tracking-tight">{{ app()->getLocale() }}</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
        </button>
        <div x-show="open" @click.away="open = false" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             class="absolute right-0 mt-2 w-48 bg-white border border-outline-variant/20 rounded-xl shadow-2xl z-[100] overflow-hidden p-1.5">
            @php
                $langs = [
                    'en' => ['name' => 'English', 'flag' => '🇺🇸'],
                    'hi' => ['name' => 'हिंदी', 'flag' => '🇮🇳'],
                    'mr' => ['name' => 'मराठी', 'flag' => '🇮🇳'],
                    'gu' => ['name' => 'ગુજરાતી', 'flag' => '🇮🇳'],
                    'pa' => ['name' => 'ਪੰਜਾਬੀ', 'flag' => '🇮🇳']
                ];
            @endphp
            @foreach($langs as $code => $data)
                <a href="{{ route('set-locale', $code) }}" class="flex items-center gap-2 px-3 py-2 rounded-lg font-label-md text-[13px] text-on-surface hover:bg-primary/5 hover:text-primary transition-all {{ app()->getLocale() == $code ? 'bg-primary/5 text-primary font-bold' : '' }}">
                    <span class="text-base">{{ $data['flag'] }}</span>
                    <span>{{ $data['name'] }}</span>
                </a>
            @endforeach
        </div>
    </div>

    @auth
    <!-- Notification & Profile -->
    <div class="flex items-center gap-2">

        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center gap-2 bg-surface-container-low/30 backdrop-blur-md border border-outline-variant/10 p-0.5 pr-3 rounded-full hover:shadow-lg transition-all active:scale-95 group">
                <img alt="Profile" class="w-8 h-8 rounded-full object-cover border border-outline-variant/20 group-hover:border-primary/30 transition-colors" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=10B981&color=fff' }}"/>
                <span class="font-label-md text-[13px] font-bold text-on-surface hidden lg:block">{{ auth()->user()->name }}</span>
                <span class="material-symbols-outlined text-[16px] text-on-surface-variant/60 transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
            </button>
            <div x-show="open" @click.away="open = false" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 class="absolute right-0 mt-2 w-64 bg-white border border-outline-variant/20 rounded-2xl shadow-2xl z-[100] overflow-hidden p-2">
                
                <div class="px-4 py-3 border-b border-outline-variant/10 mb-1">
                    <p class="text-label-sm text-outline uppercase tracking-wider">Account</p>
                    <p class="font-bold text-on-surface truncate">{{ auth()->user()->email }}</p>
                </div>

                <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-on-surface hover:bg-primary/5 hover:text-primary transition-all">
                    <span class="material-symbols-outlined text-[20px]">dashboard</span> {{ __('messages.dashboard') }}
                </a>
                <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-on-surface hover:bg-primary/5 hover:text-primary transition-all">
                    <span class="material-symbols-outlined text-[20px]">person</span> {{ __('messages.profile') }}
                </a>
                <div class="h-px bg-outline-variant/10 my-1"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl font-label-md text-error hover:bg-error/5 transition-all text-left">
                        <span class="material-symbols-outlined text-[20px]">logout</span> {{ __('messages.logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="flex items-center gap-3">
        <a href="{{ route('login') }}" class="text-on-surface px-6 py-2.5 rounded-xl font-label-md hover:bg-surface-container-high transition-all">{{ __('messages.login') }}</a>
        <a href="{{ route('register') }}" class="bg-primary text-on-primary px-8 py-3 rounded-xl font-label-md hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary/20">{{ __('messages.register') }}</a>
    </div>
    @endauth
</div>
