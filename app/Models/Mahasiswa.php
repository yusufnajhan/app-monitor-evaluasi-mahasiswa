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

    public function kartuHasilStudi()
    {
        return $this->hasMany(KartuHasilStudi::class);
    }

    public function progresPraktikKerjaLapangan()
    {
        return $this->hasOne(ProgresPraktikKerjaLapangan::class);
    }

    public function progresSkripsi()
    {
        return $this->hasOne(ProgresSkripsi::class);
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

    public function getNamaProvinsi()
    {
        $kode = $this->provinsi;

        $provinsi = Provinsi::where('kode_prov', $kode)
            ->select('nama_prov')
            ->first();
        return $provinsi->nama_prov;
    }

    public function getNamaKabupaten()
    {
        $kode = $this->kota;

        $kabupaten = Kabupaten::where('kode_kab', $kode)
            ->select('nama_kab')
            ->first();

        return $kabupaten->nama_kab;
    }
}
