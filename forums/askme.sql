-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 01:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` longtext NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', '2021-05-01 18:44:32'),
(2, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.', '2021-05-01 18:45:40'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern.', '2021-05-02 12:46:27'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries.', '2021-05-02 12:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `comment_content` longtext NOT NULL,
  `thread_id` int(10) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES
(30, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying ', 26, '2021-05-05 17:47:36', '8'),
(35, 'please', 39, '2021-05-06 08:54:18', '7'),
(36, 'help', 1, '2021-05-06 10:57:39', '7');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(10) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` longtext NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'not able to install python', 'i am not able to install python in my windows. ', 1, 1, '2021-05-02 18:17:31'),
(36, 'gggg', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying ', 2, 8, '2021-05-05 17:48:10'),
(39, 'help me', 'please', 1, 7, '2021-05-06 08:54:08'),
(40, 'can\"t login to google', 'help', 1, 7, '2021-05-06 10:57:20'),
(41, 'Student', 'swdfdd', 1, 10, '2021-10-04 11:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(10) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, '', '$2y$10$4VyE4nNHe.Zg371Ibrkb4OOjmYYIhEpHzt.PghYY5KGcd0.HpHwN6', '2021-05-04 14:15:08'),
(2, 'h@g.com', '$2y$10$tD9CLB/Eo1l90G60rBHELOoBI0pEL27DLgySfl54VykOrMOpsNC4C', '2021-05-04 14:17:01'),
(3, 'h1@g.com', '$2y$10$JFdqBtVjnGCRa1DibKYzbeNB/pedKgRILH/Var/6188LBnHmp3WPC', '2021-05-04 14:20:26'),
(4, 'h2@g.com', '$2y$10$dwMovqoX2kl6r2648cOFbeTydxof4sHFOL2MPvwt8d6WQTLK5XgPG', '2021-05-04 14:32:30'),
(5, 'h22@g.com', '$2y$10$/QbAhN82jv7yZzoo4lz0EeWlepOE.Vf7akyH4zuNqxEqd5oMm7lhy', '2021-05-04 15:05:07'),
(6, 'q@h.com', '$2y$10$SA.dG7yzwJoh3dxj3WAuJOVRXONkf0qGRJlF9FpUTXeCvjeTjtE.K', '2021-05-04 15:28:59'),
(7, 'admin@a.com', '$2y$10$9NrWvV3edrK3y2dggROhQuk/4oLnwY.yVMw/VET53jodnzQIP.Mem', '2021-05-04 17:49:31'),
(8, 'a@a.com', '$2y$10$tZKniUazQdQtYZt8bMlBpOnth8u9DZWKkTHGN8LsxcPb8ZehfhUNC', '2021-05-05 17:45:20'),
(9, 'aaa@a.com', '$2y$10$hCC/cJu/xg0dLRJgwVVjKe8O09GcaWCuRx6fQlAeZyOJvJZhQb8vK', '2021-05-06 10:56:46'),
(10, 'harshal0@gmail.com', '$2y$10$/sTT95WGapIyA/1EyFupPujXIjHy470MLn09MNxjgBW3Qi2sFbKWe', '2021-10-04 11:58:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
