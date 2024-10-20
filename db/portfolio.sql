-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 07:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply` text DEFAULT NULL,
  `reply_status` varchar(10) DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `institution`, `degree`, `start_year`, `end_year`, `description`) VALUES
(5, 'Politeknik Negeri padang', 'Diploma III', '2012', '2015', 'Saya sangat senang sekali menjadi alumni Politeknik Negeri Padang,Karena Ilmu yang di ajarkan sangat Invotif dan menujang ke masa depan');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `position`, `company`, `start_date`, `end_date`, `description`) VALUES
(5, ' IT Support Staff', 'Haluan Media Group', '2015-01-21', '2015-07-30', 'Admin Website & IT Network & Content Spesialist Media Sosial'),
(6, 'Technical Installer', 'Ericsson Indonesia', '2016-11-10', '2017-03-01', 'installation of BTS XL & Indosat network using Ericsson Products'),
(7, 'ITC Engineer', 'Ericsson Indonesia', '2017-03-10', '2018-12-30', '1.Installation of BTS XL & Indosat network using Ericsson Products \r\n2.commissioning 2G,3G,&4G networks\r\n3. Troubleshoot on Ericssson Device\r\n4.ATP Onsite'),
(8, 'Documment Control', 'Ericsson Indonesia', '2018-01-01', '2023-09-30', '1. Ensure that ATP and Pre ATP Documents run well until Submit to Customers (XL & Indosat) \r\n2. Provide direction to the target team that must be achieved\r\n3.Produce SID using Auto CAD Tools\r\n4. Create a database for reports to the head of division\r\n5. make a plan to produce doc to the team'),
(9, 'Admin project', 'Ericsson Indonesia', '2020-08-01', '2023-09-01', '1.Area Permit Staff\r\n2.Permit Leadership\r\n3.Admin QC'),
(10, 'Freelance Telekomunikasi', '4PM', '2023-11-15', '0000-00-00', '-');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `description`, `url`, `image`, `created_at`) VALUES
(6, 'Sistem Informasi Bimbingan Konseling SMA N1 Sungai Limau', 'Sistme ini bertujuan untuk mengaatur data-data siswa dari mulai orang tua dan masalah yang di hadapi oleh siswa itu sendiri ', 'https://bksman1sungailimau.com', 'Photo ku.jpg', '2024-10-20 16:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `level`) VALUES
(5, 'Manajemen Data', 9),
(6, 'Microsoft Office (Excel,word dan produk Office lai', 10),
(7, 'Pemrograman PHP dan MYSQL', 8),
(8, 'Web Devloper', 9),
(9, 'Networking', 8),
(10, 'Design Grafis (Photoshop,Corel Draw,Canva,Figma)', 8),
(11, 'Documment Control', 10),
(12, 'Wordpress', 10),
(13, 'HTML 5 dan CSS', 9);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `organization`, `year`, `description`) VALUES
(5, 'Memulai Pemrograman dengan Python', 'Dicoding Indonesia', '2024', 'Belajar dasar-dasar bahasa Pemrograman python dan membuat studi kasus '),
(6, 'Belejar Dasar Data Science', 'Dicoding Indonesia', '2024', 'Pelajari dasar data science mulai dari pengenalan data hingga membuat portofolio untuk mengantarkan  menjadi seorang data scientist.'),
(7, 'Belajar Dasar Struktur SQL', 'Dicoding Indonesia', '2024', 'Pelajari berbagai konsep dasar structured query language (SQL) mulai dari pengenalan data dan basis data hingga berlatih basic query.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'ayyaiik', 'b82c0601b3f3b0240fdfa620121b687d'),
(3, 'ayyaiik', 'b82c0601b3f3b0240fdfa620121b687d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
