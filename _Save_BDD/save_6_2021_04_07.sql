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
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(64) NOT NULL,
  `link` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `link`, `date_create`, `date_update`) VALUES
(1, 'bateau.jpg', '2021-04-02', '2021-04-02'),
(2, 'moto.jpg', '2021-04-02', '2021-04-02'),
(3, 'velo.jpg', '2021-04-02', '2021-04-02'),
(4, 'voiture.jpg', '2021-04-02', '2021-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `images_and_mots`
--

CREATE TABLE `images_and_mots` (
  `id` int(64) NOT NULL,
  `id_images` int(64) NOT NULL,
  `id_mots` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images_and_mots`
--

INSERT INTO `images_and_mots` (`id`, `id_images`, `id_mots`, `date_create`, `date_update`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lecons`
--

CREATE TABLE `lecons` (
  `id` int(64) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `theme` varchar(64) DEFAULT NULL,
  `images_and_mots_id` int(10) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lecons`
--

INSERT INTO `lecons` (`id`, `title`, `description`, `theme`, `images_and_mots_id`, `statut`, `date_create`, `date_update`) VALUES
(1, 'Leçon 1', 'Description 1', 'Halloween', NULL, 1, '2021-04-02', '2021-04-05'),
(2, 'Leçon 2', 'Description 2', 'Noël', NULL, 0, '2021-04-05', '2021-04-05'),
(3, 'Leçon 3', 'Description 3', 'Halloween', NULL, 1, '2021-04-05', '2021-04-05'),
(4, 'Leçon 4', 'Description 4', 'Noël', NULL, 0, '2021-04-05', '2021-04-05'),
(5, 'Leçon 5 ', 'Description 5', 'Halloween', NULL, 1, '2021-04-05', '2021-04-05'),
(6, 'Leçon 6', 'Description 6', 'Halloween', NULL, 1, '2021-04-05', '2021-04-05'),
(7, 'Leçon 7', 'Description 6', 'Halloween', NULL, 1, '2021-04-05', '2021-04-05'),
(8, 'Leçon 8', 'Description 6', 'Noël', NULL, 0, '2021-04-05', '2021-04-05'),
(9, 'Leçon 9', 'Description 6', 'Noël', NULL, 1, '2021-04-05', '2021-04-05'),
(10, 'Leçon 10', 'Description 10', 'Halloween', NULL, 0, '2021-04-05', '2021-04-05'),
(11, 'Leçon 11', 'Description 11', 'Halloween', NULL, 1, '2021-04-05', '2021-04-05'),
(12, 'Leçon 12', 'Description 12', 'Noël', NULL, 0, '2021-04-05', '2021-04-05'),
(13, 'Leçon 13', 'Description 13', 'Noël', NULL, 1, '2021-04-05', '2021-04-05'),
(14, 'Leçon 14', 'Description 14', 'Noël', NULL, 0, '2021-04-05', '2021-04-05'),
(15, 'Leçon 15', 'Description 15', 'Halloween', NULL, 1, '2021-04-05', '2021-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

CREATE TABLE `mots` (
  `id` int(64) NOT NULL,
  `mots` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id`, `mots`, `date_create`, `date_update`) VALUES
(1, 'bateau', '2021-04-02', '2021-04-02'),
(2, 'moto', '2021-04-02', '2021-04-02'),
(3, 'velo', '2021-04-02', '2021-04-02'),
(4, 'voiture', '2021-04-02', '2021-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `pseudo` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `pseudo`, `mail`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_images` (`id_images`),
  ADD KEY `id_mots` (`id_mots`);

--
-- Index pour la table `lecons`
--
ALTER TABLE `lecons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_and_mots_id` (`images_and_mots_id`);

--
-- Index pour la table `mots`
--
ALTER TABLE `mots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `lecons`
--
ALTER TABLE `lecons`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mots`
--
ALTER TABLE `mots`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  ADD CONSTRAINT `images_and_mots_ibfk_1` FOREIGN KEY (`id_images`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `images_and_mots_ibfk_2` FOREIGN KEY (`id_mots`) REFERENCES `mots` (`id`);

--
-- Contraintes pour la table `lecons`
--
ALTER TABLE `lecons`
  ADD CONSTRAINT `lecons_ibfk_1` FOREIGN KEY (`images_and_mots_id`) REFERENCES `images_and_mots` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
