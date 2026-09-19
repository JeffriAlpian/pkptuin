<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - PKPT UIN RIL</title>
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
        body{
            font-family:'Poppins', sans-serif;
            background:var(--cream);
            color:var(--ink-900);
        }
        .font-display{ font-family:'Fraunces', serif; }
        
        /* Sidebar active link styling */
        .sidebar-link {
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.08);
            color: var(--gold-400);
        }
        .sidebar-link.active {
            background: rgba(228, 188, 78, 0.15); /* Gold with opacity */
            color: var(--gold-400);
            border-right: 3px solid var(--gold-400);
        }
    </style>
</head>
<body class="antialiased flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 flex-shrink-0 hidden md:flex flex-col" style="background:var(--green-950);">
        <!-- Logo -->
        <div class="h-20 flex items-center px-6 border-b" style="border-color:rgba(255,255,255,.06);">
            <a href="/" class="flex items-center gap-3">
                <img src="/images/logo.png" class="w-9 h-9 object-contain" alt="Logo PKPT">
                <span class="font-display font-semibold text-white tracking-tight">PKPT UIN RIL</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">
            @if(Auth::user()->isAdmin())
                <div class="px-3 mb-2 text-xs font-semibold uppercase tracking-widest text-white/40">Dashboard Admin</div>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Overview
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Kelola Anggota
                </a>

                <a href="{{ route('admin.kaderisasi.index') }}" class="sidebar-link {{ request()->routeIs('admin.kaderisasi.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    Kaderisasi
                </a>

                <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Surat Masuk
                </a>
                
                <a href="{{ route('admin.posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.posts.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    Berita &amp; Event
                </a>

                <a href="{{ route('admin.galleries.index') }}" class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Galeri
                </a>

                <a href="{{ route('admin.documents.index') }}" class="sidebar-link {{ request()->routeIs('admin.documents.*') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Dokumen
                </a>
            @else
                <div class="px-3 mb-2 text-xs font-semibold uppercase tracking-widest text-white/40">Menu Anggota</div>
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : 'text-white/70' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profil Saya
                </a>
            @endif
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-black/5 flex items-center justify-between px-5 sm:px-8 flex-shrink-0">
            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-[var(--ink-600)] hover:text-[var(--green-700)]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Page Title -->
            <div class="hidden md:block">
                @isset($header)
                    <h2 class="font-display font-semibold text-xl text-[var(--ink-900)]">
                        {{ $header }}
                    </h2>
                @endisset
            </div>

            <!-- Right Profile -->
            <div class="flex items-center gap-4 ml-auto">
                <div class="text-right hidden sm:block">
                    <div class="text-sm font-semibold text-[var(--ink-900)]">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-[var(--ink-600)] capitalize">{{ Auth::user()->role }}</div>
                </div>
                <!-- Dropdown Form -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-10 h-10 rounded-full flex items-center justify-center border border-black/10 hover:border-[var(--gold-400)] transition-colors" title="Keluar">
                        <svg class="w-4 h-4 text-[var(--ink-600)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Slot -->
        <main class="flex-1 overflow-y-auto p-5 sm:p-8 bg-[var(--cream)]">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
