-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 12:19 PM
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
-- Database: `workify_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `current_location` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cv_file` varchar(255) DEFAULT NULL,
  `portfolio_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `full_name`, `current_location`, `phone_number`, `email`, `cv_file`, `portfolio_file`, `created_at`) VALUES
(1, 'Adela Salsabila', 'Bandung', '081234567891', 'haerin@gmail.com', '', '', '2024-12-31 08:14:41'),
(2, 'Adela Salsabila', 'Bandung', '081234567891', 'haerin@gmail.com', '', '', '2024-12-31 08:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `employee_size` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `logo_url`, `industry`, `employee_size`, `description`, `address`) VALUES
(1, 'Kredivo Group', 'https://storage.googleapis.com/a1aa/image/TkfhkyQHwTxIdau3IIahDSEmqBCqtFcAm6heBcApN8zCjL6TA.jpg', 'Financial Services', '1001 - 5000 employees', 'Kredivo is the leading digital credit platform in Indonesia and Vietnam...', 'Jl. Laksda Adisucipto Kav. 52-53, RT.7/RW.7, Rawamangun, Pulo Gadung, Kota Jakarta Timur, Jakarta 13220');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company`, `salary`, `job_type`, `experience`, `education`, `description`, `requirements`, `skills`, `created_at`) VALUES
(1, 'Field Collector (SLEMAN)', 'Kredivo Group', 'IDR. 3.500.000 - 3.500.001/Bulan', 'Full Time', 'Pengalaman kurang dari 1 tahun', 'Minimal SMA/SMK', 'Persyaratan: Usia 18 - 40 tahun, Memiliki kendaraan roda dua dan SIM C yang masih berlaku...', 'Full Time, Pengalaman kurang dari 1 tahun, Minimal SMA/SMK, 20-40 tahun', 'Teamwork, Strong Communication Skills', '2024-12-31 07:45:58'),
(2, 'Field Collector (KLATEN)', 'Kredivo Group', 'IDR. 3.500.000 - 3.500.001/Bulan', 'Full Time', 'Pengalaman kurang dari 1 tahun', 'Minimal SMA/SMK', 'Persyaratan: Usia 18 - 40 tahun, Memiliki kendaraan roda dua dan SIM C yang masih berlaku...', 'Full Time, Pengalaman kurang dari 1 tahun, Minimal SMA/SMK, 20-40 tahun', 'Teamwork, Strong Communication Skills', '2024-12-31 07:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'farrel ka', 'farrelly155@gmail.com', '$2y$10$Hw4ByZMJsrQDl4Fvp0ylleoaVBcT.hm4fVRdZ53GO77NLPTe.8yby', '2024-12-19 03:05:18'),
(2, 'farrel', 'redhokurniawan77@gmail.com', '$2y$10$x75Z30VxAqPptb8nqjniLOxMLYI5wwgxWeae7tvdQ6M4SUMJ9M6RS', '2024-12-19 03:06:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
