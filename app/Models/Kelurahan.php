<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
    public function adminkelurahan()
    {
        return $this->hasMany(AdminKelurahan::class);
    }
}
