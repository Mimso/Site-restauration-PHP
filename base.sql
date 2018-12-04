CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT 'GUEST'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `email`, `password`, `postal`, `birthday`, `phone`, `permission`) VALUES
(1, 'admin', 'webmaster@localhost', '21232f297a57a5a743894a0e4a801fc3', '10 rue des admins', '2018-12-04', '0606060606', 'ADMIN');

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
