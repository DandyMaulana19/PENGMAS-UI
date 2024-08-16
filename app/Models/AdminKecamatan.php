<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKecamatan extends Model
{
    use HasFactory;
    protected $table = 'adminkecamatans';
    public $timestamps = false;
}
