<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>OSIS SMK Negeri 5 Telkom</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<style>
:root {
  --r: #C41E3A;
  --r2: #9B1530;
  --r3: #E8304A;
  --rpale: #FDF2F4;
  --rsoft: #F5D6DB;
  --w: #FFFFFF;
  --off: #FAFAF8;
  --warm: #F4F2EE;
  --line: #E8E4DE;
  --ink: #1A1512;
  --sub: #5C5550;
  --muted: #9C948C;
  --gold: #C8A96A;
}
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; font-size: 16px; }
body { font-family: 'Jost', sans-serif; background: var(--w); color: var(--ink); overflow-x: hidden; }

/* ── CURSOR ── */
*, a, button { cursor: none !important; }
#cur { position: fixed; top: 0; left: 0; width: 8px; height: 8px; background: var(--r); border-radius: 50%; pointer-events: none; z-index: 9999; transform: translate(-50%,-50%); transition: width .25s, height .25s, background .25s; mix-blend-mode: multiply; }
#cur.big { width: 40px; height: 40px; background: rgba(196,30,58,.15); }

/* ── NAVBAR ── */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 800;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 3rem; height: 72px;
  background: rgba(255,255,255,.88);
  backdrop-filter: blur(20px) saturate(1.4);
  border-bottom: 1px solid var(--line);
  transition: all .4s;
}
nav.solid { background: rgba(255,255,255,.98); box-shadow: 0 1px 32px rgba(26,21,18,.06); }
.nav-brand { display: flex; align-items: center; gap: 1rem; text-decoration: none; }
.brand-mark {
  width: 36px; height: 36px; border-radius: 50%;
  background: var(--r); display: flex; align-items: center; justify-content: center;
  font-family: 'Cormorant Garamond', serif; font-size: .9rem; font-weight: 700; color: #fff;
  letter-spacing: .02em; flex-shrink: 0;
  box-shadow: 0 4px 16px rgba(196,30,58,.3);
}
.brand-text { font-size: .78rem; font-weight: 500; color: var(--ink); letter-spacing: .04em; line-height: 1.3; }
.brand-text small { display: block; font-size: .62rem; font-weight: 400; color: var(--muted); letter-spacing: .06em; }
.nav-links { display: flex; align-items: center; gap: .15rem; list-style: none; }
.nav-links a {
  padding: .45rem .9rem; font-size: .72rem; font-weight: 500; letter-spacing: .06em;
  text-transform: uppercase; color: var(--sub); text-decoration: none;
  border-radius: 4px; transition: color .2s, background .2s;
}
.nav-links a:hover { color: var(--r); background: var(--rpale); }
.nav-cta-btn {
  padding: .5rem 1.4rem; background: var(--r); color: #fff;
  border: none; border-radius: 4px; font-family: 'Jost', sans-serif;
  font-size: .72rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase;
  cursor: none; text-decoration: none;
  box-shadow: 0 4px 20px rgba(196,30,58,.28); transition: all .25s;
}
.nav-cta-btn:hover { background: var(--r2); transform: translateY(-1px); box-shadow: 0 8px 28px rgba(196,30,58,.35); }
@media (max-width: 820px) { .nav-links { display: none; } }

/* ── HERO ── */
.hero {
  min-height: 100vh;
  display: flex; flex-direction: column; justify-content: center;
  padding-top: 72px; overflow: hidden; position: relative;
  background: var(--w);
}

/* big decorative background text */
.hero-bg-text {
  position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%) rotate(-6deg);
  font-family: 'Cormorant Garamond', serif; font-size: 22vw; font-weight: 700;
  color: rgba(196,30,58,.04); white-space: nowrap; pointer-events: none; user-select: none;
  line-height: 1; z-index: 0;
}

.hero-content {
  position: relative; z-index: 1;
  max-width: 1120px; margin: 0 auto; width: 100%;
  padding: 5rem 3rem 3rem;
  display: flex; flex-direction: column; gap: 0;
}

