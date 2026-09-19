<x-member-layout>
    <x-slot name="title">Edit Profil Anggota</x-slot>

    <div class="max-w-3xl mx-auto space-y-6">
        <div>
            <h1 class="font-display text-2xl font-bold" style="color:var(--ink-900);">Edit Profil</h1>
            <p class="text-sm mt-1" style="color:var(--ink-600);">NIA Anda: <strong class="font-mono" style="color:var(--green-700);">{{ $profile->nia }}</strong></p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('member.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PATCH')

            {{-- Identitas Diri --}}
            <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
                <h2 class="font-display font-semibold text-base mb-4" style="color:var(--ink-900);">Identitas Diri</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $profile->nama_lengkap) }}" required class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik', $profile->nik) }}" maxlength="16" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">No. HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $profile->no_hp) }}" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $profile->tempat_lahir) }}" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional($profile->tanggal_lahir)->format('Y-m-d')) }}" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Pas Foto (ganti jika perlu, maks 1 MB)</label>
                        @if($profile->foto)
                            <div class="mb-2 flex items-center gap-3">
                                <img src="{{ $profile->foto }}" class="w-16 h-20 object-cover rounded border" alt="Foto saat ini">
                                <span class="text-xs" style="color:var(--ink-600);">Foto saat ini</span>
                            </div>
                        @endif
                        <input type="file" name="foto" accept="image/jpeg,image/png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[var(--green-50)] file:text-[var(--green-700)] hover:file:bg-[var(--green-100)]">
                    </div>
                </div>
            </div>

            {{-- Identitas Kampus --}}
            <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
                <h2 class="font-display font-semibold text-base mb-4" style="color:var(--ink-900);">Identitas Kampus</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">NPM</label>
                        <input type="text" name="npm" value="{{ old('npm', $profile->npm) }}" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Tahun Angkatan</label>
                        <input type="number" name="angkatan" value="{{ old('angkatan', $profile->angkatan) }}" min="2000" max="{{ date('Y') }}" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Fakultas</label>
                        <select name="fakultas" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                            <option value="">— Pilih —</option>
                            @foreach(['Fakultas Tarbiyah dan Keguruan','Fakultas Syariah','Fakultas Ushuluddin dan Studi Agama','Fakultas Dakwah dan Ilmu Komunikasi','Fakultas Ekonomi dan Bisnis Islam','Fakultas Sains dan Teknologi','Fakultas Adab','Pascasarjana'] as $fak)
                                <option value="{{ $fak }}" {{ old('fakultas', $profile->fakultas) === $fak ? 'selected' : '' }}>{{ str_replace('Fakultas ', '', $fak) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Program Studi</label>
                        <input type="text" name="prodi" value="{{ old('prodi', $profile->prodi) }}" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-[var(--ink-900)]">Angkatan Makesta</label>
                        <input type="text" name="angkatan_makesta" value="{{ old('angkatan_makesta', $profile->angkatan_makesta) }}" placeholder="Contoh: Makesta Raya 2024" class="w-full rounded-md border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] shadow-sm text-sm">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-8 py-3 text-white font-semibold rounded-xl shadow hover:opacity-90 transition-opacity" style="background:var(--green-950);">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-member-layout>
