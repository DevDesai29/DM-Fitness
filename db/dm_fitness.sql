-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2021 at 09:46 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dm_fitness`
--
CREATE DATABASE IF NOT EXISTS `dm_fitness` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dm_fitness`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@dmfitness.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE IF NOT EXISTS `bill_detail` (
  `bill_id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `order_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `bill_amount` int(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`bill_id`, `bill_date`, `order_id`, `cart_id`, `cust_id`, `bill_amount`) VALUES
(1, '2021-05-13', 1, 1, 1, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `book_package_detail`
--

CREATE TABLE IF NOT EXISTS `book_package_detail` (
  `book_id` int(10) NOT NULL,
  `book_date` date NOT NULL,
  `gym_start_date` date NOT NULL,
  `gym_end_date` date NOT NULL,
  `package_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `package_amt` int(10) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_package_detail`
--

INSERT INTO `book_package_detail` (`book_id`, `book_date`, `gym_start_date`, `gym_end_date`, `package_id`, `cust_id`, `package_amt`) VALUES
(1, '2021-05-05', '2021-06-01', '2021-07-01', 1, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_detail_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`cart_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_detail_id`, `cart_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 2, 1, 1200),
(2, 1, 5, 2, 500),
(3, 2, 1, 1, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE IF NOT EXISTS `cart_master` (
  `cart_id` int(10) NOT NULL,
  `cart_date` date NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`cart_id`, `cart_date`) VALUES
(1, '2021-05-12'),
(2, '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `complain_detail`
--

CREATE TABLE IF NOT EXISTS `complain_detail` (
  `complain_id` int(10) NOT NULL,
  `complain_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_detail`
--

INSERT INTO `complain_detail` (`complain_id`, `complain_date`, `description`, `cust_id`, `status`) VALUES
(1, '2021-05-12', 'your gym trainer not provide good tarining ', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cust_regis`
--

CREATE TABLE IF NOT EXISTS `cust_regis` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_regis`
--

INSERT INTO `cust_regis` (`cust_id`, `cust_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`, `height`, `weight`, `description`) VALUES
(1, 'Dev Desai', 'valsad pardi', 'valsad', '9876543210', 'dev@yahoo.com', '111111', 'MALE', '182cm', '80KG', 'become a world best body builder');

-- --------------------------------------------------------

--
-- Table structure for table `gym_products`
--

CREATE TABLE IF NOT EXISTS `gym_products` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_products`
--

INSERT INTO `gym_products` (`product_id`, `product_name`, `description`, `price`, `product_img`) VALUES
(1, 'Whey Protein Isolate', 'Best tasting, OSOAA Triple Chocolate Whey Protein Isolate is the pure wholesome goodness without any harmful banned substance! Great for athletes and safe for the entire family! Higher glutamine level', 2500, 'prod_img/P1_9864.png'),
(2, 'Gold Whey Protein', 'PREMIUM GOLD WHEY ADVANCED WHEY PROTEIN ISOLATE  WHEY PROTEIN CONCENTRATE BLEND Whey protein is the most important weapon in your muscle-building arsenal, it promotes muscle growth, counteracts muscle', 1200, 'prod_img/P2_1805.png'),
(3, 'XLR8 Whey Protein', 'Made in a company-owned and operated facility, XLR8 flavoured whey is a specially designed for all the fitness enthusiasts who are looking forward to have a lean physique with great muscles.', 1400, 'prod_img/P3_1384.png'),
(4, 'capsule Weight Gainers', '(1) It will gain your maximum weight... (2) It will increase your body size... (3) It will increase your energy level & fitness.... (4) It will improve your skin complexion & get glowing skin... ', 400, 'prod_img/P4_4732.png'),
(5, 'Abbzorb Protein Bar ', 'Protein Blend (Whey Protein Concentrate, Milk Protein Concentrate, Calcium caseinate), Humectants ), Dark Compound (Maltitol, Edible Vegetable Fat, Cocoa Solid, Emulsifier), Isomalt Oligosaccharides, ', 500, 'prod_img/P5_2122.png');

-- --------------------------------------------------------

--
-- Table structure for table `membership_detail`
--

CREATE TABLE IF NOT EXISTS `membership_detail` (
  `membership_id` int(10) NOT NULL,
  `membership_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`membership_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_detail`
--

INSERT INTO `membership_detail` (`membership_id`, `membership_name`, `description`) VALUES
(1, 'Premium Membership', 'Steam Free for in our premium membership with personal trainer'),
(2, 'Gold Membersihp', 'In Gold Membership only steam is free but for personal trainer you should give extra payment'),
(3, 'Silver Membership', 'Only Equipment is free for execersie no steam and no trainer.');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `cart_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `del_address` varchar(200) NOT NULL,
  `del_mobile_no` varchar(10) NOT NULL,
  `order_amount` int(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `order_date`, `cart_id`, `cust_id`, `del_address`, `del_mobile_no`, `order_amount`, `payment_type`) VALUES
(1, '2021-05-12', 1, 1, 'valsad pardi', '9876543210', 2200, 'ONLINE'),
(2, '2021-05-12', 2, 1, 'valsad pardi', '7485963210', 2500, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE IF NOT EXISTS `package_detail` (
  `package_id` int(10) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `membership_id` int(10) NOT NULL,
  `package_description` varchar(200) NOT NULL,
  `package_timings` varchar(30) NOT NULL,
  `package_charges` int(10) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_detail`
--

INSERT INTO `package_detail` (`package_id`, `package_name`, `membership_id`, `package_description`, `package_timings`, `package_charges`) VALUES
(1, 'Premium Membership Month 1', 1, 'Premium Membership 1 Month package for our customer', '1 Months', 5000),
(2, 'Premium Membership Month 3', 1, 'Premium Membership 3 Month package for our customer', '3 Months', 12000),
(3, 'Premium Membership Month 6', 1, 'Premium Membership 6 Month package for our customer', '6 Months', 25000),
(4, 'Premium Membership 1 Year', 1, 'Premium Membership 1 Year package for our customer', '12 Months', 45000),
(5, 'Gold Membership Month 1', 2, 'Gold Membership 1 month package ', '1 Months', 4000),
(6, 'Gold Membership Month 3', 2, 'Gold Membership 3 Month package for our customer', '3 Months', 11000),
(7, 'Gold Membership Month 6', 2, 'Gold  Membership 6 Month package for our customer', '6 Months', 20000),
(8, 'Gold Membership 1 Year', 2, 'Gold Membership 1 Year package for our customer', '12 Months', 40000),
(9, 'Silver Membership Month 1', 3, 'Silver Membership 1 Month package for our customer', '1 Months', 3000),
(10, 'Silver Membership Month 3', 3, 'Silver Membership 3 Month package for our customer', '3 Months', 5500);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `cvv_no` int(6) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `expiry_date` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `book_id`, `order_id`, `card_type`, `card_no`, `cvv_no`, `bank_name`, `card_holder_name`, `expiry_date`, `amount`) VALUES
(1, 1, 0, 'DEBIT CARD', '1234567890123457', 113, 'bob', 'dev desai', 'Oct-2026', 5000),
(2, 0, 1, 'DEBIT CARD', '1234567890123456', 111, 'bob', 'dev desai', 'April-2024', 2200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
