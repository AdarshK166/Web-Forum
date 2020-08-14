-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 10:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
(1, 'testing comment', 'ken', '12-08-2020 (Wed) 01:05:14'),
(12, 'OnePlus Nord', 'ryan123', '13-08-2020 (Thu) 22:20:17'),
(13, 'It keeps telling me its in airplane mode', 'ryan123', '13-08-2020 (Thu) 22:44:19'),
(13, 'how do i get out of this mode?', 'ryan123', '13-08-2020 (Thu) 22:44:57'),
(13, 'On my motorola you just swipe down from the top twice and tap the aeroplane symbol that turns it on/off', 'ken', '13-08-2020 (Thu) 22:46:39'),
(12, 'Realme X2 Pro', 'janedoe', '14-08-2020 (Fri) 01:19:26'),
(12, 'OnePlus Nord', 'janedoe', '14-08-2020 (Fri) 01:37:19'),
(12, 'OnePlus Nord', 'janedoe1', '14-08-2020 (Fri) 01:47:09'),
(16, 'test', 'janedoe1', '14-08-2020 (Fri) 01:47:59'),
(12, 'Realme X2 Pro', 'janedoe123', '14-08-2020 (Fri) 02:09:34'),
(12, 'OnePlus Nord', 'janedoe123', '14-08-2020 (Fri) 02:12:45'),
(12, 'OnePlus Nord', 'jane123', '14-08-2020 (Fri) 02:20:00'),
(12, 'Realme X2 Pro', 'test1', '14-08-2020 (Fri) 02:22:51'),
(18, 'test', 'test1', '14-08-2020 (Fri) 02:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email`, `gender`, `admin_name`, `admin_pass`) VALUES
(1, 'testing', 'testing1', 'test1@gmail.com', 'male', 'admin', 'admin');

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
  `post_title` varchar(100) NOT NULL,
  `post_content` varchar(1000) NOT NULL,
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
(12, 'Which Phone is Better Realme X2 Pro or OnePlus Nord?', 'Better phone between OnePlus Nord and Realme X2 Pro?', 'download.jpg', '13-08-2020 (Thu) 22:17:03', 1, 'ken', 1, 1),
(13, 'Moto e5 Play aeroplane mode?', 'This phone is becoming a headache', 'download (1).jpg', '13-08-2020 (Thu) 22:41:59', 1, 'ryan123', 1, 1),
(18, 'Check out this game', 'Check out this game', 'Screenshot (104).png', '14-08-2020 (Fri) 02:23:38', 8, 'test1', 1, 1);

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
(11, 'ken', 'seb', 'Male', 'kenseb@gmail.comm', 'ken', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1),
(26, 'john', 'joe', 'Male', 'johnjoe@gmail.com', 'john', '202cb962ac59075b964b07152d234b70', 1, 1),
(27, 'Ryan', 'Reynolds', 'Male', 'rr@rr.com', 'ryan123', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1),
(37, 'abcd', 'abc', 'Others', 'dkas@zxcx.com', 'abc', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1),
(38, 'alex', 'alex', 'Male', 'dkas@zxc.com', 'alex', '946d20c91f154795805cebdefe919ef7', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
