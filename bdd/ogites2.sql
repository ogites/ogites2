-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 mars 2021 à 19:13
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
-- Structure de la table `connexion_log`
--

CREATE TABLE `connexion_log` (
  `id_connexion` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date_connexion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `connexion_log`
--

INSERT INTO `connexion_log` (`id_connexion`, `id_users`, `date_connexion`) VALUES
(1, 1, '2021-03-21 00:25:20'),
(2, 1, '2021-03-21 00:32:29'),
(3, 1, '2021-03-21 11:10:39'),
(4, 1, '2021-03-21 11:52:45'),
(5, 0, '2021-03-21 11:53:17'),
(6, 1, '2021-03-21 12:23:45'),
(7, 1, '2021-03-21 21:22:39'),
(8, 1, '2021-03-23 08:02:30'),
(9, 1, '2021-03-23 16:04:55'),
(10, 15, '2021-03-23 16:08:06'),
(11, 1, '2021-03-23 16:08:22'),
(12, 15, '2021-03-23 16:08:43'),
(13, 1, '2021-03-24 17:19:49'),
(14, 1, '2021-03-24 17:42:17'),
(15, 1, '2021-03-24 17:45:41'),
(16, 15, '2021-03-24 21:07:40'),
(17, 1, '2021-03-24 21:36:20'),
(18, 15, '2021-03-24 22:18:21'),
(19, 1, '2021-03-25 08:20:15'),
(20, 15, '2021-03-25 10:03:21'),
(21, 0, '2021-03-25 10:03:54'),
(22, 0, '2021-03-25 10:31:59'),
(23, 2, '2021-03-25 11:17:29'),
(24, 1, '2021-03-25 11:56:09'),
(25, 1, '2021-03-25 11:56:48'),
(26, 2, '2021-03-25 11:57:15'),
(27, 0, '2021-03-25 12:00:34');

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
  `etat_message` int(11) NOT NULL DEFAULT 0,
  `date_heure` datetime NOT NULL DEFAULT current_timestamp(),
  `type_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `expediteur`, `destinataire`, `contenu`, `etat_message`, `date_heure`, `type_message`) VALUES
(1, 2, 1, 'test', 1, '2021-03-12 17:14:59', 2),
(2, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, nunc eget fringilla fermentum, metus lorem elementum lectus, sit amet sagittis nisi massa sit amet sem. Vestibulum dui dui, luctus in feugiat at, fermentum sed sapien. Duis non interdum nisl. Praesent ut maximus lectus, in laoreet lacus. Donec rhoncus bibendum gravida. Quisque sit amet eros laoreet est lobortis congue. Phasellus quis accumsan diam. Suspendisse dignissim ultrices ornare. Morbi et hendrerit lorem. Integer eget molestie libero. Cras lacinia mollis egestas.', 1, '2021-03-12 17:14:59', 2),
(3, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, nunc eget fringilla fermentum, metus lorem elementum lectus, sit amet sagittis nisi massa sit amet sem. Vestibulum dui dui, luctus in feugiat at, fermentum sed sapien. Duis non interdum nisl. Praesent ut maximus lectus, in laoreet lacus. Donec rhoncus bibendum gravida. Quisque sit amet eros laoreet est lobortis congue. Phasellus quis accumsan diam. Suspendisse dignissim ultrices ornare. Morbi et hendrerit lorem. Integer eget molestie libero. Cras lacinia mollis egestas.', 1, '2021-03-12 17:14:59', 2),
(4, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, nunc eget fringilla fermentum, metus lorem elementum lectus, sit amet sagittis nisi massa sit amet sem. Vestibulum dui dui, luctus in feugiat at, fermentum sed sapien. Duis non interdum nisl. Praesent ut maximus lectus, in laoreet lacus. Donec rhoncus bibendum gravida. Quisque sit amet eros laoreet est lobortis congue. Phasellus quis accumsan diam. Suspendisse dignissim ultrices ornare. Morbi et hendrerit lorem. Integer eget molestie libero. Cras lacinia mollis egestas.', 1, '2021-03-12 17:14:59', 2),
(5, 1, 2, 'test envoi', 1, '2021-03-14 21:00:15', 2),
(6, 1, 2, 'test requete', 1, '2021-03-15 02:06:58', 2),
(13, 1, 2, 'nouveau test', 1, '2021-03-15 02:23:37', 2),
(14, 1, 2, 'ça fonctionne !!!!', 1, '2021-03-15 02:23:45', 2),
(15, 1, 2, 'super', 1, '2021-03-15 02:23:50', 2),
(16, 1, 2, 'test factorisation', 1, '2021-03-16 01:40:09', 2),
(17, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, nunc eget fringilla fermentum, metus lorem elementum lectus, sit amet sagittis nisi massa sit amet sem. Vestibulum dui dui, luctus in feugiat at, fermentum sed sapien. Duis non interdum nisl. Praesent ut maximus lectus, in laoreet lacus. Donec rhoncus bibendum gravida. Quisque sit amet eros laoreet est lobortis congue. Phasellus quis accumsan diam. Suspendisse dignissim ultrices ornare. Morbi et hendrerit lorem. Integer eget molestie libero. Cras lacinia mollis egestas.', 1, '2021-03-16 11:50:46', 2),
(18, 1, 2, 'ouebrgçzrbgçzurbgzirubgzg', 1, '2021-03-16 12:18:27', 2),
(19, 1, 2, 'test 2', 1, '2021-03-20 22:49:11', 2),
(20, 1, 0, 'bonjour', 1, '2021-03-21 11:19:59', 2),
(21, 1, 2, 'test encore', 1, '2021-03-21 11:35:10', 2),
(22, 0, 1, 'salut', 1, '2021-03-21 12:23:35', 2),
(23, 1, 0, 'Comment allez vous ?', 1, '2021-03-24 21:38:10', 2),
(24, 1, 2, 'merci beaucoup !', 1, '2021-03-24 21:39:57', 2);

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
(5, 'Carre Royal', '2021-02-16', '2021-02-22', 4, '2021-02-01', 4, 1, 1),
(6, 'ALPINA', '2021-03-10', '2021-04-08', 2, '2021-01-31', 5, 1, 1),
(18, 'La Koumbala', '2021-03-25', '2021-03-31', 1, '2021-03-25', 2, 0, 0);

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
(0, 'ogitesteam', 'ogites', 'team', 'admin@ogites.com', 0, '$2y$10$jMj4q6ixnUGtRWiMt//PfujKgSjMw7UOPg.ft0M7zdBb1z2LJeK.2', '2021-03-20', 1),
(1, 'kanjo', 'Kancel', 'Jonathan', 'kanjo@gmail.com', 0, '$2y$10$2e/c6FDXOKJ9rVntAayRwuwjTz0CJmVguGq5FtPV0FYZmZWbzOlMG', '2021-01-16', 1),
(2, 'ygt', 'GOUPTAR-TICKET', 'Yanissa', 'ygt@gmail.com', 0, '$2y$10$KZwNpEcUQWUpsm42B2UNIuXKWy.qisiANJUdZqbB3etSzhSAkz5iS', '2021-01-24', 2),
(15, 'ogitesproprio', 'ogites', 'proprio', 'ogitesproprio@gmail.com', 690161010, '$2y$10$Iwn.0h.RwiM/bxt0eP/MGeh.pKelN4JXxO8oCVAFSsXTD1dTl7Npe', '2021-03-23', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `connexion_log`
--
ALTER TABLE `connexion_log`
  ADD PRIMARY KEY (`id_connexion`);

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
-- AUTO_INCREMENT pour la table `connexion_log`
--
ALTER TABLE `connexion_log`
  MODIFY `id_connexion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `gites`
--
ALTER TABLE `gites`
  MODIFY `id_gites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `images_gites`
--
ALTER TABLE `images_gites`
  MODIFY `id_images_gites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `type_message`
--
ALTER TABLE `type_message`
  MODIFY `id_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
