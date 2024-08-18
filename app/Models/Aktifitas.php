<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'status',
        'catatan',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
