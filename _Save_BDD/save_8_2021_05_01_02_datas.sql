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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `pseudo`, `mail`, `password`, `date_create`, `date_update`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin@admin.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '2021-04-02', '2021-04-02'),
(2, 'Test', 'Test', 'test', 'test@test.com', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff',  '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `title`, `description`, `date_create`, `date_update`) VALUES
(1, 'Démo', 'Description de Démo', '2021-04-02', '2021-04-02'),
(2, 'Halloween', 'Description de Halloween', '2021-04-02', '2021-04-02'),
(3, 'Noël', 'Description de Noël', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `lecons`
--

INSERT INTO `lecons`(`id`, `id_theme`, `id_images_and_mots`, `id_sounds_and_images`, `id_sounds_and_mots`, `id_defs_and_mots`, `title`, `description`, `statut`, `date_create`, `date_update`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'Leçon 1', 'Description 1', 1, '2021-04-05', '2021-04-05'),
(2, 2, NULL, NULL, NULL, NULL, 'Leçon 2', 'Description 2', 1, '2021-04-05', '2021-04-05'),
(3, 3, NULL, NULL, NULL, NULL, 'Leçon 3', 'Description 3', 1, '2021-04-05', '2021-04-05');




--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `link`, `date_create`, `date_update`) VALUES
(1, 'bateau.jpg', '2021-04-02', '2021-04-02'),
(2, 'moto.jpg', '2021-04-02', '2021-04-02'),
(3, 'velo.jpg', '2021-04-02', '2021-04-02'),
(4, 'voiture.jpg', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id`, `mots`, `date_create`, `date_update`) VALUES
(1, 'bateau', '2021-04-02', '2021-04-02'),
(2, 'moto', '2021-04-02', '2021-04-02'),
(3, 'velo', '2021-04-02', '2021-04-02'),
(4, 'voiture', '2021-04-02', '2021-04-02'),
(5, 'chat', '2021-04-02', '2021-04-02'),
(6, 'ane', '2021-04-02', '2021-04-02'),
(7, 'souris', '2021-04-02', '2021-04-02'),
(8, 'chien', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `sound`
--

INSERT INTO `sounds` (`id`, `link`, `date_create`, `date_update`) VALUES
(1, 'chat', '2021-04-02', '2021-04-02'),
(2, 'ane', '2021-04-02', '2021-04-02'),
(3, 'souris', '2021-04-02', '2021-04-02'),
(4, 'chien', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `def`
--

INSERT INTO `defs` (`id`, `link`, `date_create`, `date_update`) VALUES
(1, 'je flotte', '2021-04-02', '2021-04-02'),
(2, 'j\'ai deux roues et un moteur', '2021-04-02', '2021-04-02'),
(3, 'j\'ai deux roues et des pédales', '2021-04-02', '2021-04-02'),
(4, 'j\'ai quatres roues et un moteur', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `images_and_mots`
--

INSERT INTO `images_and_mots` (`id`, `id_image`, `id_mot`, `date_create`, `date_update`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL);

--
-- Déchargement des données de la table `sounds_and_mots`
--

INSERT INTO `sounds_and_mots` (`id`, `id_sound`, `id_mot`, `date_create`, `date_update`) VALUES
(1, 5, 1, NULL, NULL),
(2, 6, 2, NULL, NULL),
(3, 7, 3, NULL, NULL),
(4, 8, 4, NULL, NULL);

--
-- Déchargement des données de la table `defs_and_mots`
--

INSERT INTO `defs_and_mots` (`id`, `id_mot`, `id_def`, `date_create`, `date_update`) VALUES
(9, 1, 1, NULL, NULL),
(10, 2, 2, NULL, NULL),
(11, 3, 3, NULL, NULL),
(12, 4, 4, NULL, NULL);

--
-- Déchargement des données de la table `sounds_and_images`
--

INSERT INTO `sounds_and_images` (`id`, `id_sound`, `id_images`, `date_create`, `date_update`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
