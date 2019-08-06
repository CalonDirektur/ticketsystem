# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-08-06 08:22:00
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_aktivasi_agent"
#

DROP TABLE IF EXISTS `tb_aktivasi_agent`;
CREATE TABLE `tb_aktivasi_agent` (
  `id_agent` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT '0',
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
  `id_approval` int(2) NOT NULL DEFAULT '0' COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_agent`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_aktivasi_agent"
#

INSERT INTO `tb_aktivasi_agent` VALUES (3,0,'Mossad Agent','Syariah Agent','31589143_ML.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,7,4,'2019-08-01 11:47:45','2019-08-01 11:47:45');

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
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `id_user` int(6) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
#

INSERT INTO `tb_comment` VALUES (104,0,'Komentar mytalim id 34',4,'2019-08-01 16:11:16',34,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(105,104,'Reply komentar mytalim id 34',4,'2019-08-01 16:11:29',34,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(106,0,'Komentar mytalim id 33',4,'2019-08-01 16:12:40',33,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(107,106,'reply keomentar mytalim id 33',4,'2019-08-01 16:12:50',33,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(108,0,'Komentar mytalim id 32',4,'2019-08-01 16:13:12',32,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(109,108,'Reply komentar mytalim id 32',4,'2019-08-01 16:13:25',32,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(110,0,'komentar my hajat renovasi id 14',4,'2019-08-01 16:18:51',NULL,14,NULL,NULL,NULL,NULL,0,0,0,0,0),(111,110,'reply komentar my hajat renovasi id 14',4,'2019-08-01 16:18:59',NULL,14,NULL,NULL,NULL,NULL,0,0,0,0,0),(112,0,'komentar my safar id 7',4,'2019-08-01 16:35:56',NULL,NULL,NULL,NULL,NULL,NULL,7,0,0,0,0),(113,112,'reply komentar my safar id 7',4,'2019-08-01 16:36:02',NULL,NULL,NULL,NULL,NULL,NULL,7,0,0,0,0),(114,0,'komentar my ihram id 7',4,'2019-08-01 16:36:20',NULL,NULL,NULL,NULL,NULL,NULL,0,7,0,0,0),(115,114,'reply komentar my ihram id 7',4,'2019-08-01 16:36:59',NULL,NULL,NULL,NULL,NULL,NULL,0,7,0,0,0),(116,0,'komentar aktivasi_agent id 3',4,'2019-08-01 16:48:24',NULL,NULL,NULL,NULL,NULL,NULL,0,0,3,0,0),(117,116,'reply komentar aktivasi_agent id 3',4,'2019-08-01 16:48:32',NULL,NULL,NULL,NULL,NULL,NULL,0,0,3,0,0),(118,116,'Komen admin 1',1,'2019-08-01 16:49:14',NULL,NULL,NULL,NULL,NULL,NULL,0,0,3,0,0),(119,0,'komentar mytalim id 28',4,'2019-08-03 10:17:12',28,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(120,119,'reply keomentar mytalim id 28',4,'2019-08-03 10:17:21',28,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0);

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
  `lead_id` varchar(255) NOT NULL DEFAULT '',
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `ktp_konsumen` varchar(16) NOT NULL DEFAULT '',
  `sumber_lead` varchar(255) NOT NULL DEFAULT '',
  `nama_pemberi_lead` varchar(255) NOT NULL DEFAULT '',
  `produk` varchar(255) NOT NULL DEFAULT '',
  `object_price` varchar(255) NOT NULL DEFAULT '',
  `tahap_reject` varchar(255) NOT NULL DEFAULT '',
  `tipe_pefindo` varchar(255) NOT NULL DEFAULT '',
  `max_past_due` int(11) NOT NULL DEFAULT '0',
  `dsr` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) DEFAULT '',
  `sla_branch` varchar(255) NOT NULL DEFAULT '',
  `cabang_survey` varchar(255) NOT NULL DEFAULT '',
  `informasi_tambahan` text,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_lead`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "tb_lead_management"
#

INSERT INTO `tb_lead_management` VALUES (4,'089618819905','Ibrahim Ahmad Jabar Khaidiru Sobari','3603222007980001','Website BFI Syariah','Leeds United','My Hajat','780000000','','',0,'','','','',NULL,'2019-08-01 11:38:25','2019-08-01 11:38:25',0,7,4),(5,'089618819905','Ibrahim Ahmad Jabar Khaidiru Sobari','3603222007980001','Tour & Travel / Penyedia Jasa','Leeds United','My Ihram','9870000000','','',0,'','','','',NULL,'2019-08-01 11:40:41','2019-08-01 11:40:41',0,7,4);

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
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_my_hajat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#

INSERT INTO `tb_my_hajat` VALUES (1,14,NULL,NULL,NULL,NULL,7,4),(2,NULL,7,NULL,NULL,NULL,7,4),(3,NULL,NULL,12,NULL,NULL,7,4),(4,NULL,NULL,NULL,NULL,4,7,4),(5,NULL,NULL,NULL,5,NULL,7,4),(11,NULL,11,NULL,NULL,NULL,7,4),(12,15,NULL,NULL,NULL,NULL,7,0),(13,NULL,NULL,NULL,6,NULL,39,15),(14,NULL,NULL,13,NULL,NULL,6,12),(15,16,NULL,NULL,NULL,NULL,7,4);

#
# Structure for table "tb_my_hajat_franchise"
#

DROP TABLE IF EXISTS `tb_my_hajat_franchise`;
CREATE TABLE `tb_my_hajat_franchise` (
  `id_franchise` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT '0',
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_franchise` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nama Franchise',
  `jumlah_cabang` int(11) NOT NULL DEFAULT '0' COMMENT 'Jumlah Cabang Yang Dimiliki',
  `jenis_franchise` varchar(50) NOT NULL DEFAULT '' COMMENT 'Jenis Franchise',
  `tahun_berdiri_franchise` varchar(255) NOT NULL DEFAULT '' COMMENT 'Tahun Berdiri Franchise',
  `harga_franchise` int(11) NOT NULL DEFAULT '0' COMMENT 'Harga Franchise',
  `jangka_waktu_franchise` varchar(255) NOT NULL DEFAULT '' COMMENT 'Jangka Waktu Franchise',
  `akun_sosmed_website` varchar(255) NOT NULL DEFAULT '' COMMENT 'Akun Media Sosial / Website Franchise',
  `informasi_tambahan` text,
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
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_franchise`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#

INSERT INTO `tb_my_hajat_franchise` VALUES (5,0,'Ibrahim Ahmad Jabar Khaidiru Sobari','Internal','Teguk!',34,'Makanan dan Minuman','2010',2000000000,'Jangka Tertentu','teguk.com','','47132430_ML1.jpg','33483397_ML1.jpg','81269321_ML.jpg','80219613_ML1.jpg','83200817_ML1.jpg','22886363_ML1.jpg','13113112_ML.jpg','32054662_ML1.jpg','28085868_ML1.jpg','35783638_ML.jpg','2019-08-01 11:29:39','2019-08-01 11:29:39',1,7,4),(6,0,'Adam Ghufron','Eksternal','Adam Es Krim',20,'Makanan dan Minuman','2019',2147483647,'Selamanya','www.adam.com','adam ghufronaka robbana','Salinan_dari_Julio_Andreas3.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-05 16:34:35','2019-08-05 16:34:35',0,39,15);

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
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT '0',
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
  `id_approval` int(11) NOT NULL DEFAULT '0',
  `id_ticket` int(11) DEFAULT '0',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_myhajat_lainnya`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_lainnya"
#

INSERT INTO `tb_my_hajat_lainnya` VALUES (4,'Mark Freaking Zuckerberg','Eksternal','Warung Pintar Smart','Perorangan',95000000,'Warung pintar sudah smart','28085868_ML2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'33483397_ML2.jpg','2019-08-01 11:33:20',NULL,2,0,7,4);

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
  `jumlah_pekerja` int(11) NOT NULL DEFAULT '0',
  `estimasi_waktu` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT '0',
  `informasi_tambahan` text,
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
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_approval` int(11) NOT NULL DEFAULT '0',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_ticket` int(5) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_renovasi`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (14,'Muhammad Aditya Putratama','Eksternal','Renovasi.com','Badan Usaha','Badan Usaha','Ruang Tamu','90 m2',50,'3 bulan',5000000000,'','17298849_ML.jpg','19583854_ML.jpg','22886363_ML.jpg','23355853_ML.jpg','25256930_ML.jpg','25256930_ML1.jpg','26355048_ML.jpg','26355095_ML.jpg','27233357_ML.jpg','28085868_ML.jpg','2019-08-01 11:15:10','2019-08-01 16:55:31',1,7,0,4),(15,'Fengki Prayoga','Eksternal','Reparasi.com','Badan Usaha','Badan Usaha','Semuanya','2000 x 2000',125,'9 Minggu',7000000000,'mantep lah pokonya','Salinan_dari_Julio_Andreas1.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-04 17:21:20','2019-08-04 17:21:20',0,7,0,4),(16,'JC Denton','Internal','Rockstar','Badan Usaha','Badan Usaha','Apa Aja','90 90',2050,'9 Hari',9000000000,'asdasda','FTI_Logo-e1501236146929.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-05 18:49:51','2019-08-05 18:49:51',0,7,0,4);

#
# Structure for table "tb_my_hajat_sewa"
#

DROP TABLE IF EXISTS `tb_my_hajat_sewa`;
CREATE TABLE `tb_my_hajat_sewa` (
  `id_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT '0',
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_pemilik` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Pemilik Rumah / Ruko',
  `jenis_pemilik` varchar(255) NOT NULL DEFAULT '' COMMENT 'Jenis Pemilik Rumah / Ruko',
  `hubungan_pemohon` varchar(255) NOT NULL DEFAULT '' COMMENT 'Hubungan Dengan Pemohon',
  `luas_panjang` varchar(255) DEFAULT NULL COMMENT 'Luas dan Panjang bangunan (panjang x lebar)',
  `biaya_tahunan` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Biaya Sewa per Tahun',
  `id_approval` int(11) NOT NULL DEFAULT '0',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `informasi_tambahan` text,
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

INSERT INTO `tb_my_hajat_sewa` VALUES (7,0,'Mochamad Ifal Alfarizah','Eksternal','James Riyadi','Perorangan','Bos','100 x 100',2147483647,1,7,'','31589143_ML.jpg','8785205_ML.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-01 11:22:23','2019-08-01 11:22:23',4),(8,0,'Ahmad Jabar','Eksternal','James Riyadi','Perorangan','Bos','70 x 70',9000000,0,7,'error','37244050_ML1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-03 05:31:21','2019-08-03 05:34:18',4),(9,0,'Ibrahim Ahmad Jabar Khaidiru Sobari','Internal','Ibra Jabar','Perorangan','Kerabat','100 x 100',8000000000,0,7,'asd','32620597_ML.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-03 05:44:33','2019-08-03 05:44:33',4),(10,0,'Julio Andreas','Eksternal','Aji Saputra','Perorangan','Sahabat Dekat','90 x 90',8000000000,0,7,'Aji sangat dekat dengan julio andreas','Salinan_dari_Julio_Andreas.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-04 17:10:25','2019-08-04 17:10:25',4),(11,0,'Aji Saputra','Eksternal','Julio Andreas','Perorangan','Sahabat Dekat','90 x 90',9000000000,0,7,'wkwkwkkwk','profile_CV.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-04 17:16:32','2019-08-04 17:16:32',4),(12,0,'Bayu Alit','Internal','Ahmad Baehaqi','Perusahaan/Badan Usaha','Bapak ke temen','90 x 90',9000000000,0,39,'wkwkwkwkwkw','profile_CV1.jpg','Salinan_dari_Julio_Andreas2.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-05 16:29:40','2019-08-05 16:29:40',15);

#
# Structure for table "tb_my_hajat_wedding"
#

DROP TABLE IF EXISTS `tb_my_hajat_wedding`;
CREATE TABLE `tb_my_hajat_wedding` (
  `id_wedding` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT '0',
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_wo` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Wedding Organizer',
  `jenis_wo` varchar(50) NOT NULL DEFAULT '' COMMENT 'Jenis Wedding Organizer',
  `lama_berdiri` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lama Usaha Berdiri',
  `jumlah_biaya` int(11) NOT NULL DEFAULT '0' COMMENT 'Jumlah Biaya Acara',
  `jumlah_undangan` int(11) NOT NULL DEFAULT '0' COMMENT 'Jumlah Undangan',
  `akun_sosmed` varchar(50) NOT NULL DEFAULT '' COMMENT 'Akun Media Sosial WO',
  `informasi_tambahan` text,
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
  `id_cabang` int(11) NOT NULL DEFAULT '0' COMMENT 'Foreign Key dari tb_cabang',
  `id_approval` int(11) NOT NULL DEFAULT '0' COMMENT 'ID status approval tiket',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_wedding`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (12,0,'Edward Asyrof Odek','Internal','Wedding Bahagia','Prewedding photo','5 tahun',800000000,1500,'@wedding_bahagia','','9469640_ML.jpg','32054662_ML.jpg','37244050_ML.jpg','47132430_ML.jpg','55942125_ML.jpg','80219613_ML.jpg','83200817_ML.jpg','33483397_ML.jpg','23355853_ML1.jpg','81562729_ML.jpg','2019-08-01 11:26:46','2019-08-01 11:26:46',7,1,4),(13,0,'Samir Nasri','Eksternal','Wedding Bahagia','Perusahaan/Badan Usaha','9 tahun',90000000,900,'@wedding_bahagia','wedding organizer','nature-best-wallpapers-landscape-images-193809.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-05 16:51:15','2019-08-05 16:51:15',6,0,12);

#
# Structure for table "tb_my_ihram"
#

DROP TABLE IF EXISTS `tb_my_ihram`;
CREATE TABLE `tb_my_ihram` (
  `id_myihram` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT '0',
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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` varchar(255) DEFAULT 'NULL',
  `id_approval` int(2) NOT NULL DEFAULT '0' COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
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
  `id_ticket` int(5) NOT NULL DEFAULT '0',
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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` varchar(255) DEFAULT 'NULL',
  `id_approval` int(2) NOT NULL DEFAULT '0' COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_mysafar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_safar"
#

INSERT INTO `tb_my_safar` VALUES (7,0,'Ibrahim','Eksternal','Safar Travel','32620597_ML.jpg','32900260_ML.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-01 16:56:39','2019-08-01 11:35:37',1,7,4);

#
# Structure for table "tb_my_talim"
#

DROP TABLE IF EXISTS `tb_my_talim`;
CREATE TABLE `tb_my_talim` (
  `id_mytalim` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(5) NOT NULL DEFAULT '0',
  `nama_konsumen` varchar(40) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(40) NOT NULL DEFAULT '',
  `pendidikan` varchar(50) NOT NULL DEFAULT '',
  `nama_lembaga` varchar(50) NOT NULL DEFAULT '',
  `tahun_berdiri` varchar(20) NOT NULL DEFAULT '',
  `akreditasi` varchar(40) NOT NULL DEFAULT '',
  `periode` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembiayaan` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT '0',
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
  `id_approval` int(2) NOT NULL DEFAULT '0' COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `informasi_tambahan` text,
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (28,0,'Ibrahim Ahmad','Internal','Universitas','Universitas Budi Luhur','1996','A','2016 - 2021','Supaya bisa kuliah',0,'8785205_ML.jpg','9469640_ML.jpg','11861127_ML.jpg','11913347_ML.jpg','12450825_ML.jpg','13113112_ML.jpg','13160727_ML.jpg','17298849_ML.jpg','19583854_ML.jpg','22886363_ML.jpg',2,'',7,4,'2019-08-01 10:46:52','2019-08-01 10:46:52'),(29,0,'Ramdan Darmawan','Eksternal','Universitas','Universitas Budi Luhur','1996','A','2016 - 2021','Supaya bisa mendapat pekerjaan',0,'91201975_ML.jpg','89480959_ML.jpg','89457932_ML.jpg','87901200_ML.jpg','86182968_ML.jpg','83200817_ML.jpg','82876449_ML.jpg','81562729_ML.jpg','81269321_ML.jpg','81269321_ML1.jpg',2,'',7,4,'2019-08-01 10:51:42','2019-08-01 10:51:42'),(30,0,'Don Aria Sabda','Eksternal','Universitas','Universitas Indonesia','1996','B','1990-1991','Pekerjaan Cerah',0,'81562729_ML1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'',7,4,'2019-08-01 10:57:44','2019-08-01 10:57:44'),(31,0,'Meyraldi Rizky Saputra','Eksternal','Lainnya','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML.jpg','23355853_ML.jpg','11913347_ML1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'',7,4,'2019-08-01 11:05:10','2019-08-01 11:05:10'),(32,0,'Meyraldi Rizky Saputra','Eksternal','Lainnya','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML1.jpg','23355853_ML1.jpg','11913347_ML2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'',7,4,'2019-08-01 11:06:27','2019-08-01 11:06:27'),(33,0,'Meyraldi Rizky Saputra','Eksternal','Lainnya','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML2.jpg','23355853_ML2.jpg','11913347_ML3.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'',7,4,'2019-08-01 11:09:03','2019-08-01 11:09:03'),(34,0,'Ahmad Jabar','Eksternal','Lainnya','UPH','1995','C','2017 - 2018','Pekerjaan Cerah',0,'31589143_ML3.jpg','23355853_ML3.jpg','11913347_ML4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'',7,4,'2019-08-01 11:10:33','2019-08-01 11:10:33');

#
# Structure for table "tb_nst"
#

DROP TABLE IF EXISTS `tb_nst`;
CREATE TABLE `tb_nst` (
  `id_nst` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL DEFAULT '0',
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
  `id_approval` int(2) NOT NULL DEFAULT '0' COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `id_cabang` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nst`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_nst"
#


#
# Structure for table "tb_ticket"
#

DROP TABLE IF EXISTS `tb_ticket`;
CREATE TABLE `tb_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL DEFAULT '0',
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
  `level` int(2) NOT NULL DEFAULT '0' COMMENT '1 = cabang user, 2 = admin 1 (lia), 3  = admin 2 (gede), 4 = admin nst (arif), 5 = super user (atasan)',
  `is_active` int(2) NOT NULL DEFAULT '0',
  `id_cabang` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Lia','200001','admin1','admin1@admin.com','admin1',2,1,46),(2,'Gede Laroiba','200002','admin2','admin2@admin.com','admin2',3,1,46),(4,'Ibrahim Ahmad','832831','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,1,7),(11,'Okky Aditya','200003','okky','okky@user.com','okky',1,0,7),(12,'Adit','200005','adit','adit@adit.com','adit',1,1,6),(13,'Saiful Bahri','200006','saiful','saiful@bfi.co.id','saiful',1,0,15),(14,'Salman Al Farisi','200007','salman','salman@bfi.co.id','salman',1,0,2),(15,'User','200008','user','user@app.com','user',1,1,39),(16,'Maulana Arif Kuncoro','200009','arif','arif@bfi.co.id','arif',4,1,46),(17,'Atasan','200010','superuser','superuser@bfi.co.id','superuser',5,1,46),(19,'Ramdan Darmawan','200011','ramdan12','ramdan.darmawan16@gmail.com','pcmaster12',1,0,45);
