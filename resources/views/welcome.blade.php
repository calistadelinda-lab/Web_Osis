<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>OSIS SMK Negeri 5 Telkom</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com"></script>
@php
use App\Models\Pemilihan;
@endphp
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        r:    '#C41E3A',
        r2:   '#9B1530',
        r3:   '#E8304A',
        rpale:'#FDF2F4',
        rsoft:'#F5D6DB',
        warm: '#F4F2EE',
        line: '#E8E4DE',
        ink:  '#1A1512',
        sub:  '#5C5550',
        muted:'#9C948C',
        gold: '#C8A96A',
        off:  '#FAFAF8',
      },
      fontFamily: {
        serif: ['Cormorant Garamond', 'serif'],
        sans:  ['Jost', 'sans-serif'],
      },
    }
  }
}
</script>
<style>
  html { scroll-behavior: smooth; }
  body { font-family: 'Jost', sans-serif; overflow-x: hidden; }
  *, a, button { cursor: none !important; }

  /* cursor */
  #cur { position: fixed; top:0; left:0; width:8px; height:8px; background:#C41E3A; border-radius:50%; pointer-events:none; z-index:9999; transform:translate(-50%,-50%); transition:width .25s,height .25s,background .25s; mix-blend-mode:multiply; }
  #cur.big { width:40px; height:40px; background:rgba(196,30,58,.15); }

  /* ticker */
  @keyframes tickerScroll { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
  .ticker-track { animation: tickerScroll 22s linear infinite; }

  /* reveal */
  .reveal { opacity:0; transform:translateY(24px); transition:opacity .7s ease,transform .7s ease; }
  .reveal.in { opacity:1; transform:none; }

  /* animations */
  @keyframes fadeSlide { from{opacity:0;transform:translateY(18px)} to{opacity:1;transform:none} }
  @keyframes growLine  { from{width:0} to{width:48px} }
  .anim-fs-0 { animation: fadeSlide .8s ease both; }
  .anim-fs-1 { animation: fadeSlide .8s .1s ease both; }
  .anim-fs-2 { animation: fadeSlide .8s .25s ease both; }
  .anim-fs-3 { animation: fadeSlide .8s .3s ease both; }
  .anim-fs-4 { animation: fadeSlide .8s .4s ease both; }
  .anim-fs-5 { animation: fadeSlide .8s .5s ease both; }
  .hero-line  { animation: growLine .8s .25s ease both; }

  /* profil cell hover bar */
  .profil-cell::before { content:''; position:absolute; left:0; top:0; bottom:0; width:3px; background:#C41E3A; transform:scaleY(0); transform-origin:bottom; transition:transform .35s cubic-bezier(.22,1,.36,1); }
  .profil-cell:hover::before { transform:scaleY(1); }
  .profil-cell:hover .pc-num { color:rgba(196,30,58,.15); }

  /* org node bottom bar */
  .org-node::after { content:''; position:absolute; bottom:0; left:0; right:0; height:2px; background:#C41E3A; transform:scaleX(0); transition:transform .3s cubic-bezier(.22,1,.36,1); }
  .org-node:hover::after { transform:scaleX(1); }

  /* gallery hover */
  .gi:hover .gi-bg   { transform:scale(1.05); }
  .gi:hover .gi-overlay { opacity:1; }

  /* gallery bg items */
  .gi-bg-1 { background: linear-gradient(135deg,#fde8ec,#f5c6cf); }
  .gi-bg-2 { background: linear-gradient(135deg,#f9f0f1,#f2d8dc); }
  .gi-bg-3 { background: linear-gradient(135deg,#fff0f2,#f9dde1); }
  .gi-bg-4 { background: linear-gradient(135deg,#f5eded,#ecdcde); }
  .gi-bg-5 { background: linear-gradient(135deg,#fdf4f5,#f6e3e6); }

  /* gallery layout */
  .gallery { display:grid; grid-template-columns:repeat(12,1fr); grid-template-rows:220px 180px; gap:12px; margin-top:3rem; }
  .gi-1 { grid-column:1/6;  grid-row:1/3; }
  .gi-2 { grid-column:6/9;  grid-row:1; }
  .gi-3 { grid-column:9/13; grid-row:1; }
  .gi-4 { grid-column:6/10; grid-row:2; }
  .gi-5 { grid-column:10/13;grid-row:2; }

  /* form max-height transition */
  .form-section { max-height:0; overflow:hidden; transition:max-height .5s cubic-bezier(.22,1,.36,1); }
  .form-section.open { max-height:900px; }

  /* toast */
  @keyframes toastIn { from{opacity:0;transform:translateY(-8px)} to{opacity:1;transform:none} }
  .vote-toast { animation: toastIn .3s ease; }

  /* vote bar */
  .vote-bar { transition: width .9s cubic-bezier(.22,1,.36,1); }

  /* hero bg text */
  .hero-bg-text { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%) rotate(-6deg); font-family:'Cormorant Garamond',serif; font-size:22vw; font-weight:700; color:rgba(196,30,58,.04); white-space:nowrap; pointer-events:none; user-select:none; line-height:1; z-index:0; }
</style>
</head>
<body class="bg-white text-ink">

<div id="cur"></div>

<!-- NAV -->
<nav id="nav" class="fixed top-0 left-0 right-0 z-[800] flex items-center justify-between px-12 h-[72px] bg-white/88 backdrop-blur-xl border-b border-line transition-all duration-300" style="backdrop-filter:blur(20px) saturate(1.4)">
  <a href="#beranda" class="flex items-center gap-4 no-underline">
    <div class="w-9 h-9 rounded-full bg-r flex items-center justify-center font-serif text-[.9rem] font-bold text-white shadow-[0_4px_16px_rgba(196,30,58,.3)] flex-shrink-0">O</div>
    <div class="text-[.78rem] font-medium text-ink leading-tight tracking-[.04em]">OSIS SMK 5 Telkom <small class="block text-[.62rem] font-normal text-muted tracking-[.06em]">Periode 2026 / 2027</small></div>
  </a>
  <ul class="hidden md:flex items-center gap-0.5 list-none">
    <li><a href="#profil"    class="px-3.5 py-2 text-[.72rem] font-medium tracking-[.06em] uppercase text-sub no-underline rounded hover:text-r hover:bg-rpale transition-colors">Profil</a></li>
    <li><a href="#visi-misi" class="px-3.5 py-2 text-[.72rem] font-medium tracking-[.06em] uppercase text-sub no-underline rounded hover:text-r hover:bg-rpale transition-colors">Visi Misi</a></li>
    <li><a href="#struktur"  class="px-3.5 py-2 text-[.72rem] font-medium tracking-[.06em] uppercase text-sub no-underline rounded hover:text-r hover:bg-rpale transition-colors">Struktur</a></li>
    {{-- <li><a href="#galeri"    class="px-3.5 py-2 text-[.72rem] font-medium tracking-[.06em] uppercase text-sub no-underline rounded hover:text-r hover:bg-rpale transition-colors">Galeri</a></li> --}}
    <li><a href="#voting"    class="px-3.5 py-2 text-[.72rem] font-medium tracking-[.06em] uppercase text-sub no-underline rounded hover:text-r hover:bg-rpale transition-colors">Voting</a></li>
  </ul>
  <a href="{{ route('pendaftaran-osis') }}" class="px-5 py-2 bg-r text-white no-underline rounded text-[.72rem] font-semibold tracking-[.1em] uppercase shadow-[0_4px_20px_rgba(196,30,58,.28)] hover:bg-r2 hover:-translate-y-px hover:shadow-[0_8px_28px_rgba(196,30,58,.35)] transition-all">Daftar Sekarang</a>
</nav>

<!-- HERO -->
<section id="beranda" class="min-h-screen flex flex-col justify-center pt-[72px] overflow-hidden relative bg-white">
  <div class="hero-bg-text">OSIS</div>

  <div class="relative z-10 max-w-[1120px] mx-auto w-full px-12 pt-20 pb-12 flex flex-col gap-0">
    <!-- pill -->
    <div class="inline-flex items-center gap-2.5 py-1.5 pl-2 pr-4 mb-10 bg-rpale border border-rsoft rounded-full w-fit anim-fs-0">
      <div class="w-5 h-5 rounded-full bg-r flex items-center justify-center flex-shrink-0">
        <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
      </div>
      <span class="text-[.65rem] font-semibold tracking-[.12em] uppercase text-r">Periode 2026 — 2027</span>
    </div>

    <h1 class="font-serif font-light leading-[.92] tracking-[-0.03em] text-ink anim-fs-1 max-w-[800px]" style="font-size:clamp(4.5rem,9vw,9rem)">
      Suara<br>Siswa,<br><strong class="font-bold">Aksi <em class="italic text-r font-light">Nyata</em></strong>
    </h1>

    <div class="w-12 h-0.5 bg-r my-10 hero-line"></div>

    <p class="text-[.92rem] font-light text-sub leading-[1.85] max-w-[540px] anim-fs-3">
      OSIS SMK Negeri 5 Telkom — ruang tumbuh para pemimpin muda yang berani berpikir, bergerak, dan berkolaborasi untuk sekolah yang lebih baik.
    </p>

    <div class="flex items-center gap-6 mt-11 anim-fs-4">
      <a href="#voting" class="px-8 py-3 bg-r text-white no-underline rounded text-[.75rem] font-semibold tracking-[.1em] uppercase shadow-[0_6px_24px_rgba(196,30,58,.3)] hover:bg-r2 hover:-translate-y-0.5 hover:shadow-[0_12px_32px_rgba(196,30,58,.4)] transition-all">Vote Ketua OSIS</a>
      <a href="#profil" class="text-[.75rem] font-medium tracking-[.08em] uppercase text-sub no-underline flex items-center gap-2 hover:text-r transition-colors after:content-['→'] after:transition-transform hover:after:translate-x-1">Kenali Kami</a>
    </div>
  </div>

  <!-- bottom strip -->
  <div class="relative z-10 border-t border-line bg-rpale anim-fs-5">
    <div class="max-w-[1120px] mx-auto px-12 flex items-stretch">
      <div class="flex items-stretch flex-1">
        <div class="flex flex-col justify-center py-8 pr-10 border-r border-rsoft min-w-[140px]">
          <div class="font-serif text-[2.6rem] font-semibold leading-none text-ink">50<em class="text-r not-italic">+</em></div>
          <div class="text-[.6rem] font-medium tracking-[.1em] uppercase text-muted mt-1.5">Anggota Aktif</div>
        </div>
        <div class="flex flex-col justify-center py-8 px-10 border-r border-rsoft min-w-[140px]">
          <div class="font-serif text-[2.6rem] font-semibold leading-none text-ink">10<em class="text-r not-italic">+</em></div>
          <div class="text-[.6rem] font-medium tracking-[.1em] uppercase text-muted mt-1.5">Program Kerja</div>
        </div>
      </div>
      <div class="bg-r text-white px-10 py-7 text-center flex flex-col justify-center items-center min-w-[220px] flex-shrink-0">
        <div class="font-serif text-[1.8rem] font-semibold leading-tight">10-12 Februari 2026</div>
        <div class="text-[.6rem] font-medium tracking-[.12em] uppercase opacity-75 mt-1.5">Batas Akhir Voting Ketua OSIS</div>
      </div>
    </div>
  </div>
</section>

<!-- TICKER -->
<div class="bg-r overflow-hidden py-3.5 flex items-center">
  <div class="ticker-track flex gap-0 whitespace-nowrap" id="tt"></div>
</div>

<!-- PROFIL -->
<section id="profil" class="py-28 px-12 bg-warm">
  <div class="max-w-[1120px] mx-auto">
    <div class="mb-16 reveal">
      <div class="flex items-center gap-3 mb-4">
        <div class="w-8 h-px bg-r"></div>
        <span class="text-[.62rem] font-semibold tracking-[.2em] uppercase text-r">01 — Tentang Kami</span>
      </div>
      <h2 class="font-serif text-ink leading-[1.05] tracking-[-0.02em]" style="font-size:clamp(2.4rem,4vw,3.6rem)">Profil <em class="italic text-r">OSIS</em></h2>
    </div>
    <div class="grid grid-cols-2 gap-px bg-line reveal">
      <div class="profil-cell bg-white p-11 hover:bg-rpale transition-colors relative overflow-hidden">
        <div class="pc-num font-serif text-[3.5rem] font-bold leading-none mb-4 transition-colors" style="color:rgba(196,30,58,.08)">01</div>
        <div class="text-[.8rem] font-semibold tracking-[.06em] uppercase text-ink mb-2.5">Siapa Kami</div>
        <p class="text-[.84rem] font-light text-sub leading-[1.8]">OSIS SMK Negeri 5 Telkom adalah wadah aspirasi, kreativitas, dan kepemimpinan siswa — menjembatani antara siswa dan sekolah dalam menciptakan lingkungan belajar yang dinamis.</p>
      </div>
      <div class="profil-cell bg-white p-11 hover:bg-rpale transition-colors relative overflow-hidden">
        <div class="pc-num font-serif text-[3.5rem] font-bold leading-none mb-4 transition-colors" style="color:rgba(196,30,58,.08)">02</div>
        <div class="text-[.8rem] font-semibold tracking-[.06em] uppercase text-ink mb-2.5">Apa yang Kami Lakukan</div>
        <p class="text-[.84rem] font-light text-sub leading-[1.8]">Mengelola ekstrakurikuler, mengadakan event sekolah, menyuarakan aspirasi siswa — OSIS adalah pusat pergerakan positif di lingkungan SMK Negeri 5 Telkom.</p>
      </div>
      <div class="profil-cell bg-white p-11 hover:bg-rpale transition-colors relative overflow-hidden">
        <div class="pc-num font-serif text-[3.5rem] font-bold leading-none mb-4 transition-colors" style="color:rgba(196,30,58,.08)">03</div>
        <div class="text-[.8rem] font-semibold tracking-[.06em] uppercase text-ink mb-2.5">Perjalanan Kami</div>
        <p class="text-[.84rem] font-light text-sub leading-[1.8]">Perjalanan OSIS SMK Negeri 5 Telkom dimulai dari semangat kebersamaan untuk menciptakan lingkungan sekolah yang aktif, kreatif, dan inspiratif.</p>
      </div>
      <div class="profil-cell bg-white p-11 hover:bg-rpale transition-colors relative overflow-hidden">
        <div class="pc-num font-serif text-[3.5rem] font-bold leading-none mb-4 transition-colors" style="color:rgba(196,30,58,.08)">04</div>
        <div class="text-[.8rem] font-semibold tracking-[.06em] uppercase text-ink mb-2.5">Nilai Kami</div>
        <p class="text-[.84rem] font-light text-sub leading-[1.8]">Integritas · Kolaborasi · Inovasi · Inklusivitas. Setiap suara siswa berharga dan berhak untuk didengar serta diperjuangkan bersama.</p>
      </div>
    </div>
  </div>
</section>

<!-- VISI MISI -->
<section id="visi-misi" class="py-28 px-12">
  <div class="max-w-[1120px] mx-auto">
    <div class="mb-16 reveal">
      <div class="flex items-center gap-3 mb-4">
        <div class="w-8 h-px bg-r"></div>
        <span class="text-[.62rem] font-semibold tracking-[.2em] uppercase text-r">02 — Arah & Tujuan</span>
      </div>
      <h2 class="font-serif text-ink leading-[1.05] tracking-[-0.02em]" style="font-size:clamp(2.4rem,4vw,3.6rem)">Visi &amp; <em class="italic text-r">Misi</em></h2>
    </div>
    <!-- VISI MISI CARDS — sejajar dan sama tinggi -->
    <div class="grid grid-cols-2 gap-12 items-stretch reveal">
      <!-- Visi -->
      <div class="bg-ink rounded-2xl p-12 relative overflow-hidden flex flex-col">
        <div class="text-[.6rem] font-semibold tracking-[.2em] uppercase text-r mb-6 flex items-center gap-2.5">
          Visi
          <span class="flex-1 h-px bg-white/10"></span>
        </div>
        <p class="font-serif text-[1.4rem] font-light italic text-white/90 leading-relaxed">"Menjadi dewan perwakilan yang menjunjung tinggi nilai-nilai prestasi akademik dan non akademik, serta mendengar aspirasi siswa dengan sebenar benarnya"</p>
      </div>
      <!-- Misi -->
      <div class="bg-ink rounded-2xl p-12 relative overflow-hidden flex flex-col">
        <div class="text-[.6rem] font-semibold tracking-[.2em] uppercase text-r mb-6 flex items-center gap-2.5">
          Misi
          <span class="flex-1 h-px bg-white/10"></span>
        </div>
        <p class="font-serif text-[1.4rem] font-light italic text-white/90 leading-relaxed">"Mendorong pertumbuhan prestasi siswa di dalam maupun di luar lingkungan sekolah dan menyambut dengan hangat kritikan dari seluruh warga SMK N 5 Telkom Banda Aceh"</p>
      </div>
    </div>
  </div>
</section>

<!-- STRUKTUR -->
<section id="struktur" class="py-28 px-12 bg-warm">
  <div class="max-w-[1120px] mx-auto">
    <div class="mb-16 reveal">
      <div class="flex items-center gap-3 mb-4">
        <div class="w-8 h-px bg-r"></div>
        <span class="text-[.62rem] font-semibold tracking-[.2em] uppercase text-r">03 — Tim Kami</span>
      </div>
      <h2 class="font-serif text-ink leading-[1.05] tracking-[-0.02em]" style="font-size:clamp(2.4rem,4vw,3.6rem)">Struktur <em class="italic text-r">Organisasi</em></h2>
    </div>
    <div class="flex flex-col items-center gap-0 reveal">
      <!-- Ketua -->
      <div class="flex justify-center">
        <div class="min-w-[200px] bg-r border border-r rounded-xl p-6 text-center shadow-[0_8px_32px_rgba(196,30,58,.3)]">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-white/60 mb-1.5">Ketua OSIS</div>
          <div class="text-[.82rem] font-semibold text-white">M.Akbar Maulana Mufa</div>
        </div>
      </div>
      <div class="w-px h-6 bg-rsoft"></div>
      <!-- Row 1 -->
      <div class="flex flex-wrap gap-2 justify-center">
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Wakil Ketua I</div>
          <div class="text-[.82rem] font-semibold text-ink">Muhammad Fairuz</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Sekretaris I</div>
          <div class="text-[.82rem] font-semibold text-ink">Qurrata'aini</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Sekretaris II</div>
          <div class="text-[.82rem] font-semibold text-ink">Putri Raisha</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Bendahara I</div>
          <div class="text-[.82rem] font-semibold text-ink">Hizri Uswa</div>
        </div>
      </div>
      <div class="w-px h-6 bg-rsoft"></div>
      <!-- Row 2 -->
      <div class="flex flex-wrap gap-2 justify-center">
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Sosial</div>
          <div class="text-[.82rem] font-semibold text-ink">Muthia Syabrina</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Kesenian</div>
          <div class="text-[.82rem] font-semibold text-ink">Calista Delinda</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Humas</div>
          <div class="text-[.82rem] font-semibold text-ink">Sulthan Alqan Najed</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Keamanan</div>
          <div class="text-[.82rem] font-semibold text-ink">Muhammad Furqan</div>
        </div>
      </div>
      <div class="w-px h-6 bg-rsoft"></div>
      <!-- Row 3 -->
      <div class="flex flex-wrap gap-2 justify-center">
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Agama</div>
          <div class="text-[.82rem] font-semibold text-ink">M.Zakiyul Mubarak</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Olahraga</div>
          <div class="text-[.82rem] font-semibold text-ink">Syamwil Mubarak</div>
        </div>
        <div class="org-node min-w-[160px] bg-white p-6 text-center border border-line rounded-xl hover:bg-rpale transition-colors relative overflow-hidden">
          <div class="text-[.58rem] font-semibold tracking-[.12em] uppercase text-muted mb-1.5">Kabid Kesehatan</div>
          <div class="text-[.82rem] font-semibold text-ink">Hafiz Al-Khalifi</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- GALERI -->
{{-- <section id="galeri" class="py-28 px-12">
  <div class="max-w-[1120px] mx-auto">
    <div class="mb-0 reveal">
      <div class="flex items-center gap-3 mb-4">
        <div class="w-8 h-px bg-r"></div>
        <span class="text-[.62rem] font-semibold tracking-[.2em] uppercase text-r">04 — Momen Kami</span>
      </div>
      <h2 class="font-serif text-ink leading-[1.05] tracking-[-0.02em]" style="font-size:clamp(2.4rem,4vw,3.6rem)">Galeri <em class="italic text-r">Kegiatan</em></h2>
    </div>
    <div class="gallery reveal">
      <div class="gi gi-1 rounded-xl overflow-hidden relative">
        <div class="gi-bg gi-bg-1 w-full h-full flex flex-col items-center justify-center gap-3 transition-transform duration-500" style="transition:transform .5s cubic-bezier(.22,1,.36,1)">
          <div class="text-[2.5rem] opacity-50">🎉</div>
          <div class="text-[.68rem] font-semibold tracking-[.08em] text-r2 uppercase">Pentas Seni 2024</div>
        </div>
        <div class="gi-overlay absolute inset-0 opacity-0 transition-opacity duration-300 flex items-end p-5" style="background:linear-gradient(to top,rgba(154,21,48,.82) 0%,rgba(154,21,48,.1) 55%,transparent 100%)">
          <div class="text-[.75rem] font-medium tracking-[.04em] text-white leading-snug">Pentas Seni Tahunan — Festival Kebudayaan Terbesar</div>
        </div>
      </div>
      <div class="gi gi-2 rounded-xl overflow-hidden relative">
        <div class="gi-bg gi-bg-2 w-full h-full flex flex-col items-center justify-center gap-3 transition-transform duration-500">
          <div class="text-[2.5rem] opacity-50">🏕️</div>
          <div class="text-[.68rem] font-semibold tracking-[.08em] text-r2 uppercase">Leadership Camp</div>
        </div>
        <div class="gi-overlay absolute inset-0 opacity-0 transition-opacity duration-300 flex items-end p-5" style="background:linear-gradient(to top,rgba(154,21,48,.82) 0%,rgba(154,21,48,.1) 55%,transparent 100%)">
          <div class="text-[.75rem] font-medium tracking-[.04em] text-white leading-snug">Leadership Camp 2024</div>
        </div>
      </div>
      <div class="gi gi-3 rounded-xl overflow-hidden relative">
        <div class="gi-bg gi-bg-3 w-full h-full flex flex-col items-center justify-center gap-3 transition-transform duration-500">
          <div class="text-[2.5rem] opacity-50">⚽</div>
          <div class="text-[.68rem] font-semibold tracking-[.08em] text-r2 uppercase">OSIS Cup 2024</div>
        </div>
        <div class="gi-overlay absolute inset-0 opacity-0 transition-opacity duration-300 flex items-end p-5" style="background:linear-gradient(to top,rgba(154,21,48,.82) 0%,rgba(154,21,48,.1) 55%,transparent 100%)">
          <div class="text-[.75rem] font-medium tracking-[.04em] text-white leading-snug">Turnamen Olahraga Antar Kelas</div>
        </div>
      </div>
      <div class="gi gi-4 rounded-xl overflow-hidden relative">
        <div class="gi-bg gi-bg-4 w-full h-full flex flex-col items-center justify-center gap-3 transition-transform duration-500">
          <div class="text-[2.5rem] opacity-50">🎓</div>
          <div class="text-[.68rem] font-semibold tracking-[.08em] text-r2 uppercase">Pelantikan Pengurus</div>
        </div>
        <div class="gi-overlay absolute inset-0 opacity-0 transition-opacity duration-300 flex items-end p-5" style="background:linear-gradient(to top,rgba(154,21,48,.82) 0%,rgba(154,21,48,.1) 55%,transparent 100%)">
          <div class="text-[.75rem] font-medium tracking-[.04em] text-white leading-snug">Pelantikan Pengurus OSIS 2024</div>
        </div>
      </div>
      <div class="gi gi-5 rounded-xl overflow-hidden relative">
        <div class="gi-bg gi-bg-5 w-full h-full flex flex-col items-center justify-center gap-3 transition-transform duration-500">
          <div class="text-[2.5rem] opacity-50">🌱</div>
          <div class="text-[.68rem] font-semibold tracking-[.08em] text-r2 uppercase">Go Green Action</div>
        </div>
        <div class="gi-overlay absolute inset-0 opacity-0 transition-opacity duration-300 flex items-end p-5" style="background:linear-gradient(to top,rgba(154,21,48,.82) 0%,rgba(154,21,48,.1) 55%,transparent 100%)">
          <div class="text-[.75rem] font-medium tracking-[.04em] text-white leading-snug">Aksi Peduli Lingkungan Hijau</div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<!-- VOTING -->
<section id="voting" class="py-28 px-12 bg-warm">
  <div class="max-w-[1120px] mx-auto">
    <div class="flex items-end justify-between gap-8 flex-wrap mb-10 reveal">
      <div>
        <div class="flex items-center gap-3 mb-4">
          <div class="w-8 h-px bg-r"></div>
          <span class="text-[.62rem] font-semibold tracking-[.2em] uppercase text-r">05 — Pilih Pemimpinmu</span>
        </div>
        <h2 class="font-serif text-ink leading-[1.05] tracking-[-0.02em]" style="font-size:clamp(2.4rem,4vw,3.6rem)">Vote <em class="italic text-r">Ketua &amp; Wakil OSIS</em></h2>
        <p class="mt-3 text-[.88rem] font-light text-sub leading-[1.8] max-w-[520px]">Satu siswa, satu suara. Berikan pilihan terbaikmu untuk Ketua & Wakil OSIS periode 2026/2027.</p>
      </div>
      <div class="py-2 px-4 bg-rpale border border-rsoft rounded text-[.68rem] font-semibold text-r tracking-[.06em] whitespace-nowrap">⏱ Voting Ditutup</div>
    </div>

    @php
        $candidates = Pemilihan::orderBy('Jumlah_Suara', 'desc')->get();
        $winner = $candidates->first();
        $totalVotes = $candidates->sum('Jumlah_Suara');
    @endphp

    {{-- PEMENANG SEMENTARA --}}
    @if($winner)
    <div class="bg-gradient-to-r from-r to-r2 rounded-2xl p-8 mb-8 text-white text-center reveal">
      <div class="text-[.62rem] font-semibold tracking-[.2em] uppercase opacity-75 mb-2">🏆 PEMENANG SEMENTARA</div>
      <div class="font-serif text-[2rem] font-bold mb-2">{{ $winner->Nama_Ketua }} & {{ $winner->Nama_Wakil }}</div>
      <div class="text-[.88rem] opacity-90 mb-4">{{ $winner->Jumlah_Suara }} suara ({{ $totalVotes > 0 ? round(($winner->Jumlah_Suara / $totalVotes) * 100) : 0 }}%)</div>
      <div class="flex justify-center gap-4">
        <img src="{{ $winner->Foto_Ketua ? asset('storage/' . $winner->Foto_Ketua) : 'https://ui-avatars.com/api/?name=' . urlencode($winner->Nama_Ketua) . '&background=fde8e8&color=c10e0e&size=60&font-size=0.35&bold=true' }}" alt="{{ $winner->Nama_Ketua }}" class="w-16 h-16 rounded-full border-2 border-white/30">
        <img src="{{ $winner->Foto_Wakil ? asset('storage/' . $winner->Foto_Wakil) : 'https://ui-avatars.com/api/?name=' . urlencode($winner->Nama_Wakil) . '&background=fde8e8&color=c10e0e&size=60&font-size=0.35&bold=true' }}" alt="{{ $winner->Nama_Wakil }}" class="w-16 h-16 rounded-full border-2 border-white/30">
      </div>
    </div>
    @endif

    @php
        $gridLayoutClass = $candidates->count() <= 2
            ? 'grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10 max-w-4xl mx-auto'
            : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5';
    @endphp
    <div class="{{ $gridLayoutClass }} reveal" id="cGrid"></div>

    <div class="flex items-center justify-between mt-10 px-8 py-6 bg-warm rounded-xl border border-line flex-wrap gap-4 reveal">
      <div>
        <div class="text-[.62rem] font-semibold tracking-[.16em] uppercase text-muted mb-1">Total Suara Masuk</div>
        <div class="font-serif text-[2.5rem] font-semibold text-r leading-none" id="vTotal">{{ $totalVotes }}</div>
      </div>
      <div class="text-[.72rem] font-light text-muted text-right leading-relaxed">Data diperbarui secara real-time<br>setiap suara masuk</div>
    </div>
  </div>
</section>


<!-- FOOTER -->
<footer class="bg-ink px-12 py-12 flex items-center justify-between flex-wrap gap-6">
  <div>
    <div class="font-serif text-[1.3rem] font-normal text-white">OSIS <span class="text-r">SMK Negeri 5 Telkom</span></div>
    <div class="text-[.68rem] font-light text-white/30 mt-1">© 2026 · Dibuat dengan penuh semangat oleh Tim OSIS</div>
  </div>
  <div class="flex gap-7">
    <a href="#" class="text-[.68rem] font-medium tracking-[.08em] uppercase text-white/35 no-underline hover:text-r transition-colors">Instagram</a>
    <a href="#" class="text-[.68rem] font-medium tracking-[.08em] uppercase text-white/35 no-underline hover:text-r transition-colors">TikTok</a>
    <a href="#" class="text-[.68rem] font-medium tracking-[.08em] uppercase text-white/35 no-underline hover:text-r transition-colors">Email</a>
    <a href="#" class="text-[.68rem] font-medium tracking-[.08em] uppercase text-white/35 no-underline hover:text-r transition-colors">Kontak</a>
  </div>
</footer>

<script>
// cursor
const cur = document.getElementById('cur');
document.addEventListener('mousemove', e => { cur.style.left = e.clientX+'px'; cur.style.top = e.clientY+'px'; });
document.querySelectorAll('a,button,.org-node,.profil-cell,.gi,.reg-card').forEach(el => {
  el.addEventListener('mouseenter', () => cur.classList.add('big'));
  el.addEventListener('mouseleave', () => cur.classList.remove('big'));
});

// nav
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => {
  if (scrollY > 40) { nav.style.background='rgba(255,255,255,.98)'; nav.style.boxShadow='0 1px 32px rgba(26,21,18,.06)'; }
  else { nav.style.background='rgba(255,255,255,.88)'; nav.style.boxShadow=''; }
});

// ticker
const items = ['10+ Program Kerja Aktif','50+ Anggota Terlatih','Voting Ketua OSIS 2026','Daftar Sekarang','Inovatif · Inklusif · Berdampak'];
const tt = document.getElementById('tt');
const build = items.map(t=>`<span class="inline-flex items-center gap-3 px-10 text-[.68rem] font-semibold tracking-[.12em] uppercase text-white/85">${t}<span class="text-white/30 text-[.5rem]">✦</span></span>`).join('');
tt.innerHTML = build + build;

// reveal
const ro = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

// voting
@php
    $candsData = $candidates->map(function ($candidate, $index) {
        return [
            'id' => $candidate->id,
            'name' => $candidate->Nama_Ketua . ' & ' . $candidate->Nama_Wakil,
            'num' => str_pad($index + 1, 2, '0', STR_PAD_LEFT),
            'tagline' => $candidate->Visi . ' — ' . $candidate->Misi,
            'foto_ketua' => $candidate->Foto_Ketua ? asset('storage/' . $candidate->Foto_Ketua) : 'https://ui-avatars.com/api/?name=' . urlencode($candidate->Nama_Ketua) . '&background=fde8e8&color=c10e0e&size=60&font-size=0.35&bold=true',
            'foto_wakil' => $candidate->Foto_Wakil ? asset('storage/' . $candidate->Foto_Wakil) : 'https://ui-avatars.com/api/?name=' . urlencode($candidate->Nama_Wakil) . '&background=fde8e8&color=c10e0e&size=60&font-size=0.35&bold=true',
            'votes' => $candidate->Jumlah_Suara,
        ];
    })->toArray();
@endphp
const cands = @json($candsData);
let voted = null;

function renderVote() {
  const g = document.getElementById('cGrid');
  g.innerHTML = '';
  const tot = cands.reduce((a,c) => a+c.votes, 0);
  cands.forEach(c => {
    const pct = tot > 0 ? Math.round(c.votes/tot*100) : 0;
    const d = document.createElement('div');
    d.className = `border rounded-2xl overflow-hidden bg-white transition-all duration-300 relative border-line hover:border-rsoft hover:shadow-[0_8px_40px_rgba(196,30,58,.1)] hover:-translate-y-1`;
    d.innerHTML = `
      <div class="bg-rpale px-6 pt-10 pb-6 text-center relative">
        <div class="absolute top-4 left-4 w-7 h-7 rounded-full bg-r text-white flex items-center justify-center text-[.62rem] font-bold">${c.num}</div>
        <div class="flex justify-center gap-3 mb-4">
          <img src="${c.foto_ketua}" alt="Ketua" class="border-[rgba(196,30,58,.15)] w-16 h-16 rounded-full bg-white border-[2px] object-cover">
          <img src="${c.foto_wakil}" alt="Wakil" class="border-[rgba(196,30,58,.15)] w-16 h-16 rounded-full bg-white border-[2px] object-cover">
        </div>
        <div class="font-serif text-[1.1rem] font-semibold text-ink mb-1">${c.name}</div>
        <p class="text-[.7rem] font-light text-sub leading-relaxed">${c.tagline}</p>
      </div>
      <div class="p-6">
        <div class="h-[3px] bg-line rounded-full mb-2 overflow-hidden"><div class="vote-bar h-full rounded-full" style="width:${pct}%;background:linear-gradient(90deg,#C41E3A,#E8304A)"></div></div>
        <div class="flex justify-between text-[.66rem] text-muted mb-5"><span>${c.votes} suara</span><span>${pct}%</span></div>
        <a href="{{ route('vote') }}" class="w-full py-2.5 rounded-lg border-[1.5px] font-sans text-[.72rem] font-semibold tracking-[.08em] uppercase transition-all bg-r text-white border-r hover:bg-r2 hover:border-r2 text-center no-underline block">Vote Sekarang</a>
      </div>`;
    g.appendChild(d);
  });
  document.getElementById('vTotal').textContent = tot.toLocaleString('id-ID');
}

function doVote(id) {
  // Redirect to voting page
  window.location.href = '{{ route("vote") }}';
}
renderVote();

// forms
function toggleForm(t) {
  const f = document.getElementById('form'+t);
  const b = document.getElementById('btn'+t);
  const open = f.classList.toggle('open');
  b.classList.toggle('open', open);
  b.textContent = open ? 'Tutup Formulir' : 'Buka Formulir Pendaftaran';
  if (open) { b.style.background='#C41E3A'; b.style.color='#fff'; b.style.borderColor='#C41E3A'; }
  else { b.style.background=''; b.style.color=''; b.style.borderColor=''; }
}
function submitReg(t) {
  document.getElementById('done'+t).classList.remove('hidden');
  document.getElementById('done'+t).classList.add('block');
  document.getElementById('form'+t).querySelectorAll('input,select,textarea').forEach(el => el.value='');
}
</script>
</body>
</html>