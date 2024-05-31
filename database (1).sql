-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 31 mai 2024 à 14:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `email`, `motdepasse`) VALUES
(1, 'admin@admin.com', 'pass'),
(2, 'a@a.c', 'pass');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(20) NOT NULL,
  `image_cat` varchar(500) NOT NULL,
  `descrip_cat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`, `image_cat`, `descrip_cat`) VALUES
(1, 'Perte', '../img/pertedupoids.png', 'Fitbox vous offre un service de restauration et de personnalisation des repas: des repas pour un jour, une semaine ou un mois,préparation des plats personnalisés,personnalisez votre propre régime avec les choses que vous aimez et faites-le livrer à votre porte.'),
(2, 'Gain', '../img/gaindupoids.png', 'Fitbox vous offre un service de restauration et de personnalisation des repas: des repas pour un jour, une semaine ou un mois,préparation des plats personnalisés,personnalisez votre propre régime avec les choses que vous aimez et faites-le livrer à votre porte.\r\n'),
(3, 'Mantien', '../img/mantiendupoids.png', 'Fitbox vous offre un service de restauration et de personnalisation des repas: des repas pour un jour, une semaine ou un mois,préparation des plats personnalisés,personnalisez votre propre régime avec les choses que vous aimez et faites-le livrer à votre porte.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(11) NOT NULL,
  `date_cmd` date NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `livraison` varchar(99) DEFAULT NULL,
  `paiement` varchar(99) DEFAULT NULL,
  `statuscmd` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `date_cmd`, `id_user`, `note`, `total`, `livraison`, `paiement`, `statuscmd`) VALUES
(104, '2021-02-08', 36, 'note', 16, 'magasin', 'credit-card', 'en-attente'),
(105, '2021-02-08', 36, 'note', 16, 'credit-card', 'credit-card', 'en-attente'),
(106, '2021-02-08', 36, 'note', 16, 'adomicile', 'credit-card', 'en-attente'),
(107, '2021-02-08', 36, 'note', 16, 'adomicile', 'credit-card', 'en-attente'),
(108, '2021-02-08', 36, 'note', 20, 'adomicile', 'credit-card', 'en-attente'),
(110, '2021-02-08', 36, '', 1400, 'adomicile', 'livraison', 'en-attente'),
(113, '2021-02-08', 36, '', 287, 'adomicile', 'credit-card', 'en-attente');

-- --------------------------------------------------------

--
-- Structure de la table `etre_commande`
--

CREATE TABLE `etre_commande` (
  `id_plat` int(11) NOT NULL,
  `id_cmd` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `jours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etre_commande`
--

INSERT INTO `etre_commande` (`id_plat`, `id_cmd`, `Qte`, `jours`) VALUES
(43, 104, 5, 1),
(43, 105, 7, 1),
(43, 106, 1, 1),
(43, 107, 1, 1),
(43, 108, 6, 1),
(43, 110, 7, 1),
(43, 113, 0, 1),
(64, 113, 0, 1),
(61, 113, 0, 1),
(66, 113, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `timestamp`) VALUES
(1, 'test', 'test', '2024-05-31 12:00:34'),
(2, 'test', 'cava ou quoi', '2024-05-31 12:00:43'),
(3, 'wafa', 'bonjour', '2024-05-31 12:01:34'),
(4, 'sarra', 'bonjour wafa', '2024-05-31 12:01:53');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nomplat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `prix` int(6) DEFAULT NULL,
  `nbr_calories` int(6) DEFAULT NULL,
  `ingredients` varchar(200) DEFAULT NULL,
  `graisse` int(20) DEFAULT NULL,
  `proteine` int(20) DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nomplat`, `prix`, `nbr_calories`, `ingredients`, `graisse`, `proteine`, `id_cat`, `image`) VALUES
(43, 'Bulguree', 200, 120, 'bulgur,poivre,olives', 22, 200, 1, 'productimg/48663f9828ac346258f559e036cd8c18pexels-dana-tentis-1213710.jpg\r\n'),
(61, 'Salade au dates', 14, 600, 'Salade, Dates', NULL, NULL, 1, 'productimg/a504965d6ba7273726c9f25cad067663IMG_8954.JPG'),
(63, 'Salade Scalope', 9, 800, 'Salade , Scalope', NULL, NULL, 3, 'productimg/a504965d6ba7273726c9f25cad067663IMG_8954.JPG'),
(64, 'saumon au riz', 23, 3450, '', NULL, NULL, 2, 'productimg/085374cd49d76a9e8ef2ec57cf912a08IMG_8958.JPG'),
(65, 'poulet au légumes', 12, 235, '', NULL, NULL, 3, 'productimg/4e9c7e5de7e52172ec96fccb5385d3dfIMG_8950.JPG'),
(66, 'Scalope Fumée', 10, 500, '', NULL, NULL, 1, 'productimg/IMG_9005.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(4) NOT NULL,
  `nom_user` varchar(20) DEFAULT NULL,
  `prenom_user` varchar(20) DEFAULT NULL,
  `telephone` int(8) DEFAULT NULL,
  `adresse` varchar(99) DEFAULT NULL,
  `cp` int(4) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `motdepasse` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom_user`, `prenom_user`, `telephone`, `adresse`, `cp`, `email`, `motdepasse`) VALUES
(1, 'Ahmed', 'Houssem', 25774039, '17 str', 2000, 'a@a.c', 'hou'),
(2, 'nom', 'prenom', 87654321, 'Adresse', 1234, 'houssem@gmail.com', 'hous1995'),
(8, 'nom', 'prenom', 12345678, 'rue atrc', 1234, 'email@email.com', ''),
(9, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', 'hous1995'),
(10, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', 'hous1995'),
(11, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', 'hous1995'),
(12, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(13, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(14, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(15, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(16, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(17, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(18, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(19, 'nom', 'prenom', 12345678, '17 adresse', 2000, 'email@email.com', ''),
(20, 'Ghozzi', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(21, 'Ghozzi', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(22, 'Ghozzi', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(23, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(24, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(25, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(26, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(27, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(28, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(29, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(30, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(31, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(32, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(33, 'dsds', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'houssem@gmail.com', 'hous1995'),
(34, 'Ghozzi', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'a@a.c', 'pass'),
(35, 'Ghozzi', 'Houssem', 58917019, '17 rue atrichaa cite anber', 2021, 'a@a.c', 'pass'),
(36, 'ayoub', 'Fatnassi', 25774039, '17 rue atrichaa cite anber', 2021, 'ayoub@gmail.com', 'hous');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `id_user_` (`id_user`);

--
-- Index pour la table `etre_commande`
--
ALTER TABLE `etre_commande`
  ADD KEY `idx_plat` (`id_plat`),
  ADD KEY `idx_cmd` (`id_cmd`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `id_user_` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `etre_commande`
--
ALTER TABLE `etre_commande`
  ADD CONSTRAINT `etre_commande_ibfk_1` FOREIGN KEY (`id_cmd`) REFERENCES `commande` (`id_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etre_commande_ibfk_2` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
