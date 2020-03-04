
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `publish_date` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_author_idx` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `title`, `content`, `publish_date`, `author_id`) VALUES
(4, 'Mauris id lobortis', 'Est mauris id lobortis ipsum. Curabitur vel luctus dolor. Donec venenatis accumsan velit, sit amet accumsan risus malesuada eu. Donec bibendum suscipit velit sit amet sollicitudin. In leo dui, viverra nec rhoncus quis, imperdiet vitae urna. Duis efficitur ligula mauris, at imperdiet massa molestie in. Fusce non pretium justo, eu sagittis nisl. Phasellus sapien diam, sollicitudin a tristique ac, maximus ac diam. Aenean finibus justo a orci auctor, tincidunt molestie metus commodo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent bibendum, sem sed sagittis finibus, turpis nisi accumsan purus, in ullamcorper lacus velit eget velit. Maecenas eget ipsum dui.', '2019-01-16 16:46:47', 35),
(3, 'Aenean ullamcorper', 'Aenean ullamcorper efficitur porttitor. Proin blandit tempus lorem, eleifend interdum dui commodo ac. Pellentesque eget eros velit. Aliquam ultrices lectus ultrices tempor imperdiet. Nullam aliquet vehicula sapien, id vehicula tellus maximus vitae. Mauris vestibulum turpis vitae accumsan mollis. Praesent sed nisi faucibus, posuere lacus vitae, aliquet massa. Maecenas bibendum dictum feugiat. Sed condimentum arcu ut sollicitudin porta. Donec efficitur, mi in accumsan facilisis, velit nibh rhoncus ligula, id ullamcorper quam risus et sem. Sed ultrices, justo tincidunt ultricies maximus, massa dui ornare arcu, eu aliquam est justo nec augue.', '2019-01-15 16:48:54', 35),
(5, 'Nullam egestas', 'Nullam egestas, purus eget vulputate consectetur, lacus nisl gravida quam, in vehicula ante urna gravida mi. Maecenas et laoreet neque. Suspendisse potenti. Donec gravida elit et odio maximus, consectetur suscipit nunc elementum. Donec blandit gravida enim id hendrerit. Duis consequat diam purus, eu accumsan velit sollicitudin id. Proin eu dolor lectus. Duis enim nunc, cursus et hendrerit eu, rhoncus eget ipsum. Vestibulum eu sagittis lacus, id vehicula nunc. Curabitur efficitur tellus sed nunc consectetur, egestas egestas velit porttitor. Quisque dapibus porta euismod. Fusce eget justo et ligula consequat elementum quis eu tortor.', '2019-01-15 16:49:39', 35);


DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `bio` text,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO `author` (`id`, `name`, `email`, `pwd`, `bio`, `birth_date`) VALUES
(35, 'Evandro Morini', 'test@framework.com', '$1$zlnYwMy4$XJXe7it14YoWwr0lrK3M4.', 'Pharetra diam sit amet nisl suscipit adipiscing bibendum est. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Adipiscing enim eu turpis egestas pretium aenean pharetra. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus.', '1985-08-19');
COMMIT;

