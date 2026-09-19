@extends('layouts.front')

@section('title', $post->title . ' — PKPT IPNU IPPNU UIN Raden Intan Lampung')

@section('content')
{{-- Hero Section --}}
<div class="bg-green-900 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex items-center justify-center gap-3 mb-4">
            <span class="inline-block {{ $type === 'event' ? 'bg-yellow-400 text-green-900' : 'bg-green-700 text-white' }} text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wider">
                {{ $label }}
            </span>
            <span class="text-green-200 text-sm">{{ $post->published_at->translatedFormat('d F Y') }}</span>
        </div>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">{{ $post->title }}</h1>
    </div>
</div>

{{-- Content Section --}}
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Back Button --}}
                <a href="{{ route('info.index', $type) }}" class="inline-flex items-center text-sm font-medium text-green-700 hover:text-green-800 transition-colors mb-8">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke {{ $label }}
                </a>

                {{-- Featured Image --}}
                @if($post->image)
                    <div class="rounded-xl overflow-hidden mb-8">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[400px]">
                    </div>
                @endif

                {{-- Article Content --}}
                <article class="prose prose-lg prose-green max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </article>

                {{-- Share & Meta --}}
                <div class="mt-12 pt-8 border-t border-gray-100 flex flex-wrap items-center gap-4">
                    <span class="text-sm text-gray-500">Dipublikasikan pada {{ $post->published_at->translatedFormat('d F Y, H:i') }} WIB</span>
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">{{ $label }} Terbaru</h3>

                    @if($relatedPosts->count())
                        <div class="space-y-6">
                            @foreach($relatedPosts as $related)
                                <a href="{{ route('info.show', [$type, $related->slug]) }}" class="group flex gap-4">
                                    @if($related->image)
                                        <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                            <img src="{{ $related->image }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        </div>
                                    @else
                                        <div class="w-20 h-20 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-green-700 transition-colors leading-snug line-clamp-2">{{ $related->title }}</h4>
                                        <span class="text-xs text-gray-400 mt-1 block">{{ $related->published_at->translatedFormat('d M Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-400">Belum ada {{ strtolower($label) }} lainnya.</p>
                    @endif

                    {{-- Quick Links --}}
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">Kategori Info</h4>
                        <div class="space-y-2">
                            <a href="{{ route('info.index', 'berita') }}" class="block text-sm {{ $type === 'berita' ? 'text-green-700 font-semibold' : 'text-gray-500 hover:text-green-700' }} transition-colors">Berita</a>
                            <a href="{{ route('info.index', 'event') }}" class="block text-sm {{ $type === 'event' ? 'text-green-700 font-semibold' : 'text-gray-500 hover:text-green-700' }} transition-colors">Event</a>
                            <a href="{{ route('info.index', 'opini') }}" class="block text-sm {{ $type === 'opini' ? 'text-green-700 font-semibold' : 'text-gray-500 hover:text-green-700' }} transition-colors">Opini</a>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection
