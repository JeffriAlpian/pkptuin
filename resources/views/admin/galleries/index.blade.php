<x-app-layout>
    <x-slot name="header">
        Kelola Galeri
    </x-slot>

    <div class="max-w-7xl mx-auto">
        
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6 mb-8">
            <h3 class="text-lg font-bold mb-4" style="color:var(--ink-900);">Upload Gambar Baru</h3>
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row items-end gap-4">
                @csrf
                <div class="flex-1 w-full">
                    <label for="title" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Keterangan Gambar</label>
                    <input type="text" name="title" id="title" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50" required placeholder="Contoh: Rapat kerja tahunan">
                </div>
                <div class="flex-1 w-full">
                    <label for="image" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Pilih Gambar</label>
                    <input type="file" name="image" id="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[var(--green-50)] file:text-[var(--green-700)] hover:file:bg-[var(--green-100)]" accept="image/*" required>
                </div>
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-[var(--green-700)] text-white font-medium rounded-lg hover:bg-[var(--green-800)] transition-colors border border-[var(--green-800)]">
                    Upload
                </button>
            </form>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($galleries as $gallery)
                <div class="group relative rounded-xl overflow-hidden border border-black/5 aspect-square bg-gray-100">
                    <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                    
                    <!-- Hover overlay -->
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-between p-4">
                        <p class="text-white text-sm font-medium line-clamp-2">{{ $gallery->title }}</p>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?');" class="self-end">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-2 md:col-span-4 py-12 text-center text-gray-500 bg-white rounded-xl border border-black/5">
                    Belum ada gambar di galeri.
                </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
