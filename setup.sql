CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(18) NOT NULL,
  `username` varchar(64) NOT NULL,
  `discriminator` int(4) NOT NULL,
  `avatar` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `users` ADD PRIMARY KEY (`id`);