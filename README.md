# Lernie

## Beschrijving

Lernie is een educatief leerplatform gebouwd met Laravel. Het platform biedt een uitgebreide omgeving waar gebruikers onderwerpen kunnen volgen, lessen kunnen volgen, en veel gestelde vragen kunnen raadplegen. Met een intuïtieve interface kunnen studenten hun leerproces beheren en nieuwsupdates ontvangen.

**Dit is een schoolproject voor het vak Backend Web.**

## Tech Stack

-   **Backend:** Laravel 11
-   **Frontend:** Vue.js / Blade Templates
-   **Styling:** Tailwind CSS
-   **Build Tool:** Vite
-   **Database:** SQLite
-   **PHP Version:** 8.2+
-   **Package Manager:** Composer, NPM

## Installatie Instructies

### Vereisten

-   PHP 8.2 of hoger
-   Composer
-   Node.js en NPM
-   MySQL of SQLite

### Stappen

1. **Clone de repository**

    ```bash
    git clone <repository-url>
    cd lernie
    ```

2. **Installeer PHP-dependencies**

    ```bash
    composer install
    ```

3. **Installeer Node-dependencies**

    ```bash
    npm install
    ```

4. **Maak een `.env` bestand aan**

    ```bash
    cp .env.example .env
    ```

5. **Genereer een applicatie-sleutel**

    ```bash
    php artisan key:generate
    ```

6. **Voer database-migraties uit**

    ```bash
    php artisan migrate
    ```

7. **Zet de development server op**

    ```bash
    php artisan serve
    ```

8. **Start de Vite development server** (in een nieuw terminalvenster)
    ```bash
    npm run dev
    ```

De applicatie is nu beschikbaar op `http://localhost:8000`

### Aanvullende Commando's

-   **Migraties uitvoeren:** `php artisan migrate`
-   **Database seeden:** `php artisan db:seed`
-   **Assets bouwen voor productie:** `npm run build`

## Bronnen

-   [Laravel Documentatie](https://laravel.com/docs)
-   [Tailwind CSS Documentatie](https://tailwindcss.com/docs)
-   [Vite Documentatie](https://vitejs.dev/)
-   [Vue.js Documentatie](https://vuejs.org/)

### AI Hulpmiddelen

Dit project maakt gebruik van AI-hulpmiddelen voor:

-   **Styling:** AI-assistentie voor het ontwerp en implementatie van UI-componenten
-   **README:** Design en inhoud van deze README via AI-gegenereerde suggesties
-   **Code Completion:** GitHub Copilot voor code aanvullingen en snellere development
