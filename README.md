# Lernie - Educatief Leerplatform

Een professioneel tutor-student matching platform gebouwd met Laravel 11, waarmee studenten bijles kunnen vinden en tutors hun diensten kunnen aanbieden.

## Beschrijving

Lernie is een volledig functioneel educatief platform dat tutors en studenten met elkaar verbindt. Het platform biedt een uitgebreide omgeving voor lesbeheer, gebruikersprofielen, nieuws updates en FAQ's. Met een intuïtieve interface kunnen studenten lessen zoeken, inschrijven en hun leerproces beheren, terwijl tutors hun beschikbaarheid en vakgebieden kunnen publiceren.

**Dit is een schoolproject voor het vak Backend Web - Erasmushogeschool Brussel**

### Features

#### Authenticatie & Gebruikersbeheer
- **Volledig authenticatiesysteem** met login, registratie, email verificatie en wachtwoord reset (Laravel Breeze)
- **Role-based access control** met drie gebruikersrollen: Admin, Tutor en Student
- **Publieke gebruikersprofielen** toegankelijk voor iedereen met profielfoto, bio en vakgebieden
- **Profiel management** met avatar upload, verjaardag, "over mij" tekst en locatie
- **Admin gebruikersbeheer** - admins kunnen gebruikers aanmaken, promoten/degraderen en verwijderen

#### Les Management Systeem
- **Lessen aanmaken** door tutors met onderwerp, beschrijving, tijd, locatie en prijs
- **Les overzicht** voor studenten met zoek- en filterfunctionaliteit
- **Inschrijvingen beheren** - studenten kunnen inschrijven/uitschrijven voor lessen
- **Tutor dashboard** met overzicht van eigen lessen en ingeschreven studenten
- **Student dashboard** met overzicht van ingeschreven lessen
- **Contact functionaliteit** - tutors kunnen studenten contacteren via email

#### Content Management
- **Nieuwsberichten** - admins kunnen nieuws artikelen aanmaken, bewerken en verwijderen
- **Nieuws overzicht** met publicatiedatum en afbeeldingen
- **FAQ systeem** met categorieën en vraag/antwoorden
- **FAQ beheer** - admins kunnen categorieën en vragen toevoegen/wijzigen/verwijderen

#### Contact & Communicatie
- **Contactformulier** voor bezoekers en gebruikers
- **Email notificaties** naar admin bij nieuwe contactaanvragen
- **Admin contact panel** - overzicht van alle contactberichten met read/unread status
- **Contact management** - admins kunnen berichten bekijken en verwijderen

#### Vakken (Subjects) Management
- **Vakken systeem** - tutors kunnen meerdere vakken aan hun profiel koppelen
- **Vak selectie** bij les aanmaken - koppel lessen aan specifieke vakken
- **Vak weergave** op profielpagina's en in les overzichten

#### Geavanceerde Functionaliteiten
- **Multiple layouts** - aparte layouts voor authenticated users, guests en publieke pagina's
- **Herbruikbare Blade components** - 14+ components voor consistente UI
- **CSRF & XSS bescherming** op alle formulieren
- **Middleware** voor route bescherming per rol
- **Database seeders** met testdata en default admin account
- **Responsive design** met Tailwind CSS

## Installatie

### Vereisten

