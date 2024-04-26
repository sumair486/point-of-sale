-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2023 at 01:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waseem_designer_pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `backup_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash_history`
--

CREATE TABLE `cash_history` (
  `id` int(11) NOT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `pay_status` varchar(100) DEFAULT NULL,
  `pay_by` varchar(100) NOT NULL DEFAULT 'Direct',
  `details` varchar(255) DEFAULT NULL,
  `pay_date` date NOT NULL,
  `pay_person` varchar(255) DEFAULT NULL,
  `contact` varchar(150) DEFAULT NULL,
  `pay_type_id` varchar(50) DEFAULT NULL,
  `slip_no` varchar(50) DEFAULT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `client_payment_id` int(11) DEFAULT NULL,
  `ticket_ptr_id` int(11) DEFAULT NULL,
  `supplier_payment_id` int(11) DEFAULT NULL,
  `ticket_payment_id` int(11) DEFAULT NULL,
  `cust_INOUT_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_history`
--

INSERT INTO `cash_history` (`id`, `amount`, `pay_status`, `pay_by`, `details`, `pay_date`, `pay_person`, `contact`, `pay_type_id`, `slip_no`, `receipt`, `expense_id`, `client_payment_id`, `ticket_ptr_id`, `supplier_payment_id`, `ticket_payment_id`, `cust_INOUT_id`) VALUES
(52, '10000.00', 'OUT', 'Purchase', 'paid to imran 10000', '2023-05-29', 'imran', '03452008866', '1', '', '', NULL, NULL, NULL, 1, NULL, 0),
(53, '20000.00', 'OUT', 'Purchase', 'Girls maxi purchase from imran 20000 paid to imran', '2023-05-29', 'imran', '03452008866', '1', '', '', NULL, NULL, NULL, 1, NULL, 0),
(66, '1300.00', 'IN', 'Sale', 'paid 1300 with 0 discount', '2023-05-31', '', '', 'Direct', '0', '0', NULL, NULL, NULL, 1, NULL, 0),
(67, '300', 'OUT', 'Return', 'Product Return 300 paid to Customer Discount Subtracted', '2023-05-31', 'Admin', '1111111111', 'Direct', '0', '0', NULL, NULL, NULL, 1, NULL, 0),
(68, '200.00', 'IN', 'Sale', 'sold', '2023-06-05', '', '', 'Direct', '0', '0', NULL, NULL, NULL, 1, NULL, 0),
(69, '300.00', 'IN', 'Sale', 'dsfhjfh', '2023-08-02', '', '', 'Direct', '0', '0', NULL, NULL, NULL, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cash_in_bank`
--

CREATE TABLE `cash_in_bank` (
  `id` int(11) NOT NULL,
  `account_tittle` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `opening_balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cash_in_bank_history`
--

CREATE TABLE `cash_in_bank_history` (
  `id` int(11) NOT NULL,
  `cash_in_bank_id` int(255) NOT NULL,
  `bank_date` date NOT NULL,
  `detail` varchar(255) NOT NULL,
  `credit` int(255) NOT NULL,
  `debit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cash_in_hand`
--

CREATE TABLE `cash_in_hand` (
  `id` int(11) NOT NULL,
  `opening_balance` varchar(50) NOT NULL,
  `cash` varchar(50) NOT NULL,
  `opening_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Lehnga'),
(2, 'Maxi'),
(3, 'formal '),
(4, 'Party Wear'),
(5, 'Casual'),
(6, 'Semi Formal');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `opening_balance` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `mobile`, `email`, `opening_balance`) VALUES
(1, 'walkin', 'nil', '00000000000', '', '0.00'),
(2, 'naveed', 'swat', '12345678901', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_in_out`
--

CREATE TABLE `customer_in_out` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledger`
--

CREATE TABLE `customer_ledger` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL DEFAULT 0,
  `debit` varchar(50) NOT NULL,
  `credit` varchar(50) NOT NULL,
  `Ldate` date NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_ledger`
--

INSERT INTO `customer_ledger` (`id`, `customer_id`, `sale_id`, `payment_id`, `debit`, `credit`, `Ldate`, `details`) VALUES
(53, 1, 39, 0, '1300.00', '1300.00', '2023-05-31', 'paid 1300 with 0 discount'),
(54, 1, 0, 51, '300', '300', '2023-05-31', 'Product Return 300 paid to Customer Discount Subtracted'),
(55, 1, 40, 0, '200.00', '200.00', '2023-06-05', 'sold'),
(56, 1, 41, 0, '300.00', '300.00', '2023-08-02', 'dsfhjfh');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `payment_method_id` varchar(11) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `receipt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `sale_id`, `customer_id`, `payment_method_id`, `paid`, `payment_date`, `details`, `receipt`) VALUES
(50, 39, 1, 'Direct', '1300.00', '2023-05-31', 'paid 1300 with 0 discount', '0'),
(51, 0, 1, '1', '300', '2023-05-31', 'Product Return 300 paid to Customer Discount Subtracted', NULL),
(52, 40, 1, 'Direct', '200.00', '2023-06-05', 'sold', '0'),
(53, 41, 1, 'Direct', '300.00', '2023-08-02', 'dsfhjfh', '0');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `expense_person` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `cat_id`, `expense_person`, `amount`, `details`, `exp_date`, `receipt`) VALUES
(1, 1, 'Jawad Khan', '5000', 'Paid 5000 shop rent', '2023-05-18', ''),
(2, 4, 'ali khan', '3000', 'paid 3000 Internet bill', '2023-05-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category`
--

CREATE TABLE `expenses_category` (
  `id` int(11) NOT NULL,
  `company_id` int(255) NOT NULL,
  `expense_cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_category`
--

INSERT INTO `expenses_category` (`id`, `company_id`, `expense_cat`) VALUES
(1, 0, 'Shop Rent'),
(2, 0, 'Electricity Bill'),
(3, 0, 'Others'),
(4, 0, 'Internet Bill');

-- --------------------------------------------------------

--
-- Table structure for table `installer_detail`
--

CREATE TABLE `installer_detail` (
  `id` int(11) NOT NULL,
  `installment_id` int(255) NOT NULL,
  `installer_father` varchar(255) NOT NULL,
  `installer_father_contact` varchar(255) NOT NULL,
  `grander_one_name` varchar(255) NOT NULL,
  `grander_two_name` varchar(255) NOT NULL,
  `grander_one_father` varchar(255) NOT NULL,
  `grander_two_father` varchar(255) NOT NULL,
  `grander_one_contact` varchar(255) NOT NULL,
  `grander_two_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `installment_category`
--

CREATE TABLE `installment_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `installment_time` varchar(255) NOT NULL,
  `percentage` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `installment_payment`
--

CREATE TABLE `installment_payment` (
  `id` int(11) NOT NULL,
  `customer_install_id` int(50) NOT NULL,
  `product_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `stock_qty` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `due_install_amount` int(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `insallment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intsaller_payment_history`
--

CREATE TABLE `intsaller_payment_history` (
  `id` int(11) NOT NULL,
  `installment_id` int(255) NOT NULL,
  `installment_type_id` int(11) NOT NULL,
  `total_istall_amount` varchar(255) NOT NULL,
  `per_install_amount` varchar(255) NOT NULL,
  `pay_per_install` varchar(255) DEFAULT '0',
  `insallment_date` date NOT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `id` int(11) NOT NULL,
  `theme_style` varchar(100) NOT NULL,
  `header_color` varchar(100) NOT NULL,
  `sidebar_background` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `method`) VALUES
(1, 'cash'),
(2, 'credit/debit card');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `alert_quantity` varchar(100) NOT NULL,
  `open_stock_quantity` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `category_id`, `alert_quantity`, `open_stock_quantity`, `description`, `product_image`) VALUES
(19, 'Women Lehnga', '1122', 1, '20', '0', 'Lehnga', ''),
(20, 'Girls Maxi', '3344', 2, '10', '0', 'Girls Maxi', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(17) NOT NULL,
  `supplier_id` int(100) NOT NULL,
  `after_discount_purchase` decimal(11,2) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `supplier_id`, `after_discount_purchase`, `purchase_date`) VALUES
(21, 1, '10000.00', '2023-05-29'),
(22, 1, '20000.00', '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `purchase_price` decimal(11,2) NOT NULL,
  `sale_price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `product_id`, `warehouse_id`, `product_code`, `purchase_price`, `sale_price`, `quantity`, `purchase_total`) VALUES
(22, 21, 19, 0, '1122', '100.00', '200.00', 100, '10000.00'),
(23, 22, 20, 0, '3344', '200.00', '300.00', 100, '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `after_discount` decimal(11,2) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `customer_id`, `discount`, `after_discount`, `sale_date`) VALUES
(39, 1, 0, '1000.00', '2023-05-31'),
(40, 1, 0, '200.00', '2023-06-05'),
(41, 1, 0, '300.00', '2023-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `warehouse_id`, `product_code`, `price`, `stock_qty`, `quantity`, `total_price`) VALUES
(47, 39, 19, 0, '1122', '200.00', 100, 2, '400.00'),
(48, 39, 20, 0, '3344', '300.00', 100, 2, '600.00'),
(49, 40, 19, 0, '1122', '200.00', 98, 1, '200.00'),
(50, 41, 20, 0, '3344', '300.00', 98, 1, '300.00'),
(51, 41, 0, 0, '', '0.00', 0, 1, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_return`
--

CREATE TABLE `sale_return` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `sale_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `discount` bigint(20) NOT NULL DEFAULT 0,
  `return_price` bigint(20) NOT NULL,
  `return_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_return`
--

INSERT INTO `sale_return` (`id`, `customer_id`, `sale_id`, `product_id`, `product_price`, `discount`, `return_price`, `return_date`) VALUES
(7, 1, 0, 19, 200, 0, 200, '2023-05-31'),
(8, 1, 0, 19, 200, 0, 200, '2023-05-31'),
(9, 1, 0, 20, 300, 0, 300, '2023-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_item_id` int(11) NOT NULL DEFAULT 0,
  `warehouse_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` decimal(11,2) NOT NULL,
  `sale_price` decimal(11,2) NOT NULL,
  `stock_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`id`, `product_id`, `purchase_item_id`, `warehouse_id`, `product_code`, `quantity`, `purchase_price`, `sale_price`, `stock_date`) VALUES
(38, 19, 22, 0, '1122', 97, '100.00', '200.00', '2023-05-18'),
(39, 20, 23, 0, '3344', 97, '200.00', '300.00', '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` text NOT NULL,
  `supplier_open_balance` int(100) NOT NULL,
  `supplier_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_contact`, `supplier_open_balance`, `supplier_address`) VALUES
(1, 'imran', '03452008866', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL DEFAULT 0,
  `debit` decimal(11,2) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `Ldate` date NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_ledger`
--

INSERT INTO `supplier_ledger` (`id`, `supplier_id`, `purchase_id`, `payment_id`, `debit`, `credit`, `Ldate`, `details`) VALUES
(23, 1, 21, 1, '10000.00', '10000.00', '2023-05-29', 'paid to imran 10000'),
(24, 1, 22, 1, '20000.00', '20000.00', '2023-05-29', 'Girls maxi purchase from imran 20000 paid to imran');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL DEFAULT 0,
  `supplier_id` int(11) NOT NULL,
  `payment_method_id` varchar(11) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `receipt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `signupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `role_id`, `status`, `name`, `username`, `email`, `password`, `contact`, `image`, `address`, `signupdate`) VALUES
(1, 1, 1, 'admin', 'admin', 'admin', 'admin', '', '2007-05-21-00-05-48fun_logo.jpeg', '', '0000-00-00'),
(2, 2, 1, 'user', 'user', 'user', 'user', '1234567890', '', 'nil', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ware_house`
--

CREATE TABLE `ware_house` (
  `id` int(11) NOT NULL,
  `warehouse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_history`
--
ALTER TABLE `cash_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_in_bank`
--
ALTER TABLE `cash_in_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_in_bank_history`
--
ALTER TABLE `cash_in_bank_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_in_hand`
--
ALTER TABLE `cash_in_hand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_in_out`
--
ALTER TABLE `customer_in_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_category`
--
ALTER TABLE `expenses_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installer_detail`
--
ALTER TABLE `installer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_category`
--
ALTER TABLE `installment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_payment`
--
ALTER TABLE `installment_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intsaller_payment_history`
--
ALTER TABLE `intsaller_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_return`
--
ALTER TABLE `sale_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ware_house`
--
ALTER TABLE `ware_house`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_history`
--
ALTER TABLE `cash_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `cash_in_bank`
--
ALTER TABLE `cash_in_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_in_bank_history`
--
ALTER TABLE `cash_in_bank_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_in_hand`
--
ALTER TABLE `cash_in_hand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_in_out`
--
ALTER TABLE `customer_in_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses_category`
--
ALTER TABLE `expenses_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installer_detail`
--
ALTER TABLE `installer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installment_category`
--
ALTER TABLE `installment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installment_payment`
--
ALTER TABLE `installment_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intsaller_payment_history`
--
ALTER TABLE `intsaller_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sale_return`
--
ALTER TABLE `sale_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ware_house`
--
ALTER TABLE `ware_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
