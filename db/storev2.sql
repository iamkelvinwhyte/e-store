-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2021 at 08:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(80) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `position` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `image`, `position`) VALUES
(15, 'Dress', 'null', 1),
(16, 'Short ', 'null', 2);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(30) NOT NULL,
  `store_vid` varchar(30) NOT NULL,
  `c_title` varchar(100) NOT NULL,
  `c_code` varchar(80) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `free_ship` tinyint(1) NOT NULL,
  `qty` int(50) NOT NULL,
  `discount_type` int(20) NOT NULL,
  `value_discount` int(20) NOT NULL,
  `c_status` tinyint(1) NOT NULL,
  `per_limit` int(20) NOT NULL,
  `per_cus` int(20) NOT NULL,
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `store_vid`, `c_title`, `c_code`, `s_date`, `e_date`, `free_ship`, `qty`, `discount_type`, `value_discount`, `c_status`, `per_limit`, `per_cus`, `c_date`) VALUES
(2, '', 'k', 'k', '2021-02-01', '2021-02-02', 0, 9, 2, 0, 0, 8, 9, '2021-02-01'),
(3, '', 'k', 'l', '2021-02-02', '2021-02-03', 0, 9, 1, 10, 0, 0, 0, '2021-02-01'),
(4, '', 'uuu', 'kkk', '2021-02-01', '2021-02-09', 0, 6, 1, 8, 0, 0, 0, '2021-02-01'),
(5, '', 'a', 'a', '2021-02-01', '2021-02-02', 0, 1, 1, 4, 1, 0, 0, '2021-02-01'),
(6, '', 'aaaKevin0990', '345678', '2021-02-01', '2021-02-10', 1, 5, 1, 6, 1, 0, 0, '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `in_setting`
--

CREATE TABLE `in_setting` (
  `id` int(20) NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `meta_des` varchar(200) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_setting`
--

INSERT INTO `in_setting` (`id`, `site_name`, `url`, `phone`, `email`, `address`, `meta_des`, `meta_title`, `tags`) VALUES
(1, 'StoreV2', 'http://localhost/storev2/v2/main/system_setting', '07063047170', 'xsaytech@gmail.com', 'Abuja FCT, NIgeria', 'Online Store', 'Online Store', 'sale,store');

-- --------------------------------------------------------

--
-- Table structure for table `in_store`
--

CREATE TABLE `in_store` (
  `in_store_id` int(50) NOT NULL,
  `store_vid` varchar(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `in_phone` varchar(20) NOT NULL,
  `in_email` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `in_logo` varchar(25) NOT NULL,
  `in_color` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_store`
--

INSERT INTO `in_store` (`in_store_id`, `store_vid`, `store_name`, `in_phone`, `in_email`, `address`, `status`, `in_logo`, `in_color`, `date`) VALUES
(1, 'X098673527', 'MATIDOX', '+234 08136761111', 'info@matidox.com', 'Suit A5 new world plaza building material ogidi kilometer 9 onitsha Enugu express way ogidi , Anambra state ,Nigeria', 0, 'logo.png', 'DarkRed', '2020-05-05 02:45:54'),
(2, 'X97630087', 'BETRIXY INTEGRATED SERVICES LAGOS', '0704367378', 'info@betrixyservices.com', 'Departure Hall, Nnamdi Azikiwe Airport Deomestic Terminal B lagos', 0, '', 'Blue', '2019-08-13 14:19:56'),
(3, 'X723344287', 'BETRIXY INTEGRATED SERVICES -ABUJA II', '09060001732', 'info@betrixyservices.com', 'Nnamdi Azikiwe Airport  Abuja', 0, '', 'Blue', '2019-08-13 14:19:25'),
(4, 'X741982688', 'BETRIXY INTEGRATED SERVICES -LAGOS II', '09099999912', 'info@betrixyservices.com', 'Lagos', 0, '', 'Blue', '2019-08-13 14:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE `login_session` (
  `login_session_id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `store_vid` varchar(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enter_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`login_session_id`, `personal_info_id`, `store_vid`, `token`, `email`, `enter_on`, `active`) VALUES
(0, 2, 'X098673527', '7b8319d448727d27623db54e794c248f', 'admin@stregishotelsandresorts.com', '2019-03-30 15:06:20', '1'),
(0, 5, '', 'a1049e3957c4f00ea21562369b0f52f0', 'xsaysoft@gmail.com', '2018-04-17 20:00:52', '1'),
(0, 8, 'X098673527', '7b04379dcc82afb1620ab6622f4f6c60', 'joyceogbelde48@gmail.com', '2018-11-11 18:50:38', '1'),
(0, 10, 'X098673527', '3bf71665d0d62a947f4494c38b8879d5', 'gloryngenge@gmail.com', '2018-11-11 18:00:19', '1'),
(0, 11, 'X098673527', 'b1ebcc9cb479c024223814a892017aa9', 'frontdesk1@stregishotelsandresorts.com', '2019-01-18 16:03:24', '1'),
(0, 12, 'X098673527', 'b0a172fdec1e88a21ae036d2c20fc9ac', 'frontdesk2@stregishotelsandresorts.com', '2019-03-05 17:32:43', '1'),
(0, 13, 'X098673527', '2d1e89ace91394fd5619968cf56db611', 'rsupervisor@stregishotelsandresorts.com', '2018-12-23 06:55:25', '1'),
(0, 15, 'X098673527', '5d5519483a30dac6425d1feb31c4038e', 'barres1@stregishotelsandresorts.com', '2018-12-15 16:29:58', '1'),
(0, 17, 'X098673527', 'ad63cb0de824564740abcef7b15b6b55', 'rsupervisor1@stregishotelsandresorts.com', '2019-03-24 21:15:13', '1'),
(0, 18, 'X098673527', '3999225db548b06a82b1ece0a88220ce', 'manager@stregishotelsandresorts.com', '2018-11-20 08:56:28', '1'),
(0, 20, 'X098673527', 'b1dc748cf78dab85fdf87fac52ea3e9c', 'winifred.tony@gmail.com', '2018-12-28 19:15:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(20) NOT NULL,
  `page_code` varchar(200) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `page_des` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_des` text NOT NULL,
  `page_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `page_code`, `page_name`, `page_des`, `meta_title`, `meta_des`, `page_status`) VALUES
(2, '8d440c90b0c0958e981c9b4b151e48', 'About us', '<p>About us<br />\r\n&nbsp;</p>\r\n', 'new about', 'about info', 1),
(8, '8915a091d60008e7d2ff98f12fb0a7', 'contact us', '<p>New Contact page us</p>\r\n', 'contact', 'contactus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissions_id` int(20) NOT NULL,
  `institution_id` varchar(30) NOT NULL,
  `add_product` tinyint(1) NOT NULL,
  `update_product` tinyint(1) NOT NULL,
  `delete_product` tinyint(1) NOT NULL,
  `coupon` tinyint(1) NOT NULL,
  `setting` tinyint(1) NOT NULL,
  `users` tinyint(1) NOT NULL,
  `vendors` tinyint(1) NOT NULL,
  `pages` tinyint(1) NOT NULL,
  `sales` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissions_id`, `institution_id`, `add_product`, `update_product`, `delete_product`, `coupon`, `setting`, `users`, `vendors`, `pages`, `sales`) VALUES
(1, '3e999fb5818b31b09900', 1, 1, 0, 1, 0, 1, 1, 1, 1),
(4, '16122353673dcc48843a425d', 1, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `personal_info_id` int(25) NOT NULL,
  `institution_id` varchar(25) NOT NULL,
  `store_vid` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `temp_password` varchar(25) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `enter_by` varchar(200) NOT NULL,
  `enter_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(200) NOT NULL,
  `locked` int(11) NOT NULL,
  `first_login` int(20) NOT NULL,
  `email_validated` varchar(200) NOT NULL,
  `phone_validated` varchar(200) NOT NULL,
  `approve_by` varchar(50) NOT NULL,
  `approve_on` varchar(50) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `menu` text NOT NULL,
  `deactivation_reason` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`personal_info_id`, `institution_id`, `store_vid`, `name`, `phone`, `email`, `password`, `temp_password`, `active`, `enter_by`, `enter_on`, `modified_by`, `locked`, `first_login`, `email_validated`, `phone_validated`, `approve_by`, `approve_on`, `account_type`, `menu`, `deactivation_reason`, `date`) VALUES
(11, '3e999fb5818b31b09900', '', 'kevin doe', '34567890', 'xsaytech@gmail.com', '$2y$10$2Esc6ohr9QItdeR/Idxeu.z8QY3Eal/qPJ7B9ZXAno1ZmLtPITjPG', '', 1, '', '2021-02-02 00:48:43', '', 0, 0, '', '', '', '', 'A1', '', '', '2021-02-02 00:48:43'),
(14, '16122353673dcc48843a425d', '', 'VENDOR 1', '07063047170', 'Daniel.Depiver@gmail.com', '$2y$10$DBxKuzPZjjWjt4KLP1lpzONBGjgZwCGthkiJHLKg4L7.q2T1tEzgO', '', 0, '', '2021-02-02 03:09:27', '', 0, 0, '', '', '', '', 'V1', '', '', '2021-02-02 03:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `store_vid` varchar(30) NOT NULL,
  `institution_id` varchar(80) NOT NULL,
  `category_id` int(20) NOT NULL,
  `sub_category_id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `qty` int(20) NOT NULL,
  `price` int(50) NOT NULL,
  `discount` int(80) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `descrip` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `out_stock_status` tinyint(1) NOT NULL,
  `file` varchar(200) NOT NULL,
  `file_1` varchar(200) NOT NULL,
  `file_2` varchar(200) NOT NULL,
  `file_3` varchar(200) NOT NULL,
  `file_4` varchar(200) NOT NULL,
  `file_5` varchar(200) NOT NULL,
  `product_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `store_vid`, `institution_id`, `category_id`, `sub_category_id`, `title`, `qty`, `price`, `discount`, `color`, `size`, `descrip`, `status`, `out_stock_status`, `file`, `file_1`, `file_2`, `file_3`, `file_4`, `file_5`, `product_date`) VALUES
(3, 'a80334af1613181726', '', '3e999fb5818b31b09900', 15, 0, 'Jennt Easy GirlEasy Girl', 10, 60000, 7000, 'red', 'L,XL,XXL', 'JENNT EASY GIRLEASY GIRL Source: http://localhost/storev2/v2/app/shop_page/a80334af1613181726 CubeCreation © All Right Reserved', 0, 0, '41a5d69e1613181726.jpg', 'ab058ed11613181726.jpg', '', '', '', '', '2021-02-13'),
(4, '540830ea1613181819', '', '3e999fb5818b31b09900', 15, 0, 'Easy Girl', 10, 70000, 420, 'black', 'L,XL,XXL', '', 0, 0, 'cf8f5f361613181819.jpg', 'ec518edf1613181819.jpg', '', '', '', '', '2021-02-13'),
(5, 'e790644b1613181823', '', '3e999fb5818b31b09900', 15, 0, 'Easy Girl', 10, 70000, 420, 'black', 'L,XL,XXL', '', 0, 0, 'b9507bc11613181823.jpg', '2279b7141613181823.jpg', '', '', '', '', '2021-02-13'),
(6, '8a23f6aa1613184142', '', '3e999fb5818b31b09900', 15, 0, 'UNTAMED SHIRTDRESS', 10, 60000, 300, 'Red,Black,White', 'L,XL,XXL', '', 0, 0, 'c1e3ad5f1613184142.jpg', '5b7f77311613184142.jpg', '', '', '', '', '2021-02-13'),
(16, '58200c2b1613644320', '', '3e999fb5818b31b09900', 15, 0, 'TIKKI', 1, 60000, 60, 'Red,Black,White', 'L,XL,XXL', 'TIKKI', 1, 0, '819803cd1613644320.jpg', '0de1a03c1613644320.jpg', '', '', '', '', '2021-02-18'),
(17, 'cdd6daba1613644350', '', '3e999fb5818b31b09900', 15, 0, 'UNTAMED SHIRTDRESS', 1, 60000, 60, 'Red,Black,White', 'L,XL,XXL', 'UNTAMED SHIRTDRESS', 1, 0, '8f7acbca1613644350.jpg', '964e47bc1613644350.jpg', '', '', '', '', '2021-02-18'),
(18, '1fa3d5211613644371', '', '3e999fb5818b31b09900', 15, 0, 'SHIRTDRESS', 1, 60000, 60, 'Red,Black,White', 'L,XL,XXL', 'UNTAMED SHIRTDRESS', 1, 0, '340e56261613644371.jpg', 'b24b50161613644371.jpg', '', '', '', '', '2021-02-18'),
(22, '95c0306a1613647105', '', '3e999fb5818b31b09900', 15, 0, 'BROWN', 1, 60000, 666, 'Red,Black,White', 'L,XL,XXL', 'BROWN', 1, 0, '7bb87e761613647105.jpg', 'c6afb5941613647105.jpg', '', '', '', '', '2021-02-18'),
(23, '5293a7721613647354', '', '3e999fb5818b31b09900', 15, 0, 'CARRIBEAN BROWN', 1, 60000, 666, 'Red,Black,White', 'L,XL,XXL', 'CARRIBEAN BROWN', 1, 0, '617bc8a01613647354.jpg', 'a2f4a72d1613647354.jpg', '', '', '', '', '2021-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TokenID` text COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `countrya` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `TokenID`, `activation_code`, `created`, `modified`, `status`, `countrya`, `state`, `address`, `post_code`) VALUES
(1, 'kevin', 'xsay tech', 'xsaytech@gmail.com', '123456', '', '', '1496701444', '2019-04-15 17:32:40', '0000-00-00 00:00:00', '1', '', '', '', ''),
(2, 'ODAFE', 'KEVIN', 'admin@stregishotelsandresorts.com', '$2y$10$eXflVPA./U15iU3odA', '403815952', '', '', '2019-07-24 13:37:42', '0000-00-00 00:00:00', '1', '', '', '', ''),
(3, '', '', '', '$2y$10$3lmRbyLU8hbtO2pbHm', '', '', '', '2019-07-24 14:38:02', '0000-00-00 00:00:00', '1', '', '', '', ''),
(4, 'ODAFE', 'KEVIN', 'xsaysoft@gmail.com', '$2y$10$j.x.8OlAmbJNCkMgAY', '403815952', '', '', '2019-07-24 15:01:30', '0000-00-00 00:00:00', '1', '', '', '', ''),
(5, 'Olumide', 'adeniran', 'ceo@midejet.com', 'Password1', '', '', '', '2019-09-03 19:29:03', '0000-00-00 00:00:00', '1', '', '', '', ''),
(6, 'may', 'osama', 'mayosama1005@gmail.com', 'may0sama££', '', '', '', '2019-09-09 08:16:33', '0000-00-00 00:00:00', '1', '', '', '', ''),
(7, 'Roland', 'Albert', 'rialbert001@gmail.com', 'specialuno', '', '', '', '2020-01-12 17:01:08', '0000-00-00 00:00:00', '1', '', '', '', ''),
(8, 'sophia', 'osama', 'osamatochukwu@gmail.com', 'sopha0sama', '', '', '', '2020-01-13 13:31:28', '0000-00-00 00:00:00', '1', '', '', '', ''),
(9, 'Ifeoma', 'Elem', 'ifyosama@gmail.com', 'tmo', '', '', '', '2020-01-13 16:26:54', '0000-00-00 00:00:00', '1', '', '', '', ''),
(11, 'Mohahed', 'Tech', 'xsaytech356@gmail.com', '$2y$10$MgaDoUyahR.Kjp3Ez.ZwdOkr9jEowdtFvuCBxRIZZK6rqv2nb9OMS', '', '', '', '2021-02-18 08:04:18', '0000-00-00 00:00:00', '1', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `in_setting`
--
ALTER TABLE `in_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_store`
--
ALTER TABLE `in_store`
  ADD PRIMARY KEY (`in_store_id`);

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD PRIMARY KEY (`personal_info_id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissions_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`personal_info_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `in_store`
--
ALTER TABLE `in_store`
  MODIFY `in_store_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissions_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `personal_info_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
