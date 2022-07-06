-- AKUN

INSERT INTO `AKUN` (`ID_AKUN`, `NAME_AKUN`, `PASSWORD`, `HASH`, `TIME_AKUN`) VALUES
(42035126, 'root', '8737fe2e24535f5a4ffafdf7e7e4da78b4805aed77e8bb6ab36ea079bbfb8c1c', '8b1dc120e2bd6fd55e61058f311cc7668922c03f6be8ce5d9e193b4214555b3e', '2022-07-01 12:29:43'),
(87963055, 'Kevin_TF0X', 'bcee6cfb0a2a9143e6e808909cccd19879dddf6caccc38ac940dd3b88d657dc5', '291f9ff173555023585aae189884ccd4bc2670ad78427943c8c5d2c77e94cab2', '2022-07-01 12:31:10'),
(11219366, 'root test', '7b3d979ca8330a94fa7e9e1b466d8b99e0bcdea1ec90596c0dcc8d7ef6b4300c', '4e00b3442f52b2d141e61755bd4271fbed77dde52a9896e5eb30d5e492ebdbe9', '2022-07-01 12:33:28'),
(64383110, 'Achmad Naji', 'bcee6cfb0a2a9143e6e808909cccd19879dddf6caccc38ac940dd3b88d657dc5', '92b99b1c36e72c14d4924467894d5dd323fc3d2bd31f8fe8bd72c7716552adca', '2022-07-01 12:38:00'),
(64539469, 'admin', '998ed4d621742d0c2d85ed84173db569afa194d4597686cae947324aa58ab4bb', 'cef0514fa99131d2dc5628bc4df71def69b4f193359a132515058e1ca92e4b40', '2022-07-01 12:58:11'),
(70703747, 'asd', '7560a119bb89f108839c94e8b90ed815b3b7f0940b73a63cc9c3c6206bcbf431', '4ab432f940363e05cf255b82aeca464dc4ea6067eabc18d6cfd63876dc7a8707', '2022-07-03 14:10:37');


INSERT INTO `SESSION` (`HASH`, `SESSIONKEY`, `EXP`) VALUES
('8b1dc120e2bd6fd55e61058f311cc7668922c03f6be8ce5d9e193b4214555b3e', 928, 20220702),
('291f9ff173555023585aae189884ccd4bc2670ad78427943c8c5d2c77e94cab2', 1683, 20220706),
('4e00b3442f52b2d141e61755bd4271fbed77dde52a9896e5eb30d5e492ebdbe9', NULL, NULL),
('92b99b1c36e72c14d4924467894d5dd323fc3d2bd31f8fe8bd72c7716552adca', NULL, NULL),
('cef0514fa99131d2dc5628bc4df71def69b4f193359a132515058e1ca92e4b40', NULL, NULL),
('4ab432f940363e05cf255b82aeca464dc4ea6067eabc18d6cfd63876dc7a8707', NULL, NULL);



-- PLAYER

