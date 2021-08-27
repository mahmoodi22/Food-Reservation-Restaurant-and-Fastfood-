-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2021 at 09:28 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classyfooddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'alireza-admin', '12345678', 'alireza-admin@gmail.com', '2021-08-26 20:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `d_id` int(222) NOT NULL AUTO_INCREMENT,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` varchar(222) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(21, 56, 'چلوکباب برگ', 'با برنج شمالی و طبخ گرم و عالی', '87000', '6124118ed2662.jpg'),
(22, 56, 'چنجه مخصوص سرآشپز', 'کافیه که یکبار امتحانش کنید', '65000', '6124121bddfa8.jpg'),
(23, 56, 'چلو جوجه کباب', 'یکی از پر سفارش ترین غذاهای این مجموعه', '45000', '61241279d7b36.jpg'),
(24, 56, 'چلو ماهی قزل', 'با ادویه و چاشنی مخصوص', '50000', '612412eea60c5.jpg'),
(25, 56, 'خوراک کباب کوبیده دو سیخ مخصوص سرآشپز', 'بینظیر و حرفه ای', '35000', '61241342f0d4d.jpg'),
(26, 56, 'چلو کباب قفقازی مخصوص', 'خیییییییییییییلی خوشمزه', '62000', '612413946f92e.jpg'),
(27, 56, 'دوغ سنتی به تک', 'بدون گاز و همراه با سبزیجات محلی', '20000', '612413e0d4f23.jpg'),
(28, 56, 'نوشابه خانواده مشکی پپسی', 'مارک پرطرفدار و بینظیر پپسی', '15000', '61241417452d2.jpg'),
(29, 59, 'bd', 'fddddddddd', '10000', '6128b6b197817.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

DROP TABLE IF EXISTS `remark`;
CREATE TABLE IF NOT EXISTS `remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` longtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(71, 41, 'in process', 'ffdhfhdfdhfdhfhddfh', '2021-07-24 00:07:56'),
(72, 41, 'closed', 'dfhfhddfhfdh', '2021-07-24 00:08:15'),
(73, 37, 'rejected', 'فثثفثفثفصثفصثفص', '2021-08-12 17:24:49'),
(74, 42, 'closed', 'ابابابابلابااااببل', '2021-08-13 09:28:58'),
(75, 42, 'closed', 'ابابابابلابااااببل', '2021-08-13 09:29:48'),
(76, 56, 'closed', 'زذطططططططططططططططططططط', '2021-08-15 21:21:38'),
(77, 71, 'closed', 'fdhhhhhhhhhhhhhhhhhhhh', '2021-08-24 19:58:45'),
(78, 127, 'in process', 'ujujujujujujujujuj', '2021-08-26 21:07:33'),
(79, 127, 'closed', 'hhhhhhhhhhhhhhfd', '2021-08-26 21:08:21'),
(80, 127, 'closed', 'یسررررررررررر', '2021-08-26 21:21:35'),
(81, 127, 'rejected', 'ghgffffffffffffff', '2021-08-27 07:02:57'),
(82, 127, 'in process', 'تئدوئ', '2021-08-27 07:21:12'),
(83, 129, 'in process', 'لطفا صبر نمایید', '2021-08-27 13:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `rs_id` int(222) NOT NULL AUTO_INCREMENT,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` longtext NOT NULL,
  `image` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(54, 1, 'رستوران رضا', 'rezarest8541@gmail.com', '9132569871', '11am', '8pm', '--روزهای مورد نظر را انتخاب کنید--', 'تهران ، خیابان شریعتی ، کوچه رخشان ،نبش اداره بیمه تامین اجتماعی', '6118430cc3b3d.jpg', '2021-08-14 22:26:20'),
(55, 1, 'باغچه رستوران پدیده آفتاب', 'padideaftab148@gmail.com', '9908102687', '8am', '8pm', 'shanbe-jome', 'تهران ، خیابان کاظمی ، کوچه فرحزاد ، روبروی شهرداری', '6118439a6ada7.jpg', '2021-08-14 22:28:42'),
(56, 1, 'رستوران پدر سالار', 'restpedarsalar@yahoo.com', '9936587410', '6am', '8pm', 'shanbe-panjshanbe', 'تهران ، خیابان فتاحی ، کوی حشمتی ، جنب آتش نشانی', '6118442fdf22f.jpg', '2021-08-14 22:31:11'),
(57, 1, 'رستوران غنچه', 'qonchee4789@gmail.com', '9137174895', '10am', '7pm', 'shanbe-chaharshanbe', 'تهران ، میدان آرژانتین ، روبهروی فلکه اصلی', '611844a1ad483.jpg', '2021-08-14 22:33:05'),
(58, 2, 'فست فود پیانو', 'pianofastfood47@gmail.com', '9132568741', '11am', '6pm', 'shanbe-jome', 'تهران ، خیابان ملک ، کوچه رز ، جنب بانک انصار', '6118451548e1a.jpg', '2021-08-14 22:35:01'),
(59, 2, 'فست فود دومینو', 'fastdomiino@gmail.com', '9132580123', '8am', '5pm', 'shanbe-chaharshanbe', 'تهران ، خیابان شهیدی جنب آموزشگاه رانندگی پردیس', '6118460360080.jpg', '2021-08-14 22:38:59'),
(60, 3, 'غذای دریایی SEA FOOD', 'seafood5@yahoo.com', '9925897430', '10am', '8pm', 'shanbe-panjshanbe', 'تهران ، خیابان بنفشه ، نبش سه راه', '611846c1b379c.jpg', '2021-08-14 22:42:09'),
(61, 10, 'جگرسرای کندو', 'kandoo58901@yahoo.com', '9130314700', '7am', '3pm', 'shanbe-chaharshanbe', 'تهران ، خیابان رفیعی ، جنب بانک ملی', '611847dc39c2f.jpg', '2021-08-14 22:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

DROP TABLE IF EXISTS `res_category`;
CREATE TABLE IF NOT EXISTS `res_category` (
  `c_id` int(222) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'کبابی و سنتی', '2021-08-12 16:24:04'),
(2, 'فست فود', '2021-08-13 09:44:34'),
(3, 'دریایی', '2021-08-12 16:21:59'),
(10, 'جگرکی', '2021-08-12 18:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` longtext NOT NULL,
  `status` int(222) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'alireza-guest', 'علیرضا', 'محمودی', 'alireza-guest@gmail.com', '9137174852', '12345678', 'اصفهان', 0, '2021-08-27 10:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

DROP TABLE IF EXISTS `users_orders`;
CREATE TABLE IF NOT EXISTS `users_orders` (
  `o_id` int(222) NOT NULL AUTO_INCREMENT,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(87, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 21:49:15'),
(88, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 21:49:15'),
(89, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 21:49:18'),
(90, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 21:49:18'),
(91, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 21:49:19'),
(92, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 21:49:19'),
(93, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 21:49:21'),
(94, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 21:49:21'),
(95, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 21:49:22'),
(96, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 21:49:22'),
(97, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 21:59:38'),
(98, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 21:59:38'),
(99, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:05:47'),
(100, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:05:47'),
(101, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:06:50'),
(102, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:06:50'),
(103, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:07:22'),
(104, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:07:22'),
(105, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:18:22'),
(106, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:18:22'),
(107, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:21:56'),
(108, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:21:56'),
(109, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:23:51'),
(110, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:23:51'),
(111, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:25:00'),
(112, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-25 22:25:00'),
(113, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:45:37'),
(114, 47, 'چلوکباب برگ', 1, '87000', NULL, '2021-08-25 22:48:24'),
(115, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-26 07:32:41'),
(116, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-26 07:33:34'),
(117, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-26 09:23:01'),
(118, 47, 'خوراک کباب کوبیده دو سیخ مخصوص سرآشپز', 1, '35000', NULL, '2021-08-26 09:23:01'),
(119, 47, 'دوغ سنتی به تک', 1, '20000', NULL, '2021-08-26 09:23:01'),
(120, 47, 'چلو ماهی قزل', 1, '50000', NULL, '2021-08-26 09:23:01'),
(121, 47, 'نوشابه خانواده مشکی پپسی', 21, '15000', NULL, '2021-08-26 09:23:01'),
(122, 47, 'خوراک کباب کوبیده دو سیخ مخصوص سرآشپز', 1, '35000', NULL, '2021-08-26 12:11:32'),
(123, 47, 'دوغ سنتی به تک', 1, '20000', NULL, '2021-08-26 12:11:32'),
(124, 47, 'چلو ماهی قزل', 2, '50000', NULL, '2021-08-26 12:11:33'),
(125, 47, 'نوشابه خانواده مشکی پپسی', 2, '15000', NULL, '2021-08-26 12:11:33'),
(126, 47, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-26 20:23:35'),
(127, 1, 'چنجه مخصوص سرآشپز', 1, '65000', 'in process', '2021-08-27 07:21:12'),
(128, 1, 'چلو کباب قفقازی مخصوص', 1, '62000', NULL, '2021-08-27 07:18:01'),
(129, 1, 'چلوکباب برگ', 2, '87000', 'in process', '2021-08-27 13:02:42'),
(130, 1, 'چنجه مخصوص سرآشپز', 1, '65000', NULL, '2021-08-27 16:10:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
