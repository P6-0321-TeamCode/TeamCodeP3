<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table="class";
    protected $primaryKey="id_class";
    protected $fillable = [
        'id_teacher',
        'id_course',
        'id_schedule',
        'name',
        'color',
    ];


}
