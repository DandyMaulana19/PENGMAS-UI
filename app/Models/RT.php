<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $table = 'rts';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function rw()
    {
        return $this->belongsTo(RW::class, 'rw_id');
    }
    public function adminRts()
    {
        return $this->hasMany(AdminRT::class);
    }
}
