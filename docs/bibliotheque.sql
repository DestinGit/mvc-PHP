-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 31 Juillet 2017 à 16:44
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bibliotheque`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cumul` (IN `montant` INT, INOUT `total` INT)  SET total := total + montant$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `prenom`) VALUES
(1, 'Adams', 'Douglas'),
(2, 'Herbert', 'Frank'),
(3, 'Sartré', 'J.P.'),
(4, 'Lordon', 'F.'),
(5, 'Brin', 'David'),
(6, 'Kant', 'Emmanuel'),
(7, 'Alain', ''),
(8, 'Asimov', 'Isaac'),
(9, 'Heinlein', 'Robert'),
(10, 'Platon', ''),
(11, 'Pascal', 'Blaise'),
(12, 'Martin', 'Robert'),
(13, 'Celko', 'Joe'),
(14, 'Soutou', 'Christian'),
(15, 'Highsmith', 'Patricia'),
(16, 'Karwin', 'Bill'),
(17, 'Hunt', 'Andrew'),
(18, 'Hugo', 'Victor'),
(19, 'Herbert', 'Frank');

-- --------------------------------------------------------

--
-- Structure de la table `editeurs`
--

CREATE TABLE `editeurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `editeurs`
--

INSERT INTO `editeurs` (`id`, `nom`) VALUES
(1, 'Grasset'),
(2, 'Hachette'),
(3, 'PUF'),
(4, 'Robert Laffont'),
(5, 'Dunod'),
(6, 'Eyrolles'),
(7, 'La Fabrique'),
(8, 'Morgan Kauffmann'),
(9, 'O''Reilly'),
(10, 'Addison Wesley');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Science fiction'),
(2, 'Essai'),
(3, 'Philosophie'),
(4, 'Informatique'),
(5, 'Roman policier'),
(6, 'Théâtre');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(100) NOT NULL,
  `prix` float(5,2) NOT NULL,
  `editeur_id` int(10) UNSIGNED NOT NULL,
  `auteur_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `prix`, `editeur_id`, `auteur_id`, `genre_id`) VALUES
(1, 'Le guide du routard intergallactique', 13.00, 1, 1, 1),
(2, 'Dune', 18.00, 2, 2, 1),
(3, 'La nausée', 12.50, 3, 3, 2),
(4, 'Désir et servitude', 9.00, 3, 4, 2),
(5, 'Elévation', 11.00, 1, 5, 1),
(6, 'Critique de la raison pure', 12.00, 3, 6, 3),
(7, 'Propos sur le bonheur', 9.00, 3, 7, 3),
(8, 'Fondation', 14.00, 4, 8, 1),
(9, 'En terre étrangère', 10.00, 4, 9, 1),
(10, 'La République', 8.00, 3, 10, 3),
(11, 'Pensées', 11.00, 2, 11, 3),
(12, 'Discours de la méthode', 9.00, 2, 11, 3),
(13, 'Coder proprement', 18.00, 5, 12, 4),
(14, 'SQL Avancé', 45.00, 5, 13, 4),
(15, 'Programmer avec MySQL', 35.00, 6, 14, 4),
(16, 'Crimes presque parfaits', 28.00, 2, 15, 5),
(17, 'Carol', 22.00, 2, 15, 5),
(18, 'Des chats et des hommes', 22.00, 2, 15, 5),
(19, 'Sur les pas de Ripley', 22.00, 2, 15, 5),
(20, 'L''inconnu du Nord Express', 22.00, 2, 15, 5),
(21, 'Ripley et les ombres', 22.00, 2, 15, 5),
(26, 'D''un retournement l''autre', 9.00, 7, 4, 6),
(27, 'Imperium', 15.00, 7, 4, 2),
(28, 'Et la vertu sauvera le monde', 6.00, 7, 4, 2),
(29, 'Economistes à gages', 7.50, 7, 4, 2),
(30, 'SQL for smarties', 55.86, 8, 13, 4),
(31, 'Data and Databases : Concepts in Practice', 67.47, 8, 13, 4),
(32, 'Thinking in Sets : Auxiliary, Temporal, and Virtual Tables in SQL', 28.43, 8, 13, 4),
(33, 'SQL Antipatterns', 33.44, 9, 16, 4),
(34, 'The pragmatic programmer : Form journeyman to master', 33.85, 10, 17, 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_catalogue`
--
CREATE TABLE `vue_catalogue` (
`id` int(10) unsigned
,`titre` varchar(100)
,`prix` float(5,2)
,`editeur_id` int(10) unsigned
,`auteur_id` int(10) unsigned
,`genre_id` int(10) unsigned
,`nom` varchar(50)
,`prenom` varchar(50)
,`nom_complet` varchar(101)
,`editeur` varchar(50)
,`genre` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vue_catalogue`
--
DROP TABLE IF EXISTS `vue_catalogue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_catalogue`  AS  select `livres`.`id` AS `id`,`livres`.`titre` AS `titre`,`livres`.`prix` AS `prix`,`livres`.`editeur_id` AS `editeur_id`,`livres`.`auteur_id` AS `auteur_id`,`livres`.`genre_id` AS `genre_id`,`auteurs`.`nom` AS `nom`,`auteurs`.`prenom` AS `prenom`,concat_ws(' ',`auteurs`.`prenom`,`auteurs`.`nom`) AS `nom_complet`,`editeurs`.`nom` AS `editeur`,`genres`.`genre` AS `genre` from (((`livres` join `auteurs` on((`livres`.`auteur_id` = `auteurs`.`id`))) join `editeurs` on((`livres`.`editeur_id` = `editeurs`.`id`))) join `genres` on((`livres`.`genre_id` = `genres`.`id`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `editeurs`
--
ALTER TABLE `editeurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livres_to_editeur` (`editeur_id`),
  ADD KEY `livres_to_auteur` (`auteur_id`),
  ADD KEY `livres_to_genre` (`genre_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `editeurs`
--
ALTER TABLE `editeurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_to_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `auteurs` (`id`),
  ADD CONSTRAINT `livres_to_editeur` FOREIGN KEY (`editeur_id`) REFERENCES `editeurs` (`id`),
  ADD CONSTRAINT `livres_to_genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
