<x-member-layout>
    <x-slot name="title">Rekam Jejak Kaderisasi</x-slot>

    <div class="max-w-3xl mx-auto space-y-6">

        <div>
            <h1 class="font-display text-2xl font-bold" style="color:var(--ink-900);">Rekam Jejak Kaderisasi</h1>
            <p class="text-sm mt-1" style="color:var(--ink-600);">Riwayat jenjang kaderisasi formal dan non-formal yang telah Anda ikuti.</p>
        </div>

        {{-- KADERISASI FORMAL --}}
        <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
            <h2 class="font-display font-semibold text-base mb-5 flex items-center gap-2" style="color:var(--ink-900);">
                <span class="px-2 py-0.5 text-xs rounded-full font-semibold" style="background:var(--green-100);color:var(--green-700);">Formal</span>
                Jenjang Kaderisasi Formal
            </h2>
            <div class="relative">
                {{-- Timeline line --}}
                <div class="absolute left-5 top-0 bottom-0 w-px bg-gray-100"></div>
                <div class="space-y-6">
                    @foreach($formal as $jenis)
                        @php $kad = $kaderisasiList->get($jenis); $lulus = $kad && $kad->status === 'lulus'; @endphp
                        <div class="relative flex gap-4 items-start">
                            {{-- Dot --}}
                            <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 border-2 {{ $lulus ? 'border-green-500 bg-green-50' : 'border-gray-200 bg-white' }}">
                                @if($lulus)
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                @else
                                    <div class="w-3 h-3 rounded-full bg-gray-200"></div>
                                @endif
                            </div>
                            {{-- Content --}}
                            <div class="flex-1 pb-2">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h3 class="font-semibold text-sm" style="color:var(--ink-900);">{{ $labels[$jenis] }}</h3>
                                    <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                        {{ $lulus ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $kad ? ucfirst(str_replace('_', ' ', $kad->status)) : 'Belum mengikuti' }}
                                    </span>
                                </div>
                                @if($kad && $kad->keterangan)
                                    <p class="text-sm mt-1" style="color:var(--ink-600);">{{ $kad->keterangan }}</p>
                                @endif
                                @if($kad && $kad->tanggal)
                                    <p class="text-xs mt-1" style="color:var(--ink-600);">{{ $kad->tanggal->format('d M Y') }}</p>
                                @endif
                                @if(!$kad)
                                    <p class="text-xs mt-1 italic" style="color:rgba(75,86,76,.5);">Data belum diisi.</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- KADERISASI NON-FORMAL --}}
        <div class="bg-white rounded-xl border border-black/5 shadow-sm p-6">
            <h2 class="font-display font-semibold text-base mb-5 flex items-center gap-2" style="color:var(--ink-900);">
                <span class="px-2 py-0.5 text-xs rounded-full font-semibold" style="background:var(--gold-100);color:var(--gold-600);">Non-Formal</span>
                Pelatihan Soft Skill
            </h2>
            <div class="space-y-4">
                @foreach($nonFormal as $jenis)
                    @php $kad = $kaderisasiList->get($jenis); $lulus = $kad && $kad->status === 'lulus'; @endphp
                    <div class="flex items-start gap-4 p-4 border rounded-xl {{ $lulus ? 'border-green-200 bg-green-50' : 'border-gray-100' }}">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 {{ $lulus ? 'bg-green-100' : 'bg-gray-100' }}">
                            @if($lulus)
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            @else
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-sm" style="color:var(--ink-900);">{{ $labels[$jenis] }}</h3>
                            @if($kad)
                                <p class="text-sm mt-0.5" style="color:var(--ink-600);">{{ $kad->keterangan ?? 'Selesai' }}</p>
                                @if($kad->tanggal)
                                    <p class="text-xs mt-1" style="color:var(--ink-600);">{{ $kad->tanggal->format('d M Y') }}</p>
                                @endif
                            @else
                                <p class="text-xs italic mt-0.5" style="color:rgba(75,86,76,.5);">Belum mengikuti</p>
                            @endif
                        </div>
                        @if($lulus)
                            <button class="flex-shrink-0 text-xs px-3 py-1.5 border border-green-300 text-green-700 rounded-lg hover:bg-green-100 transition-colors cursor-not-allowed opacity-60" title="Fitur unduh sertifikat segera hadir">
                                Unduh Sertifikat
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Info footer --}}
        <div class="text-center p-4 rounded-xl border border-dashed border-black/10">
            <p class="text-sm" style="color:var(--ink-600);">Perlu memperbarui data kaderisasi?</p>
            <a href="{{ route('member.profile.edit') }}" class="text-sm font-medium hover:underline" style="color:var(--green-700);">Hubungi pengurus PKPT atau edit profil →</a>
        </div>
    </div>
</x-member-layout>
