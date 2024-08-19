<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKelurahan extends Model
{
    use HasFactory;
    protected $table = 'adminkelurahans';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
