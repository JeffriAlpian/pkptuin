<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKPT IPNU IPPNU UIN Raden Intan Lampung</title>
    <link rel="icon" type="image/png" href="/images/logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        :root{
            --green-950:#0F2A1F;
            --green-900:#153B29;
            --green-800:#1D5236;
            --green-700:#256B45;
            --green-600:#317F52;
            --green-100:#E7EFE6;
            --green-50:#F2F6EF;
            --gold-600:#B98A22;
            --gold-500:#D3A431;
            --gold-400:#E4BC4E;
            --gold-100:#F7ECC9;
            --cream:#FBF8F1;
            --ink-900:#1C231D;
            --ink-600:#4B564C;
        }
        *{ scrollbar-width: thin; }
        html{ background:var(--cream); }
        body{
            font-family:'Poppins', sans-serif;
            color:var(--ink-900);
            background:var(--cream);
        }
        .font-display{ font-family:'Fraunces', serif; }
        ::selection{ background:var(--gold-400); color:var(--green-950); }

        :focus-visible{
            outline: 2px solid var(--gold-500);
            outline-offset: 3px;
        }

        /* ---------- Navbar blend-with-hero ---------- */
        .site-nav{
            background: transparent;
            transition: background-color .4s ease, box-shadow .4s ease, backdrop-filter .4s ease, border-color .4s ease;
            border-bottom: 1px solid transparent;
        }
        .site-nav .nav-link{ color: rgba(255,255,255,.92); }
        .site-nav .nav-link:hover{ color: var(--gold-400); }
        .site-nav .brand-text{ color:#fff; }
        .site-nav .menu-icon{ color:#fff; }
        .site-nav.nav-solid{
            background: rgba(251,248,241,.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 0 rgba(15,42,31,.06);
            border-bottom: 1px solid rgba(15,42,31,.06);
        }
        .site-nav.nav-solid .nav-link{ color: var(--ink-600); }
        .site-nav.nav-solid .nav-link:hover{ color: var(--green-700); }
        .site-nav.nav-solid .brand-text{ color: var(--green-900); }
        .site-nav.nav-solid .menu-icon{ color: var(--ink-900); }

        /* ---------- Hero fade carousel ---------- */
        .hero-slide{
            position:absolute; inset:0;
            opacity:0; visibility:hidden;
            transition: opacity 1.1s ease;
        }
        .hero-slide.is-active{ opacity:1; visibility:visible; }
        .hero-slide__img{
            position:absolute; inset:0; width:100%; height:100%; object-fit:cover;
        }
        .hero-slide__scrim{
            position:absolute; inset:0;
            background:
                linear-gradient(to top, rgba(15,42,31,.92) 0%, rgba(15,42,31,.55) 42%, rgba(15,42,31,.25) 70%),
                linear-gradient(to right, rgba(15,42,31,.55) 0%, rgba(15,42,31,.1) 55%);
        }
        .hero-slide__content{ position:relative; z-index:10; height:100%; }

        .carousel-arrow{
            width:44px; height:44px; border-radius:9999px;
            display:flex; align-items:center; justify-content:center;
            border:1px solid rgba(255,255,255,.35);
            color:#fff; background:rgba(255,255,255,.08);
            transition: background-color .25s ease, transform .2s ease;
        }
        .carousel-arrow:hover{ background:rgba(255,255,255,.2); }
        .carousel-arrow:active{ transform: scale(.94); }
        .carousel-arrow--dark{
            border-color: rgba(15,42,31,.15);
            color: var(--green-900);
            background: rgba(15,42,31,.05);
        }
        .carousel-arrow--dark:hover{ background: rgba(15,42,31,.1); }

        .carousel-dot{
            width:8px; height:8px; border-radius:9999px;
            background: rgba(255,255,255,.4);
            transition: width .3s ease, background-color .3s ease;
        }
        .carousel-dot.is-active{ width:22px; background: var(--gold-400); }
        .carousel-dot--dark{ background: rgba(15,42,31,.18); }
        .carousel-dot--dark.is-active{ background: var(--green-700); }

        /* ---------- Horizontal scroll carousels ---------- */
        .scroll-track{
            scroll-snap-type: x mandatory;
            -ms-overflow-style: none; scrollbar-width: none;
        }
        .scroll-track::-webkit-scrollbar{ display:none; }
        .scroll-card{ scroll-snap-align: start; }

        /* ---------- Misc ---------- */
        .offset-frame::before{
            content:"";
            position:absolute; inset:0;
            transform: translate(14px, 14px);
            background: var(--gold-400);
            border-radius: .75rem;
            z-index: 0;
        }
        .quote-mark{ font-family:'Fraunces', serif; }

        @media (prefers-reduced-motion: reduce){
            .hero-slide, html{ transition:none !important; scroll-behavior:auto !important; }
        }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">

    <!-- ============ NAVBAR ============ -->
    <x-navbar />

    <main class="flex-grow">

        <!-- ============ HERO CAROUSEL ============ -->
        <section id="beranda" class="relative h-[100svh] min-h-[600px] overflow-hidden bg-[var(--green-950)]" data-fade-carousel>

            <div data-slide class="hero-slide is-active">
                <img class="hero-slide__img" alt="Diskusi mahasiswa PKPT" src="{{ asset('background/bg2.JPG') }}">
                <div class="hero-slide__scrim"></div>
                <div class="hero-slide__content flex items-end md:items-center">
                    <div class="max-w-7xl mx-auto px-5 sm:px-8 pb-28 md:pb-0 w-full">
                        <div class="max-w-2xl">
                            
                            <h1 class="font-display text-4xl md:text-6xl font-semibold text-white mb-6 leading-[1.1]">
                                Membangun generasi pelajar yang progresif dan religius
                            </h1>
                            <p class="text-base md:text-lg text-white/80 mb-9 max-w-xl leading-relaxed">
                                Pimpinan Komisariat Perguruan Tinggi IPNU IPPNU UIN Raden Intan Lampung — ruang kolaborasi untuk mencetak kader intelektual berhaluan Ahlussunnah wal Jama'ah.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="#tentang" class="px-7 py-3.5 rounded-md font-semibold text-center transition-transform hover:-translate-y-0.5" style="background:var(--gold-400); color:var(--green-950);">Kenali kami</a>
                                <a href="#program" class="px-7 py-3.5 rounded-md font-medium text-white text-center border border-white/40 hover:bg-white/10 transition-colors">Lihat program</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-slide class="hero-slide">
                <img class="hero-slide__img" alt="Pelatihan kaderisasi" src="{{ asset('background/bg1.JPG') }}">
                <div class="hero-slide__scrim"></div>
                <div class="hero-slide__content flex items-end md:items-center">
                    <div class="max-w-7xl mx-auto px-5 sm:px-8 pb-28 md:pb-0 w-full">
                        <div class="max-w-2xl">
                            
                            <h1 class="font-display text-4xl md:text-6xl font-semibold text-white mb-6 leading-[1.1]">
                                Mencetak kader pemimpin yang tangguh dan berakhlak
                            </h1>
                            <p class="text-base md:text-lg text-white/80 mb-9 max-w-xl leading-relaxed">
                                Jenjang kaderisasi formal kami dirancang bertahap, dari pengenalan organisasi hingga kepemimpinan strategis di kampus dan masyarakat.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="#program" class="px-7 py-3.5 rounded-md font-semibold text-center transition-transform hover:-translate-y-0.5" style="background:var(--gold-400); color:var(--green-950);">Jenjang kaderisasi</a>
                                <a href="#berita" class="px-7 py-3.5 rounded-md font-medium text-white text-center border border-white/40 hover:bg-white/10 transition-colors">Agenda terdekat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-slide class="hero-slide">
                <img class="hero-slide__img" alt="Pengabdian masyarakat" src="{{ asset('background/bg3.JPG') }}">
                <div class="hero-slide__scrim"></div>
                <div class="hero-slide__content flex items-end md:items-center">
                    <div class="max-w-7xl mx-auto px-5 sm:px-8 pb-28 md:pb-0 w-full">
                        <div class="max-w-2xl">
                            
                            <h1 class="font-display text-4xl md:text-6xl font-semibold text-white mb-6 leading-[1.1]">
                                Bergerak bersama, mengabdi untuk sesama
                            </h1>
                            <p class="text-base md:text-lg text-white/80 mb-9 max-w-xl leading-relaxed">
                                Dari literasi anak-anak hingga bakti sosial, kami membawa nilai kemanfaatan langsung ke tengah masyarakat sekitar kampus.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="#testimoni" class="px-7 py-3.5 rounded-md font-semibold text-center transition-transform hover:-translate-y-0.5" style="background:var(--gold-400); color:var(--green-950);">Cerita alumni</a>
                                <a href="#berita" class="px-7 py-3.5 rounded-md font-medium text-white text-center border border-white/40 hover:bg-white/10 transition-colors">Lihat kegiatan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel controls -->
            <div class="absolute z-20 left-0 right-0 bottom-8 md:bottom-10">
                <div class="max-w-7xl mx-auto px-5 sm:px-8 flex items-center justify-between md:justify-start gap-6">
                    <div class="flex items-center gap-3">
                        <button data-prev class="carousel-arrow" aria-label="Slide sebelumnya">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button data-next class="carousel-arrow" aria-label="Slide berikutnya">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                    <div data-dots class="flex items-center gap-2"></div>
                </div>
            </div>
        </section>

        <!-- ============ BIDANG GARAPAN (icon strip) ============ -->
        <section class="bg-white border-b border-black/5">
            <div class="max-w-7xl mx-auto px-5 sm:px-8">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 divide-y divide-x-0 sm:divide-y-0 sm:divide-x divide-black/5">
                    <div class="flex items-center gap-3 py-6 sm:px-6 sm:justify-center lg:justify-start">
                        <span class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <span class="text-sm font-medium text-[var(--ink-900)]">Kaderisasi</span>
                    </div>
                    <div class="flex items-center gap-3 py-6 sm:px-6 sm:justify-center lg:justify-start">
                        <span class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </span>
                        <span class="text-sm font-medium text-[var(--ink-900)]">Kajian &amp; Intelektual</span>
                    </div>
                    <div class="flex items-center gap-3 py-6 sm:px-6 sm:justify-center lg:justify-start">
                        <span class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 21a9 9 0 100-18 9 9 0 000 18zm0 0c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m9 9H3"/></svg>
                        </span>
                        <span class="text-sm font-medium text-[var(--ink-900)]">Media &amp; Publikasi</span>
                    </div>
                    <div class="flex items-center gap-3 py-6 sm:px-6 sm:justify-center lg:justify-start">
                        <span class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 4.5C7 4.5 2.7 7.9 1 12c1.7 4.1 6 7.5 11 7.5s9.3-3.4 11-7.5c-1.7-4.1-6-7.5-11-7.5z M12 15a3 3 0 100-6 3 3 0 000 6z"/></svg>
                        </span>
                        <span class="text-sm font-medium text-[var(--ink-900)]">Pengabdian Sosial</span>
                    </div>
                    <div class="flex items-center gap-3 py-6 sm:px-6 sm:justify-center lg:justify-start">
                        <span class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <span class="text-sm font-medium text-[var(--ink-900)]">Keagamaan</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ TENTANG (WHO WE ARE) ============ -->
        <section id="tentang" class="py-24 md:py-28 bg-[var(--cream)]">
            <div class="max-w-7xl mx-auto px-5 sm:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="order-2 lg:order-1">
                        <div class="flex items-center gap-2.5 mb-5">
                            <span class="w-2 h-2 rounded-full" style="background:var(--gold-500);"></span>
                            <span class="text-sm font-medium" style="color:var(--green-700);">Tentang kami</span>
                        </div>
                        <h2 class="font-display text-3xl md:text-[2.6rem] font-semibold text-[var(--ink-900)] mb-6 leading-[1.15]">
                            Dedikasi untuk pelajar, kontribusi untuk bangsa
                        </h2>
                        <p class="text-[var(--ink-600)] mb-5 leading-relaxed">
PKPT IPNU-IPPNU UIN Raden Intan Lampung merupakan wadah bagi mahasiswa yang berhaluan Ahlussunnah wal Jamaah An-Nahdliyah untuk mengembangkan potensi kader sekaligus menjaga dan mengembangkan amaliyah serta tradisi keagamaan Nahdlatul Ulama di lingkungan perguruan tinggi.
                        </p>
                        <p class="text-[var(--ink-600)] mb-10 leading-relaxed">
                            Melalui pendekatan yang inklusif dan progresif, kami hadir sebagai mitra strategis dalam mengembangkan minat, bakat, dan kepemimpinan mahasiswa — dengan tetap berpegang teguh pada tradisi Ahlussunnah wal Jama'ah.
                        </p>
                        <div class="grid grid-cols-2 gap-8">
                            <div class="border-l-2 pl-4" style="border-color:var(--gold-500);">
                                <h4 class="font-display text-3xl font-semibold mb-1" style="color:var(--green-800);">60+</h4>
                                <p class="text-sm text-[var(--ink-600)]">Kader aktif</p>
                            </div>
                            <div class="border-l-2 pl-4" style="border-color:var(--gold-500);">
                                <h4 class="font-display text-3xl font-semibold mb-1" style="color:var(--green-800);">20+</h4>
                                <p class="text-sm text-[var(--ink-600)]">Program kerja</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative order-1 lg:order-2">
                        <div class="relative offset-frame">
                            <img src="{{ asset('background/bg2.JPG') }}" alt="Kegiatan mahasiswa PKPT" class="relative z-[1] rounded-xl shadow-lg w-full object-cover h-[420px] md:h-[500px]">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ PROGRAM UNGGULAN ============ -->
        <section id="program" class="py-24 md:py-28 bg-white">
            <div class="max-w-7xl mx-auto px-5 sm:px-8">
                <div class="max-w-2xl mb-16">
                    <div class="flex items-center gap-2.5 mb-5">
                        <span class="w-2 h-2 rounded-full" style="background:var(--gold-500);"></span>
                        <span class="text-sm font-medium" style="color:var(--green-700);">Program &amp; layanan</span>
                    </div>
                    <h2 class="font-display text-3xl md:text-[2.4rem] font-semibold text-[var(--ink-900)] mb-4 leading-tight">Ruang tumbuh bersama</h2>
                    <p class="text-[var(--ink-600)] leading-relaxed">Tiga program utama yang kami rancang untuk memfasilitasi pengembangan kader secara menyeluruh — intelektual, organisatoris, dan sosial.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-8 rounded-xl border border-black/[.06] hover:border-[var(--gold-500)]/60 transition-colors">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-6" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <h3 class="font-display text-xl font-semibold text-[var(--ink-900)] mb-3">Kajian intelektual</h3>
                        <p class="text-[var(--ink-600)] text-sm leading-relaxed">Diskusi rutin, bedah buku, dan seminar untuk mengasah nalar kritis serta wawasan akademik maupun keislaman.</p>
                    </div>
                    <div class="p-8 rounded-xl border border-black/[.06] hover:border-[var(--gold-500)]/60 transition-colors">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-6" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h3 class="font-display text-xl font-semibold text-[var(--ink-900)] mb-3">Kaderisasi formal</h3>
                        <p class="text-[var(--ink-600)] text-sm leading-relaxed">Pelatihan kepemimpinan berjenjang — Makesta, Lakmud, hingga Lakut — untuk mencetak organisatoris yang tangguh.</p>
                    </div>
                    <div class="p-8 rounded-xl border border-black/[.06] hover:border-[var(--gold-500)]/60 transition-colors">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-6" style="background:var(--green-50); color:var(--green-700);">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 4.5C7 4.5 2.7 7.9 1 12c1.7 4.1 6 7.5 11 7.5s9.3-3.4 11-7.5c-1.7-4.1-6-7.5-11-7.5zM12 15a3 3 0 100-6 3 3 0 000 6z"/></svg>
                        </div>
                        <h3 class="font-display text-xl font-semibold text-[var(--ink-900)] mb-3">Pengabdian masyarakat</h3>
                        <p class="text-[var(--ink-600)] text-sm leading-relaxed">Implementasi nilai kemanfaatan melalui program sosial, pendampingan masyarakat, dan literasi.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ BERITA & EVENT (scroll carousel) ============ -->
        <section id="berita" class="py-24 md:py-28 bg-[var(--green-50)]">
            <div class="max-w-7xl mx-auto px-5 sm:px-8">
                <div class="flex flex-wrap items-end justify-between gap-6 mb-12">
                    <div class="max-w-xl">
                        <div class="flex items-center gap-2.5 mb-5">
                            <span class="w-2 h-2 rounded-full" style="background:var(--gold-500);"></span>
                            <span class="text-sm font-medium" style="color:var(--green-700);">Jurnal terkini</span>
                        </div>
                        <h2 class="font-display text-3xl md:text-[2.4rem] font-semibold text-[var(--ink-900)]">Berita &amp; event</h2>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <button data-prev class="carousel-arrow carousel-arrow--dark" aria-label="Berita sebelumnya">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button data-next class="carousel-arrow carousel-arrow--dark" aria-label="Berita berikutnya">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                        <a href="{{ route('info.index', 'berita') }}"
                           class="text-sm font-medium inline-flex items-center gap-1 transition-colors"
                           style="color:var(--green-700);">
                            Lihat semua
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div data-scroll-carousel>
                <div data-track class="scroll-track flex gap-6 overflow-x-auto px-5 sm:px-8 max-w-7xl mx-auto pb-2">

                    @forelse($latestPosts as $post)
                        <article data-card class="scroll-card flex-shrink-0 w-[82%] sm:w-[46%] lg:w-[30%] bg-white rounded-xl overflow-hidden border border-black/[.06] flex flex-col">
                            <div class="relative h-44">
                                @if($post->image)
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center" style="background:var(--green-50);">
                                        <svg class="w-12 h-12" style="color:var(--green-100);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    </div>
                                @endif
                                @if($post->type === 'event')
                                    <span class="absolute top-4 left-4 text-xs font-semibold px-3 py-1 rounded" style="background:var(--gold-400); color:var(--green-950);">Event</span>
                                @else
                                    <span class="absolute top-4 left-4 text-xs font-semibold px-3 py-1 rounded text-white" style="background:var(--green-700);">Berita</span>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <span class="text-xs mb-3" style="color:var(--ink-600);">{{ $post->published_at->translatedFormat('d M Y') }}</span>
                                <h3 class="font-display text-lg font-semibold mb-2 leading-snug" style="color:var(--ink-900);">{{ $post->title }}</h3>
                                <p class="text-sm leading-relaxed mb-4 flex-grow" style="color:var(--ink-600);">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                <a href="{{ route('info.show', [$post->type, $post->slug]) }}"
                                   class="inline-flex items-center text-sm font-medium mt-auto"
                                   style="color:var(--green-700);">Baca selengkapnya
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="flex-shrink-0 w-full py-16 text-center" style="color:var(--ink-600);">
                            <p class="text-sm">Belum ada berita atau event yang dipublikasikan.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>



                </div>
            </div>
        </section>

        <!-- ============ DALAM KATA (testimoni carousel) ============ -->
        <section id="testimoni" class="py-24 md:py-28 relative overflow-hidden" style="background:var(--green-950);">
            <div class="absolute inset-0 opacity-[.06] pointer-events-none">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs><pattern id="grid" width="42" height="42" patternUnits="userSpaceOnUse"><path d="M42 0H0V42" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                    <rect width="100%" height="100%" fill="url(#grid)"/>
                </svg>
            </div>

            <div class="max-w-7xl mx-auto px-5 sm:px-8 relative z-10">
                <div class="flex flex-wrap items-end justify-between gap-6 mb-14">
                    <div class="max-w-xl">
                        <div class="flex items-center gap-2.5 mb-5">
                            <span class="w-2 h-2 rounded-full" style="background:var(--gold-400);"></span>
                            <span class="text-sm font-medium text-white/70">Cerita alumni</span>
                        </div>
                        <h2 class="font-display text-3xl md:text-[2.4rem] font-semibold text-white leading-tight">PKPT UIN RIL dalam kata</h2>
                        <p class="text-white/60 mt-3 leading-relaxed">Jejak langkah dan kesan bermakna dari para demisioner yang telah menorehkan sejarah bersama kami.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button data-prev class="carousel-arrow" aria-label="Testimoni sebelumnya">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button data-next class="carousel-arrow" aria-label="Testimoni berikutnya">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div data-scroll-carousel class="relative z-10">
                <div data-track class="scroll-track flex gap-6 overflow-x-auto px-5 sm:px-8 max-w-7xl mx-auto pb-2">

                    <div data-card class="scroll-card flex-shrink-0 w-[85%] sm:w-[60%] lg:w-[31%] bg-white/[.07] backdrop-blur-sm border border-white/[.12] p-8 rounded-xl">
                        <span class="quote-mark block text-5xl leading-none mb-4" style="color:var(--gold-400);">&ldquo;</span>
                        <p class="text-white/85 mb-7 italic leading-relaxed text-sm">
                            Berproses di PKPT adalah sebuah privilege. Di sini saya belajar bahwa menjadi intelektual sejati tidak cukup pintar di kelas, tapi juga peka secara sosial dan teguh dalam beragama.
                        </p>
                        <div class="flex items-center gap-4">
                            <img src="https://images.unsplash.com/placeholder-avatars/extra-large.jpg?w=32&dpr=2&crop=faces&bg=%23fff&h=32&auto=format&fit=crop&q=60&ixlib=rb-4.1.0" alt="Ahmad Fauzi" class="w-11 h-11 rounded-full object-cover">
                            <div>
                                <h4 class="text-white font-semibold text-sm">Nule</h4>
                                <p class="text-xs" style="color:var(--gold-400);">Ketua PKPT IPNU UIN Ril 2022–2023</p>
                            </div>
                        </div>
                    </div>

                    <div data-card class="scroll-card flex-shrink-0 w-[85%] sm:w-[60%] lg:w-[31%] bg-white/[.07] backdrop-blur-sm border border-white/[.12] p-8 rounded-xl">
                        <span class="quote-mark block text-5xl leading-none mb-4" style="color:var(--gold-400);">&ldquo;</span>
                        <p class="text-white/85 mb-7 italic leading-relaxed text-sm">
                            Organisasi ini memberi ruang aman untuk salah dan belajar. Kultur diskusinya hidup, menuntut kita untuk terus membaca dan mengupgrade diri setiap saat.
                        </p>
                        <div class="flex items-center gap-4">
                            <img src="https://images.unsplash.com/placeholder-avatars/extra-large.jpg?w=32&dpr=2&crop=faces&bg=%23fff&h=32&auto=format&fit=crop&q=60&ixlib=rb-4.1.0" alt="Siti Nurhaliza" class="w-11 h-11 rounded-full object-cover">
                            <div>
                                <h4 class="text-white font-semibold text-sm">Nule</h4>
                                <p class="text-xs" style="color:var(--gold-400);">Ketua PKPT IPNU UIN Ril 2023–2024</p>
                            </div>
                        </div>
                    </div>

                    <div data-card class="scroll-card flex-shrink-0 w-[85%] sm:w-[60%] lg:w-[31%] bg-white/[.07] backdrop-blur-sm border border-white/[.12] p-8 rounded-xl">
                        <span class="quote-mark block text-5xl leading-none mb-4" style="color:var(--gold-400);">&ldquo;</span>
                        <p class="text-white/85 mb-7 italic leading-relaxed text-sm">
                            Nilai kekeluargaan yang ditanamkan membuat PKPT bukan sekadar organisasi, tapi rumah kedua. Lulus dengan predikat kader IPNU adalah kebanggaan tersendiri.
                        </p>
                        <div class="flex items-center gap-4">
                            <img src="https://images.unsplash.com/placeholder-avatars/extra-large.jpg?w=32&dpr=2&crop=faces&bg=%23fff&h=32&auto=format&fit=crop&q=60&ixlib=rb-4.1.0" alt="Budi Santoso" class="w-11 h-11 rounded-full object-cover">
                            <div>
                                <h4 class="text-white font-semibold text-sm">Daniel Irvansyah</h4>
                                <p class="text-xs" style="color:var(--gold-400);">Ketua PKPT IPNU UIN Ril 2024–2025</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div data-dots class="flex items-center justify-center gap-2 mt-8"></div>
            </div>
        </section>

        <!-- ============ CTA BANNER ============ -->
        <section class="py-16" style="background:var(--green-900);">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <h3 class="font-display text-2xl md:text-3xl font-semibold text-white leading-snug max-w-xl">
                    Ingin bergabung atau berkolaborasi dengan kami?
                </h3>
                <a href="mailto:pkptuinril@gmail.com" class="px-7 py-3.5 rounded-md font-semibold whitespace-nowrap transition-transform hover:-translate-y-0.5" style="background:var(--gold-400); color:var(--green-950);">Hubungi kami</a>
            </div>
        </section>
    </main>

    <!-- ============ FOOTER ============ -->
    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- Fade carousel (hero) ---
            function initFadeCarousel(root, interval = 6000) {
                const slides = Array.from(root.querySelectorAll('[data-slide]'));
                const dotsWrap = root.querySelector('[data-dots]');
                const prevBtn = root.querySelector('[data-prev]');
                const nextBtn = root.querySelector('[data-next]');
                let index = 0, timer;

                slides.forEach((_, i) => {
                    const dot = document.createElement('button');
                    dot.className = 'carousel-dot';
                    dot.setAttribute('aria-label', `Ke slide ${i + 1}`);
                    dot.addEventListener('click', () => go(i, true));
                    dotsWrap.appendChild(dot);
                });
                const dots = Array.from(dotsWrap.children);

                function render() {
                    slides.forEach((s, i) => s.classList.toggle('is-active', i === index));
                    dots.forEach((d, i) => d.classList.toggle('is-active', i === index));
                }
                function go(i, manual) { index = (i + slides.length) % slides.length; render(); if (manual) restart(); }
                function next() { go(index + 1); }
                function prev(manual) { go(index - 1, manual); }
                function restart() { clearInterval(timer); timer = setInterval(next, interval); }

                prevBtn.addEventListener('click', () => prev(true));
                nextBtn.addEventListener('click', () => go(index + 1, true));
                root.addEventListener('mouseenter', () => clearInterval(timer));
                root.addEventListener('mouseleave', restart);

                render();
                restart();
            }

            // --- Scroll carousel (berita, testimoni) ---
            function initScrollCarousel(root) {
                const wrap = root.closest('section');
                const track = root.querySelector('[data-track]');
                const prevBtn = wrap.querySelector('[data-prev]');
                const nextBtn = wrap.querySelector('[data-next]');
                const dotsWrap = root.querySelector('[data-dots]');
                const cards = Array.from(track.querySelectorAll('[data-card]'));

                if (dotsWrap) {
                    cards.forEach((_, i) => {
                        const dot = document.createElement('button');
                        dot.className = 'carousel-dot carousel-dot--dark';
                        dot.setAttribute('aria-label', `Ke kartu ${i + 1}`);
                        dot.addEventListener('click', () => cards[i].scrollIntoView({ behavior: 'smooth', inline: 'start', block: 'nearest' }));
                        dotsWrap.appendChild(dot);
                    });
                }
                const dots = dotsWrap ? Array.from(dotsWrap.children) : [];

                function scrollDir(dir) {
                    const card = cards[0];
                    if (!card) return;
                    const gap = parseFloat(getComputedStyle(track).columnGap || 24);
                    track.scrollBy({ left: dir * (card.getBoundingClientRect().width + gap), behavior: 'smooth' });
                }
                if (prevBtn) prevBtn.addEventListener('click', () => scrollDir(-1));
                if (nextBtn) nextBtn.addEventListener('click', () => scrollDir(1));

                if (dots.length) {
                    const io = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const i = cards.indexOf(entry.target);
                                dots.forEach((d, di) => d.classList.toggle('is-active', di === i));
                            }
                        });
                    }, { root: track, threshold: 0.6 });
                    cards.forEach(c => io.observe(c));
                }
            }

            document.querySelectorAll('[data-fade-carousel]').forEach(el => initFadeCarousel(el));
            document.querySelectorAll('[data-scroll-carousel]').forEach(el => initScrollCarousel(el));
        });
    </script>

    <!-- ============ CONTACT WIDGET ============ -->
    <x-contact-widget />

</body>
</html>