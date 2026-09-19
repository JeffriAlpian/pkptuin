<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Generate Users
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@pkptuinril.gmail.com',
            'password' => Hash::make('password01042018'), 
            'role' => 'admin',
            'status' => 'approved'
        ]);

        // Generate Posts
        // Post::factory(10)->create(['type' => 'berita']);
        // Post::factory(5)->create(['type' => 'event']);
        // Post::factory(5)->create(['type' => 'opini']);

        // Generate Galleries
        // for ($i = 1; $i <= 8; $i++) {
        //     Gallery::create([
        //         'title' => 'Kegiatan PKPT UIN RIL ' . $i,
        //         'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        //         'description' => 'Dokumentasi kegiatan organisasi yang dilaksanakan dengan sukses.',
        //     ]);
        // }

        // Generate Documents
        // for ($i = 1; $i <= 5; $i++) {
        //     Document::create([
        //         'title' => 'Peraturan Organisasi Bab ' . $i,
        //         'file_path' => '#',
        //         'size' => rand(1, 5) . ' MB',
        //         'description' => 'Dokumen resmi terkait aturan dan pedoman organisasi.',
        //     ]);
        // }
    }
}
