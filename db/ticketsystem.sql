# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-08-08 20:38:39
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_aktivasi_agent"
#

DROP TABLE IF EXISTS `tb_aktivasi_agent`;
CREATE TABLE `tb_aktivasi_agent` (
  `id_agent` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_agent` varchar(255) NOT NULL DEFAULT '',
  `jenis_agent` varchar(255) NOT NULL DEFAULT '',
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_agent`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_aktivasi_agent"
#

INSERT INTO `tb_aktivasi_agent` VALUES (3,0,'Mossad Agent','Syariah Agent','31589143_ML.jpg','Tukang_CoMarketingActivity.pdf','Tukang_FinancialServiceProposal.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,7,4,'2019-08-01 11:47:45','2019-08-08 09:09:41');

#
# Structure for table "tb_cabang"
#

DROP TABLE IF EXISTS `tb_cabang`;
CREATE TABLE `tb_cabang` (
  `id_cabang` int(3) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

#
# Data for table "tb_cabang"
#

INSERT INTO `tb_cabang` VALUES (1,'Balikpapan Syariah'),(2,'Bandung Syariah'),(3,'Banjarmasin Syariah'),(4,'Batam Syariah'),(5,'Bekasi Syariah'),(6,'Bogor Syariah'),(7,'BSD Syariah'),(8,'Bukit Tinggi Syariah'),(9,'Cawang Syariah'),(10,'Cirebon Syariah'),(11,'Depok Syariah'),(12,'Gorontalo Syariah'),(13,'Gresik Syariah'),(14,'Jakarta Selatan Syariah'),(15,'Jakarta Utara Syariah'),(16,'Jambi Syariah'),(17,'Karawang Syariah'),(18,'Kediri Syariah'),(19,'Kendari Syariah'),(20,'Kudus Syariah'),(21,'Lampung Syariah'),(22,'Makassar Syariah'),(23,'Malang Syariah'),(24,'Mataram Syariah'),(25,'Medan Syariah'),(26,'Meruya Syariah'),(27,'Mojokerto Syariah'),(28,'Padang Syariah'),(29,'Palangkaraya Syariah'),(30,'Palembang Syariah'),(31,'Pekanbaru Syariah'),(32,'Pontianak Syariah'),(33,'Purwokerto Syariah'),(34,'Samarinda Syariah'),(35,'Semarang Syariah'),(36,'Sidoarjo Syariah'),(37,'Solo Syariah'),(38,'Sorong Syariah'),(39,'Sukabumi Syariah'),(40,'Sunter Syariah'),(41,'Surabaya Syariah'),(42,'Tangerang Syariah'),(43,'Tasikmalaya Syariah'),(44,'Ternate Syariah'),(45,'Yogyakarta Syariah'),(46,'Head Office');

#
# Structure for table "tb_comment"
#

DROP TABLE IF EXISTS `tb_comment`;
CREATE TABLE `tb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL DEFAULT 0,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `id_user` int(6) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_mytalim` int(11) DEFAULT NULL,
  `id_renovasi` int(11) DEFAULT NULL,
  `id_sewa` int(11) DEFAULT NULL,
  `id_wedding` int(11) DEFAULT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_myhajat_lainnya` int(11) DEFAULT NULL,
  `id_mysafar` int(11) NOT NULL,
  `id_myihram` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `id_nst` int(11) NOT NULL,
  `id_lead` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
#

INSERT INTO `tb_comment` VALUES (104,0,'Komentar mytalim id 34',4,'2019-08-01 16:11:16',34,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(105,104,'Reply komentar mytalim id 34',4,'2019-08-01 16:11:29',34,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(106,0,'Komentar mytalim id 33',4,'2019-08-01 16:12:40',33,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(107,106,'reply keomentar mytalim id 33',4,'2019-08-01 16:12:50',33,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(108,0,'Komentar mytalim id 32',4,'2019-08-01 16:13:12',32,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(109,108,'Reply komentar mytalim id 32',4,'2019-08-01 16:13:25',32,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(110,0,'komentar my hajat renovasi id 14',4,'2019-08-01 16:18:51',NULL,14,NULL,NULL,NULL,NULL,0,0,0,0,0),(111,110,'reply komentar my hajat renovasi id 14',4,'2019-08-01 16:18:59',NULL,14,NULL,NULL,NULL,NULL,0,0,0,0,0),(112,0,'komentar my safar id 7',4,'2019-08-01 16:35:56',NULL,NULL,NULL,NULL,NULL,NULL,7,0,0,0,0),(113,112,'reply komentar my safar id 7',4,'2019-08-01 16:36:02',NULL,NULL,NULL,NULL,NULL,NULL,7,0,0,0,0),(114,0,'komentar my ihram id 7',4,'2019-08-01 16:36:20',NULL,NULL,NULL,NULL,NULL,NULL,0,7,0,0,0),(115,114,'reply komentar my ihram id 7',4,'2019-08-01 16:36:59',NULL,NULL,NULL,NULL,NULL,NULL,0,7,0,0,0),(116,0,'komentar aktivasi_agent id 3',4,'2019-08-01 16:48:24',NULL,NULL,NULL,NULL,NULL,NULL,0,0,3,0,0),(117,116,'reply komentar aktivasi_agent id 3',4,'2019-08-01 16:48:32',NULL,NULL,NULL,NULL,NULL,NULL,0,0,3,0,0),(118,116,'Komen admin 1',1,'2019-08-01 16:49:14',NULL,NULL,NULL,NULL,NULL,NULL,0,0,3,0,0),(119,0,'komentar mytalim id 28',4,'2019-08-03 10:17:12',28,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(120,119,'reply keomentar mytalim id 28',4,'2019-08-03 10:17:21',28,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(121,0,'wkkwkwkw',12,'2019-08-06 11:24:02',NULL,NULL,NULL,NULL,NULL,6,0,0,0,0,0),(122,114,'reply komentar my hajat wedding 12',4,'2019-08-08 09:16:48',NULL,NULL,NULL,NULL,NULL,NULL,0,7,0,0,0),(123,0,'Lead maangement id 15 komen',16,'2019-08-08 14:51:15',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,15),(124,123,'reply lead management id 15',16,'2019-08-08 14:51:36',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,15);

#
# Structure for table "tb_konsumen"
#

DROP TABLE IF EXISTS `tb_konsumen`;
CREATE TABLE `tb_konsumen` (
  `id_konsumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) DEFAULT NULL,
  `jenis_konsumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_konsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_konsumen"
#


#
# Structure for table "tb_lead_management"
#

DROP TABLE IF EXISTS `tb_lead_management`;
CREATE TABLE `tb_lead_management` (
  `id_lead` int(11) NOT NULL AUTO_INCREMENT,
  `asal_leads` varchar(255) NOT NULL DEFAULT '',
  `cabang_tujuan` varchar(255) DEFAULT '',
  `surveyor` varchar(255) DEFAULT '',
  `ttd_pic` varchar(255) DEFAULT '',
  `lead_id` varchar(255) NOT NULL DEFAULT '',
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `sumber_lead` varchar(255) NOT NULL DEFAULT '',
  `nama_pemberi_lead` varchar(255) NOT NULL DEFAULT '',
  `produk` varchar(255) NOT NULL DEFAULT '',
  `object_price` varchar(255) NOT NULL DEFAULT '',
  `tahap_reject` varchar(255) NOT NULL DEFAULT '',
  `tipe_pefindo` varchar(255) NOT NULL DEFAULT '',
  `max_past_due` int(11) NOT NULL DEFAULT 0,
  `dsr` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) DEFAULT '',
  `sla_branch` varchar(255) NOT NULL DEFAULT '',
  `cabang_survey` varchar(255) NOT NULL DEFAULT '',
  `informasi_tambahan` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL COMMENT '0 = pending (belum direview), 3 = Selesai',
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_lead`),
  UNIQUE KEY `lead_id` (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "tb_lead_management"
#

INSERT INTO `tb_lead_management` VALUES (13,'In Branch','3',NULL,NULL,'ahbdjsabd7831y4872y48237','Meyraldi Rizky Saputra','Agent','Leeds City','My Ihram','21321321313','','',0,'',NULL,'','',NULL,'2019-08-08 06:06:28','2019-08-08 06:20:50',3,7,4),(14,'Cross-Branch','4','Ibrahim Ahmad Jabar','asd','asdasd2asdasddwyt','julio saputra','Digital Marketing','asd','My Ihram','21321321313','Pefindo Checking','DRS>70%',213,'wwkwkkwkw','Reject','asdasd','asdasd','2','2019-08-08 06:21:26','2019-08-08 08:17:18',3,7,4),(15,'In Branch','','','','leads8779872389273','Ibrahim Ahmad','Digital Marketing','Avram Glazer','My Faedah','21321321313','Pefindo Checking','Collectibility',20,'wwkwkkwkw','Approve','SLA BRANCH','CABANG SURVEY','Tidak ada informasi tambahan','2019-08-08 07:30:32','2019-08-08 09:50:48',3,7,4);

#
# Structure for table "tb_my_hajat"
#

DROP TABLE IF EXISTS `tb_my_hajat`;
CREATE TABLE `tb_my_hajat` (
  `id_my_hajat` int(11) NOT NULL AUTO_INCREMENT,
  `id_renovasi` int(11) DEFAULT NULL,
  `id_sewa` int(11) DEFAULT NULL,
  `id_wedding` int(11) DEFAULT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_myhajat_lainnya` int(11) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_my_hajat`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#

INSERT INTO `tb_my_hajat` VALUES (18,17,NULL,NULL,NULL,NULL,6,12),(19,18,NULL,NULL,NULL,NULL,6,12),(21,NULL,NULL,NULL,NULL,6,6,12),(22,NULL,NULL,NULL,NULL,7,6,12),(23,19,NULL,NULL,NULL,NULL,7,4),(24,NULL,NULL,14,NULL,NULL,7,4);

#
# Structure for table "tb_my_hajat_franchise"
#

DROP TABLE IF EXISTS `tb_my_hajat_franchise`;
CREATE TABLE `tb_my_hajat_franchise` (
  `id_franchise` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_franchise` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nama Franchise',
  `jumlah_cabang` int(11) NOT NULL DEFAULT 0 COMMENT 'Jumlah Cabang Yang Dimiliki',
  `jenis_franchise` varchar(50) NOT NULL DEFAULT '' COMMENT 'Jenis Franchise',
  `tahun_berdiri_franchise` varchar(255) NOT NULL DEFAULT '' COMMENT 'Tahun Berdiri Franchise',
  `harga_franchise` int(11) NOT NULL DEFAULT 0 COMMENT 'Harga Franchise',
  `jangka_waktu_franchise` varchar(255) NOT NULL DEFAULT '' COMMENT 'Jangka Waktu Franchise',
  `akun_sosmed_website` varchar(255) NOT NULL DEFAULT '' COMMENT 'Akun Media Sosial / Website Franchise',
  `informasi_tambahan` text DEFAULT NULL,
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_franchise`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#


#
# Structure for table "tb_my_hajat_lainnya"
#

DROP TABLE IF EXISTS `tb_my_hajat_lainnya`;
CREATE TABLE `tb_my_hajat_lainnya` (
  `id_myhajat_lainnya` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_penyedia_jasa` varchar(255) NOT NULL DEFAULT '',
  `jenis_penyedia_jasa` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT 0,
  `informasi_tambahan` text NOT NULL,
  `upload_file1` varchar(255) NOT NULL DEFAULT '',
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_ticket` int(11) DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_myhajat_lainnya`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_lainnya"
#

INSERT INTO `tb_my_hajat_lainnya` VALUES (6,'Ahmed Mubarok','Eksternal','Mecca Travel','Badan Usaha',2000000000,' ga ada','MyIhram3.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-06 06:22:34','2019-08-06 06:30:29',3,0,6,12),(7,'konsumen','Eksternal','Kocheeengg','Perorangan',2000000000,'informasi tamabhan','7_September_Cover.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-06 06:25:56','2019-08-07 07:58:56',1,0,6,12);

#
# Structure for table "tb_my_hajat_renovasi"
#

DROP TABLE IF EXISTS `tb_my_hajat_renovasi`;
CREATE TABLE `tb_my_hajat_renovasi` (
  `id_renovasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_vendor` varchar(255) NOT NULL DEFAULT '',
  `jenis_vendor` varchar(255) NOT NULL DEFAULT '',
  `jenis_pekerjaan` varchar(255) NOT NULL DEFAULT '',
  `bagian_bangunan` varchar(255) NOT NULL DEFAULT '',
  `luas_bangunan` varchar(255) NOT NULL DEFAULT '',
  `jumlah_pekerja` int(11) NOT NULL DEFAULT 0,
  `estimasi_waktu` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `upload_file1` varchar(255) NOT NULL DEFAULT '',
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_renovasi`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (17,'julio saputra','Eksternal','Aji-tkangin.com','Badan Usaha','Badan Usaha','Taman','150 x 152',900,'9 tahun',999999999999,'nonononono','6_September.png','7_September_4.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-06 05:54:00','2019-08-08 15:57:02',3,6,0,12),(18,'Ahmad Jabrin','Eksternal','vendoro makkah','Perorangan','Perorangan','sdfsdf','sdfsdfsd',12312,'dasasd',123,'dsf','MyIhram1.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-06 06:16:58','2019-08-07 13:57:15',3,6,0,12),(19,'Ahmad Baequni','Eksternal','Vendor Renovasi','Perorangan','Perorangan','Atap','90 x 90',210,'9 waktu',9000000000,'Traveloka','Trifold_Flyer.jpg','Ikhtisar_Data_Keuangan_Fintech_(P2P_Lending)_Periode_Desember_2018.xlsx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-06 08:42:01','2019-08-08 09:56:32',0,7,0,4);

#
# Structure for table "tb_my_hajat_sewa"
#

DROP TABLE IF EXISTS `tb_my_hajat_sewa`;
CREATE TABLE `tb_my_hajat_sewa` (
  `id_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_pemilik` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Pemilik Rumah / Ruko',
  `jenis_pemilik` varchar(255) NOT NULL DEFAULT '' COMMENT 'Jenis Pemilik Rumah / Ruko',
  `hubungan_pemohon` varchar(255) NOT NULL DEFAULT '' COMMENT 'Hubungan Dengan Pemohon',
  `luas_panjang` varchar(255) DEFAULT NULL COMMENT 'Luas dan Panjang bangunan (panjang x lebar)',
  `biaya_tahunan` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Biaya Sewa per Tahun',
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_sewa"
#


#
# Structure for table "tb_my_hajat_wedding"
#

DROP TABLE IF EXISTS `tb_my_hajat_wedding`;
CREATE TABLE `tb_my_hajat_wedding` (
  `id_wedding` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_wo` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Wedding Organizer',
  `jenis_wo` varchar(50) NOT NULL DEFAULT '' COMMENT 'Jenis Wedding Organizer',
  `lama_berdiri` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lama Usaha Berdiri',
  `jumlah_biaya` int(11) NOT NULL DEFAULT 0 COMMENT 'Jumlah Biaya Acara',
  `jumlah_undangan` int(11) NOT NULL DEFAULT 0 COMMENT 'Jumlah Undangan',
  `akun_sosmed` varchar(50) NOT NULL DEFAULT '' COMMENT 'Akun Media Sosial WO',
  `informasi_tambahan` text DEFAULT NULL,
  `upload_file1` varchar(255) NOT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0 COMMENT 'Foreign Key dari tb_cabang',
  `id_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'ID status approval tiket',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_wedding`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (14,0,'Ahmad Abdu','Internal','Suryajana','Perusahaan/Badan Usaha','1998',2147483647,2019,'@namaakun','yang bener ajee','abhinaya.png','wallhaven-743619.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-06 08:45:12','2019-08-08 03:55:14',7,3,4);

#
# Structure for table "tb_my_ihram"
#

DROP TABLE IF EXISTS `tb_my_ihram`;
CREATE TABLE `tb_my_ihram` (
  `id_myihram` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_konsumen` varchar(40) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(40) NOT NULL DEFAULT '',
  `nama_travel` varchar(255) NOT NULL DEFAULT '',
  `upload_file1` varchar(255) NOT NULL DEFAULT '',
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` varchar(255) DEFAULT 'NULL',
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_myihram`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_ihram"
#

INSERT INTO `tb_my_ihram` VALUES (7,0,'Ahmad Jabar','Internal','','22886363_ML.jpg','11861127_ML.jpg','13160727_ML.jpg','8785205_ML.jpg','28085868_ML.jpg','11913347_ML.jpg',NULL,NULL,NULL,NULL,'2019-08-01 16:56:30','2019-08-01 11:34:26',1,7,4);

#
# Structure for table "tb_my_safar"
#

DROP TABLE IF EXISTS `tb_my_safar`;
CREATE TABLE `tb_my_safar` (
  `id_mysafar` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_konsumen` varchar(40) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(40) NOT NULL DEFAULT '',
  `nama_travel` varchar(255) NOT NULL DEFAULT '',
  `upload_file1` varchar(255) NOT NULL DEFAULT '',
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` varchar(255) DEFAULT 'NULL',
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_mysafar`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_safar"
#

INSERT INTO `tb_my_safar` VALUES (7,0,'Ibrahim','Eksternal','Safar Travel','32620597_ML.jpg','32900260_ML.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-01 16:56:39','2019-08-01 11:35:37',1,7,4),(8,0,'Mas Eko','Eksternal','Safar Travel','8_Agustus.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-07 13:05:23','2019-08-07 04:29:35',1,7,4);

#
# Structure for table "tb_my_talim"
#

DROP TABLE IF EXISTS `tb_my_talim`;
CREATE TABLE `tb_my_talim` (
  `id_mytalim` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `nama_konsumen` varchar(40) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(40) NOT NULL DEFAULT '',
  `pendidikan` varchar(50) NOT NULL DEFAULT '',
  `nama_siswa` varchar(255) NOT NULL DEFAULT '',
  `nama_lembaga` varchar(50) NOT NULL DEFAULT '',
  `tahun_berdiri` varchar(20) NOT NULL DEFAULT '',
  `akreditasi` varchar(40) NOT NULL DEFAULT '',
  `periode` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembiayaan` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT 0,
  `upload_file1` varchar(255) NOT NULL DEFAULT '',
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT NULL,
  `upload_file10` varchar(255) DEFAULT NULL,
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `informasi_tambahan` text DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (28,0,'Ibrahim Ahmad','Internal','Universitas','khidir','Universitas Budi Luhur','1996','A','2016 - 2021','Supaya bisa kuliah',0,'8785205_ML.jpg','9469640_ML.jpg','11861127_ML.jpg','11913347_ML.jpg','12450825_ML.jpg','13113112_ML.jpg','13160727_ML.jpg','17298849_ML.jpg','19583854_ML.jpg','22886363_ML.jpg',2,' ',7,4,'2019-08-01 10:46:52','2019-08-07 07:59:19'),(29,0,'Ramdan Darmawan','Eksternal','Universitas','aHMAD jABRIN','Universitas Budi Luhur','1996','A','2016 - 2021','Supaya bisa mendapat pekerjaan',0,'91201975_ML.jpg','89480959_ML.jpg','89457932_ML.jpg','87901200_ML.jpg','86182968_ML.jpg','83200817_ML.jpg','82876449_ML.jpg','81562729_ML.jpg','DailySocial_Startup_Report_2018.pdf','Content.xlsx',0,'     ',7,4,'2019-08-01 10:51:42','2019-08-08 03:41:55'),(30,0,'Don Aria Sabda','Eksternal','Universitas','','Universitas Indonesia','1996','B','1990-1991','Pekerjaan Cerah',0,'81562729_ML1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'',7,4,'2019-08-01 10:57:44','2019-08-01 10:57:44'),(31,0,'Meyraldi Rizky Saputra','Eksternal','Lainnya','','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML.jpg','23355853_ML.jpg','11913347_ML1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',7,4,'2019-08-01 11:05:10','2019-08-01 11:05:10'),(32,0,'Meyraldi Rizky Saputra','Eksternal','Lainnya','','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML1.jpg','23355853_ML1.jpg','11913347_ML2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',7,4,'2019-08-01 11:06:27','2019-08-01 11:06:27'),(33,0,'Meyraldi Rizky Saputra','Eksternal','Lainnya','Ahmad Jabar','UPH','1995','F','2017 - 2018','Pekerjaan Cerah',900000000,'31589143_ML2.jpg','23355853_ML2.jpg','11913347_ML3.jpg','UMRAH_9_HARI_(1).xlsx','UMRAH_9_HARI.xlsx','DigitalMarketing.xlsx','Thirdparty.xlsx','pictogram_ihram.png','20190228_163224.jpg','20190228_163236.jpg',0,'   ',7,4,'2019-08-01 11:09:03','2019-08-08 04:52:08'),(34,0,'Ahmad Jabar','Eksternal','Lainnya','','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML3.jpg','23355853_ML3.jpg','11913347_ML4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'',7,4,'2019-08-01 11:10:33','2019-08-01 11:10:33');

#
# Structure for table "tb_nst"
#

DROP TABLE IF EXISTS `tb_nst`;
CREATE TABLE `tb_nst` (
  `id_nst` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(255) NOT NULL DEFAULT '0',
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `produk` varchar(255) NOT NULL DEFAULT '',
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT '',
  `upload_file9` varchar(255) DEFAULT '',
  `upload_file10` varchar(255) DEFAULT '',
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nst`),
  UNIQUE KEY `lead_id` (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tb_nst"
#

INSERT INTO `tb_nst` VALUES (1,'ahbdjsasdsaddcvd','Muhammad Alvin Prayoga','My Ihram','20190228_163224.jpg','20190228_163236.jpg',NULL,NULL,NULL,NULL,NULL,'','','',3,7,4,'2019-08-08 10:46:52','2019-08-08 10:49:22');

#
# Structure for table "tb_ticket"
#

DROP TABLE IF EXISTS `tb_ticket`;
CREATE TABLE `tb_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_ticket"
#


#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `nik` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(25) NOT NULL DEFAULT '',
  `level` int(2) NOT NULL DEFAULT 0 COMMENT '1 = cabang user, 2 = admin 1 (lia), 3  = admin 2 (gede), 4 = admin nst (arif), 5 = super user (atasan)',
  `is_active` int(2) NOT NULL DEFAULT 0,
  `id_cabang` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Lia','200001','admin1','admin1@admin.com','admin1',2,1,46),(2,'Gede Laroiba','200002','admin2','admin2@admin.com','admin2',3,1,46),(4,'Ibrahim Ahmad','832831','ibrahim','ibrahim.ahmadd98@gmail.com','iNs7n6G\'',1,1,7),(11,'Okky Aditya','200003','okky','okky@user.com','okky',1,0,7),(12,'Adit','200005','adit','adit@adit.com','adit',1,1,6),(13,'Saiful Bahri','200006','saiful','saiful@bfi.co.id','saiful',1,0,15),(14,'Salman Al Farisi','200007','salman','salman@bfi.co.id','salman',1,0,2),(15,'User','200008','user','user@app.com','user',1,1,39),(16,'Maulana Arif Kuncoro','200009','arif','arif@bfi.co.id','arif',4,1,46),(17,'Atasan','200010','superuser','superuser@bfi.co.id','superuser',5,1,46),(19,'Ramdan Darmawan','200011','ramdan12','ramdan.darmawan16@gmail.com','pcmaster12',1,0,45);
