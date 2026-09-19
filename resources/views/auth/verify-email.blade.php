<x-guest-layout>
    <div class="mb-5 text-sm text-[var(--ink-600)] leading-relaxed">
        {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan ke email Anda. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkannya kembali.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 p-3 rounded-lg bg-green-50 border border-green-200 font-medium text-sm text-green-700 flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ __('Tautan verifikasi baru telah berhasil dikirimkan ke alamat email yang Anda daftarkan.') }}</span>
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf

            <div>
                <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2.5 bg-[var(--green-700)] hover:bg-[var(--green-800)] border border-transparent rounded-lg font-medium text-xs text-white uppercase tracking-wider transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--green-700)] focus:ring-offset-2">
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto text-center sm:text-right">
            @csrf

            <button type="submit" class="text-sm text-[var(--ink-600)] hover:text-[var(--green-700)] transition-colors underline focus:outline-none">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
