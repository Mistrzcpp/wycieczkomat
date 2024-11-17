-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 14, 2024 at 11:57 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wycieczkomat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cele_wycieczki`
--

CREATE TABLE `cele_wycieczki` (
  `id` int(11) NOT NULL,
  `opis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cele_wycieczki`
--

INSERT INTO `cele_wycieczki` (`id`, `opis`) VALUES
(1, 'Poznawanie kraju, jego środowiska przyrodniczego, tradycji, zabytków kultury i \r\nhistorii'),
(2, 'Poznawanie kultury i języka innych państw'),
(3, 'Poszerzanie wiedzy z różnych dziedzin życia społecznego, gospodarczego i \r\nkulturalnego'),
(4, 'Wspomaganie rodziny i szkoły w procesie wychowania'),
(5, 'Upowszechnienie wśród uczniów zasad ochrony środowiska naturalnego oraz \r\nwiedzy o składnikach i funkcjonowaniu rodzimego środowiska przyrodniczego, a \r\ntakże umiejętności korzystania z zasobów przyrody'),
(6, 'Upowszechnianie zdrowego stylu życia i aktywności fizycznej oraz podnoszenie \r\nsprawności fizycznej'),
(7, 'Poprawę stanu zdrowia uczniów pochodzących z terenów zagrożonych \r\nekologicznie'),
(8, 'Przeciwdziałanie zachowaniom ryzykownym, w szczególności w ramach profilaktyki \r\nuniwersalnej'),
(9, 'Poznawanie zasad bezpiecznego zachowania się w różnych sytuacjach');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `formy_wycieczki`
--

CREATE TABLE `formy_wycieczki` (
  `id` int(11) NOT NULL,
  `opis` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formy_wycieczki`
--

INSERT INTO `formy_wycieczki` (`id`, `opis`) VALUES
(1, 'Wycieczki przedmiotowe – inicjowane i realizowane przez nauczycieli w celu \r\nuzupełnienia obowiązującego programu nauczania, w ramach jednego lub \r\nkilku przedmiotów'),
(2, 'Wycieczki krajoznawczo-turystyczne- w których udział nie wymaga od uczniów \r\nprzygotowania kondycyjnego i umiejętności posługiwania się specjalistycznym \r\nsprzętem, organizowanych w celu nabywania wiedzy o otaczającym środowisku i \r\numiejętności zastosowania tej wiedzy w praktyce'),
(3, 'Specjalistyczne wycieczki krajoznawczo-turystyczne - w których udział wymaga \r\nod uczniów przygotowania kondycyjnego, sprawnościowego i umiejętności \r\nposługiwania się specjalistycznym sprzętem, a program wycieczki przewiduje \r\nintensywną aktywność turystyczną, fizyczną lub długodystansowość na szlakach \r\nturystycznych');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opiekunowie`
--

CREATE TABLE `opiekunowie` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `wniosek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przypisane_stanowiska`
--

CREATE TABLE `przypisane_stanowiska` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `stanowisko_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `przypisane_stanowiska`
--

