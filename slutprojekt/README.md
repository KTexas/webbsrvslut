# slutprojektets namn
Beskriving av projektet och vad det låter dig göra. 

Projektet är skapat av *ditt namn*. 

## Språk och webbserver
Projektet är byggt med PHP och anpassat för Apache2.
- PHP 7.4
- Apache2

## Externa bibliotek 
Projektet använder sig av följande externa bibliotek:
- nikic/FastRoute för routing
- twig/twig för vyer
- ...

Installera dessa med composer install.

## Databas
Projektet använder PostgreSQL. Tabeller och relationer finns beskrivna i tables.png. 

1. Skapa databasen loanr eller ändra i Database.php i anslutningssträngen om du kallar databasen något annat.
2. Kör kommandona i migrate.sql för att skapa tabellstrukturen.
3. Kör kommandona i seed.sql för att fylla på med exempeldata. 

## Rutter
Nedanstående rutter används

| URI  | Protokoll | Beskrivning |
| --- | --- | --- |
| /  | GET  | Startsida |
| /products  | GET  | Visa alla produkter |
| /products/new | GET | Skapa ny produkt |

## Förslag på vidareutveckling
Projektet kan ytterligare utvecklas genom att...
