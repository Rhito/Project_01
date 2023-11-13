-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 08:55 AM
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
-- Database: `project_01_dtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATEGORY_ID` char(15) NOT NULL,
  `CATEGORY_NAME` varchar(120) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(15) NOT NULL,
  `CUSTOMER_NAME` varchar(120) NOT NULL,
  `PHONE_NUMBER` int(10) NOT NULL,
  `EMAIL` varchar(120) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ORDERDETAIL_ID` int(15) NOT NULL,
  `ORDER_ID` char(15) NOT NULL,
  `PRODUCT_ID` char(15) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` char(15) NOT NULL,
  `CUSTOMER_ID` int(15) NOT NULL,
  `ORDER_DATE` date NOT NULL,
  `TOTAL_AMOUNT` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` char(15) NOT NULL,
  `PRODUCT_NAME` varchar(120) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL,
  `CATEGORY_ID` char(15) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `USER_ID` int(15) NOT NULL,
  `USER_NAME` varchar(60) NOT NULL,
  `PASSWORD` char(120) NOT NULL,
  `CUSTOMER_ID` int(15) NOT NULL,
  `ROLE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ORDERDETAIL_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CUSTOMER_ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ORDERDETAIL_ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `USER_ID` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE orders
ADD FOREIGN KEY (CUSTOMER_ID) REFERENCES customers(CUSTOMER_ID);

ALTER TABLE product
ADD FOREIGN KEY (CATEGORY_ID) REFERENCES categories(CATEGORY_ID);

ALTER TABLE orderdetail
ADD FOREIGN KEY (ORDER_ID) REFERENCES orders(ORDER_ID),
ADD FOREIGN KEY (PRODUCT_ID) REFERENCES product(PRODUCT_ID);

ALTER TABLE user_account
ADD FOREIGN KEY (CUSTOMER_ID) REFERENCES customers(CUSTOMER_ID);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
