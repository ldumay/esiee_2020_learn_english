-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 02 mai 2021 à 23:13
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
-- Structure de la table `defs`
--

CREATE TABLE `defs` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `defs`
--

INSERT INTO `defs` (`id`, `id_lecon`, `link`, `date_create`, `date_update`) VALUES
(1, 1, 'je flotte', '2021-04-02', '2021-04-02'),
(2, 1, 'j\'ai deux roues et un moteur', '2021-04-02', '2021-04-02'),
(3, 1, 'j\'ai deux roues et des pédales', '2021-04-02', '2021-04-02'),
(4, 1, 'j\'ai quatres roues et un moteur', '2021-04-02', '2021-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `defs_and_mots`
--

CREATE TABLE `defs_and_mots` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_mot` int(64) NOT NULL,
  `id_def` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `defs_and_mots`
--

INSERT INTO `defs_and_mots` (`id`, `id_lecon`, `id_mot`, `id_def`, `date_create`, `date_update`) VALUES
(9, 1, 1, 1, NULL, NULL),
(10, 1, 2, 2, NULL, NULL),
(11, 1, 3, 3, NULL, NULL),
(12, 1, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `link` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `id_lecon`, `link`, `date_create`, `date_update`) VALUES
(1, 2, 'bateau.jpg', '2021-04-02', '2021-04-02'),
(2, 2, 'moto.jpg', '2021-04-02', '2021-04-02'),
(3, 2, 'velo.jpg', '2021-04-02', '2021-04-02'),
(4, 2, 'voiture.jpg', '2021-04-02', '2021-04-02'),
(5, 4, 'bateau.jpg', '2021-04-02', '2021-04-02'),
(6, 4, 'moto.jpg', '2021-04-02', '2021-04-02'),
(7, 4, 'velo.jpg', '2021-04-02', '2021-04-02'),
(8, 4, 'voiture.jpg', '2021-04-02', '2021-04-02'),
(9, 4, 'chat.jpg', '2021-05-03', '2021-05-03'),
(10, 4, 'ane.jpg', '2021-05-03', '2021-05-03'),
(11, 4, 'souris.jpg', '2021-05-03', '2021-05-03'),
(12, 4, 'chien.jpg', '2021-05-03', '2021-05-03');

-- --------------------------------------------------------

--
-- Structure de la table `images_and_mots`
--

CREATE TABLE `images_and_mots` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_image` int(64) NOT NULL,
  `id_mot` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images_and_mots`
--

INSERT INTO `images_and_mots` (`id`, `id_lecon`, `id_image`, `id_mot`, `date_create`, `date_update`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 2, NULL, NULL),
(3, 1, 3, 3, NULL, NULL),
(4, 1, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lecons`
--

CREATE TABLE `lecons` (
  `id` int(64) NOT NULL,
  `id_theme` int(10) DEFAULT NULL,
  `collection_id_images_and_mots` text,
  `collection_id_sounds_and_images` text,
  `collection_id_sounds_and_mots` text,
  `collection_id_defs_and_mots` text,
  `title` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `folder` varchar(64) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lecons`
--

INSERT INTO `lecons` (`id`, `id_theme`, `collection_id_images_and_mots`, `collection_id_sounds_and_images`, `collection_id_sounds_and_mots`, `collection_id_defs_and_mots`, `title`, `description`, `folder`, `statut`, `date_create`, `date_update`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'Leçon 1 [Sons & Mots]', 'son', NULL, 1, '2021-04-05', '2021-04-05'),
(2, 1, NULL, NULL, NULL, NULL, 'Leçon 2 [Images & Mots]', 'images', NULL, 1, '2021-04-05', '2021-04-05'),
(3, 1, NULL, NULL, NULL, NULL, 'Leçon 3 [Mots & Déf.]', 'bonus', NULL, 1, '2021-04-05', '2021-04-05'),
(4, 1, NULL, NULL, NULL, NULL, 'Leçon 4 [Sons & Images]', 'sonimages', NULL, 1, '2021-04-05', '2021-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `lecons_and_prof`
--

CREATE TABLE `lecons_and_prof` (
  `id` int(64) NOT NULL,
  `id_lecon` int(64) NOT NULL,
  `id_prof` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

CREATE TABLE `mots` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `mot` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id`, `id_lecon`, `mot`, `date_create`, `date_update`) VALUES
(1, 1, 'bateau', '2021-04-02', '2021-04-02'),
(2, 1, 'moto', '2021-04-02', '2021-04-02'),
(3, 1, 'velo', '2021-04-02', '2021-04-02'),
(4, 1, 'voiture', '2021-04-02', '2021-04-02'),
(5, 1, 'chat', '2021-04-02', '2021-04-02'),
(6, 1, 'ane', '2021-04-02', '2021-04-02'),
(7, 1, 'souris', '2021-04-02', '2021-04-02'),
(8, 1, 'chien', '2021-04-02', '2021-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE `profs` (
  `id` int(16) NOT NULL,
  `id_users` int(16) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sounds`
--

CREATE TABLE `sounds` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `link` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sounds`
--

INSERT INTO `sounds` (`id`, `id_lecon`, `link`, `date_create`, `date_update`) VALUES
(1, 1, 'chat.mp3', '2021-04-02', '2021-04-02'),
(2, 1, 'ane.mp3', '2021-04-02', '2021-04-02'),
(3, 1, 'souris.mp3', '2021-04-02', '2021-04-02'),
(4, 1, 'chien.mp3', '2021-04-02', '2021-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `sounds_and_images`
--

CREATE TABLE `sounds_and_images` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_sound` int(64) NOT NULL,
  `id_image` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sounds_and_images`
--

INSERT INTO `sounds_and_images` (`id`, `id_lecon`, `id_sound`, `id_image`, `date_create`, `date_update`) VALUES
(1, 4, 1, 9, NULL, NULL),
(2, 4, 2, 10, NULL, NULL),
(3, 4, 3, 11, NULL, NULL),
(4, 4, 4, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sounds_and_mots`
--

CREATE TABLE `sounds_and_mots` (
  `id` int(64) NOT NULL,
  `id_lecon` int(1) NOT NULL DEFAULT '0',
  `id_sound` int(64) NOT NULL,
  `id_mot` int(64) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sounds_and_mots`
--

INSERT INTO `sounds_and_mots` (`id`, `id_lecon`, `id_sound`, `id_mot`, `date_create`, `date_update`) VALUES
(1, 1, 1, 5, NULL, NULL),
(2, 1, 2, 6, NULL, NULL),
(3, 1, 3, 7, NULL, NULL),
(4, 1, 4, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(64) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `description` text,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `title`, `description`, `date_create`, `date_update`) VALUES
(1, 'Démo', 'Description de Démo', '2021-04-02', '2021-04-02'),
(2, 'Halloween', 'Description de Halloween', '2021-04-02', '2021-04-02'),
(3, 'Noël', 'Description de Noël', '2021-04-02', '2021-04-02');

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
  `password` varchar(255) NOT NULL,
  `date_create` date DEFAULT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `pseudo`, `mail`, `password`, `date_create`, `date_update`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin@admin.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '2021-04-02', '2021-04-02'),
(2, 'Test', 'Test', 'test', 'test@test.com', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', '2021-04-02', '2021-04-02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `defs`
--
ALTER TABLE `defs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`);

--
-- Index pour la table `defs_and_mots`
--
ALTER TABLE `defs_and_mots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`),
  ADD KEY `id_def` (`id_def`),
  ADD KEY `id_mot` (`id_mot`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`);

--
-- Index pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`),
  ADD KEY `id_image` (`id_image`),
  ADD KEY `id_mot` (`id_mot`);

--
-- Index pour la table `lecons`
--
ALTER TABLE `lecons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `lecons_and_prof`
--
ALTER TABLE `lecons_and_prof`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Index pour la table `mots`
--
ALTER TABLE `mots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`);

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`);

--
-- Index pour la table `sounds_and_images`
--
ALTER TABLE `sounds_and_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`),
  ADD KEY `id_sound` (`id_sound`),
  ADD KEY `id_image` (`id_image`);

