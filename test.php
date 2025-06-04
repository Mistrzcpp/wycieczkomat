<?php
session_start();

function wyswietlZmienna($nazwa, $wartosc)
{
    if (is_null($wartosc) || $wartosc === '') {
        echo "<strong>$nazwa:</strong> <span style='color: red;'>(brak danych)</span><br>";
    } else {
        echo "<strong>$nazwa:</strong> " . htmlspecialchars($wartosc) . "<br>";
    }
}

wyswietlZmienna("ID", $_SESSION['id'] ?? null);
wyswietlZmienna("Telefon", $_SESSION['phone'] ?? null);
wyswietlZmienna("Klasa", $_SESSION['class'] ?? null);
wyswietlZmienna("Liczba osób", $_SESSION['numberOf'] ?? null);
wyswietlZmienna("Data od", $_SESSION['dateFrom'] ?? null);
wyswietlZmienna("Data do", $_SESSION['dateTo'] ?? null);
wyswietlZmienna("Godzina od", $_SESSION['hourFrom'] ?? null);
wyswietlZmienna("Godzina do", $_SESSION['hourTo'] ?? null);
wyswietlZmienna("Miejsce", $_SESSION['place'] ?? null);
wyswietlZmienna("Program", $_SESSION['program'] ?? null);
wyswietlZmienna("Cel", $_SESSION['purpose'] ?? null);
wyswietlZmienna("Korzyści", $_SESSION['benefits'] ?? null);
wyswietlZmienna("Informacje dodatkowe", $_SESSION['information'] ?? null);
