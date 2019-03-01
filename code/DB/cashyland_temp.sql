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
  `name` varchar(45) NOT NULL,
  `room` varchar(45) NOT NULL,
  PRIMARY KEY (`name`,`room`),
  KEY `fk_room_idx` (`room`),
  CONSTRAINT `fk_room` FOREIGN KEY (`room`) REFERENCES `room` (`location`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
);

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `url` varchar(191),
  `game_name` varchar(45),
  `room_location` varchar(45),
  `type` varchar(45),
  PRIMARY KEY (`url`, `game_name`, `room_location`)
);

ALTER TABLE media ADD FOREIGN KEY (`game_name`) REFERENCES cashyland.game (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE media ADD FOREIGN KEY (`room_location`) REFERENCES cashyland.room (`location`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE media ADD FOREIGN KEY (`type`) REFERENCES cashyland.type (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Table structure for table `promotion_user`
--

DROP TABLE IF EXISTS `promotion_user`;

CREATE TABLE `promotion_user` (
  `user_email` varchar(45) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  PRIMARY KEY (`user_email`,`promotion_id`),
  KEY `fk_promotion_idx` (`promotion_id`),
  CONSTRAINT `fk_promotion` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `location` varchar(45) NOT NULL,
  PRIMARY KEY (`location`),
  CONSTRAINT `fk_location` FOREIGN KEY (`location`) REFERENCES `location` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
);

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
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
  `zip_code` int(5) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_gender_idx` (`gender`),
  CONSTRAINT `fk_gender` FOREIGN KEY (`gender`) REFERENCES `gender` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
);
