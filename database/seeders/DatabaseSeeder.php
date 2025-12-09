<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Vakkken aanmaken
        $wiskunde = Subject::create(['name' => 'Wiskunde']);
        $engels = Subject::create(['name' => 'Engels']);
        $chemie = Subject::create(['name' => 'Chemie']);
        $geschiedenis = Subject::create(['name' => 'Geschiedenis']);

        // Admin gebruiker aanmaken
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'), // Wachtwoord is 'Password!321'
            'role' => 'admin',
        ]);

        // Tutor gebruiker aanmaken
        $tutorBrendan = User::factory()->create([
            'name' => 'Brendan Tutor',
            'email' => 'tutor@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'tutor',
            'city' => 'Brussel',
            'about_me' => 'Ik geef al 5 jaar les in exacte wetenschappen.',
        ]);

        // Koppel vakken aan tutor Brendan
        $tutorBrendan->subjects()->attach([$wiskunde->id, $chemie->id]);

        // Maak nog wat random tutors aan
        $randomTutors = User::factory(5)->create([
            'role' => 'tutor',
        ]);

        foreach($randomTutors as $tutor) {
            $tutor->subjects()->attach($engels->id);
        }

        // Studenten aanmaken
        User::factory(10)->create([
            'role' => 'student',
        ]);

        // Specifieke student Brend
        User::factory()->create([
            'name' => 'Brend Van Den Eynde',
            'email' => 'brend@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);
    }
}
