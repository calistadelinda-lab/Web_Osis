<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'E-Voting OSIS') }} — SMKN 5 Telkom Banda Aceh</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --red-primary: #C8102E;
                --red-dark:    #8B0000;
                --red-light:   #FF3352;
                --gold:        #FFD700;
                --white:       #FFFFFF;
                --gray-soft:   #F5F5F5;
            }

            * { box-sizing: border-box; margin: 0; padding: 0; }

            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                background: var(--red-dark);
                min-height: 100vh;
                overflow-x: hidden;
            }

            /* Animated diagonal background */
            .bg-scene {
                position: fixed;
                inset: 0;
                background:
                    linear-gradient(135deg, #6B0000 0%, #C8102E 45%, #8B0000 100%);
                z-index: 0;
            }

            .bg-scene::before {
                content: '';
                position: absolute;
                inset: 0;
                background-image:
                    repeating-linear-gradient(
                        45deg,
                        transparent,
                        transparent 60px,
                        rgba(255,255,255,0.03) 60px,
                        rgba(255,255,255,0.03) 61px
                    );
            }

            /* Floating circles */
            .orb {
                position: fixed;
                border-radius: 50%;
                filter: blur(80px);
                opacity: 0.25;
                animation: drift 8s ease-in-out infinite alternate;
                z-index: 0;
            }
            .orb-1 { width: 500px; height: 500px; background: #FF3352; top: -150px; left: -100px; animation-delay: 0s; }
            .orb-2 { width: 350px; height: 350px; background: #FFD700; bottom: -80px; right: -80px; animation-delay: 3s; }
            .orb-3 { width: 250px; height: 250px; background: #C8102E; top: 50%; left: 60%; animation-delay: 1.5s; }

            @keyframes drift {
                from { transform: translate(0, 0) scale(1); }
                to   { transform: translate(30px, 20px) scale(1.05); }
            }

            /* Content wrapper */
            .page-wrapper {
                position: relative;
                z-index: 1;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
            }

            /* Header brand */
            .brand-header {
                text-align: center;
                margin-bottom: 2rem;
                animation: slideDown 0.6s ease both;
            }
            .brand-header .school-logo {
                width: 72px;
                height: 72px;
                background: rgba(255,255,255,0.12);
                border: 2px solid rgba(255,215,0,0.6);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1rem;
                backdrop-filter: blur(8px);
            }
            .brand-header .school-logo svg {
                width: 36px;
                height: 36px;
                fill: var(--gold);
            }
            .brand-header h1 {
                font-size: 1.1rem;
                font-weight: 800;
                color: var(--white);
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }
            .brand-header p {
                font-size: 0.78rem;
                color: rgba(255,255,255,0.65);
                letter-spacing: 0.05em;
                margin-top: 0.2rem;
                text-transform: uppercase;
            }

            /* Card */
            .card {
                width: 100%;
                max-width: 440px;
                background: rgba(255,255,255,0.97);
                border-radius: 20px;
                padding: 2.5rem 2rem;
                box-shadow:
                    0 0 0 1px rgba(255,255,255,0.15),
                    0 30px 80px rgba(0,0,0,0.4);
                animation: slideUp 0.6s ease both;
                animation-delay: 0.1s;
            }

            @keyframes slideDown {
                from { opacity: 0; transform: translateY(-24px); }
                to   { opacity: 1; transform: translateY(0); }
            }
            @keyframes slideUp {
                from { opacity: 0; transform: translateY(24px); }
                to   { opacity: 1; transform: translateY(0); }
            }
        </style>
    </head>
    <body>
        <div class="bg-scene"></div>
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        <div class="page-wrapper">
            <!-- Brand Header -->
            <div class="brand-header">
                <div class="school-logo">
                    <!-- Simple star/crown icon -->
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l2.9 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l7.1-1.01L12 2z"/>
                    </svg>
                </div>
                <h1>SMKN 5 Telkom Banda Aceh</h1>
                <p>Sistem E-Voting Ketua OSIS &nbsp;·&nbsp; 2024/2025</p>
            </div>

            <!-- Slot for the form -->
            <div class="card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>