/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - testenglish
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`testenglish` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `testenglish`;

/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_number` int(11) DEFAULT NULL,
  `register_number` int(11) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `close_flg` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `classes` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `listenings` */

DROP TABLE IF EXISTS `listenings`;

CREATE TABLE `listenings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `main_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `listenings` */

insert  into `listenings`(`id`,`main_img`,`audio`,`part`,`created_at`,`updated_at`) values (2,'image_43d5c62e8abcbb10b61b9d43d088117e.JPG','C:\\xampp\\tmp\\phpC68A.tmp',1,'2020-05-30 07:53:34','2020-05-30 07:53:34'),(3,'image_4b7eb17082b9b4aafbebdb1fb1e03af3.png','audio_4b7eb17082b9b4aafbebdb1fb1e03af3.mp3',1,'2020-05-30 10:09:25','2020-05-30 10:09:25'),(4,NULL,'audio_f938f8218d77b5dc9f3fbb365960e69e.mp3',2,'2020-05-30 12:03:26','2020-05-30 12:03:26'),(6,'image_57998c8e1d1ab602860a54ac1d38398c.png','audio_57998c8e1d1ab602860a54ac1d38398c.mp3',3,'2020-05-30 12:05:04','2020-05-30 14:05:04'),(7,NULL,'audio_0539d6fad0499c07d582548439bc8894.mp3',4,'2020-05-30 12:22:34','2020-05-30 14:22:34'),(8,NULL,'audio_f938f8218d77b5dc9f3fbb365960e69e.mp3',2,'2020-05-30 12:03:26','2020-05-30 12:03:26'),(9,NULL,'audio_f938f8218d77b5dc9f3fbb365960e69e.mp3',2,'2020-05-30 12:03:26','2020-05-30 12:03:26');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2014_10_12_100000_create_password_resets_table',2),(4,'2020_05_26_141754_create_table_listenings',3),(5,'2020_05_26_142557_create_table_readings',3),(6,'2020_05_26_143229_create_table_questions',4),(7,'2020_05_27_054939_update_table_questions',5),(8,'2020_05_31_021105_create_table_tests',6),(9,'2020_05_31_023710_update_table_tests',7),(10,'2020_05_31_104517_change_table_tests',8),(11,'2020_05_31_150018_change_table_users',9),(12,'2020_05_31_150502_create_table_classes',10),(14,'2020_05_31_170114_change_table_classes',11),(15,'2020_06_01_035755_update_table_users',11);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `listening_id` int(11) DEFAULT NULL,
  `reading_id` int(11) DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `explain` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `questions` */

insert  into `questions`(`id`,`listening_id`,`reading_id`,`question`,`option_a`,`option_b`,`option_c`,`option_d`,`answer`,`created_at`,`updated_at`,`explain`) values (1,NULL,1,'How______ you ?','are','am','is','we','A','2020-05-30 05:17:29','2020-05-30 05:17:29','Dễ vl =))'),(2,NULL,2,'Where are ____ from ?','Who','I','her','you','D','2020-05-30 05:19:36','2020-05-30 05:19:36','CHọn D'),(3,NULL,3,NULL,'speed','shop','visit','abc','B',NULL,NULL,'explann'),(4,NULL,3,'visit','visita','visitx','visitee','visitdư','D',NULL,NULL,'visitdsdsds'),(5,NULL,3,NULL,'your','we','them','how','C',NULL,NULL,'wwe'),(6,NULL,3,NULL,'whom','who','when','where','A',NULL,NULL,NULL),(7,NULL,5,NULL,'vjhg','hjg','hgjg','jhg','B',NULL,NULL,NULL),(8,NULL,5,NULL,'ửe','we','hoo','ACH','C',NULL,NULL,NULL),(9,NULL,6,'Where might this notice be found?','in a shop','on the television','on the PC','on the phone','D',NULL,NULL,'abc'),(10,NULL,6,'What is the purpose of this notice?','AAAA','BBBB','BBBBB','CCCCCC','B',NULL,NULL,'ABCD'),(11,NULL,7,'Who is this advertisement aimed at?','people who like gourmet food','trendy, fashion-conscious people','people who have little extra spending money','evironment-and health-conscious people','B',NULL,NULL,'abcd'),(12,NULL,7,'What claim is made about the staff?','Chair','Table','phone','We','D',NULL,NULL,'abcdaer'),(13,NULL,7,'Who is we?','wwe','I','Jack','Maria','A',NULL,NULL,'adsd'),(14,NULL,8,'The mother held her newborn ____','loving','lovely','love','i am','A','2020-05-30 06:08:31','2020-05-30 06:08:31',NULL),(15,NULL,9,'Our sales ____ significantly since this time last year','increase','increased','increasing','increasable','C','2020-05-30 06:09:11','2020-05-30 06:09:11',NULL),(16,NULL,10,'dasd','a','da','da','da','C','2020-05-30 07:14:49','2020-05-30 07:14:49',NULL),(17,2,NULL,NULL,NULL,NULL,NULL,NULL,'A','2020-05-30 07:53:34','2020-05-30 07:53:34',NULL),(18,3,NULL,NULL,NULL,NULL,NULL,NULL,'B','2020-05-30 10:09:26','2020-05-30 10:09:26','abcd'),(19,4,NULL,NULL,NULL,NULL,NULL,NULL,'B','2020-05-30 12:03:27','2020-05-30 12:03:27','abcd'),(20,6,NULL,'What is the purpose of this notice?','fdsf','vdf','guiy','ytgy','A',NULL,NULL,'uiyhuyf'),(21,6,NULL,'Who is we?','f','gh','ghgh','hghj','A',NULL,NULL,'jhkh'),(22,6,NULL,'when','g','gg','hggh','ghg','A',NULL,NULL,'hgjh'),(23,7,NULL,'What is the purpose of this notice?','hgj','hjkh','jhjh','jhk','B',NULL,NULL,'jljkljlj'),(24,7,NULL,'jlkljsdf','kjk','kjklj','kljl','kljklj','A',NULL,NULL,'kjlklj'),(25,7,NULL,'90fuiwe','ghff','tty','yuyuf','yufgy','A',NULL,NULL,'ihuyhi'),(26,8,NULL,NULL,NULL,NULL,NULL,NULL,'B','2020-05-30 12:03:27','2020-05-30 12:03:27','abcd'),(27,9,NULL,NULL,NULL,NULL,NULL,NULL,'B','2020-05-30 12:03:27','2020-05-30 12:03:27','abcd');

/*Table structure for table `readings` */

DROP TABLE IF EXISTS `readings`;

CREATE TABLE `readings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `part` int(11) NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_questions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `readings` */

