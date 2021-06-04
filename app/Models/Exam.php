<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table="exams";
    protected $primaryKey="id_exam";
    protected $fillable = [
        'id_class',
        'id_student',
        'name',
        'mark',
    ];
}
