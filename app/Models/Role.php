<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
    // Define las propiedades y métodos aquí
}
