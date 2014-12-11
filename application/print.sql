-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Masin: localhost
-- Tegemisaeg: 18.06.2014 kell 10:29:02
-- Serveri versioon: 5.5.37
-- PHP versioon: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `print`
--

-- --------------------------------------------------------

--
-- Struktuur tabelile `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `division` int(1) NOT NULL DEFAULT '4',
  `facebook` varchar(255) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int(1) NOT NULL DEFAULT '4',
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Tabeli andmete salvestamine `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email_address`, `company`, `phone`, `division`, `facebook`, `skype`, `date_created`, `role`) VALUES
(14, 'Roman', 'Dobrynin', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'roman.dobrynin@mail.com', '', '', 4, NULL, NULL, '2014-06-18 07:23:01', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
