-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Author: Author: A.M.A
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Décembre 2015 à 07:56
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de données :  `etatcivil`
--

-- --------------------------------------------------------

--
-- Structure de la table `listeofficiers`
--

CREATE TABLE `listeofficiers` (
	`ID` INT(10) NOT NULL AUTO_INCREMENT,
	`pseudo` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`motdepasse` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`user` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`ID`) USING BTREE
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=10
;



