<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRW extends Model
{
    use HasFactory;
    protected $table = 'adminrws';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rw()
    {
        return $this->belongsTo(RW::class);
    }
}
