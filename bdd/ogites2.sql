-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 mars 2021 à 16:46
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
(2, 'Client'),
(3, 'Propriétaire');

-- --------------------------------------------------------

--
-- Structure de la table `gites`
--

CREATE TABLE `gites` (
  `id_gites` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `description` text NOT NULL,
  `localisation` text NOT NULL,
  `link_url` text NOT NULL,
  `nb_personnes_max` int(11) NOT NULL,
  `prix_nuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gites`
--

INSERT INTO `gites` (`id_gites`, `createur`, `libelle`, `description`, `localisation`, `link_url`, `nb_personnes_max`, `prix_nuit`) VALUES
(1, 0, 'Villa Bagatelle', 'Gîte à Sainte-Rose', 'Sainte-Rose', 'https://www.gites.fr/gites_villa-bagatelle_sainte-rose_46386.htm', 3, 0),
(2, 0, 'La Koumbala', 'Gîtes à Bouillante', 'Bouillante', 'https://www.gites.fr/gites_la-koumbala_bouillante_58031.htm', 2, 0),
(3, 0, 'Gîte Bois-Cannelle', 'Gîte à Deshaies', 'Deshaies', 'https://www.booking.com/hotel/gp/gite-bois-cannelle.fr.html', 4, 0),
(4, 0, 'Carre Royal', 'Gîte à Deshaies', 'Deshaies', 'https://www.booking.com/hotel/gp/carre-royal.fr.html?label=gen173nr-1FCAMYgwQoWkIIZGVzaGFpZXNIDVgEaFqIAQGYAQ24ARfIAQzYAQHoAQH4AQKIAgGoAgO4ApCAhv4FwAIB0gIkNTE2NTEzYTEtOWZkOC00NzIwLWFiMGUtN2NhYThiNTk1MzYz2AIF4AIB;sid=ac06ad128edb29b74d8164fe58ead413', 7, 0),
(5, 0, 'ALPINA', 'Gîte à Petit-Bourg', 'Petit-Bourg', 'https://www.gites-de-france.com/fr/guadeloupe/guadeloupe/alpinia-971g4411', 3, 0),
(6, 0, 'La Roseraie', 'Gîte au Lamentin', 'Lamentin', 'https://www.gites-de-france.com/fr/guadeloupe/guadeloupe/la-roseraie-971g4041', 2, 0),
(7, 0, 'Bungalow à Grande Anse', 'Bungalow piscine privée à 900 m de Grande Anse', 'Deshaies', 'https://www.airbnb.fr/rooms/35685092?source_impression_id=p3_1611441404_Mw45FipKMopzq%2Bln&guests=1&adults=1', 10, 0),
(11, 0, 'Studio vue sur mer', 'Studio vue mer, accès direct plage', 'Gosier', 'https://www.cybevasion.fr/gites-studio-vue-mer-les-pieds-dans-l-eau-acces-direct-plage-le-gosier-e59559.html', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `images_gites`
--

CREATE TABLE `images_gites` (
  `id_images_gites` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `id_gites` int(11) NOT NULL,
  `link_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images_gites`
--

INSERT INTO `images_gites` (`id_images_gites`, `libelle`, `id_gites`, `link_url`) VALUES
(1, '', 7, 'https://a0.muscache.com/im/pictures/789dde0a-050d-4f44-997a-df8df428c387.jpg?im_w=1200'),
(2, '', 7, 'https://a0.muscache.com/im/pictures/bbb3c78c-9c32-4c25-81f1-95dd81011d80.jpg?im_w=720'),
(3, '', 7, 'https://a0.muscache.com/im/pictures/7607b93f-1f83-4013-a35c-0d1181e4c271.jpg?im_w=720'),
(4, '', 4, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/145580953.webp?k=faff4834186fa9b2fe3998f3cf02d3f5ec8414ab5702baa511c03421cbbb24fc&o='),
(5, '', 4, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/145419903.webp?k=41e1b175743d54ade8b762ee5550462eba51354a29031b05b89036bf821793b5&o='),
(6, '', 4, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/145418641.webp?k=70c0048cf7ed664b203bda65cbbdc678a6f1b41dfe4c9e9a4a9efeb4a4fc95e8&o='),
(7, '', 3, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/228437146.webp?k=3f76c22fc0ab454ff7e73b2be63b9c82bbfef562eb8d8efb1da0aace03060b8f&o='),
(8, '', 3, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/228437239.webp?k=edea5e98764dfc5a109b5997335e20be5f567abac4cc9f68b570bcb03779466a&o='),
(9, '', 3, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/228437297.webp?k=155ab7f20dbf35748ecfaa5aef229e262efee974c0157ed4c7720b644585f33f&o='),
(10, '', 6, 'https://www.gites-de-france.com/sites/default/files/styles/v2_width_1140/public/images/411977/411977-0_4041_65345d405383a247fb4f9d2b141f7977.jpg?itok=ZsHCseOC'),
(13, '', 7, 'https://a0.muscache.com/im/pictures/1ddb10d3-c3b6-409a-b61b-0fa94d34ebbf.jpg?im_w=1440'),
(14, '', 7, 'https://a0.muscache.com/im/pictures/221333e9-3559-4088-ac1b-591e0d2d6a16.jpg?im_w=1440'),
(15, '', 1, 'https://www.cybevasion.fr/thumb/500x375/gites/france/97/46386_572175_7.jpg'),
(16, '', 2, 'https://www.cybevasion.fr/thumb/500x375/gites/france/97/58031_771325_32.jpg'),
(17, '', 5, 'https://www.gites-de-france.com/sites/default/files/styles/gallery/public/images/412005/412005-12_4411_8948765f39744fa20fa896c870d62897.jpg?itok=MQlmwHMu'),
(18, '', 0, 'https://www.cybevasion.fr/thumb/500x375/gites/france/97/59559_812340_33.jpg'),
(19, '', 11, 'https://www.cybevasion.fr/thumb/500x375/gites/france/97/59559_812340_33.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `etat_message` int(11) NOT NULL
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
  `nb_personnes` int(11) NOT NULL,
  `date_reserv` date DEFAULT NULL,
  `id_gites` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `etat_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `libelle`, `date_debut`, `date_fin`, `nb_personnes`, `date_reserv`, `id_gites`, `id_users`, `etat_reservation`) VALUES
(5, 'Carre Royal', '2021-02-16', '2021-02-22', 4, '2021-02-01', 4, 1, 0),
(6, 'ALPINA', '2021-03-10', '2021-04-08', 2, '2021-01-31', 5, 1, 0),
(7, 'Villa Bagatelle', '2021-02-16', '2021-02-24', 2, '2021-02-01', 1, 1, 0),
(8, 'Villa Bagatelle', '2021-03-12', '2021-03-31', 2, '2021-03-04', 1, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_message`
--

CREATE TABLE `type_message` (
  `id_tm` int(11) NOT NULL,
  `libelle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_message`
--

INSERT INTO `type_message` (`id_tm`, `libelle`) VALUES
(1, 'notification'),
(2, 'message'),
(3, 'message_admin');

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
  `tel` int(11) NOT NULL,
  `mdp` text NOT NULL,
  `date_inscription` date NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo`, `nom`, `prenom`, `email`, `tel`, `mdp`, `date_inscription`, `id_categorie`) VALUES
(1, 'kanjo', 'Kancel', 'Jonathan', 'kanjo@gmail.com', 0, '$2y$10$2e/c6FDXOKJ9rVntAayRwuwjTz0CJmVguGq5FtPV0FYZmZWbzOlMG', '2021-01-16', 1),
(2, 'ygt', 'GOUPTAR-TICKET', 'Yanissa', 'ygt@gmail.com', 0, '$2y$10$KZwNpEcUQWUpsm42B2UNIuXKWy.qisiANJUdZqbB3etSzhSAkz5iS', '2021-01-24', 1),
(3, 'oren', 'COLAT', 'Oren', 'oren@gmail.com', 0, '$2y$10$.J71NpOO3DG5dOkBG/tojeacwGWwOaLeXwlkE.meXuMoT0EiPMvGS', '2021-03-04', 1),
(4, 'le_rich', 'BIANAY', 'Elrich', 'elrich@gmail.com', 0, '$2y$10$4kuC0yiO26vXy1pZiKdKc.vLQTBd04LwDHyixXaHEOtuxTjE/g902', '2021-03-04', 1),
(5, 'nugget', 'COUVIN', 'Quetsiah', 'quetsiah@gmail.com', 0, '$2y$10$ENlcPxMWjcaXs0HujYyzgOuhX6U0NeslK.2dK2nV3zRWqJjkRH2wK', '2021-03-04', 1),
(6, 'jolo', 'JOLO', 'Jonaël', 'jonael@gmail.com', 0, '$2y$10$bRVEEvEQcVbgVk3cPX4RfeFut0dPwvwBWOvJPX8NBIhyu9nkNYle6', '2021-03-04', 1);

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
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `type_message`
--
ALTER TABLE `type_message`
  ADD PRIMARY KEY (`id_tm`);

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
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `gites`
--
ALTER TABLE `gites`
  MODIFY `id_gites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `images_gites`
--
ALTER TABLE `images_gites`
  MODIFY `id_images_gites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_message`
--
ALTER TABLE `type_message`
  MODIFY `id_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
