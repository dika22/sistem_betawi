/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.55-0ubuntu0.14.04.1 : Database - db_informasi_betawi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_informasi_betawi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_informasi_betawi`;

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `credit` varchar(200) NOT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `base_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `g_created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=3462 DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

LOCK TABLES `gallery` WRITE;

insert  into `gallery`(`id`,`title`,`credit`,`caption`,`image`,`extension`,`base_name`,`created_at`,`modified_at`,`created_by`,`modified_by`) values (3411,'Makan khas betawi','betawi','betawi','ongol-ongol-recipe4200.jpg','jpg','ongol-ongol-recipe','2017-06-26 11:38:04','2017-06-26 11:38:04',1,1),(3412,'Makan khas betawi','betawi','betawi','roti-buaya3916.jpg','jpg','roti buaya','2017-06-26 11:38:29','2017-06-26 11:38:29',1,1),(3413,'Makan khas betawi','betawi','betawi','asinan-betawi74.jpg','jpg','asinan betawi','2017-06-26 11:38:53','2017-06-26 11:38:53',1,1),(3414,'Makan khas betawi','betawi','betawi','nasi-kebuli3403.jpg','jpg','nasi kebuli','2017-06-26 12:19:28','2017-06-26 12:19:28',1,1),(3415,'Makan khas betawi','betawi','betawi','soto-tangkar2335.jpg','jpg','soto tangkar','2017-06-26 12:20:03','2017-06-26 12:20:03',1,1),(3416,'Makan khas betawi','betawi','betawi','soto-betawi1561.jpg','jpg','soto betawi','2017-06-26 12:20:20','2017-06-26 12:20:20',1,1),(3417,'Makan khas betawi','betawi','betawi','laksa2658.jpg','jpg','laksa','2017-06-26 18:21:16','2017-06-26 18:21:16',1,1),(3418,'Makan khas betawi','makanan khas betawi','makanan khas betawi','semur-jengkol3574.jpg','jpg','semur jengkol','2017-06-26 18:29:53','2017-06-26 18:29:53',1,1),(3419,'makanan khas betawi','makanan khas betawi','makanan khas betawi','ketoprak3470.jpg','jpg','ketoprak','2017-06-26 18:30:12','2017-06-26 18:30:12',1,1),(3420,'makanan khas betawi','makanan khas betawi','makanan khas betawi','gado-gado129.jpg','jpg','gado gado','2017-06-26 18:30:29','2017-06-26 18:30:29',1,1),(3421,'makanan khas betawi','makanan khas betawi','makanan khas betawi','ketupat-sayur4550.jpg','jpg','ketupat sayur','2017-06-26 18:31:24','2017-06-26 18:31:24',1,1),(3422,'makanan khas betawi','makanan khas betawi','makanan khas betawi','nasi-ulam383.jpg','jpg','nasi ulam','2017-06-26 18:31:41','2017-06-26 18:31:41',1,1),(3423,'makanan khas betawi','makanan khas betawi','makanan khas betawi','nasi-ulam3487.jpg','jpg','nasi ulam','2017-06-26 18:31:54','2017-06-26 18:31:54',1,1),(3424,'makanan khas betawi','makanan khas betawi','makanan khas betawi','nasi-uduk148.jpg','jpg','nasi uduk','2017-06-26 18:32:09','2017-06-26 18:32:09',1,1),(3425,'makanan khas betawi','makanan khas betawi','makanan khas betawi','4-1-gambar-makanan-khas-betawi-kerak-telor-image-courtesy-of-wikipedia-300x2253633.jpg','jpg','4.1.-Gambar-Makanan-Khas-Betawi-Kerak-Telor-Image-courtesy-of-Wikipedia-300x225','2017-06-26 18:32:24','2017-06-26 18:32:24',1,1),(3426,'musik dari betawi','musik dari betawi','musik dari betawi','sampyong468.jpg','jpg','sampyong','2017-06-26 18:33:52','2017-06-26 18:33:52',1,1),(3427,'musik dari betawi','musik dari betawi','musik dari betawi','orkes-gambus3789.jpg','jpg','orkes gambus','2017-06-26 18:34:12','2017-06-26 18:34:12',1,1),(3428,'musik dari betawi','musik dari betawi','musik dari betawi','rebana1509.jpg','jpg','rebana','2017-06-26 18:34:34','2017-06-26 18:34:34',1,1),(3429,'Tarian Dari Betawi','Tarian Dari Betawi','Tarian Dari Betawi','tari-cokek4548.jpg','jpg','tari-cokek','2017-06-26 18:37:56','2017-06-26 18:37:56',1,1),(3430,'Tarian Dari Betawi','Tarian Dari Betawi','Tarian Dari Betawi','tari-blenggo2142.jpg','jpg','Tari_blenggo','2017-06-26 18:38:20','2017-06-26 18:38:20',1,1),(3431,'Tarian Dari Betawi','Tarian Dari Betawi','Tarian Dari Betawi','nandak-ganjen1027.jpg','jpg','nandak ganjen','2017-06-27 10:45:11','2017-06-27 10:45:11',1,1),(3432,'Tarian Dari Betawi','Tarian Dari Betawi','','9-img-6974-tari-ronggeng-blantek-biasa-ditarikan-oleh-4-6-perempuan1933.jpg','jpg','9__IMG_6974_Tari_Ronggeng_Blantek_biasa_ditarikan_oleh_4-6_perempuan','2017-06-27 10:48:38','2017-06-27 10:48:38',1,1),(3433,'Tarian Dari Betawi','Tarian Dari Betawi','','roby08darisandi-samrahbetawi2581.jpg','jpg','roby08darisandi_samrahbetawi','2017-06-27 10:51:53','2017-06-27 10:51:53',1,1),(3434,'Tarian Dari Betawi','Tarian Dari Betawi','','zapin3295.jpg','jpg','Zapin','2017-06-27 10:53:24','2017-06-27 10:53:24',1,1),(3435,'Tarian Dari Betawi','Tarian Dari Betawi','Tarian Dari Betawi','tari-topeng-betawi1072.jpg','jpg','tari_topeng_betawi','2017-06-27 10:54:02','2017-06-27 10:54:02',1,1),(3436,'Tarian Dari Betawi','Tarian Dari Betawi','Tarian Dari Betawi','belanda-kagumi-aksi-pencak-silat-dan-angklung-indonesian-day-2015-660x3302915.jpg','jpg','Belanda-Kagumi-Aksi-Pencak-Silat-dan-Angklung-Indonesian-Day-2015-660x330','2017-06-27 10:54:45','2017-06-27 10:55:01',1,1),(3437,'musik dari betawi orkes samrah','musik dari betawi','musik dari betawi','orkes-samrah2933.jpg','jpg','orkes samrah','2017-06-27 10:56:47','2017-06-27 10:56:47',1,1),(3438,'musik dari betawi tanjidor','musik dari betawi','musik dari betawi','tanjidor1707.jpg','jpg','tanjidor','2017-06-27 10:57:22','2017-06-27 10:57:22',1,1),(3439,'musik dari betawi keroncong tugu','musik dari betawi','musik dari betawi','keroncong-tugu3906.jpg','jpg','keroncong tugu','2017-06-27 10:58:24','2017-06-27 10:58:24',1,1),(3440,'musik dari betawi gamelan topeng','musik dari betawi','musik dari betawi','gamelan-topeng3816.jpg','jpg','gamelan topeng','2017-06-27 10:58:58','2017-06-27 10:58:58',1,1),(3441,'musik dari betawi ajeng','musik dari betawi','musik dari betawi','gamelan-ajeng3424.jpg','jpg','gamelan ajeng','2017-06-27 10:59:24','2017-06-27 10:59:24',1,1),(3442,'musik dari betawi rancag','musik dari betawi','musik dari betawi','gambang-rancag2403.jpg','jpg','gambang rancag','2017-06-27 10:59:50','2017-06-27 10:59:50',1,1),(3443,'musik dari betawi kromong','musik dari betawi','musik dari betawi','gambang-kromong33194.jpg','jpg','Gambang kromong3','2017-06-27 11:00:13','2017-06-27 11:00:13',1,1),(3444,'theater dari betawi','theater dari betawi','theater dari betawi','wayang-wong452.jpg','jpg','wayang wong','2017-06-27 11:48:30','2017-06-27 11:48:30',1,1),(3445,'theater dari betawi','theater dari betawi','theater dari betawi','wayang-si-ronda3293.jpg','jpg','wayang si ronda','2017-06-27 11:48:45','2017-06-27 11:48:45',1,1),(3446,'theater dari betawi','theater dari betawi','theater dari betawi','10ubrug2147.jpg','jpg','10Ubrug','2017-06-27 11:48:59','2017-06-27 11:48:59',1,1),(3447,'theater dari betawi','theater dari betawi','theater dari betawi','tonil-samrah4301.jpg','jpg','tonil samrah','2017-06-27 11:49:11','2017-06-27 11:49:25',1,1),(3448,'theater dari betawi','theater dari betawi','theater dari betawi','blantek2987.jpg','jpg','blantek','2017-06-27 11:49:42','2017-06-27 11:49:42',1,1),(3449,'Tokoh dari Betawi benyamin','Tokoh dari Betawi','Tokoh dari Betawi','benyamin222.jpg','jpg','benyamin','2017-06-27 12:48:26','2017-06-27 12:48:26',1,1),(3450,'Tokoh dari Betawi ','Tokoh dari Betawi','Tokoh dari Betawi','ismail-marzuki3884.jpg','jpg','ismail marzuki','2017-06-27 12:48:48','2017-06-27 12:48:48',1,1),(3451,'Tokoh dari Betawi Mat Solar','Tokoh dari Betawi','Tokoh dari Betawi','mat-solar3600.jpg','jpg','Mat_Solar','2017-06-27 12:49:19','2017-06-27 12:49:19',1,1),(3452,'Minuman Khas betawi','Minuman Khas betawi','Minuman Khas betawi','resep-es-kolang-kaling-jeli4508.jpg','jpg','Resep-Es-Kolang-kaling-jeli','2017-06-27 13:35:56','2017-06-27 13:35:56',1,1),(3453,'Minuman Khas betawi','Minuman Khas betawi','Minuman Khas betawi','es-teler1115.jpg','jpg','es teler','2017-06-27 13:36:13','2017-06-27 13:36:13',1,1),(3454,'Minuman Khas betawi','Minuman Khas betawi','Minuman Khas betawi','19715-es-doger2664.jpg','jpg','19715-es-doger','2017-06-27 13:36:28','2017-06-27 13:36:28',1,1),(3455,'Minuman Khas betawi','Minuman Khas betawi','Minuman Khas betawi','es-cincau-hijau2072.jpg','jpg','es-cincau-hijau','2017-06-27 13:36:41','2017-06-27 13:36:41',1,1),(3456,'pakaian adat betawi','pakaian adat betawi','pakaian adat betawi','pakaian-adat-betawi1998.jpg','jpg','pakaian adat Betawi','2017-06-27 14:01:31','2017-06-27 14:01:31',1,1),(3457,'pakaian adat betawi','pakaian adat betawi','pakaian adat betawi','img-29794801.jpg','jpg','IMG_2979','2017-06-27 14:03:19','2017-06-27 14:03:19',1,1),(3458,'permainan dari betawi','permainan dari betawi','permainan dari betawi','pletokan2465.jpg','jpg','pletokan','2017-06-27 14:29:24','2017-06-27 14:29:24',1,1),(3459,'permainan dari betawi','permainan dari betawi','permainan dari betawi','bola-gebok1469.jpg','jpg','bola gebok','2017-06-27 14:29:36','2017-06-27 14:29:36',1,1),(3460,'permainan dari betawi','permainan dari betawi','permainan dari betawi','dampu2247.jpg','jpg','dampu','2017-06-27 14:29:50','2017-06-27 14:29:50',1,1),(3461,'permainan dari betawi','permainan dari betawi','permainan dari betawi','bentengan481.jpg','jpg','bentengan','2017-06-27 14:30:10','2017-06-27 14:30:10',1,1);

UNLOCK TABLES;

/*Table structure for table `gallery_album` */

DROP TABLE IF EXISTS `gallery_album`;

CREATE TABLE `gallery_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` enum('360_view','post','review') NOT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `status` enum('draft','publish') DEFAULT 'draft',
  `viewed` int(11) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `tags` text,
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gallery_album` */

