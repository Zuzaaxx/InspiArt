# InspiArt - Aplikacja skutecznie pokonująca artblock

## Spis treści:
- [Informacje Ogólne](#informacje-ogólne)
- [Wybrane funkcje](#wybrane-funkcje)
- [Technologie](#technologie)
- [Zrzuty ekranu](#zrzuty-ekranu)
- [Instalacja](#instalacja)
- [Dodatkowe pliki](#dodatkowe-pliki)
- [Użycie](#użycie)

## Informacje Ogólne
InspiArt to aplikacja webowa dedykowana artystom, zarówno profesjonalnym, jak i początkującym. Jej głównym celem jest eliminacja problemu artblocka (braku inspiracji), który jest powszechnym zjawiskiem wśród artystów. Aplikacja generuje losowe pomysły, które mają inspirować użytkowników do tworzenia rysunków i ilustracji. 

Aplikacja oferuje:
- generatory pomysłów dostosowane do różnych stylów pracy, bądź preferencji użytkownika,
- galerię do przechowywania i porządkowania twórczości,
- możliwość personalizowania wyzwań artystycznych w celu dostosowania ich do indywidualnych potrzeb użytkownika. 

W odróżnieniu od innych narzędzi dostępnych na rynku, InspiArt łączy intuicyjny interfejs z funkcjonalnościami dedykowanymi zarówno amatorom, jak i profesjonalistom. Aplikacja umożliwia nie tylko szybkie znalezienie inspiracji, ale również zachowanie ciągłości twórczej poprzez integrację galerii użytkownika z generatorem pomysłów.

InspiArt doskonale sprawdzi się w przypadku:
- braku motywacji do tworzenia, 
- trudności w rozpoczęciu nowego, niecodziennego projektu artystycznego, 
- poszukiwania wyzwań i kreatywnych inspiracji. 

## Wybrane funkcje
- **Generator pomysłów** – losuje pomysł z bazy z podziałem na kategorie.
- **Logowanie i rejestracja** – spersonalizowane treści dzięki prostej autoryzacji użytkowników.
- **Responsywność** – aplikacja działa zarówno na komputerze, jak i na telefonie.
- **Galeria** – możliwość przesyłania własnych plików do aplikacji.

## Technologie
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Baza danych:** PostgreSQL
- **Wdrożenie:** Docker

## Zrzuty ekranu

login page & registration:
![login_page (2)](https://github.com/user-attachments/assets/9fb50f95-5d5e-4887-9e98-2959dec51f7b)
![registration](https://github.com/user-attachments/assets/ce400bde-1aae-47de-ac12-4fe1c4f12219)


gallery:
![gallery](https://github.com/user-attachments/assets/e81a5ae3-37aa-4599-95c0-bfc023d3cb1f)

mobile version:

![profile](https://github.com/user-attachments/assets/a22a7e96-655b-4859-81e7-000d9dcd8da3)
![login_page](https://github.com/user-attachments/assets/d4a9e708-d3e0-4964-a8b7-43f6717eb30b)

## Instalacja
### Wymagania
- Zainstalowany **Docker** oraz **Docker Compose**
- Przeglądarka obsługująca **HTML5**

### Kroki instalacji
1. **Klonowanie repozytorium**  
   ```sh
   git clone https://github.com/Zuzaaxx/InspiArt.git
   ```
2. **Przejście do katalogu projektu**  
   ```sh
   cd InspiArt
   ```
3. **Uruchomienie aplikacji**  
   - Upewnić się, że **Docker** jest uruchomiony
   - Wykonać polecenie:  
     ```sh
     docker-compose up --build
     ```
4. **Otworzenie aplikacji w przeglądarce**  
   - Przejdź do `http://localhost:8080`

Po uruchomieniu można się zalogować przykładowymi danymi:
- **Username:** `zuzi`
- **Hasło:** `1234`

## Dodatkowe pliki
- **Skrypt bazy danych:** `database.sql` (w katalogu głównym)
- **Prototyp z Figmy:** `InspiArt – figma prototype.pdf` (w katalogu `documentation`)
- **Diagram ERD:** `InspiArt_Database_ERD.png` (w katalogu `documentation`)

## Użycie
- **Niezalogowany użytkownik** ma dostęp tylko do strony logowania i rejestracji.
- **Po zalogowaniu w aktualnej wersji demo użytkownik może:**
  - Przeglądać przykładowe pomysły w zakładce favourites.
  - Przeglądać swoje prace w galerii.
  - Przeszukiwać galerię na podstawie tytułu lub opisu swojej pracy.
  - Dodawać nowe pomysły za pomocą formularza, który otworzy się po kliknięciu przycisku +.
  - Wylogować się, wybierając **Log out** z menu bocznego.
