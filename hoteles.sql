-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2020 a las 07:02:44
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
  `costo_hotel` decimal(60,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `hotel`, `fecha_inicio`, `fecha_fin`, `habitaciones_ocupadas`, `personas_extranjeras`, `personas_nacionales`, `dias_vacaciones`, `num_habitaciones`, `costo_hotel`) VALUES
(1, 'Hotel venecia', '2020-06-16', '2020-06-30', 10, 0, 16, 14, 6, '450.00'),
(2, 'Hotel venecia', '2020-06-16', '2020-06-30', 9, 0, 12, 14, 0, '0.00'),
(3, 'Hotel venecia', '2020-06-16', '2020-06-30', 9, 0, 12, 14, 0, '0.00'),
(4, 'Hotel venecia', '2020-06-17', '2020-06-29', 9, 0, 12, 14, 4, '450.00'),
(5, 'Aaktun', '2020-06-03', '2020-06-16', 9, 0, 12, 14, 4, '450.00'),
(6, 'Hotel venecia', '2020-06-17', '2020-06-23', 9, 0, 12, 14, 4, '450.00');

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
(2, 'Aaktun', 'ash@yopmail.com', '$2y$10$bEJFg9CsgUoLylDIyY9vcOW8Jx90zpSMJkoAlFswXlZDh3W2p8852', NULL, 2, 'aaktunkay.png'),
(3, 'Administrador', 'verdejo97@outlook.com', '$2y$10$z4dNQ.hY1yGUmVf34zKSmuKMuHLq3DuWxIGgA.o4jCqX1erS2ZxZe', NULL, 1, 'defecto.png');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
