-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 juin 2024 à 18:15
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de données : `mosala_db`
--

-- --------------------------------------------------------
--
-- Structure de la table `formation_candidates`
--

CREATE TABLE `formation_candidates` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `code` varchar(255) NOT NULL,
    `nom` varchar(255) NOT NULL,
    `prenom` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `telephone` varchar(255) NOT NULL,
    `current_job` varchar(255) DEFAULT NULL,
    `adresse` text DEFAULT NULL,
    `hobbie` varchar(255) DEFAULT NULL,
    `ville` varchar(255) NOT NULL,
    `status` varchar(255) NOT NULL DEFAULT 'actif',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Déchargement des données de la table `formation_candidates`
--

INSERT INTO `formation_candidates` (
        `id`,
        `code`,
        `nom`,
        `prenom`,
        `email`,
        `telephone`,
        `current_job`,
        `adresse`,
        `hobbie`,
        `ville`,
        `status`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'MH-282009',
        'Delimond',
        'Gaston',
        'formation.cnetworks@gmail.com',
        '0822930099',
        'Developer',
        'Kinshasa',
        'Nouvelle Technologie',
        'Kinshasa',
        'actif',
        '2024-06-17 16:10:21',
        '2024-06-17 16:10:21'
    );
-- --------------------------------------------------------
--
-- Structure de la table `formation_paiements`
--

CREATE TABLE `formation_paiements` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `candidate_code` varchar(255) NOT NULL,
    `mode` varchar(255) NOT NULL,
    `amount` double(8, 2) NOT NULL,
    `devise` varchar(255) NOT NULL DEFAULT 'USD',
    `status` varchar(255) NOT NULL DEFAULT 'actif',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
    `id` int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) NOT NULL,
    `batch` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `tokenable_type` varchar(255) NOT NULL,
    `tokenable_id` bigint(20) UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    `token` varchar(64) NOT NULL,
    `abilities` text DEFAULT NULL,
    `last_used_at` timestamp NULL DEFAULT NULL,
    `expires_at` timestamp NULL DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formation_candidates`
--
ALTER TABLE `formation_candidates`
ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `formation_candidates_code_unique` (`code`);
--
-- Index pour la table `formation_paiements`
--
ALTER TABLE `formation_paiements`
ADD PRIMARY KEY (`id`);
--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`);
--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formation_candidates`
--
ALTER TABLE `formation_candidates`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT pour la table `formation_paiements`
--
ALTER TABLE `formation_paiements`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;