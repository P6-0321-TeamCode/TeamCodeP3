<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_admin extends Model
{
    use HasFactory;

    protected $table="users_admin";
    protected $primaryKey="id_user_admin";
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];
}
