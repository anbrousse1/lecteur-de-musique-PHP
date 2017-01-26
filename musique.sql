-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Janvier 2017 à 20:51
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `musique`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(10) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `texte` varchar(300) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `morceau`
--

CREATE TABLE `morceau` (
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `chemin` varchar(50) DEFAULT NULL,
  `nbAvisFav` int(11) DEFAULT NULL,
  `nbAvisDeFav` int(11) DEFAULT NULL,
  `nbAvisIndif` int(11) DEFAULT NULL,
  `details` varchar(300) DEFAULT NULL,
  `dureeEcoute` float DEFAULT NULL,
  `anneeParution` int(4) NOT NULL,
  `periodeMiseEnLigne` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `morceau`
--

INSERT INTO `morceau` (`titre`, `auteur`, `chemin`, `nbAvisFav`, `nbAvisDeFav`, `nbAvisIndif`, `details`, `dureeEcoute`, `anneeParution`, `periodeMiseEnLigne`) VALUES
('cartouche', 'sepatoche', 'Musique/cartouche.mp3', 18, 2, 15, 'Chanson de Sebastien Patoche qui est une chanson du genre comique.', 2.58, 2014, '2016-12-05'),
('Apologie', 'matmatah', 'Musique/l\'Apologie.mp3', 7, 1, 1, 'titre de matmatah', 3.19, 1997, '2016-11-08'),
('WakeMeUp', 'Avicii', 'Musique/WakeMeUp.mp3', 0, 0, 0, 'chanson pas trop trop mal', 3.16, 2015, '2016-11-08'),
('selfie', '', 'Musique/selfie.mp3', 6, 0, 0, NULL, 3.43, 2014, '2016-12-01'),
('TomberlaChemise', '', 'Musique/Tomber la Chemise.mp3', 0, 0, 0, 'reprise faites par le collectif métissé', 4.2, 2015, '2016-09-21'),
('Fiesta', 'calprit', 'Musique/Fiesta.mp3', 10, 2, 11, 'musique qui bouge et qui met le feu', 3.42, 2014, '2016-01-02'),
('GangamStyle', 'Psy', 'Musique/Gangamstyle.mp3', 0, 0, 1, 'japan', 3.5, 2013, '09-01-2017'),
('elPerdon', 'Iglesias', 'Musique/ElPerdon.mp3', 0, 0, 0, 'espagnol', 3.2, 2015, '09-01-2017 09:49:02'),
('LaCestDie', 'Ridsa', 'Musique/lacestdie.mp3', 0, 0, 0, 'musique plutôt cool', 3, 2016, '05-02-2016'),
('HeyBrother', 'Avicci', 'Musique/HeyBrother.mp3', 0, 0, 0, NULL, 3.1, 2012, '20-05-2016');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `mdp`) VALUES
('anbrousse1', 'antho'),
('ivschmidt', 'ivan'),
('root', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `morceau`
--
ALTER TABLE `morceau`
  ADD PRIMARY KEY (`titre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
