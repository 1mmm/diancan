use my_db;
SET NAMES utf8;
SET time_zone = '+08:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
DROP TABLE IF EXISTS `app`;
CREATE TABLE `app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `want` int(11) NOT NULL,
  `ppay` text NOT NULL,
  `selfmpay` text NOT NULL,
  `pmpay` text NOT NULL,
  `interest` text NOT NULL,
  `poundage` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Age` text NOT NULL,
  `nichen` text NOT NULL,
  `code` text NOT NULL,
  `level` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `fin`;
CREATE TABLE `fin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nichen` text NOT NULL,
  `str` text NOT NULL,
  `time` int(11) NOT NULL,
  `zt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `title` text,
  `id`  text NOT NULL,
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `txt` text,
  `time` text NOT NULL,
   PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `cdata`;
CREATE TABLE `cdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `name` text NOT NULL,
  `descr` text NOT NULL,
  `img` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `time` int(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
