<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiriDataKK extends Model
{
    use HasFactory;

    protected $table = 'datadiri_datakks';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['dataDiri_id', 'dataKk_id'];

    public function DataDiri()
    {
        return $this->belongsTo(DataDiri::class, 'dataDiri_id');
    }
    public function DataKK()
    {
        return $this->belongsTo(DataKK::class, 'dataKk_id');
    }
}
