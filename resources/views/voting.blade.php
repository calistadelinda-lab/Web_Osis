<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pemilihan Ketua &amp; Wakil OSIS</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts: Playfair Display + DM Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        merah: {
                            50:  '#fff1f1',
                            100: '#ffe0e0',
                            200: '#ffc6c6',
                            300: '#ff9e9e',
                            400: '#ff6666',
                            500: '#f83737',
                            600: '#e51717',
                            700: '#c10e0e',
                            800: '#9f1010',
                            900: '#841414',
                        },
                    },
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        body:    ['"DM Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        'card':     '0 2px 24px 0 rgba(0,0,0,0.07)',
                        'selected': '0 0 0 3px #e51717, 0 8px 32px 0 rgba(229,23,23,0.18)',
                        'btn':      '0 4px 14px 0 rgba(229,23,23,0.35)',
                    },
                },
            },
        }
    </script>

    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .font-display { font-family: 'Playfair Display', serif; }

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* Candidate card */
        .candidate-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            cursor: pointer;
            position: relative;
        }
        .candidate-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.12);
        }
        .candidate-card.selected {
            box-shadow: 0 0 0 3px #e51717, 0 8px 32px 0 rgba(229,23,23,0.18);
        }
        .candidate-card.selected .select-badge {
            opacity: 1;
            transform: scale(1);
        }

        /* Badge centang */
        .select-badge {
            opacity: 0;
            transform: scale(0.6);
            transition: opacity 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);
        }

        /* Radio hidden */
        input[type="radio"] { display: none; }

        /* Foto avatar placeholder gradient */
        .avatar-bg {
            background: linear-gradient(135deg, #fde8e8 0%, #f5c6c6 100%);
        }

        /* Submit button glow */
        .btn-submit {
            background: linear-gradient(135deg, #e51717 0%, #c10e0e 100%);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }
        .btn-submit:hover:not(:disabled) {
            box-shadow: 0 4px 20px 0 rgba(229,23,23,0.4);
            transform: translateY(-1px);
        }
        .btn-submit:active:not(:disabled) {
            transform: translateY(0);
        }
        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Modal backdrop */
        #confirm-modal {
            transition: opacity 0.2s ease;
        }

        /* Divider ornament */
        .ornament-line {
            background: linear-gradient(90deg, transparent, #e51717, transparent);
        }

        /* Pilih button per card */
        .btn-pilih {
            transition: background 0.2s, color 0.2s, border-color 0.2s;
        }
        .candidate-card.selected .btn-pilih {
            background: #e51717;
            color: #fff;
            border-color: #e51717;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen relative">

{{-- ============================================================
     HEADER
     ============================================================ --}}
<header class="bg-white border-b border-gray-100 sticky top-0 z-30 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
        {{-- Logo / Lambang --}}
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-merah-600 flex items-center justify-center shadow">
                {{-- Ikon bintang sederhana --}}
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-body leading-none tracking-wide uppercase">SMA Negeri 1 Indonesia</p>
                <p class="text-sm font-semibold text-gray-700 font-body leading-tight">OSIS &bull; Periode 2025/2026</p>
            </div>
        </div>

        {{-- Badge status --}}
        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-merah-700 bg-merah-50 border border-merah-100 px-3 py-1 rounded-full">
            <span class="w-1.5 h-1.5 rounded-full bg-merah-500 animate-pulse"></span>
            Voting Aktif
        </span>
    </div>
</header>

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<section class="relative overflow-hidden bg-white z-10">
    {{-- Dekoratif background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-merah-50 rounded-full opacity-60"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-merah-50 rounded-full opacity-40"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 py-12 sm:py-16 text-center">
        <p class="text-xs tracking-[0.25em] uppercase text-merah-600 font-semibold mb-3 font-body">Pemilihan Umum OSIS</p>
        <h1 class="font-display text-3xl sm:text-4xl md:text-5xl text-gray-900 leading-tight mb-4">
            Ketua &amp; Wakil Ketua OSIS
        </h1>
        <div class="ornament-line w-24 h-0.5 mx-auto mb-5"></div>
        <p class="text-gray-500 text-sm sm:text-base max-w-md mx-auto font-body leading-relaxed">
            Pilih pasangan kandidat terbaik menurutmu. Satu suara kamu menentukan pemimpin OSIS ke depan.
        </p>
    </div>
</section>

{{-- ============================================================
     FORM VOTING
     ============================================================ --}}
<main class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 pb-20">

    {{-- Session success / error --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-xl flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-xl flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5a7 7 0 110 14A7 7 0 0112 5z"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    {{-- <form id="voting-form" action="{{ route('voting.submit') }}" method="POST"> --}}
        @csrf

        {{-- GRID KANDIDAT --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10" id="kandidat-grid">

            {{-- ------------------------------------------------
                 KANDIDAT 1
                 ------------------------------------------------ --}}
            <div class="candidate-card bg-white rounded-2xl shadow-card p-6 flex flex-col"
                 onclick="pilih(this, '1')">

                {{-- Badge centang --}}
                <div class="select-badge absolute -top-3 -right-3 w-8 h-8 bg-merah-600 rounded-full flex items-center justify-center shadow-md">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                {{-- Nomor urut --}}
                <div class="flex items-center justify-between mb-5">
                    <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase font-body">Paslon 01</span>
                    <span class="w-7 h-7 rounded-full bg-merah-600 text-white text-xs font-bold flex items-center justify-center">1</span>
                </div>

                {{-- Foto kandidat --}}
                <div class="flex justify-center gap-4 mb-5">
                    {{-- Ketua --}}
                    <div class="text-center">
                        <div class="avatar-bg w-20 h-20 rounded-xl mx-auto mb-1 overflow-hidden border-2 border-merah-100 flex items-center justify-center">
                            {{-- Ganti src dengan: {{ asset('images/kandidat1a.jpg') }} --}}
                            <img src="https://ui-avatars.com/api/?name=Arya+Bima&background=fde8e8&color=c10e0e&size=80&font-size=0.35&bold=true"
                                 alt="Arya Bima"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 font-body">Ketua</p>
                    </div>
                    {{-- Wakil --}}
                    <div class="text-center">
                        <div class="avatar-bg w-20 h-20 rounded-xl mx-auto mb-1 overflow-hidden border-2 border-merah-100 flex items-center justify-center">
                            <img src="https://ui-avatars.com/api/?name=Sari+Dewi&background=fde8e8&color=c10e0e&size=80&font-size=0.35&bold=true"
                                 alt="Sari Dewi"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 font-body">Wakil</p>
                    </div>
                </div>

                {{-- Nama --}}
                <div class="text-center mb-4">
                    <h2 class="font-display text-gray-900 text-lg leading-snug">Arya Bima S.</h2>
                    <p class="text-merah-600 text-sm font-medium font-body mt-0.5">&amp; Sari Dewi P.</p>
                </div>

                {{-- Garis pembatas --}}
                <div class="ornament-line h-px w-full mb-4 opacity-30"></div>

                {{-- Visi --}}
                <p class="text-gray-500 text-xs sm:text-sm font-body leading-relaxed text-center flex-1">
                    "Membangun OSIS yang transparan, aktif, dan berpihak pada aspirasi seluruh siswa."
                </p>

                {{-- Tombol Pilih --}}
                <input type="radio" name="kandidat" id="kandidat1" value="1">
                <button type="button"
                        class="btn-pilih mt-5 w-full py-2.5 rounded-xl border-2 border-gray-200 text-gray-600 text-sm font-semibold font-body tracking-wide hover:border-merah-500 hover:text-merah-600 focus:outline-none">
                    Pilih Paslon Ini
                </button>
            </div>

            {{-- ------------------------------------------------
                 KANDIDAT 2
                 ------------------------------------------------ --}}
            <div class="candidate-card bg-white rounded-2xl shadow-card p-6 flex flex-col"
                 onclick="pilih(this, '2')">

                <div class="select-badge absolute -top-3 -right-3 w-8 h-8 bg-merah-600 rounded-full flex items-center justify-center shadow-md">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div class="flex items-center justify-between mb-5">
                    <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase font-body">Paslon 02</span>
                    <span class="w-7 h-7 rounded-full bg-merah-600 text-white text-xs font-bold flex items-center justify-center">2</span>
                </div>

                <div class="flex justify-center gap-4 mb-5">
                    <div class="text-center">
                        <div class="avatar-bg w-20 h-20 rounded-xl mx-auto mb-1 overflow-hidden border-2 border-merah-100">
                            <img src="https://ui-avatars.com/api/?name=Reza+Fadhil&background=fde8e8&color=c10e0e&size=80&font-size=0.35&bold=true"
                                 alt="Reza Fadhil"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 font-body">Ketua</p>
                    </div>
                    <div class="text-center">
                        <div class="avatar-bg w-20 h-20 rounded-xl mx-auto mb-1 overflow-hidden border-2 border-merah-100">
                            <img src="https://ui-avatars.com/api/?name=Nadia+Putri&background=fde8e8&color=c10e0e&size=80&font-size=0.35&bold=true"
                                 alt="Nadia Putri"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 font-body">Wakil</p>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <h2 class="font-display text-gray-900 text-lg leading-snug">Reza Fadhil A.</h2>
                    <p class="text-merah-600 text-sm font-medium font-body mt-0.5">&amp; Nadia Putri R.</p>
                </div>

                <div class="ornament-line h-px w-full mb-4 opacity-30"></div>

                <p class="text-gray-500 text-xs sm:text-sm font-body leading-relaxed text-center flex-1">
                    "Inovasi, kolaborasi, dan kreativitas sebagai fondasi OSIS yang menginspirasi generasi muda."
                </p>

                <input type="radio" name="kandidat" id="kandidat2" value="2">
                <button type="button"
                        class="btn-pilih mt-5 w-full py-2.5 rounded-xl border-2 border-gray-200 text-gray-600 text-sm font-semibold font-body tracking-wide hover:border-merah-500 hover:text-merah-600 focus:outline-none">
                    Pilih Paslon Ini
                </button>
            </div>

            {{-- ------------------------------------------------
                 KANDIDAT 3
                 ------------------------------------------------ --}}
            <div class="candidate-card bg-white rounded-2xl shadow-card p-6 flex flex-col sm:col-span-2 lg:col-span-1"
                 onclick="pilih(this, '3')">

                <div class="select-badge absolute -top-3 -right-3 w-8 h-8 bg-merah-600 rounded-full flex items-center justify-center shadow-md">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div class="flex items-center justify-between mb-5">
                    <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase font-body">Paslon 03</span>
                    <span class="w-7 h-7 rounded-full bg-merah-600 text-white text-xs font-bold flex items-center justify-center">3</span>
                </div>

                <div class="flex justify-center gap-4 mb-5">
                    <div class="text-center">
                        <div class="avatar-bg w-20 h-20 rounded-xl mx-auto mb-1 overflow-hidden border-2 border-merah-100">
                            <img src="https://ui-avatars.com/api/?name=Dimas+Hendra&background=fde8e8&color=c10e0e&size=80&font-size=0.35&bold=true"
                                 alt="Dimas Hendra"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 font-body">Ketua</p>
                    </div>
                    <div class="text-center">
                        <div class="avatar-bg w-20 h-20 rounded-xl mx-auto mb-1 overflow-hidden border-2 border-merah-100">
                            <img src="https://ui-avatars.com/api/?name=Layla+Zahira&background=fde8e8&color=c10e0e&size=80&font-size=0.35&bold=true"
                                 alt="Layla Zahira"
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 font-body">Wakil</p>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <h2 class="font-display text-gray-900 text-lg leading-snug">Dimas Hendra W.</h2>
                    <p class="text-merah-600 text-sm font-medium font-body mt-0.5">&amp; Layla Zahira F.</p>
                </div>

                <div class="ornament-line h-px w-full mb-4 opacity-30"></div>

                <p class="text-gray-500 text-xs sm:text-sm font-body leading-relaxed text-center flex-1">
                    "Mewujudkan lingkungan sekolah yang inklusif, berkarakter, dan berdaya saing tinggi."
                </p>

                <input type="radio" name="kandidat" id="kandidat3" value="3">
                <button type="button"
                        class="btn-pilih mt-5 w-full py-2.5 rounded-xl border-2 border-gray-200 text-gray-600 text-sm font-semibold font-body tracking-wide hover:border-merah-500 hover:text-merah-600 focus:outline-none">
                    Pilih Paslon Ini
                </button>
            </div>

        </div>{{-- END grid --}}

        {{-- ============================================================
             SUBMIT SECTION
             ============================================================ --}}
        <div class="flex flex-col items-center gap-3">
            <p class="text-gray-400 text-xs font-body" id="hint-text">Silakan pilih salah satu paslon di atas.</p>
            <button type="button"
                    id="btn-submit"
                    disabled
                    onclick="bukaModal()"
                    class="btn-submit text-white font-semibold font-body px-10 py-3.5 rounded-xl text-sm tracking-wide disabled:opacity-40 disabled:cursor-not-allowed">
                Kirim Suara Saya
            </button>
            <p class="text-gray-300 text-xs font-body">Suara bersifat rahasia &amp; tidak dapat diubah setelah dikirim.</p>
        </div>

    </form>
</main>

{{-- ============================================================
     MODAL KONFIRMASI
     ============================================================ --}}
<div id="confirm-modal"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm hidden opacity-0"
     onclick="tutupModalOverlay(event)">

    <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-7 relative transform transition-transform duration-200 scale-95"
         id="modal-box">

        {{-- Icon --}}
        <div class="w-14 h-14 bg-merah-50 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-7 h-7 text-merah-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h3 class="font-display text-gray-900 text-xl text-center mb-2">Konfirmasi Pilihan</h3>
        <p class="text-gray-500 text-sm text-center font-body mb-1">Kamu akan memilih:</p>
        <p class="text-merah-700 font-semibold text-center font-body text-base mb-5" id="modal-nama">–</p>

        <p class="text-gray-400 text-xs text-center font-body mb-6 leading-relaxed">
            Pilihan tidak dapat diubah setelah dikirim.<br>Pastikan kamu telah memilih dengan benar.
        </p>

        <div class="flex gap-3">
            <button type="button"
                    onclick="tutupModal()"
                    class="flex-1 py-2.5 rounded-xl border-2 border-gray-200 text-gray-600 text-sm font-semibold font-body hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button type="button"
                    onclick="submitVoting()"
                    class="btn-submit flex-1 py-2.5 rounded-xl text-white text-sm font-semibold font-body">
                Ya, Kirim!
            </button>
        </div>
    </div>
</div>

{{-- ============================================================
     FOOTER
     ============================================================ --}}
<footer class="relative z-10 border-t border-gray-100 py-6 text-center">
    <p class="text-gray-400 text-xs font-body">
        &copy; {{ date('Y') }} OSIS SMA Negeri 1 Indonesia &middot; Sistem E-Voting
    </p>
</footer>

{{-- ============================================================
     JAVASCRIPT
     ============================================================ --}}
<script>
    // Data kandidat untuk ditampilkan di modal
    const kandidatData = {
        '1': 'Paslon 01 — Arya Bima S. & Sari Dewi P.',
        '2': 'Paslon 02 — Reza Fadhil A. & Nadia Putri R.',
        '3': 'Paslon 03 — Dimas Hendra W. & Layla Zahira F.',
    };

    let selectedValue = null;

    /**
     * Fungsi ketika user mengklik card kandidat
     */
    function pilih(cardEl, value) {
        // Hapus selected dari semua card
        document.querySelectorAll('.candidate-card').forEach(function(c) {
            c.classList.remove('selected');
        });

        // Tambahkan selected ke card ini
        cardEl.classList.add('selected');

        // Set radio value
        document.getElementById('kandidat' + value).checked = true;
        selectedValue = value;

        // Aktifkan tombol submit
        const btnSubmit = document.getElementById('btn-submit');
        btnSubmit.disabled = false;

        // Update hint text
        document.getElementById('hint-text').textContent = 'Kamu memilih: ' + kandidatData[value];
    }

    /**
     * Buka modal konfirmasi
     */
    function bukaModal() {
        if (!selectedValue) return;

        document.getElementById('modal-nama').textContent = kandidatData[selectedValue];

        const modal = document.getElementById('confirm-modal');
        const box   = document.getElementById('modal-box');

        modal.classList.remove('hidden');
        // Trigger reflow untuk animasi
        requestAnimationFrame(function() {
            modal.classList.add('opacity-100');
            modal.classList.remove('opacity-0');
            box.classList.remove('scale-95');
            box.classList.add('scale-100');
        });
    }

    /**
     * Tutup modal
     */
    function tutupModal() {
        const modal = document.getElementById('confirm-modal');
        const box   = document.getElementById('modal-box');

        modal.classList.add('opacity-0');
        modal.classList.remove('opacity-100');
        box.classList.add('scale-95');
        box.classList.remove('scale-100');

        setTimeout(function() {
            modal.classList.add('hidden');
        }, 200);
    }

    /**
     * Tutup modal jika klik di luar box
     */
    function tutupModalOverlay(event) {
        if (event.target === document.getElementById('confirm-modal')) {
            tutupModal();
        }
    }

    /**
     * Submit form setelah konfirmasi
     */
    function submitVoting() {
        document.getElementById('voting-form').submit();
    }

    // Tutup modal dengan tombol Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') tutupModal();
    });
</script>

</body>
</html>