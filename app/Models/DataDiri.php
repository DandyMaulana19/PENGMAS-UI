<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $table = 'datadiris';

    protected $primaryKey = 'id';

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