INSERT INTO `przypisane_stanowiska` (`id`, `uzytkownik_id`, `stanowisko_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 4),
(4, 3, 4),
(5, 4, 2),
(6, 5, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowiska`
--

CREATE TABLE `stanowiska` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stanowiska`
--

INSERT INTO `stanowiska` (`id`, `nazwa`) VALUES
(1, 'nauczyciel'),
(2, 'kadry'),
(3, 'sekretariat'),
(4, 'dyrektor');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusy`
--

INSERT INTO `statusy` (`id`, `nazwa`) VALUES
(1, 'Planowanie'),
(2, 'Przekazane do kadr'),
(3, 'Przekazane do sekretariatu'),
(4, 'Przekazane do dyrektora'),
(5, 'Zaakceptowane'),
(6, 'Odrzucone');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `login` varchar(100) NOT NULL,
  `haslo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `login`, `haslo`) VALUES
(1, 'Jan', 'Kowalski', 'j.kowalski', '$2y$10$Umd9lBmL4EIp5CEqYjIk..5ipFmlO8uu67GMGy2Fj3cMZ/RU/NpLG'),
(2, 'Adam', 'Nowak', 'a.nowak', '$2y$10$hgNQOOatj3ZLXpXw66M.bOz/PJnhimkqhuAj4OMUPn80bGkOZhKei'),
(3, 'Tomasz', 'Wiśniewski', 't.wisniewski', '$2y$10$Umd9lBmL4EIp5CEqYjIk..5ipFmlO8uu67GMGy2Fj3cMZ/RU/NpLG'),
(4, 'Bartosz', 'Maliński', 'b.malinski', '$2y$10$Umd9lBmL4EIp5CEqYjIk..5ipFmlO8uu67GMGy2Fj3cMZ/RU/NpLG'),
(5, 'Robert', 'Iwaszkiewicz', 'r.iwaszkiewicz', '$2y$10$Umd9lBmL4EIp5CEqYjIk..5ipFmlO8uu67GMGy2Fj3cMZ/RU/NpLG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wnioski`
--

CREATE TABLE `wnioski` (
  `id` int(11) NOT NULL,
  `kierownik_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sekretariat_id` int(11) DEFAULT NULL,
  `kadry_id` int(11) DEFAULT NULL,
  `data_zmiany_statusu` datetime NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `klasa` varchar(3) NOT NULL,
  `liczba_uczniow` int(11) NOT NULL,
  `data_od` datetime NOT NULL,
  `data_do` datetime NOT NULL,
  `miejsce` varchar(200) NOT NULL,
  `program` varchar(2000) NOT NULL,
  `korzysci` varchar(2000) NOT NULL,
  `informacje_dodatkowe` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wnioski`
--

INSERT INTO `wnioski` (`id`, `kierownik_id`, `status`, `sekretariat_id`, `kadry_id`, `data_zmiany_statusu`, `data_utworzenia`, `telefon`, `klasa`, `liczba_uczniow`, `data_od`, `data_do`, `miejsce`, `program`, `korzysci`, `informacje_dodatkowe`) VALUES
(1, 1, 1, 5, 4, '2024-11-14 14:22:41', '2024-11-14 14:22:41', '123456789', '4A', 37, '2025-06-01 14:22:41', '2025-06-01 18:22:41', 'Gdańsk', '1.Wyjazd\r\n2.Przyjazd\r\n3.Zwiedzanie\r\n4.Powrót', 'Coś napewno', 'Faktura, bilety, coś');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wybrane_cele`
--

CREATE TABLE `wybrane_cele` (
  `id` int(11) NOT NULL,
  `wniosek_id` int(11) NOT NULL,
  `cel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wybrane_formy`
--

CREATE TABLE `wybrane_formy` (
  `id` int(11) NOT NULL,
  `wniosek_id` int(11) NOT NULL,
  `forma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cele_wycieczki`
--
ALTER TABLE `cele_wycieczki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `formy_wycieczki`
--
ALTER TABLE `formy_wycieczki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `opiekunowie`
--
ALTER TABLE `opiekunowie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opiekunowie_ibfk_1` (`uzytkownik_id`),
  ADD KEY `opiekunowie_ibfk_2` (`wniosek_id`);

--
-- Indeksy dla tabeli `przypisane_stanowiska`
--
ALTER TABLE `przypisane_stanowiska`
  ADD PRIMARY KEY (`id`),
  ADD KEY `przypisane_stanowiska_ibfk_1` (`uzytkownik_id`),
  ADD KEY `przypisane_stanowiska_ibfk_2` (`stanowisko_id`);

--
-- Indeksy dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wnioski`
--
ALTER TABLE `wnioski`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wnioski_ibfk_1` (`kierownik_id`),
  ADD KEY `wnioski_ibfk_2` (`status`),
  ADD KEY `wnioski_ibfk_3` (`sekretariat_id`),
  ADD KEY `wnioski_ibfk_4` (`kadry_id`);

--
-- Indeksy dla tabeli `wybrane_cele`
--
ALTER TABLE `wybrane_cele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wybrane_cele_ibfk_1` (`cel_id`),
  ADD KEY `wybrane_cele_ibfk_2` (`wniosek_id`);

--
-- Indeksy dla tabeli `wybrane_formy`
--
ALTER TABLE `wybrane_formy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wybrane_formy_ibfk_1` (`forma_id`),
  ADD KEY `wybrane_formy_ibfk_2` (`wniosek_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cele_wycieczki`
--
ALTER TABLE `cele_wycieczki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `formy_wycieczki`
--
ALTER TABLE `formy_wycieczki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `przypisane_stanowiska`
--
ALTER TABLE `przypisane_stanowiska`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stanowiska`
--
ALTER TABLE `stanowiska`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wnioski`
--
ALTER TABLE `wnioski`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opiekunowie`
--
ALTER TABLE `opiekunowie`
  ADD CONSTRAINT `opiekunowie_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `opiekunowie_ibfk_2` FOREIGN KEY (`wniosek_id`) REFERENCES `wnioski` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `przypisane_stanowiska`
--
ALTER TABLE `przypisane_stanowiska`
  ADD CONSTRAINT `przypisane_stanowiska_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `przypisane_stanowiska_ibfk_2` FOREIGN KEY (`stanowisko_id`) REFERENCES `stanowiska` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `wnioski`
--
ALTER TABLE `wnioski`
  ADD CONSTRAINT `wnioski_ibfk_1` FOREIGN KEY (`kierownik_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wnioski_ibfk_2` FOREIGN KEY (`status`) REFERENCES `statusy` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wnioski_ibfk_3` FOREIGN KEY (`sekretariat_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wnioski_ibfk_4` FOREIGN KEY (`kadry_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wybrane_cele`
--
ALTER TABLE `wybrane_cele`
  ADD CONSTRAINT `wybrane_cele_ibfk_1` FOREIGN KEY (`cel_id`) REFERENCES `cele_wycieczki` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wybrane_cele_ibfk_2` FOREIGN KEY (`wniosek_id`) REFERENCES `wnioski` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `wybrane_formy`
--
ALTER TABLE `wybrane_formy`
  ADD CONSTRAINT `wybrane_formy_ibfk_1` FOREIGN KEY (`forma_id`) REFERENCES `formy_wycieczki` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wybrane_formy_ibfk_2` FOREIGN KEY (`wniosek_id`) REFERENCES `wnioski` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
