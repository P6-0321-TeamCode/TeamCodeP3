<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table="works";
    protected $primaryKey="id_work";
    protected $fillable = [
        'id_work',
        'id_class',
        'id_student',
        'name',
        'mark',
    ];

}
