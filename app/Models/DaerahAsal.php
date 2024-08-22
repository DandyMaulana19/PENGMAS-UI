<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahAsal extends Model
{
    use HasFactory;
    protected $primaryKey = 'dataDiri_id';
    protected $table = 'daerahasals';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'dataDiri_id',
        'alamat',
        'namaRt',
        'namaRw',
        'namaKelurahan',
        'namaKecamatan',
        'namaKabupaten',
        'namaProvinsi',
    ];

    public function dataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'dataDiri_id');
    }
}
