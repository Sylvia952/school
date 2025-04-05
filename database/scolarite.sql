-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 05 avr. 2025 à 16:05
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `nom_cours` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `description`) VALUES
(3, 'Marketing digital', 'marketing numérique'),
(4, 'Base de Donnée Relationnelle', 'connexion'),
(5, 'Comptabilité', 'economie'),
(7, 'TEEO', 'Français'),
(12, 'Anglais', 'langue'),
(13, 'TIC', 'Telecoms');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `adresse`, `email`, `mdp`) VALUES
(1, 'AKPLOGAN', 'Didier', 'Cocodji', 'sylviahoundjo9@gmail.com', ''),
(2, 'GANSSOU', 'George', 'agla', 'bebeccaakpl@gmail.com', '$2y$10$nAPIgU/H7Yr1iJmatpqNCeRsbKIZft5q7qRVg1/CLqz1l6dHn.Ywy'),
(3, 'HOUNDJO', 'Sylvia', 'Cococodji', 'sylviahoundjo9@gmail.com', '$2y$10$37xMQqalgxMe9hmlPmMALeKW8iwkG1y857Wh3fxv/7yEIbg4.P5dO'),
(4, 'KOUDOLI', 'Eva', 'Atropocodji', 'evakoudoli2@gmail.com', '$2y$10$qNo/WkCWQP67NFr3K9M/Q.eBn3M7RruM4r8fmGn0PHI3RNafvhovO'),
(5, 'KONDE', 'Norbert', 'Hevié', 'norbertkonde9@gmail.com', '$2y$10$RV9lMWFGn2d7FesrGeqpqe5h63zoVOQ9vWb2a5QjSBcvNs/6S8gYq'),
(6, 'GANSSOU', 'Bébécca', 'agla', 'bebeccaakpl@gmail.com', '$2y$10$M/4kw2j41KyB2B8HNCoBAeUqM/v0nn6EaNp5.BaPVNYMLm4gKFGHq'),
(7, 'HAPO', 'Donatien', 'Cococodji', 'stephanetossougbe2004@gmail.com', '$2y$10$ztPpfkCyMZTqIF.cO0WpCOZfBef90OQAzOGM6rcZgiU2cS0VkR3Di'),
(8, 'AHO', 'Merveille', 'Awake', 'merveille4@gmail.com', '$2y$10$LAKxJR1CFR7fYU8Qb16rDekAqvSRnZHg4lLQ6kFvkLQXfrohUCN7O'),
(9, 'AHO', 'Jaques', 'Awake', 'jaquesaho6@gmail.com', '$2y$10$jNkHi48DJkJyksTbS2AdIep1L.PmAG.PoJF/SbeTzA6NPs3we6y7a'),
(10, 'AHO', 'Jaques', 'Awake', 'jaquesaho6@gmail.com', '$2y$10$ocXkc8Ff9Vncr8W9pzE2wuOJlId0tZnm0JslAMiim5NOZEX5MIlGa'),
(11, 'TOGBE', 'Grâce', 'Hevié', 'gracetogbe8@gmail.com', '$2y$10$eIWsfdUC9pKVg8PrMulgI.enftvWICpRcnOcWEP4.QjZNb8XcoR/G');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `date_inscription` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `id_etudiant`, `id_cours`, `date_inscription`) VALUES
(2, 1, 3, '2025-04-04 10:22:06'),
(3, 3, 3, '2025-04-04 10:54:47'),
(6, 1, 3, '2025-04-04 14:34:14'),
(9, 2, 3, '2025-04-04 14:36:17'),
(11, 1, 3, '2025-04-04 14:42:01'),
(16, 1, 5, '2025-04-05 09:44:08'),
(17, 4, 5, '2025-04-05 09:44:28'),
(19, 10, 5, '2025-04-05 09:58:21'),
(20, 5, 5, '2025-04-05 09:58:51'),
(21, 11, 3, '2025-04-05 13:03:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_cours` (`id_cours`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
