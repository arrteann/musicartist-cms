-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2020 at 06:01 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prhm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mail`, `password`) VALUES
(1, 'prhm', 'parhamweezy@gmail.com', '42608f87a1d574cad5d36d47a8664e23');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` int NOT NULL,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `title`, `image`, `link`) VALUES
(1, 'Sard-Tar', './images/assets/sard-tar.jpeg', 'https://open.spotify.com/track/3MvrsUr1EvrmKHl33CYWff?si=CtP3AQD5SPGcMonNQia7zA'),
(2, 'Ta Akhar', './images/assets/taAkhar.jpeg', 'https://open.spotify.com/track/1EnuOPOsdcLNpdnqSEthtZ?si=kwvgUTFVRvKH2f4p-H_Ssw'),
(3, 'Khaki', './images/assets/khaki.jpeg', 'https://open.spotify.com/track/5e08sD37AfbwM5cREg7Sd8?si=vjcZe6msSsGF5PtWjPzARg'),
(4, 'RadoBargh', './images/assets/radobargh.jpeg', 'https://open.spotify.com/track/0hsSKrFfOAAnGstHrBpVxu?si=GjlfdQU9QzmbCut1wb1wXQ');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `spotify` text COLLATE utf8_unicode_ci NOT NULL,
  `instagram` text COLLATE utf8_unicode_ci NOT NULL,
  `second_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `bio`, `spotify`, `instagram`, `second_title`) VALUES
(1, 'prhm', 'Parham (born in Antwerp, Belgium on May 3, 1990) is an Iranian artist/producer/engineer known as Prhm. The now Canadian resident has contributed to many local Iranian releases that have climbed its way to the top of the charts. His unique working process has hit the Persian Rap scene with a new wave of sounds that is well appreciated all the way to iran.', 'https://open.spotify.com/artist/6WCRWNVgq8pEMyJymEO063', 'https://instagram.com/prhmxo', 'tracks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
