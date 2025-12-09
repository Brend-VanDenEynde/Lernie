<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use App\Models\NewsPost;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
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
            'password' => bcrypt('password'), // Wachtwoord is 'password'
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
            'password' => bcrypt('password'), // Wachtwoord is 'password'
            'role' => 'student',
        ]);


        // Nieuwsberichten aanmaken
        NewsPost::create([
            'title' => 'Welkom bij Lernie!',
            'content' => 'Wij zijn live! Studenten kunnen zich vanaf nu inschrijven.',
            'published_at' => now(),
        ]);

        NewsPost::create([
            'title' => 'Examenperiode komt eraan',
            'content' => 'Heb jij al een tutor gevonden voor de examens? Wacht niet te lang!',
            'published_at' => now()->subDays(2), // 2 dagen geleden
        ]);

        // FAQ-categorieën en vragen aanmaken
        $catAlgemeen = FaqCategory::create(['name' => 'Algemeen']);

        FaqQuestion::create([
            'faq_category_id' => $catAlgemeen->id,
            'question' => 'Hoe werkt Lernie?',
            'answer' => 'Je zoekt een tutor, boekt een les en betaalt veilig via ons platform.'
        ]);
    }
}
