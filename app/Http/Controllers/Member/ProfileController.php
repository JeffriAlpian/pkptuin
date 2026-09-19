<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Kaderisasi;
use App\Models\MemberProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        // If profile already exists, redirect to edit
        if ($user->hasCompleteProfile()) {
            return redirect()->route('member.profile.edit');
        }

        return view('member.profile.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nik'             => 'nullable|string|size:16',
            'tempat_lahir'    => 'nullable|string|max:100',
            'tanggal_lahir'   => 'nullable|date|before:today',
            'no_hp'           => 'nullable|string|max:15',
            'npm'             => 'nullable|string|max:20',
            'fakultas'        => 'nullable|string|max:100',
            'prodi'           => 'nullable|string|max:100',
            'angkatan'        => 'nullable|digits:4',
            'angkatan_makesta'=> 'nullable|string|max:100',
            'foto'            => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
            // kaderisasi
            'kaderisasi'      => 'nullable|array',
            'kaderisasi.*.jenis' => 'required|in:makesta,lakmud,lakut,laknas,latin_1,latin_2',
            'kaderisasi.*.status'=> 'required|in:lulus,tidak_lulus,belum',
            'kaderisasi.*.keterangan' => 'nullable|string|max:255',
            'kaderisasi.*.tanggal'    => 'nullable|date',
        ]);

        // Handle foto upload
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = '/storage/' . $request->file('foto')->store('member/photos', 'public');
        }

        // Create profile
        $profile = MemberProfile::create([
            'user_id'          => $user->id,
            'nama_lengkap'     => $validated['nama_lengkap'],
            'nik'              => $validated['nik'] ?? null,
            'tempat_lahir'     => $validated['tempat_lahir'] ?? null,
            'tanggal_lahir'    => $validated['tanggal_lahir'] ?? null,
            'no_hp'            => $validated['no_hp'] ?? null,
            'npm'              => $validated['npm'] ?? null,
            'fakultas'         => $validated['fakultas'] ?? null,
            'prodi'            => $validated['prodi'] ?? null,
            'angkatan'         => $validated['angkatan'] ?? null,
            'angkatan_makesta' => $validated['angkatan_makesta'] ?? null,
            'foto'             => $fotoPath,
        ]);

        // Auto-generate NIA setelah profile tersimpan
        $profile->update(['nia' => MemberProfile::generateNia($profile->id)]);

        // Simpan data kaderisasi yang dipilih
        if (!empty($validated['kaderisasi'])) {
            foreach ($validated['kaderisasi'] as $kad) {
                if ($kad['status'] !== 'belum') {
                    Kaderisasi::create([
                        'user_id'    => $user->id,
                        'jenis'      => $kad['jenis'],
                        'status'     => $kad['status'],
                        'keterangan' => $kad['keterangan'] ?? null,
                        'tanggal'    => $kad['tanggal'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('member.dashboard')
            ->with('success', 'Profil berhasil dilengkapi! NIA Anda: ' . $profile->nia);
    }

    public function edit()
    {
        $user    = auth()->user();
        $profile = $user->memberProfile;
        $kaderisasiList = $user->kaderisasi()->get()->keyBy('jenis');

        return view('member.profile.edit', compact('user', 'profile', 'kaderisasiList'));
    }

    public function update(Request $request)
    {
        $user    = auth()->user();
        $profile = $user->memberProfile;

        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nik'             => 'nullable|string|size:16',
            'tempat_lahir'    => 'nullable|string|max:100',
            'tanggal_lahir'   => 'nullable|date|before:today',
            'no_hp'           => 'nullable|string|max:15',
            'npm'             => 'nullable|string|max:20',
            'fakultas'        => 'nullable|string|max:100',
            'prodi'           => 'nullable|string|max:100',
            'angkatan'        => 'nullable|digits:4',
            'angkatan_makesta'=> 'nullable|string|max:100',
            'foto'            => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = '/storage/' . $request->file('foto')->store('member/photos', 'public');
        }

        $profile->update($validated);

        return back()->with('success', 'Data profil berhasil diperbarui.');
    }
}
