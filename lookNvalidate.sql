-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 24 Octobre 2018 à 15:00
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.2.8-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lookNvalidate`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `nom_entreprise` varchar(30) NOT NULL,
  `télèphone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `pasword` varchar(30) NOT NULL,
  `filiale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom_entreprise`, `télèphone`, `email`, `userName`, `pasword`, `filiale_id`) VALUES
(1, 'Addoha', '339254417', 'addoha@gmail.com', 'addoha', 'addoha133456', 1),
(2, 'Samsung', '339854471', 'samsung@gmail.com', 'samsung123', 'passeer54896', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(10) NOT NULL,
  `etapes_id` int(11) DEFAULT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `etapes_id`, `comment`) VALUES
(1, 1, 'etape valide'),
(2, 1, 'etape en cours'),
(3, 2, 'etape ok'),
(4, 2, 'etape demarre');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `id` int(10) NOT NULL,
  `projet_id` int(11) DEFAULT NULL,
  `nom` varchar(30) NOT NULL,
  `duree` int(10) NOT NULL,
  `etat` enum('0','1','2','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etapes`
--

INSERT INTO `etapes` (`id`, `projet_id`, `nom`, `duree`, `etat`) VALUES
(1, 4, 'wireframe', 5, '0'),
(2, 4, 'Developpement', 4, '0');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` int(10) NOT NULL,
  `etapes_id` int(11) DEFAULT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `filiale`
--

CREATE TABLE `filiale` (
  `id` int(11) NOT NULL,
  `pays` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `filiale`
--

INSERT INTO `filiale` (`id`, `pays`) VALUES
(1, 'Guinee'),
(2, 'Cote d\'ivoire'),
(3, 'France'),
(4, 'Gabon'),
(5, 'Sénègal');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `statut` enum('0','1','2','') NOT NULL,
  `description` varchar(500) NOT NULL,
  `brief` varchar(400) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `datePrestation` date NOT NULL,
  `type_prestation_id` int(11) DEFAULT NULL,
  `billings` double NOT NULL,
  `charges` double NOT NULL,
  `marges` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `statut`, `description`, `brief`, `client_id`, `equipe_id`, `datePrestation`, `type_prestation_id`, `billings`, `charges`, `marges`) VALUES
(4, 'Site web Addoha', '0', 'site pour addoha', 'site web pou addoha', 1, 1, '2018-10-09', 1, 2878900, 0, 28789000),
(5, 'Apli mobile addoha', '0', 'Application mobile pour addoha', 'Appli mobile', 1, 1, '2018-10-15', 2, 15000000, 0, 12000000),
(6, 'Site web ', '0', 'Site web pour X', 'Un site web pour x', 2, 2, '2018-10-02', 1, 500000, 250000, 250000);

-- --------------------------------------------------------

--
-- Structure de la table `projet_filiale`
--

CREATE TABLE `projet_filiale` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `type_prestation_id` int(11) DEFAULT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datePrestation` date NOT NULL,
  `billings` double NOT NULL,
  `charges` double NOT NULL,
  `marges` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `projet_filiale`
--

INSERT INTO `projet_filiale` (`id`, `client_id`, `type_prestation_id`, `nom`, `datePrestation`, `billings`, `charges`, `marges`) VALUES
(1, 1, 1, 'polo', '2018-10-01', 1200000, 0, 1200000),
(2, 2, 2, 'coco', '2018-10-31', 3500000, 0, 3500000);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(10) NOT NULL,
  `commentaires_id` int(11) DEFAULT NULL,
  `response` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `commentaires_id`, `response`) VALUES
(1, 1, 'Ok'),
(2, 1, 'd\'accord');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE `taches` (
  `id` int(10) NOT NULL,
  `etapes_id` int(11) DEFAULT NULL,
  `libellet` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`id`, `etapes_id`, `libellet`) VALUES
