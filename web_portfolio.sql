-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Nov 21. 11:30
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web_portfolio`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `web_oldal`
--

CREATE TABLE `web_oldal` (
  `uid` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `pass` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `regdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `web_oldal`
--

INSERT INTO `web_oldal` (`uid`, `name`, `mail`, `pass`, `regdatetime`, `rights`) VALUES
(1, 'Kocsis Pista', 'kp@gmail.com', 'asd', '2024-11-21 07:41:26', 101),
(2, 'géza', 'gz@gmail.com', 'fgh', '2024-11-21 10:06:34', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `web_oldal`
--
ALTER TABLE `web_oldal`
  ADD PRIMARY KEY (`uid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `web_oldal`
--
ALTER TABLE `web_oldal`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
