-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 08:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avengers`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoryxproducts`
--

CREATE TABLE `categoryxproducts` (
  `id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clientsxtags`
--

CREATE TABLE `clientsxtags` (
  `id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `daily_deals`
--

CREATE TABLE `daily_deals` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourities`
--

CREATE TABLE `favourities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productsximages`
--

CREATE TABLE `productsximages` (
  `id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referings`
--

CREATE TABLE `referings` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `referal_date` date NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tagsxproducts`
--

CREATE TABLE `tagsxproducts` (
  `id` int(11) DEFAULT NULL,
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `alternative_email` varchar(255) DEFAULT NULL,
  `membership_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryxproducts`
--
ALTER TABLE `categoryxproducts`
  ADD UNIQUE KEY `id` (`category_id`),
  ADD KEY `FK-categoryxproducts-productid` (`product_id`);

--
-- Indexes for table `clientsxtags`
--
ALTER TABLE `clientsxtags`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK-clientsxtags-clientid` (`client_id`),
  ADD KEY `FK-clientsxtags-tagid` (`tag_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_deals`
--
ALTER TABLE `daily_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-daily_deals-productid` (`product_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourities`
--
ALTER TABLE `favourities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-favourites-userid` (`user_id`),
  ADD KEY `FK-favourites-productid` (`product_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-feedbacks-productid` (`product_id`),
  ADD KEY `FK-feedbacks-userid` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-images-clientid` (`client_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_image_id` (`image_id`),
  ADD KEY `FK-products-userid` (`user_id`);

--
-- Indexes for table `productsximages`
--
ALTER TABLE `productsximages`
  ADD KEY `FK-productsximages-productid` (`product_id`),
  ADD KEY `FK-productsximages-imageid` (`image_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK-ratings-productid` (`product_id`),
  ADD KEY `FK-ratings-userid` (`user_id`);

--
-- Indexes for table `referings`
--
ALTER TABLE `referings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-referings-clientid` (`client_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagsxproducts`
--
ALTER TABLE `tagsxproducts`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK-tagsxproducts-tagid` (`tag_id`),
  ADD KEY `FK-tagsxproducts-productid` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-transactions` (`client_id`),
  ADD KEY `FK-transactions-membershipid` (`membership_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_membership_id` (`membership_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_deals`
--
ALTER TABLE `daily_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourities`
--
ALTER TABLE `favourities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referings`
--
ALTER TABLE `referings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoryxproducts`
--
ALTER TABLE `categoryxproducts`
  ADD CONSTRAINT `FK-categoryxproducts-categoryid` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK-categoryxproducts-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `clientsxtags`
--
ALTER TABLE `clientsxtags`
  ADD CONSTRAINT `FK-clientsxtags-clientid` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK-clientsxtags-tagid` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `daily_deals`
--
ALTER TABLE `daily_deals`
  ADD CONSTRAINT `FK-daily_deals-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `favourities`
--
ALTER TABLE `favourities`
  ADD CONSTRAINT `FK-favourites-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK-favourites-userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `FK-feedbacks-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK-feedbacks-userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK-images-clientid` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK-products-userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `productsximages`
--
ALTER TABLE `productsximages`
  ADD CONSTRAINT `FK-productsximages-imageid` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `FK-productsximages-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `FK-ratings-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK-ratings-userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `referings`
--
ALTER TABLE `referings`
  ADD CONSTRAINT `FK-referings-clientid` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tagsxproducts`
--
ALTER TABLE `tagsxproducts`
  ADD CONSTRAINT `FK-tagsxproducts-productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK-tagsxproducts-tagid` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK-transactions` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK-transactions-membershipid` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
