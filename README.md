# Praktijkopdracht
Voor het praktijkdeel is het de bedoeling om een zelfgekozen webapplicatie te ontwikkelen welke qua complexiteit vergelijkbaar is met de Chess Puzzles opdracht. Onderwerpen zoals hieronder zullen worden aangehaald in het mondeling. Het is aan jou de taak om toe te lichten hoe dit onderwerp is teruggekomen in de praktijkopdracht en welke keuzes je hierin hebt gemaakt. Met name de onderbouwing is belangrijk tijdens het mondeling.
Het moet duidelijk worden of je zelfstandig in staat bent geweest om een framework onder de knie te krijgen, de richtlijnen van het framework hebt kunnen volgen en daar uiteindelijk een applicatie in hebt kunnen bouwen.

## Installatie
1. Installeer de PHP en JavaScript packages:
```
composer install
npm install
```
2. Maak je eigen `.env` bestand en een app key:
```
cp .env.example .env
php artisan key:generate
```
3. Maak in MySQL een database `laravel_praktijkopdracht` (of pas `DB_DATABASE` aan in `.env`).
4. Maak de tabellen en vul ze met testdata:
```
php artisan migrate:fresh --seed
```
5. Bouw de CSS en JavaScript en start de server:
```
npm run build
php artisan serve
```

### Testaccounts:
- gebruiker: `user@example.com` / `password123`
- gebruiker met 3 logindagen: `johndoe@example.com` / `johndoe123`
- admin: `admin@example.com` / `admin123`

-----------------------------------

## Features (voortgang)
- [x] Inloggen en registreren
- [x] Rollen: admin en gebruiker
- [x] Admin gedeelte alleen voor admins (middleware)
- [x] Gebruiker kan eigen gegevens aanpassen (profile)
- [x] Games toevoegen, bewerken en verwijderen (admin)
- [x] Server-side validatie met foutmeldingen
- [x] Zoeken in meerdere kolommen
- [x] Filteren met dropdown
- [x] Zoeken en filteren gecombineerd
- [x] Reviews schrijven, bewerken en verwijderen
- [x] Alleen de maker kan een review bewerken (policy)
- [x] Status aan/uit zetten via POST naar aparte controller action (is_visible op review, admin kan reviews zichtbaar of onzichtbaar maken)
- [x] Diepere validatie (gebruiker kan pas review geven na login op 3 verschillende dagen)

-----------------------------------

## Verplichte criteria
### Beveiliging
- [x] Inloggen: bepaalde functionaliteit is afgeschermd voor alleen ingelogde gebruikers, maakt niet uit welke gebruiker, als je maar bent ingelogd als rol ‘gebruiker’
- [x] Validatie: bij invoervelden wordt gebruik gemaakt van verplichte velden, en/of velden met controle op inhoud (denk aan een postcode of emailadres), gebruiker krijgt foutmeldingen te zien (deze zijn NIET te omzeilen door bijv. javascript uit te zetten…)
- [x] Verschillende rollen (dus meerdere soorten gebruikers), bijvoorbeeld
- [x] Admin rol
- [x] Gebruiker rol
- [x] Verschillende rechten
- [x] Admin gedeelte alleen toegankelijk voor ingelogde admin
- [x] Gebruiker heeft eigen afgeschermde deel waarin hij zijn gegevens kan aanpassen.
- [x] Bij het aanmaken van een nieuw item (bijv. een schaakpuzzel) mag alleen de uploader het item wijzigen. Een andere gebruik kan hier niet bij (door er bijvoorbeeld naar te dieplinken).

### Zoeken & Filteren
- [x] Vrije tekst: zoekveld met vrije tekst, zoekt in meerdere kolommen (bijvoorbeeld in naam en ‘bericht’), hoeft niet in het hele systeem te zoeken, mag ook voor een specifieke lijst met data (bijv. nieuwsberichten).
- [x] Filtermogelijkheid: dmv dropdownlist. Bijvoorbeeld alle nieuwsberichten van categorie 1 of 2 zien
- [x] Combinatie van zoeken EN filteren, of filteren op meerdere categorieën levert meerwaarde op voor het onderdeel complexiteit, mits de werking ook is begrepen en goed is toegelicht.

-----------------------------------
## Status schakelen en diepere validatie
- [x] **Status schakelen via POST naar een aparte action:** in het admin panel zet de Accept/Hide knop een review zichtbaar of verborgen via `POST /admin/{review}/toggle` naar `ReviewController@toggle`.
- [x] **Diepere validatie:** een gebruiker mag pas een review plaatsen na inloggen op minimaal 3 verschillende dagen.

## Diepere validatie:
Voer voor een actie naar keuze een extra validatie toe, waarbij de gebruiker deze actie pas mag uitvoeren nadat hij iets anders een x aantal keer heeft gedaan. (licht dit toe in je assessment)

**Bijvoorbeeld bij een forum:**
een gebruiker mag pas een topic openen als er minimaal 5 reacties gegeven zijn.

**Bijvoorbeeld bij review systeem:**
een gebruiker mag een review plaatsen als er op  minimaal 5 verschillende dagen is ingelogd.
Let op, het tellen van deze eis moet met een losse query (Eloquent) gedaan worden. Het is niet toegestaan om hiervoor een apart veld in de database voor te maken of om zelf een teller bij te houden in de code of de frontend.

