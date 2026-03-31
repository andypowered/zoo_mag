-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 31, 2026 la 12:05 PM
-- Versiune server: 10.4.25-MariaDB
-- Versiune PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `magazin_zoologic`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorii`
--

CREATE TABLE `categorii` (
  `ID_categorie` int(11) NOT NULL,
  `Denumirea_categoriei` varchar(100) NOT NULL,
  `Descriere` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `categorii`
--

INSERT INTO `categorii` (`ID_categorie`, `Denumirea_categoriei`, `Descriere`, `created_at`) VALUES
(3, 'Păsări', 'Produse pentru păsări: hrană, colivii, accesorii', '2026-03-31 08:54:43'),
(4, 'Pești', 'Produse pentru acvariu: hrană, echipamente, decorațiuni', '2026-03-31 08:54:43'),
(5, 'Rozătoare', 'Produse pentru hamsteri, cobai, șoareci', '2026-03-31 08:54:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `ID_produs` int(11) NOT NULL,
  `Denumirea_produsului` varchar(200) NOT NULL,
  `Pret` decimal(10,2) NOT NULL CHECK (`Pret` >= 0),
  `Cantitate` int(11) NOT NULL CHECK (`Cantitate` >= 0),
  `Producator` varchar(100) NOT NULL,
  `ID_categorie` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`ID_produs`, `Denumirea_produsului`, `Pret`, `Cantitate`, `Producator`, `ID_categorie`, `created_at`) VALUES
(1, 'Hrană uscată câini 15kg', '120.00', 50, 'Royal Canin', NULL, '2026-03-31 08:54:43'),
(2, 'Lesă autoîncolăcitoare', '45.99', 30, 'Trixie', NULL, '2026-03-31 08:54:43'),
(3, 'Nisip pentru pisici 10L', '25.50', 100, 'Ever Clean', NULL, '2026-03-31 08:54:43'),
(4, 'Jucărie cu șoarece', '15.00', 75, 'PetSafe', NULL, '2026-03-31 08:54:43'),
(5, 'Colivie pentru papagali', '350.00', 10, 'Ferplast', 3, '2026-03-31 08:54:43'),
(6, 'Hrană pentru pești 250ml', '18.99', 200, 'Tetra', 4, '2026-03-31 08:54:43'),
(7, 'Roata pentru hamster', '35.00', 25, 'Savic', 5, '2026-03-31 08:54:43'),
(8, 'Hrana', '120.00', 54, 'Trixie', NULL, '2026-03-31 09:42:10');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categorii`
--
ALTER TABLE `categorii`
  ADD PRIMARY KEY (`ID_categorie`),
  ADD UNIQUE KEY `Denumirea_categoriei` (`Denumirea_categoriei`);

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`ID_produs`),
  ADD KEY `ID_categorie` (`ID_categorie`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categorii`
--
ALTER TABLE `categorii`
  MODIFY `ID_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `ID_produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `produse_ibfk_1` FOREIGN KEY (`ID_categorie`) REFERENCES `categorii` (`ID_categorie`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
