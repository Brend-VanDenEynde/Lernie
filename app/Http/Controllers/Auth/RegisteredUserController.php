<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],

        'role' => ['required', 'string', 'in:student,tutor'], 
        'city' => ['required', 'string', 'max:255'],
        'birthday' => ['nullable', 'date'],

        // Bio verplicht voor leraren, optioneel voor studenten
        'about_me' => [
            $request->role === 'tutor' ? 'required' : 'nullable',
            'string'
        ],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),

        'role' => $request->role,
        'city' => $request->city,
        'birthday' => $request->birthday,
        'about_me' => $request->about_me,
    ]);

    event(new Registered($user));

    Auth::login($user);

    // Als tutor → doorsturen naar profiel om vakken + avatar toe te voegen
    if ($user->role === 'tutor') {
        return redirect()->route('profile.edit');
    }

    // Studenten gaan gewoon naar dashboard
    return redirect()->route('dashboard');
}

}
