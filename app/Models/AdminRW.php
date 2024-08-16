<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRW extends Model
{
    use HasFactory;
    protected $table = 'adminrws';
    public $timestamps = false;
}
