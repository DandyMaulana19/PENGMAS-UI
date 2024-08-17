<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $table = 'datadiris';
    public $incrementing = false;


    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'namaLengkap',
        'jenisKelamin',
        'tempatLahir',
        'tanggalLahir',
        'agama',
        'pendidikan',
        'namaPekerjaan',
        'alamatPekerjaan',
        'id_status_pekerjaan',
        'id_status_pengajuan',
        'id_status_users'
    ];

    protected $casts = [
        'tanggalLahir' => 'datetime',
    ];

    public function statusPekerjaan()
    {
        return $this->belongsTo(StatusPekerjaan::class, 'id_status_pekerjaan');
    }

    public function statusPengajuan()
    {
        return $this->belongsTo(StatusPengajuan::class, 'id_status_pengajuan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_status_users');
    }
}
