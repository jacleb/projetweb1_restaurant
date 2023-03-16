-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 déc. 2022 à 04:42
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pub_g4`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Entrées'),
(2, 'Repas'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dishes`
--

INSERT INTO `dishes` (`id`, `title`, `description`, `price`, `category_id`) VALUES
(1, 'Salade du jour', 'Fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 10.99, 1),
(2, 'Potage du moment', 'Fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 8.99, 1),
(3, 'Ailes de lapin', 'Ut interdum viverra lacinia. Pellentesque ac nunc a nulla rutrum dictum ac ac diam. Cras vel justo ligula.  Proin ut ex et elit dapibus tempus vitae vitae magna. Nam a arcu sed ante efficitur semper.', 16.4, 1),
(4, 'Calamar', 'Proin ut ex et elit dapibus tempus vitae vitae magna. Nam a arcu sed ante efficitur semper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 16.99, 1),
(5, 'Nachos', 'Nunc et ipsum ut nisl ultricies fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 18.99, 1),
(6, 'Poutine', 'Morbi tincidunt fermentum lacinia. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 14.99, 1),
(7, 'Burger double classique avec frites', 'Deux galettes de bœuf, cheddar, bacon, tomate, laitue romaine, ognon rouge, sauce maison, servi avec frites.', 15.99, 2),
(8, 'Filets de poulet avec frites', 'Filets de poulet pané avec un mélange d’épices maison, servis avec frites.', 13.99, 2),
(9, 'Burger au poulet', 'Morbi tincidunt fermentum lacinia. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi.', 15.99, 2),
(10, 'Salade grecque', 'Donec at nisi tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. In vitae rutrum arcu.', 18.99, 2),
(11, 'Salade végétarienne', 'Donec et neque quis purus cursus mattis eu pulvinar velit. Praesent commodo rutrum nisl, at ultrices sem iaculis tincidunt. Nunc molestie accumsan porta.', 14.99, 2),
(12, 'Tartare de boeuf', 'Proin faucibus quam lorem, non condimentum turpis blandit non.', 24.99, 2),
(13, 'Tartare de légume', 'Etiam ut tincidunt lectus. Curabitur gravida est in finibus ultricies. Vestibulum volutpat erat vel libero ultrices placerat.', 22.99, 2),
(14, 'Côtes levées (Ribs)', 'Etiam dictum purus justo, at mattis justo bibendum in. In aliquam elementum enim, quis pretium purus efficitur ac. Curabitur in pretium leo.', 19.99, 2),
(15, 'Un bon p\'tit steak', 'Praesent aliquam a dolor eu rutrum. Sed at efficitur enim. Morbi quis placerat risus. Aenean ipsum massa, hendrerit eu molestie sit amet, mollis quis ante. ', 14.99, 2),
(16, 'Brownie', 'Vestibulum vel ex dolor. Maecenas et turpis nibh. Aliquam in imperdiet tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 7.99, 3),
(17, 'Cupcake style ferrero', 'Suspendisse id fringilla turpis. Aenean eleifend vulputate lacus, a pharetra metus. Sed eget pharetra sem. Proin tristique fringilla urna id pharetra. Vivamus sed pellentesque orci.', 8.99, 3),
(18, 'Gâteau au fromage et caramel', 'Proin tristique fringilla urna id pharetra. Vivamus sed pellentesque orci.', 10.99, 3);

-- --------------------------------------------------------

--
-- Structure de la table `dishes_sub-categories`
--

CREATE TABLE `dishes_sub-categories` (
  `id` int(11) NOT NULL,
  `dish_id` int(11) DEFAULT NULL,
  `sub-category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dishes_sub-categories`
--

INSERT INTO `dishes_sub-categories` (`id`, `dish_id`, `sub-category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 4),
(6, 6, 1),
(7, 7, 5),
(8, 8, 2),
(9, 9, 5),
(10, 10, 6),
(11, 11, 6),
(12, 11, 7),
(13, 12, 8),
(14, 12, 2),
(15, 13, 8),
(16, 13, 7),
(17, 14, 2),
(18, 15, 2),
(19, 16, 9),
(20, 17, 9),
(21, 18, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sub-categories`
--

CREATE TABLE `sub-categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sub-categories`
--

INSERT INTO `sub-categories` (`id`, `name`) VALUES
(1, 'Nos créations'),
(2, 'Viande'),
(3, 'Poisson'),
(4, 'À partager'),
(5, 'Burger'),
(6, 'Salade'),
(7, 'Végé'),
(8, 'Tartare'),
(9, 'Chocolat'),
(10, 'Caramel');

-- --------------------------------------------------------

--
-- Structure de la table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, '0819696@cstj.qc.ca');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `account_creation_date`) VALUES
(1, 'Gaston', 'Leclient', 'gaston@pubg4.com', '$2y$10$JVUkXb9pe4B0EgDFq2ET6eFsZmcVJG/H5XjNd5EAW/cw81fRunboy', '2022-12-13 15:40:51'),
(2, 'Jacqueline', 'Lebel', 'jacqueline.lebel@pubg4.com', '$2y$10$JVUkXb9pe4B0EgDFq2ET6eFsZmcVJG/H5XjNd5EAW/cw81fRunboy', '2022-12-13 15:40:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`category_id`);

--
-- Index pour la table `dishes_sub-categories`
--
ALTER TABLE `dishes_sub-categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_id` (`dish_id`),
  ADD KEY `sub-categories_id` (`sub-category_id`);

--
-- Index pour la table `sub-categories`
--
ALTER TABLE `sub-categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `dishes_sub-categories`
--
ALTER TABLE `dishes_sub-categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `sub-categories`
--
ALTER TABLE `sub-categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dishes_sub-categories`
--
ALTER TABLE `dishes_sub-categories`
  ADD CONSTRAINT `dishes_sub-categories_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dishes_sub-categories_ibfk_2` FOREIGN KEY (`sub-category_id`) REFERENCES `sub-categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