.hero-pill {
  display: inline-flex; align-items: center; gap: .6rem;
  padding: .35rem 1rem .35rem .5rem; margin-bottom: 2.5rem;
  background: var(--rpale); border: 1px solid var(--rsoft);
  border-radius: 100px; width: fit-content;
  animation: fadeSlide .8s ease both;
}
.pill-dot { width: 20px; height: 20px; border-radius: 50%; background: var(--r); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.pill-dot::after { content: ''; width: 6px; height: 6px; border-radius: 50%; background: #fff; }
.pill-text { font-size: .65rem; font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: var(--r); }

.hero h1 {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(4.5rem, 9vw, 9rem); font-weight: 300;
  line-height: .92; letter-spacing: -.03em; color: var(--ink);
  animation: fadeSlide .8s .1s ease both;
  max-width: 800px;
}
.hero h1 strong { font-weight: 700; }
.hero h1 em { font-style: italic; color: var(--r); font-weight: 300; }

.hero-line {
  width: 48px; height: 2px; background: var(--r); margin: 2.5rem 0;
  animation: growLine .8s .25s ease both;
}
@keyframes growLine { from { width: 0; } to { width: 48px; } }

.hero-desc {
  font-size: .92rem; font-weight: 300; color: var(--sub); line-height: 1.85;
  max-width: 540px; animation: fadeSlide .8s .3s ease both;
}
.hero-actions {
  display: flex; align-items: center; gap: 1.5rem; margin-top: 2.75rem;
  animation: fadeSlide .8s .4s ease both;
}
.btn-primary {
  padding: .8rem 2rem; background: var(--r); color: #fff;
  border: none; border-radius: 4px; font-family: 'Jost', sans-serif;
  font-size: .75rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase;
  text-decoration: none; box-shadow: 0 6px 24px rgba(196,30,58,.3); transition: all .25s;
}
.btn-primary:hover { background: var(--r2); transform: translateY(-2px); box-shadow: 0 12px 32px rgba(196,30,58,.4); }
.btn-text-link {
  font-size: .75rem; font-weight: 500; letter-spacing: .08em; text-transform: uppercase;
  color: var(--sub); text-decoration: none; display: flex; align-items: center; gap: .5rem;
  transition: color .2s;
}
.btn-text-link::after { content: '→'; transition: transform .2s; }
.btn-text-link:hover { color: var(--r); }
.btn-text-link:hover::after { transform: translateX(4px); }

/* ── HERO BOTTOM STRIP ── */
.hero-bottom {
  position: relative; z-index: 1;
  border-top: 1px solid var(--line);
  background: var(--rpale);
  animation: fadeSlide .8s .5s ease both;
}
.hero-bottom-inner {
  max-width: 1120px; margin: 0 auto;
  padding: 0 3rem;
  display: flex; align-items: stretch;
}

/* stats */
.hero-stats {
  display: flex; align-items: stretch; flex: 1; gap: 0;
}
.hst {
  display: flex; flex-direction: column; justify-content: center;
  padding: 2rem 2.5rem 2rem 0;
  border-right: 1px solid var(--rsoft);
  min-width: 140px;
}
.hst:first-child { padding-left: 0; }
.hst-n {
  font-family: 'Cormorant Garamond', serif; font-size: 2.6rem; font-weight: 600;
  line-height: 1; color: var(--ink);
}
.hst-n em { color: var(--r); font-style: normal; }
.hst-l { font-size: .6rem; font-weight: 500; letter-spacing: .1em; text-transform: uppercase; color: var(--muted); margin-top: .35rem; }

/* badge */
.hero-badge {
  background: var(--r); color: #fff;
  padding: 1.75rem 2.5rem; text-align: center;
  display: flex; flex-direction: column; justify-content: center; align-items: center;
  min-width: 220px; flex-shrink: 0;
}
.hb-date { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 600; line-height: 1.1; }
.hb-label { font-size: .6rem; font-weight: 500; letter-spacing: .12em; text-transform: uppercase; opacity: .75; margin-top: .35rem; }

@media (max-width: 820px) {
  .hero-content { padding: 3rem 1.5rem 2rem; }
  .hero-bottom-inner { flex-direction: column; padding: 0 1.5rem; }
  .hero-stats { flex-wrap: wrap; gap: 0; }
  .hst { padding: 1.25rem 1.5rem 1.25rem 0; border-right: none; border-bottom: 1px solid var(--rsoft); min-width: 45%; }
  .hero-badge { padding: 1.5rem; min-width: unset; }
}

/* ── TICKER ── */
.ticker {
  background: var(--r); overflow: hidden;
  padding: .9rem 0; display: flex; align-items: center;
}
.ticker-track {
  display: flex; gap: 0; white-space: nowrap;
  animation: tickerScroll 22s linear infinite;
}
@keyframes tickerScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
.ticker-item {
  display: inline-flex; align-items: center; gap: .75rem;
  padding: 0 2.5rem; font-size: .68rem; font-weight: 600;
  letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.85);
}
.ticker-sep { color: rgba(255,255,255,.3); font-size: .5rem; }

/* ── GENERIC SECTION ── */
.sec { padding: 7rem 3rem; }
.sec-inner { max-width: 1120px; margin: 0 auto; }
.sec-header { margin-bottom: 4rem; }
.sec-eyebrow { display: flex; align-items: center; gap: .75rem; margin-bottom: 1rem; }
.eyebrow-line { width: 32px; height: 1px; background: var(--r); }
.eyebrow-text { font-size: .62rem; font-weight: 600; letter-spacing: .2em; text-transform: uppercase; color: var(--r); }
.sec-h { font-family: 'Cormorant Garamond', serif; font-size: clamp(2.4rem, 4vw, 3.6rem); font-weight: 400; line-height: 1.05; letter-spacing: -.02em; color: var(--ink); }
.sec-h em { font-style: italic; color: var(--r); }
.sec-sub { margin-top: .75rem; font-size: .88rem; font-weight: 300; color: var(--sub); line-height: 1.8; max-width: 520px; }

/* ── PROFIL CARDS ── */
.bg-warm { background: var(--warm); }
.profil-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1px; background: var(--line); }
.profil-cell {
  background: var(--w); padding: 2.75rem;
  transition: background .3s; position: relative; overflow: hidden;
}
.profil-cell::before {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px;
  background: var(--r); transform: scaleY(0); transform-origin: bottom;
  transition: transform .35s cubic-bezier(.22,1,.36,1);
}
.profil-cell:hover { background: var(--rpale); }
.profil-cell:hover::before { transform: scaleY(1); }
.pc-num { font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; color: rgba(196,30,58,.08); line-height: 1; margin-bottom: 1rem; transition: color .3s; }
.profil-cell:hover .pc-num { color: rgba(196,30,58,.15); }
.pc-h { font-size: .8rem; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--ink); margin-bottom: .6rem; }
.pc-p { font-size: .84rem; font-weight: 300; color: var(--sub); line-height: 1.8; }
@media (max-width: 620px) { .profil-grid { grid-template-columns: 1fr; } }

