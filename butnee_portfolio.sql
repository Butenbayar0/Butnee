-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 04:33 AM
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
-- Database: `butnee_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `intro` varchar(300) NOT NULL,
  `details` text NOT NULL,
  `fb_link` varchar(100) NOT NULL,
  `twitter_link` varchar(100) NOT NULL,
  `linkedin_link` varchar(100) NOT NULL,
  `github_link` varchar(100) NOT NULL,
  `photo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `name`, `intro`, `details`, `fb_link`, `twitter_link`, `linkedin_link`, `github_link`, `photo`) VALUES
(1, 'Доржпалам Дөлгөөн', 'Миний нэрийг Дөлгөөн гэдэг. Би компьютер програм хангамжийн 3-р курсын оюутан. Би HTML, CSS, PHP , SQL зэрэг програмчиллын хэлнүүдийг мэддэг.', 'Би компьютерийн програмчлалд маш их дуртай, хөдөлмөрч, амбицтай хүн юм.  Би програмчлалд сайн. Би HTML, CSS,  PHP, MySQL-ийн талаар сайн мэдлэгтэй. ', 'https://www.facebook.com/profile.php?id=100094086589562', 'https://twitter.com/Cyrox69', 'https://www.linkedin.com/in/дөлгөөн-доржпалам-4449b7306/', 'https://github.com/cyrox69', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` int(1) NOT NULL,
  `small_text` text NOT NULL,
  `office` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `small_text`, `office`, `address`, `phone`, `email`) VALUES
(1, 'Hi guys.', 'dlgn\'s happy guy', 'Улаанбаатар хот, Монгол улс', '+97698090114', 'dlgndrjplm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `education_informations`
--

CREATE TABLE `education_informations` (
  `id` int(1) NOT NULL,
  `degree_name` varchar(100) NOT NULL,
  `year` int(5) NOT NULL,
  `progressbar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_informations`
--

INSERT INTO `education_informations` (`id`, `degree_name`, `year`, `progressbar`) VALUES
(6, 'Их Засаг Олон Улсын Их Сургууль Компьютер програм хангамж', 2021, 3);

-- --------------------------------------------------------

--
-- Table structure for table `guest_messages`
--

CREATE TABLE `guest_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `my_best_works`
--

CREATE TABLE `my_best_works` (
  `id` int(2) NOT NULL,
  `works_name` varchar(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `photo` varchar(110) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(3) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `some_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stastistics`
--

CREATE TABLE `stastistics` (
  `id` int(1) NOT NULL,
  `feature_item` int(11) NOT NULL,
  `active_products` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stastistics`
--

INSERT INTO `stastistics` (`id`, `feature_item`, `active_products`, `experience`, `clients`) VALUES
(1, 540, 560, 58, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(3) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_desegnation` varchar(100) NOT NULL,
  `customer_comment` text NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `photo` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `password`, `status`, `photo`) VALUES
(4, 'Дөлгөөн', 'dlgndrjplm@gmail.com', '$2y$10$ZUOSAfup.pKKkbCEstKJounTUgkfN3eiLMF85JXXTSTtQNFAHgAHK', 2, '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_informations`
--
ALTER TABLE `education_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_best_works`
--
ALTER TABLE `my_best_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stastistics`
--
ALTER TABLE `stastistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education_informations`
--
ALTER TABLE `education_informations`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `my_best_works`
--
ALTER TABLE `my_best_works`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stastistics`
--
ALTER TABLE `stastistics`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
