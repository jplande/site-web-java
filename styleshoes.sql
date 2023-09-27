-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 10 Mai 2021 à 19:56
-- Version du serveur :  10.3.23-MariaDB-0+deb10u1
-- Version de PHP :  7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `styleshoes`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_sess` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_email`, `adm_password`, `adm_sess`) VALUES
(1, 'admin@test.fr', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(255) NOT NULL,
  `cat_nom` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_nom`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(4, 'Puma'),
(6, 'Vans');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `cli_id` int(255) NOT NULL,
  `cli_email` varchar(255) NOT NULL,
  `cli_password` varchar(2000) NOT NULL,
  `cli_numberphone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `com_id` int(255) NOT NULL,
  `com_cli_id` int(255) NOT NULL,
  `com_etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `pan_id` int(255) NOT NULL,
  `pan_cli_id` int(255) NOT NULL,
  `pan_pro_id` int(255) NOT NULL,
  `pan_etat` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`pan_id`, `pan_cli_id`, `pan_pro_id`, `pan_etat`) VALUES
(2, 2, 1, 1),
(3, 2, 1, 1),
(25, 3, 6, 1),
(26, 3, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `pro_id` int(255) NOT NULL,
  `pro_nom` varchar(2000) NOT NULL,
  `pro_photo1` varchar(2000) DEFAULT NULL,
  `pro_photo2` varchar(2000) DEFAULT NULL,
  `pro_photo3` varchar(2000) DEFAULT NULL,
  `pro_quantite` int(255) NOT NULL,
  `pro_prix` decimal(5,2) NOT NULL,
  `pro_code` varchar(255) NOT NULL,
  `pro_cat_id` int(255) NOT NULL,
  `pro_datecrea` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`pro_id`, `pro_nom`, `pro_photo1`, `pro_photo2`, `pro_photo3`, `pro_quantite`, `pro_prix`, `pro_code`, `pro_cat_id`, `pro_datecrea`) VALUES
(1, 'Nike Air Max 90 G NRG', '86755bc4-b12b-11eb-bf83-b827ebbb0598', '8675f538-b12b-11eb-bf83-b827ebbb0598', '86767fee-b12b-11eb-bf83-b827ebbb0598', 50, '200.00', '5657e348-ae71-11eb-8529-0242ac130003', 1, '2021-05-03 00:00:00'),
(6, 'Nike Air Force 1', '4f6542fc-b12b-11eb-bf83-b827ebbb0598', '4f65dac6-b12b-11eb-bf83-b827ebbb0598', '4f666dee-b12b-11eb-bf83-b827ebbb0598', 15, '130.00', '412e3205-b120-11eb-bf83-b827ebbb0598', 1, '2021-05-10 16:27:25'),
(8, ' ADIDAS ORIGINALS OZWEEGO SAND', '7aa2bd04-b12c-11eb-bf83-b827ebbb0598', '6f6ccd1d-b12c-11eb-bf83-b827ebbb0598', 'bed9b9d6-b130-11eb-bf83-b827ebbb0598', 14, '90.00', '25316ecb-b121-11eb-bf83-b827ebbb0598', 2, '2021-05-10 16:33:48'),
(9, ' PUMA RS-X3 PUZZLE', 'e77dcdf6-b12b-11eb-bf83-b827ebbb0598', 'd153744f-b130-11eb-bf83-b827ebbb0598', 'e77efb3a-b12b-11eb-bf83-b827ebbb0598', 12, '109.99', '49ae4eb1-b121-11eb-bf83-b827ebbb0598', 4, '2021-05-10 16:34:49'),
(10, 'Nike Air Max Plus', 'e80499e6-b12a-11eb-bf83-b827ebbb0598', 'e8052083-b12a-11eb-bf83-b827ebbb0598', 'e8059ac9-b12a-11eb-bf83-b827ebbb0598', 15, '159.99', 'e8067419-b12a-11eb-bf83-b827ebbb0598', 1, '2021-05-10 17:43:40'),
(11, 'Nike Air VaporMax 2020 FK', '8ec18c1b-b12c-11eb-bf83-b827ebbb0598', 'b19415a9-b12b-11eb-bf83-b827ebbb0598', 'b194bc4e-b12b-11eb-bf83-b827ebbb0598', 32, '220.00', 'b195d3d3-b12b-11eb-bf83-b827ebbb0598', 1, '2021-05-10 17:49:18'),
(12, ' ADIDAS ORIGINALS STAN SMITH PRIMEGREEN', 'b9b4de29-b12d-11eb-bf83-b827ebbb0598', 'b9b54c71-b12d-11eb-bf83-b827ebbb0598', 'b9b5e7e2-b12d-11eb-bf83-b827ebbb0598', 42, '100.00', 'b9b6ab87-b12d-11eb-bf83-b827ebbb0598', 2, '2021-05-10 18:03:51');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cli_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`com_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`pan_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `cli_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `com_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `pan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
