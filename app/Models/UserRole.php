<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'userroles';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'role_id',
    ];
}