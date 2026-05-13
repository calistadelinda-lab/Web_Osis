<x-guest-layout>
@php
     $votingOpen    = \App\Models\SettingVoting::isVotingOpen();
    $votingMessage = \App\Models\SettingVoting::getMessage();
@endphp

@if(!$votingOpen)
    <style>
        body { font-family: 'Jost', sans-serif; }
    </style>
    <div style="text-align:center; padding: 1rem 0;">
        <div style="width:4rem;height:4rem;background:#FDF2F4;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;">
            <svg style="width:2rem;height:2rem;" fill="none" stroke="#C41E3A" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>
        <h1 style="font-family:'Cormorant Garamond',serif;font-size:1.6rem;color:#1A1512;margin-bottom:0.75rem;font-weight:600;">Voting Ditutup</h1>
        <p style="color:#5C5550;font-size:0.85rem;line-height:1.7;margin-bottom:1.5rem;">{{ $votingMessage }}</p>
        <a href="/" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.7rem 1.5rem;background:#C41E3A;color:#fff;border-radius:8px;font-size:0.8rem;font-weight:700;text-decoration:none;letter-spacing:0.06em;text-transform:uppercase;">
            <svg style="width:1rem;height:1rem" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Halaman Utama
        </a>
    </div>

@else
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
        .vote-badge {
            background: linear-gradient(90deg, #C8102E, #FF3352);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            margin: 0 auto 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            width: fit-content;
        }
        .form-group { margin-bottom: 1.1rem; }
        .form-group label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }
        .form-group input,
        .form-group select {
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
            appearance: none;
            -webkit-appearance: none;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #C8102E;
            box-shadow: 0 0 0 3px rgba(200,16,46,0.12);
            background: #fff;
        }
        .form-group input::placeholder { color: #9ca3af; }
        .select-wrapper { position: relative; }
        .select-wrapper::after {
            content: '';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 6px solid #C8102E;
            pointer-events: none;
        }
        .form-group select { padding-right: 2.5rem; cursor: pointer; }
        .error-msg { font-size: 0.75rem; color: #C8102E; margin-top: 0.3rem; }
        .btn-vote {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.9rem;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-vote:hover { opacity: 0.92; transform: translateY(-1px); box-shadow: 0 10px 28px rgba(200,16,46,0.4); }
        .btn-vote:active { transform: translateY(0); }
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
        .info-note {
            text-align: center;
            font-size: 0.72rem;
            color: #9ca3af;
            margin-top: 1.4rem;
            padding-top: 1rem;
            border-top: 1px solid #f3f4f6;
            line-height: 1.6;
        }
        .info-note strong { color: #C8102E; }
    </style>

    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <h2 class="login-title">Masuk untuk Memilih</h2>
    <p class="login-subtitle">Gunakan data siswa yang terdaftar</p>
    <div class="vote-badge">🗳 Pemilihan Ketua OSIS 2024/2025</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- NISN --}}
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input
                id="nisn"
                type="text"
                name="nisn"
                value="{{ old('nisn') }}"
                placeholder="Masukkan NISN kamu"
                required
                autofocus
                autocomplete="off"
                inputmode="numeric"
            />
            @error('nisn')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama --}}
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input
                id="nama"
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Nama sesuai data sekolah"
                required
                autocomplete="off"
            />
            @error('nama')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kelas --}}
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <div class="select-wrapper">
                <select id="kelas" name="kelas" required>
                    <option value="" disabled {{ old('kelas') ? '' : 'selected' }}>-- Pilih Kelas --</option>
                    <optgroup label="── Kelas XII ──">
                        <option value="XII TJAT"  {{ old('kelas') == 'XII TJAT'  ? 'selected' : '' }}>XII TJAT</option>
                        <option value="XII TKJ 1" {{ old('kelas') == 'XII TKJ 1' ? 'selected' : '' }}>XII TKJ 1</option>
                        <option value="XII TKJ 2" {{ old('kelas') == 'XII TKJ 2' ? 'selected' : '' }}>XII TKJ 2</option>
                        <option value="XII TKJ 3" {{ old('kelas') == 'XII TKJ 3' ? 'selected' : '' }}>XII TKJ 3</option>
                        <option value="XII RPL 1" {{ old('kelas') == 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1</option>
                        <option value="XII RPL 2" {{ old('kelas') == 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2</option>
                        <option value="XII RPL 3" {{ old('kelas') == 'XII RPL 3' ? 'selected' : '' }}>XII RPL 3</option>
                        <option value="XII PF 1"  {{ old('kelas') == 'XII PF 1'  ? 'selected' : '' }}>XII PF 1</option>
                        <option value="XII PF 2"  {{ old('kelas') == 'XII PF 2'  ? 'selected' : '' }}>XII PF 2</option>
                    </optgroup>
                    <optgroup label="── Kelas XI ──">
                        <option value="XI TJAT 1" {{ old('kelas') == 'XI TJAT 1' ? 'selected' : '' }}>XI TJAT 1</option>
                        <option value="XI TJAT 2" {{ old('kelas') == 'XI TJAT 2' ? 'selected' : '' }}>XI TJAT 2</option>
                        <option value="XI TKJ 1"  {{ old('kelas') == 'XI TKJ 1'  ? 'selected' : '' }}>XI TKJ 1</option>
                        <option value="XI TKJ 2"  {{ old('kelas') == 'XI TKJ 2'  ? 'selected' : '' }}>XI TKJ 2</option>
                        <option value="XI TKJ 3"  {{ old('kelas') == 'XI TKJ 3'  ? 'selected' : '' }}>XI TKJ 3</option>
                        <option value="XI RPL 1"  {{ old('kelas') == 'XI RPL 1'  ? 'selected' : '' }}>XI RPL 1</option>
                        <option value="XI RPL 2"  {{ old('kelas') == 'XI RPL 2'  ? 'selected' : '' }}>XI RPL 2</option>
                        <option value="XI RPL 3"  {{ old('kelas') == 'XI RPL 3'  ? 'selected' : '' }}>XI RPL 3</option>
                        <option value="XI PF 1"   {{ old('kelas') == 'XI PF 1'   ? 'selected' : '' }}>XI PF 1</option>
                        <option value="XI PF 2"   {{ old('kelas') == 'XI PF 2'   ? 'selected' : '' }}>XI PF 2</option>
                    </optgroup>
                    <optgroup label="── Kelas X ──">
                        <option value="X TJAT 1"  {{ old('kelas') == 'X TJAT 1'  ? 'selected' : '' }}>X TJAT 1</option>
                        <option value="X TJAT 2"  {{ old('kelas') == 'X TJAT 2'  ? 'selected' : '' }}>X TJAT 2</option>
                        <option value="X TKJ 1"   {{ old('kelas') == 'X TKJ 1'   ? 'selected' : '' }}>X TKJ 1</option>
                        <option value="X TKJ 2"   {{ old('kelas') == 'X TKJ 2'   ? 'selected' : '' }}>X TKJ 2</option>
                        <option value="X TKJ 3"   {{ old('kelas') == 'X TKJ 3'   ? 'selected' : '' }}>X TKJ 3</option>
                        <option value="X RPL 1"   {{ old('kelas') == 'X RPL 1'   ? 'selected' : '' }}>X RPL 1</option>
                        <option value="X RPL 2"   {{ old('kelas') == 'X RPL 2'   ? 'selected' : '' }}>X RPL 2</option>
                        <option value="X RPL 3"   {{ old('kelas') == 'X RPL 3'   ? 'selected' : '' }}>X RPL 3</option>
                        <option value="X PF 1"    {{ old('kelas') == 'X PF 1'    ? 'selected' : '' }}>X PF 1</option>
                        <option value="X PF 2"    {{ old('kelas') == 'X PF 2'    ? 'selected' : '' }}>X PF 2</option>
                    </optgroup>
                </select>
            </div>
            @error('kelas')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-vote">
            <span>🗳</span> Masuk &amp; Mulai Voting
        </button>

        <div class="info-note">
            Setiap siswa hanya dapat memberikan <strong>1 suara</strong>.<br>
            Pastikan data yang dimasukkan sudah benar.
        </div>
    </form>

@endif
</x-guest-layout>