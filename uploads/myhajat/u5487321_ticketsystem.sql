# Host: helpdesk.bfisyariah.id  (Version 5.5.5-10.2.25-MariaDB)
# Date: 2019-08-26 14:04:21
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_aktivasi_agent"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "tb_aktivasi_agent"
#

INSERT INTO `tb_aktivasi_agent` VALUES (10,'DIAH DWI HARTANTI','Syariah Agent','KTP.jpg','KK.jpg','BUKU_TABUNGAN.jpg','NPWP.jpg','Scan.pdf',NULL,NULL,NULL,NULL,NULL,3,11,47,'2019-08-19 15:08:52','2019-08-19 15:08:52'),(11,'nur apriatna','Syariah Agent','KTP_APRI.jpeg','NPWP_APRI.jpeg','REK_APRI.jpeg','FORM_F_100_APRI.pdf',NULL,NULL,NULL,NULL,NULL,NULL,3,7,60,'2019-08-22 10:12:30','2019-08-22 10:13:07'),(12,'AHDIYAT RIFANI','Syariah Agent','KTP.jpeg','BUTAB.jpeg','F100-1.jpeg','F100-2.jpeg','F100-3.jpeg','F100-4.jpeg',NULL,NULL,NULL,NULL,3,3,35,'2019-08-23 08:47:43','2019-08-23 13:35:14'),(13,'Ibnu Ramadhani Permana','Syariah Agent','KTP_IBNU.jpeg','BUKU_TABUNGAN_IBNU.jpeg','FORM_F100_IBNU.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,7,60,'2019-08-23 09:01:03','2019-08-23 16:33:14'),(14,'Sri Mujiati','Syariah Agent','BUKU_TABUNGAN_SRI_MUJIATI.jpeg','FORM_F-100_SRI_MUJIATI.pdf','KTP,_NPWP,_BUKU_TABUNGAN.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,7,60,'2019-08-23 09:06:53','2019-08-23 16:33:58'),(15,'CANSERIDA S RINI','Syariah Agent','IMG-20190820-WA0002.jpg','IMG-20190821-WA0000.jpg','New_Doc_2019-08-26_10.06.58.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,33,110,'2019-08-26 10:19:53','2019-08-26 10:19:53');

#
# Structure for table "tb_cabang"
#

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

CREATE TABLE `tb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL DEFAULT 0,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `id_user` int(6) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `has_read` int(11) DEFAULT NULL,
  `id_mytalim` int(11) DEFAULT NULL,
  `id_renovasi` int(11) DEFAULT NULL,
  `id_sewa` int(11) DEFAULT NULL,
  `id_wedding` int(11) DEFAULT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_myhajat_lainnya` int(11) DEFAULT NULL,
  `id_mysafar` int(11) DEFAULT NULL,
  `id_myihram` int(11) DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `id_nst` int(11) DEFAULT NULL,
  `id_lead` int(11) DEFAULT NULL,
  `id_mitra_kerjasama` int(11) DEFAULT NULL,
  `id_mycars` int(11) DEFAULT NULL,
  `id_myfaedah` int(11) DEFAULT NULL,
  `id_bangunan` int(11) DEFAULT NULL,
  `id_elektronik` int(11) DEFAULT NULL,
  `id_myfaedah_lainnya` int(11) DEFAULT NULL,
  `id_modal` int(11) DEFAULT NULL,
  `id_qurban` int(11) DEFAULT NULL,
  `id_ticket` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

#
# Data for table "tb_comment"
#

INSERT INTO `tb_comment` VALUES (131,0,'ticket id 35',11,'2019-08-14 12:32:16',0,40,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,131,'ok',11,'2019-08-14 12:32:24',0,40,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(133,0,'datamu kurang',1,'2019-08-14 13:42:49',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,7,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(134,133,'masa?',23,'2019-08-14 13:43:05',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,7,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(135,133,'apa aja yg kurang tuch',23,'2019-08-14 13:43:24',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,7,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(136,131,'data kurang lengkap coy',1,'2019-08-15 09:14:25',0,40,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(137,0,'KURANG',1,'2019-08-15 09:27:58',0,43,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(138,0,'Tidak ada KTP ortu & calon pasangan',1,'2019-08-16 09:00:03',0,NULL,NULL,NULL,19,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(139,0,'kenapa di tolak ?\r\n',2,'2019-08-19 10:57:16',0,NULL,27,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(140,0,'Pasangan (Sekarlangit Umastuti) sudah melakukan pengajuan',1,'2019-08-19 13:23:09',0,NULL,NULL,NULL,21,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(141,0,'Tidak ada KTP ortu & calon pasangan',1,'2019-08-19 13:46:21',0,NULL,NULL,NULL,20,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(142,0,'kurang Dokumen MoU\r\nForm Checklist (terlampir di email)\r\nmedia sosial/website',23,'2019-08-19 16:06:30',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(143,0,'kekurangan :\r\nDokumen MoU\r\nForm checklist (terlampir di email)\r\nmedia sosial/website',23,'2019-08-19 16:07:36',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(144,0,'coba upload mutasi rekeningnya ya dhil',23,'2019-08-19 17:22:01',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(145,139,'Double Input = No. #56',1,'2019-08-20 08:57:50',0,NULL,27,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(146,0,'Tidak ada email peny.jasa, BKR konsumen, KTP & KK peny.barang, cover rekening peny.barang, foto PIC dengan rumah/lokasi usaha peny.barang',1,'2019-08-20 09:24:49',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL),(147,0,'Tidak ada BKR (Sertifikat/AJB/PBB). Untuk peny.jasa perorangan max pembiayaan 15jt (jika ingin diproses lebih lanjut, harap mengajukan memo)',1,'2019-08-20 09:34:55',0,NULL,28,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(148,0,'Tidak ada mutasi rekening peny.jasa, BKR konsumen wajib (sertifikat/AB/PBB/rek.listrik 3 bln terakhir)',1,'2019-08-20 09:41:43',0,NULL,NULL,NULL,23,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,146,'Mohon pengajuan ulang sesuai produk yang dipilih (Pembelian mesin air mineral kangen water masuk ke produk My Faedah)',1,'2019-08-20 14:30:42',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL),(150,144,'Tidak ada form partnership & form ceklis',1,'2019-08-20 14:41:34',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(151,0,'Double Input = No. #85',1,'2019-08-20 14:59:50',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL),(152,0,'Double Input = No. #87',1,'2019-08-20 15:03:06',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL),(153,0,'Tidak ada email peny.jasa',1,'2019-08-20 16:01:06',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL),(154,146,'Tidak ada email peny.jasa',1,'2019-08-20 16:02:41',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL),(155,146,'erik.adhi.rianto@gmail.com',74,'2019-08-20 16:17:05',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL),(156,146,'kangenkingdomindonesia@gmail.com',74,'2019-08-20 16:17:30',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL),(157,146,'Ini penyedia barangnya sudah pernah pengajuan ya mba, jadi ini pengajuan yg kedua.',74,'2019-08-20 16:20:15',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL),(158,0,'Tidak ada BKR (sertifikat/AJB/PBB/rek.listrik 3 bln terakhir), bukti penghasilan konsumen, KTP calon pasangan\r\n',1,'2019-08-20 16:21:17',0,NULL,NULL,NULL,24,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(159,0,'Tidak ada form ceklis',1,'2019-08-20 16:25:04',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(160,0,'Tidak ada form pengajuan my ta\'lim',1,'2019-08-20 16:27:07',0,44,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(161,0,'Tidak ada KTP ortu & calon pasangan, BKR (sertifikat/AJB/PBB/rek.listrik 3 bln terakhir), bukti penghasilan pemohon',1,'2019-08-20 16:30:11',0,NULL,NULL,NULL,25,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(162,0,'Double Input = No.107',1,'2019-08-20 16:49:05',0,NULL,NULL,NULL,27,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(163,0,'Konsumen wajib berumur minimal 25 tahun',1,'2019-08-20 17:09:32',0,NULL,NULL,NULL,29,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(164,0,'Tidak ada dokumen paket yang akan di input',1,'2019-08-20 17:10:12',0,NULL,NULL,NULL,NULL,NULL,NULL,0,12,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(165,0,'Pengajuan sudah selesai di No.61',1,'2019-08-20 17:12:11',0,NULL,NULL,NULL,30,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(166,165,'Tidak ada akta cerai calon pasangan dari pengadilan',1,'2019-08-20 17:13:48',0,NULL,NULL,NULL,30,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(167,0,'Tidak ada KK konsumen',1,'2019-08-20 17:26:55',0,NULL,30,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(168,0,'NPWP sudah diterima',16,'2019-08-21 08:37:00',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,7,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,0,'NPWP sudah diterima',16,'2019-08-21 08:37:53',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,6,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,159,'Form ceklis yg mana y.tq',82,'2019-08-21 08:59:29',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,0,'pak maaf pak data nya ada yang kurang saya masukin pak. soalnya blm faham cara kerja nya..  kurang ktp, ortu dan pasangan sama BKR dan penghasilan nya pak. terimakasih pak\r\n',82,'2019-08-21 10:11:46',0,NULL,NULL,NULL,31,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,160,'form nya yang kaya gimana ya mba?',82,'2019-08-21 10:39:12',0,44,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,171,'kalau bisa di buat di pdf aja pak.. jadi data konsumen 1 pdf, data penyedia jasa 1 pdf, dan form pengajuannya 1 pdf..  ini di reject ya.. mohon dikirim kelengkapannya',1,'2019-08-21 10:43:00',0,NULL,NULL,NULL,31,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(174,171,'ini tidak ada data penyedia jasanya, BKR dan bukti penghasilannya',1,'2019-08-21 10:44:42',0,NULL,NULL,NULL,31,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(175,171,'ini tidak ada data penyedia jasanya, BKR dan bukti penghasilannya',1,'2019-08-21 10:44:42',0,NULL,NULL,NULL,31,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,0,'tidak ada bkr\r\n',1,'2019-08-21 10:59:12',0,NULL,NULL,NULL,32,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(177,165,'Mohon di check kembali. Tidak ada akta cerai calon pasangan dari pengadilan. hanya ada surat talak 1',1,'2019-08-21 11:20:45',0,NULL,NULL,NULL,30,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(178,0,'Tidak ada form verifikasi penyedia barang',1,'2019-08-21 11:35:38',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL),(179,159,'tidak ada form pengajuan kerja sama ',1,'2019-08-21 11:38:13',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(180,171,'tidak ada bukti penghasilan (buku tabungan/slip gaji ) konsumen',1,'2019-08-21 11:57:16',0,NULL,NULL,NULL,31,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(181,148,'Mutasi RK dan BKR sdh dilengkapi',35,'2019-08-21 12:00:21',0,NULL,NULL,NULL,23,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(182,0,'Tidak ada form pengajuan konsumen dan form verifikasi penyedia barang',1,'2019-08-21 14:55:08',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL),(183,0,'Double Input',2,'2019-08-21 16:50:19',0,NULL,NULL,NULL,NULL,NULL,NULL,0,15,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(184,0,'tidak ada bukti penghasilan konsumen',1,'2019-08-21 16:52:22',0,NULL,NULL,NULL,35,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(185,0,'tidak ada ktp calon pasangan',1,'2019-08-21 17:06:00',0,NULL,NULL,NULL,36,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(186,0,'Ini di buat 2 termin ya.. termin 1 25 juta dan termin 2 15 juta',1,'2019-08-21 17:17:27',0,NULL,31,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(187,178,'sudah saya ganti form verifikasi di FORM PENGAJUAN 2',74,'2019-08-21 17:22:02',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL),(188,185,'done ya bu.',82,'2019-08-22 08:12:24',0,NULL,NULL,NULL,36,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(189,185,'Tidak ada pengecekan harga ke tempat lain, KTP ortu, mutasi rekening 1 bulan terakhir',1,'2019-08-22 08:59:48',0,NULL,NULL,NULL,36,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(190,159,'tidak ada form partnership my hajat',1,'2019-08-22 09:04:58',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(191,0,'tidak ada foto kantor penyedia jasa dan wajib ada PIC BFI Syariah',1,'2019-08-22 09:20:28',0,NULL,32,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(192,185,'Akan kami lampirkan KTP Ortu, untuk rekening tdk bisa kami lampirkan dikarenakan konsumen wiraswasta (Mie ayam bakso), kami lampirkan pembukuan usaha pemohon',82,'2019-08-22 09:50:00',0,NULL,NULL,NULL,36,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(193,159,'sudah saya gabungkan bu di data_reisa_wo.',82,'2019-08-22 09:57:18',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(194,159,'oke saya kirim kan lagi bu',82,'2019-08-22 09:57:31',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(195,0,'Tidak ada email peny.jasa',1,'2019-08-22 10:59:08',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL),(196,0,'???\r\n',1,'2019-08-22 11:01:00',0,50,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(197,0,'???',1,'2019-08-22 11:01:20',0,51,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(198,0,'Tidak bisa membiayai pengajuan pembelian gerobak',1,'2019-08-22 11:10:17',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL),(199,198,'Terlampir email penyimpangan dari cabang yang telah di balas pusat, mohon review kembali',35,'2019-08-22 11:31:47',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL),(200,160,'Tidak ada cover rekenig peny.jasa atau no.rek di invoice dari kampus, harga paket jasa tidak sesuai dgn invoice dari kampus, BKR (sertifikat/AJB/PBB/rek.listrik 3 bln terakhir), bukti penghasilan konsumen',1,'2019-08-22 11:34:20',0,44,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(201,0,'Tidak ada form pengajuan My Faedah',1,'2019-08-22 11:37:09',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL),(202,195,'Polentino1111@gmail.com',95,'2019-08-22 11:43:44',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL),(203,201,'Form My Faedah sdh di lengkapi',35,'2019-08-22 11:53:59',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL),(204,0,'Tidak ada TDP, SIUP, NPWP perusahaan',1,'2019-08-22 13:44:34',0,NULL,33,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(205,0,'Tolong dibantu buat upload paket di web syariah pak. Paket 13 hari harga 23,8jt',84,'2019-08-22 14:06:58',0,NULL,NULL,NULL,NULL,NULL,NULL,0,17,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(206,198,'Mohon di cek kembali email tersebut? apakah ada persetujuan dari HO atas pembiayaan gerobak, karena jika saya baca yang ada persetujuan pembiayaan bahan baku gerobak bukan Gerobaknya.',1,'2019-08-22 14:14:33',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL),(207,0,'Tidak ada form pengajuan My Talim, BKR (sertifikat/AJB/PBB/rek.listrik 3 bln terakhir), bukti penghasilan pemohon, foto PIC dgn kampus, tidak ada cover rekening kampus atau no rekening kampus di invoice dari peny.jasa',1,'2019-08-22 14:34:38',0,52,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(208,0,'Tidak ada form pengajuan My Faedah',1,'2019-08-22 14:38:37',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,43,NULL,NULL,NULL,NULL,NULL,NULL),(209,204,'tidak ada ktp pasangan',1,'2019-08-22 15:22:01',0,NULL,33,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(210,159,'Dokumen persyaratan MoU tidak ada di ftp',1,'2019-08-22 15:22:27',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(211,0,'mohon lampirkan BKR Konsumen',1,'2019-08-22 15:29:41',0,NULL,NULL,16,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(212,159,'oke. saya sudah masukan ftp ya',82,'2019-08-22 16:08:30',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(213,144,'Tidak ada form ceklis terbaru & form perjanjian kerjasama',1,'2019-08-22 16:26:10',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(214,0,'Tidak ada form ceklis terbaru & form perjanjian kerjasama',1,'2019-08-22 16:28:07',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(215,0,'INI DI REJECT DAN SUDAH ADA PENGAJUAN TERBARU ATAS NAMA YANG SAMA',44,'2019-08-22 17:09:10',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,96,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(216,185,'Tidak ada harga paket wedding dari peny.jasa (wajib diketik)',1,'2019-08-23 09:16:27',0,NULL,NULL,NULL,36,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(217,0,'Minimal umur calon konsumen 25 tahun, minimal pengajuan My Faedah Rp. 5.000.000,-',1,'2019-08-23 09:22:24',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,44,NULL,NULL,NULL,NULL,NULL,NULL),(218,0,'Tidak ada form tanda tangan konsumen',1,'2019-08-23 09:31:48',0,NULL,NULL,17,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(219,0,'double input',1,'2019-08-23 09:32:11',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(220,0,'tidak ada form partnership, form ceklis, dan form perjanjian kerjasama\r\n',1,'2019-08-23 09:48:42',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(221,217,'Pengajuan Karyawan / Comloan Terlampir email penyimpangan yang sudah ada harganya',35,'2019-08-23 10:11:29',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,44,NULL,NULL,NULL,NULL,NULL,NULL),(222,0,'Untuk pengajuan berikutnya, jika ada dokumen yang kurang harap melengkapi di nomor antrian yang sama',1,'2019-08-23 10:58:16',0,NULL,NULL,18,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(223,0,'tidak ada data dokumen persyaratan MoU di FTP',1,'2019-08-23 11:04:39',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(224,0,'BKR peny.jasa wajib atas nama sendiri atau pasangan',1,'2019-08-23 11:15:23',0,NULL,NULL,19,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(225,0,'Mohon edit terlebih dahulu nama akun Agent, karena tidak sesuai dengan yang di KTP dan Form F100',2,'2019-08-23 11:16:04',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(226,144,'Tidak ada form perjanjian kerjasama',1,'2019-08-23 11:18:04',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(227,0,'Akun Agent tidak ditemukan',2,'2019-08-23 11:20:59',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,13,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(228,220,'Kami sudah uplaod, Boleh di cek di ID Ticket: #212',103,'2019-08-23 11:23:09',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(229,0,'Nama Bank di akun agent tidak sesuai dengan di cover rekening',2,'2019-08-23 13:34:03',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,14,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(230,225,'Nama akun agent sudah diedit sesuai KTP',35,'2019-08-23 13:35:23',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(231,204,'Mohon lampirkan KTP pasangan konsumen atas nama Mukaromah',1,'2019-08-23 14:23:03',0,NULL,33,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(232,142,'tidak ada form partnership my hajat',1,'2019-08-23 14:26:29',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(233,0,'Tidak ada akta pendirian, akta perubahan (jika ada), SKDU, KTP owner',1,'2019-08-23 14:30:19',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(234,160,'direncakan 2 termin. termin pertama 25 juta. terhitung dari biaya semester 4 - semester 8 dgn total 40.600.000. saat ini pemohon sdh masuk semester 3',82,'2019-08-23 17:36:16',0,44,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(235,0,'Dokumen NST sudah benar',16,'2019-08-23 17:57:41',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,9,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(236,0,'dokumen NST kami tolak\r\n- Wajib melengkapi daftar isian dalam formulir appeal',16,'2019-08-23 17:58:38',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,8,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(237,0,'persyaratan kelengkapan datanya belum ada di ftp y??',1,'2019-08-24 11:31:46',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(238,0,'tidak ada data penyedia jasa\r\n',1,'2019-08-24 11:39:43',0,NULL,NULL,NULL,37,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(239,238,'wajib ada foto ktp konsumen',1,'2019-08-24 11:54:11',0,NULL,NULL,NULL,37,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(240,237,'udah mbk, folder Partnership, folder CV ISHO INTERIOR',107,'2019-08-24 12:52:47',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(241,236,'Mohon maaf, Form Appeal sudah ada di barisan upload pertama',44,'2019-08-26 08:44:00',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,8,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(242,0,'Minimal usia calon konsumen 25 tahun',1,'2019-08-26 10:03:50',0,NULL,NULL,NULL,38,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(243,0,'BKR konsumen tidak sesuai dengan KK',1,'2019-08-26 10:39:26',0,NULL,34,NULL,NULL,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(244,0,'Tidak ada KTP calon pasangan, RAB dari peny.jasa (Wajib diketik)',1,'2019-08-26 11:05:38',0,NULL,NULL,NULL,NULL,NULL,14,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(245,244,'*Penawaran biaya dari peny.jasa (wajib diketik)',1,'2019-08-26 11:06:06',0,NULL,NULL,NULL,NULL,NULL,14,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(246,0,'Sedang Proses Input Data Tour and Travel',2,'2019-08-26 11:09:54',0,NULL,NULL,NULL,NULL,NULL,NULL,0,18,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(247,0,'Tidak Ada dokumen Paket yang akan di Input',2,'2019-08-26 11:44:28',0,NULL,NULL,NULL,NULL,NULL,NULL,0,20,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(248,0,'Tidak Ada Dokumen Paket yang akan di input, ini pengajuan apa ?',2,'2019-08-26 11:47:29',0,NULL,NULL,NULL,NULL,NULL,NULL,0,21,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(249,0,'Tidak ada pengecekan harga ke tempat lain, KTP konsumen, KTP peny.jasa  dan KK konusumen kurang jelas (mohon kirim ulang), BKR (sertifikat/AJB/PBB/rek.listrik 3 bln terakhir),  bukti penghasilan konsumen, KK peny.jasa, cover & mutasi rek peny.jasa 1 bln t',1,'2019-08-26 13:24:29',0,NULL,NULL,NULL,39,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(250,0,'Tidak ada form verifikasi, form RAB, KTP konsumen, bukti penghasilan konsumen, foto PIC BFI dgn peny.jasa/kantor peny.jasa, SIUP, TDP, SKDU, mutasi rekening 3 bln terakhir, NPWP perusahaan. (Untuk peny.jasa yg sudah PKS mohon mengirimkan lagi dokumen leng',1,'2019-08-26 14:02:14',NULL,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "tb_konsumen"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

#
# Data for table "tb_lead_management"
#

INSERT INTO `tb_lead_management` VALUES (23,'In Branch',NULL,'','','201908SLOS000370','KARMILA MUCHSIN','Direct Selling','Ilham Hamiru','My Hajat','40000000','','',0,'','','','',NULL,'2019-08-16 04:35:52','2019-08-16 04:35:52',0,44,33),(24,'In Branch','','','','201908SLOS001128','GINA AMELIA RAHMI','Digital Marketing','FACEBOOK','My Hajat','25000000','','',0,'','','','',NULL,'2019-08-16 14:35:59','2019-08-20 13:58:46',0,3,35),(25,'In Branch',NULL,'','','201908SLOS001076','Rama Sahab','Tour & Travel / Penyedia Jasa','Eposs Laundry','My Hajat','21500000','','',0,'','','','',NULL,'2019-08-19 18:11:02','2019-08-19 18:11:02',0,26,40),(26,'In Branch',NULL,'','','201908SLOS001078','SUMIYATI','Direct Selling','Akmal','My Hajat','25000000','','',0,'','','','',NULL,'2019-08-19 18:26:38','2019-08-19 18:26:38',0,26,40),(27,'In Branch',NULL,'','','5202080107510088','Hadiah','Digital Marketing','Febriyan sutrisno','My Hajat','20000000','','',0,'','','','',NULL,'2019-08-20 07:46:49','2019-08-20 07:46:49',0,24,75),(28,'In Branch',NULL,'','','201908SLOS000289','Mahfuzan','Tour & Travel / Penyedia Jasa','3d lombok center','My Hajat','15000000','','',0,'','','','',NULL,'2019-08-20 07:48:07','2019-08-20 07:48:07',0,24,75),(29,'In Branch',NULL,'','','201908SLOS000166','anhar','Agent','sahibudin','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-20 07:50:06','2019-08-20 07:50:06',0,24,75),(30,'In Branch',NULL,'','','201908SLOS000570','halifah','Agent','sahibudin','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-20 07:50:56','2019-08-20 07:50:56',0,24,75),(31,'Cross-Branch','7','febriyan sutrisno','febriyan sutrisno','201908SLOS000278','H Muhammad Subhan ','Tour & Travel / Penyedia Jasa','BSD SYARIAH ','My Ihram','28000000','','',0,'','','','',NULL,'2019-08-20 07:56:12','2019-08-20 07:56:12',0,24,75),(32,'In Branch',NULL,'','','201908SLOS001069','Hj Baiq Dewi ','EGC','Lalu Anugrah ','My Ihram','23500000','','',0,'','','','',NULL,'2019-08-20 08:08:10','2019-08-20 08:08:10',0,24,75),(33,'In Branch',NULL,'','','201908SLOS000775','Eko Wahyu Budi Utomo','Tour & Travel / Penyedia Jasa','3d lombok center ( Mushawir Aly)','My Hajat','15000000','','',0,'','','','',NULL,'2019-08-20 08:09:40','2019-08-20 08:09:40',0,24,75),(34,'In Branch',NULL,'','','201908SLOS000515','Zan Haris','Tour & Travel / Penyedia Jasa','Raja Sepeda','My Faedah','7650000','','',0,'','','','',NULL,'2019-08-20 08:10:49','2019-08-20 08:10:49',0,24,75),(35,'In Branch',NULL,'','','201908SLOS000566','Neni Yusnia','Tour & Travel / Penyedia Jasa','Raja Sepeda','My Faedah','11755000','','',0,'','','','',NULL,'2019-08-20 08:12:06','2019-08-20 08:12:06',0,24,75),(36,'In Branch',NULL,'','','201908SLOS000824','Muhammad Jalil','Tour & Travel / Penyedia Jasa','Raja Sepeda','My Faedah','6920000','','',0,'','','','',NULL,'2019-08-20 08:13:18','2019-08-20 08:13:18',0,24,75),(37,'In Branch',NULL,'','','201908SLOS000651','Ansoril Ihsan','Tour & Travel / Penyedia Jasa','Raja Sepeda','My Faedah','6750000','','',0,'','','','',NULL,'2019-08-20 08:15:03','2019-08-20 08:15:03',0,24,75),(38,'In Branch',NULL,'','','201908SLOS000990','Munawar Haris','Agent','sahibudin','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-20 08:16:09','2019-08-20 08:16:09',0,24,75),(39,'In Branch',NULL,'','','201908SLOS001099','YUDI ARIYADI','Tour & Travel / Penyedia Jasa','GRACE RUMAH PENGANTEN','My Hajat','23000000','','',0,'','','','',NULL,'2019-08-20 10:14:45','2019-08-20 10:14:45',0,3,35),(40,'In Branch',NULL,'','','201908SLOS000937','Endrik Andika','Tour & Travel / Penyedia Jasa','PT. Assakinah insani tour','My Ihram','25700000','','',0,'','','','',NULL,'2019-08-20 10:56:28','2019-08-20 10:56:28',0,40,82),(41,'In Branch',NULL,'','','201908SLOS001101','Derry eka pranata','Tour & Travel / Penyedia Jasa','Tiga Dara WO','My Hajat','25000000','','',0,'','','','',NULL,'2019-08-20 10:57:23','2019-08-20 10:57:23',0,40,82),(42,'In Branch',NULL,'','','201908SLOS001119','Sekarlangit Umastuti','Tour & Travel / Penyedia Jasa','Sanggar Nisa Serpong','My Hajat','25000000','','',0,'','','','',NULL,'2019-08-20 12:03:38','2019-08-20 12:03:38',0,7,61),(43,'In Branch',NULL,'','','201908SLOS000445','Eni nuraeni','Tour & Travel / Penyedia Jasa','PT.ALTUR WISATA MULYA','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:13:57','2019-08-20 12:13:57',0,42,56),(44,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS000988','Paryono','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:14:57','2019-08-20 12:14:57',0,37,76),(45,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001009','Rumini','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:18:25','2019-08-20 12:18:25',0,37,76),(46,'Cross-Branch','42','Dede rizky wahyudi','dede rizky wahyudi','201908SLOS000576','hendra kelana','Tour & Travel / Penyedia Jasa','PT.ALTUR WISATA MULYA','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:18:35','2019-08-20 12:18:35',0,42,56),(47,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001082','Darmini','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:24:29','2019-08-20 12:24:29',0,37,76),(48,'In Branch','42','Budi iswanto','Budi','201908SLOS001050','khotim fatimah ','Tour & Travel / Penyedia Jasa','khalifah asia tour N travel','My Ihram','17814000','','',0,'','','','',NULL,'2019-08-20 12:26:29','2019-08-20 12:33:44',0,42,52),(49,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001098','Dul Achad','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:28:13','2019-08-20 12:28:13',0,37,76),(50,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001094','Menik','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-20 12:29:03','2019-08-20 12:29:03',0,37,76),(51,'In Branch','42','Dede rizky wahyudi','','201908SLOS000081','Ahmad surya sudrajat','Direct Selling','Eko yuli suprianto','My Hajat','15000000','','',0,'','','','',NULL,'2019-08-20 12:29:50','2019-08-20 13:15:42',0,15,45),(52,'In Branch','5','Mitha Andriani','','201908SLOS000059','Abdul Salam','Agent','Fiki Ekowati','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-20 12:30:35','2019-08-20 13:04:24',0,15,44),(53,'In Branch','','Budi iswanto','Budi','201908SLOS000849','Sandy saputra','Tour & Travel / Penyedia Jasa','Lenie salon','My Hajat','13990000','','',0,'','','','',NULL,'2019-08-20 12:31:36','2019-08-20 13:07:20',0,42,52),(54,'Cross-Branch','45','Pak Dayat','Pak Dayat','201908SLOS001062','Bambang Sutadi','Tour & Travel / Penyedia Jasa','Kangen Kingdom Indonesia','My Faedah','27050000','','',0,'','','','',NULL,'2019-08-20 12:32:05','2019-08-20 12:32:05',0,37,74),(55,'In Branch',NULL,'','','201908SLOS001033','Fitriana','Tour & Travel / Penyedia Jasa','Lenie salon','My Hajat','18000000','','',0,'','','','',NULL,'2019-08-20 12:47:03','2019-08-20 12:47:03',0,42,51),(56,'In Branch',NULL,'','','201908SLOS001105','Much.yasin','Direct Selling','Eko yuli suprianto','My Hajat','20000000','','',0,'','','','',NULL,'2019-08-20 13:20:21','2019-08-20 13:20:21',0,15,45),(57,'In Branch',NULL,'','','201908SLOS001125','Herlina','Tour & Travel / Penyedia Jasa','Artiwedding, aulya fajriah','My Hajat','17500000','','',0,'','','','',NULL,'2019-08-20 14:16:52','2019-08-20 14:16:52',0,11,47),(58,'In Branch',NULL,'','','201908SLOS0010','dinda noviana','Tour & Travel / Penyedia Jasa','Rias pengantin anisaayu','My Hajat','22000000','','',0,'','','','',NULL,'2019-08-20 15:12:18','2019-08-20 15:12:18',0,11,47),(59,'In Branch',NULL,'','','201908SLOS001137','Hadi Ismanto','Direct Selling','Damanhuri','My Hajat','20000000','','',0,'','','','',NULL,'2019-08-20 16:46:31','2019-08-20 16:46:31',0,6,64),(60,'In Branch',NULL,'','','201907SLOS001410','Rangga Wirayuda','Direct Selling','Damanhuri','My Hajat','15000000','','',0,'','','','',NULL,'2019-08-20 16:47:37','2019-08-20 16:47:37',0,6,64),(61,'In Branch',NULL,'','','201907SLOS001338','Budianto','RO','Damanhuri','My Faedah','12000004','','',0,'','','','',NULL,'2019-08-20 16:50:13','2019-08-20 16:50:13',0,6,64),(62,'In Branch',NULL,'','','201908SLOS000993','Fitriana Fadlan','Direct Selling','Penyedia jasa','My Hajat','34452000','','',0,'','','','',NULL,'2019-08-20 16:52:50','2019-08-20 16:52:50',0,16,31),(63,'In Branch',NULL,'','','201908SLOS001141','Emy Susanti','Direct Selling','Konsumen aktif BFI syariah','My Faedah','13066000','','',0,'','','','',NULL,'2019-08-20 16:56:03','2019-08-20 16:56:03',0,16,31),(64,'In Branch',NULL,'','','201908SLOS000994','HIZRULLAH SYAPII','Direct Selling','TIDAK ADA','My Hajat','15000000','','',0,'','','','',NULL,'2019-08-20 17:01:04','2019-08-20 17:01:04',0,16,31),(65,'In Branch',NULL,'','','201908SLOS001129','RM GIAN PRATAMA PUTRA','Digital Marketing','TIDAK ADA','My Faedah','21600000','','',0,'','','','',NULL,'2019-08-20 17:06:39','2019-08-20 17:06:39',0,16,31),(66,'In Branch',NULL,'','','201908SLOS000661','Tatang Ruhiyat','Tour & Travel / Penyedia Jasa','Damanhuri','My Hajat','8000000','','',0,'','','','',NULL,'2019-08-20 17:24:47','2019-08-20 17:24:47',0,6,64),(67,'In Branch',NULL,'','','201908SLOS000595','Tatang','Tour & Travel / Penyedia Jasa','Damanhuri','My Hajat','40000000','','',0,'','','','',NULL,'2019-08-20 17:25:34','2019-08-20 17:25:34',0,6,64),(68,'In Branch',NULL,'','','201908SLOS000588','Firmansah','RO','Damanhuri','My Ihram','23500000','','',0,'','','','',NULL,'2019-08-20 17:26:46','2019-08-20 17:26:46',0,6,64),(69,'In Branch',NULL,'','','201908SLOS000717','Siti Nurhasanah','Tour & Travel / Penyedia Jasa','Damanhuri','My Faedah','5500000','','',0,'','','','',NULL,'2019-08-20 17:28:27','2019-08-20 17:28:27',0,6,64),(70,'In Branch',NULL,'','','201908SLOS000711','Wahyu Diman','RO','Damanhuri','My Faedah','15000000','','',0,'','','','',NULL,'2019-08-20 17:29:39','2019-08-20 17:29:39',0,6,64),(71,'In Branch','17','Nisa nurathiqoh','','201907SLOS001508','Aminuddin','Direct Selling','Eko yuli suprianto','My Talim','7980000','','',0,'','','','',NULL,'2019-08-21 01:16:14','2019-08-21 07:14:01',0,15,45),(72,'In Branch',NULL,'','','radeva0405','jajang setiawan','Direct Selling','madinah iman wisata','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 09:34:40','2019-08-21 09:34:40',0,43,68),(73,'In Branch',NULL,'','','201908SLOS001178','Sekarlangit Umastuti','Tour & Travel / Penyedia Jasa','Sanggar Nisa Serpong','My Hajat','40000000','','',0,'','','','',NULL,'2019-08-21 09:40:10','2019-08-21 09:40:10',0,7,61),(74,'In Branch',NULL,'','','201908SLOS001186','lilis romiati','Direct Selling','madinah iman wisata','My Ihram','274450000','','',0,'','','','',NULL,'2019-08-21 10:22:42','2019-08-21 10:22:42',0,43,68),(75,'In Branch',NULL,'','','201908SLOS001152','otih','CGC','aep saepurohman','My Hajat','20225000','','',0,'','','','',NULL,'2019-08-21 10:31:50','2019-08-21 10:31:50',0,43,68),(76,'In Branch',NULL,'','','201908SLOS001184','agus hermawan','Tour & Travel / Penyedia Jasa','andromeda','My Safar','10023240','','',0,'','','','',NULL,'2019-08-21 10:45:14','2019-08-21 10:45:14',0,43,68),(77,'Cross-Branch','45','Pak Dayat','Pak Dayat','201908SLOS001195','SUPARNA','Tour & Travel / Penyedia Jasa','Kangen Kingdom Indonesia','My Faedah','27050000','','',0,'','','','',NULL,'2019-08-21 10:55:33','2019-08-21 10:55:33',0,37,74),(78,'Cross-Branch','45','Pak Dayat','Pak Dayat','201908SLOS001202','SUPARNA','Tour & Travel / Penyedia Jasa','Kangen Kingdom Indonesia','My Faedah','27050000','','',0,'','','','',NULL,'2019-08-21 11:11:35','2019-08-21 11:11:35',0,37,74),(79,'In Branch',NULL,'','','201908SLOS001199','NUNUNG','Agent','LILIS ROMIATI','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 11:24:43','2019-08-21 11:24:43',0,43,68),(80,'In Branch',NULL,'','','201908SLOS001212','NUNUNG','Agent','LILIS ROMIATI','My Ihram','227445000','','',0,'','','','',NULL,'2019-08-21 12:01:54','2019-08-21 12:01:54',0,43,68),(81,'In Branch',NULL,'','','201908SLOS001211','ade sukaesih','Agent','LILIS ROMIATI','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 12:17:58','2019-08-21 12:17:58',0,43,68),(82,'In Branch',NULL,'','','201908SLOS001223','IDA PARIDA','Agent','LILIS ROMIATI','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 13:32:35','2019-08-21 13:32:35',0,43,68),(83,'In Branch',NULL,'','','201908SLOS001228','ade sukaesih','Agent','LILIS ROMIATI','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 14:10:05','2019-08-21 14:10:05',0,43,68),(84,'In Branch',NULL,'','','201908SLOS001230','ADE SOBANA','Agent','LILIS ROMIATI','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 14:25:39','2019-08-21 14:25:39',0,43,68),(85,'In Branch',NULL,'','','201908SLOS001207','PRASATKA WIDUSAKA ST ','Digital Marketing','INSTAGRAM','My Hajat','24575000','','',0,'','','','',NULL,'2019-08-21 14:38:40','2019-08-21 14:38:40',0,45,94),(86,'In Branch',NULL,'','','201908SLOS001191','ANDI WISDA PRATAMA','Direct Selling','MEIDA RUSIANA TUNJANG','My Hajat','15000000','','',0,'','','','',NULL,'2019-08-21 15:11:50','2019-08-21 15:11:50',0,29,100),(87,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001237','ENY PUJI LESTARI','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-21 15:16:25','2019-08-21 15:16:25',0,37,76),(88,'In Branch',NULL,'','','201908SLOS001214','Sadharati','Tour & Travel / Penyedia Jasa','PT.Altur wisata mulia','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-21 15:23:38','2019-08-21 15:23:38',0,42,56),(89,'In Branch',NULL,'','','201908SLOS001238','ZAINAL ABIDIN','Tour & Travel / Penyedia Jasa','GRACE RUMAH PENGANTEN','My Hajat','23000000','','',0,'','','','',NULL,'2019-08-21 16:00:19','2019-08-21 16:00:19',0,3,35),(90,'In Branch',NULL,'','','201908SLOS001246','Rama Sahab','Tour & Travel / Penyedia Jasa','Eposs Laundry','My Hajat','21500000','','',0,'','','','',NULL,'2019-08-21 16:12:02','2019-08-21 16:12:02',0,26,40),(91,'In Branch',NULL,'','','201908SLOS001251','nunung','Agent','LILIS ROMIATI','My Ihram','27445000','','',0,'','','','',NULL,'2019-08-21 16:43:25','2019-08-21 16:43:25',0,43,68),(92,'In Branch',NULL,'','','201908SLOS001252','Rama Sahab','Tour & Travel / Penyedia Jasa','Eposs Laundry','My Hajat','21500000','','',0,'','','','',NULL,'2019-08-21 17:12:35','2019-08-21 17:12:35',0,26,40),(93,'Cross-Branch','2','Reki','Reki','201908SLOS001258','ENCEP DEDI S','Tour & Travel / Penyedia Jasa','Kangen Kingdom Indonesia','My Faedah','27050000','','',0,'','','','',NULL,'2019-08-21 17:42:10','2019-08-21 17:42:10',0,37,74),(94,'In Branch',NULL,'','','201908SLOS001104','Magista dana fitria','Tour & Travel / Penyedia Jasa','PT. ARYATI WISATA MANDIRI','My Ihram','26000000','','',0,'','','','',NULL,'2019-08-22 10:18:05','2019-08-22 10:18:05',0,15,44),(95,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001296','sulasi','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-22 10:28:11','2019-08-22 10:28:11',0,37,76),(96,'In Branch',NULL,'','','201908SLOS001300','Andi setiawan','Agent','Fiki Ekowati','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-22 10:42:43','2019-08-22 10:42:43',0,15,44),(97,'In Branch',NULL,'','','201908SLOS000870','Cecep edi sugandi','Tour & Travel / Penyedia Jasa','AL MALIK','My Ihram','23927000','','',0,'','','','',NULL,'2019-08-22 11:07:47','2019-08-22 11:07:47',0,15,45),(98,'In Branch',NULL,'','','201908SLOS001272','SADHARATI','Tour & Travel / Penyedia Jasa','Pt. Altur wisata mulia','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-22 11:40:06','2019-08-22 11:40:06',0,42,56),(99,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001320','ENY PUJI LESTARI','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-22 14:19:28','2019-08-22 14:19:28',0,37,76),(100,'In Branch',NULL,'','','201908SLOS001333','EKA SRI WARTINA','CGC','AHDIYAT RIFANI','My Faedah','5150000','','',0,'','','','',NULL,'2019-08-22 16:19:06','2019-08-22 16:19:06',0,3,35),(101,'In Branch',NULL,'','','201908SLOS001341','Nur Rakhmad Muchlis','EGC','ABD RAHMAN AHMAN','My Faedah','30000000','','',0,'','','','',NULL,'2019-08-22 16:56:56','2019-08-22 16:56:56',0,44,33),(102,'In Branch',NULL,'','','201908SLOS000623','NURAINI UMAIYAH','Agent','HANDJARITA GATOT','My Ihram','18500000','','',0,'','','','',NULL,'2019-08-22 17:01:06','2019-08-22 17:01:06',0,15,44),(103,'In Branch','5','MITHA ANDRIANI','','201907SLOS000400','FIKI EKOWATI','Tour & Travel / Penyedia Jasa','ALINDRA MUTIARA HATI','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-22 17:02:36','2019-08-22 17:07:55',0,15,44),(104,'In Branch',NULL,'','','201908SLOS000266','ANDI SETIAWAN','Agent','FIKI EKOWATI','My Ihram','20899998','','',0,'','','','',NULL,'2019-08-22 17:03:51','2019-08-22 17:03:51',0,15,44),(105,'In Branch','','','','201908SLOS000083','NANIK SUGIYARTI','Agent','FIKI EKOWATI','My Ihram','41800000','','',0,'','','','',NULL,'2019-08-22 17:05:20','2019-08-22 17:06:15',0,15,44),(106,'In Branch',NULL,'','','201907SLOS001282','Ade Sodikin','Direct Selling','M Adita Darmawan','My Ihram','23000000','','',0,'','','','',NULL,'2019-08-23 09:23:27','2019-08-23 09:23:27',0,6,53),(107,'In Branch',NULL,'','','201908SLOS000936','Irma Yulia Ramli','Direct Selling','M Aditya Darmawan','My Ihram','38999998','','',0,'','','','',NULL,'2019-08-23 09:25:30','2019-08-23 09:25:30',0,6,53),(108,'In Branch',NULL,'','','201908SLOS000071','Zainal Muttaqin','Direct Selling','M Adita Darmawan','My Ihram','39000000','','',0,'','','','',NULL,'2019-08-23 09:32:34','2019-08-23 09:32:34',0,6,53),(109,'In Branch',NULL,'','','201908SLOS000056','Ir Kusnadi','Direct Selling','M Aditya Darmawan','My Talim','11400000','','',0,'','','','',NULL,'2019-08-23 09:33:56','2019-08-23 09:33:56',0,6,53),(110,'Cross-Branch','42','Dede Rizky Wahyudi','Dede Rizky Wahyudi','201908SLOS001362','Hendra Kelana','Tour & Travel / Penyedia Jasa','PT Altur Wisata Mulia','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-23 10:20:20','2019-08-23 10:20:20',0,7,60),(111,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001368','wakini','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-23 10:36:00','2019-08-23 10:36:00',0,37,76),(112,'In Branch',NULL,'','','201908SLOS001259','RINI SETIAWATI','Agent','FITRI HARYANI','My Hajat','33000000','','',0,'','','','',NULL,'2019-08-23 10:40:47','2019-08-23 10:40:47',0,26,40),(113,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001369','samingun','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-23 10:45:04','2019-08-23 10:45:04',0,37,76),(114,'In Branch',NULL,'','','201908SLOS001389','NUR RAKHMAD MUCHLIS','EGC','ABD RAHMAD AHMAN','My Faedah','30000000','','',0,'','','','',NULL,'2019-08-23 12:51:12','2019-08-23 12:51:12',0,44,33),(118,'In Branch',NULL,'','','201908SLOS000985','Supriyati','Tour & Travel / Penyedia Jasa','Syahrie decoration','My Hajat','25000000','','',0,'','','','',NULL,'2019-08-23 14:28:09','2019-08-23 14:28:09',0,42,52),(119,'In Branch',NULL,'','','201908SLOS001395','SADHARATI','Tour & Travel / Penyedia Jasa','Pt. Altur wisata mulya','My Ihram','26500000','','',0,'','','','',NULL,'2019-08-23 14:32:11','2019-08-23 14:32:11',0,42,56),(120,'Cross-Branch','11','Nurfadli','Nurfadli','201908SLOS001245','Abdul Fakih','Tour & Travel / Penyedia Jasa','PT BAHANA SUKSES SEJAHTERA','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-23 14:41:44','2019-08-23 14:41:44',0,42,51),(121,'Cross-Branch','5','Vina','Vina','201908SLOS000880','Adhitya Chasanda','Tour & Travel / Penyedia Jasa','PT TAJAK RAMADHAN','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-23 14:43:51','2019-08-23 14:43:51',0,42,51),(122,'In Branch',NULL,'','','201908SLOS001193','SUHARYANI','Agent','SRI LESTARI','My Hajat','24650000','','',0,'','','','',NULL,'2019-08-23 14:49:33','2019-08-23 14:49:33',0,33,110),(123,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001406','SUGIARTO','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-23 16:05:28','2019-08-23 16:05:28',0,37,76),(124,'In Branch',NULL,'','','201908SLOS001409','Nurlaelah DRA MPd','Agent','Fiki Ekowati','My Ihram','41800000','','',0,'','','','',NULL,'2019-08-23 21:50:08','2019-08-23 21:50:08',0,15,44),(125,'Cross-Branch','5','CMS FIRHAN','CMS FIRHAN','201908SLOS000667','ERNES DARIANSYAH ','Tour & Travel / Penyedia Jasa','joker','My Hajat','5800000','','',0,'','','','',NULL,'2019-08-24 08:50:05','2019-08-24 08:50:05',0,45,93),(126,'In Branch','','','','201908SLOS001426','Mariyam','Tour & Travel / Penyedia Jasa','Agent PT Al Ikhlas Wisata Mandiri (Widodo)','My Ihram','28500000','','',0,'','','','',NULL,'2019-08-24 08:55:19','2019-08-24 08:56:05',0,19,103),(127,'In Branch',NULL,'','','201908SLOS001440','RIZAL','Walk-in','COMLOAN','My Faedah','3400000','','',0,'','','','',NULL,'2019-08-24 08:59:48','2019-08-24 08:59:48',0,3,35),(128,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001443','SUWAHONO','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-24 09:45:02','2019-08-24 09:45:02',0,37,76),(129,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001446','sukeni','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-24 10:14:29','2019-08-24 10:14:29',0,37,76),(130,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001448','SUWAHONO','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-24 10:18:53','2019-08-24 10:18:53',0,37,76),(131,'In Branch',NULL,'','','201908SLOS001391','Refly puspitasari bayu','Direct Selling','Pt lima saudara durmta wisata','My Ihram','20900000','','',0,'','','','',NULL,'2019-08-25 20:38:34','2019-08-25 20:38:34',0,36,85),(132,'Cross-Branch','20','Pak Yudi','Pak Yudi','201908SLOS001479','didik jasmanto','Tour & Travel / Penyedia Jasa','Madinah Iman Wisata Salatiga','My Ihram','25000000','','',0,'','','','',NULL,'2019-08-26 09:35:39','2019-08-26 09:35:39',0,37,76),(133,'Cross-Branch','45','Pak Dayat','Pak Dayat','201908SLOS001496','ESTHER NANCY TOTIAN','Tour & Travel / Penyedia Jasa','Kangen Kingdom Indonesia','My Faedah','27050000','','',0,'','','','',NULL,'2019-08-26 10:31:03','2019-08-26 10:31:03',0,37,74),(134,'In Branch',NULL,'','','201908SLOS001383','JOSHUA AVINANTO LISTYO','Direct Selling','VENDRA IRAWAN','My Hajat','34000000','','',0,'','','','',NULL,'2019-08-26 10:50:39','2019-08-26 10:50:39',0,45,93),(135,'In Branch',NULL,'','','201908SLOS001497','NANA KURNIANTI','Tour & Travel / Penyedia Jasa','PT. ZADUL MAAD MANDIRI','My Ihram','23500000','','',0,'','','','',NULL,'2019-08-26 11:01:39','2019-08-26 11:01:39',0,11,47),(136,'In Branch',NULL,'','','201907SLOS001459','Laswati','Tour & Travel / Penyedia Jasa','PT.albilad universal','My Ihram','4000000','','',0,'','','','',NULL,'2019-08-26 11:17:11','2019-08-26 11:17:11',0,42,56),(137,'In Branch',NULL,'','','201908SLOS001503','ZUMAROTUL MUKAROMAH','Direct Selling','Armila','My Hajat','20000000','','',0,'','','','',NULL,'2019-08-26 11:29:43','2019-08-26 11:29:43',0,18,92),(138,'In Branch',NULL,'','','201908SLOS001522','NANA KURNIANTI','Tour & Travel / Penyedia Jasa','PT. ZADUL MAAD MANDIRI','My Ihram','23500000','','',0,'','','','',NULL,'2019-08-26 13:37:43','2019-08-26 13:37:43',0,11,47);

#
# Structure for table "tb_mitra_kerjasama"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_mitra_kerjasama"
#

INSERT INTO `tb_mitra_kerjasama` VALUES (10,'RIAS PENGANTIN ANISA AYU','Perorangan','WEDDING ORGANIZER','@riaspengantin_anisaayu','SKU.pdf','KTP_DAN_NPWP_OWNER.pdf','KK.pdf','COVER_BUKU_TABUNGAN.pdf','form_ceklis.jpg','Daftar_PAKET_RUMAH_DAN_AULA_rias_pengantin_anisa_ayu.doc','foto_pks_1.jpg','sanggar.jpg',NULL,NULL,1,11,47,'2019-08-19 14:56:39','2019-08-19 14:56:39'),(11,'RIAS PENGANTIN ANISA AYU','Perorangan','WEDDING ORGANIZER','@riaspengantin_anisaayu','MUTASI_REK_JULI_2019.pdf','MUTASI_REK_JUNI_2019.pdf','foto_ruangan_1a.jpg','foto_pks_2.jpg','form_ceklis1.jpg','perjanjian_kerjasama_anisaayu.pdf','form_ceklis_anisaayu.pdf','perjanjian_kerjasama_anisaayu1.pdf',NULL,NULL,3,11,47,'2019-08-19 14:58:40','2019-08-24 08:34:47'),(12,'Rumah Pengantin Aisyah','Perorangan','Wedding Organizer','IG=@irmawd_rpa','ktp_owner.jpg','KK_penyedia_jasa.jpg','ktp_penyedia_jasa.jpg','form_partnership1.pdf','SKU.jpeg','foto_lokasi.jpg','IG_Rumah_pengantin_aisyah.jpg','foto_pakaian.jpg','FORM_CEKLIS.pdf','rekening_koran_penyedia_jasa.pdf',1,11,65,'2019-08-19 16:48:00','2019-08-23 11:11:16'),(13,'Arti Wedding','Badan Usaha','Wedding Organizer','IG=@artiweddingservice','ktp_owner1.jpg','ktp_suami_owner.jpg','npwp_cv_arti_wedding.jpg','foto_bareng_suami_owner.jpg','form_partnership.pdf','Buku_Rekening.pdf','SKU,_SIUP,_TDPPK.pdf',NULL,NULL,NULL,1,11,65,'2019-08-20 10:34:05','2019-08-20 10:34:05'),(14,'reisa wedding','Perorangan','wedding organizer','@srhang_mua','data_reisa_wo.pdf','1.jpg','2.jpg','3.jpg','form_ceklis.pdf','form_kerjasama.pdf','FORM_PARTNERSHIP_MY_HAJAT.pdf',NULL,NULL,NULL,3,40,82,'2019-08-20 10:49:06','2019-08-22 18:02:41'),(15,'PT Tiga Rekan Berkah Sejahtera','Badan Usaha','General trading,supplier,agen property','Www.furniturecakep.com','partnhersip_pk_deni.pdf','form_cheklist_deni_.pdf','pks_deni.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,15,45,'2019-08-22 10:46:59','2019-08-22 10:46:59'),(16,'PT BONA PASOGIT JAYA','Badan Usaha','PT BONA PASOGIT JAYA','Bonapasogitjaya.com','1._form_patnership_PT._BPJ.pdf','2._Cover_tabungan_PT._BPJ.pdf','3._KTP_DIREKTUR_PT._BPJ.jpg','4._KK_DIREKTUR.jpg','6._COMPANY_PROFILE_BPJ.pdf','7._Rekening_PT._BPJ.png','Kantor_PT.BPJ_(2).jpg','PIC-Owner_PT._BPJ_(3).jpg','PIC-Owner_PT.BPJ_(1).jpg','Kantor_PT._BPJ_(2).jpg',1,15,44,'2019-08-22 15:42:38','2019-08-22 15:42:38'),(17,'Toko Sentral Elektronik','Perorangan','Perdagangan Barang Elektronik','https://m.facebook.com/pages/Sentral-Elektronik/1523576711282393','KTP,_KK,_SIUP,_TDP,_SITU_NPWP','Form_Verifikasi,_Kerjasama_Checklist','IMG-20190821-WA0016.jpg','IMG-20190819-WA0069.jpg','IMG-20190819-WA0065.jpg','IMG_20190819_152956.jpg','IMG_20190819_155204.jpg','Rek_Bulan_5.pdf','Rek_Bulan_7.pdf','Rek_Bulan_6.pdf',1,19,103,'2019-08-22 18:21:41','2019-08-22 18:21:41'),(18,'Toko Sentral Elektronik','Perorangan','Perdagangan Barang Elektronik','https://www.facebook.com/pages/Sentral-Elektronik/1523576711282393','KTP,_KK,_SIUP,_TDP,_SITU_NPWP2.pdf','Foto_CMS_Penyedia_Jasa.jpeg','Mutasi_Rek_Koran_Bulan_72.pdf','Foto_PIC_Latar_belakang_Toko.jpeg','Foto_Lokasi_usaha_bagian_dalam_8.jpeg','Foto_Lokasi_usaha_bagian_luar_4.jpeg','Foto_Lokasi_usaha_bagian_dalam_5.jpeg',NULL,NULL,NULL,1,19,103,'2019-08-22 18:46:43','2019-08-22 18:46:43'),(19,'CV ISHO INTERIOR','Badan Usaha','DESIGN INTERIOR','ISHOIN4589','form_partnership2.pdf','PERJANJIAN_KERJASAMA_2.pdf','form_checklist.pdf','DATA_PENYEDIA_JASA.odt',NULL,NULL,NULL,NULL,NULL,NULL,1,8,107,'2019-08-23 10:28:01','2019-08-23 10:28:01'),(20,'CV Move On Communication','Badan Usaha','Kontraktor ','Www.moveoncommunication.com','pks_cv_move_on.pdf','form_ceklis_cv_move_on_-_.pdf','form_partnership_cv_move_on_-_.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,15,45,'2019-08-23 12:13:47','2019-08-24 08:48:36'),(21,'CV ISHO INTERIOR','Badan Usaha','cv','ishoin4589','form_checklist1.pdf','form_partnership3.pdf','PERJANJIAN_KERJASAMA_21.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,8,107,'2019-08-23 17:58:43','2019-08-23 17:58:43');

#
# Structure for table "tb_my_cars"
#

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


#
# Structure for table "tb_my_faedah"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah"
#

INSERT INTO `tb_my_faedah` VALUES (28,'BAMBANG SUTADI','Eksternal','CV KANGEN KINGDOM INDONESIA','Badan Usaha','1 TAHUN','MESIN AIR MINERAL KANGEN WATER','Baru',1,'LEVELUK JR II','PUTIH','2019',27050000,'Produktif','','KTP_PEMOHON.jpg','KTP_ISTRI.jpg','KK_PEMOHON.jpg','BKR_PBB.jpg','BUKTI_PENGHASILAN.jpg','PEMBUKUAN_BAMBANG.xlsx','FORM_PENGAJUAN.pdf','Form_Verifikasi.pdf','Berkas_Penyedia_Jasa.pdf',NULL,'2019-08-19 18:18:32','2019-08-20 17:36:22',3,37,74),(29,'Neni Yusnia','Eksternal','Raja Sepeda','Perorangan','6 Tahun ','SEPEDA','Baru',1,'XTRADA 5.0 NEW DAN THRILL RAVAGE 5.0','BIRU HITAM','2019',11755000,'Konsumtif','New Debitur di BFI Syariah dengan pembiayaan My Faedah (Sepeda) dengan tipe  XTRADA 5.0 NEW dan THRILL RAVAGE 5.0 2019','neni_sepeda_form.pdf','ktp_neni.jpeg','kk_neni.jpeg','bkr_neni.jpeg','sku_neni.jpeg','ktp_pasangan_nico.jpeg','kk_nico.jpeg','WhatsApp_Image_2019-08-09_at_12.24.42.jpeg','WhatsApp_Image_2019-08-09_at_12.24.421.jpeg','usha_neni_1.jpeg','2019-08-20 06:52:43','2019-08-20 09:57:54',3,24,70),(30,'Boby Akbar','Internal','Sugianto','Perorangan','19 Tahun','Barang bangunan','Baru',55,'Barang bangunan','-','2019',30086500,'Konsumtif','Pengajuan pembiayaan my faedah pembelian barang bangunan a.n boby akbar ','formulir_pengajuan_pembiayaan_syariah_boby_akbar_baru.pdf','bkr_boby_akbar.pdf','data_penyedia_jasa_toko_bangunan_dan_nota_barang.pdf','formulir_partnership_my_faedah_toko_hero_jaya.pdf','foto_toko_dan_foto_barang.pdf','form_pengajuan_my_faedah_bobi_akbar.pdf','data_bobi_akbar.pdf',NULL,NULL,NULL,'2019-08-20 09:57:06','2019-08-20 16:14:41',3,16,31),(31,'Boby Akbar','Internal','Sugianto','Perorangan','19 Tahun','Barang bangunan','Baru',55,'Barang bangunan','-','2019',30086500,'Konsumtif','Pengajuan pembiayaan my faedah pembelian barang bangunan a.n boby akbar ','formulir_pengajuan_pembiayaan_syariah_boby_akbar_baru1.pdf','bkr_boby_akbar1.pdf','data_penyedia_jasa_toko_bangunan_dan_nota_barang1.pdf','formulir_partnership_my_faedah_toko_hero_jaya1.pdf','foto_toko_dan_foto_barang1.pdf','form_pengajuan_my_faedah_bobi_akbar1.pdf','data_bobi_akbar1.pdf',NULL,NULL,NULL,'2019-08-20 09:57:15','2019-08-20 15:00:00',1,16,31),(32,'Emy Susanti','Eksternal','Sugianto','Perorangan','19 Tahun','Barang Bangunan','Baru',19,'Barang bangunan','-','2019',13066000,'Konsumtif','Pengajuan my faedah pembelian barang bangunan a.n emy susanti','form_pengajuan_my_faedah_emy_susanti.pdf','data_penyedia_jasa_toko_bangunan.pdf','data_emy_susanti.pdf','formulir_partnership_my_faedah_toko_hero_jaya2.pdf','foto_toko_dan_foto_barang2.pdf','nota_barang_yang_akan_di_beli.pdf','Memo_emy_susanti1.pdf',NULL,NULL,NULL,'2019-08-20 10:04:04','2019-08-20 16:13:51',3,16,31),(33,'Emy Susanti','Eksternal','Sugianto','Perorangan','19 Tahun','Barang Bangunan','Baru',19,'Barang bangunan','-','2019',13066000,'Konsumtif','Pengajuan my faedah pembelian barang bangunan a.n emy susanti','form_pengajuan_my_faedah_emy_susanti1.pdf','data_penyedia_jasa_toko_bangunan1.pdf','data_emy_susanti1.pdf','formulir_partnership_my_faedah_toko_hero_jaya3.pdf','foto_toko_dan_foto_barang3.pdf','nota_barang_yang_akan_di_beli1.pdf','Memo_emy_susanti.pdf',NULL,NULL,NULL,'2019-08-20 10:04:15','2019-08-20 15:03:11',1,16,31),(34,'RM GIAN PRATAMA PUTRA','Eksternal','RATU IRAMA ELECTRONIK','Perorangan','40 TAHUN','KIPAS BLOWER','Baru',6,'SEKAI','HITAM','2019',21600000,'Produktif','','foto_rumah_rm_gian.pdf','Form_Pengajuan_Permohonan1.pdf','DATA_RATU_IRAMA1.pdf','DATA_GIAN.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-20 10:19:23','2019-08-20 17:36:11',3,16,31),(35,'Neni Yusnia ','Eksternal','Raja Sepeda','Perorangan','6 Tahun','Sepeda ','Baru',2,'Polygon Xtrada 5.0 M 27.5 Dan Thrill Ravage 5.0 M 27.5 ','Biru Hitam','2019',11755000,'Konsumtif','New Debitur di BFI Syariah dengan pembiayaan My Faedah Sepeda Polygon Xtrada 5.0 m 27.5\" dan Thrill Ravage 5.0 M 27.5\" dengan total harga 11755000','kk_neni1.jpeg','ktp_neni1.jpeg','bkr_neni1.jpeg','ktp_pasangan.jpeg','usha_neni_11.jpeg','ktp_pasangan_nico1.jpeg','kk_nico1.jpeg','sku_neni1.jpeg','sku_neni2.jpeg','WhatsApp_Image_2019-08-09_at_12.24.422.jpeg','2019-08-21 07:28:24','2019-08-21 08:45:40',3,24,70),(36,'SUPARNA','Eksternal','CV KANGEN KINGDOM INDONESIA','Badan Usaha','1 TAHUN','MESIN AIR MINERAL LEVELUK JR II','Baru',1,'LEVELUK JR II','PUTIH','2019',27050000,'Produktif','DENGAN PENYEDIA BARANG YANG SAMA ','KTP_PEMOHON1.jpg','KTP_ISTRI1.jpg','KK_PEMOHON1.jpg','BKR_PBB1.jpg','BKR_REK_LISTRIK.jpg','BUKTI_PENGHASILAN1.jpg','BUKTI_PENGHASILAN2.jpg','DOKUMEN_PENYEDIA_JASA_27.pdf','Akta_Pendirian.pdf','FORM_PENGAJUAN2.pdf','2019-08-21 10:46:56','2019-08-22 10:16:53',3,37,74),(37,'Muh Ahsan Zamzami ','Eksternal','Raja Sepeda','Perorangan','6 Tahun','Sepeda','Baru',1,'Xtrada 6.0','Hitam ','2019',6700000,'Konsumtif','New Debitur di BFI Syariah dengan pembiayaan produk My Faedah Sepeda dengan tipe Xtrasa 6.0 dengan harga 6700000','WhatsApp_Image_2019-08-09_at_12.24.423.jpeg','ktp_pasangan_nico2.jpeg','kk_nico2.jpeg','WhatsApp_Image_2019-08-21_at_14.31.38.jpeg','WhatsApp_Image_2019-08-21_at_14.31.38_(1).jpeg','WhatsApp_Image_2019-08-21_at_14.33.07.jpeg','WhatsApp_Image_2019-08-21_at_14.33.06.jpeg','WhatsApp_Image_2019-08-21_at_14.31.37.jpeg','form_Ahsan_Sepeda.pdf',NULL,'2019-08-21 14:48:18','2019-08-22 15:13:37',3,24,70),(38,'ENCEP DEDI S','Eksternal','CV KANGEN KINGDOM INDONESIA','Badan Usaha','1 TAHUN','MESIN AIR MINERAL','Baru',1,'LEVELUK JR II','PUTIH','2019',27050000,'Produktif','DENGAN PENYEDIA JASA YANG SAMA DAN SUDAH BEKERJA SAMA','KTP_PEMOHON2.jpg','KTP_ISTRI2.jpg','KK_PEMOHON2.jpg','BUKTI_PENGHASILAN_1.jpg','BUKTI_PENGHASILAN_2.jpg','BKR.pdf','DOKUMEN_PENYEDIA_JASA_271.pdf','Akta_Pendirian1.pdf','FORM_PENGAJUAN1.pdf',NULL,'2019-08-21 17:15:06','2019-08-22 11:50:33',3,37,74),(40,'DESI ARISANDI','Eksternal','CV QUAZONE WATERINDO','Badan Usaha','9 TAHUN','1 PAKET MESIN DEPOT AIR MINUM','Baru',4,'ANOTEC','VARIASI','2019',35000000,'Produktif','PENGAJUAN UNTUK PEMBELIAN 1 SET MESIN DEPOT AIR','PEMOHON.pdf','PIHAK_JASA.pdf','FORM.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 19:03:46','2019-08-22 16:24:23',3,31,95),(41,'SUMARDI SEGA','Eksternal','VITA KARYA FURNITURE INTERIOR','Perorangan','6 THN','BARANG MODAL GEROBAK','Baru',4,'TANPA MERK DAN TYPE','SILVER','2019',20000000,'Produktif','HARGA PER UNT 5 JUTA\r\nPENGAJUAN 4 GEROBAK = RP. 20.000.000','DATA_KONS.pdf','FORM_SUMARDI_SEGA.pdf','DATA_PHK_3.pdf','foto_gerobak.jpeg','foto_gerobak2.jpeg','foto_gerobak3.jpeg','RK1.jpeg','RK2.jpeg','Re_NST_Pembelian_material_ke_Penyedia_Jasa.eml',NULL,'2019-08-22 10:58:53','2019-08-22 11:10:36',1,3,35),(42,'EKA SRI WARTINA','Eksternal','MEKAR JAYA ELEKTRONIK','Badan Usaha','25 THN','Televisi 50 Inch POLYTRON LED','Baru',1,'50 Inch POLYTRON LED','HITAM','2019',5150000,'Konsumtif','','Data_kons_Eka_Sri_wartina.pdf','RK_eka.pdf','INVOICE_TV.jpeg','BARANG_TV.jpeg','LEGALITAS_MEKAR_JAYA_ELEKTRONIK.pdf','BRI_Internet_Banking_Juni_2019.pdf','BRI_Internet_Banking_Juli_2019.pdf','BRI_Internet_Banking_Agustus_2019.pdf','PIC_+_OWNER.jpeg','Form_Eka_Sri_W.pdf','2019-08-22 11:07:21','2019-08-22 15:12:04',3,3,35),(43,'INDRA RAYA NITA','Eksternal','CHIP PROFESSIONAL KOMPUTER','Perorangan','6THN','LAPTOP ASUS TIPE X441UB','Baru',1,'ASUS TIPE X441UB','MERAH','2019',6750000,'Konsumtif','-','Dok_baru_2019-08-22_15.39.35.pdf','Dok_baru_2019-08-22_16.00.26.pdf','FORM1.pdf','KK.pdf','REK.LISTRIK.pdf','BUKTI_PENGHASILAN_1.pdf','KK_DAN_KTP.pdf','TDP.pdf','SIUP.pdf','FOTO_CMS,_PIHAK_KETIGA_DAN_KANTOR,_DAN_PENAWARAN_HARGA.pdf','2019-08-22 14:04:22','2019-08-22 16:51:52',3,31,96),(44,'RIZAL','Internal','MEKAR JAYA ELEKTRONIK','Badan Usaha','25 THN','SPEAKER AKTIF','Baru',2,'POLYTRON','COKLAT','2019',3400000,'Konsumtif','Rp. 1.700.000 / Unit\r\nPengajuan 2 unit = Rp. 3.400.000\r\n','F_419_Rizal.pdf','FORM_RIZAL.pdf','KK.jpeg','KTP_PEMOHON.jpeg','KTP_PASANGAN.jpeg','LEGALITAS_MEKAR_JAYA_ELEKTRONIK1.pdf','FOTO_USAHA_MEKAR_JAYA.pdf','BRI_Internet_Banking_Juni_20191.pdf','BRI_Internet_Banking_Juli_20191.pdf','Re_Penyimpangan_jenis_barang_yang_di_biayai_Myfaedah_-_Comloan.eml','2019-08-23 08:17:19','2019-08-23 13:39:18',3,3,35),(45,'Lalu Ismail','Eksternal','Raja Sepeda','Perorangan','6 Tahun','Sepeda','Baru',1,'Thriil 27.5\" Ravage 5.0 ','Hitam ','2019',6000000,'Konsumtif','New debitur di BFI Syariah dengan pembiayaan produk My Faedah Sepeda Thrill 27.5\" Ravege 5.0 dengan harga 6.000.000','form_L_ismail.pdf','kk_pemohon.jpeg','ktp_pasangan1.jpeg','ktp_pemohon.jpeg','SKU_Isteri.jpeg','slip_gaji_pemohon.jpeg','ktp_pasangan_nico3.jpeg','kk_nico3.jpeg','WhatsApp_Image_2019-08-09_at_12.24.424.jpeg',NULL,'2019-08-23 14:27:20','2019-08-23 14:49:11',3,24,70),(46,'ESTHER NANCY TOTIAN','Eksternal','CV KANGEN KINGDOM INDONESIA','Badan Usaha','1 TAHUN','MESIN AIR MINERAL KANGEN WATER','Baru',1,'LEVELUK JR II','PUTIH','2019',27050000,'Produktif','DENGAN PENYEDIA JASA YANG SAMA DAN SUDAH BEKERJA SAMA','KTP_PEMOHON3.jpg','KK_PEMOHON3.jpg','BKR_PBB_PEMOHON.jpg','BUKTI_PENGHASILAN.pdf','DOKUMEN_PENYEDIA_JASA_272.pdf','AKTA_PENDIRIAN_KANGEN_KINGDON_INDONESIA.pdf','FORM_PENGAJUAN3.pdf',NULL,NULL,NULL,'2019-08-26 09:51:47','2019-08-26 11:09:24',3,37,74);

#
# Structure for table "tb_my_faedah_bangunan"
#

CREATE TABLE `tb_my_faedah_bangunan` (
  `id_bangunan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_penyedia` varchar(255) NOT NULL DEFAULT '',
  `jenis_penyedia` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembelian` varchar(255) NOT NULL DEFAULT '',
  `lokasi_pembangunan` varchar(255) NOT NULL DEFAULT '',
  `luas_bangunan` varchar(255) NOT NULL DEFAULT '',
  `waktu_pelaksanaan` varchar(255) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`id_bangunan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah_bangunan"
#


#
# Structure for table "tb_my_faedah_elektronik"
#

CREATE TABLE `tb_my_faedah_elektronik` (
  `id_elektronik` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_penyedia` varchar(255) NOT NULL DEFAULT '',
  `jenis_penyedia` varchar(255) NOT NULL DEFAULT '',
  `lama_usaha` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembelian` varchar(255) NOT NULL DEFAULT '',
  `jenis_barang` varchar(255) NOT NULL DEFAULT '',
  `jumlah_barang` int(11) NOT NULL DEFAULT 0,
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
  PRIMARY KEY (`id_elektronik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah_elektronik"
#


#
# Structure for table "tb_my_faedah_lainnya"
#

CREATE TABLE `tb_my_faedah_lainnya` (
  `id_myfaedah_lainnya` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_penyedia` varchar(255) NOT NULL DEFAULT '',
  `jenis_penyedia` varchar(255) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`id_myfaedah_lainnya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah_lainnya"
#


#
# Structure for table "tb_my_faedah_modal"
#

CREATE TABLE `tb_my_faedah_modal` (
  `id_modal` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_penyedia` varchar(255) NOT NULL DEFAULT '',
  `jenis_penyedia` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembelian` varchar(255) NOT NULL DEFAULT '',
  `jenis_barang` varchar(255) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`id_modal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah_modal"
#


#
# Structure for table "tb_my_faedah_qurban"
#

CREATE TABLE `tb_my_faedah_qurban` (
  `id_qurban` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(255) NOT NULL DEFAULT '',
  `jenis_konsumen` varchar(255) NOT NULL DEFAULT '',
  `nama_penyedia` varchar(255) NOT NULL DEFAULT '',
  `jenis_penyedia` varchar(255) NOT NULL DEFAULT '',
  `lama_usaha` varchar(255) NOT NULL DEFAULT '',
  `tujuan_pembelian` varchar(255) NOT NULL DEFAULT '',
  `jenis_hewan` varchar(255) NOT NULL DEFAULT '',
  `jumlah_hewan` int(11) NOT NULL DEFAULT 0,
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
  PRIMARY KEY (`id_qurban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_faedah_qurban"
#


#
# Structure for table "tb_my_hajat"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat"
#

INSERT INTO `tb_my_hajat` VALUES (45,NULL,NULL,19,NULL,NULL,3,35),(46,26,NULL,NULL,NULL,NULL,16,31),(47,27,NULL,NULL,NULL,NULL,16,31),(48,NULL,NULL,20,NULL,NULL,7,60),(49,NULL,NULL,21,NULL,NULL,7,61),(50,NULL,NULL,NULL,11,NULL,6,50),(51,NULL,NULL,22,NULL,NULL,6,50),(52,NULL,NULL,NULL,12,NULL,26,40),(53,28,NULL,NULL,NULL,NULL,16,31),(54,NULL,NULL,23,NULL,NULL,3,35),(55,NULL,NULL,24,NULL,NULL,40,58),(56,NULL,NULL,25,NULL,NULL,40,58),(57,29,NULL,NULL,NULL,NULL,16,31),(58,NULL,NULL,26,NULL,NULL,42,56),(59,NULL,NULL,27,NULL,NULL,42,56),(60,NULL,NULL,28,NULL,NULL,11,47),(61,30,NULL,NULL,NULL,NULL,29,83),(62,NULL,NULL,29,NULL,NULL,11,47),(63,NULL,NULL,30,NULL,NULL,6,50),(64,NULL,NULL,31,NULL,NULL,40,82),(65,NULL,NULL,32,NULL,NULL,40,58),(66,NULL,NULL,33,NULL,NULL,45,94),(67,NULL,NULL,34,NULL,NULL,3,35),(68,NULL,NULL,35,NULL,NULL,40,58),(69,NULL,NULL,36,NULL,NULL,40,82),(70,31,NULL,NULL,NULL,NULL,27,72),(71,32,NULL,NULL,NULL,NULL,27,72),(72,NULL,NULL,NULL,13,NULL,43,68),(73,NULL,NULL,NULL,NULL,12,43,68),(74,NULL,NULL,NULL,NULL,13,8,26),(75,33,NULL,NULL,NULL,NULL,15,45),(76,NULL,16,NULL,NULL,NULL,26,63),(77,NULL,17,NULL,NULL,NULL,18,92),(78,NULL,18,NULL,NULL,NULL,18,92),(79,NULL,19,NULL,NULL,NULL,29,83),(80,NULL,NULL,37,NULL,NULL,40,58),(81,NULL,NULL,38,NULL,NULL,40,58),(82,NULL,20,NULL,NULL,NULL,18,99),(83,34,NULL,NULL,NULL,NULL,24,70),(84,NULL,NULL,NULL,NULL,14,18,92),(85,NULL,NULL,39,NULL,NULL,43,68),(86,35,NULL,NULL,NULL,NULL,39,104),(87,NULL,NULL,40,NULL,NULL,44,32);

#
# Structure for table "tb_my_hajat_franchise"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_franchise"
#

INSERT INTO `tb_my_hajat_franchise` VALUES (11,'MOCH ASMUNASIR','Eksternal','PT BERLIAN INTERNASIONAL TEKNOLOGI',20,'Makanan dan Minuman','2013',36000000,'Selamanya','braderhud.com','PT BERLIAN INTERNASIONAL TEKNOLOGI merupakan perusahaan Waralaba (Franchise) yang bergerak di dalam bidang Kuliner (Minuman Kesehatan) sejak tahun 2014','DATA_KONSUMEN.pdf','Data_Legalitas_dan_MOU_Penyedia_Jasa.pdf','Form_Verifikasi_Penawaran_RAB_dan_Permohonan_Biaya_Franchise.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 12:36:20','2019-08-19 12:36:20',3,6,50),(12,'Rama Sahab','Eksternal','Eposs Laundry',5,'Lainnya','2009',21500000,'Selamanya','Instagram : @laundry_digital',' Franchise laundry perorangan ','form_rama.pdf','persyaratan_rama.pdf','Persyaratan_eposs_laundry.pdf','MUTASI_REKENING_EPOSS_JUNI_JULI_AN_AMIRUDDIN.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 15:28:39','2019-08-19 17:15:50',3,26,40);

#
# Structure for table "tb_my_hajat_lainnya"
#

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
  `date_modified` timestamp NULL DEFAULT NULL,
  `id_approval` int(11) NOT NULL DEFAULT 0,
  `id_cabang` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_myhajat_lainnya`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_lainnya"
#

INSERT INTO `tb_my_hajat_lainnya` VALUES (12,'Santi Kusuma Dewi','Eksternal','PT Trikarya Mandiri Bangkit','Badan Usaha',35694000,'Untuk Instalasi Listrik','DATA_KONSUMEN3.pdf','MEMO_PENYIMPANGAN3.pdf','DATA_SUPPLIER5.pdf','FORM_PENGAJUAN,_VERIFIKASI_DAN_RAB4.pdf','WhatsApp_Image_2019-08-21_at_16.54.141.jpeg','WhatsApp_Image_2019-08-21_at_16.54.15_(1)1.jpeg','WhatsApp_Image_2019-08-21_at_16.54.15_(2)1.jpeg','WhatsApp_Image_2019-08-21_at_16.54.151.jpeg','WhatsApp_Image_2019-08-21_at_16.54.161.jpeg',NULL,'2019-08-21 17:59:37','2019-08-21 18:15:48',3,43,68),(14,'ISTI CHUNAINI','Eksternal','CATERING HJ MANAF','Perorangan',15000000,'PENGAJUAN PEMBIAYAAN CATERING UNTUK TASYAKURAN PERNIKAHAN ANAK','DATA_KONSUMEN_ISTI_CHUNAINI.pdf','DATA_PENYEDIA_JASA_MANAF_CATERING.pdf','FORM_PENGAJUAN,_VERIFIKASI_ISTI_CHUNAINI.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-26 10:42:07','2019-08-26 10:42:07',1,18,92);

#
# Structure for table "tb_my_hajat_renovasi"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_renovasi"
#

INSERT INTO `tb_my_hajat_renovasi` VALUES (25,'KARMILA MUCHSIN','Eksternal','CV KIEBESY PUTRA MANDIRI','Badan Usaha','Badan Usaha','Ganti struktur bangunan lt 1 menjadi lt 2','50M2','5 Orang','19 Agustus 2019',40000000,'Pengajuan Renovai An Karmila Muchsin','Form_pengajuan-Reduced.pdf','Data_Ibu_Mila-Reduced.pdf','Data_Peny_Jas-Reduced.pdf','IMG-20190815-WA0021.jpg','IMG-20190815-WA0022.jpg',NULL,NULL,NULL,NULL,NULL,'2019-08-15 14:12:58','2019-08-15 15:58:01',3,44,33),(26,'Fitriana Fadlan','Eksternal','Borobudur Interior','Badan Usaha','Borongan','Pembuatan lemari dan gordyn','Lemari 18.19 M dan gordyn 2 set','3','30 Hari',34452000,'','form_permohonan,_verifikasi,_dan_anggaran_biaya.pdf','foto_rumah_.pdf','anggaran_biaya_borobudur.pdf','data_fitirana_fadlan.pdf','MOU_borodubur_interior.pdf','form_permohonan,_verifikasi,_anggaran_biaya_fitriana_fadlan.pdf',NULL,NULL,NULL,NULL,'2019-08-19 08:40:31','2019-08-19 11:19:29',3,16,31),(27,'Fitriana Fadlan','Eksternal','Borobudur Interior','Badan Usaha','Borongan','Pembuatan lemari dan gordyn','Lemari 18.19 M dan gordyn 2 set','3','30 Hari',34452000,'','form_permohonan,_verifikasi,_dan_anggaran_biaya1.pdf','foto_rumah_1.pdf','anggaran_biaya_borobudur1.pdf','data_fitirana_fadlan1.pdf','MOU_borodubur_interior1.pdf','form_permohonan,_verifikasi,_anggaran_biaya_fitriana_fadlan1.pdf',NULL,NULL,NULL,NULL,'2019-08-19 08:40:43','2019-08-19 10:52:00',1,16,31),(28,'Hizrullah Syapii','Eksternal','Salamudin Alusri','Perorangan','Borongan','Cor Dak, aci dinding, pasang keramik','5x11 M','3 ','14 Hari',15524500,'','Data_Tukang_Salamudin.pdf','Rumah_Tukang.pdf','foto_rumah_Hizrullah.pdf','data_hizrullah.pdf','form_permohonan_hizrullah.pdf',NULL,NULL,NULL,NULL,NULL,'2019-08-20 09:05:32','2019-08-20 09:35:32',1,16,31),(29,'HIZRULLAH SYAPII','Eksternal','SALAMUDIN ALUSRI','Perorangan','Borongan','COR DAK, ACI DINDING, PASANG KERAMIK','5X11 M','3 ','14 HARI',15000000,'','PBB_HIZRULLAH.pdf','FORM_PERMOHONAN_HIZRULLAH.pdf','Data_Tukang_Salamudin1.pdf','Rumah_Tukang1.pdf','foto_rumah_Hizrullah1.pdf','data_hizrullah1.pdf',NULL,NULL,NULL,NULL,'2019-08-20 11:32:55','2019-08-20 16:26:51',3,16,31),(30,'ANDI WISDA PRATAMA','Eksternal','CV AWI ASI','Badan Usaha','Borongan','DAPUR','27.8M2','2 ORANG','30 HARI',25156600,'','WhatsApp_Image_2019-08-09_at_10.46.48.jpeg','IMG20190815112939.jpg','KARTU_KELUARGA.jpg','FORM_PENGAJUAN.pdf','DATA_PELENGKAP_PENYEDIA_JASA_KONTRAKTOR.pdf','DATA_LAIN_LAIN.pdf','foto_pic_dengan_rumah_konsumen.jpeg','KTP_KK_PENYEDIA_JASA.pdf','PIC_dengan_Penyedia_Jasa.jpeg','REK_KORAN_PENYEDIA_JASA.jpg','2019-08-20 15:00:18','2019-08-21 09:38:31',3,29,83),(31,'Joko Purwanto T','Eksternal','CV Griya Karya Anugrah','Badan Usaha','Borongan','Pemasangan Keramik dan Atap','8x20','4','1 Bulan',40000000,'Pembongkaran 2 unit rumah berada di 1 halaman yang sama namun yang direnovasi hanya 1 rumah, bagian yang direnovasi yaitu pemasangan keramik dan atap.','dokumen_persyaratan_konsumen.pdf','JOKO_P.pdf','dokumen_persyaratan_penyedia_jasa.pdf','IMG-20190815-WA0032.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 16:53:37','2019-08-21 17:33:16',3,27,72),(32,'Hendi Septa H','Eksternal','CV Griya Karya Anugrah','Badan Usaha','Borongan','Teras, Kamar, Ruang Tamu, Kamar Mandi','7x20','4','1 Bulan',40000000,'Konsumen pengajuan untuk merenovasi rumah orangtuanya ','form_HENDI.pdf','persyaratan_konsumen.pdf','dokumen_persyaratan_penyedia_jasa1.pdf','IMG-20190815-WA00321.jpg','foto_pic_dikantor_penyedia_jasa.jpg',NULL,NULL,NULL,NULL,NULL,'2019-08-21 17:02:10','2019-08-22 10:22:41',3,27,72),(33,'Anwar','Eksternal','PT Tiga Tekan Berkah Sejahtera','Badan Usaha','Borongan','Dinding,lantai','4,6x2,25m','2','10-15 hari',15000000,'','@_RAB_-_Kitchen_Set_Bapak_Anwar_-_Rev.pdf','verifikasi_dn_permohn_anwar.pdf','IMG-20190807-WA0002.jpg','IMG-20190807-WA0000.jpg','IMG-20190807-WA0001.jpg','IMG-20190807-WA0004.jpg','IMG-20190807-WA0003.jpg','IMG-20190816-WA0002.jpg','IMG-20190813-WA0004.jpg','IMG-20190823-WA0000.jpg','2019-08-22 11:33:33','2019-08-23 14:23:12',1,15,45),(34,'LALU TAKWAN KHOLIDI','Eksternal','CV HARUM TEKNOLOGI','Badan Usaha','Borongan','BAGIAN KERAMIK DAN KANOPI GUDANG','14 X 16','10','1 BULAN',39648000,'','form_takwan_kholidi.pdf','KK2.pdf','KTP_BKR2.pdf','BKR1.pdf','poto_PiC_dan_bangunan3.pdf','REK_KORAN1.pdf','ktp.jpeg','kk.pdf','COVER_REK_TABUNGN.jpeg','RAB1.jpeg','2019-08-26 09:48:36','2019-08-26 10:39:34',1,24,70),(35,'zaenal mutaqin','Eksternal','BANGUN RUMAH SYARIAH','Badan Usaha','Borongan','ruangan kerja','6x4 m2','2','1 september 2019',10000000,'','foto_rumah_2.jpg','bkr_an_istri.jpg','penghasilan.jpg','kk3.jpg','kk4.jpg','pengajuan_zaenal.pdf','Persyaratan_pak_Herwan.pdf','NIB_9120201172351_2.pdf','FOTO_PIC.jpeg','rab.pdf','2019-08-26 13:45:34','2019-08-26 14:02:20',1,39,104);

#
# Structure for table "tb_my_hajat_sewa"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_sewa"
#

INSERT INTO `tb_my_hajat_sewa` VALUES (16,'Andreas','Eksternal','Rudi hartono','Perorangan','Orang lain','77 m',15000000,1,26,'Komsumen sewa rumah an andreas. Pbb belum balik nama an salani. Tapi ada SHM an Rudi Hartono','form_andreas.pdf','dok_andreas.pdf','rudi_(penyedia_jasa).pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-22 15:17:06','2019-08-22 15:17:06',63),(17,'ZUMAROTUL MUKAROMAH','Eksternal','NODYA WIDOWATI','Perorangan','ORANG LAIN','86m2',10000000,1,18,'Konsumen berencana untuk sewa ruko selama 2 tahun, sehingga total pengajuan pembiayaannya 20.000.000','DATA_KONSUMEN_ZUMAROTUL_MUKAROMAH.pdf','DATA_PENYEDIA_JASA_-_ZUMAROTUL_MUKAROMAH.pdf','RUKO_YANG_AKAN_DISEWA.pdf','FORM_VERIFIKASI,_PERMOHONAN_DAN_PENAWARAN.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-23 09:03:19','2019-08-23 09:03:19',92),(18,'ZUMAROTUL MUKAROMAH','Eksternal','NODYA WIDOWATI','Perorangan','ORANG LAIN','86m2',10000000,3,18,'Konsumen berencana untuk sewa ruko selama 2 tahun, sehingga total pengajuan pembiayaannya 20.000.000, tenor 24 bulan ','DATA_KONSUMEN_ZUMAROTUL_MUKAROMAH1.pdf','DATA_PENYEDIA_JASA_-_ZUMAROTUL_MUKAROMAH1.pdf','FORM.pdf','RUKO_YANG_AKAN_DISEWA1.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-23 09:49:05','2019-08-23 09:49:05',92),(19,'SHERLIE DEBBY OKTARINI','Eksternal','M REZA','Perorangan','ORANG LAIN','10 X 15',20000000,1,29,'','DATA_KONSUMEN_1.pdf','FORM_PENGAJUAN1.pdf','NOTA_USAHA.pdf','DATA_PENYEDIA_JASA.pdf','PBB_konsumen.jpeg',NULL,NULL,NULL,NULL,NULL,'2019-08-23 10:32:38','2019-08-23 10:32:38',83),(20,'IKA PURNAMAWATI','Eksternal','ENDAH SUPRIYATI','Perorangan','ORANG LAIN','37M2',20000000,3,18,'UNTUK HARGA SEWA RUKO DI JL LENGKONG SEMUA 20.000.000/TAHUN','DATA_KONSUMEN5.pdf','DATA_PIHAK_3.pdf','verifikasi_ika.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-26 09:43:29','2019-08-26 09:43:29',99);

#
# Structure for table "tb_my_hajat_wedding"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_hajat_wedding"
#

INSERT INTO `tb_my_hajat_wedding` VALUES (19,'GINA AMELIA RAHMI','Eksternal','NABILA WEDDING','Perusahaan/Badan Usaha','10 TAHUN',25000000,1000,'nabilaweddingbjm',' TOTAL PENGAJUAN SEBESAR Rp. 36 JUTA, DIBAGI 2X TERMIN DENGAN NILAI :\r\nTERMIN 1 = Rp. 25 JUTA\r\nTERMIN 2 = Rp. 11 JUTA','DATA_KONS.pdf','DATA_PHK_3.pdf','FORM_GINA_AMELIA_RAHMI.pdf','RAB.jpeg','Pasangan.jpg','Ortu_Gina.jpg',NULL,NULL,NULL,NULL,'2019-08-16 08:42:47','2019-08-16 09:38:23',3,3,35),(20,'Tri Anindya Cahyani','Eksternal','Pandamanda WO','Perusahaan/Badan Usaha','10 Tahun',40000000,300,'marketing_pandamanda','email: trianindiyabsd@gmail.com','FORM_PEMBIAYAAN_NINDI.pdf','FORM_PENAWARAN_NINDI.pdf','FORM_VERIFIKASI_NINDI.pdf','KTP_NINDI.jpeg','KK_NINDI.jpeg','SLIP_GAJI_NINDI.jpeg','REKENING_LISTRIK_NINDI.jpeg','PAKET_40_JUTA.pdf',NULL,NULL,'2019-08-19 11:43:09','2019-08-19 11:43:09',7,1,60),(21,'Danang Sulistyono','Eksternal','Sanggar Nisa Serpong','Perorangan','18 Tahun',40000000,200,'sanggarnisaserpong','paket pernikahan 40 juta','combinepdf.pdf','combinepdf(21).pdf','combinepdf(22).pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 11:57:14','2019-08-19 11:57:14',7,1,61),(22,'HADI ISMANTO','Eksternal','CALISTA TENDA WEDDING ORGANIZER','Perorangan','10 TAHUN',20000000,258,'@calistatendabogor','Calista Tenda merupakan lembaga usaha perorangan yang bergerak di bidang jasa Weddong Organizer dengan pengalaman usaha selama 10 tahun','BERKAS_PERSYARATAN_KONSUMEN.pdf','DATA_PENYEDIA_JASA_DAN_LEGALITAS_PENYEDIA_JASA.pdf','FORM_PERMOHONAN_BIAYA.pdf','FORM_PARTNERSHIP,_REVIEW_DAN_VERIFIKASI.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 14:21:37','2019-08-19 14:21:37',6,3,50),(23,'YUDI ARIYADI','Eksternal','GRACE','Perusahaan/Badan Usaha','25 THN',23000000,1000,'dany_by_grace','  ','DATA_KONS1.pdf','FORM_DANI_GRACE.pdf','DANI_GRACE_FORM_PARTNERSHIP.pdf','DATA_PHK_31.pdf','Mutasi_tabungan_Grace_wedding.pdf','BKR_ats_nm_Ortu.pdf',NULL,NULL,NULL,NULL,'2019-08-20 09:27:19','2019-08-21 12:01:18',3,1,35),(24,'muhammad jihad anshari','Eksternal','tiga dara wo','Perorangan','10',35000000,500,'https://tigadaracatering.id/paket-wedding','','KK.jpg','KTP_PEMOHON.jpg','paket.odt','Dok_baru_2019-08-16_09.07.40.pdf','DATA_TIGADARA.pdf','foto_pic.jpg','tempat_usaha_1.jpg',NULL,NULL,NULL,'2019-08-20 11:16:17','2019-08-20 11:16:17',40,1,58),(25,'muhammad jihad anshari','Eksternal','tiga dara wo','Perorangan','10',35000000,500,'https://tigadaracatering.id/paket-wedding','','KK1.jpg','KTP_PEMOHON1.jpg','paket1.odt','Dok_baru_2019-08-16_09.07.401.pdf','DATA_TIGADARA1.pdf','foto_pic1.jpg','tempat_usaha_11.jpg',NULL,NULL,NULL,'2019-08-20 11:16:22','2019-08-20 11:16:22',40,1,58),(26,'Saamah','Eksternal','lenjeh salon','Perorangan','23 tahun',14940000,100,'Lenieyeetama','Resepsi aqiqah','data_lenie_salon.pdf','data_saamah.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-20 12:28:47','2019-08-20 12:28:47',42,3,56),(27,'Saamah','Eksternal','lenjeh salon','Perorangan','23 tahun',14940000,100,'Lenieyeetama','Resepsi aqiqah','data_lenie_salon1.pdf','data_saamah1.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-20 12:28:56','2019-08-20 12:28:56',42,1,56),(28,'HERLINA','Eksternal','ARTIWEDDING','Perusahaan/Badan Usaha','12 TAHUN',17500000,200,'@artiweddingservice','Acara akan dilaksanakan tgl 20 Oktober 2019 di perumahan taman puri cendana Blok E16 No. 07 Rt.009/016 Tridaya sakti, tambun bekasi','KTP_nana.jpg','KK2.jpg','NPWP.jpg','slip_GAJI_nana.jpg','Bukti_SPK_Rumah.pdf','KTP_Calon.jpg','KTP_PG.jpg','Scan_FORM.pdf','TTD_herlina.pdf','paket_artiwedding_17.5juta.jpg','2019-08-20 14:27:26','2019-08-20 14:27:26',11,3,47),(29,'dinda noviana','Eksternal','rias pengantin anisa ayu','Perorangan','13 tahun',22000000,800,'@riaspengantin_anisaayu','acara akan dilaksanakan tgl 01 Desember 2019 jalan budi mulia No.30 RT.07/04 Pademangan Jakarta Utara','KTP_DINDA.jpg','KTP_ibu_dinda.jpg','KTP_calon_pasangan.jpg','KK3.jpg','bukti_bayar_listrik_rumah.jpg','NPWP1.jpg','SLIP_GAJI.jpg','TTD_Dinda.jpg','TTD_rias_pengantin.jpg','Scan_DINDA.pdf','2019-08-20 15:19:07','2019-08-20 15:19:07',11,1,47),(30,'Hadi Ismanto','Eksternal','Calista Tenda Wedding Organizer','Perorangan','10',20000000,258,'IG @calistatenda','   Calista Tenda merupakan suatu usaha perorangan yang bergerak di bidang Wedding Organizer yang di pimpin oleh Ibu Nurhubaini dengan lama usaha selama 10 tahun','BERKAS_PERSYARATAN_KONSUMEN1.pdf','DATA_PENYEDIA_JASA_DAN_LEGALITAS_PENYEDIA_JASA1.pdf','FORM_PARTNERSHIP,_REVIEW_DAN_VERIFIKASI1.pdf','FORM_PERMOHONAN_BIAYA1.pdf','surat_ikrar_talak_(cerai).jpeg','Surat_Keterangan_Reg_Guatan_Cerai1.jpeg','Surat_Keterangan_Reg_Guatan_Cerai2.jpeg',NULL,NULL,NULL,'2019-08-20 15:23:02','2019-08-22 08:52:32',6,3,50),(31,'aditya putra kurnia','Eksternal','reisa wedding','Perorangan','1 tahun',21999998,150,'@srhang_mua','  ','kk.jpg','ktp_pemohon.jpg','data_reisa_wo1.pdf','tempat_usaha.jpg','fhoto_pic.jpg','form_aditya.pdf','PAKETADITYA.odt','2.jpg','rek_listrik.jpg','data_aditya.pdf','2019-08-21 09:59:16','2019-08-21 11:34:29',40,1,82),(32,'MUHHAMAD JIHAD ASHARI','Eksternal','TIGADARA CATERING','Perorangan','10',34999998,500,'tigadaracatering','','KTP_PEMOHON2.jpg','KTP_PENJAMIN.jpg','KTP_PASANGAN.jpg','KK4.jpg','SLIP_GAJI_(1).jpg','Dok_baru_2019-08-16_09.07.402.pdf','foto_pic2.jpg','tempat_usah_2.jpg','DATA_TIGADARA2.pdf','paket2.odt','2019-08-21 10:03:01','2019-08-21 10:03:01',40,1,58),(33,'PRASATKA WIDUSAKA ST','Eksternal','CV CIPTA BOGA VIDI','Perorangan','36 TAHUN',24575000,500,'INSTAGRAM : vidicateringjogja','PAKET CATERING BUFFET,GUBUG, DAN SNACK','AKTA_NOTARIS.odt','Daftar_Perhitungan_Harga_-_Prasatka.pdf','form_penawaran_biaya.pdf','form_permohonan_prasatka.pdf','Form_verifikasi_prasatka.pdf','KONSUMEN.odt','PENYEDIA_JASA.odt',NULL,NULL,NULL,'2019-08-21 10:21:51','2019-08-21 10:21:51',45,3,94),(34,'ZAINAL ABIDIN','Eksternal','GRACE RUMAH PENGANTEN','Perorangan','25 THN',23000000,1000,'dany_by_grace',' ','Form_an_Zainal_abidin.pdf','Mutasi_tabungan_Grace_wedding1.pdf','KTP_PEMOHON_DAN_PASANGAN.jpeg','PBB.jpeg','DATA_KONS2.pdf','DATA_PHK_32.pdf',NULL,NULL,NULL,NULL,'2019-08-21 14:28:28','2019-08-21 14:29:49',3,3,35),(35,'muhammad jihad anshari','Eksternal','TIGADARA CATERING','Perorangan','10',25000000,500,'tigadaracatering','  ','KTP_PASANGAN1.jpg','KTP_PEMOHON3.jpg','KTP_PENJAMIN1.jpg','KK5.jpg','AJB.jpg','SLIP_GAJI_(1)1.jpg','Dok_baru_2019-08-16_09.07.403.pdf','paket3.odt','foto_pic3.jpg','DATA_TIGADARA3.pdf','2019-08-21 16:29:06','2019-08-22 09:46:50',40,3,58),(36,'aditya putra kurnia','Eksternal','Reisa wedding','Perorangan','1 tahun',21999997,300,'@srhang_mua','   konsumen rencana acara pernikahan pada tanggal 2 november 2019 di glad coffee.','data_aditya1.pdf','data_reisa_wo2.pdf','form_aditya1.pdf','PAKETADITYA1.odt','fhoto_pic-dikonversi(2).pdf','ktp_pasangan.jpg','penghasilan_aditya.pdf','pengecekan_harga.pdf','ktp_orang_tua.jpg','paket_aditya.odt','2019-08-21 16:48:45','2019-08-23 09:27:10',40,3,82),(37,'CH PUTRA RIFTIA PERTAMA','Eksternal','LITA WEDDING','Perorangan','10',25000000,500,'LITA_WEDDING','','KTP_PEMOHON.JPG','ktp_penjamin.jpg','KTP_PASANGAN2.jpg','KK6.jpg','Rek_koran.jpg','paket4.odt','BKR.jpg','IMG_20190520_111156.jpg','IMG_20190520_111133.jpg','IMG_20190520_1111331.jpg','2019-08-24 10:53:34','2019-08-24 10:53:34',40,1,58),(38,'INDRA AULIA','Eksternal','TIGADARA CATERING','Perorangan','10',30000000,500,'marketingtigadaracatering','','KTP_PENJAMIN2.jpg','KTP_PASANGAN3.jpg','KTP_PEMOHON4.jpg','paket5.odt','kk1.jpg','Slip_gaji_juli-ags.pdf','BKR1.jpg','form_verifikasi.pdf','DATA_TIGADARA4.pdf','foto_pic4.jpg','2019-08-26 09:23:20','2019-08-26 09:23:20',40,1,58),(39,'JAJANG KARTIMAN','Eksternal','LIES SALON','Perorangan','19 TAHUN',20000000,1000,'LIES SALON SINGAPARNA','','ktp_konsumen.jpg','kk2.jpg','1-ktp_lilis.jpg','1-bukti_usaha_(12).jpg','brosur.jpg','form_permohonan_pembiayaan_jajang_kartiman.pdf','tabungan_(2).jpg','foto_usaha.jpg','form_verifikasi_penyedia_jasa_lilis.pdf','penawaran_biaya.pdf','2019-08-26 12:33:19','2019-08-26 12:33:19',43,1,68),(40,'novita jamal','Internal','lilian wedding galery','Perorangan','10 thn',20000000,300,'lilian wedding galery','','F419.pdf','FORM1.pdf','PENY_JASA_LILIAN_1.pdf','rek_lilian.jpg','rek_lilian_1.jpg','fto_usaha.jpg','fto_pngurus.jpg',NULL,NULL,NULL,'2019-08-26 13:45:59','2019-08-26 13:45:59',44,0,32);

#
# Structure for table "tb_my_ihram"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_ihram"
#

INSERT INTO `tb_my_ihram` VALUES (12,'Hj Baiq Dewi Fitriana','Eksternal','Mudahan Tilah','WhatsApp_Image_2019-08-13_at_07.28.13.jpeg','WhatsApp_Image_2019-08-13_at_07.25.03_(1).jpeg','WhatsApp_Image_2019-08-13_at_07.28.12.jpeg','rek_koran_hj_dewi_1.pdf','rek_koran_hj_dewi_2.pdf','rek_koran_hj_dewi_3.pdf','npwp_dewi_umroh.jpeg','WhatsApp_Image_2019-08-13_at_07.28.12_(1).jpeg','WhatsApp_Image_2019-08-13_at_07.28.13_(1).jpeg',NULL,'2019-08-20 17:10:30','2019-08-20 16:59:48',1,24,70),(13,'abdul fakih','Eksternal','BS Tour n travel','BROSUR.jpg','Itinerary_BSTravel_-_27_Okt_2019.xlsx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 16:32:00','2019-08-21 15:59:03',3,42,49),(14,'AGUS ANDRIYANSYAH','Eksternal','ALTUR WISATA MULYA','BROSUR1.jpg','ITEN1.jpg','ITEN2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 16:50:06','2019-08-21 16:06:26',3,42,49),(15,'AGUS ANDRIYANSYAH','Eksternal','ALTUR WISATA MULYA','BROSUR2.jpg','ITEN11.jpg','ITEN21.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 16:50:27','2019-08-21 16:06:30',1,42,49),(16,'INPUT PAKET UMROH','Eksternal','ZHAFIRAH','ZHAFIRAH_PAKET_UMROH_+MUSCAT_OMAN.docx','PAKET_ZHAFIRAH_1441h.docx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-22 15:02:58','2019-08-22 12:59:27',3,45,91),(17,'Paket umroh 13 hari 23,8jt','Eksternal','PT LIMA DUTA WISATA','IMG-20190507-WA0009.jpg','PROGRAM_UMROH_13_HARI.1.doc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-22 16:15:41','2019-08-22 14:01:18',3,36,84),(18,'FAUZIAH','Eksternal','SUWANDRA','26_JUTA.odt','28_JUTA.odt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-24 11:32:17','2019-08-24 11:31:42',2,35,115),(19,'Giguk Yudi L','Eksternal','Alindra Mutiara Hati Travel','umroh_reguler_bfi.docx','IMG-20190825-WA0005.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-26 11:42:02','2019-08-26 09:43:01',3,15,44),(20,'Hadi usman','Eksternal','Jejak imani','IMG-20190826-WA0002.jpg','IMG-20190826-WA0003.jpg','IMG-20190826-WA0004.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-26 11:44:33','2019-08-26 10:36:32',1,42,56),(21,'NANA KURNIANTI','Eksternal','PT. ZADUL MAAD MANDIRI','dokumen_bu_nana.pdf','slip_gaji_juni.jpg','KK.jpg','KTP.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-26 11:47:33','2019-08-26 11:05:53',1,11,47),(22,'ENDANG SUKESTIWI','Eksternal','SAKINAH MANDIRI TOUR AND TRAVEL','Deskripsi,_Ketentuan_dan_Itinerary_9D_27.500.doc','umroh.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-26 13:24:56','2019-08-26 12:43:55',2,6,50);

#
# Structure for table "tb_my_safar"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "tb_my_safar"
#


#
# Structure for table "tb_my_talim"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

#
# Data for table "tb_my_talim"
#

INSERT INTO `tb_my_talim` VALUES (44,'Dendhi rizky pradama','Eksternal','Universitas','gleandro dwigantara','universitas darma persada','1986','B','2018- 2019','uang paket semester',40000000,'rekening_kampus.jpg','RAB.jpg','KTP.jpg','KK_PEMOHON.jpg','pengajuan_my_talim.pdf',NULL,NULL,NULL,NULL,NULL,1,' ',40,82,'2019-08-20 10:54:41','2019-08-22 10:58:47'),(52,'Amelia sinatriany','Eksternal','Universitas','Amelia sinatriany','Universitas pembangunan nasional','1967','Akreditasi b','2018-2019','Uang semester',7000000,'IMG-20190822-WA0031.jpg','IMG-20190822-WA0034.jpg','IMG-20190822-WA0032.jpg','IMG-20190821-WA0026.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1,'Pembayaran semester',42,52,'2019-08-22 12:59:06','2019-08-22 12:59:06'),(53,'Rusmaya avianti','Eksternal','Universitas','Rifma yuniar musyafaatul ','Universitas muhammadiyah surabaya','1981','Akreditasi A','2019-2020','Uang paket semester',1000000,'form_my_talim_rusmaya.pdf','lembar_ph3_maya_1.pdf','data_rusmaya.pdf','kekurangan_data_rusmaya.pdf',NULL,NULL,NULL,NULL,NULL,NULL,3,'',36,85,'2019-08-25 20:36:59','2019-08-25 20:36:59');

#
# Structure for table "tb_nst"
#

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Data for table "tb_nst"
#

INSERT INTO `tb_nst` VALUES (5,'201908SLOS000775','EKO WAHYU BUDI UTOMO ','My Hajat','appeal_Eko_Wahyu_Budi.pdf','data_konsumen_wahyu_eko.pdf','bkr_eko.jpeg','penyedia_jasa.pdf','form_Eko_Wahyu_Budi.pdf',NULL,NULL,'','','',0,24,70,'2019-08-20 17:07:19','2019-08-20 17:07:19'),(6,'201908SLOS000790','MOHAMAD ANDI RAHIM OLII','My Ihram','NPWP_PEMOHON.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'','','',0,12,88,'2019-08-20 18:00:39','2019-08-20 18:00:39'),(7,'201908SLOS000862','YENNY WAHYUNI PODUNGGE','My Ihram','NPWP_PEMOHON1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'','','',0,12,88,'2019-08-20 18:02:17','2019-08-20 18:02:17'),(8,'201908SLOS000585','Resti Kusuma Dewi','My Hajat','form_Appeal.pdf','PG_orang_tua_konsumen.pdf','PG_calon_pasangan_konsumen.pdf','Ttd_PG_pasangan_pemohon.jpg','Ttd_PG_orangtua_pemohon.jpg','Slip_gaji_pemohon.jpg','KTP_pemohon.jpg','Ktp_Orangtua_pemohon.jpg','KTP_dan_NPWP_calon_pasangan_pemohon.jpg','KK_pemohon.jpg',0,15,44,'2019-08-22 14:39:56','2019-08-25 21:26:30'),(9,'201908SLOS000929','Miftahul Ilmi','My Hajat','Scan_APPEAL_SURVEY.pdf','BUKTI_BPR.jpg','BUKTI_FIF.jpg','BNI_auto_debet.jpg','BNI_auto_debet1.jpg','slip_GAJI.jpg','persyaratan_miftahul.pdf','','','',2,11,47,'2019-08-23 12:31:20','2019-08-23 12:31:20'),(10,'201908SLOS001392','Utari Doriomas','My Ihram','Appeal_survei_NA_Utari_Doriomas.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'','','',2,6,53,'2019-08-23 17:20:35','2019-08-23 17:20:35'),(11,'201908SLOS000985','SUPRIYATI','My Hajat','appeal_dokumen_supriyati.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'','','',0,42,52,'2019-08-24 08:59:17','2019-08-24 08:59:17'),(12,'201908SLOS001230','ade sobana','My Ihram','form_appeal_ade_sobana.pdf','1-print_rekening_tabungan_(1).jpg','1-print_rekening_tabungan_(2).jpg','1-print_rekening_tabungan_(5).jpg','1-print_rekening_tabungan_(6).jpg','1-bukti_angsuran_(1).jpg','1-bukti_angsuran_(2).jpg','1-nota_(2).jpg','1-nota_(5).jpg','1-foto_usaha_(1).jpg',0,43,102,'2019-08-26 12:01:40','2019-08-26 12:01:40'),(13,'201908SLOS001175','JAJANG SETIAWAN','My Ihram','form_appeal_jajang_setiawan.pdf','1-print_rekening_tabungan.jpg','1-nota_usaha_(11).jpg','1-nota_usaha_(3).jpg','1-nota_usaha_(2).jpg','1-nota_usaha_(1).jpg','1-bukti_usaha_(12).jpg','1-bukti_usaha_(10).jpg','1-bukti_usaha_(9).jpg','1-bukti_usaha_(1).jpg',0,43,102,'2019-08-26 12:07:54','2019-08-26 12:07:54'),(14,'201908SLOS001223','IDA PARIDA','My Ihram','form_appeal_ida_parida.pdf','1-foto_usaha+_(3).jpg','1-IMG-20190821-WA0023.jpg','1-nota_(2)1.jpg','1-nota_(3).jpg','1-nota_(5)1.jpg','1-kk.jpg','1-foto_usaha_(1)1.jpg','','',0,43,102,'2019-08-26 12:09:55','2019-08-26 12:09:55'),(15,'201908SLOS001186','lilis romiati','My Ihram','1-bukti_usaha_(1)1.jpg','1-bukti_usaha_(5).jpg','1-bukti_usaha_(9)1.jpg','1-bukti_usaha_(12)1.jpg','1-nota_usaha_(1)1.jpg','1-nota_usaha_(2)1.jpg','1-nota_usaha_(3)1.jpg','1-nota_usaha_(11)1.jpg','1-print_rekening_tabungan1.jpg','1-bukti_usaha_(10)1.jpg',0,43,102,'2019-08-26 12:12:42','2019-08-26 12:12:42'),(16,'201908SLOS001251','NUNUNG','My Ihram','form_appeal_nunung.pdf','04-print_rekening_tabungan_(3)-001.jpg','06-print_rekening_tabungan_(5)-001.jpg','08-print_rekening_tabungan_(7)-001.jpg','01-catatan_pemesanan_melati_(6)-001.jpg','02-catatan_pemesanan_melati_(7).jpg','02-catatan_pemesanan_melati_(7)-001.jpg','12-bukti_usaha_(7).jpg','14-bukti_usaha_(10).jpg','16-bukti_usaha_(2).jpg',0,43,102,'2019-08-26 12:16:21','2019-08-26 12:16:21'),(17,'201908SLOS001327','SANTI KUSUMA DEWI ','My Hajat','memo_appeal1.pdf','DATA_KONSUMEN.pdf','20190812_150135.jpg','20190812_145726.jpg','20190812_145746.jpg','20190812_145752.jpg','20190812_145807.jpg','REK_TAB_kons.png','','',0,43,102,'2019-08-26 12:21:49','2019-08-26 12:21:49');

#
# Structure for table "tb_ticket"
#

CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_mycars` int(11) DEFAULT NULL,
  `id_myfaedah` int(11) DEFAULT NULL,
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
  `id_bangunan` int(11) DEFAULT NULL,
  `id_elektronik` int(11) DEFAULT NULL,
  `id_myfaedah_lainnya` int(11) DEFAULT NULL,
  `id_modal` int(11) DEFAULT NULL,
  `id_qurban` int(11) DEFAULT NULL,
  `id_cabang` int(3) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_pending` timestamp NULL DEFAULT NULL,
  `date_approved` timestamp NULL DEFAULT NULL,
  `date_rejected` timestamp NULL DEFAULT NULL,
  `date_completed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1;

#
# Data for table "tb_ticket"
#

INSERT INTO `tb_ticket` VALUES (49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,44,33,NULL,'2019-08-15 15:02:53',NULL,'2019-08-15 15:58:01'),(52,NULL,NULL,NULL,NULL,NULL,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,44,33,NULL,NULL,NULL,NULL),(53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,'2019-08-16 10:01:45','2019-08-16 09:00:20','2019-08-16 10:16:43'),(54,NULL,NULL,NULL,NULL,NULL,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,NULL,NULL),(56,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,'2019-08-19 10:51:38',NULL,'2019-08-19 11:19:29'),(57,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,'2019-08-19 10:52:00',NULL),(58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,60,NULL,NULL,'2019-08-19 13:46:27',NULL),(59,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,61,NULL,NULL,'2019-08-19 13:23:18',NULL),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,NULL,NULL,NULL,NULL,NULL,6,50,NULL,'2019-08-19 13:49:27',NULL,'2019-08-19 14:00:33'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,50,NULL,'2019-08-19 14:51:52',NULL,'2019-08-19 15:04:37'),(62,NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,NULL,'2019-08-19 16:05:38',NULL),(63,NULL,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,'2019-08-24 11:11:22','2019-08-23 14:26:32','2019-08-24 11:25:33'),(64,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,'2019-08-19 17:26:18',NULL,'2019-08-19 17:38:40'),(65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,26,40,NULL,'2019-08-19 17:48:33',NULL,'2019-08-20 08:44:52'),(66,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,65,NULL,NULL,'2019-08-23 11:18:11',NULL),(67,NULL,NULL,NULL,NULL,NULL,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,40,NULL,NULL,NULL,NULL),(68,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,'2019-08-20 17:17:45','2019-08-20 16:02:47','2019-08-20 17:36:22'),(69,NULL,NULL,NULL,NULL,NULL,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,40,NULL,NULL,NULL,NULL),(70,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,'2019-08-20 09:56:55',NULL,'2019-08-20 09:57:54'),(71,NULL,NULL,NULL,NULL,NULL,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(72,NULL,NULL,NULL,NULL,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(73,NULL,NULL,NULL,NULL,NULL,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(74,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(75,NULL,NULL,NULL,NULL,NULL,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(76,NULL,NULL,NULL,NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(77,NULL,NULL,NULL,NULL,NULL,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(78,NULL,NULL,NULL,NULL,NULL,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(79,NULL,NULL,NULL,NULL,NULL,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(80,NULL,NULL,NULL,NULL,NULL,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(81,NULL,NULL,NULL,NULL,NULL,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(82,NULL,NULL,NULL,NULL,NULL,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,75,NULL,NULL,NULL,NULL),(83,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,'2019-08-20 09:35:32',NULL),(84,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,'2019-08-21 13:20:55',NULL),(85,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,'2019-08-20 15:54:41',NULL,'2019-08-20 16:14:41'),(86,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,'2019-08-20 15:00:00',NULL),(87,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,'2019-08-20 15:54:58',NULL,'2019-08-20 16:13:51'),(88,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,'2019-08-20 15:03:11',NULL),(89,NULL,NULL,NULL,NULL,NULL,NULL,39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,NULL,NULL),(90,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,'2019-08-20 17:26:20','2019-08-20 16:01:12','2019-08-20 17:36:11'),(91,NULL,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,65,NULL,'2019-08-20 16:23:07','2019-08-22 16:01:10','2019-08-20 16:34:18'),(92,NULL,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,82,NULL,'2019-08-23 08:59:54','2019-08-22 16:01:14','2019-08-23 10:42:21'),(93,NULL,NULL,NULL,44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,82,NULL,NULL,'2019-08-22 11:34:35',NULL),(94,NULL,NULL,NULL,NULL,NULL,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,82,NULL,NULL,NULL,NULL),(95,NULL,NULL,NULL,NULL,NULL,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,82,NULL,NULL,NULL,NULL),(96,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,58,NULL,NULL,'2019-08-20 16:21:21',NULL),(97,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,58,NULL,NULL,'2019-08-20 16:30:16',NULL),(98,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,'2019-08-20 16:19:35',NULL,'2019-08-20 16:26:51'),(99,NULL,NULL,NULL,NULL,NULL,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,61,NULL,NULL,NULL,NULL),(100,NULL,NULL,NULL,NULL,NULL,NULL,43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,NULL,NULL),(101,NULL,NULL,NULL,NULL,NULL,NULL,44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(102,NULL,NULL,NULL,NULL,NULL,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(103,NULL,NULL,NULL,NULL,NULL,NULL,46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,NULL,NULL),(104,NULL,NULL,NULL,NULL,NULL,NULL,47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(105,NULL,NULL,NULL,NULL,NULL,NULL,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,52,NULL,NULL,NULL,NULL),(106,NULL,NULL,NULL,NULL,NULL,NULL,49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(107,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,'2019-08-20 17:05:50',NULL,'2019-08-20 17:08:16'),(108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,'2019-08-20 16:50:32',NULL),(109,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(110,NULL,NULL,NULL,NULL,NULL,NULL,51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,NULL,NULL,NULL),(111,NULL,NULL,NULL,NULL,NULL,NULL,52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(112,NULL,NULL,NULL,NULL,NULL,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,52,NULL,NULL,NULL,NULL),(113,NULL,NULL,NULL,NULL,NULL,NULL,54,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,NULL,NULL,NULL),(114,NULL,NULL,NULL,NULL,NULL,NULL,55,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,51,NULL,NULL,NULL,NULL),(115,NULL,NULL,NULL,NULL,NULL,NULL,56,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,NULL,NULL,NULL),(116,NULL,NULL,NULL,NULL,NULL,NULL,57,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,NULL,NULL,NULL),(117,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,'2019-08-20 16:56:06',NULL,'2019-08-20 17:12:37'),(118,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,29,83,NULL,'2019-08-21 09:34:35','2019-08-20 17:27:02','2019-08-21 09:38:31'),(119,NULL,NULL,NULL,NULL,NULL,NULL,58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,NULL,NULL,NULL),(120,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,NULL,'2019-08-20 17:09:43',NULL),(121,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,50,NULL,'2019-08-22 09:44:24','2019-08-21 11:20:51','2019-08-22 10:22:29'),(122,NULL,NULL,NULL,NULL,NULL,NULL,59,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(123,NULL,NULL,NULL,NULL,NULL,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(124,NULL,NULL,NULL,NULL,NULL,NULL,61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(125,NULL,NULL,NULL,NULL,NULL,NULL,62,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,NULL,NULL),(126,NULL,NULL,NULL,NULL,NULL,NULL,63,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,NULL,NULL),(127,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,NULL,'2019-08-20 17:10:30',NULL),(128,NULL,NULL,NULL,NULL,NULL,NULL,64,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,NULL,NULL),(129,NULL,NULL,NULL,NULL,NULL,NULL,65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,31,NULL,NULL,NULL,NULL),(130,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,NULL,NULL,NULL),(131,NULL,NULL,NULL,NULL,NULL,NULL,66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(132,NULL,NULL,NULL,NULL,NULL,NULL,67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(133,NULL,NULL,NULL,NULL,NULL,NULL,68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(134,NULL,NULL,NULL,NULL,NULL,NULL,69,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(135,NULL,NULL,NULL,NULL,NULL,NULL,70,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,64,NULL,NULL,NULL,NULL),(136,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,88,NULL,NULL,NULL,NULL),(137,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,88,NULL,NULL,NULL,NULL),(138,NULL,NULL,NULL,NULL,NULL,NULL,71,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,NULL,NULL,NULL),(139,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,'2019-08-21 08:43:43',NULL,'2019-08-21 08:45:40'),(140,NULL,NULL,NULL,NULL,NULL,NULL,72,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(141,NULL,NULL,NULL,NULL,NULL,NULL,73,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,61,NULL,NULL,NULL,NULL),(142,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,82,NULL,NULL,'2019-08-21 11:57:22',NULL),(143,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,58,NULL,NULL,'2019-08-21 10:59:19',NULL),(144,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,94,NULL,'2019-08-21 11:19:04',NULL,'2019-08-21 11:28:54'),(145,NULL,NULL,NULL,NULL,NULL,NULL,74,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(146,NULL,NULL,NULL,NULL,NULL,NULL,75,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(147,NULL,NULL,NULL,NULL,NULL,NULL,76,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(148,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,'2019-08-22 08:25:41','2019-08-21 11:35:43','2019-08-22 10:16:53'),(149,NULL,NULL,NULL,NULL,NULL,NULL,77,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,NULL,NULL,NULL),(150,NULL,NULL,NULL,NULL,NULL,NULL,78,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,NULL,NULL,NULL),(151,NULL,NULL,NULL,NULL,NULL,NULL,79,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(152,NULL,NULL,NULL,NULL,NULL,NULL,80,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(153,NULL,NULL,NULL,NULL,NULL,NULL,81,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(154,NULL,NULL,NULL,NULL,NULL,NULL,82,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(155,NULL,NULL,NULL,NULL,NULL,NULL,83,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(156,NULL,NULL,NULL,NULL,NULL,NULL,84,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(157,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,'2019-08-21 14:43:06',NULL,'2019-08-21 14:55:41'),(158,NULL,NULL,NULL,NULL,NULL,NULL,85,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,94,NULL,NULL,NULL,NULL),(159,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,'2019-08-22 14:23:55','2019-08-21 14:55:12','2019-08-22 15:13:37'),(160,NULL,NULL,NULL,NULL,NULL,NULL,86,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,29,100,NULL,NULL,NULL,NULL),(161,NULL,NULL,NULL,NULL,NULL,NULL,87,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(162,NULL,NULL,NULL,NULL,NULL,NULL,88,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,NULL,NULL),(163,NULL,NULL,NULL,NULL,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,49,NULL,'2019-08-21 16:23:20',NULL,'2019-08-21 16:32:00'),(164,NULL,NULL,NULL,NULL,NULL,NULL,89,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,NULL,NULL),(165,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,49,NULL,'2019-08-21 16:23:46',NULL,'2019-08-21 16:50:06'),(166,NULL,NULL,NULL,NULL,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,49,NULL,'2019-08-21 16:23:55','2019-08-21 16:50:27',NULL),(167,NULL,NULL,NULL,NULL,NULL,NULL,90,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,40,NULL,NULL,NULL,NULL),(168,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,58,NULL,'2019-08-22 09:58:49','2019-08-21 16:52:26','2019-08-22 10:15:29'),(169,NULL,NULL,NULL,NULL,NULL,NULL,91,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,NULL,NULL),(170,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,82,NULL,'2019-08-23 09:46:57','2019-08-23 09:16:37','2019-08-23 10:41:55'),(171,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,72,NULL,'2019-08-21 17:17:31',NULL,'2019-08-21 17:33:16'),(172,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,72,NULL,'2019-08-22 10:14:56','2019-08-22 09:20:33','2019-08-22 10:22:41'),(173,NULL,NULL,NULL,NULL,NULL,NULL,92,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,40,NULL,NULL,NULL,NULL),(174,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,'2019-08-22 10:57:36',NULL,'2019-08-22 11:50:33'),(175,NULL,NULL,NULL,NULL,NULL,NULL,93,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,NULL,NULL,NULL),(178,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,'2019-08-22 09:27:19',NULL,'2019-08-22 13:35:11'),(181,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,31,95,NULL,'2019-08-22 15:38:33','2019-08-22 10:59:23','2019-08-22 16:24:23'),(186,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,60,NULL,'2019-08-22 10:44:57',NULL,'2019-08-22 13:33:23'),(187,NULL,NULL,NULL,NULL,NULL,NULL,94,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(188,NULL,NULL,NULL,NULL,NULL,NULL,95,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(189,NULL,NULL,NULL,NULL,NULL,NULL,96,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(191,NULL,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,'2019-08-22 11:02:43','2019-08-22 16:00:58','2019-08-23 11:09:47'),(192,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,'2019-08-22 11:10:36',NULL),(193,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,'2019-08-22 14:30:30','2019-08-22 11:37:21','2019-08-22 15:12:04'),(194,NULL,NULL,NULL,NULL,NULL,NULL,97,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,NULL,NULL,NULL),(196,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,NULL,'2019-08-23 14:23:12',NULL),(197,NULL,NULL,NULL,NULL,NULL,NULL,98,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,NULL,NULL),(198,NULL,NULL,NULL,52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,52,NULL,NULL,'2019-08-22 14:34:49',NULL),(199,NULL,NULL,NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,91,NULL,'2019-08-22 13:56:15',NULL,'2019-08-22 15:02:58'),(200,NULL,NULL,NULL,NULL,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,36,84,NULL,'2019-08-22 14:35:15',NULL,'2019-08-22 16:15:41'),(201,NULL,43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,31,96,NULL,'2019-08-22 16:37:58','2019-08-22 14:40:44','2019-08-22 16:51:52'),(202,NULL,NULL,NULL,NULL,NULL,NULL,99,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(203,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,'2019-08-23 17:58:40',NULL),(204,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,63,NULL,NULL,'2019-08-22 15:29:47',NULL),(205,NULL,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,'2019-08-22 16:28:18',NULL),(206,NULL,NULL,NULL,NULL,NULL,NULL,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,NULL,NULL),(207,NULL,NULL,NULL,NULL,NULL,NULL,101,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,44,33,NULL,NULL,NULL,NULL),(208,NULL,NULL,NULL,NULL,NULL,NULL,102,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(209,NULL,NULL,NULL,NULL,NULL,NULL,103,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(210,NULL,NULL,NULL,NULL,NULL,NULL,104,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(211,NULL,NULL,NULL,NULL,NULL,NULL,105,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(212,NULL,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,103,NULL,NULL,'2019-08-23 09:31:41',NULL),(213,NULL,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,103,NULL,NULL,'2019-08-23 09:49:17',NULL),(214,NULL,44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,'2019-08-23 10:53:55','2019-08-23 09:22:47','2019-08-23 13:39:18'),(215,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,'2019-08-23 14:23:39','2019-08-23 11:16:11','2019-08-23 14:29:01'),(216,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,60,NULL,'2019-08-23 16:33:37','2019-08-23 11:21:06','2019-08-23 17:28:49'),(217,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,92,NULL,NULL,'2019-08-23 09:31:53',NULL),(218,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,60,NULL,'2019-08-23 17:30:31','2019-08-23 13:35:20','2019-08-23 17:41:31'),(219,NULL,NULL,NULL,NULL,NULL,NULL,106,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,53,NULL,NULL,NULL,NULL),(220,NULL,NULL,NULL,NULL,NULL,NULL,107,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,53,NULL,NULL,NULL,NULL),(221,NULL,NULL,NULL,NULL,NULL,NULL,108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,53,NULL,NULL,NULL,NULL),(222,NULL,NULL,NULL,NULL,NULL,NULL,109,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,53,NULL,NULL,NULL,NULL),(223,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,92,NULL,'2019-08-23 11:08:26',NULL,'2019-08-23 14:06:37'),(224,NULL,NULL,NULL,NULL,NULL,NULL,110,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,60,NULL,NULL,NULL,NULL),(225,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,107,NULL,NULL,'2019-08-23 11:04:43',NULL),(226,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,29,83,NULL,NULL,'2019-08-23 11:15:31',NULL),(227,NULL,NULL,NULL,NULL,NULL,NULL,111,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(228,NULL,NULL,NULL,NULL,NULL,NULL,112,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,26,40,NULL,NULL,NULL,NULL),(229,NULL,NULL,NULL,NULL,NULL,NULL,113,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(230,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,45,NULL,'2019-08-26 10:40:43','2019-08-23 14:30:31','2019-08-26 11:13:13'),(231,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,'2019-08-23 17:57:46',NULL,NULL),(232,NULL,NULL,NULL,NULL,NULL,NULL,114,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,44,33,NULL,NULL,NULL,NULL),(233,NULL,NULL,NULL,NULL,NULL,NULL,115,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,26,NULL,NULL,NULL,NULL),(234,NULL,NULL,NULL,NULL,NULL,NULL,116,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,26,NULL,NULL,NULL,NULL),(235,NULL,NULL,NULL,NULL,NULL,NULL,117,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,26,NULL,NULL,NULL,NULL),(236,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,'2019-08-23 14:38:05',NULL,'2019-08-23 14:49:11'),(237,NULL,NULL,NULL,NULL,NULL,NULL,118,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,52,NULL,NULL,NULL,NULL),(238,NULL,NULL,NULL,NULL,NULL,NULL,119,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,NULL,NULL),(239,NULL,NULL,NULL,NULL,NULL,NULL,120,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,51,NULL,NULL,NULL,NULL),(240,NULL,NULL,NULL,NULL,NULL,NULL,121,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,51,NULL,NULL,NULL,NULL),(241,NULL,NULL,NULL,NULL,NULL,NULL,122,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,110,NULL,NULL,NULL,NULL),(242,NULL,NULL,NULL,NULL,NULL,NULL,123,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(243,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,53,NULL,'2019-08-23 17:47:58',NULL,NULL),(244,NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,107,NULL,NULL,'2019-08-24 11:31:55',NULL),(245,NULL,NULL,NULL,NULL,NULL,NULL,124,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,NULL,NULL,NULL),(246,NULL,NULL,NULL,NULL,NULL,NULL,125,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,93,NULL,NULL,NULL,NULL),(247,NULL,NULL,NULL,NULL,NULL,NULL,126,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,103,NULL,NULL,NULL,NULL),(248,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,52,NULL,NULL,NULL,NULL),(249,NULL,NULL,NULL,NULL,NULL,NULL,127,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,35,NULL,NULL,NULL,NULL),(250,NULL,NULL,NULL,NULL,NULL,NULL,128,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(251,NULL,NULL,NULL,NULL,NULL,NULL,129,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(252,NULL,NULL,NULL,NULL,NULL,NULL,130,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(253,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,58,NULL,NULL,'2019-08-24 11:39:47',NULL),(254,NULL,NULL,NULL,NULL,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,35,115,NULL,'2019-08-24 11:32:17',NULL,NULL),(255,NULL,NULL,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,36,85,NULL,'2019-08-26 09:54:45',NULL,'2019-08-26 10:17:58'),(256,NULL,NULL,NULL,NULL,NULL,NULL,131,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,36,85,NULL,NULL,NULL,NULL),(257,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,58,NULL,NULL,'2019-08-26 10:05:30',NULL),(258,NULL,NULL,NULL,NULL,NULL,NULL,132,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,76,NULL,NULL,NULL,NULL),(259,NULL,NULL,NULL,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,44,NULL,'2019-08-26 10:06:04',NULL,'2019-08-26 11:42:02'),(260,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,99,NULL,'2019-08-26 10:16:21',NULL,'2019-08-26 10:31:18'),(261,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,24,70,NULL,NULL,'2019-08-26 10:39:34',NULL),(262,NULL,46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,'2019-08-26 10:43:05',NULL,'2019-08-26 11:09:24'),(263,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,110,NULL,'2019-08-26 10:31:43',NULL,'2019-08-26 11:28:09'),(264,NULL,NULL,NULL,NULL,NULL,NULL,133,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,37,74,NULL,NULL,NULL,NULL),(265,NULL,NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,'2019-08-26 10:47:01','2019-08-26 11:44:33',NULL),(266,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,18,92,NULL,NULL,'2019-08-26 11:06:12',NULL),(267,NULL,NULL,NULL,NULL,NULL,NULL,134,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,93,NULL,NULL,NULL,NULL),(268,NULL,NULL,NULL,NULL,NULL,NULL,135,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,NULL,NULL,NULL),(269,NULL,NULL,NULL,NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,'2019-08-26 11:06:26','2019-08-26 11:47:33',NULL),(270,NULL,NULL,NULL,NULL,NULL,NULL,136,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,42,56,NULL,NULL,NULL,NULL),(271,NULL,NULL,NULL,NULL,NULL,NULL,137,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,92,NULL,NULL,NULL,NULL),(272,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,102,NULL,NULL,NULL,NULL),(273,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,102,NULL,NULL,NULL,NULL),(274,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,102,NULL,NULL,NULL,NULL),(275,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,102,NULL,NULL,NULL,NULL),(276,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,102,NULL,NULL,NULL,NULL),(277,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,102,NULL,NULL,NULL,NULL),(278,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,43,68,NULL,NULL,'2019-08-26 13:24:43',NULL),(279,NULL,NULL,NULL,NULL,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,50,NULL,'2019-08-26 13:24:56',NULL,NULL),(280,NULL,NULL,NULL,NULL,NULL,NULL,138,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,47,NULL,NULL,NULL,NULL),(281,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,39,104,NULL,NULL,'2019-08-26 14:02:20',NULL),(282,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,44,32,NULL,NULL,NULL,NULL);

#
# Structure for table "user"
#

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `nik` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `level` int(2) NOT NULL DEFAULT 0 COMMENT '1 = cabang user, 2 = admin 1 (lia), 3  = admin 2 (gede), 4 = admin nst (arif), 5 = super user (atasan)',
  `jabatan` varchar(255) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT 0,
  `id_cabang` int(3) NOT NULL DEFAULT 0,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Lia','200001','admin1@admin.com','e00cf25ad42683b3df678c61f42c6bda',2,NULL,1,46,'2019-08-16 16:36:16'),(2,'Gede Laroiba','079551','admin2@admin.com','c84258e9c39059a89ab77d846ddab909',3,NULL,1,46,'2019-08-16 16:36:16'),(11,'Okky Aditya','072104','okky.aditya@bfi.co.id','c821adbe2db2d35a30551480105cb919',1,NULL,1,7,'2019-08-16 16:36:16'),(16,'Maulana Arief Kuncoro','078600','maulana.kuncoro@bfi.co.id','3937089bca13be70547dfabae76d7ac3',4,NULL,1,46,'2019-08-16 16:36:16'),(17,'Admin Superuser','000000','administrator@bfisyariah.id','0baea2f0ae20150db78f58cddac442a9',5,NULL,1,46,'2019-08-16 16:36:16'),(23,'Ardy','079473','ardy.ardy@bfi.co.id','b32c3ea483b375b79e01ffc404316070',2,NULL,1,46,'2019-08-16 16:36:16'),(26,'Ibrahim','000005','ibrahim.ahmadd98@gmail.com','f1c083e61b32d3a9be76bc21266b0648',1,NULL,1,8,'2019-08-16 16:36:16'),(28,'reky sutedja','007559','reky.sutedja@bfi.co.id','1e83aa6cec826c41eed0c3eb286191ca',1,NULL,1,45,'2019-08-16 16:36:16'),(29,'Iva Ariani','005138','ivaariani@gmail.com','451692fb66fde7b32942537e8a80b47f',1,NULL,1,38,'2019-08-16 16:36:16'),(30,'FAISAL','004196','faisalmahatama@gmail.com','e78d7dc7320e76eff092280cfc73578e',1,NULL,1,3,'2019-08-16 16:36:16'),(31,'E.M.Ikhsanudin','079442','ikhsanemcy@gmail.com','17516ddbe5c4957cb2c6efaf4bdc63af',1,NULL,1,16,'2019-08-16 16:36:16'),(32,'Fatrinanda lamusu','017862','nandalamusu@gmail.com','adb4bb84c63583d3b842413d7014d1cd',1,NULL,1,44,'2019-08-16 16:36:16'),(33,'Ilham Hamiru','901461','ilhamiru50@gmail.com','e7a6876c9ac13bd9c82a96cbafb85046',1,NULL,1,44,'2019-08-16 16:36:16'),(34,'Muhammad faizal','901712','Muhammadfaizal04111993@gmail.com','60bf01e2a129456570d4009b5dc89a94',1,NULL,1,38,'2019-08-16 16:36:16'),(35,'SABILAL MUHTADIN','014555','sabilalmuhtadin1980@gmail.com','e78d7dc7320e76eff092280cfc73578e',1,NULL,1,3,'2019-08-16 16:36:16'),(36,'Ardianto S','9014668','ardiadrian696@gmail.com','59cbc46df3a1818443dfe3f5945a6004',1,NULL,1,38,'2019-08-16 16:36:16'),(37,'Muhammad faizal','9017012','Muhammadpaisal19404111993@gmail.com','60bf01e2a129456570d4009b5dc89a94',1,NULL,1,38,'2019-08-16 16:36:16'),(38,'Janu Setiawan','015501','janu.setiawan@bfi.co.id','42b0dc0ae5333d6de8867073537be38d',1,NULL,1,31,'2019-08-16 16:36:16'),(39,'Abdul Gafur','009241','gofreinds41@gmail.com','0bee710122d521f74f48f7fdc33fed69',1,NULL,1,15,'2019-08-16 16:36:16'),(40,'Umi Sultra','072632','umisultra@gmail.com','57ef86f9f28375de3d24c0393945c9c0',1,NULL,1,26,'2019-08-16 16:36:16'),(41,'Agung Budi Cahyono','024157','agung.cahyono@bfi.co.id','041e1a6a28ab4012af6876a51dca317d',1,NULL,1,9,'2019-08-16 16:36:16'),(42,'Mimi Aslamiyah','005074','mimi.aslamiyah@bfi.co.id','3be79637cae82734dc58df61146385bf',1,NULL,1,26,'2019-08-16 16:36:16'),(44,'Diansah','9015342','Diansah1105@gmail.com','0beb4892395211e0429d73b034db620d',1,NULL,1,15,'2019-08-16 16:36:16'),(45,'Eko yuli suprianto','016923','suprianto.jktg2708@gmail.com','2f6b2d1d0642a6cf40e9c245ded02507',1,NULL,1,15,'2019-08-16 16:36:16'),(46,'Sutriyandi','011349','sutriyandi@bfi.co.id','446947ce40e2bc3eece0c1161544bdd6',1,NULL,1,40,'2019-08-16 16:36:16'),(47,'AYU KEMALA SARI','9016709','ayu92kemala@gmail.com','d190075af52f6d43177918dff07a3d46',1,NULL,1,11,'2019-08-16 16:36:16'),(48,'HERFIANA','067337','herfiana.jauharah@gmail.com','42dd950dcb324b1b1c5232440bec2639',1,NULL,1,11,'2019-08-16 16:36:16'),(49,'JAJANG JAMALUDIN','012993','jajang.jamaludin@bfi.co.id','550fd836a872e632a3847728e138606e',1,NULL,1,42,'2019-08-16 16:36:16'),(50,'Arif Fadilah','078343','arifelfadillah@gmail.com','408d5367952163926c9c91a5bd4d7b99',1,NULL,1,6,'2019-08-16 16:36:16'),(51,'Nurfadli','9014498','Nurfadlif03@gmail.com','550fd836a872e632a3847728e138606e',1,NULL,1,42,'2019-08-16 16:36:16'),(52,'Budi Iswanto','9016990','budii150594@gmail.com','e03be53d39d9a7de4f1272bb5f185191',1,NULL,1,42,'2019-08-16 16:36:16'),(53,'M Aditya Darmawan','9015113','aditd5150@gmail.com','87b39e2c4f7e8c3056489034b074155a',1,NULL,1,6,'2019-08-16 16:38:14'),(54,'Ali Takim Siregar','9017208','alitaqims03@gmail.com','fd339bd7a36a4b1264c2a661aaf229cd',1,NULL,1,9,'2019-08-16 17:22:33'),(55,'Agung Sukma Pratama','9017203','agungpratama4509@gmail.com','095f27b77a0e5b122e3a4b3464d6516c',1,NULL,1,9,'2019-08-16 17:43:16'),(56,'Dede rizky wahyudi','9016785','dederizkywahyudi4@gmail.com','82cf235e87c9ae6c6c54859de8f2765b',1,NULL,1,42,'2019-08-18 14:50:06'),(58,'Aprila sukoco','080981','radenmasaprilasukoco@gmail.com','33d29aaba3f43cba910fb2d32d63ee9e',1,NULL,1,40,'2019-08-19 08:43:33'),(59,'DONY PRIADHI','075573','donybfisyariah@gmail.com','ef8e4c3fbf2d454babfdf7927957b2cf',1,NULL,1,17,'2019-08-19 10:52:11'),(60,'Misbach Ahmad Bachruddin','9014468','misbachbach@gmail.com','74e44a50816171ef94cdd0b6172f5779',1,NULL,1,7,'2019-08-19 11:29:10'),(61,'Muhamad Yaman Huri','9014469','elhurimuhamadyaman@gmail.com','399351b8c12b6317572d283414949801',1,NULL,1,7,'2019-08-19 11:30:06'),(62,'Rizki Imanullah','079816','rizki.imanullah@gmail.com','367a2236f626fbd45add6bf26ea685cd',1,NULL,1,7,'2019-08-19 11:31:04'),(63,'Akmal dhiya ulhaq','9015712','akmaldhiyaulhaq7@gmail.com','c5caf74edf9bc0e39adc6a0b461dd13f',1,NULL,1,26,'2019-08-19 12:00:56'),(64,'Daman Huri','9015120','damanhuri1678@gmail.com','6be98e388489472a108987be117a7914',1,NULL,1,6,'2019-08-19 12:08:54'),(65,'Fadhil Alwan Dharma Adji','9016391','Fadhilalwan28@gmail.com','a243acb51619490ec691df8db66133ec',1,NULL,1,11,'2019-08-19 14:21:40'),(66,'Yudhi Ari Setyawan','006945','kemplanx@gmail.com','825960e7bb896c694502b591b67718d5',1,NULL,1,20,'2019-08-19 17:14:53'),(67,'Benny Himawan Elhamsyah','9016505','bennyhimawanelhamsyah@gmail.com','138d1f57a8fb16b41b2461641b51c431',1,NULL,1,20,'2019-08-19 17:17:52'),(68,'Rendy Soenarya','9015716','rendyizanami@gmail.com','1f378326286adb866282546ca226a2a8',1,NULL,1,43,'2019-08-19 17:27:42'),(70,'DEWI AYU MUSTIKA','077238','dewi.mustika@bfi.co.id','46af0592f9e3e535cef31e64163b4b3d',1,NULL,1,24,'2019-08-19 17:39:10'),(71,'Mohamad Ali Fikri','9017325','mohamadalifikri651@gmail.com','1bab567ee4df8c4c1f7475aa92f46eeb',1,NULL,1,27,'2019-08-19 17:43:20'),(72,'Haryo Seno','079777','haryo.seno@bfi.co.id','e3a06b6ac599ae044b6faaaff14f63ca',1,NULL,1,27,'2019-08-19 17:43:29'),(73,'Khusnul khotimah','9014955','khusnulkhotimahhhh0805@gmail.com','932da2b5525a5844636cb95b83996f71',1,NULL,1,27,'2019-08-19 17:44:12'),(74,'PANCA INDRYA MUKTI','9015180','pancandrya5@gmail.com','733de440496ebe297d561fbcde5b66f9',1,NULL,1,37,'2019-08-19 17:55:26'),(75,'Febriyan Sutrisno','9013898','febriyansutrisno66@gmail.com','74f8aa76a2a240ebd9c29979cc8fbf40',1,NULL,1,24,'2019-08-19 17:56:50'),(76,'CINCA NOUVALITA','081366','cincanouvalita@gmail.com','25d55ad283aa400af464c76d713c07ad',1,NULL,1,37,'2019-08-19 17:57:04'),(77,'CHABIBUL MIFTA','078288','chabibul.mifta@bfi.co.id','25d55ad283aa400af464c76d713c07ad',1,NULL,1,37,'2019-08-19 17:58:12'),(78,'tantan wijaya','008126','tantanwijaya012@gmail.com','d7c506d85a19ede10fe54fb873df05e6',1,NULL,1,43,'2019-08-19 18:20:05'),(79,'robby saputra','009827','robby.saputra@bfi.co.id','4a66fc1b063fdb3d3bd32e49f41b8659',1,NULL,1,14,'2019-08-20 09:42:52'),(80,'RENO AGUNG WIBOWO','9017457','vje6699@gmail.com','00744b0b674238b41b1ada7ca6071d55',1,NULL,1,14,'2019-08-20 10:09:25'),(82,'Adi Nurohman','081291','adiiinurohman12@gmail.com','60afc1cb53bab453b5e2397ef24c3f74',1,NULL,1,40,'2019-08-20 10:19:19'),(83,'Dicky Kurniawan','074675','dicky.kurniawan@bfi.co.id','becbea646fb394ca9fa18ca7cb2bb5b1',1,NULL,1,29,'2019-08-20 14:30:49'),(84,'Dhany Prakarsa','018985','dhany.prakarsa@bfi.co.id','89cb46fbfbcc01d0d7e45c2cade9042d',1,NULL,1,36,'2019-08-20 15:32:08'),(85,'Asri puspitasari','9016131','dhany2912@gmail.com','09e28702d0ce59d2d105c2df79d5a19e',1,NULL,1,36,'2019-08-20 16:04:35'),(86,'ARIYANTO LAPU','007748','ariyanto.lapu@bfi.co.id','3e8034a85c7ef242f32e1fed09a927c4',1,NULL,1,12,'2019-08-20 16:05:44'),(87,'ABD MOKIT','051878','mokitabdul22@gmail.com','c76093e34fc206f9f526bbd8fdd69948',1,NULL,1,18,'2019-08-20 16:06:10'),(88,'agus supriyanto','9014907','agussupriyanto012@gmail.com','03bd2774aa324205c054700d91affb73',1,NULL,1,12,'2019-08-20 16:09:07'),(89,'Achmad Fauzi','9016727','oziebequiet@yahoo.co.id','4a7c0071fc9a2279d778b729fc5c77e1',1,NULL,1,34,'2019-08-20 16:21:49'),(90,'DEDY IRMAWAN','018114','dedy.irmawan1988@gmail.com','fe4861bb8bbd394b448c9352c151d544',1,NULL,1,34,'2019-08-20 16:27:12'),(91,'Rakhmad Hidayat','018679','rakhmad.hidayat@bfi.co.id','5f4dcc3b5aa765d61d8327deb882cf99',1,NULL,1,45,'2019-08-20 17:41:04'),(92,'Armila Ernisa Zulfa','080229','zulfaernissa@gmail.com','789825b4a24e0b2d9f5dac7fe2209fc7',1,NULL,1,18,'2019-08-20 22:20:15'),(93,'Vendra Irawan','9016188','vendrairhawan@ymail.com','c246aea795dc477dbf776c928d9050e8',1,NULL,1,45,'2019-08-21 08:31:28'),(94,'DEVI APRIYANI','9016613','deviapriani.da81@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99',1,NULL,1,45,'2019-08-21 08:36:06'),(95,'Roni Yuliantino','9016864','roniyuliantino82@gmail.com','0de549929a2a16cdcef697f8d76eb1c9',1,NULL,1,31,'2019-08-21 09:56:35'),(96,'UMAR SALEH DAULAY','008752','umarsaleh402@gmail.com','da4fa6da7915c5b3755f3e3e15dc79f2',1,NULL,1,31,'2019-08-21 10:00:53'),(97,'RAHMAT RIO BAHARI','080917','rahmatrio981@yahoo.com','97a8a4877ba4bf081b28c93f3fce5d1e',1,NULL,1,31,'2019-08-21 10:03:39'),(98,'ANDY PUTRA','080916','andyputra180@rocketmail.com','8e9d6e62d25d26597e8514d0835132a4',1,NULL,1,31,'2019-08-21 10:09:26'),(99,'Faiz Amin Jaya','080569','faizaminjaya@gmail.com','397137c5aa9d13aa76b715663e192420',1,NULL,1,18,'2019-08-21 10:14:16'),(100,'MEIDA RUSIANA TUNJANG','9016402','meidarusianatunjang@gmail.com','57a23281db49393891174a9d5965772b',1,NULL,1,29,'2019-08-21 10:48:06'),(101,'YASINTA FITRIANI','9017403','sintafitrie@gmail.com','cdd64ea2bfef5992900423a2e826889f',1,NULL,1,29,'2019-08-21 11:26:49'),(102,'Kemal Yusrin','020589','kemal.alturk@bfi.co.id','e10adc3949ba59abbe56e057f20f883e',1,NULL,1,43,'2019-08-21 16:48:49'),(103,'Fachreza Dhian Pratama','071887','syariah.kendari@gmail.com','6391a0ac58b2a75791384bc04f6b29d4',1,NULL,1,19,'2019-08-22 16:54:23'),(104,'Adi Renaldi','069606','adi.renaldi@bfi.co.id','e03f78f289f987613b07f3cddb73f9a8',1,NULL,1,39,'2019-08-22 19:00:12'),(105,'Isthafa Harits Utami','9014881','isthafa.27@gmail.com','6e777fe11a540268a6a39a42fc432767',1,NULL,1,39,'2019-08-23 05:29:29'),(106,'Moch Qurthuby','9014890','moch.qurthuby07@gmail.com','c68d13535bc3f5eadfef7e867e6e2660',1,NULL,1,39,'2019-08-23 08:43:19'),(107,'Dingga Diramaesha','016721','dingga.diramaesha@bfi.co.id','b895a9ddd8f6db70af8b5cc4cd759005',1,NULL,1,8,'2019-08-23 09:30:57'),(108,'MONA AGISTA','004913','mona.agista@bfi.co.id','2616c763893e5d2618389f8c98d8bf25',1,NULL,1,28,'2019-08-23 09:31:40'),(109,'ARIS FAHRIANTO','079707','arisfahrianto@gmail.com','b28b5879e1f417982b9ab6ecf9a33062',1,NULL,1,33,'2019-08-23 14:34:26'),(110,'SITI BAROKAH','9015287','sitibarokah756@gmail.com','4cd4d2e51b5ab80a3824af07d5039f1a',1,NULL,1,33,'2019-08-23 14:36:26'),(111,'EGI DELLIANA','9015270','egidelliana@gmail.com','c521626b832787f57f9861c373350c3f',1,NULL,1,33,'2019-08-23 14:37:54'),(112,'Dwi Nurcahyanti','9014691','dwinurcahyanti14@gmail.com','259af61090c1feab3fd8988b8682f71c',1,NULL,1,35,'2019-08-23 14:41:29'),(113,'Afriyana nurman satria','020615','afriyana.satria@bfi.co.id','39a21f3f58287334901197c82e6a8daa',1,NULL,1,10,'2019-08-23 15:39:43'),(114,'Hesky hermoyo','9014457','heskyh08@gmail.com','ee31d1e8a4674f4fe0c738936ba1aa58',1,NULL,1,10,'2019-08-23 16:04:54'),(115,'MONICA APRILIA PUTRI','072710','monica.putri@bfi.co.id','f65d3d938f139227d9f22ad3d3a473df',1,NULL,1,35,'2019-08-24 08:21:43'),(116,'PITA PURNAMASARI','9017505','pitapurnamasari1081@gmail.com','e34aed849c9f31940058d51aea015111',1,NULL,1,19,'2019-08-24 09:33:53'),(117,'Hermawan Dwi putra','015254','hermawan.putra@bfi.co.id','e1c79b80db136947089d1974bf12786d',1,NULL,1,32,'2019-08-24 10:55:44'),(118,'Ari Iswanto','9015730','ariiswanto161@gmail.com','3c3b752cad1aa2f3eb938e4f3e3fbc98',1,NULL,1,4,'2019-08-26 10:17:05'),(119,'Siti Nurwulan','041539','siti.nurwulan@bfi.co.id','afc45f6eb147ac43c72a205391bb00d3',1,NULL,1,13,'2019-08-26 11:20:38'),(120,'Lolita Media Sari','007426','lolitamediasari@gmail.com','d597ddf5bfabed2a92e8203188cbdd71',1,NULL,1,41,'2019-08-26 11:22:09'),(121,'Teddy Mathado','007884','teddy.mathado@bfi.co.id','8bfe0f9a64f31db37688c32de4bdba35',1,NULL,1,17,'2019-08-26 11:24:10'),(122,'Muhammad Hilal','005622','muh.hilal@bfi.co.id','1a1fe344c01528f5b71d2edc4b01aad3',1,NULL,1,30,'2019-08-26 11:27:02'),(123,'Mira Anggraeni','006075','mira.anggraeni@bfi.co.id','abd01045b9aa195f0810a48d4b6434da',1,NULL,1,5,'2019-08-26 11:31:36'),(124,'Dedy Armana Putra','077214','dedyarmanaputra@gmail.com','acbeaaf2287f02b04840a55713bc9be4',1,NULL,1,1,'2019-08-26 11:31:50'),(125,'Nisa  Nurathiqoh','9015248','nisaqoh23@gmail.com','efb82a23723d2945415cd8a49abab3b8',1,NULL,1,17,'2019-08-26 11:37:03'),(126,'Meryana ayu wardhany','080204','meryanaayu6@gmail.com','94d0432b2f983f2f49218d94afb1045b',1,NULL,1,17,'2019-08-26 11:38:34'),(127,'Dewi Rahayu Puspitasari','081065','dhewierahayu@gmail.com','ce91627f04446919fb6e5884bfd387fd',1,NULL,1,13,'2019-08-26 11:50:08'),(128,'Rahmat hidayat','9017146','rahmat.140688@gmail.com','6d9ba7a7568532d31df8882ba08ce3d9',1,NULL,1,22,'2019-08-26 11:57:20'),(129,'Bagus Dwi Setyanto','9017492','bagusetyanto.bds@gmail.com','40b4fa6704f1b03731a303a7e88aac4a',1,NULL,1,41,'2019-08-26 11:57:48'),(130,'Idfan Reyzal Hamalgani','9017490','idfanreyzal@yahoo.com','9daef7a9db5fa571bc42574060529b27',1,NULL,1,41,'2019-08-26 11:58:02'),(131,'Dimas Haryan','9016971','dimasharyan1@gmail.com','0eb61f89e562631fb17841d4102941b6',1,NULL,1,4,'2019-08-26 12:05:30'),(132,'M. WEIMPY FAHMI','015638','weimpyfahmi@gmail.com','e788d432a6301c55f5ad4a6c8f53227e',1,NULL,1,23,'2019-08-26 12:13:01'),(133,'Hasyirul umam','9071287','hasyirulumam0794@gmail.com','e10adc3949ba59abbe56e057f20f883e',1,NULL,1,32,'2019-08-26 12:13:37'),(134,'MOCH SALAFUDIN','081066','mohsalafudin92@gmail.com','64accb9cfd06204ec636d63a11e0f64c',1,NULL,1,13,'2019-08-26 12:16:18'),(135,'M Sahirsyah','081195','sahirsyahm@gmail.com','34e71227de6b5784a3e7107ca96fa424',1,NULL,1,30,'2019-08-26 13:03:41'),(136,'Barli Adwensyah','076859','barliadwensyah@gmail.com','34e71227de6b5784a3e7107ca96fa424',1,NULL,1,30,'2019-08-26 13:05:07'),(137,'Wijaya Lefiyandie','081199','wijaya.lefiyandie@yahoo.com','34e71227de6b5784a3e7107ca96fa424',1,NULL,1,30,'2019-08-26 13:07:04'),(138,'Dina Cassa Maharani','081357','dinaamaharani@gmail.com','840c9622dec86f7fd6361fab685b5ab7',1,NULL,0,41,'2019-08-26 13:45:50'),(139,'Ana Zuliatin Nadhiroh','081355','ananadhiroh23@gmail.com','4a2e9fba599cfa1198f7e59362a2d8ca',1,NULL,0,41,'2019-08-26 13:47:53'),(140,'M Fathirul Abrar','011454','fathirul.abrar@gmail.com','caa92674de6e72fa257e7959a62ebafc',1,NULL,0,25,'2019-08-26 13:52:09'),(141,'Muhammad Irsal','079925','muhammadirsal16@gmail.com','7a36a05edf7e3fe651a5807871528a0e',1,NULL,0,25,'2019-08-26 13:57:14'),(142,'Nurhasanah Ginting','9015107','nurhasanahginting11@gmail.com','7a36a05edf7e3fe651a5807871528a0e',1,NULL,0,25,'2019-08-26 13:58:21'),(143,'Rahmat Irfan','9016432','rahmatirfan01@gmail.com','7a36a05edf7e3fe651a5807871528a0e',1,NULL,0,25,'2019-08-26 14:01:47');
