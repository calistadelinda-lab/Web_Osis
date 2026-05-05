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
            * { box-sizing: border-box; margin: 0; padding: 0; }

            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                min-height: 100vh;
                background: #f1f5f9;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
            }

            .page-wrapper {
                width: 100%;
                max-width: 420px;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }

            /* Header */
            .brand-header {
                display: flex;
                align-items: center;
                gap: 0.85rem;
                text-align: left;
            }

            .school-logo {
                width: 52px;
                height: 52px;
                background: #C8102E;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .school-logo svg {
                width: 26px;
                height: 26px;
                fill: #fff;
            }

            .brand-text h1 {
                font-size: 0.9rem;
                font-weight: 800;
                color: #111827;
                line-height: 1.2;
            }
            .brand-text p {
                font-size: 0.72rem;
                color: #6b7280;
                margin-top: 0.15rem;
            }

            /* Card */
            .card {
                width: 100%;
                background: #ffffff;
                border-radius: 16px;
                padding: 2rem 1.75rem;
                box-shadow: 0 1px 3px rgba(0,0,0,0.08), 0 8px 24px rgba(0,0,0,0.07);
                border: 1px solid #e5e7eb;
            }

            /* Footer note */
            .page-footer {
                font-size: 0.7rem;
                color: #9ca3af;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">

            <div class="brand-header">
                <div class="school-logo">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l2.9 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l7.1-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <h1>SMKN 5 Telkom Banda Aceh</h1>
                    <p>Sistem E-Voting Pemilihan Ketua OSIS 2024/2025</p>
                </div>
            </div>

            <div class="card">
                {{ $slot }}
            </div>

            <p class="page-footer">© 2025 SMKN 5 Telkom Banda Aceh. All rights reserved.</p>
        </div>
    </body>
</html>