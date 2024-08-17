<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    use HasFactory;
    protected $table = 'statuspengajuans';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'nama_status'];

    public function dataDiri()
    {
        return $this->hasMany(DataDiri::class, 'id_status_pengajuan');
    }
}
