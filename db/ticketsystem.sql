# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-07-18 16:54:46
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

#
# Data for table "tb_cabang"
#

INSERT INTO `tb_cabang` VALUES (1,'Balikpapan Syariah'),(2,'Bandung Syariah'),(3,'Banjarmasin Syariah'),(4,'Batam Syariah'),(5,'Bekasi Syariah'),(6,'Bogor Syariah'),(7,'BSD Syariah'),(8,'Bukit Tinggi Syariah'),(9,'Cawang Syariah'),(10,'Cirebon Syariah'),(11,'Depok Syariah'),(12,'Gorontalo Syariah'),(13,'Gresik Syariah'),(14,'Jakarta Selatan Syariah'),(15,'Jakarta Utara Syariah'),(16,'Jambi Syariah'),(17,'Karawang Syariah'),(18,'Kediri Syariah'),(19,'Kendari Syariah'),(20,'Kudus Syariah'),(21,'Lampung Syariah'),(22,'Makassar Syariah'),(23,'Malang Syariah'),(24,'Mataram Syariah'),(25,'Medan Syariah'),(26,'Meruya Syariah'),(27,'Mojokerto Syariah'),(28,'Padang Syariah'),(29,'Palangkaraya Syariah'),(30,'Palembang Syariah'),(31,'Pekanbaru Syariah'),(32,'Pontianak Syariah'),(33,'Purwokerto Syariah'),(34,'Samarinda Syariah'),(35,'Semarang Syariah'),(36,'Sidoarjo Syariah'),(37,'Solo Syariah'),(38,'Sorong Syariah'),(39,'Sukabumi Syariah'),(40,'Sunter Syariah'),(41,'Surabaya Syariah'),(42,'Tangerang Syariah'),(43,'Tasikmalaya Syariah'),(44,'Ternate Syariah'),(45,'Yogyakarta Syariah');

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
  `harga_franchise` int(11) NOT NULL DEFAULT 0 COMMENT 'Harga Franchise',
  `jangka_waktu_franchise` varchar(255) NOT NULL DEFAULT '' COMMENT 'Jangka Waktu Franchise',
  `akun_sosmed_website` varchar(255) NOT NULL DEFAULT '' COMMENT 'Akun Media Sosial / Website Franchise',
  `informasi_tambahan` text DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `keterangan_tiket` text DEFAULT NULL,
  PRIMARY KEY (`id_franchise`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#

INSERT INTO `tb_my_hajat_franchise` VALUES (1,'Mas Reki','Internal','Jamur Crispy',90,'Makanan dan Minuman','1990',2000000000,'Selamanya','www.jamurcrispy.com','',2,4,NULL);

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
  `nilai_pembiayaan` int(11) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `keterangan_tiket` text DEFAULT NULL,
  PRIMARY KEY (`id_renovasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (1,'Mas Gede','Internal','Tukang.com','Jasa Kuli Bangunan','Atap','50 m2',90,'1 Bulan',2147483647,'',3,11,NULL),(2,'Ariija Illona Rusydahu','Eksternal','Tukangku','Arsitektur','Tembok','90 m2',125,'90 hari',90000000,'',2,42,NULL),(3,'asdasd','Internal','asd','asd','asd','asd',13,'123',0,'',1,1,NULL);

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
  `biaya_tahunan` int(11) NOT NULL DEFAULT 0 COMMENT 'Biaya Sewa per Tahun',
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `informasi_tambahan` text DEFAULT NULL,
  `keterangan_tiket` text DEFAULT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_sewa"
#

INSERT INTO `tb_my_hajat_sewa` VALUES (1,'Mas Okky','Internal','Ibra Jabar','Perorangan','Keluarga','90 x 80',2147483647,2,7,NULL,NULL),(2,'asdasd','Eksternal','asdasd','Perorangan','asdasd','asd',0,1,1,'',NULL);

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
  `jumlah_biaya` int(11) NOT NULL DEFAULT 0 COMMENT 'Jumlah Biaya Acara',
  `jumlah_undangan` int(11) NOT NULL DEFAULT 0 COMMENT 'Jumlah Undangan',
  `akun_sosmed` varchar(50) NOT NULL DEFAULT '' COMMENT 'Akun Media Sosial WO',
  `id_cabang` int(11) NOT NULL DEFAULT 0 COMMENT 'Foreign Key dari tb_cabang',
  `id_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'ID status approval tiket',
  `informasi_tambahan` text DEFAULT NULL,
  `keterangan_tiket` text DEFAULT NULL,
  PRIMARY KEY (`id_wedding`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (1,'Mas reki','Internal','Wedding Abadi','Prewedding shootout','10 tahun',8000000,90000,'@wedding_wkwk',3,2,'asdasd',NULL);

#
# Structure for table "tb_my_talim"
#

DROP TABLE IF EXISTS `tb_my_talim`;
CREATE TABLE `tb_my_talim` (
  `id_mytalim` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (1,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000',NULL,NULL,NULL,NULL,'',1,NULL,1),(2,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000','rahayu2.jpg',NULL,NULL,NULL,'',3,NULL,1),(3,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000','rahayu2.jpg','timthumb.jpg','timthumb1.jpg','rahayu21.jpg','timthumb2.jpg',2,NULL,1),(4,'Ahmad Jabar','Eksternal','sekolah','Islamic Village','2019','A++','2017 -2018','Kuliah','1200000','presentasi-al-balad-al-ameen-1-638.jpg','Patuna_20180130113723.png','panorama.jpg','download_(4).jpg','Untitled.png',2,NULL,1),(5,'Don Aria Sabda','Eksternal','universitas','Universitas Indonesia','1998','B+','2017 - 2018','Keuangan','6000000','presentasi-al-balad-al-ameen-1-6381.jpg','panorama2.png','Logo_Abhinaya.jpg','xpanoramajtb-03-editt-711x409_jpg_pagespeed_ic_YVTLAuED9f.jpg','Patuna_201801301137231.png',2,NULL,1),(6,'Mas Gede','Internal','Kursus','Hacktiv8','2019','A','2017 - 2018','Pekerjaan Cerah','672487623846782',NULL,NULL,NULL,NULL,'',1,NULL,0),(7,'Ibrahim','Internal','sekolah','asdasd','1990','asd','asd','asd','500000000000',NULL,NULL,NULL,NULL,'',1,NULL,0),(8,'Ibrahim','Internal','sekolah','asdasd','1990','asd','asd','asd','500000000000',NULL,NULL,NULL,NULL,NULL,1,NULL,1),(9,'Ibrahim','Eksternal','universitas','Universitas Budi Luhur','1990','A','2017 -2018','Kuliah','1200000',NULL,NULL,NULL,NULL,NULL,1,NULL,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Administration 1','admin1','admin1@admin.com','admin1',2,1),(2,'Administration 2','admin2','admin2@admin.com','admin2',3,1),(3,'User','user','user@user.com','user',1,1),(4,'Ibrahim Ahmad','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,4),(5,'Papua','papua','papua@bfi.co.id','papua',1,2),(7,'Ternate','ternate','ternate@bfi.co.id','ternate',1,3),(8,'Padang','padangsumbar','padang@bfi.co.id','padang',1,28),(9,'Okky Aditya','okkyaditya','okky.aditya@bfi.co.id','Tralala1',1,1),(10,'Salman Al Farisi','salman','salman@bfi.co.id','salman',1,40);
