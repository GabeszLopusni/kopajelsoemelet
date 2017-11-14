-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Sze 01. 10:10
-- Kiszolgáló verziója: 10.1.26-MariaDB
-- PHP verzió: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bosch_admin`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'bdc4ccce68413d92b4f34e56396e3b881063cdee');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oldalak`
--

CREATE TABLE `oldalak` (
  `id` int(11) NOT NULL,
  `cim` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `tartalom` mediumtext CHARACTER SET utf8 COLLATE utf8_hungarian_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `oldalak`
--

INSERT INTO `oldalak` (`id`, `cim`, `tartalom`) VALUES
(1, 'Teszt', '<p style=\"text-align:center\"><em>TESZT1022132133123</em></p>\r\n\r\n<p style=\"text-align:center\">123123213123123</p>\r\n\r\n<blockquote>\r\n<p style=\"text-align:center\">Id&eacute;zet</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://pctrs.network.hu/clubpicture/1/4/9/2/_/kutyas_kepek_13_1492289_1211.jpg\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p style=\"text-align:center\">123123231</p>\r\n\r\n<p style=\"text-align:center\"><select name=\"LegÃ¶rdÃ¼l\"><option value=\"Teszt1\">Teszt1</option></select></p>\r\n'),
(2, 'Mosógép', '<p>123123</p>\r\n'),
(3, 'Szakszervíz', 'TesztTeszt3'),
(4, 'Szolgáltatások', '<p style=\"text-align:center\">TesztTeszt4</p>\r\n'),
(5, 'Rólunk', 'TesztTeszt5'),
(6, 'Helloka', '<p>ABCDEFHFHAKASDKLASD&Eacute;</p>\r\n'),
(7, 'Minta1', NULL),
(8, 'Minta3', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `oldalak`
--
ALTER TABLE `oldalak`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `oldalak`
--
ALTER TABLE `oldalak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
