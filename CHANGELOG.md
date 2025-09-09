# Ehrungen Changelog

## Version 2.0.0 (2025-09-09)

* Add: Abhängigkeit PHP 8

## Version 1.1.3 (2023-07-27)

* Fix: tl_content Funktion editListe -> falsche Verlinkung, Button mittig gesetzt
* Add: codefog/contao-haste in composer.json
* Add: tl_tributes Toggle-Funktion Haste eingebaut
* Change: tl_tributes_items Toggle-Funktion durch Haste-Toggler ersetzt
* Add: tl_settings.tributes_anleitung -> Kurze Anleitung, wie Personen in diese E-Mail hineinkommen.
* Add: tl_settings.tributes_empfaenger.aktiv um Empfänger der Geburtstagsmail (de)aktivieren zu können

## Version 1.1.2 (2022-11-23)

* Fix: Verlinkung funktioniert nicht richtig im Frontend -> Spielerregister wird verlinkt, aber nicht wenn eine zusätzliche URL hinzugefügt wird -> Ausgabe im Template hat gefehlt

## Version 1.1.1 (2021-08-11)

* Change: tl_tributes_items - pagePicker durch dcaPicker ersetzt
* Fix: tl_tributes_items.spielerregister_id - includeBlankOption auf true und submitOnChange auf false gesetzt

## Version 1.1.0 (2021-02-25)

* Add: Abhängigkeit menatwork/contao-multicolumnwizard-bundle
* Change: Hardcodierte Adressen aus ehrungen.php in Systemeinstellungen verschoben
* Add: Unterstützung für den Dienst SMS77, Optionen unter Systemeinstellungen

## Version 1.0.2 (2020-06-11)

* Fix: BE-Bereich dsb -> content
* Fix: Inhaltselemente-Bereich dsb -> includes

## Version 1.0.1 (2020-06-09)

* Fix ehrungen.php

## Version 1.0.0 (2020-05-28)

* Migration der C3-Version 0.0.2/1.1.0 nach Contao 4
