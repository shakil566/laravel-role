<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_role';
    protected $fillable =[
        'id', 'user_id', 'role',
    ];


    public function roles {
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }
}

