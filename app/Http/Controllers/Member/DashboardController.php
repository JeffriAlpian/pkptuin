<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user    = auth()->user();
        $profile = $user->memberProfile;
        $kaderisasiList = $user->kaderisasi()->orderBy('tanggal')->get()->keyBy('jenis');

        return view('member.dashboard', compact('user', 'profile', 'kaderisasiList'));
    }
}
