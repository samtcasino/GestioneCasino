CREATE DATABASE  IF NOT EXISTS `cashyland`;
USE `cashyland`;

-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cashyland
-- ------------------------------------------------------
-- Server version	8.0.12

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;

CREATE TABLE `game` (
  `room` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`name`,`room`),
  KEY `fk_room_idx` (`room`),
  CONSTRAINT `fk_room` FOREIGN KEY (`room`) REFERENCES `room` (`location`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `game_media`
--

DROP TABLE IF EXISTS `game_media`;

CREATE TABLE `game_media` (
  `game_name` varchar(45) NOT NULL,
  `media_url` varchar(100) NOT NULL,
  PRIMARY KEY (`game_name`,`media_url`),
  KEY `game_media_media_idx` (`media_url`),
  CONSTRAINT `game_media_ibfk_1` FOREIGN KEY (`media_url`) REFERENCES `media` (`url`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `game_media_ibfk_2` FOREIGN KEY (`game_name`) REFERENCES `game` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;

CREATE TABLE `gender` (
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`name`)
);

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `url` varchar(100) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`url`),
  KEY `type` (`type`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`type`) REFERENCES `media_type` (`name`) ON DELETE SET NULL UPDATE CASCADE
);

--
-- Table structure for table `media_type`
--

DROP TABLE IF EXISTS `media_type`;

CREATE TABLE `media_type` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
);

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Table structure for table `promotion_media`
--

DROP TABLE IF EXISTS `promotion_media`;

CREATE TABLE `promotion_media` (
  `promotion_id` int(11) NOT NULL,
  `media_url` varchar(100) NOT NULL,
  PRIMARY KEY (`promotion_id`,`media_url`),
  KEY `media_url` (`media_url`),
  CONSTRAINT `promotion_media_ibfk_1` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promotion_media_ibfk_2` FOREIGN KEY (`media_url`) REFERENCES `media` (`url`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `promotion_user`
--

DROP TABLE IF EXISTS `promotion_user`;

CREATE TABLE `promotion_user` (
  `user_type` varchar(45) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  PRIMARY KEY (`user_type`,`promotion_id`),
  KEY `promotion_id` (`promotion_id`),
  CONSTRAINT `promotion_user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user` (`type`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promotion_user_ibfk_2` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `location` varchar(45) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`location`)
);

--
-- Table structure for table `room_media`
--

DROP TABLE IF EXISTS `room_media`;

CREATE TABLE `room_media` (
  `room_location` varchar(45) NOT NULL,
  `media_url` varchar(100) NOT NULL,
  PRIMARY KEY (`room_location`,`media_url`),
  KEY `media_url` (`media_url`),
  CONSTRAINT `room_media_ibfk_1` FOREIGN KEY (`room_location`) REFERENCES `room` (`location`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_media_ibfk_2` FOREIGN KEY (`media_url`) REFERENCES `media` (`url`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `house_number` varchar(4) DEFAULT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `gender` (`gender`),
  KEY `type` (`type`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`type`) REFERENCES `user_type` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
);

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
);