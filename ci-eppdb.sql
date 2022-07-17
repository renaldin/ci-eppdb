-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ci-eppdb
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ci-eppdb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ci-eppdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ci-eppdb`;

--
-- Table structure for table `informasi_ppdb`
--

DROP TABLE IF EXISTS `informasi_ppdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informasi_ppdb` (
  `id_informasi` int(11) NOT NULL AUTO_INCREMENT,
  `judul_informasi` varchar(255) NOT NULL,
  `tanggal_informasi` date NOT NULL,
  `isi_informasi` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informasi_ppdb`
--

LOCK TABLES `informasi_ppdb` WRITE;
/*!40000 ALTER TABLE `informasi_ppdb` DISABLE KEYS */;
INSERT INTO `informasi_ppdb` VALUES (18,'Ketentuan Pengisian Formulir PPDB Online SDN Cibogo Tahun 2022/2023','2022-06-01','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Massa tempor nec feugiat nisl pretium fusce id. Ac auctor augue mauris augue neque gravida. Urna duis convallis convallis tellus id interdum velit laoreet. At auctor urna nunc id cursus metus. Nec feugiat nisl pretium fusce id velit ut. Aliquam vestibulum morbi blandit cursus risus at ultrices mi. Placerat orci nulla pellentesque dignissim enim sit amet venenatis. Aliquet risus feugiat in ante metus dictum at. Integer malesuada nunc vel risus commodo.</p>\r\n\r\n<p>Sed id semper risus in. Massa tincidunt nunc pulvinar sapien et. Ut morbi tincidunt augue interdum velit euismod. Mattis aliquam faucibus purus in massa. Blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque. Facilisis leo vel fringilla est ullamcorper. Imperdiet sed euismod nisi porta lorem mollis. Egestas diam in arcu cursus euismod quis viverra. Venenatis tellus in metus vulputate. Accumsan sit amet nulla facilisi. Ut lectus arcu bibendum at. Nulla at volutpat diam ut venenatis. Aliquam ut porttitor leo a diam sollicitudin. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Mi quis hendrerit dolor magna eget. Nibh nisl condimentum id venenatis a condimentum vitae. Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus.</p>\r\n\r\n<p>Placerat orci nulla pellentesque dignissim enim sit amet. In dictum non consectetur a erat nam at lectus urna. Sed arcu non odio euismod lacinia at quis risus sed. Dignissim suspendisse in est ante in. Turpis cursus in hac habitasse platea dictumst quisque sagittis. Sodales ut eu sem integer vitae justo eget magna. Nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae. At tempor commodo ullamcorper a lacus vestibulum. In ornare quam viverra orci. Fermentum iaculis eu non diam phasellus vestibulum lorem. Faucibus scelerisque eleifend donec pretium vulputate sapien. Nec ullamcorper sit amet risus nullam eget felis eget. Est lorem ipsum dolor sit amet consectetur. Blandit aliquam etiam erat velit scelerisque in dictum non. Diam sit amet nisl suscipit. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel orci. Egestas diam in arcu cursus euismod quis viverra.</p>\r\n\r\n<p>Amet tellus cras adipiscing enim. At auctor urna nunc id cursus metus aliquam eleifend mi. Leo a diam sollicitudin tempor id. Quis enim lobortis scelerisque fermentum dui faucibus in ornare. Tempus imperdiet nulla malesuada pellentesque elit eget. Integer enim neque volutpat ac tincidunt vitae. Condimentum vitae sapien pellentesque habitant morbi. A pellentesque sit amet porttitor eget dolor morbi non arcu. Odio ut sem nulla pharetra diam sit. Nisi vitae suscipit tellus mauris. Auctor augue mauris augue neque gravida in fermentum et. Phasellus faucibus scelerisque eleifend donec. Id velit ut tortor pretium viverra suspendisse. Risus commodo viverra maecenas accumsan. Tempus iaculis urna id volutpat lacus laoreet non. Amet purus gravida quis blandit. Ut eu sem integer vitae justo eget magna fermentum. Scelerisque eleifend donec pretium vulputate sapien. Magna ac placerat vestibulum lectus mauris ultrices. Quam pellentesque nec nam aliquam sem.</p>\r\n\r\n<p>&nbsp;</p>\r\n','1655245689_5c52cb77ae9a98c2af44.jpg'),(19,'Syarat PPDB Online SDN Cibogo Tahun 2022','2022-06-15','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non sodales neque sodales ut etiam sit amet nisl purus. Ut pharetra sit amet aliquam id. Posuere urna nec tincidunt praesent semper. Dis parturient montes nascetur ridiculus. Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. In pellentesque massa placerat duis ultricies. Risus at ultrices mi tempus imperdiet. Et malesuada fames ac turpis egestas maecenas. Nec tincidunt praesent semper feugiat nibh sed. Quisque id diam vel quam elementum pulvinar etiam non. Sed viverra ipsum nunc aliquet bibendum. Ut tortor pretium viverra suspendisse potenti nullam ac tortor. Lectus vestibulum mattis ullamcorper velit. Magnis dis parturient montes nascetur ridiculus. Amet est placerat in egestas erat imperdiet sed. Ut sem viverra aliquet eget sit amet tellus cras adipiscing.</p>\r\n\r\n<p>Elit duis tristique sollicitudin nibh sit amet commodo nulla. Sed ullamcorper morbi tincidunt ornare massa eget egestas purus. Ac ut consequat semper viverra. Sit amet mattis vulputate enim nulla. Eu augue ut lectus arcu bibendum at varius. Risus in hendrerit gravida rutrum quisque. Tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Gravida in fermentum et sollicitudin ac orci phasellus. Tellus id interdum velit laoreet id donec ultrices. Fames ac turpis egestas integer eget aliquet nibh praesent tristique. Sed adipiscing diam donec adipiscing tristique. Nisl nisi scelerisque eu ultrices vitae. Pellentesque adipiscing commodo elit at. Mollis aliquam ut porttitor leo a.</p>\r\n\r\n<p>Eget felis eget nunc lobortis mattis aliquam faucibus purus in. Phasellus vestibulum lorem sed risus ultricies tristique. Risus sed vulputate odio ut. Malesuada proin libero nunc consequat. Non blandit massa enim nec dui nunc mattis enim ut. Magnis dis parturient montes nascetur ridiculus mus mauris. Quam pellentesque nec nam aliquam sem et. Maecenas accumsan lacus vel facilisis. Sodales neque sodales ut etiam sit. Vitae proin sagittis nisl rhoncus mattis.</p>\r\n\r\n<p>Egestas maecenas pharetra convallis posuere morbi leo. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Ac tortor vitae purus faucibus ornare suspendisse sed. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. Nam at lectus urna duis convallis convallis. Sodales ut etiam sit amet. Viverra nam libero justo laoreet sit amet cursus sit. Tincidunt vitae semper quis lectus nulla at volutpat. Risus sed vulputate odio ut. Amet justo donec enim diam vulputate ut. Morbi tincidunt ornare massa eget egestas. Aliquam purus sit amet luctus venenatis.</p>\r\n\r\n<p>Pellentesque elit ullamcorper dignissim cras tincidunt. Porttitor leo a diam sollicitudin tempor id eu. Sit amet massa vitae tortor. Ut placerat orci nulla pellentesque dignissim enim sit. Et egestas quis ipsum suspendisse ultrices. Massa placerat duis ultricies lacus sed turpis tincidunt id aliquet. Amet venenatis urna cursus eget. Felis bibendum ut tristique et egestas quis ipsum suspendisse. Nisl vel pretium lectus quam id leo. Semper viverra nam libero justo laoreet sit amet. Semper quis lectus nulla at volutpat.</p>\r\n\r\n<p>Aliquet enim tortor at auctor urna nunc id cursus metus. Massa tincidunt dui ut ornare lectus sit. Senectus et netus et malesuada fames ac turpis egestas maecenas. In nibh mauris cursus mattis molestie a iaculis at. Volutpat consequat mauris nunc congue nisi. Nec nam aliquam sem et tortor consequat id. Donec ultrices tincidunt arcu non sodales neque. In cursus turpis massa tincidunt dui ut ornare lectus. Euismod in pellentesque massa placerat. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis. Porttitor eget dolor morbi non arcu risus. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum. Euismod elementum nisi quis eleifend quam adipiscing vitae proin sagittis. Volutpat sed cras ornare arcu.</p>\r\n\r\n<p>Urna condimentum mattis pellentesque id nibh tortor id. Curabitur gravida arcu ac tortor dignissim convallis. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque habitant. Vel fringilla est ullamcorper eget nulla facilisi. Tempor orci dapibus ultrices in. Amet purus gravida quis blandit turpis cursus in hac. Turpis nunc eget lorem dolor sed viverra ipsum nunc aliquet. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a. Odio pellentesque diam volutpat commodo sed egestas egestas. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Semper auctor neque vitae tempus quam pellentesque nec.</p>\r\n\r\n<p>&nbsp;</p>\r\n','1655257520_e5078f28ac6acb6265cc.jpg'),(20,'Tata Cara Penggunaan Web PPDB Online SDN Cibogo','2022-06-06','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus nullam eget felis eget nunc lobortis mattis aliquam. Convallis posuere morbi leo urna molestie at. Diam quam nulla porttitor massa id neque. Nunc scelerisque viverra mauris in aliquam. Quis blandit turpis cursus in hac. Id leo in vitae turpis massa sed elementum tempus. Ut faucibus pulvinar elementum integer. Viverra maecenas accumsan lacus vel. Vehicula ipsum a arcu cursus. Facilisis volutpat est velit egestas dui. Erat velit scelerisque in dictum non consectetur a erat nam.</p>\r\n\r\n<p>Netus et malesuada fames ac turpis egestas integer eget aliquet. Viverra aliquet eget sit amet tellus cras adipiscing. Dignissim enim sit amet venenatis urna. Nunc eget lorem dolor sed viverra. Et leo duis ut diam quam. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. Libero justo laoreet sit amet cursus sit. Pellentesque elit eget gravida cum sociis natoque penatibus et. Neque volutpat ac tincidunt vitae semper quis lectus nulla at. Habitant morbi tristique senectus et netus et malesuada fames ac. Nunc pulvinar sapien et ligula ullamcorper malesuada proin libero nunc. Volutpat est velit egestas dui id ornare. Urna neque viverra justo nec ultrices dui sapien eget mi. Duis ut diam quam nulla porttitor massa id. Commodo odio aenean sed adipiscing. Ut diam quam nulla porttitor massa id neque aliquam vestibulum. Enim nec dui nunc mattis. Cras sed felis eget velit aliquet sagittis id.</p>\r\n\r\n<p><img alt=\"\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS48pxGTJk7MjWk-LBB2Fck0joerNxQ9uO3gMXJq7G9-5M3bJXztnE_2BvtKMpDjVPwxik&amp;usqp=CAU\" style=\"height:183px; margin:22px 10px; width:275px\" /></p>\r\n\r\n<p>Neque ornare aenean euismod elementum. Diam ut venenatis tellus in metus vulputate. Est ullamcorper eget nulla facilisi. Proin nibh nisl condimentum id venenatis a condimentum. Phasellus vestibulum lorem sed risus. Consectetur lorem donec massa sapien. Potenti nullam ac tortor vitae purus. Feugiat sed lectus vestibulum mattis. Felis donec et odio pellentesque diam volutpat commodo. Tempor nec feugiat nisl pretium fusce id velit. Volutpat diam ut venenatis tellus in metus vulputate. Nisi scelerisque eu ultrices vitae auctor eu augue ut.</p>\r\n\r\n<p>Mattis molestie a iaculis at erat pellentesque. Proin fermentum leo vel orci. Feugiat vivamus at augue eget arcu dictum varius. Dis parturient montes nascetur ridiculus mus. Nunc lobortis mattis aliquam faucibus purus in massa tempor. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum tellus. Ut consequat semper viverra nam libero justo. Eu sem integer vitae justo eget. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Dui id ornare arcu odio ut sem nulla pharetra. Blandit turpis cursus in hac habitasse platea dictumst. Feugiat in ante metus dictum at tempor. Vel orci porta non pulvinar neque laoreet. Condimentum lacinia quis vel eros donec ac odio tempor. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Tincidunt lobortis feugiat vivamus at. Urna cursus eget nunc scelerisque viverra mauris in aliquam sem.</p>\r\n\r\n<p>&nbsp;</p>\r\n','1655245503_f2220e464b22cc3ec9d1.png');
/*!40000 ALTER TABLE `informasi_ppdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(20) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(150) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(100) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(200) NOT NULL,
  `kerja_ayah` varchar(200) NOT NULL,
  `pendidikan_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `kerja_ibu` varchar(200) NOT NULL,
  `pendidikan_ibu` varchar(100) NOT NULL,
  `telepon_rumah` varchar(20) NOT NULL,
  `b_foto` text NOT NULL,
  `b_akte` text NOT NULL,
  `b_kk` text NOT NULL,
  `b_ktp_ayah` text NOT NULL,
  `b_ktp_ibu` text NOT NULL,
  `b_kartu` text NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` enum('Lulus','Tidak Lulus','Belum Diseleksi') NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES ('2022061006151','Alvian Anggra Randi','2001-11-28','20 tahun, 6 bulan, 25 hari','Laki-laki','Islam','A','Bekasi','Ayah Alvian','Karyawan','SMA','Ibu Alvian','ibu rumah tangga','SMA','083845405760','1655241718_452517e69b4f8201a42d.jpeg','1655241718_3758166a0208fb3d8073.jpg','1655241718_62da83d121a6862a1b02.jpg','1655241718_58b1b5bfd174ae9d58e8.jpg','1655241718_647a558335de57371692.png','1655241718_44ed78dadfaa3b0cb2a8.jpg','2022-06-14','Lulus',9,10),('2022061006152','Anisa Rahmawati','2001-11-28','20 tahun 6 bulan 25 hari','Perempuan','Islam','O','Bogor','Ayah Anisa','Karyawan','SMA','Ibu Anisa','ibu rumah tangga','SMA','0838450988585','1655242029_efe7952d17165ee61380.jpg','1655242029_67a68a54b87196f1ef89.jpg','1655242029_c4ff1e253af2314f8143.jpg','1655242029_0b76f227246d7b0b0bec.jpg','1655242029_4f6faeb6a9fdeb73797a.png','','2022-06-14','Tidak Lulus',9,12);
/*!40000 ALTER TABLE `pendaftaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_sekolah`
--

DROP TABLE IF EXISTS `profil_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil_sekolah` (
  `id_profil_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `akreditasi` varchar(20) NOT NULL,
  `jumlah_semua_siswa` int(11) NOT NULL,
  `deskripsi_atas` text NOT NULL,
  `deskripsi_bawah` text NOT NULL,
  `logo` text NOT NULL,
  `gambar_sekolah1` text NOT NULL,
  `gambar_sekolah2` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wa` bigint(20) NOT NULL,
  PRIMARY KEY (`id_profil_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_sekolah`
--

LOCK TABLES `profil_sekolah` WRITE;
/*!40000 ALTER TABLE `profil_sekolah` DISABLE KEYS */;
INSERT INTO `profil_sekolah` VALUES (1,'SDN Cibogo','Desa Cinangsih, Kec. Cibogo, Kab. Subang, Prov. Jawa Barat','A',90,'Selamat datang di website Penerimaan Peserta Didik Baru (PPDB) Online SD Negeri Cibogo. Disini Anda bisa melakukan proses pendaftaran masuk ke SD Negeri 1 Cibogo dengan tanggal pendaftaran yang telah ditentukan.','Sekolah Dasar Negeri Cibogo merupakan salah satu Sekolah Dasar Negeri yang ada di Kabupaten Subang, lebih tepatnya di Kecamatan Cibogo. Anda yang baru lulus di TK/PAUD/Sederajat bisa bergabung dengan keluarga Sekolah Dasar Negeri Cibogo dengan proses pendaftaran yang telah tentukan.','1655949752_3b4bf8ead7c5d5f3538d.png','1655949752_fbdda16728a01e58f86d.png','1655949752_a0d96655cb0360e1d857.jpg','083845405765','sdncibogo93@gmail.com',83845405765);
/*!40000 ALTER TABLE `profil_sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun_ajaran`
--

DROP TABLE IF EXISTS `tahun_ajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `tanggal_pengumuman` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun_ajaran`
--

LOCK TABLES `tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `tahun_ajaran` DISABLE KEYS */;
INSERT INTO `tahun_ajaran` VALUES (9,'2022/2023','2022-06-25','2022-06-30','2022-07-10',0),(10,'2022/2023','2022-06-10','2022-06-15','2022-06-20',0),(13,'2022/2023','2022-06-18','2022-06-25','2022-06-28',1);
/*!40000 ALTER TABLE `tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` enum('Admin','Calon Siswa') NOT NULL,
  `status_verifikasi` enum('Belum Verifikasi','Sudah Verifikasi') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Renaldi Admin','renaldinoviandi1@gmail.com','admin','admin','Admin','Sudah Verifikasi','1650104800_7b2ae01f996f3430cf8a.jpg'),(10,'Renaldi Noviandi','alvian1@gmail.com','alvian','alvian1','Calon Siswa','Sudah Verifikasi','1655257335_f6f76e7aa3bb7b30c708.jpg'),(12,'Anisa Rahmawati','anisa123@gmail.com','anisa','anisa2','Calon Siswa','Sudah Verifikasi','1656004284_abbf66a719f430a34952.png'),(41,'Renaldi Noviandi','renaldinoviandi4@gmail.com','renaldi4','renaldi4','Calon Siswa','Sudah Verifikasi',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-24  1:43:34