/* ── VISI MISI ── */
.vm-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start; }
.vm-visi { background: var(--ink); border-radius: 16px; padding: 3rem; position: relative; overflow: hidden; }
.vm-visi::before {
  content: '"'; position: absolute; top: -1rem; left: 1.5rem;
  font-family: 'Cormorant Garamond', serif; font-size: 10rem; font-weight: 700;
  color: rgba(255,255,255,.04); line-height: 1; pointer-events: none;
}
.vm-tag { font-size: .6rem; font-weight: 600; letter-spacing: .2em; text-transform: uppercase; color: var(--r); margin-bottom: 1.5rem; display: flex; align-items: center; gap: .6rem; }
.vm-tag::after { content: ''; flex: 1; height: 1px; background: rgba(255,255,255,.1); }
.vm-quote { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 300; font-style: italic; color: rgba(255,255,255,.9); line-height: 1.6; }
.vm-misi { display: flex; flex-direction: column; gap: 1.25rem; }
.vm-item { display: flex; gap: 1.25rem; align-items: flex-start; padding: 1.25rem; border: 1px solid var(--line); border-radius: 10px; transition: border-color .25s, box-shadow .25s; }
.vm-item:hover { border-color: var(--rsoft); box-shadow: 0 4px 20px rgba(196,30,58,.08); }
.vm-n { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 600; color: var(--r); flex-shrink: 0; line-height: 1.2; }
.vm-p { font-size: .82rem; font-weight: 300; color: var(--sub); line-height: 1.75; }
@media (max-width: 680px) { .vm-grid { grid-template-columns: 1fr; } }