--
-- Index pour la table `sounds_and_mots`
--
ALTER TABLE `sounds_and_mots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecon` (`id_lecon`),
  ADD KEY `id_sound` (`id_sound`),
  ADD KEY `id_mot` (`id_mot`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
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
-- AUTO_INCREMENT pour la table `defs`
--
ALTER TABLE `defs`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `defs_and_mots`
--
ALTER TABLE `defs_and_mots`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `lecons`
--
ALTER TABLE `lecons`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `lecons_and_prof`
--
ALTER TABLE `lecons_and_prof`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mots`
--
ALTER TABLE `mots`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sounds_and_images`
--
ALTER TABLE `sounds_and_images`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sounds_and_mots`
--
ALTER TABLE `sounds_and_mots`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `defs`
--
ALTER TABLE `defs`
  ADD CONSTRAINT `defs_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Contraintes pour la table `defs_and_mots`
--
ALTER TABLE `defs_and_mots`
  ADD CONSTRAINT `defs_and_mots_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD CONSTRAINT `defs_and_mots_ibfk_2` FOREIGN KEY (`id_def`) REFERENCES `defs` (`id`),
  ADD CONSTRAINT `defs_and_mots_ibfk_3` FOREIGN KEY (`id_mot`) REFERENCES `mots` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Contraintes pour la table `images_and_mots`
--
ALTER TABLE `images_and_mots`
  ADD CONSTRAINT `images_and_mots_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD CONSTRAINT `images_and_mots_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `images_and_mots_ibfk_3` FOREIGN KEY (`id_mot`) REFERENCES `mots` (`id`);

--
-- Contraintes pour la table `lecons`
--
ALTER TABLE `lecons`
  ADD CONSTRAINT `lecons_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`);

--
-- Contraintes pour la table `lecons_and_prof`
--
ALTER TABLE `lecons_and_prof`
  ADD CONSTRAINT `lecons_and_prof_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD CONSTRAINT `lecons_and_prof_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `profs` (`id`);

--
-- Contraintes pour la table `mots`
--
ALTER TABLE `mots`
  ADD CONSTRAINT `mots_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Contraintes pour la table `profs`
--
ALTER TABLE `profs`
  ADD CONSTRAINT `profs_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `sounds`
--
ALTER TABLE `sounds`
  ADD CONSTRAINT `sounds_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`);

--
-- Contraintes pour la table `sounds_and_images`
--
ALTER TABLE `sounds_and_images`
  ADD CONSTRAINT `sounds_and_images_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD CONSTRAINT `sounds_and_images_ibfk_2` FOREIGN KEY (`id_sound`) REFERENCES `sounds` (`id`),
  ADD CONSTRAINT `sounds_and_images_ibfk_3` FOREIGN KEY (`id_image`) REFERENCES `images` (`id`);

--
-- Contraintes pour la table `sounds_and_mots`
--
ALTER TABLE `sounds_and_mots`
  ADD CONSTRAINT `sounds_and_mots_ibfk_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecons` (`id`),
  ADD CONSTRAINT `sounds_and_mots_ibfk_2` FOREIGN KEY (`id_sound`) REFERENCES `sounds` (`id`),
  ADD CONSTRAINT `sounds_and_mots_ibfk_3` FOREIGN KEY (`id_mot`) REFERENCES `mots` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
