-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 03:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotesDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `content`, `author`, `category`) VALUES
(1, 'We don’t get a chance to do that many things, and every one should be really\r\nexcellent. Because this is our life. And we’ve all chosen to do this with our\r\nlives. So it better be damn good. It better be worth it.', 'Steve Jobs', ''),
(2, 'If there is no solution, then there is no problem.', 'Les Shadoks', ''),
(3, 'When in doubt, use brute force.', 'Ken Thompson', ''),
(4, 'Simplicity is prerequisite for reliability', 'Dijkstra', ''),
(5, 'You can be productive or safe, not both.', 'Rob Pike', ''),
(6, 'Dealing with failure is easy: Work hard to improve. Success is also easy \r\nto handle: You\'ve solved the wrong problem. Work hard to improve.', 'Alan Jay Perlis', ''),
(7, 'It goes against the grain of modern education to teach children to \r\nprogram. What fun is there in making plans, acquiring discipline in \r\norganizing thoughts, devoting attention to detail and learning to be \r\nself-critical?', 'Alan Jay Perlis', ''),
(8, 'In seeking the unattainable, simplicity only gets in the way.', 'Alan Jay Perlis', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
