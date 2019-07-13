# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-07-12 16:41:47
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_cabang"
#

INSERT INTO `tb_cabang` VALUES (1,'Balikpapan'),(2,'Bandung'),(3,'Banjarmasin'),(4,'Batam'),(5,'Bekasi'),(6,'Bogor'),(7,'BSD Tangerang'),(8,'Bukittinggi'),(9,'Cawang'),(10,'Cirebon'),(11,'Depok'),(12,'Gorontalo'),(13,'Gresik'),(14,'Jakarta Selatan'),(15,'Jakarta Utara'),(16,'Jambi'),(17,'Karawang'),(18,'Kediri'),(19,'Kendari'),(20,'Kudus'),(21,'Lampung'),(22,'Makassar'),(23,'Malang'),(24,'Mataram'),(25,'Medan'),(26,'Meruya'),(27,'Mojokerto'),(28,'Padang'),(29,'Palangkaraya'),(30,'Palembang'),(31,'Pekanbaru'),(32,'Pontianak'),(33,'Purwokerto'),(34,'Samarinda'),(35,'Semarang'),(36,'Sidoarjo'),(37,'Solo'),(38,'Sorong'),(39,'Sukabumi'),(40,'Sunter'),(41,'Surabaya'),(42,'Tangerang'),(43,'Tasikmalaya'),(44,'Ternate'),(45,'Yogyakarta');

#
# Structure for table "tb_my_hajat"
#

DROP TABLE IF EXISTS `tb_my_hajat`;
CREATE TABLE `tb_my_hajat` (
  `id_myhajat` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_myhajat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#


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
  PRIMARY KEY (`id_mytalim`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (1,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000',NULL,NULL,NULL,NULL,NULL,1,NULL),(2,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000','rahayu2.jpg',NULL,NULL,NULL,NULL,2,NULL),(3,'Ibrahim','Internal','universitas','Universitas Budi Luhur','1231','A','2017 -2018','Nikah','500000000000','rahayu2.jpg','timthumb.jpg','timthumb1.jpg','rahayu21.jpg','timthumb2.jpg',0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Administration 1','admin1','admin1@admin.com','admin1',2,1),(2,'Administration 2','admin2','admin2@admin.com','admin2',3,1),(3,'User','user','user@user.com','user',1,1),(4,'Ibrahim Ahmad','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,4),(5,'Papua',NULL,'papua@bfi.co.id','papua',1,2),(7,'Ternate',NULL,'ternate@bfi.co.id','ternate',1,3),(8,'Padang','padangsumbar','padang@bfi.co.id','padang',1,4),(9,'Okky Aditya','okkyaditya','okky.aditya@bfi.co.id','Tralala1',1,1);
