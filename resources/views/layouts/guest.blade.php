<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Otentikasi</title>
        <link rel="icon" type="image/png" href="/images/logo.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
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
            body {
                font-family: 'Poppins', sans-serif;
                background-color: var(--cream);
                color: var(--ink-900);
            }
            .font-display { font-family: 'Fraunces', serif; }
        </style>
    </head>
    <body class="antialiased selection:bg-[var(--gold-400)] selection:text-[var(--green-950)]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            
            <!-- Background pattern -->
            <div class="absolute inset-0 pointer-events-none opacity-[0.03]">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M40 0H0V40" fill="none" stroke="black" stroke-width="1"/></pattern></defs>
                    <rect width="100%" height="100%" fill="url(#grid)"/>
                </svg>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-8 py-10 bg-white border border-black/5 shadow-xl sm:rounded-2xl">
                <!-- Header / Logo area -->
                <div class="flex flex-col items-center mb-8">
                    <a href="/" class="flex flex-col items-center gap-3 group">
                        <img src="/images/logo.png" class="w-16 h-16 object-contain transition-transform group-hover:scale-105" alt="Logo PKPT">
                        <span class="font-display font-semibold text-lg" style="color:var(--green-950);">PKPT UIN RIL</span>
                    </a>
                </div>

                {{ $slot }}
                
            </div>
            
            <div class="mt-8 relative z-10 text-sm" style="color:var(--ink-600);">
                &copy; {{ date('Y') }} PKPT IPNU IPPNU UIN Raden Intan Lampung
            </div>
        </div>
    </body>
</html>