LOCK TABLES `gallery_album` WRITE;

UNLOCK TABLES;

/*Table structure for table `gallery_album_collection` */

DROP TABLE IF EXISTS `gallery_album_collection`;

CREATE TABLE `gallery_album_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `gallery_album_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_collection_gallery_fk` (`gallery_id`),
  KEY `album_fk` (`gallery_album_id`),
  CONSTRAINT `album_fk` FOREIGN KEY (`gallery_album_id`) REFERENCES `gallery_album` (`id`),
  CONSTRAINT `gallery_collection_gallery_fk` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gallery_album_collection` */

LOCK TABLES `gallery_album_collection` WRITE;

UNLOCK TABLES;

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

LOCK TABLES `migration` WRITE;

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1497355858),('m130524_201442_init',1497355860);

UNLOCK TABLES;

/*Table structure for table `personal_team` */

DROP TABLE IF EXISTS `personal_team`;

CREATE TABLE `personal_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `jabatan` varchar(50) NOT NULL,
  `avatar` varchar(20) DEFAULT NULL,
  `profile` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `user_profile_fk` (`user_id`),
  CONSTRAINT `user_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `personal_team` */

LOCK TABLES `personal_team` WRITE;

insert  into `personal_team`(`id`,`user_id`,`name`,`code`,`jabatan`,`avatar`,`profile`,`created_at`,`created_by`,`modified_at`,`modified_by`) values (33,2,'admin',NULL,'a','android1045.png','a','2017-04-11 17:05:52',1,'2017-04-11 17:05:52',1);

