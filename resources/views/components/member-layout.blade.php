<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Anggota' }} — PKPT UIN RIL</title>
    <link rel="icon" type="image/png" href="/images/logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        :root{
            --green-950:#0F2A1F; --green-900:#153B29; --green-800:#1D5236;
            --green-700:#256B45; --green-600:#317F52; --green-100:#E7EFE6; --green-50:#F2F6EF;
            --gold-600:#B98A22; --gold-500:#D3A431; --gold-400:#E4BC4E; --gold-100:#F7ECC9;
            --cream:#FBF8F1; --ink-900:#1C231D; --ink-600:#4B564C;
        }
        body { font-family:'Poppins',sans-serif; background:var(--cream); color:var(--ink-900); }
        .font-display { font-family:'Fraunces',serif; }
        .sidebar-link { transition:all .2s ease; }
        .sidebar-link:hover { background:rgba(255,255,255,.08); color:var(--gold-400); }
        .sidebar-link.active { background:rgba(228,188,78,.15); color:var(--gold-400); border-right:3px solid var(--gold-400); }
        /* Bottom bar active */
        .bottom-link { transition:all .2s ease; }
        .bottom-link.active svg { color: var(--gold-500); }
        .bottom-link.active span { color: var(--gold-500); }
    </style>
</head>
<body class="antialiased">

    <div class="flex h-screen overflow-hidden">
        <!-- ====== SIDEBAR (Desktop) ====== -->
        <aside class="w-64 flex-shrink-0 hidden md:flex flex-col" style="background:var(--green-950);">
            <div class="h-20 flex items-center px-6 border-b" style="border-color:rgba(255,255,255,.06);">
                <a href="/" class="flex items-center gap-3">
                    <img src="/images/logo.png" class="w-9 h-9 object-contain" alt="Logo PKPT">
                    <span class="font-display font-semibold text-white tracking-tight">PKPT UIN RIL</span>
                </a>
            </div>

            <div class="px-6 py-4 border-b" style="border-color:rgba(255,255,255,.06);">
                <div class="flex items-center gap-3">
                    @php $profile = auth()->user()->memberProfile; @endphp
                    @if($profile && $profile->foto)
                        <img src="{{ $profile->foto }}" class="w-10 h-10 rounded-full object-cover" alt="Foto">
                    @else
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm" style="background:var(--gold-400);color:var(--green-950);">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <p class="text-white text-sm font-medium truncate max-w-[140px]">{{ auth()->user()->name }}</p>
                        <p class="text-xs mt-0.5" style="color:rgba(255,255,255,.5);">{{ optional($profile)->nia ?? 'NIA belum ada' }}</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 py-4 px-3 space-y-1 overflow-y-auto">
                <div class="px-3 mb-2 text-xs font-semibold uppercase tracking-widest" style="color:rgba(255,255,255,.35);">Menu Utama</div>

                <a href="{{ route('member.dashboard') }}" class="sidebar-link {{ request()->routeIs('member.dashboard') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard & E-KTA
                </a>

                <a href="{{ route('member.kaderisasi.index') }}" class="sidebar-link {{ request()->routeIs('member.kaderisasi.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    Rekam Kaderisasi
                </a>

                <a href="{{ route('member.profile.edit') }}" class="sidebar-link {{ request()->routeIs('member.profile.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Edit Profil
                </a>

                <div class="px-3 mt-4 mb-2 text-xs font-semibold uppercase tracking-widest" style="color:rgba(255,255,255,.35);">Segera Hadir</div>
                <span class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-white/30 cursor-not-allowed">
                    <svg class="w-5 h-5 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Kegiatan & Kalender
                </span>
                <span class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-white/30 cursor-not-allowed">
                    <svg class="w-5 h-5 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Layanan Administrasi
                </span>
                <span class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-white/30 cursor-not-allowed">
                    <svg class="w-5 h-5 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Iuran & Keuangan
                </span>
            </nav>

            <div class="px-4 py-4 border-t" style="border-color:rgba(255,255,255,.06);">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm text-white/60 hover:text-white hover:bg-white/10 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- ====== MAIN AREA ====== -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="h-16 bg-white border-b border-black/5 flex items-center justify-between px-5 sm:px-8 flex-shrink-0">
                <div class="font-display font-semibold text-lg" style="color:var(--ink-900);">
                    {{ $title ?? 'Dashboard Anggota' }}
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" class="text-sm text-[var(--ink-600)] hover:text-[var(--green-700)] transition-colors">← Beranda</a>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-5 sm:p-8 pb-24 md:pb-8" style="background:var(--cream);">
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg text-sm">
                        {{ session('info') }}
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- ====== BOTTOM BAR (Mobile) ====== -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-black/5 z-50 flex">
        <a href="{{ route('member.dashboard') }}" class="bottom-link {{ request()->routeIs('member.dashboard') ? 'active' : '' }} flex-1 flex flex-col items-center py-3 gap-1">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-xs text-gray-500">E-KTA</span>
        </a>
        <a href="{{ route('member.kaderisasi.index') }}" class="bottom-link {{ request()->routeIs('member.kaderisasi.*') ? 'active' : '' }} flex-1 flex flex-col items-center py-3 gap-1">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
            <span class="text-xs text-gray-500">Kaderisasi</span>
        </a>
        <a href="{{ route('member.profile.edit') }}" class="bottom-link {{ request()->routeIs('member.profile.*') ? 'active' : '' }} flex-1 flex flex-col items-center py-3 gap-1">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            <span class="text-xs text-gray-500">Profil</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="flex-1">
            @csrf
            <button type="submit" class="bottom-link w-full flex flex-col items-center py-3 gap-1">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span class="text-xs text-gray-500">Keluar</span>
            </button>
        </form>
    </nav>

</body>
</html>
