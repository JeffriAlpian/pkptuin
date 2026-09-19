<x-app-layout>
    <x-slot name="header">
        Kelola Berita &amp; Event
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <h3 class="text-lg font-bold" style="color:var(--ink-900);">Daftar Publikasi</h3>
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[var(--green-700)] text-white text-sm font-medium rounded-lg hover:bg-[var(--green-800)] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-black/5 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-black/5 text-sm" style="color:var(--ink-600);">
                            <th class="p-4 font-semibold w-16">Cover</th>
                            <th class="p-4 font-semibold">Judul</th>
                            <th class="p-4 font-semibold">Tipe</th>
                            <th class="p-4 font-semibold">Tanggal Publish</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/5">
                        @forelse($posts as $post)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    @if($post->image)
                                        <img src="{{ $post->image }}" alt="" class="w-12 h-12 object-cover rounded">
                                    @else
                                        <div class="w-12 h-12 bg-gray-100 flex items-center justify-center rounded">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <p class="text-sm font-medium" style="color:var(--ink-900);">{{ $post->title }}</p>
                                    <p class="text-xs mt-1" style="color:var(--ink-600);">Slug: {{ $post->slug }}</p>
                                </td>
                                <td class="p-4 text-sm capitalize" style="color:var(--ink-600);">{{ $post->type }}</td>
                                <td class="p-4 text-sm" style="color:var(--ink-600);">{{ $post->published_at ? $post->published_at->format('d M Y') : 'Draft' }}</td>
                                <td class="p-4 flex justify-center gap-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-xs px-3 py-1.5 border border-gray-200 text-gray-600 font-medium rounded hover:bg-gray-50 transition-colors">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Hapus postingan ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs px-3 py-1.5 border border-red-200 text-red-600 font-medium rounded hover:bg-red-50 transition-colors">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">Belum ada data publikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($posts->hasPages())
                <div class="p-4 border-t border-black/5">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
