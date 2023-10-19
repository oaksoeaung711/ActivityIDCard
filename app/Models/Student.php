<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'program_id',
        'batch_id',
        'name',
        'email',
        'phone',
        'guardianname',
        'dob',
        'emergencyphone1',
        'emergencyphone2',
        'schoolemergencyphone',
        'studentprofilepicture',
    ];
}
