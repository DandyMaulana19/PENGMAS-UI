<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function rw()
    {
        return $this->belongsTo(RW::class, 'rw_id');
    }
}
