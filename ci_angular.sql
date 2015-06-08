-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2015 at 08:40 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_angular`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin_level_id` int(10) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `enable` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `firstname`, `lastname`, `email`, `image`, `username`, `password`, `admin_level_id`, `last_login`, `created`, `modified`, `enable`) VALUES
(1, 'admin', 'admin', 'admin@madframework.com', 'default.jpg', 'admin', 'd41d8cd98f00b204e9800998ecf8427e0123456789hello', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE IF NOT EXISTS `tbl_option` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `variable_name` text,
  `option_value` text,
  `scale` varchar(100) DEFAULT NULL,
  `option_type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `option_name`, `variable_name`, `option_value`, `scale`, `option_type`, `created`, `modified`) VALUES
(1, 'Site name', 'site_name', 'Mad framework', '13', 'string', '2014-10-10 20:18:05', '2014-10-10 20:18:14'),
(2, 'Address', 'address1', 'Kirulaponne', '11', '1', '2014-10-10 20:20:49', '2014-10-10 20:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_type`
--

CREATE TABLE IF NOT EXISTS `tbl_option_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `option_type` varchar(50) DEFAULT NULL,
  `enable` tinyint(3) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_option_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_users`
--

