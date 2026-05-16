<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-container-high": "#e6e8ea",
                    "tertiary": "#006c4b",
                    "gov-saffron": "#FF9933",
                    "gov-navy": "#000080",
                    "gov-ash": "#F8FAFC",
                    "surface-container-lowest": "#ffffff",
                    "surface-container": "#eceef0",
                    "outline-variant": "#bbcabf",
                    "on-secondary-container": "#586377",
                    "tertiary-fixed-dim": "#45dfa4",
                    "secondary": "#545f73",
                    "on-secondary-fixed-variant": "#3c475a",
                    "secondary-fixed-dim": "#bcc7de",
                    "outline": "#6c7a71",
                    "secondary-fixed": "#d8e3fb",
                    "on-tertiary-container": "#00422c",
                    "primary": "#006c49",
                    "on-surface-variant": "#3c4a42",
                    "on-surface": "#191c1e",
                    "secondary-container": "#d5e0f8",
                    "on-error": "#ffffff",
                    "tertiary-fixed": "#68fcbf",
                    "primary-fixed": "#6ffbbe",
                    "on-secondary-fixed": "#111c2d",
                    "on-primary-fixed-variant": "#005236",
                    "tertiary-container": "#00b982",
                    "inverse-surface": "#2d3133",
                    "on-error-container": "#93000a",
                    "surface-variant": "#e0e3e5",
                    "surface-container-low": "#f2f4f6",
                    "on-tertiary-fixed": "#002114",
                    "on-tertiary-fixed-variant": "#005137",
                    "on-background": "#191c1e",
                    "on-secondary": "#ffffff",
                    "background": "#f7f9fb",
                    "error": "#ba1a1a",
                    "error-container": "#ffdad6",
                    "surface-dim": "#d8dadc",
                    "inverse-on-surface": "#eff1f3",
                    "on-primary-container": "#00422b",
                    "surface-tint": "#006c49",
                    "on-tertiary": "#ffffff",
                    "surface-bright": "#f7f9fb",
                    "primary-fixed-dim": "#4edea3",
                    "surface-container-highest": "#e0e3e5",
                    "inverse-primary": "#4edea3",
                    "surface": "#f7f9fb",
                    "on-primary-fixed": "#002113",
                    "primary-container": "#10b981",
                    "on-primary": "#ffffff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "2xl": "16px",
                    "3xl": "24px",
                    "full": "9999px"
            },
            "spacing": {
                    "xs": "4px",
                    "gutter": "20px",
                    "unit": "4px",
                    "lg": "24px",
                    "xl": "40px",
                    "container-margin": "24px",
                    "md": "16px",
                    "sm": "8px",
                    "margin-desktop": "80px"
            },
            "fontFamily": {
                    "headline-lg": ["Manrope"],
                    "headline-md": ["Manrope"],
                    "label-lg": ["Manrope"],
                    "display-lg": ["Manrope"],
                    "headline-lg-mobile": ["Manrope"],
                    "body-lg": ["Manrope"],
                    "label-sm": ["Manrope"],
                    "body-md": ["Manrope"]
            },
            "fontSize": {
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
            line-height: 1;
        }
        .material-symbols-outlined.filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .emerald-glow {
            box-shadow: 0 8px 30px rgba(16, 185, 129, 0.06);
        }
        .gov-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
        }
        .text-gradient {
            background: linear-gradient(135deg, #006c49 0%, #00b982 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .premium-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .premium-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(16, 185, 129, 0.12);
        }
        .page-title {
            font-size: 36px;
            line-height: 44px;
            font-weight: 800;
            color: #191c1e;
            letter-spacing: -0.02em;
        }
        /* Base Input Styles */
        input:focus, select:focus, textarea:focus {
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(0, 108, 73, 0.1) !important;
        }
        /* Fix for invisible text on some browsers */
        input, select, textarea {
            color: #191c1e !important; /* on-surface */
        }
        /* Marquee Animation */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
<script src="//unpkg.com/alpinejs" defer></script>
@stack('styles')
</head>
<body class="bg-background text-on-background min-h-screen" style="font-family: 'Manrope', sans-serif;" 
      x-data="{ toasts: [] }" 
      @toast.window="toasts.push($event.detail); setTimeout(() => toasts = toasts.filter(t => t.id !== $event.detail.id), 5000)">
    {{-- Global Toast Component --}}
    <div class="fixed top-8 right-8 z-[100] flex flex-col gap-3 pointer-events-none">
        <template x-for="toast in toasts" :key="toast.id">
            <div x-show="true" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-x-8"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-x-0"
                 x-transition:leave-end="opacity-0 translate-x-8"
                 class="pointer-events-auto bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-4 shadow-2xl flex items-center gap-4 min-w-[320px]"
                 :class="{ 'border-primary/50': toast.type === 'success', 'border-error/50': toast.type === 'error' }">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" 
                     :class="{ 'bg-primary/10 text-primary': toast.type === 'success', 'bg-error/10 text-error': toast.type === 'error' }">
                    <span class="material-symbols-outlined" x-text="toast.type === 'success' ? 'check_circle' : 'error'"></span>
                </div>
                <div class="flex-1">
                    <p class="font-label-lg text-on-surface" x-text="toast.title"></p>
                    <p class="text-[11px] text-on-surface-variant" x-text="toast.message"></p>
                </div>
                <button @click="toasts = toasts.filter(t => t.id !== toast.id)" class="text-outline hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
        </template>
    </div>


    @yield('content')

<script>
    // Global UI Helpers
    window.AgriUI = {
        setupPasswordToggle: function(btnId, inputId, iconId) {
            const btn = document.getElementById(btnId);
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (btn && input && icon) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const isPass = input.type === 'password';
                    input.type = isPass ? 'text' : 'password';
                    icon.textContent = isPass ? 'visibility_off' : 'visibility';
                    icon.classList.toggle('filled', !isPass);
                });
            }
        },
        toast: function(title, message, type = 'success') {
            window.dispatchEvent(new CustomEvent('toast', {
                detail: { id: Date.now(), title, message, type }
            }));
        }
    };

    // Auto-trigger toasts from session flash
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('success'))
            AgriUI.toast('Success', "{{ session('success') }}", 'success');
        @endif
        @if(session('status'))
            AgriUI.toast('Status Update', "{{ session('status') }}", 'success');
        @endif
        @if(session('error'))
            AgriUI.toast('Error', "{{ session('error') }}", 'error');
        @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                AgriUI.toast('Validation Error', "{{ $error }}", 'error');
            @endforeach
        @endif
    });

    // Global Keyboard Shortcuts
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.querySelector('input[placeholder*="Search"]');
            if (searchInput) {
                searchInput.focus();
            }
        }
    });
</script>
@stack('scripts')
</body>
</html>
