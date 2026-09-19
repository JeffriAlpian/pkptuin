<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaderisasi extends Model
{
    use HasFactory;

    protected $table = 'kaderisasi';

    protected $fillable = [
        'user_id', 'jenis', 'status', 'keterangan', 'tanggal', 'sertifikat',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public static function labelJenis(): array
    {
        return [
            'makesta'  => 'Makesta (Masa Kesetiaan Anggota)',
            'lakmud'   => 'Lakmud (Latihan Kader Muda)',
            'lakut'    => 'Lakut (Latihan Kader Utama)',
            'laknas'   => 'Laknas (Latihan Kader Nasional)',
            'latin_1'  => 'Latin 1 (Pelatihan Non-Formal 1)',
            'latin_2'  => 'Latin 2 (Pelatihan Non-Formal 2)',
        ];
    }

    public static function jenisForma(): array
    {
        return ['makesta', 'lakmud', 'lakut', 'laknas'];
    }

    public static function jenisNonFormal(): array
    {
        return ['latin_1', 'latin_2'];
    }
}
