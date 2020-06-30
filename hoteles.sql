-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2020 a las 11:33:23
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becario`
--

CREATE TABLE `becario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `becario`
--

INSERT INTO `becario` (`nombres`, `apellidos`, `correo`, `password`) VALUES
('Jose', 'Villasis', 'josepech0603@hotmail.com', '$2y$10$XCdoJs0fpOdSA.QMD8zgS.403xXRlWiSXBBlnHKjL0ik9nxAsUsD6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `hotel` varchar(250) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `habitaciones_ocupadas` int(11) DEFAULT NULL,
  `personas_extranjeras` int(11) DEFAULT NULL,
  `personas_nacionales` int(11) DEFAULT NULL,
  `dias_vacaciones` int(11) DEFAULT NULL,
  `num_habitaciones` int(11) DEFAULT NULL,
  `costo_hotel` decimal(60,2) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `hotel`, `fecha_inicio`, `fecha_fin`, `habitaciones_ocupadas`, `personas_extranjeras`, `personas_nacionales`, `dias_vacaciones`, `num_habitaciones`, `costo_hotel`, `fecha_registro`) VALUES
(7, 'Luna', '2018-03-16', '2018-04-08', 150, 0, 330, 24, 7, '450.00', '2020-06-27 04:39:53'),
(8, 'Hotel venecia', '2018-03-16', '2018-04-08', 560, 0, 900, 24, 28, '500.00', '2020-06-27 04:39:53'),
(9, 'Aaktun kay', '2018-03-16', '2018-04-08', 480, 0, 960, 24, 20, '600.00', '2020-06-27 04:39:53'),
(10, 'Don Abel', '2018-03-16', '2018-04-08', 400, 0, 750, 24, 19, '500.00', '2020-06-27 04:39:53'),
(11, 'Don Abel', '2016-08-01', '2016-08-31', 96, 70, 140, 31, 19, '400.00', '2020-06-27 04:39:53'),
(12, 'Atardecer Bahia', '2018-03-16', '2018-04-08', 210, 0, 420, 24, 9, '500.00', '2020-06-27 04:39:53'),
(13, 'Posada Maya', '2018-03-16', '2018-04-08', 160, 0, 320, 24, 7, '500.00', '2020-06-27 04:39:53'),
(14, 'Las Flores', '2018-03-16', '2018-04-08', 350, 0, 600, 24, 17, '500.00', '2020-06-27 04:39:53'),
(15, 'Lua Hotel', '2018-03-16', '2018-04-08', 480, 0, 960, 24, 20, '560.00', '2020-06-27 04:39:53'),
(16, 'La Regia', '2018-03-16', '2018-04-08', 185, 0, 340, 24, 8, '450.00', '2020-06-27 04:39:53'),
(17, 'Ranchobubiña', '2018-03-16', '2018-04-08', 200, 0, 400, 24, 9, '350.00', '2020-06-27 04:39:53'),
(18, 'Paraiso Beach', '2018-03-16', '2018-04-08', 400, 0, 700, 24, 20, '350.00', '2020-06-27 04:39:53'),
(19, 'Geminis', '2018-03-16', '2018-04-08', 864, 0, 1700, 24, 36, '500.00', '2020-06-27 04:39:53');
(20, 'Prueba', '2018-03-16', '2018-04-08', 864, 0, 1700, 24, 36, '500.00', '2020-02-27 04:39:53');

