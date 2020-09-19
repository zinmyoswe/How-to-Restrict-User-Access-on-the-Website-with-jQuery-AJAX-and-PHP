
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `name` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `name`, `password`, `active`) VALUES
(1, 'yssyogesh', 'Yogesh Singh', '12345', 0),
(2, 'sona', 'Sonarika Bhadoria', '12345', 1),
(3, 'vishal', 'Vishal Sahu', '12345', 0),
(4, 'sunil', 'Sunil singh', '12345', 0),
(5, 'vijay', 'Vijay mourya', '12345', 1),
(6, 'anil', 'Anil singh', '12345', 1),
(7, 'jiten', 'jitendra singh', '12345', 1);
