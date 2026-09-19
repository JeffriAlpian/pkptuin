<x-app-layout>
    <x-slot name="header">
        Kelola Dokumen
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
            <h3 class="text-lg font-bold mb-4" style="color:var(--ink-900);">Upload Dokumen Baru</h3>
            <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row items-end gap-4">
                @csrf
                <div class="flex-1 w-full">
                    <label for="title" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Judul Dokumen</label>
                    <input type="text" name="title" id="title" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50" required placeholder="Contoh: AD/ART IPNU">
                </div>
                <div class="flex-1 w-full">
                    <label for="file" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Pilih File (PDF, DOC, ZIP max 10MB)</label>
                    <input type="file" name="file" id="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[var(--green-50)] file:text-[var(--green-700)] hover:file:bg-[var(--green-100)]" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip" required>
                </div>
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-[var(--green-700)] text-white font-medium rounded-lg hover:bg-[var(--green-800)] transition-colors border border-[var(--green-800)]">
                    Upload File
                </button>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-black/5 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-black/5 text-sm" style="color:var(--ink-600);">
                            <th class="p-4 font-semibold">Judul Dokumen</th>
                            <th class="p-4 font-semibold text-center">Tipe File</th>
                            <th class="p-4 font-semibold text-right">Ukuran</th>
                            <th class="p-4 font-semibold">Tanggal Upload</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/5">
                        @forelse($documents as $doc)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <a href="{{ $doc->file_path }}" target="_blank" class="text-sm font-medium hover:underline" style="color:var(--ink-900);">{{ $doc->title }}</a>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-semibold bg-gray-100 text-gray-700 uppercase">
                                        {{ $doc->file_type }}
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-right" style="color:var(--ink-600);">
                                    {{ round($doc->file_size / 1024, 2) }} KB
                                </td>
                                <td class="p-4 text-sm" style="color:var(--ink-600);">
                                    {{ $doc->created_at->format('d M Y') }}
                                </td>
                                <td class="p-4 flex justify-center gap-2">
                                    <a href="{{ $doc->file_path }}" target="_blank" class="text-xs px-3 py-1.5 border border-gray-200 text-gray-600 font-medium rounded hover:bg-gray-50 transition-colors">Download</a>
                                    <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs px-3 py-1.5 border border-red-200 text-red-600 font-medium rounded hover:bg-red-50 transition-colors">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">Belum ada dokumen yang diupload.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($documents->hasPages())
                <div class="p-4 border-t border-black/5">
                    {{ $documents->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
