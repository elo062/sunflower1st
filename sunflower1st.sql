-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Janvier 2018 à 16:32
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sunflower1st`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `dateResa` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duree` int(2) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_utilisateur`, `dateResa`, `lieu`, `duree`, `message`) VALUES
(8, 23, '2018-01-11', 'Perpignan', 3, 'J\'ai changé d\'avis'),
(9, 23, '2018-03-02', 'Wimereux', 3, ''),
(12, 23, '2019-02-23', 'Gironde', 3, 'C\'est en bas à gauche'),
(14, 23, '2017-12-15', 'Narbonne', 4, 'dsfdsfs fd sdfsdf '),
(24, 23, '2018-01-12', 'dsf', 2, 'tutut'),
(25, 23, '2018-12-01', 'dsfs', 2, ''),
(27, 25, '2018-11-09', 'ouveillan', 1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL UNSIGNED ZEROFILL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `adresse`, `tel`, `email`, `password`) VALUES
(1, 'Moi', 'Elo', '16 rue Léo Delibes, 62930 Wimereux', 321300521, 'eloi@voila.fr', 'moimoi'),
(3, 'mimi', 'moimoi', '13 lot le Pascal, 34290 Aigues-Mortes', 897127689, 'lydia@laposte.net', 'e2d75b01c33ae9'),
(4, 'Mélo', 'Die', '45 rue de la Garigue', 467842133, 'melodie@yahoo.fr', '3e267facec158a'),
(5, 'Cosson', 'Romain', '13 lot le Pascal, 34290 Aigues-Mortes', 425304201, 'ehtreher@dsqfdzqrfq', '35bc724730476a47cf18f92f486cd9e7745d4f15'),
(6, 'Elo', 'Ise', '54 avenue de lacombe', 123525941, 'eloise@hotmail.fr', '3ff70be9f485e110e12328cda93f933dd3a8cdcd'),
(7, 'Ago', 'Lydie', '16 rue Léo Delibes, 62930 Wimereux', 321300521, 'lydiago@laposte.net', '52532216b550e9d76859362dc302e0d1b96e5524'),
(8, 'Mécozzi', 'Matthieu', '13 lot le Pascal, 34290 Aigues-Mortes', 721236084, 'matthieu@gmail.com', '6f5cfecdfcff7f44912789ae5933dcdac629ae4d'),
(9, 'Lydie', 'Ago', '16 rue Léo Delibes, 62930 Wimereux', 897127684, 'lydie@laposte.net', '52532216b550e9d76859362dc302e0d1b96e5524'),
(10, 'Mat', 'tieu', '12 rue Simon Castan', 215369874, 'matthieu@gmail.com', '6f5cfecdfcff7f44912789ae5933dcdac629ae4d'),
(11, 'Elo', 'die', '14 rue du champ', 214253621, 'elodie@gmail.com', '185c4399fdc91d4b9ae69c588ee175674af9ba47'),
(12, 'Eloïse', 'Eloïse', '14 rue du champ', 215369874, 'toto@gmail.com', '2e43dae12638b2d5f0bcfe2ce9b7d275d76dd0bf'),
(13, 'Eloïse', 'Eloïse', '14 rue du champ', 215369874, 'toto@gmail.com', '3105221c1c15399d170ef540e974ef4f37f84e93'),
(14, 'Eloïse', 'Eloïse', '14 rue du champ', 215369874, 'toto@gmail.com', '3105221c1c15399d170ef540e974ef4f37f84e93'),
(15, 'Eloïse', 'Eloïse', '14 rue du champ', 215369874, 'toto@gmail.com', '3105221c1c15399d170ef540e974ef4f37f84e93'),
(16, 'Eloïse', 'Eloïse', '14 rue du champ', 215369874, 'toto@gmail.com', '3105221c1c15399d170ef540e974ef4f37f84e93'),
(17, 'Eloïse', 'Eloïse', '14 rue du champ', 215369874, 'toto@gmail.com', 'a8a3a35aeb9771bfa84d41982b070caefe4ca11c'),
(21, 'Mo,tmasson', 'Eloïse', '14 rue du champ', 215369874, 'tre@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(22, 'Mo,tmasson', 'Eloïse', '12 rue Simon Castan', 215369874, 'eloisemecozzi@hotmail.fr', '32a89bdcec2d50f9dc9747cd47ecfc14cf9c3dbe'),
(23, 'tutu', 'tutu', 'tutu', 215369874, 'gugu@gmail.com', '32a89bdcec2d50f9dc9747cd47ecfc14cf9c3dbe'),
(24, 'Montmasson', 'Elodie ', '12 rue Simon Castan', 215369874, 'ththt@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(25, 'Papillotes de Saumon', 'Elodie ', '14 rue du champ', 214253621, 'gaga@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(26, 'Raph', 'Mécozzi', '13 lotissement le Cascal', 215369874, 'raph.mecozzi@gmail.com', 'cdc1a1a98b37c828f72b2df5550d658c6f092848');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reservation_id_utilisateur` (`id_utilisateur`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
