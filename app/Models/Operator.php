<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $table = 'operator';
    protected $guarded = ['id'];
    public $timestamps = FALSE;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
