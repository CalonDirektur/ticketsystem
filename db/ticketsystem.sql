# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-07-15 16:58:05
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
# Structure for table "tb_my_hajat"
#

DROP TABLE IF EXISTS `tb_my_hajat`;
CREATE TABLE `tb_my_hajat` (
  `id_myhajat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(40) DEFAULT NULL,
  `jenis_konsumen` varchar(40) DEFAULT NULL,
  `id_cabang` int(2) DEFAULT NULL,
  `nama_vendor` varchar(50) DEFAULT NULL,
  `jenis_vendor` varchar(50) DEFAULT NULL,
  `jenis_pekerjaan` varchar(50) DEFAULT NULL,
  `bagian_bangunan` varchar(255) DEFAULT NULL,
  `luas_bangunan` int(11) DEFAULT NULL,
  `jumlah_pekerja` int(11) DEFAULT NULL,
  `estimasi_waktu` int(11) DEFAULT NULL,
  `nilai_pembiayaan` int(11) DEFAULT NULL,
  `nama_pemilik` varchar(40) DEFAULT NULL,
  `jenis_pemilik` varchar(50) DEFAULT NULL,
  `hubungan_pemohon` varchar(255) DEFAULT NULL,
  `luas_panjang` int(11) DEFAULT NULL,
  `biaya_tahunan` int(11) DEFAULT NULL,
  `nama_wo` varchar(50) DEFAULT NULL,
  `jenis_wo` varchar(50) DEFAULT NULL,
  `lama_berdiri` int(11) DEFAULT NULL,
  `jumlah_biaya` int(11) DEFAULT NULL,
  `jumlah_undangan` int(11) DEFAULT NULL,
  `akun_sosmed` varchar(50) DEFAULT NULL,
  `nama_franchise` varchar(50) DEFAULT NULL,
  `jumlah_cabang` int(11) DEFAULT NULL,
  `jenis_franchise` varchar(50) DEFAULT NULL,
  `harga_franchise` int(11) DEFAULT NULL,
  `tahun_berdiri_franchise` varchar(255) DEFAULT NULL,
  `jangka_waktu_franchise` varchar(5) DEFAULT NULL,
  `akun_sosmed_website` varchar(255) DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_myhajat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#

INSERT INTO `tb_my_hajat` VALUES (1,'Don Aria Sabda','Internal',7,'Tukangku','Kuli Bangunan',NULL,'Kantor',250,90,9,2147483647,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),(2,'Don Aria Sabda','Internal',7,'Tukangku','Kuli Bangunan',NULL,'Kantor',250,90,9,2147483647,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),(3,'Don Aria Sabda','Internal',7,'Tukangku','Kuli Bangunan',NULL,'Kantor',250,90,9,2147483647,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),(8,'Don Aria Sabda','Internal',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Ibra Jabar','Perusahaan','Keluarga',70,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),(10,'Ramdan Darmawan','Eksternal',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Wedding Abadi','Prewedding shootout',10,8000000,90000,'@wedding_wkwk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL),(11,'Ahwanda Setyawan','Eksternal',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Jamur Crispy',90,'Makanan dan Minuman',0,'1990','Selam','www.jamurcrispy.com',0,NULL);

#
# Structure for table "tb_my_talim"
#

DROP TABLE IF EXISTS `tb_my_talim`;
CREATE TABLE `tb_my_talim` (
  `id_mytalim` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(40) DEFAULT NULL,
  `jenis_konsumen` varchar(40) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `nama_lembaga` varchar(50) DEFAULT NULL,
  `tahun_berdiri` varchar(20) DEFAULT NULL,
  `akreditasi` varchar(40) DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `tujuan_pembiayaan` varchar(255) DEFAULT NULL,
  `nilai_pembiayaan` varchar(40) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `bukti_penghasilan` varchar(255) DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `id_approval` int(2) DEFAULT NULL COMMENT '0 = belum direview, 1 = ditolak, 2 = disetujui admin 1, 3 = disetujui admin 2',
  `keterangan` text DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (1,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000',NULL,NULL,NULL,NULL,NULL,1,NULL,1),(2,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000','rahayu2.jpg',NULL,NULL,NULL,NULL,2,NULL,1),(3,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000','rahayu2.jpg','timthumb.jpg','timthumb1.jpg','rahayu21.jpg','timthumb2.jpg',0,NULL,1),(4,'Ahmad Jabar','Eksternal','sekolah','Islamic Village','2019','A++','2017 -2018','Kuliah','1200000','presentasi-al-balad-al-ameen-1-638.jpg','Patuna_20180130113723.png','panorama.jpg','download_(4).jpg','Untitled.png',0,NULL,1),(5,'Don Aria Sabda','Eksternal','universitas','Universitas Indonesia','1998','B+','2017 - 2018','Keuangan','6000000','presentasi-al-balad-al-ameen-1-6381.jpg','panorama2.png','Logo_Abhinaya.jpg','xpanoramajtb-03-editt-711x409_jpg_pagespeed_ic_YVTLAuED9f.jpg','Patuna_201801301137231.png',0,NULL,1);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `id_cabang` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Administration 1','admin1','admin1@admin.com','admin1',2,1),(2,'Administration 2','admin2','admin2@admin.com','admin2',3,1),(3,'User','user','user@user.com','user',1,1),(4,'Ibrahim Ahmad','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,4),(5,'Papua',NULL,'papua@bfi.co.id','papua',1,2),(7,'Ternate',NULL,'ternate@bfi.co.id','ternate',1,3),(8,'Padang','padangsumbar','padang@bfi.co.id','padang',1,4),(9,'Okky Aditya','okkyaditya','okky.aditya@bfi.co.id','Tralala1',1,1);
