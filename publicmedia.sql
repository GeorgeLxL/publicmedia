/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - publicmedia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`publicmedia` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `publicmedia`;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `sub_area_count` int(4) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Data for the table `area` */

insert  into `area`(`id`,`sub_area_count`,`name`,`image`,`parent_id`) values 
(1,4,'北海道','img/areas/ebisu.png',NULL),
(2,4,'東北','img/areas/ginza.png',NULL),
(3,3,'甲信','img/areas/harajuku.png',NULL),
(4,4,'東海','img/areas/ikebukuro.png',NULL),
(5,6,'近畿','img/areas/omotesando.png',NULL),
(6,4,'中国','img/areas/shibuya.png',NULL),
(7,6,'関東','img/areas/shimokitazawa.png',NULL),
(8,5,'東京','img/areas/shinjuku.png',NULL),
(9,3,'北陸','img/areas/shinjuku.png',NULL),
(10,4,'四国','img/areas/shinjuku.png',NULL),
(11,7,'九州','img/areas/shinjuku.png',NULL),
(12,1,'沖縄','img/areas/shinjuku.png',NULL),
(13,0,'奈良県','img/areas/shinjuku.png',5),
(14,0,'兵庫県','img/areas/shinjuku.png',5),
(15,0,'大阪府','img/areas/shinjuku.png',5),
(16,0,'京都府','img/areas/shinjuku.png',5),
(17,0,'滋賀県','img/areas/shinjuku.png',5),
(18,0,'静岡県','img/areas/shinjuku.png',4),
(19,0,'三重県','img/areas/shinjuku.png',4),
(20,0,'岐阜県','img/areas/shinjuku.png',4),
(21,0,'愛知県','img/areas/shinjuku.png',4),
(22,0,'長野県','img/areas/shinjuku.png',3),
(23,0,'山梨県','img/areas/shinjuku.png',3),
(24,0,'新潟県','img/areas/shinjuku.png',3),
(25,0,'福島県','img/areas/shinjuku.png',2),
(26,0,'山形県','img/areas/shinjuku.png',2),
(27,0,'秋田県','img/areas/shinjuku.png',2),
(28,0,'青森県','img/areas/shinjuku.png',2),
(29,0,'道東','img/areas/shinjuku.png',1),
(30,0,'道北','img/areas/shinjuku.png',1),
(31,0,'道南','img/areas/shinjuku.png',1),
(32,0,'道央','img/areas/shinjuku.png',1),
(33,0,'和歌山県','img/areas/shinjuku.png',5),
(34,0,'鳥取県','img/areas/shinjuku.png',6),
(35,0,'岡山県','img/areas/shinjuku.png',6),
(36,0,'広島県','img/areas/shinjuku.png',6),
(37,0,'山口県','img/areas/shinjuku.png',6),
(38,0,'茨城県','img/areas/shinjuku.png',7),
(39,0,'栃木県','img/areas/shinjuku.png',7),
(40,0,'群馬県','img/areas/shinjuku.png',7),
(41,0,'千葉県','img/areas/shinjuku.png',7),
(42,0,'神奈川県','img/areas/shinjuku.png',7),
(43,0,'埼玉県','img/areas/shinjuku.png',7),
(44,0,'都心エリア','img/areas/shinjuku.png',8),
(45,0,'城西エリア','img/areas/shinjuku.png',8),
(46,0,'城南エリア','img/areas/shinjuku.png',8),
(47,0,'城南エリア','img/areas/shinjuku.png',8),
(48,0,'城東エリア','img/areas/shinjuku.png',8),
(49,0,'富山県','img/areas/shinjuku.png',9),
(50,0,'石川県','img/areas/shinjuku.png',9),
(51,0,'福井県','img/areas/shinjuku.png',9),
(52,0,'徳島県','img/areas/shinjuku.png',10),
(53,0,'香川県','img/areas/shinjuku.png',10),
(54,0,'愛媛県','img/areas/shinjuku.png',10),
(55,0,'高知県','img/areas/shinjuku.png',10),
(56,0,'福岡県','img/areas/shinjuku.png',11),
(57,0,'佐賀県','img/areas/shinjuku.png',11),
(58,0,'長崎県','img/areas/shinjuku.png',11),
(59,0,'熊本県','img/areas/shinjuku.png',11),
(60,0,'大分県','img/areas/shinjuku.png',11),
(61,0,'宮崎県','img/areas/shinjuku.png',11),
(62,0,'鹿児島県','img/areas/shinjuku.png',11),
(63,0,'沖縄','img/areas/shinjuku.png',12);

/*Table structure for table `favorites` */

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `favorite_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) DEFAULT NULL,
  `image_id` int(8) DEFAULT NULL,
  `status` int(8) DEFAULT NULL,
  PRIMARY KEY (`favorite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `favorites` */

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`url`) values 
(1,'uploads/gallery/5fdf890f95806.jpg'),
(2,'uploads/gallery/5fdf88db1fa17.jpg'),
(3,'uploads/gallery/5fdf88ffb1e73.jpg'),
(4,'uploads/gallery/5fdf890495385.jpg');

