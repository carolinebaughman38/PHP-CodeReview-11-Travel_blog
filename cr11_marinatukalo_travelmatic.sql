-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 03:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_marinatukalo_travelmatic`
--
CREATE DATABASE IF NOT EXISTS `cr11_marinatukalo_travelmatic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_marinatukalo_travelmatic`;

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `id` int(11) NOT NULL,
  `concert_name` varchar(55) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `concert_short_description` varchar(255) DEFAULT NULL,
  `ticket` varchar(25) DEFAULT NULL,
  `concert_web_address` varchar(100) DEFAULT NULL,
  `concert_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`id`, `concert_name`, `date`, `time`, `concert_short_description`, `ticket`, `concert_web_address`, `concert_image`) VALUES
(1, 'Budapest Festival Orchestra', '2019-11-25', '19:30:00', 'The Budapest Festival Orchestra was formed in 1983 by Iván Fischer and Zoltán Kocsis', '83 EUR', 'https://www.musikverein.at/konzert/eventid/39728', ''),
(2, 'Munch Chagall Picasso.The Batliner Collection', '2019-12-16', '18:00:00', 'The Albertina houses one of Europe’s most important compilations of Modernist art in the form of the Batliner Collection.', '17.9 EUR', 'https://www.albertina.at/en/exhibitions/monet-to-picasso/', ''),
(3, 'Elton John - Farewell Yellow Brick Road', '2020-01-26', '19:30:00', 'John, recently crowned by Billboard as the most successful performing male solo artist of all time, will perform two Hanging Rock concerts in January 2020 as par of the Australian leg of his global Farewell Yellow Brick Road tour.', '305 AUD', 'https://www.frontiertouring.com/eltonjohnhangingrock', ''),
(4, 'The Magic of Christmas', '2019-12-08', '14:00:00', 'Under the baton of acclaimed conductor, Simon Kenway, the Willoughby Symphony and special guest soloists from Pacific Opera will perform all of your favourite carols in this memorable celebration of glorious music that will fill your heart with the joy.', '51 AUD', 'https://theconcourse.com.au/the-magic-of-christmas/', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `country` varchar(55) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `zip` int(7) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fk_concert_id` int(11) DEFAULT NULL,
  `fk_to_do_id` int(11) DEFAULT NULL,
  `fk_restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country`, `city`, `zip`, `address`, `image`, `fk_concert_id`, `fk_to_do_id`, `fk_restaurant_id`) VALUES
(1, 'Austria', 'Vienna', 1010, 'Karlsplatz 1', NULL, NULL, 1, NULL),
(2, 'Austria', 'Vienna', 1130, 'Maxingstraße 13b', NULL, NULL, 2, NULL),
(3, 'Austria', 'Vienna', 1050, 'Kettenbrückengasse 19', NULL, NULL, NULL, 1),
(4, 'Austria', 'Vienna', 1050, 'Schönbrunner Straße 21', NULL, NULL, NULL, 2),
(5, 'Austria', 'Vienna', 1010, 'Musikvereinsplatz 1', NULL, 1, NULL, NULL),
(6, 'Austria', 'Vienna', 1010, 'Albertinaplatz 1', NULL, 2, NULL, NULL),
(7, 'Australia', 'Sydney', 2000, 'Bennelong Point', NULL, NULL, 3, NULL),
(8, 'Australia', 'Sydney', 2026, '1 Notts Ave,Bondi Beach', NULL, NULL, 4, NULL),
(9, 'Australia', 'Sydney', 2000, '238 Castlereagh St', NULL, NULL, NULL, 3),
(10, 'Australia', 'Sydney', 2000, '100/412-414 George Street LEVEL 2 THE STRAND', NULL, NULL, NULL, 4),
(11, 'Australia', 'Melbourne', 3442, 'Hanging Rock Reserve, Macedon Ranges, VIC', NULL, 3, NULL, NULL),
(12, 'Australia', 'Sydney', 2067, '409 Victoria Av, Chatswood', NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(55) DEFAULT NULL,
  `restaurant_type` varchar(25) DEFAULT NULL,
  `restaurant_short_description` varchar(255) DEFAULT NULL,
  `telephone` varchar(75) DEFAULT NULL,
  `restaurant_web_address` varchar(100) DEFAULT NULL,
  `restaurant_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `restaurant_name`, `restaurant_type`, `restaurant_short_description`, `telephone`, `restaurant_web_address`, `restaurant_image`) VALUES
