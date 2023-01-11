-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Sty 2023, 19:35
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `crud`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `ID_product` int(11) NOT NULL,
  `product_nazwa` varchar(50) NOT NULL,
  `product_opis` varchar(300) NOT NULL,
  `product_cena` decimal(10,2) NOT NULL,
  `product_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`ID_product`, `product_nazwa`, `product_opis`, `product_cena`, `product_foto`) VALUES
(1, 'Lampka nocna', 'Wygodna lampka nocna, przyjemnie oświetlająca naszą przestrzeń.', '42.00', '682646_1.jpg'),
(2, 'Stolik salonowy', 'Stolik salonowy świetnie komponujący się z meblami.', '89.00', 'stolik-kawowy-s8.jpg'),
(5, 'Rama obrazu', 'Przepiękna gotycka rama na obraz', '25.00', 'Ramy-na-wymiar-oprawa-obrazow-Makowka-EAN-GTIN-5904996590444.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_users` int(11) NOT NULL,
  `users_imie` varchar(40) NOT NULL,
  `users_nazwisko` varchar(50) NOT NULL,
  `users_login` varchar(50) NOT NULL,
  `users_haslo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_users`, `users_imie`, `users_nazwisko`, `users_login`, `users_haslo`) VALUES
(1, 'Jan', 'Kowalski', 'jan', '202cb962ac59075b964b07152d234b70');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID_product`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_users`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `ID_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
