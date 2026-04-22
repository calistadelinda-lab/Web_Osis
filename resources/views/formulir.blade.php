<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Formulir Pendaftaran OSIS SMK Negeri 5 Telkom</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        r:'#C41E3A', r2:'#9B1530', r3:'#E8304A',
        rpale:'#FDF2F4', rsoft:'#F5D6DB',
        warm:'#F4F2EE', line:'#E8E4DE',
        ink:'#1A1512', sub:'#5C5550', muted:'#9C948C', off:'#FAFAF8',
      },
      fontFamily: {
        serif: ['Cormorant Garamond','serif'],
        sans:  ['Jost','sans-serif'],
      }
    }
  }
}
</script>
<style>
  html { scroll-behavior: smooth; }
  body { font-family: 'Jost', sans-serif; }
  *, a, button { cursor: none !important; }
  #cur { position:fixed;top:0;left:0;width:8px;height:8px;background:#C41E3A;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%);transition:width .25s,height .25s,background .25s;mix-blend-mode:multiply; }
  #cur.big { width:40px;height:40px;background:rgba(196,30,58,.15); }
  @keyframes fadeUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:none} }
  .fade-up  { animation: fadeUp .6s ease both; }
  .fade-up-1{ animation: fadeUp .6s .1s ease both; }
  .fade-up-2{ animation: fadeUp .6s .2s ease both; }
  input:focus, select:focus, textarea:focus { outline:none; border-color:#C41E3A !important; background:#fff !important; }
  .tab-btn.active { color:#C41E3A; border-bottom:2.5px solid #C41E3A; background:#FDF2F4; }
  .tab-btn.active .tab-icon { background:#C41E3A; color:#fff; }
  .tab-btn:not(.active) .tab-icon { background:#E8E4DE; color:#9C948C; }
  .panel { display:none; }
  .panel.active { display:block; }
  .success-box { display:none; }
  .success-box.show { display:flex; animation: toastIn .3s ease; }
  @keyframes toastIn { from{opacity:0;transform:translateY(-6px)} to{opacity:1;transform:none} }
</style>
</head>
<body class="bg-warm min-h-screen flex flex-col items-center justify-center py-12 px-4">

<div id="cur"></div>

<!-- HEADER -->
<div class="text-center mb-10 fade-up">
  <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-rpale border border-rsoft rounded-full mb-4">
    <div class="w-4 h-4 rounded-full bg-r flex items-center justify-center flex-shrink-0">
      <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
    </div>
    <span class="text-[.62rem] font-semibold tracking-[.12em] uppercase text-r">Periode 2026 — 2027</span>
  </div>
  <h1 class="font-serif font-light text-ink leading-tight" style="font-size:clamp(2.4rem,5vw,3.5rem)">
    Formulir <em class="italic text-r">Pendaftaran</em>
  </h1>
  <p class="mt-3 text-[.85rem] font-light text-sub max-w-md mx-auto leading-relaxed">
    OSIS SMK Negeri 5 Telkom — Bergabunglah dan jadilah bagian dari perubahan.
  </p>
</div>

<!-- CARD -->
<div class="w-full max-w-2xl bg-white rounded-2xl overflow-hidden border border-line shadow-[0_8px_40px_rgba(26,21,18,.08)] fade-up-1">

  <!-- TABS -->
  <div class="flex border-b border-line bg-warm">
    <button id="tab-ketua" class="tab-btn active flex-1 flex items-center justify-center gap-2.5 py-4 px-6 font-sans text-[.68rem] font-semibold tracking-[.1em] uppercase border-b-[2.5px] transition-all" onclick="switchTab('ketua')">
      <span class="tab-icon w-6 h-6 rounded-full flex items-center justify-center text-[.62rem] font-bold flex-shrink-0 transition-all">K</span>
      Ketua / Wakil OSIS
    </button>
    <button id="tab-anggota" class="tab-btn flex-1 flex items-center justify-center gap-2.5 py-4 px-6 font-sans text-[.68rem] font-semibold tracking-[.1em] uppercase text-muted border-b-[2.5px] border-transparent transition-all" onclick="switchTab('anggota')">
      <span class="tab-icon w-6 h-6 rounded-full flex items-center justify-center text-[.62rem] font-bold flex-shrink-0 transition-all">A</span>
      Anggota OSIS
    </button>
  </div>

  <!-- ═══════════════════════════════ -->
  <!-- PANEL KETUA                     -->
  <!-- ═══════════════════════════════ -->
  <div class="panel active" id="panel-ketua">

    <div class="bg-ink px-10 py-8 relative overflow-hidden">
      <div class="absolute right-6 -bottom-4 font-serif text-[8rem] font-bold leading-none text-white/[0.04] pointer-events-none select-none">K</div>
      <div class="text-[.58rem] font-semibold tracking-[.18em] uppercase text-r mb-2">Jalur Ketua / Wakil OSIS</div>
      <h2 class="font-serif text-[2rem] font-semibold text-white mb-1.5">Ketua / Wakil OSIS</h2>
      <p class="text-[.75rem] font-light text-white/40 leading-relaxed">Jadilah pemimpin yang menginspirasi dan menggerakkan perubahan positif di sekolah.</p>
    </div>

    <div class="bg-rpale border-b border-rsoft px-10 py-3 flex flex-wrap gap-x-5 gap-y-1.5">
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Kelas X – XI aktif</span>
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Memiliki jiwa kepemimpinan &amp; visi jelas</span>
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Tanpa sanksi akademik</span>
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Dukungan 2 guru pembimbing</span>
    </div>

    <div class="px-10 py-8">

      {{-- Form Ketua/Wakil OSIS --}}
      <form action="{{ route('pendaftaran-ketua.store') }}" method="POST">
        @csrf

        <div class="flex items-center gap-3 mb-5">
          <div class="flex-1 h-px bg-line"></div>
          <span class="text-[.58rem] font-semibold tracking-[.14em] uppercase text-muted">Identitas Diri</span>
          <div class="flex-1 h-px bg-line"></div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-3">
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_nama">Nama Lengkap</label>
            <input type="text" id="ketua_nama" name="nama" placeholder="Nama lengkap kamu" value="{{ old('nama') }}" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors"/>
            @error('nama') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_nisn">NISN</label>
            <input type="text" id="ketua_nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" value="{{ old('nisn') }}" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors"/>
            @error('nisn') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-3">
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_kelas">Kelas</label>
            <select id="ketua_kelas" name="kelas" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors">
              <option value="">Pilih kelas</option>
              <option value="X TJKT 1" {{ old('kelas')=='X TJKT 1'?'selected':'' }}>X TJKT 1</option>
              <option value="X TJKT 2" {{ old('kelas')=='X TJKT 2'?'selected':'' }}>X TJKT 2</option>
              <option value="X TJKT 3" {{ old('kelas')=='X TJKT 3'?'selected':'' }}>X TJKT 3</option>
              <option value="X PPLG 1" {{ old('kelas')=='X PPLG 1'?'selected':'' }}>X PPLG 1</option>
              <option value="X PPLG 2" {{ old('kelas')=='X PPLG 2'?'selected':'' }}>X PPLG 2</option>
              <option value="X PPLG 3" {{ old('kelas')=='X PPLG 3'?'selected':'' }}>X PPLG 3</option>
              <option value="X BP"     {{ old('kelas')=='X BP'    ?'selected':'' }}>X BP</option>
              <option value="XI TJA 1" {{ old('kelas')=='XI TJA 1'?'selected':'' }}>XI TJA 1</option>
              <option value="XI TJA 2" {{ old('kelas')=='XI TJA 2'?'selected':'' }}>XI TJA 2</option>
              <option value="XI TKJ 1" {{ old('kelas')=='XI TKJ 1'?'selected':'' }}>XI TKJ 1</option>
              <option value="XI TKJ 2" {{ old('kelas')=='XI TKJ 2'?'selected':'' }}>XI TKJ 2</option>
              <option value="XI RPL 1" {{ old('kelas')=='XI RPL 1'?'selected':'' }}>XI RPL 1</option>
              <option value="XI RPL 2" {{ old('kelas')=='XI RPL 2'?'selected':'' }}>XI RPL 2</option>
              <option value="XI RPL 3" {{ old('kelas')=='XI RPL 3'?'selected':'' }}>XI RPL 3</option>
              <option value="XI PF 1"  {{ old('kelas')=='XI PF 1' ?'selected':'' }}>XI PF 1</option>
              <option value="XI PF 2"  {{ old('kelas')=='XI PF 2' ?'selected':'' }}>XI PF 2</option>
            </select>
            @error('kelas') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_no_hp">No. HP / WhatsApp</label>
            <input type="tel" id="ketua_no_hp" name="no_hp" placeholder="+62 8xx xxxx xxxx" value="{{ old('no_hp') }}" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors"/>
            @error('no_hp') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
        </div>

        <div class="mb-5">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_jabatan">Jabatan yang Dipilih</label>
          <select id="ketua_jabatan" name="jabatan" required
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors">
            <option value="">Pilih jabatan</option>
            <option value="Ketua OSIS"       {{ old('jabatan')=='Ketua OSIS'      ?'selected':'' }}>Ketua OSIS</option>
            <option value="Wakil Ketua OSIS" {{ old('jabatan')=='Wakil Ketua OSIS'?'selected':'' }}>Wakil Ketua OSIS</option>
          </select>
          @error('jabatan') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-3 mb-5">
          <div class="flex-1 h-px bg-line"></div>
          <span class="text-[.58rem] font-semibold tracking-[.14em] uppercase text-muted">Visi &amp; Misi</span>
          <div class="flex-1 h-px bg-line"></div>
        </div>

        <div class="mb-3">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_visi">Visi</label>
          <textarea id="ketua_visi" name="visi" placeholder="Tuliskan visi kamu sebagai Ketua / Wakil OSIS..." required
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors resize-y min-h-[68px]">{{ old('visi') }}</textarea>
          @error('visi') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_misi">Misi</label>
          <textarea id="ketua_misi" name="misi" placeholder="Tuliskan misi dan program kerja utama kamu..." required
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors resize-y min-h-[68px]">{{ old('misi') }}</textarea>
          @error('misi') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-5">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="ketua_motivasi">Motivasi Mencalonkan Diri</label>
          <textarea id="ketua_motivasi" name="motivasi" placeholder="Ceritakan mengapa kamu ingin menjadi Ketua / Wakil OSIS..." required
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors resize-y min-h-[68px]">{{ old('motivasi') }}</textarea>
          @error('motivasi') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
          class="w-full py-3.5 bg-r text-white font-sans text-[.72rem] font-semibold tracking-[.12em] uppercase rounded-lg shadow-[0_4px_20px_rgba(196,30,58,.25)] hover:bg-r2 hover:-translate-y-px transition-all">
          Kirim Pendaftaran Ketua / Wakil →
        </button>

        @if(session('success_ketua'))
        <div class="flex items-start gap-3 mt-5 p-4 bg-rpale border border-rsoft border-l-[3px] border-l-r rounded-lg">
          <div class="w-6 h-6 rounded-full bg-r flex items-center justify-center flex-shrink-0 text-white text-[.65rem]">✓</div>
          <div class="text-[.77rem] text-r2 leading-relaxed"><strong class="font-semibold">Pendaftaran berhasil dikirim!</strong><br>Tim OSIS akan menghubungimu dalam 2–3 hari kerja. Tetap semangat!</div>
        </div>
        @endif

      </form>

    </div>
  </div><!-- /panel-ketua -->

  <!-- ═══════════════════════════════ -->
  <!-- PANEL ANGGOTA                   -->
  <!-- ═══════════════════════════════ -->
  <div class="panel" id="panel-anggota">

    <div class="bg-ink px-10 py-8 relative overflow-hidden">
      <div class="absolute right-6 -bottom-4 font-serif text-[8rem] font-bold leading-none text-white/[0.04] pointer-events-none select-none">A</div>
      <div class="text-[.58rem] font-semibold tracking-[.18em] uppercase text-r mb-2">Jalur Anggota OSIS</div>
      <h2 class="font-serif text-[2rem] font-semibold text-white mb-1.5">Anggota OSIS</h2>
      <p class="text-[.75rem] font-light text-white/40 leading-relaxed">Jadilah bagian dari organisasi yang bergerak, berkontribusi, dan berdampak nyata bagi seluruh warga sekolah.</p>
    </div>

    <div class="bg-rpale border-b border-rsoft px-10 py-3 flex flex-wrap gap-x-5 gap-y-1.5">
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Kelas X – XI aktif</span>
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Berkomitmen mengikuti program kerja</span>
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Minat di salah satu bidang</span>
      <span class="flex items-center gap-1.5 text-[.63rem] text-sub"><span class="w-1.5 h-1.5 rounded-full bg-r flex-shrink-0"></span>Rekomendasi wali kelas</span>
    </div>

    <div class="px-10 py-8">

      {{-- Form Anggota OSIS --}}
      <form action="{{ route('pendaftaran-anggota.store') }}" method="POST">
        @csrf

        <div class="flex items-center gap-3 mb-5">
          <div class="flex-1 h-px bg-line"></div>
          <span class="text-[.58rem] font-semibold tracking-[.14em] uppercase text-muted">Identitas Diri</span>
          <div class="flex-1 h-px bg-line"></div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-3">
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_nama">Nama Lengkap</label>
            <input type="text" id="anggota_nama" name="nama" placeholder="Nama lengkap kamu" value="{{ old('nama') }}" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors"/>
            @error('nama') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_nisn">NISN</label>
            <input type="text" id="anggota_nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" value="{{ old('nisn') }}" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors"/>
            @error('nisn') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-5">
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_kelas">Kelas</label>
            <select id="anggota_kelas" name="kelas" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors">
              <option value="">Pilih kelas</option>
              <option value="X TJKT 1" {{ old('kelas')=='X TJKT 1'?'selected':'' }}>X TJKT 1</option>
              <option value="X TJKT 2" {{ old('kelas')=='X TJKT 2'?'selected':'' }}>X TJKT 2</option>
              <option value="X TJKT 3" {{ old('kelas')=='X TJKT 3'?'selected':'' }}>X TJKT 3</option>
              <option value="X PPLG 1" {{ old('kelas')=='X PPLG 1'?'selected':'' }}>X PPLG 1</option>
              <option value="X PPLG 2" {{ old('kelas')=='X PPLG 2'?'selected':'' }}>X PPLG 2</option>
              <option value="X PPLG 3" {{ old('kelas')=='X PPLG 3'?'selected':'' }}>X PPLG 3</option>
              <option value="X BP"     {{ old('kelas')=='X BP'    ?'selected':'' }}>X BP</option>
              <option value="XI TJA 1" {{ old('kelas')=='XI TJA 1'?'selected':'' }}>XI TJA 1</option>
              <option value="XI TJA 2" {{ old('kelas')=='XI TJA 2'?'selected':'' }}>XI TJA 2</option>
              <option value="XI TKJ 1" {{ old('kelas')=='XI TKJ 1'?'selected':'' }}>XI TKJ 1</option>
              <option value="XI TKJ 2" {{ old('kelas')=='XI TKJ 2'?'selected':'' }}>XI TKJ 2</option>
              <option value="XI RPL 1" {{ old('kelas')=='XI RPL 1'?'selected':'' }}>XI RPL 1</option>
              <option value="XI RPL 2" {{ old('kelas')=='XI RPL 2'?'selected':'' }}>XI RPL 2</option>
              <option value="XI RPL 3" {{ old('kelas')=='XI RPL 3'?'selected':'' }}>XI RPL 3</option>
              <option value="XI PF 1"  {{ old('kelas')=='XI PF 1' ?'selected':'' }}>XI PF 1</option>
              <option value="XI PF 2"  {{ old('kelas')=='XI PF 2' ?'selected':'' }}>XI PF 2</option>
            </select>
            @error('kelas') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
          <div>
            <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_no_hp">No. HP / WhatsApp</label>
            <input type="tel" id="anggota_no_hp" name="no_hp" placeholder="+62 8xx xxxx xxxx" value="{{ old('no_hp') }}" required
              class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors"/>
            @error('no_hp') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
          </div>
        </div>

        <div class="flex items-center gap-3 mb-5">
          <div class="flex-1 h-px bg-line"></div>
          <span class="text-[.58rem] font-semibold tracking-[.14em] uppercase text-muted">Minat &amp; Bakat</span>
          <div class="flex-1 h-px bg-line"></div>
        </div>

        <div class="mb-3">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_bidang">Bidang yang Diminati</label>
          <select id="anggota_bidang" name="bidang" required
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors">
            <option value="">Pilih bidang</option>
            <option value="Sosial"           {{ old('bidang')=='Sosial'          ?'selected':'' }}>Sosial</option>
            <option value="Kreativitas & Seni"{{ old('bidang')=='Kreativitas & Seni'?'selected':'' }}>Kreativitas &amp; Seni</option>
            <option value="Olahraga"         {{ old('bidang')=='Olahraga'        ?'selected':'' }}>Olahraga</option>
            <option value="Agama"            {{ old('bidang')=='Agama'           ?'selected':'' }}>Agama</option>
            <option value="Keamanan"         {{ old('bidang')=='Keamanan'        ?'selected':'' }}>Keamanan</option>
            <option value="Humas"            {{ old('bidang')=='Humas'           ?'selected':'' }}>Humas</option>
            <option value="Kesehatan"        {{ old('bidang')=='Kesehatan'       ?'selected':'' }}>Kesehatan</option>
          </select>
          @error('bidang') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_pengalaman">Pengalaman Organisasi</label>
          <textarea id="anggota_pengalaman" name="pengalaman" placeholder="Ceritakan pengalaman organisasi atau kepanitiaan sebelumnya (jika ada)..."
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors resize-y min-h-[68px]">{{ old('pengalaman') }}</textarea>
          @error('pengalaman') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-5">
          <label class="block text-[.58rem] font-semibold tracking-[.1em] uppercase text-muted mb-1.5" for="anggota_motivasi">Motivasi Bergabung</label>
          <textarea id="anggota_motivasi" name="motivasi" placeholder="Mengapa kamu ingin bergabung dengan OSIS?" required
            class="w-full px-3.5 py-2.5 border border-line rounded-md font-sans text-[.8rem] font-light text-ink bg-off transition-colors resize-y min-h-[68px]">{{ old('motivasi') }}</textarea>
          @error('motivasi') <p class="text-r text-[.65rem] mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
          class="w-full py-3.5 bg-r text-white font-sans text-[.72rem] font-semibold tracking-[.12em] uppercase rounded-lg shadow-[0_4px_20px_rgba(196,30,58,.25)] hover:bg-r2 hover:-translate-y-px transition-all">
          Kirim Pendaftaran Anggota →
        </button>

        @if(session('success_anggota'))
        <div class="flex items-start gap-3 mt-5 p-4 bg-rpale border border-rsoft border-l-[3px] border-l-r rounded-lg">
          <div class="w-6 h-6 rounded-full bg-r flex items-center justify-center flex-shrink-0 text-white text-[.65rem]">✓</div>
          <div class="text-[.77rem] text-r2 leading-relaxed"><strong class="font-semibold">Pendaftaran berhasil dikirim!</strong><br>Tim OSIS akan menghubungimu dalam 2–3 hari kerja. Tetap semangat!</div>
        </div>
        @endif

      </form>

    </div>
  </div><!-- /panel-anggota -->

</div><!-- /card -->

<p class="mt-8 text-[.65rem] text-muted text-center fade-up-2">© 2026 OSIS SMK Negeri 5 Telkom · Dibuat dengan penuh semangat</p>

<script>
const cur = document.getElementById('cur');
document.addEventListener('mousemove', e => { cur.style.left=e.clientX+'px'; cur.style.top=e.clientY+'px'; });
document.querySelectorAll('a,button,input,select,textarea').forEach(el => {
  el.addEventListener('mouseenter', () => cur.classList.add('big'));
  el.addEventListener('mouseleave', () => cur.classList.remove('big'));
});

function switchTab(id) {
  document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(t => {
    t.classList.remove('active');
    t.style.borderBottomColor = 'transparent';
    t.style.color = '';
  });
  document.getElementById('panel-' + id).classList.add('active');
  document.getElementById('tab-' + id).classList.add('active');
}
</script>
</body>
</html>