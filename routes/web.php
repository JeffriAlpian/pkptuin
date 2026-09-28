<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = \App\Models\Post::published()
        ->whereIn('type', ['berita', 'event'])
        ->latest('published_at')
        ->limit(6)
        ->get();

    return view('welcome', compact('latestPosts'));
});

// Profil Routes
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sambutan', fn () => view('profil.sambutan'))->name('sambutan');
    Route::get('/sejarah', fn () => view('profil.sejarah'))->name('sejarah');
    Route::get('/visi-misi', fn () => view('profil.visi-misi'))->name('visi-misi');
    Route::get('/struktur-pengurus', fn () => view('profil.struktur'))->name('struktur');
});

// Info Routes (Berita, Event, Opini)
Route::get('/info/{type}', [InfoController::class, 'index'])
    ->whereIn('type', ['berita', 'event', 'opini'])
    ->name('info.index');

Route::get('/info/{type}/{slug}', [InfoController::class, 'show'])
    ->whereIn('type', ['berita', 'event', 'opini'])
    ->name('info.show');

// Galeri & Dokumen
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::get('/dokumen', [DocumentController::class, 'index'])->name('dokumen.index');

// Contact
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('contact.store');

// Auth & Member Routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman menunggu persetujuan
    Route::get('/approval-pending', function () {
        return view('approval.pending');
    })->name('approval.pending');

    // Member Routes (butuh approved)
    Route::middleware('approved')->group(function () {

        // Redirect /dashboard ke member dashboard
        Route::get('/dashboard', function () {
            if (request()->user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('member.dashboard');
        })->name('dashboard');

        // Member Area
        Route::prefix('member')->name('member.')->middleware('profile_complete')->group(function () {
            // Dashboard
            Route::get('/dashboard', [\App\Http\Controllers\Member\DashboardController::class, 'index'])->name('dashboard');
            // Kaderisasi
            Route::get('/kaderisasi', [\App\Http\Controllers\Member\KaderisasiController::class, 'index'])->name('kaderisasi.index');
            // Edit profil
            Route::get('/profile/edit', [\App\Http\Controllers\Member\ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile/edit', [\App\Http\Controllers\Member\ProfileController::class, 'update'])->name('profile.update');
        });

        // Onboarding (tidak perlu profile_complete)
        Route::prefix('member')->name('member.')->group(function () {
            Route::get('/profile/lengkapi', [\App\Http\Controllers\Member\ProfileController::class, 'create'])->name('profile.create');
            Route::post('/profile/lengkapi', [\App\Http\Controllers\Member\ProfileController::class, 'store'])->name('profile.store');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\KaderisasiController as AdminKaderisasiController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Kelola Anggota
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/approve', [AdminUserController::class, 'approve'])->name('users.approve');
    Route::delete('/users/{user}/reject', [AdminUserController::class, 'reject'])->name('users.reject');

    // Kelola Kaderisasi
    Route::resource('kaderisasi', AdminKaderisasiController::class);

    // Surat Masuk
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::patch('/contacts/{contact}/read', [AdminContactController::class, 'markAsRead'])->name('contacts.read');
    Route::patch('/contacts/{contact}/replied', [AdminContactController::class, 'markAsReplied'])->name('contacts.replied');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Kelola Berita & Event
    Route::post('/posts/generate-ai', [\App\Http\Controllers\Admin\AiController::class, 'generateNews'])->name('posts.generate-ai');
    Route::resource('posts', AdminPostController::class)->except(['show']);

    // Kelola Galeri
    Route::resource('galleries', AdminGalleryController::class)->only(['index', 'store', 'destroy']);

    // Kelola Dokumen
    Route::resource('documents', AdminDocumentController::class)->only(['index', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
