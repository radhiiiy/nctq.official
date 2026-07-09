<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
        'nama_ayah', 'nama_ibu', 'no_hp', 'email', 'alamat', 'asal_sekolah', 'program',
        'status', 'catatan_admin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Ppdb $ppdb) {
            if (empty($ppdb->no_pendaftaran)) {
                $ppdb->no_pendaftaran = 'PPDB-'.date('Y').'-'.str_pad((string) (static::whereYear('created_at', date('Y'))->count() + 1), 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
