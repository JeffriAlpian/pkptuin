<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Hanya tampilkan akun anggota yang sudah memverifikasi email
        $users = User::where('id', '!=', auth()->id())
                    ->where('role', '!=', User::ROLE_ADMIN)
                    ->whereNotNull('email_verified_at')
                    ->latest()
                    ->paginate(15);
        
        return view('admin.users.index', compact('users'));
    }

    public function approve(User $user)
    {
        if ($user->isAdmin()) {
            abort(403, 'Tidak bisa mengubah status admin lain.');
        }

        $user->status = User::STATUS_APPROVED;
        $user->save();

        return back()->with('success', 'Akun ' . $user->name . ' berhasil disetujui (Approved).');
    }

    public function reject(User $user)
    {
        if ($user->isAdmin()) {
            abort(403, 'Tidak bisa menghapus admin lain.');
        }

        // Hapus akun atau set rejected
        $user->delete();
        return back()->with('success', 'Akun berhasil ditolak dan dihapus.');
    }
}
