<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;

    protected $table = 'rws';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }
    public function adminRws()
    {
        return $this->hasMany(AdminRW::class);
    }
}