/*Table structure for table `guide` */

DROP TABLE IF EXISTS `guide`;

CREATE TABLE `guide` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `guide` */

insert  into `guide`(`id`,`title`,`content`) values 
(1,'気になる髪型をハッシュタグで検索','流行のヘアスタイルやイメチェンしたい髪型を ハッシュタグ検索から探すことができます。'),
(2,'行きたいエリアをハッシュタグで検索','ハッシュタグからヒットしたヘアスタイルの中から気になる髪型をタップしてみよう。 タップするとヘアスタイルの詳細が見れます。'),
(3,'気になる髪型を選んでみよう','ハッシュタグからヒットしたヘアスタイルの中から気になる髪型をタップしてみよう。タップするとヘアスタイルの詳細が見れます。'),
(16,'ヘアスタイルを作った美容師を確認','ヘアスタイルを作った美容師のプロフィールが確認スタイリストの得意なヘアスタイルなども確認できるので。お気に入りの美容師を見つけることができます。');

/*Table structure for table `hairstyle` */

DROP TABLE IF EXISTS `hairstyle`;

CREATE TABLE `hairstyle` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `hairstyle` */

insert  into `hairstyle`(`id`,`type`,`image`,`gender`) values 
(1,'ロング','img/hair-style/long.png',2),
(2,'セミロング','img/hair-style/shoulder-length.png',2),
(3,'ミディアム','img/hair-style/midium.png',2),
(4,'ショート','img/hair-style/short.png',2),
(5,'ボブ','img/hair-style/bob.png',2),
(6,'メンズ','img/hair-style/mens.png',1),
(7,'その他','img/hair-style/other.png',2);

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `hairtype` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `images` */

/*Table structure for table `intro` */

DROP TABLE IF EXISTS `intro`;

CREATE TABLE `intro` (
  `top_image` varchar(255) DEFAULT NULL,
  `advertise` varchar(500) DEFAULT NULL,
  `gallory_imgs` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `intro` */

insert  into `intro`(`top_image`,`advertise`,`gallory_imgs`) values 
('uploads/intro/intro-bg.jpg','「なりたい」と「叶える」を実現する。/エリア別ヘアスタイルマッチング予約サイト /自分に合った美容師を見つけることができます。',NULL);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `amount` varchar(10) DEFAULT NULL,
  `explanation` varchar(50) DEFAULT NULL,
  `requiretime` varchar(10) DEFAULT NULL,
  `menugroupname` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

/*Table structure for table `menugroup` */

DROP TABLE IF EXISTS `menugroup`;

CREATE TABLE `menugroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `menugroup` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `reservations` */

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) DEFAULT NULL,
  `hairdresser_id` int(20) DEFAULT NULL,
  `menu_ids` varchar(250) DEFAULT NULL,
  `first_choice_date` varchar(200) DEFAULT 'NULL',
  `second_choice_date` varchar(200) DEFAULT 'NULL',
  `third_choice_date` varchar(200) DEFAULT 'NULL',
  `remarks` text DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `reservation_status` int(20) DEFAULT NULL,
  `flag` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `reservations` */

/*Table structure for table `shop` */

DROP TABLE IF EXISTS `shop`;

CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `atmosphere1` varchar(255) DEFAULT NULL,
  `atmosphere2` varchar(255) DEFAULT NULL,
  `atmosphere3` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `opentime` varchar(255) DEFAULT NULL,
  `closetime` varchar(255) DEFAULT NULL,
  `gatheringtime` varchar(255) DEFAULT NULL,
  `holiday` varchar(255) DEFAULT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `seatnum` varchar(255) DEFAULT NULL,
  `parkinglot` varchar(255) DEFAULT NULL,
  `routestation` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `commitment` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `shop` */

/*Table structure for table `stylist` */

DROP TABLE IF EXISTS `stylist`;

CREATE TABLE `stylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_m` varchar(255) DEFAULT NULL,
  `name_s` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shop` int(11) DEFAULT NULL,
  `shoparea` varchar(255) DEFAULT NULL,
  `company` int(1) DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `message_booker` text DEFAULT NULL,
  `message_completed` text DEFAULT NULL,
  `nomination_fee` int(11) DEFAULT NULL,
  `feature` varchar(30) DEFAULT NULL,
  `official_campaign` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `stylist` */

insert  into `stylist`(`id`,`name_m`,`name_s`,`user_id`,`email`,`password`,`shop`,`shoparea`,`company`,`regdate`,`profile_photo`,`message`,`message_booker`,`message_completed`,`nomination_fee`,`feature`,`official_campaign`) values 
(1,NULL,NULL,NULL,'super@admin.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_kanzi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_kana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bitbucket_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
