# DB Backend ToDoList

## Database
> - Users:
>   - ID PK
>   - Login 
>   - Hashed password(40)
>   - ID_Uprawnien FK
> - Samochody:
>   - ID PK
>   - Rzeczy z pliku
> - Tabele pomocnicze z pliku
> - Tabela Uprawnienia
>   - ID
>   - Rodzaj_Uprawnien
>
> Uzpelnic dane 100

## Backend
> - Login
> - Signup
> - Session model
>   - Session time
>   - User based output
> - System wyswietlania aut z zapytania:
>   - TODO

## Queries
> - Login:
>   - sprawdza czy user istnieje zwraca false|user_ID&user_permsID
> - Signup:
>   - Czy taki user istnieje
>   - Dodaje uzytkownika z uprawnieniami klienta
> - Select_aut:
>   - bruteforce
>   - Rozciagalne zapytanie*
> - Selecty z tabel pomocniczych
> - Dodawanie:
>   - auta
>   - do tabel pomocniczych
> - Usuwanie:
>   - aut 
>   - z tabel pomocniczych

## TODO AFTER
> Opcja Kupna przez klienta </br>
> Opcja rezerwacji kupna </br>
> Opcja derezerwacji </br>
> Statystyki:
> - rejestracje
> - odwiedziny
> - ocena
> - zakupione
> </br>
>
> Dodawanie ofert przez klientow:
> - oczekujace oferty na dodanie
> - twoje oferty
> - administratorzy moga je akceptowac lub odrzucac