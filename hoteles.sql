-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2020 a las 07:10:50
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

INSERT INTO `becario` (`id`, `nombres`, `apellidos`, `correo`, `password`) VALUES
(6, 'Jose', 'Villasis', 'josepech0603@hotmail.com', '$2y$10$XCdoJs0fpOdSA.QMD8zgS.403xXRlWiSXBBlnHKjL0ik9nxAsUsD6');

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
(1, 'Hotel venecia', '2018-03-16', '2018-04-08', 560, 0, 900, 24, 28, '500.00', '2020-06-27 14:39:53'),
(2, 'Aaktun kay', '2018-03-16', '2018-04-08', 480, 0, 960, 24, 20, '600.00', '2020-06-27 14:39:53'),
(3, 'Don Abel', '2018-03-16', '2018-04-08', 400, 0, 750, 24, 19, '500.00', '2020-06-27 14:39:53'),
(4, 'Don Abel', '2016-08-01', '2016-08-31', 96, 70, 140, 31, 19, '400.00', '2020-06-27 14:39:53'),
(5, 'Atardecer Bahia', '2018-03-16', '2018-04-08', 210, 0, 420, 24, 9, '500.00', '2020-06-27 14:39:53'),
(6, 'Posada Maya', '2018-03-16', '2018-04-08', 160, 0, 320, 24, 7, '500.00', '2020-06-27 14:39:53'),
(7, 'Las Flores', '2018-03-16', '2018-04-08', 350, 0, 600, 24, 17, '500.00', '2020-06-27 14:39:53'),
(8, 'Lua Hotel', '2018-03-16', '2018-04-08', 480, 0, 960, 24, 20, '560.00', '2020-06-27 14:39:53'),
(9, 'La Regia', '2018-03-16', '2018-04-08', 185, 0, 340, 24, 8, '450.00', '2020-06-27 14:39:53'),
(10, 'Ranchobubiña', '2018-03-16', '2018-04-08', 200, 0, 400, 24, 9, '350.00', '2020-06-27 14:39:53'),
(11, 'Paraiso Beach', '2018-03-16', '2018-04-08', 400, 0, 700, 24, 20, '350.00', '2020-06-27 14:39:53'),
(12, 'Geminis', '2018-03-16', '2018-04-08', 864, 0, 1700, 24, 36, '500.00', '2020-06-27 14:39:53'),
(13, 'Prueba', '2018-03-16', '2018-04-08', 864, 0, 1700, 24, 36, '500.00', '2020-02-27 16:39:53'),
(14, 'Hotel Venecia', '2016-01-01', '2016-01-31', 138, 0, 229, 31, 30, '600.00', '2020-06-30 08:33:01'),
(15, 'Hotel Venecia', '2016-02-01', '2016-02-29', 115, 0, 224, 29, 30, '600.00', '2020-06-30 08:33:28'),
(16, 'Hotel Venecia', '2016-03-01', '2016-03-31', 170, 0, 342, 31, 30, '600.00', '2020-06-30 08:39:31'),
(17, 'Hotel Venecia', '2016-04-01', '2016-04-30', 164, 0, 343, 30, 30, '600.00', '2020-06-30 08:39:40'),
(18, 'Hotel Venecia', '2016-05-01', '2016-05-31', 137, 0, 235, 31, 30, '600.00', '2020-06-30 08:39:51'),
(19, 'Hotel Venecia', '2016-06-01', '2016-06-30', 123, 0, 215, 30, 30, '600.00', '2020-06-30 08:39:58'),
(20, 'Hotel Venecia', '2016-07-01', '2016-07-31', 189, 0, 389, 31, 30, '600.00', '2020-06-30 08:40:06'),
(21, 'Hotel Venecia', '2016-08-01', '2016-08-31', 163, 0, 344, 31, 30, '600.00', '2020-06-30 08:40:14'),
(22, 'Hotel Venecia', '2016-09-01', '2016-09-30', 120, 0, 223, 30, 30, '600.00', '2020-06-30 08:40:27'),
(23, 'Hotel Venecia', '2016-10-01', '2016-10-31', 101, 0, 182, 31, 30, '600.00', '2020-06-30 08:40:40'),
(24, 'Hotel Venecia', '2016-11-01', '2016-11-30', 132, 0, 217, 30, 30, '600.00', '2020-06-30 08:43:32'),
(25, 'Hotel Venecia', '2016-12-01', '2016-12-31', 155, 0, 308, 31, 30, '600.00', '2020-06-30 08:43:49'),
(26, 'Hotel Venecia', '2017-01-01', '2017-01-31', 138, 0, 233, 31, 30, '600.00', '2020-06-30 08:44:01'),
(27, 'Hotel Venecia', '2017-02-01', '2017-02-28', 64, 0, 122, 28, 30, '600.00', '2020-06-30 08:44:16'),
(28, 'Hotel Venecia', '2017-03-01', '2017-03-31', 155, 0, 283, 31, 30, '600.00', '2020-06-30 08:44:29'),
(29, 'Hotel Venecia', '2017-04-01', '2017-04-30', 276, 0, 481, 30, 30, '600.00', '2020-06-30 08:44:48'),
(30, 'Hotel Venecia', '2017-05-01', '2017-05-31', 238, 0, 401, 31, 30, '600.00', '2020-06-30 08:45:01'),
(31, 'Posada Maya', '2016-01-01', '2016-01-31', 61, 0, 121, 31, 7, '400.00', '2020-06-30 08:45:14'),
(32, 'Posada Maya', '2016-02-01', '2016-02-29', 63, 0, 118, 29, 7, '400.00', '2020-06-30 08:45:27'),
(33, 'Posada Maya', '2016-03-01', '2016-03-31', 34, 0, 64, 31, 7, '400.00', '2020-06-30 08:45:40'),
(34, 'Posada Maya', '2016-04-01', '2016-04-30', 9, 0, 19, 30, 7, '400.00', '2020-06-30 08:46:25'),
(35, 'Posada Maya', '2016-05-01', '2016-05-31', 13, 0, 28, 31, 7, '400.00', '2020-06-30 08:46:40'),
(36, 'Posada Maya', '2016-06-01', '2016-06-30', 23, 0, 48, 30, 7, '400.00', '2020-06-30 08:46:55'),
(37, 'Posada Maya', '2016-07-01', '2016-07-31', 20, 0, 45, 31, 7, '400.00', '2020-06-30 08:47:07'),
(38, 'Posada Maya', '2016-08-01', '2016-08-31', 25, 0, 49, 31, 7, '400.00', '2020-06-30 08:47:18'),
(39, 'Posada Maya', '2016-09-01', '2016-09-30', 31, 0, 63, 30, 7, '400.00', '2020-06-30 08:47:31'),
(40, 'Posada Maya', '2016-10-01', '2016-10-31', 45, 0, 86, 31, 7, '400.00', '2020-06-30 08:47:42'),
(41, 'Posada Maya', '2016-11-01', '2016-11-30', 28, 0, 53, 30, 7, '400.00', '2020-06-30 08:47:55'),
(42, 'Posada Maya', '2016-12-01', '2016-12-31', 51, 0, 105, 31, 7, '400.00', '2020-06-30 08:48:09'),
(43, 'Posada Maya', '2017-01-01', '2017-01-31', 60, 0, 116, 31, 7, '400.00', '2020-06-30 08:48:23'),
(44, 'Posada Maya', '2017-02-01', '2017-02-28', 64, 0, 122, 28, 7, '400.00', '2020-06-30 08:29:07'),
(45, 'Posada Maya', '2017-03-01', '2017-03-31', 41, 0, 70, 31, 7, '400.00', '2020-06-30 08:30:10'),
(46, 'Posada Maya', '2017-04-01', '2017-04-30', 49, 0, 79, 30, 7, '400.00', '2020-06-30 08:30:59'),
(47, 'Posada Maya', '2017-05-01', '2017-05-31', 48, 0, 57, 31, 7, '400.00', '2020-06-30 08:31:42'),
(48, 'Atardecer Bahia', '2016-01-01', '2016-01-31', 153, 0, 263, 31, 9, '500.00', '2020-06-30 08:51:32'),
(49, 'Atardecer Bahia', '2016-02-01', '2016-02-29', 111, 0, 364, 29, 9, '500.00', '2020-06-30 08:52:11'),
(50, 'Atardecer Bahia', '2016-03-01', '2016-04-30', 172, 0, 576, 30, 9, '500.00', '2020-06-30 08:53:00'),
(51, 'Atardecer Bahia', '2016-04-01', '2016-04-30', 176, 0, 568, 30, 9, '500.00', '2020-06-30 08:55:38'),
(52, 'Atardecer Bahia', '2016-05-01', '2016-05-31', 164, 0, 496, 31, 9, '500.00', '2020-06-30 08:56:22'),
(53, 'Atardecer Bahia', '2016-06-01', '2016-06-30', 168, 0, 518, 30, 9, '500.00', '2020-06-30 08:57:55'),
(54, 'Atardecer Bahia', '2016-07-01', '2016-07-31', 238, 0, 822, 31, 9, '500.00', '2020-06-30 08:58:30'),
(55, 'Atardecer Bahia', '2016-08-01', '2016-08-31', 172, 0, 565, 31, 9, '500.00', '2020-06-30 08:59:23'),
(56, 'Atardecer Bahia', '2016-09-01', '2016-09-30', 143, 0, 462, 30, 9, '500.00', '2020-06-30 09:00:02'),
(57, 'Atardecer Bahia', '2016-10-01', '2016-10-31', 165, 0, 510, 31, 9, '500.00', '2020-06-30 09:01:06'),
(58, 'Atardecer Bahia', '2016-11-01', '2016-11-30', 195, 0, 656, 30, 9, '500.00', '2020-06-30 09:01:46'),
(59, 'Atardecer Bahia', '2016-12-01', '2016-12-31', 158, 0, 482, 31, 9, '500.00', '2020-06-30 09:02:26'),
(60, 'Atardecer Bahia', '2017-01-01', '2017-01-31', 158, 0, 273, 31, 9, '500.00', '2020-06-30 09:03:05'),
(61, 'Don Abel', '2016-02-01', '2016-02-29', 63, 0, 113, 29, 19, '400.00', '2020-06-30 09:05:41'),
(62, 'Don Abel', '2016-03-01', '2016-03-31', 82, 0, 159, 31, 19, '400.00', '2020-06-30 09:06:19'),
(63, 'Don Abel', '2016-04-01', '2020-06-30', 61, 0, 107, 30, 19, '400.00', '2020-06-30 09:07:01'),
(64, 'Don Abel', '2016-05-01', '2016-05-31', 67, 0, 113, 31, 19, '400.00', '2020-06-30 09:07:59'),
(65, 'Don Abel', '2016-06-01', '2016-06-30', 55, 0, 98, 30, 19, '400.00', '2020-06-30 09:08:49'),
(66, 'Don Abel', '2016-07-01', '2016-07-31', 77, 0, 123, 31, 19, '400.00', '2020-06-30 09:09:34'),
(67, 'Don Abel', '2016-08-01', '2016-08-31', 95, 0, 139, 31, 19, '400.00', '2020-06-30 09:10:15'),
(68, 'Don Abel', '2016-09-01', '2016-09-30', 70, 0, 112, 30, 19, '400.00', '2020-06-30 09:11:08'),
(69, 'Don Abel', '2016-10-01', '2016-10-31', 72, 0, 131, 31, 19, '400.00', '2020-06-30 09:12:38'),
(70, 'Don Abel', '2016-11-01', '2016-11-30', 62, 0, 102, 30, 19, '400.00', '2020-06-30 09:13:22'),
(71, 'Don Abel', '2016-12-01', '2016-12-31', 72, 0, 126, 31, 19, '400.00', '2020-06-30 09:14:12'),
(72, 'Aaktun kay', '2016-01-01', '2016-01-31', 263, 0, 430, 31, 18, '700.00', '2020-06-30 09:15:56'),
(73, 'Aaktun kay', '2016-02-01', '2016-02-29', 279, 0, 375, 20, 18, '700.00', '2020-06-30 09:16:35'),
(74, 'Aaktun kay', '2016-03-01', '2016-03-31', 321, 0, 621, 31, 18, '700.00', '2020-06-30 09:17:21'),
(75, 'Aaktun kay', '2016-04-01', '2016-04-30', 266, 0, 466, 30, 18, '700.00', '2020-06-30 09:17:58'),
(76, 'Aaktun kay', '2016-05-01', '2016-05-31', 235, 0, 420, 31, 18, '700.00', '2020-06-30 09:18:41'),
(77, 'Aaktun kay', '2016-06-01', '2016-06-30', 245, 0, 405, 30, 18, '700.00', '2020-06-30 09:19:33'),
(78, 'Aaktun kay', '2016-07-01', '2016-07-31', 405, 0, 821, 31, 18, '700.00', '2020-06-30 09:20:10'),
(79, 'Aaktun kay', '2016-08-01', '2016-08-31', 281, 0, 551, 31, 18, '700.00', '2020-06-30 09:20:52'),
(80, 'Aaktun kay', '2016-09-01', '2016-09-30', 269, 0, 447, 30, 18, '700.00', '2020-06-30 09:22:02'),
(81, 'Aaktun kay', '2016-10-01', '2016-10-31', 274, 0, 421, 31, 18, '700.00', '2020-06-30 09:22:43'),
(82, 'Aaktun kay', '2016-11-01', '2016-11-30', 273, 0, 405, 30, 18, '700.00', '2020-06-30 09:23:18'),
(83, 'Aaktun kay', '2016-12-01', '2016-12-31', 330, 0, 650, 31, 18, '700.00', '2020-06-30 09:23:57'),
(84, 'Aaktun kay', '2017-01-01', '2017-01-31', 232, 0, 403, 31, 18, '700.00', '2020-06-30 09:24:32'),
(85, 'Aaktun kay', '2017-02-01', '2017-02-28', 209, 0, 317, 28, 18, '700.00', '2020-06-30 09:25:26'),
(86, 'Aaktun kay', '2017-03-01', '2017-03-31', 187, 0, 311, 31, 18, '700.00', '2020-06-30 09:26:01'),
(87, 'Aaktun kay', '2017-04-01', '2017-04-30', 277, 0, 517, 30, 18, '700.00', '2020-06-30 09:27:27'),
(88, 'La Regia', '2017-03-01', '2017-03-31', 152, 0, 403, 31, 11, '600.00', '2020-06-30 09:31:57'),
(89, 'La Regia', '2017-04-01', '2017-04-30', 192, 0, 557, 30, 11, '600.00', '2020-06-30 09:32:53'),
(90, 'La Regia', '2017-05-01', '2017-05-31', 150, 0, 329, 31, 11, '600.00', '2020-06-30 09:33:45'),
(91, 'Lua Hotel', '2016-01-01', '2016-01-31', 485, 0, 485, 31, 20, '700.00', '2020-06-30 09:41:28'),
(92, 'Lua Hotel', '2016-02-01', '2016-02-29', 402, 0, 756, 29, 20, '700.00', '2020-06-30 09:42:18'),
(93, 'Lua Hotel', '2016-03-01', '2016-03-31', 512, 0, 973, 31, 20, '700.00', '2020-06-30 09:43:10'),
(94, 'Lua Hotel', '2016-04-01', '2016-04-30', 429, 0, 870, 30, 20, '900.00', '2020-06-30 09:44:05'),
(95, 'Lua Hotel', '2016-05-01', '2016-05-30', 426, 0, 890, 30, 20, '700.00', '2020-06-30 09:45:20'),
(96, 'Lua Hotel', '2017-01-01', '2017-01-31', 458, 0, 904, 31, 20, '700.00', '2020-06-30 09:48:02'),
(97, 'Lua Hotel', '2017-02-01', '2017-02-28', 335, 0, 713, 28, 20, '700.00', '2020-06-30 09:49:13'),
(98, 'Lua Hotel', '2017-03-01', '2017-03-28', 469, 0, 1044, 28, 20, '700.00', '2020-06-30 09:50:42'),
(99, 'Lua Hotel', '2017-04-01', '2017-04-30', 368, 0, 798, 30, 20, '700.00', '2020-06-30 09:51:40'),
(100, 'Lua Hotel', '2017-05-01', '2017-05-31', 234, 0, 354, 31, 20, '700.00', '2020-06-30 09:52:44'),
(101, 'Hotel Venecia', '2019-12-01', '2019-12-31', 230, 0, 430, 15, 30, '530.00', '2020-06-30 12:17:36'),
(102, 'Atardecer Bahía', '2019-12-01', '2019-12-31', 219, 0, 375, 15, 9, '650.00', '2020-06-30 12:20:23'),
(103, 'La Regia', '2019-12-01', '2019-12-31', 235, 0, 470, 15, 11, '530.00', '2020-06-30 12:36:52'),
(104, 'Don Abel', '2019-12-01', '2019-12-31', 112, 0, 112, 15, 14, '400.00', '2020-06-30 12:26:03'),
(105, 'Las Flores', '2016-01-01', '2016-01-31', 108, 0, 221, 31, 17, '500.00', '2020-06-30 07:18:22'),
(106, 'Las Flores', '2016-02-01', '2016-02-29', 150, 0, 296, 17, 29, '500.00', '2020-06-30 07:23:34'),
(107, 'Las Flores', '2016-03-01', '2016-03-31', 187, 0, 374, 31, 17, '500.00', '2020-06-30 07:25:39'),
(108, 'Las Flores', '2016-04-01', '2016-04-30', 99, 0, 166, 30, 17, '500.00', '2020-06-30 08:35:00'),
(109, 'Las Flores', '2016-05-01', '2016-05-31', 174, 0, 342, 31, 17, '500.00', '2020-06-30 08:35:14'),
(110, 'Las Flores', '2016-06-01', '2016-06-30', 91, 0, 182, 30, 17, '500.00', '2020-06-30 08:35:27'),
(111, 'Las Flores', '2016-07-01', '2016-07-31', 374, 0, 744, 31, 17, '500.00', '2020-06-30 08:35:47'),
(112, 'Las Flores', '2016-08-01', '2016-08-31', 133, 0, 266, 31, 17, '500.00', '2020-06-30 08:36:01'),
(113, 'Las Flores', '2016-09-01', '2016-09-30', 79, 0, 122, 30, 17, '500.00', '2020-06-30 08:36:09'),
(114, 'Las Flores', '2016-02-01', '2016-10-31', 429, 0, 855, 31, 17, '500.00', '2020-06-30 08:36:17'),
(115, 'Las Flores', '2016-12-01', '2016-11-30', 199, 0, 398, 30, 17, '500.00', '2020-06-30 08:36:30'),
(116, 'Las Flores', '2016-12-01', '2016-12-31', 182, 0, 360, 31, 17, '500.00', '2020-06-30 08:36:43'),
(117, 'Las Flores', '2017-01-01', '2017-01-31', 108, 0, 218, 31, 17, '500.00', '2020-06-30 08:36:51'),
(118, 'Las Flores', '2017-02-01', '2017-02-28', 133, 0, 229, 28, 17, '500.00', '2020-06-30 08:34:46'),
(119, 'Las Flores', '2017-03-01', '2017-03-31', 112, 0, 186, 31, 17, '500.00', '2020-06-30 08:34:27'),
(120, 'Las Flores', '2017-04-01', '2017-04-30', 60, 0, 98, 30, 17, '500.00', '2020-06-30 08:34:08'),
(121, 'Las Flores', '2017-05-01', '2017-05-31', 143, 0, 226, 31, 17, '500.00', '2020-06-30 08:33:42'),
(122, 'Hotel venecia', '2020-05-13', '2020-06-23', 9, 0, 12, 14, 4, '560.00', '2020-06-30 12:15:34'),
(124, 'Luna', '2018-03-16', '2018-04-08', 150, 0, 330, 24, 7, '450.00', '2020-06-27 14:39:53');

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
(1, 'Hotel venecia', 'esdeath97@yopmail.com', '$2y$10$DEZzWS8uW3oZS/N.cMifFu24yz/IuTMpI2cksgGNHeoEk1zizxevW', NULL, 2, 'patron-pokemon-amigurumi-1.jpg'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

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
