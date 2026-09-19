<x-app-layout>
    <x-slot name="header">
        {{ $post->exists ? 'Edit Publikasi' : 'Tambah Publikasi Baru' }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        
        <div class="mb-6">
            <a href="{{ route('admin.posts.index') }}" class="text-sm font-medium hover:underline flex items-center gap-1" style="color:var(--ink-600);">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Daftar
            </a>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-black/5 shadow-sm overflow-hidden p-6 sm:p-8">
            <form action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if($post->exists) @method('PUT') @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Judul</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50" required>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Kategori</label>
                        <select name="type" id="type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50" required>
                            <option value="berita" {{ old('type', $post->type) == 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="event" {{ old('type', $post->type) == 'event' ? 'selected' : '' }}>Event</option>
                            <option value="opini" {{ old('type', $post->type) == 'opini' ? 'selected' : '' }}>Opini</option>
                        </select>
                    </div>

                    <div>
                        <label for="published_at" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Tanggal Publish (Opsional)</label>
                        <input type="date" name="published_at" id="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50">
                    </div>

                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Gambar Cover (Opsional)</label>
                        @if($post->image)
                            <div class="mb-3">
                                <img src="{{ $post->image }}" alt="Cover saat ini" class="h-32 rounded object-cover">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[var(--green-50)] file:text-[var(--green-700)] hover:file:bg-[var(--green-100)]" accept="image/*">
                    </div>

                    <div class="md:col-span-2">
                        <label for="content" class="block text-sm font-medium mb-1" style="color:var(--ink-900);">Konten</label>
                        <textarea name="content" id="content" rows="10" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50" required>{{ old('content', $post->content) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-gray-100">
                    <button type="submit" class="px-6 py-2.5 bg-[var(--green-700)] text-white font-medium rounded-lg hover:bg-[var(--green-800)] transition-colors">
                        Simpan Publikasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