(1, 'LEMON LEAF', 'thai', 'The best thai restaurant in the whole Vienna with the most delicious authentic Thai food', '0043 (1) 581 23 08', 'http://www.lemonleaf.at/', NULL),
(2, 'Sixta', 'austrian', 'The Sixta restaurant serves authentic viennese food', '0043 (1) 585 28 56', 'http://www.sixta-restaurant.at/', NULL),
(3, 'Alpha Restaurant', 'greek', 'Greek cooking has always been synonymous with generosity, hospitality and shared feasts, which is what Alpha Restaurant is all about.', '(02) 9098 1111', 'http://www.alpharestaurant.com.au/', NULL),
(4, 'The Restaurant Pendolino', 'italian', 'One of Australia`s most acclaimed Italian dining institutions, The Restaurant Pendolino celebrates regionally inspired Italian cuisine.', '(02) 9231 6117', 'https://www.pendolino.com.au/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `to_do`
--

CREATE TABLE `to_do` (
  `id` int(11) NOT NULL,
  `to_do_name` varchar(55) DEFAULT NULL,
  `to_do_short_description` varchar(255) DEFAULT NULL,
  `to_do_type` varchar(25) DEFAULT NULL,
  `to_do_web_address` varchar(100) DEFAULT NULL,
  `to_do_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `to_do`
--

INSERT INTO `to_do` (`id`, `to_do_name`, `to_do_short_description`, `to_do_type`, `to_do_web_address`, `to_do_image`) VALUES
(1, 'St.Charles Church', 'A magnificent religious building with a large cupola. The last work of the eminent baroque architect Johann Bernhard Fischer von Erlach.', '\r\nchurch', 'http://www.karlskirche.at/', NULL),
(2, 'Schonbrunn Zoo', 'From penguins and orangutans to giant pandas: discover more than 700 species of animals in the unique setting of this UNESCO World Cultural Heritage site and immerse yourself in different habitats from the arctic to the tropics', 'zoo', 'https://www.zoovienna.at/en/', NULL),
(3, 'Sydney Opera House', 'The Sydney Opera House is a multi-venue performing arts centre at Sydney Harbour in Sydney, New South Wales, Australia. It is one of the 20th century`s most famous and distinctive buildings.', 'opera house', 'https://www.sydneyoperahouse.com/', NULL),
(4, 'The Bondi Icebergs Swimming Club', 'Located at the southern end of Bondi Beach, Bondi Icebergs Club is an international landmark, and no trip to Sydney is complete without a visit to this pool and clubhouse.', 'swimming pool/club', 'https://icebergs.com.au/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('admin','user') DEFAULT 'user',
  `fk_restaurant_id` int(11) DEFAULT NULL,
  `fk_concert_id` int(11) DEFAULT NULL,
  `fk_to_do_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `fk_restaurant_id`, `fk_concert_id`, `fk_to_do_id`) VALUES
(1, 'Polina', 'Petersen', 'polina@petersen.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin', NULL, NULL, NULL),
(2, 'John', 'White', 'john@white.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin', NULL, NULL, NULL),
(3, 'Angela', 'Brown', 'angela@brown.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin', NULL, NULL, NULL),
(4, 'Gregor', 'Black', 'greg@black.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', NULL, NULL, NULL),
(5, 'Sue', 'Smith', 'sue@smith.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', NULL, NULL, NULL),
(6, 'Anna', 'Meyer', 'anna@meyer.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', NULL, NULL, NULL),
(7, 'Carla', 'Bright', 'carla@bright.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', NULL, NULL, NULL),
(8, 'Alfred', 'schwarz', 'alfred@schwarz.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_concert_id` (`fk_concert_id`),
  ADD KEY `fk_to_do_id` (`fk_to_do_id`),
  ADD KEY `fk_restaurant_id` (`fk_restaurant_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_do`
--
ALTER TABLE `to_do`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_restaurant_id` (`fk_restaurant_id`),
  ADD KEY `fk_concert_id` (`fk_concert_id`),
  ADD KEY `fk_to_do_id` (`fk_to_do_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `to_do`
--
ALTER TABLE `to_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`fk_concert_id`) REFERENCES `concert` (`id`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`fk_to_do_id`) REFERENCES `to_do` (`id`),
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`fk_restaurant_id`) REFERENCES `restaurant` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fk_restaurant_id`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`fk_concert_id`) REFERENCES `concert` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`fk_to_do_id`) REFERENCES `to_do` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
