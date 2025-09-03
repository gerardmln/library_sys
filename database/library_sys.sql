-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 01:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookstbl`
--

CREATE TABLE `bookstbl` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `pub_date` varchar(255) NOT NULL,
  `pub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookstbl`
--

INSERT INTO `bookstbl` (`book_id`, `isbn`, `title`, `authors`, `pub_date`, `pub_name`) VALUES
(1, '903940593459303', 'TAYOG AND THE HOES', 'Pal Pangit', '11/17/2004', 'Mangga books'),
(2, '928598349589', 'Paul and the Seven Hoes', 'Paul', '12/08/24', 'Paul Pastae'),
(3, '984958394859', 'GERO AND DWARFS', 'Tayog', '09/08/24', 'Kielbooks');

-- --------------------------------------------------------

--
-- Table structure for table `mytbl`
--

CREATE TABLE `mytbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mytbl`
--

INSERT INTO `mytbl` (`id`, `name`, `address`, `email`, `section`, `contact`, `password`, `account_type`) VALUES
(5, 'Rafael GABO', 'Bolbokenio, Lipa City', 'RGABmpedrad@yahoo.com', '12-A', '099842304565543', '', ''),
(6, 'Jam Mea', 'Inosluban, Lipa City', 'Jammymea@gmail.com', '12-A', '09532876543', '', ''),
(7, 'ChaRiz Toronto', 'Lodlod, Lipa City', 'Trizronto@gmail.com', '12-B', '09124736547', '', ''),
(8, 'Dishan Mauhay', 'Granja, Lipa City', 'Shanoverse@gmail.com', '12-B', '0948374822', '', ''),
(9, 'Brian Sinilaan', 'Granja, Lipa City', 'br14ansinilaan@gmail.com', '12-A', '098382873842', '', ''),
(10, 'Marvin Alejo', 'Bolbok, Lipa City', 'MvAlejo@gmail.com', '12-B', '0947298394829', '', ''),
(11, 'Rocky Silva', 'Brgy 6, Lipa City', 'RockySilva@gmail.com', '12-C', '09347283748228', '', ''),
(12, 'Lorenz Masilang', 'Brgy 7, Lipa City', 'LRSilang@gmail.com', '12-C', '0929384928', '', ''),
(13, 'Kylo', 'Lodlod, Lipa City', 'kylo888@gmail.com', '12-A', '092734773267', '', ''),
(14, 'Rolando Lipata', 'Bolbok, Lipa City', 'Rolando093@gmail.com', '12-A', '092834827823', '', ''),
(15, 'raf', 'raf homes', 'raf@gmail.com', '12-RAF', '09309420394', '', ''),
(16, 'rafon', 'rafon homes', 'rafon@gmail.com', '12-RAFONE', '092384229384', '', ''),
(17, 'rafon', 'rafon homes', 'rafon@gmail.com', '12-RAFONE', '092384229384', 'admin', '2'),
(18, 'Poging Admin', '', 'admin@pogi.com', '', '', 'admin', '1'),
(19, 'Louie Gutz', 'SM Lipa', 'louie@gmail.com', 'SECTION123', '09347892394829', 'louie1234', ''),
(20, 'Tayog', 'Tayog City', 'tayog@gmail.com', '11-E', '928508349859345', 'tayog', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookstbl`
--
ALTER TABLE `bookstbl`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `mytbl`
--
ALTER TABLE `mytbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookstbl`
--
ALTER TABLE `bookstbl`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mytbl`
--
ALTER TABLE `mytbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
