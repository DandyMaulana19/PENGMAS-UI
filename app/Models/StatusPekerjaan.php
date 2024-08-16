<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'statuspekerjaans';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'nama_status'];

    public function dataDiris()
    {
        return $this->hasMany(DataDiri::class, 'id_status_pekerjaan');
    }
}
