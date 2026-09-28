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
                        <div class="flex items-center justify-between mb-2">
                            <label for="content" class="block text-sm font-medium" style="color:var(--ink-900);">Konten</label>
                            <button type="button" onclick="openAiModal()" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 rounded-md text-xs font-semibold transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                Generate Berita dengan AI (Gemini)
                            </button>
                        </div>
                        <textarea name="content" id="content" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--green-600)] focus:ring focus:ring-[var(--green-600)] focus:ring-opacity-50">{{ old('content', $post->content) }}</textarea>
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

    <!-- Modal AI 5W1H -->
    <div id="aiModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50 backdrop-blur-sm" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-2xl w-full border border-gray-100">
                <div class="bg-[var(--green-950)] px-6 py-4 border-b border-[var(--gold-500)] flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-white flex items-center gap-2" id="modal-title">
                        <svg class="w-5 h-5 text-[var(--gold-500)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Asisten Jurnalis AI (Gemini)
                    </h3>
                    <button type="button" onclick="closeAiModal()" class="text-gray-300 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="px-6 py-5 bg-[#FBF8F1]">
                    <p class="text-sm text-[var(--ink-600)] mb-5">Isi data 5W1H di bawah ini secara singkat. AI akan mengembangkannya menjadi artikel berita jurnalistik yang lengkap, rapi, dan formal.</p>
                    
                    <form id="aiForm" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">What (Apa acaranya?)</label>
                                <input type="text" id="ai_what" class="w-full text-sm rounded border-gray-300" placeholder="Cth: Pelantikan Pengurus Baru" required>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">Who (Siapa yang hadir/terlibat?)</label>
                                <input type="text" id="ai_who" class="w-full text-sm rounded border-gray-300" placeholder="Cth: Ketua Umum, Rektor, Mahasiswa" required>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">When (Kapan dilaksanakan?)</label>
                                <input type="text" id="ai_when" class="w-full text-sm rounded border-gray-300" placeholder="Cth: Minggu, 20 Oktober 2026 Pagi" required>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">Where (Di mana lokasinya?)</label>
                                <input type="text" id="ai_where" class="w-full text-sm rounded border-gray-300" placeholder="Cth: Aula Rektorat Lt. 3" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Why (Mengapa ini penting diadakan?)</label>
                            <input type="text" id="ai_why" class="w-full text-sm rounded border-gray-300" placeholder="Cth: Untuk regenerasi kepemimpinan dan penyegaran organisasi" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">How (Bagaimana jalannya acara/suasana?)</label>
                            <textarea id="ai_how" rows="2" class="w-full text-sm rounded border-gray-300" placeholder="Cth: Berjalan khidmat, diawali pembacaan ayat suci, dilanjutkan serah terima jabatan." required></textarea>
                        </div>
                    </form>
                    
                    <div id="aiLoading" class="hidden mt-4 p-4 bg-blue-50 rounded border border-blue-100 flex flex-col items-center justify-center gap-2">
                        <svg class="animate-spin h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <p class="text-sm font-medium text-blue-800 animate-pulse">Gemini sedang merangkai kata-kata berita...</p>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-3">
                    <button type="button" onclick="closeAiModal()" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Batal</button>
                    <button type="button" onclick="generateAiNews()" id="aiSubmitBtn" class="px-4 py-2 bg-[var(--green-700)] text-white rounded-md text-sm font-medium hover:bg-[var(--green-800)] flex items-center gap-2">
                        Mulai Generate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- TinyMCE CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#content',
                height: 500,
                menubar: false,
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template',
                toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | code fullscreen',
                content_style: 'body { font-family: "Poppins", Helvetica, Arial, sans-serif; font-size: 15px; color: #1C231D; }',
                skin: 'oxide',
                promotion: false,
                branding: false,
            });
        });

        // AI Modal logic
        const aiModal = document.getElementById('aiModal');
        const aiForm = document.getElementById('aiForm');
        const aiLoading = document.getElementById('aiLoading');
        const aiSubmitBtn = document.getElementById('aiSubmitBtn');

        function openAiModal() {
            aiModal.classList.remove('hidden');
        }

        function closeAiModal() {
            if(!aiLoading.classList.contains('hidden')) return; // Cegah tutup saat loading
            aiModal.classList.add('hidden');
        }

        async function generateAiNews() {
            // Validasi
            if(!aiForm.checkValidity()) {
                aiForm.reportValidity();
                return;
            }

            const data = {
                what: document.getElementById('ai_what').value,
                who: document.getElementById('ai_who').value,
                when: document.getElementById('ai_when').value,
                where: document.getElementById('ai_where').value,
                why: document.getElementById('ai_why').value,
                how: document.getElementById('ai_how').value,
                _token: '{{ csrf_token() }}'
            };

            // Tampilkan loading
            aiForm.classList.add('hidden');
            aiSubmitBtn.classList.add('hidden');
            aiLoading.classList.remove('hidden');

            try {
                const response = await fetch('{{ route("admin.posts.generate-ai") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if(response.ok) {
                    // Berhasil, masukkan ke TinyMCE
                    tinymce.get('content').setContent(result.content);
                    closeAiModal();
                    // Reset form
                    aiForm.reset();
                    aiForm.classList.remove('hidden');
                    aiSubmitBtn.classList.remove('hidden');
                    aiLoading.classList.add('hidden');
                    
                    alert('Berita berhasil digenerate! Silakan tinjau dan edit di editor.');
                } else {
                    alert('Gagal: ' + (result.error || 'Terjadi kesalahan.'));
                    resetAiModalState();
                }
            } catch (error) {
                alert('Error: Koneksi terputus.');
                resetAiModalState();
            }
        }

        function resetAiModalState() {
            aiForm.classList.remove('hidden');
            aiSubmitBtn.classList.remove('hidden');
            aiLoading.classList.add('hidden');
        }
    </script>
</x-app-layout>
