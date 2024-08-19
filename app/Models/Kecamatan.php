<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function adminKecamatans()
    {
        return $this->hasMany(AdminKecamatan::class);
    }
}
