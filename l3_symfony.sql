-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 déc. 2021 à 09:50
-- Version du serveur :  5.7.31
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `l3_symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact_ticket`
--

DROP TABLE IF EXISTS `contact_ticket`;
CREATE TABLE IF NOT EXISTS `contact_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id_id` int(11) NOT NULL,
  `admin_id_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7329A2269CCBE9A` (`author_id_id`),
  KEY `IDX_7329A22DF6E65AD` (`admin_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additionnal_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEEA76ED395` (`user_id`),
  KEY `IDX_E52FFDEE5D83CC1` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
CREATE TABLE IF NOT EXISTS `orders_product` (
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`orders_id`,`product_id`),
  KEY `IDX_223F76D6CFFE9AD6` (`orders_id`),
  KEY `IDX_223F76D64584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8DF675F31B` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `author_id`, `updated_at`, `image`, `content`, `title`, `date`, `slug`) VALUES
(1, 1, '2021-12-06 09:36:08', '61add988c7c66730785397.jpg', 'Salut les écolos curieux.ses 🌿\r\nVous avez envie de sortir et de faire une bonne action ?\r\nRendez-vous samedi 5 Juin pour une clean walk (nettoyage collectif de déchets) dans les bois du parc Grandmont 🌲 et au quartier Monjoyeux.\r\nLe lien d\'inscription est disponible dans notre bio insta.\r\nOn espère vous y voir nombreux.ses', 'Clean Walk', '2021-12-06', 'Clean-Walk'),
(2, 1, '2021-12-06 09:37:44', '61add9e8d49d9711022937.jpg', 'Bonjour les écolos curieux.ses 🌿\r\n\r\nOn organise notre assemblée générale le mercredi 22 septembre à 18h20 à la MDE (Parc de Grandmont, 1 Rue d\'Arsonval, 37200 Tours).\r\n\r\nOn va parler des projets en cours et de ceux à venir puis élire le nouveau bureau 👨‍💼👩‍💼\r\n\r\nAlors si tu es intéressé.e pour nous rejoindre en tant qu\'adhérant ou membre du bureau (president.e, trésorièr.e, secrétaire, etc) (on cherche du monde) ou simplement participer à la réunion n\'hésite pas à venir 😊', 'Assemblée générale', '2021-12-06', 'Assemblee-generale'),
(3, 1, '2021-12-06 09:38:44', '61adda2493626530591952.jpg', 'Bonjour à tout.e.s ! 🌿\r\n\r\nNous voulions vous parler d\'un projet dont l\'APNE est à l’origine : Ecosia on Tours.\r\n\r\nMais 2 questions se posent :\r\nQu’est-ce qu’Ecosia ?\r\nPourquoi l’installer à l’université ?\r\n\r\nEcosia est une extension de moteur de recherche gratuite qui finance la plantation d’arbres grâce à vos clics. Elle ne revend pas vos données à des tiers et garantie leur protection.\r\nEcosia on Campus, qui regroupe déjà 65 établissements européens d\'études supérieures dont l\'université d\'Angers a pour but de faire en sorte que les ordinateurs de ces établissements passent de Chrome, Firefox, etc... à Ecosia, afin de lutter contre la déforestation.\r\nL\'objectif serait en effet qu\'Ecosia soit mis par défaut sur tous les ordinateurs de la faculté de Tours.\r\nMais pour quelles raisons ? 🤔\r\nPlanter des arbres en ne changeant pas nos habitudes, c’est cool ! Et connaître le nombre d’arbres financés, c’est encore mieux ! Tous les ordinateurs de Tours seraient connectés à un compteur permettant de savoir combien d\'arbres ont été plantés grâce à vous ! 🌳\r\nC\'est un projet qui nous tient à cœur, et vous pourrez vous aussi faire une bonne action à chaque fois que vous ferez des recherches sur les ordinateurs de l\'université ! 🖥️\r\n\r\nSi vous soutenez ce projet, n\'hésitez pas à partager / commenter / liker ce post un maximum, car votre soutien permettra à ce que ce projet ait plus de chances de passer ! ✔️ Cela fait office de campagne !\r\nPlus vous serez nombreux et plus l’université sera Verte.\r\n\r\nPortez-vous bien !', 'Ecosia on Tours', '2021-12-06', 'Ecosia-on-Tours'),
(4, 1, '2021-12-06 09:39:56', '61adda6cd545f413549570.jpg', 'Bon réveillon et joyeuses fêtes les petits écolos curieux.se.s !!', 'Joyeuses fêtes !', '2021-12-06', 'Joyeuses-fetes'),
(5, 1, '2021-12-06 09:40:56', '61addaa80a6dc629892839.jpg', 'Changement horraire jeudi 9 à 15h45 ⚠️\r\nBonne rentrée les écolos curieux.ses 🌿\r\n\r\nOn se retrouve en douceurs avec des ateliers jardinage pour profiter des derniers jours d\'été ☀️\r\n\r\n• Jeudi 9 septembre : Nettoyer le jardin entre étudiant.es pour le rendre plus joli\r\n• Jeudi 23 septembre : Meryl Septier, paysagiste et jardinière, sera présente pour nous apprendre à s\'occuper d\'un jardin grâce à des bases de permaculture 🍅', 'Atelier Jardinage', '2021-12-06', 'Atelier-Jardinage');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `updated_at`, `image`, `name`, `price`, `description`, `slug`) VALUES
(1, '2021-12-06 09:43:56', '61addb5ce03fb688196556.jpg', 'Pelle', '10.00', 'Outil constitué d’une plaque mince, généralement en métal, avec ou sans rebords et souvent courbe et dont l’extrémité peut être plus ou moins arrondie, muni d’un manche en bois plus ou moins long. Cet outil est utilisé pour déplacer de la terre, du sable, des gravillons, de la neige, du charbon… ou pour remuer des matières pâteuses comme la boue, le mortier….', 'Pelle'),
(2, '2021-12-06 09:45:35', '61addbbfa2238758179237.jpg', 'Terre', '999.00', 'Terre crue, ou matériau terre, sont les termes utilisés pour désigner la terre, utilisée avec peu de transformations, en tant que matériau. Le terme terre crue permet surtout de marquer la différence avec la terre cuite.\r\n\r\nLivré à la tonne.', 'Terre'),
(3, '2021-12-06 09:47:23', '61addc2be4f8c941115085.jpg', 'Eau', '1.00', 'L\'eau est une substance chimique constituée de molécules H2O. Ce composé, très stable, mais aussi très réactif, est un excellent solvant à l\'état liquide. Dans de nombreux contextes, le terme eau est employé au sens restreint d\'eau à l\'état liquide, ou pour désigner une solution aqueuse diluée (eau douce, eau potable, eau de mer, eau de chaux, etc.). \r\n\r\nLivré en bouteille de 10cl.', 'Eau'),
(4, '2021-12-06 09:48:47', '61addc7f9daa5429061984.jpg', 'Electricité', '50.00', 'L’électricité est l\'ensemble des phénomènes physiques associés à la présence et au mouvement de la matière qui possède une propriété de charge électrique. L\'électricité est liée au magnétisme, les deux faisant partie du phénomène de l\'électromagnétisme, tel que décrit par les équations de Maxwell. Divers phénomènes courants sont liés à l\'électricité, notamment la foudre, l\'électricité statique, le chauffage électrique, les décharges électriques. \r\n\r\nLivré également en petite bouteille.', 'Electricite');

