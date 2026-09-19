<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-display font-semibold" style="color:var(--ink-900);">Surat Masuk</h2>
            <p class="text-sm" style="color:var(--ink-600);">Kelola pesan dan surat masuk dari pengunjung web.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl border border-black/5 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-gray-50/50 border-b border-black/5" style="color:var(--ink-600);">
                    <tr>
                        <th class="px-6 py-4 font-medium">Asal Instansi</th>
                        <th class="px-6 py-4 font-medium">Perihal</th>
                        <th class="px-6 py-4 font-medium">Waktu Masuk</th>
                        <th class="px-6 py-4 font-medium">File Surat</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50/50 transition-colors {{ $contact->status === 'unread' ? 'bg-yellow-50/30 font-medium' : '' }}">
                        <td class="px-6 py-4" style="color:var(--ink-900);">
                            {{ $contact->asal_instansi }}
                        </td>
                        <td class="px-6 py-4 text-wrap max-w-[200px]" style="color:var(--ink-900);">
                            {{ $contact->perihal }}
                        </td>
                        <td class="px-6 py-4" style="color:var(--ink-600);">
                            {{ $contact->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($contact->file_surat)
                                <a href="{{ $contact->file_surat }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Unduh PDF
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($contact->status === 'unread')
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium border border-yellow-200">Baru</span>
                            @elseif($contact->status === 'read')
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium border border-gray-200">Dibaca</span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium border border-green-200">Dibalas</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            @if($contact->status === 'unread')
                                <form action="{{ route('admin.contacts.read', $contact) }}" method="POST" class="inline">
                                    @csrf @method('PATCH')
                                    <button class="text-[var(--green-700)] hover:underline text-xs" title="Tandai Dibaca">Dibaca</button>
                                </form>
                            @endif
                            @if($contact->status !== 'replied')
                                <form action="{{ route('admin.contacts.replied', $contact) }}" method="POST" class="inline">
                                    @csrf @method('PATCH')
                                    <button class="text-blue-600 hover:underline text-xs" title="Tandai Dibalas">Dibalas</button>
                                </form>
                            @endif
                            
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Hapus surat ini permanen?');">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada surat yang masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
            <div class="px-6 py-4 border-t border-black/5">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
