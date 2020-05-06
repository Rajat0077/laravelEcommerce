-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 06:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelecomm`
--

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
(7, '2020_04_23_115428_create_tbl_admin_table', 1),
(8, '2020_04_24_072409_create_tbl_Category_table', 1),
(9, '2020_04_26_144350_create_manufacture_table', 1),
(10, '2020_04_27_115016_create_tbl_product_table', 2),
(11, '2020_04_27_120217_create_tbl_product_item', 2),
(12, '2020_04_28_194223_create_tbl_test_img_table', 3),
(13, '2020_05_02_141607_create_tbl_slider_table', 4),
(14, '2020_05_04_031224_create_tbl_customer_table', 5),
(15, '2020_05_04_145030_create_tbl_shipping_table', 6),
(16, '2020_05_04_150108_add_shipping_city_column_to_tbl_shipping_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Laptop Description', 0, NULL, NULL),
(2, 'Electronics', 'Electronics Gadget', 0, NULL, NULL),
(3, 'Clothes', 'Clothes Description Here', 0, NULL, NULL),
(4, 'Test One', 'Test Case One', NULL, NULL, NULL),
(5, 'Test Two', 'Test Two Description', 0, NULL, NULL),
(6, 'Test Three', 'Test Three description', NULL, NULL, NULL),
(7, 'Test Four', 'Test Four Description', 0, NULL, NULL),
(8, 'Man', 'All products will Come Under in this Section', 1, NULL, NULL),
(9, 'Woman', 'All Woman Clothes Will Come in this Departments Only ...', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `password`, `mobile_number`, `created_at`, `updated_at`) VALUES
(1, 'Rajat Singh', 'aba@gmail.com', '123', '9711461442', NULL, NULL),
(2, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '9711461442', NULL, NULL),
(5, 'admin1', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', '911461442', NULL, NULL),
(6, 'admin2', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', '9711461442', NULL, NULL),
(7, 'admin4', 'admin4@gmail.com', 'fc1ebc848e31e0a68e868432225e3c82', '9711461442', NULL, NULL),
(8, 'admin5', 'admin5@gmail.com', '26a91342190d515231d7238b0c5438e1', '9711461442', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(5, 'Nike', 'Nike For Clothes Brand', 0, NULL, NULL),
(6, 'Reebok', 'Reebok Description Will Come Here', 0, NULL, NULL),
(8, 'Apple', 'Apple Invests Thousands of Core in Their research Team .', 0, NULL, NULL),
(9, 'Zara Man', 'Zara Man Clothes Will Come in this Section', 1, NULL, NULL),
(10, 'Zara WoMan', 'Zara Man Clothes Will Come in this Section', 1, NULL, NULL),
(11, 'United Colors Of Benetton', 'United Colors Of Benetton Clothes', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_item`
--

CREATE TABLE `tbl_product_item` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_item`
--

INSERT INTO `tbl_product_item` (`product_id`, `category_id`, `manufacture_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(4, 1, 6, 'Name One', 'Short Desctipion', 'LongDesctipion', '420', '1588250265minion.jpg', 'Large', 'Green', 0, NULL, NULL),
(5, 2, 6, 'Bat and Ball', 'This is Kit For Cricket Purpose Only . (Short Description)', 'This is Kit For Cricket Purpose Only . (Long Description)', '2400', '1588258914jpg-to-webp-1-1.jpg', 'Extra Small', 'Blue And Red', 0, NULL, NULL),
(7, 2, 5, 'Lion Image', 'this product is lion Product having Short Description .', 'this product is lion Product having LONG Description .', '548', '1588334310240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', 'Extra Small', 'Green', 0, NULL, NULL),
(8, 1, 5, 'test one', 'test one', 'test one', '988', '158833439126400477-portrait-of-huge-beautiful-male-african-lion-against-black-background.jpg', 'test one', 'test one', 0, NULL, NULL),
(9, 8, 9, 'Shirt By Zara', 'Zara man Tshirt For Man Only', 'Nil', '5000', '1588454190gallery2.jpg', 'Large', 'Yellow', 1, NULL, NULL),
(10, 9, 10, 'Zara Woman', 'Zara Woman Tshirt Here.', 'Nil', '5200', '1588454250gallery4.jpg', 'Xtra Small', 'Medium', 1, NULL, NULL),
(11, 8, 11, 'United Colors Of Benetton', 'Test For UCB', 'Test For United Colors Of Benetton', '550', '1588551146product2.jpg', 'Large', 'Green', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `shipping_telephone`, `shipping_email`, `created_at`, `updated_at`, `shipping_city`) VALUES
(1, 'Rajat', 'Singh', 'ManSingh Road', '9711111111', 'abc@gmail.com', NULL, NULL, 'East Delhi'),
(2, 'Rajat', 'Singh', 'ManSingh Road', '9711111111', 'abc@gmail.com', NULL, NULL, 'East Delhi'),
(3, 'asd', 'asd', 'asd', 'asd', 'asd', NULL, NULL, 'asd'),
(4, 'Rajat', 'Singh', 'ManSingh Road', '9711111111', 'abc@gmail.com', NULL, NULL, 'East Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `slider_img`, `published_status`, `created_at`, `updated_at`) VALUES
(1, '240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', 0, NULL, NULL),
(2, 'photo-1533450718592-29d45635f0a9.jpg', 0, NULL, NULL),
(3, 'minion.jpg', 0, NULL, NULL),
(6, 'girl1.jpg', 1, NULL, NULL),
(7, 'girl2.jpg', 1, NULL, NULL),
(8, 'girl3.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_img`
--

CREATE TABLE `tbl_test_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_test_img`
--

INSERT INTO `tbl_test_img` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1588193771240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', NULL, NULL),
(2, '1588193863240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', NULL, NULL),
(3, '158842929981hW3HiNeCL._SY679_.jpg', NULL, NULL),
(4, '1588429751240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test_img`
--
ALTER TABLE `tbl_test_img`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product_item`
--
ALTER TABLE `tbl_product_item`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_test_img`
--
ALTER TABLE `tbl_test_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
