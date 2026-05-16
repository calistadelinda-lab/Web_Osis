<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>OSIS SMK Negeri 5 Telkom</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;1,14..32,400;1,14..32,600&display=swap" rel="stylesheet"/>
@php
use App\Models\SettingVoting;
use App\Models\Pemilihan;

$settingVoting  = SettingVoting::first();
$isOpen         = SettingVoting::isVotingOpen();
$closedRecently = !$isOpen
    && $settingVoting
    && $settingVoting->updated_at->diffInHours(now()) < 24;
$showVoting     = $isOpen || $closedRecently;
@endphp

<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config={theme:{extend:{
  colors:{
    red:'#C41230',red2:'#A00E27',
    ink:'#0A0908',g1:'#1A1918',g2:'#2C2A28',g3:'#5C5A58',g4:'#9C9A98',g5:'#D8D6D4',g6:'#EFEFED',
    bg:'#F5F4F2',w:'#FAFAF8'
  },
  fontFamily:{sans:['Inter','sans-serif']}
}}}
</script>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  font-family:'Inter',sans-serif;
  background:#0c0b0a;
  color:#0A0908;
  overflow-x:hidden;
  -webkit-font-smoothing:antialiased;
  -moz-osx-font-smoothing:grayscale;
}

/* ════════════════════════════
   PAGE LOAD ANIMATION
════════════════════════════ */
@keyframes fade-up {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes fade-in {
  from { opacity: 0; }
  to   { opacity: 1; }
}

.page-load { animation: fade-in 0.5s ease both; }

/* Hero stagger */
.ha0 { opacity:0; animation: fade-up 0.7s 0.05s cubic-bezier(.22,1,.36,1) both; }
.ha1 { opacity:0; animation: fade-up 0.7s 0.15s cubic-bezier(.22,1,.36,1) both; }
.ha2 { opacity:0; animation: fade-up 0.7s 0.27s cubic-bezier(.22,1,.36,1) both; }
.ha3 { opacity:0; animation: fade-up 0.7s 0.38s cubic-bezier(.22,1,.36,1) both; }
.ha4 { opacity:0; animation: fade-up 0.7s 0.5s  cubic-bezier(.22,1,.36,1) both; }
.nav-anim { opacity:0; animation: fade-in 0.5s 0.05s ease both; }

/* ─── Navbar ─── */
#nav{
  position:fixed;top:0;left:0;right:0;z-index:800;
  height:68px;
  display:flex;align-items:center;justify-content:space-between;
  padding:0 min(4rem,6vw);
  transition:background .35s ease, border-color .35s ease, box-shadow .35s ease;
  background:rgba(10,9,8,0.92);
  border-bottom:1px solid rgba(255,255,255,0.06);
}
#nav.scrolled{
  background:rgba(18,17,15,0.97);
  border-bottom:1px solid rgba(255,255,255,0.09);
  box-shadow:0 2px 24px rgba(0,0,0,.22);
}
/* Light mode when past dark hero */
#nav.light-mode{
  background:rgba(245,244,242,0.97);
  border-bottom:1px solid rgba(10,9,8,.07);
  box-shadow:0 2px 20px rgba(10,9,8,.06);
}
#nav.light-mode .nl{ color:#5C5A58; }
#nav.light-mode .nl:hover{ color:#C41230; }
#nav.light-mode .nav-brand-name{ color:#0A0908 !important; }
#nav.light-mode .nav-brand-sub{ color:#9C9A98 !important; }
#nav.light-mode #menu-btn span{ background:#0A0908; }
#nav.light-mode .btn-o{ border-color:rgba(196,18,48,.3); color:#5C5A58; }

.nav-logo-box{
  width:38px;height:38px;border-radius:9px;
  background:linear-gradient(135deg,#C41230 0%,#A00E27 100%);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
  box-shadow:0 4px 16px rgba(196,18,48,.3);
}
.nl{
  position:relative;
  font-size:.62rem;font-weight:600;
  letter-spacing:.13em;text-transform:uppercase;
  color:rgba(255,255,255,.55);text-decoration:none;
  padding:.4rem .8rem;
  transition:color .25s ease;
}
.nl::after{
  content:'';
  position:absolute;bottom:-1px;left:.8rem;right:.8rem;
  height:1.5px;background:#C41230;
  transform:scaleX(0);transform-origin:left;
  transition:transform .35s cubic-bezier(.22,1,.36,1);
}
.nl:hover{color:rgba(255,255,255,.95);}
.nl:hover::after{transform:scaleX(1);}
.btn-r{
  padding:.52rem 1.4rem;
  background:#C41230;color:#fff;
  text-decoration:none;border-radius:8px;
  font-family:'Inter',sans-serif;
  font-size:.62rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  box-shadow:0 4px 18px rgba(196,18,48,.3);
  transition:all .3s ease;
  display:inline-block;border:none;
}
.btn-r:hover{background:#A00E27;box-shadow:0 8px 28px rgba(196,18,48,.45);transform:translateY(-2px);}
.btn-o{
  padding:.52rem 1.2rem;
  background:transparent;
  border:1.5px solid rgba(255,255,255,.18);
  color:rgba(255,255,255,.55);text-decoration:none;
  border-radius:8px;
  font-family:'Inter',sans-serif;
  font-size:.62rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  transition:all .3s ease;
  display:inline-block;
}
.btn-o:hover{border-color:#C41230;color:#C41230;background:rgba(196,18,48,.06);}

/* Mobile nav */
#nav-menu{
  position:fixed;top:0;left:0;right:0;bottom:0;
  background:#0A0908;z-index:790;
  display:flex;flex-direction:column;
  justify-content:center;padding:5rem min(2.5rem,6vw);
  transform:translateX(100%);
  transition:transform .55s cubic-bezier(.76,0,.24,1);
}
#nav-menu.open{transform:none;}
.nm-link{
  font-size:clamp(2rem,6vw,3.2rem);
  font-weight:800;
  letter-spacing:-.03em;
  color:rgba(255,255,255,.15);
  text-decoration:none;
  display:block;
  padding:.55rem 0;
  border-bottom:1px solid rgba(255,255,255,.05);
  transition:color .3s ease;
}
.nm-link:hover{color:white;}
#menu-btn{
  display:none;
  flex-direction:column;justify-content:center;gap:5px;
  width:32px;height:32px;border:none;background:none;
  padding:4px;
}
#menu-btn span{
  display:block;height:1.5px;background:rgba(255,255,255,.7);
  border-radius:2px;
  transition:all .4s cubic-bezier(.22,1,.36,1);
}
#menu-btn.open span:nth-child(1){transform:translateY(6.5px) rotate(45deg);}
#menu-btn.open span:nth-child(2){opacity:0;transform:scaleX(0);}
#menu-btn.open span:nth-child(3){transform:translateY(-6.5px) rotate(-45deg);}

