<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRT extends Model
{
    use HasFactory;
    protected $table = 'adminrts';
    public $incrementing = false;
}