UNLOCK TABLES;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `image` int(11) DEFAULT NULL,
  `teaser` varchar(200) NOT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `featured` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `counter` int(11) DEFAULT '0',
  `draft` enum('draft','published') NOT NULL DEFAULT 'draft',
  `headline_home` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `headline_kanal` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `gallery_album_id` int(11) DEFAULT NULL,
  `video_album_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `d_post_category_fk` (`category_id`),
  KEY `personal_team_fk` (`author`),
  KEY `sub_cat_fk` (`sub_category`),
  CONSTRAINT `d_post_category_fk` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `personal_team_fk` FOREIGN KEY (`author`) REFERENCES `personal_team` (`id`),
  CONSTRAINT `sub_cat_fk` FOREIGN KEY (`sub_category`) REFERENCES `sub_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8138 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

LOCK TABLES `post` WRITE;

insert  into `post`(`id`,`category_id`,`sub_category`,`title`,`content`,`image`,`teaser`,`tags`,`author`,`keyword`,`post_date`,`featured`,`modified_at`,`created_by`,`created_at`,`modified_by`,`counter`,`draft`,`headline_home`,`headline_kanal`,`gallery_album_id`,`video_album_id`) values (8119,4,1,'Makana Khas Betawi','<p>Makana Khas Betawi</p>\r\n',3413,'Makana Khas Betawi','asinan',33,'asinan','2017-06-26 11:45:00',NULL,'2017-06-27 11:36:45',1,'2017-06-26 11:47:03',1,0,'published','ya','ya',NULL,NULL),(8120,1,1,'Tari cokek Dari Betawi','<p><strong>Tari cokek</strong> : kata &ldquo;cokek&rdquo; berarti sebagai penyanyi dan penari. Pada abad ke-19 tarian ini biasa nya di pertunjukan untuk meyambut para tamu dari tuan-tuan tanah cina yang dateng berkunjung. Perkembangan selanjutnya tarian ini menjadi tarian pergaulan yang di pertunjukan untuk meriahkan pesta atau hari-hari besar lainnya.</p>\r\n\r\n<p>Para tuan tanah cina selalu memiliki, membina, dan mengembangkan tari cokek bersamaan dengan orkes gambang kromong. Tuan-tuan tanah tersebut menghidupi pemain orkes gambang kromong dan wayang cokek, bahkan ada pula yang memberikan perumahan bagi mereka. Setelah perbudakan dihapuskan hingga sekarang, para pemain orkes gambang kromong maupun wayang cokek bergerak sendiri-sendiri.</p>\r\n\r\n<p>Cokek memiliki gerak dasar yang disebut &ldquo;ngibing&rdquo; yang lebih menitikberatkan gerak tari pada pinggul. Tari cokek selalu diiringi oleh orkes gambang kromong dan penari-penari perempuannya disebut wayang cokek. Tari cokek dimulai dengan tarian pembukaan yang disebut wawayangan. Para wayang cokek berdiri berjejer memanjang sambil melangkah naju-mundur mengikuti irama gambang kromong. Rentangan tangan setinggi bahu meningkahi gerakan kaki yang dilanjutkan dengan penari yang mengajak para tamu untuk menari dengan cara mengalungkan cukin kepada tamu yang dimaksud.</p>\r\n\r\n<p>Di masa lalu, pakaian wayang cokek berbentuk khas, yaitu baju kurung dan celana panjang dari bahan semacam sutra halus. Ada yang berwarna merah menyala, hijau, ungu, hijau, dan sebagainya. Diujung sebelah bawah biasanya diberi pula hiasan dengan kain berwarna yang serasi. Selembar selendang panjang (cukin) terikat di pinggang dengan kedua ujungnya terurai kebawah rambut disisir kebelakang.</p>\r\n\r\n<p>Jika pada mulanya cokek identik dengan hiburan masyarakat cina peranakan, kini digemari oleh banyak kalangan lain untuk meriahkan berbagai pesta, terutama pesta perkawinan. Sebagaimana gambang kromong,tari cokek adalah salah satu tarian betawi yang luas penyebarnya.</p>\r\n',3428,'Tari cokek : kata “cokek” berarti sebagai penyanyi dan penari. Pada abad ke-19 tarian ini biasa nya di pertunjukan untuk meyambut para tamu dari tuan-tuan tanah cina yang dateng berkunjung. Perkembang','tarian',NULL,'tarian','2017-06-26 18:35:00',NULL,'2017-07-01 22:01:23',1,'2017-06-26 18:36:55',NULL,3,'published','ya','ya',NULL,NULL),(8121,1,1,'Tari Blengo Dari Betawi','<p><strong>Tari blenggo</strong> : Kata blenggo mungkin sama artinya dengan tari. Sebab sebab ada ungkapan &ldquo;diblenggoin&rdquo; yang artinya diiringi dengan tarian. Ada pula yang menyebut blenggo berasal dari kata &ldquo;lenggok-lenggok&rdquo;, gerakan yang lazim dalam suatu tarian.</p>\r\n\r\n<p>Terlepas dari segi etimologis itu. Tari blenggo tidak memiliki pola yang tetap. Umumnya gerak tari diambil dari gerak-gerak silat. Jadi sangat tergantung dengan perbendaharaan gerakan pencak silat penari yang bersangkutan. Sehingga seorang penari blenggo yang mengusai silat cimade dengan gerakan-gerakan pendek akan berbeda dengan yang menguasai silat cikalong yang gerakannya panjang. Tetapi ada juga keyakinan bahwa gerak-gerak pencak atau gerak lincah tidak selalu berasal dari gerak pencak silat, sehingga seorang penari blenggo tidak harus bisa pencak silat.</p>\r\n\r\n<p>Bedasarkan musik pengiringnya, tari blenggo di bagi menjadi dua: blenggo rebana dan blenggo ajeng. Blenggo rebana diiringi oleh rebana biang dan blenggo ajeng diiringi oleh gamelan ajeng.</p>\r\n',3430,'Tari blenggo : Kata blenggo mungkin sama artinya dengan tari. Sebab sebab ada ungkapan “diblenggoin” yang artinya diiringi dengan tarian. Ada pula yang menyebut blenggo berasal dari kata “lenggok-leng','tarian, betawi',NULL,'','2017-06-26 18:35:00',NULL,'2017-06-26 18:39:38',1,'2017-06-26 18:39:38',1,0,'published','ya','ya',NULL,NULL),(8122,1,3,'musik dari betawi','<p>musik dari betawi</p>\r\n',3443,'musik dari betawi','',NULL,'','2017-06-27 11:00:00',NULL,'2017-06-27 11:01:20',1,'2017-06-27 11:01:20',1,0,'published','ya','ya',NULL,NULL),(8123,1,2,'theater dari betawi','<p>theater dari betawi</p>\r\n',3448,'theater dari betawi','theater dari betawi',33,'theater dari betawi','2017-06-27 11:45:00',NULL,'2017-06-29 17:54:43',1,'2017-06-27 11:50:43',NULL,2,'published','ya','ya',NULL,NULL),(8124,1,2,'theater dari betawi','<p>theater dari betawi</p>\r\n',3447,'theater dari betawi','theater dari betawi',NULL,'theater dari betawi','2017-06-27 11:50:00',NULL,'2017-07-01 22:13:37',1,'2017-06-27 11:51:22',NULL,5,'published','ya','ya',NULL,NULL),(8125,1,3,'musik dari betawi','<p>musik dari betawi</p>\r\n',3440,'musik dari betawi','musik dari betawi',NULL,'musik dari betawi','2017-06-27 12:00:00',NULL,'2017-07-01 22:02:43',1,'2017-06-27 12:02:28',NULL,1,'published','','',NULL,NULL),(8126,2,1,'tokoh dari betawi','<p>tokoh dari betawi</p>\r\n',3449,'tokoh dari betawi','tokoh dari betawi',NULL,'tokoh dari betawi','2017-06-27 12:50:00',NULL,'2017-06-27 12:55:54',1,'2017-06-27 12:55:54',1,0,'published','','',NULL,NULL),(8127,2,1,'tokoh dari betawi','<p>tokoh dari betawi</p>\r\n',3450,'tokoh dari betawi','tokoh dari betawi',33,'tokoh dari betawi','2017-06-27 13:00:00',NULL,'2017-07-01 22:03:18',1,'2017-06-27 13:04:06',NULL,6,'published','','',NULL,NULL),(8128,2,1,'tokoh dari betawi','<p>tokoh dari betawi</p>\r\n',3451,'tokoh dari betawi','tokoh dari betawi',33,'tokoh dari betawi','2017-06-27 13:00:00',NULL,'2017-06-27 13:04:54',1,'2017-06-27 13:04:54',1,0,'published','','',NULL,NULL),(8130,3,1,'pakain adat dari betawi','<p>pakain adat dari betawi</p>\r\n',3457,'pakain adat dari betawi','pakain adat dari betawi',33,'pakain adat dari betawi','2017-06-27 14:20:00',NULL,'2017-07-01 22:03:24',1,'2017-06-27 14:22:53',NULL,2,'published','','',NULL,NULL),(8131,3,1,'pakain adat dari betawi','<p>pakain adat dari betawi</p>\r\n',3456,'pakain adat dari betawi','pakain adat dari betawi',NULL,'pakain adat dari betawi','2017-06-27 14:20:00',NULL,'2017-07-01 22:03:40',1,'2017-06-27 14:24:18',NULL,5,'published','','',NULL,NULL),(8132,6,1,'permainan dari betawi','<p>permainan dari betawi</p>\r\n',3461,'permainan dari betawi','permainan dari betawi',NULL,'permainan dari betawi','2017-06-27 14:30:00',NULL,'2017-07-01 22:06:46',1,'2017-06-27 14:34:23',NULL,5,'published','','',NULL,NULL),(8133,6,1,'permainan dari betawi','<p>permainan dari betawi</p>\r\n',3460,'permainan dari betawi','permainan dari betawi',NULL,'permainan dari betawi','2017-06-27 14:35:00',NULL,'2017-07-01 22:03:44',1,'2017-06-27 14:35:49',NULL,1,'published','','',NULL,NULL),(8134,5,1,'minuman khas betawi','<p>minuman khas betawi</p>\r\n',3452,'minuman khas betawi','minuman khas betawi',33,'minuman khas betawi','2017-06-27 14:50:00',NULL,'2017-07-01 22:31:59',1,'2017-06-27 14:53:21',1,3,'published','ya','ya',NULL,NULL),(8135,5,1,'minuman khas betawi','<p>minuman khas betawi</p>\r\n',3453,'minuman khas betawi','minuman khas betawi',NULL,'minuman khas betawi','2017-06-27 14:50:00',NULL,'2017-06-29 17:22:21',1,'2017-06-27 14:53:57',NULL,7,'published','','',NULL,NULL),(8136,4,1,'Makanan Khas Betawi','<p>Makanan Khas Betawi</p>\r\n',3417,'Makanan Khas Betawi','Makanan Khas Betawi',NULL,'Makanan Khas Betawi','2017-06-27 14:50:00',NULL,'2017-06-29 17:44:27',1,'2017-06-27 14:54:44',NULL,1,'published','','',NULL,NULL),(8137,4,1,'Makanan Khas Betawi','<p>Makanan Khas Betawi</p>\r\n',3419,'Makanan Khas Betawi','Makanan Khas Betawi',NULL,'Makanan Khas Betawi','2017-06-27 14:50:00',NULL,'2017-07-01 22:00:52',1,'2017-06-27 14:55:18',NULL,3,'published','','',NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `post_categories` */

DROP TABLE IF EXISTS `post_categories`;

CREATE TABLE `post_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `post_categories` */

LOCK TABLES `post_categories` WRITE;

insert  into `post_categories`(`id`,`name`,`created_date`,`modified_date`,`created_by`,`modified_by`) values (1,'kesenian',NULL,NULL,NULL,NULL),(2,'tokoh',NULL,NULL,NULL,NULL),(3,'adat',NULL,NULL,NULL,NULL),(4,'makanan',NULL,NULL,NULL,NULL),(5,'minuman',NULL,NULL,NULL,NULL),(6,'permaianan',NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `sub_category` */

DROP TABLE IF EXISTS `sub_category`;

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sub_category` */

LOCK TABLES `sub_category` WRITE;

insert  into `sub_category`(`id`,`name`,`created_date`,`created_by`,`modified_date`,`modified_by`) values (1,'tarian',NULL,NULL,NULL,NULL),(2,'theater',NULL,NULL,NULL,NULL),(3,'musik',NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

LOCK TABLES `user` WRITE;

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`) values (1,'admin','5R9mTiMBFtcoQhMekBLSPN5X3l2OPJ0T','$2y$13$DKlXi9AeLrdge0o/i127J.LTJrv.8U2czHpQuG6Pu055B.qDwFWjy',NULL,'admin@gmail.com',10,1497542375,1497542375,10);

UNLOCK TABLES;

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `youtube_id` varchar(100) NOT NULL,
  `status` enum('draft','publish') DEFAULT NULL,
  `viewed` int(11) DEFAULT '0',
  `featured` enum('ya','tidak') DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `videographer` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `video` */

LOCK TABLES `video` WRITE;

insert  into `video`(`id`,`credit`,`title`,`description`,`youtube_id`,`status`,`viewed`,`featured`,`tags`,`post_date`,`videographer`,`created_at`,`modified_at`,`created_by`,`modified_by`) values (1,'Kawasaki','Kawasaki\'s Rider Journey 3 Countries ','Pada tanggal 18 Mei 2015 lalu, Kawasaki Motor Indonesia melakukan city touring di 3 negara, yaitu Thailand, Malaysia, dan Singapura. Bersama tim Kawasaki Dealer Community (KDC) melakukan perjalanan ini selama 5 hari, dari tanggal 18 – 22 Mei 2015. Peserta touring ini cukup banyak, ada 33 owner dan management dealer serta manager leasing Adira yang menggunakan Ninja ZX-14R, Z1000, Ninja 1000, Z800, Versys 650, ER-6N, Ninja 650, dan ZX-636.','WrepmDX4QOc','publish',0,NULL,NULL,'2015-06-25 16:10:00',NULL,'2015-06-25 16:13:18','2015-06-25 16:19:42',1,NULL),(2,'ZecOO','ZecOO Electric Motorcycle','ZecOO adalah motor listrik buatan Jepang yang menggunakan motor listrik dari Zero Motorcycles. Bentuknya futuristis, mirip motor masa depan pada film science-fiction.','https://youtu.be/aKKRbMUZIlE<iframe width=\"420\" height=\"315\" src=\"https://www.youtube.com/embed/aKKR','draft',0,NULL,NULL,'2015-07-18 15:10:00',NULL,'2015-07-18 15:09:31','2015-07-27 14:52:48',15,NULL);

UNLOCK TABLES;

/*Table structure for table `video_album` */

DROP TABLE IF EXISTS `video_album`;

CREATE TABLE `video_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `status` enum('draft','publish') DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `video_album` */

LOCK TABLES `video_album` WRITE;

insert  into `video_album`(`id`,`title`,`desc`,`status`,`created_by`,`modified_by`,`created_at`,`modified_at`) values (1,'Kawasaki\'s Rider Journey 3 Countries ','Pada tanggal 18 Mei 2015 lalu, Kawasaki Motor Indonesia melakukan city touring di 3 negara, yaitu Thailand, Malaysia, dan Singapura. Bersama tim Kawasaki Dealer Community (KDC) melakukan perjalanan ini selama 5 hari, dari tanggal 18 – 22 Mei 2015. Peserta touring ini cukup banyak, ada 33 owner dan management dealer serta manager leasing Adira yang menggunakan Ninja ZX-14R, Z1000, Ninja 1000, Z800, Versys 650, ER-6N, Ninja 650, dan ZX-636.','draft',NULL,NULL,'2015-07-09 17:50:54','2015-07-09 17:50:54');

UNLOCK TABLES;

/*Table structure for table `video_album_collection` */

DROP TABLE IF EXISTS `video_album_collection`;

CREATE TABLE `video_album_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `video_album_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_collection_gallery_fk` (`video_id`),
  KEY `album_fk` (`video_album_id`),
  CONSTRAINT `video_album_fk` FOREIGN KEY (`video_album_id`) REFERENCES `video_album` (`id`),
  CONSTRAINT `video_fk` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `video_album_collection` */

LOCK TABLES `video_album_collection` WRITE;

insert  into `video_album_collection`(`id`,`video_id`,`video_album_id`,`title`,`desc`,`created_by`,`modified_by`,`created_at`,`modified_at`) values (1,1,1,NULL,NULL,15,NULL,'2015-07-09 17:51:00','2015-07-09 17:51:00');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
