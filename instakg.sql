DROP   DATABASE IF EXISTS instaKg;
CREATE DATABASE instaKg CHARACTER SET utf8 COLLATE utf8_general_ci;

use instaKg;

CREATE TABLE IF NOT EXISTS `ROLE` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(25),
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `USER` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25),
  `email` varchar(50),
  `mdpHash` varchar(250),
  `pp` varchar(50),
  `idRole` int(11),
  PRIMARY KEY (`idUser`),
  FOREIGN KEY (`idRole`) REFERENCES `ROLE`(`idRole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `POST` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50),
  `Desc` varchar(100),
  `idUser` int(11),
  PRIMARY KEY (`idPost`),
  FOREIGN KEY (`idUser`) REFERENCES `USER`(`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `LIKE` (
  `idLike` int(11) NOT NULL AUTO_INCREMENT,
  `idPost` int(11),
  `idUser` int(11),
  PRIMARY KEY (`idLike`),
  FOREIGN KEY (`idPost`) REFERENCES `POST`(`idPost`),
  FOREIGN KEY (`idUser`) REFERENCES `USER`(`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ABONNE` (
  `idAbonnement` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11),
  `idFollower` int(11),
  PRIMARY KEY (`idAbonnement`),
  FOREIGN KEY (`idFollower`) REFERENCES `USER`(`idUser`),
  FOREIGN KEY (`idUser`) REFERENCES `USER`(`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
