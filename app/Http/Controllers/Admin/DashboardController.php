<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pending_users' => User::where('status', 'pending')->count(),
            'total_users' => User::count(),
            'total_berita' => Post::where('type', 'berita')->count(),
            'total_event' => Post::where('type', 'event')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
