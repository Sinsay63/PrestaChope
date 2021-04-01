-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 avr. 2021 à 02:11
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prestachope_bdd6`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`Id`, `nom`, `description`) VALUES
(1, 'bières', 'description bières'),
(2, 'Vins', 'description vins');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `Id` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `Id_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Id`, `adresse`, `telephone`, `Id_Users`) VALUES
(1, '5 allée des jardins d\'Aubière - Aubière 63170', '0750253428', 1),
(2, '10 rue des prés - Vichy 03000', '0670303413', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `Id` int(11) NOT NULL,
  `Id_Clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`Id`, `Id_Clients`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `Id` int(11) NOT NULL,
  `Id_Commandes` int(11) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`Id`, `Id_Commandes`, `montant`) VALUES
(1, 1, 0),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(60) DEFAULT NULL,
  `Id_Catégories` int(11) NOT NULL,
  `Id_SousCatégories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`Id`, `nom`, `description`, `prix`, `stock`, `image`, `Id_Catégories`, `Id_SousCatégories`) VALUES
(1, 'Heineken', 'bouteille de 33cl', 1.5, 50, 'assets/images/heineken.png', 1, 1),
(2, 'Chateauneuf du pâpe', 'bouteille d\'1L ', 25.5, 20, NULL, 2, 3),
(3, 'Kronembourg', 'bouteille de 33cl', 2, 25, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produits_commandes`
--

CREATE TABLE `produits_commandes` (
  `Id_Produits` int(11) NOT NULL,
  `Id_Commandes` int(11) NOT NULL,
  `quantites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits_commandes`
--

INSERT INTO `produits_commandes` (`Id_Produits`, `Id_Commandes`, `quantites`) VALUES
(1, 1, 20),
(2, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE `souscategories` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `Id_Categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `souscategories`
--

INSERT INTO `souscategories` (`Id`, `nom`, `Id_Categories`) VALUES
(1, 'blonde', 1),
(2, 'brune', 1),
(3, 'rouge', 2),
(4, 'rosé', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tresorerie`
--

CREATE TABLE `tresorerie` (
  `Id` int(11) NOT NULL,
  `total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tresorerie`
--

INSERT INTO `tresorerie` (`Id`, `total`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `cagnotte` float NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `age`, `cagnotte`, `isAdmin`) VALUES
(1, 'HOUDIER', 'Yanis', 'Sinsay', 'Sinsay', 'yanis.houdier@gmail.com', 19, 152.3, 1),
(2, 'RICHARD', 'Nathim', 'Nath', 'Nath', 'nath@gmail.com', 22, 35.5, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `clients_users_AK` (`Id_Users`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `commandes_clients_FK` (`Id_Clients`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `factures_commandes_FK` (`Id_Commandes`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `produits_categories_FK` (`Id_Catégories`),
  ADD KEY `produits_souscategories_FK` (`Id_SousCatégories`);

--
-- Index pour la table `produits_commandes`
--
ALTER TABLE `produits_commandes`
  ADD PRIMARY KEY (`Id_Produits`,`Id_Commandes`),
  ADD KEY `produits_commandes_commandes_FK` (`Id_Commandes`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `souscategories_categories_FK` (`Id_Categories`);

--
-- Index pour la table `tresorerie`
--
ALTER TABLE `tresorerie`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tresorerie`
--
ALTER TABLE `tresorerie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_users_FK` FOREIGN KEY (`Id_Users`) REFERENCES `users` (`Id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_clients_FK` FOREIGN KEY (`Id_Clients`) REFERENCES `clients` (`Id`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_commandes_FK` FOREIGN KEY (`Id_Commandes`) REFERENCES `commandes` (`Id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_categories_FK` FOREIGN KEY (`Id_Catégories`) REFERENCES `categories` (`Id`),
  ADD CONSTRAINT `produits_souscategories_FK` FOREIGN KEY (`Id_SousCatégories`) REFERENCES `souscategories` (`Id`);

--
-- Contraintes pour la table `produits_commandes`
--
ALTER TABLE `produits_commandes`
  ADD CONSTRAINT `produits_commandes_commandes_FK` FOREIGN KEY (`Id_Commandes`) REFERENCES `commandes` (`Id`),
  ADD CONSTRAINT `produits_commandes_produits_FK` FOREIGN KEY (`Id_Produits`) REFERENCES `produits` (`Id`);

--
-- Contraintes pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD CONSTRAINT `souscategories_categories_FK` FOREIGN KEY (`Id_Categories`) REFERENCES `categories` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
