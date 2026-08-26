-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 10:41 AM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `admin_id`, `bank_name`, `account_number`, `account_title`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 'Meezan Bank', '0004110103068426', 'Pure water M&Sons', 1675190, '2023-01-11 00:20:43', '2023-03-13 17:23:24'),
(2, 3, 'Silkbank (Mehmood Anwar)', '50525000022022', 'Mehmood anwer', 0, '2023-01-11 00:23:13', '2023-02-09 13:58:10'),
(3, 3, 'Silkbank (pure water)', '00522001882147', 'Mehmood anwer', 0, '2023-01-11 00:24:13', '2023-01-25 12:25:40'),
(4, 3, 'HBL (Mehmood anwar)', '0005067900127003', 'Mehmood anwar', 0, '2023-01-11 00:25:35', '2023-01-25 12:26:27'),
(5, 3, 'Allied Bank Pure water M&Sons)', '0020052711640023', 'Pure water M&Sons', 0, '2023-01-11 00:26:35', '2023-01-25 12:27:43'),
(6, 3, 'HBL (pure water)', '0005067900779203', 'Pure Water', 0, '2023-01-11 00:28:07', '2023-02-21 13:11:07'),
(7, 3, 'Bank Alfalah', '5613005000820713', 'Water care House', 0, '2023-01-11 00:30:27', '2023-01-11 00:30:27'),
(8, 3, 'Standard Chartered', '0000001165291801', 'Pure water M&Sons', 0, '2023-01-11 00:31:48', '2023-01-11 00:31:48'),
(9, 3, 'Jazz Cash (Mehmood)', '03046669339', 'Mehmood anwer', 0, '2023-01-11 00:32:56', '2023-01-25 12:24:31'),
(10, 3, 'Easy Piasa', '03366666739', 'Mehmood anwer', 0, '2023-01-11 00:33:31', '2023-01-11 00:33:31'),
(11, 3, 'Jazz Cash (Ahmar)', '03066666739', 'Ahmar Mahmood', 0, '2023-01-11 00:34:04', '2023-01-25 12:24:00'),
(12, 3, 'Cash By Hand Mehmood Anwar', '03366666739', 'Mehmood anwer', 0, '2023-01-11 00:34:57', '2023-01-11 00:34:57'),
(13, 3, 'Cash By Hand Ahmar Mehmood', '03066666739', 'Ahmar Mahmood', 0, '2023-01-11 00:35:47', '2023-01-11 00:35:47'),
(14, 3, 'Cash By Hand Rizwan', '03066068859', 'Rizwan', 560, '2023-01-11 00:36:31', '2023-03-13 17:26:08'),
(15, 3, 'Cash By Hand Arslan Mehmood', '03136666739', 'Arslan Mehmood', 0, '2023-01-11 00:37:19', '2023-01-11 00:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hours_per_day` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_desc`, `created_at`, `updated_at`) VALUES
(1, 'SA Traders', 'Mr. Shahid (Multan)', '2023-01-02 03:47:11', '2023-01-02 03:47:11'),
(3, 'Hydrogig', 'Mr. Adrees Qureshi  ( LHR )', '2023-01-02 03:48:21', '2023-01-02 03:48:21'),
(4, 'Aqua Zoom', 'Mr. Mubashir (LHR)', '2023-01-02 03:49:49', '2023-01-02 03:49:49'),
(5, 'Water Mark', 'Mr.Madni (LHR)', '2023-01-02 03:50:54', '2023-01-02 03:50:54'),
(6, 'Flow Matic', 'Mr.Waseem (LHR)', '2023-01-02 03:51:46', '2023-01-02 03:51:46'),
(7, 'Max Flow', 'Mr. Qasim (LHR)', '2023-01-02 03:52:46', '2023-01-02 03:52:46'),
(8, 'Ali Haneef Traders', 'Mr. Baba Ali (LHR)', '2023-01-02 03:53:36', '2023-01-02 03:53:36'),
(9, 'Plasma Water', 'Mr. Khawaja Tanveer (LHR)', '2023-01-02 03:54:31', '2023-01-02 03:54:31'),
(10, 'Commercial Scientific Store', 'Mr. Mushtaq (FSD)', '2023-01-02 03:56:38', '2023-01-02 03:56:38'),
(11, 'China', 'China', '2023-01-02 04:23:29', '2023-01-02 04:23:29'),
(12, 'Pakistan', 'Pakistan', '2023-01-02 04:23:45', '2023-01-02 04:23:45'),
(13, 'Vietnam', 'Vietnam', '2023-01-02 04:24:01', '2023-01-02 04:24:01'),
(14, 'USA', 'USA', '2023-01-02 04:24:16', '2023-01-02 04:24:16'),
(15, 'Tia-wan', 'Tia-wan', '2023-01-02 04:25:00', '2023-01-02 04:25:00'),
(16, 'Korea', 'Korea', '2023-01-02 04:25:39', '2023-01-02 04:25:39'),
(17, 'Srilanka', 'Srilanka', '2023-01-02 04:27:54', '2023-01-02 04:27:54'),
(18, 'Hong Kong', 'Hong Kong', '2023-01-02 04:28:25', '2023-01-02 04:28:25'),
(19, 'Japan', 'Japan', '2023-01-09 16:39:54', '2023-01-09 16:39:54'),
(20, 'Germany', 'Germany', '2023-01-09 16:51:00', '2023-01-09 16:51:00'),
(21, 'CNP', 'Laiqu Ahmad', '2023-01-09 18:07:47', '2023-01-09 18:07:47'),
(22, 'United Water Tank', 'Malik Adnan', '2023-01-10 00:04:34', '2023-01-10 00:04:34'),
(23, 'Aljannat Water Tank', 'Umar', '2023-01-10 00:05:08', '2023-01-10 00:05:08'),
(24, 'PUREWATER M&SON\'s', 'Mehmood Anwar', '2023-01-14 11:26:01', '2023-01-14 11:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` varchar(900) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_code`, `category_desc`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Filter', '01', 'It is used to Filter Water', '2023-01-02 03:29:59', '2023-01-02 03:29:59', 3),
(2, 'Filter Housing', '02', 'Filter Casing', '2023-01-02 03:30:36', '2023-01-02 03:30:36', 3),
(3, 'Filter Housing Plate', '03', 'Filter Housing Stand Frame', '2023-01-02 03:31:02', '2023-01-02 03:31:02', 3),
(4, 'Membrane', '04', 'It is used to Separate Salt into Water', '2023-01-02 03:31:33', '2023-01-02 03:31:56', 3),
(5, 'Membrane Casing', '05', 'Casing Of Membrane', '2023-01-02 03:32:31', '2023-01-02 03:32:31', 3),
(6, 'Vessel', '06', 'Block Heavy Particles of Salty Water.', '2023-01-02 03:33:19', '2023-01-02 03:33:19', 3),
(7, 'Vessel Media', '07', 'Block Heavy  Particles of Water', '2023-01-02 03:34:08', '2023-01-02 03:34:08', 3),
(8, 'Multi Port Wall', '08', 'Wall of Vessel', '2023-01-02 03:34:29', '2023-01-02 03:34:29', 3),
(9, 'UV', '09', 'Kill Bacteria In the Water', '2023-01-02 03:34:50', '2023-01-02 03:34:50', 3),
(10, 'PVC Fitting', '10', 'Pipe Fiting', '2023-01-02 03:35:31', '2023-01-02 03:35:31', 3),
(11, 'Flexible Pipe', '11', 'Blending Pipe and pressure gauge', '2023-01-02 03:36:01', '2023-01-02 03:36:01', 3),
(12, 'Flow Meter', '12', 'Use to Check The Flow OF Water', '2023-01-02 03:36:24', '2023-01-02 03:36:24', 3),
(13, 'TDS Meter', '13', 'Use to check the TDS of  Water', '2023-01-02 03:36:52', '2023-01-02 03:36:52', 3),
(15, 'PH Meter', '14', 'Use to check PH Value of Water', '2023-01-02 03:37:41', '2023-01-02 03:37:41', 3),
(16, 'Pressure Gauge', '15', 'Use to Measure the pressure of Water', '2023-01-02 03:38:18', '2023-01-02 03:38:18', 3),
(17, 'Steel Pipe', '16', 'Use to Build Structure Of  Plant and Others', '2023-01-02 03:39:13', '2023-01-02 03:39:13', 3),
(18, 'Strainer', '17', 'Use end of Top & Bottom of Mutli-Port Wall', '2023-01-02 03:40:01', '2023-01-02 03:40:01', 3),
(19, 'Chemical', '18', 'Use for Different Purposes in Different Criteria.', '2023-01-02 03:40:43', '2023-01-02 03:40:43', 3),
(20, 'Multi Stage Pump', '19', 'Use To Generate Pressure', '2023-01-02 03:41:33', '2023-01-02 03:41:33', 3),
(21, 'Booster Pump', '20', 'Use to Boost Water', '2023-01-02 03:41:59', '2023-01-02 03:41:59', 3),
(22, 'Domestic RO Plant', '21', 'Domestic Plant', '2023-01-02 03:42:26', '2023-01-02 03:42:26', 3),
(23, 'Dosing Pump', '22', 'Dose Chemical in Product Water', '2023-01-02 03:43:12', '2023-01-02 03:43:12', 3),
(24, 'Ozone Generator', '23', 'Generate Ozone Gas', '2023-01-02 03:43:59', '2023-01-02 03:43:59', 3),
(25, 'Water Tank', '24', 'Use to Store Water', '2023-01-02 03:44:21', '2023-01-02 03:44:21', 3),
(27, 'Ro Plant', '22', 'Ro Plant Parts', '2023-01-09 13:41:42', '2023-01-09 13:41:42', 3),
(28, 'Pure Water Service', '23', 'Laboure Service', '2023-01-11 18:31:58', '2023-01-11 18:31:58', 3);

-- --------------------------------------------------------

--
-- Table structure for table `companysettings`
--

CREATE TABLE `companysettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NTN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Insta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companysettings`
--

INSERT INTO `companysettings` (`id`, `Name`, `Logo`, `NTN`, `Email`, `Phone`, `Whatsapp`, `Website`, `Insta`, `facebook`, `address`, `type`, `created_at`, `updated_at`) VALUES
(1, 'PURE WATER M&SON\'s', 'official.png', '2631771-7', 'Purewater69@gmail.com', '041-2573100', '0336-6666739', 'https://Purewater.com.pk/', 'https://www.intagram.com/purewater.com.pk', 'https://www.facebook.com/purewater.pk', '3S center plot no-46 college road samnabad Faisalabad', 'Official', '2022-12-03 05:16:13', '2023-01-11 01:22:50'),
(2, 'Water Care House', 'unofficial.jpeg', '234567', 'watercareeng@gmail.com', '03066666739', '03366666739', 'https://watercareeng.com.pk/', 'https://www.intagram.com/watercareengineening.com.pk', 'https://www.facebook.com/watercareengineening.pk', '3S center plot no-46 college road samnabad Faisalabad', 'Unofficial', '2022-12-17 12:08:11', '2023-03-13 17:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Name`, `Email`, `Phone`, `company`, `City`, `Address`, `Description`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Mr. Aftab', 'noemail@gmail.com', '03000223609', 'Kalash Pvt Ltd', 'Faisalabad', '117 JB Paharanj Dranjer Milat Town Faisalabad', 'Assistant Manager Of Kalash', '2023-01-02 12:10:18', '2023-01-02 12:10:18', 3),
(2, 'Mr.Shamshair', 'noemail@gmail.com', '03000223511', 'Kalash Dye House', 'Faisalabad', '117 JB Paharanj Dranjer Milat Town Faisalabad', 'Purchaser Of Kalash Dye House', '2023-01-02 12:15:26', '2023-01-03 05:37:05', 3),
(3, 'Mr. Naeem FSD', 'noemail@gmail.com', '03463307460', 'Imtiaz Mart', 'Faisalabad', 'Nashatabad Road Faisalabad', 'Mechanical Head  Of Imtiaz', '2023-01-02 12:23:51', '2023-01-03 05:37:29', 3),
(4, 'Mr.Naeem SG', 'noemail@gmail.com', '03463307460', 'Imtiaz Mart', 'Sarghodha', 'Mall of Sargodha, University Road Sargodha', 'Mechanical Head Of Imtiaz Mart', '2023-01-02 12:29:20', '2023-01-03 05:36:41', 3),
(5, 'Rose Chickes', 'RoseChickes@Gmail.com', '03000000000', 'rose Chickes', 'Chakwal', 'Chakwal', 'Chakwal Rose Chickes', '2023-01-14 11:34:48', '2023-01-14 11:34:48', 3),
(6, 'Lateef', 'noemail@gamil.com', '03000000000', 'Lateef', 'Faisalabad', 'Faisalabad', 'Faisalabad Lateef', '2023-01-14 16:58:49', '2023-01-14 17:10:49', 3),
(7, 'Mr Zafar Sargoda', 'Zafar@gmail.com', '03000000000', 'Mr Zafar', 'Sargoda', 'Sargoda', 'Mr Zafar Sargoda', '2023-01-16 12:10:57', '2023-01-16 12:10:57', 3),
(8, 'Jamia Masjid Sadeeq Akbar', 'noemail@gamil.com', '03457640003', 'Jamia masjid sadeeq akbar', 'mandi shah jeewna', 'mandi shah jeewna', 'mandi shah jeewna', '2023-01-29 18:58:48', '2023-01-29 18:58:48', 3),
(9, 'check', 'noemail@gamil.com', '03000000000', 'Local fsd', 'Faisalabad', 'Faisalabad', 'fsd', '2023-02-09 13:59:19', '2023-02-09 13:59:19', 3),
(10, 'Best water', 'noemail@gamil.com', '03000000000', 'Best water', 'Faisalabad', 'Jhang road Faisalabad', 'Faisalabad', '2023-02-09 14:00:59', '2023-02-09 14:00:59', 3),
(11, 'Mr. Tayyab', 'Aquablox@gamil.com', '03087065659', NULL, 'Faisalabad', 'Faisalabad', 'fsd', '2023-02-09 15:17:38', '2023-02-09 15:17:38', 3),
(12, 'M.Shahbaz Sahib', 'Noemail@gmail.com', '03000000000', NULL, 'Gojra', 'Gojra', 'Gojra', '2023-02-13 12:01:02', '2023-02-13 12:01:02', 3),
(13, 'Mr Ali', 'noemail@gamil.com', '03000000000', NULL, 'Faisalabad', 'Faisalabad', 'fsd', '2023-02-14 17:44:00', '2023-02-14 17:44:00', 3),
(14, 'sitara press', 'noemail@gmail.com', '03000000000', 'sitara press', 'fsd', 'fsd', 'fsd', '2023-03-13 17:10:37', '2023-03-13 17:10:37', 3),
(15, 'Mian Shahid', 'noemail@gmail.com', '03000000000', 'Mian Shahid', 'fsd', 'fsd', 'Mian Nasir wale ali housing', '2023-03-13 17:30:35', '2023-03-13 17:30:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Emp_FName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Emp_LName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Emp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Emp_Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Emp_Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hours_per_day` int(11) DEFAULT NULL,
  `emp_salary` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `Emp_FName`, `Emp_LName`, `Emp_phone`, `Emp_Email`, `Emp_Address`, `created_by`, `created_at`, `updated_at`, `hours_per_day`, `emp_salary`) VALUES
(1, 'Rizwan', 'Bota', '03066068859', 'RizwanBota@gmail.com', NULL, 3, '2023-01-11 01:24:19', '2023-01-11 01:24:19', 10, 31500),
(2, 'Usman', 'Mushtaq', '03120713209', 'Usmanmushtaq@gmail.com', NULL, 3, '2023-01-11 01:25:51', '2023-01-11 01:25:51', 10, 29500),
(3, 'Amir', 'w', '03000000000', 'amir@gmail.com', NULL, 3, '2023-01-11 01:26:32', '2023-01-11 01:26:32', 10, 28500),
(4, 'Adeel', 'H', '03036363788', 'Adeel@gmail.com', NULL, 3, '2023-01-11 01:27:45', '2023-01-11 01:27:45', 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(11) UNSIGNED NOT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` bigint(255) NOT NULL,
  `expense_subject` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `account_id`, `user_id`, `emp_id`, `expense_date`, `expense_amount`, `expense_subject`, `expense_description`, `created_at`, `updated_at`) VALUES
(26, 1, 3, 1, '01-01-2023', 3500, 'cirgat papa g', 'papa g', '2023-02-21 14:23:31', '2023-02-21 14:24:11'),
(27, 1, 3, 1, '01-01-2023', 7620, 'flowed switch and tap', 'work shop', '2023-02-21 14:26:48', '2023-02-21 14:26:48'),
(28, 1, 3, 1, '01-01-2023', 820, 'shopping bag and tap', 'work shop', '2023-02-21 14:27:37', '2023-02-21 14:27:37'),
(29, 1, 3, 1, '01-01-2023', 1800, 'biltty and auto rent', 'work shop', '2023-02-21 14:28:44', '2023-02-21 14:28:44'),
(30, 1, 3, 1, '01-01-2023', 250, 'rizwan petrol', 'rizwan petrol', '2023-02-21 14:29:40', '2023-02-21 14:29:40'),
(31, 1, 3, 2, '01-01-2023', 500, 'usaman petrol satyana', 'usman petrol', '2023-02-21 14:30:29', '2023-02-21 14:30:29'),
(32, 1, 3, 2, '01-01-2023', 200, 'usman khana', 'khana', '2023-02-21 14:31:08', '2023-02-21 14:31:08'),
(33, 1, 3, 1, '01-01-2023', 150, 'set sleep', 'work shop', '2023-02-21 14:31:53', '2023-02-21 14:31:53'),
(34, 1, 3, 1, '02-01-2023', 160, 'rizwan petrol', 'rizwan petrol', '2023-02-21 14:32:33', '2023-02-21 14:32:33'),
(35, 1, 3, 1, '03-01-2023', 250, 'electric thing asgar sab', 'electric for work shop', '2023-02-21 14:34:28', '2023-02-21 14:34:28'),
(36, 1, 3, 1, '03-01-2023', 360, 'rawal bolt 3mm 12 piece', 'work shop', '2023-02-21 14:38:18', '2023-02-21 14:38:37'),
(37, 1, 3, 1, '03-01-2023', 200, 'biltty', 'work shop', '2023-02-21 14:40:39', '2023-02-21 14:40:39'),
(38, 1, 3, 1, '03-01-2023', 300, 'rizwan petrol', 'rizwan petrol', '2023-02-21 14:41:18', '2023-02-21 14:41:18'),
(39, 1, 3, 1, '03-01-2023', 460, 'tissue roll', 'work shop', '2023-02-21 14:42:09', '2023-02-21 14:42:09'),
(40, 1, 3, 1, '03-01-2023', 70, 'khana work shop', 'khana', '2023-02-21 14:43:09', '2023-02-21 14:43:09'),
(41, 1, 3, 4, '04-01-2023', 200, 'adeel petrol sabri darbar', 'adeel petrol', '2023-02-21 14:44:03', '2023-02-21 14:44:03'),
(42, 1, 3, 1, '04-01-2023', 1600, 'auto rent klash', 'auto rent', '2023-02-21 14:44:54', '2023-02-21 14:44:54'),
(43, 1, 3, 1, '04-01-2023', 20, 'bikari', 'work shop', '2023-02-21 14:45:41', '2023-02-21 14:45:41'),
(44, 1, 3, 1, '04-01-2023', 120, 'khana work shop', 'khana work shop', '2023-02-21 14:46:24', '2023-02-21 14:46:24'),
(45, 1, 3, 1, '05-01-2023', 250, 'rizwan petrol', 'rizwan petrol', '2023-02-21 14:47:03', '2023-02-21 14:47:03'),
(46, 1, 3, 3, '07-01-2023', 3000, 'bhai ahmar vist samundri and thana balak', 'vist bhai ahmar', '2023-02-21 14:48:37', '2023-02-21 14:48:37'),
(47, 1, 3, 1, '07-01-2023', 750, 'biltty', 'biltty for ro plant', '2023-02-21 14:49:26', '2023-02-21 14:49:26'),
(48, 1, 3, 1, '07-01-2023', 440, 'biscuit and tee', 'tee work shop', '2023-02-21 14:50:13', '2023-02-21 14:50:13'),
(49, 1, 3, 1, '07-01-2023', 80, 'berang grander', 'work shop', '2023-02-21 14:51:16', '2023-02-21 14:51:16'),
(50, 1, 3, 1, '07-01-2023', 130, 'khana work shop', 'khana work shop', '2023-02-21 14:51:58', '2023-02-21 14:51:58'),
(51, 1, 3, 1, '07-01-2023', 100, 'tee lipton', 'tee', '2023-02-21 14:52:41', '2023-02-21 14:52:41'),
(52, 1, 3, 1, '07-01-2023', 30, 'soap for bartan', 'work shop personal', '2023-02-21 14:53:49', '2023-02-21 14:53:49'),
(53, 1, 3, 1, '05-01-2023', 100, 'khana work shop', 'khana work shop', '2023-02-21 14:54:37', '2023-02-21 14:56:01'),
(54, 1, 3, 4, '05-01-2023', 170, 'adeel khana', 'adeel khana', '2023-02-21 14:55:41', '2023-02-21 14:55:41'),
(55, 1, 3, 4, '07-01-2023', 250, 'adeel petrol 2 days', 'adeel petrol', '2023-02-21 14:56:55', '2023-02-21 14:56:55'),
(56, 1, 3, 1, '08-01-2023', 400, 'cirgat papa g', 'cirgat', '2023-02-21 15:06:08', '2023-02-21 15:06:08'),
(57, 1, 3, 1, '08-01-2023', 270, 'tee milk', 'tee milk', '2023-02-21 15:06:53', '2023-02-21 15:06:53'),
(58, 1, 3, 2, '08-01-2023', 1000, 'usman advance', 'usman advance', '2023-02-21 15:07:51', '2023-02-21 15:07:51'),
(59, 1, 3, 1, '08-01-2023', 300, 'rizwan petrol', 'rizwan petrol', '2023-02-21 15:08:48', '2023-02-21 15:08:48'),
(60, 1, 3, 1, '21-02-2023', 50, 'pan', 'pan papa g', '2023-02-21 15:56:57', '2023-02-21 15:56:57'),
(61, 1, 3, 1, '08-01-2023', 250, 'khana work shop', 'khana', '2023-02-21 15:57:34', '2023-02-21 15:57:34'),
(62, 1, 3, 4, '08-01-2023', 100, 'adeel petrol', 'adeel petrol', '2023-02-21 15:58:16', '2023-02-21 15:58:16'),
(63, 1, 3, 1, '08-01-2023', 6000, 'tariq sab wall bill pay', 'work shop', '2023-02-21 15:59:16', '2023-02-21 15:59:16'),
(64, 1, 3, 1, '08-01-2023', 60000, 'javeed steel bill pay', 'javeed steel', '2023-02-21 16:00:08', '2023-02-21 16:00:08'),
(65, 1, 3, 1, '08-01-2023', 2000, 'rashan', 'work shop', '2023-02-21 16:00:41', '2023-02-21 16:00:41'),
(66, 1, 3, 1, '08-01-2023', 200, 'billty', 'billty work shop', '2023-02-21 16:01:19', '2023-02-21 16:01:19'),
(67, 1, 3, 1, '09-01-2023', 3950, 'HCL cans', 'work shop', '2023-02-21 16:02:03', '2023-02-21 16:02:03'),
(68, 1, 3, 1, '09-01-2023', 280, 'milk', 'tee', '2023-02-21 16:02:33', '2023-02-21 16:02:33'),
(69, 1, 3, 2, '09-01-2023', 250, 'usman petrol', 'usman petrol', '2023-02-21 16:03:19', '2023-02-21 16:03:19'),
(70, 1, 3, 3, '09-01-2023', 1000, 'bhai ahmar petrol', 'bhai ahmar petrol', '2023-02-21 16:04:05', '2023-02-21 16:04:05'),
(71, 1, 3, 1, '09-01-2023', 15150, 'riaz dia maker', 'work shop', '2023-02-21 18:18:39', '2023-02-21 18:18:39'),
(72, 1, 3, 1, '09-01-2023', 500, 'molvi ko plate', 'work shop', '2023-02-21 18:19:39', '2023-02-21 18:19:39'),
(73, 1, 3, 4, '09-01-2023', 9500, 'adeel tankhoaa', 'adeel tankhooa', '2023-02-21 18:20:39', '2023-02-21 18:20:39'),
(74, 1, 3, 1, '09-01-2023', 7000, 'malii tankhoaa', 'malii tankhaoo', '2023-02-21 18:21:28', '2023-02-21 18:21:28'),
(75, 1, 3, 3, '10-01-2023', 500, 'bhai ahmar petrol', 'bhai ahmar petrol', '2023-02-21 18:22:15', '2023-02-21 18:22:15'),
(76, 1, 3, 1, '10-01-2023', 100, 'plate band', 'work shop', '2023-02-21 18:22:53', '2023-02-21 18:22:53'),
(77, 1, 3, 1, '10-01-2023', 420, 'tee milk', 'tee milk', '2023-02-21 18:23:51', '2023-02-21 18:23:51'),
(78, 1, 3, 1, '10-02-2023', 690, 'gas 3 kg for tee', 'tee', '2023-02-21 18:24:32', '2023-02-21 18:24:32'),
(79, 1, 3, 2, '10-01-2023', 1000, 'usman vist mamo kajan', 'vist', '2023-02-21 18:25:41', '2023-02-21 18:25:41'),
(80, 1, 3, 1, '10-01-2023', 39300, 'mehmood sab cash recived', 'mehmood sab', '2023-02-21 18:26:41', '2023-02-21 18:26:41'),
(81, 1, 3, 1, '11-01-2023', 300, 'rizwan petrol', 'rizwan petrol', '2023-02-21 18:27:43', '2023-02-21 18:27:43'),
(82, 1, 3, 1, '11-01-2023', 620, 'room and mosquito spray', 'work shop', '2023-02-21 18:29:00', '2023-02-21 18:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `quote_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_sales`
--

CREATE TABLE `invoice_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifiction_id` int(11) NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `user_id`, `plant_name`, `date`, `specifiction_id`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 3, '1500 GPD Ro Plant', '10-01-2023', 1, '392580', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(2, 3, '3000 GPD Ro Plant', '14-01-2023', 4, '463730', '2023-01-14 13:19:06', '2023-01-29 18:59:21'),
(3, 3, 'Ro Plant Parts', '14-01-2023', 6, '239690', '2023-01-14 17:16:04', '2023-01-14 17:17:17'),
(4, 3, '3000 GPD Ro Plant', '14-01-2023', 3, '428940', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(5, 3, '1 Ton Ro Plant', '16-01-2023', 6, '767260', '2023-01-16 11:55:43', '2023-01-16 12:18:42'),
(6, 3, '2 Ton Ro Plant', '14-02-2023', 7, '540050', '2023-02-14 17:53:12', '2023-02-14 17:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `plant_products`
--

CREATE TABLE `plant_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plant_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plant_products`
--

INSERT INTO `plant_products` (`id`, `plant_id`, `product_id`, `amount`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 260, '3', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(2, 1, 25, 950, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(3, 1, 32, 42000, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(4, 1, 43, 4200, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(5, 1, 60, 2000, '3', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(6, 1, 61, 14500, '2', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(7, 1, 67, 1800, '2', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(8, 1, 72, 750, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(9, 1, 73, 750, '2', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(10, 1, 76, 4000, '2', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(11, 1, 82, 12500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(12, 1, 88, 650, '3', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(13, 1, 90, 7500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(14, 1, 91, 2800, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(15, 1, 92, 2500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(16, 1, 95, 950, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(17, 1, 96, 4800, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(18, 1, 99, 9000, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(19, 1, 102, 1500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(20, 1, 109, 19500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(21, 1, 134, 18000, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(22, 1, 154, 2800, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(23, 1, 155, 14500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(24, 1, 215, 35000, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(25, 1, 214, 40000, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(26, 1, 216, 28000, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(27, 1, 149, 94500, '1', '2023-01-10 18:02:18', '2023-01-10 18:02:18'),
(37, 3, 1, 490, '1', '2023-01-14 17:17:17', '2023-01-14 17:17:17'),
(38, 3, 108, 25000, '1', '2023-01-14 17:17:17', '2023-01-14 17:17:17'),
(39, 3, 39, 140000, '1', '2023-01-14 17:17:17', '2023-01-14 17:17:17'),
(40, 3, 40, 28000, '1', '2023-01-14 17:17:17', '2023-01-14 17:17:17'),
(41, 3, 84, 42000, '1', '2023-01-14 17:17:17', '2023-01-14 17:17:17'),
(42, 3, 43, 4200, '1', '2023-01-14 17:17:17', '2023-01-14 17:17:17'),
(43, 4, 7, 260, '4', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(44, 4, 32, 42000, '2', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(45, 4, 43, 4200, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(46, 4, 60, 2000, '4', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(47, 4, 61, 14500, '2', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(48, 4, 68, 2800, '2', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(49, 4, 72, 750, '2', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(50, 4, 73, 750, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(51, 4, 76, 4000, '2', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(52, 4, 82, 12500, '2', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(53, 4, 88, 650, '4', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(54, 4, 91, 2800, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(55, 4, 92, 2500, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(56, 4, 90, 7500, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(57, 4, 95, 950, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(58, 4, 99, 9000, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(59, 4, 102, 1500, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(60, 4, 104, 2500, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(61, 4, 105, 5500, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(62, 4, 137, 50000, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(63, 4, 147, 85000, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(64, 4, 216, 30000, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(65, 4, 215, 32000, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(66, 4, 214, 30000, '1', '2023-01-14 19:05:03', '2023-01-14 19:05:03'),
(187, 5, 1, 490, '4', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(188, 5, 55, 4000, '4', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(189, 5, 86, 850, '4', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(190, 5, 90, 7500, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(191, 5, 91, 2800, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(192, 5, 92, 2500, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(193, 5, 95, 950, '3', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(194, 5, 99, 9000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(195, 5, 109, 19500, '3', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(196, 5, 140, 58000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(197, 5, 151, 110000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(198, 5, 154, 2800, '3', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(199, 5, 155, 14500, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(200, 5, 156, 26500, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(201, 5, 204, 2200, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(202, 5, 200, 6500, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(203, 5, 96, 4800, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(204, 5, 63, 19500, '2', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(205, 5, 68, 2800, '2', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(206, 5, 72, 750, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(207, 5, 73, 750, '2', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(208, 5, 76, 4000, '2', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(209, 5, 36, 94000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(210, 5, 45, 7500, '2', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(211, 5, 84, 42000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(212, 5, 215, 65000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(213, 5, 216, 40000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(214, 5, 214, 50000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(215, 5, 218, 29000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(216, 5, 217, 42000, '1', '2023-01-16 12:26:13', '2023-01-16 12:26:13'),
(241, 2, 216, 40000, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(242, 2, 215, 35000, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(243, 2, 218, 29000, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(244, 2, 43, 4200, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(245, 2, 67, 1800, '2', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(246, 2, 72, 750, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(247, 2, 73, 750, '2', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(248, 2, 88, 650, '3', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(249, 2, 60, 2000, '3', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(250, 2, 7, 260, '3', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(251, 2, 61, 14500, '2', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(252, 2, 76, 4000, '2', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(253, 2, 91, 1400, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(254, 2, 92, 2500, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(255, 2, 90, 3750, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(256, 2, 150, 110500, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(257, 2, 32, 42000, '2', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(258, 2, 82, 12500, '2', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(259, 2, 109, 19500, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(260, 2, 154, 2800, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(261, 2, 155, 14500, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(262, 2, 214, 40000, '1', '2023-01-29 18:59:21', '2023-01-29 18:59:21'),
(263, 6, 36, 94000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(264, 6, 43, 4200, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(265, 6, 55, 4000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(266, 6, 66, 30500, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(267, 6, 69, 3000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(268, 6, 72, 750, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(269, 6, 73, 750, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(270, 6, 80, 18000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(271, 6, 85, 60000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(272, 6, 90, 7500, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(273, 6, 91, 2800, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(274, 6, 92, 2500, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(275, 6, 95, 950, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(276, 6, 96, 4800, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(277, 6, 109, 19500, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(278, 6, 137, 50000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(279, 6, 147, 85000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(280, 6, 154, 2800, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(281, 6, 218, 29000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(282, 6, 216, 40000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(283, 6, 215, 40000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12'),
(284, 6, 214, 40000, '1', '2023-02-14 17:53:12', '2023-02-14 17:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` bigint(20) UNSIGNED NOT NULL,
  `product_desc` varchar(900) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `cate_id`, `size_id`, `brand_id`, `product_unit`, `product_SKU`, `product_qty`, `product_desc`, `product_price`, `created_at`, `updated_at`, `product_img`, `created_by`) VALUES
(1, 'Filter PPF (20\" J)', 1, 1, 1, 'Piece', '50', 216, 'Filter  (20\" J)  PPF', 490, '2023-01-02 12:45:10', '2023-01-02 12:45:10', 'ppf1000gram.jpg', 3),
(2, 'Filter PPF (20\" J) Premium', 1, 3, 1, 'Liter', '10', 0, 'Filter PPF  (20\" J) Premium', 800, '2023-01-02 12:48:47', '2023-01-02 12:48:47', 'ppf1000gram.jpg', 3),
(3, 'Filter CTO (20\" J)', 1, 2, 1, 'Piece', '5', 1, 'CTO (20\" J) China', 1800, '2023-01-02 12:51:49', '2023-01-02 12:51:49', 'cto jumbo.jpg', 3),
(6, 'Filter  20 inch ( J )', 1, 8, 4, 'Piece', '5', 2, 'Filter  20 inch ( J ) GAC', 2800, '2023-01-05 14:32:21', '2023-01-05 14:32:21', '61APOSkYqqS._SL1500_.jpg', 3),
(7, 'Filter PPF (20\" Slim)', 1, 74, 1, 'Piece', '25', 118, 'Filter  20 \" ( Slim ) PPF Aqua Zoom', 260, '2023-01-05 14:37:19', '2023-01-05 14:37:19', 'download.jpg', 3),
(8, 'Filter CTO 20\"(Slim)', 1, 2, 4, 'Piece', '5', 18, 'Filter CTO 20\"(Slim) Aqua Zoom', 490, '2023-01-05 14:42:34', '2023-01-05 14:42:34', 'cto.jpg', 3),
(9, 'Filter GAC (20\'\' Slim)', 1, 8, 4, 'Piece', '5', 13, 'Filter GAC (20\'\' Slim)', 510, '2023-01-05 14:53:58', '2023-01-05 14:53:58', 'gac.jpg', 3),
(10, 'Filter PPY ( 20\'\' Slim)', 1, 10, 4, 'Piece', '5', 18, 'Filter PPY ( 20\'\' Slim)', 650, '2023-01-05 15:04:06', '2023-01-05 15:04:06', 'ppy_slim.jpg', 3),
(11, 'Filter Absolute (20\" Slim)', 1, 9, 9, 'Piece', '3', 1, 'Filter Absolute (20\" Slim)', 2500, '2023-01-05 15:06:37', '2023-01-05 15:06:37', 'Filter Absolute (20 Slim).jpg', 3),
(12, 'Filter PPF (20\"Sim)', 1, 75, 1, 'Piece', '25', 8, 'Filter PPF (20\"Sim) Vietnam', 350, '2023-01-05 15:14:19', '2023-01-05 15:14:19', 'Filter PPF (20Sim).jpg', 3),
(13, 'Filter CTO 20\"(Slim) Vietnam', 1, 6, 1, 'Piece', '10', 19, 'Filter CTO 20\"(Slim) Vietnam', 790, '2023-01-05 15:17:18', '2023-01-05 15:17:18', 'cto.jpg', 3),
(14, 'Filter GAC (20\'\' Slim) Vietnam', 1, 77, 1, 'Piece', '10', 18, 'Filter GAC (20\'\' Slim) Vietnam', 790, '2023-01-05 15:19:28', '2023-01-05 15:19:28', 'gac.jpg', 3),
(15, 'Filter PPF (10\"Sim)', 1, 74, 4, 'Piece', '50', 95, 'Filter PPF (10\"Sim)', 100, '2023-01-05 15:31:02', '2023-01-05 15:31:02', 'Filter PPF (10\'\'Slim).jpg', 3),
(16, 'Filter CTO (10\"Slim)', 1, 2, 4, 'Piece', '25', 27, 'Filter CTO (10\"Slim)', 300, '2023-01-05 15:32:56', '2023-01-05 15:32:56', 'Filter CTO (10\'\'Slim).jpg', 3),
(17, 'Filter GAC (10\'\' Slim)', 1, 8, 4, 'Piece', '25', 28, 'Filter GAC (10\'\' Slim)', 300, '2023-01-05 15:34:26', '2023-01-05 15:34:26', 'Filter GAC (10Slim).jpg', 3),
(18, 'Filter PPY (10\'\' Slim)', 1, 10, 4, 'Piece', '5', 0, 'Filter PPY (10\'\' Slim)', 320, '2023-01-05 15:36:32', '2023-01-05 15:36:32', 'Filter PPY (10\' Slim).jpg', 3),
(19, 'Filter Absolute (10\"Slim)', 1, 9, 11, 'Piece', '5', 1, 'Filter Absolute (10\"Slim)', 1050, '2023-01-05 15:40:11', '2023-01-05 15:40:11', 'absolute filter 10 inch.jpg', 3),
(20, 'Filter PPF (10\"Slim) Vientnam', 1, 75, 1, 'Piece', '20', 51, 'Filter PPF (10\"Sim) Vientnam', 240, '2023-01-05 15:47:10', '2023-01-05 15:47:10', 'PPF Vientnam filter 10 inch.jpg', 3),
(21, 'Filter CTO (10\"Slim) Vientnam', 1, 6, 1, 'Piece', '20', 15, 'Filter CTO (10\"Slim) Vientnam', 600, '2023-01-05 15:49:05', '2023-01-05 15:49:05', 'Filter CTO (10\'\'Slim).jpg', 3),
(22, 'Filter GAC (10\'\'Slim) Vientnam', 1, 77, 1, 'Piece', '20', 48, 'Filter GAC (10\'\'Slim) Vientnam', 600, '2023-01-05 15:53:26', '2023-01-05 15:53:26', 'GAC Vientnam filter 10 inch.jpg', 3),
(23, 'Post Carbon Filter', 1, 78, 1, 'Piece', '5', 6, 'Post Carbon Filter Domestic RO Plant', 950, '2023-01-05 16:13:31', '2023-01-05 16:13:31', 'post-CarbonFilter.jpg', 3),
(24, 'Mineral Filter', 1, 78, 1, 'Piece', '5', 18, 'Mineral Filter Domestic RO Plant', 950, '2023-01-05 16:14:44', '2023-01-05 16:14:44', 'mineral water filter.jpg', 3),
(25, 'Low Pressure Switch', 22, 63, 1, 'Piece', '5', 1, 'Domestic Part', 950, '2023-01-05 16:23:44', '2023-01-05 16:23:44', 'low pressure switch.jpg', 3),
(26, 'High Pressure Switch', 22, 63, 1, 'Piece', '5', 1, 'Domestic Part', 950, '2023-01-05 16:24:51', '2023-01-05 16:24:51', 'high pressure switch.jpg', 3),
(27, 'Domestic RO Pump', 22, 63, 1, 'Piece', '3', 1, 'Domestic Part', 4200, '2023-01-05 16:27:18', '2023-01-05 16:27:18', 'RO pump domestic.jpg', 3),
(28, 'Membrane( Aqua Thai )', 4, 79, 5, 'Piece', '4', 1, 'Membrane( Aqua Thai ) Part', 3200, '2023-01-05 16:30:26', '2023-01-05 16:30:26', 'membrane_aqua_thai.jpg', 3),
(29, 'Membrane( HJC )', 4, 79, 1, 'Piece', '5', 0, 'Membrane( HJC ) Part', 5500, '2023-01-05 16:33:37', '2023-01-05 16:33:37', 'membrane hjc.jpg', 3),
(30, 'Membrane ( Hydro 10 )', 4, 79, 1, 'Piece', '5', 2, 'Membrane ( Hydro 10 ) Part', 3000, '2023-01-05 16:36:00', '2023-01-05 16:36:00', 'membrane_film-tech.jpg', 3),
(31, 'Membrane (200GPD)', 4, 79, 9, 'Piece', '2', 5, 'Membrane (200GPD) Part', 7500, '2023-01-05 16:38:40', '2023-01-05 16:38:40', '200 gpd membrane.jpg', 3),
(32, 'Membrane (4*40) Hydro-10', 4, 20, 1, 'Piece', '5', 2, 'Membrane (4*40) Hydro-10', 42000, '2023-01-05 16:46:22', '2023-01-05 16:46:22', 'Membrane (440) Hydro10.jpg', 3),
(33, 'Membrane (4*40) LG', 4, 21, 1, 'Piece', '2', 0, 'Membrane (4*40) LG', 58000, '2023-01-05 16:48:09', '2023-01-05 16:48:09', 'Membrane (440) LG.jpg', 3),
(34, 'Membrane (4*40) Torye', 4, 19, 1, 'Piece', '2', 0, 'Membrane (4*40) Torye', 60000, '2023-01-05 16:54:29', '2023-01-05 16:54:29', 'Membrane (440) Torey.jpg', 3),
(35, 'Membrane (4*40 )RTL', 4, 80, 1, 'Piece', '2', 0, 'Membrane (4*40 )RTL', 45000, '2023-01-05 16:59:08', '2023-01-05 16:59:08', 'Membrane (440) Hydro10.jpg', 3),
(36, 'Membrane 8*40(Hydro-10)', 4, 20, 1, 'Piece', '5', 0, 'Membrane 8*40(Hydro-10)', 94000, '2023-01-05 17:00:46', '2023-01-05 17:00:46', 'Membrane (8040) Hydro10.jpg', 3),
(37, 'Membrane 8*40 (RTL)', 4, 80, 1, 'Piece', '2', 1, 'Membrane 8*40 (RTL)', 98000, '2023-01-05 17:02:47', '2023-01-05 17:02:47', 'Membrane (8040) Hydro10.jpg', 3),
(38, 'Membrane (8*40) LG', 4, 21, 1, 'Piece', '1', 0, 'Membrane (8*40) LG', 108000, '2023-01-05 17:04:39', '2023-01-05 17:04:39', 'Membrane (8040) Hydro10.jpg', 3),
(39, 'Membrane (8*40) Torye', 4, 19, 1, 'Piece', '1', 1, 'Membrane (8*40) Torye', 140000, '2023-01-05 17:06:30', '2023-01-05 17:06:30', 'toray membrane 8x40.jpg', 3),
(40, 'Membrane (UF)4*40', 4, 81, 1, 'Piece', '1', 3, 'Membr(UF)4*40', 28000, '2023-01-05 17:14:46', '2023-01-05 17:14:46', 'ufmembrane440.jpg', 3),
(41, 'Filter PPF (30\" Slim)', 1, 74, 4, 'Piece', '30', 4, 'Filter PPF (30\" Slim)', 350, '2023-01-05 17:26:57', '2023-01-05 17:26:57', 'Filter PPF (20Sim).jpg', 3),
(42, 'Filter PPF (40\'\' Slim)', 1, 74, 4, 'Piece', '25', 32, 'Filter PPF (40\'\' Slim)', 490, '2023-01-05 17:29:35', '2023-01-05 17:29:35', 'Filter PPF (20Sim).jpg', 3),
(43, 'TDS Meter Online', 13, 42, 1, 'Piece', '5', 3, 'TDS Meter Online', 4200, '2023-01-05 17:33:26', '2023-01-05 17:33:26', 'TDS Meter Online.jpg', 3),
(44, 'Mi-TDS Meter Pen', 13, 43, 11, 'Piece', '10', 1, 'Mi-TDS Meter Pen', 3000, '2023-01-05 17:35:10', '2023-01-05 17:35:10', 'tds mi.png', 3),
(45, 'TDS Meter Online3in1', 13, 42, 9, 'Piece', '4', 3, 'TDS Meter Online3in1', 7500, '2023-01-05 17:58:49', '2023-01-05 17:58:49', '3in 1 TDS.jpg', 3),
(46, '6 Stage Hydro 10 Ro Plant', 22, 63, 1, 'Piece', '2', 2, '6 Stage Hydro 10 Ro Plant', 30000, '2023-01-06 14:42:20', '2023-01-06 14:42:20', 'noimage.png', 3),
(47, '7 Stage Ro Plant Hydro 10', 22, 63, 1, 'Piece', '2', 1, '7 Stage Ro Plant Hydro 10', 33000, '2023-01-06 14:45:39', '2023-01-06 14:45:39', 'hydro 10 ro plantnew.jpg', 3),
(48, '4 IN 1 Ro Plant', 22, 63, 1, 'Piece', '1', 0, '3 IN 1 Ro Plant', 40000, '2023-01-06 14:48:48', '2023-01-06 14:48:48', '3in1 ro plant.png', 3),
(49, '7 Stage Water Mark', 22, 63, 1, 'Piece', '2', 1, '7 Stage Water Mark', 32000, '2023-01-07 19:46:33', '2023-01-07 19:46:33', 'water mark 7 stage ro plant.jpg', 3),
(50, 'RO Plant Hydro 10 Pump 100 GPD', 22, 63, 1, 'Piece', '2', 0, 'RO Plant Hydro 10 Pump', 4200, '2023-01-07 19:53:36', '2023-01-07 19:53:36', '10 gpd pump.jpg', 3),
(51, 'RO Plant TAP', 22, 63, 1, 'Piece', '2', 0, 'RO Plant TAP', 1200, '2023-01-07 19:59:24', '2023-01-07 19:59:24', 'ro plant tap.jpg', 3),
(52, 'Ro Plant Flow Stick', 22, 63, 1, 'Piece', '05', 5, 'Ro Plant Flow Stick', 950, '2023-01-07 20:02:49', '2023-01-07 20:02:49', 'download (1).jpg', 3),
(53, '24 Volt Power Supply', 22, 63, 1, 'Piece', '03', 6, '24 Volt Power Supply', 950, '2023-01-07 20:05:13', '2023-01-07 20:05:13', 'download (2).jpg', 3),
(54, '10 Inch Filter Housing', 22, 63, 1, 'Piece', '3', 3, '10 Inch Filter Housing', 950, '2023-01-07 20:07:33', '2023-01-07 20:07:33', 'download (3).jpg', 3),
(55, '20 inch Jumbo Filter Housing', 2, 13, 1, 'Piece', '04', 5, '20 inch Jumbo Filter Housing', 4000, '2023-01-07 20:10:34', '2023-01-07 20:10:34', 'download (4).jpg', 3),
(56, '20 inch Jumbo Filter Housing', 2, 14, 5, 'Piece', '04', 2, '20 inch Jumbo Filter Housing', 4300, '2023-01-07 20:13:29', '2023-01-07 20:13:29', '20 inch white filter housing jumbo.jpg', 3),
(57, '20 inch Jumbo Filter Housing CCK', 2, 13, 9, 'Piece', '04', 0, '20 inch Jumbo Filter Housing CCK', 4800, '2023-01-07 20:17:12', '2023-01-07 20:17:12', 'cck filter housing 20 inch jumbo.jpg', 3),
(58, '20 inch Jumbo Filter Housing 1.5\" size', 2, 13, 1, 'Piece', '04', 1, '20 inch Jumbo Filter Housing 1.5\" size', 4200, '2023-01-07 20:19:20', '2023-01-07 20:19:20', 'cck filter housing 20 inch jumbo.jpg', 3),
(59, 'CCK 20 inch Slim Filter Housing', 2, 13, 9, 'Piece', '04', 0, 'CCK 20 inch Slim Filter Housing', 3800, '2023-01-07 20:21:00', '2023-01-07 20:21:00', 'download (5).jpg', 3),
(60, '20 inch Slim Filter Housing', 2, 13, 1, 'Piece', '04', 2, '20 inch Slim Filter Housing', 2000, '2023-01-07 20:23:37', '2023-01-07 20:23:37', '20 inch SLIM filter housing.jpg', 3),
(61, '10x54 neak 2.5 inch hydro 10', 6, 26, 1, 'Piece', '02', 0, '10x54 neak 2.5 inch hydro 10', 14500, '2023-01-07 20:26:45', '2023-01-07 20:26:45', 'download (6).jpg', 3),
(62, '10x54 neak 2.5 inch Pentair', 6, 25, 1, 'Piece', '02', 1, '10x54 neak 2.5 inch Pentair', 19500, '2023-01-07 20:28:37', '2023-01-07 20:28:37', 'download (7).jpg', 3),
(63, '13x54 2.5 Neak hydro 10', 6, 26, 1, 'Piece', '02', 1, '13x54 2.5 Neak hydro 10', 19500, '2023-01-07 20:30:49', '2023-01-07 20:30:49', 'download (8).jpg', 3),
(64, '13x54 2.5 Neak pentair', 6, 25, 1, 'Piece', '2', 1, '13x54 2.5 Neak pentair', 26900, '2023-01-07 20:33:35', '2023-01-07 20:33:35', 'download (9).jpg', 3),
(65, '16x65 2.5\" Neak Hydro 10', 6, 26, 1, 'Piece', '2', 2, '16x65 2.5\" Neak Hydro 10', 28500, '2023-01-07 20:37:29', '2023-01-07 20:37:29', 'images.jpg', 3),
(66, '16x65 4\" Neak Hydro 10', 6, 26, 1, 'Piece', '02', 0, '16x65 4\" Neak Hydro 10', 30500, '2023-01-07 20:40:20', '2023-01-07 20:40:20', 'download (10).jpg', 3),
(67, '5 GPM Flow Meter', 12, 40, 1, 'Piece', '04', 4, '5 GPM Flow Meter', 1800, '2023-01-07 20:45:44', '2023-01-07 20:45:44', 'download (11).jpg', 3),
(68, '10 GPM Flow Meter', 12, 40, 1, 'Piece', '04', 2, '10 GPM Flow Meter', 2800, '2023-01-07 20:47:58', '2023-01-07 20:47:58', 'download (12).jpg', 3),
(69, '20 GPM Flow Meter', 12, 40, 1, 'Piece', '04', 3, '20 GPM Flow Meter', 3000, '2023-01-07 20:49:37', '2023-01-07 20:49:37', 'download (13).jpg', 3),
(70, '35 GPM Flow Meter', 12, 40, 1, 'Piece', '02', 1, '35 GPM Flow Meter', 4200, '2023-01-07 20:51:37', '2023-01-07 20:51:37', 'download (14).jpg', 3),
(71, '40 GPM Flow Meter', 12, 40, 1, 'Piece', '2', 0, '40 GPM Flow Meter', 4200, '2023-01-07 20:53:09', '2023-01-07 20:53:09', '51HpIh6U7vL._SL1100_.jpg', 3),
(72, '150 PSI Presure Guage Back Connection', 16, 46, 1, 'Piece', '05', 12, '150 PSI Presure Guage', 750, '2023-01-07 20:57:40', '2023-01-07 20:57:40', 'images 44.jpg', 3),
(73, '350 PSI Pressure Guage Back Connection', 16, 46, 1, 'Piece', '05', 15, '350 PSI Presure Guage', 750, '2023-01-07 20:59:41', '2023-01-07 20:59:41', 'images 44.jpg', 3),
(74, '150 PSI Presure Guage Bottom Connection', 16, 46, 1, 'Piece', '05', 2, '150 PSI Presure Guage Bottom Connection', 1200, '2023-01-08 13:30:47', '2023-01-08 13:30:47', 'images 45.jpg', 3),
(75, '350 PSI Pressure Guage Bottom Connection', 16, 46, 1, 'Piece', '05', 1, '350 PSI Pressure Guage Bottom Connection', 1200, '2023-01-08 13:32:36', '2023-01-08 13:32:36', 'images 45.jpg', 3),
(76, 'Manual Multiport Value 10x54/13x53', 8, 31, 1, 'Piece', '02', 0, 'Manual Multiport Value 10x54/13x53', 4000, '2023-01-08 13:39:19', '2023-01-08 13:39:19', 'download (16).jpg', 3),
(77, 'Digital Multiport Value 10x54/13x53', 8, 30, 1, 'Piece', '02', 0, 'Digital Multiport Value 10x54/13x53', 19500, '2023-01-08 13:41:50', '2023-01-08 13:41:50', 'images (1).jpg', 3),
(78, 'Manual Multiport Value 16x65 2.5\" Neak', 8, 31, 1, 'Piece', '02', 2, 'Manual Multiport Value 16x65 2.5\" Neak', 4000, '2023-01-08 13:44:29', '2023-01-08 13:44:29', 'images (2).jpg', 3),
(79, 'Digital Multiport Value 16x65 2.5\" Neak', 8, 30, 1, 'Piece', '02', 8, 'Digital Multiport Value 16x65 2.5\" Neak', 19500, '2023-01-08 13:46:54', '2023-01-08 13:46:54', 'images (3).jpg', 3),
(80, 'Manual Multiport Value 16x65 4\" Neak', 8, 31, 1, 'Piece', '02', 4, 'Manual Multiport Value 16x65 4\" Neak', 18000, '2023-01-08 14:03:52', '2023-01-08 14:03:52', 'images (2).jpg', 3),
(81, 'Digital Multiport Value 16x65 4\" Neak', 8, 30, 1, 'Piece', '02', 0, 'Digital Multiport Value 16x65 4\" Neak', 50000, '2023-01-08 14:05:29', '2023-01-08 14:05:29', 'images (3).jpg', 3),
(82, '4x40 Singel Membrane Casing', 5, 23, 1, 'Piece', '02', 2, '4x40 Singel Membrane Casing', 12500, '2023-01-08 14:14:35', '2023-01-08 14:14:35', 'images (4).jpg', 3),
(83, '4x40 Double Membrane Casing', 5, 23, 1, 'Piece', '01', 0, '4x40 double Membrane Casing', 22000, '2023-01-08 14:16:50', '2023-01-08 14:16:50', 'download (17).jpg', 3),
(84, '8x40 Single Membrane Casing', 5, 23, 1, 'Piece', '02', 0, '8x40 Single Membrane Casing', 42000, '2023-01-08 14:19:36', '2023-01-08 14:19:36', 'download (19).jpg', 3),
(85, '8x40 Double Membrane Casing', 5, 23, 1, 'Piece', '01', 0, '8x40 Double Membrane Casing', 60000, '2023-01-08 14:20:59', '2023-01-08 14:20:59', 'download (18).jpg', 3),
(86, 'S.S Single Jumbo Filter Housing Plate', 3, 17, 1, 'Piece', '10', 20, 'S.S Single Jumbo Filter Housing Plate', 850, '2023-01-08 14:25:53', '2023-01-08 14:25:53', 'download (20).jpg', 3),
(87, 'M.S Jumbo Filter Housing Plate', 3, 18, 1, 'Piece', '04', 0, 'M.S Jumbo Filter Housing Plate', 750, '2023-01-08 14:27:48', '2023-01-08 14:27:48', '51ERcoI-RvL._SL1100_.jpg', 3),
(88, 'S.S Single slim Filter Housing Plate', 3, 17, 1, 'Piece', '10', 9, 'S.S Single slim Filter Housing Plate', 650, '2023-01-08 14:30:26', '2023-01-08 14:30:26', 'download (20).jpg', 3),
(89, 'M.S Slim Filter Housing Plate', 3, 18, 1, 'Piece', '04', 0, 'M.S Slim Filter Housing Plate', 550, '2023-01-08 14:32:00', '2023-01-08 14:32:00', 'images (5).jpg', 3),
(90, 'Activated Carbon Heycrob 25KG Bag', 7, 27, 1, 'Kg', '04', 2, 'Activated Carbon Heycrob 25KG Bag', 7500, '2023-01-09 13:30:34', '2023-01-09 13:30:34', 'download (21).jpg', 3),
(91, 'Silica Sand 50 KG Bag', 7, 28, 1, 'Kg', '10', 0, 'Silica Sand 50 KG Bag', 2800, '2023-01-09 13:33:29', '2023-01-09 13:33:29', 'download (22).jpg', 3),
(92, 'White Garvel 50 KG Bag', 7, 29, 1, 'Kg', '10', 8, 'White Garvel 50 KG Bag', 2500, '2023-01-09 13:35:29', '2023-01-09 13:35:29', 'images (7).jpg', 3),
(93, 'Softener Resin 25 KG Bag', 7, 28, 9, 'Kg', '01', 0, 'Softener Resin 25 KG Bag', 32000, '2023-01-09 13:38:19', '2023-01-09 13:38:19', 'download (23).jpg', 3),
(94, 'Flow Matic Switch (Ocean)', 27, 82, 1, 'Piece', '02', 0, 'Flow Matic Switch', 5500, '2023-01-09 13:50:54', '2023-01-09 13:50:54', 'images (8).jpg', 3),
(95, 'Float Switch (Faisal)', 27, 82, 1, 'Piece', '05', 4, 'Float Switch (Faisal)', 950, '2023-01-09 13:54:04', '2023-01-09 13:54:04', 'download (24).jpg', 3),
(96, 'Pressure Switch 7.5 Bar (Denfos)', 27, 82, 12, 'Piece', '02', 0, 'Pressure Switch 7.5 Bar (Denfos)', 4800, '2023-01-09 14:01:06', '2023-01-09 14:01:06', 'download (25).jpg', 3),
(97, 'UV Chamber Dosemtic Box complete', 9, 32, 1, 'Piece', '01', 1, 'UV Chamber Dosemtic Box complete', 5500, '2023-01-09 14:07:02', '2023-01-09 14:07:02', 'images (9).jpg', 3),
(98, 'UV Chamber 5GPM', 9, 33, 1, 'Piece', '01', 0, 'UV Chamber 5GPM', 7000, '2023-01-09 14:42:56', '2023-01-09 14:42:56', 'UV-Water-Disinfection-UV-Water-Sterilizer-Ultraviolet-Water-Purification-25W.jpg', 3),
(99, 'UV Chamber 10GPM', 9, 33, 1, 'Piece', '2', 5, 'UV Chamber 10GPM', 9000, '2023-01-09 14:51:29', '2023-01-09 14:51:29', 'download (26).jpg', 3),
(100, 'UV Chamber 20GPM Double', 9, 33, 1, 'Piece', '2', 0, 'UV Chamber 20GPM Double', 16000, '2023-01-09 15:01:34', '2023-01-09 15:01:34', 'images (10).jpg', 3),
(101, 'UV Chamber 40GPM Four lamp', 9, 33, 1, 'Piece', '01', 1, 'UV Chamber 40GPM Four lamp', 25000, '2023-01-09 15:03:59', '2023-01-09 15:03:59', '100-GPM-UV-300x300.png', 3),
(102, 'UV Ballast (Single)', 9, 37, 11, 'Piece', '2', 4, 'UV Ballast (Single)', 1500, '2023-01-09 15:11:05', '2023-01-09 15:11:05', 'images (11).jpg', 3),
(103, 'UV Ballast (Double)', 9, 37, 11, 'Piece', '2', 1, 'UV Ballast (Double)', 2000, '2023-01-09 15:16:00', '2023-01-09 15:16:00', 'images (11).jpg', 3),
(104, 'UV Quartz', 9, 36, 8, 'Piece', '05', 8, 'UV Quartz', 2500, '2023-01-09 15:17:11', '2023-01-09 15:17:11', 'download (27).jpg', 3),
(105, 'UV Lamp', 9, 35, 8, 'Piece', '5', 3, 'UV Lamp', 5500, '2023-01-09 15:19:31', '2023-01-09 15:19:31', '4-pins-uv-lamp__24886.1536079669.1280.1280__91554.jpg', 3),
(106, 'UV Chamber Side Nut', 9, 38, 1, 'Piece', '50', 150, 'UV Chamber Side Nut', 95, '2023-01-09 15:25:16', '2023-01-09 15:25:16', 'ACNUVREC24L_11_1.jpg', 3),
(107, 'UV Chamber Silicon Ring', 9, 38, 1, 'Piece', '20', 100, 'UV Chamber Silicon Ring', 80, '2023-01-09 16:22:01', '2023-01-09 16:22:01', 'download (29).jpg', 3),
(108, 'Etatron Dozing  Pump', 23, 84, 4, 'Piece', '04', 0, 'Etatron Dozing  Pump', 25000, '2023-01-09 16:27:08', '2023-01-09 16:27:08', 'download (30).jpg', 3),
(109, 'Bluetech Dozing Pump Digital', 23, 84, 5, 'Piece', '04', 4, 'Bluetech Dozing Pump Digital', 19500, '2023-01-09 16:29:01', '2023-01-09 16:29:01', '0009607_diaphragm-dosing-pump-168-lh-flow_550.jpeg', 3),
(110, 'Aqua Dozing Pump', 23, 64, 1, 'Piece', '01', 1, 'Aqua Dozing Pump', 10000, '2023-01-09 16:30:50', '2023-01-09 16:30:50', 'download (31).jpg', 3),
(111, 'RO Plant China Pump 100 GPD', 22, 63, 4, 'Piece', '02', 0, 'RO Plant China Pump 100 GPD', 4000, '2023-01-09 16:35:17', '2023-01-09 16:35:17', 'download (32).jpg', 3),
(112, 'Calcium Chloride', 19, 51, 19, 'Kg', '10', 37, 'Calcium Chloride', 285, '2023-01-09 16:41:51', '2023-01-09 16:41:51', 'download (33).jpg', 3),
(113, 'Magnesium Sulphate', 19, 51, 12, 'Kg', '10', 14, 'Magnesium Sulphate', 160, '2023-01-09 16:50:30', '2023-01-09 16:50:30', 'images (12).jpg', 3),
(114, 'Sodium Bicarbonate', 19, 51, 12, 'Kg', '2', 0, 'Sodium Bicarbonate', 220, '2023-01-09 16:53:39', '2023-01-09 16:53:39', 'images (13).jpg', 3),
(115, 'Potassium Bicarbonate', 19, 51, 12, 'Kg', '02', 2, 'Potassium Bicarbonate', 1800, '2023-01-09 16:55:18', '2023-01-09 16:55:18', 'images (13).jpg', 3),
(116, 'Low PH Cleaning Chemical', 19, 52, 1, 'Piece', '5', 30, 'Low PH Cleaning Cemicals', 250, '2023-01-09 16:57:51', '2023-01-09 16:57:51', 'download (35).jpg', 3),
(117, 'High PH Cleaning Chemicals', 19, 52, 12, 'Liter', '10', 30, 'High PH Cleaning Chemicals', 250, '2023-01-09 17:05:07', '2023-01-09 17:05:07', 'hydrochloric-acid-28.jpg', 3),
(118, 'Antiscalant', 19, 50, 12, 'Liter', '50', 40, 'Antiscalant', 420, '2023-01-09 17:08:52', '2023-01-09 17:08:52', 'Hc2e044cce4e44e4f9941ee9a471eaf550.png', 3),
(119, 'Calcium Chloride (Japan)', 19, 56, 19, 'Kg', '2', 5, 'Calcium Chloride (Japan)', 700, '2023-01-09 17:10:35', '2023-01-09 17:10:35', 'download (33).jpg', 3),
(120, 'Magnesium Sulphate (Japan)', 19, 56, 19, 'Kg', '2', 5, 'Magnesium Sulphate (Japan)', 700, '2023-01-09 17:11:47', '2023-01-09 17:11:47', 'images (12).jpg', 3),
(121, 'Sodium Bicarbonate (Japan)', 19, 56, 19, 'Kg', '2', 5, 'Sodium Bicarbonate (Japan)', 600, '2023-01-09 17:13:02', '2023-01-09 17:13:02', 'images (13).jpg', 3),
(122, 'Potassium Bicarbonate (Japan)', 19, 56, 19, 'Kg', '2', 0, 'Potassium Bicarbonate (Japan)', 600, '2023-01-09 17:14:58', '2023-01-09 17:14:58', 'images (13).jpg', 3),
(123, 'Strainer Set 3/4\"', 18, 49, 4, 'Piece', '2', 12, 'Strainer Set 3/4\"', 450, '2023-01-09 17:18:22', '2023-01-09 17:18:22', 'HTB12M5rX6LuK1Rjy0Fhq6xpdFXaF.jpg', 3),
(124, 'Strainer Set 1\"', 18, 49, 4, 'Piece', '2', 13, 'Strainer Set 1\"', 850, '2023-01-09 17:19:45', '2023-01-09 17:19:45', 'HTB12M5rX6LuK1Rjy0Fhq6xpdFXaF.jpg', 3),
(125, 'Strainer Set 1/1/2\"', 18, 49, 4, 'Piece', '2', 9, 'Strainer Set 1/1/2\"', 4800, '2023-01-09 17:21:08', '2023-01-09 17:21:08', 'HTB12M5rX6LuK1Rjy0Fhq6xpdFXaF.jpg', 3),
(126, '7 Stage Aquathai', 22, 63, 5, 'Piece', '2', 0, '7 Stage Aquathai', 30000, '2023-01-09 17:23:36', '2023-01-09 17:23:36', '4-2-e1634720165778.jpg', 3),
(127, '6MM Soft Pipe', 11, 73, 11, 'Ft', '25', 0, '6MM Soft Pipe', 35, '2023-01-09 17:33:48', '2023-01-09 17:33:48', 'rollofblackhose_f9db60a3-6f03-4e24-8af7-84634725dada.jpg', 3),
(128, '8MM Soft Pipe', 11, 73, 11, 'Ft', '25', 0, '8MM Soft Pipe', 40, '2023-01-09 17:35:47', '2023-01-09 17:35:47', 'download (36).jpg', 3),
(129, '10MM Soft Pipe', 11, 73, 11, 'Ft', '25', 0, '10MM Soft Pipe', 45, '2023-01-09 17:37:15', '2023-01-09 17:37:15', 'download (37).jpg', 3),
(130, '12MM Soft Pipe', 11, 73, 11, 'Ft', '25', 0, '12MM Soft Pipe', 45, '2023-01-09 17:38:52', '2023-01-09 17:38:52', 'images (14).jpg', 3),
(131, '4 way Domestic Ro Plant', 22, 63, 4, 'Piece', '02', 1, '4 way Domestic Ro Plant', 1050, '2023-01-09 17:43:58', '2023-01-09 17:43:58', 'download (38).jpg', 3),
(132, '6MM White Domestic Ro Plant Pipe', 22, 63, 11, 'Ft', '25', 0, '6MM White Domestic Ro Plant Pipe', 40, '2023-01-09 17:46:18', '2023-01-09 17:46:18', '31N669rBvEL._AC_.jpg', 3),
(133, '10MM White Domestic Ro Plant Pipe', 22, 63, 11, 'Ft', '25', 0, '10MM White Domestic Ro Plant Pipe', 70, '2023-01-09 17:47:54', '2023-01-09 17:47:54', 'GPID_1000566620_IMG_00.jpeg', 3),
(134, '2-40 Booster pump', 21, 62, 12, 'Piece', '1', 0, '2-40 Booster pump', 18000, '2023-01-09 17:50:45', '2023-01-09 17:50:45', 'images (15).jpg', 3),
(135, '4-40 Booster pump', 21, 62, 12, 'Piece', '1', 0, '4-40 Booster pump', 25000, '2023-01-09 17:52:30', '2023-01-09 17:52:30', 'dwsc-01.jpg', 3),
(136, '4-60 Booster pump', 21, 62, 12, 'Piece', '1', 0, '4-60 Booster pump', 32000, '2023-01-09 17:55:28', '2023-01-09 17:55:28', 'binnisf-4-1-e12ccf-5210147_1.jpg', 3),
(137, '8-40 Booster pump', 21, 62, 12, 'Piece', '1', 1, '8-40 Booster pump', 50000, '2023-01-09 17:57:59', '2023-01-09 17:57:59', '_DSC0003IboAbWSsRWgar.jpg', 3),
(138, '10-40 Booster pump', 21, 62, 12, 'Piece', '1', 0, '10-40 Booster pump', 50000, '2023-01-09 18:03:02', '2023-01-09 18:03:02', 'optimized_navknop-dpv.jpg', 3),
(139, '2-40 Booster pump New', 21, 61, 1, 'Piece', '1', 0, '2-40 Booster pump New', 40000, '2023-01-09 18:31:20', '2023-01-09 18:31:20', 'download (39).jpg', 3),
(140, '4-40 Booster pump New', 21, 61, 21, 'Piece', '1', 0, '4-40 Booster pump New', 58000, '2023-01-09 18:39:32', '2023-01-09 18:39:32', 'dwsc-01 (1).jpg', 3),
(141, '4-60 Booster pump New', 21, 61, 21, 'Piece', '1', 0, '4-60 Booster pump New', 75000, '2023-01-09 18:42:35', '2023-01-09 18:42:35', 'chlf-series-horizontal-multistage-centrifugal-pump.png', 3),
(142, '8-40 Booster pump New', 21, 61, 21, 'Piece', '1', 0, '8-40 Booster pump New', 105000, '2023-01-09 18:44:30', '2023-01-09 18:44:30', '20200706105904502.png', 3),
(143, '10-40 Booster pump New', 21, 61, 21, 'Piece', '1', 0, '10-40 Booster pump New', 175000, '2023-01-09 18:55:47', '2023-01-09 18:55:47', 'images (17).jpg', 3),
(144, '2-11 Multistage Pump', 20, 59, 12, 'Piece', '1', 0, '2-11 Multistage Pump', 40000, '2023-01-09 18:58:34', '2023-01-09 18:58:34', 'download (40).jpg', 3),
(145, '2-15 Multistage Pump', 20, 59, 12, 'Piece', '1', 0, '2-15 Multistage Pump', 51000, '2023-01-09 19:00:56', '2023-01-09 19:00:56', 'download (41).jpg', 3),
(146, '4-12 Multistage Pump', 20, 59, 12, 'Piece', '1', 0, '4-12 Multistage Pump', 60000, '2023-01-09 19:03:22', '2023-01-09 19:03:22', 'download (42).jpg', 3),
(147, '4-16 Multistage Pump', 20, 59, 12, 'Piece', '1', 1, '4-16 Multistage Pump', 85000, '2023-01-09 19:24:00', '2023-01-09 19:24:00', 'download (43).jpg', 3),
(148, '4-22 Multistage Pump', 20, 59, 12, 'Piece', '1', 0, '4-22 Multistage Pump', 98000, '2023-01-09 19:26:24', '2023-01-09 19:26:24', 'download (44).jpg', 3),
(149, '2-11 Multistage Pump New', 20, 57, 21, 'Piece', '1', 0, '2-11 Multistage Pump New', 94500, '2023-01-09 23:45:38', '2023-01-09 23:45:38', 'download (45).jpg', 3),
(150, '2-15 Multistage Pump New', 20, 57, 21, 'Piece', '1', 0, '2-15 Multistage Pump New', 105000, '2023-01-09 23:46:42', '2023-01-09 23:46:42', 'download (45).jpg', 3),
(151, '4-12 Multistage Pump New', 20, 57, 21, 'Piece', '1', 0, '4-12 Multistage Pump New', 110000, '2023-01-09 23:58:50', '2023-01-09 23:58:50', 'download (45).jpg', 3),
(152, '4-16 Multistage Pump New', 20, 57, 21, 'Piece', '1', 0, '4-16 Multistage Pump New', 128000, '2023-01-09 23:59:49', '2023-01-09 23:59:49', 'download (45).jpg', 3),
(153, '4-22 Multistage Pump New', 20, 57, 21, 'Piece', '1', 0, '4-22 Multistage Pump New', 170000, '2023-01-10 00:01:24', '2023-01-10 00:01:24', 'download (45).jpg', 3),
(154, '80L Water Tank', 25, 65, 1, 'Piece', '04', 0, '80L Water Tank', 2800, '2023-01-10 00:08:51', '2023-01-10 00:08:51', 'tanks-bunds.jpg', 3),
(155, '1000 Liter Water Tank', 25, 65, 22, 'Piece', '1', 0, '1000 Liter Water Tank', 14500, '2023-01-10 00:12:32', '2023-01-10 00:12:32', '43825_300.jpg', 3),
(156, '2000 Liter Tower Water Tank', 25, 65, 22, 'Piece', '1', 0, '2000 Liter Tower Water Tank', 26500, '2023-01-10 00:17:08', '2023-01-10 00:17:08', 'download (46).jpg', 3),
(157, '2000 Liter Plus Water Tank', 25, 65, 22, 'Piece', '1', 0, '2000 Liter Plus Water Tank', 28000, '2023-01-10 00:18:26', '2023-01-10 00:18:26', 'download (47).jpg', 3),
(158, 'Elbow 1/2\"', 10, 68, 1, 'Piece', '25', 52, 'Elbow 1/2\"', 55, '2023-01-10 00:21:29', '2023-01-10 00:21:29', 'pvc-50mm-90-elbow-720x540.jpg', 3),
(159, 'Elbow 3/4\"', 10, 68, 7, 'Piece', '20', 72, 'Elbow 3/4\"', 70, '2023-01-10 00:25:27', '2023-01-10 00:25:27', 'pvc-50mm-90-elbow-720x540.jpg', 3),
(160, 'Elbow 1\"', 10, 68, 7, 'Piece', '25', 50, 'Elbow 1\"', 98, '2023-01-10 00:26:30', '2023-01-10 00:26:30', 'pvc-50mm-90-elbow-720x540.jpg', 3),
(161, 'Elbow 1 1/2\"', 10, 68, 7, 'Piece', '15', 48, 'Elbow 1 1/2\"', 220, '2023-01-10 00:27:48', '2023-01-10 00:27:48', 'pvc-50mm-90-elbow-720x540.jpg', 3),
(162, 'Union 1/2\"', 10, 68, 7, 'Piece', '15', 57, 'Union 1/2\"', 135, '2023-01-10 00:29:23', '2023-01-10 00:29:23', 'download (49).jpg', 3),
(163, 'Union 3/4\"', 10, 68, 7, 'Piece', '15', 23, 'Union 3/4\"', 198, '2023-01-10 00:30:36', '2023-01-10 00:30:36', 'download (49).jpg', 3),
(164, 'Union 1\"', 10, 68, 7, 'Piece', '25', 57, 'Union 1\"', 240, '2023-01-10 00:31:40', '2023-01-10 00:31:40', 'download (49).jpg', 3),
(165, 'Union 1 1/2\"', 10, 68, 7, 'Piece', '10', 7, 'Union 1 1/2\"', 550, '2023-01-10 00:32:42', '2023-01-10 00:32:42', 'download (49).jpg', 3),
(166, 'Valve Socket 1/2\"', 10, 68, 1, 'Piece', '15', 53, 'Valve Socket 1/2\"', 48, '2023-01-10 00:35:03', '2023-01-10 00:35:03', 'PVC VALVE SOCKET MALE ADAPTOR-777x777.jpg', 3),
(167, 'Valve Socket 3/4\"', 10, 68, 7, 'Piece', '15', 55, 'Valve Socket 3/4\"', 70, '2023-01-10 00:36:27', '2023-01-10 00:36:27', 'PVC VALVE SOCKET MALE ADAPTOR-777x777.jpg', 3),
(168, 'Valve Socket 1\"', 10, 68, 7, 'Piece', '25', 68, 'Valve Socket 1\"', 75, '2023-01-10 00:37:30', '2023-01-10 00:37:30', 'PVC VALVE SOCKET MALE ADAPTOR-777x777.jpg', 3),
(169, 'Valve Socket 1 1/2\"', 10, 68, 1, 'Piece', '10', 57, 'Valve Socket 1 1/2\"', 190, '2023-01-10 00:38:31', '2023-01-10 00:38:31', 'PVC VALVE SOCKET MALE ADAPTOR-777x777.jpg', 3),
(170, 'Female Socket 1/2\"', 10, 68, 7, 'Piece', '10', 15, 'Female Socket 1/2\"', 62, '2023-01-10 00:41:50', '2023-01-10 00:41:50', 'download (50).jpg', 3),
(171, 'Female Socket 3/4\"', 10, 68, 7, 'Piece', '10', 69, 'Female Socket 3/4\"', 92, '2023-01-10 00:42:41', '2023-01-10 00:42:41', 'download (50).jpg', 3),
(172, 'Female Socket 1\"', 10, 68, 7, 'Piece', '20', 25, 'Female Socket 1\"', 110, '2023-01-10 00:43:29', '2023-01-10 00:43:29', 'download (50).jpg', 3),
(173, 'Female Socket 1 1/2\"', 10, 68, 7, 'Piece', '10', 2, 'Female Socket 1 1/2\"', 198, '2023-01-10 00:44:33', '2023-01-10 00:44:33', 'download (50).jpg', 3),
(174, 'Pipe Socket 1/2\"', 10, 68, 7, 'Piece', '10', 40, 'Pipe Socket 1/2\"', 52, '2023-01-10 00:46:39', '2023-01-10 00:46:39', '9_500_500.jpg', 3),
(175, 'Pipe Socket 3/4\"', 10, 68, 7, 'Piece', '10', 76, 'Pipe Socket 3/4\"', 52, '2023-01-10 00:47:40', '2023-01-10 00:47:40', '9_500_500.jpg', 3),
(176, 'Pipe Socket 1\"', 10, 68, 7, 'Piece', '20', 48, 'Pipe Socket 1\"', 135, '2023-01-10 00:48:57', '2023-01-10 00:48:57', '9_500_500.jpg', 3),
(177, 'Pipe Socket 1 1/2\"', 10, 68, 7, 'Piece', '10', 16, 'Pipe Socket 1 1/2\"', 135, '2023-01-10 00:49:48', '2023-01-10 00:49:48', '9_500_500.jpg', 3),
(178, 'Tee 1/2\"', 10, 68, 7, 'Piece', '10', 39, 'Tee 1/2\"', 75, '2023-01-10 00:52:24', '2023-01-10 00:52:24', 'download (51).jpg', 3),
(179, 'Tee 3/4\"', 10, 68, 7, 'Piece', '10', 51, 'Tee 3/4\"', 100, '2023-01-10 00:53:12', '2023-01-10 00:53:12', 'download (51).jpg', 3),
(180, 'Tee 1\"', 10, 68, 7, 'Piece', '20', 49, 'Tee 1\"', 150, '2023-01-10 00:54:22', '2023-01-10 00:54:22', 'download (51).jpg', 3),
(181, 'Tee 1 1/2\"', 10, 68, 7, 'Piece', '10', 6, 'Tee 1 1/2\"', 295, '2023-01-10 00:55:09', '2023-01-10 00:55:09', 'download (51).jpg', 3),
(182, 'Flange 1\"', 10, 68, 7, 'Piece', '08', 6, 'Flange 1\"', 520, '2023-01-10 00:58:02', '2023-01-10 00:58:02', 'images (18).jpg', 3),
(183, 'Flange 1 1/2\"', 10, 68, 7, 'Piece', '08', 5, 'Flange 1 1/2\"', 690, '2023-01-10 00:59:01', '2023-01-10 00:59:01', 'images (18).jpg', 3),
(184, 'Valve 1/2\"', 10, 68, 7, 'Piece', '6', 0, 'Valve 1/2\"', 220, '2023-01-10 01:01:57', '2023-01-10 01:01:57', 'S75_8038.jpg', 3),
(185, 'Valve 3/4\"', 10, 68, 7, 'Piece', '6', 6, 'Valve 3/4\"', 270, '2023-01-10 01:02:51', '2023-01-10 01:02:51', 'S75_8038.jpg', 3),
(186, 'Valve 1\"', 10, 68, 7, 'Piece', '10', 6, 'Valve 1\"', 380, '2023-01-10 01:03:44', '2023-01-10 01:03:44', 'S75_8038.jpg', 3),
(187, 'Valve 1 1/2\"', 10, 68, 7, 'Piece', '5', 5, 'Valve 1 1/2\"', 940, '2023-01-10 01:04:39', '2023-01-10 01:04:39', 'S75_8038.jpg', 3),
(188, 'Blending Valve 1/2\"', 10, 68, 7, 'Piece', '3', 0, 'Blending Valve 1/2\"', 650, '2023-01-10 01:08:17', '2023-01-10 01:08:17', 'download (52).jpg', 3),
(189, 'Blending Valve 3/4\"', 10, 68, 11, 'Piece', '3', 0, 'Blending Valve 3/4\"', 850, '2023-01-10 01:09:21', '2023-01-10 01:09:21', 'download (52).jpg', 3),
(190, 'Pipe Length 1/2\" 13 Feet', 10, 70, 7, 'Piece', '5', 0, 'Pipe Length 1/2\" 13 Feet', 500, '2023-01-10 11:42:39', '2023-01-10 11:42:39', '50mm-grey-pvc-pipe-2.5-metre-length-4001-p.jpg', 3),
(191, 'Pipe Length 3/4\" 13 Feet', 10, 70, 7, 'Piece', '5', 0, 'Pipe Length 3/4\" 13 Feet', 700, '2023-01-10 11:43:46', '2023-01-10 11:43:46', '50mm-grey-pvc-pipe-2.5-metre-length-4001-p.jpg', 3),
(192, 'Pipe Length 1\" 13 Feet 40 schedule', 10, 70, 7, 'Piece', '8', 0, 'Pipe Length 1\" 13 Feet 40 schedule', 640, '2023-01-10 11:45:20', '2023-01-10 11:45:20', '50mm-grey-pvc-pipe-2.5-metre-length-4001-p.jpg', 3),
(193, 'Pipe Length 1\" 13 Feet 80 schedule', 10, 70, 7, 'Piece', '8', 0, 'Pipe Length 1\" 13 Feet 80 schedule', 900, '2023-01-10 11:48:46', '2023-01-10 11:48:46', '50mm-grey-pvc-pipe-2.5-metre-length-4001-p.jpg', 3),
(194, 'Pipe Length 1 1/2\" 13 Feet', 10, 68, 7, 'Piece', '8', 0, 'Pipe Length 1 1/2\" 13 Feet', 1550, '2023-01-10 12:04:37', '2023-01-10 12:04:37', '50mm-grey-pvc-pipe-2.5-metre-length-4001-p.jpg', 3),
(195, 'Bush 1/2\"x3/4\"', 10, 68, 7, 'Piece', '15', 40, 'Bush 1/2\"x3/4\"', 65, '2023-01-10 12:07:25', '2023-01-10 12:07:25', 'download (53).jpg', 3),
(196, 'Bush 3/4\"x1\"', 10, 68, 7, 'Piece', '15', 32, 'Bush 3/4\"x1\"', 65, '2023-01-10 12:16:00', '2023-01-10 12:16:00', 'download (53).jpg', 3),
(197, 'Bush 1\"x1 1/2\"', 10, 68, 7, 'Piece', '15', 37, 'Bush 1\"x1 1/2\"', 135, '2023-01-10 12:18:34', '2023-01-10 12:18:34', 'download (53).jpg', 3),
(198, 'Solenoide Valve S.S1/2\"', 10, 71, 1, 'Piece', '2', 0, 'Solenoide Valve 1/2\"', 4000, '2023-01-10 12:24:14', '2023-01-10 12:24:14', 'images (19).jpg', 3),
(199, 'Solenoide Valve S.S 3/4\"', 10, 71, 11, 'Piece', '2', 0, 'Solenoide Valve S.S 3/4\"', 4800, '2023-01-10 12:27:59', '2023-01-10 12:27:59', 'images (19).jpg', 3),
(200, 'Solenoide Valve S.S 1\"', 10, 71, 11, 'Piece', '2', 0, 'Solenoide Valve S.S 1\"', 6500, '2023-01-10 12:29:39', '2023-01-10 12:29:39', 'images (19).jpg', 3),
(201, 'Solenoide Valve S.S 1 1/2\"', 10, 68, 11, 'Piece', '2', 0, 'Solenoide Valve S.S 1 1/2\"', 12000, '2023-01-10 12:30:48', '2023-01-10 12:30:48', 'images (19).jpg', 3),
(202, 'Globe Valve S.S 1/2\"', 10, 71, 11, 'Piece', '2', 0, 'Globe Valve S.S 1/2\"', 1300, '2023-01-10 12:33:03', '2023-01-10 12:33:03', 'images (20).jpg', 3),
(203, 'Globe Valve S.S 3/4\"', 10, 71, 11, 'Piece', '2', 0, 'Globe Valve S.S 3/4\"', 1800, '2023-01-10 12:34:05', '2023-01-10 12:34:05', 'images (20).jpg', 3),
(204, 'Globe Valve S.S 1\"', 10, 71, 7, 'Piece', '2', 0, 'Globe Valve S.S 1\"', 2200, '2023-01-10 12:45:11', '2023-01-10 12:45:11', 'images (20).jpg', 3),
(205, 'Globe Valve S.S 1 1/2\"', 10, 68, 7, 'Piece', '2', 0, 'Globe Valve S.S 1 1/2\"', 4000, '2023-01-10 12:46:08', '2023-01-10 12:46:08', 'images (20).jpg', 3),
(206, '1.5\"x1.5\" S.S 201 Non Magnet 20F', 17, 48, 11, 'Piece', '4', 0, '1.5\"x1.5\" S.S 201 Non Magnet 20F', 5000, '2023-01-10 12:59:40', '2023-01-10 12:59:40', 'images (21).jpg', 3),
(207, 'Nipal S.S 2x6MM Female', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 2x6MM Female', 85, '2023-01-10 13:41:01', '2023-01-10 13:41:01', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(208, 'Nipal S.S 2x6MM Male', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 2x6MM Male', 85, '2023-01-10 13:41:11', '2023-01-10 13:41:11', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(209, 'Nipal S.S 1/2\"x6MM Male', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 1/2\"x6MM Male', 120, '2023-01-10 13:41:21', '2023-01-10 13:41:21', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(210, 'Nipal S.S 1/2\"x8MM Male', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 1/2\"x8MM Male', 120, '2023-01-10 13:46:37', '2023-01-10 13:46:37', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(211, 'Nipal S.S 1/2\"x12MM Male', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 1/2\"x12MM Male', 95, '2023-01-10 13:47:28', '2023-01-10 13:47:28', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(212, 'Nipal S.S 2x8MM Male', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 2x8MM Male', 75, '2023-01-10 13:48:25', '2023-01-10 13:48:25', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(213, 'Nipal S.S 2x8MM Female', 10, 71, 11, 'Piece', '10', 0, 'Nipal S.S 2x8MM Female', 120, '2023-01-10 13:49:30', '2023-01-10 13:49:30', '71cRvVMGj0L._AC_UL210_SR210,210_.jpg', 3),
(214, 'Labour And Assembling Charges', 28, 87, 24, 'Piece', '0', 0, 'Labour Charges And Assembling Charges', 40000, '2023-01-10 15:51:37', '2023-01-10 15:51:37', 'images.png', 3),
(215, 'Fitting', 27, 82, 12, 'Piece', '0', 0, 'Fitting', 40000, '2023-01-10 15:52:50', '2023-01-10 15:52:50', '50mm-grey-pvc-pipe-2.5-metre-length-4001-p.jpg', 3),
(216, 'S.S 1.5x1.5 Non Magnet Fram', 17, 48, 11, 'Piece', '0', 0, 'S.S 1.5x1.5 Non Magnet Fram', 40000, '2023-01-10 16:03:11', '2023-01-10 16:03:11', 'images (21).jpg', 3),
(217, 'pH Online Meter', 15, 44, 9, 'Piece', '1', 0, 'pH online Meter', 42000, '2023-01-16 12:00:01', '2023-01-16 12:00:01', 'pH online meter.jpg', 3),
(218, 'Electric Panal 21x24', 28, 88, 1, 'Piece', '2', 1, 'Electric Panal 21x24', 29000, '2023-01-16 12:05:13', '2023-01-16 12:05:13', 'FEB_8820.JPG', 3),
(219, 'bush 1/2\"x1 1/4\" female', 10, 68, 1, 'Piece', '5', 10, 'bush', 180, '2023-02-18 12:25:39', '2023-02-18 12:25:39', 'download (53).jpg', 3),
(220, 'bush 1\"x1/2\"', 10, 68, 1, 'Piece', '5', 33, 'bush', 95, '2023-02-18 12:29:37', '2023-02-18 12:29:37', 'download (53).jpg', 3),
(221, 'bush 1\"x1/2\" female', 10, 68, 1, 'Piece', '5', 13, 'bush', 110, '2023-02-18 12:32:55', '2023-02-18 12:32:55', 'download (53).jpg', 3),
(222, 'Bush 3/4\"x1\" female', 10, 68, 1, 'Piece', '10', 66, 'bush', 120, '2023-02-18 12:42:41', '2023-02-18 12:42:41', 'download (53).jpg', 3),
(223, 'bush 1\"x1 1/4\"', 10, 68, 1, 'Piece', '5', 10, 'bush', 120, '2023-02-18 12:48:31', '2023-02-18 12:48:31', 'download (53).jpg', 3),
(224, 'bush 1\"x2\"', 10, 68, 1, 'Piece', '10', 41, 'bush', 250, '2023-02-18 12:50:08', '2023-02-18 12:50:08', 'download (53).jpg', 3),
(225, 'Bush 2\"x1 1/2\"', 10, 68, 1, 'Piece', '10', 15, 'bush', 250, '2023-02-18 12:52:14', '2023-02-18 12:52:14', 'download (53).jpg', 3),
(226, 'Flange 1/2\"', 10, 68, 1, 'Piece', '5', 2, 'flange', 505, '2023-02-18 12:56:22', '2023-02-18 12:56:22', 'images (18).jpg', 3),
(227, 'tee 2\"', 10, 68, 1, 'Piece', '5', 1, 'tee', 482, '2023-02-18 13:01:39', '2023-02-18 13:01:39', 'download (51).jpg', 3),
(228, 'Tee 1 1/4\"', 10, 68, 1, 'Piece', '05', 4, 'Tee', 375, '2023-02-18 13:04:56', '2023-02-18 13:04:56', 'download (51).jpg', 3),
(229, 'pipe socket 1 1/4\"', 10, 68, 1, 'Piece', '5', 12, 'pipe socket', 145, '2023-02-18 13:09:08', '2023-02-18 13:09:08', '9_500_500.jpg', 3),
(230, 'Pipe Socket 2\"', 10, 68, 1, 'Piece', '5', 1, 'pipe', 218, '2023-02-18 13:11:00', '2023-02-18 13:11:00', '9_500_500.jpg', 3),
(231, 'Female Socket 2\"', 10, 68, 1, 'Piece', '5', 1, 'female socket', 264, '2023-02-18 13:14:07', '2023-02-18 13:14:07', 'download (50).jpg', 3),
(232, 'Female Socket 1 1/4\"', 10, 68, 1, 'Piece', '05', 12, 'female socket', 210, '2023-02-18 13:16:50', '2023-02-18 13:16:50', 'download (50).jpg', 3),
(233, 'Valve Socket 1 1/4\"', 10, 68, 1, 'Piece', '05', 45, 'valve socket', 210, '2023-02-18 13:18:56', '2023-02-18 13:18:56', 'PVC VALVE SOCKET MALE ADAPTOR-777x777.jpg', 3),
(234, 'Valve Socket 2\"', 10, 68, 1, 'Piece', '05', 26, 'valve socket', 252, '2023-02-18 13:20:45', '2023-02-18 13:20:45', 'PVC VALVE SOCKET MALE ADAPTOR-777x777.jpg', 3),
(235, 'Union 1 1/4\"', 10, 68, 1, 'Piece', '10', 42, 'union', 470, '2023-02-18 13:49:25', '2023-02-18 13:49:25', 'download (48).jpg', 3),
(236, 'Elbow 1 1/4\"', 10, 68, 1, 'Piece', '10', 13, 'elbow', 295, '2023-02-18 13:51:37', '2023-02-18 13:51:37', 'pvc-50mm-90-elbow-720x540.jpg', 3),
(237, 'service charges', 28, 85, 24, 'Piece', '0', 999, 'service charges', 1, '2023-03-13 17:29:13', '2023-03-13 17:29:13', 'noimage.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchasedproducts`
--

CREATE TABLE `purchasedproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasedproducts`
--

INSERT INTO `purchasedproducts` (`id`, `purchase_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 216, 580, '2023-02-04 13:43:29', '2023-02-04 13:43:29'),
(4, 3, 7, 120, 145, '2023-02-04 13:43:29', '2023-02-04 13:43:29'),
(5, 3, 22, 25, 270, '2023-02-04 13:43:29', '2023-02-04 13:43:29'),
(23, 5, 12, 8, 280, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(24, 5, 13, 19, 690, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(25, 5, 14, 18, 690, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(26, 5, 20, 52, 240, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(27, 5, 21, 16, 375, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(28, 5, 22, 24, 375, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(29, 5, 23, 6, 600, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(30, 5, 24, 18, 600, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(31, 5, 25, 2, 450, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(32, 5, 26, 2, 450, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(33, 5, 27, 1, 6500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(34, 5, 28, 1, 1800, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(35, 5, 30, 2, 1800, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(36, 5, 31, 5, 6500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(37, 5, 32, 2, 35000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(38, 5, 37, 1, 95000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(39, 5, 39, 1, 120000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(40, 5, 40, 3, 23000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(41, 5, 43, 3, 4200, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(42, 5, 45, 3, 6500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(43, 5, 46, 2, 23000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(44, 5, 47, 1, 25000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(45, 5, 51, 1, 1200, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(46, 5, 52, 5, 450, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(47, 5, 55, 5, 3500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(48, 5, 56, 2, 4000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(49, 5, 58, 1, 3500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(50, 5, 60, 2, 1800, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(51, 5, 63, 1, 17000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(52, 5, 65, 2, 23000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(53, 5, 67, 4, 1450, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(54, 5, 68, 2, 1800, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(55, 5, 69, 3, 1800, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(56, 5, 70, 1, 4000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(57, 5, 72, 12, 650, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(58, 5, 73, 15, 650, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(59, 5, 74, 2, 1200, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(60, 5, 75, 1, 1200, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(61, 5, 78, 2, 3500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(62, 5, 79, 8, 24000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(63, 5, 80, 4, 15000, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(64, 5, 82, 2, 11500, '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(65, 6, 44, 1, 2200, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(66, 6, 53, 6, 550, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(67, 6, 86, 20, 520, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(68, 6, 88, 9, 450, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(69, 6, 92, 8, 900, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(70, 6, 91, 0, 2800, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(71, 6, 95, 4, 950, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(72, 6, 106, 150, 70, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(73, 6, 107, 100, 35, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(74, 6, 112, 37, 320, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(75, 6, 113, 14, 64, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(76, 6, 115, 2, 950, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(77, 6, 116, 30, 480, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(78, 6, 117, 30, 138, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(79, 6, 118, 40, 300, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(80, 6, 119, 5, 600, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(81, 6, 120, 5, 540, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(82, 6, 121, 5, 540, '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(83, 7, 62, 1, 17000, '2023-02-09 13:35:32', '2023-02-09 13:35:32'),
(84, 7, 64, 1, 25000, '2023-02-09 13:35:32', '2023-02-09 13:35:32'),
(85, 8, 49, 1, 24000, '2023-02-09 13:43:19', '2023-02-09 13:43:19'),
(86, 8, 54, 3, 700, '2023-02-09 13:43:19', '2023-02-09 13:43:19'),
(87, 8, 109, 4, 16500, '2023-02-09 13:43:19', '2023-02-09 13:43:19'),
(88, 8, 110, 1, 8000, '2023-02-09 13:43:19', '2023-02-09 13:43:19'),
(89, 9, 105, 3, 2200, '2023-02-09 13:45:44', '2023-02-09 13:45:44'),
(90, 9, 104, 8, 1000, '2023-02-09 13:45:44', '2023-02-09 13:45:44'),
(91, 4, 3, 1, 1800, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(92, 4, 6, 2, 2500, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(93, 4, 8, 18, 350, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(94, 4, 9, 13, 360, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(95, 4, 10, 18, 580, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(96, 4, 11, 1, 1650, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(97, 4, 15, 95, 80, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(98, 4, 16, 27, 150, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(99, 4, 17, 28, 150, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(100, 4, 19, 1, 750, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(101, 4, 41, 4, 350, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(102, 4, 42, 32, 450, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(103, 4, 99, 5, 5500, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(104, 4, 101, 1, 25000, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(105, 4, 102, 4, 400, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(106, 4, 103, 1, 600, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(107, 4, 90, 2, 3000, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(108, 4, 97, 1, 4500, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(109, 4, 123, 12, 450, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(110, 4, 124, 13, 450, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(111, 4, 125, 9, 4200, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(112, 4, 131, 1, 950, '2023-02-09 13:51:39', '2023-02-09 13:51:39'),
(113, 10, 137, 1, 45000, '2023-02-09 13:55:09', '2023-02-09 13:55:09'),
(114, 10, 147, 1, 75000, '2023-02-09 13:55:09', '2023-02-09 13:55:09'),
(116, 12, 236, 13, 236, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(117, 12, 235, 42, 440, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(118, 12, 234, 26, 230, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(119, 12, 233, 45, 180, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(120, 12, 232, 12, 180, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(121, 12, 231, 1, 224, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(122, 12, 230, 1, 190, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(123, 12, 229, 12, 145, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(124, 12, 228, 4, 344, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(125, 12, 227, 1, 452, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(126, 12, 226, 2, 475, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(127, 12, 225, 15, 220, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(128, 12, 224, 41, 220, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(129, 12, 223, 10, 100, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(130, 12, 222, 66, 80, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(131, 12, 221, 13, 80, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(132, 12, 220, 33, 65, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(133, 12, 219, 10, 150, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(134, 12, 197, 37, 140, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(135, 12, 196, 32, 65, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(136, 12, 195, 40, 70, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(137, 12, 187, 5, 1020, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(138, 12, 186, 6, 400, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(139, 12, 185, 6, 260, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(140, 12, 184, 0, 184, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(141, 12, 183, 5, 705, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(142, 12, 182, 6, 511, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(143, 12, 181, 6, 365, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(144, 12, 180, 49, 120, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(145, 12, 179, 51, 102, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(146, 12, 178, 39, 72, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(147, 12, 177, 16, 145, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(148, 12, 176, 48, 78, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(149, 12, 175, 76, 62, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(150, 12, 174, 40, 50, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(151, 12, 173, 2, 180, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(152, 12, 172, 25, 92, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(153, 12, 171, 69, 84, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(154, 12, 170, 15, 48, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(155, 12, 169, 57, 208, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(156, 12, 168, 68, 72, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(157, 12, 167, 55, 70, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(158, 12, 166, 53, 36, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(159, 12, 165, 7, 600, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(160, 12, 164, 57, 416, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(161, 12, 163, 23, 204, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(162, 12, 162, 57, 140, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(163, 12, 161, 48, 215, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(164, 12, 160, 50, 100, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(165, 12, 159, 72, 74, '2023-02-18 15:09:45', '2023-02-18 15:09:45'),
(166, 12, 158, 52, 51, '2023-02-18 15:09:45', '2023-02-18 15:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `paid_amount` bigint(20) NOT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `total_amount` bigint(20) NOT NULL,
  `shipping_charges` int(11) NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `tax` int(11) NOT NULL DEFAULT '0',
  `GrandTotal` int(11) DEFAULT NULL,
  `purchase_desc` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `account_id`, `supplier_id`, `paid_amount`, `delivery_date`, `entry_date`, `total_amount`, `shipping_charges`, `discount`, `tax`, `GrandTotal`, `purchase_desc`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 15, 152780, '26-01-2023', '2023-02-04', 149430, 3350, 0, 0, 152780, NULL, 'Recieved', '2023-02-04 13:43:29', '2023-02-04 13:43:29'),
(4, 3, 1, 4, 3040, '30-12-2022', '2023-02-09', 177470, 0, 0, 0, 177470, NULL, 'Recieved', '2023-02-08 22:56:09', '2023-02-09 13:51:39'),
(5, 3, 1, 3, 1000000, '30-12-2022', '2023-02-09', 993950, 0, 0, 0, 993950, NULL, 'Recieved', '2023-02-09 13:04:09', '2023-02-09 13:04:09'),
(6, 3, 1, 14, 98526, '30-12-2022', '2023-02-09', 98526, 0, 0, 0, 98526, NULL, 'Recieved', '2023-02-09 13:16:27', '2023-02-09 13:16:27'),
(7, 3, 1, 2, 42000, '30-12-2022', '2023-02-09', 42000, 0, 0, 0, 42000, NULL, 'Recieved', '2023-02-09 13:35:32', '2023-02-09 13:35:32'),
(8, 3, 1, 5, 100100, '30-12-2022', '2023-02-09', 100100, 0, 0, 0, 100100, NULL, 'Recieved', '2023-02-09 13:43:19', '2023-02-09 13:43:19'),
(9, 3, 1, 8, 14600, '30-12-2022', '2023-02-09', 14600, 0, 0, 0, 14600, NULL, 'Recieved', '2023-02-09 13:45:44', '2023-02-09 13:45:44'),
(10, 3, 1, 12, 0, '30-12-2022', '2023-02-09', 120000, 0, 0, 0, 120000, NULL, 'Recieved', '2023-02-09 13:55:09', '2023-02-09 13:55:09'),
(12, 3, 1, 7, 40000, '31-12-2022', '2023-02-18', 216142, 6000, 0, 0, 222142, NULL, 'Recieved', '2023-02-18 15:09:45', '2023-02-18 15:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `plant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quote_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` int(11) NOT NULL DEFAULT '0',
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` int(11) NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_converted_to_sale` tinyint(1) DEFAULT '0' COMMENT '0 => not converted to sale 1 => converted to sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `customer_id`, `plant_id`, `user_id`, `quote_date`, `quote_validity`, `quote_type`, `tax`, `total_amount`, `shipping_charges`, `discount`, `created_at`, `updated_at`, `is_converted_to_sale`) VALUES
(5, 5, 2, 3, '14-01-2023', '19-01-2023', 'Official', 0, '13020', 0, 0, '2023-01-14 16:11:52', '2023-01-14 16:11:52', 0),
(6, 5, 2, 3, '14-01-2023', '19-01-2023', 'Official', 0, '30900', 0, 0, '2023-01-14 16:18:29', '2023-01-14 16:48:05', 0),
(7, 6, 3, 3, '14-01-2023', '19-01-2023', 'Official', 0, '241890', 0, 0, '2023-01-14 17:08:48', '2023-01-14 17:30:56', 0),
(8, 11, 5, 3, '09-02-2023', '14-02-2023', 'Official', 0, '669560', 30000, 0, '2023-01-16 12:12:35', '2023-02-09 15:50:18', 0),
(9, 7, 5, 3, '16-01-2023', '21-01-2023', 'Official', 0, '767260', 30000, 0, '2023-01-16 12:25:13', '2023-01-16 12:25:13', 0),
(10, 8, 2, 3, '29-01-2023', '02-02-2023', 'Official', 0, '0', 0, 0, '2023-01-29 19:00:24', '2023-01-29 19:07:30', 0),
(11, 11, 5, 3, '09-02-2023', '14-02-2023', 'Official', 0, '751820', 0, 0, '2023-02-09 16:07:13', '2023-02-09 16:07:13', 0),
(12, 11, 5, 3, '09-02-2023', '09-02-2023', 'Official', 0, '754360', 0, 0, '2023-02-09 16:21:21', '2023-02-09 16:21:21', 0),
(13, 12, 5, 3, '12-02-2023', '17-02-2023', 'Official', 0, '878200', 0, 0, '2023-02-13 12:09:39', '2023-02-13 12:53:20', 0),
(14, 13, 6, 3, '14-02-2023', '19-02-2023', 'Official', 0, '797480', 0, 0, '2023-02-14 18:09:59', '2023-02-14 18:09:59', 0),
(15, 13, 5, 3, '18-02-2023', '18-02-2023', 'Official', 0, '767260', 0, 0, '2023-02-19 00:14:25', '2023-02-19 00:14:25', 0),
(16, 2, 4, 3, '20-02-2023', '22-02-2023', 'Official', 0, '428940', 0, 0, '2023-02-20 14:54:15', '2023-02-20 14:54:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quote_products`
--

CREATE TABLE `quote_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quote_products`
--

INSERT INTO `quote_products` (`id`, `quote_id`, `product_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(61, 5, 1, '18', '490', '2023-01-14 16:11:52', '2023-01-14 16:11:52'),
(62, 5, 118, '10', '420', '2023-01-14 16:11:52', '2023-01-14 16:11:52'),
(73, 6, 41, '50', '450', '2023-01-14 16:48:05', '2023-01-14 16:48:05'),
(74, 6, 118, '20', '420', '2023-01-14 16:48:05', '2023-01-14 16:48:05'),
(82, 7, 108, '1', '25000', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(83, 7, 1, '1', '490', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(84, 7, 39, '1', '140000', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(85, 7, 84, '1', '42000', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(86, 7, 43, '1', '4200', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(87, 7, 204, '1', '2200', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(88, 7, 40, '1', '28000', '2023-01-14 17:30:56', '2023-01-14 17:30:56'),
(187, 9, 1, '4', '490', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(188, 9, 55, '4', '4000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(189, 9, 86, '4', '850', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(190, 9, 90, '1', '7500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(191, 9, 91, '1', '2800', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(192, 9, 92, '1', '2500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(193, 9, 95, '3', '950', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(194, 9, 99, '1', '9000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(195, 9, 109, '3', '19500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(196, 9, 140, '1', '58000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(197, 9, 151, '1', '110000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(198, 9, 154, '3', '2800', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(199, 9, 155, '1', '14500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(200, 9, 156, '1', '26500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(201, 9, 204, '1', '2200', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(202, 9, 200, '1', '6500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(203, 9, 96, '1', '4800', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(204, 9, 63, '2', '19500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(205, 9, 68, '2', '2800', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(206, 9, 72, '1', '750', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(207, 9, 73, '2', '750', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(208, 9, 76, '2', '4000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(209, 9, 36, '1', '94000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(210, 9, 45, '2', '7500', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(211, 9, 84, '1', '42000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(212, 9, 215, '1', '65000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(213, 9, 216, '1', '40000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(214, 9, 214, '1', '50000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(215, 9, 218, '1', '29000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(216, 9, 217, '1', '42000', '2023-01-16 12:25:13', '2023-01-16 12:25:13'),
(239, 10, 216, '1', '40000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(240, 10, 215, '1', '35000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(241, 10, 218, '1', '29000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(242, 10, 43, '1', '4200', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(243, 10, 67, '2', '1800', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(244, 10, 72, '1', '750', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(245, 10, 73, '2', '750', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(246, 10, 88, '3', '650', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(247, 10, 60, '3', '2000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(248, 10, 7, '3', '260', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(249, 10, 61, '2', '14500', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(250, 10, 76, '2', '4000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(251, 10, 91, '1', '1400', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(252, 10, 92, '1', '2500', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(253, 10, 90, '1', '3750', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(254, 10, 150, '1', '110500', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(255, 10, 32, '2', '42000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(256, 10, 82, '2', '12500', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(257, 10, 109, '1', '19500', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(258, 10, 154, '1', '2800', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(259, 10, 155, '1', '14500', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(260, 10, 214, '1', '40000', '2023-01-29 19:07:30', '2023-01-29 19:07:30'),
(261, 8, 1, '4', '495', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(262, 8, 55, '4', '4000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(263, 8, 86, '4', '850', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(264, 8, 90, '1', '7500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(265, 8, 91, '1', '2800', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(266, 8, 92, '1', '2500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(267, 8, 95, '3', '950', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(268, 8, 99, '1', '9000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(269, 8, 109, '3', '19500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(270, 8, 154, '3', '2800', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(271, 8, 155, '1', '14500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(272, 8, 156, '1', '26500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(273, 8, 200, '1', '6500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(274, 8, 96, '1', '4800', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(275, 8, 63, '2', '19500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(276, 8, 68, '2', '2800', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(277, 8, 72, '1', '750', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(278, 8, 73, '2', '750', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(279, 8, 76, '2', '4000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(280, 8, 36, '1', '94000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(281, 8, 45, '2', '7500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(282, 8, 84, '1', '42000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(283, 8, 215, '1', '65000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(284, 8, 216, '1', '40000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(285, 8, 214, '1', '50000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(286, 8, 218, '1', '29000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(287, 8, 102, '1', '1500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(288, 8, 104, '1', '2500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(289, 8, 105, '1', '5500', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(290, 8, 135, '1', '35000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(291, 8, 146, '1', '70000', '2023-02-09 15:50:18', '2023-02-09 15:50:18'),
(321, 11, 1, '4', '630', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(322, 11, 55, '4', '4500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(323, 11, 86, '4', '950', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(324, 11, 90, '1', '9500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(325, 11, 91, '1', '3800', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(326, 11, 92, '1', '3500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(327, 11, 95, '3', '1150', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(328, 11, 99, '1', '14000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(329, 11, 109, '2', '21500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(330, 11, 154, '2', '3500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(331, 11, 155, '1', '16500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(332, 11, 156, '1', '33000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(333, 11, 204, '1', '5200', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(334, 11, 200, '1', '7200', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(335, 11, 96, '1', '8300', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(336, 11, 63, '2', '21000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(337, 11, 68, '2', '3800', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(338, 11, 72, '1', '950', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(339, 11, 73, '2', '950', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(340, 11, 76, '2', '5500', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(341, 11, 36, '1', '102800', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(342, 11, 45, '2', '9800', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(343, 11, 84, '1', '44000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(344, 11, 215, '1', '75000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(345, 11, 216, '1', '47000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(346, 11, 214, '1', '60000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(347, 11, 218, '1', '44200', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(348, 11, 135, '1', '37000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(349, 11, 146, '1', '80000', '2023-02-09 16:13:50', '2023-02-09 16:13:50'),
(350, 12, 1, '4', '640', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(351, 12, 55, '4', '4500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(352, 12, 86, '4', '950', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(353, 12, 90, '1', '9500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(354, 12, 91, '1', '3800', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(355, 12, 92, '1', '3500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(356, 12, 95, '3', '1150', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(357, 12, 99, '1', '14000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(358, 12, 109, '2', '21500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(359, 12, 154, '2', '3000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(360, 12, 155, '1', '17500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(361, 12, 156, '1', '33500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(362, 12, 204, '1', '5200', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(363, 12, 200, '1', '7200', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(364, 12, 96, '1', '8300', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(365, 12, 63, '2', '21000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(366, 12, 68, '2', '3800', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(367, 12, 72, '1', '950', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(368, 12, 73, '2', '950', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(369, 12, 76, '2', '5500', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(370, 12, 36, '1', '120800', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(371, 12, 45, '2', '9800', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(372, 12, 84, '1', '44000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(373, 12, 215, '1', '75000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(374, 12, 216, '1', '47000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(375, 12, 214, '1', '60000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(376, 12, 218, '1', '44200', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(377, 12, 135, '1', '37000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(378, 12, 146, '1', '64000', '2023-02-09 16:21:21', '2023-02-09 16:21:21'),
(475, 13, 55, '2', '4000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(476, 13, 86, '2', '850', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(477, 13, 95, '3', '950', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(478, 13, 99, '1', '9000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(479, 13, 109, '4', '19500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(480, 13, 154, '4', '2800', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(481, 13, 204, '1', '2200', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(482, 13, 200, '1', '6500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(483, 13, 96, '1', '4800', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(484, 13, 63, '2', '19500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(485, 13, 68, '2', '2800', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(486, 13, 72, '1', '750', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(487, 13, 73, '2', '750', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(488, 13, 76, '2', '4000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(489, 13, 36, '1', '106000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(490, 13, 45, '1', '7500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(491, 13, 84, '1', '42000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(492, 13, 215, '1', '65000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(493, 13, 216, '1', '45000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(494, 13, 214, '1', '55000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(495, 13, 218, '1', '34000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(496, 13, 40, '1', '28000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(497, 13, 105, '1', '5500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(498, 13, 104, '1', '2500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(499, 13, 90, '1', '7500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(500, 13, 91, '2', '2800', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(501, 13, 92, '2', '2500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(502, 13, 140, '1', '62500', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(503, 13, 151, '1', '122000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(504, 13, 155, '2', '18000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(505, 13, 156, '2', '35000', '2023-02-13 12:53:20', '2023-02-13 12:53:20'),
(506, 14, 36, '2', '106000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(507, 14, 43, '1', '4500', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(508, 14, 55, '4', '5870', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(509, 14, 66, '2', '30500', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(510, 14, 69, '2', '3000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(511, 14, 72, '1', '750', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(512, 14, 73, '2', '750', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(513, 14, 80, '2', '18000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(514, 14, 85, '1', '60000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(515, 14, 90, '1', '7500', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(516, 14, 91, '1', '2800', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(517, 14, 92, '2', '2500', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(518, 14, 95, '3', '950', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(519, 14, 96, '1', '5500', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(520, 14, 109, '1', '22500', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(521, 14, 137, '1', '55000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(522, 14, 147, '1', '80900', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(523, 14, 154, '1', '3800', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(524, 14, 218, '1', '30700', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(525, 14, 216, '1', '40700', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(526, 14, 215, '1', '85000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(527, 14, 214, '1', '50000', '2023-02-14 18:09:59', '2023-02-14 18:09:59'),
(528, 15, 1, '4', '490', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(529, 15, 55, '4', '4000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(530, 15, 86, '4', '850', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(531, 15, 90, '1', '7500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(532, 15, 91, '1', '2800', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(533, 15, 92, '1', '2500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(534, 15, 95, '3', '950', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(535, 15, 99, '1', '9000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(536, 15, 109, '3', '19500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(537, 15, 140, '1', '58000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(538, 15, 151, '1', '110000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(539, 15, 154, '3', '2800', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(540, 15, 155, '1', '14500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(541, 15, 156, '1', '26500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(542, 15, 204, '1', '2200', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(543, 15, 200, '1', '6500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(544, 15, 96, '1', '4800', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(545, 15, 63, '2', '19500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(546, 15, 68, '2', '2800', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(547, 15, 72, '1', '750', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(548, 15, 73, '2', '750', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(549, 15, 76, '2', '4000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(550, 15, 36, '1', '94000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(551, 15, 45, '2', '7500', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(552, 15, 84, '1', '42000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(553, 15, 215, '1', '65000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(554, 15, 216, '1', '40000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(555, 15, 214, '1', '50000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(556, 15, 218, '1', '29000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(557, 15, 217, '1', '42000', '2023-02-19 00:14:25', '2023-02-19 00:14:25'),
(558, 16, 7, '4', '260', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(559, 16, 32, '2', '42000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(560, 16, 43, '1', '4200', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(561, 16, 60, '4', '2000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(562, 16, 61, '2', '14500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(563, 16, 68, '2', '2800', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(564, 16, 72, '2', '750', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(565, 16, 73, '1', '750', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(566, 16, 76, '2', '4000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(567, 16, 82, '2', '12500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(568, 16, 88, '4', '650', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(569, 16, 91, '1', '2800', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(570, 16, 92, '1', '2500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(571, 16, 90, '1', '7500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(572, 16, 95, '1', '950', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(573, 16, 99, '1', '9000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(574, 16, 102, '1', '1500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(575, 16, 104, '1', '2500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(576, 16, 105, '1', '5500', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(577, 16, 137, '1', '50000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(578, 16, 147, '1', '85000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(579, 16, 216, '1', '30000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(580, 16, 215, '1', '32000', '2023-02-20 14:54:15', '2023-02-20 14:54:15'),
(581, 16, 214, '1', '30000', '2023-02-20 14:54:15', '2023-02-20 14:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `paid_amount` bigint(20) NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `shipping_charges` int(11) NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sale_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unofficial',
  `tax` int(11) NOT NULL DEFAULT '0',
  `Company_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `account_id`, `customer_id`, `paid_amount`, `total_amount`, `shipping_charges`, `discount`, `sales_date`, `status`, `Sale_type`, `tax`, `Company_id`, `created_at`, `updated_at`) VALUES
(12, 3, 14, 14, 560, 560, 0, 0, '13-03-2023', 'Delivered', 'Unofficial', 0, 2, '2023-03-13 17:26:08', '2023-03-13 17:26:08'),
(13, 3, 14, 15, 0, 5000, 0, 0, '13-03-2023', 'Delivered', 'Unofficial', 0, 2, '2023-03-13 17:33:21', '2023-03-13 17:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `salesproducts`
--

CREATE TABLE `salesproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `saleid` bigint(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesproducts`
--

INSERT INTO `salesproducts` (`id`, `saleid`, `quantity`, `price`, `created_at`, `updated_at`, `product_id`) VALUES
(17, 12, 2, 280, '2023-03-13 17:26:08', '2023-03-13 17:26:08', 7),
(25, 13, 1, 950, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 25),
(26, 13, 1, 950, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 26),
(27, 13, 1, 250, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 20),
(28, 13, 1, 600, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 21),
(29, 13, 1, 600, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 22),
(30, 13, 1, 850, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 51),
(31, 13, 1, 800, '2023-03-13 17:33:57', '2023-03-13 17:33:57', 237);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_cate_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`, `size_cate_code`, `size_desc`, `cate_id`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'PPF (China) 665-gram', '01', 'Filter PPF  (China) 665-gram', 1, '2023-01-02 04:02:07', '2023-01-02 04:02:07', 3),
(2, 'CTO (China)', '02', 'Filter CTO (China)', 1, '2023-01-02 04:06:53', '2023-01-02 04:06:53', 3),
(3, 'PPF (China)1000-Gram', '03', 'PPF (China)1000-Gram', 1, '2023-01-02 04:12:41', '2023-01-02 04:12:41', 3),
(6, 'CTO (Vietnam)', '04', 'CTO (Vietnam)', 1, '2023-01-02 04:14:59', '2023-01-02 04:14:59', 3),
(7, 'GAC (Pak)', '05', 'GAC (Pak)', 1, '2023-01-02 04:16:29', '2023-01-02 04:16:29', 3),
(8, 'GAC (China)', '06', 'GAC (China)', 1, '2023-01-02 04:16:48', '2023-01-02 04:16:48', 3),
(9, 'Absoulute Filter', '07', 'Absoulute Filter', 1, '2023-01-03 01:15:37', '2023-01-03 01:15:37', 3),
(10, 'PPY Filter', '08', 'PPY Filter chaina', 1, '2023-01-03 01:16:59', '2023-01-03 01:16:59', 3),
(11, 'Filter Bag', '09', 'Filter Bag chaina', 1, '2023-01-03 01:17:55', '2023-01-03 01:17:55', 3),
(12, 'Natural pure', '10', 'Natural Pure filter housing', 2, '2023-01-03 01:19:12', '2023-01-03 01:19:12', 3),
(13, 'Blue Colour', '11', 'Blue Colour Filter Housing', 2, '2023-01-03 01:20:44', '2023-01-03 01:20:44', 3),
(14, 'White Colour', '12', 'Whiter Colour Filter Housing', 2, '2023-01-03 01:21:55', '2023-01-03 01:21:55', 3),
(15, 'Steel Filter Housing', '13', 'Steel Filter Housing', 2, '2023-01-03 01:22:51', '2023-01-03 01:22:51', 3),
(16, 'Multi Filter Cartridge', '14', 'Multi Filter Cartridge', 2, '2023-01-03 01:24:06', '2023-01-03 01:24:06', 3),
(17, 'Steel Filter Housing Plate', '15', 'Steel Filter Housing Plate', 3, '2023-01-03 01:26:22', '2023-01-03 01:26:22', 3),
(18, 'MS Couting Filter Housing Plate', '16', 'MS Couting Filter Housing Plate', 3, '2023-01-03 01:27:57', '2023-01-03 01:27:57', 3),
(19, 'Toray Membrane', '16', 'Toray Membrane chaina', 4, '2023-01-03 01:30:32', '2023-01-03 01:30:32', 3),
(20, 'Hydro 10 Membrane', '17', 'Hydro 10 Membrane', 4, '2023-01-03 01:31:44', '2023-01-03 01:31:44', 3),
(21, 'LG Membrane', '18', 'LG Membrane', 4, '2023-01-03 01:32:56', '2023-01-03 01:32:56', 3),
(22, 'Filmtec Membrane', '19', 'Filmtec Membrane chaina', 4, '2023-01-03 01:34:37', '2023-01-03 01:34:37', 3),
(23, 'Low Preesure White', '21', 'Low Pressure White', 5, '2023-01-03 01:36:18', '2023-01-03 01:36:18', 3),
(24, 'High Preesure White', '22', 'High Pressure White', 5, '2023-01-03 01:37:38', '2023-01-03 01:37:38', 3),
(25, 'Natural Colour', '23', 'Natural Colour Grey yellow tone', 6, '2023-01-03 01:47:41', '2023-01-03 01:47:41', 3),
(26, 'Blue Colour', '24', 'Blue colour vessel', 6, '2023-01-03 01:48:33', '2023-01-03 01:48:33', 3),
(27, 'Activated Carbon', '25', 'Activated Carbon black', 7, '2023-01-03 01:50:18', '2023-01-03 01:50:18', 3),
(28, 'Silica Sand', '26', 'Silica Sand', 7, '2023-01-03 01:52:32', '2023-01-03 01:52:32', 3),
(29, 'Gravel white', '27', 'Gravel white', 7, '2023-01-03 01:54:23', '2023-01-03 01:54:23', 3),
(30, 'Auto Multiport Wall chaina', '28', 'Black Auto Multiport Wall', 8, '2023-01-03 01:58:44', '2023-01-03 01:58:44', 3),
(31, 'Manual Multi Port wall', '29', 'Manual Multi port wall black', 8, '2023-01-03 02:00:10', '2023-01-03 02:00:10', 3),
(32, 'Chaina S.S UV', '30', 'Chaina Steelnessteel UV Importanat', 9, '2023-01-03 10:36:00', '2023-01-03 10:36:00', 3),
(33, 'Impotant UV S.S', '31', 'Important UV Steelnessteel', 9, '2023-01-03 10:37:30', '2023-01-03 10:37:30', 3),
(34, 'Chaina UV Plastic', '32', 'Chaina plastic UV loted', 9, '2023-01-03 10:38:48', '2023-01-03 10:38:48', 3),
(35, 'UV Lamp', '33', 'UV Lamp Glass', 9, '2023-01-03 10:39:35', '2023-01-03 10:39:35', 3),
(36, 'Quartz Glass', '34', 'UV lamp Quarts Glass', 9, '2023-01-03 10:44:51', '2023-01-03 10:44:51', 3),
(37, 'UV Blaster', '35', 'UV Blaster', 9, '2023-01-03 10:45:52', '2023-01-03 10:45:52', 3),
(38, 'UV Nuts + Rubber Rings', '36', 'UV Nuts + RUbber Rings', 9, '2023-01-03 10:47:31', '2023-01-03 10:47:31', 3),
(40, 'Chaina Flow Meter', '37', 'Chaina Flow Meter', 12, '2023-01-03 10:55:15', '2023-01-03 10:55:15', 3),
(41, 'Impotant Flow Meter', '38', 'Important Flow Meter', 12, '2023-01-03 10:56:11', '2023-01-03 10:56:11', 3),
(42, 'Online TDS Meter', '39', 'Online TDS Meter', 13, '2023-01-03 10:56:52', '2023-01-03 10:56:52', 3),
(43, 'Pen TDS Meter', '40', 'Pen TSD Meter', 13, '2023-01-03 10:58:16', '2023-01-03 10:58:16', 3),
(44, 'Online PH Meter', '41', 'Online PH Meter', 15, '2023-01-03 11:00:01', '2023-01-03 11:00:01', 3),
(45, 'Pen PH Meter', '42', 'Pen PH Meter', 15, '2023-01-03 11:00:52', '2023-01-03 11:00:52', 3),
(46, 'China Pressure Gauge', '43', 'China Pressure Gauge', 16, '2023-01-03 11:03:00', '2023-01-03 11:03:00', 3),
(47, 'Important Pressure Gauge', '44', 'Important Pressure Gauge', 16, '2023-01-03 11:04:25', '2023-01-03 11:04:25', 3),
(48, 'S.S Non Magnet Pipe', '45', 'S.S Non Magnet Pipe', 17, '2023-01-03 11:06:52', '2023-01-03 11:06:52', 3),
(49, 'Plastic Strainer', '46', 'Plastic Strainer Differnet Size', 18, '2023-01-03 11:08:33', '2023-01-03 11:08:33', 3),
(50, 'Minerals liquid', '47', 'minerals in Liquid foam', 19, '2023-01-05 02:01:56', '2023-01-05 02:01:56', 3),
(51, 'Minerals in powder', '48', 'Minerals in Powder foam', 19, '2023-01-05 02:05:48', '2023-01-05 02:05:48', 3),
(52, 'Cleaning Chemicals', '49', 'Cleaning Chemicals low PH / high PH', 19, '2023-01-05 02:07:25', '2023-01-05 02:07:25', 3),
(53, 'Low PH', '50', 'Low PH Cemicals', 19, '2023-01-05 02:09:14', '2023-01-05 02:09:14', 3),
(54, 'High PH Chemicals', '51', 'High PH Chemicals', 19, '2023-01-05 02:10:25', '2023-01-05 02:10:25', 3),
(55, 'China Minerals', '52', 'China Minerals / Chemicals', 19, '2023-01-05 02:14:11', '2023-01-05 02:14:11', 3),
(56, 'Japan Minerals', '53', 'Japan minerals / Chemicals', 19, '2023-01-05 02:15:29', '2023-01-05 02:15:29', 3),
(57, 'CNP China', '54', 'CNP China New Pump', 20, '2023-01-05 02:17:10', '2023-01-05 02:17:10', 3),
(58, 'Grandfos Brand New Pump', '55', 'Grandfos BrandNew Pump', 20, '2023-01-05 03:46:57', '2023-01-05 03:46:57', 3),
(59, 'Refurnished Pump', '56', 'Refurnished Pump Used Pump', 20, '2023-01-05 03:48:34', '2023-01-05 03:48:34', 3),
(60, 'Other Brand Pump', '57', 'Other Brand Pump', 20, '2023-01-05 03:49:33', '2023-01-05 03:49:33', 3),
(61, 'New Pump Brandnew', '58', 'Brand New Pump', 21, '2023-01-05 03:50:46', '2023-01-05 03:50:46', 3),
(62, 'Refurnished Pump', '59', 'Refurnished Used Pump', 21, '2023-01-05 03:51:56', '2023-01-05 03:51:56', 3),
(63, 'Domestic RO Plant Accessroies', '60', 'Domestic RO Plant Accessroies', 22, '2023-01-05 03:53:30', '2023-01-05 03:53:30', 3),
(64, 'Refurnished Dosing Pump', '61', 'Refurnished Used Pump', 23, '2023-01-05 03:54:24', '2023-01-05 03:54:24', 3),
(65, 'Pure Material water Tank', '62', 'Pure Material Water Tank Cristal White colour', 25, '2023-01-05 03:57:11', '2023-01-05 03:57:11', 3),
(66, 'Indoor Water Tank Used For Product', '63', 'Indoor water Tank Used For Product Different Size', 25, '2023-01-05 03:59:04', '2023-01-05 03:59:04', 3),
(67, 'Outdoor water Tank 4 ply Used For Raw Water', '64', 'Outdoor water Tank 4 ply Used For Raw Water', 25, '2023-01-05 04:00:39', '2023-01-05 04:00:39', 3),
(68, 'Max Flow PVC Fitting', '65', 'Max Flow PVC Fitting', 10, '2023-01-05 04:02:25', '2023-01-05 04:02:25', 3),
(69, 'Hydro Flow PVC Fitting', '66', 'Hydro Flow PVC Fitting', 10, '2023-01-05 04:04:49', '2023-01-05 04:04:49', 3),
(70, 'Max Flow PVC Fitting', '67', 'Flow Max Pvc Fitting', 10, '2023-01-05 04:08:55', '2023-01-05 04:08:55', 3),
(71, 'Steel Fitting', '68', 'Steelness steel Fitting', 10, '2023-01-05 04:09:54', '2023-01-05 04:09:54', 3),
(72, 'Pure Material Transparant Pipe', '69', 'Pure Material Transparant Piep', 11, '2023-01-05 04:11:57', '2023-01-05 04:11:57', 3),
(73, 'Colour Full Pipe', '70', 'Colour Full Pipe', 11, '2023-01-05 04:12:53', '2023-01-05 04:12:53', 3),
(74, 'PPF', '71', 'Filter PPF', 1, '2023-01-05 14:35:04', '2023-01-05 14:35:04', 3),
(75, 'PPF Filter Vietnam', '72', 'PPF Filter Vietnam', 1, '2023-01-05 15:10:30', '2023-01-05 15:10:30', 3),
(76, 'CTO Vietnam', '73', 'CTO Vietnam', 1, '2023-01-05 15:10:53', '2023-01-05 15:10:53', 3),
(77, 'GAC Vietnam', '74', 'GAC Vietnam', 1, '2023-01-05 15:11:19', '2023-01-05 15:11:19', 3),
(78, 'Domestic RO Plant', '75', 'Domestic RO Plant', 1, '2023-01-05 15:57:30', '2023-01-05 15:57:30', 3),
(79, 'Domestic RO Plant', '76', 'Membrane Domestic RO Plant', 4, '2023-01-05 16:28:41', '2023-01-05 16:28:41', 3),
(80, 'RTL Membrane', '77', 'RTL Membrane', 4, '2023-01-05 16:57:28', '2023-01-05 16:57:28', 3),
(81, 'UF Membrane', '78', 'UF Membrane', 4, '2023-01-05 17:12:07', '2023-01-05 17:12:07', 3),
(82, 'Ro Plant Parts', '79', 'Ro Plant Different Parts', 27, '2023-01-05 18:42:56', '2023-01-05 18:42:56', 2),
(84, 'Brand New', '80', 'Dosing Pump New', 23, '2023-01-09 16:24:57', '2023-01-09 16:24:57', 3),
(85, 'Service Charges', '81', 'Pure water Service Charges', 28, '2023-01-14 12:05:22', '2023-01-14 12:05:22', 3),
(86, 'Labour Charges', '82', 'labour Charges', 28, '2023-01-14 12:05:56', '2023-01-14 12:05:56', 3),
(87, 'Labour + Service Charges', '83', 'Labour + Service Charges', 28, '2023-01-14 12:06:54', '2023-01-14 12:06:54', 3),
(88, 'Assembly Charges', '84', 'Assembly Charges', 28, '2023-01-14 12:09:12', '2023-01-14 12:09:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `specificationname` varchar(150) NOT NULL,
  `partno` varchar(150) NOT NULL,
  `capacity` varchar(150) NOT NULL,
  `boosterpump` varchar(150) NOT NULL,
  `highpressurepump` varchar(150) NOT NULL,
  `filterhousing` varchar(150) NOT NULL,
  `frpmultimedia` varchar(150) NOT NULL,
  `frpmembranehousing` varchar(150) NOT NULL,
  `membrane` varchar(150) NOT NULL,
  `waterqualityindicators` varchar(150) NOT NULL,
  `flowmeters` varchar(150) NOT NULL,
  `pressuregauges` varchar(150) NOT NULL,
  `waterlevelindicator` varchar(150) NOT NULL,
  `lowpressureswitch` varchar(150) NOT NULL,
  `autoflashsystem` varchar(150) NOT NULL,
  `roframeparts` varchar(150) NOT NULL,
  `electricalcontrols` varchar(150) NOT NULL,
  `cip` varchar(150) NOT NULL,
  `dimension` varchar(150) NOT NULL,
  `uvsterilization` varchar(150) NOT NULL,
  `mineralization` varchar(150) NOT NULL,
  `assiscalantchemical` varchar(150) NOT NULL,
  `storagetanks` varchar(150) NOT NULL,
  `feedwater` varchar(150) NOT NULL,
  `tds` varchar(150) NOT NULL,
  `sdi` varchar(150) NOT NULL,
  `turbiditylevel` varchar(150) NOT NULL,
  `iron` varchar(150) NOT NULL,
  `ph` varchar(150) NOT NULL,
  `oxidizer` varchar(150) NOT NULL,
  `hardness` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `specificationname`, `partno`, `capacity`, `boosterpump`, `highpressurepump`, `filterhousing`, `frpmultimedia`, `frpmembranehousing`, `membrane`, `waterqualityindicators`, `flowmeters`, `pressuregauges`, `waterlevelindicator`, `lowpressureswitch`, `autoflashsystem`, `roframeparts`, `electricalcontrols`, `cip`, `dimension`, `uvsterilization`, `mineralization`, `assiscalantchemical`, `storagetanks`, `feedwater`, `tds`, `sdi`, `turbiditylevel`, `iron`, `ph`, `oxidizer`, `hardness`, `created_at`, `updated_at`, `created_by`) VALUES
(1, '1500 GPD Ro Plant (N)', '01', '250 Liter Per Hour', '2-40/Faisal Pump Model F2', '2-11 CNP Brandnew', '20\" Slim', '10-54 With Multiport Valve', '40x40', '40x40', 'Online single TDS Meter', '5 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 3/4\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Digital Dosing PumpWith Pure 80L Tank', 'Digital Dosing PumpWith Pure 80L Tank', '1000 Liter', '2000 to 2500', '100 to 250', 'o', '0.5 NTU before disinfection at all times and an average of 0.2 NTU or less', 'no', '6 to 7', 'no', 'o', '2023-01-10 17:52:48', '2023-01-10 18:22:37', 3),
(2, '1500 GPD Ro Plant (R)', '02 (R)', '250 Liter Per Hour', '2-40/Faisal Pump Model F2', '2-11 CNP (Refurnished)', '20\" Slim', '10-54 With Multiport Valve', '40x40', '40x40', 'Online single TDS Meter', '5 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 3/4\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Blending', 'NO', '1000 Liter', '2000 to 2500', '100 to 250', '0', '0.5 NTU before disinfection at all times and an average of 0.2 NTU or less', 'no', '6 to 7', 'no', 'o', '2023-01-10 18:21:08', '2023-01-10 18:23:19', 3),
(3, '3000 GPD Ro Plant (R)', '03', '500 Liter Per Hour', '2-40 Grundfos(Refurnished)', '2-11 Grundfos(Refurnished)', '20\" Slim', '10-54 With Multiport Valve', '40x40', '40x40', 'Online single TDS Meter', '5 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 3/4\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Blending', 'Antiscalant Dosing Pump With Tank', '1000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 18:29:08', '2023-01-11 19:15:28', 3),
(4, '3000 GPD Ro Plant (N)', '04', '500 Liter Per Hour', '2-40 CNP Brandnew', '2-11 CNP Brandnew', '20\" Slim', '10-54 With Multiport Valve', '40x40', '40x40', 'Online single TDS Meter', '5 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 3/4\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Calcium chloride / Magnesium sulphate', 'Antiscalant Dosing Pump With Tank', '1000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 18:33:26', '2023-01-11 18:33:26', 3),
(5, '4500 GPD Ro Plant', '05', '750 Liter Per Hour', '2-40 CNP Brandnew', '2-15 CNP Brandnew', '20\" Slim', '13-54 With Multiport Valve', '40x40', '40x40', 'Online single TDS Meter', '10 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 3/4\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Calcium chloride / Magnesium sulphate', 'Antiscalant Dosing Pump With Tank', '1000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 18:36:48', '2023-01-11 18:36:48', 3),
(6, '6000 GPD Ro Plant', '06', '1000 Liter Per Hour', '4-40 CNP Brandnew', '4-12 CNP Brandnew', '20\" Jumbo', '13-54 With Multiport Valve', '80x80', '80x80', 'Online 3in1 TDS Meter', '10 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 1\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online 3in1 TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Calcium chloride / Magnesium sulphate', 'Antiscalant Dosing Pump With Tank', '1000+2000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 18:41:55', '2023-01-16 12:27:52', 3),
(7, '12000 GPM Ro Plant', '07', '2000 Liter Per Hour', '4-60 CNP Brandnew', '4-16 CNP Brandnew', '20\" Jumbo', '16-65 With Multiport Valve', '80x80', '80x80', 'Online 3in1 TDS Meter', '20 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 1\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online 3in1 TDS Meter Size 21\"x24\"', 'Yes', '84Inch Length / 42Inch Width / 64Inch height', '20 GPM', 'Calcium chloride / Magnesium sulphate', 'Antiscalant Dosing Pump With Tank', '1000+2000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 18:52:21', '2023-01-11 18:52:21', 3),
(8, '4500 GPD Ro Plant (R)', '07', '750 Liter Per Hour', '2-40 Grundfos(Refurnished)', '2-15 CNP  Grundfos(Refurnished)', '20\" Slim', '13-54 With Multiport Valve', '40x40', '40x40', 'Online single TDS Meter', '10 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 3/4\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Blending', 'Antiscalant Dosing Pump With Tank', '1000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 19:21:30', '2023-01-11 19:21:30', 3),
(9, '6000 GPD Ro Plant (N)', '08', '1000 Liter Per Hour', '4-40', '4-12', '20\" Jumbo', '13-54 With Multiport Valve', '80x80', '80x80', 'Online single TDS Meter', '10 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 1\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online TDS Meter Size 21\"x24\"', 'Yes', '72Inch Length / 36Inch Width / 64Inch height', '10 GPM', 'Blending', 'Antiscalant Dosing Pump With Tank', '1000+2000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 19:29:22', '2023-02-09 16:11:29', 3),
(10, '12000 GPM Ro Plant (R)', '09', '2000 Liter Per Hour', '4-60  Grundfos(Refurnished)', '4-16  Grundfos(Refurnished)', '20\" Jumbo', '16-65 With Multiport Valve', '80x80', '80x80', 'Online 3in1 TDS Meter', '20 GPM', '150+300 Psi', 'Float Switch', 'Denfos 7.5 Bar', 'Selonoid Valve S.S 1\"', 'S.S 1.5\"x1.5\" Non Magnet', 'Fully Automatic Panal With Online 3in1 TDS Meter Size 21\"x24\"', 'Yes', '84Inch Length / 42Inch Width / 64Inch height', '20 GPM', 'Calcium chloride / Magnesium sulphate', 'Antiscalant Dosing Pump With Tank', '1000+2000+2000 Liter', '<1500', '100 to 250', '<3', '<1NTU', '<0.1PPM', '6.5 to 8.5', '<0PPM', '<5PPM', '2023-01-11 19:38:51', '2023-01-11 19:38:51', 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `Name`, `Email`, `Phone`, `company`, `City`, `Address`, `Description`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Idrees Qureshi', 'Idreesqureshi@gmail.com', '03219497771', 'HYdrogig', 'Lahore', 'Faroozpur road lahore', 'Supplyer', '2023-01-11 00:42:22', '2023-01-11 00:42:22', 3),
(2, 'Kawaja Tanveer', 'Kawajatanveer@gmail.com', '03219497702', 'Plazma water', 'Lahore', 'Lahore', 'Importer Lahaore', '2023-01-11 00:48:26', '2023-01-11 00:48:26', 3),
(3, 'Shahid Aziz', 'MianShahid@gmail.com', '03219632470', 'SA Trader', 'Multan', 'Multan', 'Multan', '2023-01-11 00:59:33', '2023-01-11 00:59:33', 3),
(4, 'Mubashar', 'Mubasharlahore@gmail.com', '03014626681', 'Aqua Zoom', 'Lahore', 'Lahore', 'Lahore', '2023-01-11 01:01:20', '2023-01-11 01:01:20', 3),
(5, 'Muhammad Madni', 'Muhammadmadni@gmail.com', '03054647425', 'Water Mark', 'Lahore', 'Lahore', 'Lahore', '2023-01-11 01:02:45', '2023-01-11 01:02:45', 3),
(6, 'Waseem', 'waseemlahore@gmail.com', '03225480358', 'Flow Matic', 'Lahore', 'Lahore', 'Lahore', '2023-01-11 01:04:01', '2023-01-11 01:04:01', 3),
(7, 'Qasim', 'Qasimmaxflow@gmail.com', '03048888661', 'Max Flow', 'Lahore', 'Lahore', 'Lahore', '2023-01-11 01:05:29', '2023-01-11 01:05:29', 3),
(8, 'Ali Haneef', 'Alihaneef@gmail.com', '03098440000', 'Ali Haneef Trader', 'Lahore', 'Lahore', 'Lahore', '2023-01-11 01:07:01', '2023-01-11 01:07:01', 3),
(9, 'Mushtaq', 'Mushtaq@gmail.com', '03058350552', 'Mushtaq Industrial store', 'Faisalabad', 'Faisalabad', 'Faisalabad', '2023-01-11 01:08:53', '2023-01-11 01:08:53', 3),
(10, 'Malik Adnan', 'malikadnan@gmail.com', '03332000418', 'United max', 'Faisalabad', 'Faisalabad', 'Faisalabad', '2023-01-11 01:10:07', '2023-01-11 01:10:07', 3),
(11, 'Laique Ahmad', 'Liaquahmad@gmail.com', '03224810087', 'CNP', 'Lahore', 'Lahore', 'Lahore', '2023-01-11 01:11:55', '2023-01-11 01:11:55', 3),
(12, 'Tanveen khan', 'tanveerkhan@gmail.com', '03217269757', 'Saad Pump', 'Faisalabad', 'Faisalabad', 'Faisalabad', '2023-01-11 01:13:42', '2023-01-11 01:13:42', 3),
(13, 'Fsd Local', 'Fsdlocal@gmail.com', '03000000000', 'Local fsd', 'Faisalabad', 'Faisalabad', 'Local pushase of fsd', '2023-01-11 01:15:06', '2023-01-11 01:15:06', 3),
(14, 'Pure Water Service', 'pureqwater69@gmail.com', '06194780724', 'Pure Water', 'FAISALABAD', 'Samnabad', 'Own Laboure Service', '2023-01-11 18:34:19', '2023-01-11 18:34:19', 3),
(15, 'sh waqas', 'shwaqas@gmail.com', '03000000000', 'axtrone', 'Lahore', 'Lahore', 'lahore axtron', '2023-02-04 12:56:39', '2023-02-04 12:56:39', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `First_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `First_name`, `Last_name`, `phone`) VALUES
(2, 'Arbaz Ali', 'was@gmai.com', NULL, 'pakistan', 'Admin', NULL, '2022-12-03 05:48:31', '2022-12-26 23:14:06', 'Arbaz', 'Ali', '03092271214'),
(3, 'Arslan Mahmood', 'arslanmahmood0034@gmail.com', '2023-01-01 20:29:03', 'purewater46', 'Admin', NULL, '2023-01-02 03:29:03', '2023-01-02 04:33:23', 'Arslan', 'Mahmood', '0313-6666739');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `companysettings`
--
ALTER TABLE `companysettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`),
  ADD KEY `expenses_emp_id_foreign` (`emp_id`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `invoice_sales`
--
ALTER TABLE `invoice_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_sales_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_sales_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plants_user_id_foreign` (`user_id`),
  ADD KEY `specifiction_id` (`specifiction_id`);

--
-- Indexes for table `plant_products`
--
ALTER TABLE `plant_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_products_plant_id_foreign` (`plant_id`),
  ADD KEY `plant_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cate_id_foreign` (`cate_id`),
  ADD KEY `product_sub_cate_id_foreign` (`size_id`),
  ADD KEY `product_brand_id_foreign` (`brand_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `purchasedproducts`
--
ALTER TABLE `purchasedproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasedproducts_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchasedproducts_product_id_foreign` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_account_id_foreign` (`account_id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotes_customer_id_foreign` (`customer_id`),
  ADD KEY `quotes_plant_id_foreign` (`plant_id`),
  ADD KEY `quotes_user_id_foreign` (`user_id`);

--
-- Indexes for table `quote_products`
--
ALTER TABLE `quote_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_products_quote_id_foreign` (`quote_id`),
  ADD KEY `quote_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `sales_account_id_foreign` (`account_id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`),
  ADD KEY `Company_id` (`Company_id`);

--
-- Indexes for table `salesproducts`
--
ALTER TABLE `salesproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `salesproducts_ibfk_2` (`saleid`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `subcategories_cate_id_foreign` (`cate_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `companysettings`
--
ALTER TABLE `companysettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_sales`
--
ALTER TABLE `invoice_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plant_products`
--
ALTER TABLE `plant_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `purchasedproducts`
--
ALTER TABLE `purchasedproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quote_products`
--
ALTER TABLE `quote_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `salesproducts`
--
ALTER TABLE `salesproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice_sales`
--
ALTER TABLE `invoice_sales`
  ADD CONSTRAINT `invoice_sales_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_sales_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`specifiction_id`) REFERENCES `specifications` (`id`),
  ADD CONSTRAINT `plants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `plant_products`
--
ALTER TABLE `plant_products`
  ADD CONSTRAINT `plant_products_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`),
  ADD CONSTRAINT `plant_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `product_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_sub_cate_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `purchasedproducts`
--
ALTER TABLE `purchasedproducts`
  ADD CONSTRAINT `purchasedproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `purchasedproducts_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `quotes_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`),
  ADD CONSTRAINT `quotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quote_products`
--
ALTER TABLE `quote_products`
  ADD CONSTRAINT `quote_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `quote_products_quote_id_foreign` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Company_id`) REFERENCES `companysettings` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategories_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
