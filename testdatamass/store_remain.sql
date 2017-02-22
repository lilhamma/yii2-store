use StoreModule;

INSERT INTO `store_remain` (`id`, `element_id`, `store_id`, `amount`, `comment`) VALUES
(2, 2, 1, 13, NULL),
(3, 3, 1, 10, NULL),
(4, 4, 1, 100, NULL),
(5, 4, 2, 15, NULL),
(6, 2, 2, 15, NULL),
(10, 2, 3, 15, NULL),
(11, 3, 3, 40, NULL),
(12, 4, 3, 60, NULL),
(14, 2, 4, 0, 'WTF?'),
(17, 8, 4, 0, 'WTF?'),
(18, 9, 4, 0, 'WTF?'),
(19, 10, 4, 0, 'WTF?'),
(21, 2, 5, 0, 'NO!'),
(22, 4, 5, 666, 'NO!'),
(23, 7, 5, 666, 'NO!'),
(24, 7, 6, 666, 'NO!'),
(29, 2, 6, 24, 'YES!');
