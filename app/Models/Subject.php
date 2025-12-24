<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Welke tutors geven dit vak
    public function tutors()
    {
        return $this->belongsToMany(User::class);
    }

    // Welke studenten volgen dit vak
    public function students()
    {
        return $this->belongsToMany(User::class)->where('role', 'student');
    }
}