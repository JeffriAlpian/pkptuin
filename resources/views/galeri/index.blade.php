@extends('layouts.front')

@section('title', 'Galeri — PKPT IPNU IPPNU UIN Raden Intan Lampung')

@section('content')
{{-- Hero Section --}}
<div class="bg-green-900 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-yellow-400 font-semibold uppercase tracking-wider text-sm mb-2 block">Dokumentasi</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Galeri Kegiatan</h1>
        <p class="text-green-100 text-lg font-light">Kumpulan momen dan dokumentasi kegiatan PKPT IPNU IPPNU UIN Raden Intan Lampung.</p>
    </div>
</div>

{{-- Gallery Grid --}}
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($galleries->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($galleries as $gallery)
                    <div class="group relative bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                        {{-- Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="p-4 w-full">
                                <h3 class="text-white font-semibold text-sm leading-snug">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="text-gray-200 text-xs mt-1 line-clamp-2">{{ $gallery->description }}</p>
                                @endif
                            </div>
                        </div>
                        {{-- Static title below image --}}
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-gray-900 leading-snug">{{ $gallery->title }}</h3>
                            <span class="text-xs text-gray-400 mt-1 block">{{ $gallery->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $galleries->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-20">
                <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <h3 class="text-xl font-semibold text-gray-500 mb-2">Galeri Kosong</h3>
                <p class="text-gray-400">Dokumentasi kegiatan akan segera ditampilkan di sini.</p>
            </div>
        @endif

    </div>
</div>
@endsection
