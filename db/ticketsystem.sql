# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2019-07-11 16:53:38
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


#
# Structure for table "tb_my_hajat"
#

DROP TABLE IF EXISTS `tb_my_hajat`;
CREATE TABLE `tb_my_hajat` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#


#
# Structure for table "tb_my_talim"
#

DROP TABLE IF EXISTS `tb_my_talim`;
CREATE TABLE `tb_my_talim` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#


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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Administration 1','admin1','admin1@admin.com','admin1',2,1),(2,'Administration 2','admin2','admin2@admin.com','admin2',3,1),(3,'User','user','user@user.com','user',1,1),(4,'Ibrahim Ahmad','ibrahim','ibrahim.ahmadd98@gmail.com','ibrahim',1,4),(5,'Papua',NULL,'papua@bfi.co.id','papua',1,2),(7,'Ternate',NULL,'ternate@bfi.co.id','ternate',1,3),(8,'Padang','padangsumbar','padang@bfi.co.id','padang',1,4);