-- --------------------------------------------------------

--
-- Structure de la table `product_quantity`
--

DROP TABLE IF EXISTS `product_quantity`;
CREATE TABLE IF NOT EXISTS `product_quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_54437CA14584665A` (`product_id`),
  KEY `IDX_54437CA1CFFE9AD6` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `state_keys`
--

DROP TABLE IF EXISTS `state_keys`;
CREATE TABLE IF NOT EXISTS `state_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_def` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `name`, `phone_number`) VALUES
(1, 'admin@admin.admin', '[\"ROLE_ADMIN\"]', '$2y$13$gaLOIzAJuGv4lNpnxKDGPuL7.oWk1VBufZMyBjQN4SZGWeuafgHpm', 'Admin', 'admin', 123456789);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact_ticket`
--
ALTER TABLE `contact_ticket`
  ADD CONSTRAINT `FK_7329A2269CCBE9A` FOREIGN KEY (`author_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_7329A22DF6E65AD` FOREIGN KEY (`admin_id_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE5D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state_keys` (`id`),
  ADD CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `orders_product`
--
ALTER TABLE `orders_product`
  ADD CONSTRAINT `FK_223F76D64584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_223F76D6CFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8DF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD CONSTRAINT `FK_54437CA14584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_54437CA1CFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
