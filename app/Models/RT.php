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


    public function rw()
    {
        return $this->belongsTo(RW::class, 'rw_id');
    }
}
