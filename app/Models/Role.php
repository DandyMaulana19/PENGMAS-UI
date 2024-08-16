<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsToMany(User::class, 'userroles', 'role_id', 'user_id');
    }
}
