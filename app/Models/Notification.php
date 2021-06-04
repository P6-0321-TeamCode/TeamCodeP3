<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table="notifications";
    protected $primaryKey="id_notification";
    protected $fillable = [
        'id_student',
        'work',
        'exam',
        'continuos_assessment',
        'final_note',
    ];

}
