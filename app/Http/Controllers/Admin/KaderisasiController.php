<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kaderisasi;
use App\Models\User;
use Illuminate\Http\Request;

class KaderisasiController extends Controller
{
    public function index()
    {
        $kaderisasi = Kaderisasi::with('user.memberProfile')->latest()->paginate(15);
        $users = User::where('role', 'anggota')->where('status', 'approved')->get();
        return view('admin.kaderisasi.index', compact('kaderisasi', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'jenis' => 'required|in:makesta,lakmud,lakut,laknas,latin_1,latin_2',
            'status' => 'required|in:lulus,tidak_lulus,belum',
            'keterangan' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
        ]);

        Kaderisasi::create($validated);
        return back()->with('success', 'Data kaderisasi berhasil ditambahkan.');
    }

    public function update(Request $request, Kaderisasi $kaderisasi)
    {
        $validated = $request->validate([
            'status' => 'required|in:lulus,tidak_lulus,belum',
            'keterangan' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
        ]);

        $kaderisasi->update($validated);
        return back()->with('success', 'Data kaderisasi berhasil diperbarui.');
    }

    public function destroy(Kaderisasi $kaderisasi)
    {
        $kaderisasi->delete();
        return back()->with('success', 'Data kaderisasi berhasil dihapus.');
    }
}
