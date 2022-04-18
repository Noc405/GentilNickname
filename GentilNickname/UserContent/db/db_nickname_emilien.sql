-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 21 mars 2022 à 15:40
-- Version du serveur :  5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_nickname_emilien`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_section`
--

CREATE TABLE `t_section` (
  `idSection` int(11) NOT NULL,
  `secName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_section`
--

INSERT INTO `t_section` (`idSection`, `secName`) VALUES
(1, 'Informaticien-ne'),
(2, 'Théorie'),
(3, 'Menuisier-e'),
(4, 'Electronicien-ne'),
(5, 'Automaticien-ne'),
(6, 'Mecatronicien-ne');

-- --------------------------------------------------------

--
-- Structure de la table `t_teacher`
--

CREATE TABLE `t_teacher` (
  `idTeacher` int(11) NOT NULL,
  `teaFirstname` varchar(50) NOT NULL,
  `teaName` varchar(50) NOT NULL,
  `teaGender` char(1) NOT NULL,
  `teaNickname` varchar(50) NOT NULL,
  `teaOrigine` text NOT NULL,
  `teaVoix` int(11) NOT NULL DEFAULT '0',
  `fkSection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_teacher`
--

INSERT INTO `t_teacher` (`idTeacher`, `teaFirstname`, `teaName`, `teaGender`, `teaNickname`, `teaOrigine`, `teaVoix`, `fkSection`) VALUES
(2, 'Salulessa', 'Salulessa', 'M', 'Read the title', 'Il dit tout le temps ça', 0, 2),
(3, 'Cindy', 'Hardegger', 'F', 'Fenêtre', 'Elle ouvre toujours les fenêtres', 0, 1),
(5, 'Helder', 'Lopez', 'M', 'Lopezz', 'Parce qu\'il est espagnol (prononcé avec un accent espagnol)', 5, 1),
(8, 'Mveng', 'Antoine', 'M', 'Mercedes', 'Mercedes AMG, c\'est aussi ses initiales', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useLogin` varchar(20) NOT NULL,
  `usePassword` varchar(255) NOT NULL,
  `useAdministrator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useAdministrator`) VALUES
(1, 'emilien', '$2y$10$7iup8Yw/15JrSSgwc6XlVOwPiMVfP/5eN/KqD2YeH1q6KP4o9LNui', 0),
(3, 'emil', '$2y$10$rTXCC65SVik6shfgeMcQdOyxTEcTnzhITJsCIqJam/8BWQ9i0BJBq', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_section`
--
ALTER TABLE `t_section`
  ADD PRIMARY KEY (`idSection`);

--
-- Index pour la table `t_teacher`
--
ALTER TABLE `t_teacher`
  ADD PRIMARY KEY (`idTeacher`),
  ADD KEY `fkSection` (`fkSection`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_section`
--
ALTER TABLE `t_section`
  MODIFY `idSection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_teacher`
--
ALTER TABLE `t_teacher`
  MODIFY `idTeacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_teacher`
--
ALTER TABLE `t_teacher`
  ADD CONSTRAINT `t_teacher_ibfk_1` FOREIGN KEY (`fkSection`) REFERENCES `t_section` (`idSection`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
