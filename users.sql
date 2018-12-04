CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT 'GUEST',
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `email`, `password`, `postal`, `birthday`, `phone`, `permission`, `lastname`) VALUES
(1, 'FIRSTNAME', 'admin@email', '21232f297a57a5a743894a0e4a801fc3', '10 rue des admins', '2000-12-04', '0606060606', 'ADMIN', 'admin');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

