<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Toon alle lessen van de ingelogde tutor
     */
    public function index()
    {
        $lessons = Lesson::where('tutor_id', Auth::id())
            ->with('subject')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('lessons.index', compact('lessons'));
    }

    /**
     * Display the specified lesson with enrollment details
     */
    public function show(Lesson $lesson)
    {
        // Ensure the lesson belongs to the authenticated tutor
        if ($lesson->tutor_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Load relationships
        $lesson->load(['subject', 'enrolledStudents']);

        return view('lessons.show', compact('lesson'));
    }

    /**
     * Toon het formulier voor het aanmaken van een nieuwe les
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('lessons.create', compact('subjects'));
    }

    /**
     * Sla een nieuwe les op
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'description' => 'nullable|string|max:1000',
            'start_time' => 'required|date|after:now',
            'duration_minutes' => 'required|integer|min:15|max:480',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:9999.99',
            'is_active' => 'boolean',
        ]);

        $validated['tutor_id'] = Auth::id();

        Lesson::create($validated);

        return redirect()->route('lessons.index')->with('success', 'Les succesvol aangemaakt.');
    }

    /**
     * Toon het formulier voor het bewerken van een les
     */
    public function edit(Lesson $lesson)
    {
        // Zorg ervoor dat alleen de tutor zijn eigen les kan bewerken
        if ($lesson->tutor_id !== Auth::id()) {
            abort(403, 'Je mag deze les niet bewerken.');
        }

        $subjects = Subject::all();
        return view('lessons.edit', compact('lesson', 'subjects'));
    }

    /**
     * Update een bestaande les
     */
    public function update(Request $request, Lesson $lesson)
    {
        // Zorg ervoor dat alleen de tutor zijn eigen les kan bijwerken
        if ($lesson->tutor_id !== Auth::id()) {
            abort(403, 'Je mag deze les niet bijwerken.');
        }

        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'description' => 'nullable|string|max:1000',
            'start_time' => 'required|date|after:now',
            'duration_minutes' => 'required|integer|min:15|max:480',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:9999.99',
            'is_active' => 'boolean',
        ]);

        $lesson->update($validated);

        return redirect()->route('lessons.index')->with('success', 'Les succesvol bijgewerkt.');
    }

    /**
     * Verwijder een les
     */
    public function destroy(Lesson $lesson)
    {
        // Zorg ervoor dat alleen de tutor zijn eigen les kan verwijderen
        if ($lesson->tutor_id !== Auth::id()) {
            abort(403, 'Je mag deze les niet verwijderen.');
        }

        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Les verwijderd.');
    }
}
