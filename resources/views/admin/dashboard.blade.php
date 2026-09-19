<x-app-layout>
    <x-slot name="header">
        Overview Dashboard
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Stats Cards -->
            <div class="bg-white rounded-xl p-6 border border-black/5 shadow-sm">
                <div class="text-sm font-medium mb-1" style="color:var(--ink-600);">Total Pengguna</div>
                <div class="font-display text-3xl font-bold" style="color:var(--ink-900);">{{ $stats['total_users'] }}</div>
            </div>
            
            <div class="bg-white rounded-xl p-6 border border-black/5 shadow-sm" style="border-left: 4px solid var(--gold-400);">
                <div class="text-sm font-medium mb-1" style="color:var(--ink-600);">Menunggu Persetujuan</div>
                <div class="font-display text-3xl font-bold" style="color:var(--ink-900);">{{ $stats['pending_users'] }}</div>
            </div>

            <div class="bg-white rounded-xl p-6 border border-black/5 shadow-sm">
                <div class="text-sm font-medium mb-1" style="color:var(--ink-600);">Total Berita</div>
                <div class="font-display text-3xl font-bold" style="color:var(--ink-900);">{{ $stats['total_berita'] }}</div>
            </div>

            <div class="bg-white rounded-xl p-6 border border-black/5 shadow-sm">
                <div class="text-sm font-medium mb-1" style="color:var(--ink-600);">Total Event</div>
                <div class="font-display text-3xl font-bold" style="color:var(--ink-900);">{{ $stats['total_event'] }}</div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-xl border border-black/5 shadow-sm">
            <div class="p-6">
                <h3 class="font-display text-lg font-bold mb-4" style="color:var(--ink-900);">Kelola Data</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.users.index') }}" class="block p-5 border border-black/5 rounded-xl hover:bg-[var(--green-50)] transition-colors group">
                        <div class="font-semibold text-[var(--green-700)] flex items-center gap-2">
                            <svg class="w-5 h-5 text-[var(--gold-500)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Kelola Anggota
                        </div>
                        <p class="text-sm mt-2 text-[var(--ink-600)]">Approve/Reject pendaftar baru.</p>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="block p-5 border border-black/5 rounded-xl hover:bg-[var(--green-50)] transition-colors group">
                        <div class="font-semibold text-[var(--green-700)] flex items-center gap-2">
                            <svg class="w-5 h-5 text-[var(--gold-500)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            Kelola Berita &amp; Event
                        </div>
                        <p class="text-sm mt-2 text-[var(--ink-600)]">Tambah, edit, hapus publikasi.</p>
                    </a>
                    <a href="{{ route('admin.galleries.index') }}" class="block p-5 border border-black/5 rounded-xl hover:bg-[var(--green-50)] transition-colors group">
                        <div class="font-semibold text-[var(--green-700)] flex items-center gap-2">
                            <svg class="w-5 h-5 text-[var(--gold-500)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Kelola Galeri
                        </div>
                        <p class="text-sm mt-2 text-[var(--ink-600)]">Upload dokumentasi kegiatan.</p>
                    </a>
                    <a href="{{ route('admin.documents.index') }}" class="block p-5 border border-black/5 rounded-xl hover:bg-[var(--green-50)] transition-colors group">
                        <div class="font-semibold text-[var(--green-700)] flex items-center gap-2">
                            <svg class="w-5 h-5 text-[var(--gold-500)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Kelola Dokumen
                        </div>
                        <p class="text-sm mt-2 text-[var(--ink-600)]">Upload file unduhan publik.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
