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
