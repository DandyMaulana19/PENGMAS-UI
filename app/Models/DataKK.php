<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKK extends Model
{
    use HasFactory;
    protected $table = 'datakks';
    protected $primaryKey = 'id';

    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
}