INSERT INTO `PLAYER` (`NAME`, `UUID`, `SOFTBAN`, `NICKNAME`) VALUES
('amadhio123', '2e88b58b-ad53-3a0c-8fa2-b3fdbbfae1a2', 'N', NULL),
('Arcadius0307', 'ac6d947a-02d6-3427-b125-3d13560e3b35', 'N', NULL),
('Basil_the_Dragon', '40afbaf0-e10b-33e0-b2a5-1ff56d0a64fc', 'N', NULL),
('CliftHanger64th', '95992556-fc7c-3f50-a3f8-3df1b55d7ea4', 'N', NULL),
('CostMoThes', 'e2452aa2-066b-4bce-b5d0-d40b71b9473e', 'N', NULL),
('Dromaeriel', 'ca5e30c0-cd89-39ae-8e1e-d5f1cd1f63d7', 'N', NULL),
('FoyMcSkyote', '52a4568f-fec8-33fb-a724-83aa2bc795f2', 'N', NULL),
('Hevanafa', '3df2cbca-0c42-4279-959e-d50da26ca0c8', 'N', NULL),
('HornyLegoshi', '492bfca8-673c-38d0-9c06-34025801c294', 'N', NULL),
('Indopro', '3089ec04-f580-3fbe-85ec-5f55fbd22a42', 'N', NULL),
('IndoproGMR', '2ed2aede-b781-3324-8586-950f68dc0565', 'N', NULL),
('JosephDaSerg', 'f20dc678-3cdc-395a-91b7-1e20e6c32ce9', 'N', NULL),
('Kevin_TF0X', '2d162166-cc9b-3ec4-9c1f-c01e597ae469', 'N', NULL),
('MazAlgi', 'de33eb11-31a7-36fb-9f28-d4ad67897a7a', 'N', NULL),
('MGDFURRY', '4f863f38-7410-345b-9e07-5509af5a6b85', 'N', NULL),
('NotYadaran', 'd8531ee0-b950-3e8e-8d9e-cbc398fd5a4c', 'N', NULL),
('RandomDwag', 'ea63cf8d-09c8-3efa-8ad6-9086cfcb3f3c', 'N', NULL),
('RedhaFox', '748dc4f9-4e63-3a8b-9308-a9ef8e4cc3f2', 'N', NULL),
('REMiShark', '2ba81be0-9b0b-3609-8d97-78ea62b986b7', 'N', NULL),
('RiveraMaxwell', 'be3c109d-f711-38d2-8ccc-23cfa83eb070', 'Y', NULL),
('TropsMC', 'dc6be804-c19c-36bc-bc78-132652dd408c', 'N', NULL),
('WolfDY', 'b1c4d129-b3df-3061-831a-0b02ca7111d7', 'N', NULL),
('YazidTest', 'a88da0dd-50dd-3aa8-9773-33d757b94518', 'N', NULL),
('YiffMeSenpai', '719e17c8-4b01-3bba-b58b-41d3d354775d', 'N', NULL),
('ZackAry89', '925b1b17-4fb3-318f-8ab9-2964f458906b', 'N', NULL);


INSERT INTO `DONATUR_LVL` (`IDDLVL`, `NAMATINGKATAN`,`DISKRIPSI`) VALUES
(0, 'Default', NULL),
(999, 'Owner', NULL),
(1000, 'Staff', NULL),
(1001, 'Donatur', NULL),
(1002, 'Donatur +', NULL),
(1003, 'Donatur ++', NULL);



INSERT INTO `HUKUMAN` (`IDHUKUM`, `HUKUMAN`,`DISKRIPSI_HUKUMAN`) VALUES
(0, 'NON', NULL),
(999, 'SoftBan', NULL),
(1000, 'temp-ban Ringan', NULL),
(1001, 'temp-ban Menengah', NULL),
(1002, 'temp-ban Berat', NULL),
(1003, 'Membongkar Bangunan', NULL),
(1004, 'Menyita Item / Barang', NULL),
(1005, 'Denda', NULL),
(1100, 'BAN', NULL),
(1101, 'Reset Akun', NULL);

INSERT INTO `RULE` (`IDRULE`, `RULENAME`,`DISKRIPSI_RULE`) VALUES
(0, 'NON',NULL),
(1101, 'Menjual Item mudah didapatkan',NULL),
(1201, 'Menjual Item AFK Farm',NULL),
(1301, 'Melanggar Mojang EULA',NULL),
(1401, 'Ide Item Farm di DS',NULL),
(2101, 'Speed Hack',NULL),
(2201, 'Fly Hack',NULL),
(2301, 'X-Ray Hack',NULL),
(2401, 'Kill Aura',NULL),
(2501, 'Water Walking',NULL),
(2601, 'Menggunakan Hack tanpa izin',NULL),
(3101, 'Membagikan Informasi Pribadi',NULL),
(3102, 'Membagikan Informasi kartu kreadi Pribadi / orang lain',NULL),
(3103, 'Meminta Informasi Pribadi / sensitif',NULL),
(3104, 'Meminta / membagikan Informasi akun Minecraft',NULL),
(3201, 'Prank yang dilakukan hingga terjadi kerusakan dan kerugian materi',NULL),
(3202, 'Prank yang dilakukan hingga mengakitbati Trauma',NULL),
(3301, 'Meng-Abuse Bug seperti Dup tanpa izin',NULL),
(3302, 'mem-Borderline Rule',NULL),
(3401, 'membuat Lag Mechine',NULL),
(3403, 'Grafing hingga kerusakan besar',NULL),
(3404, 'Pencurian item',NULL),
(3501, 'Menipu hingga kerugian',NULL),
(3502, 'memberikan threats hingga IRL',NULL),
(3503, 'Rude / sensitif',NULL),
(3504, 'Spaming Chat / Command',NULL),
(3601, 'Mod yang UnFair',NULL),
(3801, 'bangunan XP / item tanpa izin',NULL),
(4101, 'bangunan yang merujuk ke 18+',NULL),
(4201, 'Sigh yang merujuk ke 18+',NULL),
(4301, 'Buku yang merujuk ke 18+',NULL),
(4401, 'Chat yang merujuk ke 18+',NULL),
(4402, 'mengirim link yang merujuk ke 18+',NULL),
(4501, 'Nama yang merujuk ke 18+',NULL),
(4502, 'Nama yang rasis',NULL),
(4601, 'Map Yang 18+',NULL),
(4701, 'Menggunakan Skin yang 18+',NULL),
(5101, 'Tidak bertanggung jawab dengan pabrik nya',NULL),
(5201, 'membangun pabrik di daerah yang ramai',NULL),
(5202, 'membangun pabrik terlalu dekat dengan kota',NULL),
(5301, 'melebihi batas maksimal mesin',NULL);