-----------------------------------
## Uitleg
Een gebruiker mag pas een review plaatsen als hij op minimaal 3 verschillende dagen heeft ingelogd.
- Bij elke login slaat de listener `RecordLogin` een rij op in de tabel `user_logins`
- `loginDays()` in `User.php` telt op hoeveel verschillende dagen iemand heeft ingelogd
- Ik sla dus geen getal op, het wordt elke keer opnieuw geteld
- In `ReviewController` wordt gecheckt of iemand 3 dagen heeft ingelogd, anders krijg je een foutmelding
- Met het account `johndoe@example.com` kun je het testen, die heeft al 3 logindagen

-----------------------------------

## Verloop mondeling toets
- Tonen van de wekelijkse voortgang op Github. Er wordt in de beoordeling gelet op een evenredige belasting over de periode, zonder piekbelasting. 
- Korte toelichting (van max 5 min) door de student in de browser van de belangrijkste features van de uitgewerkte applicatie 
- Verdiepende vragen naar de verplichte criteria zoals hieronder benoemd. In de beoordeling wordt gelet op verantwoording van keuzes en of de werking begrepen is en of de handeling gereproduceerd zou kunnen worden in een toekomstig project. 
- Steekproefsgewijs vragen over de OWASP top 10. Hoe komt een onderdeel uit deze lijst terug in het framework of hoe heb je het zelf toegepast. 
- Steekproefsgewijs vraag over OTAP. In de beoordeling wordt gekeken naar:
- Weet wat komt kijken bij de inrichting naar een live/productie omgeving 
- Snap waar al je configuraties binnen jouw framework staan 
- Je kunt uitleggen hoe en wat moet worden aangepast voor een deployment naar een productie-omgeving (denk aan: database, instellingen, code, enz.). 
- Als het is gelukt om de applicatie op een aparte server in productie te zetten levert dit automatisch 1 punt op voor het onderdeel OTAP.

## Voorbeeldvragen
- specifieke oplossingen vanuit jouw framework (ken je ze, waarom evt niet gekozen?)
- bijvoorbeeld: hoe gaat je framework om met beveiliging?
- bijvoorbeeld: hoe gaat je framework om met databases?
- bijvoorbeeld: aan welke eisen moet een ‘live’ server voldoen?
- bijvoorbeeld: toelichten waarom je iets niet volgens de richtlijn hebt gedaan.
- algemene MVC vragen (ken je ze, en hoe zit dat in jouw framework)
- bijvoorbeeld: wat zijn layouts/partials, en hoe zit dat in jouw framework?
- bijvoorbeeld: wat is de taak van een controller?
- bijvoorbeeld: wat is een sql injection, en hoe beveilig je hiertegen?
- specifieke vragen m.b.t. hoe je iets hebt gebouwd (technisch in je code)
- bijvoorbeeld: hoe heb je verschillende rollen geïmplementeerd?

-----------------------------------

## Hergebruik van code
- Sommige views zijn gebaseerd op bestaande pagina's uit dit project en daarna aangepast, bijvoorbeeld de review edit pagina op basis van de game edit pagina.
- De login, registratie en profielpagina's komen van Laravel Breeze en zijn aangepast aan de stijl van de app.

## Bronnenvermelding:
- Laravel documentatie: https://laravel.com/docs
- Laravel Breeze (inloggen en registreren)
- Tailwind CSS: https://tailwindcss.com/docs
- Alpine.js (sterren rating): https://alpinejs.dev
- Font Awesome (iconen): https://fontawesome.com

- Laravel From Scratch (2026 Edition). (z.d.). Laracasts. https://laracasts.com/series/laravel-from-scratch-2026/
- What is MVC? | Laravel - The clean stack for Artisans and agents. (z.d.). Laravel. https://laravel.com/learn/getting-started-with-laravel/what-is-mvc
- Controllers | Laravel 12.x - The clean stack for Artisans and agents. (z.d.). Laravel. https://laravel.com/framework/docs/12.x/controllers
- Eloquent: Getting Started | Laravel 13.x - The clean stack for Artisans and agents. (z.d.). Laravel. https://laravel.com/framework/docs/13.x/eloquent#generating-model-classes
- Database: Migrations | Laravel 13.x - The clean stack for Artisans and agents. (z.d.). Laravel. https://laravel.com/framework/docs/13.x/migrations#generating-migrations
- Policies: https://laravel.com/docs/authorization#creating-policies
- Route model binding: https://laravel.com/docs/routing#route-model-binding
- Event listeners: https://laravel.com/docs/events
- logout. (z.d.). Laracasts. https://laracasts.com/discuss/channels/laravel/logout-2
- https://stackoverflow.com/questions/28714675/laravel-says-route-not-defined
- https://stackoverflow.com/questions/70736335/laravel-search-and-filter
- https://stackoverflow.com/questions/24119818/laravel-pdoexception-sqlstatehy000-1049-unknown-database-forge
- https://medium.com/@madinkhan063/step-by-step-guide-to-building-a-dynamic-search-filter-in-laravel-with-jquery-ajax-ab1b95f99285

## Gebruik van AI
Ik zocht eerst zelf op internet. Lukte dat niet, dan vroeg ik Claude (AI) om hulp bij:
- de sterren rating met Alpine.js (`x-data`, `@click`, `:class`), daar kwam ik zelf niet uit
- het vinden en oplossen van errors
- voorbeeldcode voor onderdelen zoals de review pagina's en de statusknop, die ik daarna zelf heb overgetypt en aangepast
- feedback op mijn code en deze README
