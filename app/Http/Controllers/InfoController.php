<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class InfoController extends Controller
{
    /**
     * Display a listing of posts filtered by type.
     */
    public function index(string $type): View
    {
        $posts = Post::byType($type)
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $labels = [
            'berita' => 'Berita',
            'event'  => 'Event',
            'opini'  => 'Opini',
        ];

        return view('info.index', [
            'posts' => $posts,
            'type'  => $type,
            'label' => $labels[$type] ?? ucfirst($type),
        ]);
    }

    /**
     * Display a single post detail.
     */
    public function show(string $type, string $slug): View
    {
        $post = Post::byType($type)
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = Post::byType($type)
            ->published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(5)
            ->get();

        $labels = [
            'berita' => 'Berita',
            'event'  => 'Event',
            'opini'  => 'Opini',
        ];

        return view('info.show', [
            'post'         => $post,
            'relatedPosts' => $relatedPosts,
            'type'         => $type,
            'label'        => $labels[$type] ?? ucfirst($type),
        ]);
    }
}
