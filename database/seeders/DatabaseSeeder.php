<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use App\Models\Lesson;
use App\Models\NewsPost;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use App\Models\Contact;
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
        // Vakken aanmaken
        $wiskunde = Subject::create(['name' => 'Wiskunde']);
        $engels = Subject::create(['name' => 'Engels']);
        $chemie = Subject::create(['name' => 'Chemie']);
        $geschiedenis = Subject::create(['name' => 'Geschiedenis']);
        $fysica = Subject::create(['name' => 'Fysica']);
        $biologie = Subject::create(['name' => 'Biologie']);
        $nederlands = Subject::create(['name' => 'Nederlands']);

        // Admin gebruiker aanmaken
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'), // Wachtwoord is 'Password!321'
            'role' => 'admin',
        ]);

        // Tutors aanmaken met professionele profielen
        $tutorBrendan = User::factory()->create([
            'name' => 'Brendan Van der Berg',
            'email' => 'brendan.tutor@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'tutor',
            'city' => 'Brussel',
            'about_me' => 'Gepassioneerde wiskundeleraar met 5 jaar ervaring. Ik help studenten graag om complexe problemen eenvoudig te begrijpen.',
        ]);
        $tutorBrendan->subjects()->attach([$wiskunde->id, $fysica->id]);

        $tutorSarah = User::factory()->create([
            'name' => 'Sarah Janssens',
            'email' => 'sarah.tutor@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'tutor',
            'city' => 'Antwerpen',
            'about_me' => 'Master in de chemie en gespecialiseerd in organische scheikunde. Ik maak leren leuk en interactief!',
        ]);
        $tutorSarah->subjects()->attach([$chemie->id, $biologie->id]);

        $tutorPieter = User::factory()->create([
            'name' => 'Pieter Vermeulen',
            'email' => 'pieter.tutor@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'tutor',
            'city' => 'Gent',
            'about_me' => 'Native English speaker met 3 jaar ervaring in het lesgeven. Ik focus op conversatie en grammatica.',
        ]);
        $tutorPieter->subjects()->attach([$engels->id]);

        $tutorLisa = User::factory()->create([
            'name' => 'Lisa Peeters',
            'email' => 'lisa.tutor@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'tutor',
            'city' => 'Leuven',
            'about_me' => 'Historica met passie voor het verleden. Ik help studenten graag om geschiedenis tot leven te brengen.',
        ]);
        $tutorLisa->subjects()->attach([$geschiedenis->id]);

        $tutorThomas = User::factory()->create([
            'name' => 'Thomas De Smet',
            'email' => 'thomas.tutor@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'tutor',
            'city' => 'Brussel',
            'about_me' => 'Taalkundige gespecialiseerd in Nederlands. Ik help zowel met spelling, grammatica als schrijfvaardigheid.',
        ]);
        $tutorThomas->subjects()->attach([$nederlands->id]);

        // Studenten aanmaken
        $students = User::factory(10)->create([
            'role' => 'student',
        ]);

        // Specifieke student Brend
        $studentBrend = User::factory()->create([
            'name' => 'Brend Van Den Eynde',
            'email' => 'brend@lernie.test',
            'password' => bcrypt('password'),
            'role' => 'student',
            'city' => 'Brussel',
        ]);

        // Lessen aanmaken
        $lesson1 = Lesson::create([
            'tutor_id' => $tutorBrendan->id,
            'subject_id' => $wiskunde->id,
            'description' => 'Wiskundeles voor middelbare scholieren. We behandelen algebra, meetkunde en functies.',
            'start_time' => now()->addDays(3)->setTime(14, 0),
            'duration_minutes' => 90,
            'location' => 'Bibliotheek Brussel Centrum',
            'price' => 25.00,
            'is_active' => true,
        ]);

        Lesson::create([
            'tutor_id' => $tutorBrendan->id,
            'subject_id' => $fysica->id,
            'description' => 'Fysica voor beginners: mechanica, krachten en beweging.',
            'start_time' => now()->addDays(5)->setTime(16, 0),
            'duration_minutes' => 120,
            'location' => 'Online via Zoom',
            'price' => 30.00,
            'is_active' => true,
        ]);

        $lesson2 = Lesson::create([
            'tutor_id' => $tutorSarah->id,
            'subject_id' => $chemie->id,
            'description' => 'Chemie examenvoorbereiding: periodiek systeem, chemische reacties en stoichiometrie.',
            'start_time' => now()->addDays(4)->setTime(10, 0),
            'duration_minutes' => 90,
            'location' => 'Coffeebar Antwerpen Zuid',
            'price' => 28.00,
            'is_active' => true,
        ]);

        Lesson::create([
            'tutor_id' => $tutorPieter->id,
            'subject_id' => $engels->id,
            'description' => 'English conversation practice voor middelbare school en hoger onderwijs.',
            'start_time' => now()->addDays(2)->setTime(18, 0),
            'duration_minutes' => 60,
            'location' => 'Online via Google Meet',
            'price' => 20.00,
            'is_active' => true,
        ]);

        Lesson::create([
            'tutor_id' => $tutorLisa->id,
            'subject_id' => $geschiedenis->id,
            'description' => 'Geschiedenis van de 20ste eeuw: wereldoorlogen en koude oorlog.',
            'start_time' => now()->addDays(6)->setTime(13, 0),
            'duration_minutes' => 90,
            'location' => 'Universiteitsbibliotheek Leuven',
            'price' => 22.00,
            'is_active' => true,
        ]);

        Lesson::create([
            'tutor_id' => $tutorThomas->id,
            'subject_id' => $nederlands->id,
            'description' => 'Nederlandse taal en spelling: perfect voor eindexamen voorbereiding.',
            'start_time' => now()->addDays(7)->setTime(15, 0),
            'duration_minutes' => 90,
            'location' => 'Stadsbibliotheek Brussel',
            'price' => 24.00,
            'is_active' => true,
        ]);

        // Schrijf enkele studenten in voor lessen
        $lesson1->enrolledStudents()->attach([$studentBrend->id, $students[0]->id]);
        $lesson2->enrolledStudents()->attach([$students[1]->id, $students[2]->id, $students[3]->id]);

        // Nieuwsberichten aanmaken
        NewsPost::create([
            'title' => 'Welkom bij Lernie!',
            'content' => 'We zijn trots om Lernie te lanceren! Ons platform verbindt studenten met de beste tutors in België. Schrijf je vandaag nog in en ontdek hoe gemakkelijk bijles vinden kan zijn.',
            'published_at' => now(),
        ]);

        NewsPost::create([
            'title' => 'Examenperiode komt eraan',
            'content' => 'De examenperiode staat voor de deur! Heb jij al een tutor gevonden om je voor te bereiden? Wacht niet te lang, want de beste tutors zijn snel volgeboekt. Succes met je voorbereidingen!',
            'published_at' => now()->subDays(2),
        ]);

        NewsPost::create([
            'title' => 'Nieuwe vakken toegevoegd',
            'content' => 'Goed nieuws! We hebben onze lijst met beschikbare vakken uitgebreid. Je kunt nu ook tutors vinden voor biologie, fysica en Nederlands. Bekijk het volledige aanbod op onze website.',
            'published_at' => now()->subDays(5),
        ]);

        NewsPost::create([
            'title' => '100+ studenten bereikt!',
            'content' => 'Een mijlpaal! Meer dan 100 studenten hebben zich al ingeschreven op Lernie. Bedankt voor jullie vertrouwen. Samen maken we leren toegankelijker voor iedereen.',
            'published_at' => now()->subDays(10),
        ]);

        // FAQ-categorieën en vragen aanmaken
        $catAlgemeen = FaqCategory::create(['name' => 'Algemeen']);
        $catStudenten = FaqCategory::create(['name' => 'Voor Studenten']);
        $catTutors = FaqCategory::create(['name' => 'Voor Tutors']);
        $catBetalingen = FaqCategory::create(['name' => 'Betalingen']);

        // Algemene FAQ's
        FaqQuestion::create([
            'faq_category_id' => $catAlgemeen->id,
            'question' => 'Wat is Lernie?',
            'answer' => 'Lernie is een online platform dat studenten verbindt met gekwalificeerde tutors. Of je nu hulp nodig hebt bij wiskunde, talen of andere vakken, bij ons vind je de juiste begeleiding.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catAlgemeen->id,
            'question' => 'Hoe werkt Lernie?',
            'answer' => 'Het is simpel: je zoekt een tutor in jouw vakgebied, boekt een les die bij je agenda past en betaalt veilig via ons platform. Na de les kun je feedback achterlaten voor andere studenten.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catAlgemeen->id,
            'question' => 'Is Lernie gratis te gebruiken?',
            'answer' => 'Het aanmaken van een account en zoeken naar tutors is volledig gratis. Je betaalt alleen voor de lessen die je boekt bij de tutors.'
        ]);

        // FAQ's voor studenten
        FaqQuestion::create([
            'faq_category_id' => $catStudenten->id,
            'question' => 'Hoe boek ik een les?',
            'answer' => 'Ga naar het profiel van de tutor, bekijk de beschikbare lessen en klik op "Inschrijven". Na bevestiging ontvang je alle details per e-mail.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catStudenten->id,
            'question' => 'Kan ik een les annuleren?',
            'answer' => 'Ja, je kunt een les tot 24 uur voor aanvang kosteloos annuleren. Bij latere annulering wordt 50% van het lesgeld in rekening gebracht.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catStudenten->id,
            'question' => 'Zijn de lessen online of fysiek?',
            'answer' => 'Dat hangt af van de tutor. Sommige tutors geven alleen online les, anderen alleen fysiek, en sommigen bieden beide opties aan. Dit staat vermeld bij elke les.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catStudenten->id,
            'question' => 'Hoe weet ik of een tutor goed is?',
            'answer' => 'Elk tutorprofiel toont beoordelingen en recensies van eerdere studenten. Je kunt ook de tutor contacteren met vragen voordat je boekt.'
        ]);

        // FAQ's voor tutors
        FaqQuestion::create([
            'faq_category_id' => $catTutors->id,
            'question' => 'Hoe word ik tutor op Lernie?',
            'answer' => 'Maak een account aan, vul je profiel volledig in en geef aan welke vakken je kunt lesgeven. Na verificatie door ons team kun je direct lessen aanbieden.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catTutors->id,
            'question' => 'Hoeveel kan ik verdienen als tutor?',
            'answer' => 'Je bepaalt zelf je tarief per les. De meeste tutors rekenen tussen €20 en €35 per uur,afhankelijk van hun ervaring en het vakgebied.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catTutors->id,
            'question' => 'Wanneer ontvang ik mijn betaling?',
            'answer' => 'Betalingen worden wekelijks uitbetaald op je opgegeven bankrekening. Dit gebeurt automatisch voor alle lessen die in de voorgaande week zijn gegeven.'
        ]);

        // FAQ's over betalingen
        FaqQuestion::create([
            'faq_category_id' => $catBetalingen->id,
            'question' => 'Welke betaalmethoden accepteren jullie?',
            'answer' => 'We accepteren alle gangbare betaalmethoden: Bancontact, Visa, Mastercard, PayPal en bankoverschrijving.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catBetalingen->id,
            'question' => 'Is mijn betaling veilig?',
            'answer' => 'Absoluut! We gebruiken beveiligde betalingsproviders en slaan geen creditcardgegevens op. Alle transacties worden versleuteld.'
        ]);

        FaqQuestion::create([
            'faq_category_id' => $catBetalingen->id,
            'question' => 'Kan ik een factuur ontvangen?',
            'answer' => 'Ja, na elke betaling ontvang je automatisch een factuur per e-mail. Je kunt al je facturen ook terugvinden in je account onder "Mijn bestellingen".'
        ]);

        // Contactberichten aanmaken (voor demo doeleinden)
        Contact::create([
            'name' => 'Emma Claes',
            'email' => 'emma.claes@student.be',
            'subject' => 'Vraag over beschikbaarheid tutors',
            'message' => 'Hallo, ik zoek een tutor voor wiskunde in de regio Antwerpen. Zijn er momenteel tutors beschikbaar die ook in het weekend lesgeven?',
            'is_read' => false,
        ]);

        Contact::create([
            'name' => 'Jan Wouters',
            'email' => 'jan.w@gmail.com',
            'subject' => 'Interesse om tutor te worden',
            'message' => 'Beste Lernie team, ik ben geïnteresseerd om als tutor aan de slag te gaan voor Engels en geschiedenis. Wat zijn de vereisten hiervoor?',
            'is_read' => true,
        ]);

        Contact::create([
            'name' => 'Sophie Mertens',
            'email' => 'sophie.mertens@hotmail.com',
            'subject' => 'Technisch probleem bij inloggen',
            'message' => 'Ik kan niet inloggen op mijn account. Ik krijg steeds een foutmelding. Kunnen jullie me helpen?',
            'is_read' => false,
        ]);
    }
}

