use StoreModule

INSERT INTO `store_element_category` (`id`, `name`, `parent_id`) VALUES
(1, 'toyz', NULL),
(2, 'machinez', NULL),
(4, 'человеки', NULL),
(5, 'рабы', 4),
(6, 'короли', 4),
(7, 'carz', 1),
(8, 'robotz', 1),
(9, 'phonez', 1),
(10, 'IT', NULL),
(11, 'phonez', 10),
(12, 'CPU', 10),
(3, 'robotz', 10);