-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roof_top`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqueid` varchar(255) DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `appointment_date` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` enum('0','1','2','3','4','5') NOT NULL COMMENT '0 = "Query Booked", 1 = "Pending", 2 = "Assigned", 3 = "Hold", 4 = "Completed" ,5 = "Rejected"',
  `update_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `uniqueid`, `franchise_id`, `name`, `email`, `mobile`, `address`, `pincode`, `city`, `state`, `country`, `appointment_date`, `remarks`, `status`, `update_by`, `created_at`, `updated_at`) VALUES
(31, 'AP000001', NULL, 'Rajiv Kumar', 'rkwps14@gmail.com', '9718392908', 'Gurgaon', '122022', 'Gurgaon', 'Gurgaon', 'India', '2025-04-06 13:52:00', 'test', '2', NULL, '2025-03-29 02:38:07', '2025-04-05 08:22:06'),
(40, 'AP000002', 16, 'Sandesh', 'sandy.panchal96@gmail.com', '7835997232', 'G1, Gurugram, Haryana', '122002', 'Gurgaon', 'Haryana', 'India', '2025-04-13 06:43:00', NULL, '2', NULL, '2025-03-31 07:56:09', '2025-04-11 11:11:48'),
(41, 'AP000003', NULL, 'Sandesh', 'sandy.panchal619@gmail.com', '8767248536', 'Mumbai', '400065', 'mumbai', 'Maharashtra', 'India', NULL, NULL, '1', NULL, '2025-04-03 04:35:27', '2025-04-05 13:51:01'),
(42, 'AP000004', NULL, 'Sandesh', 'sandesh.p@theinspium.com', '8767248536', 'MG Road', '122002', 'Gurgaon', 'Haryana', 'India', '2025-04-30 13:58:00', 'Test 4', '2', NULL, '2025-04-03 04:48:56', '2025-04-05 13:51:22'),
(43, 'AP000005', 13, 'Kamal Anand', 'r2ohit@avignyata.com', '7835997232', '6/115 DDA FLATS, MADANGIR, First Floor', '122022', 'Gurgaon', 'Haryana', 'India', '2025-04-18 21:35:00', NULL, '4', NULL, '2025-04-03 09:40:36', '2025-04-11 01:06:37'),
(44, 'AP000006', NULL, 'Raj Tiwari', 'r1ajtiwariyng@gmail.com', '8754215487', 'akshardham', '110091', 'New Delhi', 'Delhi', 'India', NULL, NULL, '2', NULL, '2025-04-03 10:04:35', '2025-04-09 17:22:00'),
(45, 'AP000007', NULL, 'Raj Tiwari', 'rajt4iwariyng@gmail.com', '8754215487', 'akshardham', '110091', 'New Delhi', 'Delhi', 'India', NULL, NULL, '0', NULL, '2025-04-03 10:41:01', '2025-04-05 07:06:06'),
(46, 'AP000008', NULL, 'Raj Tiwari', 'rajt5iwariyng@gmail.com', '8754215487', 'akshardham', '110091', 'New Delhi', 'Delhi', 'India', NULL, NULL, '0', NULL, '2025-04-03 10:46:08', '2025-04-05 07:06:01'),
(47, 'AP000009', NULL, 'aman', 'aman@gmail.com', '4567654345', 'sector 63 noida', '676767', 'Lucknow', 'Uttar Pradesh', 'India', NULL, NULL, '0', NULL, '2025-04-03 14:03:42', '2025-04-03 14:03:42'),
(48, 'AP000010', 14, 'ram kishan', 'ram@gmail.com', '3456765434', 'kanpur,Uttarpradesh', '122022', 'Kanpur', 'Uttar Pradesh', 'India', '2025-04-10 20:28:00', 'ok done', '2', NULL, '2025-04-03 14:52:25', '2025-04-03 14:58:11'),
(61, 'AP000011', NULL, 'Raj Tiwari', 'rajtiwariyng@gmail.com', '8754215487', 'akshardham', '110096', 'New Delhi', 'Delhi', 'India', NULL, NULL, '0', NULL, '2025-04-05 05:30:37', '2025-04-05 05:30:37'),
(62, 'AP000012', 16, 'Raj Tiwari', 'rajtiwariyng@gmail.com', '7827795334', 'akshardham', '122002', 'Gurgaon', 'Haryana', 'India', '2025-04-16 17:00:00', 'resss', '2', NULL, '2025-04-05 11:28:24', '2025-04-09 17:21:50'),
(63, 'AP000013', NULL, 'Rohit Chandra', 'rohit.chandra96@gmail.com', '7835997232', '6/115 DDA FLATS, MADANGIR, First Floor', '110062', 'Gurgaon', 'Haryana', 'India', NULL, NULL, '0', NULL, '2025-04-07 04:46:25', '2025-04-07 04:46:25'),
(65, 'AP000015', NULL, 'Sagar', 'admin@gmail.com', '9026396212', 'chakeri', '208008', 'Kanpur', 'Uttar Pradesh', 'India', NULL, NULL, '0', NULL, '2025-04-07 06:59:43', '2025-04-07 06:59:43'),
(66, 'AP000016', NULL, 'aman', 'aman@gmail.com', '3424567654', '11 b', '208008', 'Kanpur', 'Uttar Pradesh', 'India', NULL, NULL, '0', NULL, '2025-04-07 08:14:12', '2025-04-07 08:14:12'),
(67, 'AP000017', NULL, 'Yash', 'Yash@gmail.com', '8765678965', '11b Kanpur', '208008', 'Kanpur', 'Uttar Pradesh', 'India', NULL, NULL, '0', NULL, '2025-04-07 08:23:04', '2025-04-07 08:23:04'),
(68, 'AP000018', 13, 'Rohit Chandra', 'rohrit.chandra96@gmail.com', '78359972325', '6/115 DDA FLATS, MADANGIR, First Floor', '122002', 'Gurgaon', 'Haryana', 'India', '2025-04-14 05:35:00', 'Testing 1', '4', NULL, '2025-04-10 00:05:26', '2025-04-11 09:52:09'),
(72, 'AP000019', NULL, 'Ayush', 'ayush@gmail.com', '4656453546', 'Test', '209402', 'Dehradun', 'Uttarakhand', 'India', NULL, NULL, '0', NULL, '2025-04-11 11:41:17', '2025-04-11 11:41:17'),
(73, 'AP000020', NULL, 'Ankit', 'ankit@gmail.com', '6546754646', 'jghgcvbjb', '209402', 'Kanpur', 'Uttar Pradesh', 'India', NULL, NULL, '0', NULL, '2025-04-11 11:47:14', '2025-04-11 11:47:14'),
(74, 'AP000021', 19, 'neha', 'neha@gmail.com', '9067575578', 'sector 63 noida', '209402', 'Kanpur', 'Uttar Pradesh', 'India', '2025-04-18 17:31:00', 'For Test,,,,,,,,,', '3', NULL, '2025-04-11 11:49:31', '2025-04-11 12:26:28'),
(75, 'AP000022', NULL, 'Rohit', 'rohit.c@theinspium.com', '7835997232', '6/115 DDA Flats Madangir', '120002', 'Gurgaon', 'Haryana', 'India', NULL, NULL, '0', NULL, '2025-04-11 11:57:39', '2025-04-11 11:57:39'),
(76, 'AP000023', 13, 'Rohank', 'rohit.chandra96@gmail.com', '7835997232', '6/115 DDA Flats Madangir', '122002', 'Gurgaon', 'Haryana', 'India', '2025-04-24 17:28:00', 'Test', '3', NULL, '2025-04-11 11:58:24', '2025-04-11 12:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Beige & brown', '2024-11-29 02:40:09', '2024-11-29 02:40:09'),
(2, 'Blue', '2024-11-29 02:40:20', '2024-11-29 02:40:20'),
(3, 'Green', '2024-11-29 02:40:25', '2024-11-29 02:40:25'),
(4, 'Grey & Black', '2024-11-29 02:40:31', '2024-11-29 02:40:31'),
(5, 'Metallics', '2024-11-29 02:40:36', '2024-11-29 02:40:36'),
(6, 'Multi coloured', '2024-11-29 02:40:41', '2024-11-29 02:40:41'),
(7, 'Pink, purple & lilac', '2024-11-29 02:40:47', '2024-11-29 02:40:47'),
(8, 'Red & orange', '2024-11-29 02:40:56', '2024-11-29 02:40:56'),
(9, 'White & off white', '2024-11-29 02:41:04', '2024-11-29 02:41:04'),
(10, 'Yellow & Mustard', '2024-11-29 02:41:09', '2024-11-29 02:41:09'),
(11, 'Dark grey', '2024-12-03 21:56:15', '2024-12-03 21:56:15'),
(12, 'Linen', '2024-12-18 06:04:01', '2024-12-18 06:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `compositions`
--

CREATE TABLE `compositions` (
  `id` int(11) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compositions`
--

INSERT INTO `compositions` (`id`, `composition`, `created_at`, `updated_at`) VALUES
(1, 'Cotton Blend', '2024-11-29 02:41:56', '2024-11-29 02:41:56'),
(3, 'Leatherette', '2024-11-29 02:42:06', '2024-11-29 02:42:06'),
(4, 'Linen blend', '2024-11-29 02:42:12', '2024-11-29 02:42:12'),
(5, 'Satin', '2024-11-29 02:42:16', '2024-11-29 02:42:16'),
(6, 'Silk blend', '2024-11-29 02:42:22', '2024-11-29 02:42:22'),
(7, 'Suede', '2024-11-29 02:42:27', '2024-11-29 02:42:27'),
(8, 'Velvet', '2024-11-29 02:42:33', '2024-11-29 02:42:33'),
(9, 'Polyester', '2024-12-12 10:28:37', '2024-12-12 10:28:37'),
(10, 'TEST Again For Edit Btn', '2025-03-28 04:27:36', '2025-03-28 04:27:58'),
(11, 'Teszt', '2025-03-28 04:28:12', '2025-03-28 04:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `coustomers`
--

CREATE TABLE `coustomers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date DEFAULT NULL,
  `coustomer_type` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coustomers`
--

INSERT INTO `coustomers` (`id`, `name`, `phone`, `email`, `address`, `gender`, `dob`, `coustomer_type`, `registration_date`, `created_at`, `updated_at`) VALUES
(1, 'Pavan', '8009636339', 'pavanku80096@gmail.com', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864', 'Male', '2025-03-12', 'New', '2025-04-19', '2025-04-19 01:47:50', '2025-04-19 04:52:37'),
(2, 'Anamika Kumari', '8381802414', 'anamikakushvaha0@gmail.com', 'Bhagwant Nagar, bidarmau Unnao Unnao Uttar Pradesh India, 209864', 'Female', '2016-07-20', 'New', '2025-04-18', '2025-04-19 01:49:40', '2025-04-19 04:25:07'),
(3, 'Pavan Kumar', '6009636339', 'pavanku800f96@gmail.com', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864', 'Male', '2024-09-18', 'Regular', '2025-04-26', '2025-04-19 01:51:49', '2025-04-19 01:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `design_types`
--

CREATE TABLE `design_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `design_types`
--

INSERT INTO `design_types` (`id`, `design_type`, `created_at`, `updated_at`) VALUES
(1, 'Abstract', '2024-11-29 02:43:13', '2024-11-29 02:43:13'),
(2, 'Animal print', '2024-11-29 02:43:19', '2024-11-29 02:43:19'),
(3, 'Animals', '2024-11-29 02:43:24', '2024-11-29 02:43:24'),
(4, 'Birds', '2024-11-29 02:43:29', '2024-11-29 02:43:29'),
(5, 'Butterfly and bugs', '2024-11-29 02:43:37', '2024-11-29 02:43:37'),
(6, 'Checks', '2024-11-29 02:43:42', '2024-11-29 02:43:42'),
(7, 'Damask', '2024-11-29 02:43:50', '2024-11-29 02:43:50'),
(8, 'Dots', '2024-11-29 02:43:57', '2024-11-29 02:43:57'),
(9, 'Embroidery', '2024-11-29 02:44:03', '2024-11-29 02:44:03'),
(10, 'Ethnic', '2024-11-29 02:44:09', '2024-11-29 02:44:09'),
(11, 'Floral', '2024-11-29 02:44:14', '2024-11-29 02:44:14'),
(12, 'Geometries', '2024-11-29 02:44:21', '2024-11-29 02:44:21'),
(13, 'Herring bone and chevron', '2024-11-29 02:44:27', '2024-11-29 02:44:27'),
(14, 'Inkath', '2024-11-29 02:44:34', '2024-11-29 02:44:34'),
(15, 'Leaves', '2024-11-29 02:44:40', '2024-11-29 02:44:40'),
(16, 'Paisley', '2024-11-29 02:44:46', '2024-11-29 02:44:46'),
(17, 'Plains', '2024-11-29 02:44:52', '2024-11-29 02:44:52'),
(18, 'Prints', '2024-11-29 02:44:58', '2024-11-29 02:44:58'),
(19, 'Shells', '2024-11-29 02:45:04', '2024-11-29 02:45:04'),
(20, 'Small prints', '2024-11-29 02:45:10', '2024-11-29 02:45:10'),
(21, 'Stripes', '2024-11-29 02:45:15', '2024-11-29 02:45:15'),
(24, 'TEST', '2025-03-28 04:39:30', '2025-03-28 04:39:43'),
(25, 'Texture', '2025-03-28 04:39:30', '2025-03-28 04:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `employees` varchar(255) DEFAULT NULL,
  `registerationType` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `alt_mobile` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `franchise_id`, `user_id`, `name`, `email`, `employees`, `registerationType`, `mobile`, `alt_mobile`, `company_name`, `address`, `pincode`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(13, 'FR000002', 63, 'Rohit Chandra', 'rkw2ps14@gmail.com', '', 'Individual', '9718392908', '', '', 'MG Road', '122022', 'Gurgaon', 'Haryana', 'India', '2025-03-17 05:04:44', '2025-03-17 05:04:44'),
(14, 'FR000002', 68, 'Manish', 'manish2.kusheldigi53@gmail.com', '', 'Individual', '9026413965', '6743274732', '', 'kanpur,Uttarpradesh', '208008', 'Kanpur', 'Uttar Pradesh', 'India', '2025-03-27 02:21:44', '2025-03-27 02:21:44'),
(16, 'FR000003', 73, 'Raj Tiwari', 'rajtiwariyng@gmail.com', '', 'Individual', '7827795334', '', '', 'Mg Road 35', '122002', 'Gurgaon', 'Haryana', 'India', '2025-04-05 11:26:04', '2025-04-05 11:26:04'),
(17, 'FR000004', 74, 'Sandesh Avignta', 'sandesh.p@theinspium.com', '', 'Individual', '8767248536', '', '', '9A/14, Bhadrapada Nagari Nivara CHS, Plot No. 5-1, NNP, Gen. A.K. Vaidya Marg, Near Infinity IT Park, Goregaon (East)', '400065', 'Mumbai', 'Maharashtra', 'India', '2025-04-06 07:58:33', '2025-04-06 07:58:33'),
(18, 'FR000005', 75, 'Vivek Kumar', 'vivek.k@theinspium.com', '10', 'Company', '9319476620', '', 'IWS', 'S/4 Santosh Kumar Prashad, RZ-A-361, Mahavir Enclave, Part 2, West Delhi', '110045', 'New Delhi', 'Delhi', 'India', '2025-04-06 08:02:56', '2025-04-06 08:02:56'),
(19, 'FR000006', 76, 'sagar', 'sagar.kusheldigisolution@gmail.com', '', 'Individual', '1234567891', '3344456765', '', 'sector 63 noida', '208008', 'Kanpur', 'Uttar Pradesh', 'India', '2025-04-07 08:10:43', '2025-04-07 08:10:43'),
(22, 'FR000007', 93, 'Avinash', 'avinash@gmail.com', '', 'Individual', '5454656656', '7654678765', '', 'hgchbjhvg', '209402', 'Kanpur', 'Uttar Pradesh', 'India', '2025-04-11 11:46:25', '2025-04-11 11:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `franchise_approvas`
--

CREATE TABLE `franchise_approvas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `registration_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchise_temps`
--

CREATE TABLE `franchise_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `registerationType` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `alt_mobile` varchar(255) DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchise_temps`
--

INSERT INTO `franchise_temps` (`id`, `company_name`, `registerationType`, `name`, `email`, `mobile`, `alt_mobile`, `employees`, `address`, `pincode`, `city`, `state`, `country`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Celebal Technologies', 'Company', 'shivendra', 'shiv@gmail.com', '3456543456', '7734567898', 15, 'kanpur,Uttarpradesh', 208008, 'New Delhi', 'Delhi', 'India', 'reject', '2025-03-27 05:50:54', '2025-04-05 02:53:23'),
(9, NULL, 'Individual', 'Sagar Kushwaha', 'sagar.kusheldigisolution@gmail.com', '8888865456', '7654345678', NULL, 'sector 63 noida', 781819, 'Lucknow', 'Uttar Pradesh', 'India', 'reject', '2025-04-03 13:59:31', '2025-04-05 01:20:27'),
(10, NULL, 'Individual', 'Sumit Kumar', 'sumitkumar@gmail.com', '8535444775', '85368741214', NULL, 'noida', 201301, 'Lucknow', 'Uttar Pradesh', 'India', 'reject', '2025-04-05 02:21:09', '2025-04-05 02:34:48'),
(11, NULL, 'Individual', 'aman', 'aman@gmail.com', '9876543456', '8765434567', NULL, 'kanpur,Uttarpradesh', 208008, 'Kanpur', 'Uttar Pradesh', 'India', 'reject', '2025-04-05 03:55:12', '2025-04-05 03:56:09'),
(12, NULL, 'Individual', 'Kajal', 'sagar.kusheldigisolution@gmail.com', '1234567891', '675654575', NULL, 'sector 63 noida', 781819, 'Lucknow', 'Uttar Pradesh', 'India', 'pending', '2025-04-05 08:16:00', '2025-04-05 08:16:00'),
(18, NULL, 'Individual', 'moh', 'admin@gmail.com', '2341546576', '2345678954', NULL, 'gol chakkk', 122002, 'Kanpur', 'Uttar Pradesh', 'India', 'reject', '2025-04-07 07:13:59', '2025-04-11 11:09:40'),
(22, NULL, 'Individual', 'GURU', 'guru123@gmail.com', '1234567890', '1234567898', NULL, 'NOIDA', 229502, 'Veraval', 'Gujarat', 'India', 'pending', '2025-04-17 05:01:29', '2025-04-17 05:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_models`
--

CREATE TABLE `lead_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `is_converted` varchar(255) NOT NULL DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_models`
--

INSERT INTO `lead_models` (`id`, `full_name`, `email`, `phone`, `source`, `assigned_to`, `created_by`, `status`, `is_converted`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Pavan Kumar', 'pavanku80096@gmail.com', '8009636339', 'Website', 1, 94, 'pending', '0', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864\r\nBhagawant Nagar Unnao Utter Pradesh India 209864', '2025-04-21 07:14:21', '2025-04-21 07:14:21', NULL),
(17, 'Pavan Kumar', 'pavanku8002396@gmail.com', '9009636339', 'Website', 1, 94, 'pending', '0', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864\r\nBhagawant Nagar Unnao Utter Pradesh India 209864', '2025-04-21 07:15:40', '2025-04-21 07:15:40', NULL),
(18, 'Pavan Kumar', 'pavank345u80096@gmail.com', '7809636339', 'Referral', 1, 94, 'pending', '1', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864\r\nBhagawant Nagar Unnao Utter Pradesh India 209864', '2025-04-21 07:30:06', '2025-04-21 09:51:44', NULL),
(19, 'Pavan Kumar', 'pavanku96@gmail.com', '3009636339', 'Website', 1, 94, 'pending', '0', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864\r\nBhagawant Nagar Unnao Utter Pradesh India 209864', '2025-04-21 07:57:22', '2025-04-21 07:57:22', NULL),
(20, 'shiva', 'shiva@gmail.com', '1234567890', 'Website', 1, 94, 'pending', '0', 'Bhagwant Nagar, bidarmau Unnao Unnao Uttar Pradesh India, 209864', '2025-04-21 07:59:41', '2025-04-21 07:59:41', NULL),
(21, 'shiva ji rav', 'shiva1@gmail.com', '1234561234', 'Website', 1, 94, 'pending', '1', 'some thing', '2025-04-21 08:09:10', '2025-04-21 08:17:24', NULL),
(22, 'somethibf', 'shjjshj@gmail.com', '1234512345', 'Referral', 1, 94, 'pending', '0', 'Bidarmau Bhagawant Nagar Unnao Utter Pradesh India 209864\r\nBhagawant Nagar Unnao Utter Pradesh India 209864', '2025-04-21 08:12:57', '2025-04-21 08:12:57', NULL),
(23, 'chhotu Pal', 'chhotupal538@gmail.com', '1234123412', 'Website', 1, 94, 'pending', '1', 'noida', '2025-04-21 08:50:10', '2025-04-21 08:50:18', NULL),
(31, 'hari', 'hari@gmail.com', '1234567878', 'Referral', NULL, 94, 'pending', '1', 'noida', '2025-04-22 04:16:03', '2025-04-22 04:16:18', NULL),
(33, 'mukesh', 'mukesh8009636@gmail.com', '9140213763', 'Referral', NULL, 94, 'pending', '0', 'noida', '2025-04-22 05:23:33', '2025-04-22 05:23:33', NULL),
(36, 'Pankaj kohli', 'pankajkohli929@gmail.com', '0987654321', 'Social Media', NULL, 1, 'pending', '1', 'Meerut', '2025-04-23 03:08:37', '2025-04-23 23:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_city_state`
--

CREATE TABLE `master_city_state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_city_state`
--

INSERT INTO `master_city_state` (`id`, `state_name`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 'Visakhapatnam', NULL, NULL, NULL),
(3, 'Andhra Pradesh', 'Guntur', NULL, NULL, NULL),
(4, 'Andhra Pradesh', 'Nellore', NULL, NULL, NULL),
(5, 'Arunachal Pradesh', 'Itanagar', NULL, NULL, NULL),
(6, 'Arunachal Pradesh', 'Tawang', NULL, NULL, NULL),
(7, 'Arunachal Pradesh', 'Pasighat', NULL, NULL, NULL),
(8, 'Arunachal Pradesh', 'Ziro', NULL, NULL, NULL),
(9, 'Assam', 'Guwahati', NULL, NULL, NULL),
(10, 'Assam', 'Silchar', NULL, NULL, NULL),
(11, 'Assam', 'Dibrugarh', NULL, NULL, NULL),
(12, 'Assam', 'Jorhat', NULL, NULL, NULL),
(13, 'Bihar', 'Patna', NULL, NULL, NULL),
(14, 'Bihar', 'Gaya', NULL, NULL, NULL),
(15, 'Bihar', 'Bhagalpur', NULL, NULL, NULL),
(16, 'Bihar', 'Muzaffarpur', NULL, NULL, NULL),
(17, 'Chhattisgarh', 'Raipur', NULL, NULL, NULL),
(18, 'Chhattisgarh', 'Bilaspur', NULL, NULL, NULL),
(19, 'Chhattisgarh', 'Durg', NULL, NULL, NULL),
(20, 'Chhattisgarh', 'Korba', NULL, NULL, NULL),
(21, 'Goa', 'Panaji', NULL, NULL, NULL),
(22, 'Goa', 'Margao', NULL, NULL, NULL),
(23, 'Goa', 'Vasco da Gama', NULL, NULL, NULL),
(24, 'Goa', 'Mapusa', NULL, NULL, NULL),
(25, 'Gujarat', 'Ahmedabad', NULL, NULL, NULL),
(26, 'Gujarat', 'Surat', NULL, NULL, NULL),
(27, 'Gujarat', 'Vadodara', NULL, NULL, NULL),
(28, 'Gujarat', 'Rajkot', NULL, NULL, NULL),
(29, 'Haryana', 'Gurgaon', NULL, NULL, NULL),
(30, 'Haryana', 'Faridabad', NULL, NULL, NULL),
(31, 'Haryana', 'Panipat', NULL, NULL, NULL),
(32, 'Haryana', 'Karnal', NULL, NULL, NULL),
(33, 'Himachal Pradesh', 'Shimla', NULL, NULL, NULL),
(34, 'Himachal Pradesh', 'Manali', NULL, NULL, NULL),
(35, 'Himachal Pradesh', 'Dharamshala', NULL, NULL, NULL),
(36, 'Himachal Pradesh', 'Solan', NULL, NULL, NULL),
(37, 'Jharkhand', 'Ranchi', NULL, NULL, NULL),
(38, 'Jharkhand', 'Jamshedpur', NULL, NULL, NULL),
(39, 'Jharkhand', 'Dhanbad', NULL, NULL, NULL),
(40, 'Jharkhand', 'Bokaro', NULL, NULL, NULL),
(41, 'Karnataka', 'Bangalore', NULL, NULL, NULL),
(42, 'Karnataka', 'Mysore', NULL, NULL, NULL),
(43, 'Karnataka', 'Mangalore', NULL, NULL, NULL),
(44, 'Karnataka', 'Hubli', NULL, NULL, NULL),
(45, 'Kerala', 'Thiruvananthapuram', NULL, NULL, NULL),
(46, 'Kerala', 'Kochi', NULL, NULL, NULL),
(47, 'Kerala', 'Kozhikode', NULL, NULL, NULL),
(48, 'Kerala', 'Thrissur', NULL, NULL, NULL),
(49, 'Madhya Pradesh', 'Bhopal', NULL, NULL, NULL),
(50, 'Madhya Pradesh', 'Indore', NULL, NULL, NULL),
(51, 'Madhya Pradesh', 'Gwalior', NULL, NULL, NULL),
(52, 'Madhya Pradesh', 'Jabalpur', NULL, NULL, NULL),
(53, 'Maharashtra', 'Mumbai', NULL, NULL, NULL),
(54, 'Maharashtra', 'Pune', NULL, NULL, NULL),
(55, 'Maharashtra', 'Nagpur', NULL, NULL, NULL),
(56, 'Maharashtra', 'Nashik', NULL, NULL, NULL),
(57, 'Manipur', 'Imphal', NULL, NULL, NULL),
(58, 'Manipur', 'Thoubal', NULL, NULL, NULL),
(59, 'Manipur', 'Bishnupur', NULL, NULL, NULL),
(60, 'Manipur', 'Churachandpur', NULL, NULL, NULL),
(61, 'Meghalaya', 'Shillong', NULL, NULL, NULL),
(62, 'Meghalaya', 'Tura', NULL, NULL, NULL),
(63, 'Meghalaya', 'Cherrapunji', NULL, NULL, NULL),
(64, 'Meghalaya', 'Nongpoh', NULL, NULL, NULL),
(65, 'Mizoram', 'Aizawl', NULL, NULL, NULL),
(66, 'Mizoram', 'Lunglei', NULL, NULL, NULL),
(67, 'Mizoram', 'Serchhip', NULL, NULL, NULL),
(68, 'Mizoram', 'Champhai', NULL, NULL, NULL),
(69, 'Nagaland', 'Kohima', NULL, NULL, NULL),
(70, 'Nagaland', 'Dimapur', NULL, NULL, NULL),
(71, 'Nagaland', 'Mokokchung', NULL, NULL, NULL),
(72, 'Nagaland', 'Tuensang', NULL, NULL, NULL),
(73, 'Odisha', 'Bhubaneswar', NULL, NULL, NULL),
(74, 'Odisha', 'Cuttack', NULL, NULL, NULL),
(75, 'Odisha', 'Rourkela', NULL, NULL, NULL),
(76, 'Odisha', 'Sambalpur', NULL, NULL, NULL),
(77, 'Punjab', 'Amritsar', NULL, NULL, NULL),
(78, 'Punjab', 'Ludhiana', NULL, NULL, NULL),
(79, 'Punjab', 'Jalandhar', NULL, NULL, NULL),
(80, 'Punjab', 'Patiala', NULL, NULL, NULL),
(81, 'Rajasthan', 'Jaipur', NULL, NULL, NULL),
(82, 'Rajasthan', 'Udaipur', NULL, NULL, NULL),
(83, 'Rajasthan', 'Jodhpur', NULL, NULL, NULL),
(84, 'Rajasthan', 'Kota', NULL, NULL, NULL),
(85, 'Sikkim', 'Gangtok', NULL, NULL, NULL),
(86, 'Sikkim', 'Namchi', NULL, NULL, NULL),
(87, 'Sikkim', 'Gyalshing', NULL, NULL, NULL),
(88, 'Sikkim', 'Mangan', NULL, NULL, NULL),
(89, 'Tamil Nadu', 'Chennai', NULL, NULL, NULL),
(90, 'Tamil Nadu', 'Coimbatore', NULL, NULL, NULL),
(91, 'Tamil Nadu', 'Madurai', NULL, NULL, NULL),
(92, 'Tamil Nadu', 'Tiruchirappalli', NULL, NULL, NULL),
(93, 'Telangana', 'Hyderabad', NULL, NULL, NULL),
(94, 'Telangana', 'Warangal', NULL, NULL, NULL),
(95, 'Telangana', 'Nizamabad', NULL, NULL, NULL),
(96, 'Telangana', 'Karimnagar', NULL, NULL, NULL),
(97, 'Tripura', 'Agartala', NULL, NULL, NULL),
(98, 'Tripura', 'Udaipur', NULL, NULL, NULL),
(99, 'Tripura', 'Dharmanagar', NULL, NULL, NULL),
(100, 'Tripura', 'Kailashahar', NULL, NULL, NULL),
(101, 'Uttar Pradesh', 'Lucknow', NULL, NULL, NULL),
(102, 'Uttar Pradesh', 'Kanpur', NULL, NULL, NULL),
(103, 'Uttar Pradesh', 'Varanasi', NULL, NULL, NULL),
(104, 'Uttar Pradesh', 'Agra', NULL, NULL, NULL),
(105, 'Uttarakhand', 'Dehradun', NULL, NULL, NULL),
(106, 'Uttarakhand', 'Haridwar', NULL, NULL, NULL),
(107, 'Uttarakhand', 'Rishikesh', NULL, NULL, NULL),
(108, 'Uttarakhand', 'Nainital', NULL, NULL, NULL),
(109, 'West Bengal', 'Kolkata', NULL, NULL, NULL),
(110, 'West Bengal', 'Asansol', NULL, NULL, NULL),
(111, 'West Bengal', 'Durgapur', NULL, NULL, NULL),
(112, 'West Bengal', 'Siliguri', NULL, NULL, NULL),
(113, 'Andaman and Nicobar Islands', 'Port Blair', NULL, NULL, NULL),
(114, 'Andaman and Nicobar Islands', 'Havelock Island', NULL, NULL, NULL),
(115, 'Andaman and Nicobar Islands', 'Diglipur', NULL, NULL, NULL),
(116, 'Chandigarh', 'Chandigarh', NULL, NULL, NULL),
(117, 'Dadra and Nagar Haveli and Daman and Diu', 'Silvassa', NULL, NULL, NULL),
(118, 'Dadra and Nagar Haveli and Daman and Diu', 'Daman', NULL, NULL, NULL),
(119, 'Dadra and Nagar Haveli and Daman and Diu', 'Diu', NULL, NULL, NULL),
(120, 'Delhi', 'New Delhi', NULL, NULL, NULL),
(121, 'Delhi', 'Dwarka', NULL, NULL, NULL),
(122, 'Delhi', 'Rohini', NULL, NULL, NULL),
(123, 'Delhi', 'Karol Bagh', NULL, NULL, NULL),
(124, 'Jammu and Kashmir', 'Srinagar', NULL, NULL, NULL),
(125, 'Jammu and Kashmir', 'Jammu', NULL, NULL, NULL),
(126, 'Jammu and Kashmir', 'Anantnag', NULL, NULL, NULL),
(127, 'Jammu and Kashmir', 'Baramulla', NULL, NULL, NULL),
(128, 'Ladakh', 'Leh', NULL, NULL, NULL),
(129, 'Ladakh', 'Kargil', NULL, NULL, NULL),
(130, 'Lakshadweep', 'Kavaratti', NULL, NULL, NULL),
(131, 'Lakshadweep', 'Agatti', NULL, NULL, NULL),
(132, 'Lakshadweep', 'Amini', NULL, NULL, NULL),
(133, 'Puducherry', 'Puducherry', NULL, NULL, NULL),
(134, 'Puducherry', 'Karaikal', NULL, NULL, NULL),
(135, 'Puducherry', 'Mahe', NULL, NULL, NULL),
(136, 'Puducherry', 'Yanam', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_19_155145_create_permission_tables', 2),
(5, '2024_10_19_160010_add_franchise_id_to_users_table', 3),
(6, '2024_10_19_162941_create_franchise_temps_table', 4),
(7, '2024_10_19_192821_create_franchises_table', 5),
(8, '2024_11_30_070822_add_uniqueid_in_appointments_table', 6),
(9, '2024_12_01_061938_add_status_in_franchise_temps_table', 6),
(10, '2024_12_01_163654_add_franchise_id_in_franchises_table', 7),
(11, '2024_12_01_164011_make_company_name_nullable_in_franchises_table', 7),
(12, '2024_12_01_164057_make_company_name_nullable_in_franchise_temps_table', 7),
(13, '2024_12_12_175105_add_product_unit_in_product_types_table', 8),
(14, '2024_11_19_201912_create_product_types_table', 9),
(15, '2024_12_11_173320_create_quotations_table', 9),
(16, '2024_12_11_173825_create_quotation_items_table', 9),
(17, '2024_12_19_171432_add_column_in_quotation_items_table', 9),
(18, '2024_12_19_171731_add_column_in_quotations_table', 9),
(19, '2024_12_21_093546_add_column_in_franchises_table', 9),
(20, '2024_12_21_101707_change_status_column_in_appointments_table', 9),
(21, '2024_12_22_131847_add_status_in_quotations_table', 10),
(22, '2024_12_22_132157_add_status_in_quotation_items_table', 10),
(23, '2024_12_27_173822_add_remarks_in_appointments_table', 11),
(24, '2024_12_30_184530_create_quotation_sections_table', 12),
(25, '2025_01_07_084158_create_orders_table', 13),
(26, '2025_01_09_174558_add_column_in_orders_table', 13),
(27, '2025_03_02_094725_add_column_in_quotations_table', 14),
(44, '2025_04_17_071450_create_franchise_approvas_table', 15),
(45, '2025_04_18_051449_create_lead_models_table', 15),
(47, '2025_04_19_064747_create_coustomers_table', 16),
(48, '2025_04_21_071935_create_create_jobs_table', 17),
(49, '2025_04_21_081738_add_is_converted_to_leads_table', 18),
(54, '2025_04_21_120754_add_is_customer_to_users_table', 19),
(55, '2025_04_22_111103_create_work_assigneds_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 22),
(5, 'App\\Models\\User', 20),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 5),
(7, 'App\\Models\\User', 8),
(7, 'App\\Models\\User', 17),
(7, 'App\\Models\\User', 18),
(7, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 23),
(7, 'App\\Models\\User', 26),
(7, 'App\\Models\\User', 28),
(7, 'App\\Models\\User', 39),
(7, 'App\\Models\\User', 40),
(7, 'App\\Models\\User', 41),
(5, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 45),
(3, 'App\\Models\\User', 44),
(7, 'App\\Models\\User', 56),
(7, 'App\\Models\\User', 58),
(7, 'App\\Models\\User', 59),
(7, 'App\\Models\\User', 60),
(7, 'App\\Models\\User', 61),
(7, 'App\\Models\\User', 63),
(4, 'App\\Models\\User', 57),
(3, 'App\\Models\\User', 64),
(4, 'App\\Models\\User', 65),
(5, 'App\\Models\\User', 66),
(6, 'App\\Models\\User', 67),
(7, 'App\\Models\\User', 68),
(3, 'App\\Models\\User', 69),
(2, 'App\\Models\\User', 70),
(2, 'App\\Models\\User', 71),
(7, 'App\\Models\\User', 73),
(7, 'App\\Models\\User', 74),
(7, 'App\\Models\\User', 75),
(7, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 77),
(2, 'App\\Models\\User', 78),
(2, 'App\\Models\\User', 79),
(7, 'App\\Models\\User', 80),
(2, 'App\\Models\\User', 83),
(4, 'App\\Models\\User', 84),
(4, 'App\\Models\\User', 85),
(4, 'App\\Models\\User', 86),
(4, 'App\\Models\\User', 87),
(7, 'App\\Models\\User', 88),
(4, 'App\\Models\\User', 89),
(4, 'App\\Models\\User', 90),
(7, 'App\\Models\\User', 93),
(2, 'App\\Models\\User', 94),
(1, 'App\\Models\\User', 95),
(1, 'App\\Models\\User', 96),
(1, 'App\\Models\\User', 119),
(1, 'App\\Models\\User', 120),
(1, 'App\\Models\\User', 121),
(1, 'App\\Models\\User', 122),
(9, 'App\\Models\\User', 123),
(9, 'App\\Models\\User', 124),
(9, 'App\\Models\\User', 125),
(9, 'App\\Models\\User', 126),
(9, 'App\\Models\\User', 127),
(9, 'App\\Models\\User', 128),
(9, 'App\\Models\\User', 129),
(9, 'App\\Models\\User', 130),
(9, 'App\\Models\\User', 131);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quotation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_value` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `payment_mode_by` varchar(255) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `installation_date` datetime DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 = "Pending", 1 = "Schedule", 2 = "Complete" ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `txn_id`, `appointment_id`, `franchise_id`, `quotation_id`, `order_value`, `payment_mode`, `payment_mode_by`, `paid_amount`, `payment_type`, `remarks`, `name`, `mobile`, `pincode`, `installation_date`, `status`, `created_at`, `updated_at`) VALUES
(41, 'TXN000001', 68, 13, 60, '105', 'online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-19 22:41:00', '2', '2025-04-11 09:52:09', '2025-04-11 12:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('Chirag.kushel@gmail.com', '$2y$12$BF6aSgmkC8rUL37rk7bFNe8piWvGQvAI0rfvWGNG/u0lyC4awJ.aW', '2025-04-05 08:53:16'),
('rajtiwariyng@gmail.com', '$2y$12$FKu2Edjn1owzymN781vhcehZWWXvxmR7Ry4Y0u/VVVLokfLGLCMHC', '2025-04-05 06:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `tally_code` varchar(255) NOT NULL,
  `file_number` varchar(255) NOT NULL,
  `supplier_name` int(11) NOT NULL,
  `supplier_collection` int(11) DEFAULT NULL,
  `supplier_collection_design` int(11) DEFAULT NULL,
  `design_sku` varchar(255) DEFAULT NULL,
  `rubs_martendale` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `colour` text DEFAULT NULL,
  `composition` text DEFAULT NULL,
  `design_type` text DEFAULT NULL,
  `usage` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `currency` varchar(50) DEFAULT 'rupee',
  `supplier_price` varchar(10) DEFAULT NULL,
  `freight` varchar(10) DEFAULT NULL,
  `duty_percentage` varchar(10) DEFAULT NULL,
  `profit_percentage` varchar(10) DEFAULT NULL,
  `gst_percentage` varchar(10) DEFAULT NULL,
  `mrp` varchar(100) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `type`, `tally_code`, `file_number`, `supplier_name`, `supplier_collection`, `supplier_collection_design`, `design_sku`, `rubs_martendale`, `width`, `image`, `image_alt`, `colour`, `composition`, `design_type`, `usage`, `note`, `currency`, `supplier_price`, `freight`, `duty_percentage`, `profit_percentage`, `gst_percentage`, `mrp`, `unit`, `created_at`, `updated_at`) VALUES
(2, '5', '[\"Indoor\"]', 'CAB000001', '001', 12, 17, 17, 'SKU000001', NULL, NULL, 'products/o2opikB3zmlhxedWr2QjM2Fj71s93kiNsb4r0W7m.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 202', NULL, '516', '20', NULL, '100', '5', '100', 'Meter', '2024-12-18 11:50:01', '2025-04-09 14:53:06'),
(3, '5', '[\"Indoor\"]', 'CAB000002', '002', 12, 17, 61, 'SKU000002', NULL, NULL, 'products/IXYgGEMLZQmrMZmNlPLYUxbQR6nlGPu8UigXzNb3.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 213', NULL, '516', '0', NULL, '100', '5', '100', 'Meter', '2024-12-23 10:55:38', '2025-04-09 14:53:06'),
(4, '5', '[\"Indoor\"]', 'CAB000003', '003', 12, 18, 18, 'SKU000003', NULL, NULL, 'products/mWl7GZ5s2S8b7hoURSoukSKrmjBTJFpgpYMKuvsw.jpg', 'Natural', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 420', NULL, '383', '20', NULL, '100', '10', '100', 'Meter', '2024-12-24 03:59:59', '2025-03-29 06:43:26'),
(5, '5', '[\"Indoor\"]', 'CAB000004', '004', 12, 18, 18, 'SKU000004', NULL, NULL, 'products/5LM7iWaX3Hzc0D3xx4qUkTsnrBp7eTyVQQLhFnva.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 422', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2024-12-24 04:03:23', '2025-04-09 14:53:06'),
(6, '5', '[\"Indoor\"]', 'CAB000005', '005', 12, 18, 18, 'SKU000005', NULL, NULL, 'products/sKCMEHnm0vyP0vIIAOvnTT1XGeWLewMX7YnoymiZ.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 430', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2024-12-24 04:06:54', '2025-04-09 14:53:06'),
(7, '5', '[\"Indoor\"]', 'CAB000006', '006', 12, 18, 19, 'SKU000006', NULL, NULL, 'products/HHp4aO85UxA3Z2NMLOK0awQ0ipswJSqpVWo64pWA.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 431', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2024-12-31 01:10:45', '2025-04-09 14:53:06'),
(8, '5', '[\"Indoor\"]', 'CAB000007', '007', 12, 18, 18, 'SKU000007', NULL, NULL, 'products/0Op0iwA5J1RkYleCmGZoULpgG2sVnSddBUfYIsc5.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 436', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2024-12-31 01:13:30', '2025-04-09 14:53:06'),
(9, '5', '[\"Indoor\"]', 'CAB000008', '008', 12, 18, 20, 'SKU000008', NULL, NULL, 'products/MGsGIa4JNpXNlOvceMG4X8mE2VnjYGFzc0kZYW2M.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 437', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2024-12-31 01:16:17', '2025-04-09 14:53:06'),
(10, '5', '[\"Indoor\"]', 'CAB000009', '009', 12, 18, 18, 'SKU000009', NULL, NULL, 'products/SIHPwwR6TESM1y9wQ4p2qzAtKzaDpssFdeoR3DXq.jpg', 'Naturals', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 438', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2024-12-31 01:18:38', '2025-04-09 14:53:06'),
(11, '5', '[\"Indoor\"]', 'CAB000010', '010', 13, 19, 21, 'SKU000010', NULL, NULL, 'products/mBriZKuY5RXyOWn3BZKEkZl27q0zKQ1CZt74fXTQ.jpg', 'Breeze', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 04', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2024-12-31 01:21:24', '2025-04-09 14:53:06'),
(12, '5', '[\"Indoor\"]', 'CAB000011', '011', 13, 19, 21, 'SKU000011', NULL, NULL, 'products/mGFutrwyuDadIQb7zEESO9b7xAsc9dYTEBCYr8DY.jpg', 'Breeze', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 05', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2024-12-31 01:23:26', '2025-04-09 14:53:06'),
(13, '5', '[\"Indoor\"]', 'CAB000012', '012', 12, 35, 67, 'SKU000012', NULL, NULL, 'products/5iC6IwUP1ALkkzTD3fah1SCJOybQm55cSzRqdnye.jpg', 'Lelin', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page No.- 340 and shade no.- 11', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-01 02:41:06', '2025-03-12 06:19:13'),
(14, '5', '[\"Indoor\"]', 'CAB000013', '013', 12, 35, 50, 'SKU000013', NULL, NULL, 'products/x0dEuRZy583459OamNdNQ2Z2ipaWjKxmLENRz1Wv.jpg', 'lelin', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page np.- 341 and shade no.- 12', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-01 02:44:22', '2025-04-09 14:53:06'),
(15, '5', '[\"Indoor\"]', 'CAB000014', '014', 12, 35, 49, 'SKU000014', NULL, NULL, 'products/7M31jUURCIcg6ZR0PRPsRf3qZng1q5AeLjbouSfu.jpg', 'lelin', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page no.- 342, shade no.- 15', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-01 02:47:13', '2025-04-09 14:53:06'),
(16, '5', '[\"Indoor\"]', 'CAB000015', '015', 12, 35, 67, 'SKU000015', NULL, NULL, 'products/6NzQzcQt2HxuKG3kcSsL72moC94pjHri3vXKsJJP.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NPO.- 344, SHADE NO.- 12', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-01 02:51:04', '2025-04-09 14:53:06'),
(17, '5', '[\"Indoor\"]', 'CAB000016', '016', 12, 35, 49, 'SKU000016', NULL, NULL, 'products/zULMz2DuBNgFcSor5CvfrveCENISrlKecU0TriPd.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-345, SHADE NO.- 16', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-01 02:58:58', '2025-04-09 14:53:06'),
(18, '5', '[\"Indoor\"]', 'CAB000017', '017', 12, 35, 50, 'SKU000017', NULL, NULL, 'products/YOBRWUVjSD0vANDj9qR4mBHxAwT6JcdxYat62LMo.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 346, PAGE-13', NULL, '346', '20', NULL, '100', '5', '732', 'Meter', '2025-01-01 03:02:30', '2025-04-09 14:53:06'),
(19, '5', '[\"Indoor\"]', 'CAB000018', '018', 12, 36, 51, 'SKU000018', NULL, NULL, 'products/UzYssgDoziQKX0Jh8ep3Kh6ykoZVkXCpwzCvVpTA.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.P-442, SHADE NO.- 16', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-01 03:06:03', '2025-04-09 14:53:06'),
(20, '5', '[\"Indoor\"]', 'CAB000019', '019', 12, 36, 53, 'SKU000019', NULL, NULL, 'products/pQsozz0KAA7F3jGGdQoyvX7teXP4ryHTgaNfhuRM.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 426, SHADE NO.- 17', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 03:10:35', '2025-04-09 14:53:06'),
(21, '5', '[\"Indoor\"]', 'CAB000020', '020', 12, 36, 52, 'SKU000020', NULL, NULL, 'products/Sb9o3kTsbUzGgAeQ7SCoAa6znbHIVJEd18JtpAhu.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 446, SHADE NO.- 15', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 03:14:41', '2025-04-09 14:53:06'),
(22, '5', '[\"Indoor\"]', 'CAB000021', '021', 12, 36, 54, 'SKU000021', NULL, NULL, 'products/pgibjjCtZOPUBteQ6PWTZqfIj1J995aWRAeieIA4.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 447, SHADE NO.- 14', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-01 03:19:29', '2025-04-09 14:53:06'),
(23, '5', '[\"Indoor\"]', 'CAB000022', '022', 12, 36, 53, 'SKU000022', NULL, NULL, 'products/gPGRAiVwKHeOq9ghdChGLop71pEGFHTa4UKa1dSr.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 448, SHADE NO.- 18', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 03:23:33', '2025-04-09 14:53:06'),
(24, '5', '[\"Indoor\"]', 'CAB000023', '023', 12, 37, 56, 'SKU000023', NULL, NULL, 'products/njgwGJ7u2RipSSi980unrtLuRXVU9J26wGQbMidb.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 503, SHADE NO.- 09', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-01 03:26:20', '2025-04-09 14:53:06'),
(25, '5', '[\"Indoor\"]', 'CAB000024', '024', 12, 37, 55, 'SKU000024', NULL, NULL, 'products/9FNMKg2FdK3waNHKAJQhUaDCIHHgndtpySsz4RvD.jpg', 'LELIN', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 504, SHADE NO.- 09', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-01 03:28:33', '2025-04-09 14:53:06'),
(26, '5', '[\"Indoor\"]', 'CAB000025', '025', 12, 39, 60, 'SKU000025', NULL, NULL, 'products/RF6Tg4pSXbrlQirpDOrKctmXMEMlOUlu4REfTkCX.jpg', 'NATURALS', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 123, SHADE NO.- 07', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-01 03:32:08', '2025-04-09 14:53:06'),
(27, '5', '[\"Indoor\"]', 'CAB000026', '026', 12, 39, 60, 'SKU000026', NULL, NULL, 'products/Y8mN4UROlD0QiIZIX0tGriT0bQqNeOhzdw2BmH2W.jpg', 'Naturals', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 124, SHADE NO.- 08', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-01 03:34:02', '2025-04-09 14:53:06'),
(28, '5', '[\"Indoor\"]', 'CAB000027', '027', 12, 39, 59, 'SKU000027', NULL, NULL, 'products/FvuKukgF6hHq7HOjdbyThzDAGgRh3sV3ub8erZOo.jpg', 'Naturals', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 125 SHADE NO.- 06', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-01 03:35:57', '2025-04-09 14:53:06'),
(29, '5', '[\"Indoor\"]', 'CAB000028', '028', 12, 39, 71, 'SKU000028', NULL, NULL, 'products/6fM1pmXenYKXtSmE3iHt2V31RQphtfhMe4S5Orqr.jpg', 'Naturals', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 126, SHADE NO.- 03', NULL, '437', '20', NULL, '100', '5', '914', 'Meter', '2025-01-01 03:38:48', '2025-04-09 14:53:06'),
(30, '5', '[\"Indoor\"]', 'CAB000029', '029', 12, 39, 60, 'SKU000029', NULL, NULL, 'products/SAm9I3sjNxMrU7hhl4byJNyZKlJ1GIzlhTaYxf6W.jpg', 'Naturals', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 143, SHADE NO.- 09', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-01 03:42:35', '2025-04-09 14:53:06'),
(31, '5', '[\"Indoor\"]', 'CAB000030', '030', 12, 39, 59, 'SKU000030', NULL, NULL, 'products/LNy7c7TcPqts3jcP12bxy8TWCnT7PvVugqzcUsqp.jpg', 'Naturals', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 144, SHADE NO.- 07', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-01 03:47:34', '2025-04-09 14:53:06'),
(32, '5', '[\"Indoor\"]', 'CAB000031', '031', 12, 17, 61, 'SKU000031', NULL, NULL, 'products/zdLnRZlWGgnpAzXGFgChlxAPtfRuufugBrvXfgTV.jpg', 'Naturals', 'Pink, purple & lilac', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 225, SHADE NO.- 19', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-01 03:49:40', '2025-04-09 14:53:06'),
(33, '5', '[\"Indoor\"]', 'CAB000032', '032', 12, 34, 47, 'SKU000032', NULL, NULL, 'products/6M5gka6rJ0KBwtXlLkNypxvDr5aFIlTb6yDbNoGW.jpg', 'Natural', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 511, SHADE NO.-02', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-01 09:48:08', '2025-04-09 14:53:06'),
(34, '5', '[\"Indoor\"]', 'CAB000033', '033', 12, 34, 48, 'SKU000033', NULL, NULL, 'products/gTKV3tZKZ1lLdCiRA39yZE2ej6T8G8PllkqjvfNb.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 521, SHADE NO.- 09', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-01 09:50:29', '2025-04-09 14:53:06'),
(35, '5', '[\"Indoor\"]', 'CAB000034', '034', 12, 35, 49, 'SKU000034', NULL, NULL, 'products/ZnHWzOzsUfbiwN2IlqH30ALyHXidjCjXptSVCtjN.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 310, SHADE NO.- 03', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-01 09:52:25', '2025-04-09 14:53:06'),
(36, '5', '[\"Indoor\"]', 'CAB000035', '035', 12, 35, 49, 'SKU000035', NULL, NULL, 'products/mtGFXVqqauQdZ5EbwCTs14iclkpoDBNQlyXsVZ1k.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 311, SHADE NO.- 04', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-01 09:54:42', '2025-04-09 14:53:06'),
(37, '5', '[\"Indoor\"]', 'CAB000036', '036', 12, 35, 50, 'SKU000036', NULL, NULL, 'products/mUTXjkLijBrYksQAY0cA1uJcj1h32JLhBrEWTGVn.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 315, SHADE NO.- 05', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-01 09:57:42', '2025-04-09 14:53:06'),
(38, '5', '[\"Indoor\"]', 'CAB000037', '037', 12, 36, 51, 'SKU000037', NULL, NULL, 'products/NCCdQXP7CE2t8dCk32NwgyqMBs0qGTBUQiRDwUwK.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 422, SHADE NO.- 06', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-01 10:00:01', '2025-04-09 14:53:06'),
(39, '5', '[\"Indoor\"]', 'CAB000038', '038', 12, 36, 52, 'SKU000038', NULL, NULL, 'products/BvVufbp75nXLlfK7NfUNafrbwEhRQ0YwoPFuA37h.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 424, SHADE NO.- 10', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 10:01:53', '2025-04-09 14:53:06'),
(40, '5', '[\"Indoor\"]', 'CAB000039', '039', 12, 36, 53, 'SKU000039', NULL, NULL, 'products/rLtL8KZ1xMgROlPVnsdUcsS6gMSyDp8GPwWqzftp.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 427, SHADE NO.- 02', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 10:03:46', '2025-04-09 14:53:06'),
(41, '5', '[\"Indoor\"]', 'CAB000040', '040', 12, 36, 52, 'SKU000040', NULL, NULL, 'products/TSz5bQu18zYBeEsxo7khbCyGfHM7gicnuxVr8Dpn.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 428, SHADE NO.- 11', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 10:06:11', '2025-04-09 14:53:06'),
(42, '5', '[\"Indoor\"]', 'CAB000041', '041', 12, 36, 51, 'SKU000041', NULL, NULL, 'products/8xfo4x3QxlsHVry99CON8uHpW7xFmm8R1vPvDzZ4.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 429, SHADE NO.- 07', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-01 10:08:16', '2025-04-09 14:53:06'),
(43, '5', '[\"Indoor\"]', 'CAB000042', '042', 12, 36, 52, 'SKU000042', NULL, NULL, 'products/I6FJE84WBKGODfMpYXKdjseGX6VixOPw8y2YJLPX.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 432, SHADE NO.- 09', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-01 10:10:29', '2025-04-09 14:53:06'),
(44, '5', '[\"Indoor\"]', 'CAB000043', '043', 12, 36, 51, 'SKU000043', NULL, NULL, 'products/AxUgSz9Kc5KJstv4JdBAFAtsut0XXbJtSO3awYs7.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 433, SHADE NO.- 08', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-01 10:12:16', '2025-04-09 14:53:06'),
(45, '5', '[\"Indoor\"]', 'CAB000044', '044', 12, 36, 54, 'SKU000044', NULL, NULL, 'products/pkHNn9IS7GeQnRqBvwqOMfzsDkcTSTDoyG7G6LdE.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 434, SHADE NO.- 06', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-01 10:14:16', '2025-04-09 14:53:06'),
(46, '5', '[\"Indoor\"]', 'CAB000045', '045', 12, 37, 55, 'SKU000045', NULL, NULL, 'products/ud6BJCKunm19vBdHJanuZlDIMiaVZ75d4yVqQ2lq.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 509, SHADE NO.- 06', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-01 10:15:55', '2025-04-09 14:53:06'),
(47, '5', '[\"Indoor\"]', 'CAB000046', '046', 12, 37, 56, 'SKU000046', NULL, NULL, 'products/9dnKbZaoGtRf8Pu4aQ1ehTk5c6KYNQ4XR4RZBFfz.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 515, SHADE NO.- 07', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-01 10:17:55', '2025-04-09 14:53:06'),
(48, '5', '[\"Indoor\"]', 'CAB000047', '047', 12, 37, 55, 'SKU000047', NULL, NULL, 'products/mnIWIunMIQ7PnwvZbLWGcoU0WKhSFt8joVIWtb0H.jpg', 'LELIN', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 516, SHADE NO.- 07', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-01 10:19:42', '2025-04-09 14:53:06'),
(49, '5', '[\"Indoor\"]', 'CAB000048', '048', 12, 38, 57, 'SKU000048', NULL, NULL, 'products/QE8R4pKPSfuDZvnjHwVPFf6JMmn6eCaZpfEZqPrB.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 472, SHADE NO.- 05', NULL, '348', '20', NULL, '100', '5', '736', 'Meter', '2025-01-01 10:21:35', '2025-04-09 14:53:06'),
(50, '5', '[\"Indoor\"]', 'CAB000049', '049', 12, 38, 57, 'SKU000049', NULL, NULL, 'products/O1KZCTqdZ0lfba7s4mvCjGY6N8mssYK6OMUWaInm.jpg', 'Natural', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 478, SHADE NO.- 06', NULL, '348', '20', NULL, '100', '5', '736', 'Meter', '2025-01-01 10:27:28', '2025-04-09 14:53:06'),
(51, '5', '[\"Indoor\"]', 'CAB000050', '050', 12, 38, 58, 'SKU000050', NULL, NULL, 'products/4FjQxyNxCZuzMoFDtq1CGA81lKWxzm0QFVuCl7t6.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 480, SHADE NO.- 06', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-01 10:29:22', '2025-04-09 14:53:06'),
(52, '5', '[\"Indoor\"]', 'CAB000051', '051', 12, 39, 59, 'SKU000051', NULL, NULL, 'products/yhAtrUctcpkGhpRqTY4xgRZ8lvrvhHVFUOXWvJAz.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 102, SHADE NO.- 02', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-01 23:41:11', '2025-04-09 14:53:06'),
(53, '5', '[\"Indoor\"]', 'CAB000052', '052', 12, 39, 60, 'SKU000052', NULL, NULL, 'products/KRqa7BwScfiGWSpwZo2XfvGPIbbcgEt77yOJin9x.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 103, SHADE NO.- 05', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-01 23:43:47', '2025-04-09 14:53:06'),
(54, '5', '[\"Indoor\"]', 'CAB000053', '053', 12, 17, 61, 'SKU000053', NULL, NULL, 'products/sz8QPptF8BHy9tDlI04W9GbMkAJCAsiTNT4UREJE.jpg', 'NATURAL', 'Red', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 205, SHADE NO.- 04', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-01 23:49:50', '2025-04-07 10:50:12'),
(55, '5', '[\"Indoor\"]', 'CAB000054', '054', 12, 17, 17, 'SKU000054', NULL, NULL, 'products/RXI8ynlTIHE88DLJrcsSX9hXpRpvqaQjN5VXlheU.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 211, SHADE NO.- 03', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-01 23:52:50', '2025-04-09 14:53:06'),
(56, '5', '[\"Indoor\"]', 'CAB000055', '055', 12, 18, 20, 'SKU000055', NULL, NULL, 'products/QJNXcoSXkxhR34ALm4JzmXe2hr3WWy569LFWMMSX.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 412, SHADE NO.- 04', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-01 23:55:20', '2025-04-09 14:53:06'),
(57, '5', '[\"Indoor\"]', 'CAB000056', '056', 12, 18, 20, 'SKU000056', NULL, NULL, 'products/JQ7x883rPijM2YIJuz3ISERgy9ZqI7TGPx8xSkkX.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 414, SHADE NO.- 05', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-01 23:57:27', '2025-04-09 14:53:06'),
(58, '5', '[\"Indoor\"]', 'CAB000057', '057', 12, 18, 19, 'SKU000057', NULL, NULL, 'products/Qy4GesDYpplV6BQvmbaMzKgbRc53B3i92vxAAeIg.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 415, SHADE NO.- 03', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2025-01-02 00:00:05', '2025-04-09 14:53:06'),
(59, '5', '[\"Indoor\"]', 'CAB000058', '058', 12, 18, 18, 'SKU000058', NULL, NULL, 'products/Wm7pwrs0pagupYWhdwkMR5IAAX7Z0UtTYaEsHEyo.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 418, SHADE NO.- 04', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 00:01:58', '2025-04-09 14:53:06'),
(60, '5', '[\"Indoor\"]', 'CAB000059', '059', 12, 18, 19, 'SKU000059', NULL, NULL, 'products/fC5GFK8YxORfF2DCIMyB8Err4xHOvtMUK5eItNWz.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 419 SHADE NO.- 04', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2025-01-02 00:03:40', '2025-04-09 14:53:06'),
(61, '5', '[\"Indoor\"]', 'CAB000060', '060', 12, 18, 18, 'SKU000060', NULL, NULL, 'products/ri4Gmavw4kObmOmc8OJuVHOvLbhzVRHJ8naYyqnF.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 424, SHADE NO.- 07', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 00:05:25', '2025-04-09 14:53:06'),
(62, '5', '[\"Indoor\"]', 'CAB000061', '061', 12, 18, 20, 'SKU000061', NULL, NULL, 'products/O81B5gse6w87as2B8hEcif5v30JKeSw8uDq7iDHu.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 426, SHADE NO.- 06', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 00:48:24', '2025-04-09 14:53:06'),
(63, '5', '[\"Indoor\"]', 'CAB000062', '062', 12, 18, 18, 'SKU000062', NULL, NULL, 'products/KguRVgMBPDNi0l5XwyaaaYtp6iX4rCMYiqtYz9Bd.jpg', 'NATURAL', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 427, SHADE NO.- 08', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 00:51:26', '2025-04-09 14:53:06'),
(64, '5', '[\"Indoor\"]', 'CAB000063', '063', 12, 34, 64, 'SKU000063', NULL, NULL, 'products/4MRQ9iPbym0KujQrkmqT46WXkqHf0bMFMyvYCRyy.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 504, SHADE NO.- 01', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 01:05:23', '2025-04-09 14:53:06'),
(65, '5', '[\"Indoor\"]', 'CAB000064', '064', 12, 34, 48, 'SKU000064', NULL, NULL, 'products/O5M4ygRTFPNQFq7RH75Gyqghd0da2uQTgulIWodH.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 513, SHADE NO.- 05', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 01:07:26', '2025-04-09 14:53:06'),
(66, '5', '[\"Indoor\"]', 'CAB000065', '065', 12, 34, 65, 'SKU000065', NULL, NULL, 'products/P9fDCA2tZcRu8dbQ3QfjWBm4gV8fiVCuJeJYQhb2.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 514, SHADE NO.- 02', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 01:09:20', '2025-04-09 14:53:06'),
(67, '5', '[\"Indoor\"]', 'CAB000066', '066', 12, 34, 48, 'SKU000066', NULL, NULL, 'products/PgOWgNkchQsjxQdLAxtJLPlUqdIg17cF94NoLySx.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 515, SHADE NO.- 06', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 01:12:07', '2025-04-09 14:53:06'),
(68, '5', '[\"Indoor\"]', 'CAB000067', '067', 12, 34, 48, 'SKU000067', NULL, NULL, 'products/CqmzfuPy66Hm10oJIjQfTOnFn1AUi1ZAdxDU0MrA.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 516, SHADE NO.- 07', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 01:14:25', '2025-04-09 14:53:06'),
(69, '5', '[\"Indoor\"]', 'CAB000068', '068', 12, 34, 48, 'SKU000068', NULL, NULL, 'products/ZZJK4THCk1Br4v1tp3cXvDN8P6UT2bwiPqXkOLfl.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 517, SHADE NO.- 08', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 01:16:04', '2025-04-09 14:53:06'),
(70, '5', '[\"Indoor\"]', 'CAB000069', '069', 12, 34, 66, 'SKU000069', NULL, NULL, 'products/9okxBDbsLuX1zOcLUa4gCP9KtKbOn1rvdpfSloTs.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 518 SHADE NO.- 02', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 01:17:49', '2025-04-09 14:53:06'),
(71, '5', '[\"Indoor\"]', 'CAB000070', '070', 12, 34, 47, 'SKU000070', NULL, NULL, 'products/4qxDxylIXrr3NVs3DxDYD9uiMsh5dEMvfrtNnSK6.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 520, SHADE NO.- 01', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 01:19:34', '2025-04-09 14:53:06'),
(72, '5', '[\"Indoor\"]', 'CAB000071', '071', 12, 34, 65, 'SKU000071', NULL, NULL, 'products/PsSvyAVbu9a05bPcs71fiZAaufHmYxh8euR9lYbh.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 526, SHADE NO.- 03', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 01:36:57', '2025-04-09 14:53:06'),
(73, '5', '[\"Indoor\"]', 'CAB000072', '072', 12, 34, 48, 'SKU000072', NULL, NULL, 'products/6RAO6wLCR22CyEOpKLY2SaTgLHafNewdB9IqMz8y.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 527, SHADE NO.- 12', NULL, '326', '20', NULL, '100', '5', '692', 'Meter', '2025-01-02 01:38:56', '2025-04-09 14:53:06'),
(74, '5', '[\"Indoor\"]', 'CAB000073', '073', 12, 34, 65, 'SKU000073', NULL, NULL, 'products/q7yvjsRhGhs4zC3WaiNKqBP8OqJr6oRkkj2v3zMc.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 528, SHADE NO.- 01', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 01:42:24', '2025-04-09 14:53:06'),
(75, '5', '[\"Indoor\"]', 'CAB000074', '074', 12, 34, 48, 'SKU000074', NULL, NULL, 'products/BCp8b3ZrJY5oHE9ypzDrmosEJ5YUHz6zRWZ5y2H3.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 529, SHADE NO.- 13', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 01:45:27', '2025-04-09 14:53:06'),
(76, '5', '[\"Indoor\"]', 'CAB000075', '075', 12, 34, 48, 'SKU000075', NULL, NULL, 'products/6zLzH49w2hrhqQJi13sf9eT9iNeOGqlFu2eGX9yx.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 530 SHADE NO.- 14', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 01:47:10', '2025-04-09 14:53:06'),
(77, '5', '[\"Indoor\"]', 'CAB000076', '076', 12, 35, 50, 'SKU000076', NULL, NULL, 'products/d9Zkmx8Q04Wz1RT4igYli5SZXruvNHH4gVbmNUWJ.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 309, SHADE NO.- 04', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 01:48:50', '2025-04-09 14:53:06'),
(78, '5', '[\"Indoor\"]', 'CAB000077', '077', 12, 35, 67, 'SKU000077', NULL, NULL, 'products/WcLXScsGGe2T7jJA0BDuLXoknw7KRgB8iL45aOZB.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 314, SHADE NO.- 04', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-02 01:50:21', '2025-04-09 14:53:06'),
(79, '5', '[\"Indoor\"]', 'CAB000078', '078', 12, 35, 50, 'SKU000078', NULL, NULL, 'products/jXaYBbqvzAs73ES8xdsy9o046aRaZQfeTdmNOChp.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 316, SHADE NO.- 06', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 01:52:18', '2025-04-09 14:53:06'),
(80, '5', '[\"Indoor\"]', 'CAB000079', '079', 12, 35, 49, 'SKU000079', NULL, NULL, 'products/MaL01jrc7vyeHqH1K7vGXye9eMV2jHiHWcoqcjq7.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 318, SHADE NO.- 05', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 01:57:57', '2025-04-09 14:53:06'),
(81, '5', '[\"Indoor\"]', 'CAB000080', '080', 12, 35, 49, 'SKU000080', NULL, NULL, 'products/SCDKxPmxGvaHafCMJyvZv9XxftxhOmurpwZPdfxB.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 319, SHADE NO.- 06', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 01:59:37', '2025-04-09 14:53:06'),
(82, '5', '[\"Indoor\"]', 'CAB000081', '081', 12, 35, 50, 'SKU000081', NULL, NULL, 'products/A3VFGlkLNRqPtdULgjgRw72GpEOeO5H11EkO9RG0.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 320, SHADE NO.- 07', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 02:01:19', '2025-04-09 14:53:06'),
(83, '5', '[\"Indoor\"]', 'CAB000082', '082', 12, 35, 49, 'SKU000082', NULL, NULL, 'products/7pIqVnM5CsazMoPts5dWXeQ3Z1CGe4CbIbYbartQ.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 321 SHADE NO.- 07', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 02:02:53', '2025-04-09 14:53:06'),
(84, '5', '[\"Indoor\"]', 'CAB000083', '083', 12, 35, 50, 'SKU000083', NULL, NULL, 'products/1jFiRWDC6wOBBccpetaSsDmMlLpU44qCGtfLD02Q.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 322 SHADE NO.- 08', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 02:04:27', '2025-04-09 14:53:06'),
(85, '5', '[\"Indoor\"]', 'CAB000084', '084', 12, 35, 49, 'SKU000084', NULL, NULL, 'products/Jc1x7VLLoNqw4R7CFC1squLeD0W5h7pBrRiYGeEK.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 323, SHADE NO.- 08', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 02:05:50', '2025-04-09 14:53:06'),
(86, '5', '[\"Indoor\"]', 'CAB000085', '085', 12, 35, 49, 'SKU000085', NULL, NULL, 'products/ReLypfPTs8Agfd18wCYG25RqYprozNLEkdhzxjOk.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 324, SHADE NO.- 09', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 02:07:34', '2025-04-09 14:53:06'),
(87, '5', '[\"Indoor\"]', 'CAB000086', '086', 12, 35, 50, 'SKU000086', NULL, NULL, 'products/Xm2SJBQtT7VcLmh5xvQqMbUhciLFCd3nqOaoAkuw.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 325, SHADE NO.- 09', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 02:08:53', '2025-04-09 14:53:06'),
(88, '5', '[\"Indoor\"]', 'CAB000087', '087', 12, 35, 49, 'SKU000087', NULL, NULL, 'products/PmxdlJGQRLZfw4p1nNlJ6oEH8Fw3lKJx5sHj87t2.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 326, SHADE NO.- 10', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 02:10:22', '2025-04-09 14:53:06'),
(89, '5', '[\"Indoor\"]', 'CAB000088', '088', 12, 35, 50, 'SKU000088', NULL, NULL, 'products/fMmBRBcEz9CeObXN2Jm7gw3RuQzan2hZ01bwJ0BA.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 327, SHADE NO.- 10', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 02:11:43', '2025-04-09 14:53:06'),
(90, '5', '[\"Indoor\"]', 'CAB000089', '089', 12, 35, 49, 'SKU000089', NULL, NULL, 'products/eAXftGQ53IsvvHaUxepHAe97fxmbneGk65YCA8yI.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 333, SHADE NO.- 12', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 02:13:04', '2025-04-09 14:53:06'),
(91, '5', '[\"Indoor\"]', 'CAB000090', '090', 12, 35, 67, 'SKU000090', NULL, NULL, 'products/TymjS2ttO7nWppAxjxF4Zzwt9AvFPX2Atc0SYXkx.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 335 SHADE NO.- 09', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-02 02:14:26', '2025-04-09 14:53:06'),
(92, '5', '[\"Indoor\"]', 'CAB000091', '091', 12, 35, 49, 'SKU000091', NULL, NULL, 'products/ghKBDi1JvEjmjcnrxhk6lfOfpLf2Z98qd30N3H23.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 336, SHADE NO.- 13', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 03:04:49', '2025-04-09 14:53:06'),
(93, '5', '[\"Indoor\"]', 'CAB000092', '092', 12, 35, 67, 'SKU000092', NULL, NULL, 'products/1Zwa438yVZpMEuYGU45HZV6RcrArWtH7kvfr7JxH.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 337, SHADE NO.- 10', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-02 03:06:37', '2025-04-09 14:53:06'),
(94, '5', '[\"Indoor\"]', 'CAB000093', '093', 12, 35, 49, 'SKU000093', NULL, NULL, 'products/x6ZQz5V86U7buaacD3m7FjoGSMO9EjhwluJfarar.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 338, SHADE NO.- 14', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-02 03:08:21', '2025-04-09 14:53:06'),
(95, '5', '[\"Indoor\"]', 'CAB000094', '094', 12, 35, 50, 'SKU000094', NULL, NULL, 'products/pCVILgXJYZzXO9xFV91AaTQ84NWvSQUY2mvqPvqU.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 339, SHADE NO.- 11', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 03:10:36', '2025-04-09 14:53:06'),
(96, '5', '[\"Indoor\"]', 'CAB000095', '095', 12, 36, 54, 'SKU000095', NULL, NULL, 'products/ABAFAYb13ASCafqVo6tSOkxHjw8z7Abxyv4y2Dih.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 403, SHADE NO.- 07', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-02 03:12:51', '2025-04-09 14:53:06'),
(97, '5', '[\"Indoor\"]', 'CAB000096', '096', 12, 36, 52, 'SKU000096', NULL, NULL, 'products/WdHw0n5z0ECOuw6NHG9XDeuNnv9YdCozuZPB1TIV.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 404, SHADE NO.- 08', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 03:14:26', '2025-04-09 14:53:06'),
(98, '5', '[\"Indoor\"]', 'CAB000097', '097', 12, 36, 53, 'SKU000097', NULL, NULL, 'products/lrAvYG5yVU7AYKo0RKbcvUEJR5bBtlCKBlJuVo3S.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 408, SHADE NO.- 11', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 03:16:04', '2025-04-09 14:53:06'),
(99, '5', '[\"Indoor\"]', 'CAB000098', '098', 12, 36, 53, 'SKU000098', NULL, NULL, 'products/DKrQY2c8hBsiQiDGxLQGYzNyBkMUJd1OoiHs3Ve4.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 128, SHADE NO.- 05', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 03:19:19', '2025-04-09 14:53:06'),
(100, '5', '[\"Indoor\"]', 'CAB000099', '099', 12, 36, 53, 'SKU000099', NULL, NULL, 'products/JBXtparjYTAQlWwra3BtMSa3m9JtuOs8KgHwOuP6.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 435, SHADE NO.- 10', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 03:20:53', '2025-04-09 14:53:06'),
(101, '5', '[\"Indoor\"]', 'CAB000100', '100', 12, 36, 53, 'SKU000100', NULL, NULL, 'products/rFw9YsnwyclSyEzLt9wrrsKKJsOs9iE6GWL540Tp.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 418, SHADE NO.- 09', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 03:26:03', '2025-04-09 14:53:06'),
(102, '5', '[\"Indoor\"]', 'CAB000101', '101', 12, 36, 54, 'SKU000101', NULL, NULL, 'products/atT2KJg0z3ONb8LmZBa0nOx6yR0hGrOulLc42a48.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 438, SHADE NO.- 03', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-02 03:27:37', '2025-04-09 14:53:06'),
(103, '5', '[\"Indoor\"]', 'CAB000102', '102', 12, 36, 52, 'SKU000102', NULL, NULL, 'products/chYKfCuzqNMnaqrpRknK3EwBYBWYg4x9xNZ4X1Oz.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 144, SHADE NO.- 06', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-02 03:29:38', '2025-04-09 14:53:06'),
(104, '5', '[\"Indoor\"]', 'CAB000103', '103', 12, 36, 54, 'SKU000103', NULL, NULL, 'products/n6PfxuKuHBRcWphrD0dx80kq0wZSEeEkZXGnLZL3.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 439 SHADE NO.- 01', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-02 03:31:30', '2025-04-09 14:53:06'),
(105, '5', '[\"Indoor\"]', 'CAB000104', '104', 12, 37, 68, 'SKU000104', NULL, NULL, 'products/17IpKPw1pLgBtM92yWUUHUm4n15iTRDYk0xuNbia.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 508, SHADE NO.- 06', NULL, '331', '20', NULL, '100', '5', '702', 'Meter', '2025-01-02 03:33:25', '2025-04-09 14:53:06'),
(106, '5', '[\"Indoor\"]', 'CAB000105', '105', 12, 37, 69, 'SKU000105', NULL, NULL, 'products/MPmyH61CgjZzXCI4lkzyOnrsIzQSUhrMxkitUc4l.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 518, SHADE NO.- 08', NULL, '351', '20', NULL, '100', '5', '742', 'Meter', '2025-01-02 03:34:54', '2025-04-09 14:53:06'),
(107, '5', '[\"Indoor\"]', 'CAB000106', '106', 12, 37, 56, 'SKU000106', NULL, NULL, 'products/46aAQCf1aHgQdLMw8lrXcgQBa5AO4rTiPQl9wqVS.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 519, SHADE NO.- 08', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-02 03:36:44', '2025-04-09 14:53:06'),
(108, '5', '[\"Indoor\"]', 'CAB000107', '107', 12, 37, 55, 'SKU000107', NULL, NULL, 'products/vsI0BEaaLPn0oqcwtzEzlVybzRFCNMonCU1TYfbz.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 520, SHADE NO.- 08', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-02 03:38:19', '2025-04-09 14:53:06'),
(109, '5', '[\"Indoor\"]', 'CAB000108', '108', 12, 37, 56, 'SKU000108', NULL, NULL, 'products/xXbpFehPRufzLXAUPoY1islDkOSDPqDcm3FXK28K.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 523, SHADE NO.- 04', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-02 03:39:52', '2025-04-09 14:53:06'),
(110, '5', '[\"Indoor\"]', 'CAB000109', '109', 12, 37, 56, 'SKU000109', NULL, NULL, 'products/tQyBfR8YloFhG1NSkfNCdTK8sqLQWK4ICit5RC8O.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 527, SHADE NO.- 05', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-02 03:41:49', '2025-04-09 14:53:06'),
(111, '5', '[\"Indoor\"]', 'CAB000110', '110', 12, 37, 68, 'SKU000110', NULL, NULL, 'products/FHV4MluT3hJLgPCiwuXKdGZ1oHYo4EQYbFh49vHU.jpg', 'LELIN', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 528, SHADE NO.- 05', NULL, '331', '20', NULL, '100', '5', '702', 'Meter', '2025-01-02 03:44:23', '2025-04-09 14:53:06'),
(112, '5', '[\"Indoor\"]', 'CAB000111', '111', 12, 38, 57, 'SKU000111', NULL, NULL, 'products/Tl07ZXSoEKycnRXACCv5NV9YgDj6wYA4e4NF2YSj.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 462, SHADE NO.- 03', NULL, '348', '20', NULL, '100', '5', '736', 'Meter', '2025-01-02 03:49:22', '2025-04-09 14:53:06'),
(113, '5', '[\"Indoor\"]', 'CAB000112', '112', 12, 38, 70, 'SKU000112', NULL, NULL, 'products/TOcxgesKfSanQC85qm8axbQciivDiFj7PW6c4ZuM.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 463, SHADE NO.- 03', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 03:51:09', '2025-04-09 14:53:06'),
(114, '5', '[\"Indoor\"]', 'CAB000113', '113', 12, 38, 58, 'SKU000113', NULL, NULL, 'products/xzIl1kuwdRh6wbYZnCoZnIJXJp25e8DQy3MxXkNp.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 465, SHADE NO.- 03', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 03:54:24', '2025-04-09 14:53:06'),
(115, '5', '[\"Indoor\"]', 'CAB000114', '114', 12, 38, 58, 'SKU000114', NULL, NULL, 'products/YVPkpJ9PKFOvyp6NKxc55ywPFxdzHqqNDaNbZrcu.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 486, SHADE NO.- 07', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-02 04:06:34', '2025-04-09 14:53:06'),
(116, '5', '[\"Indoor\"]', 'CAB000115', '115', 12, 39, 59, 'SKU000115', NULL, NULL, 'products/U6IkLPAoAKDY0NZRR77pU7S1E52ggyP2O2IiBgq3.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 105, SHADE NO.- 11', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-02 04:08:06', '2025-04-09 14:53:06'),
(117, '5', '[\"Indoor\"]', 'CAB000116', '116', 12, 39, 71, 'SKU000116', NULL, NULL, 'products/pJ06SVByoxuzzHYZPdHmH7BcJpbGiKDx1lovlwOw.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 106, SHADE NO.- 01', NULL, '437', '20', NULL, '100', '5', '914', 'Meter', '2025-01-02 04:13:19', '2025-04-09 14:53:06'),
(118, '5', '[\"Indoor\"]', 'CAB000117', '117', 12, 39, 59, 'SKU000117', NULL, NULL, 'products/561vrZ1HrwzTkIzu9J9skC6GS45zkWvohjE2SB6w.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 132, SHADE NO.- 12', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-02 04:15:01', '2025-04-09 14:53:06'),
(119, '5', '[\"Indoor\"]', 'CAB000118', '118', 12, 17, 61, 'SKU000118', NULL, NULL, 'products/FfUIfON68AN7aUUaNl5qVCVRNz5VcaHfl2ma3Vdh.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 201, SHADE NO.- 01', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:17:09', '2025-04-09 14:53:06'),
(120, '5', '[\"Indoor\"]', 'CAB000119', '119', 12, 17, 61, 'SKU000119', NULL, NULL, 'products/LnwZ8y4cQP5lQiRIm06sRGkj3yk9e7gVwdesoM1c.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 204, SHADE NO.- 03', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:19:53', '2025-04-09 14:53:06'),
(121, '5', '[\"Indoor\"]', 'CAB000120', '120', 12, 17, 61, 'SKU000120', NULL, NULL, 'products/Zbu4xVXrV0dgH6YTvhGleGydMKwFlClVqwuTEhPa.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 206, SHADE NO.- 05', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:21:27', '2025-04-09 14:53:06'),
(122, '5', '[\"Indoor\"]', 'CAB000121', '121', 12, 17, 17, 'SKU000121', NULL, NULL, 'products/ziSkMpkvE3tClrdo7N4dyZeKCv5FJ3oMzlCcVhwp.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 207, SHADE NO.- 02', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:23:15', '2025-04-09 14:53:06'),
(123, '5', '[\"Indoor\"]', 'CAB000122', '122', 12, 17, 17, 'SKU000122', NULL, NULL, 'products/xh3pDFstOg3phHZ4ouJM4wjYPcir4ITsTaoE5MCc.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 208, SHADE NO.- 02', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:26:13', '2025-04-09 14:53:06'),
(124, '5', '[\"Indoor\"]', 'CAB000123', '123', 12, 17, 61, 'SKU000123', NULL, NULL, 'products/V3zVww4ZzSgS4IevPvFzBE16mp7SBW62Krgds7rg.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 209, SHADE NO.- 06', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:28:34', '2025-04-09 14:53:06'),
(125, '5', '[\"Indoor\"]', 'CAB000124', '124', 12, 17, 61, 'SKU000124', NULL, NULL, 'products/budeVxAB5Scg3BsN0nYqKlBp3Yj2KXAB4aRbhnhZ.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 212, SHADE NO.- 08', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:30:02', '2025-04-09 14:53:06'),
(126, '5', '[\"Indoor\"]', 'CAB000125', '125', 12, 17, 61, 'SKU000125', NULL, NULL, 'products/U8EmslxSMgdMXy1vA3N8uxq83yqu6BRgJCXjq0vd.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 221, SHADE NO.- 17', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-02 04:33:01', '2025-04-09 14:53:06'),
(127, '5', '[\"Indoor\"]', 'CAB000126', '126', 12, 18, 20, 'SKU000126', NULL, NULL, 'products/Md9KrC4Z9buARVtQ5V9J9xlbSM9D1mvbMY9xOXNc.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 405, SHADE NO.- 02', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 04:40:11', '2025-04-09 14:53:06'),
(128, '5', '[\"Indoor\"]', 'CAB000127', '127', 12, 18, 18, 'SKU000127', NULL, NULL, 'products/er9RfTCfg5roaBGm2ym8YB0IFR9wwHCJmMsJIXTU.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 407, SHADE NO.- 02', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 04:43:45', '2025-04-09 14:53:06'),
(129, '5', '[\"Indoor\"]', 'CAB000128', '128', 12, 18, 19, 'SKU000128', NULL, NULL, 'products/qpdoi3SLvJm8nyhtjmQsOMWI5bJygygpMTMs6CeW.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 408, SHADE NO.- 0', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2025-01-02 04:45:12', '2025-04-09 14:53:06'),
(130, '5', '[\"Indoor\"]', 'CAB000129', '129', 12, 18, 18, 'SKU000129', NULL, NULL, 'products/Gh3JDc11VkHhYlkokIcZLHqasEm1J9RIHJ9Gc4P2.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 409, SHADE NO.- 03', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 04:46:54', '2025-04-09 14:53:06'),
(131, '5', '[\"Indoor\"]', 'CAB000130', '130', 12, 18, 20, 'SKU000130', NULL, NULL, 'products/59lk7vnApjTf0bFETmDh8ppk5bFGoF1eFeevu4Ns.jpg', 'NATURAL', 'Beige & brown', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 410, SHADE NO.- 03', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-02 04:48:33', '2025-04-09 14:53:06'),
(132, '5', '[\"Indoor\"]', 'CAB000131', '131', 12, 25, 33, 'SKU000131', NULL, NULL, 'products/GHjqD1bEu3kGb0sS6QLZQJeMAi7hW4ZBLT5ZiwkA.jpg', 'Saga Matt Textures', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 608', NULL, '407', '20', NULL, '100', '5', '854', 'Meter', '2025-01-02 05:13:55', '2025-04-09 14:53:06'),
(133, '5', '[\"Indoor\"]', 'CAB000132', '132', 12, 25, 34, 'SKU000132', NULL, NULL, 'products/qDKjtdb1T3DczsOP2yQ9ybWchkw1vyVWBYCbbGDO.jpg', 'Saga Matt Textures', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 701', NULL, '326', '20', NULL, '100', '5', '692', 'Meter', '2025-01-02 05:15:41', '2025-04-09 14:53:06'),
(134, '5', '[\"Indoor\"]', 'CAB000133', '133', 12, 25, 36, 'SKU000133', NULL, NULL, 'products/IiQxiIAEM7euuto4ow0LYVNqQIycrxYmfjkGegb5.jpg', 'Saga Matt Textures', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 702', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-02 05:17:45', '2025-04-09 14:53:06'),
(135, '5', '[\"Indoor\"]', 'CAB000134', '134', 12, 25, 36, 'SKU000134', NULL, NULL, 'products/dHjpdIgXi9OQhNfWoS7CfGRsRio4FIoaSLldYALp.jpg', 'Saga Matt Textures', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 703', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-02 05:20:22', '2025-04-09 14:53:06'),
(136, '5', '[\"Indoor\"]', 'CAB000135', '135', 12, 25, 37, 'SKU000135', NULL, NULL, 'products/XNyd43eE7TZuKAsn6X07GBGRT5QwrF1Sjq4odu0C.jpg', 'Saga Matt Textures', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 704', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-02 05:21:55', '2025-04-09 14:53:06'),
(137, '5', '[\"Indoor\"]', 'CAB000136', '136', 12, 25, 38, 'SKU000136', NULL, NULL, 'products/IBjek3qD6tK4xTvAgegIrAUhPQ4QoSU5CZesc35O.jpg', 'Saga Matt Textures', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 705', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-02 05:23:49', '2025-04-09 14:53:06'),
(138, '5', '[\"Indoor\"]', 'CAB000137', '137', 12, 26, 39, 'SKU000137', NULL, NULL, 'products/fcORU7HkcW2MJ1Ogvc6UvhYAqmvPb6sbv9sTxD8a.jpg', 'POETRY ETHNIC BLOOMS', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 401', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-02 05:26:06', '2025-04-09 14:53:06'),
(139, '5', '[\"Indoor\"]', 'CAB000138', '138', 12, 26, 40, 'SKU000138', NULL, NULL, 'products/uVdwxDRVLRxPmkdNgmg6RqIEvosiASpScUUhHzVp.jpg', 'POETRY ETHNIC BLOOMS', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 402', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-02 05:27:34', '2025-04-09 14:53:06'),
(140, '5', '[\"Indoor\"]', 'CAB000139', '139', 12, 26, 41, 'SKU000139', NULL, NULL, 'products/TvpzJ62MXjAi4za7sEYl5CBWq1A6DvNUGAV33MpX.jpg', 'POETRY ETHNIC BLOOMS', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 403', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-02 05:29:11', '2025-04-09 14:53:06'),
(141, '5', '[\"Indoor\"]', 'CAB000140', '140', 12, 23, 22, 'SKU000140', NULL, NULL, 'products/7lHzfV1A4UHLZWqv0djbbvyYNoak3qum0q2WOyuo.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 106', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-02 05:43:49', '2025-04-09 14:53:06');
INSERT INTO `products` (`id`, `product_name`, `type`, `tally_code`, `file_number`, `supplier_name`, `supplier_collection`, `supplier_collection_design`, `design_sku`, `rubs_martendale`, `width`, `image`, `image_alt`, `colour`, `composition`, `design_type`, `usage`, `note`, `currency`, `supplier_price`, `freight`, `duty_percentage`, `profit_percentage`, `gst_percentage`, `mrp`, `unit`, `created_at`, `updated_at`) VALUES
(142, '5', '[\"Indoor\"]', 'CAB000141', '141', 12, 23, 23, 'SKU000141', NULL, NULL, 'products/3NVNcfPMz7gE4YsQdTQQ1G9BSK4kcwW58psJg9hF.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 107', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-02 05:46:43', '2025-04-09 14:53:06'),
(143, '5', '[\"Indoor\"]', 'CAB000142', '142', 12, 23, 24, 'SKU000142', NULL, NULL, 'products/0PiIccEoIm5JdmDLgoLLxIQ3NV33ZgpxVu8bhlFr.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 108', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-02 05:49:09', '2025-04-09 14:53:06'),
(144, '5', '[\"Indoor\"]', 'CAB000143', '143', 12, 23, 25, 'SKU000143', NULL, NULL, 'products/CggMbt9yBSUrjLeWlwcoKwNZRTwTN4blqtGFmRtY.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 110', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-02 05:50:41', '2025-04-09 14:53:06'),
(145, '5', '[\"Indoor\"]', 'CAB000144', '144', 12, 23, 62, 'SKU000144', NULL, NULL, 'products/KtSfq8INJdbulIgovNogBGa4T1ZFuAfH8uBniGpL.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 121', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-02 05:52:34', '2025-04-09 14:53:06'),
(146, '5', '[\"Indoor\"]', 'CAB000145', '145', 12, 23, 23, 'SKU000145', NULL, NULL, 'products/7BNLuWPBVjycvLZsCqmEV2QQQ1uaa62QEf3X5Cgq.jpg', 'Earthen Lino', 'Linen', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 122', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-02 05:54:10', '2025-04-09 14:53:06'),
(147, '5', '[\"Indoor\"]', 'CAB000146', '146', 12, 23, 24, 'SKU000146', NULL, NULL, 'products/zD53X4vRLRDHIBH5Q78kDAaUBecxRf0Nj7PJbDIk.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 123', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-02 10:22:44', '2025-04-09 14:53:06'),
(148, '5', '[\"Indoor\"]', 'CAB000147', '147', 12, 23, 22, 'SKU000147', NULL, NULL, 'products/7x9kIx418ekxLuT6b5CmaU1fztc213ylzo2RL0hD.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 126', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-02 10:24:43', '2025-04-09 14:53:06'),
(149, '5', '[\"Indoor\"]', 'CAB000148', '148', 12, 23, 23, 'SKU000148', NULL, NULL, 'products/V9HVmvilZpohjOTq1pK0riSM0fnTBY2xmJdR17y6.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 127', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-02 10:26:12', '2025-04-09 14:53:06'),
(150, '5', '[\"Indoor\"]', 'CAB000149', '149', 12, 23, 24, 'SKU000149', NULL, NULL, 'products/6aL69tJRb1D9zEqc53x35nPILK8qXFi1Cs1jSMCf.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 128', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-02 10:41:39', '2025-04-09 14:53:06'),
(151, '5', '[\"Indoor\"]', 'CAB000150', '150', 12, 23, 25, 'SKU000150', NULL, NULL, 'products/TqcmUrIwk15Rxhm890mKPFYBRchtIjOj9EKIZ5L4.jpg', 'Earthen Lino', 'White & off white', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 130', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-02 10:43:03', '2025-04-09 14:53:06'),
(153, '5', '[\"Indoor\"]', 'CAB000151', '151', 12, 23, 22, NULL, NULL, NULL, 'products/dVRyZiYgv73xJM9n1qd5x6JH29DBOP4CZ8EJlQ3Z.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 101', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-04 03:54:13', '2025-03-12 06:19:13'),
(154, '5', '[\"Indoor\"]', 'CAB000152', '152', 12, 23, 23, NULL, NULL, NULL, 'products/HkdO5VXlkTsMT1Y1ez5eXCXemrULy3uCqBtkWVGi.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 102', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-04 03:56:58', '2025-03-12 06:19:13'),
(155, '5', '[\"Indoor\"]', 'CAB000153', '153', 12, 23, 24, NULL, NULL, NULL, 'products/bkSE8F410khTQFUYjFLhS1JSpMiVHaklAbUdGEbz.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 103', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:23:21', '2025-03-12 06:19:13'),
(156, '5', '[\"Indoor\"]', 'CAB000154', '154', 12, 23, 25, NULL, NULL, NULL, 'products/0wW5FH46pLpugCzeAINIEIiaXqdiBPHuclNL2Xts.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 105', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:24:47', '2025-03-12 06:19:13'),
(157, '5', '[\"Indoor\"]', 'CAB000155', '155', 12, 24, 26, NULL, NULL, NULL, 'products/mb8fCqmurMinS4DrtHYCkZfY5mKdPYS7VFtGQxiI.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 201', NULL, '405', '20', NULL, '100', '5', '850', 'Meter', '2025-01-04 04:27:48', '2025-03-12 06:19:13'),
(158, '5', '[\"Indoor\"]', 'CAB000156', '156', 12, 24, 27, NULL, NULL, NULL, 'products/qDoCBhWAZms52FgjmkAsmLYZno5XGfsOv6ds0oOT.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 202', NULL, '851', '20', NULL, '100', '5', '1742', 'Meter', '2025-01-04 04:29:24', '2025-03-12 06:19:13'),
(159, '5', '[\"Indoor\"]', 'CAB000157', '157', 12, 24, 28, NULL, NULL, NULL, 'products/NBoLc0fSeHE7jBgnwdAU2QdXVgLOoTvNkZNyNSP3.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 203', NULL, '405', '20', NULL, '100', '5', '850', 'Meter', '2025-01-04 04:31:27', '2025-03-12 06:19:13'),
(160, '5', '[\"Indoor\"]', 'CAB000158', '158', 12, 24, 29, NULL, NULL, NULL, 'products/YClr2hVdLaVxVhcdyr9rFEc9KOQOea3j0YjGa3LW.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 204', NULL, '360', '20', NULL, '100', '5', '760', 'Meter', '2025-01-04 04:32:58', '2025-03-12 06:19:13'),
(161, '5', '[\"Indoor\"]', 'CAB000159', '159', 12, 24, 30, NULL, NULL, NULL, 'products/FVMMOSxgvyLnmukz9olYAoyJ39kizLcO93RQ96b1.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 408', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:36:54', '2025-03-12 06:19:13'),
(162, '5', '[\"Indoor\"]', 'CAB000160', '160', 12, 24, 31, NULL, NULL, NULL, 'products/ROhYpSUeUJdh4faSOnHgVNHZDbvnN9ywUZgGpmmW.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 205', NULL, '360', '0', NULL, '100', '5', '720', 'Meter', '2025-01-04 04:39:57', '2025-03-12 06:19:13'),
(163, '5', '[\"Indoor\"]', 'CAB000161', '161', 12, 24, 32, NULL, NULL, NULL, 'products/45UjMgOwV6x4icDieZ7x14EyOnrYgj15nPKn54lv.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 206', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:41:35', '2025-03-12 06:19:13'),
(164, '5', '[\"Indoor\"]', 'CAB000162', '162', 12, 24, 30, NULL, NULL, NULL, 'products/CuPRiwZIYau7XPKcEUcZA6L7NDlbMPck4OxTtrIH.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 418', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:42:55', '2025-03-12 06:19:13'),
(165, '5', '[\"Indoor\"]', 'CAB000163', '163', 12, 24, 32, NULL, NULL, NULL, 'products/elTdbBBHZMjRTjD8BJgVzFTRlXBfB6RnFdUnJzGL.jpg', 'Earthen Lino', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 220', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:44:11', '2025-03-12 06:19:13'),
(166, '5', '[\"Indoor\"]', 'CAB000164', '164', 12, 24, 26, NULL, NULL, NULL, 'products/0FqouVxp577GhmOu03EpP58TnlSTyF2bL2HGRBZN.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 207', NULL, '405', '20', NULL, '100', '5', '850', 'Meter', '2025-01-04 04:50:16', '2025-03-12 06:19:13'),
(167, '5', '[\"Indoor\"]', 'CAB000165', '165', 12, 24, 27, NULL, NULL, NULL, 'products/1QuYL0qd3Ffo2T4zWIWJ34RRkrE569WskN24Ug91.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 208', NULL, '405', '20', NULL, '100', '5', '850', 'Meter', '2025-01-04 04:54:03', '2025-03-12 06:19:13'),
(168, '5', '[\"Indoor\"]', 'CAB000166', '166', 12, 24, 32, NULL, NULL, NULL, 'products/m91VwlaXDmVfV2tYyQft7xaVMomnMrZ6OSnhI4D6.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 209', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:56:24', '2025-03-12 06:19:13'),
(169, '5', '[\"Indoor\"]', 'CAB000167', '167', 12, 24, 30, NULL, NULL, NULL, 'products/th4VoteTw62V3Q5QcksXuOaJSniLLJXgxanZRzPE.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 402', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 04:59:09', '2025-03-12 06:19:13'),
(170, '5', '[\"Indoor\"]', 'CAB000168', '168', 12, 24, 32, NULL, NULL, NULL, 'products/1OjYNvpeTRc0QdQTFCLr1Ogqi44IdWgsgdzoGIvS.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 212', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 05:00:38', '2025-03-12 06:19:13'),
(171, '5', '[\"Indoor\"]', 'CAB000169', '169', 12, 24, 29, NULL, NULL, NULL, 'products/XiQ0KSf39wMeSrMIIYQcyggGFq1DlQhlq5d7ikSH.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 214', NULL, '360', '20', NULL, '100', '5', '760', 'Meter', '2025-01-04 05:02:31', '2025-03-12 06:19:13'),
(172, '5', '[\"Indoor\"]', 'CAB000170', '170', 12, 24, 30, NULL, NULL, NULL, 'products/sbdWQkn3W5AoMy6VSmUvoPxrhK3oXB1UWpuRhejt.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO. 404', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 05:04:11', '2025-03-12 06:19:13'),
(173, '5', '[\"Indoor\"]', 'CAB000171', '171', 12, 24, 32, NULL, NULL, NULL, 'products/YO6n63LYnhCDZ2X83vWuYfr4SEhmrNIjslerAmeg.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 215', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 05:12:42', '2025-03-12 06:19:13'),
(174, '5', '[\"Indoor\"]', 'CAB000172', '172', 12, 24, 31, NULL, NULL, NULL, 'products/MVaMSxEDTQEmAHr5S8mv94dvZq3VZt2KqpyS0r8e.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 216', NULL, '360', '20', NULL, '100', '5', '760', 'Meter', '2025-01-04 05:14:36', '2025-03-12 06:19:13'),
(175, '5', '[\"Indoor\"]', 'CAB000173', '173', 12, 24, 28, NULL, NULL, NULL, 'products/2nX9KzJUDsMly6tmGXB3N9EXDCgPRD8AHe9cVDy4.jpg', 'Earthen Lino', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 217', NULL, '405', '20', NULL, '100', '5', '850', 'Meter', '2025-01-04 05:16:07', '2025-03-12 06:19:13'),
(176, '5', '[\"Indoor\"]', 'CAB000174', '174', 12, 25, 33, NULL, NULL, NULL, 'products/XY0WSo9PcTKFiRdRrFagGL0UJnAlfSz53dHtOvnB.jpg', 'Saga Matt Textures', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 602', NULL, '388', '20', NULL, '100', '5', '816', 'Meter', '2025-01-04 05:17:50', '2025-03-12 06:19:13'),
(177, '5', '[\"Indoor\"]', 'CAB000175', '175', 12, 25, 34, NULL, NULL, NULL, 'products/94YH9OpT81BlMykvK5XmlfTujBSAcG64BD1OPvUt.jpg', 'Saga Matt Textures', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 716', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 05:19:11', '2025-03-12 06:19:13'),
(178, '5', '[\"Indoor\"]', 'CAB000176', '176', 12, 25, 35, NULL, NULL, NULL, 'products/9z54OVKo2ujsdJHhg8OPv1SUjkqKqATvdHhaCtew.jpg', 'Saga Matt Textures', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 717', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 05:22:00', '2025-03-12 06:19:13'),
(179, '5', '[\"Indoor\"]', 'CAB000177', '177', 12, 25, 36, NULL, NULL, NULL, 'products/ap7At5Z96BWF4xgXomBQZKaBEyXaRrlL87Eopnw5.jpg', 'Saga Matt Textures', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NI. 718', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 05:30:25', '2025-03-12 06:19:13'),
(180, '5', '[\"Indoor\"]', 'CAB000178', '178', 12, 25, 37, NULL, NULL, NULL, 'products/nywA7JVmLlg7KuywzIgBH1cvLuseqI54qkZ2Z32i.jpg', 'Saga Matt Textures', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 719', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 05:31:48', '2025-03-12 06:19:13'),
(181, '5', '[\"Indoor\"]', 'CAB000179', '179', 12, 25, 38, NULL, NULL, NULL, 'products/28BSCJOHG6lJJlcnyE3eNFk1yf0igL1KCbPMYrk0.jpg', 'Saga Matt Textures', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 720', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 05:33:13', '2025-03-12 06:19:13'),
(182, '5', '[\"Indoor\"]', 'CAB000180', '180', 12, 26, 39, NULL, NULL, NULL, 'products/hozbjkj4MOTaZhm4TNU2W0CmXPnUOWoAEeQynY16.jpg', 'POETRY ETHNIC BLOOMS', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 407', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 05:34:53', '2025-03-12 06:19:13'),
(183, '5', '[\"Indoor\"]', 'CAB000181', '181', 12, 26, 40, NULL, NULL, NULL, 'products/HPJcAJ7CboC4Pat6Ji45K3vUIMPi0Nduj8hNTQMn.jpg', 'POETRY ETHNIC BLOOMS', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 408', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 05:39:44', '2025-03-12 06:19:13'),
(184, '5', '[\"Indoor\"]', 'CAB000182', '182', 12, 26, 41, NULL, NULL, NULL, 'products/7GjIrWHIbwui4jeB1Ey04kkUuqzdfUbP98PPYUKl.jpg', 'POETRY ETHNIC BLOOMS', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 409', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 05:41:09', '2025-03-12 06:19:13'),
(185, '5', '[\"Indoor\"]', 'CAB000183', '183', 12, 23, 25, NULL, NULL, NULL, 'products/rTvNglgacrFFtdLWIOfvGAvdXvx0zGrBGuJTUrgO.jpg', 'Earthen Lino', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 124', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-04 05:55:25', '2025-03-12 06:19:13'),
(186, '5', '[\"Indoor\"]', 'CAB000184', '184', 12, 24, 28, NULL, NULL, NULL, 'products/l9DdwFQEdzYRzebmN3w0iuYHrPVnUSoiEanYhnXt.jpg', 'Earthen Lino', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 211', NULL, '405', '20', NULL, '100', '5', '850', 'Meter', '2025-01-04 05:57:30', '2025-03-12 06:19:13'),
(187, '5', '[\"Indoor\"]', 'CAB000185', '185', 12, 25, 33, NULL, NULL, NULL, 'products/orvzKLxKp8rxe12xRKdpO8ib8uaKvns9kHemInMr.jpg', 'Saga Matt Textures', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-620', NULL, '388', '20', NULL, '100', '5', '816', 'Meter', '2025-01-04 06:01:26', '2025-03-12 06:19:13'),
(188, '5', '[\"Indoor\"]', 'CAB000186', '186', 12, 25, 34, NULL, NULL, NULL, 'products/wg7orfsn0LW3dMSlx9aIvZhEtyPcH16msPvQw9Lc.jpg', 'Saga Matt Textures', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 711', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 06:03:09', '2025-03-12 06:19:13'),
(189, '5', '[\"Indoor\"]', 'CAB000187', '187', 12, 25, 35, NULL, NULL, NULL, 'products/v9nCCpDDOhTdbI4CNWjuCis4LhLhPxeG9d1HcKNB.jpg', 'Saga Matt Textures', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 712', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 06:10:03', '2025-03-12 06:19:13'),
(190, '5', '[\"Indoor\"]', 'CAB000188', '188', 12, 25, 36, NULL, NULL, NULL, 'products/4qmkS7iFNcYRs7KFZjG9aa8yuCxH24T7gFajkv21.jpg', 'Saga Matt Textures', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 713', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 06:20:14', '2025-03-12 06:19:13'),
(191, '5', '[\"Indoor\"]', 'CAB000189', '189', 12, 25, 37, NULL, NULL, NULL, 'products/7A86AbcXEHjoKyMD8BXfclBYRgbfWiGr5bJxKdJZ.jpg', 'Saga Matt Textures', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 714', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 06:22:09', '2025-03-12 06:19:13'),
(192, '5', '[\"Indoor\"]', 'CAB000190', '190', 12, 25, 38, NULL, NULL, NULL, 'products/Jlm4XNBucsdWxdevIBiOFncX8Na2kz78dexnEpCG.jpg', 'Saga Matt Textures', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 715', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-04 06:25:42', '2025-03-12 06:19:13'),
(193, '5', '[\"Indoor\"]', 'CAB000191', '191', 12, 26, 39, NULL, NULL, NULL, 'products/fXzxNZxwSpHGOEyZdIZmKRdmFyc5ofQNC5L4pSds.jpg', 'POETRY ETHNIC BLOOMS', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 419', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 06:27:10', '2025-03-12 06:19:13'),
(194, '5', '[\"Indoor\"]', 'CAB000192', '192', 12, 26, 40, NULL, NULL, NULL, 'products/U34gB0r0UFteM9X0ktHKh1zMQByM9RrOp1avAFR0.jpg', 'POETRY ETHNIC BLOOMS', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 420', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 06:28:35', '2025-03-12 06:19:13'),
(195, '5', '[\"Indoor\"]', 'CAB000193', '193', 12, 26, 41, NULL, NULL, NULL, 'products/8t896yZIjRLub6yMq4eCXHohC2a8On5kIJfMm29F.jpg', 'POETRY ETHNIC BLOOMS', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 421', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 06:30:09', '2025-03-12 06:19:13'),
(196, '5', '[\"Indoor\"]', 'CAB000194', '194', 12, 26, 39, NULL, NULL, NULL, 'products/EvexaKUzAQhay7RRJTqoZil2batrD6e3w2iWh8eu.jpg', 'POETRY ETHNIC BLOOMS', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 422', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 06:31:34', '2025-03-12 06:19:13'),
(197, '5', '[\"Indoor\"]', 'CAB000195', '195', 12, 26, 40, NULL, NULL, NULL, 'products/JD5XOWBm0p2XIwn84JxqDOcBAGa80NJTg1PJjhRt.jpg', 'POETRY ETHNIC BLOOMS', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 423', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 06:32:50', '2025-03-12 06:19:13'),
(198, '5', '[\"Indoor\"]', 'CAB000196', '196', 12, 26, 41, NULL, NULL, NULL, 'products/S0eh1iafwU9EU0pyeHsrdAUUhPW3isEJ638nH8Yq.jpg', 'POETRY ETHNIC BLOOMS', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 424', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-04 06:34:25', '2025-03-12 06:19:13'),
(199, '5', '[\"Indoor\"]', 'CAB000197', '197', 12, 34, 48, NULL, NULL, NULL, 'products/hNer1zGRM3Ge4bOvNkeW5wOaDxKv8ZDmNbzO2u4O.jpg', 'NATURAL', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 539, SHADE-22', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-04 07:01:48', '2025-03-12 06:19:13'),
(200, '5', '[\"Indoor\"]', 'CAB000198', '198', 12, 35, 67, NULL, NULL, NULL, 'products/SI7iUuzmzBVdkf5Pf11RistYXLjzg6Vn9LWTsXPB.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 351, SHADE-14', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-04 07:03:19', '2025-03-12 06:19:13'),
(201, '5', '[\"Indoor\"]', 'CAB000199', '199', 12, 35, 67, NULL, NULL, NULL, 'products/AxFXmw3TdyXRRu92n6oUetBaxVZMb9Q0Fsd5mgtE.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 352, SHADE-15', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-04 07:04:45', '2025-03-12 06:19:13'),
(202, '5', '[\"Indoor\"]', 'CAB000200', '200', 12, 35, 50, NULL, NULL, NULL, 'products/XSSTGFnNSJUav9RER6mKdPXoH7j8GQi02GFEOCUn.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 353, SHADE NO.- 16', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-04 07:14:12', '2025-03-12 06:19:13'),
(203, '5', '[\"Indoor\"]', 'CAB000201', '201', 12, 36, 53, NULL, NULL, NULL, 'products/Yt8T2JHtkAwQHmt9Zt4EJYIIRd9npx6SEjvlYyQQ.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 423, SHADE NO.- 14', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-04 07:15:34', '2025-03-12 06:19:13'),
(204, '5', '[\"Indoor\"]', 'CAB000202', '202', 12, 36, 53, NULL, NULL, NULL, 'products/JtobhWds97SvUvlnNRtBogQgxT2AvRh57UoLlpLJ.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 410, SHADE NO.- 13', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-04 07:17:14', '2025-03-12 06:19:13'),
(205, '5', '[\"Indoor\"]', 'CAB000203', '203', 12, 36, 52, NULL, NULL, NULL, 'products/uu9KwQmZnR7A7wDv8wKaNYsa5KuSeR9768SDIej4.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 411, SHADE NO.- 16', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-04 07:18:48', '2025-03-12 06:19:13'),
(206, '5', '[\"Indoor\"]', 'CAB000204', '204', 12, 36, 51, NULL, NULL, NULL, 'products/Lo1mV3XEt80erjmZnN2YGmotkoj4KzcWpmYSSc0V.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 450 SHADE NO.- 15', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-04 07:20:23', '2025-03-12 06:19:13'),
(207, '5', '[\"Indoor\"]', 'CAB000205', '205', 12, 37, 56, NULL, NULL, NULL, 'products/FZO3Qcpdn2eiDrnWfLV1RC3JjBLWs6oTMQwq3WD3.jpg', 'LELIN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 507, SHADE NO.- 06', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-04 07:21:53', '2025-03-12 06:19:13'),
(208, '5', '[\"Indoor\"]', 'CAB000206', '206', 12, 17, 61, NULL, NULL, NULL, 'products/aTKOt0Dbn80vwZUDiZx8A4kU28lXyXha5OOB8DuK.jpg', 'NATURAL', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 232, SHADE NO.- 26', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-04 07:23:39', '2025-03-12 06:19:13'),
(209, '5', '[\"Indoor\"]', 'CAB000207', '207', 12, 17, 61, NULL, NULL, NULL, 'products/S5289nc5BYstHhVfKPSINZREBuCER3pa9zzitOv4.jpg', 'NATURAL', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 233, SHADE NO.- 27', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-04 07:25:54', '2025-03-12 06:19:13'),
(210, '5', '[\"Indoor\"]', 'CAB000208', '208', 12, 17, 61, NULL, NULL, NULL, 'products/euXpJG61OnfiLvsdtA1mhTNSwDBID8odPir238c6.jpg', 'NATURAL', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 234, SHADE NO.- 28', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-04 07:27:17', '2025-03-12 06:19:13'),
(213, '5', '[\"Indoor\"]', 'CAB000209', '209', 12, 17, 61, NULL, NULL, NULL, 'products/3GeFSrC9zyyT4DucIjXjF13oHrF2XEFIkF0LXb3o.jpg', 'NATURAL', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 235, SHADE NO.- 29', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-04 11:19:49', '2025-03-12 06:19:13'),
(214, '5', '[\"Indoor\"]', 'CAB000210', '210', 12, 17, 61, NULL, NULL, NULL, 'products/bCNA0fppWbY5r3u6nWghIw9F5sU3A9ukLVKSxhWf.jpg', 'NATURAL', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 236, SHADE NO.- 30', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-04 11:21:28', '2025-03-12 06:19:13'),
(215, '5', '[\"Indoor\"]', 'CAB000211', '211', 12, 34, 72, NULL, NULL, NULL, 'products/xyT6Ig5F5h3ri4WPoDInFMBmhIowHyOLa7Mw2TaV.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 533, SHADE NO.- 01', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-04 11:31:41', '2025-03-12 06:19:13'),
(216, '5', '[\"Indoor\"]', 'CAB000212', '212', 12, 34, 48, NULL, NULL, NULL, 'products/uM2tVhs9krzpmYAYcoIYAbaGBhCKXKl33Vcu0em1.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 534 SHADE NO.- 17', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-04 12:07:31', '2025-03-12 06:19:13'),
(217, '5', '[\"Indoor\"]', 'CAB000213', '213', 12, 34, 48, NULL, NULL, NULL, 'products/5cqGrT3fKUeHV7Zv8eyrai7Xmvji6ws0nQfXnbHo.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 535, SHADE NO.- 18', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-04 12:11:03', '2025-03-12 06:19:13'),
(218, '5', '[\"Indoor\"]', 'CAB000214', '214', 12, 34, 48, NULL, NULL, NULL, 'products/4HufwuYWuUAqijvwRZEhfPDlL9NOIE4M4H1PcmRo.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 536, SHADE NO.- 19', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-04 12:15:03', '2025-03-12 06:19:13'),
(219, '5', '[\"Indoor\"]', 'CAB000215', '215', 12, 34, 48, NULL, NULL, NULL, 'products/ecVhDxiQHmgqYfk0BcpWFLTZoGIBNDb7hDsYt3VV.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 537, SHADE NO.- 20', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-04 12:18:19', '2025-03-12 06:19:13'),
(220, '5', '[\"Indoor\"]', 'CAB000216', '216', 12, 36, 53, NULL, NULL, NULL, 'products/ePyQQXJ0V1csw1B7PKZSOj1Wcpt8oiCBIYFcxpKd.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 124, SHADE NO.- 04', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-05 02:22:40', '2025-03-12 06:19:13'),
(221, '5', '[\"Indoor\"]', 'CAB000217', '217', 12, 36, 52, NULL, NULL, NULL, 'products/114IlLkxgLeIENIb9qdLvjLICGreNN33sij4TdHk.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 127, SHADE NO.-04', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-05 02:26:32', '2025-03-12 06:19:13'),
(222, '5', '[\"Indoor\"]', 'CAB000218', '218', 12, 36, 54, NULL, NULL, NULL, 'products/9s7cAKiWOkIF7AiLYVM8P3hicL16l2BfRPUzwqGK.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 412, SHADE NO.- 12', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-05 02:32:22', '2025-03-12 06:19:13'),
(223, '5', '[\"Indoor\"]', 'CAB000219', '219', 12, 36, 54, NULL, NULL, NULL, 'products/C6gU1l6udaft6vKy2MJV7RGns52mLrSqmcjBV9aB.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 420, SHADE NO.- 11', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-05 02:36:27', '2025-03-12 06:19:13'),
(224, '5', '[\"Indoor\"]', 'CAB000220', '220', 12, 36, 51, NULL, NULL, NULL, 'products/hzd6w6NUGaxhLFhPd1tGNto9nL9kF1768DH9S3i9.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 421, SHADE NO.- 14', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-05 02:50:59', '2025-03-12 06:19:13'),
(225, '5', '[\"Indoor\"]', 'CAB000221', '221', 12, 37, 56, NULL, NULL, NULL, 'products/eo6Vwx2ACuOdR0gJ5Ydlf7spFcu2sc8Yhap6ISyD.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 512, SHADE NO.- 03', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-05 02:53:44', '2025-03-12 06:19:13'),
(226, '5', '[\"Indoor\"]', 'CAB000222', '222', 12, 37, 55, NULL, NULL, NULL, 'products/yJiywfel53HGJAlatbwOGwbvRwI81YEYeK2V2QBW.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 513, SHADE NO.- 03', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-05 02:56:24', '2025-03-12 06:19:13'),
(227, '5', '[\"Indoor\"]', 'CAB000223', '223', 12, 38, 57, NULL, NULL, NULL, 'products/atQ1UsKCvJhbSlGRx3vjQ8JlUudh1xt5XIbcg9LG.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 451, SHADE NO.- 01', NULL, '348', '20', NULL, '100', '5', '736', 'Meter', '2025-01-05 02:59:59', '2025-03-12 06:19:13'),
(228, '5', '[\"Indoor\"]', 'CAB000224', '224', 12, 38, 58, NULL, NULL, NULL, 'products/1cf5jX0WxRDsdtm5Lt4yznNgNhB8UPLbhdmkHRrt.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 455, SHADE NO.- 01', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 03:01:24', '2025-03-12 06:19:13'),
(229, '5', '[\"Indoor\"]', 'CAB000225', '225', 12, 39, 60, NULL, NULL, NULL, 'products/SMi05XCMldMuYSwJoJ2HjsznbtTppf2w0jHUyYgO.jpg', 'NATURAL', 'BLIE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 111, SHADE NO.- 11', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-05 03:03:14', '2025-03-12 06:19:13'),
(230, '5', '[\"Indoor\"]', 'CAB000226', '226', 12, 39, 59, NULL, NULL, NULL, 'products/Z8U8piQHRTsMwnoYoYkoT5veuYoCX3YhBqlysac4.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 112, SHADE NO.- 09', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-05 03:05:37', '2025-03-12 06:19:13'),
(231, '5', '[\"Indoor\"]', 'CAB000227', '227', 12, 39, 60, NULL, NULL, NULL, 'products/rkE9qnbYBrp5DJQWBUZjEuzjLdU3BC708YuzbfE4.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 128, SHADE NO.- 10', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-05 03:07:39', '2025-03-12 06:19:13'),
(232, '5', '[\"Indoor\"]', 'CAB000228', '228', 12, 39, 59, NULL, NULL, NULL, 'products/KkQDzlsGhUSpKQt91LT5GQcySAQj7W0qMPW3pK7Z.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 129, SHADE NO.- 08', NULL, '380', '20', NULL, '100', '5', '800', 'Meter', '2025-01-05 03:10:25', '2025-03-12 06:19:13'),
(233, '5', '[\"Indoor\"]', 'CAB000229', '229', 12, 17, 61, NULL, NULL, NULL, 'products/ZQUubQjg9RFXfsNw73uPJBGXXL5N5vhe76BG9B6o.jpg', 'NATUAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 214, SHADE NO.- 09', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:12:48', '2025-03-12 06:19:13'),
(234, '5', '[\"Indoor\"]', 'CAB000230', '230', 12, 17, 61, NULL, NULL, NULL, 'products/T3fx0LY73xqQCcHWr8KHJevGGZlJmTwTKKvWme8S.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 218, SHADE NO.- 12', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:14:17', '2025-03-12 06:19:13'),
(235, '5', '[\"Indoor\"]', 'CAB000231', '231', 12, 17, 61, NULL, NULL, NULL, 'products/OIDYimd0Ru5MH728VvpLbnYb8sM2wBLpVTNEqLhf.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 227, SHADE NO.- 22', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:17:20', '2025-03-12 06:19:13'),
(236, '5', '[\"Indoor\"]', 'CAB000232', '232', 12, 17, 17, NULL, NULL, NULL, 'products/vrFzHd6DeACE1utz8ZxqV9OCGcN48Ovu8B8mvGZH.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 228, SHADE NO.- 06', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:21:10', '2025-03-12 06:19:13'),
(237, '5', '[\"Indoor\"]', 'CAB000233', '233', 12, 17, 61, NULL, NULL, NULL, 'products/eO1QW6VcYzYFAIygNIPw6TwMxwoTJbc6MYoBkDI5.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 229, SHADE NO.- 23', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:40:35', '2025-03-12 06:19:13'),
(238, '5', '[\"Indoor\"]', 'CAB000234', '234', 12, 17, 61, NULL, NULL, NULL, 'products/UECCFthMnlwA4t96Q8f1sgavxbbE377rxrnZYy8F.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 230, SHADE NO.- 24', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:43:55', '2025-03-12 06:19:13'),
(239, '5', '[\"Indoor\"]', 'CAB000235', '235', 12, 17, 61, NULL, NULL, NULL, 'products/hhZN23FwercGsyPGUrogz6tlY5Q0wa1AHx6nZfZK.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 231, SHADE NO.- 25', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 03:48:33', '2025-03-12 06:19:13'),
(240, '5', '[\"Indoor\"]', 'CAB000236', '236', 12, 18, 19, NULL, NULL, NULL, 'products/FvXCRcBD9pK3haVaCE8f6Fs9wBVD0Z1s9qILAs8a.jpg', 'NATURAL', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 440, SHADE NO.- 07', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2025-01-05 03:53:57', '2025-03-12 06:19:13'),
(241, '5', '[\"Indoor\"]', 'CAB000237', '237', 12, 23, 23, NULL, NULL, NULL, 'products/CBJ8mPoGWAZalz6VGES6nnkbHaXYwZi34GGRdaq6.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 132', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-05 03:55:57', '2025-03-12 06:19:13'),
(242, '5', '[\"Indoor\"]', 'CAB000238', '238', 12, 23, 24, NULL, NULL, NULL, 'products/WiTZY2iEeV0DGw4uU6uw7hd3Tao1Y6pd5WOVmWaA.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 133', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 03:57:44', '2025-03-12 06:19:13'),
(243, '5', '[\"Indoor\"]', 'CAB000239', '239', 12, 23, 25, NULL, NULL, NULL, 'products/ZNgkvDsTDt88JefArOWF2wOwIWjzx8aecE0tCW4A.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 135', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 04:02:24', '2025-03-12 06:19:13'),
(244, '5', '[\"Indoor\"]', 'CAB000240', '240', 12, 24, 30, NULL, NULL, NULL, 'products/unvixbEaNylp8h15f5ggGszr2virjUPAFE3ur8kH.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 444', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 04:04:27', '2025-03-12 06:19:13'),
(245, '5', '[\"Indoor\"]', 'CAB000241', '241', 12, 24, 29, NULL, NULL, NULL, 'products/NP2YyUYsi3Ouzxqnlwft7keKXIBf8Sb22WvtoVm2.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 228', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 04:08:55', '2025-03-12 06:19:13'),
(246, '5', '[\"Indoor\"]', 'CAB000242', '242', 12, 24, 32, NULL, NULL, NULL, 'products/uuD23bOPn0n34utFP2Wn9o9MdkPrgPFaupL9UZa6.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 229', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 04:12:39', '2025-03-12 06:19:13'),
(247, '5', '[\"Indoor\"]', 'CAB000243', '243', 12, 24, 31, NULL, NULL, NULL, 'products/piiGHhDrCs1B6XBiXnIldgT0yQ66l6Fe7b5aIjgn.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 230', NULL, '360', '20', NULL, '100', '5', '760', 'Meter', '2025-01-05 04:14:56', '2025-03-12 06:19:13'),
(248, '5', '[\"Indoor\"]', 'CAB000244', '244', 12, 25, 34, NULL, NULL, NULL, 'products/2eBj2rHgmOYtu58nqF7KI6cFPetc0mD9mNTVI8jG.jpg', 'Saga Matt Textures', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 731', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 04:16:24', '2025-03-12 06:19:13'),
(249, '5', '[\"Indoor\"]', 'CAB000245', '245', 12, 25, 35, NULL, NULL, NULL, 'products/f8HVcOZDSbym5A9aM1r6DxzT5DawPcv8tzx4zv0x.jpg', 'Saga Matt Textures', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 732', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 04:17:28', '2025-03-12 06:19:13'),
(250, '5', '[\"Indoor\"]', 'CAB000246', '246', 12, 25, 36, NULL, NULL, NULL, 'products/n5D8ip5EZjptmCXbJv7oTWC9DOkeCMZtbc07VV9I.jpg', 'Saga Matt Textures', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 733', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 04:19:02', '2025-03-12 06:19:13'),
(251, '5', '[\"Indoor\"]', 'CAB000247', '247', 12, 25, 38, NULL, NULL, NULL, 'products/XgDkq8K4PBzgmk3AxRLJBq95OsGcB5JR147rmfO0.jpg', 'Saga Matt Textures', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 735', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 04:20:37', '2025-03-12 06:19:13'),
(252, '5', '[\"Indoor\"]', 'CAB000248', '248', 12, 26, 39, NULL, NULL, NULL, 'products/8v2fFtXpzGZintBnLdIHa7LasFZNNcfsWKYkfUCW.jpg', 'POETRY ETHNIC BLOOMS', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 434', NULL, '352', '20', NULL, '100', '5', '744', 'Meter', '2025-01-05 04:21:51', '2025-03-12 06:19:13'),
(253, '5', '[\"Indoor\"]', 'CAB000249', '249', 12, 26, 40, NULL, NULL, NULL, 'products/2lQ3zWeNHDT4xs55KkFyBhFeRnWZ6OVJ8I38xaIb.jpg', 'POETRY ETHNIC BLOOMS', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 435', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 04:22:56', '2025-03-12 06:19:13'),
(254, '5', '[\"Indoor\"]', 'CAB000250', '250', 12, 26, 41, NULL, NULL, NULL, 'products/d0tmzrkEt6DCggyaQvxwUTVb7TOlte7jygqN5A5M.jpg', 'POETRY ETHNIC BLOOMS', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 436', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 04:24:02', '2025-03-12 06:19:13'),
(255, '5', '[\"Indoor\"]', 'CAB000251', '251', 12, 34, 66, NULL, NULL, NULL, 'products/fczbjF5GpZUKMcwG7vcbMmXSzg6tfsUH2CWyWFQj.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 501, SHADE NO.- 03', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-05 07:05:46', '2025-03-12 06:19:13'),
(256, '5', '[\"Indoor\"]', 'CAB000252', '252', 12, 34, 48, NULL, NULL, NULL, 'products/NHWnEvge8TkL4vGpgllv1R8FRXexkNKYWPuSD5k2.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 502, SHADE NO.- 01', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 07:08:05', '2025-03-12 06:19:13'),
(257, '5', '[\"Indoor\"]', 'CAB000253', '253', 12, 34, 48, NULL, NULL, NULL, 'products/f5qADBO5XiBaAlA7CBdIl71uAzbBUQ4D738lsHxj.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 506, SHADE NO.- 02', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 07:09:30', '2025-03-12 06:19:13'),
(258, '5', '[\"Indoor\"]', 'CAB000254', '254', 12, 34, 48, NULL, NULL, NULL, 'products/xDHNtZZ1EOt79r17df9wrNNxCBptRAvHAxa7oVVT.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 508, SHADE NO.- 03', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 07:11:18', '2025-03-12 06:19:13'),
(259, '5', '[\"Indoor\"]', 'CAB000255', '255', 12, 34, 66, NULL, NULL, NULL, 'products/l42qzw5jE2n9Zka2B5hYo5U3Ph6SNejjVYhLSSHh.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 522, SHADE NO.- 01', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-05 07:12:52', '2025-03-12 06:19:13'),
(260, '5', '[\"Indoor\"]', 'CAB000256', '256', 12, 34, 48, NULL, NULL, NULL, 'products/0qzaYS3UEVNVzeX7zdGkd7uD3qosJClcdIn7L4Ga.jpg', 'GREY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 531, SHADE NO.- 15', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 07:15:25', '2025-03-12 06:19:13'),
(261, '5', '[\"Indoor\"]', 'CAB000257', '257', 12, 34, 48, NULL, NULL, NULL, 'products/boem3FmhzhsjBejBKI8OWhsypq6cBEeMCkfzF72Z.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 532, SHADE NO.- 16', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 07:20:18', '2025-03-12 06:19:13'),
(262, '5', '[\"Indoor\"]', 'CAB000258', '258', 12, 35, 67, NULL, NULL, NULL, 'products/V3bGyXtkNbhNk0FUYbnepcXEKEwQmdPqzr7dKjnT.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 301, SHADE NO.- 01', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-05 07:22:32', '2025-03-12 06:19:13'),
(263, '5', '[\"Indoor\"]', 'CAB000259', '259', 12, 35, 50, NULL, NULL, NULL, 'products/DZF2y91sqvtykiA7n32H6X3IR12lqhcOC4SojdPv.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 302, SHADE NO.- 01', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-05 07:27:41', '2025-03-12 06:19:13'),
(264, '5', '[\"Indoor\"]', 'CAB000260', '260', 12, 35, 67, NULL, NULL, NULL, 'products/JuhShqyZLHSzIGKjZFoNeEYJEI1is4VrgMx6Rmll.jpg', 'GREY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 304, SHADE NO.- 02', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-05 07:29:23', '2025-03-12 06:19:13'),
(265, '5', '[\"Indoor\"]', 'CAB000261', '261', 12, 35, 49, NULL, NULL, NULL, 'products/vUzfZRvSx9FB6DNEMpfbsC2VcVfKMScpkBMeCy0w.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 305, SHADE NO.- 01', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-05 07:31:20', '2025-03-12 06:19:13'),
(266, '5', '[\"Indoor\"]', 'CAB000262', '262', 12, 35, 50, NULL, NULL, NULL, 'products/T02zbOFOKqtImbthKsT7i3GLRUjPzEOIPIbNacEy.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 306, SHADE NO.- 02', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-05 07:32:41', '2025-03-12 06:19:13'),
(267, '5', '[\"Indoor\"]', 'CAB000263', '263', 12, 35, 49, NULL, NULL, NULL, 'products/U0HDQLOGPoov4umbq0FnMVj06mLEhzy2CwjOpaSI.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 307, SHADE NO.- 02', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-05 07:34:11', '2025-03-12 06:19:13'),
(268, '5', '[\"Indoor\"]', 'CAB000264', '264', 12, 35, 50, NULL, NULL, NULL, 'products/uI7cJt3Nbv1cDyRvogRpu1bWUlIeOFlF0MZM8zVs.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 308, SHADE NO.- 03', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-05 07:35:31', '2025-03-12 06:19:13'),
(269, '5', '[\"Indoor\"]', 'CAB000265', '265', 12, 35, 67, NULL, NULL, NULL, 'products/SAkSsYudFCjz091VypD4p4xL6now0ndWKY2SaLrC.jpg', 'GREY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 329, SHADE NO.- 06', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-05 07:38:02', '2025-03-12 06:19:13'),
(270, '5', '[\"Indoor\"]', 'CAB000266', '266', 12, 35, 67, NULL, NULL, NULL, 'products/PHlB0XO7DmpOVnqUX2Lb2kxrMDSK9xaBKIVyC2pH.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 331, SHADE NO.- 07', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-05 07:41:08', '2025-03-12 06:19:13'),
(271, '5', '[\"Indoor\"]', 'CAB000267', '267', 12, 35, 67, NULL, NULL, NULL, 'products/MVvfHYRJ8QDeE35waiZvjnaNwJ3ZA1alMk7w2Cp2.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 332, SHADE NO.- 08', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-05 07:44:41', '2025-03-12 06:19:13'),
(272, '5', '[\"Indoor\"]', 'CAB000268', '268', 12, 36, 53, NULL, NULL, NULL, 'products/ccmrr5V1fB7fs0ISnIZKw4RsIXvihsSjgYjiQKYp.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 401, SHADE NO.- 12', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-05 07:46:18', '2025-03-12 06:19:13'),
(273, '5', '[\"Indoor\"]', 'CAB000269', '269', 12, 36, 51, NULL, NULL, NULL, 'products/qxt510FgUlssOg2ROO6uyufqmHDM57G1KBjwXexE.jpg', 'GREY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 402, SHADE NO.- 03', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-05 07:48:07', '2025-03-12 06:19:13'),
(274, '5', '[\"Indoor\"]', 'CAB000270', '270', 12, 36, 53, NULL, NULL, NULL, 'products/67hQFvrTBw7eIVd9elkQkj2uZsPRNzAbH71NvVRA.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 117, SHADE NO.- 03', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-05 07:52:49', '2025-03-12 06:19:13'),
(275, '5', '[\"Indoor\"]', 'CAB000271', '271', 12, 36, 51, NULL, NULL, NULL, 'products/7xteOBQa21yoN5QXpQ0a5ye7uYWSngqUqOtDw3Ab.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 405, SHADE NO.- 01', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-05 07:54:46', '2025-03-12 06:19:13'),
(276, '5', '[\"Indoor\"]', 'CAB000272', '272', 12, 36, 54, NULL, NULL, NULL, 'products/NxgnrzPLkkfsRXuNiFoxbEYohA14B7mbCobZoKgS.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 406, SHADE NO.- 08', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-05 07:57:22', '2025-03-12 06:19:13'),
(277, '5', '[\"Indoor\"]', 'CAB000273', '273', 12, 36, 52, NULL, NULL, NULL, 'products/nfwlzQxaiP6BcPvBKeM25Q0zgTds6qSMJYImRWwJ.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 407, SHADE NO.- 14', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-05 08:04:13', '2025-03-12 06:19:13'),
(278, '5', '[\"Indoor\"]', 'CAB000274', '274', 12, 36, 51, NULL, NULL, NULL, 'products/naX958LTha8XmrxOvSiSzOZyGKtkBiZwZhVhNFJf.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 413, SHADE NO.- 04', NULL, '377', '20', NULL, '100', '5', '794', 'Meter', '2025-01-05 08:08:06', '2025-03-12 06:19:13'),
(279, '5', '[\"Indoor\"]', 'CAB000275', '275', 12, 36, 53, NULL, NULL, NULL, 'products/D4Vvo5h8hu49vjHSr1kG4MrYgqVIWyh7aNJ7FJ5a.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 414, SHADE NO.- 08', NULL, '417', '20', NULL, '100', '5', '874', 'Meter', '2025-01-05 08:09:45', '2025-03-12 06:19:13'),
(280, '5', '[\"Indoor\"]', 'CAB000276', '276', 12, 36, 54, NULL, NULL, NULL, 'products/lKlrUPE5kG953Shgnz5ZB4CkhVIXPw9vVILDEnr0.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 415, SHADE NO.- 09', NULL, '371', '20', NULL, '100', '5', '782', 'Meter', '2025-01-05 08:11:53', '2025-03-12 06:19:13'),
(281, '5', '[\"Indoor\"]', 'CAB000277', '277', 12, 37, 56, NULL, NULL, NULL, 'products/pqpg5KpAE0D9SLfonxo5Tx2ICqAtZRxJ5Pn27q1n.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 532, SHADE NO.- 01', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-05 08:14:28', '2025-03-12 06:19:13'),
(282, '5', '[\"Indoor\"]', 'CAB000278', '278', 12, 37, 56, NULL, NULL, NULL, 'products/ffTbyHyuWIsvhd9ZIDDTleP7Sj4ya9VHkrNcLj77.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 536, SHADE NO.- 02', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-05 08:16:13', '2025-03-12 06:19:13'),
(283, '5', '[\"Indoor\"]', 'CAB000279', '279', 12, 37, 68, NULL, NULL, NULL, 'products/cWRAD8niYwLdlxfCDrKO1lERFcMeovccHbM5svTr.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 537, SHADE NO.- 02', NULL, '331', '20', NULL, '100', '5', '702', 'Meter', '2025-01-05 08:17:30', '2025-03-12 06:19:13'),
(284, '5', '[\"Indoor\"]', 'CAB000280', '280', 12, 37, 56, NULL, NULL, NULL, 'products/p4H5J2HsZx4p9TNtxgGBOReCVRtyZPdRhfCUowfk.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 541, SHADE NO.- 10', NULL, '336', '20', NULL, '100', '5', '712', 'Meter', '2025-01-05 08:20:09', '2025-03-12 06:19:13'),
(285, '5', '[\"Indoor\"]', 'CAB000281', '281', 12, 38, 57, NULL, NULL, NULL, 'products/3m5BssTQdZcUjlTd0pnqtoTW1MhfOWYuZmOp5TS0.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 457, SHADE NO.- 02', NULL, '348', '20', NULL, '100', '5', '736', 'Meter', '2025-01-05 08:21:34', '2025-03-12 06:19:13'),
(286, '5', '[\"Indoor\"]', 'CAB000282', '282', 12, 38, 70, NULL, NULL, NULL, 'products/PLM2U0Q5H4gCSQPNXXKConoDgTLcZQnJn9DjTR6P.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 458, SHADE NO.- 02', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 08:23:04', '2025-03-12 06:19:13'),
(287, '5', '[\"Indoor\"]', 'CAB000283', '283', 12, 38, 58, NULL, NULL, NULL, 'products/7xE2doASDZGQuxOYUvWbPHnLZVWiW44hcrY9vNNs.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 460, SHADE NO.- 02', NULL, '361', '20', NULL, '100', '5', '762', 'Meter', '2025-01-05 08:25:01', '2025-03-12 06:19:13'),
(288, '5', '[\"Indoor\"]', 'CAB000284', '284', 12, 39, 60, NULL, NULL, NULL, 'products/nPnBNdznoZuP3ue01zlngKa5qWGpiKy4SkzMnbz7.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 134, SHADE NO.- 15', NULL, '370', '20', NULL, '100', '5', '780', 'Meter', '2025-01-05 08:26:24', '2025-03-12 06:19:13'),
(289, '5', '[\"Indoor\"]', 'CAB000285', '285', 12, 39, 71, NULL, NULL, NULL, 'products/HbnIrA4EM6AITcB6A7GeYGf66jfjzyEEiDG9gUwh.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 138, SHADE NO.- 01-4', NULL, '437', '20', NULL, '100', '5', '914', 'Meter', '2025-01-05 08:27:55', '2025-03-12 06:19:13'),
(290, '5', '[\"Indoor\"]', 'CAB000286', '286', 12, 17, 17, NULL, NULL, NULL, 'products/bqEZ21HSlt02p1GUmqKe0HCZ1TK610eWNh2p8VRQ.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 215, SHADE NO.- 04', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 08:29:12', '2025-03-12 06:19:13');
INSERT INTO `products` (`id`, `product_name`, `type`, `tally_code`, `file_number`, `supplier_name`, `supplier_collection`, `supplier_collection_design`, `design_sku`, `rubs_martendale`, `width`, `image`, `image_alt`, `colour`, `composition`, `design_type`, `usage`, `note`, `currency`, `supplier_price`, `freight`, `duty_percentage`, `profit_percentage`, `gst_percentage`, `mrp`, `unit`, `created_at`, `updated_at`) VALUES
(291, '5', '[\"Indoor\"]', 'CAB000287', '287', 12, 17, 61, NULL, NULL, NULL, 'products/gk4hKgVFOl1RsqjauNJ9S0n0V1Y400EOJCR9YvI6.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 216, SHADE NO.- 10', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 08:32:02', '2025-03-12 06:19:13'),
(292, '5', '[\"Indoor\"]', 'CAB000288', '288', 12, 17, 61, NULL, NULL, NULL, 'products/kwAZkpqaVdtqXkfujQ2nkupPEVWdcO0IiWuNj5GA.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 217, SHADE NO.- 13', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 08:37:21', '2025-03-12 06:19:13'),
(293, '5', '[\"Indoor\"]', 'CAB000289', '289', 12, 17, 61, NULL, NULL, NULL, 'products/oqMqomdVi2WaVs6MGgDaFwF9f39oCivv4T71LIjZ.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 219, SHADE NO.- 14', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 08:39:01', '2025-03-12 06:19:13'),
(294, '5', '[\"Indoor\"]', 'CAB000290', '290', 12, 17, 61, NULL, NULL, NULL, 'products/XqqpwEUZcIfkUgCwaHmBOcGyRF5808pXtbhUz8rw.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 220, SHADE NO.- 15', NULL, '516', '20', NULL, '100', '5', '1072', 'Meter', '2025-01-05 08:41:37', '2025-03-12 06:19:13'),
(295, '5', '[\"Indoor\"]', 'CAB000291', '291', 12, 18, 18, NULL, NULL, NULL, 'products/gupgr9U989UAb5UAV4hnugo9jCE6AvLVrNMuU8ff.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 401, SHADE NO.- 01', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-05 09:14:01', '2025-03-12 06:19:13'),
(296, '5', '[\"Indoor\"]', 'CAB000292', '292', 12, 18, 20, NULL, NULL, NULL, 'products/SR2Rjp5HSfFSfaWTJ6nRGpJ6b4RfCpS9Oy6pKR2C.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 403, SHADE  NO.- 01', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-05 09:15:28', '2025-03-12 06:19:13'),
(297, '5', '[\"Indoor\"]', 'CAB000293', '293', 12, 18, 19, NULL, NULL, NULL, 'products/BXTLThxwEgAri2rQ4ysXQjAln8xByWVCVjpaBzuD.jpg', 'GREY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 404, SHADE  NO.- 01', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2025-01-05 09:16:42', '2025-03-12 06:19:13'),
(298, '5', '[\"Indoor\"]', 'CAB000294', '294', 12, 18, 18, NULL, NULL, NULL, 'products/Pkp6c6BZA8wLkBfwy6b4Z0cNe33SAmJGoHS768vp.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 432, SHADE  NO.- 10', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-05 09:18:08', '2025-03-12 06:19:13'),
(299, '5', '[\"Indoor\"]', 'CAB000295', '295', 12, 18, 20, NULL, NULL, NULL, 'products/123YjZXvGYKEuPI8FIGv48lCspdY5vET2nYKpRXB.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 434, SHADE  NO.- 07', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-05 09:19:33', '2025-03-12 06:19:13'),
(300, '5', '[\"Indoor\"]', 'CAB000296', '296', 12, 18, 19, NULL, NULL, NULL, 'products/uYUdWBzfebBB3EmjktRaLkiBPsay5nW6lhVaXg7q.jpg', 'NATURAL', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 435, SHADE  NO.- 06', NULL, '373', '20', NULL, '100', '5', '786', 'Meter', '2025-01-05 09:20:44', '2025-03-12 06:19:13'),
(301, '5', '[\"Indoor\"]', 'CAB000297', '297', 12, 23, 22, NULL, NULL, NULL, 'products/zOygwmpLIEsFME0wf1CkCzLDM1SjcoRRnHv5IHgg.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 111', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-05 10:09:49', '2025-03-12 06:19:13'),
(302, '5', '[\"Indoor\"]', 'CAB000298', '298', 12, 23, 23, NULL, NULL, NULL, 'products/Q8QuGJTCy2tBuzDPtBuo7sHkGIXPCX66SFTjGFaN.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 112', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-05 10:12:11', '2025-03-12 06:19:13'),
(303, '5', '[\"Indoor\"]', 'CAB000299', '299', 12, 23, 24, NULL, NULL, NULL, 'products/QhJtGy5nFNbpXmXSUpgGkf7FmQxHMS6GM9gCBxQr.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 113', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 10:13:20', '2025-03-12 06:19:13'),
(304, '5', '[\"Indoor\"]', 'CAB000300', '300', 12, 23, 25, NULL, NULL, NULL, 'products/BbkOtaHW96f2S27FIyWKGCD1KZOG4Fs0YNQKulL4.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 115', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 10:14:30', '2025-03-12 06:19:13'),
(305, '5', '[\"Indoor\"]', 'CAB000301', '301', 12, 23, 22, NULL, NULL, NULL, 'products/97t6iolIhg3iKHI3UE9mZJu9DiV9wkdceAttWqt7.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 116', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-05 10:15:39', '2025-03-12 06:19:13'),
(306, '5', '[\"Indoor\"]', 'CAB000302', '302', 12, 23, NULL, NULL, NULL, NULL, 'products/4O869FcFHtzninkYtpL7rsXjyzTSI3lKMbpttM1C.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 117', NULL, '382', '20', NULL, '100', '5', '804', 'Meter', '2025-01-05 10:16:48', '2025-03-12 06:19:13'),
(307, '5', '[\"Indoor\"]', 'CAB000303', '303', 12, 23, 24, NULL, NULL, NULL, 'products/7lSwaw62Hbxxn8bg6Q7SXpYQb5y7bZLWPwJYSPHn.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 118', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 10:18:01', '2025-03-12 06:19:13'),
(308, '5', '[\"Indoor\"]', 'CAB000304', '304', 12, 23, 25, NULL, NULL, NULL, 'products/D6Yz0nts8opPB0pIMo0UvD40mAOlQ6Y0K6Hac2K5.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 120', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 10:21:20', '2025-03-12 06:19:13'),
(309, '5', '[\"Indoor\"]', 'CAB000305', '305', 12, 24, 32, NULL, NULL, NULL, 'products/jwh8sH8DcxFulEbCfzzZwZgnKFwLGjW4nQ2EmqGQ.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 223', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 10:22:43', '2025-03-12 06:19:13'),
(310, '5', '[\"Indoor\"]', 'CAB000306', '306', 12, 24, 30, NULL, NULL, NULL, 'products/kuLMftrTpeTcDbfrlgFh4coLWf7YHNiN3UFcJwHn.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 410', NULL, '390', '20', NULL, '100', '5', '820', 'Meter', '2025-01-05 10:25:16', '2025-03-12 06:19:13'),
(311, '5', '[\"Indoor\"]', 'CAB000307', '307', 12, 24, 31, NULL, NULL, NULL, 'products/qMQiLm3JVrCFCLyMDUaujmk9gCxv9bTUVAkgMEkH.jpg', 'Earthen Lino', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 225', NULL, '360', '20', NULL, '100', '5', '760', 'Meter', '2025-01-05 10:26:48', '2025-03-12 06:19:13'),
(312, '5', '[\"Indoor\"]', 'CAB000308', '308', 12, 25, 33, NULL, NULL, NULL, 'products/oiVtTZWQwalNUIR5HE09qY51dqdsJWvb9BTUWCPb.jpg', 'Saga Matt Textures', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 610', NULL, '388', '20', NULL, '100', '5', '816', 'Meter', '2025-01-05 10:28:09', '2025-03-12 06:19:13'),
(313, '5', '[\"Indoor\"]', 'CAB000309', '309', 12, 25, 34, NULL, NULL, NULL, 'products/SeFzOpOvq5hyle7Gc10sZa0FBFPYmytWdyEZO90q.jpg', 'Saga Matt Textures', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 706', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 10:29:24', '2025-03-12 06:19:13'),
(314, '5', '[\"Indoor\"]', 'CAB000310', '310', 12, 25, 35, NULL, NULL, NULL, 'products/HtYAtzcba3Whvfc3bxfW7gMs9Q3SzXEwuBRUK9em.jpg', 'Saga Matt Textures', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 707', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 10:30:48', '2025-03-12 06:19:13'),
(315, '5', '[\"Indoor\"]', 'CAB000311', '311', 12, 25, 37, NULL, NULL, NULL, 'products/2aM3IfUDbyTA0BIAjEfsDJfto1nllmDvbtPCoOFY.jpg', 'Saga Matt Textures', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 709', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 10:32:47', '2025-03-12 06:19:13'),
(316, '5', '[\"Indoor\"]', 'CAB000312', '312', 12, 25, 38, NULL, NULL, NULL, 'products/tOGTO7lFImQ1O03ueHO3lEcZMkaWSbFmR3eCj9NM.jpg', 'Saga Matt Textures', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 710', NULL, '310', '20', NULL, '100', '5', '660', 'Meter', '2025-01-05 10:34:17', '2025-03-12 06:19:13'),
(317, '5', '[\"Indoor\"]', 'CAB000313', '313', 12, 26, 39, NULL, NULL, NULL, 'products/5vTWgWb3p3VxI2qFbUjJKiNYSro1Q1xZoTy9crfX.jpg', 'POETRY ETHNIC BLOOMS', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 425', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 10:35:33', '2025-03-12 06:19:13'),
(318, '5', '[\"Indoor\"]', 'CAB000314', '314', 12, 26, 40, NULL, NULL, NULL, 'products/w5p3QTj0jncY0rsIwJxahw0AsFSMjV96RNzwrlfU.jpg', 'POETRY ETHNIC BLOOMS', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 426', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 10:36:54', '2025-03-12 06:19:13'),
(319, '5', '[\"Indoor\"]', 'CAB000315', '315', 12, 35, 67, NULL, NULL, NULL, 'products/rSEFLIKgCDaLKRM6oCMpFanH6ZhQgdwvAnQlQJXf.jpg', 'LELIN', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 317, SHADE NO.-05', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-05 10:48:58', '2025-03-12 06:19:13'),
(320, '5', '[\"Indoor\"]', 'CAB000316', '316', 12, 26, 39, NULL, NULL, NULL, 'products/WnQWYMe7lhSV9xVFsjLIudw1806O6ozmLkizCDDz.jpg', 'POETRY ETHNIC BLOOMS', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO- 431', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 10:53:39', '2025-03-12 06:19:13'),
(321, '5', '[\"Indoor\"]', 'CAB000317', '317', 12, 26, 40, NULL, NULL, NULL, 'products/C0qdg5LWpcvzrvLvVCbBMd5GmmswfQP5R9ZxnbO8.jpg', 'POETRY ETHNIC BLOOMS', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO- 432', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 10:55:07', '2025-03-12 06:19:13'),
(322, '5', '[\"Indoor\"]', 'CAB000318', '318', 12, 26, 41, NULL, NULL, NULL, 'products/klQrOMdowMgh5ocGidEwfhebuhWzat3tdxIwYFDN.jpg', 'POETRY ETHNIC BLOOMS', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO- 433', NULL, '325', '20', NULL, '100', '5', '690', 'Meter', '2025-01-05 10:56:46', '2025-03-12 06:19:13'),
(323, '5', '[\"Indoor\"]', 'CAB000319', '319', 12, 35, 67, NULL, NULL, NULL, 'products/tZuwnBkPh6B0IPMtQVu5ljgOt6JEBkfd9TJaAK6J.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 347, SHADE NO.- 13', NULL, '381', '20', NULL, '100', '5', '802', 'Meter', '2025-01-06 04:10:40', '2025-03-12 06:19:13'),
(324, '5', '[\"Indoor\"]', 'CAB000320', '320', 12, 35, 49, NULL, NULL, NULL, 'products/Qcw7ToYX56NzAKUcDGPINbvQElWUsTEMRNkVwB8O.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 348, SHADE NO.- 17', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-06 04:12:04', '2025-03-12 06:19:13'),
(325, '5', '[\"Indoor\"]', 'CAB000321', '321', 12, 35, 50, NULL, NULL, NULL, 'products/rmEkI9LI2T6vEXNFWvf7KNgdO3zYNUibc2rVy8G1.jpg', 'LELIN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 349, SHADE NO.- 14', NULL, '342', '20', NULL, '100', '5', '724', 'Meter', '2025-01-06 04:13:44', '2025-03-12 06:19:13'),
(326, '5', '[\"Indoor\"]', 'CAB000322', '322', 12, 23, 62, NULL, NULL, NULL, 'products/SBKOWCv2KsssHR4cXsUn9ZbDtWAJ49gvjQTXqhQA.jpg', 'Earthen Lino', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 131', NULL, '378', '20', NULL, '100', '5', '796', 'Meter', '2025-01-06 04:17:27', '2025-03-12 06:19:13'),
(327, '5', '[\"Indoor\"]', 'CAB000323', '323', 12, 35, 49, NULL, NULL, NULL, 'products/7POhd3Yl764Eyda3fAUIdlx4eBQlYVf9LqlQ5SJF.jpg', 'LELIN', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 330, SHADE-11', NULL, '366', '20', NULL, '100', '5', '772', 'Meter', '2025-01-06 07:45:18', '2025-03-12 06:19:13'),
(328, '5', '[\"Indoor\"]', 'CAB000324', '324', 13, 20, NULL, NULL, NULL, NULL, 'products/GR6ATCLRgf6PcpkzTufxfYISPJcXujbuR1IDFWZf.jpg', 'SIENNA', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B06', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-06 07:47:41', '2025-03-12 06:19:13'),
(329, '5', '[\"Indoor\"]', 'CAB000325', '325', 13, 20, NULL, NULL, NULL, NULL, 'products/AEprPFezNf2SttDTmVunYJbGlcNkFiI9DyZo3GI4.jpg', 'SIENNA', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-07', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-06 07:49:05', '2025-03-12 06:19:13'),
(330, '5', '[\"Indoor\"]', 'CAB000326', '326', 13, 20, NULL, NULL, NULL, NULL, 'products/RzrDXLS7jwHhGXdQzmfxNkx1WheuGo4LAZK9uJFz.jpg', 'SIENNA', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- C-11', NULL, '457', '20', NULL, '100', '5', '954', 'Meter', '2025-01-06 10:53:28', '2025-03-12 06:19:13'),
(331, '5', '[\"Indoor\"]', 'CAB000327', '327', 13, 20, NULL, NULL, NULL, NULL, 'products/peJPLej0SXoF1BGeg91SqYoQJrcsD7XOkzqif6JL.jpg', 'SIENNA', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-10', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-06 10:55:25', '2025-03-12 06:19:13'),
(332, '5', '[\"Indoor\"]', 'CAB000328', '328', 13, 21, NULL, NULL, NULL, NULL, 'products/zZPCjqyruHhpfSQLW65zkRp3VAeGfRhKrrp3cOVS.jpg', 'NOIR', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 30', NULL, '499', '20', NULL, '100', '5', '1038', 'Meter', '2025-01-06 10:56:54', '2025-03-12 06:19:13'),
(333, '5', '[\"Indoor\"]', 'CAB000329', '329', 13, 21, NULL, NULL, NULL, NULL, 'products/9EbHvEGR86tLboyZpL39liIgAIqcZCwfM7GhwNsH.jpg', 'NOIR', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 31', NULL, '499', '20', NULL, '100', '5', '1038', 'Meter', '2025-01-06 10:58:08', '2025-03-12 06:19:13'),
(334, '5', '[\"Indoor\"]', 'CAB000330', '330', 14, 22, NULL, NULL, NULL, NULL, 'products/oC9BdCO6zMbsbsYY5ChGkqcHwpqwFIda5rUxfRha.jpg', 'VIRGINIA', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45903', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 10:59:58', '2025-03-12 06:19:13'),
(335, '5', '[\"Indoor\"]', 'CAB000331', '331', 14, 27, NULL, NULL, NULL, NULL, 'products/o6rVNUsR7Bbqk1PIOrv4oJ88Ns2jnaCS9oYcwGE2.jpg', 'EUROPEAN LINEN', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43405', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-06 11:03:45', '2025-03-12 06:19:13'),
(336, '5', '[\"Indoor\"]', 'CAB000332', '332', 14, 27, NULL, NULL, NULL, NULL, 'products/QRj2XF9wj2uWVquDGHVHGquynZh4hkKMqtVHVNyG.jpg', 'EUROPEAN LINEN', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43404', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-06 11:05:17', '2025-03-12 06:19:13'),
(337, '5', '[\"Indoor\"]', 'CAB000333', '333', 15, 28, NULL, NULL, NULL, NULL, 'products/KIXpcqkiFsVxXTJjbHaB7NaHX0LxpUzhdqaCofFG.jpg', 'LINEN', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5804', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-06 11:06:54', '2025-03-12 06:19:13'),
(338, '5', '[\"Indoor\"]', 'CAB000334', '334', 14, 29, NULL, NULL, NULL, NULL, 'products/p1Wb8MJSnB9WxMKmEORnAh7FGdsontO2cQys7Vu9.jpg', 'ILLUSION', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43703', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-06 11:08:43', '2025-03-12 06:19:13'),
(339, '5', '[\"Indoor\"]', 'CAB000335', '335', 13, 19, NULL, NULL, NULL, NULL, 'products/SHE6hCHolDyLclWkyInjay21DYNOW0G0TOqOEyCq.jpg', 'BREEZE', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-14', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-06 11:14:28', '2025-03-12 06:19:13'),
(340, '5', '[\"Indoor\"]', 'CAB000336', '336', 13, 19, NULL, NULL, NULL, NULL, 'products/GuYBceVZC1rJ5UiPaXs4g5XwrcOQsINikqGhRoX4.jpg', 'BREEZE', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-15', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-06 11:15:34', '2025-03-12 06:19:13'),
(341, '5', '[\"Indoor\"]', 'CAB000337', '337', 13, 20, NULL, NULL, NULL, NULL, 'products/EC5KlPi24MFc0Ay27SGTWs7T3C8Z2DpoyeZWnhBR.jpg', 'SIENNA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-02', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-06 11:17:18', '2025-03-12 06:19:13'),
(342, '5', '[\"Indoor\"]', 'CAB000338', '338', 14, 22, NULL, NULL, NULL, NULL, 'products/orHh7VRobQo6DnIOBYLuqUyNJa8ryYcILUcLfrRP.jpg', 'VIRGINIA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45909', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 11:18:34', '2025-03-12 06:19:13'),
(343, '5', '[\"Indoor\"]', 'CAB000339', '339', 14, 22, NULL, NULL, NULL, NULL, 'products/D9YrXNux6V53mcyYwrXgtScWVtL1qtkpcGxDU68i.jpg', 'VIRGINIA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45910', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 11:19:51', '2025-03-12 06:19:13'),
(344, '5', '[\"Indoor\"]', 'CAB000340', '340', 14, 22, NULL, NULL, NULL, NULL, 'products/WiR1GANmt86WmNL3pDmVYHY3ZrWrBN4uWIsRPTNX.jpg', 'VIRGINIA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45911', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 11:21:29', '2025-03-12 06:19:13'),
(345, '5', '[\"Indoor\"]', 'CAB000341', '341', 14, 22, NULL, NULL, NULL, NULL, 'products/I9rFwMJ2UAD6jW6fHGBYFLHWRWc9UMnOMjNmgGGb.jpg', 'VIRGINIA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45912', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 11:23:00', '2025-03-12 06:19:13'),
(346, '5', '[\"Indoor\"]', 'CAB000342', '342', 14, 40, NULL, NULL, NULL, NULL, 'products/D9eZ2vpZo6Bb6gEjQBFiybEJpkuK8WURGhnZbVir.jpg', 'BOHO', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 42201', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 11:25:23', '2025-03-12 06:19:13'),
(347, '5', '[\"Indoor\"]', 'CAB000343', '343', 14, 27, NULL, NULL, NULL, NULL, 'products/Dv0aQEVpWNzCv1aXvnuaDU0zzqiYFyVaqOId6qSI.jpg', 'EUROPEAN LINEN', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43423', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-06 11:49:55', '2025-03-12 06:19:13'),
(348, '5', '[\"Indoor\"]', 'CAB000344', '344', 14, 27, NULL, NULL, NULL, NULL, 'products/1WW3ROyoTRpkQYREYvXZtwVNyeg9tNUuDSmy7rgY.jpg', 'EUROPEAN LINEN', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43422', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-06 11:52:30', '2025-03-12 06:19:13'),
(349, '5', '[\"Indoor\"]', 'CAB000345', '345', 15, 28, NULL, NULL, NULL, NULL, 'products/6UUIgwW0V55mgZPzaK9xuUwkBSekH1KZ47rf66Gn.jpg', 'CAMBRIDGE', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5801', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-06 11:57:22', '2025-03-12 06:19:13'),
(350, '5', '[\"Indoor\"]', 'CAB000346', '346', 16, 41, NULL, NULL, NULL, NULL, 'products/SUcPsNpXGtHHbRFF1pHdV3hILyT5XSXqujpK63qd.jpg', 'SOPHIA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 6', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-06 11:59:19', '2025-03-12 06:19:13'),
(351, '5', '[\"Indoor\"]', 'CAB000347', '347', 16, 41, NULL, NULL, NULL, NULL, 'products/clC7BQ3rCHa9hmbQcEKX9CeNBoFo0u3qNE4gFuLE.jpg', 'SOPHIA', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.-8', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-06 12:00:31', '2025-03-12 06:19:13'),
(352, '5', '[\"Indoor\"]', 'CAB000348', '348', 14, 29, NULL, NULL, NULL, NULL, 'products/DHodygHiGaNmMLF2Fhvb9q3J63eEqTp2JMaSsIk7.jpg', 'ILLUSION', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43725', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-06 12:02:24', '2025-03-12 06:19:13'),
(353, '5', '[\"Indoor\"]', 'CAB000349', '349', 14, 30, NULL, NULL, NULL, NULL, 'products/b5c2k6wBA2oOqFNUoPqi5OyO8XsHJcbYRkN5LRTE.jpg', 'GRAND', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44506', NULL, '394', '20', NULL, '100', '5', '828', 'Meter', '2025-01-06 12:05:04', '2025-03-12 06:19:13'),
(354, '5', '[\"Indoor\"]', 'CAB000350', '350', 14, 42, NULL, NULL, NULL, NULL, 'products/BsbyzciVvuOvN1PQKOV99Nm4xBCXzb22LSP8pG7P.jpg', 'NATURAL', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44601', NULL, '449', '20', NULL, '100', '5', '938', 'Meter', '2025-01-06 12:06:45', '2025-03-12 06:19:13'),
(355, '5', '[\"Indoor\"]', 'CAB000351', '351', 13, 19, NULL, NULL, NULL, NULL, 'products/jjTLB0vssNAilqBPjAcmxAORaipN43Fh12M32o7Z.jpg', 'BREEZE', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-09', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-06 12:15:33', '2025-03-12 06:19:13'),
(356, '5', '[\"Indoor\"]', 'CAB000352', '352', 13, 19, NULL, NULL, NULL, NULL, 'products/BPGqxbVgIriNrHl1g4S4JMWCiHhATRE2W5l6uvlz.jpg', 'BREEZE', 'BEI', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-10', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-06 12:17:39', '2025-03-12 06:19:13'),
(357, '5', '[\"Indoor\"]', 'CAB000353', '353', 13, 20, NULL, NULL, NULL, NULL, 'products/vpjgwlk51nJN0vJL4qzGuuY9eMCp6wB5V607YROS.jpg', 'SIENNA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-22', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-06 12:19:10', '2025-03-12 06:19:13'),
(358, '5', '[\"Indoor\"]', 'CAB000354', '354', 14, 22, NULL, NULL, NULL, NULL, 'products/WSqWPqM62aTYX9KUDuMRLsJ1FjwFeWYVwjCe7ktX.jpg', 'VIRGINIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-45905', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 12:20:21', '2025-03-12 06:19:13'),
(359, '5', '[\"Indoor\"]', 'CAB000355', '355', 14, 22, NULL, NULL, NULL, NULL, 'products/atxgItSKy6HGY3XZwBjxzg2DmLnnnFNMme7kF95C.jpg', 'VIRGINIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45906', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 12:21:32', '2025-03-12 06:19:13'),
(360, '5', '[\"Indoor\"]', 'CAB000356', '356', 14, 22, NULL, NULL, NULL, NULL, 'products/xycbnLwGoxYIqFsRAY2NAMKjDFCnhymreJ5gEQBR.jpg', 'VIRGINIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45913', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 12:23:02', '2025-03-12 06:19:13'),
(361, '5', '[\"Indoor\"]', 'CAB000357', '357', 14, 22, NULL, NULL, NULL, NULL, 'products/DaZqxLjt87ZTy262aoeOqxjUSkyAv8LzSALGLlpF.jpg', 'VIRGINIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45914', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-06 12:24:22', '2025-03-12 06:19:13'),
(362, '5', '[\"Indoor\"]', 'CAB000358', '358', 14, 40, NULL, NULL, NULL, NULL, 'products/DVykI6rSpsn9nLEFRoDDKKmL7dsjLP5hxJJCgdQM.jpg', 'BOHO', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 42202', NULL, '402', '20', NULL, '100', '5', '844', 'Meter', '2025-01-06 12:25:36', '2025-03-12 06:19:13'),
(363, '5', '[\"Indoor\"]', 'CAB000359', '359', 14, 27, NULL, NULL, NULL, NULL, 'products/pZTnnKJlExN8ERY6t2Ojgp5KLv5aRCPutaQq56EI.jpg', 'EUROPEAN LINEN', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43408', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-06 19:42:59', '2025-03-12 06:19:13'),
(364, '5', '[\"Indoor\"]', 'CAB000360', '360', 14, 27, NULL, NULL, NULL, NULL, 'products/XX0WSbS5k6CxesmtXAudXTvlLQIa6AMfohPzcI9n.jpg', 'EUROPEAN LINEN', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43409', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-06 19:44:22', '2025-03-12 06:19:13'),
(365, '5', '[\"Indoor\"]', 'CAB000361', '361', 15, 28, NULL, NULL, NULL, NULL, 'products/TyXQU0uOeLF1ixBNw1Aez1x7cUf8SSvmPXknyg0I.jpg', 'CAMBRIDGE', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 586', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-06 19:45:36', '2025-03-12 06:19:13'),
(366, '5', '[\"Indoor\"]', 'CAB000362', '362', 16, 41, NULL, NULL, NULL, NULL, 'products/9uvI88iYxbseGPvMIkcXiZjGpRePkRM2pWmBbJry.jpg', 'SOPHIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 2', NULL, '319', '20', NULL, '100', '5', '678', 'Meter', '2025-01-06 19:47:12', '2025-03-12 06:19:13'),
(367, '5', '[\"Indoor\"]', 'CAB000363', '363', 16, 41, NULL, NULL, NULL, NULL, 'products/gbDyY0mSugd9LjhwsSvPLcsKmh2jtxrhFWcr7QYr.jpg', 'SOPHIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 4', NULL, '319', '20', NULL, '100', '5', '678', 'Meter', '2025-01-06 19:48:41', '2025-03-12 06:19:13'),
(368, '5', '[\"Indoor\"]', 'CAB000364', '364', 16, 41, NULL, NULL, NULL, NULL, 'products/ikhUKypX8ybyZbWWS2TngcYzsIVTwOF72YmV0Lh9.jpg', 'SOPHIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 13', NULL, '319', '20', NULL, '100', '5', '678', 'Meter', '2025-01-06 19:50:25', '2025-03-12 06:19:13'),
(369, '5', '[\"Indoor\"]', 'CAB000365', '365', 16, 41, NULL, NULL, NULL, NULL, 'products/zJ9hQN6XOjVzL0o9Ontc5F6phshyyQMFzkNoBH9e.jpg', 'SOPHIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 16', NULL, '319', '20', NULL, '100', '5', '678', 'Meter', '2025-01-06 19:51:39', '2025-03-12 06:19:13'),
(370, '5', '[\"Indoor\"]', 'CAB000366', '366', 14, 45, NULL, NULL, NULL, NULL, 'products/7EOHxjfVZzRqdUHnjor6nD0bnpcdq9aPDmaFOGkt.jpg', 'CAMRY', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45520', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-06 19:55:24', '2025-03-12 06:19:13'),
(371, '5', '[\"Indoor\"]', 'CAB000367', '367', 14, 27, NULL, NULL, NULL, NULL, 'products/kEWMYZ4rM3vBOyBvXwQ4AJx91bPwusAmTkcAQOSy.jpg', 'EUROPEAN LINEN', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43406', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-06 19:56:38', '2025-03-12 06:19:13'),
(372, '5', '[\"Indoor\"]', 'CAB000368', '368', 14, 30, NULL, NULL, NULL, NULL, 'products/l24TEA2iqoZy7Zhcln1IqMUgoT8IxKJQlDehGJTC.jpg', 'GRAND', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44511', NULL, '394', '20', NULL, '100', '5', '828', 'Meter', '2025-01-06 19:58:11', '2025-03-12 06:19:13'),
(373, '5', '[\"Indoor\"]', 'CAB000369', '369', 14, 27, NULL, NULL, NULL, NULL, 'products/7gYWTNAvGzmzZt7KSs423NSnyA8O3FQb2W2v5HRK.jpg', 'EUROPEAN LINEN', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43407', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-06 19:59:28', '2025-03-12 06:19:13'),
(374, '5', '[\"Indoor\"]', 'CAB000370', '370', 14, 30, NULL, NULL, NULL, NULL, 'products/BTwrSkdVUfE0nhQQo5g918N6UUOMAkWSsDOpc6T7.jpg', 'GRAND', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44518', NULL, '394', '20', NULL, '100', '5', '828', 'Meter', '2025-01-06 20:00:37', '2025-03-12 06:19:13'),
(375, '5', '[\"Indoor\"]', 'CAB000371', '371', 14, 42, NULL, NULL, NULL, NULL, 'products/7A43Ua47efMrqhcpyucaAaiNts7zGKcErNJWP3TY.jpg', 'NATURAL', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44619', NULL, '449', '20', NULL, '100', '5', '938', 'Meter', '2025-01-06 20:02:17', '2025-03-12 06:19:13'),
(376, '5', '[\"Indoor\"]', 'CAB000372', '372', 14, 42, NULL, NULL, NULL, NULL, 'products/uApqyHLYOfSZBZJ7bKaeKtoNyjJTcNogk1STxIXI.jpg', 'NATURAL', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44622', NULL, '449', '20', NULL, '100', '5', '938', 'Meter', '2025-01-06 20:03:32', '2025-03-12 06:19:13'),
(377, '5', '[\"Indoor\"]', 'CAB000373', '373', 14, 43, NULL, NULL, NULL, NULL, 'products/uiedBC9xFNhE9AQJgpKgrFOIJ4qtKaD92uZlMIcF.jpg', 'OLIVIA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 46904', NULL, '592', '20', NULL, '100', '5', '1224', 'Meter', '2025-01-06 20:05:54', '2025-03-12 06:19:13'),
(378, '5', '[\"Indoor\"]', 'CAB000374', '374', 14, 46, NULL, NULL, NULL, NULL, 'products/2DoweRbVFWcXaYjCowElNjaqKwC7gmvGebWRxt9G.jpg', 'MARBELLA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45420', NULL, '260', '20', NULL, '100', '5', '560', 'Meter', '2025-01-06 20:07:06', '2025-03-12 06:19:13'),
(379, '5', '[\"Indoor\"]', 'CAB000375', '45423', 14, 46, NULL, NULL, NULL, NULL, 'products/CEzyusqRQaEjYHWUshvODBnin95YfqHdRKMlRk5j.jpg', 'MARBELLA', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45423', NULL, '260', '20', NULL, '100', '5', '560', 'Meter', '2025-01-06 20:08:51', '2025-03-12 06:19:13'),
(380, '5', '[\"Indoor\"]', 'CAB000376', '376', 14, 22, NULL, NULL, NULL, NULL, 'products/ZuJ9j4KcvD7NHDGnEI0v73m2uooqBwZu0kfxcKSm.jpg', 'VIRGINIA', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45923', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-07 04:49:09', '2025-03-12 06:19:13'),
(381, '5', '[\"Indoor\"]', 'CAB000377', '377', 14, 29, NULL, NULL, NULL, NULL, 'products/g4Q5b8rzkv41WRJZEsRybBaP29J88OrT5Wham8Ij.jpg', 'ILLUSION', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43732', NULL, '288', '20', NULL, '0', '120', '308', 'Meter', '2025-01-07 07:21:44', '2025-03-12 06:19:13'),
(382, '2', '[\"Indoor\"]', 'CAB000378', '378', 17, NULL, NULL, NULL, NULL, NULL, 'products/eTDShFu6rU0LlGfdg3t5mpb60E7XFZRC7LZilbg0.jpg', 'YORK', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Blinds\"]', 'SHADE NO.- FC-745, YORK', NULL, '250', '50', NULL, '100', '18', '600', 'Square Feet', '2025-01-07 11:29:53', '2025-03-12 06:19:13'),
(383, '2', '[\"Indoor\"]', 'CAB000379', '379', 17, 49, NULL, NULL, NULL, NULL, 'products/Uxy5XY8tLFRdmtljNvwoX4LqNi53Gk3mi1VXgmuP.jpg', 'YORK', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Blinds\"]', 'SHADE NO.- FC-744, YORK', NULL, '250', '50', NULL, '100', '18', '600', 'Square Feet', '2025-01-07 11:32:31', '2025-03-12 06:19:13'),
(384, '2', '[\"Indoor\"]', 'CAB000380', '380', 17, 49, NULL, NULL, NULL, NULL, 'products/JbLaINWmsqww9l9hpOWKmjbgorDLZ1UPBVHL3rKK.jpg', 'KHADI', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Blinds\"]', 'SHADE-582, KHADI', NULL, '250', '50', NULL, '100', '18', '600', 'Square Feet', '2025-01-07 11:34:40', '2025-03-12 06:19:13'),
(385, '2', '[\"Indoor\"]', 'CAB000381', '381', 17, 50, NULL, NULL, NULL, NULL, 'products/zvLlgrQctPDlemvsqJ7NHlVNHuYfUjbqSZhvAiGX.jpg', 'KHADI', 'RED', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Blinds\"]', 'SHADE NO.- 584, KHADI', NULL, '250', '50', NULL, '100', '5', '600', 'Square Feet', '2025-01-07 11:37:10', '2025-03-12 06:19:13'),
(386, '2', '[\"Indoor\"]', 'CAB000382', '382', 17, 53, NULL, NULL, NULL, NULL, 'products/quhN5khstlSkLtM308sTe90fPgelzeb0AWZZ9EX3.jpg', 'LINEN', 'BEIGE/BROWN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Blinds\"]', 'SHADE- 20329-2, LINEN', NULL, '250', '50', NULL, '100', '5', '600', 'Square Feet', '2025-01-07 11:39:59', '2025-03-12 06:19:13'),
(387, '5', '[\"Indoor\"]', 'CAB000383', '383', 13, 20, NULL, NULL, NULL, NULL, 'products/RpuzM6J5h3DZhuW4HhyOY8N6z82A1UCmNfUxQRnY.jpg', 'SIENNA', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE B-69', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-07 11:46:58', '2025-03-12 06:19:13'),
(388, '5', '[\"Indoor\"]', 'CAB000384', '384', 13, 20, NULL, NULL, NULL, NULL, 'products/zILr0eZtzdwkZVhTe7QfgUeqmABolgFAAvrAThXY.jpg', 'SIENNA', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-A-70', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-07 11:48:33', '2025-03-12 06:19:13'),
(389, '5', '[\"Indoor\"]', 'CAB000385', '385', 14, 27, NULL, NULL, NULL, NULL, 'products/pmUVFJOAuuiumKdVs2VjaD68uTQDhR8sNTjXGIdt.jpg', 'EUROPEAN LINEN', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-43413', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-07 11:49:45', '2025-03-12 06:19:13'),
(390, '5', '[\"Indoor\"]', 'CAB000386', '386', 15, 28, NULL, NULL, NULL, NULL, 'products/CTDS68Q5mAyleHR6pWjzdKtJXi957DwGWeIL396A.jpg', 'CAMBRIDGE', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-5818', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-07 11:51:27', '2025-03-12 06:19:13'),
(391, '5', '[\"Indoor\"]', 'CAB000387', '387', 15, 28, NULL, NULL, NULL, NULL, 'products/remsIhErVWvUQGD1qJtNgO8HAEN83J1fE9monpQV.jpg', 'CAMBRIDGE', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-5819', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-07 11:53:00', '2025-03-12 06:19:13'),
(392, '5', '[\"Indoor\"]', 'CAB000388', '388', 15, 28, NULL, NULL, NULL, NULL, 'products/qpbW0CVtCupHhkY1eTetqQF5ATdneE4BCHNuV3Nq.jpg', 'CAMBRIDGE', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-5820', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-07 11:54:23', '2025-03-12 06:19:13'),
(393, '5', '[\"Indoor\"]', 'CAB000389', '389', 16, 41, NULL, NULL, NULL, NULL, 'products/Xv7z74uy964FPUQTggJ4VfZoGJSi7rMSMnin6D51.jpg', 'SOPHIA', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-SR. NO.- 29', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-07 11:55:57', '2025-03-12 06:19:13'),
(394, '5', '[\"Indoor\"]', 'CAB000390', '390', 16, 41, NULL, NULL, NULL, NULL, 'products/Scin1QAGrGmu4ps6OMVjT9f55yPLrcxe2w7iz1Uf.jpg', 'SOPHIA', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-SR. NO.- 32', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-07 11:57:14', '2025-03-12 06:19:13'),
(395, '5', '[\"Indoor\"]', 'CAB000391', '391', 14, 29, NULL, NULL, NULL, NULL, 'products/LDs9T6kzDnlNxoMLM9ZjYBfg6UcrYNwcS9vjDuga.jpg', 'ILLUSION', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-43710', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-07 11:58:43', '2025-03-12 06:19:13'),
(396, '5', '[\"Indoor\"]', 'CAB000392', '392', 14, 29, NULL, NULL, NULL, NULL, 'products/rdK7erKZENBVCUuIwsXnRHEWcgNcyfmtRZ8LUAQh.jpg', 'ILLUSION', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-43711', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-07 12:00:39', '2025-03-12 06:19:13'),
(397, '5', '[\"Indoor\"]', 'CAB000393', '393', 14, 45, NULL, NULL, NULL, NULL, 'products/LPMr3qwiaUebfUR5cREcw650DPZjF5MQs7UuWFMY.jpg', 'CAMRY', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45514', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-07 12:02:11', '2025-03-12 06:19:13'),
(398, '5', '[\"Indoor\"]', 'CAB000394', '394', 14, 45, NULL, NULL, NULL, NULL, 'products/G2bRixbMLqf9FWlC1Adgee4oB4DydFnT4fMnXof0.jpg', 'CAMRY', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-45513', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-07 12:03:46', '2025-03-12 06:19:13'),
(399, '5', '[\"Indoor\"]', 'CAB000395', '395', 14, 27, NULL, NULL, NULL, NULL, 'products/AufrDQm7Fu3wOHKIm4L4CdQorpQiCr8Qg9DB6gsN.jpg', 'EUROPEAN LINEN', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.-43402', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-07 12:06:00', '2025-03-12 06:19:13'),
(400, '5', '[\"Indoor\"]', 'CAB000396', '396', 14, 22, NULL, NULL, NULL, NULL, 'products/Db4JxA2kx90P05f4BvsCS67yaCMTVvDMdlak4SlR.jpg', 'VIRGINIA', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45904', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 04:36:32', '2025-03-12 06:19:13'),
(401, '5', '[\"Indoor\"]', 'CAB000397', '397', 14, 30, NULL, NULL, NULL, NULL, 'products/VJTfi06h65tG0xgTAAOdy3x5KySzhpjxuzBW0L0P.jpg', 'GRAND', 'PURPLE PINK', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44501', NULL, '397', '20', NULL, '100', '5', '834', 'Meter', '2025-01-08 05:08:23', '2025-03-12 06:19:13'),
(402, '5', '[\"Indoor\"]', 'CAB000398', '398', 14, 29, NULL, NULL, NULL, NULL, 'products/JXdjqs60Vu5X9tylcyVikLVNVSwRsIo32frpJt70.jpg', 'ILLUSION', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page no.- 43704', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-08 05:11:36', '2025-03-12 06:19:13'),
(403, '5', '[\"Indoor\"]', 'CAB000399', '399', 14, 27, NULL, NULL, NULL, NULL, 'products/1ffx0jdAyXt4YBe1cEwp8ajfH7Qu50yOTaZK0dey.jpg', 'EUROPEAN LINEN', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43401', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-08 05:14:05', '2025-03-12 06:19:13'),
(404, '5', '[\"Indoor\"]', 'CAB000400', '400', 14, 30, NULL, NULL, NULL, NULL, 'products/Yo4ucvKfIZsDc9v4wWddSH7kcbBKHuEL5w76kIZS.jpg', 'GRAND', 'LINEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44513', NULL, '394', '20', NULL, '100', '5', '828', 'Meter', '2025-01-08 05:15:47', '2025-03-12 06:19:13'),
(405, '5', '[\"Indoor\"]', 'CAB000401', '401', 14, 42, NULL, NULL, NULL, NULL, 'products/4dYxz3D6sGoswOICuZhfAeDjxTlTht8DnjkVDpEL.jpg', 'NATURAL', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44602', NULL, '449', '20', NULL, '100', '5', '938', 'Meter', '2025-01-08 05:18:35', '2025-03-12 06:19:13'),
(406, '5', '[\"Indoor\"]', 'CAB000402', '402', 14, 43, NULL, NULL, NULL, NULL, 'products/xUoNpjewMjCIr1TriZtmxiR6aF63YIqlGCmI3Cd1.jpg', 'NATURAL', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 46901', NULL, '592', '20', NULL, '100', '5', '1224', 'Meter', '2025-01-08 05:22:04', '2025-03-12 06:19:13'),
(407, '5', '[\"Indoor\"]', 'CAB000403', '403', 14, 42, NULL, NULL, NULL, NULL, 'products/yPP5lRBeKHwWuLXAWGZF7D1i5mwCgK26SpLPPEBp.jpg', 'NATURAL', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44604', NULL, '493', '20', NULL, '100', '5', '1026', 'Meter', '2025-01-08 05:23:27', '2025-03-12 06:19:13'),
(408, '5', '[\"Indoor\"]', 'CAB000404', '404', 13, 20, NULL, NULL, NULL, NULL, 'products/8WqXFBCVp5WlLIrMGaAtkH8JXKlmjkwdnmGOtCP6.jpg', 'SIENNA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-47', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-08 05:32:17', '2025-03-12 06:19:13'),
(409, '5', '[\"Indoor\"]', 'CAB000405', '405', 13, 20, NULL, NULL, NULL, NULL, 'products/usy8sOoe757JuwaD8xy519WoRvlH195A5k5szs7h.jpg', 'SIENNA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- C-48', NULL, '457', '20', NULL, '100', '5', '954', 'Meter', '2025-01-08 05:33:29', '2025-03-12 06:19:13'),
(410, '5', '[\"Indoor\"]', 'CAB000406', '406', 13, 20, NULL, NULL, NULL, NULL, 'products/y1RvrHpoeFQnmfmtDFtMeyYWKVgKBD9N4VwefA04.jpg', 'SIENNA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-52', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-08 05:39:12', '2025-03-12 06:19:13'),
(411, '5', '[\"Indoor\"]', 'CAB000407', '407', 13, 20, NULL, NULL, NULL, NULL, 'products/j12P9x6kGcgSTzJ8i3qiyxmJfwJTNdu5fleczdrU.jpg', 'SIENNA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-51', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-08 05:42:57', '2025-03-12 06:19:13'),
(412, '5', '[\"Indoor\"]', 'CAB000408', '408', 13, 20, NULL, NULL, NULL, NULL, 'products/AlQ9CL8QKyx6sZGvt8t8ltkg3k8PSDaFE57O5j7U.jpg', 'SIENNA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-55', NULL, '425', '20', NULL, '100', '5', '890', 'Meter', '2025-01-08 05:46:59', '2025-03-12 06:19:13'),
(413, '5', '[\"Indoor\"]', 'CAB000409', '409', 14, 22, NULL, NULL, NULL, NULL, 'products/W7k6j9l690pLCPRy6NhGndfuwpk7RJN8Vv43Qwpm.jpg', 'VIRGINIA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45916', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 05:48:38', '2025-03-12 06:19:13'),
(414, '5', '[\"Indoor\"]', 'CAB000410', '410', 14, 27, NULL, NULL, NULL, NULL, 'products/J7kQxKeV3rDk2q3oWBaFdNAFmrDnisalaUcYhPOF.jpg', 'EUROPEAN LINEN', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43415', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-08 06:06:29', '2025-03-12 06:19:13'),
(415, '5', '[\"Indoor\"]', 'CAB000411', '411', 15, 28, NULL, NULL, NULL, NULL, 'products/IfeGPXFAAje0pt0JmVcPoATlxFXqtw9XYUokt7yx.jpg', 'CAMBRIDGE', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5822', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 06:08:09', '2025-03-12 06:19:13'),
(416, '5', '[\"Indoor\"]', 'CAB000412', '412', 16, 41, NULL, NULL, NULL, NULL, 'products/UnTGmVs9kgPuzK3vhtxQIMGTlIK1hXYsmA3q3u70.jpg', 'SOPHIA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- S. NO.- 47', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-08 06:10:44', '2025-03-12 06:19:13'),
(417, '5', '[\"Indoor\"]', 'CAB000413', '413', 16, 41, NULL, NULL, NULL, NULL, 'products/JxcodDLPbCP534LvNHRHLREDoPhlqJMgqbeagix9.jpg', 'SOPHIA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 48', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-08 06:14:16', '2025-03-12 06:19:13'),
(418, '5', '[\"Indoor\"]', 'CAB000414', '414', 14, 45, NULL, NULL, NULL, NULL, 'products/pI5D8TV6IiJIktJzFvqDoVZaVUoYuviUoRtJhdxs.jpg', 'CAMRY', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45522', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 06:33:42', '2025-03-12 06:19:13'),
(419, '5', '[\"Indoor\"]', 'CAB000415', '415', 14, 45, NULL, NULL, NULL, NULL, 'products/uhVnW6LITBL6IaL7FTFR3JDeIf290lNzrkYjf63D.jpg', 'CAMRY', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45524', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 06:35:54', '2025-03-12 06:19:13'),
(420, '5', '[\"Indoor\"]', 'CAB000416', '416', 14, 30, NULL, NULL, NULL, NULL, 'products/3sC6EDsPuBwytQNypO5i8O18evafH2rUOA89SwlL.jpg', 'GRAND', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44521', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 06:58:40', '2025-03-12 06:19:13'),
(421, '5', '[\"Indoor\"]', 'CAB000417', '417', 14, 22, NULL, NULL, NULL, NULL, 'products/zNRhp1OQV6ekn21BEEV2jTyorWXeo6oZwdEgOO13.jpg', 'VIRGINIA', 'GREEN', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45915', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:10:27', '2025-03-12 06:19:13'),
(422, '5', '[\"Indoor\"]', 'CAB000418', '418', 13, 20, NULL, NULL, NULL, NULL, 'products/KTDShvWYJy5DOYmkL3m1VYNs6CeRrxc1Klr5PNN7.jpg', 'SIENNA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-58', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-08 07:20:55', '2025-03-12 06:19:13'),
(423, '5', '[\"Indoor\"]', 'CAB000419', '419', 13, 20, NULL, NULL, NULL, NULL, 'products/brgcU4xSlpA5ADmoETRKWhXkwmy7joxY8xAvRv22.jpg', 'SIENNA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-56', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-08 07:23:13', '2025-03-12 06:19:13'),
(424, '5', '[\"Indoor\"]', 'CAB000420', '420', 13, 20, NULL, NULL, NULL, NULL, 'products/hIBcx9OKHOmx2r1BId8BSS9c9AEzxDU6aJJ3CrpN.jpg', 'SIENNA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-57', NULL, '383', '20', NULL, '100', '5', '806', 'Meter', '2025-01-08 07:24:22', '2025-03-12 06:19:13'),
(425, '5', '[\"Indoor\"]', 'CAB000421', '421', 13, 20, NULL, NULL, NULL, NULL, 'products/vq8tCxwHfyy38SUISALXpf1c09jrC3fQKXrPJwrv.jpg', 'SIENNA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- C-62', NULL, '457', '20', NULL, '100', '5', '954', 'Meter', '2025-01-08 07:26:15', '2025-03-12 06:19:13'),
(426, '5', '[\"Indoor\"]', 'CAB000422', '422', 13, 20, NULL, NULL, NULL, NULL, 'products/FEVVNn40En3rhiHyaJGdVw1VqI8Nrb5zqBodVip0.jpg', 'SIENNA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-61', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-08 07:27:35', '2025-03-12 06:19:13'),
(427, '5', '[\"Indoor\"]', 'CAB000423', '423', 13, 21, NULL, NULL, NULL, NULL, 'products/pQeRGnagDW6idzmL7vRANLDY7w5tAEQIAwY7xiPS.jpg', 'NOIR', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 14', NULL, '499', '20', NULL, '100', '5', '1038', 'Meter', '2025-01-08 07:28:47', '2025-03-12 06:19:13'),
(428, '5', '[\"Indoor\"]', 'CAB000424', '424', 13, 21, NULL, NULL, NULL, NULL, 'products/uIYOB6yEDvDpqUYgFiUVo0ibPwfddqHzYhSrniEX.jpg', 'NOIR', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 15', NULL, '499', '20', NULL, '100', '5', '1038', 'Meter', '2025-01-08 07:30:10', '2025-03-12 06:19:13'),
(429, '5', '[\"Indoor\"]', 'CAB000425', '425', 14, 22, NULL, NULL, NULL, NULL, 'products/V6o2aWhWHiHoIEwwFKOwDiD3fSHiTEBmIcW1nwIQ.jpg', 'BLUE', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45901', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:31:39', '2025-03-12 06:19:13'),
(430, '5', '[\"Indoor\"]', 'CAB000426', '426', 14, 22, NULL, NULL, NULL, NULL, 'products/cx4Bz3q51nxS8oFyDPPiwxd28LWh5c2zzQYK1f3v.jpg', 'VIRGINIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45902', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:33:04', '2025-03-12 06:19:13'),
(431, '5', '[\"Indoor\"]', 'CAB000427', '427', 14, 22, NULL, NULL, NULL, NULL, 'products/mBugKjncO3olXBgNqRNVgaiWAGBk3G511xMMMeBP.jpg', 'VIRGINIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'Page no.- 45917', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:34:24', '2025-03-12 06:19:13'),
(432, '5', '[\"Indoor\"]', 'CAB000428', '428', 14, 22, NULL, NULL, NULL, NULL, 'products/ixOZDmZX5vPywU6rsqxfUzbVSdZMnsoLmYmtoMve.jpg', 'VIRGINIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45918', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:35:39', '2025-03-12 06:19:13'),
(433, '5', '[\"Indoor\"]', 'CAB000429', '429', 14, 22, NULL, NULL, NULL, NULL, 'products/tjDjAZfBzcCCx6imURv4j0Ezo70NR0qCJbPAvUR6.jpg', 'VIRGINIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45919', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:36:53', '2025-03-12 06:19:13'),
(434, '5', '[\"Indoor\"]', 'CAB000430', '430', 14, 22, NULL, NULL, NULL, NULL, 'products/jO3rjNDFs0HCBYdMwJSX15mIqjWj350DNVK5hS4N.jpg', 'VIRGINIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45920', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 07:38:12', '2025-03-12 06:19:13'),
(435, '5', '[\"Indoor\"]', 'CAB000431', '431', 14, 40, NULL, NULL, NULL, NULL, 'products/QEsQRlVVmQHKFWOZPntUt6OuSFCzdJi33942U1W5.jpg', 'BOHO', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 42221', NULL, '402', '20', NULL, '100', '5', '844', 'Meter', '2025-01-08 07:39:18', '2025-03-12 06:19:13'),
(436, '5', '[\"Indoor\"]', 'CAB000432', '432', 14, 27, NULL, NULL, NULL, NULL, 'products/Ut5I695odgCmwscITZpeKuQptM9yps5oY2iJBaH5.jpg', 'EUROPEAN LINEN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43403', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-08 07:41:38', '2025-03-12 06:19:13'),
(437, '5', '[\"Indoor\"]', 'CAB000433', '433', 14, 27, NULL, NULL, NULL, NULL, 'products/BKoNWUvPROdupnEEdHBV0RNhSvqp0bfKtTnNKCqH.jpg', 'EUROPEAN LINEN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43416', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-08 07:42:52', '2025-03-12 06:19:13'),
(438, '5', '[\"Indoor\"]', 'CAB000434', '434', 15, 28, NULL, NULL, NULL, NULL, 'products/n6Wm1p8u24YODp0wMTUqpHZOAQ4V4bGcmpRf60Ec.jpg', 'CAMBRIDGE', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5823', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 07:44:38', '2025-03-12 06:19:13');
INSERT INTO `products` (`id`, `product_name`, `type`, `tally_code`, `file_number`, `supplier_name`, `supplier_collection`, `supplier_collection_design`, `design_sku`, `rubs_martendale`, `width`, `image`, `image_alt`, `colour`, `composition`, `design_type`, `usage`, `note`, `currency`, `supplier_price`, `freight`, `duty_percentage`, `profit_percentage`, `gst_percentage`, `mrp`, `unit`, `created_at`, `updated_at`) VALUES
(439, '5', '[\"Indoor\"]', 'CAB000435', '435', 15, 28, NULL, NULL, NULL, NULL, 'products/Rc6T1FG8Gii8NFGtKFf2Aru2Mb4amX5uqZPgnSOw.jpg', 'CAMBRIDGE', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5825', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 07:45:51', '2025-03-12 06:19:13'),
(440, '24', '[\"Indoor\"]', 'CAB000436', 'TEST1', 14, 60, NULL, NULL, NULL, NULL, 'products/pMlmFpt5FUaQMWCIaBNT8dmvTzk7iBlTYGmyNzkB.jpg', 'SHEETS', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Cushion\"]', 'TEST DATA', NULL, '900', '20', NULL, '100', '5', '1840', 'Meter', '2025-01-08 10:34:45', '2025-03-12 06:19:13'),
(441, '24', '[\"Indoor\"]', 'CAB000437', 'TEST2', 14, 60, NULL, NULL, NULL, NULL, 'products/xZBn2caU99nYzPtiAhKeyZSgKQrxuoq7nZuYYA3r.jpg', 'TEST', 'WHITE/OFFWHITE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'TEST2', NULL, '900', '20', NULL, '100', '5', '1840', 'Meter', '2025-01-08 10:36:15', '2025-03-12 06:19:13'),
(442, '5', '[\"Indoor\"]', 'CAB000438', '438', 15, 28, NULL, NULL, NULL, NULL, 'products/RCqLfhUbu0lzydlA7aXIl8rEdE3smX4wJDTkmFs7.jpg', 'CAMBRIDGE', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5814', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 11:07:00', '2025-03-12 06:19:13'),
(443, '5', '[\"Indoor\"]', 'CAB000439', '439', 15, 28, NULL, 'SKU000439', NULL, NULL, 'products/wWS2DasIGp9kEZr7Utu1mO7kRx3nH18lnrbMR0c6.jpg', 'CAMBRIDGE', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5816', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 11:11:44', '2025-04-07 16:17:59'),
(444, '5', '[\"Indoor\"]', 'CAB000440', '440', 16, 41, NULL, 'SKU000440', NULL, NULL, 'products/dpTtFKNPCWPJtDQ7ha8Pa5iWkjJJjcNE7CW0OgGZ.jpg', 'SOPHIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 62', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-08 11:13:39', '2025-04-07 16:17:50'),
(445, '5', '[\"Indoor\"]', 'CAB000441', '441', 16, 41, NULL, 'SKU000441', NULL, NULL, 'products/1sDudUpipu6RIKN1FWhttzMu1PGpKqYLkeHTb5iH.jpg', 'SOPHIA', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- SR. NO.- 64', NULL, '419', '20', NULL, '100', '5', '878', 'Meter', '2025-01-08 11:16:17', '2025-04-07 16:17:45'),
(446, '5', '[\"Indoor\"]', 'CAB000442', '442', 14, 29, NULL, 'SKU000442', NULL, NULL, 'products/FA94CikObFZdOuWX0bjMldpCRcaLCU14WWxmsVDN.jpg', 'ILLUSION', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43753', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-08 11:18:44', '2025-04-07 16:17:41'),
(447, '5', '[\"Indoor\"]', 'CAB000443', '443', 14, 45, NULL, 'SKU000443', NULL, NULL, 'products/ZWv8YpzDugMG1YoADIOSa5pU5HqrRZwW3R0RuB1p.jpg', 'CAMRY', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45534', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 11:20:10', '2025-04-07 16:17:36'),
(448, '5', '[\"Indoor\"]', 'CAB000444', '444', 14, 45, NULL, 'SKU000444', NULL, NULL, 'products/TW3PKj3ijicNFlFxEWu4xl83neFSfPouqYSMeX27.jpg', 'CAMRY', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45535', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 11:22:00', '2025-04-07 16:17:23'),
(449, '5', '[\"Indoor\"]', 'CAB000445', '445', 14, 27, NULL, 'SKU000445', NULL, NULL, 'products/PewzL8HoxtgX0qgOHZ2oWGobBUATQXyzX6oy7o3b.jpg', 'EUROPEAN LINEN', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43421', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-08 11:24:15', '2025-04-07 16:17:16'),
(450, '5', '[\"Indoor\"]', 'CAB000446', '446', 14, 30, NULL, 'SKU000446', NULL, NULL, 'products/VbuDCCQSiUyZwgniLfRAoI35ZKngbu4aruHtk1zE.jpg', 'GRAND', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44525', NULL, '394', '20', NULL, '100', '5', '828', 'Meter', '2025-01-08 11:25:39', '2025-04-07 16:17:10'),
(451, '5', '[\"Indoor\"]', 'CAB000447', '447', 14, 30, NULL, 'SKU000447', NULL, NULL, 'products/HSHOKJAzT4aqHMjcICUrBajKSfeWX8o75yUhKrSf.jpg', 'GRAND', 'BLUE', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 44530', NULL, '334', '20', NULL, '100', '5', '708', 'Meter', '2025-01-08 11:26:59', '2025-04-07 16:17:04'),
(452, '5', '[\"Indoor\"]', 'CAB000448', '448', 13, 19, NULL, 'SKU000448', NULL, NULL, 'products/8BzPDKsvvQHB25k6cBOnWsCcUG7U4Z5MAQvrUulG.jpg', 'BREEZE', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO..- A-29', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-08 11:32:25', '2025-04-07 16:16:58'),
(453, '5', '[\"Indoor\"]', 'CAB000449', '449', 13, 19, NULL, 'SKU000449', NULL, NULL, 'products/c9ibJYiOizooLdu4bTRRRvHAEtaN6sFJ9g2VmvRM.jpg', 'BREEZE', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-30', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-08 11:34:03', '2025-04-07 16:16:51'),
(454, '5', '[\"Indoor\"]', 'CAB000450', '450', 13, 19, NULL, 'SKU000450', NULL, NULL, 'products/1gcknGvl3LKwOJcZePH65GGDeIar1Lo46dxEUcj9.jpg', 'BREEZE', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-34', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-08 11:35:40', '2025-04-07 16:16:40'),
(455, '5', '[\"Indoor\"]', 'CAB000451', '451', 13, 19, NULL, 'SKU000451', NULL, NULL, 'products/KcorRFgvq3CkNOygkEvw6picMl9wGiR9Vu1hmbtE.jpg', 'BREEZE', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- A-35', NULL, '305', '20', NULL, '100', '5', '650', 'Meter', '2025-01-08 11:37:17', '2025-04-07 16:16:35'),
(456, '5', '[\"Indoor\"]', 'CAB000452', '452', 13, 19, NULL, 'SKU000452', NULL, NULL, 'products/fBRcemjqlsNkV3DjnEa4mUwFPFPibP9ndejaPNRJ.jpg', 'SIENNA', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- B-33', NULL, '415', '20', NULL, '100', '5', '870', 'Meter', '2025-01-08 11:38:50', '2025-04-07 16:16:29'),
(457, '5', '[\"Indoor\"]', 'CAB000453', '453', 14, 22, NULL, 'SKU000453', NULL, NULL, 'products/9LOiaJeeCSeWrgxlHlmzqPTHcJDRQAfAGMW2Tx0O.jpg', 'VIRGINIA', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45921', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 11:40:03', '2025-04-07 16:16:19'),
(458, '5', '[\"Indoor\"]', 'CAB000454', '454', 14, 22, NULL, 'SKU000454', NULL, NULL, 'products/Xcld8tLAuQAWiZrsSbscE9vXKiNlCG1lMadGYHfd.jpg', 'VIRGINIA', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45922', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 11:41:39', '2025-04-07 16:15:55'),
(459, '5', '[\"Indoor\"]', 'CAB000455', '455', 14, NULL, NULL, 'SKU000455', NULL, NULL, 'products/W9auaEq4uXqEsw2Dv0PceYUh0J1JqAB9xgg1LQrq.jpg', 'VIRGINIA', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', '324', NULL, '324', '20', NULL, '100', '5', '688', 'Meter', '2025-01-08 11:43:08', '2025-04-07 16:15:51'),
(460, '5', '[\"Indoor\"]', 'CAB000456', '456', 14, 40, NULL, 'SKU000456', NULL, NULL, 'products/6Q4Q1AfMFdrHTH7AsuU91GcDCuftC1uReKYx3VCX.jpg', 'BOHO', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 42203', NULL, '402', '20', NULL, '100', '5', '844', 'Meter', '2025-01-08 11:44:34', '2025-04-07 16:15:45'),
(461, '5', '[\"Indoor\"]', 'CAB000457', '457', 14, 40, NULL, 'SKU000457', NULL, NULL, 'products/NOBdCiPAyeY0LNxjh1F0JNIsG1HUCDhcxjLiDTYe.jpg', 'BOHI', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 42225', NULL, '402', '20', NULL, '100', '5', '844', 'Meter', '2025-01-08 11:45:52', '2025-04-07 16:15:39'),
(462, '5', '[\"Indoor\"]', 'CAB000458', '458', 15, 28, NULL, 'SKU000458', NULL, NULL, 'products/dRcDyjZOEzRQWDsFWozmO8lEUt0udvVbSZpMyiBa.jpg', 'cambridge', 'grey', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5810', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 23:28:48', '2025-04-07 16:15:29'),
(463, '5', '[\"Indoor\"]', 'CAB000459', '459', 15, 28, NULL, 'SKU000459', NULL, NULL, 'products/BgoBVpocw51Bw9MLwAUyaTJqC9NfufejM4x96XbX.jpg', 'CABBRIDGE', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 5811', NULL, '345', '20', NULL, '100', '5', '730', 'Meter', '2025-01-08 23:30:15', '2025-04-07 16:15:13'),
(464, '5', '[\"Indoor\"]', 'CAB000460', '460', 14, 29, NULL, 'SKU000460', NULL, NULL, 'products/QcKhPhZ6r2daWAYEem3BZ0maRjEzwBAZDUJkeR3W.jpg', 'ILLUSION', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 43746', NULL, '288', '20', NULL, '100', '5', '616', 'Meter', '2025-01-08 23:31:21', '2025-04-07 16:15:03'),
(465, '5', '[\"Indoor\"]', 'CAB000461', '461', 14, 45, NULL, 'SKU000461', NULL, NULL, 'products/cA7VqUReELQg4tkNgPspNqa9w1lOAvP0FGnRBkJB.jpg', 'CAMRY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45526', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 23:32:56', '2025-04-07 16:14:56'),
(466, '5', '[\"Indoor\"]', 'CAB000462', '462', 14, 45, 17, 'SKU000462', 'wq333', '12', 'products/GwF4eB7a0iZaFlIbySWxbA6MP2AeukN8PDAH02pD.jpg', 'CAMRY', 'GREY', '[\"Cotton Blend\"]', '[\"Texture\"]', '[\"Curtain\"]', 'PAGE NO.- 45529', NULL, '406', '20', NULL, '100', '5', '852', 'Meter', '2025-01-08 23:34:25', '2025-04-07 16:14:30'),
(467, '5', '[\"Pet proof\",\"Indoor\"]', 'CAB000463', '463', 12, 25, 37, 'SKU000463', 'lkjslkajg', '54cm', 'products/uOMSHsxjjVaAEhNp3R9YbkVlxBofrgg1ZUShD4Qs.png', 'SAGAMATT TEXTURES', 'GREY', '[\"Cotton Blend\"]', '[\"Stripes\",\"TEST\"]', '[\"Curtain\"]', 'PAGE NO.- 708', NULL, '310', '20', NULL, '100', '5', '660', 'Square Meter', '2025-01-08 23:40:17', '2025-04-07 16:14:20'),
(469, '2', '[\"Indoor\"]', 'CAB000464', '565', 13, 44, 73, '10', '12', '45feet', 'products/K2iw4mEBW8mAfC4mWwx6UoBCs7Hzn2EJpVW9baOq.jpg', 'Adhar', '10', '[\"Silk blend\"]', '[\"Animals\"]', '[\"Blinds\"]', 'I am a tester', NULL, '5555', '1000', NULL, '30', '12', '8522', 'Square Feet', '2025-04-17 07:05:04', '2025-04-17 07:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_type`, `product_unit`, `created_at`, `updated_at`) VALUES
(1, 'Acoustic Fabric 55', NULL, '2024-11-29 01:53:39', '2025-03-28 02:56:19'),
(2, 'Blinds', 'Square Feet', '2024-11-29 01:53:49', '2025-01-07 11:26:12'),
(3, 'Carpet Tiles', NULL, '2024-11-29 01:53:56', '2024-11-29 01:53:56'),
(4, 'Curtain Border', NULL, '2024-11-29 01:54:05', '2024-11-29 01:54:05'),
(5, 'Curtain fabrics', 'Meter,Square Meter', '2024-11-29 01:54:31', '2024-12-30 06:56:07'),
(6, 'Engineered flooring', NULL, '2024-11-29 01:54:49', '2024-11-29 01:54:49'),
(7, 'Hardware', NULL, '2024-11-29 01:54:56', '2024-11-29 01:54:56'),
(8, 'Hardwood flooring', NULL, '2024-11-29 01:55:02', '2024-11-29 01:55:02'),
(10, 'Leather', NULL, '2024-11-29 01:55:23', '2024-11-29 01:55:23'),
(11, 'Mood boards', NULL, '2024-11-29 01:55:29', '2024-11-29 01:55:29'),
(14, 'Sheer fabric', NULL, '2024-11-29 01:56:36', '2024-11-29 01:56:36'),
(15, 'Stitching styles', NULL, '2024-11-29 01:56:43', '2024-11-29 01:56:43'),
(16, 'Upholstery fabric', NULL, '2024-11-29 01:56:52', '2024-11-29 01:56:52'),
(17, 'Wall mural', NULL, '2024-11-29 01:56:59', '2024-11-29 01:56:59'),
(19, 'Window and Door Ref. Images', NULL, '2024-11-29 01:57:11', '2024-11-29 01:57:11'),
(20, 'Laminate flooring AC4', NULL, '2024-12-03 21:50:03', '2024-12-03 21:50:03'),
(24, 'SHEERS', 'Meter', '2025-01-08 10:32:49', '2025-01-08 10:32:49'),
(25, 'Walpaper_14', 'Feet', '2025-03-28 02:43:40', '2025-04-11 11:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `franchise_id` varchar(255) DEFAULT NULL,
  `appointment_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `voucher_no` varchar(255) DEFAULT NULL,
  `buyer_ref` varchar(255) DEFAULT NULL,
  `other_ref` varchar(255) DEFAULT NULL,
  `dispatch` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `city_port` varchar(255) DEFAULT NULL,
  `terms_delivery` varchar(255) DEFAULT NULL,
  `quot_for` varchar(255) DEFAULT NULL,
  `cartage` varchar(255) DEFAULT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = "Pending", 1 = "Complete" ',
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `unique_id`, `franchise_id`, `appointment_id`, `name`, `email`, `number`, `address`, `gst_no`, `voucher_no`, `buyer_ref`, `other_ref`, `dispatch`, `destination`, `city_port`, `terms_delivery`, `quot_for`, `cartage`, `section_name`, `status`, `date`, `created_at`, `updated_at`) VALUES
(58, 'CAB00001', '13', '43', 'Kamal Anand', 'r2ohit@avignyata.com', '7835997232', '6/115 DDA FLATS, MADANGIR, First Floor, Gurgaon, Haryana, 122022, India', '08AAJCC0208J1ZU', '', '233123', 'sad', 'Courior', 'Delhi', 'South Delhi', 'TEst', 'Test', 'Test', NULL, '1', '2025-04-11', '2025-04-11 01:05:36', '2025-04-11 01:06:37'),
(59, 'CAB000002', '18', '71', 'Rohit Chandra', 'rohit.chandra96@gmail.com', '7835997232', '6/115 DDA FLATS, MADANGIR, First Floor, New Delhi, Delhi, 122022, India', '08AAJCC0208J1ZU', '', 'Test', 'Test', 'Delhi', 'Delhi', 'Delhi', 'Test', 'Test', 'Testing 1', NULL, '0', '2025-04-11', '2025-04-11 06:53:58', '2025-04-11 06:55:49'),
(60, 'CAB000002', '13', '68', 'Rohit Chandra', 'rohrit.chandra96@gmail.com', '78359972325', '6/115 DDA FLATS, MADANGIR, First Floor, Gurgaon, Haryana, 122002, India', '', '', '', '', '', '', '', '', '', '', NULL, '1', '2025-04-11', '2025-04-11 08:56:28', '2025-04-11 09:52:09'),
(61, 'CAB000002', '13', '76', 'Rohank', 'rohit.chandra96@gmail.com', '7835997232', '6/115 DDA Flats Madangir, Gurgaon, Haryana, 122002, India', '08AAJCC0208J1ZU', '', '233123', 'Test', 'Courior', 'Delhi', 'Gurgaon', 'rewfr', 'Test', 'Test', NULL, '0', '2025-04-11', '2025-04-11 12:01:58', '2025-04-11 12:01:58'),
(62, 'CAB000002', '19', '74', 'neha', 'neha@gmail.com', '9067575578', 'sector 63 noida, Kanpur, Uttar Pradesh, 209402, India', 'SSPPPANNNNXZC1', '', '11', 'NA', 'NA', 'NA', 'kanpur', 'NA', 'Office', 'NA', NULL, '0', '2025-04-11', '2025-04-11 12:26:28', '2025-04-11 12:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` varchar(255) DEFAULT NULL,
  `franchise_id` varchar(255) DEFAULT NULL,
  `appointment_id` varchar(255) DEFAULT NULL,
  `section_order` tinyint(4) DEFAULT NULL,
  `item_order` tinyint(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `tally_code` varchar(225) DEFAULT NULL,
  `file_number` varchar(225) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount` varchar(255) NOT NULL DEFAULT '0',
  `gst_percentage` int(11) DEFAULT NULL,
  `total_amount` varchar(225) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = "Pending", 1 = "Complete" ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `quotation_id`, `franchise_id`, `appointment_id`, `section_order`, `item_order`, `name`, `item`, `tally_code`, `file_number`, `height`, `width`, `qty`, `unit`, `price`, `discount`, `gst_percentage`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(81, '58', '13', '43', 67, 1, 'Curtain', '465', 'CAB000461', '461', NULL, NULL, '10', 'Meter', '852', '0', 5, '8946', '0', '2025-04-11 01:05:36', '2025-04-11 01:05:36'),
(82, '58', '13', '43', 67, 2, 'Blinds', '13', 'CAB000012', '012', NULL, NULL, '10', 'Meter', '802', '0', 5, '8421', '0', '2025-04-11 01:05:36', '2025-04-11 01:05:36'),
(83, '59', '18', '71', 68, 1, 'Curtain', '19', 'CAB000018', '018', NULL, NULL, '10', 'Meter', '794', '5', 5, '7920', '0', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(84, '59', '18', '71', 68, 2, 'Blinds', '467', 'CAB000463', '463', NULL, NULL, '10', 'Meter', '660', '10', 5, '6237', '0', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(85, '59', '18', '71', 68, 3, 'Test', '37', 'CAB000036', '036', NULL, NULL, '10', 'Meter', '724', '10', 5, '6842', '0', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(86, '59', '18', '71', 69, 1, 'Curtain', '2', 'CAB000001', '001', NULL, NULL, '15', 'Meter', '100', '0', 5, '1575', '0', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(87, '59', '18', '71', 69, 2, 'Blinds', '407', 'CAB000403', '403', NULL, NULL, '20', 'Meter', '1026', '10', 5, '19391', '0', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(88, '60', '13', '68', 70, 1, 'item1', '3', 'CAB000002', '002', NULL, NULL, '1', 'Meter', '100', '0', 5, '105', '0', '2025-04-11 08:56:28', '2025-04-11 08:56:28'),
(89, '61', '13', '76', 71, 1, 'Curtain', '17', 'CAB000016', '016', NULL, NULL, '10', 'Meter', '772', '5', 5, '7701', '0', '2025-04-11 12:01:58', '2025-04-11 12:01:58'),
(90, '61', '13', '76', 71, 2, 'Blinds', '432', 'CAB000428', '428', NULL, NULL, '15', 'Meter', '688', '10', 5, '9752', '0', '2025-04-11 12:01:58', '2025-04-11 12:01:58'),
(91, '61', '13', '76', 72, 1, 'Curtain', '403', 'CAB000399', '399', NULL, NULL, '10', 'Meter', '708', '10', 5, '6691', '0', '2025-04-11 12:01:58', '2025-04-11 12:01:58'),
(92, '62', '19', '74', 73, 1, 'Heart Curtain', '2', 'CAB000001', '001', NULL, NULL, '0', 'Meter', '100', '0', 5, '105', '0', '2025-04-11 12:26:28', '2025-04-11 12:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_sections`
--

CREATE TABLE `quotation_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_sections`
--

INSERT INTO `quotation_sections` (`id`, `quotation_id`, `section_name`, `created_at`, `updated_at`) VALUES
(67, 58, 'Kitchen', '2025-04-11 01:05:36', '2025-04-11 01:05:36'),
(68, 59, 'Kitchen', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(69, 59, 'Bedroom', '2025-04-11 06:53:58', '2025-04-11 06:53:58'),
(70, 60, 'Hall2', '2025-04-11 08:56:28', '2025-04-11 08:56:28'),
(71, 61, 'Kitchen', '2025-04-11 12:01:58', '2025-04-11 12:01:58'),
(72, 61, 'Bedroom', '2025-04-11 12:01:58', '2025-04-11 12:01:58'),
(73, 62, 'NA', '2025-04-11 12:26:28', '2025-04-11 12:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(2, 'Admin', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(3, 'Help Desk', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(4, 'Fulfillment Desk', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(5, 'Data Entry Operator', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(6, 'Accounts', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(7, 'Franchise', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(8, 'Franchise Team Member', 'web', '2024-10-19 10:23:55', '2024-10-19 10:23:55'),
(9, 'Customer Login', 'web', '2025-04-22 02:45:54', '2025-04-22 02:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GlqMQwPyaHcjyWBa6vEnBsUGlKRYWGz3Zp00fEuw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXdQTlFUY09qbEdHcXNQbkQ4ZHY5Y0JhaldlMEVVa1ZaZEFQVkJMNiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ291dCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745478641),
('IHagJVgDxVqI8Kf04Brk4MVvyCf11BjFf4xGiB1x', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ1RmWkVBQWRmeFJoYnNPNUFabVByTmY3RWtqcTlvWmJCUk9qZzlqZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyX2xpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NDU0NzYzMjg7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1745476402),
('p1hAT2UKeMgD7jVM7Px90Piy8t1YM98BGbo8mQS4', 127, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSTRWN1hXZEo0UW5ZVHlSR1ZKRkNwS1hvZUMzQ0gzQlZkVTRCT1k4SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI3O3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NTQ2NzQxNTt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1745467415);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'V&J', '2024-12-10 05:03:06', '2024-12-10 05:03:06'),
(13, 'SHIVANAA', '2024-12-10 05:09:39', '2024-12-10 05:09:39'),
(14, 'KC FABRICS', '2024-12-10 05:09:55', '2024-12-10 05:09:55'),
(15, 'V3 HOME', '2024-12-10 05:10:04', '2024-12-10 05:10:04'),
(16, 'D\"DECORE', '2024-12-10 05:10:16', '2024-12-10 05:10:16'),
(17, 'NOVA BLINDS', '2024-12-10 05:10:30', '2024-12-10 05:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_collections`
--

CREATE TABLE `supplier_collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_collections`
--

INSERT INTO `supplier_collections` (`id`, `supplier_id`, `collection_name`, `created_at`, `updated_at`) VALUES
(17, 12, 'Naturals Vol-II', '2024-12-10 10:13:07', '2024-12-10 10:13:07'),
(18, 12, 'Naturals Vol-III', '2024-12-10 10:13:21', '2024-12-10 10:13:21'),
(19, 13, 'Breeze', '2024-12-10 10:13:44', '2024-12-10 10:13:44'),
(20, 13, 'Sienna', '2024-12-10 10:13:58', '2024-12-10 10:13:58'),
(21, 13, 'Noir', '2024-12-10 10:14:12', '2024-12-10 10:14:12'),
(22, 14, 'Virginia', '2024-12-10 10:14:31', '2024-12-12 07:46:37'),
(23, 12, 'Earthen Lino Vol-1', '2024-12-10 10:14:44', '2024-12-10 10:14:44'),
(24, 12, 'Earthen Lino Vol-2', '2024-12-10 10:14:56', '2024-12-10 10:14:56'),
(25, 12, 'Saga Mat Textures', '2024-12-10 10:15:08', '2024-12-10 10:15:08'),
(26, 12, 'Poetry', '2024-12-10 10:15:19', '2024-12-10 10:15:19'),
(27, 14, 'European linen', '2024-12-10 10:15:33', '2024-12-10 10:15:33'),
(28, 15, 'CAMBRIDGE', '2024-12-10 10:15:47', '2024-12-10 10:15:47'),
(29, 14, 'Illusion', '2024-12-10 10:16:02', '2024-12-10 10:16:02'),
(30, 14, 'Grand', '2024-12-10 10:16:36', '2024-12-10 10:16:36'),
(32, 12, 'Grass Roots', '2024-12-10 10:19:04', '2024-12-10 10:19:04'),
(33, 12, 'Serena Textures', '2024-12-10 10:19:15', '2024-12-10 10:19:15'),
(34, 12, 'Naturals Vol-V', '2024-12-10 10:27:14', '2024-12-10 10:27:14'),
(35, 12, 'LE LIN-III', '2024-12-10 10:27:27', '2024-12-10 10:27:27'),
(36, 12, 'LE LIN-IV', '2024-12-10 10:27:36', '2024-12-10 10:27:36'),
(37, 12, 'LE LIN-V', '2024-12-10 10:27:55', '2024-12-10 10:27:55'),
(38, 12, 'Naturals Vol-IV', '2024-12-10 10:28:25', '2024-12-10 10:28:25'),
(39, 12, 'Naturals Vol-I', '2024-12-10 10:28:37', '2024-12-10 10:28:37'),
(40, 14, 'Boho', '2024-12-10 10:29:55', '2024-12-10 10:29:55'),
(41, 16, 'Sophia', '2024-12-10 10:30:59', '2024-12-10 10:30:59'),
(42, 14, 'Natural', '2024-12-10 10:31:38', '2024-12-10 10:31:38'),
(43, 14, 'Olivia', '2024-12-10 10:31:59', '2024-12-10 10:31:59'),
(44, 13, 'Seasons', '2024-12-10 10:32:19', '2024-12-10 10:32:19'),
(45, 14, 'Camry', '2024-12-10 10:34:29', '2024-12-10 10:34:29'),
(46, 14, 'Marbella', '2024-12-10 10:34:56', '2024-12-12 07:47:08'),
(47, 17, 'Nova Contract series', '2024-12-10 10:38:06', '2024-12-10 10:38:06'),
(48, 17, 'Melange blind', '2024-12-10 10:38:35', '2024-12-10 10:38:35'),
(49, 17, 'York', '2024-12-10 10:38:52', '2024-12-10 10:38:52'),
(50, 17, 'Khadi', '2024-12-10 10:38:58', '2024-12-10 10:38:58'),
(51, 17, 'Eden', '2024-12-10 10:39:10', '2024-12-10 10:39:10'),
(52, 17, 'Jade', '2024-12-10 10:39:21', '2024-12-10 10:39:21'),
(53, 17, 'Linen', '2024-12-10 10:39:32', '2024-12-10 10:39:32'),
(54, 17, 'Pearl', '2024-12-10 10:39:44', '2024-12-10 10:39:44'),
(55, 17, 'Pleat', '2024-12-10 10:40:01', '2024-12-10 10:40:01'),
(56, 17, 'Scorpio', '2024-12-10 10:40:18', '2024-12-10 10:40:18'),
(57, 17, 'Essence', '2024-12-10 10:40:34', '2024-12-10 10:40:34'),
(58, 17, 'Crossover', '2024-12-10 10:40:51', '2024-12-10 10:40:51'),
(59, 12, 'Serena Sheers', '2024-12-10 10:41:55', '2024-12-10 10:41:55'),
(60, 14, 'Hawaii Sheers', '2024-12-11 05:26:44', '2024-12-11 05:26:44'),
(61, 17, 'For test', '2025-03-28 04:19:18', '2025-03-28 04:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_collection_designs`
--

CREATE TABLE `supplier_collection_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_collection_id` int(11) DEFAULT NULL,
  `design_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_collection_designs`
--

INSERT INTO `supplier_collection_designs` (`id`, `supplier_id`, `supplier_collection_id`, `design_name`, `created_at`, `updated_at`) VALUES
(17, 12, 17, 'Adore', '2024-12-12 06:41:05', '2024-12-12 06:41:05'),
(18, 12, 18, 'Faith', '2024-12-12 06:41:50', '2024-12-12 06:41:50'),
(19, 12, 18, 'Essen', '2024-12-12 06:42:18', '2024-12-12 06:42:18'),
(20, 12, 18, 'Ava', '2024-12-12 06:42:41', '2024-12-12 06:42:41'),
(21, 13, 19, 'Antara', '2024-12-12 06:43:05', '2024-12-12 06:43:05'),
(22, 12, 23, 'Elica', '2024-12-12 06:44:13', '2024-12-12 06:44:13'),
(23, 12, 23, 'Hargun', '2024-12-12 06:54:01', '2024-12-12 06:54:01'),
(24, 12, 23, 'Bianka', '2024-12-12 06:54:18', '2024-12-12 06:54:18'),
(25, 12, 23, 'Calista', '2024-12-12 06:54:33', '2024-12-12 06:54:33'),
(26, 12, 24, 'Flints', '2024-12-12 06:54:49', '2024-12-12 06:54:49'),
(27, 12, 24, 'Harlech', '2024-12-12 06:55:01', '2024-12-12 06:55:01'),
(28, 12, 24, 'Perth', '2024-12-12 06:55:16', '2024-12-12 06:55:16'),
(29, 12, 24, 'Orkney', '2024-12-12 06:55:38', '2024-12-12 06:55:38'),
(30, 12, 24, 'Elgin', '2024-12-12 06:55:55', '2024-12-12 06:55:55'),
(31, 12, 24, 'Thurso', '2024-12-12 06:56:10', '2024-12-12 06:56:10'),
(32, 12, 24, 'Forres', '2024-12-12 06:56:28', '2024-12-12 06:56:28'),
(33, 12, 25, 'Hoza', '2024-12-12 06:57:24', '2024-12-12 06:57:24'),
(34, 12, 25, 'Oakley', '2024-12-12 06:57:39', '2024-12-12 06:57:39'),
(35, 12, 25, 'Eleen', '2024-12-12 06:57:54', '2024-12-12 06:57:54'),
(36, 12, 25, 'Gabby', '2024-12-12 06:58:13', '2024-12-12 06:58:13'),
(37, 12, 25, 'Charvi', '2024-12-12 06:58:22', '2024-12-12 06:58:22'),
(38, 12, 25, 'Adira', '2024-12-12 06:58:36', '2024-12-12 06:58:36'),
(39, 12, 26, 'Crisza', '2024-12-12 06:59:23', '2024-12-12 06:59:23'),
(40, 12, 26, 'Mahika', '2024-12-12 06:59:43', '2024-12-12 06:59:43'),
(41, 12, 26, 'Tova', '2024-12-12 06:59:58', '2024-12-12 06:59:58'),
(42, 12, 33, 'Mable', '2024-12-12 07:00:33', '2024-12-12 07:00:33'),
(43, 12, 33, 'Alyna', '2024-12-12 07:00:43', '2024-12-12 07:00:43'),
(44, 12, 33, 'Dilan', '2024-12-12 07:01:04', '2024-12-12 07:01:04'),
(45, 12, 59, 'Kristen', '2024-12-12 07:01:20', '2024-12-12 07:01:20'),
(46, 12, 33, 'Rhoda', '2024-12-12 07:01:33', '2024-12-12 07:01:33'),
(47, 12, 34, 'Shiloh', '2024-12-12 07:01:56', '2024-12-12 07:01:56'),
(48, 12, 34, 'Hinckley', '2024-12-12 07:02:08', '2024-12-12 07:02:08'),
(49, 12, 35, 'Tiffany', '2024-12-12 07:02:19', '2024-12-12 07:02:19'),
(50, 12, 35, 'Glamour', '2024-12-12 07:02:54', '2024-12-12 07:02:54'),
(51, 12, 36, 'Antila', '2024-12-12 07:03:14', '2024-12-12 07:03:14'),
(52, 12, 36, 'Galaxy', '2024-12-12 07:03:27', '2024-12-12 07:03:27'),
(53, 12, 36, 'Majestic', '2024-12-12 07:03:39', '2024-12-12 07:03:39'),
(54, 12, 36, 'Essence', '2024-12-12 07:04:10', '2024-12-12 07:04:10'),
(55, 12, 37, 'Lisbon', '2024-12-12 07:04:21', '2024-12-12 07:04:21'),
(56, 12, 37, 'Riga', '2024-12-12 07:04:32', '2024-12-12 07:04:32'),
(57, 12, 38, 'Nimbus', '2024-12-12 07:04:59', '2024-12-12 07:04:59'),
(58, 12, 38, 'Gari', '2024-12-12 07:05:13', '2024-12-12 07:05:13'),
(59, 12, 39, 'Arrive', '2024-12-12 07:05:30', '2024-12-12 07:05:30'),
(60, 12, 39, 'Hive', '2024-12-12 07:05:43', '2024-12-12 07:05:43'),
(61, 12, 17, 'Cruze', '2024-12-12 07:06:00', '2024-12-12 07:06:00'),
(62, 12, 23, 'Elicia', '2024-12-12 07:08:09', '2024-12-12 07:08:09'),
(63, 12, 33, 'Elanor', '2024-12-12 07:13:54', '2024-12-12 07:13:54'),
(64, 12, 34, 'Roland', '2024-12-12 07:14:35', '2024-12-12 07:14:35'),
(65, 12, 34, 'Tabitha', '2024-12-12 07:22:47', '2024-12-12 07:22:47'),
(66, 12, 34, 'Corby', '2024-12-12 07:23:13', '2024-12-12 07:23:13'),
(67, 12, 35, 'Melissa', '2024-12-12 07:24:13', '2024-12-12 07:24:13'),
(68, 12, 37, 'Celerio', '2024-12-12 07:25:46', '2024-12-12 07:25:46'),
(69, 12, 37, 'Denver', '2024-12-12 07:25:56', '2024-12-12 07:25:56'),
(70, 12, 38, 'Pisa', '2024-12-12 07:26:47', '2024-12-12 07:26:47'),
(71, 12, 39, 'Bora', '2024-12-12 07:27:32', '2024-12-12 07:27:32'),
(72, 12, 34, 'Maddox', '2024-12-12 07:31:19', '2024-12-12 07:31:19'),
(73, 13, 44, 'Anatara', '2024-12-12 07:34:55', '2024-12-12 07:34:55'),
(74, 12, 34, 'Melissa', '2025-01-05 08:53:26', '2025-01-05 08:53:26'),
(75, 17, 61, 'For test', '2025-03-28 04:25:15', '2025-03-28 04:25:15'),
(76, 17, 61, 'Texture', '2025-03-28 04:25:15', '2025-03-28 04:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Outdoor', '2024-11-29 02:47:06', '2024-11-29 02:47:06'),
(3, 'Pet proof', '2024-11-29 02:47:13', '2024-11-29 02:47:13'),
(4, 'Stain resistant', '2024-11-29 02:47:18', '2024-11-29 02:47:18'),
(5, 'Wider width', '2024-11-29 02:47:24', '2024-11-29 02:47:24'),
(6, 'Indoor', '2024-12-18 06:02:21', '2025-03-28 04:35:39'),
(7, 'Texture', '2025-03-28 04:31:10', '2025-03-28 04:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `usages`
--

CREATE TABLE `usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usages` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usages`
--

INSERT INTO `usages` (`id`, `usages`, `created_at`, `updated_at`) VALUES
(1, 'Bedding', '2024-11-29 02:45:57', '2024-11-29 02:45:57'),
(2, 'Blinds', '2024-11-29 02:46:02', '2024-11-29 02:46:02'),
(3, 'Cushion', '2024-11-29 02:46:08', '2024-11-29 02:46:08'),
(4, 'Headboard', '2024-11-29 02:46:13', '2024-11-29 02:46:13'),
(5, 'Curtain', '2024-12-18 06:00:34', '2024-12-18 06:00:34'),
(6, 'tEst', '2025-03-28 04:36:26', '2025-03-28 04:36:26'),
(7, 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.', '2025-03-28 04:36:50', '2025-03-28 04:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_customer` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lead_id`, `name`, `email`, `is_customer`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `franchise_id`) VALUES
(1, 0, 'Admin', 'admin@admin.com', 0, NULL, '$2y$12$VZ6ow5MEnXU0QoWdn8CdNOChpevEJxMplFuUlHkdXOjz9TuovXzey', NULL, '2024-10-19 05:26:31', '2024-10-19 05:26:31', NULL),
(10, 0, 'Super Admin', 'superadmin@gmail.com', 0, NULL, '$2y$12$VZ6ow5MEnXU0QoWdn8CdNOChpevEJxMplFuUlHkdXOjz9TuovXzey', NULL, '2024-11-08 22:31:44', '2024-11-23 08:26:30', NULL),
(43, 0, 'Sandesh', 'sandy.panchal619@gmail.com', 0, NULL, '$2y$12$X71yobvAAOiaUfpL5a91UeR5Z/HNY514OitDcqT0acn7HMrR99qNS', NULL, '2024-12-03 01:09:58', '2024-12-03 01:09:58', NULL),
(44, 0, 'Rohit', 'rohit.chandra96@gmail.com', 0, NULL, '$2y$12$p9BdRRXQgy4UClicoYdmkOAW3cG02k8ZwU/Kc3sZm4Gc2f8eL1XRW', NULL, '2024-12-16 06:53:24', '2025-01-02 08:17:32', NULL),
(45, 0, 'Rohit', 'rohit.chandra1496@gmail.com', 0, NULL, '$2y$12$fud5CQW7iYgsk96GJOFt9e9KrTNwcr/FiFbZMyPMsTm6Pcdb52Aj6', NULL, '2024-12-25 01:37:17', '2024-12-25 01:37:17', NULL),
(56, 0, 'Rohit Chandra', 'rohit@avignyata.com', 0, NULL, '$2y$12$4Qe.HlqfTY06012tnRSU9OkMUGBh9bB4O1lTkpdFYzMNyVDEYpI7C', NULL, '2025-01-13 07:01:32', '2025-01-13 07:01:32', NULL),
(57, 0, 'Anu', 'ea@pretfab.com', 0, NULL, '$2y$12$beQ1MxGOa.yRjzd2wKUjcOQKIcfuC23a4/YALl77uKm2j0HgK5Gq.', NULL, '2025-01-18 02:15:36', '2025-01-18 02:15:36', NULL),
(58, 0, 'Devesh', 'devesh.pretfab@gmail.com', 0, NULL, '$2y$12$6RQThWknp334EjjvkwM7fu0ffI.tnV301MzUqg1JOXjAcipRK3RlC', NULL, '2025-01-18 02:16:57', '2025-01-18 02:16:57', NULL),
(61, 0, 'Rajiv Kumar', 'kumarrajiv488@gmail.com', 0, NULL, '$2y$12$9hqItWnQkMuG9J8DtmaOiexLpD1GNZgfumK1tdLDySsf45Zhi3m.y', NULL, '2025-03-16 04:31:13', '2025-03-16 04:31:13', NULL),
(63, 0, 'Rohit Chandra', 'playerrohit90@gmail.com', 0, NULL, '$2y$12$BetfzOK/vIVF2riUbnXoVOik8Yoj71uty2tU5Wu9/wn2.hflm3fJW', NULL, '2025-03-17 05:04:44', '2025-04-03 04:23:38', NULL),
(64, 0, 'chirag negi', 'Chirag.kushel@gmail.com', 0, NULL, '$2y$12$uc3C6FQlMQR/7kvPstQ94OnmIdQ1FQTT8K4j/50K5F362DQ3ukoaS', NULL, '2025-03-26 03:58:25', '2025-03-26 03:58:25', NULL),
(65, 0, 'akash neig', 'akashnegi.kushel@gmail.com', 0, NULL, '$2y$12$Hj8ne.j.5BJ.8WRtIS1QRuK/3Zc/DmqC405hyS2S5UfAQ2c1yS2Sq', NULL, '2025-03-26 03:59:30', '2025-03-26 03:59:30', NULL),
(66, 0, 'aasit mandal 1', 'asit.kushel@gmail.com', 0, NULL, '$2y$12$LJeNP9Q2A8ATIEF6zhe8pOHVvCeezcubSpvWWyRRwgiKXubaMITri', NULL, '2025-03-26 04:00:33', '2025-03-27 04:51:08', NULL),
(67, 0, 'vikas', 'vikas.kushel@gmail.com', 0, NULL, '$2y$12$bt26Ea6x5gQIDiDamA0.YOlQtNM4wsx6IE./ZBuL9EayQN5YXKWNS', NULL, '2025-03-26 04:01:19', '2025-03-26 04:01:19', NULL),
(68, 0, 'Manish', 'manish.kusheldigi53@gmail.com', 0, NULL, '$2y$12$ACccOb2sa43aWFzhNwg3HOwIe7jMY8IGQjlwJGaM4CYaxQrHH/ntG', NULL, '2025-03-27 02:21:44', '2025-03-27 02:21:44', NULL),
(73, 0, 'Raj Tiwari', 'rajtiwariyng@gmail.com', 0, NULL, '$2y$12$vxeOuWINzrTlsXKv9I5jWee8lBUIt76xuA88GwqxMs/3qmJg.ZL82', NULL, '2025-04-05 11:26:04', '2025-04-05 11:26:04', NULL),
(74, 0, 'Sandesh Avignta', 'sandesh.p@theinspium.com', 0, NULL, '$2y$12$EvOb/dbDSxd0Pi0KbEKcVuvDnMM3S1pw2BLu00YeAVkCMbYLYG0N2', NULL, '2025-04-06 07:58:33', '2025-04-06 07:58:33', NULL),
(75, 0, 'Vivek Kumar', 'vivek.k@theinspium.com', 0, NULL, '$2y$12$/lUeN3KqJI9M.yCIwgcVDucZu46dgXjNQAkcySAXbaqVLtlg6QNFK', NULL, '2025-04-06 08:02:56', '2025-04-06 08:02:56', NULL),
(76, 0, 'sagar', 'sagar.kusheldigisolution@gmail.com', 0, NULL, '$2y$12$jW.dwHnyNmnVMIQ6emgkU.bUxW.NHAMSMUwgh9Ynf6nf.ftIZsJn6', NULL, '2025-04-07 08:10:43', '2025-04-11 12:03:49', NULL),
(79, 0, 'Bihari', 'biharikumarrawat841501@gmail.com', 0, NULL, '$2y$12$Wf8xytf5JRtlY4LSc8Ry2.OthGy6TDNa612.qwTxBA3cwviT92LNK', NULL, '2025-04-07 08:51:35', '2025-04-07 08:51:35', NULL),
(93, 0, 'Avinash', 'avinash@gmail.com', 0, NULL, '$2y$12$7Jr1JaZrbODNR/7QQNm82OPl/kTqW8D52taX9L5/MNqV1XiZD.ijS', NULL, '2025-04-11 11:46:25', '2025-04-11 11:46:25', NULL),
(94, 0, 'Pavan Kumar', 'pavanku80096@gmail.com', 0, NULL, '$2y$12$PNfeh.8SXDamia5yM30gouvduLd5D5QoET3PHXoA9jOmQyF7HjhDC', NULL, '2025-04-17 02:32:24', '2025-04-17 02:32:24', NULL),
(95, 0, 'Shiva', 'shiva@gmail.com', 0, NULL, '$2y$12$e2J37SSrCC26611Qt9lLCOGAG9u44LMEJY/K9Ho44YHljJdL4qKP6', NULL, '2025-04-17 06:32:32', '2025-04-17 06:32:32', NULL),
(96, 0, 'Super Admin', 'superadmin1@gmail.com', 0, NULL, '$2y$12$jWqhSuqiz9CBCflat7cYQe0UKpBL1qO892OYHJf72D/USJCfvuRuy', NULL, '2025-04-17 07:40:38', '2025-04-17 07:40:38', NULL),
(97, 0, 'some', 'some@gmail.com', 0, NULL, '$2y$12$YsmYT8Needn65zkwBnW0T.urVKgpuL/s212Bu9UbnOy2/U6bRPQj6', NULL, '2025-04-21 04:31:48', '2025-04-21 04:31:48', NULL),
(100, 0, 'Anamika Kushvaha', 'sbdsadj@gmail.com', 0, NULL, '$2y$12$pRGG41rW7WySEODZWJh6HOzLluHhQdQPMoVRQsrF5N1rlPZ4IX7tq', NULL, '2025-04-21 04:36:08', '2025-04-21 04:36:08', NULL),
(101, 0, 'Anamika Kushvaha', 'anamikakushavaha39@gmail.com', 0, NULL, '$2y$12$3Pfn/V.jt7O3ak2aiBvt9ukapQymEuBjB83aDpNLOOx0t/E7Eh6Mq', NULL, '2025-04-21 04:42:21', '2025-04-21 04:42:21', NULL),
(102, 0, 'Pavan Kumar', 'pavanku0096@gmail.com', 0, NULL, '$2y$12$itYyBJnWOWPoQUV6GGYaYeYYAv3/MdF9TXKWcgIFrHEHDJOmYj.ae', NULL, '2025-04-21 04:46:38', '2025-04-21 04:46:38', NULL),
(103, 0, 'Anamika Kushvaha', 'pavanku8330096@gmail.com', 0, NULL, '$2y$12$.tjSuKflj7Va1NjE5pd/UeJYDVcqe2VZneqMfUcwzoqDMqABC8pim', NULL, '2025-04-21 04:56:01', '2025-04-21 04:56:01', NULL),
(104, 0, 'hhsadhahud', 'xyz@gmail.com', 0, NULL, '$2y$12$EYYUDDBZil5kwaDDr2WLouPEdvCKTqB9IT/iyyQAK6HmDcNvlzCw2', NULL, '2025-04-21 05:00:44', '2025-04-21 05:00:44', NULL),
(105, 0, 'jjhwqdhwqkd', 'hghgh@gmail.com', 0, NULL, '$2y$12$b3SXFG/oaMvWr3sMeme1UuxYZk2lGLWbF19TDz.1Pvi8mnfEmRhde', NULL, '2025-04-21 05:03:38', '2025-04-21 05:03:38', NULL),
(106, 0, 'Pavan Pal', 'pavanpalpavanpal3@gmail.com', 0, NULL, '$2y$12$U30MsEYhXvPZzQo3xI3U7e8PpE0BOrxmm7KrFH9Tm/DS.7AyvFhNC', NULL, '2025-04-21 05:04:19', '2025-04-21 05:04:19', NULL),
(107, 0, 'Anamika Kushvaha', 'pavanku8044096@gmail.com', 0, NULL, '$2y$12$mbnRxamfDEpIH2fFQs58D.xIoSP6HmEBcn/Cp8gpR1G/faXOw5AEC', NULL, '2025-04-21 05:38:38', '2025-04-21 05:38:38', NULL),
(112, 0, 'somethibf', 'shjjshj@gmail.com', 1, NULL, '$2y$12$PaRV/9/gBzBW1rXTvp5Jr.bSTmvPaPtra0xey0cblT7D6eavl1jhK', NULL, '2025-04-21 08:14:20', '2025-04-21 08:14:20', NULL),
(113, 0, 'shiva ji rav', 'shiva1@gmail.com', 1, NULL, '$2y$12$QlSUwvLeZYAbJtJ8fjYHXOJQ.EJdYQNZag7JNZTXCP9u2YAbpB4PG', NULL, '2025-04-21 08:17:22', '2025-04-21 08:17:22', NULL),
(121, 0, 'mukesh', 'mukesh8009636@gmail.com', 1, NULL, '$2y$12$0CVg1QQbo77IU1yvLzPkAeOV9lvqmq7Ysh4SIWbhd8CI53xYWtWgS', NULL, '2025-04-21 09:46:31', '2025-04-21 09:46:31', NULL),
(122, 0, 'Pavan Kumar', 'pavank345u80096@gmail.com', 1, NULL, '$2y$12$klLmZ6cc2rw0.q1skoQsl.iJoyF/JfqVk7aDoR.3D3LqVxb6fdJs.', NULL, '2025-04-21 09:51:39', '2025-04-21 09:51:39', NULL),
(123, 0, 'hari', 'hari@gmail.com', 1, NULL, '$2y$12$3F3nuLw6aoO9aKsYNjfPQealRRL7q/xZN8B5Lt8AF/F23IoS8KLle', NULL, '2025-04-22 04:16:11', '2025-04-22 04:16:11', NULL),
(124, 0, 'hiva', 'hiva2@gmail.com', 1, NULL, '$2y$12$KDNevDheFGfimlq6.oRJVu1J4J3kzGeRR8p1cbc7iCgq2wM1Cx5y.', NULL, '2025-04-22 05:07:53', '2025-04-22 05:07:53', NULL),
(125, 0, 'ramji', 'ram2@gmail.com', 1, NULL, '$2y$12$pimSAZPhirCe/1.Rqwidc.zr41VapyQGRuT2SjOOfKoQPy0Bkv1Cm', NULL, '2025-04-22 05:37:20', '2025-04-22 05:37:20', NULL),
(126, 0, 'kya', 'ky@gmail.com', 1, NULL, '$2y$12$F5Lk/qzxk90/524c2KDtgejLVSz0f8KnajX9x242z/0lnVwG06g/2', NULL, '2025-04-22 05:38:22', '2025-04-22 05:38:22', NULL),
(131, 36, 'Pankaj kohli', 'pankajkohli929@gmail.com', 1, NULL, '$2y$12$kC/mNEig1zfJDxDj0npk5.YGj7VlJGGhCRwa2r2WAD05dpZNMzzha', NULL, '2025-04-23 23:35:05', '2025-04-23 23:35:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_assigneds`
--

CREATE TABLE `work_assigneds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL DEFAULT 5555,
  `task_title` varchar(255) DEFAULT NULL,
  `task_description` text DEFAULT NULL,
  `status` enum('pending','in_progress','completed') NOT NULL DEFAULT 'pending',
  `assigned_date` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_assigneds`
--

INSERT INTO `work_assigneds` (`id`, `full_name`, `phone`, `email`, `worker_id`, `task_title`, `task_description`, `status`, `assigned_date`, `deadline`, `completion_date`, `created_at`, `updated_at`) VALUES
(1, 'Pavan Kumar', '8009636339', 'pavanku80096@gmail.com', 5555, NULL, NULL, 'pending', '2025-04-10', NULL, NULL, '2025-04-22 06:25:40', '2025-04-22 06:25:40'),
(2, 'Anamika Kushvaha', '8381802414', 'anamikakushvaha0@gmail.com', 5555, NULL, NULL, 'pending', '2025-04-22', '2025-04-30', '2025-04-28', '2025-04-22 06:31:54', '2025-04-22 06:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `zip_codes`
--

CREATE TABLE `zip_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zip_codes`
--

INSERT INTO `zip_codes` (`id`, `zip_code`, `country`, `state`, `city`, `created_at`, `updated_at`) VALUES
(15, '122002', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:51:46', '2024-12-02 23:18:38'),
(16, '122003', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:52:03', '2024-12-02 03:52:03'),
(17, '122007', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:52:19', '2024-12-02 03:52:19'),
(20, '122010', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:53:19', '2024-12-02 03:53:19'),
(21, '122011', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:53:37', '2024-12-02 03:53:37'),
(22, '122015', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:53:56', '2024-12-02 03:53:56'),
(23, '122016', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:54:18', '2024-12-02 03:54:18'),
(24, '122017', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:54:33', '2024-12-02 03:54:33'),
(25, '122022', 'India', 'Haryana', 'Gurgaon', '2024-12-02 03:54:51', '2024-12-03 01:37:06'),
(26, '733011', 'US', 'Texas', 'Austin', '2025-03-28 02:01:24', '2025-03-28 02:01:24'),
(27, '201301', 'India', 'Uttar Pradesh', 'Ghaziabad', '2025-03-28 02:36:52', '2025-03-28 02:36:52'),
(28, '273888', 'india', 'Uttar Pradesh', 'Noida', '2025-03-28 02:37:30', '2025-03-28 02:37:30'),
(34, '209402', 'India', 'Uttar Pradesh', 'Kanpur', '2025-04-11 11:48:47', '2025-04-11 11:48:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `franchise_id` (`franchise_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compositions`
--
ALTER TABLE `compositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coustomers`
--
ALTER TABLE `coustomers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coustomers_phone_unique` (`phone`),
  ADD UNIQUE KEY `coustomers_email_unique` (`email`);

--
-- Indexes for table `design_types`
--
ALTER TABLE `design_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `design_type` (`design_type`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `franchises_user_id_foreign` (`user_id`);

--
-- Indexes for table `franchise_approvas`
--
ALTER TABLE `franchise_approvas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `franchise_approvas_email_unique` (`email`);

--
-- Indexes for table `franchise_temps`
--
ALTER TABLE `franchise_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_models`
--
ALTER TABLE `lead_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_city_state`
--
ALTER TABLE `master_city_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_sections`
--
ALTER TABLE `quotation_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_sections_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_collections`
--
ALTER TABLE `supplier_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_collection_designs`
--
ALTER TABLE `supplier_collection_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usages`
--
ALTER TABLE `usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `work_assigneds`
--
ALTER TABLE `work_assigneds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zip_codes`
--
ALTER TABLE `zip_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `compositions`
--
ALTER TABLE `compositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coustomers`
--
ALTER TABLE `coustomers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `design_types`
--
ALTER TABLE `design_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `franchise_approvas`
--
ALTER TABLE `franchise_approvas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise_temps`
--
ALTER TABLE `franchise_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_models`
--
ALTER TABLE `lead_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `master_city_state`
--
ALTER TABLE `master_city_state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `quotation_sections`
--
ALTER TABLE `quotation_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier_collections`
--
ALTER TABLE `supplier_collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `supplier_collection_designs`
--
ALTER TABLE `supplier_collection_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usages`
--
ALTER TABLE `usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `work_assigneds`
--
ALTER TABLE `work_assigneds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zip_codes`
--
ALTER TABLE `zip_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `franchises`
--
ALTER TABLE `franchises`
  ADD CONSTRAINT `franchises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_sections`
--
ALTER TABLE `quotation_sections`
  ADD CONSTRAINT `quotation_sections_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
