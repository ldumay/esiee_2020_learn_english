-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 avr. 2021 à 19:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `learn_english`
--
CREATE DATABASE IF NOT EXISTS `learn_english` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `learn_english`;

-- --------------------------------------------------------

--
-- Structure de la table `lecons`
--

CREATE TABLE `lecons` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_theme` int(10) DEFAULT NULL,
  `collection_id_images_and_mots` text DEFAULT NULL,
  `collection_id_sounds_and_images` text DEFAULT NULL,
  `collection_id_sounds_and_mots` text DEFAULT NULL,
  `collection_id_defs_and_mots` text DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `folder` varchar(64) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `link` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

CREATE TABLE `mots` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `mot` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sounds`
--

CREATE TABLE `sounds` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `link` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `def`
--

CREATE TABLE `defs` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(16) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `pseudo` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE `profs` (
  `id` int(16) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_users` int(16) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lecons_and_prof`
--

CREATE TABLE `lecons_and_prof` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(64) NOT NULL,
  `id_prof` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images_and_mots`
--

CREATE TABLE `images_and_mots` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_image` int(64) NOT NULL,
  `id_mot` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sounds_and_imagess`
--

CREATE TABLE `sounds_and_images` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_sound` int(64) NOT NULL,
  `id_image` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sounds_and_mots`
--

CREATE TABLE `sounds_and_mots` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_sound` int(64) NOT NULL,
  `id_mot` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `defs_and_mots`
--

CREATE TABLE `defs_and_mots` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_mot` int(64) NOT NULL,
  `id_def` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
  ADD FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Index pour la table `mots`
--
ALTER TABLE `mots`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Index pour la table `sounds`
--
ALTER TABLE `sounds`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Index pour la table `defs`
--
ALTER TABLE `defs`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Index pour la table `lecons_and_prof`
--
ALTER TABLE `lecons_and_prof`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD FOREIGN KEY (`id_prof`) REFERENCES `profs` (`id`);

--
-- Index pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD FOREIGN KEY (`id_image`) REFERENCES `images` (`id`),
  ADD FOREIGN KEY (`id_mot`) REFERENCES `mots` (`id`);

--
-- Index pour la table `sounds_and_images`
--
ALTER TABLE `sounds_and_images`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD FOREIGN KEY (`id_sound`) REFERENCES `sounds` (`id`),
  ADD FOREIGN KEY (`id_image`) REFERENCES `images` (`id`);

--
-- Index pour la table `sounds_and_mots`
--
ALTER TABLE `sounds_and_mots`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD FOREIGN KEY (`id_sound`) REFERENCES `sounds` (`id`),
  ADD FOREIGN KEY (`id_mot`) REFERENCES `mots` (`id`);

--
-- Index pour la table `defs_and_mots`
--
ALTER TABLE `defs_and_mots`
  ADD FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD FOREIGN KEY (`id_def`) REFERENCES `defs` (`id`),
  ADD FOREIGN KEY (`id_mot`) REFERENCES `mots` (`id`);

--
-- Index pour la table `lecons`
--
ALTER TABLE `lecons`
  ADD FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;