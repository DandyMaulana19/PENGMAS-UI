<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DataKK extends Model
{
    use HasFactory;
    protected $table = 'datakks';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['no_kk', 'alamat', 'rt_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
    public function dataDiris()
    {
        return $this->belongsToMany(DataDiri::class, 'datadiri_datakks', 'dataKk_id', 'dataDiri_id');
    }
}
