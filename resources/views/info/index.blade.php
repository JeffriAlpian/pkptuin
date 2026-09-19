@extends('layouts.front')

@section('title', $label . ' — PKPT IPNU IPPNU UIN Raden Intan Lampung')

@section('content')
{{-- Hero Section --}}
<div class="bg-green-900 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-yellow-400 font-semibold uppercase tracking-wider text-sm mb-2 block">Info</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $label }}</h1>
        <p class="text-green-100 text-lg font-light">
            @if($type === 'berita')
                Kabar terbaru seputar kegiatan dan perkembangan PKPT IPNU IPPNU UIN Raden Intan Lampung.
            @elseif($type === 'event')
                Agenda dan kegiatan mendatang yang bisa kamu ikuti bersama kami.
            @else
                Ruang opini dan pemikiran kader untuk diskusi yang membangun.
            @endif
        </p>
    </div>
</div>

{{-- Content Section --}}
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($posts->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg transition-shadow group flex flex-col">
                        <div class="relative overflow-hidden h-48">
                            @if($post->image)
                                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-green-100 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 {{ $type === 'event' ? 'bg-yellow-400 text-green-900' : 'bg-green-700 text-white' }} text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wider">
                                {{ $label }}
                            </div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex items-center text-xs text-gray-500 mb-3 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $post->published_at->translatedFormat('d M Y') }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-green-700 transition-colors">
                                <a href="{{ route('info.show', [$type, $post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
                                {{ Str::limit(strip_tags($post->content), 150) }}
                            </p>
                            <a href="{{ route('info.show', [$type, $post->slug]) }}" class="inline-flex items-center text-sm font-medium text-green-700 hover:text-green-800 transition-colors mt-auto">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-20">
                <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                <h3 class="text-xl font-semibold text-gray-500 mb-2">Belum Ada {{ $label }}</h3>
                <p class="text-gray-400">Konten {{ strtolower($label) }} akan segera tersedia. Nantikan informasi terbaru dari kami!</p>
            </div>
        @endif

    </div>
</div>
@endsection
