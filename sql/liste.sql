-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Author: Author: A.M.A
-- Client :  127.0.0.1
-- Généré le :  Lun 21 Décembre 2015 à 05:54
-- Version du backend :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de données :  `etatcivil`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
	`ID` INT(10) NOT NULL AUTO_INCREMENT,
	`prefecture` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`centretatcivil` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`registre` INT(10) NULL DEFAULT NULL,
	`acte` INT(10) NOT NULL,
	`date_acte` DATE NOT NULL,
	`nom` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`prenom` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`delivre_a` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`delivre_le` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`delivre_an` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`num_serie` INT(10) NOT NULL,
	`naissance_jour_moi` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`naissance_an` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`naissance_heure` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`naissance_minuite` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`naissance_nom_prenom` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`naissance_lieu` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`naissance_sexe` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`pere_nom_prenom` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`pere_datenaisance` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`pere_lieunaissance` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`pere_profession` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`pere_villederesidence` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`mere_nom_prenom` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`mere_datenaisance` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`mere_lieunaissance` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`mere_profession` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`mere_villederesidenc` VARCHAR(30) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`declaration_faite_par` VARCHAR(60) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`datejugement` VARCHAR(30) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`declaration_recue_pa` VARCHAR(60) NOT NULL COLLATE 'utf8mb3_unicode_ci',
	`Edit` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`Imprimer` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`Delete_` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`ID`) USING BTREE
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=72
;