insert  into `readings`(`id`,`part`,`post`,`number_of_questions`,`created_at`,`updated_at`) values (1,5,NULL,1,'2020-05-30 05:17:29','2020-05-30 05:17:29'),(2,5,NULL,1,'2020-05-30 05:19:36','2020-05-30 05:19:36'),(3,6,'<p>22 April</p><p>Ms. Anna Schoorl</p><p>Rodezand 334</p><p>3011 AV Rotterdam</p><p>Netherlands</p><p>Dear Ms. Schoorl,</p><p>Congratulations on your remarkable __(1)__ in the Netherlands, Belgium, and Luxembourg. Your region has improved its on-time delivery performance for each of the past seven quarters. __(2)__</p><p>I am pleased to offer you a promotion to Director of European Operations. The position __(3)__&nbsp;in Hamburg, Germany,&nbsp;I realize that relocating may be difficult for you, __(4)__&nbsp;I certainly hope that you will take time to consider this opportunity. Please call me at your earliest convenience so that we can discuss any concerns you may have.</p><p>Thank you for being a part of the Unocity Shipping family.</p><p>Sincerely,</p><p>Xia Hsu, Director of Operations</p><p>Unocity Shipping, Inc.</p>',4,'2020-05-30 05:35:34','2020-05-30 05:35:34'),(5,6,'<p><strong>From: Madeleine DeVries, Director of Operations</strong></p><p><strong>To: All Employees</strong></p><p><strong>Date: June 1</strong></p><p><strong>Re: Travel Policy</strong></p><p>To help reduce __(1)__ , the officers have voted to change the company\'s travel policy. The revised policy will be __(2)__ on June 15. From that point forward, employees traveling within the country will be required to submit their travel requests to the accounting office no later than three weeks before the date of departure. __(3)__ .</p><p>__(4)__ exceptions to this policy will be decided on a case-by-case basis and must first be approved by the individual employee\'s supervisor.</p>',2,'2020-05-30 05:38:37','2020-05-30 05:38:37'),(6,7,'<p>This site may contain advice, opinions and statements of various information providers.&nbsp;</p><p class=\"ql-align-justify\">We do not represent or endorse the accuracy or reliability of any advice, opinion, statement or other information provided by any information provider, any user of this site or any other person or entity. Reliance upon any such advice, opinion, statement, or other information shall also be at the user\'s own risk.&nbsp;</p><p class=\"ql-align-justify\">We shall not be liable to any user or anyone else for any inaccuracy, error, omission, alteration, or, use of any content herein, or for its timeliness or completeness.&nbsp;</p><p><br></p>',2,'2020-05-30 05:59:59','2020-05-30 05:59:59'),(7,7,'<p class=\"ql-align-center\"><strong>Cafe Gratitude</strong></p><p class=\"ql-align-center\"><strong>serving all organic, vegan and mostly live foods!</strong></p><p class=\"ql-align-center\">A quirky, cool cafe that serves food that\'s good for you and serves it&nbsp;with a smile.&nbsp;</p><p class=\"ql-align-center\">The vegan menu mixes interesting and delicious flavors, and takes local food production and the environment seriously.&nbsp;</p><p class=\"ql-align-center\">Hours: Monday - Saturday 9am to 10pm</p><p class=\"ql-align-center\">Sunday 10am&nbsp;to 3pm&nbsp;</p><p><br></p>',3,'2020-05-30 06:01:35','2020-05-30 06:01:35'),(8,5,NULL,1,'2020-05-30 06:08:31','2020-05-30 06:08:31'),(9,5,NULL,1,'2020-05-30 06:09:11','2020-05-30 06:09:11'),(10,5,NULL,1,'2020-05-30 07:14:49','2020-05-30 07:14:49');

