<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahTujuan extends Model
{
    use HasFactory;
    protected $primaryKey = 'dataDiri_id';

    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'dataDiri_id');
    }
}
