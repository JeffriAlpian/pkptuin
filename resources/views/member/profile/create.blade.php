<x-member-layout>
    <x-slot name="title">Form Kelengkapan Data Anggota</x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <h1 class="font-display text-2xl font-bold" style="color:var(--ink-900);">Selamat Datang! 👋</h1>
            <p class="text-[var(--ink-600)] mt-1 text-sm">Lengkapi data diri Anda untuk mendapatkan Nomor Induk Anggota (NIA) dan Kartu Anggota Digital (E-KTA).</p>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('member.profile.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- IDENTITAS DIRI --}}
            <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
                <h2 class="font-display font-semibold text-base mb-4" style="color:var(--ink-900);">
                    <span class="inline-block w-6 h-6 rounded-full text-center text-white text-xs leading-6 mr-2" style="background:var(--green-700);">1</span>
                    Identitas Diri
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', auth()->user()->name) }}" required
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">NIK (16 digit)</label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" placeholder="xxxx xxxx xxxx xxxx"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">No. HP / WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xx-xxxx-xxxx"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Kota/Kabupaten"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Pas Foto Formal (Jas IPNU/IPPNU, maks 1 MB)</label>
                        <input type="file" name="foto" accept="image/jpeg,image/png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[var(--green-50)] file:text-[var(--green-700)] hover:file:bg-[var(--green-100)]">
                        <p class="text-xs text-[var(--ink-600)] mt-1">Format JPG/PNG, background bebas, tampak depan. Maks 1 MB.</p>
                    </div>
                </div>
            </div>

            {{-- IDENTITAS KAMPUS --}}
            <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
                <h2 class="font-display font-semibold text-base mb-4" style="color:var(--ink-900);">
                    <span class="inline-block w-6 h-6 rounded-full text-center text-white text-xs leading-6 mr-2" style="background:var(--green-700);">2</span>
                    Identitas Kampus
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">NPM (Nomor Pokok Mahasiswa)</label>
                        <input type="text" name="npm" value="{{ old('npm') }}" placeholder="xxxxxxxxxxxx"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Tahun Angkatan</label>
                        <input type="number" name="angkatan" value="{{ old('angkatan') }}" min="2000" max="{{ date('Y') }}" placeholder="{{ date('Y') }}"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Fakultas</label>
                        <select name="fakultas" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                            <option value="">— Pilih Fakultas —</option>
                            <option value="Fakultas Tarbiyah dan Keguruan" {{ old('fakultas') == 'Fakultas Tarbiyah dan Keguruan' ? 'selected' : '' }}>Tarbiyah dan Keguruan</option>
                            <option value="Fakultas Syariah" {{ old('fakultas') == 'Fakultas Syariah' ? 'selected' : '' }}>Syariah</option>
                            <option value="Fakultas Ushuluddin dan Studi Agama" {{ old('fakultas') == 'Fakultas Ushuluddin dan Studi Agama' ? 'selected' : '' }}>Ushuluddin dan Studi Agama</option>
                            <option value="Fakultas Dakwah dan Ilmu Komunikasi" {{ old('fakultas') == 'Fakultas Dakwah dan Ilmu Komunikasi' ? 'selected' : '' }}>Dakwah dan Ilmu Komunikasi</option>
                            <option value="Fakultas Ekonomi dan Bisnis Islam" {{ old('fakultas') == 'Fakultas Ekonomi dan Bisnis Islam' ? 'selected' : '' }}>Ekonomi dan Bisnis Islam</option>
                            <option value="Fakultas Sains dan Teknologi" {{ old('fakultas') == 'Fakultas Sains dan Teknologi' ? 'selected' : '' }}>Sains dan Teknologi</option>
                            <option value="Fakultas Adab" {{ old('fakultas') == 'Fakultas Adab' ? 'selected' : '' }}>Adab</option>
                            <option value="Pascasarjana" {{ old('fakultas') == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Program Studi</label>
                        <input type="text" name="prodi" value="{{ old('prodi') }}" placeholder="Contoh: Pendidikan Agama Islam"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Angkatan Makesta</label>
                        <input type="text" name="angkatan_makesta" value="{{ old('angkatan_makesta') }}" placeholder="Contoh: Makesta Raya 2024"
                            class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                </div>
            </div>

            {{-- KADERISASI FORMAL --}}
            <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
                <h2 class="font-display font-semibold text-base mb-1" style="color:var(--ink-900);">
                    <span class="inline-block w-6 h-6 rounded-full text-center text-white text-xs leading-6 mr-2" style="background:var(--green-700);">3</span>
                    Kaderisasi Formal
                </h2>
                <p class="text-xs text-[var(--ink-600)] mb-4 ml-8">Centang jenjang yang sudah Anda ikuti (jika ada).</p>

                @php
                    $jenisForma = [
                        'makesta' => 'Makesta (Masa Kesetiaan Anggota)',
                        'lakmud'  => 'Lakmud (Latihan Kader Muda)',
                        'lakut'   => 'Lakut (Latihan Kader Utama)',
                        'laknas'  => 'Laknas (Latihan Kader Nasional)',
                    ];
                @endphp

                <div class="space-y-4">
                    @foreach($jenisForma as $key => $label)
                    <div class="border border-black/5 rounded-lg p-4 kaderisasi-item" id="item-{{ $key }}">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="kad-check rounded border-black/20 text-[var(--green-700)]" data-target="detail-{{ $key }}" onclick="toggleKaderisasi(this)">
                            <span class="font-medium text-sm text-[var(--ink-900)]">{{ $label }}</span>
                        </label>
                        <div id="detail-{{ $key }}" class="hidden mt-3 grid grid-cols-1 md:grid-cols-3 gap-3 pl-7">
                            <input type="hidden" name="kaderisasi[{{ $key }}][jenis]" value="{{ $key }}">
                            <div>
                                <label class="block text-xs font-medium mb-1 text-[var(--ink-600)]">Status</label>
                                <select name="kaderisasi[{{ $key }}][status]" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-xs">
                                    <option value="lulus">Lulus</option>
                                    <option value="tidak_lulus">Tidak Lulus</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1 text-[var(--ink-600)]">Keterangan</label>
                                <input type="text" name="kaderisasi[{{ $key }}][keterangan]" placeholder="Misal: Makesta Raya 2024" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1 text-[var(--ink-600)]">Tanggal Pelaksanaan</label>
                                <input type="date" name="kaderisasi[{{ $key }}][tanggal]" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-xs">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- KADERISASI NON-FORMAL --}}
            <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
                <h2 class="font-display font-semibold text-base mb-1" style="color:var(--ink-900);">
                    <span class="inline-block w-6 h-6 rounded-full text-center text-white text-xs leading-6 mr-2" style="background:var(--green-700);">4</span>
                    Kaderisasi Non-Formal
                </h2>
                <p class="text-xs text-[var(--ink-600)] mb-4 ml-8">Pelatihan soft skill mahasiswa yang diselenggarakan PKPT.</p>

                @php
                    $jenisNonFormal = [
                        'latin_1' => 'Latin 1 — Jurnalistik, Desain Grafis, atau Public Speaking',
                        'latin_2' => 'Latin 2 — Kewirausahaan atau Leadership',
                    ];
                @endphp

                <div class="space-y-4">
                    @foreach($jenisNonFormal as $key => $label)
                    <div class="border border-black/5 rounded-lg p-4">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="kad-check rounded border-black/20 text-[var(--green-700)]" data-target="detail-{{ $key }}" onclick="toggleKaderisasi(this)">
                            <span class="font-medium text-sm text-[var(--ink-900)]">{{ $label }}</span>
                        </label>
                        <div id="detail-{{ $key }}" class="hidden mt-3 grid grid-cols-1 md:grid-cols-3 gap-3 pl-7">
                            <input type="hidden" name="kaderisasi[{{ $key }}][jenis]" value="{{ $key }}">
                            <div>
                                <label class="block text-xs font-medium mb-1 text-[var(--ink-600)]">Status</label>
                                <select name="kaderisasi[{{ $key }}][status]" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-xs">
                                    <option value="lulus">Lulus / Selesai</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1 text-[var(--ink-600)]">Keterangan</label>
                                <input type="text" name="kaderisasi[{{ $key }}][keterangan]" placeholder="Nama pelatihan" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1 text-[var(--ink-600)]">Tanggal</label>
                                <input type="date" name="kaderisasi[{{ $key }}][tanggal]" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-xs">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="flex justify-end pb-8">
                <button type="submit" class="px-8 py-3 text-white font-semibold rounded-xl shadow-lg hover:opacity-90 transition-opacity" style="background:var(--green-950);">
                    Simpan & Dapatkan NIA Saya →
                </button>
            </div>
        </form>
    </div>

    <script>
        function toggleKaderisasi(checkbox) {
            const target = document.getElementById(checkbox.dataset.target);
            if (checkbox.checked) {
                target.classList.remove('hidden');
                target.classList.add('grid');
            } else {
                target.classList.add('hidden');
                target.classList.remove('grid');
            }
        }
    </script>
</x-member-layout>
