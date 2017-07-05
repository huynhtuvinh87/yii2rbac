-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 05:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Member', '1', 1499224119),
('Member', '2', 1499223551),
('member1', '1', 1499224119),
('Quyền admin', '1', 1499224119);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1499223439, 1499223439),
('/admin/changepassword', 2, NULL, NULL, NULL, 1499221582, 1499221582),
('/admin/create', 2, NULL, NULL, NULL, 1499221581, 1499221581),
('/admin/delete', 2, NULL, NULL, NULL, 1499221582, 1499221582),
('/admin/index', 2, NULL, NULL, NULL, 1499221581, 1499221581),
('/admin/profile', 2, NULL, NULL, NULL, 1499221582, 1499221582),
('/admin/update', 2, NULL, NULL, NULL, 1499221581, 1499221581),
('/assignment/*', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/assignment/assign', 2, NULL, NULL, NULL, 1499223186, 1499223186),
('/assignment/index', 2, NULL, NULL, NULL, 1499223185, 1499223185),
('/assignment/view', 2, NULL, NULL, NULL, 1499223185, 1499223185),
('/item/*', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/item/assign', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/item/create', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/item/delete', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/item/doaction', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/item/index', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/item/update', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/item/view', 2, NULL, NULL, NULL, 1499223440, 1499223440),
('/permission/*', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/assign', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/create', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/delete', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/doaction', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/index', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/update', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/permission/view', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/role/*', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('/role/assign', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('/role/create', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/role/delete', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('/role/doaction', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/role/index', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/role/update', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/role/view', 2, NULL, NULL, NULL, 1499223441, 1499223441),
('/route/assign', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('/route/create', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('/route/index', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('/route/refresh', 2, NULL, NULL, NULL, 1499223442, 1499223442),
('Member', 2, 'xcac', NULL, NULL, 1499221894, 1499222140),
('member1', 1, NULL, NULL, NULL, 1499222310, 1499222310),
('Quyền admin', 1, NULL, NULL, NULL, 1499222099, 1499222099);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Member', '/admin/index'),
('Member', '/item/index'),
('Member', '/permission/index'),
('Member', '/role/index'),
('Member', '/route/index'),
('Quyền admin', '/admin/*'),
('Quyền admin', '/admin/changepassword'),
('Quyền admin', '/admin/create'),
('Quyền admin', '/admin/delete'),
('Quyền admin', '/admin/index'),
('Quyền admin', '/admin/profile'),
('Quyền admin', '/admin/update'),
('Quyền admin', '/assignment/*'),
('Quyền admin', '/assignment/assign'),
('Quyền admin', '/assignment/index'),
('Quyền admin', '/assignment/view'),
('Quyền admin', '/item/*'),
('Quyền admin', '/item/assign'),
('Quyền admin', '/item/create'),
('Quyền admin', '/item/delete'),
('Quyền admin', '/item/doaction'),
('Quyền admin', '/item/index'),
('Quyền admin', '/item/update'),
('Quyền admin', '/item/view'),
('Quyền admin', '/permission/*'),
('Quyền admin', '/permission/assign'),
('Quyền admin', '/permission/create'),
('Quyền admin', '/permission/delete'),
('Quyền admin', '/permission/doaction'),
('Quyền admin', '/permission/index'),
('Quyền admin', '/permission/update'),
('Quyền admin', '/permission/view'),
('Quyền admin', '/role/*'),
('Quyền admin', '/role/assign'),
('Quyền admin', '/role/create'),
('Quyền admin', '/role/delete'),
('Quyền admin', '/role/doaction'),
('Quyền admin', '/role/index'),
('Quyền admin', '/role/update'),
('Quyền admin', '/role/view'),
('Quyền admin', '/route/assign'),
('Quyền admin', '/route/create'),
('Quyền admin', '/route/index'),
('Quyền admin', '/route/refresh'),
('Quyền admin', 'Member'),
('Quyền admin', 'member1');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1499148829),
('m130524_201442_init', 1499148848),
('m140506_102106_rbac_init', 1499219494);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'MMhaEXrgi7MNh1fiRQ2abT_ePpXIMzy5', '$2y$13$IqiGuk1J59sEKcc7gpFexeBbTYh24quDUdGtt6AYcEwFwnGRvpYqO', NULL, 'admin', 10, 1489110367, 1489110367),
(2, 'giicmsvn', 'giicmsvn@gmail.com', '6ynf0omWozA49As44SiEGr9sv0E83z4B', '$2y$13$t6L1cmq0sVfuXXMdp/kc1e.a0l0tg/m99bkpqHRKRFoXoYULN.akG', NULL, 'admin', 10, 1499222200, 1499222200);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `user_id` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`user_id`, `meta_key`, `meta_value`) VALUES
(2, 'firstname', 'Vinh'),
(2, 'lastname', 'Huynh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `index-user-status` (`status`),
  ADD KEY `index-user-username` (`username`),
  ADD KEY `index-user-email` (`email`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD KEY `index-user_meta-user_id` (`user_id`),
  ADD KEY `index-user_meta-meta_key` (`meta_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `fk-user_meta-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
