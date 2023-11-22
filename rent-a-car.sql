-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 sep 2023 om 19:09
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent-a-car`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `autos`
--

CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `kenteken` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(55) NOT NULL,
  `prijs` decimal(11,0) NOT NULL,
  `begindatum` datetime DEFAULT NULL,
  `einddatum` datetime DEFAULT NULL,
  `gereserveerd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `autos`
--

INSERT INTO `autos` (`id`, `kenteken`, `merk`, `type`, `prijs`, `begindatum`, `einddatum`, `gereserveerd`) VALUES
(1, '24-AA-91', 'Fiat', 'Punto', 30, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Daan', 'daan@mail.com', 'df1adba8ba5d932c204658bd4799d65fe011d52b'),
(2, 'Ken', 'ken@mail.com', '4ebca121e7e71c5425cc7380a266df3cb9ffe64a');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kenteken` (`kenteken`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
