Task description:
1. W bazie chcemy przechowywać kategorie w 4 wersjach językowych (PL / EN / DE / FR)
2. Napisanie migracji do bazy
3. Napisanie seeder’a wypełniającego bazę kilkoma testowymi kategoriami
4. REST API:
  - Endpoint umożliwiający pobranie listy kategorii dla wybranego locale
  - Endpoint umożliwiający dodanie nowej kategorii (definicja nazwy kategorii dla wymaganych locale)
5. Napisanie listenera, który w momencie dodania nowej kategorii wyślę notyfikację mailową pod zdefiniowany adres. *wysyłka notyfikacji nie musi być realizowana, pusta metoda notyfikacji w odpowiednim miejscu.
6. Test: przykładowy test sprawdzający poprawność działania powyższych endpointów.
Readme: opis krok po kroku jak uruchomić aplikację lokalnie, migracje itd.