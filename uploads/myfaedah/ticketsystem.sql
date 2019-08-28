# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-08-16 17:16:22
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_aktivasi_agent"
#

DROP TABLE IF EXISTS `tb_aktivasi_agent`;
CREATE TABLE `tb_aktivasi_agent` (
  `id_agent` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tb_aktivasi_agent"
#

INSERT INTO `tb_aktivasi_agent` VALUES (7,'Agent BIN','Syariah Ambassador','39648233_ML_200x3502.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,7,4,'2019-08-14 06:12:52','2019-08-14 06:20:40'),(8,'Agent BIN','Syariah Point','39648233_ML_200x350.jpg','85597299_ML_200x350.jpg','85597299_ML_200x3501.jpg','39648233_ML_200x3501.jpg','85597299_ML_200x3502.jpg',NULL,NULL,NULL,NULL,NULL,3,7,4,'2019-08-14 06:14:06','2019-08-14 06:20:31'),(9,'Agent BIN','Syariah Agent','14613779_ML200.jpg','85597299_ML_200x3503.jpg',NULL,NULL,NULL,NULL,'39648233_ML_200x3503.jpg',NULL,NULL,NULL,3,7,4,'2019-08-14 06:20:59','2019-08-14 06:20:59');

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
  `id_mysafar` int(11) DEFAULT 0,
  `id_myihram` int(11) DEFAULT 0,
  `id_agent` int(11) DEFAULT 0,
  `id_nst` int(11) DEFAULT 0,
  `id_lead` int(11) DEFAULT NULL,
  `id_mitra_kerjasama` int(11) DEFAULT NULL,
  `id_mycars` int(11) DEFAULT NULL,
  `id_myfaedah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
#

INSERT INTO `tb_comment` VALUES (133,0,'yes sir',4,'2019-08-15 13:32:32',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,10,NULL,0),(134,133,'what are u talking about?',1,'2019-08-15 13:33:49',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,10,NULL,0),(135,0,'franchise id 11',1,'2019-08-16 13:57:39',NULL,NULL,NULL,NULL,11,NULL,0,0,0,0,NULL,NULL,NULL,NULL),(136,135,'ok id 11',1,'2019-08-16 13:57:46',NULL,NULL,NULL,NULL,11,NULL,0,0,0,0,NULL,NULL,NULL,NULL),(137,0,'komentar id 54',4,'2019-08-16 14:08:27',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,NULL,25,NULL),(138,137,'okok',4,'2019-08-16 14:08:34',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,NULL,25,NULL),(139,137,'okok',4,'2019-08-16 14:08:39',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,NULL,25,NULL),(140,0,'okok',4,'2019-08-16 14:09:21',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,NULL,NULL,26),(141,140,'komentar id 53',4,'2019-08-16 14:09:52',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,NULL,NULL,NULL,26);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Data for table "tb_lead_management"
#

INSERT INTO `tb_lead_management` VALUES (19,'Cross-Branch','3','sad','123','lead082297118173','Ihram Romli Ahmad Saputra','Agent','France','My Ihram','213','','',0,'','','','',NULL,'2019-08-14 06:11:50','2019-08-14 06:12:00',0,7,4),(20,'Cross-Branch','4','Ibrahim Ahmad Jabar','123','lead082297118172','Ihram Romli Ahmad Saputra','Tour & Travel / Penyedia Jasa','France','My Ihram','123','Pefindo Checking','DRS>70%',2,'DSR','Approve','SLA','Survey','','2019-08-14 06:12:36','2019-08-16 10:00:29',3,7,4),(21,'Cross-Branch','14','Ibrahim Ahmad Jabar','123','201909SLOS123456','Ahmad Jabar Saputra','Digital Marketing','France','My CarS','900000000','Pefindo Checking','DSR>125%',90,'DSR','Approve','SLA Branch','Survey Cabang','Oke siap','2019-08-16 14:40:03','2019-08-16 14:42:51',3,7,4);

#
# Structure for table "tb_mitra_kerjasama"
#

DROP TABLE IF EXISTS `tb_mitra_kerjasama`;
CREATE TABLE `tb_mitra_kerjasama` (
  `id_mitra_kerjasama` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mitra` varchar(255) NOT NULL DEFAULT '',
  `jenis_mitra` varchar(255) NOT NULL DEFAULT '',
  `bidang_usaha` varchar(255) NOT NULL DEFAULT '',
  `sosial_media` varchar(255) NOT NULL DEFAULT '',
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
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mitra_kerjasama`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_mitra_kerjasama"
#

INSERT INTO `tb_mitra_kerjasama` VALUES (10,'Mitre kukar','Perorangan','bidang usaha','@sosmeddot','IMG-20180301-WA0028_(2).jpg','IMG-20180301-WA0029_(1).jpg','IMG-20180301-WA0029_(1)1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,7,4,'2019-08-15 11:38:26','2019-08-16 16:29:59');

#
# Structure for table "tb_my_cars"
#

DROP TABLE IF EXISTS `tb_my_cars`;
CREATE TABLE `tb_my_cars` (
  `id_mycars` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_vendor` varchar(255) NOT NULL DEFAULT '',
  `jenis_vendor` varchar(255) NOT NULL DEFAULT '',
  `lama_usaha` varchar(255) NOT NULL DEFAULT '',
  `nama_mobil` varchar(255) NOT NULL DEFAULT '',
  `kondisi_mobil` varchar(255) NOT NULL DEFAULT '',
  `merek_mobil` varchar(255) NOT NULL DEFAULT '',
  `transmisi` varchar(255) NOT NULL DEFAULT '',
  `tahun` varchar(255) NOT NULL DEFAULT '',
  `harga_mobil` bigint(20) NOT NULL DEFAULT 0,
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
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_mycars`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_cars"
#

INSERT INTO `tb_my_cars` VALUES (24,'Ibra','Eksternal','vendor.com','Perorangan','','','','','','',0,'sadsa','023fbaf7-d185-42a3-9989-d50ea8ba3e621.jpg','steam_error_22.PNG','UPIH_RAHAYU_SRI_REJEKI1.PNG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:06:52','2019-08-14 15:46:13',1,7,4),(25,'Maulana Arif Kuncoro','Eksternal','Cars Vendoris','Perorangan','10 tahun','Mobil Vendor','Baru','Toyota','MT','1900',90000000000,'noob','26345152_ML_800x4001.jpg','IMG-20180301-WA0029_(1)1.jpg','IMG-20180301-WA0027_(2).jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-16 10:06:18','2019-08-16 14:38:28',0,7,4),(26,'Kasbon','Eksternal','My cars','Badan Usaha','6 Tahun','Si Merah','Baru','Ferrari','MT','12312',21312312321312,'sad','IMG-20180301-WA0029_(1)2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-16 10:16:08','2019-08-16 14:36:46',1,7,4);

#
# Structure for table "tb_my_faedah"
#

DROP TABLE IF EXISTS `tb_my_faedah`;
CREATE TABLE `tb_my_faedah` (
  `id_myfaedah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_vendor` varchar(255) NOT NULL DEFAULT '',
  `jenis_vendor` varchar(255) NOT NULL DEFAULT '',
  `lama_usaha` varchar(255) NOT NULL DEFAULT '',
  `nama_barang` varchar(255) NOT NULL DEFAULT '',
  `kondisi_barang` varchar(255) NOT NULL DEFAULT '',
  `jumlah_barang` int(11) NOT NULL DEFAULT 0,
  `merek_barang` varchar(255) NOT NULL DEFAULT '',
  `warna_barang` varchar(255) NOT NULL DEFAULT '',
  `tahun` varchar(255) NOT NULL DEFAULT '',
  `harga_barang` bigint(20) NOT NULL DEFAULT 0,
  `tujuan_pembelian` varchar(255) DEFAULT 'NULL',
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
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_myfaedah`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah"
#

INSERT INTO `tb_my_faedah` VALUES (24,'Ibra','Eksternal','vendor.com','Perorangan','','','',0,'','','',0,NULL,'sadsa','023fbaf7-d185-42a3-9989-d50ea8ba3e621.jpg','steam_error_22.PNG','UPIH_RAHAYU_SRI_REJEKI1.PNG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:06:52','2019-08-14 15:46:13',1,7,4),(25,'Ahmad Jabar Saputra','Eksternal','Vendor My Faedah','Perorangan','9 tahun','Pulpen','Bekas',200000,'Statler','biru','2109',3000000,'Produktif','sadasd','IMG-20180301-WA0029_(1).jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-16 09:45:53','2019-08-16 14:36:29',1,7,4),(26,'ibra','Eksternal','vendor','Badan Usaha','7 Tahun','31sd','Baru',12,'asd','asd','1998',1000000,'Konsumtif','asd','IMG-20180301-WA0028_(2).jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-16 09:48:18','2019-08-16 14:36:38',1,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#

INSERT INTO `tb_my_hajat` VALUES (40,24,NULL,NULL,NULL,NULL,7,4),(41,NULL,16,NULL,NULL,NULL,7,4),(42,NULL,NULL,18,NULL,NULL,7,4),(43,NULL,NULL,NULL,11,NULL,7,4),(44,NULL,NULL,NULL,12,NULL,7,4),(45,25,NULL,NULL,NULL,NULL,7,4);

#
# Structure for table "tb_my_hajat_franchise"
#

DROP TABLE IF EXISTS `tb_my_hajat_franchise`;
CREATE TABLE `tb_my_hajat_franchise` (
  `id_franchise` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_franchise` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nama Franchise',
  `jumlah_cabang` int(11) NOT NULL DEFAULT 0 COMMENT 'Jumlah Cabang Yang Dimiliki',
  `jenis_franchise` varchar(50) NOT NULL DEFAULT '' COMMENT 'Jenis Franchise',
  `tahun_berdiri_franchise` varchar(255) NOT NULL DEFAULT '' COMMENT 'Tahun Berdiri Franchise',
  `harga_franchise` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Harga Franchise',
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#

INSERT INTO `tb_my_hajat_franchise` VALUES (11,'sdf','Eksternal','213',213,'Hiburan & Hobi','213',213,'Selamanya','123','asd','26345152_ML_200x350.jpg',NULL,'14613779_ML_200x350.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:09:32','2019-08-14 06:09:32',0,7,4),(12,'asd','Eksternal','asd',213,'Makanan dan Minuman','213',23,'Selamanya','asd','213','14613779_ML200.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:10:37','2019-08-14 06:10:37',0,7,4);

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
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_myhajat_lainnya`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_lainnya"
#


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
  `jumlah_pekerja` varchar(11) NOT NULL DEFAULT '0',
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
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_renovasi`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (24,'Ibra','Eksternal','vendor.com','Perorangan','Harian','yayayayya','50 x 50','212','212',12,'sadsa','023fbaf7-d185-42a3-9989-d50ea8ba3e621.jpg','steam_error_22.PNG','UPIH_RAHAYU_SRI_REJEKI1.PNG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:06:52','2019-08-16 09:21:43',1,7,4),(25,'Ibrahim','Eksternal','Vendor.com','Badan Usaha','Harian','Bagian atap','90 x 90','210','7 hari',2500000,'oke','26345152_ML_800x400.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-16 13:53:23','2019-08-16 13:53:54',0,7,4);

#
# Structure for table "tb_my_hajat_sewa"
#

DROP TABLE IF EXISTS `tb_my_hajat_sewa`;
CREATE TABLE `tb_my_hajat_sewa` (
  `id_sewa` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_sewa"
#

INSERT INTO `tb_my_hajat_sewa` VALUES (16,'asd','Eksternal','213asd','Perorangan','rekan','123',2123,2,7,'asd','UPIH_RAHAYU_SRI_REJEKI2.PNG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:08:11','2019-08-14 06:08:11',4);

#
# Structure for table "tb_my_hajat_wedding"
#

DROP TABLE IF EXISTS `tb_my_hajat_wedding`;
CREATE TABLE `tb_my_hajat_wedding` (
  `id_wedding` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_wo` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Wedding Organizer',
  `jenis_wo` varchar(50) NOT NULL DEFAULT '' COMMENT 'Jenis Wedding Organizer',
  `lama_berdiri` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lama Usaha Berdiri',
  `jumlah_biaya` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Jumlah Biaya Acara',
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (18,'asd','Eksternal','awd','Perorangan','123fd',213,213,'123das','12asd','steam_error2.PNG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:08:41','2019-08-14 06:08:55',7,1,4);

#
# Structure for table "tb_my_ihram"
#

DROP TABLE IF EXISTS `tb_my_ihram`;
CREATE TABLE `tb_my_ihram` (
  `id_myihram` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_ihram"
#

INSERT INTO `tb_my_ihram` VALUES (11,'213','Eksternal','asd','85597299_ML_200x350.jpg','26345152_ML_200x350.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:11:03','2019-08-14 06:11:03',0,7,4);

#
# Structure for table "tb_my_safar"
#

DROP TABLE IF EXISTS `tb_my_safar`;
CREATE TABLE `tb_my_safar` (
  `id_mysafar` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_safar"
#

INSERT INTO `tb_my_safar` VALUES (12,'213','Internal','123','39648233_ML_200x350.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 06:11:21','2019-08-14 06:11:21',0,7,4);

#
# Structure for table "tb_my_talim"
#

DROP TABLE IF EXISTS `tb_my_talim`;
CREATE TABLE `tb_my_talim` (
  `id_mytalim` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (38,'Ahmad Jabar','Eksternal','Universitas','Ibrahim Ahmad Jabar','UI Luhur Tambal Ban','1998','A','2019','Uang Masuk & Keluar',50000000,'20190228_1632361.jpg','20190228_1632243.jpg','WhatsApp_Image_2019-05-20_at_11.10.09.jpeg','Ikhtisar_Data_Keuangan_Fintech_(P2P_Lending)_Periode_Desember_2018_(2).xlsx','9d8a81ba-73e0-4f21-88b2-64fb7c7186032.jpg','Ikhtisar_Data_Keuangan_Fintech_(P2P_Lending)_Periode_Desember_2018_(1).xlsx','Trifold_Flyer1.jpg','UMRAH_9_HARI1.xlsx','pictogram_ihram2.png','20190228_1632362.jpg',0,'    Tidak Ada',7,4,'2019-08-14 05:59:02','2019-08-15 08:33:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_nst"
#

INSERT INTO `tb_nst` VALUES (5,'lead082297118173','aasd','My Ta\'lim',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',2,7,4,'2019-08-14 06:14:21','2019-08-14 06:14:21'),(6,'lead087809974805','Ihram Romli Ahmad Saputra','My Safar','39648233_ML_200x350.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'','','',2,7,4,'2019-08-14 06:15:42','2019-08-14 06:15:42'),(7,'lead087809974804','Ihram Romli Ahmad Saputra','My Ihram','26345152_ML_200x350.jpg','39648233_ML_200x3501.jpg','85597299_ML_200x350.jpg',NULL,NULL,NULL,NULL,'','','',0,7,4,'2019-08-14 06:23:19','2019-08-14 06:25:29');

#
# Structure for table "tb_ticket"
#

DROP TABLE IF EXISTS `tb_ticket`;
CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_myfaedah` int(11) DEFAULT NULL,
  `id_mycars` int(11) DEFAULT NULL,
  `id_mitra_kerjasama` int(11) DEFAULT NULL,
  `id_mytalim` int(11) DEFAULT NULL,
  `id_mysafar` int(11) DEFAULT NULL,
  `id_myihram` int(11) DEFAULT NULL,
  `id_lead` int(11) DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `id_nst` int(11) DEFAULT NULL,
  `id_wedding` int(11) DEFAULT NULL,
  `id_sewa` int(11) DEFAULT NULL,
  `id_renovasi` int(11) DEFAULT NULL,
  `id_myhajat_lainnya` int(11) DEFAULT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_cabang` int(3) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_pending` timestamp NULL DEFAULT NULL,
  `date_approved` timestamp NULL DEFAULT NULL,
  `date_rejected` timestamp NULL DEFAULT NULL,
  `date_completed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

#
# Data for table "tb_ticket"
#

INSERT INTO `tb_ticket` VALUES (26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,17,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,7,4,NULL,NULL,NULL,NULL),(29,NULL,NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(30,NULL,NULL,NULL,NULL,NULL,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(33,NULL,NULL,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(34,NULL,NULL,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-14 23:34:17','2019-08-15 08:32:49','2019-08-15 08:29:56'),(35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,NULL,NULL,7,4,NULL,NULL,'2019-08-15 08:44:06',NULL),(36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,NULL,NULL,NULL,7,4,NULL,'2019-08-14 15:46:41','2019-08-14 15:46:41',NULL),(37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,NULL,NULL,NULL,NULL,7,4,NULL,NULL,'2019-08-14 15:52:30',NULL),(38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,7,4,NULL,NULL,NULL,NULL),(39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,7,4,NULL,NULL,NULL,NULL),(40,NULL,NULL,NULL,NULL,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(41,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(42,NULL,NULL,NULL,NULL,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(43,NULL,NULL,NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:25:15',NULL,'2019-08-16 14:25:25'),(45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:25:11',NULL,'2019-08-16 14:25:29'),(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:25:08',NULL,'2019-08-16 14:25:32'),(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(50,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-14 15:17:18','2019-08-14 15:17:18','2019-08-14 15:17:18','2019-08-14 15:17:18'),(51,NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 16:28:46','2019-08-16 16:29:18','2019-08-16 16:29:00'),(52,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:24:02','2019-08-16 14:36:29','2019-08-16 14:25:36'),(53,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:24:08','2019-08-16 14:36:38','2019-08-16 14:25:40'),(54,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:24:11','2019-08-16 14:36:43','2019-08-16 14:25:44'),(55,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,'2019-08-16 14:24:16','2019-08-16 14:36:46','2019-08-16 14:25:49'),(56,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,NULL,NULL,7,4,NULL,NULL,NULL,NULL),(57,NULL,NULL,NULL,NULL,NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4,NULL,NULL,NULL,NULL);

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
  `password` varchar(45) NOT NULL DEFAULT '',
  `level` int(2) NOT NULL DEFAULT 0 COMMENT '1 = cabang user, 2 = admin 1 (lia), 3  = admin 2 (gede), 4 = admin nst (arif), 5 = super user (atasan)',
  `is_active` int(2) NOT NULL DEFAULT 0,
  `id_cabang` int(3) NOT NULL DEFAULT 0,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Lia','200001','admin1','admin1@admin.com','e00cf25ad42683b3df678c61f42c6bda',2,1,46,'2019-08-16 15:50:53'),(2,'Gede Laroiba','200002','admin2','admin2@admin.com','c84258e9c39059a89ab77d846ddab909',3,1,46,'2019-08-16 15:50:53'),(4,'Ibrahim Ahmad','832831','ibrahim','ibrahim.ahmadd98@gmail.com','e4cb7cf6ac25db2ca4263563b50576ce',1,1,7,'2019-08-16 15:50:53'),(11,'Okky Aditya','200003','okky','okky@user.com','c821adbe2db2d35a30551480105cb919',1,1,7,'2019-08-16 15:50:53'),(12,'Adit','200005','adit','adit@adit.com','adit',1,1,6,'2019-08-16 15:50:53'),(13,'Saiful Bahri','200006','saiful','saiful@bfi.co.id','saiful',1,0,15,'2019-08-16 15:50:53'),(14,'Salman Al Farisi','200007','salman','salman@bfi.co.id','salman',1,0,2,'2019-08-16 15:50:53'),(15,'User','200008','user','user@app.com','user',1,1,39,'2019-08-16 15:50:53'),(16,'Maulana Arif Kuncoro','200009','arif','arif@bfi.co.id','0ff6c3ace16359e41e37d40b8301d67f',4,1,46,'2019-08-16 15:50:53'),(17,'Admin Superuser','200010','superuser','superuser@bfi.co.id','0baea2f0ae20150db78f58cddac442a9',5,1,46,'2019-08-16 15:50:53'),(19,'Ramdan Darmawan','200011','ramdan12','ramdan.darmawan16@gmail.com','pcmaster12',1,0,45,'2019-08-16 14:50:53');
