<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Kaderisasi;

class KaderisasiController extends Controller
{
    public function index()
    {
        $user    = auth()->user();
        $profile = $user->memberProfile;
        $kaderisasiList = $user->kaderisasi()->orderBy('tanggal')->get()->keyBy('jenis');
        $labels  = Kaderisasi::labelJenis();
        $formal  = Kaderisasi::jenisForma();
        $nonFormal = Kaderisasi::jenisNonFormal();

        return view('member.kaderisasi.index', compact(
            'user', 'profile', 'kaderisasiList', 'labels', 'formal', 'nonFormal'
        ));
    }
}
