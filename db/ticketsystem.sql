# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-07-25 19:42:54
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "data"
#

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `hobi` varchar(255) DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL COMMENT '0 = belum review, 1 = gagal review, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `notif_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "data"
#

INSERT INTO `data` VALUES (1,'Ibrahim','puspitek','futsal',3,NULL),(2,'Ibrahim','puspitek','futsal',3,NULL),(3,'Achmad Baehaqi','Jl. Denpasar 1','Badminton',3,NULL),(4,'Lingga Asa Prabowo','BSD Square','tennis',1,NULL),(5,'Lulu Mujadidah','BPA Sektor 2','Photografi',3,NULL),(6,'Achmad Zaky','Jakarta Timur','Travelling',0,NULL),(7,'William Tanuwijaya','Tokopedia Tower','Bisnis',3,NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
#

INSERT INTO `tb_comment` VALUES (53,52,'data asal asalan',NULL,'2019-07-21 21:04:27',NULL,NULL,NULL,9,NULL,0),(54,52,'asdad',NULL,'2019-07-21 21:06:57',NULL,NULL,NULL,9,NULL,0),(55,52,'haha',3,'2019-07-21 21:07:53',NULL,NULL,NULL,9,NULL,0),(56,0,'Overseas',3,'2019-07-21 21:11:19',NULL,NULL,NULL,9,NULL,0),(57,56,'Foreign',3,'2019-07-21 21:11:27',NULL,NULL,NULL,9,NULL,0),(58,0,'Data lengkap mantep!',1,'2019-07-21 21:31:12',NULL,5,NULL,NULL,NULL,0),(59,0,'foto belum lengkap',1,'2019-07-22 09:07:38',9,NULL,NULL,NULL,NULL,0),(60,59,'iya akan ditangani segera bro sabar',4,'2019-07-22 09:09:57',9,NULL,NULL,NULL,NULL,0),(61,0,'Data belum saya bisa Saya approve maaf',1,'2019-07-22 13:30:05',12,NULL,NULL,NULL,NULL,0),(62,0,'Foto masih belum lengkap',1,'2019-07-23 11:25:24',9,NULL,NULL,NULL,NULL,0),(63,0,'asd',4,'2019-07-24 09:59:37',NULL,NULL,NULL,NULL,NULL,1),(64,63,'asd',4,'2019-07-24 09:59:44',NULL,NULL,NULL,NULL,NULL,1),(65,63,'baik',1,'2019-07-24 10:13:55',NULL,NULL,NULL,NULL,NULL,1),(66,63,'hehe',11,'2019-07-24 10:14:42',NULL,NULL,NULL,NULL,NULL,1),(67,0,'aasd',1,'2019-07-24 12:33:11',16,NULL,NULL,NULL,NULL,NULL),(68,0,'asdasd',1,'2019-07-25 10:13:56',NULL,NULL,NULL,10,NULL,NULL),(69,68,'apa sih gajelas',1,'2019-07-25 10:14:58',NULL,NULL,NULL,10,NULL,NULL),(70,0,'Tolong mas di review?',11,'2019-07-25 16:49:13',NULL,7,NULL,NULL,NULL,NULL),(71,70,'oke',1,'2019-07-25 16:49:34',NULL,7,NULL,NULL,NULL,NULL);

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
  `id_approval` int(2) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `keterangan_tiket` text DEFAULT NULL,
  `id_comment` int(11) NOT NULL DEFAULT 0,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `bukti_penghasilan` varchar(255) DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_franchise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#

INSERT INTO `tb_my_hajat_franchise` VALUES (2,0,'Ramdan Darmawan','Internal','Jamur Crispy',112,'Makanan dan Minuman','1990',50000000,'Selamanya','www.jamurcrispy.com','    asdasd',3,7,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0);

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
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_ticket` int(11) DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_myhajat_lainnya`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_lainnya"
#

INSERT INTO `tb_my_hajat_lainnya` VALUES (1,'Instagram','Internal','Tukang AC.com','Badan Usaha',9000000000,'Jasa servis Air Conditioning',2,0,7,0,NULL);

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
  `bagian_bangunan` varchar(255) NOT NULL DEFAULT '',
  `luas_bangunan` varchar(255) NOT NULL DEFAULT '',
  `jumlah_pekerja` int(11) NOT NULL DEFAULT 0,
  `estimasi_waktu` varchar(255) NOT NULL DEFAULT '',
  `nilai_pembiayaan` bigint(20) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `keterangan_tiket` text DEFAULT NULL,
  `id_ticket` int(5) NOT NULL DEFAULT 0,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `bukti_penghasilan` varchar(255) DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_renovasi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (5,'Ibrahim Ahmad Jabar Khaidiru Sobari','Internal','Tukang.com','Renovasi Bangunan','Atap, tembok','150 m2',50,'3 bulan',8388607,'',3,4,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0),(6,'Ahmad Jabar','Internal','Tukangmu','Jasa Kuli Bangunan','Tembok','250 m2',213,'6 bulan',100000,'',3,7,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0),(7,'Ramdan Darmawan','Internal','Tukangku','Renovasi Bangunan','Kantor','250 m2',50,'9 bulan',500000000000,'',0,7,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0);

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
  `keterangan_tiket` text DEFAULT NULL,
  `id_comment` int(11) NOT NULL DEFAULT 0,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `bukti_penghasilan` varchar(255) DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_sewa"
#

INSERT INTO `tb_my_hajat_sewa` VALUES (3,0,'Ibrahim Ahmad Jabar Khaidiru Sobari','Internal','Ibrahim Ahmad Jabar','Perorangan','Kerabat','90 x 90',234234,3,7,'  yagitu deh',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0);

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
  `id_cabang` int(11) NOT NULL DEFAULT 0 COMMENT 'Foreign Key dari tb_cabang',
  `id_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'ID status approval tiket',
  `informasi_tambahan` text DEFAULT NULL,
  `keterangan_tiket` text DEFAULT NULL,
  `id_comment` int(11) NOT NULL DEFAULT 0,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `bukti_penghasilan` varchar(255) DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_wedding`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (10,0,'Don Aria Sabda','Eksternal','Wedding Abadi','Prewedding shootout','5 tahun',9000000,90000123,'@wedding_wkwk',7,3,'Bismillah',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0),(11,0,'Don Aria Sabda','Internal','Wedding Abadi','Prewedding shootout','10 tahun',9000000,90000,'@wedding_wikwikiwk',7,0,' Tolong ini urgent ',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0);

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
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `bukti_penghasilan` varchar(255) DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `id_approval` int(2) NOT NULL DEFAULT 0 COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `keterangan_tiket` text DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_comment` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (9,0,'Ibrahim Ahmad Jabar Khaidiru Sobari','Internal','Universitas','Universitas Budi Luhur','1996','A','2018 - 2019','Supaya Bisa Mencari ilmu dan mencari berkah','15000000','Cheria2.jpg','1525352065377_scanner_20180219_211527.jpg','Ijazah_Belakang.jpg','panorama23.png','rahayu23.jpg',3,NULL,7,NULL,NULL,0),(12,0,'Ramdan Darmawan','Eksternal','Kursus','Hacktiv8','1990','A','2017 - 2018','Pekerjaan Cerah','80000000000','download_(4)1.jpg',NULL,NULL,NULL,NULL,2,NULL,6,NULL,NULL,0),(13,0,'Don Aria Sabda','Eksternal','Kursus','Universitas Indonesia','1990','B','2018 - 2019','Supaya Bisa Kuliah','80000000000',NULL,NULL,NULL,NULL,NULL,3,NULL,7,NULL,NULL,0),(14,0,'Youtube','Eksternal','Sekolah','Budi Luhur Cakti','1990','A+','1998 - 2019','Supaya pribadi menjadi bisa lebih berbudi luhur','9000000000','ALIAGO.jpg','Patuna_201801301137232.png','Logo-Abhinaya-Tour.png','panorama22.png','rahayu22.jpg',3,NULL,6,NULL,NULL,0),(15,0,'Ramdan Darmawan','Internal','Universitas','Universitas Budi Luhur','1996','A','2018 - 2019','Nikah','500000000000','Alia_Go.png','Cheria1.jpg','timthumb3.jpg','cheria.png','gt.png',3,NULL,7,NULL,NULL,0),(16,0,'Don Aria Sabda','Eksternal','Sekolah','Universitas Budi Luhur','1996','A','2017 -2018','Supaya Bisa Kuliah','500000000000','rahayu24.jpg','panorama24.png','xpanoramajtb-03-editt-711x409_jpg_pagespeed_ic_YVTLAuED9f1.jpg','gt1.png','Untitled2.png',0,NULL,7,NULL,NULL,0);

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
  `username` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(25) NOT NULL DEFAULT '',
  `level` int(2) NOT NULL DEFAULT 0,
  `id_cabang` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Lia','admin1','admin1@admin.com','admin1',2,46),(2,'Gede Laroiba','admin2','admin2@admin.com','admin2',3,46),(4,'Ibrahim Ahmad','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,7),(11,'Okky Aditya','okky','okky@user.com','okky',1,7),(12,'Adit','adit','adit@adit.com','adit',1,6),(13,'Saiful Bahri','saiful','saiful@bfi.co.id','saiful',1,15),(14,'Salman Al Farisi','salman','salman@bfi.co.id','salman',1,2),(15,'User','user','user@app.com','user',1,39);
