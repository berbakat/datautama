-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 10:42 AM
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
-- Database: `datautama`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `description`, `created_at`) VALUES
(1, 'botol', 10000, 10, 'tes produk', '2023-11-20 17:20:12'),
(2, 'produk 1', 1000, 10, 'deskripsi produk 1', '2023-11-21 00:12:30'),
(3, 'produk 2', 2000, 10, 'deskripsi produk 2', '2023-11-21 00:12:30'),
(4, 'produk 3', 3000, 10, 'deskripsi produk 3', '2023-11-21 00:13:37'),
(5, 'produk 4', 4000, 10, 'deskripsi produk 4', '2023-11-21 00:13:37'),
(6, 'produk 5', 5000, 10, 'deskripsi produk 5', '2023-11-21 00:14:24'),
(7, 'produk 6', 6000, 10, 'deskripsi produk 6', '2023-11-21 00:14:24'),
(8, 'produk 7', 7000, 10, 'deskripsi produk 7', '2023-11-21 00:15:00'),
(9, 'produk 8', 8000, 10, 'deskripsi produk 8', '2023-11-21 00:15:00'),
(10, 'produk 9', 9000, 10, 'deskripsi produk 9', '2023-11-21 00:15:32'),
(11, 'produk 10', 10000, 10, 'deskripsi produk 10', '2023-11-21 00:15:32'),
(12, 'tes', 1000, 10, 'hgfkgk', '2023-11-21 02:00:21'),
(14, 'coba', 1000, 10, 'coba', '2023-11-21 02:35:22'),
(15, 'coba 2', 10000, 10, 'coba 2', '2023-11-21 02:39:44'),
(16, 'coba 3', 10000, 100, 'coba 3', '2023-11-21 02:41:03'),
(18, 'dsdf', 1233, 123, 'zxczx', '2023-11-21 08:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `reference_no`, `price`, `quantity`, `payment_amount`, `product_id`, `created_at`) VALUES
(1, 'INV23112100000000001', 10000, 2, 20000, 1, '2023-11-21 06:13:52'),
(2, 'INV23112100000000002', 1000, 3, 3000, 2, '2023-11-21 06:13:52'),
(3, 'INV23112100000000003', 3000, 3, 9000, 4, '2023-11-21 06:16:29'),
(4, 'INV23112100000000004', 8000, 2, 16000, 9, '2023-11-21 06:16:29'),
(5, 'INV23112100000000005', 2000, 2, 4000, 3, '2023-11-21 06:17:28'),
(6, 'INV23112100000000006', 8000, 1, 8000, 9, '2023-11-21 06:17:28'),
(7, 'INV23112100000000007', 9000, 1, 9000, 10, '2023-11-21 06:18:30'),
(8, 'INV23112100000000008', 4000, 3, 12000, 5, '2023-11-21 06:18:30'),
(9, 'INV23112100000000009', 1000, 5, 5000, 12, '2023-11-21 06:20:13'),
(10, 'INV23112100000000010', 5000, 2, 10000, 6, '2023-11-21 06:20:13'),
(11, 'INV23112100000000011', 7000, 1, 7000, 8, '2023-11-21 06:21:14'),
(12, 'INV23112100000000012', 5000, 2, 10000, 6, '2023-11-21 06:21:14'),
(13, 'INV23112100000000013', 2000, 3, 6000, 3, '2023-11-21 07:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`) VALUES
(1, 'coba', 'coba', '$2y$12$E5uQuAchgJB.XAqPi6SCaeSyqNoSwwdpdrUOaklPP3hWmpHQZJD4W', '2023-11-20 15:08:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
