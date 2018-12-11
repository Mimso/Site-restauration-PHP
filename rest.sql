-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 déc. 2018 à 11:47
-- Version du serveur :  5.6.12-log
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rest`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` longtext COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `desc`, `price`, `image`) VALUES
(1, 'Double Cheese', 'http://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpg', 7.9, 'http://localhost:8090/restaurant/resources/images/carousel.1.jpg'),
(2, 'Double Cheese', 'http://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpg', 7.9, 'http://localhost:8090/restaurant/resources/images/carousel.1.jpg'),
(3, 'Double Cheese', 'http://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpghttp://localhost:8090/restaurant/resources/images/carousel.1.jpg', 7.9, 'http://localhost:8090/restaurant/resources/images/carousel.1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `number` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `users_id`, `menu_id`, `number`, `date`) VALUES
(1, 3, 1, 2, '2018-12-07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT 'GUEST',
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `email`, `password`, `postal`, `birthday`, `phone`, `permission`, `lastname`) VALUES
(3, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'test', '1999-05-23', 'test', 'ADMIN', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`,`users_id`,`menu_id`),
  ADD KEY `id` (`id`,`users_id`,`menu_id`),
  ADD KEY `fk_user_id` (`users_id`),
  ADD KEY `fk_menuid` (`menu_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_menuid` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
