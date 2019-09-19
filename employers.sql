-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 19 Septembre 2019 à 14:46
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `employers`
--

-- --------------------------------------------------------

--
-- Structure de la table `employers`
--

CREATE TABLE `employers` (
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `salaire` int(11) NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employers`
--

INSERT INTO `employers` (`matricule`, `nom`, `prenom`, `email`, `date_naissance`, `salaire`, `telephone`) VALUES
('EM-00001', 'Ndiye', 'Samba', 'leak@hzd.com', '1997-12-11', 4046500, 775574265);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
