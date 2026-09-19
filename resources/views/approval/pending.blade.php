<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menunggu Persetujuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-xl font-bold mb-2">Akun Anda sedang ditinjau</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Terima kasih telah mendaftar. Saat ini akun Anda berstatus <strong>Pending</strong> dan membutuhkan persetujuan dari Admin sebelum dapat mengakses dashboard Anggota.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
