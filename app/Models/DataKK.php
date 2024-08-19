<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKK extends Model
{
    use HasFactory;
    protected $table = 'datakks';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['no_kk', 'alamat'];

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
    public function dataDiris()
    {
        return $this->belongsToMany(DataDiri::class, 'datadiri_datakks', 'dataKk_id', 'dataDiri_id');
    }
}
