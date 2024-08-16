<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function dataDiri()
    {
        return $this->hasMany(DataDiri::class, 'id_status_pengajuan');
    }
}
