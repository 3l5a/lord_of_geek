-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 fév. 2023 à 19:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lord_of_geek_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(22, 'action'),
(11, 'aventure'),
(23, 'combat'),
(17, 'FPS'),
(25, 'gestion'),
(15, 'hack\'n slash'),
(12, 'horreur'),
(24, 'multijoueur'),
(18, 'plateforme'),
(13, 'RPG'),
(21, 'sport'),
(19, 'stratégie');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(55) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `mode_paiement` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `email`, `mot_de_passe`, `mode_paiement`) VALUES
(1, 'Thiévet', 'Elsa', 'impasse Zola', '34000', 'Montpellier', 'zaza_t@hotmail.com', '$2y$10$9I4E4RLRa.nQG.UmRtEycOFsHt/yC5U2fj6j1GAME.cMpYY6MZpzK', 'CB'),
(4, 'Thieves', 'Elsa', 'ldhv', '34000', 'skdlufj', 'elsa.thievet@hotmail.fr', '$2y$10$IaIrBAMVVRTIlvV9y6GUQOIkOr5eraaj5xmu.FhdW5Csdu/U12nHK', NULL),
(5, 'dvlilh', 'zeedvzaev', 'zevzev', '34000', 'zevazesc', 'jqrg@zeedv.fr', '$2y$10$AjZYaLf0Ne8rneVJDE9bz.OJOafFatxP1ss7gzoWH3dwUW3o6ZDre', NULL),
(6, 'Hor', 'Soriya', 'sldvh', '34000', 'montpellier', 'soriya@hor.fr', '$2y$10$fxvB39IprChOwhYIs7..euU0Nc0mPRGTHfO0hbb7dDrdwauIIozOG', NULL),
(7, 'sdvq', 'sdbsd', 'sdbqs', '34000', 'zzsgbeqzrzsd', 'chap@chap.fr', '$2y$10$eA5pXqQHJHv/MxbrewtZMuuexZoAVkq2Vo.r/7fl9u2rDpzOnv/sK', NULL),
(8, 'margot', 'margot', 'margot', '34000', 'margot', 'margot@margot.fr', '$2y$10$XS7jeA6hApn939.cvl9u0elIJsyvUMD7LOiyNYRP7p5rCNgRwBR2S', NULL),
(9, 'et', 'et', 'et', '34000', 'et', 'et@et.fr', '$2y$10$BFJP4jH2l3jjvuN1xYtsl.XqDY7lDmE5AG9akuiR12AbBhB49Zwyu', NULL),
(10, 'pouet', 'pouet', 'pouet', '34000', 'pouet', 'pouet@pouet.fr', '$2y$10$kZTddcGRedD6gCzALV9OC.FtGRNyo62QGu4pzRpFpW.khzXD9PDh6', NULL),
(11, 'incr', 'incr', 'incr', '34000', 'incrCity', 'amazing@wow.com', '$2y$10$vOfxga0MGO4VjSIsDj0QyeIgiQhX5dLVvBsvOO.lUX1QukRFjOtsa', NULL),
(12, 'wow', 'wow', 'wow', '34000', 'wow', 'wow@super.com', '$2y$10$rv0Wa9tOPAXuTdUlaUf61en2T6KOr2KMlgdDJxE..1DxGEHU1PcBG', NULL),
(13, 'azerty', 'azerty', 'azerty', '34000', 'Azerty', 'a@a.fr', '$2y$10$k1hMmcKUMWk5ic.8ViRNxOR4eDY/lGchxvNij.i/aqQ3ONm6HRI62', NULL),
(14, 'zeuivhjc', 'zeouvdhc', 'zoivdhc', '34000', 'zkejdvhc', 'elsa.fzihe@zekihc.fr', '$2y$10$LNRUSWp6XmMs8BOZaHrFyu8x4lxrFbPSTPvmgg1IZUpPsTQhxtUZK', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `mode_paiement` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `client_id`, `mode_paiement`, `created_at`, `updated_at`) VALUES
(1, 1, 'CB', '2023-01-31 23:00:00', NULL),
(2, 1, 'PayPal', '2023-02-16 09:26:38', NULL),
(3, 6, 'CB', '2023-02-21 13:44:08', NULL),
(4, 6, 'CB', '2023-02-21 13:49:13', NULL),
(5, 6, 'CB', '2023-02-21 13:50:58', NULL),
(6, 6, 'CB', '2023-02-21 13:51:30', NULL),
(7, 6, 'CB', '2023-02-21 14:11:19', NULL),
(8, 6, 'CB', '2023-02-21 14:13:48', NULL),
(9, 6, 'CB', '2023-02-21 14:13:49', NULL),
(10, 6, 'CB', '2023-02-21 14:13:49', NULL),
(11, 6, 'CB', '2023-02-21 14:14:43', NULL),
(12, 6, 'CB', '2023-02-21 14:17:41', NULL),
(13, 6, 'CB', '2023-02-21 14:18:13', NULL),
(14, 6, 'CB', '2023-02-21 14:23:50', NULL),
(15, 6, 'CB', '2023-02-21 14:24:43', NULL),
(16, 7, 'CB', '2023-02-21 19:28:08', NULL),
(17, 4, 'CB', '2023-02-22 10:45:17', NULL),
(18, 4, 'CB', '2023-02-22 10:46:39', NULL),
(19, 4, 'CB', '2023-02-22 12:39:23', NULL),
(20, 4, 'CB', '2023-02-22 12:39:49', NULL),
(21, 4, 'CB', '2023-02-22 12:53:27', NULL),
(22, 4, 'CB', '2023-02-22 13:05:01', NULL),
(23, 4, 'CB', '2023-02-22 13:05:39', NULL),
(24, 4, 'CB', '2023-02-22 13:06:31', NULL),
(25, 4, 'CB', '2023-02-22 13:08:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `consoles`
--

CREATE TABLE `consoles` (
  `id` int(11) NOT NULL,
  `nom_console` varchar(45) NOT NULL,
  `constructeur` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `consoles`
--

INSERT INTO `consoles` (`id`, `nom_console`, `constructeur`) VALUES
(1, 'Switch', 'Nintendo'),
(2, 'PS4', 'Sony'),
(3, 'PS3', 'Sony'),
(4, 'Wii U', 'Nintendo'),
(5, 'Game Boy', 'Nintendo'),
(6, 'PS2', 'Sony'),
(7, 'Xbox', 'Microsoft'),
(8, 'Game Boy Advance', 'Nintendo');

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` int(11) NOT NULL,
  `nom_etat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom_etat`) VALUES
(2, 'Bon état'),
(3, 'État correct'),
(4, 'Mauvais état'),
(5, 'Sous blister'),
(1, 'Très bon état');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaires`
--

CREATE TABLE `exemplaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_jeu_id` int(11) NOT NULL,
  `etat_id` int(11) NOT NULL,
  `image` varchar(32) DEFAULT 'default.png',
  `description` varchar(200) DEFAULT NULL,
  `prix_vente` decimal(10,2) DEFAULT NULL,
  `prix_achat` decimal(10,2) DEFAULT NULL,
  `annee_achat` year(4) DEFAULT NULL,
  `consoles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `exemplaires`
--

INSERT INTO `exemplaires` (`id`, `reference_jeu_id`, `etat_id`, `image`, `description`, `prix_vente`, `prix_achat`, `annee_achat`, `consoles_id`) VALUES
(2, 2, 2, 'default.png', 'Bon état général, coin légèrement abîmé', '5.00', '15.00', 2019, 3),
(3, 1, 1, 'mario_kart_8.jpg', 'État impécable', '35.00', '15.00', 2022, 1),
(4, 4, 2, 'default.png', 'Bon état général', '9.90', '5.00', 2020, 3),
(5, 5, 1, 'default.png', NULL, '15.00', '11.00', 2020, 2),
(6, 10, 1, 'rayman-legends.jpg', 'État impeccable', '12.00', '10.00', 2019, 1),
(7, 9, 2, 'rayman-origins.jpg', 'Boîte légèrement usée', '10.00', '12.00', 2018, 3),
(8, 11, 2, 'street_fighter_5.jpg', 'Version collector steelbook\r\nEnvoi rapide et soigné', '20.00', '16.00', 2022, 2),
(9, 12, 2, 'doom_eternal.jpg', 'Jeu en boîte, envoi rapide et soigné', '10.00', '8.00', 2021, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lignes_commande`
--

CREATE TABLE `lignes_commande` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `exemplaire_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lignes_commande`
--

INSERT INTO `lignes_commande` (`id`, `commande_id`, `exemplaire_id`) VALUES
(1, 1, 9),
(2, 1, 7),
(3, 1, 8),
(4, 2, 4),
(5, 2, 2),
(6, 11, 2),
(7, 11, 3),
(8, 12, 2),
(9, 12, 3),
(10, 12, 4),
(11, 12, 5),
(12, 13, 2),
(13, 13, 3),
(14, 13, 5),
(15, 14, 2),
(16, 14, 3),
(17, 14, 5),
(18, 15, 4),
(19, 16, 9),
(20, 16, 6),
(21, 17, 7),
(22, 19, 8),
(23, 19, 9),
(24, 20, 8),
(25, 20, 9),
(26, 21, 8),
(27, 21, 9),
(28, 22, 5),
(29, 22, 4),
(30, 23, 8),
(31, 23, 9),
(32, 24, 8),
(33, 24, 9),
(34, 25, 8),
(35, 25, 9);

-- --------------------------------------------------------

--
-- Structure de la table `references_jeux`
--

CREATE TABLE `references_jeux` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `no_serie` int(11) DEFAULT NULL,
  `series_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `references_jeux`
--

INSERT INTO `references_jeux` (`id`, `titre`, `no_serie`, `series_id`) VALUES
(1, 'Mario Kart 8', 8, 2),
(2, 'Diablo III', 3, 4),
(3, 'Animal Crossing New Horizon', 5, 3),
(4, 'The Last of Us Part 1', 1, 5),
(5, 'The Last of Us Part 2', 2, 5),
(6, 'Mario Golf', NULL, 2),
(7, 'Bayonetta', 1, 9),
(8, 'Bayonetta 2', 2, 9),
(9, 'Rayman Origins', NULL, 12),
(10, 'Rayman Legends', NULL, 12),
(11, 'Street Fighter 5', 5, NULL),
(12, 'Doom Eternal', NULL, 13),
(13, 'Resident Evil Village', 8, 14),
(14, 'Dead Space', 1, NULL),
(15, 'Call of Duty Black Ops', 5, 15),
(16, 'Battlefield 3', 3, 16);

-- --------------------------------------------------------

--
-- Structure de la table `references_jeux_has_categories`
--

CREATE TABLE `references_jeux_has_categories` (
  `reference_jeu_id` int(11) NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `references_jeux_has_categories`
--

INSERT INTO `references_jeux_has_categories` (`reference_jeu_id`, `categorie_id`) VALUES
(1, 21),
(2, 15),
(4, 11),
(4, 22),
(5, 11),
(5, 22),
(6, 21),
(9, 18),
(10, 18),
(11, 23),
(12, 23),
(13, 12),
(14, 12),
(15, 24),
(16, 24);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `nom_serie` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `nom_serie`) VALUES
(3, 'Animal Crossing'),
(1, 'Assassin\'s Creed'),
(16, 'Battlefield'),
(9, 'Bayonetta'),
(15, 'Call of Duty'),
(10, 'Crash Bandicoot'),
(4, 'Diablo'),
(13, 'Doom'),
(7, 'FIFA'),
(2, 'Mario'),
(8, 'PES'),
(12, 'Rayman'),
(14, 'Resident Evil'),
(11, 'Spyro'),
(17, 'Street Fighter'),
(5, 'The Last of Us'),
(6, 'The Witcher');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commandes_clients1_idx` (`client_id`);

--
-- Index pour la table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_console_UNIQUE` (`nom_console`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_etat_UNIQUE` (`nom_etat`);

--
-- Index pour la table `exemplaires`
--
ALTER TABLE `exemplaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exemplaires_references_jeux1_idx` (`reference_jeu_id`),
  ADD KEY `fk_exemplaires_etat1_idx` (`etat_id`),
  ADD KEY `fk_exemplaires_consoles1_idx` (`consoles_id`);

--
-- Index pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lignes_commande_commande_id_foreign` (`commande_id`),
  ADD KEY `lignes_commande_exemplaire_id_foreign` (`exemplaire_id`);

--
-- Index pour la table `references_jeux`
--
ALTER TABLE `references_jeux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_references_jeux_series1_idx` (`series_id`);

--
-- Index pour la table `references_jeux_has_categories`
--
ALTER TABLE `references_jeux_has_categories`
  ADD PRIMARY KEY (`reference_jeu_id`,`categorie_id`),
  ADD KEY `fk_references_jeux_has_categories_categories1_idx` (`categorie_id`),
  ADD KEY `fk_references_jeux_has_categories_references_jeux1_idx` (`reference_jeu_id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_serie_UNIQUE` (`nom_serie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `exemplaires`
--
ALTER TABLE `exemplaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `references_jeux`
--
ALTER TABLE `references_jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_clients1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exemplaires`
--
ALTER TABLE `exemplaires`
  ADD CONSTRAINT `fk_exemplaires_consoles1` FOREIGN KEY (`consoles_id`) REFERENCES `consoles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exemplaires_etat1` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exemplaires_references_jeux1` FOREIGN KEY (`reference_jeu_id`) REFERENCES `references_jeux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD CONSTRAINT `lignes_commande_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignes_commande_exemplaire_id_foreign` FOREIGN KEY (`exemplaire_id`) REFERENCES `exemplaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `references_jeux`
--
ALTER TABLE `references_jeux`
  ADD CONSTRAINT `fk_references_jeux_series1` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `references_jeux_has_categories`
--
ALTER TABLE `references_jeux_has_categories`
  ADD CONSTRAINT `fk_references_jeux_has_categories_categories1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_references_jeux_has_categories_references_jeux1` FOREIGN KEY (`reference_jeu_id`) REFERENCES `references_jeux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
