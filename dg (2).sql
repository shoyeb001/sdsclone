-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 07:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dg`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Inactive','Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`, `updated_at`, `status`) VALUES
(6, 'SS Colored Steel', NULL, '2021-10-24 01:55:36', '2021-10-24 04:00:08', 'Active'),
(7, 'No Colored Still', NULL, '2021-10-24 01:56:14', '2021-10-24 01:56:14', 'Active'),
(8, 'Demo', NULL, '2021-10-24 01:56:30', '2021-10-24 01:56:30', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('InActive','Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `is_slider` enum('InActive','Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `gallery`, `status`, `is_slider`, `created_at`, `updated_at`) VALUES
(1, 'Dibyendu Ghosh', '[\"20210914064338.jpg\"]', 'InActive', 'Active', '2021-09-14 01:13:38', '2021-09-14 02:01:47'),
(2, 'Dibyendu', '[\"20210914084012.jpg\",\"20210914084012.jpg\",\"20210914084012.png\",\"20210914084012.jpg\"]', 'Active', 'Active', '2021-09-14 03:10:12', '2021-09-14 03:10:12'),
(3, 'Stainless Steel A Profile', '[\"b81820b4f999b1546eacaa2823f9c0fc.jpg\"]', 'Active', 'Active', '2021-10-25 04:34:02', '2021-10-25 04:34:02'),
(4, 'Colored Steel', '[\"44d568bb7b5a8203cb275b9d27d02eaf.jpg\"]', 'Active', 'Active', '2021-10-25 04:34:31', '2021-10-25 04:34:31'),
(5, 'Un Colored Steel', '[\"901d7cc39b734b15964792bffe923e83.jpeg\"]', 'Active', 'Active', '2021-10-25 04:35:06', '2021-10-25 04:35:06'),
(6, 'Stainless Steel A Profile', '[\"c64ec3e61d86680ee6acc56ad413aed2.jpg\"]', 'Active', 'Active', '2021-10-25 04:37:40', '2021-10-25 04:37:40'),
(7, 'SS Colored Steel', '[\"3df80312160d74b318bb13d7875c6d84.jpg\"]', 'Active', 'Active', '2021-10-25 04:38:04', '2021-10-25 04:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `company_name`, `company_logo`, `address`, `city`, `state`, `country`, `phone`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 'DG', 'logo.jpg', 'dd', 'dd', 'dd', 'dd', '12315', 'dg@gmail.com', 'sss', NULL, '2021-10-28 01:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_05_091902_create_users_table', 1),
(2, '2021_07_05_092502_create_category_table', 1),
(3, '2021_07_05_092527_create_products_table', 1),
(4, '2021_07_05_094714_create_company_setting_table', 1),
(8, '2021_07_05_105847_create_general_setting_table', 2),
(9, '2021_07_06_065637_create_users_table', 2),
(11, '2021_09_14_060107_create_gallery_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('InActive','Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `gallery`, `created_at`, `updated_at`, `status`, `type`, `price`, `description`) VALUES
(14, 'Decorative Steel Special Stainless Design', 'SS Colored Steel', '[\"aceb089d649769a73acceef22d89bbe6.jpg\"]', '2021-10-24 03:40:50', '2021-11-08 10:41:01', 'Active', '3', 130.5, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global  Stainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(15, 'Colored Stainless Steel Profile', 'SS Colored Steel', '[\"2c1c55a60b6e7d0199b88975826b2deb.jpg\"]', '2021-10-24 03:42:17', '2021-11-08 10:41:26', 'Active', '3', 300, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global  Stainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(16, 'Decorative SS Profile', 'No Colored Still', '[\"8998ada3301d769582d1d42a8b376e75.jpg\"]', '2021-10-24 03:43:09', '2021-11-08 10:41:37', 'Active', '2', 300, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global  Stainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(17, 'Decorative SS 304 Profile', 'No Colored Still', '[\"4a6b4db50fc721049147dd744b33c091.jpg\"]', '2021-10-24 03:44:01', '2021-11-08 10:41:49', 'Active', '2', 250, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(18, 'Decorative Stainless Steel T- Patti', 'No Colored Still', '[\"7f9a3ae1788dd58314be584e1ce724d6.jpg\"]', '2021-10-24 03:46:18', '2021-11-08 10:42:09', 'Active', '2', 240, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(19, 'Decorative Stainless Stell Demo', 'Demo', '[\"31ba3f10cc22b073db487d56c7109e63.jpeg\",\"649bd3824190285f1d4a50a858f1ac77.jpg\"]', '2021-10-24 03:51:59', '2021-10-25 10:10:54', 'Active', '2', 140, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(20, 'Sainless Steel Decorative Colored', 'No Colored Still', '[\"fae0ca1df179984ee45d69e5b74063eb.jpg\",\"0c64ad41f7a6393ef959e4e0cdaefefe.jpg\",\"072e2c56e455d114cdce7a2091ea00ff.jpg\",\"ab55fea4ef4cecce20c61b815bba1913.jpg\"]', '2021-10-24 03:52:38', '2021-10-25 10:11:21', 'Active', '3', 140, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(21, 'Best Stainless Steel SS Colored', 'SS Colored Steel', '[\"3b0379f04ed53a303cfaf7c8535f684c.jpeg\"]', '2021-10-24 03:53:15', '2021-10-25 10:11:47', 'Active', '2', 140, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(22, 'Non Colored Stainless Steel', 'No Colored Still', '[\"5a7b5144eb81ec5555ee97faae935659.jpg\",\"ad514ac6dd27225f51f671ad9510ecd5.jpg\",\"d566e806728887072393385dd1ed0218.jpg\"]', '2021-10-24 03:53:50', '2021-10-25 10:12:13', 'Active', '3', 140.5, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(23, 'Sainless Steel C Profile', 'Demo', '[\"58f2a8920f40d2533250b7f428b9140b.jpeg\"]', '2021-10-24 03:54:47', '2021-10-25 10:12:37', 'Active', '3', 147, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(24, 'Stainless Steel A Profile', 'SS Colored Steel', '[\"da5f3e332215bf2fc490e59d9fa6e9ce.jpg\",\"54d872ddfc7775756611dff19d1e3c38.jpeg\"]', '2021-10-24 03:55:18', '2021-10-25 10:13:11', 'Active', '3', 100, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global'),
(25, 'New C-Profile Stainless Steel', 'No Colored Still', '[\"9443aedd8900e629c6379545223f0749.jpg\",\"ea9ce181e4617aef920da1afb0bf589a.jpeg\"]', '2021-10-24 03:56:01', '2021-10-25 10:13:38', 'Active', '3', 140, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(26, 'New D Profile Steel SS Colored', 'SS Colored Steel', '[\"519770068ac8d4cdec4089f22d4bbd12.jpg\",\"103b727dba5d47b9cadb2936a2ee473f.jpg\"]', '2021-10-24 03:56:49', '2021-10-25 10:14:11', 'Active', '3', 170, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(27, 'New Stainless Colored C Profile Steel', 'SS Colored Steel', '[\"379b6fdf4cb42bbc300d790ec2d2813a.jpg\",\"1c862d4e4d19c0e1803ff3b9602041f2.jpg\",\"a0500735fd5542d5743c977a04f2e7d6.jpg\"]', '2021-10-24 03:57:31', '2021-10-25 10:14:33', 'Active', '3', 164, 'Size T starts from 8mm up-to 100mm Luxurious advantage It\'s PVD COATED with physical vapour deposition with titanium gas... It ensures life time colour durability It\'s made from latest updated msi 5 grooved technology assuring best ever quality...with best rate We have regular production of Profiles ensures immediate delivery Our business is global\r\n\r\nStainless steel PVD colour coated Decorative Profile SeriesAwesome bespoke metal decorations for Hospitality, Casino, Shopping Mall, Club, KTV, Luxury Restaurant and Luxury Residential around the world.---Material: 304/316 Stainless Steel or Aluminium---Size: Can be customized---Color: Gold, Rose Gold, Black, Bronze,etc---Shape: Can be customized.'),
(28, 'Stainless Steel D Profile', 'No Colored Still', '[\"6baef582edd7351fa0ce91d35a656c6b.jpg\"]', '2021-10-25 09:52:20', '2021-10-25 09:52:20', 'Active', '3', 230, 'this is thwe jfnh fjbgd gn dijbgndkb njd ngoe hg nsdtugnertrohg srtngmsdn iujbn srstrjkrbnrstjktbn nburtnboirtnj goidfngbjnft doibgnrtrj gngjser ngiede jgjdnbj bseuighe oujg nsdj gdb sdr.'),
(29, 'Still Colored', 'No Colored Still', '[\"71e401e7fc13b000bbf5b8caf5400d43.jpeg\",\"cf4647e1074b0c8597d59e9d30de7f80.jpeg\",\"ee874bbc3456c3b4c8cdcb64b8274785.jpg\"]', '2021-11-08 10:31:27', '2021-11-08 10:31:27', 'Active', '2', 100, 'ukuhkygj yj bvg bn gmvb vbgnfg  bvgth hbety rtbgherthy e46rt y6yh dey  rdrt errg dherey egde yr f  s4tgtghdrt gsertsergt sdetdertgest sertg fghdrtth dfhsege5tgdfgdrtdgrtb y4545yer g rt rtge rert sergsrgser  ser gsetghxdfg.');

-- --------------------------------------------------------

--
-- Table structure for table `shapes`
--

CREATE TABLE `shapes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'T-type', '2021-11-08 10:20:07', '2021-11-08 10:20:07'),
(3, 'T-section', '2021-11-08 10:20:19', '2021-11-08 10:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `profile_photo`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dg', 'dg@gmail.com', '12345', '$2y$12$oJThf3L3tSpRsq5UcEwJe.80w/FKPLllQLinhbaNtEk0f/Fm7kpJi', 'avater.jpg', 'dfsznvc', 'kYx9jrLZUTXYoelasdFbMC5gTz0PdZ5CkNeUtUgTQPKbFpWsDQZYJLltJG2h', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