/*Table structure for table `tests` */

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `listening_score` int(11) DEFAULT NULL,
  `reading_score` int(11) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `part_one_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_two_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_three_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_four_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_five_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_six_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_seven_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_one_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_two_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_three_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_four_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_five_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_six_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer_part_seven_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `complete_flg` tinyint(1) NOT NULL,
  `part_one_score` int(11) DEFAULT NULL,
  `part_two_score` int(11) DEFAULT NULL,
  `part_three_score` int(11) DEFAULT NULL,
  `part_four_score` int(11) DEFAULT NULL,
  `part_five_score` int(11) DEFAULT NULL,
  `part_six_score` int(11) DEFAULT NULL,
  `part_seven_score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tests` */

insert  into `tests`(`id`,`user_id`,`listening_score`,`reading_score`,`total_score`,`part_one_ids`,`part_two_ids`,`part_three_ids`,`part_four_ids`,`part_five_ids`,`part_six_ids`,`part_seven_ids`,`true_answer_part_one_ids`,`true_answer_part_two_ids`,`true_answer_part_three_ids`,`true_answer_part_four_ids`,`true_answer_part_five_ids`,`true_answer_part_six_ids`,`true_answer_part_seven_ids`,`created_at`,`updated_at`,`complete_flg`,`part_one_score`,`part_two_score`,`part_three_score`,`part_four_score`,`part_five_score`,`part_six_score`,`part_seven_score`) values (14,1,26,80,NULL,'2,3','4,9','6','7','1,8','3','7',NULL,NULL,NULL,NULL,NULL,'3',NULL,'2020-05-31 11:50:30','2020-05-31 14:51:02',1,0,0,0,0,0,1,0),(15,1,30,50,NULL,'3,2','4,8','6','7','10,9','3','7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-05-31 12:52:04','2020-05-31 14:52:04',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,1,85,60,NULL,'2,3','8,4','6','7','8,1','5','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-05-31 12:46:16','2020-05-31 16:46:16',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,1,NULL,NULL,NULL,'2,3','4,9','6','7','10,8','3','7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-01 11:06:35','2020-06-01 11:06:35',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `age` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`image`,`email`,`email_verified_at`,`password`,`company`,`address`,`role`,`age`,`phone`,`remember_token`,`created_at`,`updated_at`) values (1,'Nguyen Trong Manh123ádđá',NULL,'nguyentrongmanh050298@gmail.com','2020-05-14 21:45:30','$2y$10$oLdFdI57CsWalJiMwfLfEOLMUXbGzF45KrwyfdDNU2q6vP9cVy8mu','Ha Noi University of Sience','Hai Dương',1,28,332499988,NULL,'2020-05-30 12:44:51','2020-06-01 07:36:24'),(2,'manh',NULL,'manh050298@gmail.com',NULL,'12345679',NULL,NULL,0,NULL,NULL,NULL,'2020-05-31 12:08:07','2020-05-31 12:08:07'),(3,'fskjh',NULL,'manhabc@gmail.com',NULL,'$2y$10$zfslKMum9PXN5DrgYPvUkO814nhK1WZPOkfJc8xu4CZBVLexmFn52',NULL,NULL,0,NULL,NULL,NULL,'2020-05-31 12:10:22','2020-05-31 12:10:22'),(4,'manh',NULL,'manh@gmail.com',NULL,'$2y$10$r8rkrE1/CXgQ1e3iQkM7FuBjnnJG9DdWm8q5SzO6srpuXEWi7tpr.',NULL,NULL,0,NULL,NULL,NULL,'2020-06-01 03:50:29','2020-06-01 03:50:29'),(6,'manh32424',NULL,'admin@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24'),(9,'manh32424',NULL,'admintft@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24'),(10,'manh',NULL,'admint22t@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24'),(12,'manh',NULL,'admint225@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24'),(13,'manh',NULL,'admint22t22@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24'),(14,'manh',NULL,'adm5@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24'),(15,'manh',NULL,'ad20m5@gmail.com',NULL,'$2y$10$DRX/XhTR6U5E588qb37ituVTLlDxDJYjbVz7xv/wHxi3z3dR9IjPu','Ha Noi University of Sience','Hai Dương',0,28,332499988,NULL,'2020-06-01 05:14:24','2020-06-01 05:14:24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
