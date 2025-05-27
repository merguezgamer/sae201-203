-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 27 mai 2025 à 13:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `base_site_reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id` int(11) NOT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `desgnation` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `descriptif` varchar(100) DEFAULT NULL,
  `lien` varchar(50) DEFAULT NULL,
  `satut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`id`, `ref`, `desgnation`, `photo`, `type`, `date_achat`, `etat`, `quantite`, `descriptif`, `lien`, `satut`) VALUES
(1, 'CAM001', 'Caméra', 'camera1.jpg', 'Caméra', '2023-10-15', 'bon', 10, 'Caméra HD ', 'http://lien-vers-camera1', 'disponible'),
(2, 'MIC001', 'Microphone sans fil', 'micro1.jpg', 'Micro', '2023-09-20', 'cassé', 5, 'Microphone avec réduction de bruit', 'http://lien-vers-micro1', 'indisponible');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `texte` varchar(500) DEFAULT NULL,
  `date_envoie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_materiel` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `email_utilisateur` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `date_emprunt` date DEFAULT NULL,
  `heur_emprunt` time DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `date_rendu` date DEFAULT NULL,
  `heur_rendu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`, `statut`) VALUES
(8, 'salle 203', 'disponible '),
(9, 'salle 205', 'indisponible');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `Mot_de_passe` varchar(150) DEFAULT NULL,
  `adresse_postal` varchar(50) DEFAULT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `nom`, `prenom`, `Mot_de_passe`, `adresse_postal`, `role`) VALUES
(5, 'fouadtir@hotmail.fr', 'fouad', 'tir', '$2y$10$gbMbuFKLhoQxuFyF0NUGQeHiPVLPV8caBsc0lpe7W8EpUUr0NVg.e', NULL, 'enseignant'),
(7, 'test@test.fr', 'test', 'test', '$2y$10$nOIIRpYrN2mBazQy7sSrIuVLe8xyJQaTg7RZxmnR6YdosoXQ07zl.', NULL, 'etudiant'),
(8, 'admin@example.com', 'admin', 'admin', '$2y$10$WT2jjGx3yUylaHpLD.9XZONNEhuG/0q.uFNIc0aY5kuh2y8.lqRQ6', NULL, 'admin'),
(9, 'martin@mail.com', 'martin', 'dupont', '$2y$10$1DZTLtl8jrEXj4i6C8RlZOP5LSXox9lLmDyi3vlZsfB8SbP51zxA6', NULL, 'etudiant'),
(10, 'agent@mail.com', 'agent', 'agent', '$2y$10$Snc5rNQXhNDoUJD6C0x2WOSoxfxMtn4VzZjl0TT1R.601v3iyosH2', NULL, 'agent'),
(11, 'dupont@exemple.com', 'dupont', 'dupont', '$2y$10$7.36jM0IiFLTmuxk3C9a2OC22scFpxZiIYO2C0P.BDbm4TuW/9kbC', NULL, 'etudiant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materiel` (`id_materiel`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_materiel`) REFERENCES `materiel` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