/* ─── Hero ─── */
#beranda{
  position:relative;
  background:#0A0908;
  overflow:hidden;
  display:flex;flex-direction:column;
}
.hero-bg-img{
  position:absolute;inset:0;z-index:0;
}
.hero-bg-img img{
  width:100%;height:100%;
  object-fit:cover;object-position:center top;
  display:block;
  opacity:.32;
  filter:grayscale(.3) contrast(1.1);
}
.hero-bg-overlay{
  position:absolute;inset:0;z-index:1;
  background:linear-gradient(
    to bottom,
    rgba(10,9,8,.65) 0%,
    rgba(10,9,8,.15) 30%,
    rgba(10,9,8,.55) 60%,
    rgba(10,9,8,.97) 100%
  );
}
.hero-bg-overlay-left{
  position:absolute;inset:0;z-index:1;
  background:linear-gradient(
    to right,
    rgba(10,9,8,.78) 0%,
    rgba(10,9,8,.3) 55%,
    transparent 100%
  );
}
.hero-content{
  position:relative;z-index:2;
  flex:1;
  display:flex;align-items:flex-end;
  padding:0 min(5rem,7vw) 5.5rem;
  min-height:100svh;
}
.hero-inner{
  width:100%;
  max-width:1360px;
  margin:0 auto;
}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:.8rem;
  margin-bottom:2rem;
}
.hero-eyebrow-dot{
  width:6px;height:6px;
  background:#C41230;border-radius:50%;
  animation:pulse-dot 2.4s ease infinite;
}
@keyframes pulse-dot{
  0%,100%{box-shadow:0 0 0 0 rgba(196,18,48,.5);}
  50%{box-shadow:0 0 0 6px rgba(196,18,48,0);}
}
.hero-eyebrow-text{
  font-size:.6rem;font-weight:600;
  letter-spacing:.26em;text-transform:uppercase;
  color:rgba(255,255,255,.4);
}
.hero-h1{
  font-family:'Inter',sans-serif;
  font-size:clamp(3.8rem,8vw,9rem);
  line-height:.93;
  letter-spacing:-.04em;
  font-weight:800;
  color:white;
  margin-bottom:2.5rem;
  max-width:820px;
}
.hero-h1 em{font-style:normal;color:#C41230;}
.hero-subline{
  font-size:clamp(.85rem,1.1vw,.98rem);
  font-weight:400;
  line-height:1.85;
  color:rgba(255,255,255,.42);
  max-width:520px;
  margin-bottom:3rem;
  letter-spacing:.01em;
}
.hero-subline strong{color:rgba(255,255,255,.72);font-weight:600;}
.hero-cta-row{
  display:flex;align-items:center;gap:2rem;
  flex-wrap:wrap;
}
.hero-cta-primary{
  display:inline-flex;align-items:center;gap:.75rem;
  padding:1rem 2.25rem;
  background:#C41230;color:white;
  text-decoration:none;border-radius:8px;
  font-size:.68rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  transition:all .3s ease;
  box-shadow:0 6px 24px rgba(196,18,48,.35);
}
.hero-cta-primary:hover{background:#A00E27;box-shadow:0 12px 40px rgba(196,18,48,.55);transform:translateY(-3px);}
.hero-cta-secondary{
  font-size:.68rem;font-weight:700;
  letter-spacing:.08em;text-transform:uppercase;
  color:rgba(255,255,255,.32);text-decoration:none;
  display:inline-flex;align-items:center;gap:.5rem;
  transition:color .3s ease;
}
.hero-cta-secondary:hover{color:rgba(255,255,255,.85);}
.hero-scroll-indicator{
  position:absolute;bottom:2.5rem;left:50%;
  transform:translateX(-50%);
  z-index:2;
  display:flex;flex-direction:column;align-items:center;gap:.75rem;
  opacity:.28;
  animation:fade-in .6s .8s ease both;
}
.scroll-line{
  width:1px;height:40px;
  background:linear-gradient(to bottom,white,transparent);
  animation:scroll-drop 2s ease-in-out infinite;
}
@keyframes scroll-drop{
  0%{transform:scaleY(0);transform-origin:top;opacity:1;}
  50%{transform:scaleY(1);transform-origin:top;}
  100%{transform:scaleY(0);transform-origin:bottom;opacity:0;}
}
.scroll-text{
  font-size:.48rem;font-weight:600;
  letter-spacing:.22em;text-transform:uppercase;
  color:white;
}

/* ─── Ticker ─── */
@keyframes ticker{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.ticker-inner{
  animation:ticker 40s linear infinite;
  display:flex;white-space:nowrap;
}
.ticker-wrap{
  background:#F5F4F2;
  overflow:hidden;
  padding:1.1rem 0;
  border-top:1px solid rgba(10,9,8,.07);
  border-bottom:1px solid rgba(10,9,8,.07);
}

/* ─── Section Commons ─── */
.section-eyebrow{
  display:flex;align-items:center;gap:.8rem;margin-bottom:1.1rem;
}
.ey-dot{
  width:6px;height:6px;
  background:#C41230;border-radius:50%;flex-shrink:0;
}
.ey-text{
  font-size:.57rem;font-weight:700;
  letter-spacing:.25em;text-transform:uppercase;color:#C41230;
}
.section-h2{
  font-size:clamp(2.1rem,4vw,3.2rem);
  font-weight:800;
  line-height:1.05;letter-spacing:-.035em;
  color:#0A0908;margin:0;
}
.section-h2 em{color:#C41230;font-style:normal;}
.section-h2-light{color:#FAFAF8;}

/* Reveal */
.rv{
  opacity:0;transform:translateY(24px);
  transition:opacity .9s cubic-bezier(.22,1,.36,1),transform .9s cubic-bezier(.22,1,.36,1);
}
.rv.in{opacity:1;transform:none;}
.rv-d1{transition-delay:.1s;}
.rv-d2{transition-delay:.2s;}
.rv-d3{transition-delay:.3s;}

/* ─── Profil ─── */
#profil{padding:8rem min(5rem,7vw);background:#F5F4F2;}
.profil-wrap{max-width:1360px;margin:0 auto;}
.profil-header{
  display:grid;grid-template-columns:1fr 1fr;
  gap:5rem;margin-bottom:5rem;align-items:end;
}
.profil-grid{
  display:grid;grid-template-columns:1fr 1fr;
  gap:1px;background:#E0DEDC;
  border-radius:16px;overflow:hidden;
}
.profil-cell{
  position:relative;overflow:hidden;
  padding:3rem 2.5rem;background:#FAFAF8;
  transition:background .3s ease,transform .3s ease;
}
.profil-cell::before{
  content:'';position:absolute;
  left:0;top:0;bottom:0;width:2px;
  background:#C41230;
  transform:scaleY(0);transform-origin:bottom;
  transition:transform .45s cubic-bezier(.22,1,.36,1);
}
.profil-cell:hover{background:#fff;transform:translateY(-2px);}
.profil-cell:hover::before{transform:scaleY(1);}
.profil-cell-num{
  font-size:3.5rem;font-weight:800;
  color:rgba(196,18,48,.055);
  line-height:1;margin-bottom:1.1rem;
  letter-spacing:-.04em;
}
.profil-cell-title{
  font-size:.68rem;font-weight:700;
  letter-spacing:.13em;text-transform:uppercase;
  color:#0A0908;margin-bottom:.85rem;
}
.profil-cell-body{font-size:.85rem;color:#5C5A58;line-height:1.95;}

/* ─── Visi Misi ─── */
#visi-misi{
  padding:8rem min(5rem,7vw);
  background:#0A0908;
  position:relative;overflow:hidden;
}
#visi-misi::before{
  content:'';position:absolute;
  top:-200px;right:-200px;
  width:600px;height:600px;
  background:radial-gradient(circle,rgba(196,18,48,.07) 0%,transparent 65%);
  border-radius:50%;pointer-events:none;
}
#visi-misi::after{
  content:'';position:absolute;
  bottom:-200px;left:-200px;
  width:500px;height:500px;
  background:radial-gradient(circle,rgba(196,18,48,.05) 0%,transparent 65%);
  border-radius:50%;pointer-events:none;
}
.vm-wrap{max-width:1360px;margin:0 auto;position:relative;z-index:1;}
.vm-cards{
  display:grid;grid-template-columns:1fr 1fr;
  gap:1.5rem;margin-top:5rem;
}
.vm-card{
  border:1px solid rgba(255,255,255,.07);
  border-radius:16px;padding:3.75rem;
  background:#111110;
  position:relative;overflow:hidden;
  transition:border-color .3s ease;
}
.vm-card:hover{border-color:rgba(196,18,48,.2);}
.vm-card-glow{
  position:absolute;
  width:300px;height:300px;
  background:radial-gradient(circle,rgba(196,18,48,.1) 0%,transparent 70%);
  border-radius:50%;pointer-events:none;
}
.vm-card:nth-child(1) .vm-card-glow{top:-100px;right:-100px;}
.vm-card:nth-child(2) .vm-card-glow{bottom:-100px;left:-100px;}
.vm-card-label{
  font-size:.58rem;font-weight:700;
  letter-spacing:.28em;text-transform:uppercase;
  color:#C41230;
  display:flex;align-items:center;gap:1.25rem;
  margin-bottom:2.5rem;
  position:relative;z-index:1;
}
.vm-card-label-line{flex:1;height:1px;background:rgba(255,255,255,.06);}
.vm-card-text{
  font-size:clamp(1.05rem,1.5vw,1.3rem);
  font-weight:400;font-style:italic;
  color:rgba(255,255,255,.78);
  line-height:1.9;
  position:relative;z-index:1;
}

/* ─── Struktur ─── */
#struktur{padding:8rem min(5rem,7vw);background:#F5F4F2;}
.str-wrap{max-width:1360px;margin:0 auto;}
.str-tree{
  display:flex;flex-direction:column;align-items:center;
  margin-top:5rem;
}
.str-ketua{
  background:linear-gradient(135deg,#C41230 0%,#A00E27 100%);
  border-radius:12px;padding:2rem 3rem;
  text-align:center;
  box-shadow:0 12px 48px rgba(196,18,48,.3);
  min-width:240px;
  position:relative;
}
.str-ketua::after{
  content:'';
  position:absolute;bottom:-1px;left:50%;
  transform:translateX(-50%);
  width:1px;height:40px;
  background:linear-gradient(to bottom,rgba(196,18,48,.4),rgba(216,214,212,.4));
}
.str-ketua-role{
  font-size:.52rem;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;
  color:rgba(255,255,255,.55);margin-bottom:.5rem;
}
.str-ketua-name{font-size:.9rem;font-weight:700;color:white;}
.str-connector{
  width:1px;height:38px;
  background:linear-gradient(to bottom,rgba(196,18,48,.3),rgba(216,214,212,.5));
  flex-shrink:0;
}
.str-row{
  display:flex;flex-wrap:wrap;
  gap:10px;justify-content:center;
  max-width:920px;width:100%;
}
.str-node{
  position:relative;overflow:hidden;
  background:#FAFAF8;
  border:1px solid #E0DEDC;
  border-radius:11px;
  padding:1.4rem 1.75rem;
  text-align:center;
  min-width:165px;
  transition:all .3s cubic-bezier(.22,1,.36,1);
}
.str-node::after{
  content:'';
  position:absolute;bottom:0;left:0;right:0;
  height:2px;background:#C41230;
  transform:scaleX(0);
  transition:transform .35s cubic-bezier(.22,1,.36,1);
}
.str-node:hover{
  background:#fff;border-color:rgba(196,18,48,.2);
  transform:translateY(-4px);
  box-shadow:0 8px 32px rgba(196,18,48,.09);
}
.str-node:hover::after{transform:scaleX(1);}
.str-node-role{
  font-size:.52rem;font-weight:700;
  letter-spacing:.16em;text-transform:uppercase;
  color:#9C9A98;margin-bottom:.4rem;
}
.str-node-name{font-size:.8rem;font-weight:700;color:#0A0908;}

/* ─── Voting ─── */
#voting{
  padding:8rem min(5rem,7vw);
  background:#FAFAF8;
  position:relative;overflow:hidden;
}
#voting::before{
  content:'';position:absolute;
  top:0;left:0;right:0;height:1px;
  background:linear-gradient(to right,transparent,rgba(196,18,48,.15),transparent);
}
.vote-wrap{max-width:1360px;margin:0 auto;position:relative;z-index:1;}
.vote-header{
  display:flex;align-items:flex-end;
  justify-content:space-between;gap:2rem;flex-wrap:wrap;
  margin-bottom:4rem;
}
.vote-status-badge{
  padding:.5rem 1.25rem;border-radius:7px;
  font-size:.6rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  white-space:nowrap;border:1.5px solid;
}
.vote-status-open{color:#C41230;border-color:rgba(196,18,48,.3);background:rgba(196,18,48,.04);}
.vote-status-closed{color:#9C9A98;border-color:#E0DEDC;background:white;}
.vote-winner-bar{
  background:linear-gradient(135deg,#C41230 0%,#900e22 100%);
  border-radius:14px;padding:3rem 3.5rem;
  margin-bottom:1.75rem;
  display:flex;align-items:center;
  justify-content:space-between;gap:2.5rem;flex-wrap:wrap;
  box-shadow:0 14px 50px rgba(196,18,48,.28);
}
.vote-winner-label{
  font-size:.55rem;font-weight:700;
  letter-spacing:.28em;text-transform:uppercase;
  color:rgba(255,255,255,.5);margin-bottom:.65rem;
}
.vote-winner-name{
  font-size:clamp(1.3rem,2.2vw,1.9rem);
  font-weight:700;font-style:italic;
  color:white;line-height:1.15;margin-bottom:.5rem;
}
.vote-winner-meta{
  font-size:.78rem;color:rgba(255,255,255,.4);
  font-weight:500;letter-spacing:.03em;
}
.vote-winner-avatars{display:flex;gap:.8rem;flex-shrink:0;}
.vote-winner-avatar{
  width:64px;height:64px;
  border-radius:10px;object-fit:cover;
  border:2px solid rgba(255,255,255,.25);
}
.cc{
  background:white;border:1px solid #E8E6E4;
  border-radius:14px;overflow:hidden;
  transition:all .35s cubic-bezier(.22,1,.36,1);
}
.cc:hover{
  border-color:rgba(196,18,48,.2);
  box-shadow:0 16px 60px rgba(196,18,48,.1);
  transform:translateY(-6px);
}
.vbar{transition:width 1.4s .2s cubic-bezier(.22,1,.36,1);}
.vote-total-row{
  margin-top:2.5rem;
  display:flex;align-items:center;
  justify-content:space-between;flex-wrap:wrap;gap:1.5rem;
  padding:2.25rem 3rem;background:white;
  border:1px solid #E8E6E4;border-radius:12px;
}
.vote-total-label{
  font-size:.55rem;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;
  color:#9C9A98;margin-bottom:.4rem;
}
.vote-total-num{
  font-size:3rem;color:#C41230;
  line-height:1;font-weight:800;
  letter-spacing:-.04em;
}
.vote-empty{
  background:white;border-radius:14px;
  padding:6rem 3rem;text-align:center;
  border:1px solid #E8E6E4;
}
.vote-empty-icon{
  width:56px;height:56px;
  background:#F5F4F2;border:1.5px solid #E8E6E4;
  border-radius:12px;
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 2rem;
}
.vote-empty-h{
  font-size:1.6rem;font-weight:800;
  letter-spacing:-.03em;
  color:#0A0908;margin-bottom:1rem;
}
.vote-empty-p{
  font-size:.85rem;color:#5C5A58;
  line-height:1.9;max-width:400px;margin:0 auto;
}

/* ─── Footer ─── */
footer{
  background:#060504;
  border-top:1px solid rgba(255,255,255,.04);
  position:relative;overflow:hidden;
}
footer::before{
  content:'';position:absolute;
  top:0;left:0;right:0;height:1px;
  background:linear-gradient(to right,transparent,rgba(196,18,48,.2),transparent);
}
.footer-content{
  max-width:1360px;margin:0 auto;
  padding:6rem min(5rem,7vw) 3.5rem;
}
.footer-grid{
  display:grid;
  grid-template-columns:1.1fr 1.6fr .9fr;
  gap:5rem;
  margin-bottom:4rem;
  padding-bottom:4rem;
  border-bottom:1px solid rgba(255,255,255,.06);
}
.footer-logo-box{display:flex;align-items:center;gap:.85rem;margin-bottom:1.5rem;}
.footer-logo{
  width:40px;height:40px;
  background:linear-gradient(135deg,#C41230 0%,#A00E27 100%);
  border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  font-size:1rem;font-weight:800;color:white;
  box-shadow:0 6px 20px rgba(196,18,48,.35);
}
.footer-brand-name{font-size:.75rem;font-weight:700;color:white;letter-spacing:.01em;line-height:1.1;}
.footer-brand-sub{font-size:.52rem;font-weight:600;color:rgba(255,255,255,.3);letter-spacing:.12em;text-transform:uppercase;}
.footer-tagline{font-size:.78rem;line-height:1.8;color:rgba(255,255,255,.28);max-width:230px;margin-bottom:2.5rem;}
.footer-contact-label{font-size:.55rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.22);margin-bottom:.85rem;}
.footer-contact-text{font-size:.75rem;line-height:2.1;color:rgba(255,255,255,.32);}
.footer-nav-grid{display:grid;grid-template-columns:1fr 1fr;gap:3rem;}
.footer-nav-title{font-size:.58rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:1.1rem;}
.footer-nav-links{display:flex;flex-direction:column;gap:.7rem;}
.footer-nav-link{
  font-size:.74rem;color:rgba(255,255,255,.28);
  text-decoration:none;letter-spacing:.04em;line-height:1.5;
  transition:all .3s ease;
}
.footer-nav-link:hover{color:#C41230;padding-left:.3rem;}
.footer-social-title{font-size:.58rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:1.5rem;}
.footer-socials{display:flex;gap:.6rem;margin-bottom:2rem;flex-wrap:wrap;}
.social-btn{
  width:42px;height:42px;
  border:1.5px solid rgba(255,255,255,.1);border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  color:rgba(255,255,255,.35);
  text-decoration:none;
  transition:all .3s ease;
  flex-shrink:0;
}
.social-btn svg{width:18px;height:18px;fill:currentColor;}
.social-btn:hover{border-color:#C41230;color:#C41230;background:rgba(196,18,48,.06);}
.footer-period-badge{
  display:inline-flex;align-items:center;gap:.6rem;
  padding:.6rem 1.25rem;
  background:rgba(196,18,48,.08);
  border:1px solid rgba(196,18,48,.15);
  border-radius:100px;
  font-size:.56rem;font-weight:600;
  letter-spacing:.1em;text-transform:uppercase;
  color:#C41230;
}
.footer-bottom{
  display:flex;align-items:center;
  justify-content:space-between;flex-wrap:wrap;gap:1.5rem;
}
.footer-copy{font-size:.58rem;color:rgba(255,255,255,.16);letter-spacing:.06em;line-height:1.7;}

/* ─── Responsive ─── */
@media(max-width:1100px){
  .footer-grid{grid-template-columns:1fr 1fr;gap:3rem;}
  .footer-grid>*:last-child{grid-column:span 2;}
}
@media(max-width:900px){
  .profil-header{grid-template-columns:1fr;gap:2.5rem;}
  .vm-cards{grid-template-columns:1fr;}
  .hero-inner{grid-template-columns:1fr;}
}
@media(max-width:768px){
  #nav{padding:0 1.5rem;}
  #nav ul.nav-links-desktop{display:none;}
  #menu-btn{display:flex;}
  .hero-content{padding:0 1.75rem 4.5rem;}
  .hero-h1{font-size:clamp(2.8rem,11vw,5rem);}
  #profil,#visi-misi,#struktur,#voting{padding:5rem 1.75rem;}
  .profil-grid{grid-template-columns:1fr;}
  .vm-card{padding:2.5rem 2rem;}
  .vote-winner-bar{padding:2rem 2rem;}
  .vote-total-row{padding:1.75rem 2rem;}
  .footer-content{padding:4rem 1.75rem 2.5rem;}
  .footer-grid{grid-template-columns:1fr;gap:2.5rem;}
  .footer-grid>*:last-child{grid-column:span 1;}
  .footer-nav-grid{grid-template-columns:1fr 1fr;}
}
@media(max-width:480px){
  .hero-h1{font-size:clamp(2.2rem,10vw,3.5rem);}
  .hero-cta-row{flex-direction:column;align-items:flex-start;gap:1.25rem;}
  .str-node{min-width:140px;}
}
</style>
</head>
<body class="page-load">

<!-- ════════════════════════════════
     MOBILE MENU
════════════════════════════════ -->
<div id="nav-menu" aria-hidden="true">
  <div style="margin-bottom:3rem;display:flex;align-items:center;gap:.75rem">
    <div class="nav-logo-box" style="width:34px;height:34px;border-radius:8px">
      <span style="font-size:.9rem;font-weight:800;color:white">O</span>
    </div>
    <div>
      <div style="font-size:.72rem;font-weight:700;color:white">OSIS SMK 5</div>
      <div style="font-size:.5rem;font-weight:600;color:rgba(255,255,255,.3);letter-spacing:.12em;text-transform:uppercase">Telkom</div>
    </div>
  </div>
  <a href="#profil" class="nm-link" onclick="closeMenu()">Profil</a>
  <a href="#visi-misi" class="nm-link" onclick="closeMenu()">Visi Misi</a>
  <a href="#struktur" class="nm-link" onclick="closeMenu()">Struktur</a>
  <a href="#voting" class="nm-link" onclick="closeMenu()">Voting</a>
  <div style="margin-top:3rem;display:flex;flex-direction:column;gap:1rem">
    <a href="{{ route('pendaftaran-osis') }}" class="btn-r" style="text-align:center">Daftar Sekarang</a>
    @auth
      <form method="POST" action="{{ route('logout') }}" style="margin:0">
        @csrf
        <button type="submit" class="btn-o" style="width:100%;text-align:center">Logout</button>
      </form>
    @else
      @if($isOpen)
        <a href="{{ route('login') }}" class="btn-o" style="text-align:center">Vote Sekarang</a>
      @endif
    @endauth
  </div>
</div>

<!-- ════════════════════════════════
     NAVBAR
════════════════════════════════ -->
<nav id="nav" class="nav-anim">
  <a href="#beranda" style="display:flex;align-items:center;gap:.85rem;text-decoration:none">
    <div class="nav-logo-box">
      <span style="font-size:1rem;font-weight:800;color:white;line-height:1">O</span>
    </div>
    <div>
      <div class="nav-brand-name" style="font-size:.72rem;font-weight:700;color:white;letter-spacing:.01em;line-height:1.15;transition:color .3s">OSIS</div>
      <div class="nav-brand-sub" style="font-size:.51rem;font-weight:600;color:rgba(255,255,255,.35);letter-spacing:.13em;text-transform:uppercase;transition:color .3s">SMK Negeri 5</div>
    </div>
  </a>

  <ul class="nav-links-desktop" style="display:flex;align-items:center;gap:.25rem;list-style:none;margin:0;padding:0;">
    <li><a href="#profil"    class="nl">Profil</a></li>
    <li><a href="#visi-misi" class="nl">Visi Misi</a></li>
    <li><a href="#struktur"  class="nl">Struktur</a></li>
    <li><a href="#voting"    class="nl">Voting</a></li>
  </ul>

  <div style="display:flex;align-items:center;gap:.75rem;">
    <a href="{{ route('pendaftaran-osis') }}" class="btn-r">Daftar Sekarang</a>
    @auth
      <form method="POST" action="{{ route('logout') }}" style="margin:0;display:inline">
        @csrf
        <button type="submit" class="btn-o">Logout</button>
      </form>
    @else
      @if($isOpen)
        <a href="{{ route('login') }}" class="btn-o">Vote</a>
      @endif
    @endauth
    <button id="menu-btn" aria-label="Toggle menu" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- ════════════════════════════════
     HERO SECTION
════════════════════════════════ -->
<section id="beranda">
  <div class="hero-bg-img">
    <img src="/osis.jpeg" alt="OSIS SMK 5 Telkom"/>
  </div>
  <div class="hero-bg-overlay"></div>
  <div class="hero-bg-overlay-left"></div>

  <div class="hero-content">
    <div class="hero-inner">
      <div class="hero-eyebrow ha0">
        <div class="hero-eyebrow-dot"></div>
        <span class="hero-eyebrow-text">Aktif 2026 &ndash; 2027</span>
      </div>
      <h1 class="hero-h1 ha1">
        Wadah<br>Kolaborasi<br>&amp; <em>Inovasi</em>
      </h1>
      <p class="hero-subline ha2">
        <strong>OSIS SMK Negeri 5 Telkom</strong> &mdash; wadah kolaborasi dan inovasi seluruh siswa SMK Telkom. Ruang aspirasi, kepemimpinan, dan dampak nyata bagi komunitas sekolah.
      </p>
      <div class="hero-cta-row ha3">
        <a href="#voting" class="hero-cta-primary">
          Lihat Pemilihan
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
        <a href="#profil" class="hero-cta-secondary">
          Kenali OSIS
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17L17 7"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="hero-scroll-indicator ha4">
    <div class="scroll-line"></div>
    <div class="scroll-text">Scroll</div>
  </div>
</section>

<!-- ════════════════════════════════
     TICKER
════════════════════════════════ -->
<div class="ticker-wrap">
  <div class="ticker-inner" id="ticker"></div>
</div>

<!-- ════════════════════════════════
     PROFIL
════════════════════════════════ -->
<section id="profil">
  <div class="profil-wrap">
    <div class="profil-header rv">
      <div>
        <div class="section-eyebrow">
          <div class="ey-dot"></div>
          <span class="ey-text">01 &ndash; Tentang Kami</span>
        </div>
        <h2 class="section-h2">Profil <em>OSIS</em></h2>
      </div>
      <p style="font-size:.88rem;color:#5C5A58;line-height:1.95;margin:0;max-width:400px;padding-bottom:.25rem">
        Organisasi siswa yang menjadi wadah aspirasi, kreativitas, dan kepemimpinan di SMK Negeri 5 Telkom Banda Aceh.
      </p>
    </div>

    <div class="profil-grid rv rv-d2">
      <div class="profil-cell">
        <div class="profil-cell-num">01</div>
        <div class="profil-cell-title">Siapa Kami</div>
        <p class="profil-cell-body">OSIS SMK Negeri 5 Telkom adalah wadah aspirasi, kreativitas, dan kepemimpinan siswa &ndash; menjembatani antara siswa dan sekolah dengan integritas.</p>
      </div>
      <div class="profil-cell">
        <div class="profil-cell-num">02</div>
        <div class="profil-cell-title">Apa yang Kami Lakukan</div>
        <p class="profil-cell-body">Mengelola ekstrakurikuler, mengadakan event sekolah, menyuarakan aspirasi siswa &ndash; pusat pergerakan positif dan inovatif.</p>
      </div>
      <div class="profil-cell">
        <div class="profil-cell-num">03</div>
        <div class="profil-cell-title">Perjalanan Kami</div>
        <p class="profil-cell-body">Perjalanan OSIS dimulai dari semangat kebersamaan untuk menciptakan lingkungan sekolah yang aktif, inklusif, dan inspiratif bagi seluruh siswa.</p>
      </div>
      <div class="profil-cell">
        <div class="profil-cell-num">04</div>
        <div class="profil-cell-title">Nilai Kami</div>
        <p class="profil-cell-body">Integritas &middot; Kolaborasi &middot; Inovasi &middot; Inklusivitas. Setiap suara siswa berharga dan layak untuk diperjuangkan bersama.</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════
     VISI MISI
════════════════════════════════ -->
<section id="visi-misi">
  <div class="vm-wrap">
    <div class="rv">
      <div class="section-eyebrow">
        <div class="ey-dot"></div>
        <span class="ey-text">02 &ndash; Arah &amp; Tujuan</span>
      </div>
      <h2 class="section-h2 section-h2-light">Visi &amp; <em>Misi</em></h2>
    </div>
    <div class="vm-cards rv rv-d2">
      <div class="vm-card">
        <div class="vm-card-glow"></div>
        <div class="vm-card-label">Visi<div class="vm-card-label-line"></div></div>
        <p class="vm-card-text">&ldquo;Menjadi dewan perwakilan yang menjunjung tinggi nilai-nilai prestasi akademik dan non akademik, serta mendengar aspirasi siswa dengan sebenar-benarnya&rdquo;</p>
      </div>
      <div class="vm-card">
        <div class="vm-card-glow"></div>
        <div class="vm-card-label">Misi<div class="vm-card-label-line"></div></div>
        <p class="vm-card-text">&ldquo;Mendorong pertumbuhan prestasi siswa di dalam maupun di luar sekolah dan menyambut dengan hangat kritikan dari seluruh warga SMK N 5 Telkom&rdquo;</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════
     STRUKTUR
════════════════════════════════ -->
<section id="struktur">
  <div class="str-wrap">
    <div class="rv" style="margin-bottom:5rem">
      <div class="section-eyebrow">
        <div class="ey-dot"></div>
        <span class="ey-text">03 &ndash; Tim Kami</span>
      </div>
      <h2 class="section-h2">Struktur <em>Organisasi</em></h2>
    </div>

    <div class="str-tree rv rv-d2">
      <div class="str-ketua">
        <div class="str-ketua-role">Ketua OSIS</div>
        <div class="str-ketua-name">M. Akbar Maulana Mufa</div>
      </div>
      <div class="str-connector"></div>
      <div class="str-row">
        @foreach([['Wakil Ketua I','Muhammad Fairuz'],['Sekretaris I','Qurrata\'aini'],['Sekretaris II','Putri Raisha'],['Bendahara I','Hizri Uswa']] as [$pos,$name])
        <div class="str-node">
          <div class="str-node-role">{{ $pos }}</div>
          <div class="str-node-name">{{ $name }}</div>
        </div>
        @endforeach
      </div>
      <div class="str-connector"></div>
      <div class="str-row">
        @foreach([['Kabid Sosial','Muthia Syabrina'],['Kabid Kesenian','Calista Delinda'],['Kabid Humas','Sulthan Alqan Najed'],['Kabid Keamanan','Muhammad Furqan']] as [$pos,$name])
        <div class="str-node">
          <div class="str-node-role">{{ $pos }}</div>
          <div class="str-node-name">{{ $name }}</div>
        </div>
        @endforeach
      </div>
      <div class="str-connector"></div>
      <div class="str-row">
        @foreach([['Kabid Agama','M. Zakiyul Mubarak'],['Kabid Olahraga','Syamwil Mubarak'],['Kabid Kesehatan','Hafiz Al-Khalifi']] as [$pos,$name])
        <div class="str-node">
          <div class="str-node-role">{{ $pos }}</div>
          <div class="str-node-name">{{ $name }}</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════
     VOTING
════════════════════════════════ -->
<section id="voting">
  <div class="vote-wrap">
    <div class="vote-header rv">
      <div>
        <div class="section-eyebrow">
          <div class="ey-dot"></div>
          <span class="ey-text">04 &ndash; Pilih Pemimpinmu</span>
        </div>
        <h2 class="section-h2" style="margin-bottom:1rem">Vote <em>Ketua &amp; Wakil OSIS</em></h2>
        <p style="font-size:.88rem;color:#5C5A58;line-height:1.9;max-width:500px;margin:0">Satu siswa, satu suara. Berikan suaramu untuk memilih Ketua &amp; Wakil OSIS terbaik periode 2026/2027.</p>
      </div>
      <div class="vote-status-badge {{ $isOpen ? 'vote-status-open' : 'vote-status-closed' }}">
        @if($isOpen) Voting Berlangsung
        @elseif($closedRecently) Voting Ditutup &middot; Hasil Sementara
        @else Voting Belum Dibuka
        @endif
      </div>
    </div>

    @if($showVoting)
      @php
        $candidates = Pemilihan::orderBy('Jumlah_Suara','desc')->get();
        $winner     = $candidates->first();
        $totalVotes = $candidates->sum('Jumlah_Suara');
        $isLoggedIn = Auth::check();
      @endphp

      @if($winner)
      <div class="vote-winner-bar rv rv-d1">
        <div>
          <div class="vote-winner-label">{{ $isOpen ? 'Pemenang Sementara' : 'Pemenang Akhir' }}</div>
          <div class="vote-winner-name">{{ $winner->Nama_Ketua }} &amp; {{ $winner->Nama_Wakil }}</div>
          <div class="vote-winner-meta">{{ $winner->Jumlah_Suara }} suara &nbsp;&middot;&nbsp; {{ $totalVotes > 0 ? round(($winner->Jumlah_Suara/$totalVotes)*100) : 0 }}% dari total suara</div>
        </div>
        <div class="vote-winner-avatars">
          <img src="{{ $winner->Foto_Ketua ? asset('storage/'.$winner->Foto_Ketua) : 'https://ui-avatars.com/api/?name='.urlencode($winner->Nama_Ketua).'&background=1a0508&color=c41230&size=80&bold=true' }}" alt="{{ $winner->Nama_Ketua }}" class="vote-winner-avatar"/>
          <img src="{{ $winner->Foto_Wakil ? asset('storage/'.$winner->Foto_Wakil) : 'https://ui-avatars.com/api/?name='.urlencode($winner->Nama_Wakil).'&background=1a0508&color=c41230&size=80&bold=true' }}" alt="{{ $winner->Nama_Wakil }}" class="vote-winner-avatar"/>
        </div>
      </div>
      @endif

      @php
        $gridClass = $candidates->count() <= 2
          ? 'grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8 max-w-4xl mx-auto'
          : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6';
      @endphp
      <div class="{{ $gridClass }} rv rv-d2" id="cGrid"></div>

      <div class="vote-total-row rv rv-d3">
        <div>
          <div class="vote-total-label">Total Suara Masuk</div>
          <div class="vote-total-num" id="vTotal">{{ $totalVotes }}</div>
        </div>
        <div style="font-size:.75rem;color:#9C9A98;line-height:1.9;text-align:right;letter-spacing:.04em">
          @if($isOpen) Data diperbarui real-time<br>setiap suara masuk
          @else Voting telah ditutup<br>Hasil final akan diumumkan
          @endif
        </div>
      </div>
    @else
      <div class="vote-empty rv rv-d1">
        <div class="vote-empty-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C41230" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="vote-empty-h">Voting Belum Dibuka</h3>
        <p class="vote-empty-p">{{ SettingVoting::getMessage() }}</p>
      </div>
    @endif
  </div>
</section>

<!-- ════════════════════════════════
     FOOTER
════════════════════════════════ -->
<footer>
  <div class="footer-content">
    <div class="footer-grid">
      <div>
        <div class="footer-logo-box">
          <div class="footer-logo">O</div>
          <div>
            <div class="footer-brand-name">OSIS SMK 5</div>
            <div class="footer-brand-sub">Telkom</div>
          </div>
        </div>
        <p class="footer-tagline">Organisasi siswa intra sekolah yang berfokus pada kepemimpinan, aspirasi, dan dampak positif bagi komunitas sekolah.</p>
        <div class="footer-contact-label">Alamat</div>
        <div class="footer-contact-text">
          Jalan Stadion H. Dimurthala No. 5,<br>
          Kelurahan Kota Baru, Kecamatan Kuta Alam,<br>
          Kota Banda Aceh, Aceh 23125<br>
          <span style="color:rgba(255,255,255,.2);font-size:.72rem">osis@smk5telkom.ac.id</span>
        </div>
      </div>

      <div class="footer-nav-grid">
        <div>
          <div class="footer-nav-title">Navigasi</div>
          <div class="footer-nav-links">
            <a href="#profil"    class="footer-nav-link">Profil OSIS</a>
            <a href="#visi-misi" class="footer-nav-link">Visi &amp; Misi</a>
            <a href="#struktur"  class="footer-nav-link">Struktur Organisasi</a>
            <a href="#voting"    class="footer-nav-link">Pilihan Ketua</a>
          </div>
        </div>
        <div>
          <div class="footer-nav-title">Aksi</div>
          <div class="footer-nav-links">
            <a href="{{ route('pendaftaran-osis') }}" class="footer-nav-link">Daftar Anggota</a>
            <a href="{{ route('login') }}"            class="footer-nav-link">Login Voting</a>
            <a href="#" class="footer-nav-link">FAQ</a>
            <a href="#" class="footer-nav-link">Hubungi Kami</a>
          </div>
        </div>
      </div>

      <div>
        <div class="footer-social-title">Ikuti Kami</div>
        <div class="footer-socials">
          {{-- Instagram --}}
          <a href="#" class="social-btn" title="Instagram">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
            </svg>
          </a>
          {{-- TikTok --}}
          <a href="#" class="social-btn" title="TikTok">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.29 6.29 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.82a8.19 8.19 0 004.79 1.53V6.9a4.85 4.85 0 01-1.02-.21z"/>
            </svg>
          </a>
          {{-- YouTube --}}
          <a href="#" class="social-btn" title="YouTube">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
            </svg>
          </a>
        </div>
        <div class="footer-period-badge">
          <div style="width:5px;height:5px;background:#C41230;border-radius:50%"></div>
          Periode 2026 / 2027
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="footer-copy">
        Hak Cipta &copy; 2026 OSIS SMK Negeri 5 Telkom.<br>Dibuat dengan penuh dedikasi untuk masa depan yang lebih baik.
      </div>
      <div style="font-size:.56rem;color:rgba(255,255,255,.1);letter-spacing:.08em;text-transform:uppercase">
        SMK Negeri 5 Telkom &nbsp;&middot;&nbsp; Banda Aceh
      </div>
    </div>
  </div>
</footer>

<!-- ════════════════════════════════
     SCRIPTS
════════════════════════════════ -->
<script>
/* ── Navbar scroll behavior ─────────────────────────────── */
const nav     = document.getElementById('nav');
const menuBtn = document.getElementById('menu-btn');
const HERO_H  = () => document.getElementById('beranda').offsetHeight;

function updateNav() {
  const sy = window.scrollY;
  const pastHero = sy > (HERO_H() * 0.85);
  nav.classList.toggle('scrolled', sy > 20 && !pastHero);
  nav.classList.toggle('light-mode', pastHero);

  // In hero: keep nav links white-ish; past hero: handled by light-mode class
  if (!pastHero) {
    nav.querySelectorAll('.nl').forEach(l => {
      l.style.color = '';  // Let CSS handle
    });
  }
}
window.addEventListener('scroll', updateNav, { passive:true });
updateNav();

/* ── Mobile Menu ── */
const navMenu = document.getElementById('nav-menu');
let menuOpen = false;
function toggleMenu() {
  menuOpen = !menuOpen;
  menuBtn.classList.toggle('open', menuOpen);
  navMenu.classList.toggle('open', menuOpen);
  navMenu.setAttribute('aria-hidden', String(!menuOpen));
  document.body.style.overflow = menuOpen ? 'hidden' : '';
}
function closeMenu() {
  menuOpen = false;
  menuBtn.classList.remove('open');
  navMenu.classList.remove('open');
  navMenu.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

/* ── Ticker ── */
const tickerItems = [
  '10+ Program Kerja Aktif','50+ Anggota Terlatih',
  'Satu Siswa, Satu Suara','Voting Ketua OSIS 2026',
  'SMK Negeri 5 Telkom','Inovatif &middot; Inklusif &middot; Berdampak',
  'Wadah Kolaborasi Siswa','Banda Aceh, Indonesia',
];
const tickerEl = document.getElementById('ticker');
const buildItems = () => tickerItems.map(t =>
  `<span style="display:inline-flex;align-items:center;gap:.8rem;padding:0 2.5rem;font-size:.6rem;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:#5C5A58;white-space:nowrap">
    ${t}
    <span style="color:#D8D6D4;font-size:.38rem;flex-shrink:0">&#9632;</span>
  </span>`
).join('');
tickerEl.innerHTML = buildItems() + buildItems();

/* ── Scroll Reveal ── */
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
}, { threshold: .07 });
document.querySelectorAll('.rv').forEach(el => observer.observe(el));

/* ── Voting Cards ── */
@if($showVoting)
@php
$candsData = $candidates->map(function($c, $i) {
  return [
    'id'         => $c->id,
    'name'       => $c->Nama_Ketua.' &amp; '.$c->Nama_Wakil,
    'num'        => str_pad($i + 1, 2, '0', STR_PAD_LEFT),
    'tagline'    => $c->Visi.' &mdash; '.$c->Misi,
    'foto_ketua' => $c->Foto_Ketua ? asset('storage/'.$c->Foto_Ketua) : 'https://ui-avatars.com/api/?name='.urlencode($c->Nama_Ketua).'&background=fafaf8&color=c41230&size=80&bold=true',
    'foto_wakil' => $c->Foto_Wakil ? asset('storage/'.$c->Foto_Wakil) : 'https://ui-avatars.com/api/?name='.urlencode($c->Nama_Wakil).'&background=fafaf8&color=c41230&size=80&bold=true',
    'votes'      => $c->Jumlah_Suara,
  ];
})->toArray();
@endphp
const cands      = @json($candsData);
const isOpen     = {{ $isOpen ? 'true' : 'false' }};
const isLoggedIn = {{ $isLoggedIn ? 'true' : 'false' }};
const voteUrl    = isLoggedIn ? '{{ route("vote") }}' : '{{ route("login") }}';

function renderVote() {
  const grid = document.getElementById('cGrid');
  if (!grid) return;
  grid.innerHTML = '';
  const tot = cands.reduce((a, c) => a + c.votes, 0);
  cands.forEach((c, i) => {
    const pct = tot > 0 ? Math.round(c.votes / tot * 100) : 0;
    const top = i === 0 && c.votes > 0;
    const btn = isOpen
      ? `<a href="${voteUrl}" style="display:block;width:100%;padding:.85rem;background:#C41230;color:white;text-decoration:none;border-radius:8px;font-family:'Inter',sans-serif;font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;text-align:center;transition:background .3s ease;" onmouseover="this.style.background='#A00E27'" onmouseout="this.style.background='#C41230'">${isLoggedIn ? 'Vote Sekarang' : 'Mulai Voting'}</a>`
      : `<div style="width:100%;padding:.85rem;background:#F5F4F2;color:#9C9A98;border:1.5px solid #E8E6E4;border-radius:8px;font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;text-align:center">Voting Ditutup</div>`;
    const badge = top
      ? `<div style="position:absolute;top:1.1rem;right:1.1rem;padding:.25rem .8rem;background:#C41230;border-radius:100px;font-size:.5rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:white;z-index:2">Terdepan</div>`
      : '';
    const el = document.createElement('div');
    el.className = 'cc';
    el.innerHTML = `
      <div style="background:#F5F4F2;padding:2.75rem 2.25rem 2rem;text-align:center;position:relative;">
        ${badge}
        <div style="position:absolute;top:1.1rem;left:1.1rem;width:30px;height:30px;background:#0A0908;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:.56rem;font-weight:700;color:white;">${c.num}</div>
        <div style="display:flex;justify-content:center;gap:.85rem;margin-bottom:1.75rem;">
          <img src="${c.foto_ketua}" alt="Ketua" style="width:68px;height:68px;border-radius:11px;object-fit:cover;border:1.5px solid rgba(196,18,48,.1);background:white;"/>
          <img src="${c.foto_wakil}" alt="Wakil" style="width:68px;height:68px;border-radius:11px;object-fit:cover;border:1.5px solid rgba(196,18,48,.1);background:white;"/>
        </div>
        <div style="font-size:1rem;font-weight:700;color:#0A0908;margin-bottom:.5rem;line-height:1.25;letter-spacing:-.02em;">${c.name}</div>
        <p style="font-size:.7rem;color:#9C9A98;line-height:1.75;max-height:3.15rem;overflow:hidden;margin:0;letter-spacing:.01em;">${c.tagline}</p>
      </div>
      <div style="padding:1.5rem 2.25rem 2rem;">
        <div style="height:2.5px;background:#E8E6E4;border-radius:4px;margin-bottom:.8rem;overflow:hidden;">
          <div class="vbar" style="height:100%;border-radius:4px;background:#C41230;width:${pct}%;"></div>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:.62rem;color:#9C9A98;margin-bottom:1.5rem;font-weight:600;letter-spacing:.04em;">
          <span>${c.votes} suara</span><span>${pct}%</span>
        </div>
        ${btn}
      </div>`;
    grid.appendChild(el);
  });
  const vt = document.getElementById('vTotal');
  if (vt) vt.textContent = tot.toLocaleString('id-ID');
}
renderVote();
@endif

/* ── Legacy helpers ── */
function toggleForm(t) {
  const f = document.getElementById('form' + t);
  const b = document.getElementById('btn' + t);
  if (!f || !b) return;
  const o = f.classList.toggle('open');
  b.classList.toggle('open', o);
  b.textContent       = o ? 'Tutup Formulir' : 'Buka Formulir Pendaftaran';
  b.style.background  = o ? '#C41230' : '';
  b.style.color       = o ? '#fff' : '';
  b.style.borderColor = o ? '#C41230' : '';
}
function submitReg(t) {
  const d = document.getElementById('done' + t);
  if (d) { d.classList.remove('hidden'); d.classList.add('block'); }
  const f = document.getElementById('form' + t);
  if (f) f.querySelectorAll('input,select,textarea').forEach(el => el.value = '');
}
</script>
</body>
</html>