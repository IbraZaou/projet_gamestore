-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 jan. 2023 à 16:15
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamestore_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`messageID`, `genre`, `nom`, `email`, `num`, `message`) VALUES
(1, 0, 'Ibrahim', 'ibra@gmail.com', 769145466, 'Hello friend'),
(2, 0, 'Julie', 'Julie@gmail.com', 630203378, 'Hello test 123'),
(4, 0, 'Filipe', 'Filipe.portugal@gmail.com', 0, 'Bonjour test pour Romain ');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `panierID` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  `quantite` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`panierID`, `user_id`, `nom`, `prix`, `quantite`, `image`) VALUES
(3, 0, 'Manette Switch Pro', 50, 2, 'switchPro-removebg-preview.png'),
(8, 0, 'Dualshock 5 (Black)', 70, 4, 'manettePS5black.png'),
(9, 0, 'Omen 3060ti ryzen 7', 1499, 2, 'ordi6.png');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `produitID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`produitID`, `nom`, `prix`, `categorie`, `image`) VALUES
(8, 'Manette Switch Pro', 50, 'manette', 'switchPro-removebg-preview.png'),
(10, 'Hyper X Cloud Alpha', 89, 'casque', 'HyperX_cloud_Alpha-removebg-preview.png'),
(14, 'Logitech G502 White', 79, 'souris', 'G502 white.png'),
(15, 'Razer Ornata V3', 79, 'clavier', 'Razer Ornata.png'),
(16, 'Support Casque Roccat V2', 30, 'accessoire', 'stand2.png'),
(17, 'Omen 3060ti ryzen 7', 1499, 'ordinateur', 'ordi6.png'),
(19, 'MSI Optix 144hz', 500, 'moniteur', 'ecran1.2.png'),
(20, 'Casque', 149, 'casque', 'casque8.png'),
(22, 'Dualshock 5 (Black)', 70, 'manette', 'manettePS5black.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersID`, `pseudo`, `email`, `nom`, `mdp`) VALUES
(1, 'Kuuurlz', 'ibra@gmail.com', 'ibrahim', '40bd001563085fc35165'),
(2, 'Romamadou', 'romain@gmail.com', 'Romain', '40bd001563085fc35165'),
(3, 'Romamadou', '', '', '40bd001563085fc35165'),
(4, 'Romamadou', 'romain@gmail.com', 'romain', '40bd001563085fc35165'),
(6, 'HelloFriend07', 'test@gmail.com', 'test', '7c4a8d09ca3762af61e5'),
(7, 'romamadou', 'romain@gmail.com', 'romain', '40bd001563085fc35165'),
(8, 'test', '', '', 'a94a8fe5ccb19ba61c4c'),
(9, 'fsqf', 'dfdqdf@gmail.com', 'fqsfdq', '40bd001563085fc35165'),
(10, 'fsqf', 'dfdqdf@gmail.com', 'fqsfdq', '40bd001563085fc35165'),
(11, 'Romamadou', 'romain@gmail.com', 'romain', '40bd001563085fc35165'),
(12, 'Romamadou', 'romain@gmail.com', 'romain', '40bd001563085fc35165'),
(13, 'Romamadou', 'romain@gmail.com', 'romain', '40bd001563085fc35165'),
(14, 'Romamadou', 'romain@gmail.com', 'romain', '40bd001563085fc35165'),
(15, 'T-rex', 'thierry@gmail.com', 'Thierry', '7c4a8d09ca3762af61e5'),
(16, 'ibra69', 'zaou@gmail.com', 'ibra', '40bd001563085fc35165'),
(17, 'bg', 'fjdslkj@gmail.com', 'ibra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(18, 'Romamadou', 'rom@gmail.com', 'romain', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(20, 'admin', 'admin@gmail.com', 'admin', '8aefb06c426e07a0a671a1e2488b4858d694a730'),
(21, 'Jean', 'Jean@yahoo.fr', 'Jean', '8aefb06c426e07a0a671a1e2488b4858d694a730');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`panierID`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`produitID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `panierID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `produitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
