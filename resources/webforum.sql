-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 01:52 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `post_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `author` varchar(1000) NOT NULL,
  `time` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`post_id`, `comment`, `author`, `time`) VALUES
(2, 'test coment', 'test', ''),
(2, 'test coment2', 'test1', ''),
(1, 'this is a test comment', 'zxc', '09-08-2020 (Sun) 00:38:09'),
(1, 'this is a test comment', 'zxc', '09-08-2020 (Sun) 00:38:22'),
(1, 'this is a test comment', 'kenny', '09-08-2020 (Sun) 15:23:21'),
(1, 'testing comment', 'kenny', '09-08-2020 (Sun) 16:25:32'),
(5, 'this is a test comment', 'kenny', '09-08-2020 (Sun) 16:30:40'),
(1, 'testing comment', 'ken', '12-08-2020 (Wed) 01:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email`, `gender`, `admin_name`, `admin_pass`) VALUES
(1, 'test1', 'testl', 'testemail@gmail.com', 'male', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `com_id` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `post_id` int(20) NOT NULL,
  `com_date` date NOT NULL,
  `user_id` int(20) NOT NULL,
  `com_upvote` int(20) NOT NULL DEFAULT 1,
  `com_downvote` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mod`
--

CREATE TABLE `tbl_mod` (
  `mod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(20) NOT NULL,
  `post_content` varchar(50) NOT NULL,
  `post_image` varchar(50) DEFAULT NULL,
  `post_time` varchar(30) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `post_upvote` int(20) NOT NULL DEFAULT 1,
  `post_downvote` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_title`, `post_content`, `post_image`, `post_time`, `cat_id`, `user_name`, `post_upvote`, `post_downvote`) VALUES
(1, 'test', 'content', '', '00:00:00', 2, '1', 0, 0),
(7, 'title2', 'description3', NULL, '08-08-2020 (Sat) 15:56:41', 1, 'zxc', 1, 1),
(8, 'title2', 'description3', NULL, '08-08-2020 (Sat) 15:56:51', 1, 'zxc', 1, 1),
(9, 'test20', 'ttext', NULL, '12-08-2020 (Wed) 01:16:23', 6, 'ken', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `post_id` int(10) NOT NULL,
  `rep_title` varchar(20) NOT NULL,
  `rep_message` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_upvote` int(20) NOT NULL DEFAULT 1,
  `user_downvote` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `fname`, `lname`, `gender`, `email`, `username`, `password`, `user_upvote`, `user_downvote`) VALUES
(11, 'ken', 'seb', 'Male', 'kennyseb@gmail.com', 'ken', 'f632fa6f8c3d5f551c5df867588381ab', 1, 1),
(20, 'test1', 'test', 'Male', 'joedas1234@gmail.com', 't1', '83f1535f99ab0bf4e9d02dfd85d3e3f7', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_mod`
--
ALTER TABLE `tbl_mod`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mod`
--
ALTER TABLE `tbl_mod`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
