<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guarded = ['id'];
    public $timestamps = FALSE;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dosenWali()
    {
        return $this->belongsTo(DosenWali::class);
    }

    public function isianRencanaSemester()
    {
        return $this->hasMany(IsianRencanaSemester::class);
    }

    public function hitungSemester()
    {
        $tahunSaatIni = date('Y');
        $angkatan = $this->angkatan;

        $tahunTempuh = $tahunSaatIni - $angkatan;
        $semester = $tahunTempuh * 2;

        $bulanSaatIni = date('m');
        if ($bulanSaatIni >= 8 || $bulanSaatIni == 1)
            $semester += 1;

        return $semester;
    }
}
