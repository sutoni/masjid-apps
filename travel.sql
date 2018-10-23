/*
SQLyog Community v12.2.1 (64 bit)
MySQL - 5.5.27 : Database - travel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`travel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `travel`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('01df57edaf1551005a1338cd2225621eab047e0c','::1',1464018951,'__ci_last_regenerate|i:1464018949;'),
('042b6a46b74636374e3d9499f8bb8a6948bf7d97','::1',1464071206,'__ci_last_regenerate|i:1464071059;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('050ec2f959cac9c0bb33fc45c8d365f487e9241d','::1',1463493244,'__ci_last_regenerate|i:1463493244;'),
('0afd490b99f802acbcc0406d101ed66f4c482470','::1',1465281430,'__ci_last_regenerate|i:1465281429;'),
('0bb407f769a1c18f7f8dfd4929a753ef0cbf4104','::1',1466526898,'__ci_last_regenerate|i:1466526781;bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kotaberangkat|s:7:\"JAKARTA\";'),
('0c65521e65a55999147bc8e0c31aa1014db79409','::1',1464523905,'__ci_last_regenerate|i:1464523905;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('115384312dd3bf51600cdc9f0aef63b92b997eb7','::1',1465341071,'__ci_last_regenerate|i:1465341046;'),
('1283eb388d7f3d663a29f2bd7388f31bb48b1a0e','::1',1463442202,'__ci_last_regenerate|i:1463442197;'),
('1305767738db60feb645b0995328d5b0409dedd7','::1',1464040499,'__ci_last_regenerate|i:1464040498;username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('13919402cd5f6a19a20ecd0d84609026a4f80843','::1',1465632607,'__ci_last_regenerate|i:1465632441;username|s:4:\"sari\";password|s:6:\"wandah\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('1395b91c48a0e88fe4bd57bf7a3e22583a353ce3','::1',1467996791,'__ci_last_regenerate|i:1467996531;jmlpenumpang|s:1:\"3\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2001606140\";'),
('14741431b7fa32da50155711b08d448d2d9d7cd1','::1',1463249394,'__ci_last_regenerate|i:1463249389;'),
('156afb0f5d64e93ba369e9e140aa45b0aca0e252','::1',1464038442,'__ci_last_regenerate|i:1464038442;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('179e7603ab8817f027a378ed13b1f47e7ff9b87a','::1',1464567043,'__ci_last_regenerate|i:1464567043;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('201faa60485df382597768439ec4865892360a6b','::1',1463472477,'__ci_last_regenerate|i:1463472381;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"level\";logged_in|b:1;'),
('20dda42d2ef314945c697e2e1693e4f8b52c9e66','::1',1466740604,'__ci_last_regenerate|i:1466740604;'),
('20f38c3d3d5ad47b292c6593079d5c2d694e61a6','::1',1468104880,'__ci_last_regenerate|i:1468104794;'),
('2676bbb744fca8b72e4a19dc4560ff4508d327d4','::1',1466488585,'__ci_last_regenerate|i:1466488564;kotaberangkat|s:10:\"MAJALENGKA\";'),
('2ac71eb90c71a4d45e0cd4488b58967c91a05e40','::1',1463866803,'__ci_last_regenerate|i:1463866786;username|s:4:\"toni\";password|s:5:\"admin\";level|s:0:\"\";logged_in|b:1;'),
('309e6e206eba97e25cb60fda1e34790ac36abdff','::1',1463342368,'__ci_last_regenerate|i:1463342368;'),
('31b93692ae55401559f1a9bdcaec37ac4fd3f99c','::1',1464147902,'__ci_last_regenerate|i:1464147902;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('353ff0bb2d61a55d1e3d2ce437601bf9acefa59c','::1',1466488968,'__ci_last_regenerate|i:1466488958;bdari|s:10:\"MAJALENGKA\";btujuan|s:7:\"JAKARTA\";kotaberangkat|s:10:\"MAJALENGKA\";'),
('3574f0addcf430195f53263f7933cec464285c43','::1',1466462479,'__ci_last_regenerate|i:1466462191;bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";pulangbdari|s:10:\"MAJALENGKA\";pulangbtujuan|s:7:\"JAKARTA\";'),
('3617fcf34881487938cebcbf530f7e73c099ec07','::1',1466794915,'__ci_last_regenerate|i:1466794915;'),
('36f13d7f2f9d1398dd0a3194557397551e40a784','::1',1466899177,'__ci_last_regenerate|i:1466899144;jmlpenumpang|s:1:\"3\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2001606140\";kodebooking|s:11:\"JKT20160003\";kdbooking|s:11:\"JKT20160003\";username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:0:\"\";logged_in|b:1;'),
('37f10c947051ca9aaefef3f4818607adb33b7011','::1',1465615509,'__ci_last_regenerate|i:1465615480;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:5:\"Jarwo\";s:12:\"namabelakang\";s:6:\"Sanusi\";s:8:\"jkelamin\";s:9:\"Laki-laki\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:2:\"10\";s:12:\"tanggallahir\";s:9:\"2002-1-13\";s:12:\"pddkterakhir\";s:7:\"DIPLOMA\";s:16:\"statuspernikahan\";s:7:\"menikah\";s:13:\"jmltanggungan\";s:1:\"2\";s:10:\"ibukandung\";s:5:\"Indah\";s:4:\"nokk\";s:11:\"09778868623\";s:12:\"emailpribadi\";s:22:\"jarwo.sanusi@gmail.com\";s:4:\"nohp\";s:12:\"081315101121\";s:6:\"notelp\";s:11:\"021-7209510\";}idnasabah|s:2:\"80\";'),
('3ca029e2d123fbebcf51bec1bd34f272446085cc','::1',1466033464,'__ci_last_regenerate|i:1466033457;'),
('3cc9b157c13a244b4c3e54f79f1603767687e82d','::1',1465565342,'__ci_last_regenerate|i:1465565267;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:7:\"Wirawan\";s:12:\"namabelakang\";s:7:\"Sentosa\";s:8:\"jkelamin\";s:9:\"Laki-laki\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:2:\"10\";s:12:\"tanggallahir\";s:10:\"2016-05-17\";s:12:\"pddkterakhir\";s:8:\"STRATA 1\";s:16:\"statuspernikahan\";s:5:\"belum\";s:13:\"jmltanggungan\";s:1:\"0\";s:10:\"ibukandung\";s:5:\"Indah\";s:4:\"nokk\";s:11:\"09778868623\";s:12:\"emailpribadi\";s:25:\"wirawan,sentosa@yahoo.com\";s:4:\"nohp\";s:12:\"081315101121\";s:6:\"notelp\";s:11:\"021-7209510\";}idnasabah|s:2:\"77\";'),
('3ce3e7a8be18a332bd77c58b32eef5516928bbde','::1',1465654346,'__ci_last_regenerate|i:1465654344;'),
('3df6ae2d5a8120185a3ce6336802f513a330a5ef','::1',1466637833,'__ci_last_regenerate|i:1466637833;kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2016061400\";jmlpenumpang|s:1:\"3\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";'),
('3e9fc640024d129fe66f30c8a23aafba670a785f','::1',1465795279,'__ci_last_regenerate|i:1465795266;'),
('42c25996a7446968eec5043fcddadbfedc0af233','::1',1464256619,'__ci_last_regenerate|i:1464256619;'),
('448d281f0c3de642385027743561c2a6a209219d','::1',1465365143,'__ci_last_regenerate|i:1465364983;'),
('464aacf1768ce6116c6ba99d05914a976e7d27f3','::1',1465954979,'__ci_last_regenerate|i:1465954840;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:6:\"Ridwan\";s:12:\"namabelakang\";s:5:\"Kamil\";s:8:\"jkelamin\";s:9:\"Laki-laki\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:2:\"10\";s:12:\"tanggallahir\";s:10:\"2016-05-17\";s:12:\"pddkterakhir\";s:8:\"STRATA 2\";s:16:\"statuspernikahan\";s:7:\"menikah\";s:13:\"jmltanggungan\";s:1:\"2\";s:10:\"ibukandung\";s:4:\"Siti\";s:4:\"nokk\";s:13:\"0965865865681\";s:12:\"emailpribadi\";s:22:\"ridwan.kamil@yahoo.com\";s:4:\"nohp\";s:11:\"08144454545\";s:6:\"notelp\";s:13:\"021-654765756\";}idnasabah|s:2:\"82\";'),
('4cfb6105d3366893759f9126e03701db06481144','::1',1468024796,'__ci_last_regenerate|i:1468024796;'),
('4f7e655b61e9f0d1c6043aac0477744fa5d95b8f','::1',1466819456,'__ci_last_regenerate|i:1466819429;jmlpenumpang|s:0:\"\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";'),
('50f45f8de579f85d54c31aecce74586d21c2273f','::1',1464094652,'__ci_last_regenerate|i:1464094433;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('52ab6575105e32a40e164e0a840f8f7c8e5421d0','::1',1464009068,'__ci_last_regenerate|i:1464009068;username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('544b38a70fe6a9d0ecebc81d60dd2aeac08c1b13','::1',1465882923,'__ci_last_regenerate|i:1465882807;'),
('558f99a62568f55a550be0592192f7c32238f3d9','::1',1466753087,'__ci_last_regenerate|i:1466753001;jmlpenumpang|s:1:\"3\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";'),
('5b8983c79f478c39de350ea4cdb8ba0a65060428','::1',1463369652,'__ci_last_regenerate|i:1463369561;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"level\";logged_in|b:1;'),
('5cef4f9754c328987150d0bdbdc4f8c4e7ee2768','::1',1464009542,'__ci_last_regenerate|i:1464009415;username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('5d13ebbe6e398b66ece109ee80a99adaf10d26eb','::1',1466501296,'__ci_last_regenerate|i:1466501296;kotaberangkat|s:10:\"MAJALENGKA\";'),
('5f2312ec488834022c23ef2183efce2994eecbdf','::1',1465604183,'__ci_last_regenerate|i:1465603966;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:6:\"Dadang\";s:12:\"namabelakang\";s:8:\"Suhendra\";s:8:\"jkelamin\";s:9:\"Laki-laki\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:2:\"10\";s:12:\"tanggallahir\";s:10:\"2016-05-17\";s:12:\"pddkterakhir\";s:7:\"DIPLOMA\";s:16:\"statuspernikahan\";s:7:\"menikah\";s:13:\"jmltanggungan\";s:1:\"2\";s:10:\"ibukandung\";s:5:\"Indah\";s:4:\"nokk\";s:11:\"09778868623\";s:12:\"emailpribadi\";s:25:\"dadang.suhendra@yahoo.com\";s:4:\"nohp\";s:12:\"081315101121\";s:6:\"notelp\";s:11:\"021-7209510\";}idnasabah|s:2:\"78\";'),
('619e492852cee3a2714796156e65bb93647c4b92','::1',1464093955,'__ci_last_regenerate|i:1464093954;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('692c15c7e708b1397a5ff7e5d36633c465e111a2','::1',1466177924,'__ci_last_regenerate|i:1466177924;'),
('6fc97bc78e5bc3297f0445145f422d0bbc88e25c','::1',1466925326,'__ci_last_regenerate|i:1466925319;jmlpenumpang|s:0:\"\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";'),
('71b2a153f1fd88bf64061adc7a48a8263b3ec756','::1',1464168901,'__ci_last_regenerate|i:1464168830;'),
('728234e915bec65629c69aa0d910be77bc814ffd','::1',1465862196,'__ci_last_regenerate|i:1465862196;'),
('73d11ad398be3b15906f9878318f3c1299af2ad8','::1',1464217399,'__ci_last_regenerate|i:1464217394;'),
('7550fc80b73673d7fbd3e16627b150cbdd480c16','::1',1466035548,'__ci_last_regenerate|i:1466035548;'),
('75aa7eee7ff11e7e616537c20d31cbb10927d60e','::1',1464404421,'__ci_last_regenerate|i:1464404210;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('78e2e21a594acc518cbbbb0c6375492b7d3b10d2','::1',1464522793,'__ci_last_regenerate|i:1464522788;'),
('7b1ed405f58bf53854cc4f4e6fe24069c95e984d','::1',1464507934,'__ci_last_regenerate|i:1464507669;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('7b2c1100024c748eb08514f36d0fd2b6426410dc','::1',1466017279,'__ci_last_regenerate|i:1466017096;username|s:5:\"Santi\";password|s:6:\"wandah\";level|s:7:\"penilai\";akses_status|s:6:\"active\";logged_in|b:1;'),
('7bdf1e279e54749634ca85c121ff8252498b5203','::1',1465255174,'__ci_last_regenerate|i:1465254896;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:5:\"Wanda\";s:12:\"namabelakang\";s:7:\"Hamidah\";s:8:\"jkelamin\";s:9:\"Perempuan\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:15:\"Jakarta Selatan\";s:12:\"tanggallahir\";s:10:\"2016-05-17\";s:12:\"pddkterakhir\";s:8:\"STRATA 1\";s:16:\"statuspernikahan\";s:5:\"janda\";s:13:\"jmltanggungan\";s:1:\"3\";s:10:\"ibukandung\";s:5:\"Indah\";s:4:\"nokk\";s:11:\"09778868623\";s:12:\"emailpribadi\";s:18:\"t.sutoni@yahoo.com\";s:4:\"nohp\";s:12:\"081315101121\";s:6:\"notelp\";s:11:\"021-7209510\";}idnasabah|s:2:\"66\";'),
('7d7be69c0f98d67a981d252b79d2282caa7dda82','::1',1466043018,'__ci_last_regenerate|i:1466042839;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:6:\"Basuki\";s:12:\"namabelakang\";s:6:\"Rahmat\";s:8:\"jkelamin\";s:9:\"Laki-laki\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:2:\"10\";s:12:\"tanggallahir\";s:10:\"2016-06-15\";s:12:\"pddkterakhir\";s:8:\"STRATA 1\";s:16:\"statuspernikahan\";s:7:\"menikah\";s:13:\"jmltanggungan\";s:1:\"2\";s:10:\"ibukandung\";s:4:\"Dewi\";s:4:\"nokk\";s:13:\"8766554442332\";s:12:\"emailpribadi\";s:23:\"basuki.rahmat@yahoo.com\";s:4:\"nohp\";s:13:\"0832432432423\";s:6:\"notelp\";s:13:\"021-432432432\";}idnasabah|s:2:\"83\";'),
('7f509d8ddaf8b0dbd4ea12bba0f2611fb6a3fe98','::1',1465986452,'__ci_last_regenerate|i:1465986452;email|s:22:\"ridwan.kamil@yahoo.com\";tgllahir|s:10:\"2016-05-17\";noreg|s:0:\"\";'),
('805af88dd2e76141c9a14cfbed63b5c568f00b68','::1',1463893989,'__ci_last_regenerate|i:1463893935;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('865e088ed1fd5c5a5de7558990e5895151a33de8','::1',1466638573,'__ci_last_regenerate|i:1466638573;kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2016061400\";jmlpenumpang|s:0:\"\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";'),
('866cdff889d163306e611d18a9cb5b6cb7454279','::1',1466081654,'__ci_last_regenerate|i:1466081543;username|s:6:\"wandah\";password|s:6:\"wandah\";level|s:7:\"manager\";akses_status|s:6:\"active\";logged_in|b:1;idnasabah|s:2:\"83\";statusreg|s:8:\"Rejected\";'),
('871638082c2e2c53072280f372bf39ceb11f789f','::1',1464593988,'__ci_last_regenerate|i:1464593852;username|s:4:\"sari\";password|s:6:\"wandah\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('87e589a1e343b53d778903faaa76e69cc2ca9373','::1',1466573077,'__ci_last_regenerate|i:1466573077;bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2016061400\";'),
('8adc97867a4a606d052ffd918268286976d5a19f','::1',1463334289,'__ci_last_regenerate|i:1463334288;'),
('9463622838245b381c3956f640f1ba53c436efde','::1',1466713816,'__ci_last_regenerate|i:1466713560;kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2016061400\";jmlpenumpang|s:0:\"\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kodebooking|s:11:\"JKT20160002\";kdbooking|N;username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:0:\"\";logged_in|b:1;login|s:26:\"Selamat Datang &nbsptoni !\";__ci_vars|a:1:{s:5:\"login\";s:3:\"old\";}'),
('965df536be9b9facc173bee1f5d7d1a34156f2a8','::1',1465377786,'__ci_last_regenerate|i:1465377718;'),
('98f03b25029aecdc12420d70d47976147618d4ec','::1',1465947813,'__ci_last_regenerate|i:1465947808;username|s:4:\"sari\";password|s:6:\"wandah\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;idnasabah|N;'),
('999121e8fc49f014e337e3e360e587ba76dc65fc','::1',1463367160,'__ci_last_regenerate|i:1463367159;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"level\";logged_in|b:1;'),
('9d360a853a2df84545aa43e69fc21441fd20d293','::1',1465973946,'__ci_last_regenerate|i:1465973792;email|s:22:\"ridwan.kamil@yahoo.com\";tgllahir|s:10:\"2016-05-17\";noreg|s:0:\"\";'),
('9d5f8729d83eef2fe0a62e2e614d667fb1ba7629','::1',1466681625,'__ci_last_regenerate|i:1466681597;jmlpenumpang|s:0:\"\";bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2016061400\";'),
('a01a611b39d10c2d7bae7c80b623a2d75678dcdf','::1',1465388474,'__ci_last_regenerate|i:1465388446;'),
('a44ec8868783fa555a5b4dc333d85e71ef3f7d9e','::1',1469036311,'__ci_last_regenerate|i:1469036308;'),
('a53959d2c2af86bbed401b4c6bd502dcdaee1529','::1',1464271478,'__ci_last_regenerate|i:1464271279;'),
('a5af988ad0031f779595f3edbedaf20daf10f7ee','::1',1465150514,'__ci_last_regenerate|i:1465150432;'),
('a5ec0bc3efb9de620b5300316b0febc786942003','::1',1466017011,'__ci_last_regenerate|i:1466016798;email|s:22:\"ridwan.kamil@yahoo.com\";tgllahir|s:10:\"2016-05-17\";noreg|s:0:\"\";'),
('a9ebcf3866b5a6ae70f0b5b362d00fe0b72508a9','::1',1463747633,'__ci_last_regenerate|i:1463747569;'),
('aa785b04c890a32b9ff86a349627f456022d3e16','::1',1465797696,'__ci_last_regenerate|i:1465797605;username|s:4:\"toni\";password|s:4:\"sari\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('b02de9fb0a06d83779fa80e4648ea43c57242de3','::1',1466674085,'__ci_last_regenerate|i:1466674085;'),
('b0d97c079cc44df4d9fb24eebc58ba3f2086b154','::1',1465832161,'__ci_last_regenerate|i:1465832160;username|s:4:\"toni\";password|s:4:\"sari\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('b5f6043231158412ceca8e4a8c9f3330367ff209','::1',1465520827,'__ci_last_regenerate|i:1465520742;'),
('ba079263bab7996d1c2bfa3ac307485a6a2215ea','::1',1464182024,'__ci_last_regenerate|i:1464181921;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;'),
('ba8383d3120d012215d1cd4074b15f22f3c0b9d7','::1',1465533181,'__ci_last_regenerate|i:1465532934;'),
('c0adde698371106a5a40cd53680eff0d5b183717','::1',1466326240,'__ci_last_regenerate|i:1466326240;'),
('cc29c647a1443b9db00562beaf95145d22921f4e','::1',1464062678,'__ci_last_regenerate|i:1464062659;username|s:6:\"wandah\";password|s:6:\"123456\";level|s:7:\"manager\";akses_status|s:6:\"active\";logged_in|b:1;login|s:28:\"Selamat Datang &nbspwandah !\";__ci_vars|a:1:{s:5:\"login\";s:3:\"old\";}'),
('ccda14cf457fa29f521c6ffced41ef68171a4a4f','::1',1466552244,'__ci_last_regenerate|i:1466552199;kotaberangkat|s:10:\"MAJALENGKA\";bdari|s:0:\"\";btujuan|s:0:\"\";kotatujuan|s:7:\"JAKARTA\";idjadwal|s:10:\"2016061401\";'),
('cdbdb21888c0328e15cdf953947d779ff1d97ea4','::1',1464061612,'__ci_last_regenerate|i:1464061612;username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('d00fcebbcd6240002614f5d12a2cfe4488e438d3','::1',1465655898,'__ci_last_regenerate|i:1465655897;'),
('d29855b199e0ca38b0cf02f1f60f8af577098f2c','::1',1463601012,'__ci_last_regenerate|i:1463601012;'),
('d41eb8cf320c99888288c8e0f8c7cf79abc7aca9','::1',1465860743,'__ci_last_regenerate|i:1465860743;'),
('d4211432ac0773c9f59aa562516eb84c7014d079','::1',1465499283,'__ci_last_regenerate|i:1465499204;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:5:\"Andri\";s:12:\"namabelakang\";s:8:\"Prasetyo\";s:8:\"jkelamin\";s:9:\"Laki-laki\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:2:\"11\";s:12:\"tanggallahir\";s:10:\"2016-05-17\";s:12:\"pddkterakhir\";s:7:\"DIPLOMA\";s:16:\"statuspernikahan\";s:7:\"menikah\";s:13:\"jmltanggungan\";s:1:\"2\";s:10:\"ibukandung\";s:5:\"Indah\";s:4:\"nokk\";s:11:\"09778868623\";s:12:\"emailpribadi\";s:15:\"andri@yahoo.com\";s:4:\"nohp\";s:12:\"081315101121\";s:6:\"notelp\";s:11:\"021-7209510\";}idnasabah|s:2:\"74\";'),
('dc8ff83fb426600249668c232846ef69fd64c60d','::1',1465197044,'__ci_last_regenerate|i:1465197019;ss_idnasabah|N;'),
('dcbac4f37312850aaa92c22ca009a619991e7b7f','::1',1464874318,'__ci_last_regenerate|i:1464874185;username|s:4:\"sari\";password|s:6:\"wandah\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;login|s:26:\"Selamat Datang &nbspsari !\";__ci_vars|a:1:{s:5:\"login\";s:3:\"old\";}'),
('e47bac287fdf23535c88cb5dbe87d73f7c6277e9','::1',1463687720,'__ci_last_regenerate|i:1463687720;'),
('e547b46c7ebde25308592f16e3b03fb2e3b0e1b9','::1',1464061062,'__ci_last_regenerate|i:1464061062;username|s:4:\"toni\";password|s:6:\"wandah\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('ec2b4269c84d99eb7886b49fce78023538fcc9e0','::1',1463931841,'__ci_last_regenerate|i:1463931838;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('edcf58fe5dc345b76bbab1ac498ad221e8d412af','::1',1463790032,'__ci_last_regenerate|i:1463789993;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"level\";logged_in|b:1;'),
('efdc9e6dfe2dced6a6ef011b40fce59921311bc3','::1',1465241267,'__ci_last_regenerate|i:1465241029;ss_idnasabah|N;$datastep1|a:17:{s:9:\"idnasabah\";N;s:9:\"namadepan\";s:5:\"Wanda\";s:12:\"namabelakang\";s:7:\"Hamidah\";s:8:\"jkelamin\";s:9:\"Perempuan\";s:5:\"agama\";s:5:\"Islam\";s:11:\"warganegara\";s:3:\"WNI\";s:13:\"provinsilahir\";s:2:\"20\";s:9:\"kotalahir\";s:15:\"Jakarta Selatan\";s:12:\"tanggallahir\";s:10:\"2016-05-17\";s:12:\"pddkterakhir\";s:8:\"STRATA 1\";s:16:\"statuspernikahan\";s:7:\"menikah\";s:13:\"jmltanggungan\";s:1:\"2\";s:10:\"ibukandung\";s:5:\"Indah\";s:4:\"nokk\";s:11:\"09778868623\";s:12:\"emailpribadi\";s:18:\"t.sutoni@yahoo.com\";s:4:\"nohp\";s:12:\"081315101121\";s:6:\"notelp\";s:11:\"021-7209510\";}idnasabah|s:2:\"56\";'),
('f4f51056698a7c7044a4f094fd4815935b6e7e3a','::1',1463933106,'__ci_last_regenerate|i:1463933053;username|s:4:\"toni\";password|s:5:\"admin\";level|s:5:\"admin\";akses_status|s:6:\"active\";logged_in|b:1;'),
('f69c6de81f98001cbb70b65daad21b967b454ce5','::1',1466608911,'__ci_last_regenerate|i:1466608724;bdari|s:7:\"JAKARTA\";btujuan|s:10:\"MAJALENGKA\";kotaberangkat|s:7:\"JAKARTA\";kotatujuan|s:10:\"MAJALENGKA\";idjadwal|s:10:\"2016061400\";jmlpenumpang|s:1:\"3\";'),
('f79637d10ca3e7c6525bab3633e9b5b506f5b363','::1',1465832753,'__ci_last_regenerate|i:1465832698;username|s:4:\"sari\";password|s:4:\"sari\";level|s:10:\"verifikasi\";akses_status|s:6:\"active\";logged_in|b:1;');

/*Table structure for table `t_jadwal` */

