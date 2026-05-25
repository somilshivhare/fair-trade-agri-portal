<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Skeleton - Fresh Start</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            :root {
                --bg-primary: #0b0f19;
                --bg-secondary: #111827;
                --accent-primary: #6366f1;
                --accent-secondary: #a855f7;
                --text-main: #f3f4f6;
                --text-muted: #9ca3af;
                --card-bg: rgba(17, 24, 39, 0.45);
                --card-border: rgba(255, 255, 255, 0.08);
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                background-color: var(--bg-primary);
                color: var(--text-main);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                overflow-x: hidden;
                position: relative;
            }

            /* Glowing decorative shapes */
            .glow-1 {
                position: absolute;
                top: 15%;
                left: 15%;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, rgba(99, 102, 241, 0) 70%);
                border-radius: 50%;
                filter: blur(40px);
                z-index: 1;
                animation: float-slow 15s infinite ease-in-out alternate;
            }

            .glow-2 {
                position: absolute;
                bottom: 15%;
                right: 15%;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(168, 85, 247, 0.15) 0%, rgba(168, 85, 247, 0) 70%);
                border-radius: 50%;
                filter: blur(40px);
                z-index: 1;
                animation: float-slow 18s infinite ease-in-out alternate-reverse;
            }

            @keyframes float-slow {
                0% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(40px, -30px) scale(1.1); }
                100% { transform: translate(-20px, 20px) scale(0.95); }
            }

            /* Container */
            .welcome-card {
                position: relative;
                z-index: 2;
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid var(--card-border);
                border-radius: 24px;
                padding: 3rem 2.5rem;
                max-width: 600px;
                width: 90%;
                text-align: center;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
                transition: transform 0.3s ease, border-color 0.3s ease;
            }

            .welcome-card:hover {
                border-color: rgba(99, 102, 241, 0.25);
                transform: translateY(-4px);
            }

            /* Logo / Icon */
            .logo-container {
                display: inline-flex;
                justify-content: center;
                align-items: center;
                width: 80px;
                height: 80px;
                border-radius: 20px;
                background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(168, 85, 247, 0.1) 100%);
                border: 1px solid rgba(255, 255, 255, 0.05);
                margin-bottom: 2rem;
                color: var(--accent-primary);
                font-size: 2.5rem;
                font-weight: 800;
                box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.05);
            }

            .logo-icon {
                background: linear-gradient(to right, var(--accent-primary), var(--accent-secondary));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            /* Heading */
            h1 {
                font-size: 2.25rem;
                font-weight: 800;
                letter-spacing: -0.025em;
                margin-bottom: 1rem;
                background: linear-gradient(to right, #ffffff, #e2e8f0);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            h1 span {
                background: linear-gradient(to right, var(--accent-primary), var(--accent-secondary));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            p.subtitle {
                font-size: 1.05rem;
                color: var(--text-muted);
                line-height: 1.6;
                margin-bottom: 2.5rem;
                font-weight: 400;
            }

            /* Specs / Badges */
            .specs {
                display: flex;
                justify-content: center;
                gap: 1rem;
                margin-bottom: 2.5rem;
                flex-wrap: wrap;
            }

            .badge {
                font-size: 0.8rem;
                font-weight: 600;
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.05);
                color: var(--text-muted);
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .badge span {
                color: var(--text-main);
            }

            .badge-dot {
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background-color: #10b981;
                display: inline-block;
            }

            /* CTA Actions */
            .actions {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .btn-primary {
                display: block;
                width: 100%;
                padding: 1rem;
                border-radius: 12px;
                font-size: 0.95rem;
                font-weight: 700;
                text-decoration: none;
                color: #ffffff;
                background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
                border: none;
                cursor: pointer;
                box-shadow: 0 4px 20px rgba(99, 102, 241, 0.3);
                transition: all 0.2s ease;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 24px rgba(99, 102, 241, 0.45);
            }

            .btn-primary:active {
                transform: translateY(0);
            }

            .btn-secondary {
                display: block;
                width: 100%;
                padding: 1rem;
                border-radius: 12px;
                font-size: 0.95rem;
                font-weight: 600;
                text-decoration: none;
                color: var(--text-main);
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.06);
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .btn-secondary:hover {
                background: rgba(255, 255, 255, 0.06);
                border-color: rgba(255, 255, 255, 0.12);
            }

            /* Footer status */
            .footer-info {
                position: absolute;
                bottom: 2rem;
                font-size: 0.8rem;
                color: var(--text-muted);
                z-index: 2;
            }

            .footer-info a {
                color: var(--accent-primary);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s ease;
            }

            .footer-info a:hover {
                color: var(--accent-secondary);
            }
        </style>
    </head>
    <body>
        <!-- Animated glow spheres -->
        <div class="glow-1"></div>
        <div class="glow-2"></div>

        <!-- Main glass card -->
        <div class="welcome-card">
            <div class="logo-container">
                <span class="logo-icon">L</span>
            </div>

            <h1>Laravel <span>Skeleton</span></h1>
            <p class="subtitle">Your clean development environment is successfully initialized. Start building your next custom masterpiece from scratch.</p>

            <div class="specs">
                <div class="badge">
                    <span class="badge-dot"></span>
                    Status: <span>Ready</span>
                </div>
                <div class="badge">
                    Laravel: <span>v{{ App::version() }}</span>
                </div>
                <div class="badge">
                    PHP: <span>v{{ PHP_VERSION }}</span>
                </div>
            </div>

            <div class="actions">
                <a href="https://laravel.com/docs" target="_blank" class="btn-primary">
                    Read Framework Documentation
                </a>
                <button onclick="alert('Ready to code! Check routes/web.php to get started.')" class="btn-secondary">
                    Get Started Guide
                </button>
            </div>
        </div>

        <div class="footer-info">
            Created with <span style="color: #ef4444;">&hearts;</span> and powered by <a href="https://laravel.com" target="_blank">Laravel</a>.
        </div>
    </body>
</html>
