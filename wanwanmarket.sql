-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 17, 2024 at 06:35 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wanwanmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Seafood'),
(2, 'Meat');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `images` json NOT NULL,
  `slogan` text,
  `description` text,
  `price` float NOT NULL,
  `unit` enum('1lb','100g','ea') NOT NULL,
  `listingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catId`, `name`, `images`, `slogan`, `description`, `price`, `unit`, `listingDate`) VALUES
(2, 1, 'Pacific White Shrimp Raw 16-20/LB 300 g ', '[\"https://assets.shop.loblaws.ca/products/21043887/b2/en/front/21043887_front_a06_@2.png\", \"https://assets.shop.loblaws.ca/products/21043887/b2/en/angle/21043887_angle_a06_@2.png\"]', '&lt;p&gt;slogan&lt;/p&gt;', '&lt;p&gt;Responsibly farmed, Pacific White Shrimp are firm and delicious. With a zipperback shell you can easily zip off, the shrimp is already deveined for your convenience. +++&lt;/p&gt;', 8, '1lb', '2024-06-11'),
(7, 2, 'Top Sirloin Steak, Club Pack', '[\"https://assets.shop.loblaws.ca/products/20357632/b2/en/front/20357632_front_a06_@2.png\", \"https://assets.shop.loblaws.ca/products/20357632/b2/en/angle/20357632_angle_a06_@2.png\"]', '&lt;p&gt;Cut from Canada AA or higher.&lt;/p&gt;', '&lt;p&gt;Cut from Canada AA or higher.&lt;/p&gt;', 17.4, '1lb', '2024-06-17'),
(8, 2, 'Free From Angus Beef Burger', '[\"https://assets.shop.loblaws.ca/products/20862651/b2/en/front/20862651_front_a06_@2.png\"]', '&lt;p&gt;Succulent and meaty burgers made with Angus beef raised without the use of antibiotics or hormones. Our PC Free From line has grown to include delicious cuts of every kind, from fresh to frozen, whole roasts to deli slices.&lt;/p&gt;', '&lt;p&gt;Succulent and meaty burgers made with Angus beef raised without the use of antibiotics or hormones. Our PC Free From line has grown to include delicious cuts of every kind, from fresh to frozen, whole roasts to deli slices.&lt;/p&gt;', 14, 'ea', '2024-06-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catId` (`catId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
