-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 12 Décembre 2018 à 16:21
-- Version du serveur :  5.5.60-0+deb8u1
-- Version de PHP :  7.0.32-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rest`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
`id` int(10) unsigned NOT NULL,
  `message` longtext COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `message`, `date`, `users_id`, `menu_id`) VALUES
(1, 'ho', '2018-12-12', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` longtext COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `complete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `name`, `message`, `date`, `complete`) VALUES
(1, 'ffsdfsd@fsfsdsf', 'Tuning Jacky', 'coucou', '2018-12-12 16:00:22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `desc`, `price`, `image`) VALUES
(1, 'New Orleans Xxl', 'Le burger NEW ORLEANS XXL\r\n - 3 Steaks hachés viande bovine française \r\n - Oignons frais grillés\r\n - Salade\r\n - Sauce pimentée', 7.99, 'https://www.speed-burger.com/images/330x330/carte_articles/burger_sandwiches/burger-new-orleans-detail.png'),
(2, 'Fish And Chips', 'Le burger FISH AND CHIPS\r\n - 2 Aiguillettes de cabillaud croustillantes\r\n - Galette de pommes de terre \r\n - Double cheddar fondu\r\n - Tomates fraîches\r\n - Salade\r\n - Sauce béarnaise', 10.99, 'https://www.speed-burger.com/images/330x330/carte_articles/burger_sandwiches/burger-fish-and-chips-detail.png'),
(3, 'Pepper', 'Le burger PEPPER \r\n - 2 Steaks hachés viande bovine française \r\n - Double cheddar fondu\r\n - Tomates fraîches\r\n - Sauce poivre', 4.99, 'https://www.speed-burger.com/images/330x330/carte_articles/avril_2016/speed_burger_burger_pepper_detail_0104.png'),
(4, 'Buffalo', 'Le burger BUFFALO\r\n - 2 Steaks hachés viande bovine française \r\n - Bacon\r\n - Double cheddar fondu\r\n - Salade\r\n - Tomates fraîches\r\n - Sauce tartare', 14.99, 'https://www.speed-burger.com/images/330x330/carte_articles/burger_sandwiches/burger-buffalo-detail.png');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `number` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `users_id`, `menu_id`, `number`, `date`) VALUES
(1, 1, 2, 10, '2018-12-15'),
(2, 1, 4, 23, '2018-12-20'),
(3, 1, 1, 1, '2018-12-12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT 'GUEST',
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `email`, `password`, `postal`, `birthday`, `phone`, `permission`, `lastname`) VALUES
(1, 'ADMIN', 'admin@central-burger.ml', '21232f297a57a5a743894a0e4a801fc3', 'rue admin', '1974-08-06', '0388999360', 'ADMIN', ''),
(2, 'GUEST', 'users@gmail.com', 'dcaa6e60155776107c638af755498759', '10 rue de la croix', '1995-06-14', '0689658520', 'GUEST', 'I''m a');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `fk_user__id` (`users_id`), ADD KEY `fk_menu__id` (`menu_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`id`,`users_id`,`menu_id`), ADD KEY `id` (`id`,`users_id`,`menu_id`), ADD KEY `fk_user_id` (`users_id`), ADD KEY `fk_menuid` (`menu_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
ADD CONSTRAINT `fk_menu__id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user__id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
ADD CONSTRAINT `fk_menuid` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