INSERT INTO `DONATUR` (`NAME`, `JUMLAH_DONASI`, `IDDLVL`, `BULAN`, `TGL_DONASI`, `ID_DONASI`) VALUES
('RedhaFox', 10000, 1001, 'APRIL 2022', '2022-03-30 13:21:52','1'),
('ZackAry89', 20000, 1001, 'APRIL 2022', '2022-03-30 13:22:26','2'),
('Dromaeriel', 50000, 1001, 'APRIL 2022', '2022-03-30 13:34:36','3'),
('RiveraMaxwell', 10000, 1001, 'APRIL 2022', '2022-03-30 13:34:51','4'),
('amadhio123', 12389, 1001, 'APRIL 2022', '2022-03-30 13:37:28','5'),
('FoyMcSkyote', 30000, 1002, 'APRIL 2022', '2022-05-25 04:25:17','6'),
('Basil_the_Dragon', 27830, 1001, 'APRIL 2022', '2022-05-25 04:26:03','7'),
('MGDFURRY', 55000, 1002, 'APRIL 2022', '2022-05-25 04:26:27','8'),
('WolfDY', 30000, 1001, 'APRIL 2022', '2022-05-25 04:27:15','9'),
('CliftHanger64th', 60000, 1001, 'APRIL 2022', '2022-05-25 04:29:03','10'),
('JosephDaSerg', 20000, 1001, 'APRIL 2022', '2022-05-25 04:29:26','11'),
('RedhaFox', 10000, 1001, 'MEI 2022', '2022-05-25 04:44:15','12'),
('amadhio123', 40000, 1001, 'MEI 2022', '2022-05-25 04:45:33','13');



INSERT INTO `PELANGGARAN` (`NAME`, `IDRULE`, `IDHUKUM`, `LAMA`, `TIMESTAMP_P`,`ID_PELANGGARAN`) VALUES
('Hevanafa', 4101, 1003, NULL, '2022-02-21 23:21:35','1'),
('Hevanafa', 4301, 1004, NULL, '2022-02-21 23:21:47','2'),
('RiveraMaxwell', 1101, 999, NULL, '2022-02-21 23:25:44','3'),
('RiveraMaxwell', 1201, 999, NULL, '2022-02-21 23:25:55','4'),
('RiveraMaxwell', 3601, 1000, NULL, '2022-02-21 23:27:23','5'),
('RiveraMaxwell', 1401, 0, NULL, '2022-02-21 23:27:45','6'),
('RiveraMaxwell', 2401, 1000, NULL, '2022-02-21 23:30:34','7'),
('Arcadius0307', 2201, 0, NULL, '2022-02-21 23:32:15','8'),
('Hevanafa', 2301, 0, NULL, '2022-02-21 23:32:30','9'),
('Hevanafa', 4201, 0, NULL, '2022-02-21 23:37:34','10'),
('YiffMeSenpai', 4501, 1101, NULL, '2022-02-21 23:40:28','11'),
('HornyLegoshi', 4501, 1101, NULL, '2022-02-21 23:43:39','12'),
('MGDFURRY', 4601, 0, NULL, '2022-04-18 03:30:50','13'),
('RiveraMaxwell', 3301, 1100, NULL, '2022-04-24 04:35:38','14');