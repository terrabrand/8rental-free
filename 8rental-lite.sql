-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2024 at 11:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentall82`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_of_intended_start` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `property_applying_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_applying_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `date_of_intended_start`, `created_at`, `updated_at`, `deleted_at`, `property_applying_id`, `unit_applying_id`, `tenant_id`) VALUES
(1, '2024-04-07', '2024-03-22 10:17:33', '2024-03-22 10:17:33', NULL, 1, 1, 1),
(2, '2024-04-07', '2024-03-24 10:23:50', '2024-03-24 10:23:50', NULL, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anne Flowers', '2024-03-22 11:04:19', '2024-03-22 11:04:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_document_type`
--

CREATE TABLE `document_document_type` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `document_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_document_type`
--

INSERT INTO `document_document_type` (`document_id`, `document_type_id`) VALUES
(1, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_landlord`
--

CREATE TABLE `document_landlord` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `landlord_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_landlord`
--

INSERT INTO `document_landlord` (`document_id`, `landlord_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `document_property`
--

CREATE TABLE `document_property` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_property`
--

INSERT INTO `document_property` (`document_id`, `property_id`) VALUES
(1, 3),
(1, 5),
(1, 14),
(1, 15),
(1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `document_tenant`
--

CREATE TABLE `document_tenant` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_tenant`
--

INSERT INTO `document_tenant` (`document_id`, `tenant_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Receipts', '2024-03-22 11:03:05', '2024-03-22 11:03:05', NULL),
(2, 'contracts', '2024-03-22 11:03:32', '2024-03-22 11:03:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_unit`
--

CREATE TABLE `document_unit` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `document_unit`
--

INSERT INTO `document_unit` (`document_id`, `unit_id`) VALUES
(1, 2),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `model_number` varchar(255) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `warranty_expiration` date DEFAULT NULL,
  `equipment_details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `equipment_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `brand_name`, `model_number`, `price`, `serial_number`, `warranty_expiration`, `equipment_details`, `created_at`, `updated_at`, `deleted_at`, `equipment_type_id`) VALUES
(1, 'Morgan Cunningham', 'Clarke Nunez', '974', 561.00, '123', '2030-03-07', 'In dignissimos qui n', '2024-03-22 10:19:47', '2024-03-22 10:45:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_types`
--

CREATE TABLE `equipment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `equipment_types`
--

INSERT INTO `equipment_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TV', '2024-03-22 10:45:12', '2024-03-22 10:45:12', NULL),
(2, 'Washing Machine', '2024-03-22 10:45:25', '2024-03-22 10:45:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_of_expense` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `responsible`, `description`, `amount`, `status`, `date_of_expense`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mallory Richardson', 'Tenant', 'Labore qui dolores f', 740.00, 'pending', '2024-03-23', '2024-03-22 12:38:00', '2024-03-22 12:38:00', NULL),
(2, 'Sybil Garza', 'Other', 'Velit et autem liber', 960.00, 'pending', '2024-03-21', '2024-03-22 12:39:06', '2024-03-22 12:39:06', NULL),
(3, 'Omar Valencia', 'Landlord', 'Reprehenderit id se', 600.00, 'paid', '2024-03-22', '2024-03-23 08:59:13', '2024-03-23 08:59:13', NULL),
(4, 'Reese Donaldson', 'Tenant', 'Hic veniam quia iur', 650.00, 'pending', '2024-03-24', '2024-03-23 10:34:53', '2024-03-23 10:34:53', NULL),
(5, 'Reagan Byers', 'Tenant', 'Velit cupidatat in n', 58.00, 'pending', '2024-03-20', '2024-03-23 10:35:47', '2024-03-23 10:35:47', NULL),
(6, 'Hammett Walton', 'Tenant', 'Voluptatem molestiae', 1400.00, 'pending', '2024-03-19', '2024-03-23 10:41:41', '2024-03-23 10:41:41', NULL),
(7, 'Cheryl Townsend', 'Landlord', 'Dolorem quia omnis d', 130.00, 'pending', '2024-03-18', '2024-03-23 10:42:17', '2024-03-23 10:42:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_expense_type`
--

CREATE TABLE `expense_expense_type` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `expense_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_expense_type`
--

INSERT INTO `expense_expense_type` (`expense_id`, `expense_type_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense_landlord`
--

CREATE TABLE `expense_landlord` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `landlord_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_landlord`
--

INSERT INTO `expense_landlord` (`expense_id`, `landlord_id`) VALUES
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense_property`
--

CREATE TABLE `expense_property` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_property`
--

INSERT INTO `expense_property` (`expense_id`, `property_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 8),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(3, 2),
(3, 4),
(4, 2),
(4, 4),
(4, 5),
(4, 8),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(5, 8),
(6, 16),
(7, 2),
(7, 8),
(7, 12),
(7, 13),
(7, 15),
(7, 17);

-- --------------------------------------------------------

--
-- Table structure for table `expense_tenant`
--

CREATE TABLE `expense_tenant` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_tenant`
--

INSERT INTO `expense_tenant` (`expense_id`, `tenant_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cable TV', '2024-03-22 12:37:05', '2024-03-22 12:37:05', NULL),
(2, 'Electricity', '2024-03-23 11:36:41', '2024-03-23 11:36:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_unit`
--

CREATE TABLE `expense_unit` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_unit`
--

INSERT INTO `expense_unit` (`expense_id`, `unit_id`) VALUES
(1, 3),
(2, 3),
(2, 4),
(3, 4),
(3, 5),
(3, 6),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 4),
(6, 2),
(6, 4),
(6, 6),
(7, 2),
(7, 3),
(7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `date_of_income` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `income_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `name`, `amount`, `date_of_income`, `created_at`, `updated_at`, `deleted_at`, `income_type_id`) VALUES
(1, 'Justin Carson', 55.00, '2024-03-22', '2024-03-22 12:40:02', '2024-03-22 12:40:02', NULL, 2),
(2, 'Veda Cooper', 2100.00, '2024-03-22', '2024-03-22 12:40:13', '2024-03-22 12:40:13', NULL, 1),
(3, 'Daniel Lee', 54.00, '2024-03-24', '2024-03-27 07:37:44', '2024-03-27 07:37:44', NULL, 1),
(4, 'Wallace Howard', 81.00, '2024-03-25', '2024-03-27 07:38:14', '2024-03-27 07:38:14', NULL, 2),
(5, 'Theodore Jennings', 36.00, '2024-03-26', '2024-03-27 07:39:02', '2024-03-27 07:39:02', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `income_types`
--

INSERT INTO `income_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rent', '2024-03-22 12:39:34', '2024-03-22 12:39:34', NULL),
(2, 'Parking', '2024-03-22 12:39:43', '2024-03-22 12:39:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_due` date DEFAULT NULL,
  `partial_amount` decimal(15,2) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `invoice_number`, `date`, `date_due`, `partial_amount`, `amount`, `tax`, `status`, `date_paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hannah Bush', '80', '2024-03-22', '2024-04-12', 70.00, 210.00, 19.00, 'Overdue', '2024-03-23', '2024-03-23 11:09:19', '2024-03-23 19:49:05', NULL),
(2, 'Laura Vazquez', '737', NULL, '2024-03-23', 100.00, 200.00, 80.00, 'Partial', '2024-03-23', '2024-03-23 12:06:50', '2024-03-23 16:40:58', NULL),
(3, 'Arsenio Waters', '393', NULL, '2024-03-24', 204.00, 870.00, 65.00, 'Partial', '2024-03-24', '2024-03-23 19:16:23', '2024-03-23 19:16:23', NULL),
(4, 'Brian Hickman', '957', '2024-03-16', '2024-03-24', NULL, 189.00, 67.00, 'Paid', '2024-03-24', '2024-03-23 19:20:18', '2024-03-23 19:20:18', NULL),
(5, 'Perry Tate', '759', '2024-03-24', '2024-03-24', 58.00, 387.00, 8.00, 'Overdue', NULL, '2024-03-23 19:38:41', '2024-03-23 19:38:41', NULL),
(6, 'Lane Murphy', '315', NULL, '2024-03-15', 79.00, 431.00, 79.00, 'Overdue', NULL, '2024-03-23 19:53:08', '2024-03-23 19:53:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_invoice_type`
--

CREATE TABLE `invoice_invoice_type` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_landlord`
--

CREATE TABLE `invoice_landlord` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `landlord_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice_landlord`
--

INSERT INTO `invoice_landlord` (`invoice_id`, `landlord_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_property`
--

CREATE TABLE `invoice_property` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice_property`
--

INSERT INTO `invoice_property` (`invoice_id`, `property_id`) VALUES
(1, 5),
(1, 14),
(2, 2),
(2, 4),
(2, 14),
(3, 2),
(3, 3),
(3, 8),
(3, 14),
(3, 15),
(3, 17),
(4, 3),
(4, 5),
(4, 14),
(5, 4),
(5, 5),
(5, 13),
(5, 15),
(5, 16),
(5, 17),
(6, 3),
(6, 8),
(6, 13),
(6, 15),
(6, 16),
(6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_section`
--

CREATE TABLE `invoice_section` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tenant`
--

CREATE TABLE `invoice_tenant` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice_tenant`
--

INSERT INTO `invoice_tenant` (`invoice_id`, `tenant_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_types`
--

CREATE TABLE `invoice_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice_types`
--

INSERT INTO `invoice_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'basic', '2024-03-27 07:32:24', '2024-03-27 07:32:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_unit`
--

CREATE TABLE `invoice_unit` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice_unit`
--

INSERT INTO `invoice_unit` (`invoice_id`, `unit_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 5),
(3, 6),
(4, 5),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 3),
(6, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`id`, `name`, `company_name`, `phone_number`, `country`, `city`, `state`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beck Benton', 'Buckley and Mccormick Inc', '+1 (765) 515-6119', 'Minus repudiandae il', 'Eos accusamus sit d', 'Dolores qui qui aper', 'vigytake@mailinator.com', '2024-03-22 08:11:39', '2024-03-22 08:11:39', NULL),
(2, 'Tatiana Frazier', 'Sims Mcconnell Plc', '+1 (224) 241-6643', 'Saepe fuga Soluta m', 'Minim magnam assumen', 'Ipsam assumenda ipsu', 'goxav@mailinator.com', '2024-03-22 08:16:16', '2024-03-22 08:16:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintainers`
--

CREATE TABLE `maintainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `section_assigned_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `maintainers`
--

INSERT INTO `maintainers` (`id`, `name`, `phone_number`, `created_at`, `updated_at`, `deleted_at`, `section_assigned_id`) VALUES
(1, 'Chandler Gray', '+1 (651) 463-5246', '2024-03-22 10:03:23', '2024-03-22 10:03:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintainer_property`
--

CREATE TABLE `maintainer_property` (
  `maintainer_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `maintainer_property`
--

INSERT INTO `maintainer_property` (`maintainer_id`, `property_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `maintainer_unit`
--

CREATE TABLE `maintainer_unit` (
  `maintainer_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `maintainer_unit`
--

INSERT INTO `maintainer_unit` (`maintainer_id`, `unit_id`) VALUES
(1, 2),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\Property', 6, 'bf8721eb-9979-459e-bfdd-6a74f6805ce7', 'main_image', '65fc217a02dcf_66580382_1865119870186919_8038101289546022912_n', '65fc217a02dcf_66580382_1865119870186919_8038101289546022912_n.jpg', 'image/jpeg', 'public', 'public', 109352, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 6, '2024-03-21 09:01:07', '2024-03-21 09:01:08'),
(7, 'App\\Models\\Property', 7, '6f54053c-d46d-4ed3-9443-4d320d8e793c', 'main_image', '65fc21dacdea5_[image] - 742842', '65fc21dacdea5_[image]---742842.jpeg', 'image/jpeg', 'public', 'public', 282336, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 7, '2024-03-21 09:02:38', '2024-03-21 09:02:38'),
(9, 'App\\Models\\Property', 9, 'f7fc370c-c6f5-4b51-9e4f-21c4774a23d2', 'main_image', '65fc220e8765a_[image] - 6102083', '65fc220e8765a_[image]---6102083.jpeg', 'image/jpeg', 'public', 'public', 250497, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 9, '2024-03-21 09:03:31', '2024-03-21 09:03:31'),
(10, 'App\\Models\\Property', 10, '138a9729-0405-4b25-9c25-2c108a25c2da', 'main_image', '65fc222caea9d_[image] - 4501250', '65fc222caea9d_[image]---4501250.jpeg', 'image/jpeg', 'public', 'public', 221995, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 10, '2024-03-21 09:04:00', '2024-03-21 09:04:01'),
(11, 'App\\Models\\Property', 11, '4974c92b-8aa4-42b6-851d-26ac9034306a', 'main_image', '65fc223f8cd8b_[image] - 6102083', '65fc223f8cd8b_[image]---6102083.jpeg', 'image/jpeg', 'public', 'public', 250497, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 11, '2024-03-21 09:04:19', '2024-03-21 09:04:20'),
(15, 'App\\Models\\Property', 12, 'db052f00-d80f-403d-8328-47d1bb79e152', 'main_image', '65fc5c2006525_e30cae38-4626-4689-b397-96d1586136e8', '65fc5c2006525_e30cae38-4626-4689-b397-96d1586136e8.png', 'image/png', 'public', 'public', 123592, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 15, '2024-03-21 13:11:50', '2024-03-21 13:11:50'),
(16, 'App\\Models\\Property', 12, '165d4d94-5830-4c68-a008-8f6d05175186', 'more_images', '65fc5c4234df2_ea5e9b05-d074-4685-afea-7c88b6efb296', '65fc5c4234df2_ea5e9b05-d074-4685-afea-7c88b6efb296.png', 'image/png', 'public', 'public', 133329, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 16, '2024-03-21 13:11:50', '2024-03-21 13:11:51'),
(17, 'App\\Models\\Property', 12, 'ae2f711d-0d29-4418-a821-8de355b51618', 'more_images', '65fc5c42c44e3_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6', '65fc5c42c44e3_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6.png', 'image/png', 'public', 'public', 136782, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 17, '2024-03-21 13:11:51', '2024-03-21 13:11:51'),
(18, 'App\\Models\\Property', 12, 'e4867664-744d-4940-84ca-1ab7188db1d7', 'more_images', '65fc5c431e08c_4eee3097-9041-4461-9de7-056d06e4ba64', '65fc5c431e08c_4eee3097-9041-4461-9de7-056d06e4ba64.png', 'image/png', 'public', 'public', 128749, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 18, '2024-03-21 13:11:51', '2024-03-21 13:11:51'),
(19, 'App\\Models\\Property', 13, 'ae213bca-6bad-4a96-84d5-43cb4356a536', 'main_image', '65fc5ca64c731_7d3c6dad-134b-4e0a-9440-3baa638f56bb', '65fc5ca64c731_7d3c6dad-134b-4e0a-9440-3baa638f56bb.png', 'image/png', 'public', 'public', 304265, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 19, '2024-03-21 13:13:46', '2024-03-21 13:13:46'),
(20, 'App\\Models\\Property', 13, '4549339d-ed1e-4a45-838a-f4d486822b83', 'more_images', '65fc5cb787519_5483097c-129f-4fe4-870d-c2833054da89', '65fc5cb787519_5483097c-129f-4fe4-870d-c2833054da89.png', 'image/png', 'public', 'public', 124629, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 20, '2024-03-21 13:13:47', '2024-03-21 13:13:47'),
(21, 'App\\Models\\Property', 13, '4cd93ab4-60e9-44b3-a5ce-0784cac62064', 'more_images', '65fc5cb7a1abb_db0ffb86-76d4-418f-8edd-603d66fa03f0', '65fc5cb7a1abb_db0ffb86-76d4-418f-8edd-603d66fa03f0.png', 'image/png', 'public', 'public', 142212, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 21, '2024-03-21 13:13:47', '2024-03-21 13:13:47'),
(22, 'App\\Models\\Property', 13, '58bf60af-3aef-4519-882e-2f4d3391f1cd', 'more_images', '65fc5cb7d023d_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6', '65fc5cb7d023d_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6.png', 'image/png', 'public', 'public', 136782, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 22, '2024-03-21 13:13:47', '2024-03-21 13:13:47'),
(23, 'App\\Models\\Property', 13, 'f62435b3-6b68-4744-a4a4-5cb88318ca54', 'more_images', '65fc5cb7e650a_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '65fc5cb7e650a_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 23, '2024-03-21 13:13:47', '2024-03-21 13:13:47'),
(24, 'App\\Models\\Property', 14, '5c20d7ac-11a3-46a2-b30e-8a9e4da6eb33', 'main_image', '65fc5cd7523a0_d001f51f-3c4a-4eca-b972-4955da719076', '65fc5cd7523a0_d001f51f-3c4a-4eca-b972-4955da719076.png', 'image/png', 'public', 'public', 167481, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 24, '2024-03-21 13:14:35', '2024-03-21 13:14:36'),
(25, 'App\\Models\\Property', 14, 'cb508ac1-f041-4f03-8f09-50f8ace26610', 'more_images', '65fc5ce7ca44a_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6', '65fc5ce7ca44a_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6.png', 'image/png', 'public', 'public', 136782, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 25, '2024-03-21 13:14:36', '2024-03-21 13:14:36'),
(26, 'App\\Models\\Property', 14, 'f36d6a20-2414-44a8-9c69-2461a7b4c573', 'more_images', '65fc5ce7df5eb_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '65fc5ce7df5eb_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 26, '2024-03-21 13:14:36', '2024-03-21 13:14:36'),
(27, 'App\\Models\\Property', 14, '9b727c38-241d-4f0a-9d64-c4342a698822', 'more_images', '65fc5ce7eda06_ca84f606-cfd5-4a1d-9cf6-9c1dffec487f', '65fc5ce7eda06_ca84f606-cfd5-4a1d-9cf6-9c1dffec487f.png', 'image/png', 'public', 'public', 83558, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 27, '2024-03-21 13:14:36', '2024-03-21 13:14:36'),
(28, 'App\\Models\\Property', 15, '9323f2d2-d3b1-4427-9204-f069a28b9b79', 'main_image', '65fc5d0e833b8_3df4853a-ca1a-4544-ac03-b5d0e7192b95', '65fc5d0e833b8_3df4853a-ca1a-4544-ac03-b5d0e7192b95.png', 'image/png', 'public', 'public', 166054, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 28, '2024-03-21 13:15:24', '2024-03-21 13:15:25'),
(29, 'App\\Models\\Property', 15, 'b5bfbd29-ef4d-4163-bf51-3eae37861944', 'more_images', '65fc5d1b097b3_db0ffb86-76d4-418f-8edd-603d66fa03f0', '65fc5d1b097b3_db0ffb86-76d4-418f-8edd-603d66fa03f0.png', 'image/png', 'public', 'public', 142212, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 29, '2024-03-21 13:15:25', '2024-03-21 13:15:25'),
(30, 'App\\Models\\Property', 15, 'c96f1675-3dba-43eb-a74f-682a421d7449', 'more_images', '65fc5d1b22e88_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6', '65fc5d1b22e88_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6.png', 'image/png', 'public', 'public', 136782, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 30, '2024-03-21 13:15:25', '2024-03-21 13:15:25'),
(31, 'App\\Models\\Property', 15, 'b0b32643-335a-43b9-b280-89f3022cd20c', 'more_images', '65fc5d1b36b89_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '65fc5d1b36b89_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 31, '2024-03-21 13:15:25', '2024-03-21 13:15:25'),
(32, 'App\\Models\\Property', 16, '17d7e746-8c8c-444f-b102-8283cd858a94', 'main_image', '65fc5d40f2a5b_8e85c6cc-bd7b-4389-8787-80f8b93db3ad', '65fc5d40f2a5b_8e85c6cc-bd7b-4389-8787-80f8b93db3ad.png', 'image/png', 'public', 'public', 295152, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 32, '2024-03-21 13:16:13', '2024-03-21 13:16:13'),
(33, 'App\\Models\\Property', 16, '0e194977-1549-4893-ad1f-92b165aed288', 'more_images', '65fc5d4b5a149_4eee3097-9041-4461-9de7-056d06e4ba64', '65fc5d4b5a149_4eee3097-9041-4461-9de7-056d06e4ba64.png', 'image/png', 'public', 'public', 128749, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 33, '2024-03-21 13:16:13', '2024-03-21 13:16:14'),
(34, 'App\\Models\\Property', 16, '598b961b-f1ca-4d89-81bc-47fedeb8bd34', 'more_images', '65fc5d4b69701_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '65fc5d4b69701_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 34, '2024-03-21 13:16:14', '2024-03-21 13:16:14'),
(35, 'App\\Models\\Unit', 1, '0a225364-4117-41a8-92ba-00cdc57ea2cc', 'cover_image', '65fc79026ef74_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '65fc79026ef74_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 35, '2024-03-21 15:15:32', '2024-03-21 15:15:33'),
(36, 'App\\Models\\Unit', 1, '1f8860ad-ca9c-4166-bab5-157fe32b9619', 'unit_images', '65fc790a8b0fa_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '65fc790a8b0fa_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 36, '2024-03-21 15:15:33', '2024-03-21 15:15:33'),
(37, 'App\\Models\\Unit', 2, '23710ad7-d269-4cbc-9019-c8754adad27b', 'cover_image', '65fcbe1abd221_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6', '65fcbe1abd221_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6.png', 'image/png', 'public', 'public', 136782, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 37, '2024-03-21 20:09:33', '2024-03-21 20:09:34'),
(38, 'App\\Models\\Unit', 2, 'c92bb899-7504-46cc-aa43-d4fca4661dfb', 'unit_images', '65fcbe2aedce7_ea5e9b05-d074-4685-afea-7c88b6efb296', '65fcbe2aedce7_ea5e9b05-d074-4685-afea-7c88b6efb296.png', 'image/png', 'public', 'public', 133329, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 38, '2024-03-21 20:09:34', '2024-03-21 20:09:34'),
(39, 'App\\Models\\Property', 2, '14a601d4-1431-4eba-bc48-aa26b588ed68', 'main_image', '65fd54dc88511_brandgenesistz_httpss.mj.run6OfIa-OXpnQ_town_house__3d_render_80f3f5cb-fcc7-4413-a08f-c7d72863b55b_2', '65fd54dc88511_brandgenesistz_httpss.mj.run6OfIa-OXpnQ_town_house__3d_render_80f3f5cb-fcc7-4413-a08f-c7d72863b55b_2.png', 'image/png', 'public', 'public', 146006, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 39, '2024-03-22 06:52:31', '2024-03-22 06:52:32'),
(40, 'App\\Models\\Property', 1, 'd6b2886d-0cc1-47be-a73f-361104bf5efd', 'main_image', '65fd54f070b1f_brandgenesistz_httpss.mj.run6OfIa-OXpnQ_town_house__3d_render_80f3f5cb-fcc7-4413-a08f-c7d72863b55b_1', '65fd54f070b1f_brandgenesistz_httpss.mj.run6OfIa-OXpnQ_town_house__3d_render_80f3f5cb-fcc7-4413-a08f-c7d72863b55b_1.png', 'image/png', 'public', 'public', 159210, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 40, '2024-03-22 06:52:50', '2024-03-22 06:52:50'),
(41, 'App\\Models\\Property', 3, '3afdfc00-4de8-46f9-9b25-0f7b8232e37a', 'main_image', '65fd54fe555b6_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_single_5bf554dd-7825-45b8-a909-5c494c81d732', '65fd54fe555b6_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_single_5bf554dd-7825-45b8-a909-5c494c81d732.png', 'image/png', 'public', 'public', 370237, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 41, '2024-03-22 06:53:04', '2024-03-22 06:53:04'),
(42, 'App\\Models\\Property', 4, '772267a2-eb9a-4537-8eae-0a1812a9457d', 'main_image', '65fd550bacd9e_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_single_27db81fb-76b8-4b89-af24-20ae339ed2b6', '65fd550bacd9e_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_single_27db81fb-76b8-4b89-af24-20ae339ed2b6.png', 'image/png', 'public', 'public', 388820, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 42, '2024-03-22 06:53:18', '2024-03-22 06:53:18'),
(43, 'App\\Models\\Property', 8, '332ed392-ede2-4fa1-837e-94137ec4da5b', 'main_image', '65fd552073e1a_brandgenesistz_httpss.mj.run6OfIa-OXpnQ_town_house__3d_render_80f3f5cb-fcc7-4413-a08f-c7d72863b55b_0', '65fd552073e1a_brandgenesistz_httpss.mj.run6OfIa-OXpnQ_town_house__3d_render_80f3f5cb-fcc7-4413-a08f-c7d72863b55b_0.png', 'image/png', 'public', 'public', 138085, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 43, '2024-03-22 06:53:42', '2024-03-22 06:53:42'),
(44, 'App\\Models\\Property', 5, '6105e598-ad11-4d6d-8a6d-6ebdd4d60a4b', 'main_image', '65fd5535d109e_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_sing_4802381b-b83d-4a51-bb03-6aa3ad63cea2_2', '65fd5535d109e_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_sing_4802381b-b83d-4a51-bb03-6aa3ad63cea2_2.png', 'image/png', 'public', 'public', 155098, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 44, '2024-03-22 06:53:59', '2024-03-22 06:53:59'),
(45, 'App\\Models\\Property', 17, 'd6e466e5-bbef-4cce-a7a0-ed1ac1f9831a', 'main_image', '65fd55871b821_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_single_e761489a-3e76-460a-b383-0d34f3458752', '65fd55871b821_brandgenesistz_httpss.mj.runWwtOcQ-ckfQ_architect_render_single_e761489a-3e76-460a-b383-0d34f3458752.png', 'image/png', 'public', 'public', 381030, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 45, '2024-03-22 06:55:28', '2024-03-22 06:55:28'),
(46, 'App\\Models\\Unit', 3, '8f521b11-9db4-4c59-9341-47f4b15fa44e', 'cover_image', '65fd5ce075d06_ea5e9b05-d074-4685-afea-7c88b6efb296', '65fd5ce075d06_ea5e9b05-d074-4685-afea-7c88b6efb296.png', 'image/png', 'public', 'public', 551897, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 46, '2024-03-22 07:26:51', '2024-03-22 07:26:51'),
(47, 'App\\Models\\Unit', 4, 'baf3c480-1ce7-42c3-a75f-1bf66eae40dc', 'cover_image', '65fd5d319a7e2_d3cac030-16e4-4272-bfe6-e80a343b7662', '65fd5d319a7e2_d3cac030-16e4-4272-bfe6-e80a343b7662.png', 'image/png', 'public', 'public', 551729, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 47, '2024-03-22 07:28:04', '2024-03-22 07:28:04'),
(48, 'App\\Models\\Unit', 5, '2110befb-b9df-46fa-a650-00b17149059b', 'cover_image', '65fd5d513422b_4eee3097-9041-4461-9de7-056d06e4ba64', '65fd5d513422b_4eee3097-9041-4461-9de7-056d06e4ba64.png', 'image/png', 'public', 'public', 516869, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 48, '2024-03-22 07:28:35', '2024-03-22 07:28:35'),
(49, 'App\\Models\\Unit', 6, 'f6f0661f-f2c9-40c4-bb02-e7621048251f', 'cover_image', '65fd5d7c84e09_[image] - 9088662', '65fd5d7c84e09_[image]---9088662.jpeg', 'image/jpeg', 'public', 'public', 332316, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 49, '2024-03-22 07:29:18', '2024-03-22 07:29:19'),
(50, 'App\\Models\\Tenant', 1, '56569697-6b1b-49c9-aa77-ab4535811ada', 'image', '65fd65c21adc1_brandgenesistz_beautiful_african_woman_with_african_hair_styl_4b667e2f-4dbf-4b9f-a34f-1dc575a3f0eb_2', '65fd65c21adc1_brandgenesistz_beautiful_african_woman_with_african_hair_styl_4b667e2f-4dbf-4b9f-a34f-1dc575a3f0eb_2.png', 'image/png', 'public', 'public', 87608, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 50, '2024-03-22 08:04:40', '2024-03-22 08:04:40'),
(51, 'App\\Models\\Tenant', 2, '82bd3b2f-946b-4af8-9acf-365a588d87f9', 'image', '65fd6628c09da_brandgenesistz_beautiful_african_woman_with_african_hair_styl_4b667e2f-4dbf-4b9f-a34f-1dc575a3f0eb_0', '65fd6628c09da_brandgenesistz_beautiful_african_woman_with_african_hair_styl_4b667e2f-4dbf-4b9f-a34f-1dc575a3f0eb_0.png', 'image/png', 'public', 'public', 99689, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 51, '2024-03-22 08:06:19', '2024-03-22 08:06:20'),
(52, 'App\\Models\\Landlord', 1, '5c4f332f-2fb8-4ee8-87ab-e4d53976dba2', 'image', '65fd67697caef_brandgenesistz_beautiful_african_woman_with_african_hair_styl_e9eeb19f-43ea-4037-b0f0-d024841082eb_1', '65fd67697caef_brandgenesistz_beautiful_african_woman_with_african_hair_styl_e9eeb19f-43ea-4037-b0f0-d024841082eb_1.png', 'image/png', 'public', 'public', 183897, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 52, '2024-03-22 08:11:39', '2024-03-22 08:11:40'),
(53, 'App\\Models\\Landlord', 2, 'cf7ebac0-e4fb-4d79-b94b-ba8273c44dc1', 'image', '65fd687f2e950_brandgenesistz_beautiful_african_woman_with_african_hair_styl_e9eeb19f-43ea-4037-b0f0-d024841082eb_3', '65fd687f2e950_brandgenesistz_beautiful_african_woman_with_african_hair_styl_e9eeb19f-43ea-4037-b0f0-d024841082eb_3.png', 'image/png', 'public', 'public', 172051, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 53, '2024-03-22 08:16:16', '2024-03-22 08:16:17'),
(54, 'App\\Models\\Maintainer', 1, '22b42b0a-5382-4af6-933e-cfe96d90e51c', 'image', '65fd819874a9b_brandgenesistz_beautiful_african_woman_wearing_a_wig_with_mak_40503b7a-273f-4f39-9397-e413e2a88ab7_1', '65fd819874a9b_brandgenesistz_beautiful_african_woman_wearing_a_wig_with_mak_40503b7a-273f-4f39-9397-e413e2a88ab7_1.png', 'image/png', 'public', 'public', 180887, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 54, '2024-03-22 10:03:23', '2024-03-22 10:03:23'),
(55, 'App\\Models\\Equipment', 1, '5ef47fa7-1bf4-4be7-89ce-56e516d2fcd6', 'image', '65fd85703be71_design1', '65fd85703be71_design1.jpeg', 'image/jpeg', 'public', 'public', 80163, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 55, '2024-03-22 10:19:47', '2024-03-22 10:19:47'),
(56, 'App\\Models\\Property', 1, '78f85b95-a38d-4434-afcd-84bcec2b78b4', 'more_images', '6605a06859bb6_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6', '6605a06859bb6_eaf0c146-26a6-4f6e-8fcd-1ce619e3fbe6.png', 'image/png', 'public', 'public', 136782, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 56, '2024-03-28 13:52:58', '2024-03-28 13:52:59'),
(57, 'App\\Models\\Property', 1, '960a48da-a8d7-466e-8ae2-31afa5cb8359', 'more_images', '6605a068a5bfa_db0ffb86-76d4-418f-8edd-603d66fa03f0', '6605a068a5bfa_db0ffb86-76d4-418f-8edd-603d66fa03f0.png', 'image/png', 'public', 'public', 142212, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 57, '2024-03-28 13:52:59', '2024-03-28 13:52:59'),
(58, 'App\\Models\\Property', 1, '25d65636-7cd0-4aef-a4b0-4d2239414dc0', 'more_images', '6605a068bcda1_1c7d2811-f904-4f1d-b2c8-4da6131a8b63', '6605a068bcda1_1c7d2811-f904-4f1d-b2c8-4da6131a8b63.png', 'image/png', 'public', 'public', 127473, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 58, '2024-03-28 13:52:59', '2024-03-28 13:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_01_26_000001_create_media_table', 1),
(4, '2024_01_26_000002_create_permissions_table', 1),
(5, '2024_01_26_000003_create_roles_table', 1),
(6, '2024_01_26_000004_create_users_table', 1),
(7, '2024_01_26_000005_create_user_alerts_table', 1),
(8, '2024_01_26_000006_create_faq_categories_table', 1),
(9, '2024_01_26_000007_create_faq_questions_table', 1),
(10, '2024_01_26_000008_create_landlords_table', 1),
(11, '2024_01_26_000009_create_sections_table', 1),
(12, '2024_01_26_000010_create_units_table', 1),
(13, '2024_01_26_000011_create_properties_table', 1),
(14, '2024_01_26_000012_create_maintainers_table', 1),
(15, '2024_01_26_000013_create_tenants_table', 1),
(16, '2024_01_26_000014_create_expense_types_table', 1),
(17, '2024_01_26_000015_create_expenses_table', 1),
(18, '2024_01_26_000016_create_document_types_table', 1),
(19, '2024_01_26_000017_create_documents_table', 1),
(20, '2024_01_26_000018_create_invoice_types_table', 1),
(21, '2024_01_26_000019_create_invoices_table', 1),
(22, '2024_01_26_000020_create_income_types_table', 1),
(23, '2024_01_26_000021_create_incomes_table', 1),
(24, '2024_01_26_000022_create_applications_table', 1),
(25, '2024_01_26_000023_create_equipment_types_table', 1),
(26, '2024_01_26_000024_create_equipments_table', 1),
(27, '2024_01_26_000025_create_permission_role_pivot_table', 1),
(28, '2024_01_26_000026_create_role_user_pivot_table', 1),
(29, '2024_01_26_000027_create_user_user_alert_pivot_table', 1),
(30, '2024_01_26_000028_create_maintainer_unit_pivot_table', 1),
(31, '2024_01_26_000029_create_maintainer_property_pivot_table', 1),
(32, '2024_01_26_000030_create_expense_landlord_pivot_table', 1),
(33, '2024_01_26_000031_create_expense_property_pivot_table', 1),
(34, '2024_01_26_000032_create_expense_unit_pivot_table', 1),
(35, '2024_01_26_000033_create_expense_tenant_pivot_table', 1),
(36, '2024_01_26_000034_create_expense_expense_type_pivot_table', 1),
(37, '2024_01_26_000035_create_document_document_type_pivot_table', 1),
(38, '2024_01_26_000036_create_document_tenant_pivot_table', 1),
(39, '2024_01_26_000037_create_document_landlord_pivot_table', 1),
(40, '2024_01_26_000038_create_document_property_pivot_table', 1),
(41, '2024_01_26_000039_create_document_unit_pivot_table', 1),
(42, '2024_01_26_000040_create_invoice_tenant_pivot_table', 1),
(43, '2024_01_26_000041_create_invoice_landlord_pivot_table', 1),
(44, '2024_01_26_000042_create_invoice_invoice_type_pivot_table', 1),
(45, '2024_01_26_000043_create_invoice_property_pivot_table', 1),
(46, '2024_01_26_000044_create_invoice_section_pivot_table', 1),
(47, '2024_01_26_000045_create_invoice_unit_pivot_table', 1),
(48, '2024_01_26_000046_add_relationship_fields_to_faq_questions_table', 1),
(49, '2024_01_26_000047_add_relationship_fields_to_sections_table', 1),
(50, '2024_01_26_000048_add_relationship_fields_to_units_table', 1),
(51, '2024_01_26_000049_add_relationship_fields_to_properties_table', 1),
(52, '2024_01_26_000050_add_relationship_fields_to_maintainers_table', 1),
(53, '2024_01_26_000051_add_relationship_fields_to_tenants_table', 1),
(54, '2024_01_26_000052_add_relationship_fields_to_incomes_table', 1),
(55, '2024_01_26_000053_add_relationship_fields_to_applications_table', 1),
(56, '2024_01_26_000054_add_relationship_fields_to_equipments_table', 1),
(57, '2024_01_26_000055_create_qa_topics_table', 1),
(58, '2024_01_26_000056_create_qa_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'user_alert_create', NULL, NULL, NULL),
(18, 'user_alert_show', NULL, NULL, NULL),
(19, 'user_alert_delete', NULL, NULL, NULL),
(20, 'user_alert_access', NULL, NULL, NULL),
(21, 'faq_management_access', NULL, NULL, NULL),
(22, 'faq_category_create', NULL, NULL, NULL),
(23, 'faq_category_edit', NULL, NULL, NULL),
(24, 'faq_category_show', NULL, NULL, NULL),
(25, 'faq_category_delete', NULL, NULL, NULL),
(26, 'faq_category_access', NULL, NULL, NULL),
(27, 'faq_question_create', NULL, NULL, NULL),
(28, 'faq_question_edit', NULL, NULL, NULL),
(29, 'faq_question_show', NULL, NULL, NULL),
(30, 'faq_question_delete', NULL, NULL, NULL),
(31, 'faq_question_access', NULL, NULL, NULL),
(32, 'contact_access', NULL, NULL, NULL),
(33, 'landlord_create', NULL, NULL, NULL),
(34, 'landlord_edit', NULL, NULL, NULL),
(35, 'landlord_show', NULL, NULL, NULL),
(36, 'landlord_delete', NULL, NULL, NULL),
(37, 'landlord_access', NULL, NULL, NULL),
(38, 'properties_menu_access', NULL, NULL, NULL),
(39, 'section_create', NULL, NULL, NULL),
(40, 'section_edit', NULL, NULL, NULL),
(41, 'section_show', NULL, NULL, NULL),
(42, 'section_delete', NULL, NULL, NULL),
(43, 'section_access', NULL, NULL, NULL),
(44, 'unit_create', NULL, NULL, NULL),
(45, 'unit_edit', NULL, NULL, NULL),
(46, 'unit_show', NULL, NULL, NULL),
(47, 'unit_delete', NULL, NULL, NULL),
(48, 'unit_access', NULL, NULL, NULL),
(49, 'property_create', NULL, NULL, NULL),
(50, 'property_edit', NULL, NULL, NULL),
(51, 'property_show', NULL, NULL, NULL),
(52, 'property_delete', NULL, NULL, NULL),
(53, 'property_access', NULL, NULL, NULL),
(54, 'maintainer_create', NULL, NULL, NULL),
(55, 'maintainer_edit', NULL, NULL, NULL),
(56, 'maintainer_show', NULL, NULL, NULL),
(57, 'maintainer_delete', NULL, NULL, NULL),
(58, 'maintainer_access', NULL, NULL, NULL),
(59, 'tenant_create', NULL, NULL, NULL),
(60, 'tenant_edit', NULL, NULL, NULL),
(61, 'tenant_show', NULL, NULL, NULL),
(62, 'tenant_delete', NULL, NULL, NULL),
(63, 'tenant_access', NULL, NULL, NULL),
(64, 'accounting_access', NULL, NULL, NULL),
(65, 'expense_type_create', NULL, NULL, NULL),
(66, 'expense_type_edit', NULL, NULL, NULL),
(67, 'expense_type_show', NULL, NULL, NULL),
(68, 'expense_type_delete', NULL, NULL, NULL),
(69, 'expense_type_access', NULL, NULL, NULL),
(70, 'expense_create', NULL, NULL, NULL),
(71, 'expense_edit', NULL, NULL, NULL),
(72, 'expense_show', NULL, NULL, NULL),
(73, 'expense_delete', NULL, NULL, NULL),
(74, 'expense_access', NULL, NULL, NULL),
(75, 'documents_menu_access', NULL, NULL, NULL),
(76, 'document_type_create', NULL, NULL, NULL),
(77, 'document_type_edit', NULL, NULL, NULL),
(78, 'document_type_show', NULL, NULL, NULL),
(79, 'document_type_delete', NULL, NULL, NULL),
(80, 'document_type_access', NULL, NULL, NULL),
(81, 'document_create', NULL, NULL, NULL),
(82, 'document_edit', NULL, NULL, NULL),
(83, 'document_show', NULL, NULL, NULL),
(84, 'document_delete', NULL, NULL, NULL),
(85, 'document_access', NULL, NULL, NULL),
(86, 'invoice_type_create', NULL, NULL, NULL),
(87, 'invoice_type_edit', NULL, NULL, NULL),
(88, 'invoice_type_show', NULL, NULL, NULL),
(89, 'invoice_type_delete', NULL, NULL, NULL),
(90, 'invoice_type_access', NULL, NULL, NULL),
(91, 'invoice_create', NULL, NULL, NULL),
(92, 'invoice_edit', NULL, NULL, NULL),
(93, 'invoice_show', NULL, NULL, NULL),
(94, 'invoice_delete', NULL, NULL, NULL),
(95, 'invoice_access', NULL, NULL, NULL),
(96, 'income_type_create', NULL, NULL, NULL),
(97, 'income_type_edit', NULL, NULL, NULL),
(98, 'income_type_show', NULL, NULL, NULL),
(99, 'income_type_delete', NULL, NULL, NULL),
(100, 'income_type_access', NULL, NULL, NULL),
(101, 'income_create', NULL, NULL, NULL),
(102, 'income_edit', NULL, NULL, NULL),
(103, 'income_show', NULL, NULL, NULL),
(104, 'income_delete', NULL, NULL, NULL),
(105, 'income_access', NULL, NULL, NULL),
(106, 'application_create', NULL, NULL, NULL),
(107, 'application_edit', NULL, NULL, NULL),
(108, 'application_show', NULL, NULL, NULL),
(109, 'application_delete', NULL, NULL, NULL),
(110, 'application_access', NULL, NULL, NULL),
(111, 'equipment_type_create', NULL, NULL, NULL),
(112, 'equipment_type_edit', NULL, NULL, NULL),
(113, 'equipment_type_show', NULL, NULL, NULL),
(114, 'equipment_type_delete', NULL, NULL, NULL),
(115, 'equipment_type_access', NULL, NULL, NULL),
(116, 'equipment_create', NULL, NULL, NULL),
(117, 'equipment_edit', NULL, NULL, NULL),
(118, 'equipment_show', NULL, NULL, NULL),
(119, 'equipment_delete', NULL, NULL, NULL),
(120, 'equipment_access', NULL, NULL, NULL),
(121, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `landlord_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_name`, `property_type`, `location`, `created_at`, `updated_at`, `deleted_at`, `landlord_id`) VALUES
(1, 'Main', 'Residential', 'dar es salaam', '2024-03-17 12:02:22', '2024-03-28 13:52:58', NULL, 1),
(2, 'Mai', 'Commercial', 'dar es salaam', '2024-03-21 07:29:16', '2024-03-21 07:29:16', NULL, NULL),
(3, 'Jelani Eaton', 'Single-Family', 'Sint eveniet dicta', '2024-03-21 08:09:54', '2024-03-22 06:54:40', NULL, NULL),
(4, 'Florence Christian', 'stores', NULL, '2024-03-21 08:28:17', '2024-03-21 08:28:17', NULL, NULL),
(5, 'Isaac Booker', 'Multi-Family', NULL, '2024-03-21 08:28:48', '2024-03-21 08:28:48', NULL, NULL),
(6, 'Florence Christian', 'stores', NULL, '2024-03-21 09:01:07', '2024-03-21 10:02:26', '2024-03-21 10:02:26', NULL),
(7, 'Jelani Eaton', 'Single-Family', NULL, '2024-03-21 09:02:38', '2024-03-21 10:10:37', '2024-03-21 10:10:37', NULL),
(8, 'Jelani Ea', 'office', NULL, '2024-03-21 09:03:04', '2024-03-21 09:03:04', NULL, NULL),
(9, 'Jelani Ea', 'Multi-Family', NULL, '2024-03-21 09:03:31', '2024-03-21 10:21:07', '2024-03-21 10:21:07', NULL),
(10, 'Jelani Ea', 'office', NULL, '2024-03-21 09:04:00', '2024-03-21 09:46:43', '2024-03-21 09:46:43', NULL),
(11, 'Florence Christian', 'Multi-Family', NULL, '2024-03-21 09:04:19', '2024-03-21 10:14:52', '2024-03-21 10:14:52', NULL),
(12, 'Maggy Perry', 'Residential', 'Ad perspiciatis in', '2024-03-21 13:11:49', '2024-03-21 13:11:49', NULL, NULL),
(13, 'Marny Neal', 'CondoTownhome', 'Qui magnam ratione t', '2024-03-21 13:13:46', '2024-03-21 13:13:46', NULL, NULL),
(14, 'Summer Faulkner', 'CondoTownhome', 'Consequat Facere qu', '2024-03-21 13:14:35', '2024-03-22 06:54:56', NULL, NULL),
(15, 'Chanda Stokes', 'Multi-Family', 'Omnis vel qui delect', '2024-03-21 13:15:24', '2024-03-21 13:15:24', NULL, NULL),
(16, 'Claire Lucas', 'CondoTownhome', 'Quasi dolor repudian', '2024-03-21 13:16:13', '2024-03-22 06:54:20', NULL, NULL),
(17, 'Ethan Warner', 'shops', 'Reiciendis inventore', '2024-03-22 06:55:28', '2024-03-22 06:55:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qa_messages`
--

CREATE TABLE `qa_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `description`, `created_at`, `updated_at`, `deleted_at`, `property_id`) VALUES
(1, 'Malik Owens', 'Dicta ad nihil fugia', '2024-03-24 09:40:52', '2024-03-24 09:40:52', NULL, 5),
(2, 'Bertha Joseph', 'Dolor non repudianda', '2024-03-24 09:41:19', '2024-03-24 10:04:51', '2024-03-24 10:04:51', 1),
(3, 'Tanner Meyer', 'Unde non beatae minu', '2024-03-24 10:05:00', '2024-03-24 10:05:00', NULL, 1),
(4, 'Roanna Williamson', 'Laborum temporibus n', '2024-03-24 10:05:08', '2024-03-24 10:05:08', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `id_type` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `monthly_gross_income` decimal(15,2) DEFAULT NULL,
  `additional_income` decimal(15,2) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `ethnicity` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `first_name`, `id_type`, `id_number`, `status`, `monthly_gross_income`, `additional_income`, `date_of_birth`, `gender`, `marital_status`, `ethnicity`, `country`, `city`, `state`, `notes`, `created_at`, `updated_at`, `deleted_at`, `property_id`, `section_id`, `unit_id`) VALUES
(1, 'Kennedy', 'national ID', '735', 'tenant', 88.00, 58.00, '1994-03-10', 'Female', 'Single', 'Black or African American', 'Ea ullam cupidatat m', 'Dolorem rerum dolor', 'Corporis commodi per', 'Commodo laborum nisi', '2024-03-22 08:04:40', '2024-03-28 14:36:13', NULL, 8, 1, 1),
(2, 'Eve', 'national ID', '5', 'previous tenant', 84.00, 178.00, NULL, 'Female', 'Divorced', 'Asian', 'Non modi maiores deb', 'Reprehenderit vel et', 'Elit odit neque min', 'Vel esse necessitati', '2024-03-22 08:06:19', '2024-03-22 08:06:19', NULL, 3, NULL, 2),
(3, 'Naomi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tanzania', 'Dar es salaam', 'Coastal Region', 'notes', '2024-03-28 14:38:58', '2024-03-28 14:38:58', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `rent_price` decimal(15,2) NOT NULL,
  `unit_size` varchar(255) DEFAULT NULL,
  `number_of_bedrooms` int(11) DEFAULT NULL,
  `number_of_kitchens` int(11) DEFAULT NULL,
  `number_of_bathrooms` int(11) DEFAULT NULL,
  `market_rent` decimal(15,2) DEFAULT NULL,
  `deposit_amount` decimal(15,2) DEFAULT NULL,
  `parking_type` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_section_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `rent_price`, `unit_size`, `number_of_bedrooms`, `number_of_kitchens`, `number_of_bathrooms`, `market_rent`, `deposit_amount`, `parking_type`, `notes`, `created_at`, `updated_at`, `deleted_at`, `property_id`, `unit_section_id`) VALUES
(1, 'Lance Mckee', 981.00, '800', 10, 2, 2, 630.00, 140.00, 'Covered', 'Dolorum nulla ab exc', '2024-03-21 15:15:32', '2024-03-28 07:35:43', NULL, 8, 1),
(2, 'Erin Stevens', 745.00, 'Eos minus velit quas', 743, 270, 779, 34.00, 52.00, 'Call for availability', 'Consequatur Volupta', '2024-03-21 20:09:33', '2024-03-22 07:27:36', NULL, 8, NULL),
(3, 'Dillon Underwood', 691.00, '900', 5, 3, 4, 1700.00, 49.00, 'Covered', 'Sunt natus ut et ass', '2024-03-22 07:26:51', '2024-03-22 07:26:51', NULL, 8, NULL),
(4, 'Hilda Noble', 568.00, '900', 209, 47, 202, 99.00, 18.00, NULL, 'Ut maiores cum alias', '2024-03-22 07:28:04', '2024-03-22 07:28:04', NULL, 8, NULL),
(5, 'Vincent Hendrix', 146.00, '880', 607, 56, 411, 1.00, 14.00, NULL, 'Ad debitis animi di', '2024-03-22 07:28:35', '2024-03-22 07:28:35', NULL, 8, NULL),
(6, 'Aretha Juarez', 939.00, '800', 980, 709, 750, 70.00, 79.00, NULL, 'Do temporibus commod', '2024-03-22 07:29:18', '2024-03-22 07:29:18', NULL, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `company_name`, `country`, `city`, `state`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '', '', '', '', '', 'admin@admin.com', NULL, '$2y$10$2eXc7ss5R.XjLWHRv7f1H.iBVQcIOc45ml6r88z3YzHGUqAWRrJ9W', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alert_text` varchar(255) DEFAULT NULL,
  `alert_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_applying_fk_9430218` (`property_applying_id`),
  ADD KEY `unit_applying_fk_9430217` (`unit_applying_id`),
  ADD KEY `tenant_fk_9438250` (`tenant_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_document_type`
--
ALTER TABLE `document_document_type`
  ADD KEY `document_id_fk_9430180` (`document_id`),
  ADD KEY `document_type_id_fk_9430180` (`document_type_id`);

--
-- Indexes for table `document_landlord`
--
ALTER TABLE `document_landlord`
  ADD KEY `document_id_fk_9430174` (`document_id`),
  ADD KEY `landlord_id_fk_9430174` (`landlord_id`);

--
-- Indexes for table `document_property`
--
ALTER TABLE `document_property`
  ADD KEY `document_id_fk_9430175` (`document_id`),
  ADD KEY `property_id_fk_9430175` (`property_id`);

--
-- Indexes for table `document_tenant`
--
ALTER TABLE `document_tenant`
  ADD KEY `document_id_fk_9430173` (`document_id`),
  ADD KEY `tenant_id_fk_9430173` (`tenant_id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_unit`
--
ALTER TABLE `document_unit`
  ADD KEY `document_id_fk_9430176` (`document_id`),
  ADD KEY `unit_id_fk_9430176` (`unit_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_type_fk_9430233` (`equipment_type_id`);

--
-- Indexes for table `equipment_types`
--
ALTER TABLE `equipment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_expense_type`
--
ALTER TABLE `expense_expense_type`
  ADD KEY `expense_id_fk_9430157` (`expense_id`),
  ADD KEY `expense_type_id_fk_9430157` (`expense_type_id`);

--
-- Indexes for table `expense_landlord`
--
ALTER TABLE `expense_landlord`
  ADD KEY `expense_id_fk_9430154` (`expense_id`),
  ADD KEY `landlord_id_fk_9430154` (`landlord_id`);

--
-- Indexes for table `expense_property`
--
ALTER TABLE `expense_property`
  ADD KEY `expense_id_fk_9430155` (`expense_id`),
  ADD KEY `property_id_fk_9430155` (`property_id`);

--
-- Indexes for table `expense_tenant`
--
ALTER TABLE `expense_tenant`
  ADD KEY `expense_id_fk_9430164` (`expense_id`),
  ADD KEY `tenant_id_fk_9430164` (`tenant_id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_unit`
--
ALTER TABLE `expense_unit`
  ADD KEY `expense_id_fk_9430156` (`expense_id`),
  ADD KEY `unit_id_fk_9430156` (`unit_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_9430060` (`category_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_type_fk_9430210` (`income_type_id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_invoice_type`
--
ALTER TABLE `invoice_invoice_type`
  ADD KEY `invoice_id_fk_9430190` (`invoice_id`),
  ADD KEY `invoice_type_id_fk_9430190` (`invoice_type_id`);

--
-- Indexes for table `invoice_landlord`
--
ALTER TABLE `invoice_landlord`
  ADD KEY `invoice_id_fk_9430189` (`invoice_id`),
  ADD KEY `landlord_id_fk_9430189` (`landlord_id`);

--
-- Indexes for table `invoice_property`
--
ALTER TABLE `invoice_property`
  ADD KEY `invoice_id_fk_9430191` (`invoice_id`),
  ADD KEY `property_id_fk_9430191` (`property_id`);

--
-- Indexes for table `invoice_section`
--
ALTER TABLE `invoice_section`
  ADD KEY `invoice_id_fk_9430192` (`invoice_id`),
  ADD KEY `section_id_fk_9430192` (`section_id`);

--
-- Indexes for table `invoice_tenant`
--
ALTER TABLE `invoice_tenant`
  ADD KEY `invoice_id_fk_9430188` (`invoice_id`),
  ADD KEY `tenant_id_fk_9430188` (`tenant_id`);

--
-- Indexes for table `invoice_types`
--
ALTER TABLE `invoice_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_unit`
--
ALTER TABLE `invoice_unit`
  ADD KEY `invoice_id_fk_9430193` (`invoice_id`),
  ADD KEY `unit_id_fk_9430193` (`unit_id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintainers`
--
ALTER TABLE `maintainers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_assigned_fk_9438404` (`section_assigned_id`);

--
-- Indexes for table `maintainer_property`
--
ALTER TABLE `maintainer_property`
  ADD KEY `maintainer_id_fk_9430124` (`maintainer_id`),
  ADD KEY `property_id_fk_9430124` (`property_id`);

--
-- Indexes for table `maintainer_unit`
--
ALTER TABLE `maintainer_unit`
  ADD KEY `maintainer_id_fk_9430122` (`maintainer_id`),
  ADD KEY `unit_id_fk_9430122` (`unit_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_9430034` (`role_id`),
  ADD KEY `permission_id_fk_9430034` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landlord_fk_9430108` (`landlord_id`);

--
-- Indexes for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_messages_topic_id_foreign` (`topic_id`),
  ADD KEY `qa_messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_9430043` (`user_id`),
  ADD KEY `role_id_fk_9430043` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_fk_9438337` (`property_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_fk_9430141` (`property_id`),
  ADD KEY `section_fk_9438548` (`section_id`),
  ADD KEY `unit_fk_9430142` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_fk_9437968` (`property_id`),
  ADD KEY `unit_section_fk_9430102` (`unit_section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_9430051` (`user_alert_id`),
  ADD KEY `user_id_fk_9430051` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment_types`
--
ALTER TABLE `equipment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income_types`
--
ALTER TABLE `income_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_types`
--
ALTER TABLE `invoice_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maintainers`
--
ALTER TABLE `maintainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `qa_messages`
--
ALTER TABLE `qa_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `property_applying_fk_9430218` FOREIGN KEY (`property_applying_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tenant_fk_9438250` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  ADD CONSTRAINT `unit_applying_fk_9430217` FOREIGN KEY (`unit_applying_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `document_document_type`
--
ALTER TABLE `document_document_type`
  ADD CONSTRAINT `document_id_fk_9430180` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `document_type_id_fk_9430180` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_landlord`
--
ALTER TABLE `document_landlord`
  ADD CONSTRAINT `document_id_fk_9430174` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `landlord_id_fk_9430174` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_property`
--
ALTER TABLE `document_property`
  ADD CONSTRAINT `document_id_fk_9430175` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_id_fk_9430175` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_tenant`
--
ALTER TABLE `document_tenant`
  ADD CONSTRAINT `document_id_fk_9430173` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_id_fk_9430173` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_unit`
--
ALTER TABLE `document_unit`
  ADD CONSTRAINT `document_id_fk_9430176` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_id_fk_9430176` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipment_type_fk_9430233` FOREIGN KEY (`equipment_type_id`) REFERENCES `equipment_types` (`id`);

--
-- Constraints for table `expense_expense_type`
--
ALTER TABLE `expense_expense_type`
  ADD CONSTRAINT `expense_id_fk_9430157` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expense_type_id_fk_9430157` FOREIGN KEY (`expense_type_id`) REFERENCES `expense_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expense_landlord`
--
ALTER TABLE `expense_landlord`
  ADD CONSTRAINT `expense_id_fk_9430154` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `landlord_id_fk_9430154` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expense_property`
--
ALTER TABLE `expense_property`
  ADD CONSTRAINT `expense_id_fk_9430155` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_id_fk_9430155` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expense_tenant`
--
ALTER TABLE `expense_tenant`
  ADD CONSTRAINT `expense_id_fk_9430164` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_id_fk_9430164` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expense_unit`
--
ALTER TABLE `expense_unit`
  ADD CONSTRAINT `expense_id_fk_9430156` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_id_fk_9430156` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD CONSTRAINT `category_fk_9430060` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`);

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `income_type_fk_9430210` FOREIGN KEY (`income_type_id`) REFERENCES `income_types` (`id`);

--
-- Constraints for table `invoice_invoice_type`
--
ALTER TABLE `invoice_invoice_type`
  ADD CONSTRAINT `invoice_id_fk_9430190` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_type_id_fk_9430190` FOREIGN KEY (`invoice_type_id`) REFERENCES `invoice_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_landlord`
--
ALTER TABLE `invoice_landlord`
  ADD CONSTRAINT `invoice_id_fk_9430189` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `landlord_id_fk_9430189` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_property`
--
ALTER TABLE `invoice_property`
  ADD CONSTRAINT `invoice_id_fk_9430191` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_id_fk_9430191` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_section`
--
ALTER TABLE `invoice_section`
  ADD CONSTRAINT `invoice_id_fk_9430192` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `section_id_fk_9430192` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_tenant`
--
ALTER TABLE `invoice_tenant`
  ADD CONSTRAINT `invoice_id_fk_9430188` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_id_fk_9430188` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_unit`
--
ALTER TABLE `invoice_unit`
  ADD CONSTRAINT `invoice_id_fk_9430193` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_id_fk_9430193` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintainers`
--
ALTER TABLE `maintainers`
  ADD CONSTRAINT `section_assigned_fk_9438404` FOREIGN KEY (`section_assigned_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `maintainer_property`
--
ALTER TABLE `maintainer_property`
  ADD CONSTRAINT `maintainer_id_fk_9430124` FOREIGN KEY (`maintainer_id`) REFERENCES `maintainers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_id_fk_9430124` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintainer_unit`
--
ALTER TABLE `maintainer_unit`
  ADD CONSTRAINT `maintainer_id_fk_9430122` FOREIGN KEY (`maintainer_id`) REFERENCES `maintainers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_id_fk_9430122` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_9430034` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_9430034` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `landlord_fk_9430108` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`);

--
-- Constraints for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_9430043` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_9430043` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `property_fk_9438337` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `property_fk_9430141` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `section_fk_9438548` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `unit_fk_9430142` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `property_fk_9437968` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `unit_section_fk_9430102` FOREIGN KEY (`unit_section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_9430051` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_9430051` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
