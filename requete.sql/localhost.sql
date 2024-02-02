-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 02 fév. 2024 à 08:06
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `asdfgh`
--
CREATE DATABASE IF NOT EXISTS `asdfgh` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `asdfgh`;
--
-- Base de données : `codex`
--
CREATE DATABASE IF NOT EXISTS `codex` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `codex`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `zipCode` varchar(5) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
--
-- Base de données : `doctor`
--
CREATE DATABASE IF NOT EXISTS `doctor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `doctor`;

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
--
-- Base de données : `fitapp`
--
CREATE DATABASE IF NOT EXISTS `fitapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `fitapp`;

-- --------------------------------------------------------

--
-- Structure de la table `avis_et_evaluations`
--

CREATE TABLE `avis_et_evaluations` (
  `ID_NOTICE` varchar(50) NOT NULL,
  `COMMENT` varchar(250) NOT NULL,
  `NOTICE_DATE` date NOT NULL,
  `ID_CATALOG_TRANING` varchar(50) NOT NULL,
  `ID_USER` varchar(50) NOT NULL,
  `ID_PERSONNAL_TRANING` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `catalogue_d_entrainements`
--

CREATE TABLE `catalogue_d_entrainements` (
  `ID_CATALOG_TRANING` varchar(50) NOT NULL,
  `TRANING_NAME_` varchar(50) NOT NULL,
  `TRANING_DESCRPTION` varchar(250) NOT NULL,
  `TOT_DURATION_TRANING` time NOT NULL,
  `DIFF_LEVEL` varchar(50) NOT NULL,
  `TRANING_CAT` varchar(50) NOT NULL,
  `EXERCISES_LIST` varchar(250) NOT NULL,
  `PREVIEW` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrainements_personnalise`
--

CREATE TABLE `entrainements_personnalise` (
  `ID_PERSONNAL_TRANING` varchar(50) NOT NULL,
  `TRANING_NAME_` varchar(50) NOT NULL,
  `TRANING_DESCRPTION` varchar(250) NOT NULL,
  `TOT_DURATION_TRANING` time NOT NULL,
  `DIFF_LEVEL` varchar(50) NOT NULL,
  `TRANING_CAT` varchar(50) NOT NULL,
  `EXERCISES_LIST` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle_de_sport`
--

CREATE TABLE `salle_de_sport` (
  `ID_SALLE` varchar(50) NOT NULL,
  `NAME_SALLE` varchar(150) NOT NULL,
  `ADR_SALLE` varchar(250) NOT NULL,
  `CITY_SALLE` varchar(50) NOT NULL,
  `GPS_SALLE` decimal(15,15) NOT NULL,
  `OPENTIME_SALLE_` datetime NOT NULL,
  `AVAILABLE_SERVICE` varchar(500) NOT NULL,
  `PRICES` decimal(4,2) DEFAULT NULL,
  `ZIPCODE_SALLE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE `suivi` (
  `_ID_FOLLOW_UP` varchar(50) NOT NULL,
  `FOLLOW_UP_DATE` date NOT NULL,
  `PROGRESSIONS` int NOT NULL,
  `NB_STEPS` int NOT NULL,
  `TRANING_DONE` varchar(50) NOT NULL,
  `CALORIES_BURNED` decimal(3,3) NOT NULL,
  `ID_USER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_`
--

CREATE TABLE `utilisateur_` (
  `ID_USER` varchar(50) NOT NULL,
  `LASTNAME_USER` varchar(50) NOT NULL,
  `FIRSTNAME_USER` varchar(50) NOT NULL,
  `AGE_USER` date NOT NULL,
  `EMAIL_USER_` varchar(150) NOT NULL,
  `MDP_USER` varchar(50) NOT NULL,
  `WEIGHT_USER_` int NOT NULL,
  `SIZE_USER` int NOT NULL,
  `OBJECT_USER_` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur_`
--

INSERT INTO `utilisateur_` (`ID_USER`, `LASTNAME_USER`, `FIRSTNAME_USER`, `AGE_USER`, `EMAIL_USER_`, `MDP_USER`, `WEIGHT_USER_`, `SIZE_USER`, `OBJECT_USER_`) VALUES
('', 'remond', 'ricardo', '1999-08-19', 'ricardo.remond.pro@gmail.com', 'ricardo27', 64, 180, 'Prise de masse ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_definis`
--

CREATE TABLE `utilisateur_definis` (
  `ID_USER` varchar(50) NOT NULL,
  `ID_PERSONNAL_TRANING` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_localise_la_salle_`
--

CREATE TABLE `utilisateur_localise_la_salle_` (
  `ID_USER` varchar(50) NOT NULL,
  `ID_SALLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis_et_evaluations`
--
ALTER TABLE `avis_et_evaluations`
  ADD PRIMARY KEY (`ID_NOTICE`),
  ADD KEY `ID_CATALOG_TRANING` (`ID_CATALOG_TRANING`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_PERSONNAL_TRANING` (`ID_PERSONNAL_TRANING`);

--
-- Index pour la table `catalogue_d_entrainements`
--
ALTER TABLE `catalogue_d_entrainements`
  ADD PRIMARY KEY (`ID_CATALOG_TRANING`);

--
-- Index pour la table `entrainements_personnalise`
--
ALTER TABLE `entrainements_personnalise`
  ADD PRIMARY KEY (`ID_PERSONNAL_TRANING`);

--
-- Index pour la table `salle_de_sport`
--
ALTER TABLE `salle_de_sport`
  ADD PRIMARY KEY (`ID_SALLE`);

--
-- Index pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`_ID_FOLLOW_UP`),
  ADD UNIQUE KEY `ID_USER` (`ID_USER`);

--
-- Index pour la table `utilisateur_`
--
ALTER TABLE `utilisateur_`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Index pour la table `utilisateur_definis`
--
ALTER TABLE `utilisateur_definis`
  ADD PRIMARY KEY (`ID_USER`,`ID_PERSONNAL_TRANING`),
  ADD KEY `ID_PERSONNAL_TRANING` (`ID_PERSONNAL_TRANING`);

--
-- Index pour la table `utilisateur_localise_la_salle_`
--
ALTER TABLE `utilisateur_localise_la_salle_`
  ADD PRIMARY KEY (`ID_USER`,`ID_SALLE`),
  ADD KEY `ID_SALLE` (`ID_SALLE`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis_et_evaluations`
--
ALTER TABLE `avis_et_evaluations`
  ADD CONSTRAINT `avis_et_evaluations_ibfk_1` FOREIGN KEY (`ID_CATALOG_TRANING`) REFERENCES `catalogue_d_entrainements` (`ID_CATALOG_TRANING`),
  ADD CONSTRAINT `avis_et_evaluations_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateur_` (`ID_USER`),
  ADD CONSTRAINT `avis_et_evaluations_ibfk_3` FOREIGN KEY (`ID_PERSONNAL_TRANING`) REFERENCES `entrainements_personnalise` (`ID_PERSONNAL_TRANING`);

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `suivi_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateur_` (`ID_USER`);

--
-- Contraintes pour la table `utilisateur_definis`
--
ALTER TABLE `utilisateur_definis`
  ADD CONSTRAINT `utilisateur_definis_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateur_` (`ID_USER`),
  ADD CONSTRAINT `utilisateur_definis_ibfk_2` FOREIGN KEY (`ID_PERSONNAL_TRANING`) REFERENCES `entrainements_personnalise` (`ID_PERSONNAL_TRANING`);

--
-- Contraintes pour la table `utilisateur_localise_la_salle_`
--
ALTER TABLE `utilisateur_localise_la_salle_`
  ADD CONSTRAINT `utilisateur_localise_la_salle__ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateur_` (`ID_USER`),
  ADD CONSTRAINT `utilisateur_localise_la_salle__ibfk_2` FOREIGN KEY (`ID_SALLE`) REFERENCES `salle_de_sport` (`ID_SALLE`);
--
-- Base de données : `jeu de donnees`
--
CREATE DATABASE IF NOT EXISTS `jeu de donnees` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `jeu de donnees`;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_entreprise` int NOT NULL,
  `Numéro_de_siret_entreprise` bigint NOT NULL,
  `Ville_de_l_entreprise` varchar(50) DEFAULT NULL,
  `Nom_de_l_entreprise` varchar(50) NOT NULL,
  `Mot_de_passe_email_entreprise` varchar(255) NOT NULL,
  `Email_entreprise` varchar(50) NOT NULL,
  `Adresse_de_l_entreprise` varchar(50) NOT NULL,
  `Code_postal_de_l_entreprise` int NOT NULL,
  `Image_de_l_entreprise` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_entreprise`, `Numéro_de_siret_entreprise`, `Ville_de_l_entreprise`, `Nom_de_l_entreprise`, `Mot_de_passe_email_entreprise`, `Email_entreprise`, `Adresse_de_l_entreprise`, `Code_postal_de_l_entreprise`, `Image_de_l_entreprise`) VALUES
(1, 54896723589456, 'Vernon', 'Nati-V', 'NativPassword', 'nativcompany@gmail.com', '17 rue Albufera', 27200, ''),
(2, 98765432100002, 'Vernon', 'SportStore', 'SportStorePassword', 'sportstore@gmail.com', '18 rue Albufera', 27200, '');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `ID_evenement` int NOT NULL,
  `Nom_de_l_evenement` varchar(50) NOT NULL,
  `Date_de_debut` datetime NOT NULL,
  `Date_de_fin_de_l_evenement` datetime NOT NULL,
  `Description_de_l_evenement` varchar(250) NOT NULL,
  `Image_de_l_evenement` varchar(50) DEFAULT NULL,
  `ID_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`ID_evenement`, `Nom_de_l_evenement`, `Date_de_debut`, `Date_de_fin_de_l_evenement`, `Description_de_l_evenement`, `Image_de_l_evenement`, `ID_entreprise`) VALUES
(1, 'Cross Week', '2024-01-01 10:00:00', '2024-03-01 10:00:00', 'Un événement pour promouvoir la santé et le bien-être à travers la marche et le vélo.', NULL, 2),
(2, 'Health month', '2024-01-01 10:00:00', '2024-01-01 10:00:00', 'Un événement pour promouvoir la santé et le bien-être à travers la marche et le vélo.', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `moderateur`
--

CREATE TABLE `moderateur` (
  `ID_moderateur` int NOT NULL,
  `Email_moderateur` varchar(50) NOT NULL,
  `Mot_de_passe_moderateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moderateur`
--

INSERT INTO `moderateur` (`ID_moderateur`, `Email_moderateur`, `Mot_de_passe_moderateur`) VALUES
(1, 'ricardo.remond.dev@gmail.com', 'Ricardo27');

-- --------------------------------------------------------

--
-- Structure de la table `trajets_de_l_utilisateur`
--

CREATE TABLE `trajets_de_l_utilisateur` (
  `ID_trajet` int NOT NULL,
  `Date_du_trajet` datetime NOT NULL,
  `Distance_parcourue` float NOT NULL,
  `Duree_du_trajet` time NOT NULL,
  `Image_trajet` varchar(50) DEFAULT NULL,
  `ID_vehicule` int NOT NULL,
  `ID_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `trajets_de_l_utilisateur`
--

INSERT INTO `trajets_de_l_utilisateur` (`ID_trajet`, `Date_du_trajet`, `Distance_parcourue`, `Duree_du_trajet`, `Image_trajet`, `ID_vehicule`, `ID_utilisateur`) VALUES
(19, '2024-01-10 08:00:00', 5.2, '00:30:00', 'image_trajet1.jpg', 1, 1),
(20, '2024-01-12 09:30:00', 3.8, '00:20:00', 'image_trajet2.jpg', 2, 2),
(21, '2024-01-11 10:45:00', 6.5, '00:40:00', 'image_trajet3.jpg', 1, 3),
(22, '2024-01-14 12:15:00', 4.2, '00:25:00', 'image_trajet4.jpg', 2, 4),
(23, '2024-01-13 14:00:00', 8, '00:50:00', 'image_trajet5.jpg', 1, 5),
(24, '2024-01-16 15:30:00', 2.5, '00:15:00', 'image_trajet6.jpg', 2, 6),
(25, '2024-01-10 08:00:00', 7.1, '00:45:00', 'image_trajet7.jpg', 1, 1),
(26, '2024-01-12 09:30:00', 4.9, '00:30:00', 'image_trajet8.jpg', 2, 2),
(27, '2024-01-11 10:45:00', 6.8, '00:40:00', 'image_trajet9.jpg', 1, 3),
(28, '2024-01-10 08:00:00', 5.5, '00:32:00', 'image_trajet10.jpg', 1, 4),
(29, '2024-01-11 10:45:00', 4, '00:22:00', 'image_trajet11.jpg', 2, 5),
(30, '2024-01-12 09:30:00', 6.3, '00:38:00', 'image_trajet12.jpg', 1, 6),
(31, '2024-01-14 12:15:00', 3.6, '00:18:00', 'image_trajet13.jpg', 2, 1),
(32, '2024-01-13 14:00:00', 7.5, '00:48:00', 'image_trajet14.jpg', 1, 2),
(33, '2024-01-16 15:30:00', 2, '00:12:00', 'image_trajet15.jpg', 2, 3),
(34, '2024-01-10 08:00:00', 7.8, '00:50:00', 'image_trajet16.jpg', 1, 4),
(35, '2024-01-12 09:30:00', 5.1, '00:28:00', 'image_trajet17.jpg', 2, 5),
(36, '2024-01-11 10:45:00', 6, '00:35:00', 'image_trajet18.jpg', 1, 6),
(37, '2024-01-14 12:15:00', 4.4, '00:25:00', 'image_trajet19.jpg', 2, 1),
(38, '2024-01-13 14:00:00', 6.7, '00:42:00', 'image_trajet20.jpg', 1, 2),
(39, '2024-01-16 15:30:00', 3.3, '00:18:00', 'image_trajet21.jpg', 2, 3),
(60, '2024-01-19 18:04:00', 1.8, '20:04:00', 'image_trajet_par_defaut.jpg', 3, 58);

-- --------------------------------------------------------

--
-- Structure de la table `transport_pris_en_compte_par_l_event`
--

CREATE TABLE `transport_pris_en_compte_par_l_event` (
  `ID_relation` int NOT NULL,
  `ID_evenement` int DEFAULT NULL,
  `ID_vehicule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transport_pris_en_compte_par_l_event`
--

INSERT INTO `transport_pris_en_compte_par_l_event` (`ID_relation`, `ID_evenement`, `ID_vehicule`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_de_transport`
--

CREATE TABLE `type_de_transport` (
  `ID_vehicule` int NOT NULL,
  `RIDE_TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_de_transport`
--

INSERT INTO `type_de_transport` (`ID_vehicule`, `RIDE_TYPE`) VALUES
(1, 'Velo'),
(2, 'Trottinette'),
(3, 'Marche'),
(4, 'Rollers'),
(5, 'Skate');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_utilisateur` int NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mot_de_passe_utilisateur` varchar(255) NOT NULL,
  `Photo_de_profil` varchar(50) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Utilisateur_valide` tinyint(1) NOT NULL,
  `ID_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `Pseudo`, `Nom`, `Prenom`, `Date_de_naissance`, `Email`, `Mot_de_passe_utilisateur`, `Photo_de_profil`, `Description`, `Utilisateur_valide`, `ID_entreprise`) VALUES
(1, 'Captn Rickson', 'Papy', 'Ricardo', '1999-08-19', 'ricardo.remond.pro@gmail.com', 'ricardo27', 'img-profil-defaut.png', NULL, 1, 1),
(2, 'Mlddb', 'Papy', 'Malado', '1999-08-16', 'malado.djiby@gmail.com', 'mlddb27200', 'img-profil-defaut.png', NULL, 1, 1),
(3, 'Utilisateur3', 'Papy', 'Michel', '2000-03-03', 'user3@example.com', 'MotDePasse3', 'img-profil-defaut.png', NULL, 1, 1),
(4, 'Utilisateur4', 'Papy', 'Paul', '1985-04-04', 'user4@example.com', 'MotDePasse4', 'img-profil-defaut.png', NULL, 1, 2),
(5, 'Utilisateur5', 'Papy', 'Louis', '1993-05-05', 'user5@example.com', 'MotDePasse5', 'img-profil-defaut.png', NULL, 1, 2),
(6, 'Utilisateur6', 'Papy', 'Jean', '1998-06-06', 'user6@example.com', 'MotDePasse6', 'img-profil-defaut.png', NULL, 1, 2),
(58, 'fonfon', 'michou', 'dacc', '2024-02-15', 'albertlafondu87569@gmail.com', '$2y$10$/zRpvDAODgJpUqAc.s62Rep2D2Y70SOTxie2f1Vffz436blKbiQ.O', '58_profile_photo.jpg', NULL, 1, 2),
(65, '123456789', 'coco', 'ygfvghju', '2024-01-27', '123456@live.fr', '$2y$10$nZK3v2s0TtR6so1F8.TGy.VBxQl6NGMWVj0KC963jMLPaYBoEsDja', '65_profile_photo.jpg', NULL, 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_entreprise`),
  ADD UNIQUE KEY `Numéro_de_siret_entreprise` (`Numéro_de_siret_entreprise`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`ID_evenement`),
  ADD KEY `ID_entreprise` (`ID_entreprise`);

--
-- Index pour la table `moderateur`
--
ALTER TABLE `moderateur`
  ADD PRIMARY KEY (`ID_moderateur`),
  ADD UNIQUE KEY `Email_moderateur` (`Email_moderateur`);

--
-- Index pour la table `trajets_de_l_utilisateur`
--
ALTER TABLE `trajets_de_l_utilisateur`
  ADD PRIMARY KEY (`ID_trajet`),
  ADD KEY `ID_vehicule` (`ID_vehicule`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`);

--
-- Index pour la table `transport_pris_en_compte_par_l_event`
--
ALTER TABLE `transport_pris_en_compte_par_l_event`
  ADD PRIMARY KEY (`ID_relation`),
  ADD KEY `ID_evenement` (`ID_evenement`),
  ADD KEY `ID_vehicule` (`ID_vehicule`);

--
-- Index pour la table `type_de_transport`
--
ALTER TABLE `type_de_transport`
  ADD PRIMARY KEY (`ID_vehicule`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD UNIQUE KEY `Pseudo` (`Pseudo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ID_entreprise` (`ID_entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID_entreprise` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID_evenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `moderateur`
--
ALTER TABLE `moderateur`
  MODIFY `ID_moderateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `trajets_de_l_utilisateur`
--
ALTER TABLE `trajets_de_l_utilisateur`
  MODIFY `ID_trajet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `transport_pris_en_compte_par_l_event`
--
ALTER TABLE `transport_pris_en_compte_par_l_event`
  MODIFY `ID_relation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_de_transport`
--
ALTER TABLE `type_de_transport`
  MODIFY `ID_vehicule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`ID_entreprise`) REFERENCES `entreprise` (`ID_entreprise`);

--
-- Contraintes pour la table `trajets_de_l_utilisateur`
--
ALTER TABLE `trajets_de_l_utilisateur`
  ADD CONSTRAINT `trajets_de_l_utilisateur_ibfk_1` FOREIGN KEY (`ID_vehicule`) REFERENCES `type_de_transport` (`ID_vehicule`),
  ADD CONSTRAINT `trajets_de_l_utilisateur_ibfk_2` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`);

--
-- Contraintes pour la table `transport_pris_en_compte_par_l_event`
--
ALTER TABLE `transport_pris_en_compte_par_l_event`
  ADD CONSTRAINT `transport_pris_en_compte_par_l_event_ibfk_1` FOREIGN KEY (`ID_evenement`) REFERENCES `evenement` (`ID_evenement`),
  ADD CONSTRAINT `transport_pris_en_compte_par_l_event_ibfk_2` FOREIGN KEY (`ID_vehicule`) REFERENCES `type_de_transport` (`ID_vehicule`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_entreprise`) REFERENCES `entreprise` (`ID_entreprise`);
--
-- Base de données : `sellphones`
--
CREATE DATABASE IF NOT EXISTS `sellphones` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sellphones`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `Nom Article` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_article` int NOT NULL,
  `ref_article` varchar(50) NOT NULL,
  `prix_art` decimal(10,2) NOT NULL,
  `description_article` varchar(250) NOT NULL,
  `img_article` varchar(50) NOT NULL,
  `stock_dispo` varchar(50) NOT NULL,
  `id_marques` int NOT NULL,
  `id_cat` int NOT NULL,
  `id_fou` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Nom Article`, `id_article`, `ref_article`, `prix_art`, `description_article`, `img_article`, `stock_dispo`, `id_marques`, `id_cat`, `id_fou`) VALUES
('Wiko Sunny', 1, '001', 99.00, 'Taille Ecran : 6,2 pouces', '001.png', 'En stock', 3, 1, 1),
('Wiko View5', 2, '002', 301.00, 'Taille de l\'écran : 6.55 pouces', '002.png', 'En stock', 3, 1, 1),
('Wiko Lenny4 ', 3, '003', 98.00, 'Taille de l\'écran : 6.3 pouces', '003.png', 'En stock', 3, 1, 1),
('IPhone 15', 11, '004', 969.00, 'Taille de l\'écran : 6,1 pouces ', '004.png', 'En stock', 1, 1, 2),
('IPhone 14 ', 12, '005', 869.00, 'Taille de l\'écran : 6,1 pouces', '005.png', 'En stock', 1, 1, 2),
('IPhone 13', 13, '006', 749.00, 'Taille de l\'écran : 6,1 pouces', '006.png', 'En stock', 1, 1, 2),
('IPhone 12', 14, '007', 549.00, 'Taille de l\'écran : 6,1 pouces', '007.png', 'En stock', 1, 1, 2),
('IPhone 11', 15, '008', 469.00, 'Taille de l\'écran : 6,1 pouces', '008.png', 'En stock', 1, 1, 2),
('IPhone X', 16, '009', 369.00, 'Taille de l\'écran : 6,1 pouces', '009.png', 'En stock', 1, 1, 2),
('Samsung Galaxy S21 ', 17, '010', 300.00, 'Taille de l\'écran : 6,2 pouces ', '010.png', 'En stock', 2, 1, 3),
('Samsung Galaxy S20', 18, '011', 200.00, 'Taille de l\'écran : 6,5 pouces', '011.png', 'En stock', 2, 1, 3),
('Samsung Galaxy A40 ', 19, '012', 235.00, 'Taille de l\'écran :  5,9 pouces', '012.png', 'En stock', 2, 1, 3),
('Samsung Note 9', 20, '013', 348.00, 'Taille de l\'écran : 6,4 pouces', '013.png', 'En stock', 2, 1, 3),
('Samsung Galaxy ZFlip 4', 21, '014', 460.00, 'Taille de l\'écran : 3,3 pouces sur 2,8 pouces lorsqu\'il est replié.', '014.png', 'En stock', 2, 1, 3),
('Samsung Galaxy ZFlip 5', 22, '015', 650.00, 'Taille de l\'écran : 6.7 pouces sur 3.4 pouces lorsqu\'il est replié.', '015.png', 'En stock', 2, 1, 3),
('Apple Watch série 5 ', 30, '016', 389.00, 'Taille de l\'écran : 42mm ', '016.png', 'En stock', 1, 4, 2),
('Apple Watch série 6', 31, '017', 429.00, 'Taille de l\'écran : 42mm ', '017.png', 'En stock', 1, 4, 2),
('Apple Watch série 7', 32, '018', 449.00, 'Taille de l\'écran : 42mm ', '018.png', 'En stock', 1, 4, 2),
('Apple Watch série 8', 33, '019', 489.00, 'Taille de l\'écran : 42mm ', '019.png', 'En stock', 1, 4, 2),
('Samsung Galaxy watch 6', 34, '020', 300.00, 'Taille de l\'écran : 45mm ', '020.png', 'En stock', 2, 4, 3),
('Samsung Galaxy watch 7', 35, '021', 321.00, 'Taille de l\'écran : 45mm', '021.png', 'En stock', 2, 4, 3),
('Samsung Galaxy watch 8', 36, '022', 429.00, 'Taille de l\'écran : 45mm', '022.png', 'En Stock', 2, 4, 3),
('iPad Pro', 37, '023', 1069.00, 'Taille de l\'écran : 2,9 Pouces ', '023.png', 'En stock', 1, 2, 2),
('iPad Air', 38, '024', 789.00, 'Taille de l\'écran : 10,86 Pouces', '024.png', 'En stock', 1, 2, 2),
('iPad 10ème génération', 39, '025', 589.00, 'Taille de l\'écran : 10,86 Pouces', '025.png', 'En stock', 1, 2, 2),
('iPad 9ème génération', 40, '026', 439.00, 'Taille de l\'écran : 10,2 Pouces ', '026.png', 'En stock', 1, 2, 2),
('Galaxy Tab S9', 41, '027', 1049.00, 'Taille de l\'écran : 11 pouces', '027.png', 'En stock', 2, 2, 3),
('Galaxy Tab S8', 42, '028', 879.00, 'Taille de l\'écran : 10,5 pouces', '028.png', 'En stock', 2, 2, 3),
('Galaxy Tab S7', 43, '029', 685.00, 'Taille de l\'écran : 8,7 pouces', '029.png', 'En stock', 2, 2, 3),
('Galaxy Tab A8', 44, '030', 329.00, 'Taille de l\'écran :  10,5 pouces ', '030.png', 'En stock', 2, 2, 3),
('Huawei P30 Lite - 128 Go ', 45, '031', 110.00, 'P30 Lite - 6,15\'\' FHD+ - 4G+ - Android 9.0 - Lecteur d\'empreintes digitales', '031.png', 'En stock', 4, 1, 4),
('HUAWEI P40 Lite - 128 Go', 46, '032', 101.99, 'Smartphone 6,4\"\" FHD+ FullView - Huawei AppGallery (Services Google non intégrés) - 4G - Kirin 810 - RAM 6 Go - Caméra 48MP - 4200mAh - SuperCharge 40W - EMUI 10', '032.png', 'En stock', 4, 1, 4),
('HUAWEI P Smart 2021 - 128 Go', 47, '033', 276.10, 'Smartphone 6.67\"\" FHD+ - Kirin 710A - RAM 4 Go - Huawei AppGallery (Services Google non intégrés) - 5000 mAh - Caméra 48MP', '033.png', 'En stock', 4, 1, 4),
('HUAWEI Mate 30 Pro - 256 Go', 48, '034', 968.99, 'Smartphone 6,53\"\" OLED Horizon FHD+ - Kirin 990 - RAM 8 Go - Quadruple Caméra Leica - 4500 mAh - IP68 - Huawei AppGallery (Services Google non intégrés) - EMUI10', '034.png', 'En stock', 4, 1, 4),
('Huawei MediaPad T5', 49, '035', 355.30, 'MediaPad T5 10\" Wifi 3+32GB Gold', '035.png', 'En stock', 4, 2, 4),
('Huawei MatePad ', 50, '036', 292.89, 'Tablette Tactile 10,4\"Réseau 4G / LTEAndroid 10.0Résolution 1200 x 2000 pixelsProcesseur Octa-core (2x2.27 GHz Cortex-A76 et 6x1.88 GHz Cortex-A55)Mémoire Interne de 64 Go, Extensible avec carte microSD', '036.png', 'En stock', 4, 2, 4),
('HUAWEI Watch GT 2 Pro Sport', 51, '037', 265.15, 'Montre connectée - Matériaux et finitions haut de gamme - Jusqu\'à 2 semaines d\'autonomie - 100 modes de sport disponibles - Appels en Bluetooth', '037.png', 'En stock', 4, 4, 4),
('HUAWEI Watch GT Active - Orange', 52, '038', 311.27, 'Montre Connectée - GPS - Cardiofréquencemètre - Autonomie moy. 2 sem. - Compatible Android et iOS', '038.png', 'En stock', 4, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int NOT NULL,
  `com_client` varchar(250) NOT NULL,
  `id_note` varchar(3) NOT NULL,
  `id_article` int NOT NULL,
  `id_client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `com_client`, `id_note`, `id_article`, `id_client`) VALUES
(21, 'Bien', '5', 30, 3),
(22, 'NUUUL ', '2', 14, 6),
(23, 'Bien', '4', 1, 8),
(24, 'Très bien', '5', 11, 9),
(25, 'Bof\r\n', '3', 38, 7),
(26, 'NUUUL ', '1', 13, 1),
(27, 'NUUUL ', '2', 31, 1),
(28, 'Très bien', '5', 21, 4),
(29, 'Bien', '4', 14, 6),
(30, 'RAS', '5', 32, 6),
(31, 'NUUUL ', '3', 16, 3),
(32, 'Bien', '4', 21, 8),
(33, 'PARFAIT', '5', 37, 9),
(34, 'RAS', '4', 42, 3),
(35, 'Bien', '4', 13, 5),
(36, 'Bof', '4', 21, 5),
(37, 'Trop NUUUL ', '0', 3, 10),
(38, 'Trop NUUUL ', '0', 1, 10),
(39, 'Bien', '4', 35, 7),
(40, 'Bien', '5', 11, 7),
(41, 'Bof\r\n', '3', 45, 6),
(42, 'RAS', '4', 50, 3),
(43, 'Trop NUUUL ', '0', 47, 10),
(44, 'Bien', '5', 45, 3),
(45, 'Très bien', '5', 51, 9),
(46, 'Bien', '4', 46, 5),
(47, 'Bof', '4', 46, 5),
(48, 'Trop NUUUL ', '0', 51, 10),
(49, 'Très bien', '5', 51, 9),
(50, 'Bien', '4', 47, 8),
(51, 'Bof\r\n', '3', 18, 6),
(52, 'Bien', '4', 41, 8),
(53, 'Bien', '4', 51, 8),
(54, 'Bien', '4', 50, 8),
(55, 'NUUUL ', '2', 50, 6),
(56, 'Très bien', '5', 49, 9),
(57, 'Bien', '4', 38, 8),
(58, 'RAS', '5', 17, 6),
(59, 'Trop NUUUL ', '0', 52, 10),
(60, 'NUUUL ', '2', 12, 6),
(61, 'Bof\r\n', '3', 16, 6),
(62, 'Trop NUUUL ', '0', 50, 10),
(63, 'Bien', '5', 46, 3),
(64, 'Bien', '4', 48, 7),
(65, 'RAS', '5', 48, 6),
(66, 'Très bien', '5', 46, 4),
(67, 'Bof', '4', 21, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int NOT NULL,
  `type_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `type_cat`) VALUES
(1, 'Téléphones Portables'),
(2, 'Tablettes'),
(4, 'Objets Connecté');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `id_telephone` varchar(10) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `id_telephone`, `date_naissance`) VALUES
(1, 'Client essaie 1', 'Client essaie 1', 'blablabla1@gmail.com', '0123456789', '1999-12-06'),
(2, 'Client essaie 2', 'Client essaie 2', 'blablabla2@gmail.com', '0123456789', '1999-12-13'),
(3, 'Client essaie 3', 'Client essaie 3', 'blablabla3@gmail.com', '0123456789', '1999-12-02'),
(4, 'Client essaie 4', 'Client essaie 4', 'blablabla4@gmail.com', '0123456789', '1999-12-31'),
(5, 'Client essaie 5', 'Client essaie 5', 'blablabla5@gmail.com', '0123456789', '1999-12-01'),
(6, 'Client essaie 6', 'Client essaie 6', 'blablabla6@gmail.com', '0123456789', '1998-12-06'),
(7, 'Client essaie 7', 'Client essaie 7', 'blablabla7@gmail.com', '0123456789', '1997-12-06'),
(8, 'Client essaie 8', 'Client essaie 8', 'blablabla8@gmail.com', '0123456789', '1995-12-01'),
(9, 'Client essaie 9', 'Client essaie 9', 'blablabla9@gmail.com', '0123456789', '1991-12-06'),
(10, 'Client essaie 10', 'Client essaie 10', 'blablabla10@gmail.com', '0123456789', '1990-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int NOT NULL,
  `OHR_DATE` date NOT NULL,
  `id_client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concerne_un_article`
--

CREATE TABLE `concerne_un_article` (
  `id_article` int NOT NULL,
  `id_commande` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fou` int NOT NULL,
  `nom_fou` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fou`, `nom_fou`) VALUES
(1, 'WikoFournisseur'),
(2, 'AppleFournisseur'),
(3, 'SamsungFournisseur'),
(4, 'HuaweiFournisseur');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_marques` int NOT NULL,
  `NOM_MARQUE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_marques`, `NOM_MARQUE`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Wiko'),
(4, 'Huawei');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_marques` (`id_marques`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_fou` (`id_fou`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `concerne_un_article`
--
ALTER TABLE `concerne_un_article`
  ADD PRIMARY KEY (`id_article`,`id_commande`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fou`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marques`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fou` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_marques`) REFERENCES `marque` (`id_marques`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_fou`) REFERENCES `fournisseur` (`id_fou`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `concerne_un_article`
--
ALTER TABLE `concerne_un_article`
  ADD CONSTRAINT `concerne_un_article_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `concerne_un_article_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);
--
-- Base de données : `tetete`
--
CREATE DATABASE IF NOT EXISTS `tetete` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `tetete`;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `g_id` int NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `g_mode` varchar(100) NOT NULL,
  `g_published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `g_pegi` int NOT NULL,
  `s_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`g_id`, `g_name`, `g_mode`, `g_published_at`, `g_pegi`, `s_id`) VALUES
(1, 'Halo : Combat Evolved - Anniversary', 'Solo / Multijoueur', '2010-12-31 23:00:00', 16, 1),
(2, 'Halo : The Master Chief Collection', 'Solo / Multijoueur', '2013-12-31 23:00:00', 16, 1),
(3, 'Halo Wars', 'Solo / Multijoueur', '2008-12-31 23:00:00', 16, 18),
(4, 'Halo 4', 'Solo / Multijoueur', '2011-12-31 23:00:00', 16, 1),
(5, 'Alien : Isolation', 'Solo', '2013-12-31 23:00:00', 18, 14),
(6, 'The Witcher : Enhanced Edition', 'Solo', '2007-12-31 23:00:00', 18, 7),
(7, 'The Witcher 2 : Assassins of Kings', 'Solo', '2010-12-31 23:00:00', 18, 7),
(8, 'The Witcher 3 : Wild Hunt - Blood and Wine', 'Solo', '2015-12-31 23:00:00', 18, 7),
(9, 'Overwatch', 'Multijoueur', '2015-12-31 23:00:00', 12, 2),
(10, 'Doom Eternal', 'Solo / Multijoueur', '2019-12-31 23:00:00', 16, 13),
(11, 'Star Wars : Battlefront', 'Solo / Multijoueur', '2003-12-31 23:00:00', 16, 16),
(12, 'The Witcher 3 : Wild Hunt - Hearts of Stone', 'Solo', '2014-12-31 23:00:00', 18, 7),
(13, 'Rocket League', 'Solo / Multijoueur', '2014-12-31 23:00:00', 3, 19),
(14, 'Heroes of the Storm', 'Multijoueur', '2014-12-31 23:00:00', 12, 2),
(15, 'The Witcher 3 : Wild Hunt', 'Multijoueur', '2014-12-31 23:00:00', 18, 7),
(16, 'Assassin\'s Creed : Unity - Dead Kings', 'Solo / Multijoueur', '2013-12-31 23:00:00', 18, 6),
(17, 'Lara Croft and the Temple of Osiris', 'Solo / Multijoueur', '2013-12-31 23:00:00', 12, 9),
(18, 'Assassin\'s Creed : Unity', 'Solo / Multijoueur', '2013-12-31 23:00:00', 16, 6),
(19, 'Watch Dogs', 'Solo / Multijoueur', '2013-12-31 23:00:00', 18, 6),
(20, 'Assassin\'s Creed IV : Black Flag', 'Solo / Multijoueur', '2012-12-31 23:00:00', 18, 6),
(21, 'Battlefield 4', 'Solo / Multijoueur', '2012-12-31 23:00:00', 18, 16),
(22, 'Tomb Raider', 'Solo / Multijoueur', '2014-12-31 23:00:00', 18, 17),
(23, 'Assassin\'s Creed III', 'Solo / Multijoueur', '2011-12-31 23:00:00', 18, 6),
(24, 'Counter-Strike : Global Offensive', 'Solo / Multijoueur', '2011-12-31 23:00:00', 18, 20),
(25, 'Diablo III', 'Solo / Multijoueur', '2011-12-31 23:00:00', 16, 2),
(26, 'Battlefield 3', 'Solo / Multijoueur', '2010-12-31 23:00:00', 18, 16),
(27, 'Portal 2', 'Solo / Coopératif', '2010-12-31 23:00:00', 12, 20),
(28, 'Beyond Good & Evil HD', 'Solo', '2010-12-31 23:00:00', 7, 6),
(29, 'Assassin\'s Creed : Brotherhood', 'Solo / Multijoueur', '2009-12-31 23:00:00', 18, 6),
(30, 'Naruto Shippuden Ultimate Ninja Storm 2', 'Solo / Multijoueur', '2009-12-31 23:00:00', 12, 6),
(31, 'Red Dead Redemption', 'Solo / Multijoueur', '2009-12-31 23:00:00', 18, 5),
(32, 'Grand Theft Auto : Episodes from Liberty City', 'Solo / Multijoueur', '2008-12-31 23:00:00', 18, 5),
(33, 'League of Legends', 'Multijoueur', '2008-12-31 23:00:00', 12, 4),
(34, 'Naruto : The Broken Bond', 'solo / multijoueur', '2023-12-11 12:16:05', 12, 6),
(35, 'Battlefield 3', 'Solo / Multijoueur', '2010-12-31 23:00:00', 18, 16),
(36, 'Portal 2', 'Solo / Coopératif', '2010-12-31 23:00:00', 12, 20),
(37, 'Beyond Good & Evil HD', 'Solo', '2010-12-31 23:00:00', 7, 6),
(38, 'Assassin\'s Creed : Brotherhood', 'Solo / Multijoueur', '2009-12-31 23:00:00', 18, 6),
(39, 'Naruto Shippuden Ultimate Ninja Storm 2', 'Solo / Multijoueur', '2009-12-31 23:00:00', 12, 6),
(40, 'Red Dead Redemption', 'Solo / Multijoueur', '2009-12-31 23:00:00', 18, 5),
(41, 'Grand Theft Auto : Episodes from Liberty City', 'Solo / Multijoueur', '2008-12-31 23:00:00', 18, 5),
(42, 'League of Legends', 'Multijoueur', '2008-12-31 23:00:00', 12, 4),
(43, 'Naruto : The Broken Bond', 'Solo / Multijoueur', '2007-12-31 23:00:00', 18, 6),
(44, 'Gears of War 2', 'Solo / Multijoueur', '2007-12-31 23:00:00', 18, 12),
(45, 'Assassin\'s Creed', 'Solo / Multijoueur', '2007-12-31 23:00:00', 16, 6),
(46, 'Portal', 'Solo', '2006-12-31 23:00:00', 12, 20),
(47, 'Age of Empires III', 'Solo / Multijoueur', '2004-12-31 23:00:00', 12, 18),
(48, 'Need For Speed Underground 2', 'Solo / Multijoueur', '2003-12-31 23:00:00', 3, 11),
(49, 'Cyberpunk 2077', 'Solo / Multijoueur', '2020-09-30 22:00:00', 18, 7);

-- --------------------------------------------------------

--
-- Structure de la table `games_genres`
--

CREATE TABLE `games_genres` (
  `genre_id` int NOT NULL,
  `g_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `games_genres`
--

INSERT INTO `games_genres` (`genre_id`, `g_id`) VALUES
(1, 1),
(1, 2),
(3, 3),
(1, 4),
(1, 5),
(2, 5),
(2, 6),
(5, 6),
(2, 7),
(5, 7),
(2, 8),
(5, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 12),
(5, 12),
(10, 13),
(14, 13),
(11, 14),
(2, 15),
(5, 15),
(2, 16),
(6, 16),
(7, 16),
(2, 17),
(6, 17),
(2, 18),
(6, 18),
(7, 18),
(2, 19),
(6, 19),
(7, 19),
(2, 20),
(6, 20),
(7, 20),
(1, 21),
(2, 22),
(6, 22),
(2, 23),
(6, 23),
(7, 23),
(1, 24),
(4, 25),
(1, 26),
(12, 27),
(2, 28),
(6, 28),
(2, 29),
(6, 29),
(7, 29),
(13, 30),
(2, 31),
(6, 31),
(8, 31),
(9, 31),
(2, 32),
(6, 32),
(8, 32),
(14, 32),
(11, 33),
(2, 34),
(6, 34),
(1, 35),
(2, 36),
(6, 36),
(7, 36),
(2, 37),
(12, 37),
(3, 38),
(14, 39),
(2, 40),
(5, 40);

-- --------------------------------------------------------

--
-- Structure de la table `games_platforms`
--

CREATE TABLE `games_platforms` (
  `p_id` int NOT NULL,
  `g_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `games_platforms`
--

INSERT INTO `games_platforms` (`p_id`, `g_id`) VALUES
(4, 1),
(13, 1),
(14, 1),
(4, 2),
(13, 2),
(14, 2),
(15, 2),
(10, 3),
(13, 3),
(14, 3),
(4, 4),
(13, 4),
(14, 4),
(15, 4),
(2, 5),
(3, 5),
(4, 5),
(6, 5),
(7, 5),
(13, 5),
(14, 5),
(2, 6),
(4, 6),
(4, 7),
(7, 7),
(13, 7),
(14, 7),
(3, 8),
(4, 8),
(7, 8),
(8, 8),
(14, 8),
(15, 8),
(3, 9),
(4, 9),
(7, 9),
(14, 9),
(2, 10),
(3, 10),
(4, 10),
(7, 10),
(9, 10),
(14, 10),
(2, 11),
(4, 11),
(5, 11),
(16, 11),
(4, 12),
(7, 12),
(14, 12),
(2, 13),
(3, 13),
(4, 13),
(7, 13),
(14, 13),
(2, 14),
(4, 14),
(3, 15),
(4, 15),
(14, 15),
(4, 16),
(7, 16),
(14, 16),
(4, 17),
(7, 17),
(14, 17),
(4, 18),
(7, 18),
(14, 18),
(4, 19),
(6, 19),
(7, 19),
(12, 19),
(13, 19),
(14, 19),
(3, 20),
(4, 20),
(6, 20),
(7, 20),
(12, 20),
(13, 20),
(14, 20),
(4, 21),
(6, 21),
(7, 21),
(13, 21),
(14, 21),
(2, 22),
(4, 22),
(7, 22),
(13, 22),
(4, 23),
(7, 23),
(12, 23),
(13, 23),
(2, 24),
(4, 24),
(6, 24),
(13, 24),
(14, 24),
(2, 25),
(3, 25),
(4, 25),
(6, 25),
(7, 25),
(13, 25),
(14, 25),
(4, 26),
(7, 26),
(13, 26),
(2, 27),
(4, 27),
(7, 27),
(13, 27),
(4, 28),
(6, 28),
(13, 28),
(14, 28),
(2, 29),
(4, 29),
(6, 29),
(7, 29),
(13, 29),
(14, 29),
(4, 30),
(6, 30),
(13, 30),
(14, 30),
(6, 31),
(13, 31),
(4, 32),
(6, 32),
(13, 32),
(2, 33),
(4, 33),
(13, 34),
(13, 44),
(14, 44),
(2, 46),
(4, 46),
(6, 46),
(13, 46),
(14, 46),
(2, 47),
(4, 47),
(1, 48),
(4, 48),
(5, 48),
(16, 48),
(4, 49),
(7, 49),
(8, 49),
(14, 49),
(15, 49);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'FPS'),
(2, 'Action'),
(3, 'RTS'),
(4, 'Hack \'n\' slash'),
(5, 'RPG'),
(6, 'Aventure'),
(7, 'Infiltration'),
(8, 'TPS'),
(9, 'GTA'),
(10, 'Football'),
(11, 'MOBA'),
(12, 'Réflexion'),
(13, 'Combat'),
(14, 'Course');

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

CREATE TABLE `platforms` (
  `p_id` int NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `platforms`
--

INSERT INTO `platforms` (`p_id`, `p_name`) VALUES
(1, 'GameCube'),
(2, 'MAC'),
(3, 'Nintendo Switch'),
(4, 'PC'),
(5, 'PlayStation 2'),
(6, 'PlayStation 3'),
(7, 'PlayStation 4'),
(8, 'PlayStation 5'),
(9, 'Stadia'),
(10, 'Steam'),
(11, 'Wii'),
(12, 'Wii U'),
(13, ' Xbox 360'),
(14, 'Xbox One'),
(15, 'Xbox Series X/S'),
(16, 'Xbox');

-- --------------------------------------------------------

--
-- Structure de la table `studios`
--

CREATE TABLE `studios` (
  `s_id` int NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_nationality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `studios`
--

INSERT INTO `studios` (`s_id`, `s_name`, `s_nationality`) VALUES
(1, '343 Industries', 'USA'),
(2, 'Blizzard Entertainment', 'USA'),
(3, 'DICE', 'USA'),
(4, 'Riot Games', 'USA'),
(5, 'Rockstar', 'USA'),
(6, 'Ubisoft', 'France'),
(7, 'CD Projekt', 'Polonais'),
(8, 'Core Design', 'USA'),
(9, 'Crystal Dynamics', 'Japon'),
(10, 'DICE', 'USA'),
(11, 'EA Black Box', 'USA'),
(12, 'Epic Games', 'USA'),
(13, 'id Software', 'USA'),
(14, 'Creative Assembly et Feral Interactive', 'Corée'),
(16, 'DICE', 'USA'),
(17, 'Eidos', 'USA'),
(18, 'Ensemble Studios', 'USA'),
(19, 'Psyonix', 'USA'),
(20, 'Valve Corporation', 'USA'),
(21, 'CD Projekt', 'Pologne'),
(22, 'Larian Studio', 'Belgique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `FK_games_s_id` (`s_id`);

--
-- Index pour la table `games_genres`
--
ALTER TABLE `games_genres`
  ADD PRIMARY KEY (`genre_id`,`g_id`),
  ADD KEY `FK_games_genres_g_id` (`g_id`);

--
-- Index pour la table `games_platforms`
--
ALTER TABLE `games_platforms`
  ADD PRIMARY KEY (`p_id`,`g_id`),
  ADD KEY `FK_games_platforms_g_id` (`g_id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index pour la table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `g_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `p_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `studios`
--
ALTER TABLE `studios`
  MODIFY `s_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `FK_games_s_id` FOREIGN KEY (`s_id`) REFERENCES `studios` (`s_id`);

--
-- Contraintes pour la table `games_genres`
--
ALTER TABLE `games_genres`
  ADD CONSTRAINT `FK_games_genres_g_id` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`),
  ADD CONSTRAINT `FK_games_platforms_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

--
-- Contraintes pour la table `games_platforms`
--
ALTER TABLE `games_platforms`
  ADD CONSTRAINT `FK_games_platforms_g_id` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`),
  ADD CONSTRAINT `FK_games_platforms_p_id` FOREIGN KEY (`p_id`) REFERENCES `platforms` (`p_id`);
--
-- Base de données : `webdevelopment`
--
CREATE DATABASE IF NOT EXISTS `webdevelopment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `webdevelopment`;

-- --------------------------------------------------------

--
-- Structure de la table `frameworks`
--

CREATE TABLE `frameworks` (
  `id` int NOT NULL,
  `framework` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `version` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `frameworks`
--

INSERT INTO `frameworks` (`id`, `framework`, `version`) VALUES
(13, 'Symfony', '2.8'),
(14, 'Symfony', '1.3'),
(15, 'Jquery', '1.6'),
(16, 'Jquery', '2.1');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int NOT NULL,
  `language` varchar(50) NOT NULL,
  `version` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `language`, `version`) VALUES
(1, 'javascript', '5'),
(2, 'PHP', '5.2'),
(3, ' PHP', '5.4'),
(4, 'HTML', '5.1'),
(5, 'JavaScript', '6'),
(6, 'JavaScript', '7'),
(7, 'JavaScript', '8'),
(8, 'PHP', '7');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `frameworks`
--
ALTER TABLE `frameworks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `frameworks`
--
ALTER TABLE `frameworks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
