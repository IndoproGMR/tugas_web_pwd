-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2022 at 06:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `ID_AKUN` int(11) NOT NULL,
  `NAME_AKUN` varchar(64) NOT NULL,
  `HASH` varchar(64) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `TIME_AKUN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_AKUN`, `NAME_AKUN`, `HASH`, `PASSWORD`, `TIME_AKUN`) VALUES
(87963055, 'Kevin_TF0X', '291f9ff173555023585aae189884ccd4bc2670ad78427943c8c5d2c77e94cab2', 'bcee6cfb0a2a9143e6e808909cccd19879dddf6caccc38ac940dd3b88d657dc5', '2022-07-19 16:26:58'),
(31321820, 'test presentasi', '2b80ba9142a174488d158bfe6f2dfdd081a0c03491ccc659ded94ebc1501ff21', 'bcee6cfb0a2a9143e6e808909cccd19879dddf6caccc38ac940dd3b88d657dc5', '2022-07-20 03:19:51'),
(86502730, 'asd', '39de419f484fe52aeec19e0197921797fb478d946f874fcb6d77496cdd472e4d', 'e3aee8d13e94c30baece2f106b07b3cc4eabbd1eb9a9ab57739255b46d75f9d5', '2022-07-19 05:50:42'),
(42035126, 'root', '3dfbc5d4ab1e1d3ee9255c7a26183fcd65dea64997032e7cc4f5e17df1e50a01', '7b3d979ca8330a94fa7e9e1b466d8b99e0bcdea1ec90596c0dcc8d7ef6b4300c', '2022-07-19 16:13:32'),
(70703747, 'asd', '4ab432f940363e05cf255b82aeca464dc4ea6067eabc18d6cfd63876dc7a8707', '7560a119bb89f108839c94e8b90ed815b3b7f0940b73a63cc9c3c6206bcbf431', '2022-07-03 07:10:37'),
(5185466, 'test', '6d2dc361e6afd465a63456aaedda33fa930abd475b1eadc74a13d31aa70b241e', '8737fe2e24535f5a4ffafdf7e7e4da78b4805aed77e8bb6ab36ea079bbfb8c1c', '2022-07-19 16:06:58'),
(11219366, 'root', '8b1dc120e2bd6fd55e61058f311cc7668922c03f6be8ce5d9e193b4214555b3e', '8737fe2e24535f5a4ffafdf7e7e4da78b4805aed77e8bb6ab36ea079bbfb8c1c', '2022-07-20 16:10:22'),
(38117468, 'ad', '8db711a48b7370677636cdc22a7737b044c8ef83773961385e2c3036e6a06165', '7e43e248270db70df67c0971b494fcfa3086b335f561d67aaac221c028352f5a', '2022-07-06 14:47:45'),
(64383110, 'Achmad Naji', '92b99b1c36e72c14d4924467894d5dd323fc3d2bd31f8fe8bd72c7716552adca', 'bcee6cfb0a2a9143e6e808909cccd19879dddf6caccc38ac940dd3b88d657dc5', '2022-07-01 05:38:00'),
(64539469, 'admin', 'cef0514fa99131d2dc5628bc4df71def69b4f193359a132515058e1ca92e4b40', '998ed4d621742d0c2d85ed84173db569afa194d4597686cae947324aa58ab4bb', '2022-07-01 05:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `DONATUR`
--

CREATE TABLE `DONATUR` (
  `ID_DONASI` int(11) NOT NULL,
  `IDDLVL` smallint(6) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `BULAN` varchar(64) NOT NULL,
  `JUMLAH_DONASI` bigint(20) NOT NULL,
  `TGL_DONASI` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DONATUR`
--

INSERT INTO `DONATUR` (`ID_DONASI`, `IDDLVL`, `NAME`, `BULAN`, `JUMLAH_DONASI`, `TGL_DONASI`) VALUES
(1, 1001, 'RedhaFox', '2022-04', 10000, '2022-07-10 09:33:27'),
(2, 1001, 'ZackAry89', '2022-04', 20000, '2022-07-10 09:33:28'),
(3, 1001, 'Dromaeriel', '2022-04', 50000, '2022-07-10 09:33:28'),
(4, 1001, 'RiveraMaxwell', '2022-04', 10000, '2022-07-10 09:33:28'),
(5, 1001, 'amadhio123', '2022-04', 12389, '2022-07-10 09:33:28'),
(6, 1002, 'FoyMcSkyote', '2022-04', 30000, '2022-07-10 09:33:28'),
(7, 1001, 'Basil_the_Dragon', '2022-04', 27830, '2022-07-10 09:33:28'),
(8, 1002, 'MGDFURRY', '2022-04', 55000, '2022-07-10 09:33:28'),
(9, 1001, 'WolfDY', '2022-04', 30000, '2022-07-10 09:33:27'),
(10, 1001, 'CliftHanger64th', '2022-04', 60000, '2022-07-10 09:33:27'),
(11, 1001, 'JosephDaSerg', '2022-04', 20000, '2022-07-10 09:33:27'),
(12, 1001, 'RedhaFox', '2022-05', 10000, '2022-07-10 09:33:29'),
(13, 1001, 'amadhio123', '2022-05', 40000, '2022-07-10 09:33:29'),
(16783482, 1003, 'asd', '2022-06', 100000, '2022-07-19 06:31:22'),
(45416664, 1002, 'ChokyC_', '2022-06', 150000, '2022-07-10 09:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `DONATUR_LVL`
--

CREATE TABLE `DONATUR_LVL` (
  `IDDLVL` smallint(6) NOT NULL,
  `NAMATINGKATAN` varchar(32) NOT NULL,
  `DISKRIPSI` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DONATUR_LVL`
--

INSERT INTO `DONATUR_LVL` (`IDDLVL`, `NAMATINGKATAN`, `DISKRIPSI`) VALUES
(0, 'Default', NULL),
(999, 'Owner', NULL),
(1000, 'Staff', NULL),
(1001, 'Donatur', NULL),
(1002, 'Donatur +', NULL),
(1003, 'Donatur ++', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `FARM`
--

CREATE TABLE `FARM` (
  `UUID_FARM` varchar(40) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `ID_JENIS_FARM` int(11) NOT NULL,
  `NAMA_FARM` varchar(64) NOT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `UKURAN` varchar(15) NOT NULL,
  `WORLD` varchar(64) NOT NULL,
  `Z` int(11) NOT NULL,
  `X` int(11) NOT NULL,
  `PAJAK` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `FARM`
--

INSERT INTO `FARM` (`UUID_FARM`, `NAME`, `ID_JENIS_FARM`, `NAMA_FARM`, `DESKRIPSI`, `UKURAN`, `WORLD`, `Z`, `X`, `PAJAK`) VALUES
('2ded215b-2fe5-4046-b613-47547c083561', 'asd', 2000, '123', 'apa aja', '5000', '_nether', -1000, 0, 16666),
('984ed322-725d-468d-9e21-fb85eca10166', 'asd', 2000, 'tersear', '', '100000', '_overworld', -1000, 0, 333333);

-- --------------------------------------------------------

--
-- Table structure for table `HUKUMAN`
--

CREATE TABLE `HUKUMAN` (
  `IDHUKUM` smallint(6) NOT NULL,
  `HUKUMAN` varchar(128) NOT NULL,
  `DISKRIPSI_HUKUMAN` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `HUKUMAN`
--

INSERT INTO `HUKUMAN` (`IDHUKUM`, `HUKUMAN`, `DISKRIPSI_HUKUMAN`) VALUES
(0, 'NON', ' '),
(999, 'SoftBan', NULL),
(1000, 'temp-ban Ringan', NULL),
(1001, 'temp-ban Menengah', NULL),
(1002, 'temp-ban Berat', NULL),
(1003, 'Membongkar Bangunan', NULL),
(1004, 'Menyita Item / Barang', NULL),
(1005, 'Denda', NULL),
(1100, 'BAN', NULL),
(1101, 'Reset Akun', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `JENIS_FARM`
--

CREATE TABLE `JENIS_FARM` (
  `ID_JENIS_FARM` int(11) NOT NULL,
  `NAMA_JENIS_FARM` varchar(300) NOT NULL,
  `BIAYA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `JENIS_FARM`
--

INSERT INTO `JENIS_FARM` (`ID_JENIS_FARM`, `NAMA_JENIS_FARM`, `BIAYA`) VALUES
(2000, 'pasif farm', 10);

-- --------------------------------------------------------

--
-- Table structure for table `PELANGGARAN`
--

CREATE TABLE `PELANGGARAN` (
  `ID_PELANGGARAN` int(11) NOT NULL,
  `IDRULE` smallint(6) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `IDHUKUM` smallint(6) NOT NULL,
  `LAMA` date DEFAULT NULL,
  `TIMESTAMP_P` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PELANGGARAN`
--

INSERT INTO `PELANGGARAN` (`ID_PELANGGARAN`, `IDRULE`, `NAME`, `IDHUKUM`, `LAMA`, `TIMESTAMP_P`) VALUES
(1, 4101, 'Hevanafa', 1003, NULL, '2022-02-21 16:21:35'),
(2, 4301, 'Hevanafa', 1004, NULL, '2022-02-21 16:21:47'),
(3, 1101, 'RiveraMaxwell', 999, NULL, '2022-02-21 16:25:44'),
(4, 1201, 'RiveraMaxwell', 999, NULL, '2022-02-21 16:25:55'),
(5, 3601, 'RiveraMaxwell', 1000, NULL, '2022-02-21 16:27:23'),
(6, 1401, 'RiveraMaxwell', 0, NULL, '2022-02-21 16:27:45'),
(7, 2401, 'RiveraMaxwell', 1000, NULL, '2022-02-21 16:30:34'),
(8, 2201, 'Arcadius0307', 0, NULL, '2022-02-21 16:32:15'),
(9, 2301, 'Hevanafa', 0, NULL, '2022-02-21 16:32:30'),
(10, 4201, 'Hevanafa', 0, NULL, '2022-02-21 16:37:34'),
(11, 4501, 'YiffMeSenpai', 1101, NULL, '2022-02-21 16:40:28'),
(12, 4501, 'HornyLegoshi', 1101, NULL, '2022-02-21 16:43:39'),
(13, 4601, 'MGDFURRY', 0, NULL, '2022-04-17 20:30:50'),
(14, 3301, 'RiveraMaxwell', 1100, NULL, '2022-04-23 21:35:38'),
(5994813, 0, 'asd', 0, NULL, '2022-07-19 06:59:16'),
(12126554, 0, 'asd', 1100, NULL, '2022-07-20 02:01:24'),
(97621876, 2101, 'asd', 1004, '2022-07-20', '2022-07-19 06:41:50'),
(98625572, 1201, 'asd', 0, NULL, '2022-07-19 07:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `PLAYER`
--

CREATE TABLE `PLAYER` (
  `NAME` varchar(64) NOT NULL,
  `UUID` varchar(40) NOT NULL,
  `NICKNAME` varchar(64) DEFAULT NULL,
  `SOFTBAN` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PLAYER`
--

INSERT INTO `PLAYER` (`NAME`, `UUID`, `NICKNAME`, `SOFTBAN`) VALUES
('amadhio123', '2e88b58b-ad53-3a0c-8fa2-b3fdbbfae1a2', NULL, 'N'),
('Arcadius0307', 'ac6d947a-02d6-3427-b125-3d13560e3b35', NULL, 'N'),
('asd', '5ge', '1edqa', 'Y'),
('Basil_the_Dragon', '40afbaf0-e10b-33e0-b2a5-1ff56d0a64fc', NULL, 'N'),
('ChokyC_', 'c1060db1-211f-3a43-bca2-c40e578dcc28', '', 'N'),
('CliftHanger64th', '95992556-fc7c-3f50-a3f8-3df1b55d7ea4', NULL, 'N'),
('CostMoThes', 'e2452aa2-066b-4bce-b5d0-d40b71b9473e', NULL, 'N'),
('Dromaeriel', 'ca5e30c0-cd89-39ae-8e1e-d5f1cd1f63d7', NULL, 'N'),
('FoyMcSkyote', '52a4568f-fec8-33fb-a724-83aa2bc795f2', NULL, 'N'),
('Hevanafa', '3df2cbca-0c42-4279-959e-d50da26ca0c8', NULL, 'N'),
('HornyLegoshi', '492bfca8-673c-38d0-9c06-34025801c294', NULL, 'N'),
('Indopro', '3089ec04-f580-3fbe-85ec-5f55fbd22a42', NULL, 'N'),
('IndoproGMR', '2ed2aede-b781-3324-8586-950f68dc0565', NULL, 'N'),
('JosephDaSerg', 'f20dc678-3cdc-395a-91b7-1e20e6c32ce9', NULL, 'N'),
('Kevin_TF0X', '2d162166-cc9b-3ec4-9c1f-c01e597ae469', 'Naji', 'N'),
('MazAlgi', 'de33eb11-31a7-36fb-9f28-d4ad67897a7a', NULL, 'N'),
('MGDFURRY', '4f863f38-7410-345b-9e07-5509af5a6b85', NULL, 'N'),
('NotYadaran', 'd8531ee0-b950-3e8e-8d9e-cbc398fd5a4c', NULL, 'N'),
('RandomDwag', 'ea63cf8d-09c8-3efa-8ad6-9086cfcb3f3c', NULL, 'N'),
('RedhaFox', '748dc4f9-4e63-3a8b-9308-a9ef8e4cc3f2', NULL, 'N'),
('REMiShark', '2ba81be0-9b0b-3609-8d97-78ea62b986b7', NULL, 'N'),
('RiveraMaxwell', 'be3c109d-f711-38d2-8ccc-23cfa83eb070', NULL, 'Y'),
('TropsMC', 'dc6be804-c19c-36bc-bc78-132652dd408c', NULL, 'N'),
('WolfDY', 'b1c4d129-b3df-3061-831a-0b02ca7111d7', NULL, 'N'),
('YazidTest', 'a88da0dd-50dd-3aa8-9773-33d757b94518', NULL, 'N'),
('YiffMeSenpai', '719e17c8-4b01-3bba-b58b-41d3d354775d', NULL, 'N'),
('ZackAry89', '925b1b17-4fb3-318f-8ab9-2964f458906b', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `RULE`
--

CREATE TABLE `RULE` (
  `IDRULE` smallint(6) NOT NULL,
  `RULENAME` varchar(128) NOT NULL,
  `DISKRIPSI_RULE` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `RULE`
--

INSERT INTO `RULE` (`IDRULE`, `RULENAME`, `DISKRIPSI_RULE`) VALUES
(0, 'NON', NULL),
(1101, 'Menjual Item mudah didapatkan', NULL),
(1201, 'Menjual Item AFK Farm', NULL),
(1301, 'Melanggar Mojang EULA', NULL),
(1401, 'Ide Item Farm di DS', NULL),
(2101, 'Speed Hack', NULL),
(2201, 'Fly Hack', NULL),
(2301, 'X-Ray Hack', NULL),
(2401, 'Kill Aura', NULL),
(2501, 'Water Walking', NULL),
(2601, 'Menggunakan Hack tanpa izin', NULL),
(3101, 'Membagikan Informasi Pribadi', NULL),
(3102, 'Membagikan Informasi kartu kreadi Pribadi / orang lain', NULL),
(3103, 'Meminta Informasi Pribadi / sensitif', NULL),
(3104, 'Meminta / membagikan Informasi akun Minecraft', NULL),
(3201, 'Prank yang dilakukan hingga terjadi kerusakan dan kerugian materi', NULL),
(3202, 'Prank yang dilakukan hingga mengakitbati Trauma', NULL),
(3301, 'Meng-Abuse Bug seperti Dup tanpa izin', NULL),
(3302, 'mem-Borderline Rule', NULL),
(3401, 'membuat Lag Mechine', NULL),
(3403, 'Grafing hingga kerusakan besar', NULL),
(3404, 'Pencurian item', NULL),
(3501, 'Menipu hingga kerugian', NULL),
(3502, 'memberikan threats hingga IRL', NULL),
(3503, 'Rude / sensitif', NULL),
(3504, 'Spaming Chat / Command', NULL),
(3601, 'Mod yang UnFair', NULL),
(3801, 'bangunan XP / item tanpa izin', NULL),
(4101, 'bangunan yang merujuk ke 18+', NULL),
(4201, 'Sigh yang merujuk ke 18+', NULL),
(4301, 'Buku yang merujuk ke 18+', NULL),
(4401, 'Chat yang merujuk ke 18+', NULL),
(4402, 'mengirim link yang merujuk ke 18+', NULL),
(4501, 'Nama yang merujuk ke 18+', NULL),
(4502, 'Nama yang rasis', NULL),
(4601, 'Map Yang 18+', NULL),
(4701, 'Menggunakan Skin yang 18+', NULL),
(5101, 'Tidak bertanggung jawab dengan pabrik nya', NULL),
(5201, 'membangun pabrik di daerah yang ramai', NULL),
(5202, 'membangun pabrik terlalu dekat dengan kota', NULL),
(5301, 'melebihi batas maksimal mesin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `HASH` varchar(64) NOT NULL,
  `SESSIONKEY` int(11) DEFAULT NULL,
  `EXP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`HASH`, `SESSIONKEY`, `EXP`) VALUES
('291f9ff173555023585aae189884ccd4bc2670ad78427943c8c5d2c77e94cab2', NULL, NULL),
('92b99b1c36e72c14d4924467894d5dd323fc3d2bd31f8fe8bd72c7716552adca', NULL, NULL),
('cef0514fa99131d2dc5628bc4df71def69b4f193359a132515058e1ca92e4b40', NULL, NULL),
('4ab432f940363e05cf255b82aeca464dc4ea6067eabc18d6cfd63876dc7a8707', NULL, NULL),
('8db711a48b7370677636cdc22a7737b044c8ef83773961385e2c3036e6a06165', NULL, NULL),
('39de419f484fe52aeec19e0197921797fb478d946f874fcb6d77496cdd472e4d', NULL, NULL),
('6d2dc361e6afd465a63456aaedda33fa930abd475b1eadc74a13d31aa70b241e', NULL, NULL),
('3dfbc5d4ab1e1d3ee9255c7a26183fcd65dea64997032e7cc4f5e17df1e50a01', NULL, NULL),
('2b80ba9142a174488d158bfe6f2dfdd081a0c03491ccc659ded94ebc1501ff21', NULL, NULL),
('8b1dc120e2bd6fd55e61058f311cc7668922c03f6be8ce5d9e193b4214555b3e', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`HASH`);

--
-- Indexes for table `DONATUR`
--
ALTER TABLE `DONATUR`
  ADD PRIMARY KEY (`ID_DONASI`),
  ADD KEY `FK_DONATUR` (`NAME`),
  ADD KEY `FK_RELATIONSHIP_5` (`IDDLVL`);

--
-- Indexes for table `DONATUR_LVL`
--
ALTER TABLE `DONATUR_LVL`
  ADD PRIMARY KEY (`IDDLVL`);

--
-- Indexes for table `FARM`
--
ALTER TABLE `FARM`
  ADD PRIMARY KEY (`UUID_FARM`),
  ADD KEY `FK_JENIS_FARM` (`ID_JENIS_FARM`),
  ADD KEY `FK_PEMILIK_FARM` (`NAME`);

--
-- Indexes for table `HUKUMAN`
--
ALTER TABLE `HUKUMAN`
  ADD PRIMARY KEY (`IDHUKUM`);

--
-- Indexes for table `JENIS_FARM`
--
ALTER TABLE `JENIS_FARM`
  ADD PRIMARY KEY (`ID_JENIS_FARM`);

--
-- Indexes for table `PELANGGARAN`
--
ALTER TABLE `PELANGGARAN`
  ADD PRIMARY KEY (`ID_PELANGGARAN`),
  ADD KEY `FK_RELATIONSHIP_3` (`IDRULE`),
  ADD KEY `FK_RELATIONSHIP_4` (`NAME`),
  ADD KEY `FK_RELATIONSHIP_6` (`IDHUKUM`);

--
-- Indexes for table `PLAYER`
--
ALTER TABLE `PLAYER`
  ADD PRIMARY KEY (`NAME`);

--
-- Indexes for table `RULE`
--
ALTER TABLE `RULE`
  ADD PRIMARY KEY (`IDRULE`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD KEY `FK_RELATIONSHIP_8` (`HASH`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DONATUR`
--
ALTER TABLE `DONATUR`
  ADD CONSTRAINT `FK_DONATUR` FOREIGN KEY (`NAME`) REFERENCES `PLAYER` (`NAME`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`IDDLVL`) REFERENCES `DONATUR_LVL` (`IDDLVL`);

--
-- Constraints for table `FARM`
--
ALTER TABLE `FARM`
  ADD CONSTRAINT `FK_JENIS_FARM` FOREIGN KEY (`ID_JENIS_FARM`) REFERENCES `JENIS_FARM` (`ID_JENIS_FARM`),
  ADD CONSTRAINT `FK_PEMILIK_FARM` FOREIGN KEY (`NAME`) REFERENCES `PLAYER` (`NAME`);

--
-- Constraints for table `PELANGGARAN`
--
ALTER TABLE `PELANGGARAN`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`IDRULE`) REFERENCES `RULE` (`IDRULE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`NAME`) REFERENCES `PLAYER` (`NAME`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`IDHUKUM`) REFERENCES `HUKUMAN` (`IDHUKUM`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`HASH`) REFERENCES `akun` (`HASH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