/* ── STRUKTUR ── */
.org-container { display: flex; flex-direction: column; align-items: center; gap: 0; }
.org-level { display: flex; gap: 1px; background: var(--line); }
.org-level.center { justify-content: center; background: transparent; gap: 0; }
.org-node {
  min-width: 160px; background: var(--w); padding: 1.5rem 1.25rem;
  text-align: center; transition: background .25s;
  border: 1px solid var(--line); border-radius: 12px; margin: .25rem;
  position: relative; overflow: hidden;
}
.org-node::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: var(--r); transform: scaleX(0); transition: transform .3s cubic-bezier(.22,1,.36,1);
}
.org-node:hover { background: var(--rpale); }
.org-node:hover::after { transform: scaleX(1); }
.org-node.chief { background: var(--r); border-color: var(--r); min-width: 200px; box-shadow: 0 8px 32px rgba(196,30,58,.3); }
.org-node.chief::after { display: none; }
.org-node.chief .on-role { color: rgba(255,255,255,.6); }
.org-node.chief .on-name { color: #fff; }
.org-connector { width: 1px; height: 24px; background: var(--rsoft); margin: 0 auto; }
.on-role { font-size: .58rem; font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: var(--muted); margin-bottom: .3rem; }
.on-name { font-size: .82rem; font-weight: 600; color: var(--ink); }
.org-row { display: flex; gap: .5rem; flex-wrap: wrap; justify-content: center; }

/* ── GALERI ── */
.gallery {
  display: grid; margin-top: 3rem;
  grid-template-columns: repeat(12, 1fr); grid-template-rows: 220px 180px;
  gap: 12px;
}
.gi { border-radius: 12px; overflow: hidden; position: relative; cursor: none; }
.gi:nth-child(1) { grid-column: 1/6; grid-row: 1/3; }
.gi:nth-child(2) { grid-column: 6/9; }
.gi:nth-child(3) { grid-column: 9/13; }
.gi:nth-child(4) { grid-column: 6/10; }
.gi:nth-child(5) { grid-column: 10/13; }
.gi-bg { width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: .75rem; transition: transform .5s cubic-bezier(.22,1,.36,1); }
.gi:hover .gi-bg { transform: scale(1.05); }
.gi:nth-child(1) .gi-bg { background: linear-gradient(135deg, #fde8ec, #f5c6cf); }
.gi:nth-child(2) .gi-bg { background: linear-gradient(135deg, #f9f0f1, #f2d8dc); }
.gi:nth-child(3) .gi-bg { background: linear-gradient(135deg, #fff0f2, #f9dde1); }
.gi:nth-child(4) .gi-bg { background: linear-gradient(135deg, #f5eded, #ecdcde); }
.gi:nth-child(5) .gi-bg { background: linear-gradient(135deg, #fdf4f5, #f6e3e6); }
.gi-ico { font-size: 2.5rem; opacity: .5; }
.gi-lbl { font-size: .68rem; font-weight: 600; letter-spacing: .08em; color: var(--r2); text-transform: uppercase; }
.gi-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(154,21,48,.82) 0%, rgba(154,21,48,.1) 55%, transparent 100%); opacity: 0; transition: opacity .35s; display: flex; align-items: flex-end; padding: 1.25rem; }
.gi:hover .gi-overlay { opacity: 1; }
.gi-cap { font-size: .75rem; font-weight: 500; letter-spacing: .04em; color: #fff; line-height: 1.4; }

/* ── VOTING ── */
.vote-header { display: flex; align-items: flex-end; justify-content: space-between; gap: 2rem; flex-wrap: wrap; margin-bottom: 2.5rem; }
.vote-deadline { padding: .5rem 1.1rem; background: var(--rpale); border: 1px solid var(--rsoft); border-radius: 4px; font-size: .68rem; font-weight: 600; color: var(--r); letter-spacing: .06em; white-space: nowrap; }
.cands-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; }
.cand { border: 1px solid var(--line); border-radius: 16px; overflow: hidden; background: var(--w); transition: all .3s; position: relative; }
.cand:hover { border-color: var(--rsoft); box-shadow: 0 8px 40px rgba(196,30,58,.1); transform: translateY(-4px); }
.cand.voted { border-color: var(--r); box-shadow: 0 8px 40px rgba(196,30,58,.18); }
.cand-top { background: var(--rpale); padding: 2.5rem 1.5rem 1.5rem; text-align: center; position: relative; }
.cand.voted .cand-top { background: linear-gradient(135deg, var(--rpale), var(--rsoft)); }
.cand-num-badge { position: absolute; top: 1rem; left: 1rem; width: 28px; height: 28px; border-radius: 50%; background: var(--r); color: #fff; display: flex; align-items: center; justify-content: center; font-size: .62rem; font-weight: 700; letter-spacing: .02em; }
.voted-check { position: absolute; top: 1rem; right: 1rem; width: 28px; height: 28px; border-radius: 50%; background: var(--r); display: none; align-items: center; justify-content: center; color: #fff; font-size: .8rem; }
.cand.voted .voted-check { display: flex; }
.cand-avatar { width: 80px; height: 80px; border-radius: 50%; margin: 0 auto 1rem; background: var(--w); border: 3px solid rgba(196,30,58,.15); display: flex; align-items: center; justify-content: center; font-size: 2rem; transition: border-color .3s; }
.cand.voted .cand-avatar { border-color: var(--r); }
.cand-name { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 600; color: var(--ink); margin-bottom: .25rem; }
.cand-tagline { font-size: .75rem; font-weight: 300; color: var(--sub); line-height: 1.6; }
.cand-body { padding: 1.5rem; }
.vote-bar-wrap { height: 3px; background: var(--line); border-radius: 100px; margin-bottom: .5rem; overflow: hidden; }
.vote-bar { height: 100%; background: linear-gradient(90deg, var(--r), var(--r3)); border-radius: 100px; transition: width .9s cubic-bezier(.22,1,.36,1); }
.vote-meta { display: flex; justify-content: space-between; font-size: .66rem; color: var(--muted); margin-bottom: 1.25rem; }
.vote-btn { width: 100%; padding: .7rem; border-radius: 8px; border: 1.5px solid var(--rsoft); background: transparent; font-family: 'Jost', sans-serif; font-size: .72rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: var(--r); cursor: none; transition: all .25s; }
.vote-btn:hover { background: var(--r); color: #fff; border-color: var(--r); }
.cand.voted .vote-btn { background: var(--r); color: #fff; border-color: var(--r); }
.vote-footer-bar { display: flex; align-items: center; justify-content: space-between; margin-top: 2.5rem; padding: 1.5rem 2rem; background: var(--warm); border-radius: 12px; border: 1px solid var(--line); flex-wrap: wrap; gap: 1rem; }
.vf-total-label { font-size: .62rem; font-weight: 600; letter-spacing: .16em; text-transform: uppercase; color: var(--muted); margin-bottom: .25rem; }
.vf-total-n { font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; font-weight: 600; color: var(--r); line-height: 1; }
.vf-note { font-size: .72rem; font-weight: 300; color: var(--muted); text-align: right; line-height: 1.6; }
.vote-toast { padding: 1rem 1.5rem; background: #fff; border: 1px solid var(--rsoft); border-radius: 8px; border-left: 3px solid var(--r); font-size: .8rem; color: var(--r); font-weight: 500; margin-top: 1.25rem; display: none; animation: toastIn .3s ease; }
.vote-toast.show { display: block; }
@keyframes toastIn { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: none; } }
@media (max-width: 700px) { .cands-grid { grid-template-columns: 1fr; } }

/* ── PENDAFTARAN ── */
.reg-wrap { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 3rem; }
.reg-card { border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: box-shadow .3s; }
.reg-card:hover { box-shadow: 0 8px 40px rgba(196,30,58,.1); }
.reg-card-top { padding: 2.5rem 2.5rem 2rem; position: relative; overflow: hidden; }
.reg-card.ketua .reg-card-top { background: var(--ink); }
.reg-card.anggota .reg-card-top { background: var(--rpale); border-bottom: 1px solid var(--rsoft); }
.reg-deco-num { position: absolute; right: 1.5rem; bottom: -1rem; font-family: 'Cormorant Garamond', serif; font-size: 7rem; font-weight: 700; line-height: 1; pointer-events: none; }
.reg-card.ketua .reg-deco-num { color: rgba(255,255,255,.04); }
.reg-card.anggota .reg-deco-num { color: rgba(196,30,58,.06); }
.reg-type { font-size: .6rem; font-weight: 600; letter-spacing: .2em; text-transform: uppercase; color: var(--r); margin-bottom: .75rem; }
.reg-card.ketua .reg-type { color: var(--rsoft); }
.reg-h { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 600; margin-bottom: .5rem; }
.reg-card.ketua .reg-h { color: #fff; }
.reg-card.anggota .reg-h { color: var(--ink); }
.reg-sub { font-size: .78rem; font-weight: 300; line-height: 1.7; }
.reg-card.ketua .reg-sub { color: rgba(255,255,255,.45); }
.reg-card.anggota .reg-sub { color: var(--sub); }
.reg-card-body { padding: 2rem 2.5rem; background: var(--w); }
.req-list { list-style: none; margin-bottom: 2rem; display: flex; flex-direction: column; gap: .6rem; }
.req-list li { display: flex; align-items: flex-start; gap: .75rem; font-size: .8rem; font-weight: 300; color: var(--sub); line-height: 1.5; }
.req-dot { width: 5px; height: 5px; border-radius: 50%; background: var(--r); flex-shrink: 0; margin-top: .45rem; }
.toggle-btn { width: 100%; padding: .8rem; border-radius: 8px; border: 1.5px solid var(--rsoft); background: transparent; font-family: 'Jost', sans-serif; font-size: .72rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: var(--r); cursor: none; transition: all .25s; }
.toggle-btn:hover, .toggle-btn.open { background: var(--r); color: #fff; border-color: var(--r); }
.form-section { max-height: 0; overflow: hidden; transition: max-height .5s cubic-bezier(.22,1,.36,1); }
.form-section.open { max-height: 900px; }
.form-inner { padding-top: 1.5rem; }
.fg { margin-bottom: .9rem; }
.fg label { display: block; font-size: .62rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: var(--muted); margin-bottom: .4rem; }
.fg input, .fg select, .fg textarea { width: 100%; padding: .65rem .9rem; border: 1px solid var(--line); border-radius: 6px; font-family: 'Jost', sans-serif; font-size: .82rem; font-weight: 300; color: var(--ink); background: var(--off); outline: none; transition: border-color .2s; }
.fg input:focus, .fg select:focus, .fg textarea:focus { border-color: var(--r); background: var(--w); }
.fg textarea { resize: vertical; min-height: 72px; }
.fg-2 { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; }
.form-btn { width: 100%; margin-top: 1rem; padding: .8rem; background: var(--r); color: #fff; border: none; border-radius: 8px; font-family: 'Jost', sans-serif; font-size: .75rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; cursor: none; box-shadow: 0 4px 20px rgba(196,30,58,.25); transition: all .25s; }
.form-btn:hover { background: var(--r2); transform: translateY(-1px); }
.form-success { margin-top: 1rem; padding: 1.1rem; background: var(--rpale); border: 1px solid var(--rsoft); border-radius: 8px; text-align: center; font-size: .78rem; color: var(--r); font-weight: 500; display: none; line-height: 1.6; }
.form-success.show { display: block; }
@media (max-width: 680px) { .reg-wrap { grid-template-columns: 1fr; } }

/* ── FOOTER ── */
footer { background: var(--ink); padding: 3rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem; }
.f-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 400; color: #fff; }
.f-brand span { color: var(--r); }
.f-copy { font-size: .68rem; font-weight: 300; color: rgba(255,255,255,.3); margin-top: .25rem; }
.f-links { display: flex; gap: 1.75rem; }
.f-links a { font-size: .68rem; font-weight: 500; letter-spacing: .08em; text-transform: uppercase; color: rgba(255,255,255,.35); text-decoration: none; transition: color .2s; }
.f-links a:hover { color: var(--r); }

/* ── ANIMATIONS ── */
@keyframes fadeSlide { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }
.reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
.reveal.in { opacity: 1; transform: none; }
</style>
</head>
<body>

<div id="cur"></div>

<!-- NAV -->
<nav id="nav">
  <a href="#beranda" class="nav-brand">
    <div class="brand-mark">O</div>
    <div class="brand-text">OSIS SMK 5 Telkom <small>Periode 2026 / 2027</small></div>
  </a>
  <ul class="nav-links">
    <li><a href="#profil">Profil</a></li>
    <li><a href="#visi-misi">Visi Misi</a></li>
    <li><a href="#struktur">Struktur</a></li>
    <li><a href="#galeri">Galeri</a></li>
    <li><a href="#voting">Voting</a></li>
  </ul>
  <a href="#pendaftaran" class="nav-cta-btn">Daftar Sekarang</a>
</nav>

<!-- HERO -->
<section id="beranda" class="hero">
  <div class="hero-bg-text">OSIS</div>

  <div class="hero-content">
    <div class="hero-pill">
      <div class="pill-dot"></div>
      <span class="pill-text">Periode 2026 — 2027</span>
    </div>
    <h1>Suara<br>Siswa,<br><strong>Aksi <em>Nyata</em></strong></h1>
    <div class="hero-line"></div>
    <p class="hero-desc">OSIS SMK Negeri 5 Telkom — ruang tumbuh para pemimpin muda yang berani berpikir, bergerak, dan berkolaborasi untuk sekolah yang lebih baik.</p>
    <div class="hero-actions">
      <a href="#voting" class="btn-primary">Vote Ketua OSIS</a>
      <a href="#profil" class="btn-text-link">Kenali Kami</a>
    </div>
  </div>

  <!-- BOTTOM STRIP: stats + badge -->
  <div class="hero-bottom">
    <div class="hero-bottom-inner">
      <div class="hero-stats">
        <div class="hst">
          <div class="hst-n">50<em>+</em></div>
          <div class="hst-l">Anggota Aktif</div>
        </div>
        <div class="hst" style="padding-left:2.5rem;">
          <div class="hst-n">10<em>+</em></div>
          <div class="hst-l">Program Kerja</div>
        </div>
        </div>
      <div class="hero-badge">
        <div class="hb-date">10-12 Februari 2026</div>
        <div class="hb-label">Batas Akhir Voting Ketua OSIS</div>
      </div>
    </div>
  </div>
</section>

<!-- TICKER -->
<div class="ticker">
  <div class="ticker-track" id="tt"></div>
</div>

<!-- PROFIL -->
<section id="profil" class="sec bg-warm">
  <div class="sec-inner">
    <div class="sec-header reveal">
      <div class="sec-eyebrow"><div class="eyebrow-line"></div><span class="eyebrow-text">01 — Tentang Kami</span></div>
      <h2 class="sec-h">Profil <em>OSIS</em></h2>
    </div>
    <div class="profil-grid reveal">
      <div class="profil-cell"><div class="pc-num">01</div><div class="pc-h">Siapa Kami</div><p class="pc-p">OSIS SMK Negeri 5 Telkom adalah wadah aspirasi, kreativitas, dan kepemimpinan siswa — menjembatani antara siswa dan sekolah dalam menciptakan lingkungan belajar yang dinamis.</p></div>
      <div class="profil-cell"><div class="pc-num">02</div><div class="pc-h">Apa yang Kami Lakukan</div><p class="pc-p">Mengelola ekstrakurikuler, mengadakan event sekolah, menyuarakan aspirasi siswa — OSIS adalah pusat pergerakan positif di lingkungan SMK Negeri 5 Telkom.</p></div>
      <div class="profil-cell"><div class="pc-num">03</div><div class="pc-h">Perjalanan Kami</div><p class="pc-p">Perjalanan OSIS SMK Negeri 5 Telkom dimulai dari semangat kebersamaan untuk menciptakan lingkungan sekolah yang aktif, kreatif, dan inspiratif.</p></div>
      <div class="profil-cell"><div class="pc-num">04</div><div class="pc-h">Nilai Kami</div><p class="pc-p">Integritas · Kolaborasi · Inovasi · Inklusivitas. Setiap suara siswa berharga dan berhak untuk didengar serta diperjuangkan bersama.</p></div>
    </div>
  </div>
</section>

<!-- VISI MISI -->
<section id="visi-misi" class="sec">
  <div class="sec-inner">
    <div class="sec-header reveal">
      <div class="sec-eyebrow"><div class="eyebrow-line"></div><span class="eyebrow-text">02 — Arah & Tujuan</span></div>
      <h2 class="sec-h">Visi &amp; <em>Misi</em></h2>
    </div>
    <div class="vm-grid reveal">
      <div class="vm-visi">
        <div class="vm-tag">Visi</div>
        <p class="vm-quote">"Menjadi dewan perwakilan yang menjunjung tinggi nilai-nilai prestasi akademik dan non akademik, serta mendengar aspirasi siswa dengan sebenar benarnya"</p>
      </div>
      <div class="vm-misi">
        <div class="vm-item"><div class="vm-n">01</div><p class="vm-p">Menciptakan program kerja yang relevan dan bermanfaat bagi seluruh siswa</p></div>
        <div class="vm-item"><div class="vm-n">02</div><p class="vm-p">Memfasilitasi pengembangan bakat, minat, dan potensi siswa secara optimal</p></div>
        <div class="vm-item"><div class="vm-n">03</div><p class="vm-p">Membangun budaya kolaborasi dan komunikasi yang sehat antar siswa</p></div>
        <div class="vm-item"><div class="vm-n">04</div><p class="vm-p">Menjadi jembatan aspirasi antara siswa dan pihak sekolah</p></div>
        <div class="vm-item"><div class="vm-n">05</div><p class="vm-p">Mendorong jiwa kepemimpinan dan kewirausahaan sosial di kalangan pelajar</p></div>
      </div>
    </div>
  </div>
</section>

<!-- STRUKTUR -->
<section id="struktur" class="sec bg-warm">
  <div class="sec-inner">
    <div class="sec-header reveal">
      <div class="sec-eyebrow"><div class="eyebrow-line"></div><span class="eyebrow-text">03 — Tim Kami</span></div>
      <h2 class="sec-h">Struktur <em>Organisasi</em></h2>
    </div>
    <div class="org-container reveal">
      <div class="org-level center">
        <div class="org-node chief">
          <div class="on-role">Ketua OSIS</div>
          <div class="on-name">M.Akbar Maulana Mufa</div>
        </div>
      </div>
      <div class="org-connector"></div>
      <div class="org-row">
        <div class="org-node"><div class="on-role">Wakil Ketua I</div><div class="on-name">Muhammad Fairuz</div></div>
        <div class="org-node"><div class="on-role">Sekretaris I</div><div class="on-name">Qurrata'aini</div></div>
        <div class="org-node"><div class="on-role">Sekretaris II</div><div class="on-name">Putri Raisha</div></div>
        <div class="org-node"><div class="on-role">Bendahara I</div><div class="on-name">Hizri Uswa</div></div>
      </div>
     <div class="org-connector"></div>
      <div class="org-row">
        <div class="org-node"><div class="on-role">Kabid Sosial</div><div class="on-name">Muthia Syabrina</div></div>
        <div class="org-node"><div class="on-role">Kabid Kesenian</div><div class="on-name">Calista Delinda</div></div>
         <div class="org-node"><div class="on-role">Kabid Humas</div><div class="on-name">Sulthan Alqan Najed</div></div>
        <div class="org-node"><div class="on-role">Kabid Keamanan</div><div class="on-name">Muhammad Furqan</div></div>
      </div>
      <div class="org-connector"></div>
      <div class="org-row">
        <div class="org-node"><div class="on-role">Kabid Agama</div><div class="on-name">M.Zakiyul Mubarak</div></div>
        <div class="org-node"><div class="on-role">Kabid Olahraga</div><div class="on-name">Syamwil Mubarak</div></div>
        <div class="org-node"><div class="on-role">Kabid Kesehatan</div><div class="on-name">Hafiz Al-Khalifi</div></div>
      </div>
    </div>
  </div>
</section>

<!-- GALERI -->
<section id="galeri" class="sec">
  <div class="sec-inner">
    <div class="sec-header reveal">
      <div class="sec-eyebrow"><div class="eyebrow-line"></div><span class="eyebrow-text">04 — Momen Kami</span></div>
      <h2 class="sec-h">Galeri <em>Kegiatan</em></h2>
    </div>
    <div class="gallery reveal">
      <div class="gi"><div class="gi-bg"><div class="gi-ico">🎉</div><div class="gi-lbl">Pentas Seni 2024</div></div><div class="gi-overlay"><div class="gi-cap">Pentas Seni Tahunan — Festival Kebudayaan Terbesar</div></div></div>
      <div class="gi"><div class="gi-bg"><div class="gi-ico">🏕️</div><div class="gi-lbl">Leadership Camp</div></div><div class="gi-overlay"><div class="gi-cap">Leadership Camp 2024</div></div></div>
      <div class="gi"><div class="gi-bg"><div class="gi-ico">⚽</div><div class="gi-lbl">OSIS Cup 2024</div></div><div class="gi-overlay"><div class="gi-cap">Turnamen Olahraga Antar Kelas</div></div></div>
      <div class="gi"><div class="gi-bg"><div class="gi-ico">🎓</div><div class="gi-lbl">Pelantikan Pengurus</div></div><div class="gi-overlay"><div class="gi-cap">Pelantikan Pengurus OSIS 2024</div></div></div>
      <div class="gi"><div class="gi-bg"><div class="gi-ico">🌱</div><div class="gi-lbl">Go Green Action</div></div><div class="gi-overlay"><div class="gi-cap">Aksi Peduli Lingkungan Hijau</div></div></div>
    </div>
  </div>
</section>

<!-- VOTING -->
<section id="voting" class="sec bg-warm">
  <div class="sec-inner">
    <div class="vote-header reveal">
      <div>
        <div class="sec-eyebrow"><div class="eyebrow-line"></div><span class="eyebrow-text">05 — Pilih Pemimpinmu</span></div>
        <h2 class="sec-h">Vote <em>Ketua & Wakil OSIS</em></h2>
        <p class="sec-sub">Satu siswa, satu suara. Berikan pilihan terbaikmu untuk Ketua & Wakil OSIS periode 2026/2027.</p>
      </div>
      <div class="vote-deadline">⏱ Voting Ditutup</div>
    </div>
    <div id="toast" class="vote-toast"></div>
    <div class="cands-grid reveal" id="cGrid"></div>
    <div class="vote-footer-bar reveal">
      <div>
        <div class="vf-total-label">Total Suara Masuk</div>
        <div class="vf-total-n" id="vTotal">—</div>
      </div>
      <div class="vf-note">Data diperbarui secara real-time<br>setiap suara masuk</div>
    </div>
  </div>
</section>

<!-- PENDAFTARAN -->
<section id="pendaftaran" class="sec">
  <div class="sec-inner">
    <div class="sec-header reveal">
      <div class="sec-eyebrow"><div class="eyebrow-line"></div><span class="eyebrow-text">06 — Bergabung</span></div>
      <h2 class="sec-h">Pendaftaran <em>Anggota</em></h2>
      <p class="sec-sub">Jadilah bagian dari organisasi yang bergerak, berkontribusi, dan berdampak nyata bagi seluruh warga sekolah.</p>
    </div>
    <div class="reg-wrap">

      <!-- KETUA -->
      <div class="reg-card ketua reveal">
        <div class="reg-card-top">
          <div class="reg-deco-num">K</div>
          <div class="reg-type">Jalur Ketua</div>
          <div class="reg-h">Ketua OSIS</div>
          <p class="reg-sub">Jadilah pemimpin yang menginspirasi dan menggerakkan perubahan positif di sekolah.</p>
        </div>
        <div class="reg-card-body">
          <ul class="req-list">
            <li><div class="req-dot"></div>Siswa aktif kelas XI</li>
            <li><div class="req-dot"></div>Nilai rata-rata minimal 80.00</li>
            <li><div class="req-dot"></div>Tidak sedang menjalani sanksi akademik</li>
            <li><div class="req-dot"></div>Memiliki jiwa kepemimpinan & visi jelas</li>
            <li><div class="req-dot"></div>Dukungan minimal 2 guru pembimbing</li>
          </ul>
          <button class="toggle-btn" id="btnK" onclick="toggleForm('K')">Buka Formulir Pendaftaran</button>
          <div class="form-section" id="formK">
            <div class="form-inner">
              <div class="fg-2">
                <div class="fg"><label>Nama Lengkap</label><input type="text" placeholder="Nama kamu"/></div>
                <div class="fg"><label>NIS</label><input type="text" placeholder="Nomor Induk"/></div>
              </div>
              <div class="fg-2">
                <div class="fg"><label>Kelas</label><select><option value="">Pilih kelas</option><option>XI TKJ 1</option><option>XI TKJ 2</option><option>XI RPL 1</option><option>XI RPL 2</option></select></div>
                <div class="fg"><label>No. HP</label><input type="tel" placeholder="+62"/></div>
              </div>
              <div class="fg"><label>Email</label><input type="email" placeholder="email@sekolah.sch.id"/></div>
              <div class="fg"><label>Nilai Rata-rata</label><input type="number" min="0" max="100" placeholder="Contoh: 85"/></div>
              <div class="fg"><label>Visi & Misi Singkat</label><textarea placeholder="Tuliskan visi misi kamu sebagai calon Ketua OSIS..."></textarea></div>
              <button class="form-btn" onclick="submitReg('K')">Kirim Pendaftaran</button>
              <div class="form-success" id="doneK">✅ Pendaftaran Ketua OSIS berhasil dikirim. Tim kami akan menghubungimu dalam 2–3 hari kerja.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ANGGOTA -->
      <div class="reg-card anggota reveal">
        <div class="reg-card-top">
          <div class="reg-deco-num">A</div>
          <div class="reg-type">Jalur Anggota</div>
          <div class="reg-h">Anggota OSIS</div>
          <p class="reg-sub">Berkontribusi aktif, kembangkan potensimu, dan jadilah bagian dari tim yang berdampak.</p>
        </div>
        <div class="reg-card-body">
          <ul class="req-list">
            <li><div class="req-dot"></div>Siswa aktif kelas X – XI</li>
            <li><div class="req-dot"></div>Nilai rata-rata minimal 75.00</li>
            <li><div class="req-dot"></div>Berkomitmen mengikuti program kerja</li>
            <li><div class="req-dot"></div>Minat di salah satu bidang seksi</li>
            <li><div class="req-dot"></div>Surat rekomendasi wali kelas</li>
          </ul>
          <button class="toggle-btn" id="btnA" onclick="toggleForm('A')">Buka Formulir Pendaftaran</button>
          <div class="form-section" id="formA">
            <div class="form-inner">
              <div class="fg-2">
                <div class="fg"><label>Nama Lengkap</label><input type="text" placeholder="Nama kamu"/></div>
                <div class="fg"><label>NIS</label><input type="text" placeholder="Nomor Induk"/></div>
              </div>
              <div class="fg-2">
                <div class="fg"><label>Kelas</label><select><option value="">Pilih kelas</option><option>X TKJ 1</option><option>X TKJ 2</option><option>X RPL 1</option><option>X RPL 2</option><option>XI TKJ 1</option><option>XI TKJ 2</option><option>XI RPL 1</option><option>XI RPL 2</option></select></div>
                <div class="fg"><label>No. HP</label><input type="tel" placeholder="+62"/></div>
              </div>
              <div class="fg"><label>Email</label><input type="email" placeholder="email@sekolah.sch.id"/></div>
              <div class="fg"><label>Bidang Minat</label><select><option value="">Pilih bidang</option><option>Akademik</option><option>Kreativitas & Seni</option><option>Olahraga</option><option>Seni & Budaya</option><option>Lingkungan</option></select></div>
              <div class="fg"><label>Motivasi Bergabung</label><textarea placeholder="Ceritakan motivasimu bergabung dengan OSIS..."></textarea></div>
              <button class="form-btn" onclick="submitReg('A')">Kirim Pendaftaran</button>
              <div class="form-success" id="doneA">✅ Pendaftaran Anggota OSIS berhasil dikirim. Tim kami akan menghubungimu dalam 2–3 hari kerja.</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div>
    <div class="f-brand">OSIS <span>SMK Negeri 5 Telkom</span></div>
    <div class="f-copy">© 2026 · Dibuat dengan penuh semangat oleh Tim OSIS</div>
  </div>
  <div class="f-links">
    <a href="#">Instagram</a>
    <a href="#">TikTok</a>
    <a href="#">Email</a>
    <a href="#">Kontak</a>
  </div>
</footer>

<script>
const cur = document.getElementById('cur');
document.addEventListener('mousemove', e => {
  cur.style.left = e.clientX + 'px';
  cur.style.top = e.clientY + 'px';
});
document.querySelectorAll('a,button,.org-node,.profil-cell,.vm-item,.cand,.gi,.reg-card').forEach(el => {
  el.addEventListener('mouseenter', () => cur.classList.add('big'));
  el.addEventListener('mouseleave', () => cur.classList.remove('big'));
});

const nav = document.getElementById('nav');
window.addEventListener('scroll', () => nav.classList.toggle('solid', scrollY > 40));

const items = ['12 Program Kerja Aktif','50 Anggota Terlatih','3× OSIS Terbaik Provinsi','Voting Ketua OSIS 2026','Daftar Sekarang','Inovatif · Inklusif · Berdampak'];
const tt = document.getElementById('tt');
const build = items.map(t => `<span class="ticker-item">${t}<span class="ticker-sep">✦</span></span>`).join('');
tt.innerHTML = build + build;

const ro = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

const cands = [
  { id:1, name:'Rizky Ardiansyah', num:'01', tagline:'Inovatif, inklusif, dan berdampak untuk seluruh warga SMK 5 Telkom.', emo:'😊', votes:0 },
  { id:2, name:'Nayla Putri',       num:'02', tagline:'Bersama kita lebih kuat — OSIS yang terbuka dan kolaboratif.', emo:'🌟', votes:0 },
];
let voted = null;

function renderVote() {
  const g = document.getElementById('cGrid');
  g.innerHTML = '';
  const tot = cands.reduce((a,c) => a + c.votes, 0);
  cands.forEach(c => {
    const pct = tot > 0 ? Math.round(c.votes / tot * 100) : 0;
    const d = document.createElement('div');
    d.className = 'cand' + (voted === c.id ? ' voted' : '');
    d.innerHTML = `
      <div class="cand-top">
        <div class="cand-num-badge">${c.num}</div>
        <div class="voted-check">✓</div>
        <div class="cand-avatar">${c.emo}</div>
        <div class="cand-name">${c.name}</div>
        <p class="cand-tagline">${c.tagline}</p>
      </div>
      <div class="cand-body">
        <div class="vote-bar-wrap"><div class="vote-bar" style="width:${pct}%"></div></div>
        <div class="vote-meta"><span>${c.votes} suara</span><span>${pct}%</span></div>
        <button class="vote-btn" onclick="doVote(${c.id})">${voted===c.id ? '✓ Sudah Dipilih' : 'Pilih Kandidat Ini'}</button>
      </div>`;
    g.appendChild(d);
  });
  document.getElementById('vTotal').textContent = tot.toLocaleString('id-ID');
}

function doVote(id) {
  const toast = document.getElementById('toast');
  if (voted !== null) {
    const name = cands.find(c => c.id === voted).name;
    toast.textContent = `Kamu sudah memilih ${name}. Terima kasih atas partisipasimu!`;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3500);
    return;
  }
  voted = id;
  cands.forEach(c => { c.votes = c.id === id ? Math.floor(Math.random()*18)+30 : Math.floor(Math.random()*20)+12; });
  renderVote();
  const chosen = cands.find(c => c.id === id);
  toast.textContent = `Suaramu untuk ${chosen.name} berhasil dikirim! Terima kasih.`;
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 4000);
}
renderVote();

function toggleForm(t) {
  const f = document.getElementById('form'+t);
  const b = document.getElementById('btn'+t);
  const open = f.classList.toggle('open');
  b.classList.toggle('open', open);
  b.textContent = open ? 'Tutup Formulir' : 'Buka Formulir Pendaftaran';
}
function submitReg(t) {
  document.getElementById('done'+t).classList.add('show');
  document.getElementById('form'+t).querySelectorAll('input,select,textarea').forEach(el => el.value='');
}
</script>
</body>
</html><div class="org-connector"></div>
      <div class="org-row">