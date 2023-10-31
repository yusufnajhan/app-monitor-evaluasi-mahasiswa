<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenWali extends Model
{
    use HasFactory;

    protected $table = 'dosen_wali';
    protected $guarded = ['id'];
    public $timestamps = FALSE;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function jumlahMahasiswaWali()
    {
        return $this->mahasiswa()->count();
    }
}
