-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 jan. 2021 à 23:32
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ogites2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `libelle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `gites`
--

CREATE TABLE `gites` (
  `id_gites` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `description` text NOT NULL,
  `localisation` text NOT NULL,
  `link_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gites`
--

INSERT INTO `gites` (`id_gites`, `libelle`, `description`, `localisation`, `link_url`) VALUES
(1, 'Villa Bagatelle', 'Gîte à Sainte-Rose', 'Sainte-Rose', 'https://www.gites.fr/gites_villa-bagatelle_sainte-rose_46386.htm'),
(2, 'La Koumbala', 'Gîtes à Bouillante', 'Bouillante', 'https://www.gites.fr/gites_la-koumbala_bouillante_58031.htm'),
(3, 'Gîte Bois-Cannelle', 'Gîte à Deshaies', 'Deshaies', 'https://www.booking.com/hotel/gp/gite-bois-cannelle.fr.html'),
(4, 'Carre Royal', 'Gîte à Deshaies', 'Deshaies', 'https://www.booking.com/hotel/gp/carre-royal.fr.html?label=gen173nr-1FCAMYgwQoWkIIZGVzaGFpZXNIDVgEaFqIAQGYAQ24ARfIAQzYAQHoAQH4AQKIAgGoAgO4ApCAhv4FwAIB0gIkNTE2NTEzYTEtOWZkOC00NzIwLWFiMGUtN2NhYThiNTk1MzYz2AIF4AIB;sid=ac06ad128edb29b74d8164fe58ead413'),
(5, 'ALPINA', 'Gîte à Petit-Bourg', 'Petit-Bourg', 'https://www.gites-de-france.com/fr/guadeloupe/guadeloupe/alpinia-971g4411'),
(6, 'La Roseraie', 'Gîte au Lamentin', 'Lamentin', 'https://www.gites-de-france.com/fr/guadeloupe/guadeloupe/la-roseraie-971g4041');

-- --------------------------------------------------------

--
-- Structure de la table `images_gites`
--

CREATE TABLE `images_gites` (
  `id_images_gites` int(11) NOT NULL,
  `libelle` int(11) NOT NULL,
  `id_gites` int(11) NOT NULL,
  `link_url` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_gites` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `mdp` text NOT NULL,
  `date_inscription` date NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo`, `nom`, `prenom`, `email`, `mdp`, `date_inscription`, `id_categorie`) VALUES
(1, 'kanjo', 'Kancel', 'Jonathan', 'kanjo@gmail.com', '$2y$10$2e/c6FDXOKJ9rVntAayRwuwjTz0CJmVguGq5FtPV0FYZmZWbzOlMG', '2021-01-16', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `gites`
--
ALTER TABLE `gites`
  ADD PRIMARY KEY (`id_gites`);

--
-- Index pour la table `images_gites`
--
ALTER TABLE `images_gites`
  ADD PRIMARY KEY (`id_images_gites`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `gites`
--
ALTER TABLE `gites`
  MODIFY `id_gites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `images_gites`
--
ALTER TABLE `images_gites`
  MODIFY `id_images_gites` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
