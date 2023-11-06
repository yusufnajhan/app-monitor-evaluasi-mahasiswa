<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresPraktikKerjaLapangan extends Model
{
    use HasFactory;

    protected $table = 'progres_praktik_kerja_lapangan';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function statusPersetujuan()
    {
        $statusBiner = $this->sudah_disetujui;
        if (!isset($statusBiner)) {
            return 'Belum diisi';
        } else {
            return $statusBiner == 0 ? 'Belum disetujui' : 'Sudah disetujui';
        }
    }
}
