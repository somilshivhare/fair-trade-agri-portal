<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title') - Fair Trade Agri-Portal</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#c8c9c9",
                        "surface-dim": "#11131b",
                        "tertiary-fixed": "#e2e2e2",
                        "surface-container-high": "#282a32",
                        "secondary-fixed": "#e2e2eb",
                        "on-surface": "#e1e2ed",
                        "tertiary-fixed-dim": "#c6c6c7",
                        "on-tertiary-fixed": "#1a1c1c",
                        "on-tertiary-fixed-variant": "#454747",
                        "on-primary-fixed-variant": "#00531e",
                        "outline": "#869583",
                        "on-secondary-container": "#b4b4bd",
                        "inverse-on-surface": "#2e3038",
                        "surface-container-lowest": "#0c0e15",
                        "surface-container-low": "#191b23",
                        "surface-bright": "#373941",
                        "on-secondary": "#2e3037",
                        "background": "#11131b",
                        "inverse-primary": "#006e2a",
                        "surface-tint": "#3ce36a",
                        "surface-container-highest": "#33343d",
                        "primary-fixed": "#69ff87",
                        "on-surface-variant": "#bbcbb8",
                        "outline-variant": "#3c4a3c",
                        "on-primary-container": "#004c1b",
                        "on-primary": "#003912",
                        "on-tertiary-container": "#3f4142",
                        "on-background": "#e1e2ed",
                        "inverse-surface": "#e1e2ed",
                        "secondary-fixed-dim": "#c5c6ce",
                        "secondary": "#c5c6ce",
                        "tertiary-container": "#acadad",
                        "surface-variant": "#33343d",
                        "on-error": "#690005",
                        "on-secondary-fixed": "#191b22",
                        "error": "#ffb4ab",
                        "on-tertiary": "#2f3131",
                        "primary-container": "#00c853",
                        "primary-fixed-dim": "#3ce36a",
                        "surface": "#11131b",
                        "error-container": "#93000a",
                        "secondary-container": "#45464e",
                        "surface-container": "#1d1f27",
                        "primary": "#3fe56c",
                        "on-secondary-fixed-variant": "#45464e",
                        "on-error-container": "#ffdad6",
                        "on-primary-fixed": "#002108"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "container-max": "1440px",
                        "unit": "8px",
                        "margin-desktop": "48px",
                        "margin-mobile": "16px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-md": ["Manrope"],
                        "body-lg": ["Manrope"],
                        "label-sm": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "display-xl": ["Manrope"],
                        "label-bold": ["Manrope"],
                        "body-md": ["Manrope"]
                    },
                    "fontSize": {
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "display-xl": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-bold": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "700" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>

    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            border-left: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .glass-panel-elevated {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(32px);
            -webkit-backdrop-filter: blur(32px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 16px 48px 0 rgba(0, 0, 0, 0.4);
        }

        .glow-line {
            box-shadow: 0 0 10px rgba(0, 200, 83, 0.5);
        }

        .text-glow {
            text-shadow: 0 0 20px rgba(63, 229, 108, 0.3);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>

    @yield('additional-styles')
</head>
<body class="bg-background text-on-background antialiased overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container">
    @yield('content')
    
    <script>
        // Prevent smooth scroll zoom on iOS
        document.addEventListener('touchmove', function(e) {
            if (e.scale !== 1) {
                e.preventDefault();
            }
        }, false);
        
        // Form submission handlers
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.classList.add('opacity-75');
                    }
                });
            });
            
            // Button hover effects
            document.querySelectorAll('button').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });
            
            // Smooth scroll links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        });
        
        @yield('scripts')
    </script>
    
    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>
</html>
