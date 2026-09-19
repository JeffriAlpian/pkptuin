@extends('layouts.front')

@section('title', 'Struktur Pengurus PKPT IPNU-IPPNU UIN Raden Intan Lampung')

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
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Struktur Pengurus</h1>
        <p class="text-green-100 text-lg font-light">Susunan kepengurusan PKPT IPNU-IPPNU UIN Raden Intan Lampung Masa Khidmat 2026-2027.</p>
    </div>
</div>

<div class="py-20 bg-gray-50" x-data="{ tab: 'ipnu' }">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Tab Navigation -->
        <div class="flex justify-center mb-16">
            <div class="inline-flex bg-white rounded-lg p-1 border border-gray-200 shadow-sm">
                <button @click="tab = 'ipnu'" :class="tab === 'ipnu' ? 'bg-green-700 text-white shadow-sm' : 'bg-transparent text-gray-600 hover:text-green-700'" class="px-8 py-3 rounded-md font-medium text-sm transition-colors">IPNU</button>
                <button @click="tab = 'ippnu'" :class="tab === 'ippnu' ? 'bg-green-700 text-white shadow-sm' : 'bg-transparent text-gray-600 hover:text-green-700'" class="px-8 py-3 rounded-md font-medium text-sm transition-colors">IPPNU</button>
            </div>
        </div>

        <!-- IPNU SECTION -->
        <div x-show="tab === 'ipnu'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
            <!-- BPH IPNU -->
            <div class="mb-20">
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-12 relative">
                    <span class="bg-gray-50 px-4 relative z-10">Badan Pengurus Harian (BPH) IPNU</span>
                    <div class="absolute left-0 top-1/2 w-full h-px bg-gray-300 -z-0"></div>
                </h2>
                
                <div class="flex flex-col items-center">
                    <!-- Ketua IPNU -->
                    <div class="mb-12">
                        <div class="bg-white w-72 p-6 rounded-xl shadow-md border-t-4 border-yellow-400 text-center flex flex-col items-center">
                            <div class="w-24 h-24 bg-gray-200 rounded-full mb-4 overflow-hidden">
                                <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg">Eka Nopianto</h3>
                            <p class="text-green-700 text-sm font-medium">Ketua</p>
                        </div>
                    </div>
                    
                    <!-- Wakil Ketua IPNU -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full mb-12">
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Bahzuri Azka</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua I</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Muhammad Jefri Alfian</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua II</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Muhammad Luthfi Aziz</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua III</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Althaf Qistan Danarsa</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua IV</p>
                        </div>
                    </div>

                    <!-- Sekretaris & Bendahara IPNU -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 w-full max-w-4xl">
                        <!-- Sekretaris -->
                        <div class="flex flex-col gap-4">
                            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-600 text-center flex flex-col items-center">
                                <div class="w-20 h-20 bg-gray-200 rounded-full mb-4 overflow-hidden">
                                    <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <h3 class="font-bold text-gray-900 text-lg">Didik Sanyoto</h3>
                                <p class="text-gray-500 text-sm font-medium">Sekretaris</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm text-center">
                                <h3 class="font-bold text-gray-900">Ariez Gilang Al-Fathan</h3>
                                <p class="text-gray-500 text-xs font-medium">Wakil Sekretaris</p>
                            </div>
                        </div>
                        
                        <!-- Bendahara -->
                        <div class="flex flex-col gap-4">
                            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-600 text-center flex flex-col items-center">
                                <div class="w-20 h-20 bg-gray-200 rounded-full mb-4 overflow-hidden">
                                    <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <h3 class="font-bold text-gray-900 text-lg">Muhammad Akbar Nugraha</h3>
                                <p class="text-gray-500 text-sm font-medium">Bendahara</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm text-center">
                                <h3 class="font-bold text-gray-900">Agung Zikriansyah</h3>
                                <p class="text-gray-500 text-xs font-medium">Wakil Bendahara</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Departemen IPNU -->
            <div>
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-12 relative">
                    <span class="bg-gray-50 px-4 relative z-10">Departemen & Lembaga IPNU</span>
                    <div class="absolute left-0 top-1/2 w-full h-px bg-gray-300 -z-0"></div>
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Organisasi</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Ahmad Nabilly Azzaki</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Ahmad Ridho</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Raihan Firdaus</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Bobby Al-Fatir Siswandi</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Kaderisasi</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Rois Fathoni</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Ersan Junanda</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Muhammad Fatih Al-Huda</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Aditia Yudistira</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Dakwah</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Agung Saputra</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Muhammad Faisal</span></li>
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Olahraga, Seni & Budaya</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Aldes Kurniawan</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Thovek Saputra</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Jankyz Zona Rizky A</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Lembaga Komunikasi Perguruan Tinggi</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Suryadi</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">M. Zaki Agustaf Sigit</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Lembaga Ekonomi (LEKAS)</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Hasan Rifa'i</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Rifky Anggara</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Lembaga Pers & Penerbitan</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Farhan Zida Efendi</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Anas Saputra</span></li>
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Corp Brigade Pembangunan (CBP)</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Komandan</span><span class="font-medium text-gray-800">Agung Karunia</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- IPPNU SECTION -->
        <div x-show="tab === 'ippnu'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
            <!-- BPH IPPNU -->
            <div class="mb-20">
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-12 relative">
                    <span class="bg-gray-50 px-4 relative z-10">Badan Pengurus Harian (BPH) IPPNU</span>
                    <div class="absolute left-0 top-1/2 w-full h-px bg-gray-300 -z-0"></div>
                </h2>
                
                <div class="flex flex-col items-center">
                    <!-- Ketua IPPNU -->
                    <div class="mb-12">
                        <div class="bg-white w-72 p-6 rounded-xl shadow-md border-t-4 border-yellow-400 text-center flex flex-col items-center">
                            <div class="w-24 h-24 bg-gray-200 rounded-full mb-4 overflow-hidden">
                                <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg">Zulul Mudrikatul Hamidah</h3>
                            <p class="text-green-700 text-sm font-medium">Ketua</p>
                        </div>
                    </div>
                    
                    <!-- Wakil Ketua IPPNU -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full mb-12">
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Halimatul Haniva</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua I</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Riska Rusniawati</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua II</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Sindi Apriyanti</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua III</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-600 text-center">
                            <h3 class="font-bold text-gray-900">Citra Arum</h3>
                            <p class="text-gray-500 text-xs font-medium">Wakil Ketua IV</p>
                        </div>
                    </div>

                    <!-- Sekretaris & Bendahara IPPNU -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 w-full max-w-4xl">
                        <!-- Sekretaris -->
                        <div class="flex flex-col gap-4">
                            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-600 text-center flex flex-col items-center">
                                <div class="w-20 h-20 bg-gray-200 rounded-full mb-4 overflow-hidden">
                                    <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <h3 class="font-bold text-gray-900 text-lg">Nurifda Qothrunnada Sholih</h3>
                                <p class="text-gray-500 text-sm font-medium">Sekretaris</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm text-center">
                                <h3 class="font-bold text-gray-900">Syiva Rahma Faizah</h3>
                                <p class="text-gray-500 text-xs font-medium">Wakil Sekretaris</p>
                            </div>
                        </div>
                        
                        <!-- Bendahara -->
                        <div class="flex flex-col gap-4">
                            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-600 text-center flex flex-col items-center">
                                <div class="w-20 h-20 bg-gray-200 rounded-full mb-4 overflow-hidden">
                                    <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <h3 class="font-bold text-gray-900 text-lg">Aulia Rahmawati</h3>
                                <p class="text-gray-500 text-sm font-medium">Bendahara</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm text-center">
                                <h3 class="font-bold text-gray-900">Tri Wahyulin</h3>
                                <p class="text-gray-500 text-xs font-medium">Wakil Bendahara</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Departemen IPPNU -->
            <div>
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-12 relative">
                    <span class="bg-gray-50 px-4 relative z-10">Departemen & Lembaga IPPNU</span>
                    <div class="absolute left-0 top-1/2 w-full h-px bg-gray-300 -z-0"></div>
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Organisasi</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Silvia Nurmutia Sari</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Aulia Nufus</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Alya Nurunnafisah</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Kaderisasi</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Sahara Warda Atsari</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Ayu Noviana</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Riatul Jannah</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Dakwah & Keagamaan</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Ica Dawiyah</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Desi Fitriani</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Sarah Husna</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Nesya Fani Desti</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Dewi Saputri</span></li>
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Dept. Olahraga, Seni & Budaya</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Velly Merista Fajriani</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Feni Wilia Sari</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Faridatun Azizah</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Elsa Melinda</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Lembaga Pers & Penerbitan</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Ajeng Tri Andini</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Agum Anggelina</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Siti Rohmatin</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Dita Kusniati</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Lembaga Ekonomi (LEKAS)</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Maesa Ayu Lestari</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Faiz Alifatur Rifda</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Ferda Annisa Tullah</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Fina Dwi Lestari</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Lembaga Komunikasi Perguruan Tinggi</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Dwi Nur Anisah Aprilia Rini</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Khoirunnida Rahmadani</span></li>
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-green-800 border-b border-gray-100 pb-3 mb-4">Korps Pelajar Putri (KPP)</h3>
                        <ul class="space-y-3">
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Koordinator</span><span class="font-medium text-gray-800">Euis Enjelina</span></li>
                            <li class="flex flex-col"><span class="text-gray-400 text-xs uppercase tracking-wider mb-1">Anggota</span><span class="text-gray-600">Dina Suaibah</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Add Alpine.js for Tabs -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
