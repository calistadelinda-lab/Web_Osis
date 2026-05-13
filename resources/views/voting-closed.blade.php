<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Ditutup - OSIS SMK Negeri 5 Telkom</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        r: '#C41E3A',
                        r2: '#9B1530',
                        r3: '#E8304A',
                        rpale: '#FDF2F4',
                        rsoft: '#F5D6DB',
                        warm: '#F4F2EE',
                        line: '#E8E4DE',
                        ink: '#1A1512',
                        sub: '#5C5550',
                        muted: '#9C948C',
                        gold: '#C8A96A',
                        off: '#FAFAF8',
                    },
                    fontFamily: {
                        serif: ['Cormorant Garamond', 'serif'],
                        sans: ['Jost', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Jost', sans-serif; overflow-x: hidden; }
        *, a, button { cursor: none !important; }
        #cur { position: fixed; top:0; left:0; width:8px; height:8px; background:#C41E3A; border-radius:50%; pointer-events:none; z-index:9999; transform:translate(-50%,-50%); transition:width .25s,height .25s,background .25s; mix-blend-mode:multiply; }
        #cur.big { width:40px; height:40px; background:rgba(196,30,58,.15); }
    </style>
</head>
<body class="bg-warm min-h-screen flex items-center justify-center p-4">

<div id="cur"></div>

<div class="max-w-md w-full bg-white rounded-2xl shadow-2xl p-8 text-center">
    <div class="w-16 h-16 bg-rpale rounded-full flex items-center justify-center mx-auto mb-6">
        <svg class="w-8 h-8 text-r" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
        </svg>
    </div>

    <h1 class="font-serif text-2xl text-ink mb-4">Voting Ditutup</h1>
    <p class="text-sub text-sm leading-relaxed mb-6">{{ $message }}</p>

    <a href="/" class="inline-flex items-center gap-2 px-6 py-3 bg-r text-white rounded-lg font-semibold tracking-wide hover:bg-r2 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Halaman Utama
    </a>
</div>

<script>
    const cur = document.getElementById('cur');
    document.addEventListener('mousemove', e => {
        cur.style.left = e.clientX + 'px';
        cur.style.top = e.clientY + 'px';
    });
    document.querySelectorAll('a,button').forEach(el => {
        el.addEventListener('mouseenter', () => cur.classList.add('big'));
        el.addEventListener('mouseleave', () => cur.classList.remove('big'));
    });
</script>

</body>
</html>