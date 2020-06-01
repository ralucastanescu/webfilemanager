-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `webfilemanagerDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `title`, `description`, `tag`, `attachment`, `original_name`, `created_at`, `updated_at`) VALUES
(29, 1, 'Test PDF file', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'pdf, text', '5ed523a83c43a_Test_PDF.pdf', 'Test PDF.pdf', '2020-06-01 15:50:00', NULL),
(30, 1, 'Test TXT file', 'Just a simple txt, for testing purposes', 'txt', '5ed523ec79423_Test.txt', 'Test.txt', '2020-06-01 15:51:08', NULL),
(31, 2, 'Test PNG file', 'This is a test PNG upload. ', 'png, image', '5ed52475d584d_sample_png.png', 'sample png.png', '2020-06-01 15:53:25', NULL),
(32, 2, 'Test ZIP file', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'zip', '5ed524f567b30_Test_ZIP.zip', 'Test ZIP.zip', '2020-06-01 15:55:33', NULL),
(33, 3, 'Test JPG file', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'jpg, image, img', '5ed52519f30ed_company.jpg', 'company.jpg', '2020-06-01 15:56:09', NULL),
(34, 3, 'Test DOC file', 'Just a random description', 'doc', '5ed5255699e47_file-sample_100kB.doc', 'file-sample_100kB.doc', '2020-06-01 15:57:10', NULL),
(35, 3, 'Test DOCX file', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit a', 'docx', '5ed5257932c7e_file-sample_100kB.docx', 'file-sample_100kB.docx', '2020-06-01 15:57:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Raluca', 'rlcstanescu@yahoo.com', 'raluca', '202cb962ac59075b964b07152d234b70', '2020-05-31 20:45:19'),
(2, 'Anca', 'anca@yahoo.com', 'anca', '202cb962ac59075b964b07152d234b70', '2020-05-31 20:48:32'),
(3, 'Matei', 'matei@gmail.com', 'matei', '202cb962ac59075b964b07152d234b70', '2020-06-01 11:34:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;
