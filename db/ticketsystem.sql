# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-07-29 19:09:36
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tb_aktivasi_agent"
#

INSERT INTO `tb_aktivasi_agent` VALUES (2,0,'KGB Agent','Syariah Ambassador',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,7,4,'2019-07-29 14:03:50','2019-07-29 14:03:50');

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

INSERT INTO `tb_cabang` VALUES (1,'Balikpapan Syariah'),(2,'Bandung Syariah'),(3,'Banjarmasin Syariah'),(4,'Batam Syariah'),(5,'Bekasi Syariah'),(6,'Bogor Syariah'),(7,'BSD Syariah'),(8,'Bukit Tinggi Syariah'),(9,'Cawang Syariah'),(10,'Cirebon Syariah'),(11,'Depok Syariah'),(12,'Gorontalo Syariah'),(13,'Gresik Syariah'),(14,'Jakarta Selatan Syariah'),(15,'Jakarta Utara Syariah'),(16,'Jambi Syariah'),(17,'Karawang Syariah'),(18,'Kediri Syariah'),(19,'Kendari Syariah'),(20,'Kudus Syariah'),(21,'Lampung Syariah'),(22,'Makassar Syariah'),(23,'Malang Syariah'),(24,'Mataram Syariah'),(25,'Medan Syariah'),(26,'Meruya Syariah'),(27,'Mojokerto Syariah'),(28,'Padang Syariah'),(29,'Palangkaraya Syariah'),(30,'Palembang Syariah'),(31,'Pekanbaru Syariah'),(32,'Pontianak Syariah'),(33,'Purwokerto Syariah'),(34,'Samarinda Syariah'),(35,'Semarang Syariah'),(36,'Sidoarjo Syariah'),(37,'Solo Syariah'),(38,'Sorong Syariah'),(39,'Sukabumi Syariah'),(40,'Sunter Syariah'),(41,'Surabaya Syariah'),(42,'Tangerang Syariah'),(43,'Tasikmalaya Syariah'),(44,'Ternate Syariah'),(45,'Yogyakarta Syariah'),(46,'Head Office Administrator');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
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
  PRIMARY KEY (`id_lead`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_lead_management"
#


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
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT '',
  `upload_file9` varchar(255) DEFAULT '',
  `upload_file10` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_franchise`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_ticket` int(11) DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT '',
  `upload_file9` varchar(255) DEFAULT '',
  `upload_file10` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_myhajat_lainnya`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `jumlah_pekerja` int(11) NOT NULL DEFAULT 0,
  `estimasi_waktu` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT '',
  `upload_file9` varchar(255) DEFAULT '',
  `upload_file10` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_renovasi`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#


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
  `biaya_tahunan` int(11) NOT NULL DEFAULT 0 COMMENT 'Biaya Sewa per Tahun',
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  `id_comment` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file8` varchar(255) DEFAULT '',
  `upload_file9` varchar(255) DEFAULT '',
  `upload_file10` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0 COMMENT 'Foreign Key dari tb_cabang',
  `id_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'ID status approval tiket',
  `id_user` int(11) NOT NULL,
  `upload_file8` varchar(255) DEFAULT '',
  `upload_file7` varchar(255) DEFAULT NULL,
  `upload_file6` varchar(255) DEFAULT NULL,
  `upload_file9` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_wedding`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#


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
  PRIMARY KEY (`id_myihram`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_ihram"
#

INSERT INTO `tb_my_ihram` VALUES (5,0,'Ibrahim Ahmad Jabar Khaidiru Sobari','Internal','Barahaya Travel','19_Agustus.png','11_Agustus.png',NULL,NULL,NULL,NULL,NULL,'','','',0,7,4,'2019-07-29 13:53:37','2019-07-29 14:00:01');

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
  PRIMARY KEY (`id_mysafar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_safar"
#

INSERT INTO `tb_my_safar` VALUES (5,0,'Sofiyatul Mahmudah','Eksternal','Astaghfirullah Company','18_Agustus.png','20_Agustus4.png','22_Agustus_a1.png','15_Agustus.png',NULL,NULL,NULL,'','','',0,7,4,'2019-07-29 14:02:46','2019-07-29 14:02:46');

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
  `nama_lembaga` varchar(50) NOT NULL DEFAULT '',
  `tahun_berdiri` varchar(20) NOT NULL DEFAULT '',
  `akreditasi` varchar(40) NOT NULL DEFAULT '',
  `periode` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembiayaan` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` varchar(40) NOT NULL DEFAULT '',
  `upload_file1` varchar(255) DEFAULT NULL,
  `upload_file2` varchar(255) DEFAULT NULL,
  `upload_file3` varchar(255) DEFAULT NULL,
  `upload_file4` varchar(255) DEFAULT NULL,
  `upload_file5` varchar(255) DEFAULT NULL,
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `informasi_tambahan` text DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#


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
  `level` int(2) NOT NULL DEFAULT 0,
  `id_cabang` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Lia','3603222007980010','admin1','admin1@admin.com','admin1',2,46),(2,'Gede Laroiba','3603222007980009','admin2','admin2@admin.com','admin2',3,46),(4,'Ibrahim Ahmad','3603222007980001','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,7),(11,'Okky Aditya','3603222007980008','okky','okky@user.com','okky',1,7),(12,'Adit','3603222007980007','adit','adit@adit.com','adit',1,6),(13,'Saiful Bahri','3603222007980002','saiful','saiful@bfi.co.id','saiful',1,15),(14,'Salman Al Farisi','3603222007980006','salman','salman@bfi.co.id','salman',1,2),(15,'User','3603222007980005','user','user@app.com','user',1,39);
