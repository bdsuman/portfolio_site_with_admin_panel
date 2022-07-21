-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 08:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `active_status` tinyint(1) NOT NULL COMMENT '1 = Active or 2 = Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `details`, `image`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'First Banar', 'Information of Company', 'n/a', '1656176345.png', 0, '2022-06-19 14:13:13', '2022-07-21 16:19:10'),
(2, 'test', 'suman', 'suman', '1656176257.png', 0, '2022-06-25 16:28:54', '2022-07-21 16:19:08'),
(3, 'Welcome to the digilab', 'Small Details Make A Big <span>Impression</span>', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.', '1658420459.jpg', 1, '2022-07-21 16:20:59', '2022-07-21 16:26:51'),
(4, 'Welcome to the digilab', '<span>Strategic</span> Design And <span>Technology</span> Agency', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a                   paradisematic country.', '1658427332.jpg', 1, '2022-07-21 18:15:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `active_status` tinyint(1) NOT NULL COMMENT '1 = Active or 0 = Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 1, '2022-06-26 16:08:44', '2022-07-21 18:01:44'),
(2, 'Software Development', 1, '2022-06-26 18:45:33', '2022-07-21 18:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `UserName`, `Password`, `status`) VALUES
(1, 'suman', 'suman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `project_thumb` varchar(100) NOT NULL,
  `active_status` tinyint(1) NOT NULL COMMENT '1 = Active or 0 = Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `project_name`, `project_link`, `project_thumb`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Work Name', 'http://localhost/limitless/LTR/icons_icomoon.html', '1658426584.jpg', 1, '2022-06-26 17:08:43', '2022-07-21 18:03:04'),
(2, 1, 'Work Name', '#', '1658426619.jpg', 1, '2022-07-21 18:03:39', NULL),
(3, 1, 'Work Name', '#', '1658426638.jpg', 1, '2022-07-21 18:03:58', NULL),
(4, 1, 'Work Name', '#', '1658426702.jpg', 1, '2022-07-21 18:05:02', NULL),
(5, 1, 'Work Name', '#', '1658426718.jpg', 1, '2022-07-21 18:05:18', NULL),
(6, 1, 'Work Name', '#', '1658426734.jpg', 1, '2022-07-21 18:05:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `sub_title`, `page_link`, `status`) VALUES
(1, 'Autem beatae sit as', 'Similique incididunt', '6', 0),
(2, 'In quis sed qui ea', 'Ut iusto minim illum', '0', 0),
(3, 'Market Research', 'Even the all-powerful Pointing has no control about the blind.', '#', 1),
(4, 'Financial Services', 'Even the all-powerful Pointing has no control about the blind.', '#', 1),
(5, 'Online Marketing', 'Even the all-powerful Pointing has no control about the blind.', '#', 1),
(6, '24/7 Help & Support', 'Even the all-powerful Pointing has no control about the blind.', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_details` text NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `design_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active or 0 = Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_details`, `icon_name`, `design_status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Test', 'test', 0, '2022-06-20 15:48:31', '2022-07-21 16:39:27'),
(2, 'Test', 'test', 'tres', 0, '2022-06-25 17:18:50', '2022-07-21 16:39:28'),
(3, 'test', 'test', 'test', 0, '2022-06-26 15:18:08', '2022-06-26 15:36:16'),
(4, 'Business Strategy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n              Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-ideas', 1, '2022-07-21 16:44:46', NULL),
(5, 'Research', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n              Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-flasks', 1, '2022-07-21 16:45:26', NULL),
(6, 'Data Analysis', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n              Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-analysis', 1, '2022-07-21 16:46:14', NULL),
(7, 'UI Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n        Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-web-design', 1, '2022-07-21 16:46:43', NULL),
(8, 'Ux Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n              Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-ux-design', 1, '2022-07-21 16:47:32', NULL),
(9, 'Technology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n              Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-innovation', 1, '2022-07-21 16:48:10', NULL),
(10, 'Creative Solution', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste\r\n                dolores consequatur\r\n              Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis\r\n                nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea,\r\n                tempore et quam natus quaerat doloremque.', 'flaticon-idea', 1, '2022-07-21 16:48:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
