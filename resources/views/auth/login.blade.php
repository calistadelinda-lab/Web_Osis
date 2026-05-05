<x-guest-layout>
    <style>
        .login-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #8B0000;
            text-align: center;
            margin-bottom: 0.25rem;
        }
        .login-subtitle {
            text-align: center;
            font-size: 0.8rem;
            color: #9ca3af;
            margin-bottom: 2rem;
            letter-spacing: 0.03em;
        }

        /* Divider badge */
        .vote-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: linear-gradient(90deg, #C8102E, #FF3352);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            margin: 0 auto 1.5rem;
            display: flex;
            width: fit-content;
        }
        .vote-badge::before {
            content: '🗳';
            font-size: 0.85rem;
        }

        /* Form elements */
        .form-group { margin-bottom: 1.1rem; }

        .form-group label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .form-group input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.92rem;
            color: #111827;
            background: #fafafa;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .form-group input:focus {
            border-color: #C8102E;
            box-shadow: 0 0 0 3px rgba(200,16,46,0.12);
            background: #fff;
        }

        .error-msg {
            font-size: 0.75rem;
            color: #C8102E;
            margin-top: 0.3rem;
        }

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.8rem;
        }
        .remember-row input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #C8102E;
            cursor: pointer;
        }
        .remember-row label {
            font-size: 0.82rem;
            color: #6b7280;
            cursor: pointer;
        }

        /* Submit button */
        .btn-vote {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.85rem;
            background: linear-gradient(135deg, #C8102E 0%, #8B0000 100%);
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.92rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(200,16,46,0.35);
        }
        .btn-vote:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(200,16,46,0.4);
        }
        .btn-vote:active {
            transform: translateY(0);
        }

        /* Footer links */
        .form-footer {
            display: flex;
            justify-content: center;
            margin-top: 1.2rem;
        }
        .form-footer a {
            font-size: 0.78rem;
            color: #C8102E;
            text-decoration: none;
            font-weight: 600;
        }
        .form-footer a:hover { text-decoration: underline; }

        /* Session status */
        .session-status {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 0.6rem 0.9rem;
            font-size: 0.82rem;
            color: #991b1b;
            margin-bottom: 1.2rem;
            text-align: center;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid #f3f4f6;
            margin: 1.2rem 0;
        }

        /* Info note */
        .info-note {
            text-align: center;
            font-size: 0.72rem;
            color: #9ca3af;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #f3f4f6;
        }
        .info-note strong { color: #C8102E; }
    </style>

    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <h2 class="login-title">Masuk untuk Memilih</h2>
    <p class="login-subtitle">Gunakan akun siswa yang telah terdaftar</p>
    <div class="vote-badge">Pemilihan Ketua OSIS</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- NIS / Email -->
        <div class="form-group">
            <label for="email">Email / NIS Siswa</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="contoh: 12345@smkn5telkom.sch.id"
                required
                autofocus
                autocomplete="username"
            />
            @if ($errors->has('email'))
                <div class="error-msg">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="••••••••"
                required
                autocomplete="current-password"
            />
            @if ($errors->has('password'))
                <div class="error-msg">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Remember me -->
        <div class="remember-row">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Ingat saya di perangkat ini</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-vote">
            🗳&nbsp; Masuk &amp; Mulai Voting
        </button>

        <!-- Forgot password -->
        <div class="form-footer">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
            @endif
        </div>

        <div class="info-note">
            Setiap siswa hanya dapat memberikan <strong>1 suara</strong>.<br>
            Pastikan pilihan Anda sudah benar sebelum mengkonfirmasi.
        </div>
    </form>
</x-guest-layout>