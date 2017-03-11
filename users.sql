-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2017 at 05:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `offline-chat-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_login_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_login_date`) VALUES
(1, 'skdjdbncskdj', 'lkerfnlkerkf', 'lsnflwejn@lkfner', '0000-00-00'),
(2, 'satyam', '123456', 'satyambhalla17@g', '0000-00-00'),
(3, 'satyams', 'satyamkdfj@dflknv.com', 'fjsdfndljf', '2017-02-26'),
(4, 'sdmn', 'krjfjkjrf@lrkkngferlkrj.com', '8d6f6a8563105b04', '2017-02-26'),
(5, 'skjfjbskdj', 'kfbwkjjf@gmail.com', '489d3f7c5facc2f6c199e311367814da', '2017-02-26'),
(6, 'satyam12', 'ldkfnl@skjf.com', '324472a55697b66512ffa3585eadeaea3028114d', '2017-02-26'),
(7, 'ksjdbfkwjd', 'skjjfsljj@skdjfn.com', '8181542a3b5c6f36cc79c5c11ab8670ce9005046', '2017-02-26'),
(8, 'dscbkjd', 'ksdsk@sd.com', '55037028a1b4cdc866819eec0f504f0662a1965d', '2017-02-26'),
(9, 'satyam18', 'satyambhalla17@gmail.com', 'c07daf0599bcf7dd23f1795e19023459a83d0fd1', '2017-02-27'),
(10, 'test', 'test@test.com', '4028a0e356acc947fcd2bfbf00cef11e128d484a', '2017-02-27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
