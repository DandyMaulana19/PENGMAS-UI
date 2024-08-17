<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahTujuan extends Model
{
    protected $table = 'daerahtujuans';
    use HasFactory;
    protected $primaryKey = 'dataDiri_id';
    public $incrementing = false;

    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'dataDiri_id');
    }
}
