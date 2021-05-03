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

INSERT INTO `lecons`(`id`, `id_theme`, `collection_id_images_and_mots`, `collection_id_sounds_and_images`, `collection_id_sounds_and_mots`, `collection_id_defs_and_mots`, `title`, `description`, `statut`, `date_create`, `date_update`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'Leçon 1', 'son', 1, '2021-04-05', '2021-04-05'),
(2, 1, NULL, NULL, NULL, NULL, 'Leçon 2', 'images', 1, '2021-04-05', '2021-04-05'),
(3, 1, NULL, NULL, NULL, NULL, 'Leçon 3', 'bonus', 1, '2021-04-05', '2021-04-05'),
(4, 1, NULL, NULL, NULL, NULL, 'Leçon 1', 'sonimages', 1, '2021-04-05', '2021-04-05');

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
(8, 4, 'voiture.jpg', '2021-04-02', '2021-04-02');

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

--
-- Déchargement des données de la table `sound`
--

INSERT INTO `sounds` (`id`, `id_lecon`, `link`, `date_create`, `date_update`) VALUES
(1, 1, 'chat', '2021-04-02', '2021-04-02'),
(2, 1, 'ane', '2021-04-02', '2021-04-02'),
(3, 1, 'souris', '2021-04-02', '2021-04-02'),
(4, 1, 'chien', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `def`
--

INSERT INTO `defs` (`id`, `id_lecon`, `link`, `date_create`, `date_update`) VALUES
(1, 1, 'je flotte', '2021-04-02', '2021-04-02'),
(2, 1, 'j\'ai deux roues et un moteur', '2021-04-02', '2021-04-02'),
(3, 1, 'j\'ai deux roues et des pédales', '2021-04-02', '2021-04-02'),
(4, 1, 'j\'ai quatres roues et un moteur', '2021-04-02', '2021-04-02');

--
-- Déchargement des données de la table `images_and_mots`
--

INSERT INTO `images_and_mots` (`id`, `id_lecon`, `id_image`, `id_mot`, `date_create`, `date_update`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 2, NULL, NULL),
(3, 1, 3, 3, NULL, NULL),
(4, 1, 4, 4, NULL, NULL);

--
-- Déchargement des données de la table `sounds_and_mots`
--

INSERT INTO `sounds_and_mots` (`id`, `id_lecon`, `id_sound`, `id_mot`, `date_create`, `date_update`) VALUES
(1, 1, 1, 5, NULL, NULL),
(2, 1, 2, 6, NULL, NULL),
(3, 1, 3, 7, NULL, NULL),
(4, 1, 4, 8, NULL, NULL);

--
-- Déchargement des données de la table `defs_and_mots`
--

INSERT INTO `defs_and_mots` (`id`, `id_lecon`, `id_mot`, `id_def`, `date_create`, `date_update`) VALUES
(9, 1, 1, 1, NULL, NULL),
(10, 1, 2, 2, NULL, NULL),
(11, 1, 3, 3, NULL, NULL),
(12, 1, 4, 4, NULL, NULL);

--
-- Déchargement des données de la table `sounds_and_images`
--

INSERT INTO `sounds_and_images` (`id`, `id_lecon`, `id_sound`, `id_image`, `date_create`, `date_update`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 2, NULL, NULL),
(3, 1, 3, 3, NULL, NULL),
(4, 1, 4, 4, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
