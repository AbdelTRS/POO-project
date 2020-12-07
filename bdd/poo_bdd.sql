-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 07 déc. 2020 à 22:00
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `poo_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `chatname` text NOT NULL,
  `content` text NOT NULL,
  `date_hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`ID`, `chatname`, `content`, `date_hour`) VALUES
(1, 'Yanndcl', 'gfdgfdg', '2020-12-07 22:37:00'),
(2, 'Yanndcl', 'undefined', '2020-12-07 22:37:11'),
(3, 'Yanndcl', 'undefined', '2020-12-07 22:37:13'),
(4, 'Yanndcl', 'undefined', '2020-12-07 22:37:14'),
(5, 'Yanndcl', 'undefined', '2020-12-07 22:37:15'),
(6, 'Yanndcl', 'undefined', '2020-12-07 22:37:15'),
(7, 'Yanndcl', 'undefined', '2020-12-07 22:37:36'),
(8, 'Yanndcl', 'undefined', '2020-12-07 22:37:37'),
(9, 'Yanndcl', 'undefined', '2020-12-07 22:37:37'),
(10, 'Yanndcl', 'undefined', '2020-12-07 22:37:37'),
(11, 'Yanndcl', 'undefined', '2020-12-07 22:37:39');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `uemail` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`) VALUES
(3, 'Lusy', '279dded4f6286b3f3366a5abc1ac7fe9', 'Yann Decelle', 'Yornnir@outlook.com'),
(4, 'Yanndcl', '05d3bc0b72817a23459b9fcd4a6b1461', 'Yann Decelle', 'Yornnir@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
