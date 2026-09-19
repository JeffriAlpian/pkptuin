<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nik', 'nia', 'nama_lengkap', 'tempat_lahir',
        'tanggal_lahir', 'no_hp', 'foto', 'npm', 'fakultas', 'prodi',
        'angkatan', 'angkatan_makesta', 'status_keaktifan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Generate NIA otomatis: PKPT-[TAHUN]-[4DIGIT_ID]
     */
    public static function generateNia(int $id): string
    {
        return 'PKPT-' . date('Y') . '-' . str_pad($id, 4, '0', STR_PAD_LEFT);
    }

    public function getUmurAttribute(): int
    {
        return $this->tanggal_lahir ? $this->tanggal_lahir->age : 0;
    }
}
