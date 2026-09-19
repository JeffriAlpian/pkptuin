<style>
    .site-nav {
        background: transparent;
        transition: background-color .4s ease, box-shadow .4s ease, backdrop-filter .4s ease, border-color .4s ease;
        border-bottom: 1px solid transparent;
    }
    .site-nav .nav-link  { color: rgba(255,255,255,.92); }
    .site-nav .nav-link:hover { color: #E4BC4E; }
    .site-nav .brand-text { color: #fff; }
    .site-nav .menu-icon  { color: #fff; }

    .site-nav.nav-solid {
        background: rgba(251,248,241,.92);
        backdrop-filter: blur(10px);
        box-shadow: 0 1px 0 rgba(15,42,31,.06);
        border-bottom: 1px solid rgba(15,42,31,.06);
    }
    .site-nav.nav-solid .nav-link  { color: #4B564C; }
    .site-nav.nav-solid .nav-link:hover { color: #256B45; }
    .site-nav.nav-solid .brand-text { color: #153B29; }
    .site-nav.nav-solid .menu-icon  { color: #1C231D; }

    /* Dropdown */
    .nav-dropdown {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-6px);
        transition: opacity .25s ease, transform .25s ease, visibility .25s;
    }
    .nav-dropdown-parent:hover .nav-dropdown,
    .nav-dropdown-parent:focus-within .nav-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
</style>

<nav id="site-nav" class="site-nav fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="flex justify-between h-20 items-center">

            {{-- Brand --}}
            <a href="/" class="flex items-center gap-3">
                <img src="/images/logo.png" class="w-10 h-10 object-contain flex-shrink-0" alt="Logo PKPT">
                <span class="brand-text font-semibold text-lg tracking-tight transition-colors duration-300"
                      style="font-family:'Fraunces',serif;">PKPT UIN RIL</span>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-7">

                {{-- Profil Dropdown --}}
                <div class="nav-dropdown-parent relative">
                    <button class="nav-link flex items-center gap-1 text-sm font-medium transition-colors duration-300 py-8">
                        Profil
                        <svg class="w-3.5 h-3.5 mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown absolute left-0 top-full w-52 rounded-lg border py-1.5 z-50"
                         style="background:#FBF8F1; border-color:rgba(15,42,31,.08); box-shadow:0 8px 24px rgba(15,42,31,.12);">
                        <div class="px-4 py-1.5 text-xs font-semibold uppercase tracking-widest" style="color:#D3A431;">Tentang PKPT</div>
                        <a href="{{ route('profil.visi-misi') }}"   class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Visi &amp; Misi</a>
                        <a href="{{ route('profil.sambutan') }}"    class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Sambutan</a>
                        <div class="my-1 border-t" style="border-color:rgba(15,42,31,.06);"></div>
                        <a href="{{ route('profil.sejarah') }}"     class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Sejarah</a>
                        <a href="{{ route('profil.struktur') }}"    class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Struktur Pengurus</a>
                    </div>
                </div>

                {{-- Info Dropdown --}}
                <div class="nav-dropdown-parent relative">
                    <button class="nav-link flex items-center gap-1 text-sm font-medium transition-colors duration-300 py-8">
                        Info
                        <svg class="w-3.5 h-3.5 mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown absolute left-0 top-full w-44 rounded-lg border py-1.5 z-50"
                         style="background:#FBF8F1; border-color:rgba(15,42,31,.08); box-shadow:0 8px 24px rgba(15,42,31,.12);">
                        <a href="{{ route('info.index', 'berita') }}" class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Berita</a>
                        <a href="{{ route('info.index', 'event') }}"  class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Event</a>
                        <a href="{{ route('info.index', 'opini') }}"  class="block px-4 py-2 text-sm transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45';this.style.background='rgba(37,107,69,.06)'" onmouseout="this.style.color='#4B564C';this.style.background=''">Opini</a>
                    </div>
                </div>

                <a href="{{ route('galeri.index') }}"  class="nav-link text-sm font-medium transition-colors duration-300">Galeri</a>
                <a href="{{ route('dokumen.index') }}" class="nav-link text-sm font-medium transition-colors duration-300">Dokumen</a>
                <a href="#"                            class="nav-link text-sm font-medium transition-colors duration-300">Kontak</a>

                {{-- Auth Button --}}
                <div class="pl-5 border-l" style="border-color:rgba(255,255,255,.2);" id="nav-auth-divider">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="px-5 py-2.5 rounded-md text-sm font-semibold transition-transform hover:-translate-y-0.5"
                               style="background:#E4BC4E; color:#0F2A1F;">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="px-5 py-2.5 rounded-md text-sm font-semibold transition-transform hover:-translate-y-0.5"
                               style="background:#E4BC4E; color:#0F2A1F;">Masuk</a>
                        @endauth
                    @endif
                </div>
            </div>

            {{-- Mobile Hamburger --}}
            <button id="mobile-menu-btn" class="md:hidden menu-icon transition-colors duration-300" aria-label="Buka menu" aria-expanded="false">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t px-5 py-4 space-y-1 absolute w-full"
         style="background:#FBF8F1; border-color:rgba(15,42,31,.06); box-shadow:0 8px 24px rgba(15,42,31,.1);">

        {{-- Profil --}}
        <div class="py-1">
            <div class="text-xs font-semibold uppercase tracking-widest px-2 mb-1" style="color:#D3A431;">Profil</div>
            <a href="{{ route('profil.visi-misi') }}"  class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Visi &amp; Misi</a>
            <a href="{{ route('profil.sambutan') }}"   class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Sambutan</a>
            <a href="{{ route('profil.sejarah') }}"    class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Sejarah</a>
            <a href="{{ route('profil.struktur') }}"   class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Struktur Pengurus</a>
        </div>

        <div class="border-t my-1" style="border-color:rgba(15,42,31,.06);"></div>

        {{-- Info --}}
        <div class="py-1">
            <div class="text-xs font-semibold uppercase tracking-widest px-2 mb-1" style="color:#D3A431;">Info</div>
            <a href="{{ route('info.index', 'berita') }}" class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Berita</a>
            <a href="{{ route('info.index', 'event') }}"  class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Event</a>
            <a href="{{ route('info.index', 'opini') }}"  class="block px-2 py-2 text-sm rounded-md transition-colors" style="color:#4B564C;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#4B564C'">Opini</a>
        </div>

        <div class="border-t my-1" style="border-color:rgba(15,42,31,.06);"></div>

        {{-- Standalone links --}}
        <div class="py-1">
            <a href="{{ route('galeri.index') }}"  class="block px-2 py-2.5 text-sm font-medium rounded-md transition-colors" style="color:#1C231D;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#1C231D'">Galeri</a>
            <a href="{{ route('dokumen.index') }}" class="block px-2 py-2.5 text-sm font-medium rounded-md transition-colors" style="color:#1C231D;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#1C231D'">Dokumen</a>
            <a href="#"                            class="block px-2 py-2.5 text-sm font-medium rounded-md transition-colors" style="color:#1C231D;" onmouseover="this.style.color='#256B45'" onmouseout="this.style.color='#1C231D'">Kontak</a>
        </div>

        {{-- Auth --}}
        @if (Route::has('login'))
            <div class="pt-3 border-t" style="border-color:rgba(15,42,31,.06);">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="block w-full text-center px-5 py-2.5 rounded-md text-sm font-semibold"
                       style="background:#E4BC4E; color:#0F2A1F;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="block w-full text-center px-5 py-2.5 rounded-md text-sm font-semibold"
                       style="background:#E4BC4E; color:#0F2A1F;">Masuk</a>
                @endauth
            </div>
        @endif
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ---- Navbar solid on scroll ----
        const nav = document.getElementById('site-nav');
        const divider = document.getElementById('nav-auth-divider');

        function toggleNav() {
            const scrolled = window.scrollY > 60;
            nav.classList.toggle('nav-solid', scrolled);
            // Divider border adapts too
            if (divider) {
                divider.style.borderColor = scrolled
                    ? 'rgba(15,42,31,.12)'
                    : 'rgba(255,255,255,.2)';
            }
        }
        toggleNav();
        window.addEventListener('scroll', toggleNav, { passive: true });

        // ---- Mobile menu toggle ----
        const btn  = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', function () {
            const open = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            btn.setAttribute('aria-expanded', String(!open));
        });

        // Close on link click
        menu.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            });
        });
    });
</script>
