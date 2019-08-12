# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-08-10 21:23:21
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "tb_aktivasi_agent"
#

INSERT INTO `tb_aktivasi_agent` VALUES (5,'Agent BIN','Syariah Agent','Logo_OJK.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,7,4,'2019-08-10 09:40:08','2019-08-10 09:40:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
#

INSERT INTO `tb_comment` VALUES (125,0,'ditolak mytalim id 35',17,'2019-08-09 10:32:26',35,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0),(126,0,'maaf kesalahan',4,'2019-08-09 10:45:37',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,2,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Data for table "tb_lead_management"
#

INSERT INTO `tb_lead_management` VALUES (17,'In Branch',NULL,'','','lead087809974805','Ahmad Jabar Khaidir','Tour & Travel / Penyedia Jasa','France','My Ihram','2000000000','','',0,'','','','',NULL,'2019-08-10 09:39:23','2019-08-10 09:39:23',0,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#

INSERT INTO `tb_my_hajat` VALUES (31,22,NULL,NULL,NULL,NULL,7,4),(32,NULL,14,NULL,NULL,NULL,7,4),(33,NULL,NULL,16,NULL,NULL,7,4),(34,NULL,NULL,NULL,9,NULL,7,4),(35,NULL,NULL,NULL,NULL,9,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#

INSERT INTO `tb_my_hajat_franchise` VALUES (9,'Russel Johnson','Eksternal','Chicken Sogil',195,'Makanan dan Minuman','2011',19000000,'Jangka Tertentu','@sogil_id','Chicken Sogil So Gila! men','steam_error1.PNG','steam_error_21.PNG','Opera_Snapshot_2018-03-15_171223_www.tiket.com.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 09:11:50','2019-08-10 09:11:50',3,7,4);

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

INSERT INTO `tb_my_hajat_lainnya` VALUES (9,'Kang Ubay','Eksternal','Hadean Motor','Perorangan',9800000,'Ubay HM','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 09:14:01','2019-08-10 09:15:25',3,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (22,'Muhammad Alvan ','Eksternal','Vendor','Perorangan','Perorangan','Bagian-bagian','90 x 90','210','9 Minggu',9000000000,'Ya benar','IMG-20190125-WA0005.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 07:02:56','2019-08-10 16:49:04',3,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_sewa"
#

INSERT INTO `tb_my_hajat_sewa` VALUES (14,'Thor Odinson','Eksternal','Sewa','Perorangan','Sahabat','80 x 80',200000,3,7,'  sunday league','9d8a81ba-73e0-4f21-88b2-64fb7c718603.jpg','9d8a81ba-73e0-4f21-88b2-64fb7c7186031.jpg','5a952fc5-632e-4d2b-a95a-6f43dfad93c92.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 07:08:00','2019-08-10 07:09:15',4);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (16,'terserah','Eksternal','wedding','Perusahaan/Badan Usaha','9 tahun',3332343,810,'@wedding','','buku_rekening_kaka1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 07:10:30','2019-08-10 07:10:30',7,3,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_ihram"
#

INSERT INTO `tb_my_ihram` VALUES (9,'Ihram Romli Ahmad Saputra','Eksternal','Ihram Travel Saputra','Proposal_My_Talim.docx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 20:55:46','2019-08-10 15:55:46',0,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_safar"
#

INSERT INTO `tb_my_safar` VALUES (10,'Ahmad Safari','Eksternal','Safar Travel','Memo_-_Permohonan_Domain_Hosting.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-10 16:50:06','2019-08-10 09:35:38',3,7,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (36,'Muhammad Abdul Azis','Eksternal','Sekolah','Ibrahim Ahmad Jabar','Universitas besatu','1998','A','2018 - 2020','Uang masuk',5000000000,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'ya',7,4,'2019-08-10 06:41:32','2019-08-10 06:41:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_nst"
#

INSERT INTO `tb_nst` VALUES (3,'lead087809974805','Ahmad Jabar Khaidir','My Ta\'lim','5a952fc5-632e-4d2b-a95a-6f43dfad93c9.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'','','',0,7,4,'2019-08-10 10:07:44','2019-08-10 10:07:44');

#
# Structure for table "tb_ticket"
#

DROP TABLE IF EXISTS `tb_ticket`;
CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

#
# Data for table "tb_ticket"
#

INSERT INTO `tb_ticket` VALUES (13,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,22,NULL,NULL,7,4),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,7,4),(16,NULL,NULL,NULL,NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,7,4),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7,4),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,NULL,7,4),(19,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4),(20,NULL,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4),(21,NULL,NULL,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,4),(22,NULL,NULL,NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,7,4),(23,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,7,4);

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

INSERT INTO `user` VALUES (1,'Lia','200001','admin1','admin1@admin.com','admin1',2,1,46),(2,'Gede Laroiba','200002','admin2','admin2@admin.com','admin2',3,1,46),(4,'Ibrahim Ahmad','832831','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim123',1,1,7),(11,'Okky Aditya','200003','okky','okky@user.com','okky',1,0,7),(12,'Adit','200005','adit','adit@adit.com','adit',1,1,6),(13,'Saiful Bahri','200006','saiful','saiful@bfi.co.id','saiful',1,0,15),(14,'Salman Al Farisi','200007','salman','salman@bfi.co.id','salman',1,0,2),(15,'User','200008','user','user@app.com','user',1,1,39),(16,'Maulana Arif Kuncoro','200009','arif','arif@bfi.co.id','arif',4,1,46),(17,'Admin Supervisor','200010','superuser','superuser@bfi.co.id','superuser',5,1,46),(19,'Ramdan Darmawan','200011','ramdan12','ramdan.darmawan16@gmail.com','pcmaster12',1,0,45);