- **[Laravel Herd](https://herd.laravel.com/)** - Native Laravel development environment (aanbevolen voor Windows/Mac)
- **PHP 8.2+** 
- **Composer** 
- **Node.js en NPM** - Voor frontend assets



### Stappen

1. **Installeer Laravel Herd**

   Download en installeer Herd vanaf [herd.laravel.com](https://herd.laravel.com/)
   
   Herd bevat:
   - PHP 8.2, 8.3, en 8.4
   - Composer
   - Laravel installer
   - Automatische `.test` domain configuratie
   - Database manager (SQLite/MySQL support)

2. **Clone de repository**

   ```bash
   git clone https://github.com/Brend-VanDenEynde/Lernie.git
   cd lernie
   ```

3. **Configureer Herd voor dit project**

   - Open Laravel Herd app
   - Klik op "Add Path" en selecteer de `lernie` folder
   - Herd configureert automatisch `lernie.test` als lokale URL

4. **Installeer PHP dependencies**

   ```bash
   composer install
   ```

5. **Installeer Node dependencies**

   ```bash
   npm install
   ```

6. **Configureer environment variabelen**

   ```bash
   cp .env.example .env
   ```

   Pas het `.env` bestand aan indien nodig:
   - Database is standaard SQLite (al geconfigureerd voor Herd)
   - Mail settings voor email functionaliteit (optioneel voor development)

7. **Genereer applicatie sleutel**

   ```bash
   php artisan key:generate
   ```

8. **Voer database migraties uit en seed testdata**

   ```bash
   php artisan migrate:fresh --seed
   ```

   Dit creëert de database structuur en voegt professionele testdata toe, inclusief:
   - **1 Admin account** met professionele credentials
   - **5 Named tutors** met volledige profielen (naam, stad, about_me, vakken)
   - **11 Studenten** (10 random + 1 named student)
   - **7 Vakken**: Wiskunde, Engels, Chemie, Geschiedenis, Fysica, Biologie, Nederlands
   - **6 Realistische lessen** met verschillende tijden, locaties en prijzen
   - **4 Nieuwsberichten** met professionele content
   - **4 FAQ-categorieën** met 13 vragen totaal
   - **3 Voorbeeld contactberichten**
   - **Enkele studenten ingeschreven** voor lessen (voor realistische demo)

9. **Maak storage link aan** (voor avatar uploads)

   ```bash
   php artisan storage:link
   ```

10. **Start Vite development server**

    ```bash
    npm run dev
    ```

11. **Open de applicatie**

    Navigeer naar **`http://lernie.test`** in je browser
    


### Default Accounts (na seeding)

**Admin Account:**
- Email: `admin@ehb.be`
- Wachtwoord: `Password!321`

**Tutor Accounts:**
- Email: `brendan.tutor@lernie.test` - Wachtwoord: `password` (Wiskunde & Fysica)
- Email: `sarah.tutor@lernie.test` - Wachtwoord: `password` (Chemie & Biologie)
- Email: `pieter.tutor@lernie.test` - Wachtwoord: `password` (Engels)
- Email: `lisa.tutor@lernie.test` - Wachtwoord: `password` (Geschiedenis)
- Email: `thomas.tutor@lernie.test` - Wachtwoord: `password` (Nederlands)

**Student Account:**
- Email: `brend@lernie.test`
- Wachtwoord: `password`

### Aanvullende Commando's

- **Database reset met seed:** `php artisan migrate:fresh --seed`
- **Cache wissen:** `php artisan cache:clear`
- **Config cache:** `php artisan config:cache`
- **Assets bouwen voor productie:** `npm run build`
- **Tests draaien:** `php artisan test`

### Laravel Herd Tips

- **Database management**: Open Herd → klik op "Database" om SQLite databases te beheren
- **PHP versie switchen**: Rechtsklik op project in Herd → kies PHP versie
- **Logs bekijken**: Herd heeft ingebouwde log viewer
- **Vite auto-detect**: Herd detecteert automatisch Vite en toont de status


## Applicatie Routes

### Publieke Routes (geen login vereist)

- `GET /` - Welkom pagina met laatste nieuws
- `GET /nieuws` - Overzicht van alle nieuwsberichten
- `GET /nieuws/{id}` - Detail pagina van nieuwsbericht
- `GET /faq` - FAQ overzicht met categorieën
- `GET /contact` - Contactformulier
- `GET /profiel/{user}` - Publiek gebruikersprofiel
- `POST /contact` - Contactformulier verzenden

### Authenticatie Routes

- `GET /login` - Inloggen
- `POST /login` - Login verwerken
- `GET /register` - Registreren
- `POST /register` - Registratie verwerken
- `POST /logout` - Uitloggen
- `GET /forgot-password` - Wachtwoord vergeten
- `POST /forgot-password` - Wachtwoord reset email versturen
- `GET /reset-password/{token}` - Wachtwoord reset formulier
- `POST /reset-password` - Nieuw wachtwoord opslaan

### Student Routes (vereist login + student/tutor role)

- `GET /student/lessen` - Overzicht van beschikbare lessen
- `GET /student/lessen/{id}` - Detail van een les
- `POST /student/lessen/{id}/enroll` - Inschrijven voor les
- `DELETE /student/lessen/{id}/enroll` - Uitschrijven van les
- `GET /student/inschrijvingen` - Mijn inschrijvingen

### Tutor Routes (vereist login + tutor role)

- `GET /tutor` - Tutor dashboard
- `GET /lessen` - Overzicht van eigen lessen
- `GET /lessen/create` - Les aanmaken formulier
- `POST /lessen` - Les opslaan
- `GET /lessen/{id}` - Les detail met ingeschreven studenten
- `GET /lessen/{id}/edit` - Les bewerken
- `PUT /lessen/{id}` - Les updaten
- `DELETE /lessen/{id}` - Les verwijderen
- `GET /tutor/subjects/create` - Vakken selecteren
- `POST /tutor/subjects` - Vakken opslaan

### Admin Routes (vereist login + admin role)

**Dashboard:**
- `GET /admin` - Admin dashboard met statistieken

**Gebruikersbeheer:**
- `GET /admin/users` - Overzicht van alle gebruikers
- `GET /admin/users/create` - Gebruiker aanmaken
- `POST /admin/users` - Gebruiker opslaan
- `GET /admin/users/{id}` - Gebruiker detail
- `POST /admin/users/{id}/promote` - Promoveer tot admin
- `POST /admin/users/{id}/demote` - Verwijder admin rechten
- `DELETE /admin/users/{id}` - Gebruiker verwijderen

**Nieuwsbeheer:**
- `GET /admin/articles` - Overzicht van artikelen
- `GET /admin/articles/create` - Artikel aanmaken
- `POST /admin/articles` - Artikel opslaan
- `GET /admin/articles/{id}/edit` - Artikel bewerken
- `PUT /admin/articles/{id}` - Artikel updaten
- `DELETE /admin/articles/{id}` - Artikel verwijderen

**FAQ Beheer:**
- `GET /admin/faq` - Overzicht van FAQ items
- `GET /admin/faq/create` - FAQ vraag aanmaken
- `POST /admin/faq` - FAQ opslaan
- `GET /admin/faq/{id}/edit` - FAQ bewerken
- `PUT /admin/faq/{id}` - FAQ updaten
- `DELETE /admin/faq/{id}` - FAQ verwijderen
- `GET /admin/faq/categories` - Categorieën overzicht
- `GET /admin/faq/categories/create` - Categorie aanmaken
- `POST /admin/faq/categories` - Categorie opslaan

**Contact Beheer:**
- `GET /admin/contacts` - Overzicht van contactberichten
- `GET /admin/contacts/{id}` - Contactbericht detail
- `DELETE /admin/contacts/{id}` - Contactbericht verwijderen

## Database Schema

### Users Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- name (VARCHAR NOT NULL)
- email (VARCHAR UNIQUE NOT NULL)
- password (VARCHAR NOT NULL)
- role (VARCHAR: admin, tutor, student) DEFAULT 'student'
- birthday (DATE NULLABLE)
- avatar (VARCHAR NULLABLE) -- path naar profielfoto
- about_me (TEXT NULLABLE)
- city (VARCHAR NULLABLE)
- email_verified_at (TIMESTAMP NULLABLE)
- remember_token (VARCHAR NULLABLE)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### News_Posts Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- title (VARCHAR NOT NULL)
- content (TEXT NOT NULL)
- image (VARCHAR NULLABLE) -- path naar afbeelding
- published_at (TIMESTAMP NOT NULL)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### FAQ_Categories Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- name (VARCHAR NOT NULL)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### FAQ_Questions Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- faq_category_id (BIGINT FOREIGN KEY REFERENCES faq_categories)
- question (TEXT NOT NULL)
- answer (TEXT NOT NULL)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Subjects Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- name (VARCHAR NOT NULL)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Lessons Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- tutor_id (BIGINT FOREIGN KEY REFERENCES users)
- subject_id (BIGINT FOREIGN KEY REFERENCES subjects)
- description (TEXT NOT NULL)
- start_time (TIMESTAMP NOT NULL)
- duration_minutes (INTEGER NOT NULL)
- location (VARCHAR NOT NULL)
- price (DECIMAL NOT NULL)
- is_active (BOOLEAN DEFAULT true)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Contacts Table

```sql
- id (BIGINT PRIMARY KEY AUTO_INCREMENT)
- name (VARCHAR NOT NULL)
- email (VARCHAR NOT NULL)
- subject (VARCHAR NOT NULL)
- message (TEXT NOT NULL)
- is_read (BOOLEAN DEFAULT false)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Pivot Tables (Many-to-Many relaties)

**subject_user** - Tutors ↔ Subjects
```sql
- user_id (BIGINT FOREIGN KEY REFERENCES users)
- subject_id (BIGINT FOREIGN KEY REFERENCES subjects)
```

**lesson_user** - Students ↔ Lessons (inschrijvingen)
```sql
- user_id (BIGINT FOREIGN KEY REFERENCES users)
- lesson_id (BIGINT FOREIGN KEY REFERENCES lessons)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

## Technologieën

### Backend
- **Laravel 11** - PHP web application framework
- **Laravel Breeze** - Authentication scaffolding
- **Eloquent ORM** - Database abstraction en relaties
- **Blade Templating** - Server-side rendering

### Frontend
- **Tailwind CSS 3** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework (via Breeze)
- **Vite** - Frontend build tool

### Database
- **SQLite** - Development database (default)
- **MySQL** - Production compatible

### Development Tools
- **Composer** - PHP dependency management
- **NPM** - Node package management
- **Laravel Pail** - Log viewer
- **Laravel Tinker** - REPL voor Laravel

## Project Structuur

```
lernie/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php          # Admin panel logica
│   │   │   ├── ProfileController.php        # Profiel management
│   │   │   ├── NewsPostController.php       # Nieuws artikelen
│   │   │   ├── FaqController.php            # FAQ pagina
│   │   │   ├── ContactController.php        # Contact formulier
│   │   │   ├── LessonController.php         # Les management (tutor)
│   │   │   ├── StudentController.php        # Student functies
│   │   │   └── Auth/                        # Authenticatie controllers
│   │   ├── Middleware/
│   │   │   └── EnsureUserIsAdmin.php        # Admin middleware
│   │   └── Requests/
│   │       └── ProfileUpdateRequest.php     # Form request validatie
│   └── Models/
│       ├── User.php                         # User model met relaties
│       ├── NewsPost.php                     # Nieuws artikelen
│       ├── FaqCategory.php                  # FAQ categorieën
│       ├── FaqQuestion.php                  # FAQ vragen
│       ├── Lesson.php                       # Lessen
│       ├── Subject.php                      # Vakken
│       └── Contact.php                      # Contact berichten
├── database/
│   ├── migrations/                          # 13 database migraties
│   └── seeders/
│       └── DatabaseSeeder.php               # Testdata seeder
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php               # Authenticated layout
│   │   │   ├── guest.blade.php             # Guest layout
│   │   │   ├── public.blade.php            # Public layout
│   │   │   └── navigation.blade.php        # Navigation component
│   │   ├── components/                     # 14+ Blade components
│   │   ├── admin/                          # Admin views
│   │   ├── tutor/                          # Tutor views
│   │   ├── student/                        # Student views
│   │   ├── lessons/                        # Les management views
│   │   ├── profile/                        # Profiel views
│   │   ├── news/                           # Nieuws views
│   │   ├── faq/                            # FAQ views
│   │   └── contact/                        # Contact views
│   ├── css/
│   │   └── app.css                         # Tailwind imports
│   └── js/
│       └── app.js                          # Frontend JavaScript
├── routes/
│   ├── web.php                             # 140 lijnen web routes
│   └── auth.php                            # Authenticatie routes
├── public/
│   └── storage/                            # Publieke storage link
├── storage/
│   └── app/
│       └── public/
│           └── avatars/                    # Avatar uploads
├── .env.example                            # Environment template
├── composer.json                           # PHP dependencies
├── package.json                            # Node dependencies
├── tailwind.config.js                      # Tailwind configuratie
├── vite.config.js                          # Vite configuratie
└── README.md
```


## Bronvermeldingen & Referenties

### Officiële Documentatie

- **[Laravel 11 Documentation](https://laravel.com/docs/11.x)** - Framework setup, routing, Eloquent, Blade, authentication
- **[Laravel Breeze Documentation](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)** - Authentication scaffolding
- **[Tailwind CSS Documentation](https://tailwindcss.com/docs)** - Utility classes, responsive design
- **[Blade Templates Guide](https://laravel.com/docs/11.x/blade)** - Template syntax, components, layouts
- **[Eloquent ORM Documentation](https://laravel.com/docs/11.x/eloquent)** - Model relationships, queries

### AI Gebruik

Bij de ontwikkeling van dit project is gebruik gemaakt van AI-assistentie op de volgende manieren:

- **AI code completions** - Voor het versnellen van code schrijven en het voorstellen van code patterns
- **AI voor commit messages** - Voor het genereren van duidelijke en consistente commit beschrijvingen
- **AI voor probleemoplossing** - Voor het opzoeken van informatie en oplossingen wanneer ik vastzat met specifieke implementaties
- **AI voor markdown formatting** - Voor het helpen met de structuur, layout en markdown types van deze README
- **AI voor GitHub Actions** - Voor het opzetten van de build workflow en CI/CD configuratie
- **Blade componenten** - Voor het structureren van herbruikbare UI componenten
- **Styling suggesties** - Voor Tailwind CSS classes en layout designs

### Implementatie Details

#### Authentication & Authorization
- **Laravel Breeze Setup**: Standaard authenticatie scaffolding met email verificatie
  - Referentie: [Laravel Authentication](https://laravel.com/docs/11.x/authentication)
- **Role-based Middleware**: Custom middleware voor admin route bescherming
  - Pattern: `EnsureUserIsAdmin` middleware controleert `$user->role === 'admin'`
  - Referentie: [Laravel Middleware](https://laravel.com/docs/11.x/middleware)
- **Gate & Policies**: Gebruikt voor granulaire authorization checks
  - Referentie: [Laravel Authorization](https://laravel.com/docs/11.x/authorization)


#### Security Best Practices
- **CSRF Protection**: `@csrf` directive in alle formulieren
  - Automatische token validatie door Laravel
  - Referentie: [CSRF Protection](https://laravel.com/docs/11.x/csrf)

- **Password Hashing**: Bcrypt via `Hash::make()` of `bcrypt()`
  - Automatische hashing in User factory
  - Referentie: [Hashing](https://laravel.com/docs/11.x/hashing)

#### Form Validation
- **Form Request Validation**: 
  - `ProfileUpdateRequest` voor profiel updates
  - Server-side validatie met custom error messages
  - Referentie: [Form Requests](https://laravel.com/docs/11.x/validation#form-request-validation)
  
- **Inline Validation**: Controller validatie met `$request->validate()`
  - Email format, required fields, unique constraints
  - Referentie: [Validation](https://laravel.com/docs/11.x/validation)

#### Frontend & UI
- **Blade Components**: Herbruikbare UI componenten
  - X-components: `<x-button>`, `<x-input>`, `<x-modal>`
  - Referentie: [Blade Components](https://laravel.com/docs/11.x/blade#components)

- **Tailwind CSS Integration**: Via Laravel Mix successor Vite
  - Configuratie: `tailwind.config.js` met Laravel preset
  - Referentie: [Tailwind with Laravel](https://tailwindcss.com/docs/guides/laravel)


#### Database Seeding
- **Database Seeders**: Test data voor development
  - Default admin account met specifieke credentials
  - Faker voor random test users en data
  - Referentie: [Database Seeding](https://laravel.com/docs/11.x/seeding)

### Externe Packages

- **laravel/framework** - Core framework
- **laravel/breeze** - Authentication starter kit
- **tailwindcss** - CSS framework
- **alpinejs** - JavaScript framework
- **vite** - Frontend build tool
- **@vitejs/plugin-laravel** - Laravel Vite plugin

## Auteur

**Brend Van Den Eynde**

GitHub: [@Brend-VanDenEynde](https://github.com/Brend-VanDenEynde)

