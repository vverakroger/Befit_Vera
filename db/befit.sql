-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 27-04-2020 a las 21:13:31
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `befit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(11) NOT NULL,
  `mins` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `breakfast`
--

DROP TABLE IF EXISTS `breakfast`;
CREATE TABLE IF NOT EXISTS `breakfast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(11) NOT NULL,
  `grs` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dinner`
--

DROP TABLE IF EXISTS `dinner`;
CREATE TABLE IF NOT EXISTS `dinner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(11) NOT NULL,
  `grs` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

DROP TABLE IF EXISTS `exercises`;
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(50) NOT NULL,
  `mins` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `kcals`, `mins`) VALUES
(1, 'Aerobics Low impact', 150, 30),
(39, 'Aerobics Step', 240, 30),
(40, 'Basketball Shooting Hoops', 120, 30),
(41, 'Bicycling  moderate', 210, 30),
(42, 'Bike Stationary', 180, 30),
(43, 'Bowling', 90, 30),
(44, 'Boxing Punching bag', 150, 30),
(45, 'Chopping Wood', 150, 30),
(46, 'Circuit Training', 210, 30),
(47, 'Cleaning House', 90, 30),
(48, 'Cooking', 60, 30),
(49, 'Dancing', 120, 30),
(50, 'Elliptical Trainer', 210, 30),
(51, 'Football Touch or Flag', 210, 30),
(52, 'Gardening', 120, 30),
(53, 'Golf Carrying clubs', 120, 30),
(54, 'Golf Using Cart', 90, 30),
(55, 'Heavy Lifting plus 35 Kg', 210, 30),
(56, 'Hiking', 150, 30),
(57, 'Martial Arts', 270, 30),
(58, 'Playing with Kids', 120, 30),
(59, 'Racquetball', 180, 30),
(60, 'Reading Sitting', 30, 30),
(61, 'Rock Climbing', 300, 30),
(62, 'Rope Jumping', 270, 30),
(63, 'Running 20 Km per H', 210, 30),
(64, 'Running 15 Km per H', 300, 30),
(65, 'Shopping', 60, 30),
(66, 'Shoveling Snow', 150, 30),
(67, 'Sitting Light Office Work', 30, 30),
(68, 'Skiing Downhill', 150, 30),
(69, 'Sleeping', 30, 30),
(70, 'Soccer', 180, 30),
(71, 'Softball or Baseball', 150, 30),
(72, 'Stair Machine', 240, 30),
(73, 'Swimming Laps', 270, 30),
(74, 'Tennis', 180, 30),
(75, 'Walking 25 Km per H', 150, 30),
(76, 'Walking 30 Km per H', 90, 30),
(77, 'Watching TV', 30, 30),
(78, 'Weight Lifting Light', 90, 30),
(79, 'Weight Lifting Vigorous', 150, 30),
(80, 'Yoga Mild', 60, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foods`
--

DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(50) NOT NULL,
  `grs` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=348 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `foods`
--

INSERT INTO `foods` (`id`, `name`, `kcals`, `grs`) VALUES
(173, 'Apple juice readytodrink', 59, 100),
(174, 'Apple with skin 7cm diam', 72, 100),
(175, 'Avocado', 161, 100),
(176, 'Bacon pork broiled fried', 130, 100),
(177, 'Bagel plain 10cm diam', 195, 100),
(178, 'Banana', 105, 100),
(179, 'Banana bread', 196, 100),
(180, 'Beans kidney canned not drained', 161, 100),
(181, 'Beans baked plain canned', 177, 100),
(182, 'Beans snap green yellow Italian fresh', 22, 100),
(183, 'Beef Ground lean crumbled pan-fried', 194, 100),
(184, 'Beef Ground regular crumbled pan-fried', 243, 100),
(185, 'Beef Rib steak lean plus fat, broiled', 232, 100),
(186, 'Beef Sirloin tip roast lean plus fat roasted', 156, 100),
(187, 'Beer light 4 percent alcohol', 99, 100),
(188, 'Beer regular 5 percent alcohol', 140, 100),
(189, 'Blueberries raw', 44, 100),
(190, 'Bologna baloney beef and pork', 153, 100),
(191, 'Bread stick plain 19cm X 2cm', 41, 100),
(192, 'Bread mixed grain', 88, 100),
(193, 'Bread white commercial', 93, 100),
(194, 'Bread whole wheat commercial', 86, 100),
(195, 'Breakfast English muffin egg cheese bacon', 289, 100),
(196, 'Broccoli chopped boiled drained', 29, 100),
(197, 'Burrito with beans and cheese', 189, 100),
(198, 'Cabbage green shredded raw', 9, 100),
(199, 'Caesar Salad', 179, 100),
(200, 'Caesar salad with chicken', 491, 100),
(201, 'Carrots raw', 25, 100),
(202, 'Cashews roasted salted', 199, 100),
(203, 'Celery raw', 6, 100),
(204, 'Cereal All Bran Kellogg?sTM', 92, 100),
(205, 'Cereal Cheerios regular General MillsTM', 95, 100),
(206, 'Cheese crackers small', 75, 100),
(207, 'Cheese puffs or twists', 205, 100),
(208, 'Cheese Cheddar', 202, 100),
(209, 'Cheeseburger double cond veg', 650, 100),
(210, 'Cheeseburger single patty, plain', 319, 100),
(211, 'Cherries sweet', 43, 100),
(212, 'Chicken chow mein', 200, 100),
(213, 'Chicken fried rice', 343, 100),
(214, 'Chicken nuggets', 285, 100),
(215, 'Chicken pot pie commercial individual', 494, 100),
(216, 'Chicken breast meat and skin roasted', 142, 100),
(217, 'Chicken broiler breast meat roasted', 119, 100),
(218, 'Chili con carne', 270, 100),
(219, 'Clementine', 35, 100),
(220, 'Club sandwich', 558, 100),
(221, 'Coffee latte', 101, 100),
(222, 'Cola', 110, 100),
(223, 'Cookies sugar', 143, 100),
(224, 'Corn sweet canned niblets', 88, 100),
(225, 'Corned beef brisket cooked', 101, 100),
(226, 'Croissant butter', 231, 100),
(227, 'Danish pastry fruit 11cm diam', 263, 100),
(228, 'Deli meat beef thin sliced', 83, 100),
(229, 'Deli meat chicken breast roll', 75, 100),
(230, 'Deli meat ham regular 11 percent fat', 91, 100),
(231, 'Doughnut cake type plain 8cm diam', 198, 100),
(232, 'Egg fried', 173, 100),
(233, 'Egg hard boiled', 78, 100),
(235, 'Fish fillet battered and fried', 265, 100),
(236, 'Fish sandwich with breaded fish', 523, 100),
(237, 'French fries', 236, 100),
(238, 'French fries frozen home baked', 96, 100),
(239, 'Frozen yogourt chocolate', 116, 100),
(240, 'Garden Salad', 47, 100),
(241, 'Garlic bread', 192, 100),
(242, 'Ginger ale', 88, 100),
(243, 'Granola bar soft nuts and raisins', 127, 100),
(244, 'Grapefruit juice unsweetened', 50, 100),
(245, 'Grapefruit white', 39, 100),
(246, 'Grapes', 69, 100),
(247, 'Gravy beef canned', 31, 100),
(248, 'Gravy chicken canned', 48, 100),
(249, 'Greek Salad', 139, 100),
(250, 'Halibut baked or broiled', 105, 100),
(251, 'Ham lean roasted', 118, 100),
(252, 'Hamburger double patty plus condiments', 576, 100),
(253, 'Hamburger single patty plain', 275, 100),
(254, 'Hot chocolate powder plus water', 160, 100),
(255, 'Hot dog plain', 242, 100),
(256, 'Ice cream cone vanilla soft serve', 266, 100),
(257, 'Ice cream vanilla low fat', 117, 100),
(258, 'Jams and preserves', 56, 100),
(259, 'Lamb American loin cooked', 232, 100),
(260, 'Lettuce romaine shredded', 10, 100),
(261, 'Lobster boiled or steamed', 75, 100),
(262, 'Macaroni and cheese Kraft DinnerTM', 395, 100),
(263, 'Macaroni cooked', 209, 100),
(264, 'Mango', 67, 100),
(265, 'Margarita', 246, 100),
(266, 'Melon cantaloupe cubes', 29, 100),
(267, 'Milk chocolate bars or chips', 268, 100),
(268, 'Milk shake chocolate', 223, 100),
(269, 'Milk shake vanilla', 195, 100),
(270, 'Milk chocolate 1 percent M.F.', 166, 100),
(271, 'Milk partly skimmed 2 percent M.F.', 129, 100),
(272, 'Mixed nuts roasted salted', 206, 100),
(273, 'Muffin bran homemade', 199, 100),
(274, 'Mushrooms raw', 12, 100),
(275, 'Mussels boiled or steamed', 129, 100),
(276, 'Oatmeal instant regular', 112, 100),
(277, 'Olives pickled canned or bottled', 23, 100),
(278, 'Onion rings breaded and fried', 276, 100),
(279, 'Orange', 62, 100),
(280, 'Orange juice ready to drink', 58, 100),
(281, 'Oysters boiled or steamed', 58, 100),
(282, 'Peach', 38, 100),
(283, 'Peanut butter smooth type light', 190, 100),
(284, 'Peanuts all types shelled roasted', 217, 100),
(285, 'Pear with skin', 96, 100),
(286, 'Peas green canned drained', 62, 100),
(287, 'Pepper sweet green raw', 16, 100),
(288, 'Pepperoni pork beef', 252, 100),
(289, 'Pizza with cheese 12', 210, 100),
(290, 'Pizza with cheese and pepperoni 12', 219, 100),
(291, 'Plum', 30, 100),
(292, 'Popcorn Air popped', 32, 100),
(293, 'Popcorn Microwave low fat', 34, 100),
(294, 'Popsicles', 54, 100),
(295, 'Pork Centre cut loin pan fried', 208, 100),
(296, 'Pork Spareribs lean plus fat braised', 251, 100),
(297, 'Pork Tenderloin lean roasted', 108, 100),
(298, 'Potato chips plain', 230, 100),
(299, 'Potato baked flesh and skin', 161, 100),
(300, 'Poutine', 380, 100),
(301, 'Pretzels hard plain salted', 19, 100),
(302, 'Prunes dried', 60, 100),
(303, 'Raisins', 110, 100),
(304, 'Rice cake plain', 35, 100),
(305, 'Rice brown long grain cooked', 115, 100),
(306, 'Rice white long grain cooked', 109, 100),
(307, 'Roll dinner white', 85, 100),
(308, 'Roll dinner whole wheat', 75, 100),
(309, 'Salami beef and pork', 118, 100),
(310, 'Salmon baked or broiled', 155, 100),
(311, 'Saltine oyster soda soup', 51, 100),
(312, 'Sausage breakfast cooked', 51, 100),
(313, 'Scallops cooked steamed', 87, 100),
(314, 'Sherbet orange', 113, 100),
(315, 'Shrimp boiled or steamed', 30, 100),
(316, 'Shrimp breaded and fried', 160, 100),
(317, 'Sole flatfish baked or broiled', 88, 100),
(318, 'Soup Chicken noodle', 79, 100),
(319, 'Soup Cream of mushroom', 137, 100),
(320, 'Spaghetti cooked', 209, 100),
(321, 'Spirits gin rum vodka whisky', 109, 100),
(322, 'Sports drink fruit flavour GatoradeTM', 67, 100),
(323, 'Stir fry with beef', 290, 100),
(324, 'Strawberries', 27, 100),
(325, 'Submarine sandwich', 456, 100),
(326, 'Sushi with fish', 164, 100),
(327, 'Sushi with vegetables no fish', 122, 100),
(328, 'Taco with beef cheese salsa veg', 168, 100),
(329, 'Tangerine mandarin', 45, 100),
(330, 'Tofu regular firm and extra firm', 189, 100),
(331, 'Tomato juice', 22, 100),
(332, 'Tomato sauce canned', 41, 100),
(333, 'Tomatoes raw', 22, 100),
(334, 'Tortilla chips nacho ', 249, 100),
(335, 'Trail mix, regular', 176, 100),
(336, 'Tuna light canned in water drained', 87, 100),
(337, 'Tuna light canned with oil drained', 149, 100),
(338, 'Vegetable juice cocktail', 24, 100),
(339, 'Wiener frankfurter beef', 104, 100),
(340, 'Wine table red', 90, 100),
(341, 'Wine table white', 85, 100),
(342, 'Yogourt plain 2 percent', 114, 100),
(343, 'Yogourt vanilla or fruit 2 percent', 183, 100),
(346, 'Almonds dried', 208, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lunch`
--

DROP TABLE IF EXISTS `lunch`;
CREATE TABLE IF NOT EXISTS `lunch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(11) NOT NULL,
  `grs` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snacks`
--

DROP TABLE IF EXISTS `snacks`;
CREATE TABLE IF NOT EXISTS `snacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kcals` int(11) NOT NULL,
  `grs` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `age` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `sex` int(11) NOT NULL,
  `finaldate` date NOT NULL,
  `goal` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `age`, `weight`, `height`, `sex`, `finaldate`, `goal`) VALUES
(22, 'Valeria', 'vv@gmail.com', '$2y$10$nLt1YpTrrLjY4SsN7s60L.9fspMKNGDcr1FuDQfwAAwDYy7OqjXfO', 25, 95, 183, 2, '2020-08-10', 85),
(23, 'Fabian', 'ff@gmail.com', '$2y$10$HpT5E72UW8cFL2oLIhfLouadXWQ92wETeqUGMYuvI50./hBcV0Gkq', 25, 96, 183, 2, '2020-06-12', 86);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
