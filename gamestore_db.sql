-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 nov. 2022 à 18:28
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
(8, 'Manette Switch Pro', 70, 'manette', 'switchPro-removebg-preview.png'),
(9, 'Ducky One 2 mini', 149, 'clavier', 'MN0005180040_1_0005180060-removebg-preview.png'),
(10, 'Hyper X Cloud Alpha', 89, 'casque', 'HyperX_cloud_Alpha-removebg-preview.png'),
(11, 'Logitech G502 Blanche', 90, 'souris', 'Logitech_G502_Blanche-removebg-preview.png');

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
(18, 'Romamadou', 'rom@gmail.com', 'romain', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `produitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
