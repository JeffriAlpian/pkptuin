<x-member-layout>
    <x-slot name="title">Dashboard Anggota</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        {{-- E-KTA DIGITAL --}}
        <div class="overflow-hidden rounded-2xl shadow-lg relative" style="background:var(--green-950); min-height:200px;">
            {{-- Decorative --}}
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs><pattern id="dots" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="1" fill="white"/></pattern></defs>
                    <rect width="100%" height="100%" fill="url(#dots)"/>
                </svg>
            </div>
            <div class="absolute top-0 right-0 w-64 h-64 opacity-10 pointer-events-none rounded-full -mr-16 -mt-16" style="background:var(--gold-400);"></div>

            <div class="relative z-10 flex flex-col sm:flex-row gap-6 p-6 sm:p-8">
                {{-- Foto --}}
                <div class="flex-shrink-0">
                    @if($profile && $profile->foto)
                        <img src="{{ $profile->foto }}" alt="Foto" class="w-24 h-28 sm:w-28 sm:h-36 object-cover rounded-xl border-2 shadow-lg" style="border-color:var(--gold-400);">
                    @else
                        <div class="w-24 h-28 sm:w-28 sm:h-36 rounded-xl border-2 flex items-center justify-center" style="border-color:var(--gold-400); background:rgba(255,255,255,0.08);">
                            <svg class="w-10 h-10 opacity-40 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    @endif
                </div>

                {{-- Data Utama --}}
                <div class="flex-1">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:var(--gold-400);">E-KTA PKPT IPNU/IPPNU</p>
                            <h2 class="font-display text-white text-xl font-bold">{{ $profile->nama_lengkap ?? $user->name }}</h2>
                            <p class="text-white/60 text-sm mt-0.5">{{ $profile->npm ?? 'NPM belum diisi' }}</p>
                        </div>
                        <div class="text-right hidden sm:block">
                            <p class="text-xs" style="color:rgba(255,255,255,.5);">UIN Raden Intan</p>
                            <p class="text-xs" style="color:rgba(255,255,255,.5);">Lampung</p>
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-x-6 gap-y-2">
                        <div>
                            <p class="text-xs" style="color:rgba(255,255,255,.45);">NIA</p>
                            <p class="text-white text-sm font-mono font-semibold">{{ $profile->nia ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs" style="color:rgba(255,255,255,.45);">Fakultas</p>
                            <p class="text-white text-sm">{{ $profile->fakultas ? str_replace('Fakultas ', '', $profile->fakultas) : '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs" style="color:rgba(255,255,255,.45);">Prodi</p>
                            <p class="text-white text-sm">{{ $profile->prodi ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs" style="color:rgba(255,255,255,.45);">Angkatan</p>
                            <p class="text-white text-sm">{{ $profile->angkatan ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs" style="color:rgba(255,255,255,.45);">Status</p>
                            <p class="text-sm font-semibold" style="color:var(--gold-400);">{{ ucfirst($profile->status_keaktifan ?? 'Aktif') }}</p>
                        </div>
                        <div>
                            <p class="text-xs" style="color:rgba(255,255,255,.45);">Makesta</p>
                            <p class="text-white text-sm">{{ $profile->angkatan_makesta ?? '—' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Barcode placeholder --}}
                <div class="flex-shrink-0 flex flex-col items-center justify-center gap-2 hidden sm:flex">
                    <div class="w-20 h-20 bg-white rounded-lg p-2 flex items-center justify-center">
                        {{-- QR placeholder --}}
                        <svg viewBox="0 0 21 21" class="w-full h-full">
                            <rect x="0" y="0" width="9" height="9" fill="black"/>
                            <rect x="1" y="1" width="7" height="7" fill="white"/>
                            <rect x="2" y="2" width="5" height="5" fill="black"/>
                            <rect x="12" y="0" width="9" height="9" fill="black"/>
                            <rect x="13" y="1" width="7" height="7" fill="white"/>
                            <rect x="14" y="2" width="5" height="5" fill="black"/>
                            <rect x="0" y="12" width="9" height="9" fill="black"/>
                            <rect x="1" y="13" width="7" height="7" fill="white"/>
                            <rect x="2" y="14" width="5" height="5" fill="black"/>
                            <rect x="12" y="12" width="2" height="2" fill="black"/>
                            <rect x="15" y="12" width="2" height="2" fill="black"/>
                            <rect x="12" y="15" width="2" height="2" fill="black"/>
                            <rect x="15" y="15" width="6" height="6" fill="black"/>
                        </svg>
                    </div>
                    <p class="text-xs" style="color:rgba(255,255,255,.45);">Scan absensi</p>
                </div>
            </div>
        </div>

        {{-- Info Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-xl p-5 border border-black/5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-widest mb-2" style="color:var(--ink-600);">Status Kaderisasi</p>
                @php $jumlahLulus = $kaderisasiList->where('status','lulus')->count(); @endphp
                <p class="font-display text-3xl font-bold" style="color:var(--green-700);">{{ $jumlahLulus }}</p>
                <p class="text-xs mt-1" style="color:var(--ink-600);">jenjang telah dilalui</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-black/5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-widest mb-2" style="color:var(--ink-600);">Tempat Lahir</p>
                <p class="font-semibold text-sm" style="color:var(--ink-900);">{{ $profile->tempat_lahir ?? '—' }}</p>
                <p class="text-xs mt-1" style="color:var(--ink-600);">{{ $profile->tanggal_lahir ? $profile->tanggal_lahir->format('d M Y') : '—' }}</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-black/5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-widest mb-2" style="color:var(--ink-600);">No. HP</p>
                <p class="font-semibold text-sm" style="color:var(--ink-900);">{{ $profile->no_hp ?? '—' }}</p>
                <p class="text-xs mt-1" style="color:var(--ink-600);">NIK: {{ $profile->nik ? substr($profile->nik,0,6).'**...' : '—' }}</p>
            </div>
        </div>

        {{-- Rekam Kaderisasi Preview --}}
        <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-display font-semibold text-base" style="color:var(--ink-900);">Rekam Jejak Kaderisasi</h3>
                <a href="{{ route('member.kaderisasi.index') }}" class="text-xs font-medium hover:underline" style="color:var(--green-700);">Lihat semua →</a>
            </div>
            @php
                $allJenis = ['makesta','lakmud','lakut','laknas','latin_1','latin_2'];
                $labels = \App\Models\Kaderisasi::labelJenis();
            @endphp
            <div class="space-y-2">
                @foreach($allJenis as $jenis)
                    @php $kad = $kaderisasiList->get($jenis); @endphp
                    <div class="flex items-center gap-3 py-2 border-b border-black/5 last:border-0">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0
                            {{ $kad && $kad->status === 'lulus' ? 'bg-green-100' : 'bg-gray-100' }}">
                            @if($kad && $kad->status === 'lulus')
                                <svg class="w-3.5 h-3.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            @else
                                <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium" style="color:var(--ink-900);">{{ $labels[$jenis] }}</p>
                            @if($kad && $kad->keterangan)
                                <p class="text-xs" style="color:var(--ink-600);">{{ $kad->keterangan }}</p>
                            @endif
                        </div>
                        <span class="text-xs px-2 py-0.5 rounded-full
                            {{ $kad && $kad->status === 'lulus' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $kad ? ucfirst(str_replace('_', ' ', $kad->status)) : 'Belum' }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
            <h3 class="font-display font-semibold text-base mb-4" style="color:var(--ink-900);">Aksi Cepat</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <a href="{{ route('member.profile.edit') }}" class="flex flex-col items-center gap-2 p-4 border border-black/5 rounded-xl hover:bg-[var(--green-50)] transition-colors text-center">
                    <svg class="w-6 h-6" style="color:var(--gold-500);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span class="text-xs font-medium" style="color:var(--ink-900);">Edit Profil</span>
                </a>
                <a href="{{ route('member.kaderisasi.index') }}" class="flex flex-col items-center gap-2 p-4 border border-black/5 rounded-xl hover:bg-[var(--green-50)] transition-colors text-center">
                    <svg class="w-6 h-6" style="color:var(--gold-500);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    <span class="text-xs font-medium" style="color:var(--ink-900);">Kaderisasi</span>
                </a>
                <span class="flex flex-col items-center gap-2 p-4 border border-black/5 rounded-xl opacity-40 cursor-not-allowed text-center">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="text-xs font-medium text-gray-500">Kegiatan</span>
                </span>
                <span class="flex flex-col items-center gap-2 p-4 border border-black/5 rounded-xl opacity-40 cursor-not-allowed text-center">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span class="text-xs font-medium text-gray-500">Surat</span>
                </span>
            </div>
        </div>
    </div>
</x-member-layout>
