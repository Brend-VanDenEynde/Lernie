<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id',
        'subject_id',
        'description',
        'start_time',
        'duration_minutes',
        'location',
        'price',
        'is_active',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    // Les hoort bij Tutor 
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // Les gaat over een Vak 
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Studenten die ingeschreven zijn voor deze les
    public function enrolledStudents()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}