DROP TABLE IF EXISTS `t_jadwal`;

CREATE TABLE `t_jadwal` (
  `idjadwal` varchar(10) DEFAULT NULL,
  `tglberangkat` date DEFAULT NULL,
  `waktuberangkat` time DEFAULT NULL,
  `kdpool` int(2) DEFAULT NULL,
  `bdari` varchar(35) DEFAULT NULL,
  `btujuan` varchar(40) DEFAULT NULL,
  `harga` int(9) DEFAULT NULL,
  `nopolisi` varchar(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `logupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_jadwal` */

insert  into `t_jadwal`(`idjadwal`,`tglberangkat`,`waktuberangkat`,`kdpool`,`bdari`,`btujuan`,`harga`,`nopolisi`,`keterangan`,`logupdate`) values 
('2001606140','2016-07-08','15:00:00',1,'JAKARTA','MAJALENGKA',150000,'B7456WJA','-','2016-06-17 06:23:59'),
('2016061400','2016-07-02','09:00:00',1,'JAKARTA','MAJALENGKA',150000,'B8887NWS','-','2016-06-17 06:23:59'),
('2016061401','2016-07-08','13:00:00',2,'MAJALENGKA','JAKARTA',155000,'B9001WAJ','-','2016-06-17 06:23:59');

/*Table structure for table `t_kecamatan` */

DROP TABLE IF EXISTS `t_kecamatan`;

CREATE TABLE `t_kecamatan` (
  `kdkecamatan` int(2) NOT NULL,
  `namakecamatan` varchar(20) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kdkecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_kecamatan` */

insert  into `t_kecamatan`(`kdkecamatan`,`namakecamatan`,`kota`) values 
(1,'ARGAPURA','MAJALENGKA'),
(2,'BANJARAN','MAJALENGKA'),
(3,'BANTARUJEG','MAJALENGKA'),
(4,'CIGASONG','MAJALENGKA'),
(5,'CIKIJING','MAJALENGKA'),
(6,'KEBAYORAN BARU','JAKARTA'),
(7,'KEBAYORAN LAMA','JAKARTA'),
(8,'TEBET','JAKARTA');

/*Table structure for table `t_kelurahan` */

DROP TABLE IF EXISTS `t_kelurahan`;

CREATE TABLE `t_kelurahan` (
  `kdkelurahan` int(3) NOT NULL,
  `kdkecamatan` int(2) DEFAULT NULL,
  `namakelurahan` varchar(52) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kdkelurahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_kelurahan` */

insert  into `t_kelurahan`(`kdkelurahan`,`kdkecamatan`,`namakelurahan`,`keterangan`) values 
(1,1,'Argalingga','-'),
(2,1,'Argamukti','-'),
(3,1,'Cibunut','-'),
(4,1,'Cikaracak','-'),
(5,1,'Gunungwangi','-');

/*Table structure for table `t_kendaraan` */

DROP TABLE IF EXISTS `t_kendaraan`;

CREATE TABLE `t_kendaraan` (
  `nopolisi` varchar(10) DEFAULT NULL,
  `namakendaraan` varchar(25) DEFAULT NULL,
  `kapasitas` int(3) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_kendaraan` */

insert  into `t_kendaraan`(`nopolisi`,`namakendaraan`,`kapasitas`,`keterangan`) values 
('B7456WJA','TRANS1',12,'-'),
('B8887NWS','TRANS2',12,'-');

/*Table structure for table `t_konfirmasibayar` */

DROP TABLE IF EXISTS `t_konfirmasibayar`;

CREATE TABLE `t_konfirmasibayar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kdpesanan` varchar(11) DEFAULT NULL,
  `namabank` varchar(25) DEFAULT NULL,
  `nomerrekening` varchar(15) DEFAULT NULL,
  `atasnama` varchar(25) DEFAULT NULL,
  `tglkonfirmasi` date DEFAULT NULL,
  `statuskonfirmasi` enum('konfirm','tidakterima','Lunas') DEFAULT NULL,
  `logupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_konfirmasibayar` */

insert  into `t_konfirmasibayar`(`id`,`kdpesanan`,`namabank`,`nomerrekening`,`atasnama`,`tglkonfirmasi`,`statuskonfirmasi`,`logupdate`) values 
(1,'JKT20160002','BCA','71700943434','Badrudin','2016-06-23','Lunas','2016-06-23 09:06:23'),
(2,NULL,NULL,NULL,NULL,'2016-06-23','konfirm','2016-06-23 10:06:35'),
(3,'JKT20160003','BCA','71700943434','Tio','2016-06-26','konfirm','2016-06-26 01:06:28'),
(4,'JKT20160004','BCA','8457458587','Iwan','2016-07-20','konfirm','2016-07-20 04:07:32');

/*Table structure for table `t_pemesanan` */

DROP TABLE IF EXISTS `t_pemesanan`;

CREATE TABLE `t_pemesanan` (
  `kdpesanan` varchar(11) NOT NULL,
  `kdjadwal` varchar(10) DEFAULT NULL,
  `kdmember` varchar(30) DEFAULT NULL,
  `jmlpenumpang` int(6) DEFAULT NULL,
  `kotajemput` varchar(30) DEFAULT NULL,
  `kelurahanjemput` varchar(40) DEFAULT NULL,
  `alamatjemput` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `kotatujuan` varchar(30) DEFAULT NULL,
  `kelurahantujuan` varchar(39) DEFAULT NULL,
  `alamattujuan` varchar(100) DEFAULT NULL,
  `tiketsatuan` int(8) DEFAULT NULL,
  `totaltiket` int(10) DEFAULT NULL,
  `statuspesanan` enum('submit','konfirm','retur','cancel','Lunas') DEFAULT NULL,
  PRIMARY KEY (`kdpesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_pemesanan` */

insert  into `t_pemesanan`(`kdpesanan`,`kdjadwal`,`kdmember`,`jmlpenumpang`,`kotajemput`,`kelurahanjemput`,`alamatjemput`,`nohp`,`kotatujuan`,`kelurahantujuan`,`alamattujuan`,`tiketsatuan`,`totaltiket`,`statuspesanan`) values 
('JKT20160001','2001606140','Slamet',3,'6','','Jl. H. jIAN','0814-453543543','8','','Jl. Kerjabakti No.5',150000,450000,'submit'),
('JKT20160002','2016061400','Badrudin Haiti',2,'6','','Warung Buncit 5','0817-12345678','8','','bELIMBING nO.10',150000,300000,'retur'),
('JKT20160003','2001606140','Tio',3,'6','','gfdgdf','Tito','8','','asdafsdaf',150000,450000,'konfirm'),
('JKT20160004','2001606140','Badrudin Haiti',3,'6','','Jl Kramat Cipulir','0814-453543543','7','','Jl. Turangga Majalengka',150000,450000,'konfirm'),
('JKT20160005','2001606140','Indra',2,'6','','Jl, Cipulir Utama No,19 rw.08 Blok F1','0984-3434988','8','','Ds Rengas Majalengka ',150000,300000,'submit');

/*Table structure for table `t_pool` */

DROP TABLE IF EXISTS `t_pool`;

CREATE TABLE `t_pool` (
  `kdpool` int(2) NOT NULL AUTO_INCREMENT,
  `namapool` varchar(20) DEFAULT NULL,
  `kota` varchar(35) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kdpool`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_pool` */

insert  into `t_pool`(`kdpool`,`namapool`,`kota`,`alamat`,`notelp`,`nohp`,`email`) values 
(1,'CILEDUG','JAKARTA SELATAN','Jl. Lengkong Ciledug Indah No.10','021-45454554','0813-4566545','ciledug01@yahoo.com'),
(2,'CIRASA','MAJALENGKA','Jl. Curug Luhur No.4 Majalengka','032-43434344','0832-4324324','majalengka02@yahoo.com');

/*Table structure for table `t_retur` */

DROP TABLE IF EXISTS `t_retur`;

CREATE TABLE `t_retur` (
  `kdretur` varchar(4) NOT NULL,
  `kdtiket` varchar(10) DEFAULT NULL,
  `nilairetur` int(9) DEFAULT NULL,
  `tglretur` datetime DEFAULT NULL,
  `alasanretur` varchar(100) DEFAULT NULL,
  `statusretur` enum('passdue','approve') DEFAULT NULL,
  `logupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`kdretur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_retur` */

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `userid` varchar(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` enum('pelanggan','petugas','manager','admin') DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

insert  into `t_user`(`userid`,`username`,`password`,`level`) values 
('1','tito','21232f297a57a5a743894a0e4','admin');

/*Table structure for table `v_sisakursi` */

DROP TABLE IF EXISTS `v_sisakursi`;

/*!50001 DROP VIEW IF EXISTS `v_sisakursi` */;
/*!50001 DROP TABLE IF EXISTS `v_sisakursi` */;

/*!50001 CREATE TABLE  `v_sisakursi`(
 `idjadwal` varchar(10) ,
 `kapasitas` int(3) ,
 `jmlkonfirm` decimal(32,0) ,
 `jmllunas` decimal(32,0) ,
 `jmlsubmit` decimal(32,0) ,
 `jmlcancel` decimal(32,0) ,
 `jmlretur` decimal(32,0) ,
 `sisakursi` decimal(33,0) 
)*/;

/*View structure for view v_sisakursi */

/*!50001 DROP TABLE IF EXISTS `v_sisakursi` */;
/*!50001 DROP VIEW IF EXISTS `v_sisakursi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sisakursi` AS (select `b`.`idjadwal` AS `idjadwal`,`c`.`kapasitas` AS `kapasitas`,(select sum(`a`.`jmlpenumpang`) from `t_pemesanan` `a` where ((`a`.`kdjadwal` = `b`.`idjadwal`) and (`a`.`statuspesanan` = 'konfirm'))) AS `jmlkonfirm`,(select sum(`a`.`jmlpenumpang`) from `t_pemesanan` `a` where ((`a`.`kdjadwal` = `b`.`idjadwal`) and (`a`.`statuspesanan` = 'lunas'))) AS `jmllunas`,(select sum(`a`.`jmlpenumpang`) from `t_pemesanan` `a` where ((`a`.`kdjadwal` = `b`.`idjadwal`) and (`a`.`statuspesanan` = 'submit'))) AS `jmlsubmit`,(select sum(`a`.`jmlpenumpang`) from `t_pemesanan` `a` where ((`a`.`kdjadwal` = `b`.`idjadwal`) and (`a`.`statuspesanan` = 'cancel'))) AS `jmlcancel`,(select sum(`a`.`jmlpenumpang`) from `t_pemesanan` `a` where ((`a`.`kdjadwal` = `b`.`idjadwal`) and (`a`.`statuspesanan` = 'retur'))) AS `jmlretur`,(`c`.`kapasitas` - (select sum(`a`.`jmlpenumpang`) from `t_pemesanan` `a` where ((`a`.`kdjadwal` = `b`.`idjadwal`) and ((`a`.`statuspesanan` = 'konfirm') or (`a`.`statuspesanan` = 'lunas') or (`a`.`statuspesanan` = 'submit'))))) AS `sisakursi` from ((`t_jadwal` `b` left join `t_pemesanan` `a` on((`a`.`kdjadwal` = `b`.`idjadwal`))) left join `t_kendaraan` `c` on((`b`.`nopolisi` = `c`.`nopolisi`))) group by `b`.`idjadwal`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
