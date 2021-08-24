
-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

DROP TABLE IF EXISTS `users_meta`;
CREATE TABLE `users_meta` (
  `id_meta` int(11) NOT NULL,
  `id_user` mediumint(9) NOT NULL,
  `meta_key` char(100) NOT NULL,
  `meta_value` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
