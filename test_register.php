<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Delete existing user if exists
    \App\Models\User::where('email', 'jeffrialpian12@gmail.com')->delete();

    $user = \App\Models\User::create([
        'name' => 'Test Verifikasi',
        'email' => 'jeffrialpian12@gmail.com',
        'password' => bcrypt('password123'),
        'role' => 'anggota',
        'status' => 'pending'
    ]);
    
    echo "User created. Dispatching event...\n";
    event(new \Illuminate\Auth\Events\Registered($user));
    echo "Event dispatched!\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