(3, 1, 'tache 1'),
(4, 1, 'tache 2'),
(5, 2, 'tache 1'),
(6, 2, 'tache 2');

-- --------------------------------------------------------

--
-- Structure de la table `type_prestation`
--

CREATE TABLE `type_prestation` (
  `id` int(11) NOT NULL,
  `libelleType` enum('canevas','déclinaisons','adaptations','banniéres','social média','préstation','carousels','campagne','site web','application mobile','maintenance site web','charte graphique','animatique','chatbot') COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `type_prestation`
--

INSERT INTO `type_prestation` (`id`, `libelleType`, `montant`) VALUES
(1, 'site web', 2500000),
(2, 'application mobile', 2800000);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `profil` enum('admin','designer','developpeur') NOT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `telephone`, `e_mail`, `profil`, `equipe_id`, `userName`, `password`, `photo`) VALUES
(1, 'Marieme', 'Koundoul', '784512263', 'kndeyemarieme@gmail.com', 'developpeur', 1, 'marieme', 'passer123', 'images/i1.jpg'),
(2, 'Cheikh', 'Gueye', '789546632', 'cheikh.gueye@gmail.com', 'developpeur', 2, 'cheikhbaye', 'passer123', 'images/i2.jpg'),
(3, 'Andre', ' Ndiaye', '789541123', 'andre.ndiaye@gmail.co', 'designer', 2, 'andre', 'passer895', 'images/i3.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C74404555C4BCADC` (`filiale_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D9BEC0C44F5CEED2` (`etapes_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E3443E17C18272` (`projet_id`);

--
-- Index pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_969DB4AB4F5CEED2` (`etapes_id`);

--
-- Index pour la table `filiale`
--
ALTER TABLE `filiale`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_50159CA919EB6921` (`client_id`),
  ADD KEY `IDX_50159CA96D861B89` (`equipe_id`),
  ADD KEY `IDX_50159CA9EEA87261` (`type_prestation_id`);

--
-- Index pour la table `projet_filiale`
--
ALTER TABLE `projet_filiale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7FB297EC19EB6921` (`client_id`),
  ADD KEY `IDX_7FB297ECEEA87261` (`type_prestation_id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1E512EC617C4B2B0` (`commentaires_id`);

--
-- Index pour la table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BF2CD984F5CEED2` (`etapes_id`);

--
-- Index pour la table `type_prestation`
--
ALTER TABLE `type_prestation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1D1C63B36D861B89` (`equipe_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `filiale`
--
ALTER TABLE `filiale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `projet_filiale`
--
ALTER TABLE `projet_filiale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `type_prestation`
--
ALTER TABLE `type_prestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404555C4BCADC` FOREIGN KEY (`filiale_id`) REFERENCES `filiale` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_D9BEC0C44F5CEED2` FOREIGN KEY (`etapes_id`) REFERENCES `etapes` (`id`);

--
-- Contraintes pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD CONSTRAINT `FK_E3443E17C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`);

--
-- Contraintes pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD CONSTRAINT `FK_969DB4AB4F5CEED2` FOREIGN KEY (`etapes_id`) REFERENCES `etapes` (`id`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_50159CA919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_50159CA96D861B89` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`),
  ADD CONSTRAINT `FK_50159CA9EEA87261` FOREIGN KEY (`type_prestation_id`) REFERENCES `type_prestation` (`id`);

--
-- Contraintes pour la table `projet_filiale`
--
ALTER TABLE `projet_filiale`
  ADD CONSTRAINT `FK_7FB297EC19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_7FB297ECEEA87261` FOREIGN KEY (`type_prestation_id`) REFERENCES `type_prestation` (`id`);

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `FK_1E512EC617C4B2B0` FOREIGN KEY (`commentaires_id`) REFERENCES `commentaires` (`id`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `FK_3BF2CD984F5CEED2` FOREIGN KEY (`etapes_id`) REFERENCES `etapes` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B36D861B89` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
