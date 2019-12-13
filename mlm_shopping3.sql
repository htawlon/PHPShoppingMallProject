-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2019 at 05:25 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm_shopping3`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(2, ' softdrinking'),
(3, 'Men Wears'),
(4, 'electronics'),
(5, 'perfumses'),
(6, 'snacks '),
(7, 'fast food'),
(8, 'acessories');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `order_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `email`, `phone`, `address`, `status`, `order_at`) VALUES
(9, 'htawlon', 'htawlon@gmail.com', '09793320860', 'yangon', 1, '2019-09-24 13:57:41'),
(10, 'khinewin', 'khinewin@gmail.com', '09282662562', 'á€±á€…á€ºá€¸á‚€á€€á€­á€³áŠ á€±á€™á€¬á€¹á€œá¿á€™á€­á€³á€„á€¹á¿á€™á€­á€¯á‚•á‹', 1, '2019-09-24 15:11:38'),
(11, 'ys', 'ys@gmail.com', '09793320860', 'yangon', NULL, '2019-09-25 14:18:47'),
(12, 'khinewin', 'khinewin@gmail.com', '85525555', 'Yatyui', NULL, '2019-09-25 14:51:22'),
(13, 'thitthatyan', 'thitthatyan@gmail.com', '09793320860', 'Yangon', NULL, '2019-09-25 15:03:51'),
(14, 'htawlon', 'htawlon@gmail.com', '09793320860', 'Thanle', NULL, '2019-09-28 13:37:52'),
(15, 'yy', 'yy@gmail.com', '09793320860', 'table2', 1, '2019-10-09 10:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `item_name`, `price`, `qty`, `order_id`) VALUES
(1, 'Coca cola', '700', 1, 9),
(2, 'fresh foods', '8500', 1, 9),
(3, 'hambugar set', '6500', 1, 9),
(4, 'Coca cola', '700', 3, 10),
(5, 'fresh foods', '8500', 3, 10),
(6, 'Coca cola', '700', 1, 11),
(7, 'fresh foods', '8500', 1, 11),
(8, 'hambugar set', '6500', 1, 11),
(9, 'fresh foods', '8500', 1, 12),
(10, 'Coca cola', '700', 1, 12),
(11, 'Coca cola', '700', 1, 13),
(12, 'hambugar set', '6500', 1, 13),
(13, 'fresh foods', '8500', 3, 13),
(14, 'men ware', '15000', 1, 14),
(15, 'humbager', '6500', 1, 14),
(16, 'Coca Cola', '700', 1, 14),
(17, 'Dounts', '4500', 1, 14),
(18, 'men ware', '15000', 2, 15),
(19, 'humbager', '6500', 2, 15),
(20, 'Coca Cola', '700', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `item_name`, `price`, `image`, `category_id`, `user_id`, `post_at`) VALUES
(2, 'hambugar set', 6500, '18-09-19-02-39-04-snacks foods.jpeg', 7, 1, '2019-09-18 21:09:04'),
(3, 'fresh foods', 8500, '18-09-19-02-40-06-snack.jpeg', 6, 1, '2019-09-18 21:10:06'),
(5, 'mango Juice', 2400, '25-09-19-03-45-59-images.jpeg', 2, 1, '2019-09-25 22:15:59'),
(6, 'Dounts', 4500, '25-09-19-03-46-31-donuts.jpeg', 7, 1, '2019-09-25 22:16:31'),
(7, 'Coca Cola', 700, '25-09-19-03-47-00-coca cola.jpeg', 2, 1, '2019-09-25 22:17:00'),
(8, 'humbager', 6500, '28-09-19-07-04-59-humbager.png', 7, 1, '2019-09-28 13:34:59'),
(9, 'men ware', 15000, '28-09-19-07-06-03-5329d3adecad04846adf3c09-750-563.jpg', 3, 1, '2019-09-28 13:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `role`, `create_at`) VALUES
(1, 'htawlon', 'htawlon@gmail.com', '484f172c279d01e292b11d06b94ad12772058b31', 1, '2019-09-05 14:05:10'),
(2, 'theinmyintsan', 'theinmyintsan2255@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2019-09-11 13:24:02'),
(3, 'test', 'test@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2019-09-12 13:24:18'),
(4, 'nilarwin', 'nilarwin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2019-09-15 22:36:59'),
(5, 'khinewin', 'khinewin@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, '2019-09-24 15:10:48'),
(6, 'ys', 'ys@gmail.com', '484f172c279d01e292b11d06b94ad12772058b31', NULL, '2019-09-25 14:17:18'),
(7, 'thitthatyan', 'thitthatyan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2019-09-25 14:50:44'),
(8, 'yy', 'yy@gmail.com', '484f172c279d01e292b11d06b94ad12772058b31', NULL, '2019-10-09 09:53:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
