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
        'campus',
        'guardianname',
        'dob',
        'emergencyphone1',
        'emergencyphone2',
        'schoolemergencyphone',
        'studentprofilepicture',
        'dateofissue',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
