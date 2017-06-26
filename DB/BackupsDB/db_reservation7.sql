-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Juin 2017 à 16:02
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(29, 'Yay', '#FF0000', '2017-06-13 00:00:00', '2017-06-14 00:00:00'),
(36, 'Test', '#FF0000', '2017-05-31 00:00:00', '2017-06-02 00:00:00'),
(37, 'Hello', '#40E0D0', '2017-06-24 00:00:00', '2017-06-16 00:00:00'),
(38, 'awefawef', '#0071c5', '2017-06-09 00:00:00', '2017-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `t_message`
--

CREATE TABLE `t_message` (
  `idMessage` int(11) NOT NULL,
  `mesMessage` text NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_message`
--

INSERT INTO `t_message` (`idMessage`, `mesMessage`, `idUser`) VALUES
(12, 'Coucou', 1),
(13, 'Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu Huhuhuhuhuhu', 1),
(14, 'Wah hellow there', 1),
(15, '3434412124', 4),
(16, '&lt;h1&gt;Salut&lt;/h1&gt;', 4),
(17, 'Select * from t_user', 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_resevation`
--

CREATE TABLE `t_resevation` (
  `idReservation` int(11) NOT NULL,
  `resStartDate` date NOT NULL,
  `resEndDate` date NOT NULL,
  `resValidate` tinyint(4) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_resevation`
--

INSERT INTO `t_resevation` (`idReservation`, `resStartDate`, `resEndDate`, `resValidate`, `idUser`) VALUES
(13, '2017-06-24', '2017-06-15', 1, 2),
(14, '2017-06-09', '2017-06-14', 1, 1),
(15, '2010-01-01', '2024-12-31', 1, 4),
(16, '2017-06-23', '2017-06-30', 1, 1),
(17, '2017-07-28', '2017-07-31', 0, 1),
(18, '2017-06-10', '2017-06-04', 0, 1),
(22, '2017-06-04', '2017-06-07', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useLogin` varchar(10) NOT NULL,
  `usePassword` text NOT NULL,
  `useName` varchar(25) NOT NULL,
  `useFirstName` varchar(25) NOT NULL,
  `useAge` tinyint(4) NOT NULL,
  `useEmail` varchar(30) NOT NULL,
  `useFriendOf` tinyint(1) NOT NULL COMMENT '1 Magali - 2 Blaise - 3 Yves - 4 Patrick',
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useName`, `useFirstName`, `useAge`, `useEmail`, `useFriendOf`, `IsAdmin`) VALUES
(1, 'eleve', '$2y$10$AnfcjsVDHx/PdlDTB4WyWOYy7knsvXEyvA.8kIS7IhTZ/Kb2qx2C.', 'Guggis', 'Tim', 18, 'guggisbeti@etml.educanet2.ch', 1, 0),
(2, 'admin', '$2y$10$.U36bYgfCK1WtXrwFMzukuj0moD7izHz.sa6bc.0qbrLW8S/Xihhy', 'Guggisberg', 'Timothée', 18, 'timguggis@yahoo.fr', 2, 1),
(3, 'gigouze', '$2y$10$KxxZJYqE3KvySSy3RK8mYOiL1amC1tbcaR4g3QoF5L/XpKU8lB3va', 'Guggisberg', 'Blaise', 52, 'bguggisb@bluewin.ch', 2, 0),
(4, 'BuwaBuwa', '$2y$10$PZblluK/ExGWZyRVLJeRFOkXV.S5s/4FiUHHJLX2bx.S2mfTZpn6q', 'Uwamungu', 'Bernard', 98, 'boubou@bernawungu.ch', 2, 0),
(6, 'MasterNoir', '$2y$10$hdrAJ1pE3VriTJxZ/s.Tlew5QGr9ViKc6bTyGfdCce86jJlkHPLR.', 'Prime', 'Bernard', 58, 'bernard.uwamungu@hefr.ch', 2, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_message`
--
ALTER TABLE `t_message`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `FK_t_message_idUser` (`idUser`);

--
-- Index pour la table `t_resevation`
--
ALTER TABLE `t_resevation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `FK_t_resevation_idUser` (`idUser`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `t_message`
--
ALTER TABLE `t_message`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `t_resevation`
--
ALTER TABLE `t_resevation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_message`
--
ALTER TABLE `t_message`
  ADD CONSTRAINT `FK_t_message_idUser` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_resevation`
--
ALTER TABLE `t_resevation`
  ADD CONSTRAINT `FK_t_resevation_idUser` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
