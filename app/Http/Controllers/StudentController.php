<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Show all available lessons for the student
     */
    public function lessons()
    {
        $user = Auth::user();
        
        // Get the subjects the student is enrolled in
        $subjectIds = $user->subjects->pluck('id');
        
        // Get all active lessons for those subjects (removed future-only filter)
        $lessons = Lesson::whereIn('subject_id', $subjectIds)
            ->where('is_active', true)
            ->with(['subject', 'tutor'])
            ->orderBy('start_time')
            ->get();
        
        // Get all subjects with their tutors for filtering
        $subjects = Subject::whereIn('id', $subjectIds)
            ->with('tutors')
            ->get();
        
        return view('student.lessons.index', compact('lessons', 'subjects'));
    }

    /**
     * Show detailed information about a specific lesson
     */
    public function showLesson(Lesson $lesson)
    {
        // Load the lesson with its relationships
        $lesson->load(['subject', 'tutor']);
        
        // Check if current user is enrolled
        $isEnrolled = $lesson->enrolledStudents()->where('user_id', Auth::id())->exists();
        
        return view('student.lessons.show', compact('lesson', 'isEnrolled'));
    }

    /**
     * Enroll student in a lesson
     */
    public function enroll(Lesson $lesson)
    {
        $user = Auth::user();
        
        // Check if already enrolled
        if ($lesson->enrolledStudents()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('info', 'Je bent al ingeschreven voor deze les.');
        }
        
// Enroll the student
        $lesson->enrolledStudents()->attach($user->id);
        
        return redirect()->back()->with('success', 'Je bent succesvol ingeschreven voor deze les!');
    }

    /**
     * Unenroll student from a lesson
     */
    public function unenroll(Lesson $lesson)
    {
        $user = Auth::user();
        
        // Unenroll the student
        $lesson->enrolledStudents()->detach($user->id);
        
        return redirect()->back()->with('success', 'Je bent uitgeschreven voor deze les.');
    }

    /**
     * Show student's enrolled lessons
     */
    public function myEnrollments()
    {
        $user = Auth::user();
        
        // Get all lessons the student is enrolled in
        $enrolledLessons = $user->enrolledLessons()
            ->with(['subject', 'tutor'])
            ->orderBy('start_time')
            ->get();
        
        return view('student.enrollments.index', compact('enrolledLessons'));
    }
}
