<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRT extends Model
{
    use HasFactory;
    protected $table = 'adminrts';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rt()
    {
        return $this->belongsTo(RT::class);
    }
}
