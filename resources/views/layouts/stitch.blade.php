<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-container-high": "#e6e8ea",
                    "tertiary": "#006c4b",
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
        }
        .emerald-glow {
            box-shadow: 0 8px 30px rgba(16, 185, 129, 0.06);
        }
        .premium-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .premium-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(16, 185, 129, 0.12);
        }
    </style>
@stack('styles')
</head>
<body class="bg-background text-on-background" style="font-family: 'Manrope', sans-serif;">
@yield('content')
@stack('scripts')
</body>
</html>
