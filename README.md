# Praktijkopdracht
Voor het praktijkdeel is het de bedoeling om een zelfgekozen webapplicatie te ontwikkelen welke qua complexiteit vergelijkbaar is met de Chess Puzzles opdracht. Onderwerpen zoals hieronder zullen worden aangehaald in het mondeling. Het is aan jou de taak om toe te lichten hoe dit onderwerp is teruggekomen in de praktijkopdracht en welke keuzes je hierin hebt gemaakt. Met name de onderbouwing is belangrijk tijdens het mondeling.
Het moet duidelijk worden of je zelfstandig in staat bent geweest om een framework onder de knie te krijgen, de richtlijnen van het framework hebt kunnen volgen en daar uiteindelijk een applicatie in hebt kunnen bouwen.

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
-----------------------------------

## Verplichte criteria
### Beveiliging
- Inloggen: bepaalde functionaliteit is afgeschermd voor alleen ingelogde gebruikers, maakt niet uit welke gebruiker, als je maar bent ingelogd als rol ‘gebruiker’ 
- Validatie: bij invoervelden wordt gebruik gemaakt van verplichte velden, en/of velden met controle op inhoud (denk aan een postcode of emailadres), gebruiker krijgt foutmeldingen te zien (deze zijn NIET te omzeilen door bijv. javascript uit te zetten…)
- Verschillende rollen (dus meerdere soorten gebruikers), bijvoorbeeld 
- Admin rol 
- Gebruiker rol 
- Verschillende rechten 
- Admin gedeelte alleen toegankelijk voor ingelogde admin 
- Gebruiker heeft eigen afgeschermde deel waarin hij zijn gegevens kan aanpassen. 
- Bij het aanmaken van een nieuw item (bijv. een schaakpuzzel) mag alleen de uploader het item wijzigen. Een andere gebruik kan hier niet bij (door er bijvoorbeeld naar te dieplinken).
-----------------------------------

## Zoeken & Filteren
- Vrije tekst: zoekveld met vrije tekst, zoekt in meerdere kolommen (bijvoorbeeld in naam en ‘bericht’), hoeft niet in het hele systeem te zoeken, mag ook voor een specifieke lijst met data (bijv. nieuwsberichten). 
- filtermogelijkheid: dmv dropdownlist. Bijvoorbeeld alle nieuwsberichten van categorie 1 of 2 zien 
- combinatie van zoeken EN filteren, of filteren op meerdere categorieën levert meerwaarde op voor het onderdeel complexiteit, mits de werking ook is begrepen en goed is toegelicht.

### Beveiliging
- OWASP top 10 
- Schakelen van status met button in lijst 
- bijvoorbeeld aan/uit, actief/niet actief 
- MOET via een post 
- MOET naar aparte action in een controller 
- mag ook via Ajax
-----------------------------------

## Diepere validatie:
Voer voor een actie naar keuze een extra validatie toe, waarbij de gebruiker deze actie pas mag uitvoeren nadat hij iets anders een x aantal keer heeft gedaan. (licht dit toe in je assessment)

**Bijvoorbeeld bij een forum:**
een gebruiker mag pas een topic openen als er minimaal 5 reacties gegeven zijn.

**Bijvoorbeeld bij review systeem:**
een gebruiker mag een review plaatsen als er op  minimaal 5 verschillende dagen is ingelogd.
Let op, het tellen van deze eis moet met een losse query (Eloquent) gedaan worden. Het is niet toegestaan om hiervoor een apart veld in de database voor te maken of om zelf een teller bij te houden in de code of de frontend.
-----------------------------------

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
