-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 03:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `sample_site_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Sample Content 101', '<h1>Header 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus viverra tellus eget finibus. Nam pharetra mauris id purus fringilla volutpat vel nec diam.</p>\r\n<h1>Header 2</h1>\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus lacinia ut velit nec euismod. Integer volutpat ipsum vel eros tristique tincidunt.</p>\r\n<h1>Header 3</h1>\r\n<h2>Sub Header 3.1</h2>\r\n<p>Ut mollis quam non quam efficitur fermentum. Vivamus commodo malesuada dolor, ut pellentesque ante egestas pharetra.</p>\r\n<h3>Sub Header 3.1.1</h3>\r\n<p>Suspendisse potenti. Nulla auctor ornare dui in commodo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<h4>Sub Header 3.1.1.1</h4>\r\n<p>Nullam arcu ipsum, sodales sed ullamcorper eu, suscipit eget lorem. Aliquam erat volutpat. Suspendisse quis ligula ut turpis rutrum ultrices non ut sapien.</p>\r\n<h2>Sub Header 3.2</h2>\r\n<p>Cras sodales sagittis elit ac porta. Vestibulum tincidunt, odio non dictum placerat, risus diam cursus odio, eu fringilla mi mi sit amet sapien. Donec pretium accumsan lorem, at lobortis metus.</p>\r\n<h1>Header 4</h1>\r\n<p>Aenean sit amet elementum purus. Sed sed elit et urna congue malesuada id vitae eros. Fusce sem metus, vestibulum sed vestibulum ac, blandit placerat augue. Praesent in molestie lacus. Sed in augue tincidunt, hendrerit felis rhoncus, finibus nisl. Quisque sodales nulla laoreet dolor vulputate, quis feugiat tellus gravida. Morbi ut rhoncus turpis. Nam vehicula vehicula sem, quis volutpat magna malesuada quis. Nulla sit amet placerat diam. Donec in sollicitudin dolor. Ut vitae mauris vel orci tincidunt tristique pulvinar ac dui.</p>', '2023-02-03 12:01:11', '2023-02-03 14:41:13'),
(2, 'Sample 102', '<h2>Lorem ipsum dolor sit amet</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et quam et ante ullamcorper rutrum. In eget risus enim. Nullam laoreet felis eget sollicitudin volutpat. Sed vel erat nisi. Nam eget facilisis quam. In hendrerit mauris vel maximus vehicula. Suspendisse vel arcu ac nunc elementum accumsan. Aliquam cursus in est nec accumsan. Ut sagittis massa a sapien vestibulum bibendum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla quis tellus gravida, mollis elit quis, porta risus. Praesent at lobortis justo, sed laoreet est. Donec at sem quis purus sollicitudin venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam sit amet dolor posuere, mollis nunc nec, molestie risus.</p>\r\n<p>Proin dignissim elit lacus, quis efficitur quam iaculis eu. Vestibulum bibendum sapien in quam efficitur, nec ultricies erat tincidunt. Nullam mollis iaculis facilisis. Ut rhoncus enim in mauris ornare, a tempus tortor venenatis. Sed at rhoncus eros. Sed vestibulum eros fringilla ultrices interdum. Maecenas ac ipsum et odio bibendum porta ut id tellus. Nulla eget sem ac eros vulputate faucibus eu non tortor.</p>\r\n<h2>Maecenas aliquam euismod ligula nec viverra</h2>\r\n<p>Maecenas aliquam euismod ligula nec viverra. Praesent imperdiet tristique eros sed consectetur. Ut justo lectus, pellentesque eget tellus vitae, tincidunt vehicula dolor. Praesent venenatis posuere lectus, vitae aliquam odio condimentum et. Sed condimentum, sem quis ornare commodo, orci orci fermentum augue, nec efficitur leo arcu at libero. Integer tempor rhoncus magna et tincidunt. Etiam elementum odio massa, eget volutpat lacus elementum porttitor. Curabitur gravida nulla felis, ut porta magna elementum non. Aliquam elit massa, rhoncus eget dapibus a, ultrices quis magna. Mauris hendrerit sem non sem rutrum, vitae imperdiet nibh congue. Sed ex augue, egestas sed feugiat in, laoreet elementum odio. Nulla purus purus, tincidunt at dolor et, tristique laoreet mi.</p>\r\n<p>Donec venenatis vel magna vitae feugiat. Curabitur in libero ullamcorper, rutrum neque in, interdum enim. Nullam ut feugiat massa, sit amet mattis tellus. Duis pulvinar libero et felis pretium dictum. Etiam in luctus sem, a lacinia eros. Aliquam sollicitudin dictum lobortis. Duis urna tellus, eleifend sed pretium in, convallis vitae metus. Proin pretium maximus venenatis. Integer rutrum elit non diam sollicitudin venenatis. Integer in nibh eu diam dictum molestie. Aliquam erat volutpat. Mauris finibus, felis eu convallis semper, nulla magna pretium erat, sit amet finibus sapien elit ac tortor.</p>', '2023-02-04 10:16:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
