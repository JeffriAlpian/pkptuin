@extends('layouts.front')

@section('title', 'Dokumen — PKPT IPNU IPPNU UIN Raden Intan Lampung')

@section('content')
{{-- Hero Section --}}
<div class="bg-green-900 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-yellow-400 font-semibold uppercase tracking-wider text-sm mb-2 block">Arsip</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Dokumen Resmi</h1>
        <p class="text-green-100 text-lg font-light">Kumpulan dokumen, peraturan, dan berkas resmi organisasi PKPT IPNU IPPNU UIN Raden Intan Lampung.</p>
    </div>
</div>

{{-- Document List --}}
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($documents->count())
            <div class="space-y-4">
                @foreach($documents as $document)
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow p-6 flex items-start gap-5">
                        {{-- Icon --}}
                        <div class="w-14 h-14 bg-red-50 text-red-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>

                        {{-- Details --}}
                        <div class="flex-grow min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $document->title }}</h3>
                            @if($document->description)
                                <p class="text-sm text-gray-500 mb-2 line-clamp-2">{{ $document->description }}</p>
                            @endif
                            <div class="flex items-center gap-4 text-xs text-gray-400">
                                @if($document->size)
                                    <span class="flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        {{ $document->size }}
                                    </span>
                                @endif
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $document->created_at->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>

                        {{-- Download Button --}}
                        <a href="{{ $document->file_path }}" target="_blank" class="flex-shrink-0 inline-flex items-center px-4 py-2.5 bg-green-700 hover:bg-green-800 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Unduh
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $documents->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-20">
                <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                <h3 class="text-xl font-semibold text-gray-500 mb-2">Belum Ada Dokumen</h3>
                <p class="text-gray-400">Dokumen organisasi akan segera tersedia untuk diunduh.</p>
            </div>
        @endif

    </div>
</div>
@endsection