(24, 'Hotel Venecia', '2016-01-01', '2016-01-31', 138, 0, 229, 31, 30, '600.00', '2020-06-29 22:33:01'),
(25, 'Hotel Venecia', '2016-02-01', '2016-02-29', 115, 0, 224, 29, 30, '600.00', '2020-06-29 22:33:28'),
(26, 'Hotel Venecia', '2016-03-01', '2016-03-31', 170, 0, 342, 31, 30, '600.00', '2020-06-29 22:39:31'),
(27, 'Hotel Venecia', '2016-04-01', '2016-04-30', 164, 0, 343, 30, 30, '600.00', '2020-06-29 22:39:40'),
(28, 'Hotel Venecia', '2016-05-01', '2016-05-31', 137, 0, 235, 31, 30, '600.00', '2020-06-29 22:39:51'),
(29, 'Hotel Venecia', '2016-06-01', '2016-06-30', 123, 0, 215, 30, 30, '600.00', '2020-06-29 22:39:58'),
(30, 'Hotel Venecia', '2016-07-01', '2016-07-31', 189, 0, 389, 31, 30, '600.00', '2020-06-29 22:40:06'),
(31, 'Hotel Venecia', '2016-08-01', '2016-08-31', 163, 0, 344, 31, 30, '600.00', '2020-06-29 22:40:14'),
(32, 'Hotel Venecia', '2016-09-01', '2016-09-30', 120, 0, 223, 30, 30, '600.00', '2020-06-29 22:40:27'),
(33, 'Hotel Venecia', '2016-10-01', '2016-10-31', 101, 0, 182, 31, 30, '600.00', '2020-06-29 22:40:40'),
(34, 'Hotel Venecia', '2016-11-01', '2016-11-30', 132, 0, 217, 30, 30, '600.00', '2020-06-29 22:43:32'),
(35, 'Hotel Venecia', '2016-12-01', '2016-12-31', 155, 0, 308, 31, 30, '600.00', '2020-06-29 22:43:49'),
(36, 'Hotel Venecia', '2017-01-01', '2017-01-31', 138, 0, 233, 31, 30, '600.00', '2020-06-29 22:44:01'),
(37, 'Hotel Venecia', '2017-02-01', '2017-02-28', 64, 0, 122, 28, 30, '600.00', '2020-06-29 22:44:16'),
(38, 'Hotel Venecia', '2017-03-01', '2017-03-31', 155, 0, 283, 31, 30, '600.00', '2020-06-29 22:44:29'),
(39, 'Hotel Venecia', '2017-04-01', '2017-04-30', 276, 0, 481, 30, 30, '600.00', '2020-06-29 22:44:48'),
(40, 'Hotel Venecia', '2017-05-01', '2017-05-31', 238, 0, 401, 31, 30, '600.00', '2020-06-29 22:45:01'),
(41, 'Posada Maya', '2016-01-01', '2016-01-31', 61, 0, 121, 31, 7, '400.00', '2020-06-29 22:45:14'),
(42, 'Posada Maya', '2016-02-01', '2016-02-29', 63, 0, 118, 29, 7, '400.00', '2020-06-29 22:45:27'),
(43, 'Posada Maya', '2016-03-01', '2016-03-31', 34, 0, 64, 31, 7, '400.00', '2020-06-29 22:45:40'),
(44, 'Posada Maya', '2016-04-01', '2016-04-30', 9, 0, 19, 30, 7, '400.00', '2020-06-29 22:46:25'),
(45, 'Posada Maya', '2016-05-01', '2016-05-31', 13, 0, 28, 31, 7, '400.00', '2020-06-29 22:46:40'),
(46, 'Posada Maya', '2016-06-01', '2016-06-30', 23, 0, 48, 30, 7, '400.00', '2020-06-29 22:46:55'),
(47, 'Posada Maya', '2016-07-01', '2016-07-31', 20, 0, 45, 31, 7, '400.00', '2020-06-29 22:47:07'),
(48, 'Posada Maya', '2016-08-01', '2016-08-31', 25, 0, 49, 31, 7, '400.00', '2020-06-29 22:47:18'),
(49, 'Posada Maya', '2016-09-01', '2016-09-30', 31, 0, 63, 30, 7, '400.00', '2020-06-29 22:47:31'),
(50, 'Posada Maya', '2016-10-01', '2016-10-31', 45, 0, 86, 31, 7, '400.00', '2020-06-29 22:47:42'),
(51, 'Posada Maya', '2016-11-01', '2016-11-30', 28, 0, 53, 30, 7, '400.00', '2020-06-29 22:47:55'),
(52, 'Posada Maya', '2016-12-01', '2016-12-31', 51, 0, 105, 31, 7, '400.00', '2020-06-29 22:48:09'),
(53, 'Posada Maya', '2017-01-01', '2017-01-31', 60, 0, 116, 31, 7, '400.00', '2020-06-29 22:48:23'),
(54, 'Posada Maya', '2017-02-01', '2017-02-28', 64, 0, 122, 28, 7, '400.00', '2020-06-29 22:29:07'),
(55, 'Posada Maya', '2017-03-01', '2017-03-31', 41, 0, 70, 31, 7, '400.00', '2020-06-29 22:30:10'),
(56, 'Posada Maya', '2017-04-01', '2017-04-30', 49, 0, 79, 30, 7, '400.00', '2020-06-29 22:30:59'),
(57, 'Posada Maya', '2017-05-01', '2017-05-31', 48, 0, 57, 31, 7, '400.00', '2020-06-29 22:31:42'),
(58, 'Atardecer Bahia', '2016-01-01', '2016-01-31', 153, 0, 263, 31, 9, '500.00', '2020-06-29 22:51:32'),
(59, 'Atardecer Bahia', '2016-02-01', '2016-02-29', 111, 0, 364, 29, 9, '500.00', '2020-06-29 22:52:11'),
(60, 'Atardecer Bahia', '2016-03-01', '2016-04-30', 172, 0, 576, 30, 9, '500.00', '2020-06-29 22:53:00'),
(61, 'Atardecer Bahia', '2016-04-01', '2016-04-30', 176, 0, 568, 30, 9, '500.00', '2020-06-29 22:55:38'),
(62, 'Atardecer Bahia', '2016-05-01', '2016-05-31', 164, 0, 496, 31, 9, '500.00', '2020-06-29 22:56:22'),
(63, 'Atardecer Bahia', '2016-06-01', '2016-06-30', 168, 0, 518, 30, 9, '500.00', '2020-06-29 22:57:55'),
(64, 'Atardecer Bahia', '2016-07-01', '2016-07-31', 238, 0, 822, 31, 9, '500.00', '2020-06-29 22:58:30'),
(65, 'Atardecer Bahia', '2016-08-01', '2016-08-31', 172, 0, 565, 31, 9, '500.00', '2020-06-29 22:59:23'),
(66, 'Atardecer Bahia', '2016-09-01', '2016-09-30', 143, 0, 462, 30, 9, '500.00', '2020-06-29 23:00:02'),
(67, 'Atardecer Bahia', '2016-10-01', '2016-10-31', 165, 0, 510, 31, 9, '500.00', '2020-06-29 23:01:06'),
(68, 'Atardecer Bahia', '2016-11-01', '2016-11-30', 195, 0, 656, 30, 9, '500.00', '2020-06-29 23:01:46'),
(69, 'Atardecer Bahia', '2016-12-01', '2016-12-31', 158, 0, 482, 31, 9, '500.00', '2020-06-29 23:02:26'),
(70, 'Atardecer Bahia', '2017-01-01', '2017-01-31', 158, 0, 273, 31, 9, '500.00', '2020-06-29 23:03:05'),
(71, 'Don Abel', '2016-02-01', '2016-02-29', 63, 0, 113, 29, 19, '400.00', '2020-06-29 23:05:41'),
(72, 'Don Abel', '2016-03-01', '2016-03-31', 82, 0, 159, 31, 19, '400.00', '2020-06-29 23:06:19'),
(73, 'Don Abel', '2016-04-01', '2020-06-30', 61, 0, 107, 30, 19, '400.00', '2020-06-29 23:07:01'),
(74, 'Don Abel', '2016-05-01', '2016-05-31', 67, 0, 113, 31, 19, '400.00', '2020-06-29 23:07:59'),
(75, 'Don Abel', '2016-06-01', '2016-06-30', 55, 0, 98, 30, 19, '400.00', '2020-06-29 23:08:49'),
(76, 'Don Abel', '2016-07-01', '2016-07-31', 77, 0, 123, 31, 19, '400.00', '2020-06-29 23:09:34'),
(77, 'Don Abel', '2016-08-01', '2016-08-31', 95, 0, 139, 31, 19, '400.00', '2020-06-29 23:10:15'),
(78, 'Don Abel', '2016-09-01', '2016-09-30', 70, 0, 112, 30, 19, '400.00', '2020-06-29 23:11:08'),
(79, 'Don Abel', '2016-10-01', '2016-10-31', 72, 0, 131, 31, 19, '400.00', '2020-06-29 23:12:38'),
(80, 'Don Abel', '2016-11-01', '2016-11-30', 62, 0, 102, 30, 19, '400.00', '2020-06-29 23:13:22'),
(81, 'Don Abel', '2016-12-01', '2016-12-31', 72, 0, 126, 31, 19, '400.00', '2020-06-29 23:14:12'),
(82, 'Aaktun kay', '2016-01-01', '2016-01-31', 263, 0, 430, 31, 18, '700.00', '2020-06-29 23:15:56'),
(83, 'Aaktun kay', '2016-02-01', '2016-02-29', 279, 0, 375, 20, 18, '700.00', '2020-06-29 23:16:35'),
(84, 'Aaktun kay', '2016-03-01', '2016-03-31', 321, 0, 621, 31, 18, '700.00', '2020-06-29 23:17:21'),
(85, 'Aaktun kay', '2016-04-01', '2016-04-30', 266, 0, 466, 30, 18, '700.00', '2020-06-29 23:17:58'),
(86, 'Aaktun kay', '2016-05-01', '2016-05-31', 235, 0, 420, 31, 18, '700.00', '2020-06-29 23:18:41'),
(87, 'Aaktun kay', '2016-06-01', '2016-06-30', 245, 0, 405, 30, 18, '700.00', '2020-06-29 23:19:33'),
(88, 'Aaktun kay', '2016-07-01', '2016-07-31', 405, 0, 821, 31, 18, '700.00', '2020-06-29 23:20:10'),
(89, 'Aaktun kay', '2016-08-01', '2016-08-31', 281, 0, 551, 31, 18, '700.00', '2020-06-29 23:20:52'),
(90, 'Aaktun kay', '2016-09-01', '2016-09-30', 269, 0, 447, 30, 18, '700.00', '2020-06-29 23:22:02'),
(91, 'Aaktun kay', '2016-10-01', '2016-10-31', 274, 0, 421, 31, 18, '700.00', '2020-06-29 23:22:43'),
(92, 'Aaktun kay', '2016-11-01', '2016-11-30', 273, 0, 405, 30, 18, '700.00', '2020-06-29 23:23:18'),
(93, 'Aaktun kay', '2016-12-01', '2016-12-31', 330, 0, 650, 31, 18, '700.00', '2020-06-29 23:23:57'),
(94, 'Aaktun kay', '2017-01-01', '2017-01-31', 232, 0, 403, 31, 18, '700.00', '2020-06-29 23:24:32'),
(95, 'Aaktun kay', '2017-02-01', '2017-02-28', 209, 0, 317, 28, 18, '700.00', '2020-06-29 23:25:26'),
(96, 'Aaktun kay', '2017-03-01', '2017-03-31', 187, 0, 311, 31, 18, '700.00', '2020-06-29 23:26:01'),
(97, 'Aaktun kay', '2017-04-01', '2017-04-30', 277, 0, 517, 30, 18, '700.00', '2020-06-29 23:27:27'),
(98, 'La Regia', '2017-03-01', '2017-03-31', 152, 0, 403, 31, 11, '600.00', '2020-06-29 23:31:57'),
(99, 'La Regia', '2017-04-01', '2017-04-30', 192, 0, 557, 30, 11, '600.00', '2020-06-29 23:32:53'),
(100, 'La Regia', '2017-05-01', '2017-05-31', 150, 0, 329, 31, 11, '600.00', '2020-06-29 23:33:45'),
(101, 'Lua Hotel', '2016-01-01', '2016-01-31', 485, 0, 485, 31, 20, '700.00', '2020-06-29 23:41:28'),
(102, 'Lua Hotel', '2016-02-01', '2016-02-29', 402, 0, 756, 29, 20, '700.00', '2020-06-29 23:42:18'),
(103, 'Lua Hotel', '2016-03-01', '2016-03-31', 512, 0, 973, 31, 20, '700.00', '2020-06-29 23:43:10'),
(104, 'Lua Hotel', '2016-04-01', '2016-04-30', 429, 0, 870, 30, 20, '900.00', '2020-06-29 23:44:05'),
(105, 'Lua Hotel', '2016-05-01', '2016-05-30', 426, 0, 890, 30, 20, '700.00', '2020-06-29 23:45:20'),
(106, 'Lua Hotel', '2017-01-01', '2017-01-31', 458, 0, 904, 31, 20, '700.00', '2020-06-29 23:48:02'),
(107, 'Lua Hotel', '2017-02-01', '2017-02-28', 335, 0, 713, 28, 20, '700.00', '2020-06-29 23:49:13'),
(108, 'Lua Hotel', '2017-03-01', '2017-03-28', 469, 0, 1044, 28, 20, '700.00', '2020-06-29 23:50:42'),
(109, 'Lua Hotel', '2017-04-01', '2017-04-30', 368, 0, 798, 30, 20, '700.00', '2020-06-29 23:51:40'),
(110, 'Lua Hotel', '2017-05-01', '2017-05-31', 234, 0, 354, 31, 20, '700.00', '2020-06-29 23:52:44');
(111, 'Hotel Venecia', '2019-12-01', '2019-12-31', 230, 0, 430, 15, 30, '530.00', '2020-06-30 02:17:36'),
(112, 'Atardecer Bahía', '2019-12-01', '2019-12-31', 219, 0, 375, 15, 9, '650.00', '2020-06-30 02:20:23'),
(113, 'La Regia', '2019-12-01', '2019-12-31', 235, 0, 470, 15, 11, '530.00', '2020-06-30 02:36:52'),
(114, 'Don Abel', '2019-12-01', '2019-12-31', 112, 0, 112, 15, 14, '400.00', '2020-06-30 02:26:03'),
(115, 'Las Flores', '2016-01-01', '2016-01-31', 108, 0, 221, 31, 17, '500.00', '2020-06-29 21:18:22'),
(116, 'Las Flores', '2016-02-01', '2016-02-29', 150, 0, 296, 17, 29, '500.00', '2020-06-29 21:23:34'),
(117, 'Las Flores', '2016-03-01', '2016-03-31', 187, 0, 374, 31, 17, '500.00', '2020-06-29 21:25:39'),
(118, 'Las Flores', '2016-04-01', '2016-04-30', 99, 0, 166, 30, 17, '500.00', '2020-06-29 22:35:00'),
(119, 'Las Flores', '2016-05-01', '2016-05-31', 174, 0, 342, 31, 17, '500.00', '2020-06-29 22:35:14'),
(120, 'Las Flores', '2016-06-01', '2016-06-30', 91, 0, 182, 30, 17, '500.00', '2020-06-29 22:35:27'),
(121, 'Las Flores', '2016-07-01', '2016-07-31', 374, 0, 744, 31, 17, '500.00', '2020-06-29 22:35:47'),
(122, 'Las Flores', '2016-08-01', '2016-08-31', 133, 0, 266, 31, 17, '500.00', '2020-06-29 22:36:01'),
(123, 'Las Flores', '2016-09-01', '2016-09-30', 79, 0, 122, 30, 17, '500.00', '2020-06-29 22:36:09'),
(124, 'Las Flores', '2016-02-01', '2016-10-31', 429, 0, 855, 31, 17, '500.00', '2020-06-29 22:36:17'),
(125, 'Las Flores', '2016-12-01', '2016-11-30', 199, 0, 398, 30, 17, '500.00', '2020-06-29 22:36:30'),
(126, 'Las Flores', '2016-12-01', '2016-12-31', 182, 0, 360, 31, 17, '500.00', '2020-06-29 22:36:43'),
(127, 'Las Flores', '2017-01-01', '2017-01-31', 108, 0, 218, 31, 17, '500.00', '2020-06-29 22:36:51'),
(128, 'Las Flores', '2017-02-01', '2017-02-28', 133, 0, 229, 28, 17, '500.00', '2020-06-29 22:34:46'),
(129, 'Las Flores', '2017-03-01', '2017-03-31', 112, 0, 186, 31, 17, '500.00', '2020-06-29 22:34:27'),
(130, 'Las Flores', '2017-04-01', '2017-04-30', 60, 0, 98, 30, 17, '500.00', '2020-06-29 22:34:08'),
(131, 'Las Flores', '2017-05-01', '2017-05-31', 143, 0, 226, 31, 17, '500.00', '2020-06-29 22:33:42'),
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `Token` varchar(60) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `imagen_profile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `correo`, `password`, `Token`, `rol_id`, `imagen_profile`) VALUES
(1, 'Hotel venecia', 'esdeath97@yopmail.com', '$2y$10$kvGWvT0x9c.F4UpOXqut/u4h91LFxC95ceSUCMzH80vKzWwDpRYzq', NULL, 2, 'patron-pokemon-amigurumi-1.jpg'),
(2, 'Aaktun kay', 'ash@yopmail.com', '$2y$10$bEJFg9CsgUoLylDIyY9vcOW8Jx90zpSMJkoAlFswXlZDh3W2p8852', NULL, 2, 'aaktunkay.png'),
(3, 'Administrador', 'verdejo97@outlook.com', '$2y$10$z4dNQ.hY1yGUmVf34zKSmuKMuHLq3DuWxIGgA.o4jCqX1erS2ZxZe', NULL, 1, 'defecto.png'),
(4, 'Luna', 'luna@outlook.com', '$2y$10$gMSFVNjNJxDKsg74Aa3m7uPmlDnijrNuD/SOW0wVcMf7qdIch1WJe', NULL, 2, 'defecto.png'),
(5, 'Don Abel', 'donAbel@outlook.com', '$2y$10$vsvdMnYkp3eetII5EyfhhOmBTv0k3kRLTH9FQgtZmGTS/Rjjyn/j2', NULL, 2, 'defecto.png'),
(6, 'Atardecer Bahia', 'atardecerBahia@outlook.com', '$2y$10$c.B1NRjsp8Us47UE1YWL/u80PDr8cwxU9K8h4o2xkqRvpTBEXBBUm', NULL, 2, 'defecto.png'),
(7, 'Posada Maya', 'posadaMaya@outlook.com', '$2y$10$ZJ38OFK4q7gWn46vWSTY5uWiL6g/WImms6W6XIOMfBCy.4JYZG.j2', NULL, 2, 'defecto.png'),
(8, 'Las Flores', 'lasFlores@outlook.com', '$2y$10$NBkdwbs/tmgmyZ4ByYaR..Vssyb3kopWH/I7F/fnzQNASErLUMlFa', NULL, 2, 'defecto.png'),
(9, 'Lua Hotel', 'lua@outlook.com', '$2y$10$Xr4NVVRIDWQkOZrNMu8jgeEBnwzmehd9.CsmsTDveODpxfy5//l0.', NULL, 2, 'defecto.png'),
(10, 'La Regia', 'laRegia@outlook.com', '$2y$10$HIsROgjnTOg28FwbRXQ6XuUlKzG1OZ3oHLNcR.C4hZpvJO6aBY2Q6', NULL, 2, 'defecto.png'),
(11, 'Ranchobubiña', 'ranchoB@outlook.com', '$2y$10$LNWsZHAVom6.Hu8y.2ntYOyVyOpoNmmow5PI4v8TmTCz.BvJMV0.2', NULL, 2, 'defecto.png'),
(12, 'Paraiso Beach', 'paraisoB@outlook.com', '$2y$10$Mve3ME59f60NokFH/OeOhu8hw6tDKnHw/7moRBiZtsOQOuMF0OhE6', NULL, 2, 'defecto.png'),
(13, 'Geminis', 'geminis@outlook.com', '$2y$10$VXKy3pcLR.pHqyR3wTjo3O3pdcqXq/43KFfua4bYkG9jWPUn6ZFfW', NULL, 2, 'defecto.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `becario`
--
ALTER TABLE `becario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `becario`
--
ALTER TABLE `becario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
