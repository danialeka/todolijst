-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 07:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_applicatie`
--

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `username`, `email`, `password`) VALUES
(11, 'test123456', 'chepe@hotmail.ch', '$2y$10$C/kr'),
(12, 'user1234567', 'chepe@hotmail.ch', '$2y$10$HZLb2kpEuNzjcbu6sj0x3.Xxe1Zh6qrxQTyTwteJSTBOl04Suts5W'),
(13, 'admin', 'chepe@hotmail.ch', '$2y$10$hWzWO.hFjJdVWh1r1kR7LuNd5.HvyOVc9GeoAUAc90jonYl1qI8JG');

-- --------------------------------------------------------

--
-- Table structure for table `items_categorieen`
--

CREATE TABLE `items_categorieen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `items_categorieen`
--

INSERT INTO `items_categorieen` (`id`, `naam`) VALUES
(9, 'huis'),
(10, 'tuin'),
(11, 'school'),
(12, 'boodschappen'),
(13, 'huis'),
(14, 'tuin'),
(15, 'school'),
(16, 'boodschappen');

-- --------------------------------------------------------

--
-- Table structure for table `todo_items`
--

CREATE TABLE `todo_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `afgewerkt` tinyint(1) NOT NULL DEFAULT 0,
  `prioriteit` int(1) NOT NULL DEFAULT 0,
  `categorie_id` int(11) DEFAULT NULL,
  `gebruiker_id` int(10) UNSIGNED NOT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `todo_items`
--

INSERT INTO `todo_items` (`id`, `omschrijving`, `datum`, `afgewerkt`, `prioriteit`, `categorie_id`, `gebruiker_id`, `deadline`) VALUES
(1, 'gras maaien', '2022-01-26 08:13:09', 0, 1, NULL, 0, NULL),
(2, 'huiswerk maken', '2022-01-26 08:13:09', 0, 1, 11, 0, NULL),
(3, 'melk halen', '2022-01-26 08:13:09', 1, 0, 12, 0, NULL),
(4, 'php opdrachten afwerken', '2022-01-26 08:13:09', 0, 2, 11, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_categorieen`
--
ALTER TABLE `items_categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_items`
--
ALTER TABLE `todo_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `items_categorieen`
--
ALTER TABLE `items_categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `todo_items`
--
ALTER TABLE `todo_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
