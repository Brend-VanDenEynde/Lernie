<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Store a contact form submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Create contact submission
        $contact = Contact::create($validated);

        // Send email to admin
        try {
            Mail::raw(
                "Nieuw contactbericht van {$validated['name']} ({$validated['email']})\n\n" .
                "Onderwerp: {$validated['subject']}\n\n" .
                "Bericht:\n{$validated['message']}",
                function ($message) use ($validated) {
                    $message->to('admin@ehb.be')
                            ->subject('Nieuw contactbericht: ' . $validated['subject'])
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            // Log the error but don't fail the submission
            logger()->error('Failed to send contact email: ' . $e->getMessage());
        }

        return back()->with('success', 'Je bericht is succesvol verzonden! We nemen spoedig contact met je op.');
    }
}
