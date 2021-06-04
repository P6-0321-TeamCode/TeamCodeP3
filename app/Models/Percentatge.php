<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percentatge extends Model
{
    use HasFactory;

    protected $table="percentatge";
    protected $primaryKey="id_percentatge";
    protected $fillable = [
        'id_course',
        'id_class',
        'continuous_assessment',
        'exams',
    ];

}
