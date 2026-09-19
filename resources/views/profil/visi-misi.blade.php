@extends('layouts.front')

@section('title', 'Visi & Misi PKPT IPNU-IPPNU UIN Raden Intan Lampung')

@section('content')
<div class="bg-green-900 pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs><pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
            <rect width="100%" height="100%" fill="url(#grid-pattern)" />
        </svg>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="text-yellow-400 font-semibold uppercase tracking-wider text-sm mb-2 block">Profil</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Visi & Misi</h1>
        <p class="text-green-100 text-lg font-light">Arah gerak dan tujuan mulia organisasi dalam membina kader Nahdlatul Ulama.</p>
    </div>
</div>

<div class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Visi Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 md:p-16 text-center mb-16 relative">
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-yellow-400 w-16 h-16 rounded-full flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <h2 class="text-3xl font-bold text-green-800 mb-6 mt-4">Visi</h2>
            <p class="text-xl md:text-2xl text-gray-700 leading-relaxed font-light italic">
                "Terwujudnya kader IPNU-IPPNU yang bertaqwa kepada Allah SWT, berilmu, berakhlak mulia, berwawasan kebangsaan, serta bertanggung jawab atas tegaknya syariat Islam menurut faham Ahlussunnah wal Jama'ah An-Nahdliyah."
            </p>
        </div>

        <!-- Misi Section -->
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-green-700 rounded-lg flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Misi</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Misi Item 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                    <div class="text-4xl font-black text-gray-100 group-hover:text-green-50 absolute -z-0 right-6 top-6 transition-colors">01</div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold text-green-800 mb-3">Penguatan Aqidah & Spiritual</h3>
                        <p class="text-gray-600 leading-relaxed">Menanamkan, memelihara, dan memperkuat aqidah serta nilai-nilai Islam Ahlussunnah wal Jama'ah An-Nahdliyah di kalangan mahasiswa.</p>
                    </div>
                </div>

                <!-- Misi Item 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group relative overflow-hidden">
                    <div class="text-4xl font-black text-gray-100 group-hover:text-green-50 absolute z-0 right-6 top-6 transition-colors">02</div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold text-green-800 mb-3">Pengembangan Intelektual</h3>
                        <p class="text-gray-600 leading-relaxed">Meningkatkan kualitas intelektual, wawasan keilmuan, dan nalar kritis mahasiswa melalui tradisi literasi dan diskusi akademik.</p>
                    </div>
                </div>

                <!-- Misi Item 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group relative overflow-hidden">
                    <div class="text-4xl font-black text-gray-100 group-hover:text-green-50 absolute z-0 right-6 top-6 transition-colors">03</div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold text-green-800 mb-3">Pemberdayaan Potensi & Bakat</h3>
                        <p class="text-gray-600 leading-relaxed">Mewadahi dan memfasilitasi minat, bakat, serta kreativitas kader agar berkembang menjadi potensi yang berprestasi dan bermanfaat.</p>
                    </div>
                </div>

                <!-- Misi Item 4 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group relative overflow-hidden">
                    <div class="text-4xl font-black text-gray-100 group-hover:text-green-50 absolute z-0 right-6 top-6 transition-colors">04</div>
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold text-green-800 mb-3">Pengabdian & Kepedulian Sosial</h3>
                        <p class="text-gray-600 leading-relaxed">Menumbuhkan jiwa kepemimpinan, kepedulian sosial, dan peran aktif dalam mengabdi kepada agama, nusa, dan bangsa.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
