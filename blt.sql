SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `blts`;
CREATE TABLE `blts` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nik` varchar(45) NOT NULL,
  `alamat` text,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
  `foto_rumah` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `valid_count` tinyint(1) DEFAULT '1' COMMENT '1 = input by desa, 2 = valid by  kecamatan, 3 = valid by  dinsos, 4 = valid by =provinsi, 5 = valid by menteri',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `blts` (`id`, `nama`, `nik`, `alamat`, `pekerjaan`, `foto_diri`, `foto_ktp`, `foto_kk`, `foto_rumah`, `longitude`, `latitude`, `valid_count`, `created_at`, `updated_at`) VALUES
(1, 'iwan safrudin', '1234345646', 'tulakan donorojo jepara', 'kuli', 'foto_diri-1234345646.png', 'foto_ktp-1234345646.png', 'foto_kk-1234345646.png', 'foto_rumah-1234345646.png', '110.14025939999999', '-7.150975', 6, '2020-11-12 20:11:37', '2020-11-14 12:02:52'),
(7, 'dsfasdf', '9808', 'lkjkljlk', 'ljlkj', 'foto_diri-9808.png', 'foto_ktp-9808.png', 'foto_kk-9808.png', 'foto_rumah-9808.png', '110.14025939999999', '-7.150975', 2, '2020-11-13 07:44:34', '2020-11-14 12:05:22');

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pesan` text,
  `jawaban` text,
  `tipe` tinyint(1) DEFAULT '1' COMMENT '1 = saran, 2 = masukkan, 3 = pertanyaan',
  `email` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `inbox` (`id`, `nama`, `pesan`, `jawaban`, `tipe`, `email`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'iwan', 'lkfjlfj aslkfjdsalfk', NULL, 1, 'iwan@gldjfl.com', '90809890', '2020-11-14 16:44:27', '2020-11-14 16:44:27'),
(2, 'fjaslfj', 'lfjslafjdsalfjaslksa ', NULL, 1, 'dklfjasl@sldfjsal', '0808', '2020-11-14 16:44:55', '2020-11-14 16:44:55'),
(3, 'iwan', 'ini adalah contoh masukkan', NULL, 2, 'iwjlj@sdlfjal', '9080890', '2020-11-14 19:33:22', '2020-11-14 19:33:22'),
(4, 'iwan', 'apakah ini pertanyaan ?', NULL, 3, 'lfjsdl@dlfjl', '080809', '2020-11-14 19:39:42', '2020-11-14 19:39:42');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '1' COMMENT '1=admin,2=petugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$0qxyZyBgSfql5tVAl6i/b.MEjtW6zWHzu45BVN2Xx72yBfDUU9NDe', 1),
(15, 'desa', '$2y$10$HEA.fRcPPMEs9tZf9Gzn4e53xZGrDXDiN7oSlHAuWiCxMvLwPc3E2', 6),
(16, 'kecamatan', '$2y$10$xcCQyVpuro4ky.N11feSqelouTQGx4AuYhUARUB2Y.XKUKKnxekIm', 5),
(17, 'dinsos', '$2y$10$DqQsAQAYzd2sgBl2RkRmauYPXj6CBfzHwhdylZ5RMBZS85QE40Nty', 4),
(18, 'provinsi', '$2y$10$SMgIJq4jwKI10xUXYpMydOLmjoy4xi8VidyoNoFLWWvyjkchG17oq', 3),
(19, 'kementerian', '$2y$10$OZdX3vmDTe.42xD8pkr/ou0k7XaTlylKFlL3gBlauIpLJZJdR.Jku', 2),
(21, 'bambanx', '$2y$10$.njSB/DbI/1CdElyJ.1coufpOpvtwCXv59mnesp/vGhL2bZEKPoOO', 1),
(22, 'bams', '$2y$10$C6Vf/3sXAaEIl187z24Bgu6Jbgebl.zgj80jpgA5mhaZ0g1SzOcGa', 1),
(23, 'bambs', '$2y$10$b7.5OjGKQ/rjnJwdYLR8yu0sbK8yWYG6hAeZOiP3iycMKzMyba.om', 1);


ALTER TABLE `blts`
  ADD PRIMARY KEY (`id`,`nik`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nik_UNIQUE` (`nik`);

ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);


ALTER TABLE `blts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `inbox`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
